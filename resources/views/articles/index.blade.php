@extends('app')

@section('title', '記事一覧')

@section('content')
  @include('nav')
  <div class="view intro-2" style="background: url(https://images.pexels.com/photos/34075/pexels-photo.jpg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260)no-repeat center center;background-size: cover; min-height: 100vh;">
    <div class="full-bg-img">
      <div class="mask rgba-black-strong flex-center">
        <div class="container">
          <div class="white-text text-center wow fadeInUp">
            <h2>I found a book that I want to read.</h2>
            <h5>When you scroll down it will disappear</h5>
            <br>
            <p>Full page intro with background image will be always displayed in full screen mode, regardless
              of device </p>
              <a href="#main"><i class="fas fa-angle-double-down" style="margin-top: 100px; color: white;"></i></a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container" id="main" style="margin: 200px auto; display: flex; flex-wrap: wrap;">
    @foreach($articles as $article)
      @include('articles.card')
    @endforeach
  </div>
@endsection