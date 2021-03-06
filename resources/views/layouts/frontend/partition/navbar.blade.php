<header class="default-header">
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container px-3">
          <a class="navbar-brand" href="index.html">
            <img src="{{ asset('frontend/img/logo.png') }}" alt="" style="width: 40%;">
          </a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="lnr lnr-menu"></span>
              </button>

              <div class="collapse navbar-collapse justify-content-end align-items-center" id="navbarSupportedContent" >
                <ul class="navbar-nav scrollable-menu">
                    <li><a href="/">Home</a></li>
                    <li><a href="{{url('/posts')}}">Posts</a></li>
                    <li><a href="{{url('/categories')}}">Categories</a></li>
                    <li><a href="{{url('/about')}}">About</a></li>
                    @if (Route::has('login'))
                    @auth

                    <!-- ll
                        <li class="dropdown">
                            <a class="dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                                <i class="fa fa-user-circle" aria-hidden="true"></i>&nbsp;

                            </a>
                            <div class="dropdown-menu menu1">
                                <a href="/admin/dashboard/profile" class="dropdown-item" target="_blank">Admin Subhadip</a>
                              <a class="dropdown-item" href="/admin/dashboard"><i class="fa fa-tv" aria-hidden="true"></i>&nbsp; Dashboard</a>
                              <a class="dropdown-item" href="/admin/dashboard"><i class="fa fa-heart" aria-hidden="true"></i>&nbsp; Favorite List</a>

                              <a class="dropdown-item" href="/logout" onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                <i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp; Logout
                           </a>

                           <form id="logout-form" action="/logout" method="POST" style="display: none;">
                               <input type="hidden" name="_token" value="ePJORhim7paUxLLNT4uhKMeJSbwU4kZwpnHVl7Ph">                                       </form>

                            </div>
                        </li> -->
                    <!-- Dropdown -->
                    <li class="dropdown">
                      <a href="#"  onclick="dropMenu()">
                          <i class="fa fa-user-circle" aria-hidden="true"></i>&nbsp;
                          <!-- <i class="fas fa-user"></i> -->
                      </a>
                      <div id="dropMenu" class="dropdown-menu menu1" style="display: none;">
                        @if (Auth::User()->role->id==1)
                        <a href="{{ url('Admin/Profile') }}" class="dropdown-item" target="_blank">{{ Auth::User()->name }}</a>
                        <a class="dropdown-item" href="{{ url('Admin/Dashboard') }}"><i class="fa fa-tv" aria-hidden="true"></i>&nbsp; Dashboard</a>
                        @elseif (Auth::User()->role->id==2)
                        <a href="{{ url('users/profile') }}" class="dropdown-item" target="_blank">{{ Auth::User()->name }}</a>
                        <a class="dropdown-item" href="{{ url('user/dashboard') }}"><i class="fa fa-tv" aria-hidden="true"></i>&nbsp; Dashboard</a>
                        @else
                        null
                        @endif
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">
                          <i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp; Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                        </form>
                         <input type="hidden" name="_token" value="ePJORhim7paUxLLNT4uhKMeJSbwU4kZwpnHVl7Ph">

                      </div>
                  </li>
                  @else
                  <li><a href="{{ route('login') }}">Login</a></li>
                    @if (Route::has('register'))
                    <li><a href="{{ route('register') }}">Register</a></li>
                    @endif
                  @endauth
                  @endif
                  <script>
                      function dropMenu(){
                      var dropmenu = document.getElementById('dropMenu');
                          if (dropmenu.style.display === "none") {
                              dropmenu.style.display = "block";
                          } else {
                              dropmenu.style.display = "none";
                          }
                          }
                  </script>
                </ul>
              </div>
        </div>
    </nav>
</header>
