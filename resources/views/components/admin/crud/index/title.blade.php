@props(['columnName',  'hyperlinkValue' => null, 'limitValue' => 100, 'icon' => null, 'iconSize' => '40'])
<td class="tasks_name">
        <i class="{{$icon}}" style="font-size: {{$iconSize}}px;"></i>
    @if ($hyperlinkValue)
        <a target="_blank" href="{{ $hyperlinkValue }}">{{$columnName}}</a>
    @else
         {{ truncateText($columnName, $limitValue)}}
    @endif
</td>
