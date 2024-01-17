 <!-- Navbar -->
 <nav class="main-header navbar navbar-expand-md navbar-light navbar-white align-items-center sticky-top">
    <div class="container-fluid">
      <a href="{{route('welcome')}}" class="navbar-brand">
        <!-- <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
        <span class="brand-text font-weight-medium">One Voice One Choice</span>
      </a>
      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="true" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="{{ route('welcome') }}" class="nav-link text-dark">Home</a>
          </li>
          <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">CSBCN</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
              <li><a href="{{ route('free') }}" class="dropdown-item">Free!</a></li>
              <!-- <li><a href="#" class="dropdown-item">Some other action</a></li> -->
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Apply Now</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
              @if (!Auth::user())
              <li><a href="{{route('register')}}" class="dropdown-item">Registeration</a></li>
              <li><a href="{{route('login')}}" class="dropdown-item">Login</a></li>
              @endif
              
              <!-- <li><a href="#" class="dropdown-item">Partners</a></li>
              <li><a href="#" class="dropdown-item">Vendor dashboard</a></li> -->
              <li><a href="{{route('jobs')}}" class="dropdown-item">Job$+</a></li>
              <li><a href="{{route('videos')}}" class="dropdown-item">Videos</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Directory</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
              <li><a href="{{route('shopping_mall')}}" class="dropdown-item">Shopping Mall</a></li>
              <li><a href="{{route('N-stores-ads')}}" class="dropdown-item">N-Stores Ads</a></li>
              <li><a href="{{route('PSP')}}" class="dropdown-item">PSP</a></li>
              <li><a href="{{route('CRCSA')}}" class="dropdown-item">CRCSA</a></li>
              <li><a href="{{route('events')}}" class="dropdown-item">Calender</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">RejoicExpress</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
              <li><a href="{{route('user_blog')}}" class="dropdown-item">Submit New Blog Post</a></li>
              <li><a href="{{route('newest_blog')}}" class="dropdown-item">Newest Blogs</a></li>
              <li><a href="#" class="dropdown-item">N-Stores Ads</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">User Group</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
              <li><a href="{{route('allgroups')}}" class="dropdown-item">All Groups</a></li>
              <li><a href="#" class="dropdown-item">Search Users</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{route('blog')}}" class="nav-link">Blog</a>
          </li>
          <li class="nav-item">
            <a href="{{route('gift-card')}}" class="nav-link">GIFT CARD</a>
          </li>
        </ul>  

      <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
        <!-- Messages Dropdown Menu -->
        
        <li class="nav-item">
        @if(!Auth::user())
          <a class="nav-link" href="{{route('register')}} ">
          <button type="button" class="btn btn-outline-primary">Register</button>
          </a>
          @endif
        </li>
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item">
        @if(!Auth::user())
          <a class="nav-link" href="{{route('login')}}">
            <button type="button" class="btn btn-outline-success">Login</button>
          </a>
          @endif
        </li>
        <li class="nav-item dropdown">
            @if(Auth::user())
                            <a class="nav-link" data-toggle="dropdown" href="#">
                            <div>{{ Auth::user()->name }}</div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-md dropdown-menu-center">
                                <a href="#" class="dropdown-item">
                                <!-- <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                            <div>{{ Auth::user()->name }}</div>
                                </button> -->
                            </a>
                            <div>
                                <div class="font-medium text-base text-gray-800 px-4">{{ Auth::user()->name }}</div>
                                <div class="dropdown-divider"></div>
                                <div class="font-medium text-sm text-gray-500 px-4">{{ Auth::user()->email }}</div>
                                <div class="dropdown-divider"></div>
                                <div class="font-medium text-sm text-gray-500 px-4">{{ Auth::user()->referral_code }}</div>
                                <div class="dropdown-divider"></div>
                               <div class='text-center'>
                                <div class="font-medium text-sm text-gray-500 px-4"><a class='btn btn-success' href="{{route('withdrawal.form')}}">Withdraw(${{ Auth::user()->balance }})</a></div>
                                </div>
                              </div>

                            <div class="mt-3 text-center">
                            @if(Auth::user()->role_id==3)
                                <a class='btn btn-outline-primary' href="{{route('client.profile.read')}}">
                                    {{ __('Profile') }}
                                </a>
                                @endif
                                @if(Auth::user()->role_id==2)
                                <a class='btn btn-outline-primary' href="{{route('vendor.profile.read')}}">
                                    {{ __('Profile') }}
                                </a>
                                @endif
                                <div class="dropdown-divider"></div>
                            
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <a class="btn btn-danger" href="route('logout')"
                                            onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </a>
                                </form>
            
                </div>
            @endif
            @auth
            @if(Auth::user()->role_id==3)
        <li class="nav-item">
                 <a href="{{route('show.cart')}}" class="btn btn-primary btn-block mt-2">Cart
                 <i class="fas fa-shopping-cart"></i>  
                 <span class="badge badge-pill badge-danger">
            {{ \App\Models\Cart::where('user_id', auth()->id())->where('status','Unpaid')->count() }}
           </span>
                 </a>
         </li>   
        @endif
        @endauth
      </ul>
      </div>
    </div>
  </nav>
  <!-- /.navbar -->
  