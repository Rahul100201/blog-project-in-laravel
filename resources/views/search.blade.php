@extends('layouts.frontend.app')
@section('content')
<!-- Start top-section Area -->
<section class="top-section-area section-gap">
    <div class="container">
        <div class="row justify-content-center align-items-center d-flex">
            <div class="col-lg-8">
                <div id="imaginary_container">
                   <form action="{{route('search')}}" method="GET">
                    <div class="input-group stylish-input-group">
                        <input type="text" class="form-control"  placeholder="Addictionwhen gambling" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Addictionwhen gambling '" required="" name="search" value="{{$search ?? ""}}">
                        <span class="input-group-addon">
                            <button type="submit">
                                <span class="lnr lnr-magnifier"></span>
                            </button>
                        </span>
                    </div>
                   </form>
                </div>
                <p class="mt-20 text-center text-white">{{$posts->count() ?? "0"}} results found for “{{$search ?? ""}}”</p>
            </div>
        </div>
    </div>
</section>
<!-- End top-section Area -->
<!-- Start post Area -->
<div class="post-wrapper pt-100">
   <!-- Start post Area -->
   <section class="post-area">
      <div class="container">
         <div class="row justify-content-center d-flex">
            <div class="col-lg-8">
               <div class="top-posts pt-50">
                  <div class="container">
                     <div class="row justify-content-center">
                         @foreach ($posts as $p)
                          <div class="single-posts col-lg-6 col-sm-6">
                            <img class="img-fluid" src="{{asset('upload/post/'.$p->image)}}" alt="{{$p->image}}" />
                           <div class="date mt-20 mb-20">{{$p->created_at->diffForHumans()}}</div>
                           <div class="detail">
                              <a href="#">
                                 <h4 class="pb-20">{{ $p->title  }}</h4>
                              </a>
                              <p>
                              </p>
                              <p>{{ $p->body }}</p>
                              <p class="footer pt-20">
                                 <br>
                              </p>
                              <ul class="d-flex space-around">
                                 <li><a href="javascript:void(0);" onclick=" toastr.info('To add to your favorite list you have to login first.', 'Info', { closeButton: true, progressBar: true, })"><i class="fa fa-heart-o" aria-hidden="true"></i><span> 0</span></a></li>
                                 <li><i class="fa fa-comment-o" aria-hidden="true"></i><span> 0</span></li>
                                 <li><i class="fa fa-eye" aria-hidden="true"></i> <span>3</span></li>
                              </ul>
                              <p></p>
                           </div>
                        </div>
                         @endforeach

                        <div class="justify-content-center d-flex mt-5">
                           <ul class="pagination" role="navigation">
                              <li class="page-item disabled" aria-disabled="true" aria-label="« Previous">
                                 <span class="page-link" aria-hidden="true">‹</span>
                              </li>
                              <li class="page-item active" aria-current="page"><span class="page-link">1</span></li>
                              <li class="page-item"><a class="page-link" href="http://localhost:8000/posts?page=2">2</a></li>
                              <li class="page-item">
                                 <a class="page-link" href="http://localhost:8000/posts?page=2" rel="next" aria-label="Next »">›</a>
                              </li>
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-lg-4 sidebar-area">
               <div class="single_widget search_widget">
                  <div id="imaginary_container">
                     <div class="input-group stylish-input-group">
                        <input type="text" class="form-control"  placeholder="Search" >
                        <span class="input-group-addon">
                        <button type="submit">
                        <span class="lnr lnr-magnifier"></span>
                        </button>
                        </span>
                     </div>
                  </div>
               </div>
               <div class="single_widget about_widget">
                  <img src="img/asset/s-img.jpg" alt="">
                  <h2 class="text-uppercase">Adele Gonzalez</h2>
                  <p>
                     MCSE boot camps have its supporters and
                     its detractors. Some people do not understand why you should have to spend money
                  </p>
                  <div class="social-link">
                     <a href="#"><button class="btn"><i class="fa fa-facebook" aria-hidden="true"></i> Like</button></a>
                     <a href="#"><button class="btn"><i class="fa fa-twitter" aria-hidden="true"></i> follow</button></a>
                  </div>
               </div>
               <div class="single_widget cat_widget">
                  <h4 class="text-uppercase pb-20">post categories</h4>
                  <ul>
                     <li>
                        <a href="#">Technology <span>37</span></a>
                     </li>
                     <li>
                        <a href="#">Lifestyle <span>37</span></a>
                     </li>
                     <li>
                        <a href="#">Fashion <span>37</span></a>
                     </li>
                     <li>
                        <a href="#">Art <span>37</span></a>
                     </li>
                     <li>
                        <a href="#">Food <span>37</span></a>
                     </li>
                     <li>
                        <a href="#">Architecture <span>37</span></a>
                     </li>
                     <li>
                        <a href="#">Adventure <span>37</span></a>
                     </li>
                  </ul>
               </div>
               <div class="single_widget recent_widget">
                  <h4 class="text-uppercase pb-20">Recent Posts</h4>
                  <div class="active-recent-carusel">
                     <div class="item">
                        <img src="img/asset/slider.jpg" alt="">
                        <p class="mt-20 title text-uppercase">Home Audio Recording <br>
                           For Everyone
                        </p>
                        <p>02 Hours ago <span> <i class="fa fa-heart-o" aria-hidden="true"></i>
                           06 <i class="fa fa-comment-o" aria-hidden="true"></i>02</span>
                        </p>
                     </div>
                     <div class="item">
                        <img src="img/asset/slider.jpg" alt="">
                        <p class="mt-20 title text-uppercase">Home Audio Recording <br>
                           For Everyone
                        </p>
                        <p>02 Hours ago <span> <i class="fa fa-heart-o" aria-hidden="true"></i>
                           06 <i class="fa fa-comment-o" aria-hidden="true"></i>02</span>
                        </p>
                     </div>
                     <div class="item">
                        <img src="img/asset/slider.jpg" alt="">
                        <p class="mt-20 title text-uppercase">Home Audio Recording <br>
                           For Everyone
                        </p>
                        <p>02 Hours ago <span> <i class="fa fa-heart-o" aria-hidden="true"></i>
                           06 <i class="fa fa-comment-o" aria-hidden="true"></i>02</span>
                        </p>
                     </div>
                  </div>
               </div>
               <div class="single_widget cat_widget">
                  <h4 class="text-uppercase pb-20">post archive</h4>
                  <ul>
                     <li>
                        <a href="#">Dec'17 <span>37</span></a>
                     </li>
                     <li>
                        <a href="#">Nov'17 <span>37</span></a>
                     </li>
                     <li>
                        <a href="#">Oct'17 <span>37</span></a>
                     </li>
                     <li>
                        <a href="#">Sept'17 <span>37</span></a>
                     </li>
                     <li>
                        <a href="#">Aug'17 <span>37</span></a>
                     </li>
                     <li>
                        <a href="#">Jul'17 <span>37</span></a>
                     </li>
                     <li>
                        <a href="#">Jun'17 <span>37</span></a>
                     </li>
                  </ul>
               </div>
               <div class="single_widget tag_widget">
                  <h4 class="text-uppercase pb-20">Tag Clouds</h4>
                  <ul>
                     <li><a href="#">Lifestyle</a></li>
                     <li><a href="#">Art</a></li>
                     <li><a href="#">Adventure</a></li>
                     <li><a href="#">Food</a></li>
                     <li><a href="#">Technology</a></li>
                     <li><a href="#">Fashion</a></li>
                     <li><a href="#">Adventure</a></li>
                     <li><a href="#">Food</a></li>
                     <li><a href="#">Technology</a></li>
                  </ul>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!-- End post Area -->
</div>
<!-- End post Area -->
@endsection
