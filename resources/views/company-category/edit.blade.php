@extends('layouts.account')

@section('content')
<div class="account-layout border">
  <div class="account-hdr bg-primary text-white border " >
    会社カテゴリの編集
  </div>
  <div class="account-bdy p-3">
    @if($errors->any())
    {!! implode('', $errors->all('<div>:メッセージ</div>')) !!}
@endif
      <div class="row mb-3">
        <div class="col-12">
          <p class="alert alert-primary">会社カテゴリーを変更しようとしています : {{$category->category_name}}</p>
          <form action="{{route('category.update',['id'=>$category->id])}}" method="POST">
            @csrf
            @method('put')
            <div class="form-group">
              <div>業種を選択</div>
              <input type="text" placeholder="ここでカテゴリ名を編集します" name="category_name" class="form-control @error('category_name') input-error @enderror">
            </div>
            <div class="d-flex">
              <button type="submit" class="btn secondary-btn mr-3">アップデート</button>
              <a href="{{route('account.dashboard')}}" class="btn primary-outline-btn">キャンセル</a>
            </div>
          </form>
        </div>
      </div>
  </div>
</div> 
@endsection