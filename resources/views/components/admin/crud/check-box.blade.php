@props(['model', 'name', 'label'])
<th scope="col" style="width: 40px">
    <div class="form-check">
        <input type="hidden" name="{{$name}}" value="0">

        <input id="{{$name}}" class="form-check-input" type="checkbox" value="1" name="{{$name}}" @checked(old($name, $model->$name)) />
        <label for="{{$name}}">{{__('translate.'. $label)}}</label><br>
    </div>

</th>
