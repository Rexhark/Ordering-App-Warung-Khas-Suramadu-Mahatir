<div class="navbar-bg"></div>
<nav class="navbar navbar-expand-lg main-navbar">
    <form class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
            @if(auth()->user()->role == 'admin')
                <li>
                    <a href="#" data-toggle="sidebar" class="nav-link nav-link-lg">
                        <i class="fas fa-bars"></i>
                    </a>
                </li>
            @endauth
        </ul>
    </form>
    <ul class="navbar-nav navbar-right">
        <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <img alt="image" src="{{ asset('storage/' . auth()->user()->image) }}" class="rounded-circle mr-1">
                <div class="d-sm-none d-lg-inline-block">Hi, {{ auth()->user()->username }}!</div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                {{-- <div class="dropdown-title">Logged in 5 min ago</div> --}}
                <a href="{{ url('home') }}" class="dropdown-item has-icon">
                    <i class="fas fa-home"></i> Home
                </a>
                <a href="{{ url('dashboard/profil') }}" class="dropdown-item has-icon">
                    <i class="far fa-user"></i> Profil
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item">
                <form action="{{ url('logout') }}" method="post">
                    @csrf
                        <button type="submit" class="border-0 bg-transparent has-icon text-danger"><i class="fas fa-sign-out-alt"></i>Logout</button>
                </form>
                </a>    
            </div>
        </li>
    </ul>
</nav>
