@extends('layouts.frontend.app')
@section('content')
    <!-- Start top-section Area -->
    <section class="top-section-area section-gap">
        <div class="container">
            <div class="row justify-content-between align-items-center d-flex">
                <div class="col-lg-8 top-left">
                    <h1 class="text-white mb-20">Post Details</h1>
                    <ul>
                        <li>
                            <a href="{{ url('/home') }}">Home</a><span class="lnr lnr-arrow-right"></span>
                        </li>
                        <li>
                            <a href="{{ url('/categories') }}">Category</a><span class="lnr lnr-arrow-right"></span>
                        </li>
                        <li><a href="url('')">Fashion</a></li>
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

                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="single-page-post">
                            <img class="img-fluid" src="{{ asset('upload/post/' . $post->image) }}" alt="" />
                            <div class="top-wrapper">
                                <div class="row d-flex justify-content-between">
                                    <h2 class="col-lg-8 col-md-12 text-uppercase">
                                        {{ $post->title }}
                                    </h2>

                                    <div class="col-lg-4 col-md-12 right-side d-flex justify-content-end">
                                        <div class="desc">
                                            <h2>Rahul soni</h2>
                                            <h3>12 Dec ,2017 11:21 am</h3>
                                        </div>
                                        <div class="user-img">
                                            <img src="img/user.jpg" alt="" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tags">
                                <ul>
                                    @foreach ($post->tags as $tag)
                                        <li><a href="#">{{ $tag->name }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="single-post-content">
                                <blockquote>
                                    {{ $post->body }} <cite>Rahul Soni</cite>
                                </blockquote>


                            </div>

                            <div class="bottom-wrapper">
                                <div class="row">
                                    <div class="col-lg-4 single-b-wrap col-md-12">
                                        <i class="fa fa-heart-o" aria-hidden="true"></i>
                                        lily and 4 people like this
                                    </div>
                                    <div class="col-lg-4 single-b-wrap col-md-12">
                                        <i class="fa fa-comment-o" aria-hidden="true"></i> 06
                                        comments
                                    </div>
                                    <div class="col-lg-4 single-b-wrap col-md-12">
                                        <ul class="social-icons">
                                            <li>
                                                <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="fa fa-behance" aria-hidden="true"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>



                            <!-- Start comment-sec Area -->
                            <!-- Start comment-sec Area -->
                            <section class="comment-sec-area pt-80 pb-80">
                                <div class="container">
                                    <div class="row flex-column">
                                        <h5 class="text-uppercase pb-80">05 Comments</h5>
                                        <br />
                                        <!-- Frist Comment -->
                                        @foreach ($post->comments as $c)
                                            <div class="comment">
                                                <div class="comment-list">
                                                    <div class="single-comment justify-content-between d-flex">
                                                        <div class="user justify-content-between d-flex">
                                                            <div class="thumb">
                                                                <img src="{{ url('upload/user/' . $c->user->image) }}"
                                                                    style="width: 50px" alt="" />
                                                            </div>
                                                            <div class="desc">
                                                                <h5><a href="#">{{ $c->user->name }}</a></h5>
                                                                <p class="date">
                                                                    {{ $c->created_at->format('D, d M Y H:i') }}</p>
                                                                <p class="comment">
                                                                    {{ $c->message }}
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div class="">
                                                            <button class="btn-reply text-uppercase" id="reply-btn"
                                                                onclick="showReplyForm('{{ $c->id }}','{{ $c->user->name }}')">reply
                                                                1</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                @if ($c->replies->count() > 0)
                                                    @foreach ($c->replies as $reply)
                                                        <div class="comment-list left-padding">
                                                            <div class="single-comment justify-content-between d-flex">
                                                                <div class="user justify-content-between d-flex">
                                                                    <div class="thumb">
                                                                        <img src="{{ url('upload/user/' . $reply->user->image) }}"
                                                                            alt="" style="width: 50px" />
                                                                    </div>
                                                                    <div class="desc">
                                                                        <h5><a href="#">{{ $reply->user->name }}</a></h5>
                                                                        <p class="date">
                                                                            {{ $reply->created_at->format('D, d M Y H:i') }}
                                                                        </p>
                                                                        <p class="comment">
                                                                            {{ $reply->message }}
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                <div class="">
                                                                    <button class="btn-reply text-uppercase" id="reply-btn"
                                                                        onclick="showReplyForm('{{ $c->id }}','{{ $c->user->name }}')">reply
                                                                        1</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                    {{-- @else --}}
                                                @endif
                                                <div class="comment-list left-padding" id="reply-form-{{ $c->id }}"
                                                    style="display: none">
                                                    <div class="single-comment justify-content-between d-flex">
                                                        <div class="user justify-content-between d-flex">
                                                            <div class="thumb">
                                                                <img src="img/asset/c2.jpg" alt="" />
                                                            </div>
                                                            <div class="desc">
                                                                <h5><a href="#">Goerge Stepphen</a></h5>
                                                                <p class="date">December 4, 2017 at 3:12 pm</p>
                                                                <div class="row flex-row d-flex">
                                                                    <form action="{{ url('comment_reply', $c->id) }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        <div class="col-lg-12">
                                                                            <textarea id="reply-form-{{ $c->id }}-text" cols="60" rows="2" class="form-control mb-10" name="message"
                                                                                placeholder="Messege"
                                                                                onfocus="this.placeholder = ''"
                                                                                onblur="this.placeholder = 'Messege'"
                                                                                required=""></textarea>
                                                                        </div>
                                                                        <button type="submit"
                                                                            class="btn-reply text-uppercase ml-3">Reply</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                        <!-- 2nd Comment -->
                                        {{-- <div class="comment">
                            <div class="comment-list">
                                <div class="single-comment justify-content-between d-flex">
                                    <div class="user justify-content-between d-flex">
                                        <div class="thumb">
                                            <img src="img/asset/c1.jpg" alt="" />
                                        </div>
                                        <div class="desc">
                                            <h5><a href="#">Emilly Blunt</a></h5>
                                            <p class="date">December 4, 2017 at 3:12 pm</p>
                                            <p class="comment">
                                                Never say goodbye till the end comes!
                                            </p>
                                        </div>
                                    </div>
                                    <div class="">
                                        <button class="btn-reply text-uppercase" id="reply-btn" onclick="showReplyForm('2','Emilly Blunt')">reply 2</button>
                                    </div>
                                </div>
                            </div>
                            <div class="comment-list left-padding">
                                <div class="single-comment justify-content-between d-flex">
                                    <div class="user justify-content-between d-flex">
                                        <div class="thumb">
                                            <img src="img/asset/c3.jpg" alt="" />
                                        </div>
                                        <div class="desc">
                                            <h5><a href="#">Sally Sally</a></h5>
                                            <p class="date">December 4, 2017 at 3:12 pm</p>
                                            <p class="comment">
                                                @Emilly Blunt Never say goodbye till the end comes!
                                            </p>
                                        </div>
                                    </div>
                                    <div class="">
                                        <button class="btn-reply text-uppercase" id="reply-btn" onclick="showReplyForm('2','Sally Sally')">reply 2</button>
                                    </div>
                                </div>
                            </div>
                            <div class="comment-list left-padding" id="reply-form-2" style="display: none">
                                <div class="single-comment justify-content-between d-flex">
                                    <div class="user justify-content-between d-flex">
                                        <div class="thumb">
                                            <img src="img/asset/c2.jpg" alt="" />
                                        </div>
                                        <div class="desc">
                                            <h5><a href="#">Goerge Stepphen</a></h5>
                                            <p class="date">December 4, 2017 at 3:12 pm</p>
                                            <div class="row flex-row d-flex">
                                                <form action="#" method="POST">
                                                    <div class="col-lg-12">
                                                        <textarea id="reply-form-2-text" cols="60" rows="2" class="form-control mb-10" name="message" placeholder="Messege" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Messege'" required=""></textarea>
                                                    </div>
                                                    <button type="submit" class="btn-reply text-uppercase ml-3">Reply</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                                    </div>
                                </div>
                            </section>

                            <!-- End comment-sec Area -->
                            <!-- Start commentform Area -->
                            <section class="commentform-area pb-120 pt-80 mb-100">
                                @guest
                                    <div class="container">
                                        <h4>Please Sign in to post comments - <a href="{{ route('login') }}">Sing in</a> or <a
                                                href="{{ route('register') }}">Register</a></h4>

                                    </div>
                                @else
                                    <div class="container">
                                        <h5 class="text-uppercas pb-50">Leave a Reply</h5>
                                        <div class="row flex-row d-flex">
                                            <div class="col-lg-12">
                                                <form action="{{ url('comment', $post->id) }}" method="post">
                                                    @csrf
                                                    <textarea class="form-control mb-10" name="message" placeholder="Messege" onfocus="this.placeholder = ''"
                                                        onblur="this.placeholder = 'Messege'" required=""></textarea>
                                                    <button class="primary-btn mt-20" type="submit">Comment</button>
                                                </form>
                                            </div>
                                        </div>
                                    @endguest
                                </div>
                            </section>
                            <!-- End commentform Area -->
                        </div>

                    </div>
                    <div class="col-lg-4 sidebar-area">
                        <div class="single_widget search_widget">
                            <div id="imaginary_container">
                                <div class="input-group stylish-input-group">
                                    <input type="text" class="form-control" placeholder="Search" />
                                    <span class="input-group-addon">
                                        <button type="submit">
                                            <span class="lnr lnr-magnifier"></span>
                                        </button>
                                    </span>
                                </div>

                            </div>
                        </div>
                        <div class="single_widget cat_widget">
                            <h4 class="text-uppercase pb-20">post categories</h4>
                            <ul>
                                @foreach ($cat as $p)
                                    <li>
                                        <a href="#">{{ $p->name }}<span></span></a>
                                    </li>
                                @endforeach

                            </ul>
                        </div>

                        <div class="single_widget recent_widget">
                            <h4 class="text-uppercase pb-20">Recent Posts</h4>
                            <div class="active-recent-carusel">
                                @foreach ($l_posts as $l)
                                    <div class="item">
                                        <img src="{{ asset('upload/post/' . $l->image) }}" alt="" />
                                        <p class="mt-20 title text-uppercase">
                                            {{ $l->title }}
                                        </p>
                                        <p>
                                        <div class="date mt-20 mb-20">{{ $l->created_at->diffForHumans() }}</div>
                                        <span>
                                            <i class="fa fa-heart-o" aria-hidden="true"></i> 06
                                            <i class="fa fa-comment-o" aria-hidden="true"></i>02</span>
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
@endsection
