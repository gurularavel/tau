<x-admin.layout>



    <!-- Begin page -->
    <div id="layout-wrapper">

        <x-admin.header/>

        <!-- removeNotificationModal -->
        <x-admin.remove-notification/>
        <!--removeNotificationModal -->

        <!-- ========== App Menu ========== -->
        <x-admin.app-menu/>
        <!-- Left Sidebar End -->


        <!-- Vertical Overlay-->
        <div class="vertical-overlay"></div>

        <x-admin.crud.main-content>

            <x-admin.crud.page-content>

                    <x-admin.crud.page-title :title="$title"/>


                    <x-admin.crud.card :routeName="'settings.update'" :method="'update'" :model="$model">


                                <x-admin.crud.nav>





                                </x-admin.crud.nav>

                                <div class="card">
                                    <div class="card-body row">
                                        <div class="mb-3 col-lg-4">
                                            <x-admin.crud.input :locale="''" :model="$model" :columnName="'keyword'" :label="'Keyword'" :placeholder="'Write a keyword'" :type="'text'" :required="true"/>
                                        </div>
                                        <div class="mb-3 col-lg-4" id="valueBlock">
                                            <x-admin.crud.input :locale="''" :model="$model" :columnName="'value'" :label="'Value'" :placeholder="'Write a value'" :type="'text'" :required="false"/>
                                        </div>
                                        <div class="mb-3 col-lg-4">
                                            <x-admin.crud.option
                                            :label="'Type'"
                                            :name="'type'"
                                            :model="$model"
                                            :options="collect(App\Enums\SettingType::cases())->map(fn($case) => ['label' => ucfirst($case->value), 'value' => $case->value])->toArray()"
                                        />
                                        </div>
                                        <div style="display:none;" id="fileUploadBlock">
                                            <label class="col-form-label text-right col-lg-3 col-sm-12">
                                                {{ $attributes['file'] }} <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6 col-md-9 col-sm-12">
                                                @if($model->value)

                                                       <img width="150px;" height="150px;" src="/uploads/settings/{{ $model->value }}" alt="setting"/>
                                                @endif
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input
                                                            type="file"
                                                            class="custom-file-input @error('file') is-invalid @enderror"
                                                            name="file"
                                                            accept=".jpg,.jpeg,.png,.pdf,.xls,.xlsx,.doc,.docx,.svg"
                                                        >
                                                    </div>
                                                    @error('file')
                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>




                    </x-admin.crud.card>

            </x-admin.crud.page-content>
        </x-admin.crud.main-content>

        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->



    <!--start back-to-top-->
    <x-admin.back-to-up/>

    <!--end back-to-top-->

    <!--preloader-->
    <x-admin.preloader/>


    </x-admin.layout>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            let typeSelect = document.querySelector("[name='type']");
            let fileUploadBlock = document.getElementById("fileUploadBlock");
            let valueBlock = document.getElementById("valueBlock");

            function toggleType() {
                if (typeSelect.value === "file_type") {
                    fileUploadBlock.style.display = "block";
                    valueBlock.style.display = "none";

                } else {

                    fileUploadBlock.style.display = "none";
                    valueBlock.style.display = "block";

                }
            }

            toggleType();

            typeSelect.addEventListener("change", toggleType);
        });
    </script>
