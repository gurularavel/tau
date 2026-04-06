{{-- CREATE --}}
<x-admin.layout>
    <!-- Begin page -->
    <div id="layout-wrapper">
        <x-admin.header />
        <x-admin.remove-notification />
        <x-admin.app-menu />

        <div class="vertical-overlay"></div>

        <x-admin.crud.main-content>
            <x-admin.crud.page-content>
                <x-admin.crud.page-title :title="$title" />

                <x-admin.crud.card :routeName="'programs.store'" :method="'post'" :routeNameForBackButton="'programs'">

                    <x-admin.crud.nav>
                        @foreach ($locales as $key => $locale)
                            <x-admin.crud.nav-item :locale="$locale" :key="$key" />
                        @endforeach
                        {{-- <x-admin.crud.summernote-editor-js :locales="$locales" :key="1" :height="'200'" /> --}}
                    </x-admin.crud.nav>

                    <x-admin.crud.tab-content>
                        @foreach ($locales as $key => $locale)
                            <x-admin.crud.tab-pane :key="$key">
                                <x-admin.crud.card-body-row>

                                    {{-- Basic Program Fields --}}
                                    <div class="mb-3 col-lg-12">
                                        <x-admin.crud.input :locale="$locale" :model="''" :columnName="'title'"
                                            :label="'title'" :placeholder="'Write a title'" :type="'text'"
                                            :required="true" />
                                    </div>

                                    {{-- <div class="mb-3 col-lg-12">
                                        <x-admin.crud.textarea :locale="$locale" :model="''" :columnName="'content'"
                                            :label="'content'" :summerNoteID="1" />
                                    </div> --}}

                                    <div class="mb-3 col-lg-4">
                                        <x-admin.crud.input :locale="$locale" :model="''" :columnName="'meta_title'"
                                            :label="'Meta title'" :placeholder="'Write a meta title'" :type="'text'"
                                            :required="false" />
                                    </div>

                                    <div class="mb-3 col-lg-4">
                                        <x-admin.crud.input :locale="$locale" :model="''" :columnName="'meta_description'"
                                            :label="'Meta description'" :placeholder="'Write a meta description'" :type="'text'"
                                            :required="false" />
                                    </div>

                                    <div class="mb-3 col-lg-4">
                                        <x-admin.crud.input :locale="$locale" :model="''" :columnName="'meta_keywords'"
                                            :label="'Meta keywords'" :placeholder="'Write a meta keywords'" :type="'text'"
                                            :required="false" />
                                    </div>



                                    <x-admin.crud.all-errors :errors="$errors" />



                                </x-admin.crud.card-body-row>
                            </x-admin.crud.tab-pane>
                        @endforeach
                    </x-admin.crud.tab-content>
                    <div class="card">
                        <div class="card-body row">

                            <div class="mb-3 col-lg-4">
                                <x-admin.crud.option :label="'Type'" :name="'type'" :model="$model"
                                    :options="[
                                        ['label' => __('translate.Simple page'), 'value' => 1],
                                        ['label' => __('translate.Program'), 'value' => 0],
                                    ]" :onchange="'toggleProgramMultiple(this)'" />
                            </div>
                            <div class="mb-3 col-lg-12" id="program-multiple-block" style="display:none;">

                                <x-admin.crud.option-multiple label="Programs" name="program_ids[]" :options="$programs"
                                    valueField="id" textField="description" :selected="$model->program_ids ?? []" :multiple="true" />
                            </div>


                        </div>
                    </div>

                    <x-admin.crud.image.card :title="$title">
                        <x-admin.crud.image.card-body>
                            <x-admin.crud.image.main-image :columnValue="''" :name="'image'" :folderName="'programs'" />
                            <div id="program-image2-block" style="display:none;">

                            <x-admin.crud.image.main-image :columnValue="''" :name="'image2'" :folderName="'programs'" />
                            </div>

                        </x-admin.crud.image.card-body>
                    </x-admin.crud.image.card>

                </x-admin.crud.card>

            </x-admin.crud.page-content>
        </x-admin.crud.main-content>

    </div>

    <x-admin.back-to-up />
    <x-admin.preloader />


</x-admin.layout>
<script>
    function toggleProgramMultiple(select) {
        let block = document.getElementById('program-multiple-block');
        let blockImage2 = document.getElementById('program-image2-block');

        if (select.value == '1') {
            block.style.display = 'block';
        } else {
            block.style.display = 'none';

        }
                if (select.value == '0') {
            blockImage2.style.display = 'block';
        } else {
            blockImage2.style.display = 'none';

        }
    }

    // səhifə açılarkən də yoxlasın (edit üçün)
    document.addEventListener('DOMContentLoaded', function() {
        let typeSelect = document.getElementById('product-type-input');
        if (typeSelect) {
            toggleProgramMultiple(typeSelect);
        }
    });
</script>
