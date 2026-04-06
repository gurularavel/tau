@props(['item'])
<div class="col-xl-3 col-md-6">
    <!-- card -->
    <div class="card card-animate">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <div class="flex-grow-1 overflow-hidden"><a href="{{route('admin.'. $item['routeName'] . '.index')}}">
                    <p class="text-uppercase fw-medium text-muted text-truncate mb-0"> {{__('translate.'. $item['title'])}}</p></a>
                </div>

            </div>
            <div class="d-flex align-items-end justify-content-between mt-4">
                <div>
                    <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span class="counter-value" data-target="{{$item['count']}}">0</span> </h4>
                    {{-- <a href="{{route('admin.'. $item['routeName'] . '.index')}}" class="text-decoration-underline">{{__("translate.Redirect")}}</a> --}}
                </div>
                {{-- <div class="avatar-sm flex-shrink-0">
                    <span class="avatar-title bg-success-subtle rounded fs-3">
                        <i class="{{$item['icon']}} text-success"></i>
                    </span>
                </div> --}}
            </div>
        </div>
    </div>
</div>
