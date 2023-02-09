<div id="sidenav__overlay"></div>
<aside id="sidenav" class="sidenav no-sb minimalized">
    <!-- header -->
    <div class="sidenav__header">
        <a class="sidenav__brand" href="{{ route('dashboard') }}">
            <div class="sidenav__brand-logo"></div>
        </a>
        <div id="sidenav__close-btn" class="sidenav__close-btn">
            <i class="bi bi-x"></i>
        </div>
    </div>

    <!-- nav -->
    <nav class="sidenav__navbar no-sb">
        <ul class="sidenav__navbar-nav">
            <li class="nav-item mt-3">
                <h6 class="nav-subtitle">Menu</h6>
            </li>
            <li class="nav-item">
                <a href="{{ route('dashboard') }}" class="nav-link"
                    data-active="{{ Route::currentRouteName() == 'dashboard' ? 'true' : 'false' }}">
                    <div class="nav-item__icon">
                        <i class="bi bi-grid-1x2-fill"></i>
                    </div>
                    <span class="nav-item__text">
                        Dashboard
                    </span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('saved') }}" class="nav-link"
                    data-active="{{ Route::currentRouteName() == 'saved' ? 'true' : 'false' }}">
                    <div class="nav-item__icon">
                        <i class="bi bi-server"></i>
                    </div>
                    <span class="nav-item__text">
                        Datas Stored
                    </span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('live') }}" class="nav-link"
                    data-active="{{ Route::currentRouteName() == 'live' ? 'true' : 'false' }}">
                    <div class="nav-item__icon">
                        <i class="bi bi-camera-video-fill"></i>
                    </div>
                    <span class="nav-item__text">
                        Live Datas
                    </span>
                </a>
            </li>
        </ul>
    </nav>

    <!-- documentations -->
    <div class="sidenav__docs">
        <div class="sidenav__docs-info">
            <p>Need help ?</p>
            <a href="{{ route('docs') }}" class="app-btn btn--primary btn-docs" target="_blank"><span>Documentation</span></a>
        </div>
    </div>
</aside>
