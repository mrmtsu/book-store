@extends('app')

@section('title', $tag->hashtag)

@section('content')
  @include('nav')
  <div class="container">
    <div class="card mt-3" style="background: aliceblue;border-radius: 50px;">
      <div class="card-body">
        <h2 class="h4 card-title m-0">{{ $tag->hashtag }}</h2>
        <div class="card-text text-right">
          {{ $tag->articles->count() }}件
        </div>
      </div>
    </div>
    <div class="container" style="margin-top: 50px; display: flex; flex-wrap: wrap;">
      @foreach($tag->articles as $article)
        @include('articles.card')
      @endforeach
    </div>
  </div>
@endsection