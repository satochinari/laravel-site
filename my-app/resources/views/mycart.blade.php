@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/check.css') }}">
@section('content')
<div class="container-fluid">
    <div class="">
        <div class="mx-auto" style="max-width:1200px">
         <h1 class="text-center font-weight-bold" style="color:#555555;
            font-size:1.2em; padding:24px 0px;">カート内の商品</h1>
            {{ Auth::user()->name }}さんのカート</h1>

            <div class="">
                <p class="text-center">{{ $message ?? '' }}</p><br>
                <div class="d-flex flex-row flex-wrap">
                @if($my_carts->isNotEmpty())
                @foreach($my_carts as $my_cart)
                    <div class="mycart_box">
                        {{$my_cart->stock->name}} <br>
                        {{ number_format($my_cart->stock->fee)}}円<br>
                            <img src="/image/{{$my_cart->stock->imgpath}}" alt="" class="incart" >
                            <br>

                            <form action="/cartdelete" method="post">
                                @csrf
                                <input type="hidden" name="stock_id" value="{{ $my_cart->stock->id }}">
                                <input type="submit" value="カートから削除する">
                            </form>
                    </div>
                @endforeach

                </div>
                <div class="text-center p-2">
                    個数：{{$count}}個<br>
                    <p style="font-size:1.2em; font-weight:bold;">合計:{{number_format($sum)}}円</p>
                </div>
                <form action="/checkout" method="POST">
                    @csrf
                    <div class="section1 text-center">
                    <button type="submit" class="btn btn-outline-primary">購入する</button>
                    </div>
                </form>

                @else
                   <p class="text-center">カート内の商品はありません。</p><br>
                @endif
                <a href="/home">商品一覧へ</a>
            </div>
        </div>
    </div>
</div>
@endsection