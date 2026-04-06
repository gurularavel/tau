<x-admin.layout>

    <style>
        .menu-hidden {
            display: none !important;
        }
    </style>

    <div id="layout-wrapper">

        <x-admin.header />

        <x-admin.remove-notification />
        <x-admin.crud.success-message :delay="'5000'" />

        <x-admin.app-menu />

        <div class="vertical-overlay"></div>

        <x-admin.crud.main-content>

            <x-admin.crud.page-content>

                <x-admin.crud.page-title :title="$title" />

                {{-- Edit və Create üçün card --}}
                <x-admin.crud.card :routeName="'menus.update'" :method="'update'" :model="$model" :routeNameForBackButton="'menus'">

                    <x-admin.crud.nav>
                        @foreach ($locales as $key => $locale)
                            <x-admin.crud.nav-item :locale="$locale" :key="$key" />
                        @endforeach
                    </x-admin.crud.nav>

                    <x-admin.crud.tab-content>
                        @foreach ($locales as $key => $locale)
                            <x-admin.crud.tab-pane :key="$key">
                                <x-admin.crud.card-body-row>
                                    <div class="mb-3 col-lg-12 menu-field menu-field-title">
                                        <x-admin.crud.input
                                            :locale="$locale"
                                            :model="$model"
                                            :columnName="'title'"
                                            :label="'Title'"
                                            :placeholder="'Write a title'"
                                            :type="'text'"
                                            :required="true" />
                                    </div>
                                    <x-admin.crud.all-errors :errors="$errors" />
                                </x-admin.crud.card-body-row>
                            </x-admin.crud.tab-pane>
                        @endforeach
                    </x-admin.crud.tab-content>

                    <div class="card">
                        <div class="card-body row">

                            {{-- Menu Level --}}
                            <div class="mb-3 col-lg-4">
                                <label class="form-label">{{ __('translate.Menu Level') }}</label>
                                <select id="menu-level" class="form-select">
                                    <option value="main" {{ $model && !$model->parent_id ? 'selected' : '' }}>{{ __('translate.Main Menu') }}</option>
                                    <option value="sub" {{ $model && $model->parent_id ? 'selected' : '' }}>{{ __('translate.Sub Menu') }}</option>
                                </select>
                            </div>

                            {{-- Parent menu --}}
                            <div class="mb-3 col-lg-4 menu-field menu-field-parent menu-hidden">
                                <label class="form-label">{{ __('translate.Parent Menu') }}</label>
                                <select name="parent_id" id="parent-menu" class="form-select">
                                    <option value="">{{ __('translate.Select parent menu') }}</option>
                                    @foreach ($menus->whereNull('parent_id') as $menu)
                                        <option value="{{ $menu->id }}"
                                            {{ $model && $model->parent_id == $menu->id ? 'selected' : '' }}>
                                            {{ $menu->title }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>


                            {{-- Type dropdown --}}
                            {{-- <div class="mb-3 col-lg-4 menu-field menu-field-type menu-hidden">
                                <label class="form-label">{{ __('translate.Type') }}</label>
                                <select name="type" id="menu-type" class="form-select">
                                    <option value="link" {{ $model && $model->type=='link' ? 'selected' : '' }}>Link</option>
                                    <option value="text_block" {{ $model && $model->type=='text_block' ? 'selected' : '' }}>Text block</option>
                                    <option value="image_block" {{ $model && $model->type=='image_block' ? 'selected' : '' }}>Image block</option>
                                    <option value="small_block" {{ $model && $model->type=='small_block' ? 'selected' : '' }}>Small block</option>
                                </select>
                            </div> --}}

                            {{-- Slug --}}
                            <div class="mb-3 col-lg-4 menu-field menu-field-slug">
                                <x-admin.crud.input
                                    :locale="''"
                                    :model="$model"
                                    :columnName="'slug'"
                                    :label="'Slug'"
                                    :placeholder="'Write a slug'"
                                    :type="'text'" />
                            </div>

                            {{-- Sorting --}}
                            {{-- <div class="mb-3 col-lg-4">
                                <x-admin.crud.input
                                    :locale="''"
                                    :model="$model"
                                    :columnName="'order'"
                                    :label="'Sorting'"
                                    :placeholder="'Write a sorting'"
                                    :type="'text'"
                                    :required="false"
                                    :automaticValueFill="$latestSorting" />
                            </div> --}}

                        </div>
                    </div>

                    {{-- Image - Dinamik Gizlənən/Açılan sahə --}}
                   {{-- Image sahəsi --}}
<div class="menu-field menu-field-image {{ ($model && ($model->type == 'image_block' || $model->type == 'small_block')) ? '' : 'menu-hidden' }}">
    <x-admin.crud.image.card :title="'Menu Image'">
        <x-admin.crud.image.card-body>
            <x-admin.crud.image.main-image
                :columnValue="$model ? $model->image : ''"
                :name="'image'"
                :folderName="'menus'" />
        </x-admin.crud.image.card-body>
    </x-admin.crud.image.card>
</div>

                </x-admin.crud.card>

            </x-admin.crud.page-content>
        </x-admin.crud.main-content>

    </div>

    <x-admin.back-to-up />
    <x-admin.preloader />

</x-admin.layout>

{{-- <script>
document.addEventListener('DOMContentLoaded', function () {

    const menuLevelSelect = document.getElementById('menu-level');
    const parentSelect = document.getElementById('parent-menu');
    const typeSelect = document.getElementById('menu-type');

    const parentWrapper = document.querySelector('.menu-field-parent');
    const slugFields = document.querySelectorAll('.menu-field-slug');
    const typeFields = document.querySelectorAll('.menu-field-type');
    const imageFields = document.querySelectorAll('.menu-field-image');

    const childMenus = @json($menus->map(function($m){
        return ['id'=>$m->id, 'title'=>$m->title, 'parent_id'=>$m->parent_id];
    }));

    function hideAllFields() {
        [...slugFields, ...imageFields, ...typeFields].forEach(el => el.classList.add('menu-hidden'));
        parentWrapper.classList.add('menu-hidden');
    }

    function showFields(fields) {
        fields.forEach(el => el.classList.remove('menu-hidden'));
    }

    function updateByMenuLevel() {
        const level = menuLevelSelect.value;
        hideAllFields();

        if (level === 'main') {
            parentSelect.value = '';
        } else {
            showFields([parentWrapper]);
        }
        updateByParent();
    }

    function updateByParent() {
        const parentId = parentSelect.value;
        [...typeFields, ...slugFields, ...imageFields].forEach(el => el.classList.add('menu-hidden'));

        if (!parentId) return;

        showFields(typeFields);
        showFields(slugFields);



        updateByType();
    }

function updateByType() {
    const type = typeSelect.value;

    // Əvvəlcə bütün şəkil sahələrini gizlət
    imageFields.forEach(el => el.classList.add('menu-hidden'));

    // Seçilmiş tipə görə şəkil sahəsini göstər
    if (type === 'image_block' || type === 'small_block') {
        showFields(imageFields);
    }

    if (type === 'link') {
        showFields(slugFields);
    }
}

    menuLevelSelect.addEventListener('change', updateByMenuLevel);
    parentSelect.addEventListener('change', updateByParent);
    typeSelect.addEventListener('change', updateByType);

    // Səhifə yüklənəndə mövcud dataya görə formanı qur
    updateByMenuLevel();
});
</script> --}}
