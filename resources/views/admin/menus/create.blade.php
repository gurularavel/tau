<x-admin.layout>

    <style>
        .menu-hidden {
            display: none !important;
        }
    </style>

    <!-- Begin page -->
    <div id="layout-wrapper">

        <x-admin.header />

        <x-admin.remove-notification />

        <x-admin.app-menu />

        <div class="vertical-overlay"></div>

        <x-admin.crud.main-content>

            <x-admin.crud.page-content>

                <x-admin.crud.page-title :title="$title" />

                <x-admin.crud.card :routeName="'menus.store'" :method="'post'" :routeNameForBackButton="'menus'">

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
                                        <x-admin.crud.input :locale="$locale" :model="''" :columnName="'title'"
                                            :label="'Title'" :placeholder="'Write a title'" :type="'text'" :required="true" />
                                    </div>
                                    <x-admin.crud.all-errors :errors="$errors" />
                                </x-admin.crud.card-body-row>
                            </x-admin.crud.tab-pane>
                        @endforeach
                    </x-admin.crud.tab-content>

                    <div class="card">
    <div class="card-body row">
        {{-- Menu Level Selection --}}
        <div class="mb-3 col-lg-4">
            <label class="form-label">{{ __('translate.Menu Level') }}</label>
            <select id="menu-level" class="form-select">
                <option value="main" {{ ($model && !$model->parent_id) ? 'selected' : '' }}>{{ __('translate.Main Menu') }}</option>
                <option value="sub" {{ ($model && $model->parent_id) ? 'selected' : '' }}>{{ __('translate.Sub Menu') }}</option>
            </select>
        </div>

        {{-- Parent Menu --}}
        <div class="mb-3 col-lg-4 menu-field menu-field-parent menu-hidden">
            <label class="form-label">{{ __('translate.Parent Menu') }}</label>
            <select name="parent_id" id="parent-menu" class="form-select">
                <option value="">{{ __('translate.Select parent menu') }}</option>
                @foreach ($menus->whereNull('parent_id') as $menu)
                    <option value="{{ $menu->id }}" {{ ($model && $model->parent_id == $menu->id) ? 'selected' : '' }}>
                        {{ $menu->title }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Type --}}
        {{-- <div class="mb-3 col-lg-4 menu-field menu-field-type menu-hidden">
            <label class="form-label">{{ __('translate.Type') }}</label>
            <select name="type" id="menu-type" class="form-select">
                <option value="link" {{ ($model && $model->type=='link') ? 'selected' : '' }}>Link</option>
                <option value="text_block" {{ ($model && $model->type=='text_block') ? 'selected' : '' }}>Text block</option>
                <option value="image_block" {{ ($model && $model->type=='image_block') ? 'selected' : '' }}>Image block</option>
                <option value="small_block" {{ ($model && $model->type=='small_block') ? 'selected' : '' }}>Small block</option>
            </select>
        </div> --}}

        {{-- Slug --}}
        <div class="mb-3 col-lg-4 menu-field menu-field-slug">
            <x-admin.crud.input :locale="''" :model="$model" :columnName="'slug'" :label="'Slug'" :placeholder="'Write a slug'" :type="'text'" />
        </div>

        {{-- Sorting (Həmişə görünür) --}}
        {{-- <div class="mb-3 col-lg-4">
            <x-admin.crud.input :locale="''" :model="$model" :columnName="'order'" :placeholder="'Write sorting'" :label="'Sorting'" :type="'text'" :automaticValueFill="$latestSorting" />
        </div> --}}
    </div>
</div>

{{-- Image Card (Dinamik gizlənir) --}}
<div class="menu-field menu-field-image menu-hidden">
    <x-admin.crud.image.card :title="__('translate.Menu Image')">
        <x-admin.crud.image.card-body>
            <x-admin.crud.image.main-image
                :columnValue="$model ? $model->image : ''"
                :name="'image'"
                :folderName="'menus'" />
        </x-admin.crud.image.card-body>
    </x-admin.crud.image.card>
</div>



{{-- Image sahəsi --}}
<div class="menu-field menu-field-image menu-hidden">
    <x-admin.crud.image.card :title="'Menu Image'">
        <x-admin.crud.image.card-body>
            <x-admin.crud.image.main-image
                :columnValue="''"
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
    const typeWrapper = document.querySelector('.menu-field-type');
    const slugWrapper = document.querySelector('.menu-field-slug');
    const imageWrapper = document.querySelector('.menu-field-image');

    function updateForm() {
        const level = menuLevelSelect.value;

        if (level === 'main') {
            // Əsas menyudursa hər şeyi gizlə
            parentWrapper.classList.add('menu-hidden');
            typeWrapper.classList.add('menu-hidden');
            slugWrapper.classList.add('menu-hidden');
            imageWrapper.classList.add('menu-hidden');
            parentSelect.value = ''; // bazaya boş getsin
        } else {
            // Alt menyudursa Parent və Type göstər
            parentWrapper.classList.remove('menu-hidden');
            typeWrapper.classList.remove('menu-hidden');
            updateTypeFields(); // Type-a görə şəkil/slug tənzimlə
        }
    }

    function updateTypeFields() {
        const type = typeSelect.value;
        const level = menuLevelSelect.value;

        // Əgər alt menyu deyilsə heç nə etmə
        if (level !== 'sub') return;

        // Default gizlə
        slugWrapper.classList.add('menu-hidden');
        imageWrapper.classList.add('menu-hidden');

        switch(type) {
            case 'link':
                slugWrapper.classList.remove('menu-hidden');
                break;
            case 'image_block':
            case 'small_block':
                imageWrapper.classList.remove('menu-hidden');
                slugWrapper.classList.remove('menu-hidden');
                break;
            case 'text_block':
                // yalnız title
                break;
        }
    }

    menuLevelSelect.addEventListener('change', updateForm);
    typeSelect.addEventListener('change', updateTypeFields);

    // Başlanğıc vəziyyəti qur
    updateForm();
});
</script> --}}
