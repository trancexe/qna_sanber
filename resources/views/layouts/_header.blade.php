<header class="header">
      <nav class="navbar navbar-expand-lg navbar-light py-3 bg-white shadow-sm">
        <div class="container"><a class="navbar-brand" href="{{ url('/')}}"></a>
          <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item mx-2 active"><a class="nav-link text-uppercase" href="{{ url('/')}}">Home </a></li>
              <li class="nav-item mx-2"><a class="nav-link text-uppercase" href="{{route('question.create')}}">ASK</a></li>
              {{-- <li class="nav-item mx-2"><a class="nav-link text-uppercase" href="contact.html">Contact</a></li> --}}
              <li class="nav-item ml-2 dropdown"><a class="nav-link text-uppercase dropdown-toggle pr-0" id="navbarDropdownMenuLink" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">USER</a>
                <div class="dropdown-menu mt-lg-4" aria-labelledby="navbarDropdownMenuLink">
                  {{-- <a class="dropdown-item font-weight-bold text-small" href="index.html">Home</a>
                  <a class="dropdown-item font-weight-bold text-small" href="about.html">About</a>
                  <a class="dropdown-item font-weight-bold text-small" href="contact.html">Contact</a> --}}
                  {{-- @if (Route::has('login'))
                      @auth
                          <a class="dropdown-item font-weight-bold text-small" href="{{ url('/home') }}">Home</a>
                      @else
                          <a class="dropdown-item font-weight-bold text-small" href="{{ route('login') }}">Login</a>
  
                          @if (Route::has('register'))
                              <a class="dropdown-item font-weight-bold text-small" href="{{ route('register') }}">Register</a>
                          @endif
                      @endauth
                  @endif --}}

                  @guest
                                <a class="dropdown-item font-weight-bold text-small" href="{{ route('login') }}">{{ __('Login') }}</a>
                            @if (Route::has('register'))
                                    <a class="dropdown-item font-weight-bold text-small" href="{{ route('register') }}">{{ __('Register') }}</a>
                            @endif
                        @else
                                    {{-- {{ Auth::user()->name }} <span class="caret"></span> --}}
                                    <a class="dropdown-item font-weight-bold text-small" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                </div>
              </li>
              {{-- <li class="nav-item ml-lg-3 pl-lg-3"><a class="btn btn-outline-primary btn-sm" href="contact.html">Request a quote</a></li> --}}
            </ul>
          </div>
        </div>
      </nav>
    </header>