@if(session('error'))
    <div class="flash-message flash-alert mb-4">
        <div class="flash-content">
            <div class="flash-icon">
                <i class="bi bi-exclamation-circle"></i>
            </div>
            <span class="flash-text">{{ session('error') }}</span>
            <button id="flash-close" class="flash-close">
                <i class="bi bi-x-lg"></i>
            </button>
        </div>
    </div>
@endif