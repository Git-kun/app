<?php

namespace App\Http\Controllers;

use App\Models\Stock; 

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart; 
use Illuminate\Support\Facades\Mail; 
use App\Mail\Thanks;

class ShopController extends Controller
{
    public function index()
    {
        $stocks = Stock::Paginate(6); //Eloquantで検索(6つのデータを1ページにページネーション)
        return view('shop',compact('stocks')); 
    }

    public function myCart(Cart $cart) //カートの中身を確認
    {
        $data = $cart->showCart();
        return view('mycart',$data); 
        
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

    public function checkout(Request $request,Cart $cart)
    {
       $user = Auth::user();
       $mail_data['user']=$user->name; 
       $mail_data['checkout_items']=$cart->checkoutCart(); 
       Mail::to($user->email)->send(new Thanks($mail_data));
       return view('checkout');
    }

    public function search(Request $request)
    {
        $query = Stock::query();

        //$request->input()で検索時に入力した項目を取得します。
        $search = $request->input('name');

        // ユーザ名入力フォームで入力した文字列を含むカラムを取得します
        if ($request->has('name') && $search != '') { //nameをリクエストで持っていることなおかつ$request値が空でないこと
            $query->where('name', 'like', '%'.$search.'%')->get();
        }

        //ユーザを1ページにつき6件ずつ表示させます
        $data = $query->paginate(6);

        return view('search',['data' => $data]); //検索結果の画面を返す
    }
    
}