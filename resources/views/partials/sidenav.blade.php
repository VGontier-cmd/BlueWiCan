<div id="sidenav__overlay"></div>
<aside id="sidenav" class="sidenav no-sb">
    <div class="sidenav__header">
        <a class="sidenav__brand" href="{{ route('home') }}">
            <div class="sidenav__brand-logo">
                <img src="{{ asset('/images/stellantis-logo-white.svg') }}" alt="logo">
            </div>
        </a>
        <div id="sidenav__close-btn" class="sidenav__close-btn">
            <i class="bi bi-x"></i>
        </div>
    </div>
    <nav class="sidenav__navbar no-sb">
        <ul class="sidenav__navbar-nav">
            <li class="nav-item">
                <a href="~#" class="nav-link">
                    <div class="nav-item__icon">
                        <i class="bi bi-grid-1x2-fill"></i>
                    </div>
                    <span class="nav-item__text">
                        Dashboard
                    </span>
                </a>
            </li>
            <li class="nav-item mt-3">
                <h6 class="nav-subtitle">Menu</h6>
            </li>
            <li class="nav-item">
                <a href="~#" class="nav-link current-page">
                    <div class="nav-item__icon">
                        <i class="bi bi-server"></i>
                    </div>
                    <span class="nav-item__text">
                        Données stockées
                    </span>
                </a>
            </li>
            <li class="nav-item">
                <a href="~#" class="nav-link">
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