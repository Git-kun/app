<?php

namespace App\Http\Controllers;

use App\Models\Stock; //追加

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart; //追加

class ShopController extends Controller
{
    public function index() //追加
    {
        $stocks = Stock::Paginate(6); //Eloquantで検索
        return view('shop',compact('stocks')); //追記変更
    }
    public function myCart() //追加
    {
        $my_carts = Cart::all(); //Eloquantで検索
        return view('mycart',compact('my_carts')); //追記変更
    }
}
