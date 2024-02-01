@extends('layouts.post')

@section('content')
<section class="show-page pt-4 mb-5">
  <div class="container">
    <div class="row">
      <div class="col-sm-12 col-md-8">
        <div class="job-listing border">
          <div class="company-info">
            <div class="company-banner">
              <div class="banner-overlay"></div>
              @if($company->cover_img == 'nocover')
              <img src="{{asset('images/companies/nocover.jpg')}}" class="company-banner-img img-fluid" alt="">
              @else
              <img src="{{asset($company->cover_img)}}" class="company-banner-img img-fluid" alt="">
              @endif
              <div class="company-media">
                <img src="{{asset($company->logo)}}" alt="" class="company-logo">
                <div>
                  <a href="{{route('account.employer',['employer'=>$company])}}" class="secondary-link">
                    <p class="font-weight-bold">{{$company->title}}</p>
                    <p class="company-category">{{$company->getCategory->category_name}}</p>
                  </a>
                </div> 
              </div>
              <div class="company-website">
                <a href="{{$company->website}}" target="_blank"><i class="fas fa-globe"></i></a>
              </div>
            </div>

            {{-- company information --}}
            <div class="p-3">
              <p>{{$company->description}}</p>
            </div>
          </div>

          {{-- job information --}}
          <div class="job-info">
            <div class="job-hdr p-3">
              <p class="job-title">{{$post->job_title}}</p>
              <div class="">
                <p class="job-views">
                  <span class="text-success">眺望: {{$post->views}} </span> 
                  {{-- <span class="text-danger">前に申請してください: {{date('d',$post->remainingDays())}} 日後</span> --}}
                </p>
              </div>
            </div>
            <div class="job-bdy p-3 my-3">
              <div class="job-level-description">
                <p class="font-weight-bold">面接試験情報</p>
                <table class="table table-hover">
                  <tbody>
                    <tr>
                      <td width="33%">職種</td>
                      <td width="3%">:</td>
                      <td width="64%"><a href="/jobs">{{$company->getCategory->category_name}}</a></td>
                    </tr>
                    {{-- <tr>
                      <td width="33%">職務レベル</td>
                      <td width="3%">:</td>
                      <td width="64%">{{$post->job_level}}</td>
                    </tr> --}}
                    {{-- <tr>
                      <td width="33%">欠員数</td>
                      <td width="3%">:</td>
                      <td width="64%">[ <strong>{{$post->vacancy_count}}</strong> ]</td>
                    </tr> --}}
                    {{-- <tr>
                      <td width="33%">雇用形態</td>
                      <td width="3%">:</td>
                      <td width="64%">{{$post->employment_type}}</td>
                    </tr> --}}
                    {{-- <tr>
                      <td width="33%">提示給与(月給)</td>
                      <td width="3%">:</td>
                      <td width="64%">{{$post->salary}}</td>
                    </tr> --}}
                    <tr>
                      {{-- <td width="33%">事前にお申込みください（締切日）</td> --}}
                      {{-- <td width="3%">:</td> --}}
                      {{-- <td width="64%" class="text-danger">{{date('l, jS \of F Y',$post->deadlineTimestamp())}}, ( 今から{{ date('d',$post->remainingDays())}}日後)</td> --}}
                    </tr>
                  </tbody>
                </table>
              </div>
              {{-- <div class="job-level-description"> --}}
                {{-- <p class="font-weight-bold">ジョブの仕様</p> --}}
                {{-- <table class="table table-hover">
                  <tbody>
                    <tr>
                      <td width="33%">教育レベル</td>
                      <td width="3%">:</td>
                      <td width="64%"><a href="/jobs"> {{$post->education_level}}</a></td>
                    </tr>
                    <tr>
                      <td width="33%">必要な経験</td>
                      <td width="3%">:</td>
                      <td width="64%">{{$post->experience}}</td>
                    </tr>
                    <tr>
                      <td width="33%">専門的なスキルが必要</td>
                      <td width="3%">:</td>
                      <td width="64%">
                        <span class="badge badge-primary">{{$skill}}</span>
                        @endforeach
                      </td>
                    </tr>
                  </tbody>@foreach($post->getSkills() as $skill)
                        
                </table> --}}
              {{-- </div> --}}
              <div class="job-level-description mb-4">
                {{-- <p class="font-weight-bold">More Specifications</p> --}}
                <p class="pb-2">{!!$post->specifications!!}</p>
              </div>
              <hr>
              <h6 class="ml-2">回答</h6>
              <hr>
              @foreach($applications as $application)
                  @if ($application)
                  <div class="application">
                    {{-- <p class="font-weight-bold">More Specifications</p> --}}
                    
                    <p>{!!$application->content!!}</p>
                    <div>
                      <p>{!!$application->user->name!!}</p>
                      <p>{!!$application->created_at!!}</p>
                    </div>
                  </div>
                  @endif
                  <br>
                  <hr>
              @endforeach
              
              <div class="d-flex justify-content-between">
                  <form id="postForm" class="form-group" method="POST" style="width:100%" action="/account/apply-job/{{$post->id}}">
                    <input type='hidden' id="specifications" name="specifications">
                    <div id="quillEditor" style="height:100px;"></div>
                    <br>
                    @csrf
                    <button id="postBtn" class="btn primary-btn ">送信</button>
                    {{-- <a href="{{route('savedJob.store',['id'=>$post])}}" class="btn primary-outline-btn"><i class="fas fa-star"></i> ジョブの保存</a> --}}
                  </form>
                {{-- <div class="social-links">
                  <a href="https://www.facebook.com"  target="_blank" class="btn btn-primary"><i class="fab fa-facebook"></i></a>
                  <a href="https://www.twitter.com" target="_blank"  class="btn btn-primary"><i class="fab fa-twitter"></i></a>
                  <a href="https://www.linkedin.com"  target="_blank" class="btn btn-primary"><i class="fab fa-linkedin"></i></a>
                  <a href="https://www.gmail.com" target="_blank"  class="btn btn-primary"><i class="fas fa-envelope"></i></a>
                </div> --}}
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-12 col-md-4">
        <div class="card d-none d-md-block mb-3">
          {{-- <div class="card-header">
            ジョブアクション
          </div> --}}
          {{-- <div class="card-body"> --}}
            {{-- <div class="btn-group w-100"> --}}
              {{-- <a href="{{route('account.applyJob',['post_id'=>$post->id])}}" class="btn primary-outline-btn float-left">今すぐお申し込みください</a> --}}
              {{-- <a href="{{route('savedJob.store',['id'=>$post->id])}}" class="btn primary-btn"><i class="fas fa-star"></i> ジョブの保存</a> --}}
            {{-- </div> --}}
          {{-- </div> --}}
        </div>
        <div class="card ">
          <div class="card-header">
            同様の投稿
          </div>
          <div class="card-body">
            <div class="similar-jobs">
              @foreach ($similarJobs as $job)
              @if($similarJobs)
                <div class="job-item border-bottom row">
                  <div class="col-4">
                    <img src="{{asset($job->company->logo)}}" class="company-logo" alt="">
                  </div>
                  <div class="job-desc col-8">
                    <a href="/job/{{$job->id}}" class="job-category text-muted font-weight-bold">
                      <p class="text-muted h6">{{$job->job_title}}</p>
                      <p class="small">{{$job->company->title}}</p>
                      {{-- <p class="font-weight-normal small text-danger">締め切り: {{date('d',$job->remainingDays())}} 日々</p> --}}
                    </a>
                  </div>
                </div>
                @else
                <div class="card">
                  <div class="card-header">
                    <p>似たような求人はありません</p>
                  </div>
                </div>
                @endif
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection

