import './bootstrap';
import 'laravel-datatables-vite';

copyToClipboard();

/**
 * Copy code to clipboard
 */
function copyToClipboard() {
    const btn_copy_list = document.querySelectorAll('.btn-copy');

    btn_copy_list.forEach(btn => {
        btn.addEventListener('click', e => {
            e.preventDefault();
            e.stopPropagation();
        });
        
        const clipboard = new ClipboardJS(btn);
        clipboard.on('success', function(e) {
            e.clearSelection();
            $(btn).addClass('success');
            $(btn).popover('show');
            setTimeout(() => {
                $(btn).removeClass('success');
                $(btn).popover('hide');
            }, 2000);
        });
        clipboard.on('error', function(e) {
            console.log(e);
        });
    })
}