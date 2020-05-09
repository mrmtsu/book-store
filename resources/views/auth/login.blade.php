@extends('app')

@section('title', 'ログイン')

@section('content')
  <div class="container">
    <div class="row">
      <div class="mx-auto col col-12 col-sm-11 col-md-9 col-lg-7 col-xl-6">
        <div class="card mt-3">
          <div class="card-body text-center">
            <h2 class="h3 card-title text-center mt-2">Login</h2>

            <a href="{{ route('login.{provider}', ['provider' => 'google']) }}" class="btn btn-outline-default waves-effect">
              <i class="fab fa-google mr-1"></i>Googleでログイン
            </a>

            @include('error_card_list')
            
            <div class="card-text">
              <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="md-form">
                  <label for="email">Your email</label>
                  <input class="form-control" type="text" id="email" name="email" required value="{{ old('email') }}">
                </div>

                <div class="md-form">
                  <label for="password">Your password</label>
                  <input class="form-control" type="password" id="password" name="password" required>
                </div>
 
                <input type="hidden" name="remember" id="remember" value="on">

                <button class="btn btn-deep-orange" type="submit">Login</button>

              </form>

              <div class="mt-0">
                <a href="{{ route('register') }}" class="card-text">ユーザー登録はこちら</a>
              </div>

              <a href="/" class="card-text">TOP</a>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection