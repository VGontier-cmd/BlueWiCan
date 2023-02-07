<footer id="footer" class="footer">
    <div class="footer-logo">
        <img src="{{ asset('/images/stellantis-logo.png') }}" alt="logo">
    </div>
    <div class="footer-wrapper">
        <ul class="footer__link-list">
            <li class="footer__link-item">
                <a href="{{ route('dashboard') }}" class="footer__link">Dashboard</a>
            </li>
            <li class="footer__link-item">
                <a href="{{ route('saved') }}" class="footer__link">Datas Saved</a>
            </li>
            <li class="footer__link-item">
                <a href="{{ route('live') }}" class="footer__link">Live Datas</a>
            </li>
        </ul>
        <div class="footer__copyright">
            <h3>Engineer Project ESIGELEC</h3>
            <p>2022/2023</p>
        </div>
    </div>
    <div class="footer__names">
        <li class="footer__copy-items">
            <span>BAYON DE NOYER Artus</span>•
            <span>HINDIE Pierre</span>•
            <span>DZIEWIC Kévin</span>•
            <span>CAREL Théo</span>•
            <span>CAREL Nathan</span>•
            <span>GONTIER Vivien</span>
        </li>
    </div>
</footer>