<header class="main-header clearfix" role="header">
    <div class="logo">
      <a href="#"><em>Educo</em> Lab</a>
    </div>
    <a href="#menu" class="menu-link"><i class="fa fa-bars"></i></a>
    <nav id="menu" class="main-nav" role="navigation">
      <ul class="main-menu">
        <li><a href="#section1">Home</a></li>
        <li><a href="#section2">About Us</a></li>
        <li><a href="#section4">Courses</a></li>
        <li><a href="#section4">Weekly Free Quiz</a></li>
        @guest
        <li><a href="{{ route('login') }}">Login</a></li>
        @else
        <li><a href="{{ route('student.dashboard') }}">Dashboard</a></li>
            <li>
                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        @endguest
      </ul>
    </nav>
  </header>
