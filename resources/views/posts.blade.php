@extends('layouts.frontend.app')
@section('content')

<!-- Start top-section Area -->
<section class="top-section-area section-gap">
    <div class="container">
      <div class="row justify-content-between align-items-center d-flex">
        <div class="col-lg-8 top-left">
          <h1 class="text-white mb-20">All Post</h1>
          <ul>
            <li>
              <a href="{{url('/index')}}">Home</a
              ><span class="lnr lnr-arrow-right"></span>
            </li>
            <li>
              <a href="{{url('/categories')}}">Category</a
              ><span class="lnr lnr-arrow-right"></span>
            </li>
            <li><a href="{{ url('/singlepost')}}">Posts</a></li>
          </ul>
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
                        <img class="img-fluid" src="{{asset(('upload/post/'.$p->image))}}" alt="" />
                        <div class="date mt-20 mb-20">{{$p->created_at->diffForHumans()}}</div>
                        <div class="detail">
                          <a href="{{ url('post/'.$p->slug) }}"
                            ><h4 class="pb-20">
                              {{ $p->title }}
                            </h4></a>
                          <p>
                            {{$p->body}}
                          </p>
                          <p class="footer pt-20">
                            <i class="fa fa-heart-o" aria-hidden="true"></i>
                            <a href="#">06 Likes</a>
                            <i
                              class="ml-20 fa fa-comment-o"
                              aria-hidden="true"
                            ></i>
                            <a href="#">02 Comments</a>
                          </p>
                        </div>
                      </div>
                    @endforeach
                  <div class="justify-content-center mt-5 d-flex">
                    {{ $posts->links()}}
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 sidebar-area">
            <div class="single_widget search_widget">
              <div id="imaginary_container">
                <div class="input-group stylish-input-group">
                    <form action="{{route('search')}}" method="GET">
                        <div class="input-group stylish-input-group">
                            <input type="text" class="form-control" placeholder="Search" name="search" />
                            <span class="input-group-addon">
                                <button type="submit">
                                    <span class="lnr lnr-magnifier"></span>
                                </button>
                            </span>
                        </div>
                    </form>
                  </div>
            <div class="single_widget cat_widget">
              <h4 class="text-uppercase pb-20">post categories</h4>
              <ul>
                  @foreach ($cat as $p)
                <li>
                  <a href="{{ url('category/'.$p->slug) }}">{{$p->name}}<span>{{ $p->count()}}</span></a>
                </li>
                @endforeach

              </ul>
            </div>

            <div class="single_widget recent_widget">
              <h4 class="text-uppercase pb-20">Recent Posts</h4>
              <div class="active-recent-carusel">
               @foreach ($l_posts as $l)
               <div class="item">
                <img src="{{asset(('upload/post/'.$l->image))}}" alt="" />
                <p class="mt-20 title text-uppercase">
                 {{$l->title}}
                </p>
                <p>
                    <div class="date mt-20 mb-20">{{$l->created_at->diffForHumans()}}</div>
                  <span>
                    <i class="fa fa-heart-o" aria-hidden="true"></i> 06
                    <i class="fa fa-comment-o" aria-hidden="true"></i
                    >02</span
                  >
                </p>
              </div>
            @endforeach
           </div>
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
    </section>
    <!-- End post Area -->
  </div>
  <!-- End post Area -->

@endsection
