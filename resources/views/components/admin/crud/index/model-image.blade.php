@props(['model', 'imageName'])

@if($model)
    <td>
        <img style="border-radius: 5px;"  height="100px;" width="150px;" src="{{$model->getFirstMediaUrl($imageName) ?: asset('/assets/admin/images/no-image-event.jpg') }}" alt="{{$model->title}}">
    </td>
@endif
