@extends('app')

@section('title', $user->name . 'のいいねした記事')

@section('content')
  @include('nav')
  <div class="container">
    @include('users.user')
    @include('users.tabs', ['hasArticles' => false, 'hasLikes' => true])
    <div class="card-list" style="margin-top: 50px; display: flex; flex-wrap: wrap;">
      @foreach($articles as $article)
        @include('articles.card')
      @endforeach
    </div>
  </div>
@endsection