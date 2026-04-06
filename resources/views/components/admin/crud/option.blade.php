@props(['label', 'name', 'model', 'options', 'request' => null, 'required' => false, 'onchange' => null])

<label class="form-label" for="product-{{ $name }}-input">
   {{$label}}
    @if($required)
        <span class="text-danger">*</span>
    @endif
</label>

<select
    name="{{ $name }}"
    id="product-{{ $name }}-input"
    class="form-select @error($name) is-invalid @enderror"
    data-choices
    data-choices-search-false
    {{ $required ? 'required' : '' }}

@if($onchange) onchange="{{ $onchange }}" @endif>
    @foreach ($options as $option)
        <option
            value="{{ $option['value'] }}"
            {{ (old($name) ?? $model->$name ?? $request) == $option['value'] ? 'selected' : '' }}>
            {{ $option['label'] }}
        </option>
    @endforeach
</select>

@error($name)
    <div class="text-danger small mt-1">{{ $message }}</div>
@enderror
