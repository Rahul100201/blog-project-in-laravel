@extends('layouts.frontend.app')
@section('content')
<!-- start banner Area -->
<section class="banner-area relative"  id="home" data-parallax="scroll" data-image-src="{{ asset('frontend/img/header-bg.jpg') }}">
   <div class="overlay-bg overlay"></div>
   <div class="container">
      <div class="row fullscreen">
         <div class="banner-content d-flex align-items-center col-lg-12 col-md-12">
            <h1 style="color: #e98282;    font-size: 112px;  "> Post Your Blog Here</h1>
         </div>
         <div class="head-bottom-meta d-flex justify-content-between align-items-end col-lg-12">
            <div class="col-lg-6 flex-row d-flex meta-right no-padding justify-content-end">
            </div>
         </div>
      </div>
   </div>
</section>
<!-- End banner Area -->
<!-- Start category Area -->
<section class="category-area section-gap" id="news">
   <div class="container">
      <div class="row d-flex justify-content-center">
         <div class="menu-content pb-70 col-lg-8">
            <div class="title text-center">
               <h1 class="mb-10">Latest Posts from all categories</h1>
               <p>Find the Latest Post from all category.</p>
            </div>
         </div>
      </div>
      <div class="active-cat-carusel">
         @foreach ($posts as $p)
         <div class="item single-cat">
            <img  style="width: 50%; height: auto;" src="{{ asset('upload/post/'.$p->image) }}" alt="" />
            <p class="date">{{ $p->created_at->diffForHumans() }}</p>
            <h4><a href="{{ url('post/'.$p->slug) }}">{{ $p->title }}</a></h4>
         </div>
         @endforeach
      </div>
   </div>
</section>
<!-- End category Area -->
<section class="travel-area section-gap" id="travel">
   <div class="container">
      <div class="row d-flex justify-content-center">
         <div class="menu-content pb-70 col-lg-8">
            <div class="title text-center">
               <h1 class="mb-10">Hot topics of this Week</h1>
               <p>The posts which are most views in this week.</p>
            </div>
         </div>
      </div>
      <div class="container">
         <div class="row justify-content-center">
            @foreach ($posts as $p)
            <div class="single-posts col-lg-4 col-sm-4 mb-3">
               <img class="img-fluid"  width: 100%; height: auto; src="{{asset('upload/post/'.$p->image)}}" alt="">
               <div class="date mt-20 mb-20">{{ $p->created_at->diffForHumans() }}</div>
               <div class="detail">
                  <a href="{{ url('post/'.$p->slug) }}">
                     <h4 class="pb-20">{{ $p->title }}</h4>
                  </a>
                  <p>
                      {{ $p->body }}
                  </p>
                  <h2 style="box-sizing: inherit; margin-bottom: 0px; line-height: 36px;"><span style="box-sizing: inherit;"><span style="box-sizing: inherit;"><b><br></b></span></span></h2>
                  <p class="MsoNormal" style="box-sizing: inherit...
                     </p>
                     <p class=" footer"="">
                     <br>
                  </p>
                  <ul class="d-flex space-around">
                     <li><a href="javascript:void(0);" onclick=" toastr.info('To add to your favorite list you have to login first.', 'Info', { closeButton: true, progressBar: true, })"><i class="fa fa-heart-o" aria-hidden="true"></i><span> 0</span></a></li>
                     <li><i class="fa fa-comment-o" aria-hidden="true"></i><span> 0</span></li>
                     <li><i class="fa fa-eye" aria-hidden="true"></i> <span>5</span></li>
                  </ul>
                  <p></p>
               </div>
            </div>
            @endforeach
            </div>
         </div>
      </div>
   </div>
</section>
<!-- Start team Area -->
<section class="team-area section-gap" id="about">
   <div class="container">
      <div class="row d-flex justify-content-center">
         <div class="menu-content pb-70 col-lg-8">
            <div class="title text-center">
               <h1 class="mb-10">About This Site</h1>
               <p>This is personal blogging site related to Internet of Things &amp; Web Development Tutorials</p>
            </div>
         </div>
      </div>
      <div class="row justify-content-center d-flex align-items-center">
         <div class="col-lg-6 team-left">
            <p>
               Find a blogs and tutorials related to Internet of things, Web Designe, Web Development.
            </p>
            <p>
               This site is made with laravel framework. The theme is <a href="">Blogger Theme</a> and the Admin Panel theme is <a href="https://github.com/puikinsh/sufee-admin-dashboard">Sufee Admin</a>.
            </p>

            <h4>About the Creator</h4>
            <br>
            <p>I am <span class="c1">Full stack Web Developer</span> specialized <span class="c1"> PHP </span> and <span class="c1"> LARAVEL </span>.</p>
            <br>
            <h4>Email: <span style="font-size: medium; font-weight: lighter;">ranshsoni1234@gmail.com</span></h4>
            <br>
            <div class="col-md-12 d-flex justify-content-center py-3 mt-2">
               <a href="#" class="genric-btn info circle arrow mr-md-auto" target="_blank">Know More<span class="lnr lnr-arrow-right"></span></a>
            </div>
         </div>
         <div class="col-lg-6 team-right d-flex justify-content-center">
            <div class="row">
               <div class="single-team">
                  <div class="thumb">
                     <img class="img-fluid w-75 mx-auto" src="{{asset('frontend/img/admin.jpg')  }}" alt="admin">
                     <div class="align-items-center justify-content-center d-flex">
                        <a href="#"><i class="fab fa-facebook-f" aria-hidden="true"></i></a>
                        <a href="#"><i class="fab fa-youtube" aria-hidden="true"></i></a>
                     </div>
                  </div>
                  <div class="meta-text mt-30 text-center">
                     <h4>Rahul Soni</h4>
                     <p>Creator</p>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- End team Area -->
@endsection
