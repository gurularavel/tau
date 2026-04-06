@props(['columnName', 'folderName'])

<td>
    @php
        $extension = strtolower(pathinfo($columnName, PATHINFO_EXTENSION));
    @endphp

    @switch($extension)
        @case('jpg')
        @case('jpeg')
        @case('png')
        @case('gif')
            {!! image($folderName, $columnName, 150, null, null, 'border-radius:10px; cursor: zoom-in;') !!}
            @break

        @case('mp4')
        @case('mov')
        @case('webm')
            {!! video($folderName, $columnName, 150, null, null, 'border-radius:10px; cursor: zoom-in;') !!}
            @break

        @default
    @endswitch
</td>
