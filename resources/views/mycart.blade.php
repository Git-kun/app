@extends('layouts.app')

@section('content')
<div class="container-fluid">
   <div class="">
       <div class="mx-auto" style="max-width:1200px">
          <h1 class="text-center font-weight-bold" style="color:#555555; font-size:1.2em; padding:24px 0px;">{{ Auth::user()->name }}さんのカートの中身</h1>
            <div class="">
            <p class="text-center">{{ message }}</p><br>
            <div class="d-flex flex-row flex-wrap">
                  @foreach($my_carts as $my_cart)
                        {{$my_cart->user_id}}<br>
                        {{$my_cart->stock_id}}<br>
                  @endforeach
            </div>
        </div>
   </div>
</div>
@endsection