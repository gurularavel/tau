@props(['delay' => 3000])

@if(session('success'))
    <!-- Modal -->
    <div class="modal fade show d-block" id="successModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{__("translate.Clear cache")}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Bağla" onclick="closeModal()">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{ session('success') }}
                </div>
            </div>
        </div>
    </div>

    <script>
        setTimeout(function() {
            closeModal();
        }, {{ $delay }});

        function closeModal() {
            document.getElementById('successModal')?.classList.remove('show', 'd-block');
            document.getElementById('successModal')?.classList.add('d-none');
        }
    </script>
@endif
