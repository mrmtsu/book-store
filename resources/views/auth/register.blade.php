@extends('app')

@section('title', 'ユーザー登録')

@section('content')
  <div class="container">
    <div class="row">
      <div class="mx-auto col col-12 col-sm-11 col-md-9 col-lg-7 col-xl-6" style="margin-top:50px;">
        <div class="card mt-3">
          <div class="card-body text-center">
            <h2 class="h3 card-title text-center font-weight-bold">SIGN UP</h2>

            @include('error_card_list')

            <div class="card-text">
              <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="md-form">
                  <label for="name">Your name</label>
                  <input class="form-control" type="text" id="name" name="name" required value="{{ old('name') }}">
                  <small>英数字3〜16文字(登録後の変更はできません)</small>
                </div>
                <div class="md-form">
                  <label for="email">Your email</label>
                  <input class="form-control" type="text" id="email" name="email" required value="{{ old('email') }}" >
                </div>
                <div class="md-form">
                  <label for="password">Your password</label>
                  <input class="form-control" type="password" id="password" name="password" required>
                </div>
                <div class="md-form">
                  <label for="password_confirmation">Your password(confirmation)</label>
                  <input class="form-control" type="password" id="password_confirmation" name="password_confirmation" required>
                </div>
                <button class="btn btn-deep-orange" type="submit">Sign up</button>
              </form>

              <a href="{{ route('login.{provider}', ['provider' => 'google']) }}" class="btn btn-outline-default waves-effect" style="margin:30px 0;">
                <i class="fab fa-google mr-1"></i>Googleで登録
              </a>

              <div class="mt-0">
                <a href="{{ route('login') }}" class="card-text">ログインはこちら</a>
              </div>

              <a href="/" class="card-text">TOP</a>
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection