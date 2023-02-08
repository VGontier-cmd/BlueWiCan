<header id="header" class="header">
    <div class="header-wrapper">
        <button id="header__sidenav-trigger" class="header__sidenav-trigger">
            <div class="header__sidenav-trigger-inner">
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
            </div>
        </button>
        <div v-if="header" class="header-title">
            <h5 class="main-title mb-0 line-clamp lc-1">{{ $page_title }}</h5>
            <p class="subtitle text-sm mb-0 line-clamp lc-1">{{ $page_subtitle }}</p>
        </div>
        <div class="header__auth">
            @if (auth()->check())
                <div class="auth-user">
                    <span>{{ auth()->user()->name }}</span>
                    <div class="auth-user__profile">
                        <i class="bi bi-person"></i>
                    </div>
                </div>
                <a class="logout-btn" href="{{ route('logout') }}" title="Logout">
                    <i class="bi bi-box-arrow-right"></i>
                </a>
            @else
                <a href="{{ route('login') }}" class="auth-btn auth-btn__signin">Sign in</a>
                <a href="{{ route('register') }}" class="auth-btn auth-btn__signup">Sign up</a>
            @endif
        </div>
    </div>
</header>