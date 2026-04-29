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
                                <label class="form-label">{{ __('translate.Programs') }}</label>
                                <div class="dual-listbox-wrapper d-flex gap-3 align-items-start">
                                    <div class="flex-fill">
                                        <div class="fw-semibold small mb-1 text-muted">{{ __('translate.available') ?? 'Available' }}</div>
                                        <input type="text" id="dlb-search-left" class="form-control form-control-sm mb-1" placeholder="Axtar...">
                                        <select id="dlb-left" class="form-select" size="10" multiple style="min-height:220px;">
                                            @foreach ($programs as $prog)
                                                <option value="{{ $prog['id'] }}">{{ $prog['description'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="d-flex flex-column justify-content-center gap-2 pt-4 mt-3">
                                        <button type="button" class="btn btn-sm btn-primary" onclick="dlbMoveRight()" title="Sağa köçür">&#8250;&#8250;</button>
                                        <button type="button" class="btn btn-sm btn-secondary" onclick="dlbMoveLeft()" title="Sola köçür">&#8249;&#8249;</button>
                                    </div>
                                    <div class="flex-fill">
                                        <div class="fw-semibold small mb-1 text-muted">{{ __('translate.selected') ?? 'Selected' }}</div>
                                        <input type="text" id="dlb-search-right" class="form-control form-control-sm mb-1" placeholder="Axtar...">
                                        <select id="dlb-right" class="form-select" size="10" multiple style="min-height:220px;"></select>
                                        <div class="d-flex gap-2 mt-1">
                                            <button type="button" class="btn btn-sm btn-outline-secondary flex-fill" onclick="dlbMoveUp()">&#8593; Yuxarı</button>
                                            <button type="button" class="btn btn-sm btn-outline-secondary flex-fill" onclick="dlbMoveDown()">&#8595; Aşağı</button>
                                        </div>
                                    </div>
                                </div>
                                <div id="dlb-hidden-inputs"></div>
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
        dlbInitSearch();
    });

    // Submit capture fazasında: formdan əvvəl hidden input-ları sinxronlaşdır
    document.addEventListener('submit', function() {
        dlbSyncHidden();
    }, true);

    function dlbMoveRight() {
        let left = document.getElementById('dlb-left');
        let right = document.getElementById('dlb-right');
        Array.from(left.selectedOptions).forEach(opt => {
            right.appendChild(opt);
            opt.selected = false;
        });
        dlbSyncHidden();
    }

    function dlbMoveLeft() {
        let left = document.getElementById('dlb-left');
        let right = document.getElementById('dlb-right');
        Array.from(right.selectedOptions).forEach(opt => {
            left.appendChild(opt);
            opt.selected = false;
        });
        dlbSyncHidden();
    }

    function dlbMoveUp() {
        let right = document.getElementById('dlb-right');
        let opts = Array.from(right.options);
        for (let i = 1; i < opts.length; i++) {
            if (opts[i].selected && !opts[i - 1].selected) {
                right.insertBefore(opts[i], opts[i - 1]);
            }
        }
        dlbSyncHidden();
    }

    function dlbMoveDown() {
        let right = document.getElementById('dlb-right');
        let opts = Array.from(right.options);
        for (let i = opts.length - 2; i >= 0; i--) {
            if (opts[i].selected && !opts[i + 1].selected) {
                right.insertBefore(opts[i + 1], opts[i]);
            }
        }
        dlbSyncHidden();
    }

    function dlbSyncHidden() {
        let right = document.getElementById('dlb-right');
        let container = document.getElementById('dlb-hidden-inputs');
        if (!right || !container) return;
        container.innerHTML = '';
        Array.from(right.options).forEach(opt => {
            let inp = document.createElement('input');
            inp.type = 'hidden';
            inp.name = 'program_ids[]';
            inp.value = opt.value;
            container.appendChild(inp);
        });
    }

    function dlbInitSearch() {
        document.getElementById('dlb-search-left').addEventListener('input', function() {
            let q = this.value.toLowerCase();
            Array.from(document.getElementById('dlb-left').options).forEach(opt => {
                opt.style.display = opt.text.toLowerCase().includes(q) ? '' : 'none';
            });
        });
        document.getElementById('dlb-search-right').addEventListener('input', function() {
            let q = this.value.toLowerCase();
            Array.from(document.getElementById('dlb-right').options).forEach(opt => {
                opt.style.display = opt.text.toLowerCase().includes(q) ? '' : 'none';
            });
        });
    }
</script>
