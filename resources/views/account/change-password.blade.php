@extends('layouts.account')

@section('content')
  <div class="account-layout  border">
    <div class="account-hdr bg-primary text-white border">
      Change Password
    </div>
    <div class="account-bdy p-3">
      <form action="{{route('account.changePassword')}}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
          <input type="password" placeholder="現在のパスワード *" class="form-control @error('current_password') is-invalid @enderror" name="current_password" value="{{ old('current_password') }}" required>
            @error('current_password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <p class="mt-3  alert alert-primary">パスワードは 8 文字と 1 つの特殊文字を含む必要があります </p>
        <div class="form-group">
          <input type="password" placeholder="新しいパスワード*" class="form-control @error('new_password') is-invalid @enderror" name="new_password" value="{{ old('new_password') }}" required>
            @error('new_password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
          <input type="password" placeholder="パスワードを認証する*" class="form-control @error('confirm_password') is-invalid @enderror" name="confirm_password" value="{{ old('confirm_password') }}" required>
            @error('confirm_password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="line-divider"></div>
        <div class="mt-3">
          <button type="submit" class="btn primary-btn">パスワードを変更する</button>
          <button class="btn primary-outline-btn">キャンセル</button>
        </div>
      </form>
    </div>
  </div>
@endSection

@push('css')

@endpush