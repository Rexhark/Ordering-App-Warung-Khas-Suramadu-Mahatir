<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $allOrder = Order::all();
        $totalOrder = 0;
        foreach($allOrder as $ao){
            $totalOrder += $ao->orderdetail->sum('quantity');
        }
        $order = Order::orderBy('created_at','desc')->limit(5)->get();
        $jumlahUser = User::count();
        $onlineUser = User::where('isOnline', 1)->count(); 
        $mostFavFood = Food::orderBy('favorite','desc')->limit(3)->get();
        $mostOrderedFood = Food::orderBy('ordered','desc')->limit(3)->get();
        return view('pages.dashboard', compact(['jumlahUser','onlineUser','mostFavFood','mostOrderedFood','order','allOrder','totalOrder']))->with('type_menu','kategori');
    }
}
