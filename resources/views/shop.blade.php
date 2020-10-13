@extends('layouts.app')

@section('content')
<div class="container-fluid">
   <div class="">
       <div class="mx-auto" style="max-width:1200px">
        
           <h1 style="color:#555555; text-align:center; font-size:1.2em; padding:24px 0px; font-weight:bold;">商品一覧</h1>
           <div class="">
               <div class="d-flex flex-row flex-wrap">
                       @foreach($stocks as $stock) <!--商品情報を$stocksでforeach文で回す -->
                           <div class="col-xs-6 col-sm-4 col-md-4 ">
                               <div class="max-w-sm rounded overflow-hidden shadow-lg">
                                   {{$stock->name}} <br>
                                   {{$stock->fee}}円<br>
                                   <img src="/image/{{$stock->imgpath}}" alt="" class="incart" >
                                   <br>
                                   {{$stock->detail}} <br>
                                   <form action="mycart" method="post">
                                       @csrf
                                       <input type="hidden" name="stock_id" value="{{ $stock->id }}">
                                       <button class="bg-gray-300 hover:bg-gray-400 py-1 px-1 rounded inline-flex text-center">
                                        <!-- <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M13 8V2H7v6H2l8 8 8-8h-5zM0 18h20v2H0v-2z"/></svg> -->
                                        <span>カートに入れる</span>
                                       </button>
                                   </form>
                               </div>
                           </div>
                       @endforeach
               </div>
               <div class="text-center" style="width: 200px;margin: 20px auto;">
               {{  $stocks->links()}} 
               </div>
           </div>
       </div>
   </div>
</div>
@endsection