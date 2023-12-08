@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">入力内容確認</div>

                <div class="card-body">
                  <form method="POST" action="{{ route('send') }}">
                  @csrf
                  <div class="row mb-3">
                    <label for="email" class="col-md-4 text-md-end">メールアドレス</label>
                      <div class="col-md-6">
                      {{ $inputs['email'] }}
                      <input name="email" value="{{ $inputs['email'] }}" type="hidden">
                      </div>
                  </div>

                  <div class="row mb-3">
                    <label for="title" class="col-md-4 text-md-end">タイトル</label>
                      <div class="col-md-6">
                      {{ $inputs['title'] }}
                      <input name="title" value="{!! $inputs['title'] !!}" type="hidden">
                      </div>
                  </div>

                  <div class="row mb-3">
                    <label for="body" class="col-md-4 text-md-end">お問い合わせ内容</label>
                      <div class="col-md-6">
                      {!! nl2br(e($inputs['body'])) !!}
                      <input name="body" value="{!! $inputs['body'] !!}" type="hidden">
                      </div>
                  </div>

                  <div class="row mb-0">
                    <div class="col-md-6 offset-md-4">
                      <button type="submit" class="btn btn-outline-primary" name="action" value="back">
                        入力内容修正
                      </button>
                      <button type="submit" class="btn btn-outline-primary" name="action" value="submit">
                        送信する
                      </button>
                    </div>
                  </div>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection