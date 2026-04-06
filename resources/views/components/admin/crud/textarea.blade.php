@props([
    'locale',
    'model',
    'columnName',
    'label',
    'summerNoteID' => false,
    'rowCount' => '5',
    'required' => false,
])

<label>
    {{$label}}
    @if($required)
        <span class="text-danger">*</span>
    @endif
</label>

<textarea
    class="form-control"
    name="{{ $columnName }}:{{ $locale }}"
    rows="{{ $rowCount }}"
    @if($summerNoteID) id="summary-ckeditor-{{ $locale }}-{{ $summerNoteID }}" @endif
    {{-- @if($required) required @endif --}}
>{{ old("$columnName:$locale", $model ? $model->{"$columnName:$locale"} : '') }}</textarea>
@error($locale ? "$columnName:$locale" : $columnName)
    <div class="text-danger small mt-1">{{ $message }}</div>
@enderror
