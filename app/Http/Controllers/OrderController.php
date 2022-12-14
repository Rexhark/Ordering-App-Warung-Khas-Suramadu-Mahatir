<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){
        $order = Order::all();
        return view('pages.pesanan', compact(['order']))->with(['type_menu' => 'pesanan']);
    }
}
