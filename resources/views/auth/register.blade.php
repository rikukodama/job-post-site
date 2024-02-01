@extends('layouts.auth')

@section('content')
<div class="container my-4">
    <div class="row justify-content-center">
        <div class="col-sm-12 col-md-6 px-0">
            {{-- login-poster and register using the same class name --}}
            <div class="login-poster">
                {{-- <img src="" alt=""> --}}
                
            </div>
        </div>
 
        <div class="col-sm-12 col-md-6 px-0">
            <div class="login-container">
                <div class="login-header mb-3">
                    <h3>新規登録</h3>
                    <p class="text-muted">基本情報を登録し、プロフィールを完成させて、無料でお仕事への応募を始めましょう！</p>
                </div>
                <div class="login-form">
                    <form action="{{route('register')}}" method="POST">
                        @csrf
                        {{-- fullname --}}
                        <div class="form-group">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text" id="basic-addon1"><i class="fas fa-id-badge"></i></span>
                                </div>
                            <input id="name" type="name" placeholder="フルネーム" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>
                        {{-- email --}}
                        <div class="form-group">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                                </div>
                            <input id="email" type="email" placeholder="電子メールアドレス" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>
                        {{-- password --}}
                        <div class="form-group">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text" id="basic-addon1"><i class="fas fa-lock"></i></span>
                                </div>
                            <input id="password" type="password" placeholder="パスワード" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" required>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text" id="basic-addon1"><i class="fas fa-lock"></i></span>
                                </div>
                            <input id="password_confirmation" type="password" placeholder="パスワード(確認用)" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" value="{{ old('password_confirmation') }}" required>
                            @error('password_confirmation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>
                        <div>
                            <small class="text-muted d-block mb-3">下の「登録」ボタンを押してサインアップしてください。</p>
                        </div>
                        <button type="submit" class="btn primary-btn btn-block">登録する</button>
                    </form>
                    <div class="my-3">
                        <p><a href="/login">登録済みの場合はこちら </a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('css')
<style>
.login-poster {
    /* fallback */
   background-image: url('{{asset("images/login-background.png")}}');
    background-image: linear-gradient(
            to bottom,
            rgba(0, 0, 0, 0.5),
            rgba(0, 0, 0, 0.35)
        ),
        url('{{asset("images/login-background.png")}}');
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center;
}
</style>
@endpush

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
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
