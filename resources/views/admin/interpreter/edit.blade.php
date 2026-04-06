<x-admin.layout>



    <!-- Begin page -->
    <div id="layout-wrapper">

        <x-admin.header />

        <!-- removeNotificationModal -->
        <x-admin.remove-notification />
        <!--removeNotificationModal -->

        <!-- ========== App Menu ========== -->
        <x-admin.app-menu />
        <!-- Left Sidebar End -->


        <!-- Vertical Overlay-->
        <div class="vertical-overlay"></div>

        <x-admin.crud.main-content>

            <x-admin.crud.page-content>

                <x-admin.crud.page-title :title="'Translation'" />


                <x-admin.crud.card :routeName="'interpreter.update'" :method="'post'" :routeNameForBackButton="''">




                    <x-admin.crud.tab-content>
                        <x-admin.crud.success-message :delay="'5000'" />
                        <input type="text" id="searchInput" class="form-control mb-3"
                            placeholder="{{ __('translate.Search translations...') }}">


                                <div class="row">

                                    @foreach ($translations as $tKey => $value)
                                        <div class="mb-3 col-lg-3 translation-item" data-key="{{ $value }}">

                                            <label style="text-transform:none">{{ $tKey }}</label>
                                            <input type="text" name="translations[{{ $tKey }}]"
                                                class="form-control" value="{{ $value }}">
                                        </div>
                                        <x-admin.crud.all-errors :errors="$errors" />
                                    @endforeach
                                    </div>



                    </x-admin.crud.tab-content>



                </x-admin.crud.card>


            </x-admin.crud.page-content>
        </x-admin.crud.main-content>

        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->



    <!--start back-to-top-->
    <x-admin.back-to-up />

    <!--end back-to-top-->

    <!--preloader-->
    <x-admin.preloader />


</x-admin.layout>
<script>
    document.getElementById('searchInput').addEventListener('input', function() {
        const query = this.value.toLowerCase();
        const items = document.querySelectorAll('.translation-item');

        items.forEach(item => {
            const key = item.getAttribute('data-key').toLowerCase();
            if (key.includes(query)) {
                item.style.display = 'block';
            } else {
                item.style.display = 'none';
            }
        });
    });
</script>
