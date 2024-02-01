@extends('layouts.account')
@section('content')
<div class="account-layout  border">
  <div class="account-hdr bg-primary text-white border">
   {{config('app.name')}} で雇用主になります
  </div>
  <div class="account-bdy p-3">
    <div class="row">
      <div class="col-sm-12 col-md-4">
        <p class="lead">著者ロールへのアップグレード</p>
      </div>
      <div class="col-sm-12 col-md-8">
        <div>
          <p class="text-sm"><i class="fas fa-info-circle"></i> <span class="font-weight-bold">通常、これは管理者によって検証される必要がありますが、テストの場合は、ワンクリックで雇用主になることができます。</span> </p>
          <div class="my-4">
          <p class="my-3">ボタンをクリックして割り当てます アカウントに対する<span class="text-primary">作成者の役割</span>。</p>
            <form action="{{route('account.becomeEmployer')}}" method="POST">
              @csrf
              <div class="form-group">
                <div class="d-flex">
                  <button type="submit" class="btn primary-outline-btn">雇用主になる</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection