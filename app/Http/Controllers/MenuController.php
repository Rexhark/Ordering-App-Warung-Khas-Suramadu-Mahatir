<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Termwind\Components\Dd;

class MenuController extends Controller
{
    public function indexMenu(){
        $gadoGado = Food::where('category_id','1')->get();
        $soto = Food::where('category_id','2')->get();
        $nasiCampur = Food::where('category_id','3')->get();
        $nasiKuning = Food::where('category_id','4')->get();
        $nasiPecel = Food::where('category_id','5')->get();
        $nasiAyamCrispy = Food::where('category_id','6')->get();
        $minuman = Food::where('category_id','7')->get();
        return view('main.pages.menu', compact(['gadoGado','soto','nasiCampur','nasiKuning','nasiPecel','nasiAyamCrispy','minuman']));
    }
    public function indexPesanan(){
        if(Auth::check()){
            $order = Order::where('user_id',Auth::id())->first();
            if(!$order){
                return view('main.pages.pesanan');
            }
            $orderdetail = OrderDetail::where('order_id',$order->id)->get();
            return view('main.pages.pesanan', compact(['orderdetail','order']));
        }
        return view('main.pages.pesanan');
    }
    public function tambahPesanan(Food $food){
        
        if(Auth::check()){
            $order = Order::firstOrCreate(
                ['user_id' => Auth::id()]
            );
            $item = OrderDetail::firstOrCreate(
                ['order_id' => $order->id,
                'food_id' => $food->id]
            );

            $item->quantity += 1;
            $item->totalPrice += $food->price;
            $item->save();

            $order->totalPayment += $item->totalPrice;
            $order->save();

            $orderdetail = OrderDetail::where('order_id',$order->id)->get();
            return view('main.pages.pesanan', compact(['orderdetail','order']));
        }

        return view('main.pages.pesanan')->with('error','Silakan login terlebih dahulu untuk memesan makanan.');
    }
    public function tambah(OrderDetail $orderdetail){
        $orderdetail->quantity += 1;
        $orderdetail->save();
        dd($orderdetail->food->name);
        $order = Order::where('user_id',Auth::id())->first();
        if(!$order){
            return view('main.pages.pesanan');
        }
        return view('main.pages.pesanan', compact(['orderdetail','order']));
    }
}
