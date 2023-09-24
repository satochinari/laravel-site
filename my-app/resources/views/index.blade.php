@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">お問い合わせ</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('confirm') }}">

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">メールアドレス</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @if ($errors->has('email'))
                                <p class="error-message">{{ $errors->first('email') }}</p>
                                @endif
                            </div>
                        </div>

                    <form method="POST" action="{{ route('confirm') }}">

                        <div class="row mb-3">
                            <label for="title" class="col-md-4 col-form-label text-md-end">タイトル</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus>

                                @if ($errors->has('title'))
                                <p class="error-message">{{ $errors->first('title') }}</p>
                                @endif
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="body" class="col-md-4 col-form-label text-md-end">お問い合わせ内容</label>

                            <div class="col-md-6">
                                <textarea class="form-control" id="body" rows="3" name="body">{{ old('body') }}</textarea>

                                @if ($errors->has('body'))
                                <p class="error-message">{{ $errors->first('body') }}</p>
                                @endif
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-outline-primary">
                                入力内容確認
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