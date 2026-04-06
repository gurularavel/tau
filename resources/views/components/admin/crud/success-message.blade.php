@props(['delay' => '6000'])
<style>
    .admin-notify {
    position: fixed;
    top: 20px;
    right: 20px;
    z-index: 9999;

    max-width: 360px;
    width: auto;

    padding: 12px 18px;
    border-radius: 6px;

    font-size: 14px;
    line-height: 1.4;

    box-shadow: 0 6px 18px rgba(0,0,0,.15);
    animation: slideIn .3s ease-out;
}

.admin-notify.success {
    background: #28a745;
    color: #fff;
}

.admin-notify.error {
    background: #dc3545;
    color: #fff;
}

/* animasiya */
@keyframes slideIn {
    from {
        opacity: 0;
        transform: translateX(20px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

</style>

@if (session('success'))
    <div class="admin-notify success">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="admin-notify error">
        {{ session('error') }}
    </div>
@endif

<script>
    setTimeout(() => {
        document.querySelectorAll('.admin-notify').forEach(el => el.remove());
    }, {{ $delay }});
</script>
