<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('home') }}">Rental FI
                <img src="{{ asset('img/asli.png') }}" alt="logo" width="70">
            </a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('home') }}">St</a>
        </div>
        <br>
        <hr>
        <ul class="sidebar-menu">
            <!-- Dashboard Link -->
            <li class="{{ Request::routeIs('home') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('home') }}">
                    <i class="fa-solid fa-house"></i> <b><span>Dashboard</span></b>
                </a>
            </li>

            <!-- Admin-specific Menu -->
            @role('admin')
            <li class="{{ Request::routeIs('user.index') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('user.index') }}">
                    <i class="fa-solid fa-users"></i> <b><span>Users</span></b>
                </a>
            </li>
            @endrole
            @role('admin')
            <!-- Rental Mobil Menu -->
            <li class="{{ Request::routeIs('rental.index') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('rental.index') }}">
                    <i class="fa-solid fa-car"></i> <b><span>Mobil</span></b>
                </a>
            </li>
            @endrole

            @role('user')
            <!-- Rental Mobil Menu -->
            <li class="{{ Request::routeIs('sewa.index') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('sewa.index') }}">
                    <i class="fa-solid fa-car"></i> <b><span>Mobil</span></b>
                </a>
            </li>
            @endrole


        </ul>
    </aside>
</div>
