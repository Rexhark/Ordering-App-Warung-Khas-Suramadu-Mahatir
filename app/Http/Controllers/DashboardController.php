<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $allOrder = Order::all();
        $totalOrder = 0;
        foreach ($allOrder as $ao) {
            $totalOrder += $ao->orderDetails()->sum('quantity');
        }
        $order = Order::orderBy('created_at', 'desc')->limit(5)->get();
        $jumlahUser = User::count();
        $onlineUser = User::where('isOnline', 1)->count();
        $mostFavFood = Food::orderBy('like_count', 'desc')->limit(3)->get();
        $mostOrderedFood = Food::orderBy('ordered', 'desc')->limit(3)->get();
        return view('pages.dashboard', compact(['jumlahUser', 'onlineUser', 'mostFavFood', 'mostOrderedFood', 'order', 'allOrder', 'totalOrder']))->with('type_menu', 'kategori');
    }

    public function tag()
    {
        return view('pages.tag')->with('type_menu', 'tag');
    }

    public function profil()
    {
        $user = Auth::user();
        $allOrder = Order::where('user_id', $user->id)->with('orderDetails')->get();
        $totalOrder = OrderDetail::whereIn('order_id', $allOrder->pluck('id'))->sum('quantity');
        $order = Order::where('user_id', $user->id)->latest()->limit(5)->with('orderDetails')->get();
        return view('pages.profil', compact('order', 'allOrder', 'totalOrder'))
            ->with('type_menu', 'profil');
    }
}
