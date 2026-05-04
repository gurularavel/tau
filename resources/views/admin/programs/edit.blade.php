<x-admin.layout>
    <div id="layout-wrapper">
        <x-admin.header />
        <x-admin.remove-notification />
        <x-admin.app-menu />

        <div class="vertical-overlay"></div>

        <x-admin.crud.main-content>
            <x-admin.crud.page-content>
                <x-admin.crud.page-title :title="$title" />

                <x-admin.crud.card :routeName="'programs.update'" :method="'update'" :model="$model" :routeNameForBackButton="'programs'"
                    :show="true">

                    <x-admin.crud.success-message :delay="'5000'" />

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

                                    {{-- Basic Page Fields --}}
                                    <div class="mb-3 col-lg-12">
                                        <x-admin.crud.input :locale="$locale" :model="$model" :columnName="'title'"
                                            :label="'title'" :placeholder="'Write a title'" :type="'text'"
                                            :required="true" />
                                    </div>
                                    <div class="mb-3 col-lg-12">
                                        <x-admin.crud.textarea :locale="$locale" :model="$model" :columnName="'content'"
                                            :label="'content'" :summerNoteID="1" />
                                    </div>

                                    <div class="mb-3 col-lg-4">
                                        <x-admin.crud.input :locale="$locale" :model="$model" :columnName="'meta_title'"
                                            :label="'Meta title'" :placeholder="'Write a meta title'" :type="'text'"
                                            :required="false" />
                                    </div>

                                    <div class="mb-3 col-lg-4">
                                        <x-admin.crud.input :locale="$locale" :model="$model" :columnName="'meta_description'"
                                            :label="'Meta description'" :placeholder="'Write a meta description'" :type="'text'"
                                            :required="false" />
                                    </div>

                                    <div class="mb-3 col-lg-4">
                                        <x-admin.crud.input :locale="$locale" :model="$model" :columnName="'meta_keywords'"
                                            :label="'Meta keywords'" :placeholder="'Write a meta keywords'" :type="'text'"
                                            :required="false" />
                                    </div>

                                    {{-- Dynamic Sections --}}
                                    <div class="col-lg-12 mt-4">
                                        <hr>
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <h5 class="mb-0">Dynamic Content Sections</h5>
                                            <button type="button" class="btn btn-success btn-sm"
                                                onclick="addDynamic('{{ $locale }}')">
                                                <i class="ri-add-line"></i> Add Dynamic Section
                                            </button>
                                        </div>

                                        <div id="dynamic-wrapper-{{ $locale }}"
                                            class="dynamic-sections-container">
                                            {{-- Existing dynamics will be loaded here --}}
                                        </div>
                                    </div>

                                    <x-admin.crud.all-errors :errors="$errors" />

                                </x-admin.crud.card-body-row>
                            </x-admin.crud.tab-pane>
                        @endforeach
                    </x-admin.crud.tab-content>
                    <x-admin.crud.image.card :title="$title">
                        <x-admin.crud.image.card-body>
                            <x-admin.crud.image.main-image :columnValue="$model->image" :name="'image'" :folderName="'programs'" />
     <div id="program-image2-block" style="display:none;">

                            <x-admin.crud.image.main-image :columnValue="$model->image2" :name="'image2'" :folderName="'programs'" />
                            </div>
                        </x-admin.crud.image.card-body>
                    </x-admin.crud.image.card>


                    <div class="card">
                        <div class="card-body row">
                                                   <div class="mb-3 col-lg-4">
                                <x-admin.crud.option :label="'Type'" :name="'type'" :model="$model"
                                    :options="[
                                        ['label' => __('translate.Simple page'), 'value' => 1],
                                        ['label' => __('translate.Program'), 'value' => 0],
                                    ]"
                                    :onchange="'toggleProgramMultiple(this)'"

