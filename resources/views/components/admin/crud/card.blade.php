@props(['routeName', 'method', 'model', 'routeNameForBackButton' => null, 'backButtonURL' => null, 'frontRouteName' => null,'back' => true, 'pageStatus' => null, 'show' => false])
@if($pageStatus)
<style>
    .status-toggle {
        position: relative;
        width: 60px;
        height: 32px;
    }

    .status-toggle input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #d1d5db;
        border-radius: 34px;
        transition: background-color 0.3s ease;
        box-shadow: inset 0 0 4px rgba(0, 0, 0, 0.2);
    }

    .slider::before {
        content: "";
        position: absolute;
        height: 26px;
        width: 26px;
        left: 3px;
        bottom: 3px;
        background-color: white;
        border-radius: 50%;
        transition: transform 0.3s ease, background-color 0.3s ease;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
    }

    input:checked+.slider {
        background-color: #22c55e;
    }

    input:checked+.slider::before {
        transform: translateX(28px);
        background-color: #fff;
    }

    /* Hover effekti */
    .status-toggle:hover .slider {
        box-shadow: 0 0 8px rgba(34, 197, 94, 0.4);
    }
</style>
@endif
<div class="col-xxl-12">
    <div class="card">
        <div class="card-body">
            <form
                action="{{ route('admin.' . $routeName, $method === 'update' ? $model : null) }}"
                method="POST"
                enctype="multipart/form-data"
            >
                @csrf
                @if($method === 'update')
                    @method('PUT')
                @endif

                {{ $slot }}
                @if($pageStatus)

                <div class="d-flex align-items-center gap-3" style="margin-left: 5%; margin-bottom: 20px;">

                    <label class="status-toggle">
                        <input type="checkbox" id="statusToggle"
                            {{ isset($model) && $model->is_active ? 'checked' : '' }}>
                        <span class="slider"></span>
                    </label>

                    <span id="statusLabel" class="fw-semibold"
                        style="color: {{ isset($model) && $model->is_active ? '#22c55e' : '#9ca3af' }};">
                        {{ isset($model) && $model->is_active ? __('translate.active') : __('translate.inactive') }}
                    </span>
                </div>
                @endif

                <div class="text-end mb-3" style="margin-right: 5%;">

                    @if ($routeNameForBackButton)
                    <a href="{{route('admin.'. $routeNameForBackButton . '.index')}}" class="btn btn-light w-sm">{{__('translate.back')}}</a>
                    @elseif ($backButtonURL)
                    <a href="{{$backButtonURL}}" class="btn btn-light w-sm">{{__('translate.back')}}</a>
                    @elseif($back)
                    <a onclick="history.back();"  class="btn btn-light w-sm">{{__('translate.back')}}</a>
                    @endif
                    @if($frontRouteName)
                    <a target="_blank" href="{{ route('front.' . $frontRouteName,  $model->slug) }}" class="btn btn-light w-sm">{{__('translate.Show on site')}}</a>

                    @endif
                      @if($show)
                    <a  href="{{ route('admin.' . $routeName,  $model) }}" class="btn btn-light w-sm">{{__('translate.Page Design')}}</a>

                    @endif

                    <button type="submit" class="btn btn-success w-sm">{{__('translate.Submit')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>
@if($pageStatus)

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const toggle = document.getElementById('statusToggle');
        const label = document.getElementById('statusLabel');
        const message = document.getElementById('statusMessage');

        toggle.addEventListener('change', function() {
            const isActive = this.checked ? 1 : 0;

            fetch("{{ route('admin.change-status-' . $pageStatus . '.store') }}", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "Accept": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    },
                    body: JSON.stringify({
                        is_active: isActive
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        label.textContent = isActive ? "{{ __('translate.active') }}" :
                            "{{ __('translate.inactive') }}";
                        label.style.color = isActive ? "#22c55e" : "#9ca3af";
                        message.textContent = data.message;
                        message.style.display = "block";
                        message.style.color = "green";
                        setTimeout(() => message.style.display = "none", 2000);
                    } else {
                        throw new Error(data.message);
                    }
                })
                .catch(error => {
                    console.error("Error:", error);
                    message.textContent = "Error occurred!";
                    message.style.color = "red";
                    message.style.display = "block";
                });
        });
    });
</script>
@endif