@push('css')
<style>
  .company-banner {
    min-height: 20vh;
    position: relative;
    overflow: hidden;
  }

  .company-banner-img {
    width: 100%;
    height: auto;
    overflow: hidden;
  }

  .banner-overlay {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    background: linear-gradient(to bottom, transparent, rgba(0, 0, 0, .3));
    width: 100%;
    height: 200px;
  }

  .company-website {
    position: absolute;
    right: 20px;
    bottom: 20px;
    color: white;
  }

  .company-media {
    position: absolute;
    display: flex;
    align-items: center;
    left: 2rem;
    bottom: 1rem;
    color: #333;
    padding-right: 2rem;
    background-color:rgba(255,255,255,.8);
  }

  .company-logo {
    max-width: 100px;
    height: auto;
    margin-right: 1rem;
    padding: 1rem;
    background-color: white;
  }

  .company-category {
    font-size: 1.3rem;
  }

  .company-link:hover {
    color: #ddd;
  }

  .job-title {
    font-size: 1.3rem;
    font-weight: bold;
  }

  .job-hdr {
    display: flex;
    align-items: center;
    justify-content: space-between;
    background: linear-gradient(to right, #e1edf7, #EDF2F7)
  }

  .job-item{
    margin-bottom: .5rem;
    padding:.5rem 0;
  }
  .job-item:hover {
    background-color:#eee;
  } 

</style>
@endpush

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