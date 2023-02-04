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
    </div>
</header>