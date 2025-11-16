<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">BUMDES Kotakan</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">BK</a>
        </div>

        <ul class="sidebar-menu">
            <li class="menu-header">Menu</li>
            <li><a class="nav-link" href="{{ route('admin.dashboard') }}"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>
            
            <li class="menu-header">Master</li>
            <li><a class="nav-link" href="{{ route('admin.articles') }}"><i class="far fa-newspaper"></i> <span>Artikel</span></a></li>
            <li><a class="nav-link" href="{{ route('admin.users') }}"><i class="fas fa-users"></i> <span>Admin</span></a></li>
        </ul>

        <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a href="{{ route('client.home') }}" class="btn btn-primary btn-lg btn-block btn-icon-split">
              <i class="fas fa-rocket"></i> Halaman Utama
            </a>
          </div>
    </aside>
</div>