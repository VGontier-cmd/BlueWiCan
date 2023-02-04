<div id="sidenav__overlay"></div>
<aside id="sidenav" class="sidenav no-sb minimalized">
    <div class="sidenav__header">
        <a class="sidenav__brand" href="{{ route('dashboard') }}">
            <div class="sidenav__brand-logo"></div>
        </a>
        <div id="sidenav__close-btn" class="sidenav__close-btn">
            <i class="bi bi-x"></i>
        </div>
    </div>
    <nav class="sidenav__navbar no-sb">
        <ul class="sidenav__navbar-nav">
            <li class="nav-item mt-3">
                <h6 class="nav-subtitle">Menu</h6>
            </li>
            <li class="nav-item">
                <a href="{{ route('dashboard') }}" class="nav-link" data-active="false" target-page="dashboard">
                    <div class="nav-item__icon">
                        <i class="bi bi-grid-1x2-fill"></i>
                    </div>
                    <span class="nav-item__text">
                        Dashboard
                    </span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('saved') }}" class="nav-link" data-active="false" target-page="saved">
                    <div class="nav-item__icon">
                        <i class="bi bi-server"></i>
                    </div>
                    <span class="nav-item__text">
                        Données stockées
                    </span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('live') }}" class="nav-link" data-active="false" target-page="live">
                    <div class="nav-item__icon">
                        <i class="bi bi-camera-video-fill"></i>
                    </div>
                    <span class="nav-item__text">
                        Données live
                    </span>
                </a>
            </li>
        </ul>
    </nav>
</aside>