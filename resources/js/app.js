import './bootstrap';
import 'laravel-datatables-vite';

toggleNav();
scroll()

/**
 * Permet d'afficher/fermer la navigation format mobile 
 */
function toggleNav() {
    var header_sidenav_trigger = document.getElementById('header__sidenav-trigger');
    var sidenav_close = document.getElementById('sidenav__close-btn');
    var sidenav_overlay = document.getElementById('sidenav__overlay');

    $(header_sidenav_trigger).click(function () {
        openNav();
    });

    $(sidenav_close).add(sidenav_overlay).click(function () {
        closeNav();
    });

    function closeNav() {
        $('body').removeClass('open');
    }

    function openNav() {
        $('body').addClass('open');
    }
}

/**
 * Permet de modifier le style de du header lorsque le scroll dépasse le hero-bg (fond bleu)
 */
function scroll() {
    const button = document.getElementById("header__sidenav-trigger");
    const header = document.getElementById("header");
    const hero_bg = document.getElementById("hero-bg");

    window.onscroll = function() {
        const scrollHeight = window.pageYOffset;
        const threshold = $(hero_bg).innerHeight() - $(button).innerHeight();

        if (scrollHeight > threshold) {
            $(button).addClass("scrolled");
            $(header).addClass("scrolled");
        } else {
            $(button).removeClass("scrolled");
            $(header).removeClass("scrolled");
        }
    };
}