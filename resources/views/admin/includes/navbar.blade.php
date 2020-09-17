<ul class="sidebar navbar-nav">
   {{-- <li class="nav-item active">
        <a class="nav-link" href="{{ url('/add-pages') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>--}}
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-folder"></i>
            <span>Settings</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="{{ url('/edit-general-settings/1') }}">General Settings</a>
            <a class="dropdown-item" href="{{ url('/add-pages') }}">CMS</a>
            <a class="dropdown-item" href="{{ url('/admin/contact/1') }}">Contact</a>
        </div>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="{{ url('/admin/contact-query') }}">
            <i class="fas fa-fw fa-folder"></i>
            <span>Query</span>
        </a>
    </li>

    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="{{ url('/show-online-payments') }}">
            <i class="fas fa-fw fa-folder"></i>
            <span>Online Payment's</span>
        </a>
    </li>

    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="{{ url('/stock-inquiry') }}">
            <i class="fas fa-fw fa-folder"></i>
            <span>Stock Inquiry</span>
        </a>
    </li>
</ul>
