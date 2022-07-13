@extends('layouts.frontend.app')
@section('content')
<!-- Start banner Area -->
<section class="generic-banner relative">
    <div class="container">
      <div class="row height align-items-center justify-content-center">
        <div class="col-lg-10">
          <div class="generic-banner-content">
            <h2 class="text-white text-center">The Category Page</h2>
            <p class="text-white">
              This page shows all the categories that available by the site
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>
<div class="container">
    <div class="row height align-items-center justify-content-center">
      <div class="col-lg-10">
        <div class="generic-banner-content">
          <h2 class="text-white text-center">The Category Page</h2>
          <p class="text-white">
            This page shows all the categories that available by the site
          </p>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- End banner Area -->

<!-- About Generic Start -->
<div class="main-wrapper">
  <!-- Start fashion Area -->
  <section class="fashion-area section-gap" id="fashion">
    <div class="container">
      <div class="row">
          @foreach ($post as $c)
        <div class="col-lg-3 col-md-6 single-fashion">
          <img class="img-fluid" style="" src="{{asset('upload/'.$c->image)}}" alt="" />
          <p class="date">{{$c->created_at->diffForHumans()}}</p>
          <h3><a href="{{ url('category/'.$c->slug) }}">  {{$c->name}}</p></h3>
          <p>{{$c->description}}</p>
          <div class="meta-bottom d-flex justify-content-between">
            <p><span class="lnr lnr-heart"></span> 15 Likes</p>
            <p><span class="lnr lnr-bubble"></span> 02 Comments</p>
          </div>
        </div>
   @endforeach
      </div>
    </div>
  </section>
  <!-- End fashion Area -->


@endsection
