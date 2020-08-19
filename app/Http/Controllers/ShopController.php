<?php

namespace App\Http\Controllers;

use App\Models\Stock; //追加

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart; //追加

class ShopController extends Controller
{
    public function index()
    {
        $stocks = Stock::Paginate(6); //Eloquantで検索
        return view('shop',compact('stocks')); //追記変更
    }

    public function myCart(Cart $cart)
    {
        $data = $cart->showCart();
        return view('mycart',$data); //追記変更
        
    }

    public function addMycart(Request $request,Cart $cart)
   {
       //カートに追加の処理
       $stock_id=$request->stock_id;
       $message = $cart->addCart($stock_id);

       //追加後の情報を取得
       $data = $cart->showCart();

       return view('mycart',$data)->with('message',$message);
   }

   public function deleteCart(Request $request,Cart $cart)
    {
        //カートから削除の処理
       $stock_id=$request->stock_id;
       $message = $cart->deleteCart($stock_id);

       //追加後の情報を取得
       $data = $cart->showCart();

       return view('mycart',$data)->with('message',$message);
    }
}
