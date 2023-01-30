<div v-if="flashMessage" class="toast" role="alert" aria-live="assertive" aria-atomic="true" v-bind:data-level='flashMessage.level'>
    <div class="toast-header">
        <i v-if="flashMessage.level === 'success'" class="bi bi-check-square-fill"></i>
        <i v-if="flashMessage.level === 'info'" class="bi bi-info-square-fill"></i>
        <i v-if="flashMessage.level === 'warning'" class="bi bi-exclamation-square-fill"></i>
        <i v-if="flashMessage.level === 'error'" class="bi bi-exclamation-square-fill"></i>
        <strong class="me-auto">@{{flashMessage.level}}</strong>
        <button v-on:click="hideToast" type="button" class="btn-close"></button>
    </div>
    <div class="toast-body">
        <p>@{{flashMessage.message}}</p>
    </div>
</div>