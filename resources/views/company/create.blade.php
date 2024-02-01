@extends('layouts.account')

@section('content')
  <div class="account-layout border">
    <div class="account-hdr bg-primary text-white border">
      会社登録
    </div>
    <div class="account-bdy p-3">
     <form action="{{route('company.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <div>業種を選択</div>
          <select class="form-control" name="category" value="{{ old('category') }}" required>
            @foreach($categories as $category)
          <option value="{{$category->id}}">{{$category->category_name}}</option>
            @endforeach
          </select>
        </div>

        <div class="pb-3">
          <div class="py-3">
            <p>会社のロゴ</p>
          </div> 
          <div class="custom-file">
            <input type="file" class="custom-file-input" id="validatedCustomFile" name="logo" required>
            <label class="custom-file-label" for="validatedCustomFile">ロゴを選択...</label>
            @error('logo')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
        </div>

        <div class="form-group">
          <div class="py-3">
            <p>会社名</p>
          </div>
          <input type="text" placeholder="会社名" class="form-control @error('password') is-invalid @enderror" name="title" value="{{ old('title') }}" required>
            @error('title')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        {{-- <div class="form-group">
          <div class="py-3">
            <p>会社ウェブサイトのURL</p>
            <p class="text-primary">例えば : https://www.examplecompany.com</p>
          </div>
          <input type="text" placeholder="会社のウェブサイト" class="form-control @error('website') is-invalid @enderror" name="website" value="{{ old('website')}}" required>
            @error('website')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div> --}}

        {{-- <div class="pb-3">
          <div class="py-3">
            <p>会社のバナー/表紙</p>
          </div>
          <div class="custom-file">
            <input type="file" class="custom-file-input" name="cover_img" >
            <label class="custom-file-label">カバー画像を選択してください...</label>
            @error('cover_img')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
        </div> --}}

        <div class="pt-2">
          <p class="mt-3 alert alert-primary">面接・試験などの情報を入力してください</p>
        </div>
        <div class="form-group">
          <textarea class="form-control @error('description') is-invalid @enderror" name="description" required>{{ old('description') }}</textarea>
            @error('description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
   
        <div class="line-divider"></div>
        <div class="mt-3">
          <button type="submit" class="btn primary-btn">会社登録</button>
          <a href="{{route('account.authorSection')}}" class="btn primary-outline-btn">キャンセル</a>
        </div>
      </form>
    </div>
  </div>
@endSection
