<nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 px-lg-5 py-3 py-lg-0">
    <a href="{{ url('/') }}" class="navbar-brand p-0">
        <h1 class="text-primary merk m-0"><i class="fa fa-utensils me-3"></i>WSM - Mahatir</h1>
        <!-- <img src="img/logo.png" alt="Logo"> -->
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="fa fa-bars"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto py-0 pe-4">
            <a href="{{ url('home') }}" class="nav-item nav-link {{ Request::is('/') ? 'active' : '' }} {{ Request::is('home') ? 'active' : '' }}">Home</a>
            <a href="{{ url('menu') }}" class="nav-item nav-link {{ Request::is('menu') ? 'active' : '' }}">Menu</a>
            <a href="{{ url('pesanan') }}" class="nav-item nav-link {{ Request::is('pesanan') ? 'active' : '' }}">Pesanan</a>
        </div>
        @auth
            <div class="dropdown">
                <button class="btn text-white dropdown-toggle" style="outline: none;" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Hai, {{ auth()->user()->username }}!
                </button>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="{{ url('dashboard/profil') }}">Profil</a></li>
                    @if (auth()->user()->role == 'admin')
                        <li><a class="dropdown-item" href="{{ url('dashboard') }}">Dashboard</a></li>
                    @endif
                    <li><hr class="dropdown-divider"></li>
                    <form action="logout" method="post">
                        @csrf
                        <li><button type="submit" class="dropdown-item"><i class="fas fa-sign-out-alt"></i>Logout</button></li>
                    </form>
                </ul>
            </div>
        @else
            <a href="{{ url('login') }}" class="btn btn-primary py-2 px-4">Login</a>
        @endauth
    </div>
</nav>