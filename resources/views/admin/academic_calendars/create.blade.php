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
                :routeName="'academic_calendars.store'"
                :method="'post'"
                :routeNameForBackButton="'academic_calendars'"
            >

                <!-- 🔥 NAV (languages) -->
                <x-admin.crud.nav>
                    @foreach ($locales as $key => $locale)
                        <x-admin.crud.nav-item :locale="$locale" :key="$key" />
                    @endforeach

                    <x-admin.crud.success-message :delay="'5000'" />
                </x-admin.crud.nav>

                <!-- 🔥 TAB CONTENT -->
                <x-admin.crud.tab-content>

                    @foreach ($locales as $key => $locale)
                        <x-admin.crud.tab-pane :key="$key">

                            <x-admin.crud.card-body-row>

                                <!-- SUBJECT -->
                                <div class="mb-3 col-lg-12">
                                    <x-admin.crud.input
                                        :locale="$locale"
                                        :model="''"
                                        :columnName="'subject'"
                                        :label="'Subject'"
                                        :placeholder="'Event name'"
                                        :type="'text'"
                                        :required="true"
                                    />
                                </div>

                                <x-admin.crud.all-errors :errors="$errors" />

                            </x-admin.crud.card-body-row>

                        </x-admin.crud.tab-pane>
                    @endforeach

                </x-admin.crud.tab-content>

                <!-- 🔥 MAIN DATA -->
                <div class="card">
                    <div class="card-body row">

                        <!-- Academic Year -->
                        <div class="mb-3 col-lg-4">
                            <x-admin.crud.input
                                :locale="''"
                                :model="''"
                                :columnName="'academic_year'"
                                :label="'Academic Year'"
                                :placeholder="'2025-2026'"
                                :type="'text'"
                            />
                        </div>

                        <!-- Semester -->
                        <div class="mb-3 col-lg-4">
                            <x-admin.crud.option
                                :label="'Semester'"
                                :name="'semester_id'"
                                :model="''"
                                :options="$semesters->map(fn($item) => [
                                    'label' => $item->translate(app()->getLocale())->name ?? '',
                                    'value' => $item->id,
                                ])->toArray()"
                            />
                        </div>

                        <!-- Education Level -->
                        <div class="mb-3 col-lg-4">
                            <x-admin.crud.option
                                :label="'Education Level'"
                                :name="'education_level_id'"
                                :model="''"
                                :options="$educationLevels->map(fn($item) => [
                                    'label' => $item->translate(app()->getLocale())->name ?? '',
                                    'value' => $item->id,
                                ])->toArray()"
                            />
                        </div>

                        <!-- Faculty -->
                        <div class="mb-3 col-lg-4">
                            <x-admin.crud.option
                                :label="'Faculty'"
                                :name="'faculty_id'"
                                :model="''"
                                :options="$faculties->map(fn($item) => [
                                    'label' => $item->translate(app()->getLocale())->name ?? '',
                                    'value' => $item->id,
                                ])->toArray()"
                            />
                        </div>

                        <!-- Education Type -->
                        <div class="mb-3 col-lg-4">
                            <x-admin.crud.option
                                :label="'Education Type'"
                                :name="'education_type_id'"
                                :model="''"
                                :options="$educationTypes->map(fn($item) => [
                                    'label' => $item->translate(app()->getLocale())->name ?? '',
                                    'value' => $item->id,
                                ])->toArray()"
                            />
                        </div>

                        <!-- Event Type -->
                        <div class="mb-3 col-lg-4">
                            <x-admin.crud.option
                                :label="'Event Type'"
                                :name="'event_type_id'"
                                :model="''"
                                :options="$eventTypes->map(fn($item) => [
                                    'label' => $item->translate(app()->getLocale())->name ?? '',
                                    'value' => $item->id,
                                ])->toArray()"
                            />
                        </div>

                        <!-- Event Date -->
                        <div class="mb-3 col-lg-4">
                            <x-admin.crud.input
                                :locale="''"
                                :model="''"
                                :columnName="'event_date'"
                                :label="'Event Date'"
                                :type="'date'"
                                :placeholder="'Event date'"
                                :required="true"
                            />
                        </div>

                        <!-- Order -->
                        <div class="mb-3 col-lg-4">
                            <x-admin.crud.input
                                :locale="''"
                                :model="''"
                                :columnName="'order'"
                                :label="'Order'"
                                :placeholder="'Sorting'"
                                :type="'number'"
                            />
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
