@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="card">
      <div class="card-header">レビュー</div>
      <div class="card-body">
        <ul class="list-group">
          @foreach($comments as $comment)
            <li class="list-group-item">
              <p class="mb-1">{{ $comment->body }}</p>
              <p class="text-muted mb-0">{{ $comment->user->name }}</p>
            </li>
          @endforeach
        </ul>
        <div class="mt-3">
          <a href="{{ route('comments.create') }}" class="btn btn-outline-primary">レビューを投稿する</a>
        </div>
      </div>
    </div>
  </div>
@endsection