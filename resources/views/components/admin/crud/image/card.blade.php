@props(['title'])
<div class="card">
    <div class="card-header">
        <h5 class="card-title mb-0">{{__('translate.Gallery')}}  - {{__('translate.'.$title)}}</h5>
    </div>
    {{$slot}}
</div>
