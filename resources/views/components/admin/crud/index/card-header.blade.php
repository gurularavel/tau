@props(['title', 'routeName'])
<div class="card-header border-0">
    <div class="d-flex align-items-center">
        <h5 class="card-title mb-0 flex-grow-1">{{__("translate.". $title)}}</h5>
        <div class="flex-shrink-0">
            <div class="d-flex flex-wrap gap-2">
                @if($routeName !== 'settings' &&  $routeName !== 'messages'  &&  $routeName !== 'cvs')
                <button class="btn btn-primary add-btn" onclick="window.location.href='{{ route('admin.'.$routeName.'.create') }}'">
                    <i class="ri-add-line align-bottom me-1"></i> {{__('translate.add')}}
                </button>
                @endif
                <button class="btn btn-soft-danger" id="remove-actions" onClick="deleteMultiple()">
                    <i class="ri-delete-bin-2-line"></i>
                </button>
            </div>
        </div>
    </div>
</div>
