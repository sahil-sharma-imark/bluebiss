@php
$get_header_data = DB::table('bluebis_admin_setting')->where('id',1)->first();
@endphp
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>BlueBis</title>
  <meta name="viewport"
    content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="csrf_token" content="{{ csrf_token() }}" />
  <!-- Favicon -->
  <link rel="shortcut icon" href="{{asset('uploads/admin/setting/'.$get_header_data->favicon_img)}}" sizes="32x32" type="image/x-icon">

  <!-- CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
  <link rel="stylesheet" href="{{asset('css/custom.css')}}">
  <link rel="stylesheet" href="{{asset('css/main.css')}}">
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

  

  <style>
    .slide {
      display: inline-block;
      opacity: 0.2;
      }
    .slide.active {
      opacity: 1;
     }

    .error {
      display: block;
      color: #cc0000;;
    }
    .s{display: none!important;}
    .t{display: block!important;}


    .step {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbbbbb;
  border: none;  
  border-radius: 50%;
  display: inline-block;
  opacity: 0.5;
}

.step.active {
  opacity: 1;
}

#my-form>:nth-child(n+2),
.hideError {
  display: none;
}

.showError {
  display: block;
  color: #DC3C14;
}


/* Mark the steps that are finished and valid: */
.step.finish {
  background-color: #04AA6D;
}
label.error.fail-alert {
color: red;
}
  </style>

</head>

