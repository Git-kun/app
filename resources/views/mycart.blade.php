@extends('layouts.app')

@section('content')
<div class="container-fluid">
   <div class="">
       <div class="mx-auto" style="max-width:1200px">
          <h1 class="text-center font-weight-bold" style="color:#555555; font-size:1.2em; padding:24px 0px;">カートの中身</h1>
            <div class="card-body">
                  {{-- 追加 --}}

                  @foreach($my_carts as $my_cart)
                        {{$my_cart->user_id}} <br>
                        {{$my_cart->stock_id}}<br>
                  @endforeach
                  {{-- ここまで --}}
                  </div>
            </div>
       </div>
   </div>
</div>
@endsection