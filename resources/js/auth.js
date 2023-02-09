import './bootstrap';
import 'laravel-datatables-vite';

closeFlashAlert();

/**
 * Remove flash message
 */
function closeFlashAlert() {
    const flash_close = document.getElementById('flash-close');

    flash_close.addEventListener("click", function () {
        const flashMessage = this.closest(".flash-message");
        flashMessage.parentNode.removeChild(flashMessage);
    });
}