/>
                            </div>
                            <div class="mb-3 col-lg-12" id="program-multiple-block" style="display:none;">
                                <label class="form-label">{{ __('translate.Programs') }}</label>
                                <div class="dual-listbox-wrapper d-flex gap-3 align-items-start">
                                    {{-- Sol: mövcud proqramlar --}}
                                    <div class="flex-fill">
                                        <div class="fw-semibold small mb-1 text-muted">{{ __('translate.available') ?? 'Available' }}</div>
                                        <input type="text" id="dlb-search-left" class="form-control form-control-sm mb-1" placeholder="Axtar...">
                                        <select id="dlb-left" class="form-select" size="10" multiple style="min-height:220px;">
                                            @foreach ($programs as $prog)
                                                @if (!in_array($prog['id'], $model->program_ids ?? []))
                                                    <option value="{{ $prog['id'] }}">{{ $prog['description'] }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    {{-- Ortadakı düymələr --}}
                                    <div class="d-flex flex-column justify-content-center gap-2 pt-4 mt-3">
                                        <button type="button" class="btn btn-sm btn-primary" onclick="dlbMoveRight()" title="Sağa köçür">&#8250;&#8250;</button>
                                        <button type="button" class="btn btn-sm btn-secondary" onclick="dlbMoveLeft()" title="Sola köçür">&#8249;&#8249;</button>
                                    </div>
                                    {{-- Sağ: seçilmiş proqramlar --}}
                                    <div class="flex-fill">
                                        <div class="fw-semibold small mb-1 text-muted">{{ __('translate.selected') ?? 'Selected' }}</div>
                                        <input type="text" id="dlb-search-right" class="form-control form-control-sm mb-1" placeholder="Axtar...">
                                        <select id="dlb-right" class="form-select" size="10" multiple style="min-height:220px;">
                                            @php
                                                $selectedIds = $model->program_ids ?? [];
                                                $programMap = collect($programs)->keyBy('id');
                                            @endphp
                                            @foreach ($selectedIds as $sid)
                                                @if ($programMap->has($sid))
                                                    <option value="{{ $sid }}">{{ $programMap[$sid]['description'] }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        {{-- Sıralama düymələri --}}
                                        <div class="d-flex gap-2 mt-1">
                                            <button type="button" class="btn btn-sm btn-outline-secondary flex-fill" onclick="dlbMoveUp()" title="Yuxarı">&#8593; Yuxarı</button>
                                            <button type="button" class="btn btn-sm btn-outline-secondary flex-fill" onclick="dlbMoveDown()" title="Aşağı">&#8595; Aşağı</button>
                                        </div>
                                    </div>
                                </div>
                                {{-- Hidden inputs: form submit üçün (Blade ilə başlanğıc dəyərlər) --}}
                                <div id="dlb-hidden-inputs">
                                    @foreach ($model->program_ids ?? [] as $pid)
                                        <input type="hidden" name="program_ids[]" value="{{ $pid }}">
                                    @endforeach
                                </div>
                            </div>
                            <div class="mb-3 col-lg-4">
                                <x-admin.crud.input :locale="''" :model="$model" :columnName="'slug'"
                                    :label="'url'" :placeholder="'Write a url'" :type="'text'" :required="false" />
                            </div>
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

    <style>
        .dynamic-sections-container {
            min-height: 50px;
        }

        .dynamic-accordion-item {
            border: 2px solid #e9ecef;
            border-radius: 8px;
            margin-bottom: 12px;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .dynamic-accordion-item:hover {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            border-color: #dee2e6;
        }

        .dynamic-accordion-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 14px 20px;
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
            user-select: none;
            transition: all 0.3s ease;
        }

        .dynamic-accordion-header:hover {
            background: linear-gradient(135deg, #5568d3 0%, #653a8a 100%);
        }

        .dynamic-accordion-header::after {
            content: '\F0140';
            font-family: 'remixicon';
            font-size: 20px;
            transition: transform 0.3s ease;
            transform: rotate(180deg);
        }

        .dynamic-accordion-header.collapsed::after {
            transform: rotate(0deg);
        }

        .dynamic-header-content {
            display: flex;
            align-items: center;
            gap: 12px;
            flex: 1;
        }

        .dynamic-header-title {
            font-weight: 600;
            font-size: 14px;
        }

        .type-badge {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 600;
            background: rgba(255, 255, 255, 0.25);
            backdrop-filter: blur(10px);
        }

        .btn-remove-dynamic {
            background: rgba(220, 53, 69, 0.9);
            border: none;
            color: white;
            padding: 6px 12px;
            border-radius: 6px;
            font-size: 12px;
            margin-left: 10px;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .btn-remove-dynamic:hover {
            background: #c82333;
            transform: scale(1.05);
        }

        .dynamic-accordion-body {
            background: #f8f9fa;
            padding: 20px;
            display: none;
        }

        .dynamic-accordion-body.show {
            display: block;
            animation: slideDown 0.3s ease;
        }

        @keyframes slideDown {
            from { opacity: 0; max-height: 0; }
            to   { opacity: 1; max-height: 9999px; }
        }

        /* Item-level accordion */
        .dynamic-item-accordion {
            border: 1px solid #dee2e6;
            border-radius: 6px;
            margin-bottom: 8px;
            overflow: hidden;
            transition: all 0.2s ease;
        }

        .dynamic-item-accordion:hover {
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
            border-color: #667eea;
        }

        .dynamic-item-accordion-header {
            background: linear-gradient(135deg, #4facfe 0%, #5568d3 100%);
            color: white;
            padding: 10px 16px;
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
            user-select: none;
            transition: all 0.2s ease;
        }

        .dynamic-item-accordion-header:hover {
            background: linear-gradient(135deg, #3d9ae8 0%, #4456c0 100%);
        }

        .dynamic-item-accordion-header::after {
            content: '\F0140';
            font-family: 'remixicon';
            font-size: 16px;
            transition: transform 0.3s ease;
            transform: rotate(180deg);
        }

        .dynamic-item-accordion-header.collapsed::after {
            transform: rotate(0deg);
        }

        .dynamic-item-accordion-body {
            background: white;
            padding: 15px;
            display: none;
        }

        .dynamic-item-accordion-body.show {
            display: block;
            animation: slideDown 0.2s ease;
        }

        .item-header-content {
            display: flex;
            align-items: center;
            gap: 10px;
            flex: 1;
        }

        .item-header-title {
            font-weight: 600;
            font-size: 13px;
        }

        .btn-remove-item {
            background: rgba(220, 53, 69, 0.9);
            border: none;
            color: white;
            padding: 4px 10px;
            border-radius: 5px;
            font-size: 12px;
            margin-left: 8px;
            transition: all 0.2s ease;
            cursor: pointer;
        }

        .btn-remove-item:hover {
            background: #c82333;
        }

        .form-label {
            font-weight: 600;
            color: #495057;
            margin-bottom: 8px;
            font-size: 13px;
        }

        .image-preview {
            max-width: 150px;
            max-height: 150px;
            margin-top: 10px;
            border-radius: 6px;
            border: 2px solid #e9ecef;
            object-fit: cover;
        }

        .existing-image-wrapper {
            position: relative;
            display: inline-block;
            margin-bottom: 10px;
        }

        .existing-image {
            max-width: 150px;
            max-height: 150px;
            border-radius: 6px;
            border: 2px solid #28a745;
        }

        .remove-existing-image {
            position: absolute;
            top: -10px;
            right: -10px;
            background: #dc3545;
            color: white;
            border: none;
            border-radius: 50%;
            width: 30px;
            height: 30px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .remove-existing-image:hover {
            background: #c82333;
        }
    </style>
    <script>
        // Existing dynamics data from controller
        let existingDynamics = @json($model->dynamics ?? []);
        let dynamicIndexes = {};

        @foreach ($locales as $locale)
            dynamicIndexes['{{ $locale }}'] = 0;
        @endforeach

        // Summernote initialization function
        function initializeSummernote(selector) {
            $(selector).summernote({
                height: 200,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['fontname', 'fontsize', 'fontsizeunit', 'bold', 'italic', 'underline',
                        'strikethrough', 'superscript', 'subscript', 'clear'
                    ]],
                    ['color', ['color']],
                    ['lineheight', ['lineHeight']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['misc', ['undo', 'redo']],
                    ['view', ['codeview', 'help']]
                ],
                fontNames: [
                    'Arial', 'Arial Black', 'Comic Sans MS', 'Courier New',
                    'Georgia', 'Impact', 'Inter', 'Lato', 'Montserrat',
                    'Nunito', 'Open Sans', 'Poppins', 'Roboto',
                    'Tahoma', 'Times New Roman', 'Trebuchet MS', 'Verdana'
                ],
                fontNamesIgnoreCheck: true
            });
        }

        // Load existing dynamics on page load
        document.addEventListener('DOMContentLoaded', function() {
            @foreach ($locales as $locale)
                loadExistingDynamics('{{ $locale }}');
            @endforeach
        });

        function loadExistingDynamics(locale) {
            if (!existingDynamics || existingDynamics.length === 0) return;

            existingDynamics.forEach(function(dynamic, index) {
                addExistingDynamic(locale, dynamic, index);
                dynamicIndexes[locale]++;
            });
        }

        function toggleAccordion(locale, index) {
            let header = document.getElementById('dynamic-header-' + locale + '-' + index);
            let body = document.getElementById('dynamic-body-' + locale + '-' + index);
            header.classList.toggle('collapsed');
            body.classList.toggle('show');
        }

        function toggleItemAccordion(locale, dynamicIndex, itemIndex) {
            let header = document.getElementById('item-header-' + locale + '-' + dynamicIndex + '-' + itemIndex);
            let body = document.getElementById('item-body-' + locale + '-' + dynamicIndex + '-' + itemIndex);
            header.classList.toggle('collapsed');
            body.classList.toggle('show');
        }

        function addExistingDynamic(locale, dynamic, index) {
            let typeNames = {
                '1': 'Title',
                '2': 'Description',
                '3': 'Image',
                '4': 'Video',
                '5': 'Images',
                '6': 'Dynamic Items'
            };

            let firstLocale = Object.keys(dynamicIndexes)[0];
            let isFirstLocale = (locale === firstLocale);

            // type, is_active, id — yalnız ilk locale-də form field kimi göstər
            let sharedFieldsHtml = isFirstLocale ? `
        <input type="hidden" name="program_dynamics[${index}][id]" value="${dynamic.id}">
        <div class="col-lg-3 mb-3">
            <label class="form-label">Type</label>
            <select name="program_dynamics[${index}][type]"
                    class="form-select">
                <option value="1" ${dynamic.type == 1 ? 'selected' : ''}>Title</option>
                <option value="2" ${dynamic.type == 2 ? 'selected' : ''}>Description</option>
                <option value="3" ${dynamic.type == 3 ? 'selected' : ''}>Image</option>
                <option value="4" ${dynamic.type == 4 ? 'selected' : ''}>Video</option>
                <option value="5" ${dynamic.type == 5 ? 'selected' : ''}>Images (Multiple)</option>
                <option value="6" ${dynamic.type == 6 ? 'selected' : ''}>Dynamic Items</option>
            </select>
        </div>

        <div class="col-lg-3 mb-3">
            <label class="form-label">Active</label>
            <select name="program_dynamics[${index}][is_active]" class="form-select">
                <option value="1" ${dynamic.is_active == 1 ? 'selected' : ''}>Yes</option>
                <option value="0" ${dynamic.is_active == 0 ? 'selected' : ''}>No</option>
            </select>
        </div>

    ` : `
        <input type="hidden" name="program_dynamics[${index}][id]" value="${dynamic.id}">
    `;

            let html = `
        <div class="dynamic-accordion-item" id="dynamic-${locale}-${index}">
            <div class="dynamic-accordion-header collapsed"
                 id="dynamic-header-${locale}-${index}"
                 onclick="toggleAccordion('${locale}', ${index})">
                <div class="dynamic-header-content">
                    <span class="dynamic-header-title">
                        <i class="ri-layout-grid-line"></i> Dynamic Section #${index + 1}
                    </span>
                    <span class="type-badge" id="type-badge-${locale}-${index}">${typeNames[dynamic.type]}</span>
                </div>
                <button type="button" class="btn-remove-dynamic"
                        onclick="event.stopPropagation(); removeDynamic('${locale}', ${index}, ${dynamic.id})">
                    <i class="ri-delete-bin-line"></i> Delete
                </button>
            </div>
            <div class="dynamic-accordion-body" id="dynamic-body-${locale}-${index}">
                <div class="row">
                    ${sharedFieldsHtml}
                    <div class="col-lg-12" id="dynamic-fields-${locale}-${index}">
                        <!-- Dynamic fields will be inserted here -->
                    </div>
                </div>
            </div>
        </div>
    `;

            document.getElementById('dynamic-wrapper-' + locale).insertAdjacentHTML('beforeend', html);
            loadDynamicFieldsWithData(locale, index, dynamic);
        }

        function loadDynamicFieldsWithData(locale, index, dynamic) {
            let container = document.getElementById('dynamic-fields-' + locale + '-' + index);
            let type = dynamic.type;
            let translation = dynamic.translations ? dynamic.translations[locale] : null;

            let firstLocale = Object.keys(dynamicIndexes)[0];
            let isFirstLocale = (locale === firstLocale);

            let html = '<div class="row">';

            // Type 1: Title
            if (type == 1) {
                html += `
            <div class="col-lg-12 mb-3">
                <label class="form-label">Title (${locale.toUpperCase()})</label>
                <input type="text"
                       name="program_dynamics[${index}][translations][${locale}][title]"
                       class="form-control"
                       placeholder="Enter title"
                       value="${translation && translation.title ? translation.title : ''}">
            </div>
        `;
            }

            // Type 2: Description
            if (type == 2) {
                html += `
            <div class="col-lg-12 mb-3">
                <label class="form-label">Description (${locale.toUpperCase()})</label>
                <textarea name="program_dynamics[${index}][translations][${locale}][description]"
                          class="form-control summernote-editor"
                          id="dynamic-desc-${locale}-${index}"
                          rows="5"
                          placeholder="Enter description">${translation && translation.description ? translation.description : ''}</textarea>
            </div>
        `;
            }

            // Type 3: Single Image — yalnız ilk locale
            if (type == 3) {
                if (isFirstLocale) {
                    html += `<div class="col-lg-12 mb-3">
                <label class="form-label">Image</label>`;

                    if (dynamic.image) {
                        html += `
                    <div class="existing-image-wrapper mb-2">
                        <img src="/uploads/program_dynamics/${dynamic.image}" class="existing-image" alt="Existing image">
                        <button type="button" class="remove-existing-image"
                                onclick="markImageForDeletion(${index}, 'single')">
                            <i class="ri-close-line"></i>
                        </button>
                        <input type="hidden" name="program_dynamics[${index}][keep_image]" value="1" id="keep-image-${index}">
                    </div>
                    <small class="text-muted d-block mb-2">Upload new image to replace</small>
                `;
                    }

                    html += `
                <input type="file"
                       name="program_dynamics[${index}][image]"
                       class="form-control"
                       accept="image/*"
                       onchange="previewImage(this, 'preview-${locale}-${index}')">
                <img id="preview-${locale}-${index}" class="image-preview" style="display:none;">
            </div>`;
                } else {
                    html += `
                <div class="col-lg-12 mb-3">
                    <div class="alert alert-info py-2 mb-0">
                        <i class="ri-image-line"></i> Image is managed in the first language tab
                    </div>
                </div>`;
                }
            }

            // Type 4: Video — yalnız ilk locale
            if (type == 4) {
                if (isFirstLocale) {
                    html += `
                <div class="col-lg-12 mb-3">
                    <label class="form-label">Video URL</label>
                    <input type="url"
                           name="program_dynamics[${index}][video]"
                           class="form-control"
                           placeholder="https://youtube.com/watch?v=..."
                           value="${dynamic.video || ''}">
                    <small class="text-muted">Enter YouTube, Vimeo or direct video URL</small>
                </div>
            `;
                } else {
                    html += `
                <div class="col-lg-12 mb-3">
                    <div class="alert alert-info py-2 mb-0">
                        <i class="ri-video-line"></i> Video URL is managed in the first language tab
                    </div>
                </div>`;
                }
            }

            // Type 5: Multiple Images — yalnız ilk locale
            if (type == 5) {
                if (isFirstLocale) {
                    html += `<div class="col-lg-12 mb-3">
                <label class="form-label">Images (Multiple)</label>`;

                    if (dynamic.images && dynamic.images.length > 0) {
                        html += '<div class="mb-3">';
                        dynamic.images.forEach((img, imgIndex) => {
                            html += `
                        <div class="existing-image-wrapper me-2 mb-2" style="display: inline-block;">
                            <img src="/uploads/program_dynamics/${img.image}" class="existing-image" alt="Image ${imgIndex + 1}">
                            <button type="button" class="remove-existing-image"
                                    onclick="markMultiImageForDeletion(${index}, ${img.id})">
                                <i class="ri-close-line"></i>
                            </button>
                            <input type="hidden"
                                   name="program_dynamics[${index}][keep_images][]"
                                   value="${img.id}"
                                   id="keep-multi-image-${index}-${img.id}">
                        </div>
                    `;
                        });
                        html += '</div><small class="text-muted d-block mb-2">Upload new images to add more</small>';
                    }

                    html += `
                <input type="file"
                       name="program_dynamics[${index}][images][]"
                       class="form-control"
                       multiple
                       accept="image/*">
                <small class="text-muted">You can select multiple images</small>
            </div>`;
                } else {
                    html += `
                <div class="col-lg-12 mb-3">
                    <div class="alert alert-info py-2 mb-0">
                        <i class="ri-images-line"></i> Images are managed in the first language tab
                    </div>
                </div>`;
                }
            }

            // Type 6: Dynamic Items
            if (type == 6) {
                html += `
                            <div class="col-lg-12 mb-3 program-title-block" style="display:none;">
                <label class="form-label">Title (${locale.toUpperCase()})</label>
                <input type="text"
                       name="program_dynamics[${index}][translations][${locale}][title]"
                       class="form-control"
                       placeholder="Enter title"
                       value="${translation && translation.title ? translation.title : ''}">
            </div>

            <div class="col-lg-12">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <label class="form-label mb-0">Dynamic Items</label>
                    <button type="button"
                            class="btn btn-primary btn-sm"
                            onclick="addDynamicItem('${locale}', ${index})">
                        <i class="ri-add-line"></i> Add Item
                    </button>
                </div>
                <div id="dynamic-items-${locale}-${index}" class="dynamic-items-wrapper">
                </div>
            </div>
        `;
            }

            html += '</div>';
            container.innerHTML = html;

            // Initialize Summernote for type 2 (Description)
            if (type == 2) {
                setTimeout(() => {
                    initializeSummernote(`#dynamic-desc-${locale}-${index}`);
                }, 100);
            }

            // Load existing items for type 6
            if (type == 6 && dynamic.items && dynamic.items.length > 0) {
                if (!dynamicItemIndexes[locale]) {
                    dynamicItemIndexes[locale] = {};
                }
                dynamicItemIndexes[locale][index] = 0;

                dynamic.items.forEach((item, itemIndex) => {
                    addExistingDynamicItem(locale, index, item, itemIndex);
                    dynamicItemIndexes[locale][index]++;
                });
            }
        }

        function addDynamic(locale) {
            let index = dynamicIndexes[locale];

            let firstLocale = Object.keys(dynamicIndexes)[0];
            let isFirstLocale = (locale === firstLocale);

            // type, is_active — yalnız ilk locale-də göstər
            let sharedFieldsHtml = isFirstLocale ? `
        <div class="col-lg-3 mb-3">
            <label class="form-label">Type</label>
            <select name="program_dynamics[${index}][type]"
                    class="form-select"
                    onchange="toggleDynamicFields(this, '${locale}', ${index})">
                <option value="1">Title</option>
                <option value="2">Description</option>
                <option value="3">Image</option>
                <option value="4">Video</option>
                <option value="5">Images (Multiple)</option>
                <option value="6">Dynamic Items</option>
            </select>
        </div>

        <div class="col-lg-3 mb-3">
            <label class="form-label">Active</label>
            <select name="program_dynamics[${index}][is_active]" class="form-select">
                <option value="1" selected>Yes</option>
                <option value="0">No</option>
            </select>
        </div>

    ` : '';

            let html = `
        <div class="dynamic-accordion-item" id="dynamic-${locale}-${index}">
            <div class="dynamic-accordion-header"
                 id="dynamic-header-${locale}-${index}"
                 onclick="toggleAccordion('${locale}', ${index})">
                <div class="dynamic-header-content">
                    <span class="dynamic-header-title">
                        <i class="ri-layout-grid-line"></i> Dynamic Section #${index + 1}
                    </span>
                    <span class="type-badge" id="type-badge-${locale}-${index}">Title</span>
                </div>
                <button type="button" class="btn-remove-dynamic"
                        onclick="event.stopPropagation(); removeDynamic('${locale}', ${index})">
                    <i class="ri-delete-bin-line"></i> Delete
                </button>
            </div>
            <div class="dynamic-accordion-body show" id="dynamic-body-${locale}-${index}">
                <div class="row">
                    ${sharedFieldsHtml}
                    <div class="col-lg-12" id="dynamic-fields-${locale}-${index}">
                    </div>
                </div>
            </div>
        </div>
    `;

            document.getElementById('dynamic-wrapper-' + locale).insertAdjacentHTML('beforeend', html);

            // Yalnız ilk locale-də toggleDynamicFields çağır
            if (isFirstLocale) {
                toggleDynamicFields(
                    document.querySelector(
                        `#dynamic-${locale}-${index} select[name="program_dynamics[${index}][type]"]`),
                    locale,
                    index
                );
            } else {
                let fakeSelect = {
                    value: '1'
                };
                toggleDynamicFields(fakeSelect, locale, index);
            }

            dynamicIndexes[locale]++;
        }

        function removeDynamic(locale, index, dynamicId = null) {
            if (confirm('Are you sure you want to remove this dynamic section?')) {
                // Destroy summernote before removing
                $(`#dynamic-desc-${locale}-${index}`).summernote('destroy');

                if (dynamicId) {
                    let input = document.createElement('input');
                    input.type = 'hidden';
                    input.name = 'delete_program_dynamics[]';
                    input.value = dynamicId;
                    document.querySelector('form').appendChild(input);
                }
                document.getElementById('dynamic-' + locale + '-' + index).remove();
            }
        }

        function toggleDynamicFields(select, locale, index) {
            let firstLocale = Object.keys(dynamicIndexes)[0];
            let isFirstLocale = (locale === firstLocale);
            let type = select.value;
            let container = document.getElementById('dynamic-fields-' + locale + '-' + index);
            let badge = document.getElementById('type-badge-' + locale + '-' + index);

            let typeNames = {
                '1': 'Title',
                '2': 'Description',
                '3': 'Image',
                '4': 'Video',
                '5': 'Images',
                '6': 'Dynamic Items'
            };

            if (badge) badge.textContent = typeNames[type];

            // Destroy existing summernote if present
            $(`#dynamic-desc-${locale}-${index}`).summernote('destroy');

            let html = '<div class="row">';

            // Type 1: Title
            if (type == '1') {
                html += `
            <div class="col-lg-12 mb-3">
                <label class="form-label">Title (${locale.toUpperCase()})</label>
                <input type="text"
                       name="program_dynamics[${index}][translations][${locale}][title]"
                       class="form-control"
                       placeholder="Enter title">
            </div>
        `;
            }

            // Type 2: Description
            if (type == '2') {
                html += `
            <div class="col-lg-12 mb-3">
                <label class="form-label">Description (${locale.toUpperCase()})</label>
                <textarea name="program_dynamics[${index}][translations][${locale}][description]"
                          class="form-control summernote-editor"
                          id="dynamic-desc-${locale}-${index}"
                          rows="5"
                          placeholder="Enter description"></textarea>
            </div>
        `;
            }

            // Type 3: Image — yalnız ilk locale
            if (type == '3') {
                if (isFirstLocale) {
                    html += `
                <div class="col-lg-12 mb-3">
                    <label class="form-label">Image</label>
                    <input type="file"
                           name="program_dynamics[${index}][image]"
                           class="form-control"
                           accept="image/*"
                           onchange="previewImage(this, 'preview-${locale}-${index}')">
                    <img id="preview-${locale}-${index}" class="image-preview" style="display:none;">
                </div>
            `;
                } else {
                    html += `
                <div class="col-lg-12 mb-3">
                    <div class="alert alert-info py-2 mb-0">
                        <i class="ri-image-line"></i> Image is managed in the first language tab
                    </div>
                </div>`;
                }
            }

            // Type 4: Video — yalnız ilk locale
            if (type == '4') {
                if (isFirstLocale) {
                    html += `
                <div class="col-lg-12 mb-3">
                    <label class="form-label">Video URL</label>
                    <input type="url"
                           name="program_dynamics[${index}][video]"
                           class="form-control"
                           placeholder="https://youtube.com/watch?v=...">
                    <small class="text-muted">Enter YouTube, Vimeo or direct video URL</small>
                </div>
            `;
                } else {
                    html += `
                <div class="col-lg-12 mb-3">
                    <div class="alert alert-info py-2 mb-0">
                        <i class="ri-video-line"></i> Video URL is managed in the first language tab
                    </div>
                </div>`;
                }
            }

            // Type 5: Multiple Images — yalnız ilk locale
            if (type == '5') {
                if (isFirstLocale) {
                    html += `
                <div class="col-lg-12 mb-3">
                    <label class="form-label">Images (Multiple)</label>
                    <input type="file"
                           name="program_dynamics[${index}][images][]"
                           class="form-control"
                           multiple
                           accept="image/*">
                    <small class="text-muted">You can select multiple images</small>
                </div>
            `;
                } else {
                    html += `
                <div class="col-lg-12 mb-3">
                    <div class="alert alert-info py-2 mb-0">
                        <i class="ri-images-line"></i> Images are managed in the first language tab
                    </div>
                </div>`;
                }
            }

            // Type 6: Dynamic Items
            if (type == '6') {


                html += `
                            <div class="col-lg-12 mb-3 program-title-block" style="display:none;">
                <label class="form-label">Title (${locale.toUpperCase()})</label>
                <input type="text"
                       name="program_dynamics[${index}][translations][${locale}][title]"
                       class="form-control"
                       placeholder="Enter title">
            </div>
            <div class="col-lg-12">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <label class="form-label mb-0">Dynamic Items</label>
                    <button type="button"
                            class="btn btn-primary btn-sm"
                            onclick="addDynamicItem('${locale}', ${index})">
                        <i class="ri-add-line"></i> Add Item
                    </button>
                </div>
                <div id="dynamic-items-${locale}-${index}" class="dynamic-items-wrapper">
                </div>
            </div>
        `;
            }

            html += '</div>';
            container.innerHTML = html;

            // Initialize Summernote for type 2
            if (type == '2') {
                setTimeout(() => {
                    initializeSummernote(`#dynamic-desc-${locale}-${index}`);
                }, 100);
            }

            if (type == '6') {
                addDynamicItem(locale, index);
            }
        }

        let dynamicItemIndexes = {};

        function addExistingDynamicItem(locale, dynamicIndex, item, itemIndex) {
            console.log(item);
            let firstLocale = Object.keys(dynamicIndexes)[0];
            let isFirstLocale = (locale === firstLocale);
            let translation = item.translations ? item.translations[locale] : null;

            let html = `
        <div class="dynamic-item-accordion" id="dynamic-item-${locale}-${dynamicIndex}-${itemIndex}">
            <input type="hidden" name="program_dynamics[${dynamicIndex}][items][${itemIndex}][id]" value="${item.id}">
            <div class="dynamic-item-accordion-header collapsed"
                 id="item-header-${locale}-${dynamicIndex}-${itemIndex}"
                 onclick="toggleItemAccordion('${locale}', ${dynamicIndex}, ${itemIndex})">
                <div class="item-header-content">
                    <span class="item-header-title">
                        <i class="ri-list-check-2"></i> Item #${itemIndex + 1}
                    </span>
                </div>
                <button type="button" class="btn-remove-item"
                        onclick="event.stopPropagation(); removeDynamicItem('${locale}', ${dynamicIndex}, ${itemIndex}, ${item.id})">
                    <i class="ri-close-line"></i> Remove
                </button>
            </div>
            <div class="dynamic-item-accordion-body" id="item-body-${locale}-${dynamicIndex}-${itemIndex}">
            <div class="row">
                <div class="col-lg-3 mb-3 item-day-block">
                    <label class="form-label">Day (${locale.toUpperCase()})</label>
                    <input type="text"
                           name="program_dynamics[${dynamicIndex}][items][${itemIndex}][translations][${locale}][day]"
                           class="form-control"
                           value="${translation && translation.day ? translation.day : ''}"
                           placeholder="Item day">
                </div>



                <div class="col-lg-3 mb-3 item-name-block">
                    <label class="form-label">Name (${locale.toUpperCase()})</label>
                    <input type="text"
                           name="program_dynamics[${dynamicIndex}][items][${itemIndex}][translations][${locale}][name]"
                           class="form-control"
                           value="${translation && translation.name ? translation.name : ''}"
                           placeholder="Item name">
                </div>
                <div class="col-lg-3 mb-3 item-subject-name-block">
                    <label class="form-label">Subject name (${locale.toUpperCase()})</label>
                    <input type="text"
                           name="program_dynamics[${dynamicIndex}][items][${itemIndex}][translations][${locale}][subject_name]"
                           class="form-control"
                           value="${translation && translation.subject_name ? translation.subject_name : ''}"
                           placeholder="Item subject name">
                </div>

                <div class="col-lg-3 mb-3 item-examine-type-block">
                    <label class="form-label">Examine type (${locale.toUpperCase()})</label>
                    <input type="text"
                           name="program_dynamics[${dynamicIndex}][items][${itemIndex}][translations][${locale}][examine_type]"
                           class="form-control"
                           value="${translation && translation.examine_type ? translation.examine_type : ''}"
                           placeholder="Item examine type">
                </div>
                <div class="col-lg-3 mb-3 item-professor-block">
                    <label class="form-label">Professor (${locale.toUpperCase()})</label>
                    <input type="text"
                           name="program_dynamics[${dynamicIndex}][items][${itemIndex}][translations][${locale}][professor]"
                           class="form-control"
                           value="${translation && translation.professor ? translation.professor : ''}"
                           placeholder="Item professor">
                </div>


                <div class="col-lg-3 mb-3 item-education-type-block">
                    <label class="form-label">Education type (${locale.toUpperCase()})</label>
                    <input type="text"
                           name="program_dynamics[${dynamicIndex}][items][${itemIndex}][translations][${locale}][education_type]"
                           class="form-control"
                           value="${translation && translation.education_type ? translation.education_type : ''}"
                           placeholder="Item education type">
                </div>
                <div class="col-lg-3 mb-3 item-profession-block">
                    <label class="form-label">Profession (${locale.toUpperCase()})</label>
                    <input type="text"
                           name="program_dynamics[${dynamicIndex}][items][${itemIndex}][translations][${locale}][profession]"
                           class="form-control"
                           value="${translation && translation.profession ? translation.profession : ''}"
                           placeholder="Item profession">
                </div>


                <div class="col-lg-12 mb-3 item-title-block">
                    <label class="form-label">Title (${locale.toUpperCase()})</label>
                    <input type="text"
                           name="program_dynamics[${dynamicIndex}][items][${itemIndex}][translations][${locale}][title]"
                           class="form-control"
                           placeholder="Item title"
                           value="${translation && translation.title ? translation.title : ''}">
                </div>
                         <div class="col-lg-12 mb-3 item-subtitle-block">
                    <label class="form-label">Subtitle (${locale.toUpperCase()})</label>
                    <input type="text"
                           name="program_dynamics[${dynamicIndex}][items][${itemIndex}][translations][${locale}][subtitle]"
                           class="form-control"
                           placeholder="Item subtitle"
                           value="${translation && translation.subtitle ? translation.subtitle : ''}">
                </div>


                <div class="col-lg-12 mb-3 item-description-block">
                    <label class="form-label">Description (${locale.toUpperCase()})</label>
                    <textarea name="program_dynamics[${dynamicIndex}][items][${itemIndex}][translations][${locale}][description]"
                              class="form-control summernote-editor"
                              id="item-desc-${locale}-${dynamicIndex}-${itemIndex}"
                              rows="5"
                              placeholder="Enter description">${translation && translation.description ? translation.description : ''}</textarea>
                </div>
    `;

            //  is_active, type — yalnız ilk locale
            if (isFirstLocale) {
                html += `
            <div class="col-lg-3 mb-3">
                <label class="form-label">Type</label>
                <select name="program_dynamics[${dynamicIndex}][items][${itemIndex}][type]"
                        class="form-select"
                        onchange="toggleItemImage(this)"
                        >
                    <option value="1" ${item.type == 1 ? 'selected' : ''}>Type 1</option>
                    <option value="2" ${item.type == 2 ? 'selected' : ''}>Career opportunities</option>

                    <option value="5" ${item.type == 5 ? 'selected' : ''}>Laboratory</option>
                    <option value="6" ${item.type == 6 ? 'selected' : ''}>Academic staff</option>
                    <option value="9" ${item.type == 9 ? 'selected' : ''}>Announcements</option>

                </select>
            </div>

            <div class="col-lg-3 mb-3">
                <label class="form-label">Active</label>
                <select name="program_dynamics[${dynamicIndex}][items][${itemIndex}][is_active]" class="form-select">
                    <option value="1" ${item.is_active == 1 ? 'selected' : ''}>Yes</option>
                    <option value="0" ${item.is_active == 0 ? 'selected' : ''}>No</option>
                </select>
            </div>
            <div class="col-lg-3 mb-3 item-hour-block" style="display:none;">
                    <label class="form-label">hour</label>
                    <input type="text"
                           name="program_dynamics[${dynamicIndex}][items][${itemIndex}][hour]"
                           class="form-control"
                           value="${item.hour}"
                           placeholder="Item hour">
                </div>
                                <div class="col-lg-3 mb-3 item-room-block" style="display:none;">
                    <label class="form-label">Room</label>
                    <input type="text"
                           name="program_dynamics[${dynamicIndex}][items][${itemIndex}][room]"
                           class="form-control"
                           value="${item.room}"
                           placeholder="Item room">
                </div>
                  <div class="col-lg-3 mb-3 item-code-block" style="display:none;">
                    <label class="form-label">Code</label>
                    <input type="text"
                           name="program_dynamics[${dynamicIndex}][items][${itemIndex}][code]"
                           class="form-control"
                           value="${item.code}"
                           placeholder="Item code">
                </div>
                <div class="col-lg-3 mb-3 item-credit-block" style="display:none;">
                    <label class="form-label">Credit</label>
                    <input type="text"
                           name="program_dynamics[${dynamicIndex}][items][${itemIndex}][credit]"
                           class="form-control"
                           value="${item.credit}"
                           placeholder="Item credit">
                </div>
                                <div class="col-lg-3 mb-3 item-email-block" style="display:none;">
                    <label class="form-label">Email</label>
                    <input type="text"
                           name="program_dynamics[${dynamicIndex}][items][${itemIndex}][email]"
                           class="form-control"
                           value="${item.email}"
                           placeholder="Item email">
                </div>
                <div class="col-lg-3 mb-3 item-phone-block" style="display:none;">
                    <label class="form-label">Phone</label>
                    <input type="text"
                           name="program_dynamics[${dynamicIndex}][items][${itemIndex}][phone]"
                           class="form-control"
                           value="${item.phone}"
                           placeholder="Item phone">
                </div>
                <div class="col-lg-3 mb-3 item-date-block" style="display:none;">
                <label class="form-label">Date</label>
                <input type="date"
                       name="program_dynamics[${dynamicIndex}][items][${itemIndex}][created_at]"
                       class="form-control"
                       value="${item.created_at}"
                       placeholder="Enter date">
            </div>
                    <div class="col-lg-3 mb-3 item-deadline-block" style="display:none;">
                <label class="form-label">Deadline</label>
                <input type="date"
                       name="program_dynamics[${dynamicIndex}][items][${itemIndex}][deadline]"
                       class="form-control"
                       value="${item.deadline}"
                       placeholder="Enter deadline">
            </div>
                                                  <div class="col-lg-12 mb-3 item-url-block" style="display:none;">
                    <label class="form-label">URL</label>
                    <input type="text"
                           name="program_dynamics[${dynamicIndex}][items][${itemIndex}][url]"
                           class="form-control"
                            value="${item.url}"

                           placeholder="Item url">
                </div>
        `;
            }

            // Image — yalnız ilk locale
            if (isFirstLocale) {
                html += `<div class="col-lg-12 mb-3 item-image-block">
            <label class="form-label">Image</label>`;

                if (item.image) {
                    html += `
                <div class="existing-image-wrapper mb-2">
                    <img src="/uploads/program_dynamic_items/${item.image}" class="existing-image" alt="Item image">
                    <button type="button" class="remove-existing-image"
                            onclick="markItemImageForDeletion(${dynamicIndex}, ${itemIndex})">
                        <i class="ri-close-line"></i>
                    </button>
                    <input type="hidden"
                           name="program_dynamics[${dynamicIndex}][items][${itemIndex}][keep_image]"
                           value="1"
                           id="keep-item-image-${dynamicIndex}-${itemIndex}">
                </div>
                <small class="text-muted d-block mb-2">Upload new image to replace</small>
            `;
                }

                html += `
            <input type="file"
                   name="program_dynamics[${dynamicIndex}][items][${itemIndex}][image]"
                   class="form-control"
                   accept="image/*"
                   onchange="previewImage(this, 'item-preview-${locale}-${dynamicIndex}-${itemIndex}')">
            <img id="item-preview-${locale}-${dynamicIndex}-${itemIndex}" class="image-preview" style="display:none;">
        </div>`;
            } else {
                html += `
            <div class="col-lg-12 mb-3">
                <div class="alert alert-info py-2 mb-0">
                    <i class="ri-image-line"></i> Image is managed in the first language tab
                </div>
            </div>`;
            }


            html += `
            </div>
            </div>
        </div>
    `;

            document.getElementById('dynamic-items-' + locale + '-' + dynamicIndex).insertAdjacentHTML('beforeend', html);

            // Initialize Summernote for item description
            setTimeout(() => {
                initializeSummernote(`#item-desc-${locale}-${dynamicIndex}-${itemIndex}`);
            }, 100);


            // Type yoxlanışı səhifə açılan kimi işləsin
            setTimeout(() => {
                let select = document
                    .getElementById(`dynamic-item-${locale}-${dynamicIndex}-${itemIndex}`)
                    .querySelector('select[name*="[type]"]');

                if (select) {
                    toggleItemImage(select);
                }
            }, 1000);

        }

        function addDynamicItem(locale, dynamicIndex) {
            if (!dynamicItemIndexes[locale]) {
                dynamicItemIndexes[locale] = {};
            }
            if (dynamicItemIndexes[locale][dynamicIndex] === undefined) {
                dynamicItemIndexes[locale][dynamicIndex] = 0;
            }

            let firstLocale = Object.keys(dynamicIndexes)[0];
            let isFirstLocale = (locale === firstLocale);
            let itemIndex = dynamicItemIndexes[locale][dynamicIndex];

            let html = `
        <div class="dynamic-item-accordion" id="dynamic-item-${locale}-${dynamicIndex}-${itemIndex}">
            <div class="dynamic-item-accordion-header"
                 id="item-header-${locale}-${dynamicIndex}-${itemIndex}"
                 onclick="toggleItemAccordion('${locale}', ${dynamicIndex}, ${itemIndex})">
                <div class="item-header-content">
                    <span class="item-header-title">
                        <i class="ri-list-check-2"></i> Item #${itemIndex + 1}
                    </span>
                </div>
                <button type="button" class="btn-remove-item"
                        onclick="event.stopPropagation(); removeDynamicItem('${locale}', ${dynamicIndex}, ${itemIndex})">
                    <i class="ri-close-line"></i> Remove
                </button>
            </div>
            <div class="dynamic-item-accordion-body show" id="item-body-${locale}-${dynamicIndex}-${itemIndex}">
            <div class="row">
                <div class="col-lg-3 mb-3 item-day-block">
                    <label class="form-label">Day (${locale.toUpperCase()})</label>
                    <input type="text"
                           name="program_dynamics[${dynamicIndex}][items][${itemIndex}][translations][${locale}][day]"
                           class="form-control"
                           placeholder="Item day">
                </div>

                <div class="col-lg-3 mb-3 item-name-block">
                    <label class="form-label">Name (${locale.toUpperCase()})</label>
                    <input type="text"
                           name="program_dynamics[${dynamicIndex}][items][${itemIndex}][translations][${locale}][name]"
                           class="form-control"
                           placeholder="Item name">
                </div>
                <div class="col-lg-3 mb-3 item-subject-name-block">
                    <label class="form-label">Subject name (${locale.toUpperCase()})</label>
                    <input type="text"
                           name="program_dynamics[${dynamicIndex}][items][${itemIndex}][translations][${locale}][subject_name]"
                           class="form-control"
                           placeholder="Item subject name">
                </div>





                <div class="col-lg-3 mb-3 item-examine-type-block">
                    <label class="form-label">Examine type (${locale.toUpperCase()})</label>
                    <input type="text"
                           name="program_dynamics[${dynamicIndex}][items][${itemIndex}][translations][${locale}][examine_type]"
                           class="form-control"
                           placeholder="Item examine type">
                </div>
                <div class="col-lg-3 mb-3 item-professor-block">
                    <label class="form-label">Professor (${locale.toUpperCase()})</label>
                    <input type="text"
                           name="program_dynamics[${dynamicIndex}][items][${itemIndex}][translations][${locale}][professor]"
                           class="form-control"
                           placeholder="Item professor">
                </div>


                <div class="col-lg-3 mb-3 item-education-type-block">
                    <label class="form-label">Education type (${locale.toUpperCase()})</label>
                    <input type="text"
                           name="program_dynamics[${dynamicIndex}][items][${itemIndex}][translations][${locale}][education_type]"
                           class="form-control"
                           placeholder="Item education type">
                </div>
                <div class="col-lg-3 mb-3 item-profession-block">
                    <label class="form-label">Profession (${locale.toUpperCase()})</label>
                    <input type="text"
                           name="program_dynamics[${dynamicIndex}][items][${itemIndex}][translations][${locale}][profession]"
                           class="form-control"
                           placeholder="Item profession">
                </div>


                <div class="col-lg-12 mb-3 item-title-block">
                    <label class="form-label">Title (${locale.toUpperCase()})</label>
                    <input type="text"
                           name="program_dynamics[${dynamicIndex}][items][${itemIndex}][translations][${locale}][title]"
                           class="form-control"
                           placeholder="Item title">
                </div>
                          <div class="col-lg-12 mb-3 item-subtitle-block">
                    <label class="form-label">Subtitle (${locale.toUpperCase()})</label>
                    <input type="text"
                           name="program_dynamics[${dynamicIndex}][items][${itemIndex}][translations][${locale}][subtitle]"
                           class="form-control"
                           placeholder="Item subtitle">
                </div>


                <div class="col-lg-12 mb-3 item-description-block">
                    <label class="form-label">Description (${locale.toUpperCase()})</label>
                    <textarea name="program_dynamics[${dynamicIndex}][items][${itemIndex}][translations][${locale}][description]"
                              class="form-control summernote-editor"
                              id="item-desc-${locale}-${dynamicIndex}-${itemIndex}"
                              rows="5"
                              placeholder="Enter description"></textarea>
                </div>
    `;

            // is_active, type — yalnız ilk locale
            if (isFirstLocale) {
                html += `
            <div class="col-lg-3 mb-3">
                <label class="form-label">Type</label>
                <select name="program_dynamics[${dynamicIndex}][items][${itemIndex}][type]"
                        class="form-select"
                        onchange="toggleItemImage(this)">
                    <option value="1">Type 1</option>
                    <option value="2">Career opportunities</option>

                    <option value="5">Laboratory</option>
                    <option value="6">Academic staff</option>
                    <option value="9">Announcements</option>

                </select>
            </div>

            <div class="col-lg-3 mb-3">
                <label class="form-label">Active</label>
                <select name="program_dynamics[${dynamicIndex}][items][${itemIndex}][is_active]" class="form-select">
                    <option value="1" selected>Yes</option>
                    <option value="0">No</option>
                </select>
            </div>
                <div class="col-lg-3 mb-3 item-hour-block" style="display:none;">
                    <label class="form-label">hour</label>
                    <input type="text"
                           name="program_dynamics[${dynamicIndex}][items][${itemIndex}][hour]"
                           class="form-control"
                           placeholder="Item hour">
                </div>
                                <div class="col-lg-3 mb-3 item-room-block" style="display:none;">
                    <label class="form-label">room</label>
                    <input type="text"
                           name="program_dynamics[${dynamicIndex}][items][${itemIndex}][room]"
                           class="form-control"
                           placeholder="Item room">
                </div>
                  <div class="col-lg-3 mb-3 item-code-block" style="display:none;">
                    <label class="form-label">Code</label>
                    <input type="text"
                           name="program_dynamics[${dynamicIndex}][items][${itemIndex}][code]"
                           class="form-control"
                           placeholder="Item code">
                </div>
                <div class="col-lg-3 mb-3 item-credit-block" style="display:none;">
                    <label class="form-label">Credit</label>
                    <input type="text"
                           name="program_dynamics[${dynamicIndex}][items][${itemIndex}][credit]"
                           class="form-control"
                           placeholder="Item credit">
                </div>
                                <div class="col-lg-3 mb-3 item-email-block" style="display:none;">
                    <label class="form-label">Email</label>
                    <input type="text"
                           name="program_dynamics[${dynamicIndex}][items][${itemIndex}][email]"
                           class="form-control"
                           placeholder="Item email">
                </div>
                <div class="col-lg-3 mb-3 item-phone-block" style="display:none;">
                    <label class="form-label">Phone</label>
                    <input type="text"
                           name="program_dynamics[${dynamicIndex}][items][${itemIndex}][phone]"
                           class="form-control"
                           placeholder="Item phone">
                </div>
                <div class="col-lg-3 mb-3 item-date-block" style="display:none;">
                <label class="form-label">Date</label>
                <input type="date"
                       name="program_dynamics[${dynamicIndex}][items][${itemIndex}][date]"
                       class="form-control"
                       placeholder="Enter date">
            </div>
                    <div class="col-lg-3 mb-3 item-deadline-block" style="display:none;">
                <label class="form-label">Deadline</label>
                <input type="date"
                       name="program_dynamics[${dynamicIndex}][items][${itemIndex}][deadline]"
                       class="form-control"
                       placeholder="Enter deadline">
            </div>
                                            <div class="col-lg-12 mb-3 item-url-block" style="display:none;">
                    <label class="form-label">URL</label>
                    <input type="text"
                           name="program_dynamics[${dynamicIndex}][items][${itemIndex}][url]"
                           class="form-control"
                           placeholder="Item url">
                </div>
        `;
            }

            // Image — yalnız ilk locale
            if (isFirstLocale) {
                html += `
            <div class="col-lg-12 mb-3 item-image-block">
                <label class="form-label">Image</label>
                <input type="file"
                       name="program_dynamics[${dynamicIndex}][items][${itemIndex}][image]"
                       class="form-control"
                       accept="image/*"
                       onchange="previewImage(this, 'item-preview-${locale}-${dynamicIndex}-${itemIndex}')">
                <img id="item-preview-${locale}-${dynamicIndex}-${itemIndex}" class="image-preview" style="display:none;">
            </div>
        `;
            } else {
                html += `
            <div class="col-lg-12 mb-3">
                <div class="alert alert-info py-2 mb-0">
                    <i class="ri-image-line"></i> Image is managed in the first language tab
                </div>
            </div>`;
            }

            html += `
            </div>
            </div>
        </div>
    `;

            document.getElementById('dynamic-items-' + locale + '-' + dynamicIndex).insertAdjacentHTML('beforeend', html);

            // Initialize Summernote for new item
            setTimeout(() => {
                initializeSummernote(`#item-desc-${locale}-${dynamicIndex}-${itemIndex}`);
            }, 100);

            setTimeout(() => {
                let select = document
                    .getElementById(`dynamic-item-${locale}-${dynamicIndex}-${itemIndex}`)
                    .querySelector('select[name*="[type]"]');

                if (select) {
                    toggleItemImage(select);
                }
            }, 100);


            dynamicItemIndexes[locale][dynamicIndex]++;


        }

        function removeDynamicItem(locale, dynamicIndex, itemIndex, itemId = null) {
            if (confirm('Are you sure you want to remove this item?')) {
                Object.keys(dynamicIndexes).forEach(loc => {
                    $(`#item-desc-${loc}-${dynamicIndex}-${itemIndex}`).summernote('destroy');
                    let el = document.getElementById('dynamic-item-' + loc + '-' + dynamicIndex + '-' + itemIndex);
                    if (el) el.remove();
                });

                if (itemId) {
                    let input = document.createElement('input');
                    input.type = 'hidden';
                    input.name = 'delete_program_dynamic_items[]';
                    input.value = itemId;
                    document.querySelector('form').appendChild(input);
                }
            }
        }

        function markImageForDeletion(index) {
            document.getElementById('keep-image-' + index).value = '0';
            event.target.closest('.existing-image-wrapper').style.opacity = '0.3';
        }

        function markMultiImageForDeletion(index, imageId) {
            document.getElementById('keep-multi-image-' + index + '-' + imageId).remove();
            event.target.closest('.existing-image-wrapper').style.opacity = '0.3';
        }

        function markItemImageForDeletion(dynamicIndex, itemIndex) {
            document.getElementById('keep-item-image-' + dynamicIndex + '-' + itemIndex).value = '0';
            event.target.closest('.existing-image-wrapper').style.opacity = '0.3';
        }

        function previewImage(input, previewId) {
            if (input.files && input.files[0]) {
                let reader = new FileReader();
                reader.onload = function(e) {
                    let preview = document.getElementById(previewId);
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        function toggleItemImage(select) {
            let itemBlock = select.closest('.dynamic-item-accordion-body');
            let imageBlock = itemBlock.querySelectorAll('.item-image-block');
            let descriptionBlock = itemBlock.querySelectorAll('.item-description-block');

            let nameBlock = itemBlock.querySelectorAll('.item-name-block');
            let professionBlock = itemBlock.querySelectorAll('.item-profession-block');

            let titleBlock = itemBlock.querySelectorAll('.item-title-block');

            let educationType = itemBlock.querySelectorAll('.item-education-type-block');
            let subjectNameBlock = itemBlock.querySelectorAll('.item-subject-name-block');
            let day = itemBlock.querySelectorAll('.item-day-block');

            let professor = itemBlock.querySelectorAll('.item-professor-block');
            let examineType = itemBlock.querySelectorAll('.item-examine-type-block');
            let subtitleBlock = itemBlock.querySelectorAll('.item-subtitle-block');


            if (!imageBlock) return;
            if (!descriptionBlock) return;

            if (select.value == '4' || select.value == '3' || select.value == '7' || select.value == '8' || select.value == '9' || select.value == '2') {
                imageBlock.forEach(el => {
                    el.style.display = 'none';
                });
            } else {
                imageBlock.forEach(el => {
                    el.style.display = 'block';
                });
            }
            if (select.value == '3' || select.value == '7' || select.value == '8') {
                descriptionBlock.forEach(el => {
                    el.style.display = 'none';
                });
            } else {
                descriptionBlock.forEach(el => {
                    el.style.display = 'block';
                });
            }

            if (select.value == '5' || select.value == '1' || select.value == '4' || select.value == '9') {
                titleBlock.forEach(el => {
                    el.style.display = 'block';
                });

            } else {
                titleBlock.forEach(el => {
                    el.style.display = 'none';
                });

            }

            if (select.value == '6') {

                nameBlock.forEach(el => {
                    el.style.display = 'block';
                });

            } else {
                nameBlock.forEach(el => {
                    el.style.display = 'none';
                });

            }
            if (select.value == '6') {
                professionBlock.forEach(el => {
                    el.style.display = 'block';
                });

            } else {
                professionBlock.forEach(el => {
                    el.style.display = 'none';
                });

            }
            if (select.value == '6') {
                document.querySelectorAll('.item-phone-block').forEach(el => {
                    el.style.display = 'block';
                });
                document.querySelectorAll('.item-email-block').forEach(el => {
                    el.style.display = 'block';
                });

            } else {
                document.querySelectorAll('.item-phone-block').forEach(el => {
                    el.style.display = 'none';
                });
                document.querySelectorAll('.item-email-block').forEach(el => {
                    el.style.display = 'none';
                });

            }


            if (select.value == '2' || select.value == '5' || select.value == '9') {
                document.querySelectorAll('.item-url-block').forEach(el => {
                    el.style.display = 'block';
                });
            } else {
                document.querySelectorAll('.item-url-block').forEach(el => {
                    el.style.display = 'none';
                });
            }




            if (select.value == '3') {
                document.querySelectorAll('.item-code-block').forEach(el => {
                    el.style.display = 'block';
                });
                    educationType.forEach(el => {
                    el.style.display = 'block';
                });

                document.querySelectorAll('.item-credit-block').forEach(el => {
                    el.style.display = 'block';
                });
            } else {
                document.querySelectorAll('.item-code-block').forEach(el => {
                    el.style.display = 'none';
                });
      educationType.forEach(el => {
                    el.style.display = 'none';
                });
                document.querySelectorAll('.item-credit-block').forEach(el => {
                    el.style.display = 'none';
                });
            }

            if (select.value == '7' || select.value == '8') {

                document.querySelectorAll('.item-room-block').forEach(el => {
                    el.style.display = 'block';
                });
                document.querySelectorAll('.item-day-block').forEach(el => {
                    el.style.display = 'block';
                });
                document.querySelectorAll('.item-hour-block').forEach(el => {
                    el.style.display = 'block';
                });
            } else {
                document.querySelectorAll('.item-room-block').forEach(el => {
                    el.style.display = 'none';
                });
                document.querySelectorAll('.item-day-block').forEach(el => {
                    el.style.display = 'none';
                });
                document.querySelectorAll('.item-hour-block').forEach(el => {
                    el.style.display = 'none';
                });
            }

            if (select.value == '7') {

                        professor.forEach(el => {
                    el.style.display = 'block';
                });

            } else {

                            professor.forEach(el => {
                    el.style.display = 'none';
                });
            }

            if (select.value == '8') {

                                 examineType.forEach(el => {
                    el.style.display = 'block';
                });

            } else {
                 examineType.forEach(el => {
                    el.style.display = 'none';
                });

            }



            if (select.value == '3' || select.value == '7' || select.value == '8') {
                                 subjectNameBlock.forEach(el => {
                    el.style.display = 'block';
                });

            } else {
                 subjectNameBlock.forEach(el => {
                    el.style.display = 'none';
                });
            }


            if (select.value == '9') {
                document.querySelectorAll('.item-date-block').forEach(el => {
                    el.style.display = 'block';
                });

                document.querySelectorAll('.item-deadline-block').forEach(el => {
                    el.style.display = 'block';
                });
                                 subtitleBlock.forEach(el => {
                    el.style.display = 'block';
                });
            } else {
                document.querySelectorAll('.item-date-block').forEach(el => {
                    el.style.display = 'none';
                });
                document.querySelectorAll('.item-deadline-block').forEach(el => {
                    el.style.display = 'none';
                });
                            subtitleBlock.forEach(el => {
                    el.style.display = 'none';
                });
            }

            if (select.value == '3' || select.value == '7') {
                document.querySelectorAll('.program-title-block').forEach(el => {
                    el.style.display = 'block';
                });
            } else {
                document.querySelectorAll('.program-title-block').forEach(el => {
                    el.style.display = 'none';
                });
            }


        }
    </script>


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

    // Səhifə açılarkən yoxla (edit üçün)
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
