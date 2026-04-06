@props(['title'])
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between bg-galaxy-transparent">
            <h4 class="mb-sm-0">{{__('translate.'.$title)}} </h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{route('admin.index')}}">{{__('translate.Dashboard')}}</a></li>
                    <li class="breadcrumb-item active">{{__('translate.'.$title)}}</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->
