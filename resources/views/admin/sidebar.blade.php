<div class="sidebar bg-dark">
    <ul class="list-unstyled">
        <li>

            <a href="#" class="text-white">
                <i class="bi bi-boxes text-danger fs-4"></i> <span class="ms-1 side-name ">Demo Project</span>
            </a>
        </li>
        <hr class="text-white side-hr">
        <li>
            <a href="{{ route('admin.dashboard') }}" class="nav-link text-white {{ Route::is('admin.dashboard') ? 'active': '' }}">
                <i class="bi bi-speedometer2"></i> <span class="ms-1 side-name ">Dashboard</span>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.user') }}" class="nav-link text-white {{ Route::is('admin.user') ? 'active': '' }}">
                <i class="bi bi-people"></i> <span class="ms-1 side-name ">Users</span>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.category') }}" class="nav-link text-white {{ Route::is('admin.category') ? 'active': '' }}">
                <i class="bi bi-columns-gap"></i> <span class="ms-1 side-name ">Categories</span>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.supplier') }}" class="nav-link text-white {{ Route::is('admin.supplier') ? 'active': '' }}">
                <i class="bi bi-columns-gap"></i> <span class="ms-1 side-name ">Suppliers</span>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.logout') }}" class="nav-link text-white">
                <i class="bi bi-power"></i> <span class="ms-1 side-name ">Logout</span>
            </a>
        </li>

    </ul>

</div>