@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<link rel="stylesheet" href="{{ asset('css/check.css') }}">
@section('content')
<div class="container-fluid">
   <div class="">
       <div class="mx-auto" style="max-width:1200px">
          <h1 style="color:#555555; text-align:center; font-size:1.2em; padding:24px 0px; font-weight:bold;">商品一覧</h1>
          <div class="text-center mb-4">
            <form action="{{ route('search') }}" method="GET" class="form-inline">
              <input type="text" name="query" class="form-control mr-sm-2" placeholder="商品を検索">
              <button type="submit" class="btn btn-primary">検索</button>
            </form>
          </div>
           <div class="">
               <div class="d-flex flex-row flex-wrap">
                  @foreach($stocks as $stock)
                  <div class="col-xs-6 col-sm-4 col-md-4 ">
                    <div class="mycart_box">
                      {{$stock->name}} <br>
                      <iframe src="http://192.168.56.10:8000/click" width="300" height="200"></iframe>
                      <img id="a" src="/image/{{$stock->imgpath}}" alt="" class="incart"><br>
                      {{$stock->fee}}円 <br>
                      {{$stock->detail}} <br>
                      <form action="mycart" method="post">
                        @csrf
                        <input type="hidden" name="stock_id" value="{{ $stock->id }}">
                        <input type="submit" value="カートに入れる">
                      </form>
                      </div>
                    </div>
                  @endforeach
              </div>
              <div class="text-center" style="width: 200px;margin: 20px auto;">
              {{$stocks->links()}}
              </div>
           </div>
       </div>
   </div>
</div>
@endsection