@extends('layouts.app')

@section('content')
<div class="container-fluid">
   <div class="">
       <div class="mx-auto" style="max-width:1200px">
           <h1 class="text-current text-center text-xl py-6 font-semibold">
           {{ Auth::user()->name }}さんのカートの中身</h1>
           <div class="container mx-auto">
               <p class="text-center">{{ $message ?? '' }}</p><br>
               @if($my_carts->isNotEmpty()) <!-- $my_cartsに値が入っていると下記処理 -->
                <!-- <div class="d-flex flex-row flex-wrap"> -->
                @foreach($my_carts as $my_cart)
                        <div class="rounded-md shadow-lg font-semibold text-center my-3 p-4">
                            {{$my_cart->stock->name}} <br>                                
                            {{ number_format($my_cart->stock->fee)}}円 <br>
                                <img src="/image/{{$my_cart->stock->imgpath}}" alt="" class="object-scale-down h-48 w-full" >
                                <br>
                                <form action="/cartdelete" method="post">
                                    @csrf
                                    <input type="hidden" name="delete" value="delete">
                                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                    <input type="hidden" name="stock_id" value="{{ $my_cart->stock->id }}">
                                    <input type="submit" class="bg-gray-300 hover:bg-gray-400 py-1 px-1 rounded inline-flex text-center"　value="カートから削除する">
                                </form>
                        </div>
                    @endforeach
                    <div class="text-center p-2">
                        個数：{{$count}}個<br>
                        <p style="font-size:1.2em; font-weight:bold;">合計金額:{{number_format($sum)}}円</p>  
                    </div>  
                    <form action="/checkout" method="POST" class="text-center">
                        @csrf
                        <!-- <button type="submit" class="btn btn-danger btn-lg text-center buy-btn" >購入する</button> -->
                        <button type="submit" class="font-mono text-white transition duration-500 ease-in-out bg-red-500 hover:bg-red-600 transform hover:-translate-y-1 hover:scale-110 py-2 px-3 my-8 mx-auto w-1/4 rounded">購入する</button>
                    </form>
                @else
                   <p class="text-center">カートはからっぽです。</p>
               @endif
            </div>
               <a href="/">商品一覧へ</a>
           </div>
       </div>
   </div>
</div>
@endsection