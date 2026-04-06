@props([
    'label',
    'name',
    'options' => [],
    'valueField' => 'id',
    'textField' => 'description',
    'selected' => [],
    'multiple' => false,
])

<label class="form-label">{{ __('translate.' . $label) }}</label>
<select name="{{ $name }}" class="selectpicker form-control" {{ $multiple ? 'multiple' : '' }}>
    @foreach ($options as $option)
        <option value="{{ $option[$valueField] }}"
            @selected(collect(old($name, $selected))->contains($option[$valueField]))>
            {{ $option[$textField] }}
        </option>
    @endforeach
</select>
