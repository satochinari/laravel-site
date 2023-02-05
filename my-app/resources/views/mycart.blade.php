@extends('layouts.app')

@section('content')
<div class="container-fluid">
 <div class="">
     <div class="mx-auto" style="max-width:1200px">
         <h1 class="text-center font-weight-bold" style="color:#555555;
            font-size:1.2em; padding:24px 0px;">カート内のアイテム</h1>
            {{ Auth::user()->name }}さんのカート</h1>

            <div class="">
                <p class="text-center">{{ $message ?? '' }}</p><br>
                <div class="d-flex flex-row flex-wrap">
                @if($my_carts->isNotEmpty())
                @foreach($my_carts as $my_cart)
                    <div class="mycart_box">
                        {{$my_cart->stock->name}} <br>
                        {{ number_format($my_cart->stock->fee)}}ゴールド<br>
                            <img src="/image/{{$my_cart->stock->imgpath}}" alt="" class="incart" >
                            <br>

                            <form action="/cartdelete" method="post">
                                @csrf
                                <input type="hidden" name="stock_id" value="{{ $my_cart->stock->id }}">
                                <input type="submit" value="カートから削除する">
                            </form>
                    </div>
                @endforeach
                <div class="text-center p-2">
                    個数：{{$count}}個<br>
                    <p style="font-size:1.2em; font-weight:bold;">合計:{{number_format($sum)}}ゴールド</p>
                </div>
                <form action="/checkout" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger btn-lg text-center buy-btn" >購入する</button>
                </form>
                @else
                   <p class="text-center">カート内のアイテムはありません。</p>
                @endif
                <a href="/">アイテム一覧へ</a>
               </div>
           </div>
       </div>
   </div>
</div>
@endsection