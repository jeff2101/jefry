<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="#">Teknik Informatika | KSI</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="#">KSI</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Menu</li>
            <li class="{{ Route::is('admin.dashboard') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.dashboard') }}">
                    <i class="fas fa-home"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="{{ Route::is('admin.admin') ? 'active' : ''}}">
                <a class="nav-link" href="{{ route('admin.admin') }}"><i class="fas fa-box"></i>
                    <span>Admin</span>
                </a>
            </li>
            <li class="{{ Request::is('product*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.product') }}"><i class="fas fa-box"></i>
                    <span>Produk</span></a>
            </li>
            <li class="{{ Route::is('admin.distributor') ? 'active' : ''}}">
                <a class="nav-link" href="{{ route('admin.distributor') }}"><i class="fas fa-box"></i>
                    <span>Distributor</span>
                </a>
            </li>
            <li class="{{ Route::is('admin.flashsales') ? 'active' : ''}}">
                <a class="nav-link" href="{{ route('admin.flashsales') }}"><i class="fas fa-box"></i>
                    <span>Flash Sale</span>
                </a>
            </li>
            <li class="{{ Route::is('admin.user') ? 'active' : ''}}">
                <a class="nav-link" href="{{ route('admin.user') }}"><i class="fas fa-box"></i>
                    <span>User</span>
                </a>
            </li>
        </ul>
    </aside>
</div>