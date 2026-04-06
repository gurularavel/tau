<x-admin.layout>

    <div id="layout-wrapper">

        <x-admin.header />

        <x-admin.remove-notification />

        <x-admin.app-menu />

        <div class="vertical-overlay"></div>

        <x-admin.crud.main-content>
            <x-admin.crud.page-content>

                <x-admin.crud.page-title :title="$title" />

                <x-admin.crud.card :routeName="'vacancies.store'" :method="'post'" :routeNameForBackButton="'vacancies'">

                    <x-admin.crud.nav>
                        @foreach ($locales as $key => $locale)
                            <x-admin.crud.nav-item :locale="$locale" :key="$key" />
                        @endforeach
                        <x-admin.crud.summernote-editor-js :locales="$locales" :key="1" :height="'200'" />
                    </x-admin.crud.nav>

                    <x-admin.crud.tab-content>
                        @foreach ($locales as $key => $locale)
                            <x-admin.crud.tab-pane :key="$key">
                                <x-admin.crud.card-body-row>

                                    <div class="mb-3 col-lg-8">
                                        <x-admin.crud.input :locale="$locale" :model="''" :columnName="'title'"
                                            :label="'Title'" :placeholder="'Write a title'" :type="'text'"
                                            :required="true" />
                                    </div>

                                    {{-- YENİ: Tərcümə olunan Job Status (məs: Tam ştat) --}}
                                    <div class="mb-3 col-lg-4">
                                        <x-admin.crud.input :locale="$locale" :model="''" :columnName="'status_text'"
                                            :label="'Job Status'" :placeholder="'e.g. Full-time'" :type="'text'"
                                            :required="false" />
                                    </div>

                                    <div class="mb-3 col-lg-12">
                                        <x-admin.crud.textarea :locale="$locale" :model="''" :columnName="'description'"
                                            :label="'Description'" />
                                    </div>

                                    <div class="mb-3 col-lg-12">
                                        <x-admin.crud.textarea :locale="$locale" :model="''" :columnName="'content'"
                                            :label="'Content'" :required="false" :summerNoteID="1" />
                                    </div>

                                    <div class="mb-3 col-lg-4">
                                        <x-admin.crud.input :locale="$locale" :model="''" :columnName="'meta_title'"
                                            :label="'Meta title'" :placeholder="'Write a meta title'" :type="'text'"
                                            :required="false" />
                                    </div>
                                    <div class="mb-3 col-lg-4">
                                        <x-admin.crud.input :locale="$locale" :model="''" :columnName="'meta_keywords'"
                                            :label="'Meta keywords'" :placeholder="'Write a meta keywords'" :type="'text'"
                                            :required="false" />
                                    </div>
                                    <div class="mb-3 col-lg-4">
                                        <x-admin.crud.input :locale="$locale" :model="''" :columnName="'meta_description'"
                                            :label="'Meta description'" :placeholder="'Write a meta description'" :type="'text'"
                                            :required="false" />
                                    </div>

                                </x-admin.crud.card-body-row>
                            </x-admin.crud.tab-pane>
                        @endforeach
                    </x-admin.crud.tab-content>

                    {{-- Ortaq sahələr (Tarixlər və Aktivlik) --}}
                    <div class="card">
                        <div class="card-body row">
                            <div class="mb-3 col-lg-4">
                                <x-admin.crud.input :locale="''" :model="''" :columnName="'published_at'"
                                    :label="'Published date'" :placeholder="'Published date'" :type="'date'" :required="false" />
                            </div>

                            {{-- YENİ: Deadline sahəsi --}}
                            <div class="mb-3 col-lg-4">
                                <x-admin.crud.input :locale="''" :model="''" :columnName="'deadline'"
                                    :label="'Deadline'" :placeholder="'Deadline'" :type="'date'" :required="false" />
                            </div>


                        </div>
                    </div>

                    <x-admin.crud.all-errors :errors="$errors" />

                </x-admin.crud.card>

            </x-admin.crud.page-content>
        </x-admin.crud.main-content>

    </div>

    <x-admin.back-to-up />
    <x-admin.preloader />

</x-admin.layout>
