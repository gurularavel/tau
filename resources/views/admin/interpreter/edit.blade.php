<x-admin.layout>

    <div id="layout-wrapper">
        <x-admin.header />
        <x-admin.remove-notification />
        <x-admin.app-menu />
        <div class="vertical-overlay"></div>

        <x-admin.crud.main-content>
            <x-admin.crud.page-content>

                <x-admin.crud.page-title :title="'Translation'" />

                {{-- ── Add new keyword button ── --}}
                <div class="col-xxl-12 mb-3 d-flex justify-content-end">
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addKeyModal">
                        <i class="ri-add-line me-1"></i> Add keyword
                    </button>
                </div>

                <x-admin.crud.card :routeName="'interpreter.update'" :method="'post'" :routeNameForBackButton="''">

                    <x-admin.crud.tab-content>
                        <x-admin.crud.success-message :delay="'5000'" />

                        <input type="text" id="searchInput" class="form-control mb-3"
                            placeholder="{{ __('translate.Search translations...') }}">

                        <div class="row" id="translationsList">
                            @foreach ($translations as $tKey => $value)
                                <div class="mb-3 col-lg-3 translation-item" data-key="{{ strtolower($tKey) }}">
                                    <div class="d-flex align-items-center justify-content-between mb-1">
                                        <label class="mb-0" style="text-transform:none; font-size:13px;">{{ $tKey }}</label>
                                        <button type="button"
                                            class="btn btn-sm btn-outline-danger p-0 px-1 delete-key-btn"
                                            data-key="{{ $tKey }}"
                                            title="Delete key from all locales"
                                            style="line-height:1.2;">
                                            <i class="ri-delete-bin-line" style="font-size:12px;"></i>
                                        </button>
                                    </div>
                                    <input type="text" name="translations[{{ $tKey }}]"
                                        class="form-control" value="{{ $value }}">
                                </div>
                            @endforeach
                        </div>

                        <x-admin.crud.all-errors :errors="$errors" />
                    </x-admin.crud.tab-content>

                </x-admin.crud.card>

            </x-admin.crud.page-content>
        </x-admin.crud.main-content>
    </div>

    {{-- ── Add Keyword Modal ── --}}
    <div class="modal fade" id="addKeyModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action="{{ route('admin.interpreter.addKey') }}">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Add new keyword</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label fw-bold">Key <span class="text-danger">*</span></label>
                            <input type="text" name="new_key" class="form-control"
                                placeholder="e.g. Submit button" required />
                            <small class="text-muted">This key will be added to all language files.</small>
                        </div>

                        <hr>
                        <p class="text-muted mb-2" style="font-size:13px;">Initial values per language (optional):</p>

                        @foreach (['az', 'en', 'ru', 'tr'] as $locale)
                            @if (file_exists(base_path("lang/{$locale}/translate.php")))
                                <div class="mb-2">
                                    <label class="form-label mb-1">
                                        <span class="badge bg-secondary">{{ strtoupper($locale) }}</span>
                                    </label>
                                    <input type="text" name="values[{{ $locale }}]" class="form-control"
                                        placeholder="Translation for {{ strtoupper($locale) }}" />
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success">Add keyword</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- ── Delete Key Form (hidden, reused) ── --}}
    <form id="deleteKeyForm" method="POST" action="{{ route('admin.interpreter.removeKey') }}" style="display:none;">
        @csrf
        @method('DELETE')
        <input type="hidden" name="key" id="deleteKeyInput" />
    </form>

    <x-admin.back-to-up />
    <x-admin.preloader />

</x-admin.layout>

<script>
    // Search
    document.getElementById('searchInput').addEventListener('input', function () {
        const query = this.value.toLowerCase();
        document.querySelectorAll('.translation-item').forEach(item => {
            const key = item.getAttribute('data-key');
            item.style.display = key.includes(query) ? 'block' : 'none';
        });
    });

    // Delete key
    document.querySelectorAll('.delete-key-btn').forEach(btn => {
        btn.addEventListener('click', function () {
            const key = this.getAttribute('data-key');
            if (!confirm(`Delete key "${key}" from all language files?`)) return;
            document.getElementById('deleteKeyInput').value = key;
            document.getElementById('deleteKeyForm').submit();
        });
    });
</script>
