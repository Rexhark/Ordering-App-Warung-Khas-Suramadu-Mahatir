<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand mt-3">
            <h5>Warung Khas<br>Suramadu - Mahatir</h5>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            SM
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="{{ Request::is('dashboard') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('dashboard') }}"><i class="fas fa-gauge"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="menu-header">Kategori dan Makanan</li>
            <li class="{{ Request::is('dashboard/kategori') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('dashboard/kategori') }}"><i class="fas fa-utensils"></i>
                    <span>Daftar Kategori</span> 
                </a>
            </li>
            <li class="{{ Request::is('dashboard/makanan') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('dashboard/makanan') }}"><i class="fas fa-bowl-food"></i>
                    <span>Daftar Makanan</span>
                </a>
            </li>
            <li class="menu-header">Pesanan dan Tag</li>
            <li class="{{ Request::is('dashboard/pesanan') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('dashboard/pesanan') }}"><i class="fas fa-receipt"></i>
                    <span>Daftar Pesanan</span> 
                </a>
            </li>
            <li class="{{ Request::is('dashboard/tag') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('dashboard/tag') }}"><i class="fas fa-tags"></i>
                    <span>Daftar Tag</span>
                </a>
            </li>
            <li class="menu-header">User</li>
            <li class="{{ Request::is('dashboard/user') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('dashboard/user') }}"><i class="fas fa-user"></i>
                    <span>Daftar User</span>
                </a>
            </li>
        </ul>
    </aside>
</div>
