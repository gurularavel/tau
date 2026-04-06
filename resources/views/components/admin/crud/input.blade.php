@props(['locale', 'model', 'columnName', 'label', 'placeholder', 'type', 'required' => false, 'info' => null, 'automaticValueFill' => null])

<label class="form-label flex items-center gap-1">
     {{$label}}
    @if($required)
        <span class="text-danger">*</span>
    @endif

    @if($info)
        <span
            class="ms-1 text-muted cursor-pointer"
            data-bs-toggle="tooltip"
            data-bs-placement="top"
            title="{{ $info }}"
        >
            <i class="fa fa-info-circle"></i>
        </span>
    @endif
</label>


<input
    type="{{ $type }}"

    @if($locale)
        name="{{$columnName}}:{{$locale}}"
        value="{{ old("$columnName:$locale", $model ? $model->{"$columnName:$locale"} : '') }}"

    @elseif($automaticValueFill)
        name="{{$columnName}}"
        value="{{ old($columnName, $automaticValueFill) }}"

    @else
        @php
            $val = old($columnName);

            if (!$val && $model && $model->$columnName) {
                if ($type === 'date') {
                    $val = \Carbon\Carbon::parse($model->$columnName)->format('Y-m-d');
                } elseif ($type === 'datetime-local') {
                    $val = \Carbon\Carbon::parse($model->$columnName)->format('Y-m-d\TH:i');
                } else {
                    $val = $model->$columnName;
                }
            }
        @endphp

        name="{{ $columnName }}"
        value="{{ $val }}"
    @endif

    class="form-control @error($locale ? "$columnName:$locale" : $columnName) is-invalid @enderror"
    placeholder="{{ __("translate." . $placeholder) }}"
>


@error($locale ? "$columnName:$locale" : $columnName)
    <div class="text-danger small mt-1">{{ $message }}</div>
@enderror
