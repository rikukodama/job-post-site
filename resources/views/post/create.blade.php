@extends('layouts.account')

@section('content')
  <div class="account-layout border">
    <div class="account-hdr bg-primary text-white border">
      投稿を作成
    </div>
    <div class="account-bdy p-3">
      {{-- <div class="alert alert-primary">会社の詳細が自動的に添付されます。</div> --}}
      <p class="text-primary mb-4">投稿を入力してください。</p>
      <div class="row mb-3">
        <div class="col-sm-12 col-md-12">
          <form action="{{route('post.store')}}" id="postForm" method="POST">
            @csrf
            <div class="form-group">
              <label for="">職種</label>
              <input type="text" placeholder="職種" class="form-control @error('job_title') is-invalid @enderror" name="job_title" value="{{ old('job_title') }}" required autofocus >
              @error('job_title')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span> 
              @enderror
            </div>

            {{-- <div class="form-group">
              <div class="row">
                <div class="col-md-6">
                  <label for="">職務レベル</label>
                  <select name="job_level" class="form-control" value="{{old('job_level')}}" required>
                    <option value="Senior level">シニアレベル</option>
                    <option value="Mid level">中レベル</option>
                    <option value="Top level">トップレベル</option>
                    <option value="Entry level">入門レベル</option>
                  </select>
                </div>
                <div class="col-md-6">
                  <label for="">欠員数</label>
                  <input type="number" class="form-control @error('vacancy_count') is-invalid @enderror" name="vacancy_count" value="{{ old('vacancy_count') }}" required >
                  @error('vacancy_count')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
              </div>
            </div> --}}
       

            {{-- <div class="form-group">
              <label for="">雇用形態</label>
              <select name="employment_type" class="form-control" name="employment_type" value="{{old('employment_type')}}">
                <option value="Full Time">フルタイム</option>
                <option value="Part Time">パートタイム</option>
                <option value="Freelance">フリーランス</option>
                <option value="Internship">インターンシップ</option>
                <option value="Trainneship">研修制度</option>
                <option value="Volunter">ボランティア</option>
              </select>
            </div> --}}

            {{-- <div class="form-group">
              <label for="">勤務地</label>
              <input type="text" placeholder="勤務地" class="form-control @error('job_location') is-invalid @enderror" name="job_location" value="{{ old('job_location') }}" required >
              @error('job_location')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div> --}}

            {{-- <div class="form-group">
              <div class="row">
                <div class="col-md-6">
                  <label for="">提示された給与（月給）</label>
                  <input type="text" placeholder="20k - 50k" class="form-control @error('salary') is-invalid @enderror" name="salary" value="{{ old('salary') }}" required >
                  @error('salary')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
                <div class="col-md-6">
                  <label for="">締め切り</label>
                  <input type="date" class="form-control @error('deadline') is-invalid @enderror" name="deadline" value="{{ old('deadline') }}" required >
                </div>
              </div>
            </div> --}}

            {{-- <div class="form-group">
              <div class="row">
                <div class="col-md-6">
                  <label for="">教育レベル</label>
                  <select name="education_level" class="form-control" value="{{old('education_level')}}">
                    <option value="Bachelors">学士</option>
                    <option value="High School">高校</option>
                    <option value="Master">マスター</option>
                    <option value="SEE Mid School">中学校を見る</option>
                    <option value="Other">他の</option>
                  </select>
                </div>
                <div class="col-md-6">
                  <label for="">経験</label>
                  <select name="experience" class="form-control" value="{{old('experience')}}">
                    <option value="Internship">1年未満</option>
                    <option value="1 year">1年</option>
                    <option value="2 years">2年</option>
                    <option value="2 years">3年</option>
                    <option value="More than 5+ year">5年以上</option>
                  </select>
                </div>
              </div>
            </div> --}}

            {{-- <div class="form-group">
              <label for="">プロフェッショナルスキル <span class="text-info">( 複数の場合は「,」で区切ります。)</span></label>
              <input type="text" placeholder="スキル1、スキル2など" class="form-control @error('skills') is-invalid @enderror" name="skills" value="{{ old('skills') }}" required >
            </div> --}}

            <div class="form-group">
              <label for="">面接試験情報等<small>オプションのフィールド</small></label>
              <input type="hidden" id="specifications" name="specifications" value="{{old('specifications')}}">
              <div id="quillEditor" style="height:200px"></div>
            </div>

            <button type="button" id="postBtn" class="btn primary-btn">投稿を作成</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endSection

@push('css')
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
@endpush

@push('js')
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
<script>
  $(document).ready(function(){
    var quill = new Quill('#quillEditor', {
    modules: {
      toolbar: [
          [{ 'font': [] }, { 'size': [] }],
          ['bold', 'italic'],
          [{ list: 'ordered' }, { list: 'bullet' }],
          ['link', 'blockquote', 'code-block', 'image'],
        ]
      },
    placeholder: '職務要件、職務仕様など ...',
    theme: 'snow'
    });
    

    const postBtn = document.querySelector('#postBtn');
    const postForm = document.querySelector('#postForm');
    const specifications = document.querySelector('#specifications');
    
    if(specifications.value){
      quill.root.innerHTML = specifications.value;
    }

    postBtn.addEventListener('click',function(e){
      e.preventDefault();
      specifications.value = quill.root.innerHTML
      
      postForm.submit();
    })
  })
</script>
@endpush