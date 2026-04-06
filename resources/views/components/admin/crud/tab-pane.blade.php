@props(['key', 'language'])
<div class="tab-pane {{ $key == 0 ? 'active' : '' }}" id="pill-justified-home-{{$key}}" role="tabpanel">


                        {{$slot}}
</div>
