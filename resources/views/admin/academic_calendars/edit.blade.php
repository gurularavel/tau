<x-admin.layout>

<div id="layout-wrapper">

    <x-admin.header />
    <x-admin.remove-notification />
    <x-admin.app-menu />

    <div class="vertical-overlay"></div>

    <x-admin.crud.main-content>
        <x-admin.crud.page-content>

            <x-admin.crud.page-title :title="$title" />

            <x-admin.crud.card
                :routeName="'academic_calendars.update'"
                :method="'update'"
                :model="$model"
                :routeNameForBackButton="'academic_calendars'"
            >
                <x-admin.crud.success-message :delay="'5000'" />

                <!-- 🔥 NAV (languages) -->
                <x-admin.crud.nav>
                    @foreach ($locales as $key => $locale)
                        <x-admin.crud.nav-item :locale="$locale" :key="$key" />
                    @endforeach

                    <x-admin.crud.summernote-editor-js :locales="$locales" :key="1" :height="'500'" />
                </x-admin.crud.nav>

                <!-- 🔥 TAB CONTENT -->
                <x-admin.crud.tab-content>
                    @foreach ($locales as $key => $locale)
                        <x-admin.crud.tab-pane :key="$key">
                            <x-admin.crud.card-body-row>

                                <!-- CONTENT -->
                                <div class="mb-3 col-lg-12">
                                    <x-admin.crud.textarea
                                        :locale="$locale"
                                        :model="$model"
                                        :columnName="'content'"
                                        :label="'Content'"
                                        :summerNoteID="1"
                                        :rowCount="'10'"
                                    />
                                </div>

                                <x-admin.crud.all-errors :errors="$errors" />

                            </x-admin.crud.card-body-row>
                        </x-admin.crud.tab-pane>
                    @endforeach
                </x-admin.crud.tab-content>

                <!-- Status -->
                <div class="card">
                    <div class="card-body row">
                        <div class="mb-3 col-lg-4">
                            <x-admin.crud.option :label="'status'" :name="'is_active'" :model="$model"
                                :options="[
                                    ['label' => __('translate.active'), 'value' => 1],
                                    ['label' => __('translate.inactive'), 'value' => 0],
                                ]" />
                        </div>
                    </div>
                </div>

            </x-admin.crud.card>

        </x-admin.crud.page-content>
    </x-admin.crud.main-content>

</div>

<x-admin.back-to-up />
<x-admin.preloader />

</x-admin.layout>
