<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme shadow-sm">
    <div class="app-brand demo" style="height: 75px;">
        <a href="{{ route('dashboard.index') }}" class="app-brand-link">
            <span class="app-brand-logo demo">
                <svg width="32" viewBox="0 0 25 42" version="1.1" xmlns="http://www.w3.org/2000/svg">
                    <defs>
                        <linearGradient x1="50%" y1="0%" x2="50%" y2="100%" id="brandGradient">
                            <stop stop-color="#696cff" offset="0%"></stop>
                            <stop stop-color="#3033e6" offset="100%"></stop>
                        </linearGradient>
                    </defs>
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <path d="M13.7918,0.3583 L3.3978,7.4417 C0.5668,9.6940 -0.3797,12.4788 0.5579,15.7960 C3.1235,19.2293 7.6507,21.2172 7.6507,21.2172 L18.6345,21.2174 C19.3802,19.4678 13.7918,0.3583 13.7918,0.3583 Z" fill="url(#brandGradient)"></path>
                        <path d="M5.4732,6.0045 C4.0532,8.2161 4.3633,10.0722 6.4035,11.5729 C10.8577,13.5094 15.5088,14.4330 18.6192,7.9842 C13.7918,0.3583 5.4732,6.0045 5.4732,6.0045 Z" fill="#696cff" opacity="0.5"></path>
                    </g>
                </svg>
            </span>
            <span class="app-brand-text demo menu-text fw-bold ms-2" style="font-size: 1.5rem; letter-spacing: 1px;">Sneat</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-3">
        <li class="menu-item {{ request()->routeIs('dashboard.index') ? 'active' : '' }}">
            <a href="{{ route('dashboard.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-dashboard"></i>
                <div class="fw-medium">Dashboard</div>
            </a>
        </li>

        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Manajemen Internal</span>
        </li>

        <li class="menu-item {{ request()->routeIs('dashboard.users.*') ? 'active' : '' }}">
            <a href="{{ route('dashboard.users.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-user-badge"></i>
                <div class="fw-medium">Users Management</div>
            </a>
        </li>

        <li class="menu-item {{ (request()->is('dashboard/products*') || request()->is('dashboard/categories*')) ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bxs-layer"></i>
                <div class="fw-medium">Inventory System</div>
            </a>
         <ul class="menu-sub">
        <li class="menu-item {{ request()->routeIs('dashboard.categories.*') ? 'active' : '' }}">
            <a href="{{ route('dashboard.categories.index') }}" class="menu-link">
                 <div>Categories</div>
            </a>
        </li>
        <li class="menu-item {{ request()->routeIs('dashboard.products.*') ? 'active' : '' }}">
            <a href="{{ route('dashboard.products.index') }}" class="menu-link">
                <div>Product Catalog</div>
            </a>
         </li>
</ul>
        </li>

        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Laporan & Pengaturan</span>
        </li>
        <li class="menu-item">
            <a href="#" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-pie-chart-alt-2"></i>
                <div class="fw-medium">Sales Report</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="#" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-cog"></i>
                <div class="fw-medium">Settings</div>
            </a>
        </li>
    </ul>

    <div class="p-3 mt-auto border-top">
        <a href="/logout" class="btn btn-sm btn-outline-danger w-100 d-flex align-items-center justify-content-center">
            <i class="bx bx-log-out-circle me-2"></i> Logout
        </a>
    </div>
</aside>