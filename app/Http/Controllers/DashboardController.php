<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $jumlahUser = User::count();
        $onlineUser = User::where('isOnline', 1)->count(); 
        $mostFavFood = Food::orderBy('favorite','desc')->limit(3)->get();
        $mostOrderedFood = Food::orderBy('ordered','desc')->limit(3)->get();
        return view('pages.dashboard', compact(['jumlahUser','onlineUser','mostFavFood','mostOrderedFood']))->with('type_menu','kategori');
    }
}