<body>
  <header id="header">
    <div class="container">
      <div class="header-row">
        <div class="header-left">
          <div class="logo">
            <a href="{{url('/')}}"><img src="{{asset('uploads/admin/setting/'.$get_header_data->logo_img)}}" alt="Logo"></a>
          </div>

          <div class="search-input">
             <form>
              <input type="search" class="form-control" id="sea" placeholder="Search Service provider & service you need">
              <div id="header_sug"></div>
              {{ csrf_field() }}
            </form>
          </div>
        </div>

        @if(Route::has('login'))
        @auth

        @if(Auth::user()->user_type == 1)
        <div class="header-right">
          <nav class="navbar navbar-expand-lg">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
              aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link" href="{{url('dashboard')}}">Dashboard</a>
                </li>
              </ul>
            </div>

          </nav>

          <div class="bell-icon">
            <a href="#">
              <svg width="26.043" height="21" viewBox="0 0 26.043 21">
                <g id="Icon_feather-bell" data-name="Icon feather-bell" transform="translate(-3.75 -2.75)">
                  <path id="Path_2775" data-name="Path 2775"
                    d="M19.5,8.5a5.768,5.768,0,0,0-6-5.5,5.768,5.768,0,0,0-6,5.5c0,6.419-3,8.253-3,8.253h18s-3-1.834-3-8.253"
                    transform="translate(0 0.5)" fill="none" stroke="#20272b" stroke-linecap="round"
                    stroke-linejoin="round" stroke-width="1.5" />
                  <path id="Path_2776" data-name="Path 2776" d="M19.73,31.5a2.5,2.5,0,0,1-4.325,0"
                    transform="translate(-4.066 -9.746)" fill="none" stroke="#20272b" stroke-linecap="round"
                    stroke-linejoin="round" stroke-width="1.5" />
                  <circle id="Ellipse_582" data-name="Ellipse 582" cx="3" cy="3" r="3" transform="translate(23.793 4)"
                    fill="#ff3457" />
                </g>
              </svg>

            </a>
          </div>

          <div class="user-profile">
            <div class="dropdown">
              <form method="POST" action="{{ route('logout') }}">
              @csrf
              <button class="dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown"
                aria-expanded="false">
                <figure>
                  <img src="images/user-profile.png" alt="">
                </figure>

                {{Auth::user()->name}}
              </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item" href="#">My Profile</a></li>
                <li><!-- <a class="dropdown-item" href="#">Logout</a> -->
                  <x-dropdown-link :href="route('logout')" class="dropdown-item" onclick="event.preventDefault(); this.closest('form').submit();" onclick="event.preventDefault();
                        this.closest('form').submit();">
                        Logout
                  </x-dropdown-link>
                </li>
              </ul>
              </form>
            </div>
          </div>
          
        </div>

        <!-- For Provider section Start -->

        @elseif(Auth::user()->user_type == 3)
        @php
        $credit = DB::table('total_credit')->where('provider_id',Auth::user()->id)->first();
        @endphp
        <div class="header-right">
          <nav class="navbar navbar-expand-lg">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
              aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link" >Total Credit - {{$credit->total_credit}}</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{url('provider-account')}}">Customer Requests</a>
                </li>
              </ul>
            </div>

          </nav>

          <div class="bell-icon">
            <a href="#">
              <svg width="26.043" height="21" viewBox="0 0 26.043 21">
                <g id="Icon_feather-bell" data-name="Icon feather-bell" transform="translate(-3.75 -2.75)">
                  <path id="Path_2775" data-name="Path 2775"
                    d="M19.5,8.5a5.768,5.768,0,0,0-6-5.5,5.768,5.768,0,0,0-6,5.5c0,6.419-3,8.253-3,8.253h18s-3-1.834-3-8.253"
                    transform="translate(0 0.5)" fill="none" stroke="#20272b" stroke-linecap="round"
                    stroke-linejoin="round" stroke-width="1.5" />
                  <path id="Path_2776" data-name="Path 2776" d="M19.73,31.5a2.5,2.5,0,0,1-4.325,0"
                    transform="translate(-4.066 -9.746)" fill="none" stroke="#20272b" stroke-linecap="round"
                    stroke-linejoin="round" stroke-width="1.5" />
                  <circle id="Ellipse_582" data-name="Ellipse 582" cx="3" cy="3" r="3" transform="translate(23.793 4)"
                    fill="#ff3457" />
                </g>
              </svg>

            </a>
          </div>

          <div class="user-profile">
            <div class="dropdown">
              <form method="POST" action="{{ route('logout') }}">
              @csrf
              <button class="dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown"
                aria-expanded="false">
                <figure>
                  <img src="{{asset('uploads/provider/'.Auth::user()->id.'/business_profile/'.Auth::user()->image)}}" alt="">
                </figure>
                {{Auth::user()->name}}
              </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item" href="{{url('/provider-profile/'.Auth::user()->id)}}">My Profile</a></li>
                <li><a class="dropdown-item" href="{{url('/provider-edit-profile/'.Auth::user()->id)}}">Dashboard</a></li>
                <li>
                  <x-dropdown-link :href="route('logout')" class="dropdown-item" onclick="event.preventDefault(); this.closest('form').submit();" onclick="event.preventDefault();
                        this.closest('form').submit();">
                        Logout
                  </x-dropdown-link>
                </li>
              </ul>
            </form>
            </div>
          </div>
          
        </div>
        <!-- For Provider section End -->

        <!-- For User section Start -->

        @elseif(Auth::user()->user_type == 2)
        <div class="header-right">
          <nav class="navbar navbar-expand-lg">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
              aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link" href="{{url('all-services')}}">Services</a>
                </li>
                @if(Auth::check())
                <li class="nav-item">
                  <a class="nav-link" href="{{ url('task-details/') }}">Post a task</a>
                </li>
                @endif
                <li class="nav-item">
                  <a class="nav-link" href="{{url('my-tasks/'.Auth::user()->id)}}">My Tasks</a>
                </li>
              </ul>
            </div>

          </nav>

          <div class="bell-icon">
            <a href="#">
              <svg width="26.043" height="21" viewBox="0 0 26.043 21">
                <g id="Icon_feather-bell" data-name="Icon feather-bell" transform="translate(-3.75 -2.75)">
                  <path id="Path_2775" data-name="Path 2775"
                    d="M19.5,8.5a5.768,5.768,0,0,0-6-5.5,5.768,5.768,0,0,0-6,5.5c0,6.419-3,8.253-3,8.253h18s-3-1.834-3-8.253"
                    transform="translate(0 0.5)" fill="none" stroke="#20272b" stroke-linecap="round"
                    stroke-linejoin="round" stroke-width="1.5" />
                  <path id="Path_2776" data-name="Path 2776" d="M19.73,31.5a2.5,2.5,0,0,1-4.325,0"
                    transform="translate(-4.066 -9.746)" fill="none" stroke="#20272b" stroke-linecap="round"
                    stroke-linejoin="round" stroke-width="1.5" />
                  <circle id="Ellipse_582" data-name="Ellipse 582" cx="3" cy="3" r="3" transform="translate(23.793 4)"
                    fill="#ff3457" />
                </g>
              </svg>

            </a>
          </div>

          <div class="user-profile">
            <div class="dropdown">
              <form method="POST" action="{{ route('logout') }}">
              @csrf
              <button class="dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown"
                aria-expanded="false">
                <figure>
                  <img src="{{asset('uploads/user/'.Auth::user()->id.'/'.Auth::user()->image)}}" alt="">
                </figure>

                {{Auth::user()->name}}
              </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item" href="{{url('/profile/'.Auth::user()->id)}}">My Profile</a></li>
                <li>
                  <x-dropdown-link :href="route('logout')" class="dropdown-item" onclick="event.preventDefault(); this.closest('form').submit();" onclick="event.preventDefault();
                        this.closest('form').submit();">
                        Logout
                  </x-dropdown-link>
                </li>
              </ul>
              </form>
            </div>
          
          </div>
        </div>
        <!-- For User section End -->

        @endif
        @else
        <div class="header-right">
          <nav class="navbar navbar-expand-lg">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
              aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link" href="{{url('all-services')}}">Services</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{url('task-details')}}">Post a task</a>
                </li>
                @if (Route::has('login'))
                <li class="nav-item">
                  @auth
                  <a class="nav-link" href="{{ url('/dashboard') }}">Dashboard</a>
                  @else
                  <a class="nav-link" href="{{ route('login') }}">Login/Signup</a>  
                  @endauth                
                </li>
                @endif
              </ul>
            </div>

          </nav>

          <div class="right-btn">
            <a href="{{url('become-provider')}}" class="btn">Become a Provider</a>
          </div>
        </div>
        @endauth
        @endif


        
        <!-- <div class="header-right">
          <nav class="navbar navbar-expand-lg">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
              aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link" href="#">Services</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Post a task</a>
                </li>
                @if (Route::has('login'))
                <li class="nav-item">
                  @auth
                  <a class="nav-link" href="{{ url('/dashboard') }}">Dashboard</a>
                  @else
                  <a class="nav-link" href="{{ route('login') }}">Login/Signup</a>  
                  @endauth                
                </li>
                @endif
              </ul>
            </div>

          </nav>

          <div class="right-btn">
            <a href="#" class="btn">Become a Provider</a>
          </div>
        </div> -->
       
       


      </div>
    </div>
  </header>