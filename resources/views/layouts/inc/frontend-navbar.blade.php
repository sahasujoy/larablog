<div class="global-navbar bg-white">
    <div class="container">
        <div class="row">
            <div class="col-md-3 d-none d-sm-none d-md-inline">
                <img src="{{ asset('assets/images/logo.png') }}" alt="Logo" class="w-100">
            </div>
            <div class="col-md-9 my-auto">
                <div class="border text-center p-2">
                    <h5 style="color: rebeccapurple">
                        Practice, Practice, Practice... <br>
                        Code, Code & Code...!!
                    </h5>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- class sticky-top is used for showing the navbar at the time of scrolling --}}
<div class="sticky-top">
    <nav class="navbar navbar-expand-lg navbar-dark bg-green">
        <div class="container">

            <a href="" class="navbar-brand d-inline d-sm-inline d-md-none">Navbar</a>

          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarScroll">
            <ul class="navbar-nav ms-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
              <li class="nav-item">
                <a class="nav-link" href="{{url('/')}}">Home</a>
              </li>

              {{-- if status is hidden then it cannot be visible in navbar. using model here it is executed --}}
              @php
                  $categories = App\Models\Category::where('navbar_status', '0')->where('status', '0')->get();
              @endphp
              @foreach ($categories as $cateitem )
                <li class="nav-item">
                    <a class="nav-link" href="{{url('tutorial/'.$cateitem->slug)}}">{{$cateitem->name}}</a>
                </li>
              @endforeach



              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-arrow-circle-down"></i>
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                  <li><a class="dropdown-item" href="#">Action</a></li>
                  <li><a class="dropdown-item" href="#">Another action</a></li>

                @if(Auth::check())
                <li><hr class="dropdown-divider"></li>
                <li>

                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                    <form action="{{ route('logout') }}" id="logout-form" method="POST" class="d-none">
                        @csrf
                    </form>

                </li>
                @endif

                </ul>
              </li>


            </ul>

          </div>
        </div>
      </nav>

</div>
