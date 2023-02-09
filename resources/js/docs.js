import './bootstrap';
import 'laravel-datatables-vite';

copyToClipboard();

/**
 * Copy code to clipboard
 */
function copyToClipboard() {
    var clipboard = new ClipboardJS('.btn-copy');
    var btn_copy = document.querySelector('.btn-copy');

    clipboard.on('success', function(e) {
        $(btn_copy).addClass('success');
        setTimeout(() => {
            $(btn_copy).removeClass('success');
        }, 2000);
    });
    clipboard.on('error', function(e) {
        console.log(e);
    });
}