@extends('layouts.app')

@section('content')
<div class="container-fluid">
   <div class="">
       <div class="mx-auto" style="max-width:1200px">
       <h1 class="text-center font-weight-bold" style="color:#555555; font-size:1.2em; padding:24px 0px;">カートの中身</h1>
           <div class="">
               <div class="d-flex flex-row flex-wrap">
                 商品一覧を出したい<br>

                {{-- 追加 --}}

                 @foreach($stocks as $stock)
                      {{$stock->name}} <br>
                      {{$stock->fee}}円<br>
                      <img src="/image/{{$stock->imgpath}}" alt="" class="incart" >
                      {{$stock->detail}} <br><br>
                 @endforeach
                 {{$stocks->links()}} 

                {{-- ここまで --}}
               </div>
           </div>
       </div>
   </div>
</div>
@endsection