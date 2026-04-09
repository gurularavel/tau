<x-admin.layout>

    <div id="layout-wrapper">
        <x-admin.header />
        <x-admin.remove-notification />
        <x-admin.app-menu />
        <div class="vertical-overlay"></div>

        <x-admin.crud.main-content>
            <x-admin.crud.page-content>
                <x-admin.crud.page-title :title="$title" />

                {{-- ═══ Main page form ═══ --}}
                <x-admin.crud.card
                    :routeName="'historyPage.update'"
                    :method="'update'"
                    :model="$model"
                    :routeNameForBackButton="''"
                    :frontRouteName="'historyPage.index'"
                >
                    {{-- Language tabs --}}
                    <x-admin.crud.nav>
                        @foreach ($locales as $key => $locale)
                            <x-admin.crud.nav-item :locale="$locale" :key="$key" />
                        @endforeach
                    </x-admin.crud.nav>

                    <x-admin.crud.tab-content>
                        <x-admin.crud.success-message :delay="'5000'" />

                        @foreach ($locales as $key => $locale)
                            <x-admin.crud.tab-pane :key="$key">
                                <x-admin.crud.card-body-row>

                                    {{-- About header --}}
                                    <div class="col-12"><h6 class="text-muted fw-bold mb-2">About Header</h6></div>
                                    <div class="mb-3 col-lg-6">
                                        <x-admin.crud.input :locale="$locale" :model="$model" :columnName="'title'"
                                            :label="'Title (h2)'" :placeholder="'TAU haqqında'" :type="'text'" :required="false" />
                                    </div>
                                    <div class="mb-3 col-lg-6">
                                        <x-admin.crud.input :locale="$locale" :model="$model" :columnName="'description'"
                                            :label="'Description (p)'" :placeholder="'Subtitle description'" :type="'text'" :required="false" />
                                    </div>

                                    {{-- About container (red box) --}}
                                    <div class="col-12 mt-2"><h6 class="text-muted fw-bold mb-2">About Container (Red Box)</h6></div>
                                    <div class="mb-3 col-lg-6">
                                        <x-admin.crud.input :locale="$locale" :model="$model" :columnName="'subtitle'"
                                            :label="'Subtitle (h3)'" :placeholder="'Türk-Azərbaycan Universiteti'" :type="'text'" :required="false" />
                                    </div>
                                    <div class="mb-3 col-lg-6">
                                        <x-admin.crud.input :locale="$locale" :model="$model" :columnName="'content'"
                                            :label="'Content (p)'" :placeholder="'Main text...'" :type="'text'" :required="false" />
                                    </div>

                                    {{-- Stats labels --}}
                                    <div class="col-12 mt-2"><h6 class="text-muted fw-bold mb-2">Stats Labels</h6></div>
                                    <div class="mb-3 col-lg-3">
                                        <x-admin.crud.input :locale="$locale" :model="$model" :columnName="'stat1_label'"
                                            :label="'Stat 1 Label'" :placeholder="'Tərəfdaş'" :type="'text'" :required="false" />
                                    </div>
                                    <div class="mb-3 col-lg-3">
                                        <x-admin.crud.input :locale="$locale" :model="$model" :columnName="'stat2_label'"
                                            :label="'Stat 2 Label'" :placeholder="'Tələbə'" :type="'text'" :required="false" />
                                    </div>
                                    <div class="mb-3 col-lg-3">
                                        <x-admin.crud.input :locale="$locale" :model="$model" :columnName="'stat3_label'"
                                            :label="'Stat 3 Label'" :placeholder="'Müəllim'" :type="'text'" :required="false" />
                                    </div>
                                    <div class="mb-3 col-lg-3">
                                        <x-admin.crud.input :locale="$locale" :model="$model" :columnName="'stat4_label'"
                                            :label="'Stat 4 Label'" :placeholder="'Proqram'" :type="'text'" :required="false" />
                                    </div>

                                    {{-- Meta --}}
                                    <div class="col-12 mt-2"><h6 class="text-muted fw-bold mb-2">SEO</h6></div>
                                    <div class="mb-3 col-lg-4">
                                        <x-admin.crud.input :locale="$locale" :model="$model" :columnName="'meta_title'"
                                            :label="'Meta Title'" :placeholder="'Meta title'" :type="'text'" :required="false" />
                                    </div>
                                    <div class="mb-3 col-lg-4">
                                        <x-admin.crud.input :locale="$locale" :model="$model" :columnName="'meta_description'"
                                            :label="'Meta Description'" :placeholder="'Meta description'" :type="'text'" :required="false" />
                                    </div>
                                    <div class="mb-3 col-lg-4">
                                        <x-admin.crud.input :locale="$locale" :model="$model" :columnName="'meta_keywords'"
                                            :label="'Meta Keywords'" :placeholder="'Meta keywords'" :type="'text'" :required="false" />
                                    </div>

                                    <x-admin.crud.all-errors :errors="$errors" />
                                </x-admin.crud.card-body-row>
                            </x-admin.crud.tab-pane>
                        @endforeach
                    </x-admin.crud.tab-content>

                    {{-- Stat values (non-translatable) --}}
                    <div class="card mt-3">
                        <div class="card-header"><h5 class="mb-0">Stat Values</h5></div>
                        <div class="card-body row">
                            @foreach (['stat1_value','stat2_value','stat3_value','stat4_value'] as $i => $stat)
                                <div class="mb-3 col-lg-3">
                                    <label class="form-label">Stat {{ $i+1 }} Value</label>
                                    <input type="text" name="{{ $stat }}" class="form-control"
                                        value="{{ old($stat, $model?->{$stat}) }}" placeholder="e.g. 4 or 5K+" />
                                </div>
                            @endforeach
                        </div>
                    </div>

                    {{-- Images --}}
                    <x-admin.crud.image.card :title="'Images'">
                        <x-admin.crud.image.card-body>
                            <x-admin.crud.image.main-image :columnValue="$model?->breadcrumb" :name="'breadcrumb'" :folderName="'history_page'" :title="'Breadcrumb'" />
                            <x-admin.crud.image.main-image :columnValue="$model?->image1"     :name="'image1'"     :folderName="'history_page'" :title="'Image 1 (top-left)'" />
                            <x-admin.crud.image.main-image :columnValue="$model?->image2"     :name="'image2'"     :folderName="'history_page'" :title="'Image 2 (top-right)'" />
                            <x-admin.crud.image.main-image :columnValue="$model?->image3"     :name="'image3'"     :folderName="'history_page'" :title="'Image 3 (bottom-left)'" />
                            <x-admin.crud.image.main-image :columnValue="$model?->image4"     :name="'image4'"     :folderName="'history_page'" :title="'Image 4 (bottom-right)'" />
                        </x-admin.crud.image.card-body>
                    </x-admin.crud.image.card>

                </x-admin.crud.card>

                {{-- ═══ Info Cards Section ═══ --}}
                <div class="col-xxl-12 mt-4">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="mb-0"><i class="ri-information-line me-2"></i>Info Cards (.infos section)</h5>
                            <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#addInfoModal">
                                <i class="ri-add-line"></i> Add Info Card
                            </button>
                        </div>
                        <div class="card-body">
                            @if ($infos->isEmpty())
                                <p class="text-muted text-center">No info cards yet.</p>
                            @else
                                @foreach ($infos as $info)
                                    <div class="card mb-3 border">
                                        <div class="card-header d-flex justify-content-between align-items-center py-2">
                                            <span><strong>{{ $info->title ?? '(no title)' }}</strong> &nbsp; <small class="text-muted">order: {{ $info->order }}</small></span>
                                            <div class="d-flex gap-2">
                                                <button type="button" class="btn btn-sm btn-outline-primary"
                                                    data-bs-toggle="modal" data-bs-target="#editInfoModal{{ $info->id }}">
                                                    <i class="ri-edit-line"></i>
                                                </button>
                                                <form method="POST" action="{{ route('admin.historyPage.infos.destroy', $info) }}"
                                                    onsubmit="return confirm('Delete this info card?')">
                                                    @csrf @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-outline-danger">
                                                        <i class="ri-delete-bin-line"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="card-body row align-items-center">
                                            @if ($info->icon)
                                                <div class="col-auto">
                                                    <img src="{{ asset('uploads/history_page_infos/' . $info->icon) }}"
                                                        width="48" height="48" style="object-fit:contain;" />
                                                </div>
                                            @endif
                                            <div class="col">
                                                <p class="mb-0 text-muted">{!! Str::limit($info->description, 120) !!}</p>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Edit modal for this info --}}
                                    <div class="modal fade" id="editInfoModal{{ $info->id }}" tabindex="-1">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <form method="POST" action="{{ route('admin.historyPage.infos.update', $info) }}"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Edit Info Card</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label class="form-label">Order</label>
                                                            <input type="number" name="order" class="form-control" value="{{ $info->order }}" />
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Icon (SVG/PNG, 48×48)</label>
                                                            @if ($info->icon)
                                                                <div class="mb-2">
                                                                    <img src="{{ asset('uploads/history_page_infos/' . $info->icon) }}"
                                                                        width="48" height="48" />
                                                                </div>
                                                            @endif
                                                            <input type="file" name="icon" class="form-control" accept="image/*" />
                                                        </div>
                                                        @foreach ($locales as $lk => $locale)
                                                            <h6 class="text-muted fw-bold">{{ strtoupper($locale) }}</h6>
                                                            <div class="mb-3">
                                                                <label class="form-label">Title</label>
                                                                <input type="text" name="title:{{ $locale }}" class="form-control"
                                                                    value="{{ old("title:$locale", $info->translate($locale)?->title) }}" />
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label">Description</label>
                                                                <textarea name="description:{{ $locale }}" class="form-control" rows="3">{{ old("description:$locale", $info->translate($locale)?->description) }}</textarea>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                                                        <button type="submit" class="btn btn-success">Save</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>

            </x-admin.crud.page-content>
        </x-admin.crud.main-content>
    </div>

    {{-- Add Info Modal --}}
    <div class="modal fade" id="addInfoModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form method="POST" action="{{ route('admin.historyPage.infos.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Add Info Card</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Icon (SVG/PNG, 48×48)</label>
                            <input type="file" name="icon" class="form-control" accept="image/*" />
                        </div>
                        @foreach ($locales as $lk => $locale)
                            <h6 class="text-muted fw-bold">{{ strtoupper($locale) }}</h6>
                            <div class="mb-3">
                                <label class="form-label">Title</label>
                                <input type="text" name="title:{{ $locale }}" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Description</label>
                                <textarea name="description:{{ $locale }}" class="form-control" rows="3"></textarea>
                            </div>
                        @endforeach
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <x-admin.back-to-up />
    <x-admin.preloader />

</x-admin.layout>
