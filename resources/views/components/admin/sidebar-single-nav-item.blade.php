@props(['title', 'routeName', 'iconName', 'marginLeft' => null, 'color' => null])
<li class="nav-item" @if($marginLeft)style="margin-left:{{ $marginLeft }}%;"@endif>
    <a @if($color)style="color: {{$color}}; font-weight: bold; @endif" class="nav-link menu-link @if(singleMenu($routeName)) active @endif" href="{{route('admin.'.$routeName)}}"  role="button" aria-expanded="false" >
        <i class="{{$iconName}}"></i> <span data-key="t-dashboards">{{__('translate.'. $title)}}</span>
    </a>
</li>
