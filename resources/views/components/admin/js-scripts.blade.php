    {{-- <script src="{{asset('/assets/admin/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script> --}}

    <script src="{{asset('/assets/admin/libs/simplebar/simplebar.min.js')}}"></script>
    <script src="{{asset('/assets/admin/libs/node-waves/waves.min.js')}}"></script>
    <script src="{{asset('/assets/admin/libs/feather-icons/feather.min.js')}}"></script>
    {{-- <script src="{{asset('/assets/admin/js/pages/plugins/lord-icon-2.1.0.js')}}"></script> --}}
    {{-- <script src="{{asset('/assets/admin/js/plugins.js')}}"></script> --}}
    {{-- <script src="{{asset('/assets/admin/js/jquery/jquery.min.js')}}"></script> --}}

    <!-- particles js -->
    {{-- <script src="{{asset('/assets/admin/libs/particles.js/particles.js')}}"></script> --}}

    <!-- particles app js -->
    {{-- <script src="{{asset('/assets/admin/js/pages/particles.app.js')}}"></script> --}}

    <!-- password-addon init -->
    <script src="{{asset('/assets/admin/js/pages/password-addon.init.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>


    <!-- prismjs plugin -->
    {{-- <script src="{{asset('/assets/admin/libs/prismjs/prism.js')}}"></script> --}}

    <!-- list.js min js -->
    {{-- <script src="{{asset('/assets/admin/libs/list.js/list.min.js')}}"></script> --}}

    <!-- titcket init js -->
    {{-- <script src="{{asset('/assets/admin/js/pages/ticketlist.init.js')}}"></script> --}}


    <!--list pagination js-->
    {{-- <script src="{{asset('/assets/admin/libs/list.pagination.js/list.pagination.min.js')}}"></script> --}}

    <!-- apexcharts -->
    {{-- <script src="{{asset('/assets/admin/libs/apexcharts/apexcharts.min.js')}}"></script> --}}

    <!-- Vector map-->
    {{-- <script src="{{asset('/assets/admin/libs/jsvectormap/js/jsvectormap.min.js')}}"></script> --}}
    {{-- <script src="{{asset('/assets/admin/libs/jsvectormap/maps/world-merc.js')}}"></script> --}}

    <!--Swiper slider js-->
    {{-- <script src="{{asset('/assets/admin/libs/swiper/swiper-bundle.min.js')}}"></script> --}}

    <!-- dropzone js -->
    <script src="{{asset('/assets/admin/libs/dropzone/dropzone-min.js')}}"></script>

    <!-- Dashboard init -->
    {{-- <script src="{{asset('/assets/admin/js/pages/dashboard-ecommerce.init.js')}}"></script> --}}
    <script src="{{asset('/assets/admin/js/pages/ecommerce-product-create.init.js')}}"></script>
    {{-- <script src="{{asset('/assets/admin/js/pages/apps-nft-item-details.init.js')}}"></script> --}}

    <!-- App js -->
    <script src="{{asset('/assets/admin/js/app.js')}}"></script>

    <!-- JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta3/js/bootstrap-select.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>


    <script>
        $(document).ready(function () {
    $('.selectpicker').selectpicker();
});


document.addEventListener("DOMContentLoaded", function() {
    const inputs = document.querySelectorAll('input[id^="product-media-input-"]');

    inputs.forEach(input => {
        const uniqueId = input.id.replace("product-media-input-", "");
        const previewContainer = document.getElementById("product-preview-container-" + uniqueId);

        input.addEventListener("change", function(event) {
            const file = event.target.files[0];
            if (!file) return;

            const url = URL.createObjectURL(file);

            if (file.type.startsWith('video')) {
                previewContainer.innerHTML = `
                    <video style="border-radius: 15px;" width="300" height="300" controls>
                        <source src="${url}" type="${file.type}">
                        Your browser does not support the video tag.
                    </video>
                `;
            } else if (file.type.startsWith('image')) {
                previewContainer.innerHTML = `
                    <img src="${url}" style="border-radius: 15px; cursor: zoom-in;" width="300" data-fancybox="gallery"/>
                `;
            }
        });
    });
});


</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        let container = document.getElementById('sortable-images');

        new Sortable(container, {
            animation: 150,
            ghostClass: 'sortable-ghost',
            onEnd: function () {
                let items = container.querySelectorAll('.image-item');

                items.forEach((item, index) => {
                    let input = item.querySelector('.image-order');
                    input.value = index + 1;
                });
            }
        });
    });
</script>
<script>
function deleteItem(button, url) {
    if (!confirm("{{ __('translate.Are you sure you want to delete?') }}")) return;

    fetch(url, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
            'X-Requested-With': 'XMLHttpRequest',
        },
        body: new URLSearchParams({ _method: 'DELETE' })
    })
    .then(response => {
        if (!response.ok) throw new Error();
        // Refresh olmadan row DOM-dan silinir
        const row = button.closest('tr');
        if (row) row.remove();
    })
    .catch(error => console.error('DELETE ERROR:', error));
}

</script>
