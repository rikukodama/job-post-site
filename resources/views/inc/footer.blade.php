<footer>
  <div class="footer-main">
    <div class="container">
      <div class="row">
        {{-- <div class="col-sm-6 col-md-3">
          <div class="footer-links">
            <h5 class="lead footer-hdr">求職者向け</h5>
            <div class="line-divider"></div>
            <div class="footer-link-list">
             <a href="{{route('register')}}" class="footer-links">登録する <span class="badge badge-primary">無料</span></a>
             <a href="{{route('login')}}" class="footer-links">ログイン</a>
             <a href="" class="footer-links">仕事を探す</a>
             <a href="#" class="footer-links">よくある質問</a>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-3">
          <div class="footer-links">
            <h5 class="lead footer-hdr">雇用主向け</h5>
            <div class="line-divider"></div>
            <div class="footer-link-list">
             <a href="{{route('register')}}" class="footer-links">登録する <span class="badge badge-primary">無料</span></a>
             <a href="{{route('login')}}" class="footer-links">ログイン</a>
             <a href="{{route('post.create')}}" class="footer-links">空き状況の告知</a>
             <a href="#" class="footer-links">よくある質問</a>
            </div>
          </div>
        </div> --}}
        {{-- <div class="col-sm-6 col-md-3">
          <div class="footer-links">
            <h5 class="lead footer-hdr">リンク</h5>
            <div class="line-divider"></div>
            <div class="footer-link-list">
             <a href="#" class="footer-links">家</a> 
             <a href="#" class="footer-links">私たちについて</a>
             <a href="#" class="footer-links">宣伝する</a>
             <a href="#" class="footer-links">お問い合わせ</a>
             <a href="#" class="footer-links">よくある質問</a>
            </div>
          </div>
        </div> --}}
        <div class="col-sm-6 col-md-3">
          <div class="footer-links">
           
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>

@push('css')
<style>
  .footer-main{
    background-color:#272727;
    color:#ddd;
  }
  .footer-links{
    padding-top:2rem;
    padding-bottom: 2rem;
  }
  .footer-links .footer-hdr{
    color:#ddd;
  }
  .footer-links .footer-link-list .footer-links{
    display:block;
    color:#ccc;
    padding:3px 0; 
    margin:0;
    font-size:.9rem;
  }
  .footer-links .footer-link-list .footer-links:hover{
    color:white;
  }
  .footer-main .social-links {
    margin:20px 0;
  }
  .footer-main .social-links .social-link{
    background-color:white; 
    color:#333;
    padding:8px 10px;
    border-radius: 50%;
    transition:all .3s ease;
  }
  .footer-main .social-links .social-link:hover{
    color:white;
    background-color:#0261A6;
  }
</style>
@endpush