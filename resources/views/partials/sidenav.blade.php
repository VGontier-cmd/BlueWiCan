<div id="sidenav__overlay"></div>
<aside id="sidenav" class="sidenav no-sb minimalized">
    <div class="sidenav__header">
        <a class="sidenav__brand" href="{{ route('home') }}">
            <div class="sidenav__brand-logo"></div>
        </a>
        <div id="sidenav__close-btn" class="sidenav__close-btn">
            <i class="bi bi-x"></i>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#fff" fill-opacity="1" d="M0,256L30,250.7C60,245,120,235,180,208C240,181,300,139,360,101.3C420,64,480,32,540,53.3C600,75,660,149,720,192C780,235,840,245,900,224C960,203,1020,149,1080,122.7C1140,96,1200,96,1260,128C1320,160,1380,224,1410,256L1440,288L1440,320L1410,320C1380,320,1320,320,1260,320C1200,320,1140,320,1080,320C1020,320,960,320,900,320C840,320,780,320,720,320C660,320,600,320,540,320C480,320,420,320,360,320C300,320,240,320,180,320C120,320,60,320,30,320L0,320Z"></path>
        </svg>    
    </div>
    <nav class="sidenav__navbar no-sb">
        <ul class="sidenav__navbar-nav">
            <li class="nav-item">
                <a href="/dashboard" class="nav-link" data-active="false" target-page="dashboard">
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
                <a href="{{ route('home') }}" class="nav-link" data-active="false" target-page="home">
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