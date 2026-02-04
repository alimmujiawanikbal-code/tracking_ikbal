<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme shadow">
    <div class="app-brand demo d-flex align-items-center justify-content-center py-4">
        <a href="{{ route('dashboard.index') }}" class="app-brand-link gap-2">
            <span class="app-brand-logo demo">
                <svg width="25" viewBox="0 0 25 42" version="1.1" xmlns="http://www.w3.org/2000/svg">
                    <path d="M13.7,0.1 L13.7,0.1 C14.3,-0.0 14.9,0.1 15.4,0.5 L24.2,7.4 C25.0,8.1 25.2,9.2 24.6,10.0 L14.9,23.5 L13.7,23.5 L13.7,0.1 Z" fill="#696cff" />
                    <path d="M11.3,0.1 L11.3,0.1 C10.7,-0.0 10.1,0.1 9.6,0.5 L0.8,7.4 C-0.0,8.1 -0.2,9.2 0.4,10.0 L10.1,23.5 L11.3,23.5 L11.3,0.1 Z" fill="#696cff" opacity="0.5" />
                </svg>
            </span>
            <span class="app-brand-text demo menu-text fw-bolder ms-2 text-uppercase" style="letter-spacing: 2px;">Sneat</span>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-3">
        {{-- Dashboard --}}
        <li class="menu-item {{ request()->routeIs('dashboard.index') ? 'active' : '' }}">
            <a href="{{ route('dashboard.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div>Dashboard</div>
            </a>
        </li>

        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Manajemen Internal</span>
        </li>

        {{-- User Management --}}
        <li class="menu-item">
            <a href="{{ route('dashboard.users.index') }}" class="menu-link text-muted">
                <i class="menu-icon tf-icons bx bx-user-check"></i>
                <div>User Management</div>
            </a>
        </li>

        {{-- Inventory System --}}
        <li class="menu-item {{ request()->is('kategori*') || request()->is('barang*') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-package"></i>
                <div>Inventory System</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ request()->routeIs('dashboard.categories.index') ? 'active' : '' }}">
                    <a href="{{ route('dashboard.categories.index') }}" class="menu-link">
                        <div>Categories</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->routeIs('home') ? 'active' : '' }}">
                    <a href="{{ route('barang.index') }}" class="menu-link">
                        <div>Product Catalog</div>
                    </a>
                </li>
            </ul>
        </li>

        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Laporan</span>
        </li>
        <li class="menu-item">
            <a href="{{ route('laporan.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-bar-chart-square"></i>
                <div>Reports</div>
            </a>
        </li>
    </ul>

    {{-- Logout --}}
    <div class="p-3 border-top mt-auto">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-label-danger btn-sm w-100 d-flex align-items-center justify-content-center">
                <i class="bx bx-power-off me-2"></i>
                <span>Logout System</span>
            </button>
        </form>
    </div>
</aside>