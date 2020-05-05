@extends('app')

@section('title', $user->name)

@section('content')
  @include('nav')
  <div class="container">
    @include('users.user')
    @include('users.tabs', ['hasArticles' => true, 'hasLikes' => false])
    <div class="card-list" style="margin-top: 50px; display: flex; flex-wrap: wrap;">
      @foreach($articles as $article)
        @include('articles.card')
      @endforeach
    </div>
  </div>
@endsection