@props(['count'])
<td class="id">
    <a href="javascript:void(0);" onclick="ViewTickets(this)" data-id="{{$count}}"
        class="fw-medium link-primary">{{$count}}</a>
</td>
