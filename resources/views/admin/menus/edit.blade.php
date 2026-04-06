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
                            <div class="mb-3 col-lg-4">
                                <label class="form-label">{{ __('translate.Menu Level') }}</label>
                                <select id="menu-level" class="form-select">
                                    <option value="main" {{ $model && !$model->parent_id ? 'selected' : '' }}>{{ __('translate.Main Menu') }}</option>
                                    <option value="sub" {{ $model && $model->parent_id ? 'selected' : '' }}>{{ __('translate.Sub Menu') }}</option>
                                </select>
                            </div>

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

                            <div class="mb-3 col-lg-4 menu-field menu-field-slug">
                                <x-admin.crud.input
                                    :locale="''"
                                    :model="$model"
                                    :columnName="'slug'"
                                    :label="'Slug'"
                                    :placeholder="'Write a slug'"
                                    :type="'text'" />
                            </div>
                        </div>
                    </div>

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

<script>
document.addEventListener('DOMContentLoaded', function () {
    const menuLevelSelect = document.getElementById('menu-level');
    const parentSelect = document.getElementById('parent-menu');
    const parentWrapper = document.querySelector('.menu-field-parent');
    const slugFields = document.querySelectorAll('.menu-field-slug');
    const imageFields = document.querySelectorAll('.menu-field-image');

    function updateUI() {
        const level = menuLevelSelect.value;
        const parentId = parentSelect.value;

        if (level === 'main') {
            parentWrapper.classList.add('menu-hidden');
            // Əsas menyu seçiləndə slug həmişə görünsün
            slugFields.forEach(el => el.classList.remove('menu-hidden'));
        } else {
            parentWrapper.classList.remove('menu-hidden');
            // Alt menyu seçilibsə və valideyn yoxdursa bəzi sahələri gizlədə bilərsiz
            if (!parentId) {
                slugFields.forEach(el => el.classList.add('menu-hidden'));
            } else {
                slugFields.forEach(el => el.classList.remove('menu-hidden'));
            }
        }
    }

    menuLevelSelect.addEventListener('change', function() {
        if (this.value === 'main') {
            parentSelect.value = '';
        }
        updateUI();
    });

    parentSelect.addEventListener('change', updateUI);

    // Səhifə ilk dəfə açılanda vəziyyəti yoxla
    updateUI();
});
</script>
