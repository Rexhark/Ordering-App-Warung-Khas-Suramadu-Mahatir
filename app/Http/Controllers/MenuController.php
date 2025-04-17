<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\Like;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{
    public function indexMenu()
    {
        $categories = [
            'gadoGado' => 1,
            'soto' => 2,
            'nasiCampur' => 3,
            'nasiKuning' => 4,
            'nasiPecel' => 5,
            'nasiAyamCrispy' => 6,
            'minuman' => 7
        ];

        $foods = [];
        foreach ($categories as $key => $categoryId) {
            $foods[$key] = Food::where('category_id', $categoryId)->get();
        }

        $likedItems = Auth::check() ?
            Like::where('user_id', Auth::id())->pluck('food_id')->toArray() :
            json_decode(request()->cookie('liked_items', '[]'), true);

        return view('main.pages.menu', array_merge($foods, compact('likedItems')));
    }

    public function indexPesanan()
    {
        $cart = session()->get('cart', []);
        $totalPayment = array_sum(array_column($cart, 'totalPrice'));
        return view('main.pages.pesanan', compact('cart', 'totalPayment'));
    }

    public function tambahPesanan(Food $food)
    {
        $cart = session()->get('cart', []);

        if (!isset($cart[$food->id])) {
            $cart[$food->id] = [
                'name' => $food->name,
                'price' => $food->price,
                'quantity' => 1,
                'totalPrice' => $food->price,
            ];
        } else {
            $cart[$food->id]['quantity'] += 1;
            $cart[$food->id]['totalPrice'] = $cart[$food->id]['quantity'] * $cart[$food->id]['price'];
        }

        session()->put('cart', $cart);
        return back()->with('success', 'Pesanan ditambahkan ke keranjang!');
    }

    public function tambah($food_id)
    {
        return $this->ubahJumlahPesanan($food_id, 1);
    }

    public function kurang($food_id)
    {
        return $this->ubahJumlahPesanan($food_id, -1);
    }

    private function ubahJumlahPesanan($food_id, $jumlah)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$food_id])) {
            $cart[$food_id]['quantity'] += $jumlah;
            $cart[$food_id]['totalPrice'] += $jumlah * $cart[$food_id]['price'];

            if ($cart[$food_id]['quantity'] <= 0) {
                unset($cart[$food_id]);
            }
        }

        session()->put('cart', $cart);
        return back()->with('success', 'Jumlah pesanan berhasil diperbarui.');
    }

    public function like($slug)
    {
        $food = Food::where('slug', $slug)->firstOrFail();
        $user = Auth::user();
        $likedItems = json_decode(request()->cookie('liked_items', '[]'), true);

        if ($user) {
            // Cek apakah user sudah like sebelumnya
            $like = $food->likes()->where('user_id', $user->id)->first();
            if ($like) {
                $like->delete();
            } else {
                $food->likes()->create(['user_id' => $user->id]);
            }
            // Hitung ulang jumlah like dari database
            $food->like_count = $food->likes()->count();
        } else {
            // Guest mode: Simpan liked item di cookie
            if (in_array($food->id, $likedItems)) {
                // Jika sudah like, hapus dari list dan kurangi like_count
                $likedItems = array_values(array_diff($likedItems, [$food->id]));
                $food->like_count--;
            } else {
                // Jika belum like, tambahkan ke list dan tambah like_count
                $likedItems[] = $food->id;
                $food->like_count++;
            }
            // Simpan liked items ke cookie
            cookie()->queue(cookie('liked_items', json_encode($likedItems), 60 * 24 * 30));
        }

        $food->save();

        return back();
    }


    public function checkout()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu untuk melakukan checkout.');
        }

        $user = Auth::user();
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return back()->with('error', 'Tidak ada item dalam keranjang.');
        }

        // **Buat order baru setiap kali checkout**
        $order = Order::create([
            'user_id'       => $user->id,
            'totalPayment'  => 0,
        ]);

        foreach ($cart as $foodId => $item) {
            OrderDetail::create([
                'order_id'   => $order->id,
                'food_id'    => $foodId,
                'quantity'   => $item['quantity'],
                'totalPrice' => $item['totalPrice'],
            ]);

            // Update ordered field di food
            $food = Food::find($foodId);
            $food->increment('ordered', $item['quantity']);
        }

        // **Update totalPayment setelah semua item masuk ke order**
        $order->totalPayment = $order->orderDetails()->sum('totalPrice');
        $order->save();

        // **Hapus cart setelah checkout sukses**
        session()->forget('cart');

        return redirect()->route('main.pages.pesanan')->with('success', 'Checkout berhasil! Terima kasih telah memesan.');
    }
}
