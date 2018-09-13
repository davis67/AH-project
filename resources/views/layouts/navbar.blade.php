   <!-- partial:partials/_navbar.html -->
   <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
      <a class="navbar-brand brand-logo" href=""><img src="/uploads/company_logo.png" alt="logo"/></a>
      <a class="navbar-brand brand-logo-mini" href=""><span style="font-size:50%;">AH CONSULTING LTD</span></a>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-stretch">
      <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
        <span class="mdi mdi-menu"></span>
      </button>
      <ul class="navbar-nav navbar-nav-right">
        
        <li class="nav-item  dropdown">
            <a href="{{ route('associates.index') }}" class="nav-link">
                Associates
            </a>
          </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('leaves.index') }}">
                 Leave
            </a>
            
          </li>
          <li class="nav-item">
            <a class="nav-link"  href="{{ route('teams.index') }}" aria-expanded="false">
                 Teams
            </a>
          </li>
          <li class="nav-item nav-profile dropdown">
          <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
            <div class="nav-profile-img">
              <img src="/uploads/avatr.jpeg" alt="image">
              <span class="availability-status online"></span>             
            </div>
            <div class="nav-profile-text">
              <p class="mb-1 text-black">{{ Auth::user()->name }}</p>
            </div>
          </a>
          <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
            <a class="dropdown-item" href="{{ route('users.index') }}">
              <i class="mdi mdi-account mr-2 text-success"></i>
              Users
            </a>
            <a class="dropdown-item" href="{{ route('users.show',Auth::user()->id) }}">
              <i class="mdi mdi-account mr-2 text-success"></i>
              Profile
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();"
          >
           <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
            <i class="mdi mdi-logout mr-2 text-primary"></i>
            Signout
          </a>
          </div>
        </li>
    </div>
  </nav>