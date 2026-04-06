@props(['delay' => '3000'])
@if(session('error'))
    <div class="alert alert-danger" id="error-message">
        {{ session('error') }}
    </div>

    <script>
        setTimeout(function() {
            document.getElementById('error-message')?.remove();
        }, {{$delay}});
    </script>
@endif
