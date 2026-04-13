<x-admin.layout>
    <div id="layout-wrapper">
        <x-admin.header />
        <x-admin.remove-notification />
        <x-admin.app-menu />

        <div class="vertical-overlay"></div>

        <x-admin.crud.main-content>
            <x-admin.crud.page-content>
                <x-admin.crud.page-title :title="$title" />

                <x-admin.crud.card :routeName="'pages.update'" :method="'update'" :model="$model" :routeNameForBackButton="'pages'" :show="true" :frontRouteName="'pages.show'">

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
                                            :required="true" />
                                    </div>

                                    <div class="mb-3 col-lg-4">
                                        <x-admin.crud.input :locale="$locale" :model="$model" :columnName="'meta_description'"
                                            :label="'Meta description'" :placeholder="'Write a meta description'" :type="'text'"
                                            :required="true" />
                                    </div>

                                    <div class="mb-3 col-lg-4">
                                        <x-admin.crud.input :locale="$locale" :model="$model" :columnName="'meta_keywords'"
                                            :label="'Meta keywords'" :placeholder="'Write a meta keywords'" :type="'text'"
                                            :required="true" />
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
                                        <x-admin.crud.image.main-image :columnValue="$model->image" :name="'image'" :folderName="'pages'"/>
                                    </x-admin.crud.image.card-body>
                                </x-admin.crud.image.card>


                    <div class="card">
                        <div class="card-body row">
                            <div class="mb-3 col-lg-4">
                                <x-admin.crud.input :locale="''" :model="$model" :columnName="'slug'"
                                    :label="'Slug'" :placeholder="'Write a url'" :type="'text'" :required="false" />
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

        .dynamic-accordion-header.collapsed::after {
            transform: rotate(0deg);
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
            margin: 0;
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
            from {
                opacity: 0;
                max-height: 0;
            }
            to {
                opacity: 1;
                max-height: 2000px;
            }
        }

        .dynamic-item-block {
            background: white;
            border: 1px solid #dee2e6;
            border-radius: 6px;
            padding: 15px;
            margin-bottom: 10px;
            position: relative;
            transition: all 0.3s ease;
        }

        .dynamic-item-block:hover {
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
            border-color: #667eea;
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
            transition: all 0.3s ease;
        }

        .remove-existing-image:hover {
            background: #c82333;
            transform: scale(1.1);
        }

        .dynamic-items-wrapper {
            max-height: 600px;
            overflow-y: auto;
            padding-right: 10px;
        }

        .dynamic-items-wrapper::-webkit-scrollbar {
            width: 8px;
        }

        .dynamic-items-wrapper::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }

        .dynamic-items-wrapper::-webkit-scrollbar-thumb {
            background: #667eea;
            border-radius: 10px;
        }

        .dynamic-items-wrapper::-webkit-scrollbar-thumb:hover {
            background: #5568d3;
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
                    ['font', ['fontname', 'fontsize', 'fontsizeunit', 'bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear']],
                    ['color', ['color']],
                    ['lineheight', ['lineHeight']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['misc', ['undo', 'redo']],
                    ['view', ['codeview', 'help']]
                ],
                fontNames: ['Inter'],
                fontNamesIgnoreCheck: ['Inter']
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

        function addExistingDynamic(locale, dynamic, index) {
            let typeNames = {
                '1': 'Title',
                '2': 'Description',
                '3': 'Image',
                '4': 'Video',
                '5': 'Images',
                '6': 'Dynamic Items',
                '7': 'File'
            };

            let firstLocale = Object.keys(dynamicIndexes)[0];
            let isFirstLocale = (locale === firstLocale);

            let sharedFieldsHtml = isFirstLocale ? `
                <input type="hidden" name="dynamics[${index}][id]" value="${dynamic.id}">
                <div class="col-lg-3 mb-3">
                    <label class="form-label">Type</label>
                    <select name="dynamics[${index}][type]"
                            class="form-select">
                        <option value="1" ${dynamic.type == 1 ? 'selected' : ''}>Title</option>
                        <option value="2" ${dynamic.type == 2 ? 'selected' : ''}>Description</option>
                        <option value="3" ${dynamic.type == 3 ? 'selected' : ''}>Image</option>
                        <option value="4" ${dynamic.type == 4 ? 'selected' : ''}>Video</option>
                        <option value="5" ${dynamic.type == 5 ? 'selected' : ''}>Images (Multiple)</option>
                        <option value="6" ${dynamic.type == 6 ? 'selected' : ''}>Dynamic Items</option>
                        <option value="7" ${dynamic.type == 7 ? 'selected' : ''}>File</option>
                    </select>
                </div>

                <div class="col-lg-3 mb-3">
                    <label class="form-label">Active</label>
                    <select name="dynamics[${index}][is_active]" class="form-select">
                        <option value="1" ${dynamic.is_active == 1 ? 'selected' : ''}>Yes</option>
                        <option value="0" ${dynamic.is_active == 0 ? 'selected' : ''}>No</option>
                    </select>
                </div>
            ` : `
                <input type="hidden" name="dynamics[${index}][id]" value="${dynamic.id}">
            `;

            let html = `
                <div class="dynamic-accordion-item" id="dynamic-${locale}-${index}">
                    <div class="dynamic-accordion-header collapsed"
                         id="dynamic-header-${locale}-${index}"
                         onclick="toggleAccordion('${locale}', ${index})">
                        <div class="dynamic-header-content">
                            <span class="dynamic-header-title">
                                <i class="ri-layout-grid-line"></i> Section #${index + 1}
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
                               name="dynamics[${index}][translations][${locale}][title]"
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
                        <textarea name="dynamics[${index}][translations][${locale}][description]"
                                  class="form-control summernote-editor"
                                  id="dynamic-desc-${locale}-${index}"
                                  rows="5"
                                  placeholder="Enter description">${translation && translation.description ? translation.description : ''}</textarea>
                    </div>
                `;
            }

            // Type 3: Single Image
            if (type == 3) {
                if (isFirstLocale) {
                    html += `<div class="col-lg-12 mb-3">
                        <label class="form-label">Image</label>`;

                    if (dynamic.image) {
                        html += `
                            <div class="existing-image-wrapper mb-2">
                                <img src="/uploads/dynamics/${dynamic.image}" class="existing-image" alt="Existing image">
                                <button type="button" class="remove-existing-image"
                                        onclick="markImageForDeletion(${index}, 'single')">
                                    <i class="ri-close-line"></i>
                                </button>
                                <input type="hidden" name="dynamics[${index}][keep_image]" value="1" id="keep-image-${index}">
                            </div>
                            <small class="text-muted d-block mb-2">Upload new image to replace</small>
                        `;
                    }

                    html += `
                        <input type="file"
                               name="dynamics[${index}][image]"
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

            // Type 4: Video
            if (type == 4) {
                if (isFirstLocale) {
                    html += `
                        <div class="col-lg-12 mb-3">
                            <label class="form-label">Video URL</label>
                            <input type="url"
                                   name="dynamics[${index}][video]"
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

            // Type 5: Multiple Images
            if (type == 5) {
                if (isFirstLocale) {
                    html += `<div class="col-lg-12 mb-3">
                        <label class="form-label">Images (Multiple)</label>`;

                    if (dynamic.images && dynamic.images.length > 0) {
                        html += '<div class="mb-3">';
                        dynamic.images.forEach((img, imgIndex) => {
                            html += `
                                <div class="existing-image-wrapper me-2 mb-2" style="display: inline-block;">
                                    <img src="/uploads/dynamics/${img.image}" class="existing-image" alt="Image ${imgIndex + 1}">
                                    <button type="button" class="remove-existing-image"
                                            onclick="markMultiImageForDeletion(${index}, ${img.id})">
                                        <i class="ri-close-line"></i>
                                    </button>
                                    <input type="hidden"
                                           name="dynamics[${index}][keep_images][]"
                                           value="${img.id}"
                                           id="keep-multi-image-${index}-${img.id}">
                                </div>
                            `;
                        });
                        html += '</div><small class="text-muted d-block mb-2">Upload new images to add more</small>';
                    }

                    html += `
                        <input type="file"
                               name="dynamics[${index}][images][]"
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

            // Type 7: File
            if (type == 7) {
                if (isFirstLocale) {
                    html += `<div class="col-lg-12 mb-3">
                        <label class="form-label">File</label>`;

                    if (dynamic.file) {
                        let ext = dynamic.file.split('.').pop().toLowerCase();
                        let iconClass = ext === 'pdf' ? 'ri-file-pdf-line text-danger' :
                                        ['doc','docx'].includes(ext) ? 'ri-file-word-line text-primary' :
                                        ['xls','xlsx'].includes(ext) ? 'ri-file-excel-line text-success' :
                                        ['zip','rar'].includes(ext) ? 'ri-file-zip-line text-warning' : 'ri-file-line';
                        html += `
                            <div class="existing-file-wrapper mb-2 d-flex align-items-center gap-2 p-2 border rounded bg-white">
                                <i class="${iconClass}" style="font-size:24px;"></i>
                                <a href="/uploads/dynamics_files/${dynamic.file}" target="_blank" class="text-truncate" style="max-width:300px;">${dynamic.file}</a>
                                <button type="button" class="btn btn-sm btn-outline-danger ms-auto"
                                        onclick="markFileForDeletion(${index})">
                                    <i class="ri-delete-bin-line"></i> Remove
                                </button>
                                <input type="hidden" name="dynamics[${index}][keep_file]" value="1" id="keep-file-${index}">
                            </div>
                            <small class="text-muted d-block mb-2">Upload a new file to replace</small>
                        `;
                    }

                    html += `
                        <input type="file"
                               name="dynamics[${index}][file]"
                               class="form-control"
                               id="file-input-${index}">
                        <small class="text-muted">PDF, DOC, DOCX, XLS, XLSX, ZIP and other files are supported</small>
                    </div>`;
                } else {
                    html += `
                        <div class="col-lg-12 mb-3">
                            <div class="alert alert-info py-2 mb-0">
                                <i class="ri-file-line"></i> File is managed in the first language tab
                            </div>
                        </div>`;
                }
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

            let sharedFieldsHtml = isFirstLocale ? `
                <div class="col-lg-3 mb-3">
                    <label class="form-label">Type</label>
                    <select name="dynamics[${index}][type]"
                            class="form-select"
                            onchange="toggleDynamicFields(this, '${locale}', ${index})">
                        <option value="1">Title</option>
                        <option value="2">Description</option>
                        <option value="3">Image</option>
                        <option value="4">Video</option>
                        <option value="5">Images (Multiple)</option>
                        <option value="6">Dynamic Items</option>
                        <option value="7">File</option>
                    </select>
                </div>

                <div class="col-lg-3 mb-3">
                    <label class="form-label">Active</label>
                    <select name="dynamics[${index}][is_active]" class="form-select">
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
                                <i class="ri-layout-grid-line"></i> Section #${index + 1}
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

            if (isFirstLocale) {
                toggleDynamicFields(
                    document.querySelector(`#dynamic-${locale}-${index} select[name="dynamics[${index}][type]"]`),
                    locale,
                    index
                );
            } else {
                let fakeSelect = { value: '1' };
                toggleDynamicFields(fakeSelect, locale, index);
            }

            dynamicIndexes[locale]++;
        }

        function removeDynamic(locale, index, dynamicId = null) {
            if (confirm('Are you sure you want to remove this dynamic section?')) {
                $(`#dynamic-desc-${locale}-${index}`).summernote('destroy');

                if (dynamicId) {
                    let input = document.createElement('input');
                    input.type = 'hidden';
                    input.name = 'delete_dynamics[]';
                    input.value = dynamicId;
                    document.querySelector('form').appendChild(input);
                }
                document.getElementById('dynamic-' + locale + '-' + index).remove();
            }
        }

        function markFileForDeletion(dynamicIndex) {
            let keepInput = document.getElementById('keep-file-' + dynamicIndex);
            if (keepInput) {
                keepInput.value = '0';
            }
            let wrapper = keepInput ? keepInput.closest('.existing-file-wrapper') : null;
            if (wrapper) {
                wrapper.style.opacity = '0.4';
                wrapper.style.textDecoration = 'line-through';
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
                '6': 'Dynamic Items',
                '7': 'File'
            };

            if (badge) badge.textContent = typeNames[type];

            $(`#dynamic-desc-${locale}-${index}`).summernote('destroy');

            let html = '<div class="row">';

            // Type 1: Title
            if (type == '1') {
                html += `
                    <div class="col-lg-12 mb-3">
                        <label class="form-label">Title (${locale.toUpperCase()})</label>
                        <input type="text"
                               name="dynamics[${index}][translations][${locale}][title]"
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
                        <textarea name="dynamics[${index}][translations][${locale}][description]"
                                  class="form-control summernote-editor"
                                  id="dynamic-desc-${locale}-${index}"
                                  rows="5"
                                  placeholder="Enter description"></textarea>
                    </div>
                `;
            }

            // Type 3: Image
            if (type == '3') {
                if (isFirstLocale) {
                    html += `
                        <div class="col-lg-12 mb-3">
                            <label class="form-label">Image</label>
                            <input type="file"
                                   name="dynamics[${index}][image]"
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

            // Type 4: Video
            if (type == '4') {
                if (isFirstLocale) {
                    html += `
                        <div class="col-lg-12 mb-3">
                            <label class="form-label">Video URL</label>
                            <input type="url"
                                   name="dynamics[${index}][video]"
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

            // Type 5: Multiple Images
            if (type == '5') {
                if (isFirstLocale) {
                    html += `
                        <div class="col-lg-12 mb-3">
                            <label class="form-label">Images (Multiple)</label>
                            <input type="file"
                                   name="dynamics[${index}][images][]"
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

            // Type 7: File
            if (type == '7') {
                if (isFirstLocale) {
                    html += `
                        <div class="col-lg-12 mb-3">
                            <label class="form-label">File</label>
                            <input type="file"
                                   name="dynamics[${index}][file]"
                                   class="form-control">
                            <small class="text-muted">PDF, DOC, DOCX, XLS, XLSX, ZIP and other files are supported</small>
                        </div>
                    `;
                } else {
                    html += `
                        <div class="col-lg-12 mb-3">
                            <div class="alert alert-info py-2 mb-0">
                                <i class="ri-file-line"></i> File is managed in the first language tab
                            </div>
                        </div>`;
                }
            }

            html += '</div>';
            container.innerHTML = html;

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
            let firstLocale = Object.keys(dynamicIndexes)[0];
            let isFirstLocale = (locale === firstLocale);
            let translation = item.translations ? item.translations[locale] : null;

            // Avoid nested template literals — build conditional parts first
            let idInput = item.id
                ? '<input type="hidden" name="dynamics[' + dynamicIndex + '][items][' + itemIndex + '][id]" value="' + item.id + '">'
                : '';

            let html = `
                <div class="dynamic-item-block" id="dynamic-item-${locale}-${dynamicIndex}-${itemIndex}">
                    ${idInput}

                    <div class="position-absolute end-0 top-0 m-2 d-flex gap-1" style="z-index:10">
                        <button type="button"
                                class="btn btn-info btn-sm"
                                title="Duplicate"
                                style="cursor:pointer"
                                onclick="duplicateDynamicItem('${locale}', ${dynamicIndex}, ${itemIndex})">
                            <i class="ri-file-copy-line"></i>
                        </button>
                        <button type="button"
                                class="btn btn-danger btn-sm"
                                style="cursor:pointer"
                                onclick="removeDynamicItem('${locale}', ${dynamicIndex}, ${itemIndex}, ${item.id})">
                            <i class="ri-close-line"></i>
                        </button>
                    </div>

                    <div class="row">
                        <div class="col-lg-12 mb-2">
                            <strong class="text-primary">Item #${itemIndex + 1}</strong>
                        </div>

                        <div class="col-lg-6 mb-3 item-name-block">
                            <label class="form-label">Name (${locale.toUpperCase()})</label>
                            <input type="text"
                                   name="dynamics[${dynamicIndex}][items][${itemIndex}][translations][${locale}][name]"
                                   class="form-control"
                                   value="${translation && translation.name ? translation.name : ''}"
                                   placeholder="Item name">
                        </div>
                        <div class="col-lg-6 mb-3 item-profession-block">
                            <label class="form-label">Profession (${locale.toUpperCase()})</label>
                            <input type="text"
                                   name="dynamics[${dynamicIndex}][items][${itemIndex}][translations][${locale}][profession]"
                                   class="form-control"
                                   value="${translation && translation.profession ? translation.profession : ''}"
                                   placeholder="Item profession">
                        </div>
                        <div class="col-lg-6 mb-3 item-email-block">
                            <label class="form-label">Email (${locale.toUpperCase()})</label>
                            <input type="text"
                                   name="dynamics[${dynamicIndex}][items][${itemIndex}][translations][${locale}][email]"
                                   class="form-control"
                                   value="${translation && translation.email ? translation.email : ''}"
                                   placeholder="Item email">
                        </div>
                        <div class="col-lg-6 mb-3 item-phone-block">
                            <label class="form-label">Phone (${locale.toUpperCase()})</label>
                            <input type="text"
                                   name="dynamics[${dynamicIndex}][items][${itemIndex}][translations][${locale}][phone]"
                                   class="form-control"
                                   value="${translation && translation.phone ? translation.phone : ''}"
                                   placeholder="Item phone">
                        </div>

                        <div class="col-lg-12 mb-3 item-title-block">
                            <label class="form-label">Title (${locale.toUpperCase()})</label>
                            <input type="text"
                                   name="dynamics[${dynamicIndex}][items][${itemIndex}][translations][${locale}][title]"
                                   class="form-control"
                                   placeholder="Item title"
                                   value="${translation && translation.title ? translation.title : ''}">
                        </div>

                        <div class="col-lg-12 mb-3 item-description-block">
                            <label class="form-label">Description (${locale.toUpperCase()})</label>
                            <textarea name="dynamics[${dynamicIndex}][items][${itemIndex}][translations][${locale}][description]"
                                      class="form-control summernote-editor"
                                      id="item-desc-${locale}-${dynamicIndex}-${itemIndex}"
                                      rows="5"
                                      placeholder="Enter description">${translation && translation.description ? translation.description : ''}</textarea>
                        </div>
            `;

            if (isFirstLocale) {
                html += `
                    <div class="col-lg-4 mb-3">
                        <label class="form-label">Type</label>
                        <select name="dynamics[${dynamicIndex}][items][${itemIndex}][type]"
                                class="form-select"
                                onchange="toggleItemImage(this)">
                            <option value="1" ${item.type == 1 ? 'selected' : ''}>Type 1</option>
                            <option value="2" ${item.type == 2 ? 'selected' : ''}>Type 2</option>
                            <option value="3" ${item.type == 3 ? 'selected' : ''}>Type 3</option>
                            <option value="4" ${item.type == 4 ? 'selected' : ''}>Type 4</option>
                            <option value="5" ${item.type == 5 ? 'selected' : ''}>Type 5</option>
                            <option value="6" ${item.type == 6 ? 'selected' : ''}>Type 6</option>
                            <option value="7" ${item.type == 7 ? 'selected' : ''}>Type 7</option>
                            <option value="8" ${item.type == 8 ? 'selected' : ''}>Type 8</option>
                        </select>
                    </div>

                    <div class="col-lg-4 mb-3">
                        <label class="form-label">Active</label>
                        <select name="dynamics[${dynamicIndex}][items][${itemIndex}][is_active]" class="form-select">
                            <option value="1" ${item.is_active == 1 ? 'selected' : ''}>Yes</option>
                            <option value="0" ${item.is_active == 0 ? 'selected' : ''}>No</option>
                        </select>
                    </div>
                `;
            }

            if (isFirstLocale) {
                html += `<div class="col-lg-12 mb-3 item-image-block">
                    <label class="form-label">Image</label>`;

                if (item.image) {
                    if (item.id) {
                        // Existing saved item — keep/delete behaviour
                        html += `
                            <div class="existing-image-wrapper mb-2">
                                <img src="/uploads/dynamic_items/${item.image}" class="existing-image" alt="Item image">
                                <button type="button" class="remove-existing-image"
                                        onclick="markItemImageForDeletion(${dynamicIndex}, ${itemIndex})">
                                    <i class="ri-close-line"></i>
                                </button>
                                <input type="hidden"
                                       name="dynamics[${dynamicIndex}][items][${itemIndex}][keep_image]"
                                       value="1"
                                       id="keep-item-image-${dynamicIndex}-${itemIndex}">
                            </div>
                            <small class="text-muted d-block mb-2">Upload new image to replace</small>
                        `;
                    } else {
                        // Duplicated item — tell server to copy the source file
                        html += `
                            <div class="existing-image-wrapper mb-2">
                                <img src="/uploads/dynamic_items/${item.image}" class="existing-image" alt="Item image">
                                <input type="hidden"
                                       name="dynamics[${dynamicIndex}][items][${itemIndex}][copy_image]"
                                       value="${item.image}">
                            </div>
                            <small class="text-muted d-block mb-2">Upload new image to replace</small>
                        `;
                    }
                }

                html += `
                    <input type="file"
                           name="dynamics[${dynamicIndex}][items][${itemIndex}][image]"
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
            `;

            document.getElementById('dynamic-items-' + locale + '-' + dynamicIndex).insertAdjacentHTML('beforeend', html);

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
                <div class="dynamic-item-block" id="dynamic-item-${locale}-${dynamicIndex}-${itemIndex}">
                    <div class="position-absolute end-0 top-0 m-2 d-flex gap-1" style="z-index:10">
                        <button type="button"
                                class="btn btn-info btn-sm"
                                title="Duplicate"
                                style="cursor:pointer"
                                onclick="duplicateDynamicItem('${locale}', ${dynamicIndex}, ${itemIndex})">
                            <i class="ri-file-copy-line"></i>
                        </button>
                        <button type="button"
                                class="btn btn-danger btn-sm"
                                style="cursor:pointer"
                                onclick="removeDynamicItem('${locale}', ${dynamicIndex}, ${itemIndex})">
                            <i class="ri-close-line"></i>
                        </button>
                    </div>

                    <div class="row">
                        <div class="col-lg-12 mb-2">
                            <strong class="text-primary">Item #${itemIndex + 1}</strong>
                        </div>

                        <div class="col-lg-6 mb-3 item-name-block">
                            <label class="form-label">Name (${locale.toUpperCase()})</label>
                            <input type="text"
                                   name="dynamics[${dynamicIndex}][items][${itemIndex}][translations][${locale}][name]"
                                   class="form-control"
                                   placeholder="Item name">
                        </div>
                        <div class="col-lg-6 mb-3 item-profession-block">
                            <label class="form-label">Profession (${locale.toUpperCase()})</label>
                            <input type="text"
                                   name="dynamics[${dynamicIndex}][items][${itemIndex}][translations][${locale}][profession]"
                                   class="form-control"
                                   placeholder="Item profession">
                        </div>
                        <div class="col-lg-6 mb-3 item-email-block">
                            <label class="form-label">Email (${locale.toUpperCase()})</label>
                            <input type="text"
                                   name="dynamics[${dynamicIndex}][items][${itemIndex}][translations][${locale}][email]"
                                   class="form-control"
                                   placeholder="Item email">
                        </div>
                        <div class="col-lg-6 mb-3 item-phone-block">
                            <label class="form-label">Phone (${locale.toUpperCase()})</label>
                            <input type="text"
                                   name="dynamics[${dynamicIndex}][items][${itemIndex}][translations][${locale}][phone]"
                                   class="form-control"
                                   placeholder="Item phone">
                        </div>

                        <div class="col-lg-12 mb-3 item-title-block">
                            <label class="form-label">Title (${locale.toUpperCase()})</label>
                            <input type="text"
                                   name="dynamics[${dynamicIndex}][items][${itemIndex}][translations][${locale}][title]"
                                   class="form-control"
                                   placeholder="Item title">
                        </div>

                        <div class="col-lg-12 mb-3 item-description-block">
                            <label class="form-label">Description (${locale.toUpperCase()})</label>
                            <textarea name="dynamics[${dynamicIndex}][items][${itemIndex}][translations][${locale}][description]"
                                      class="form-control summernote-editor"
                                      id="item-desc-${locale}-${dynamicIndex}-${itemIndex}"
                                      rows="5"
                                      placeholder="Enter description"></textarea>
                        </div>
            `;

            if (isFirstLocale) {
                html += `
                    <div class="col-lg-4 mb-3">
                        <label class="form-label">Type</label>
                        <select name="dynamics[${dynamicIndex}][items][${itemIndex}][type]"
                                class="form-select"
                                onchange="toggleItemImage(this)">
                            <option value="1">Type 1</option>
                            <option value="2">Type 2</option>
                            <option value="3">Type 3</option>
                            <option value="4">Type 4</option>
                            <option value="5">Type 5</option>
                            <option value="6">Type 6</option>
                            <option value="7">Type 7</option>
                            <option value="8">Type 8</option>
                        </select>
                    </div>

                    <div class="col-lg-4 mb-3">
                        <label class="form-label">Active</label>
                        <select name="dynamics[${dynamicIndex}][items][${itemIndex}][is_active]" class="form-select">
                            <option value="1" selected>Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                `;
            }

            if (isFirstLocale) {
                html += `
                    <div class="col-lg-12 mb-3 item-image-block">
                        <label class="form-label">Image</label>
                        <input type="file"
                               name="dynamics[${dynamicIndex}][items][${itemIndex}][image]"
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
            `;

            document.getElementById('dynamic-items-' + locale + '-' + dynamicIndex).insertAdjacentHTML('beforeend', html);

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

        function duplicateDynamicItem(callerLocale, dynamicIndex, itemIndex) {
            try {
                let allLocales = Object.keys(dynamicIndexes);
                let firstLocale = allLocales[0];

                // Collect translations from every locale's block
                let translations = {};
                allLocales.forEach(function(locale) {
                    translations[locale] = {};
                    let block = document.getElementById('dynamic-item-' + locale + '-' + dynamicIndex + '-' + itemIndex);
                    if (!block) return;

                    ['name', 'profession', 'email', 'phone', 'title'].forEach(function(field) {
                        let input = block.querySelector('input[name*="[translations][' + locale + '][' + field + ']"]');
                        if (input) translations[locale][field] = input.value;
                    });

                    // Description — read from Summernote if initialised
                    let descId = 'item-desc-' + locale + '-' + dynamicIndex + '-' + itemIndex;
                    try {
                        let val = $('#' + descId).summernote('code');
                        translations[locale]['description'] = (val && val !== '<p><br></p>') ? val : '';
                    } catch(e) {
                        let el = document.getElementById(descId);
                        if (el) translations[locale]['description'] = el.value || '';
                    }
                });

                // Type, is_active & image live only in first-locale block
                let typeVal = '1', isActiveVal = '1', imageFilename = null;
                let firstBlock = document.getElementById('dynamic-item-' + firstLocale + '-' + dynamicIndex + '-' + itemIndex);
                if (firstBlock) {
                    let ts = firstBlock.querySelector('select[name*="[items][' + itemIndex + '][type]"]');
                    let as = firstBlock.querySelector('select[name*="[items][' + itemIndex + '][is_active]"]');
                    if (ts) typeVal = ts.value;
                    if (as) isActiveVal = as.value;

                    // Read image filename from the existing image src
                    let imgEl = firstBlock.querySelector('.item-image-block .existing-image');
                    if (imgEl) {
                        let src = imgEl.getAttribute('src') || '';
                        imageFilename = src.split('/').pop() || null;
                    }
                }

                let fakeItem = { id: null, type: typeVal, is_active: isActiveVal, image: imageFilename, translations: translations };

                allLocales.forEach(function(locale) {
                    if (!dynamicItemIndexes[locale]) dynamicItemIndexes[locale] = {};
                    if (dynamicItemIndexes[locale][dynamicIndex] === undefined) {
                        // Fallback: count existing items in the DOM
                        let container = document.getElementById('dynamic-items-' + locale + '-' + dynamicIndex);
                        dynamicItemIndexes[locale][dynamicIndex] = container
                            ? container.querySelectorAll(':scope > .dynamic-item-block').length
                            : 0;
                    }
                    let newIdx = dynamicItemIndexes[locale][dynamicIndex];
                    addExistingDynamicItem(locale, dynamicIndex, fakeItem, newIdx);
                    dynamicItemIndexes[locale][dynamicIndex]++;
                });
            } catch(err) {
                console.error('duplicateDynamicItem error:', err);
            }
        }

        function removeDynamicItem(locale, dynamicIndex, itemIndex, itemId = null) {
            if (!confirm('Are you sure you want to remove this item?')) return;

            const removeFromDom = () => {
                Object.keys(dynamicIndexes).forEach(function(loc) {
                    try { $(`#item-desc-${loc}-${dynamicIndex}-${itemIndex}`).summernote('destroy'); } catch(e) {}
                    let el = document.getElementById('dynamic-item-' + loc + '-' + dynamicIndex + '-' + itemIndex);
                    if (el) el.remove();
                });
            };

            if (itemId) {
                // Existing DB item — delete via AJAX immediately
                fetch(`/admin/dynamic-items/${itemId}`, {
                    method: 'DELETE',
                    headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}', 'Content-Type': 'application/json' }
                })
                .then(r => r.json())
                .then(data => {
                    if (data.success) {
                        removeFromDom();
                        showNotify('success', "{{ __('translate.Successfully completed') }}");
                    } else {
                        showNotify('error', "{{ __('translate.An error occurred!') }}");
                    }
                })
                .catch(() => showNotify('error', "{{ __('translate.An error occurred!') }}"));
            } else {
                // Unsaved new item — just remove from DOM
                removeFromDom();
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
            let itemBlock = select.closest('.dynamic-item-block');
            let imageBlock = itemBlock.querySelector('.item-image-block');
            let nameBlock = itemBlock.querySelector('.item-name-block');
            let professionBlock = itemBlock.querySelector('.item-profession-block');
            let phoneBlock = itemBlock.querySelector('.item-phone-block');
            let emailBlock = itemBlock.querySelector('.item-email-block');
            let titleBlock = itemBlock.querySelector('.item-title-block');
            let descriptionBlock = itemBlock.querySelector('.item-description-block');

            if (!imageBlock) return;

            if (select.value == '4') {
                imageBlock.style.display = 'none';
            } else {
                imageBlock.style.display = 'block';
            }

            if (select.value == '5' || select.value == '7' || select.value == '8') {
                titleBlock.style.display = 'none';
            } else {
                titleBlock.style.display = 'block';
            }

            if (select.value == '8') {
                descriptionBlock.style.display = 'none';
            } else {
                descriptionBlock.style.display = 'block';
            }

            if (select.value == '5' || select.value == '6' || select.value == '7' || select.value == '8') {
                nameBlock.style.display = 'block';
            } else {
                nameBlock.style.display = 'none';
            }

            if (select.value == '5' || select.value == '6' || select.value == '7' || select.value == '8') {
                professionBlock.style.display = 'block';
            } else {
                professionBlock.style.display = 'none';
            }

            if (select.value == '5' || select.value == '6' || select.value == '7' || select.value == '8') {
                emailBlock.style.display = 'block';
            } else {
                emailBlock.style.display = 'none';
            }

            if (select.value == '6' || select.value == '7' || select.value == '8') {
                phoneBlock.style.display = 'block';
            } else {
                phoneBlock.style.display = 'none';
            }
        }
    </script>

</x-admin.layout>
