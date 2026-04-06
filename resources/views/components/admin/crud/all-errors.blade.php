@props(['errors'])

@if ($errors->any())
    <div class="text-danger big">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
