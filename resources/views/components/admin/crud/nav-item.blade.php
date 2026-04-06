@props(['locale', 'key'])
<li class="nav-item waves-effect waves-light">
    <a class="nav-link {{ $key == 0 ? 'active' : '' }}" data-bs-toggle="tab" href="#pill-justified-home-{{$key}}" role="tab">
        {{$locale}}
    </a>
</li>
