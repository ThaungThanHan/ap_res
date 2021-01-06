<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(){
        $dishes = Dish::all();
        return view('kitchen.order',compact('dishes'));
    }
}
