<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index(){
        $user = Auth::user();
        if ($user->role == 'admin') {
            $order = Order::with('orderDetails')->get();
            return view('pages.pesanan', compact(['order']))->with(['type_menu' => 'pesanan']);
        }
        $order = Order::where('user_id', $user->id)->with('orderDetails')->get();
        return view('pages.pesanan', compact(['order']))->with(['type_menu' => 'pesanan']);
    }
}
