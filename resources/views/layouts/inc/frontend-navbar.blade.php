<div class="global-nav">
    <div class="container">
        <div class="row">
            <div class="col-md-3 d-none d-sm-none d-md-inline">
                <a href="{{ url('/') }}">
                    <img src="{{ asset('assets/images/logo.png') }}" alt="Logo" class="logo" style="width: 150px; height: auto;">
                </a>
            </div>
            <div class="col-md-9 my-auto" >
                <div class="border text-center p0">
                    <h1>Vertual Blog</h1>
                </div>
                
            </div>
        </div>
    </div>
</div>

  
<div class="sticky-top">
   <nav class="navbar navbar-expand-lg navbar-dark bg-green">
  
        <div class="navbar-brand d-md-none ms-2" ><a href="{{ url('/') }}">
                    <img src="{{ asset('assets/images/logo.png') }}" alt="Logo" class="logo" style="width: 50px; height: auto;">
                </a>V blog</div>
        
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{url('/')}}">Home</a>
        </li>
        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        @php
            $category = App\Models\category::where('navbar_status', 1)->where('status' ,1 )->get();
        @endphp
        @foreach ($category as $item)
        <li class="nav-item">
          <a class="nav-link" href="{{url('tutorial/'.$item->slug)}}">{{$item->name}}</a>
        </li>
        @endforeach
        <li class="nav-item d-md-none">
        <div class="me-5">
  
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
  
  </div>
          
          </li>
      
  </div>
  <div class="me-5 d-none d-sm-none d-md-inline">
  
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                       Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
  
  </div>
  
</nav>
</div>
