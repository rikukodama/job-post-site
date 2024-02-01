@extends('layouts.account')

@section('content')
  <div class="account-layout border">
    <div class="account-hdr bg-primary text-white border">
      アカウントを無効化し
    </div>
    <div class="account-bdy p-3">
      <div class="row">
        <div class="col-sm-12 col-md-4">
          <p class="lead">アカウントを削除する</p>
         
        </div>
        <div class="col-sm-12 col-md-8">
          <div class="py-3">
            <p class="mb-3">代わりにログアウトしてください</p>
            <a href="{{route('account.logout')}}" class="btn primary-outline-btn">ログアウト</a>
          </div>
          
          <div>
            <p class="text-sm"><i class="fas fa-info-circle"></i> <span class="font-weight-bold">アカウントを削除すると、元に戻すことはできません。</span> </p>
            <div class="my-4">
            <p class="my-3">このアカウントを削除するには、ボタンをクリックしてください。</p>
              <form action="{{route('account.delete')}}" method="POST">
                @csrf
                @method('delete')
                <div class="form-group">
                  <div class="d-flex">
                    <button type="submit" class="btn danger-btn">アカウントを削除する </button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endSection

