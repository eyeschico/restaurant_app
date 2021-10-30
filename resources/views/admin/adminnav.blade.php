<nav class="navbar navbar-expand-lg navbar-light fixed-top navbgadmin">
  <!-- ***** Logo Start ***** -->
  <div>
    <a class="italotlogo" href="{{url('/')}}">Boomy's ADMINISTRATOR</a>  
  </div>

    
  <!-- ***** Logo End ***** -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto mainnav">
      <li class="nav-item">
        <a class="nav-link " href="{{url('/home')}}">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{url('/users')}}">Users</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{url('/foodmenu')}}">Food Menu</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{url('/viewchef')}}">Chefs</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{url('/viewreservation')}}">Reservations</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{url('/orders')}}">Orders</a>
      </li>
      </ul>
        @if (Route::has('login'))
          @auth
          <ul class="nav navbar-nav navbar-right navlogin">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{ Auth::user()->name }}
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('profile.show') }}">Profile</a>
                <a class="dropdown-item">
                  <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-jet-dropdown-link href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
                      {{ __('Log Out') }}
                    </x-jet-dropdown-link>
                  </form>
                </a>
              </div>
            </li>            
          </ul>


            @else

            <li class="nav-item">
              <li><a href="{{ route('login') }}" class="nav-link">Log in</a></li>
              @if (Route::has('register'))
                <li><a href="{{ route('register') }}" class="nav-link">Register</a></li>
              @endif
            </li>  
          @endauth
        @endif
    
  </div>
</nav>