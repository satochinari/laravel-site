@extends('layouts.app')

@section('content')
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">レビュー</div>

        <div class="card-body">
        <form action="{{ route('comments.create') }}" method="post">
          <div class="row mb-3">
            <label for="body" class="col-md-4 col-form-label text-md-end">投稿内容</label>
            <div class="col-md-6">
              <textarea name="body" id="body" class="form-control"></textarea>
            </div>
          </div>

          <div class="row mb-0">
            <div class="col-md-6 offset-md-4">
              <button type="submit" class="btn btn-outline-primary">
                投稿する
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