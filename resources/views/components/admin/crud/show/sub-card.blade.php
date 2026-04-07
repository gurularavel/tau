@props([
    'title',
    'route',
    'thArray',
    'models',
    'tdArray',
    'mainRouteName',
    'folderName',
    'frontRouteName' => null,
    'delete' => false,
    'add' => true,
    'edit' => true,
    'view' => true,
])

<div class="card">
    <div class="card-body">
        <div class="row g-4">
            <div class="col-lg-12">
                <div class="card-header border-0">
                    <div class="d-flex align-items-center">
                        <h5 class="card-title mb-0 flex-grow-1"><a
                                href="{{ route('admin.' . $mainRouteName . '.index') }}">{{ __('translate.' . $title) }}</a>
                        </h5>
                        <div class="flex-shrink-0">
                            <div class="d-flex flex-wrap gap-2">
                                @if ($add)
                                    <button class="btn btn-danger add-btn"
                                        onclick="window.location.href='{{ $route }}'">
                                        <i class="ri-add-line align-bottom me-1"></i> {{ __('translate.add') }}
                                    </button>
                                @endif


                            </div>
                        </div>
                    </div>
                </div>

                <div class="product-content mt-2" id="{{ $mainRouteName }}">
                    <div class="tab-pane">
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead>
                                    <tr>
                                        <th style="width: 10px;">No</th>
                                        @foreach ($thArray as $thValue)
                                            <th style="width: 200px;">{{ __('translate.' . $thValue) }}</th>
                                        @endforeach
                                        <th style="width: 5px;">{{ __('translate.Actions') }}</th>



                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($models as $index => $model)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            @foreach ($tdArray as $tdValue)
                                                @switch($tdValue)
                                                    @case('cv')
                                                        <td>
                                                            <a href="{{ asset('uploads/vacancies/' . $model->cv) }}"
                                                                target="_blank">
                                                                {{ $model->cv }}
                                                            </a>
                                                        </td>
                                                    @break

                                                    @case('image')
                                                        <td>{!! image($folderName ?? $mainRouteName, $model->image, 100, null, null, 'cursor:zoom-in;') !!}</td>
                                                    @break

                                                    @case('file')
                                                        <td>
                                                            {!! fileView(
                                                                $folderName ?? $mainRouteName,
                                                                $model->file,
                                                                null,
                                                                $model->title,
                                                                'cursor-pointer',
                                                                'width:100px max-width:120px; height:60px; border-radius:10px;',
                                                                'file.png',
                                                            ) !!}

                                                        </td>
                                                    @break

                                                    @case('title')
                                                        <td>
                                                            <a target="_blank"
                                                                href="{{ route('admin.' . $mainRouteName . '.show', $model) }}">
                                                                {{ truncateText($model->title, 100) }}
                                                            </a>
                                                        </td>
                                                    @break

                                                    @case('slug')
                                                        <td>
                                                            <a
                                                                @if ($frontRouteName) target="_blank"
                                                                href="{{ route('front.' . $frontRouteName, $model) }}" @endif>
                                                                {{ $model->slug }}
                                                            </a>
                                                        </td>
                                                    @break

                                                    @case('code')
                                                        <td>
                                                            <div style="background: {{ $model->code ?? '' }}" class="circle">
                                                            </div>{{ $model->code ?? '' }}
                                                        </td>
                                                    @break

                                                    @case('image_type')
                                                        <td>

                                                            @if ($model->image_type == 1)
                                                                {{ __('translate.long') }}
                                                            @else
                                                                {{ __('translate.short') }}
                                                            @endif
                                                        </td>
                                                    @break

                                                    @case('is_active')
                                                        <td>

                                                            {!! approveDecline($model->is_active) !!}
                                                        </td>
                                                    @break

                                                    @case('actions')
                                                        <x-admin.crud.index.actions :model="$model" :routeName="$mainRouteName"
                                                            :td="true" :view="$view" :delete="$delete"
                                                            :edit="$edit" :frontRouteName="$frontRouteName" :deleteFileName="'cv'" />
                                                    @break

                                                    @default
                                                        <td>{!! nl2br(e($model->$tdValue ?? '')) !!}</td>
                                                @endswitch
                                            @endforeach


                                        </tr>
                                    @endforeach

                                </tbody>


                            </table>


                        </div>
                             <h5 class="card-title mb-0 flex-grow-1" style="text-align: center; padding: 1%;"><a
                                href="{{ route('admin.' . $mainRouteName . '.index') }}">{{ __('translate.More') }} {{ __('translate.' . $title) }}</a>
                                  </h5>
                    </div>
                </div>
            </div>
        </div>
        <!--end col-->
    </div>
    <!--end row-->
</div><!--end card-->
