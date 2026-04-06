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

                <x-admin.crud.card :routeName="'pages.store'" :method="'post'" :routeNameForBackButton="'pages'">

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
                                        <x-admin.crud.input :locale="$locale" :model="''" :columnName="'title'"
                                            :label="'title'" :placeholder="'Write a title'" :type="'text'"
                                            :required="true" />
                                    </div>

                                    <div class="mb-3 col-lg-12">
                                        <x-admin.crud.textarea :locale="$locale" :model="''" :columnName="'content'"
                                            :label="'content'" :summerNoteID="1" />
                                    </div>

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

                                    {{-- Dynamic Sections --}}
                                    {{-- <div class="col-lg-12 mt-4">
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
                                        </div>
                                    </div> --}}

                                    <x-admin.crud.all-errors :errors="$errors" />



                                </x-admin.crud.card-body-row>
                            </x-admin.crud.tab-pane>
                        @endforeach
                    </x-admin.crud.tab-content>
                                              <x-admin.crud.image.card :title="$title">
                                    <x-admin.crud.image.card-body>
                                        <x-admin.crud.image.main-image :columnValue="''" :name="'image'" :folderName="'pages'"/>
                                    </x-admin.crud.image.card-body>
                                </x-admin.crud.image.card>

                </x-admin.crud.card>

            </x-admin.crud.page-content>
        </x-admin.crud.main-content>

    </div>

    <x-admin.back-to-up />
    <x-admin.preloader />

    <style>
        .dynamic-block {
            background: #f8f9fa;
            border: 2px solid #e9ecef;
            border-radius: 8px;
            position: relative;
            transition: all 0.3s ease;
        }

        .dynamic-block:hover {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            border-color: #dee2e6;
        }

        .dynamic-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 12px 15px;
            border-radius: 6px 6px 0 0;
            margin: -1rem -1rem 1rem -1rem;
        }

        .btn-remove-dynamic {
            position: absolute;
            top: 10px;
            right: 10px;
            z-index: 10;
        }

        .dynamic-item-block {
            background: white;
            border: 1px solid #dee2e6;
            border-radius: 6px;
            padding: 15px;
            margin-bottom: 10px;
            position: relative;
        }

        .dynamic-item-block:hover {
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        }

        .type-badge {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            background: rgba(255, 255, 255, 0.2);
        }

        .dynamic-sections-container {
            min-height: 50px;
        }

        .form-label {
            font-weight: 600;
            color: #495057;
            margin-bottom: 8px;
        }

        .image-preview {
            max-width: 150px;
            max-height: 150px;
            margin-top: 10px;
            border-radius: 6px;
            border: 2px solid #e9ecef;
        }
    </style>

    <script>
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

        function addDynamic(locale) {
            let index = dynamicIndexes[locale];

            let html = `
                <div class="card dynamic-block mb-3" id="dynamic-${locale}-${index}">
                    <button type="button" class="btn btn-danger btn-sm btn-remove-dynamic" onclick="removeDynamic('${locale}', ${index})">
                        <i class="ri-delete-bin-line"></i>
                    </button>

                    <div class="dynamic-header">
                        <h6 class="mb-0">
                            <i class="ri-layout-grid-line"></i> Dynamic Section #${index + 1}
                            <span class="type-badge" id="type-badge-${locale}-${index}">Title</span>
                        </h6>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-3 mb-3">
                                <label class="form-label">Type</label>
                                <select name="dynamics[${index}][type]"
                                        class="form-select"
                                        onchange="toggleDynamicFields(this, '${locale}', ${index})"
                                        required>
                                    <option value="1">Title</option>
                                    <option value="2">Description</option>
                                    <option value="3">Image</option>
                                    <option value="4">Video</option>
                                    <option value="5">Images (Multiple)</option>
                                    <option value="6">Dynamic Items</option>
                                </select>
                            </div>

                            <div class="col-lg-3 mb-3">
                                <label class="form-label">Order</label>
                                <input type="number"
                                       name="dynamics[${index}][order]"
                                       class="form-control"
                                       value="${index + 1}"
                                       min="0">
                            </div>

                            <div class="col-lg-3 mb-3">
                                <label class="form-label">Active</label>
                                <select name="dynamics[${index}][is_active]" class="form-select">
                                    <option value="1" selected>Yes</option>
                                    <option value="0">No</option>
                                </select>
                            </div>

                            <div class="col-lg-12" id="dynamic-fields-${locale}-${index}">
                                <!-- Dynamic fields will be inserted here -->
                            </div>
                        </div>
                    </div>
                </div>
            `;

            document.getElementById('dynamic-wrapper-' + locale).insertAdjacentHTML('beforeend', html);

            // Initialize with default type (Title)
            toggleDynamicFields(document.querySelector(
                `#dynamic-${locale}-${index} select[name="dynamics[${index}][type]"]`), locale, index);

            dynamicIndexes[locale]++;
        }

        function removeDynamic(locale, index) {
            if (confirm('Are you sure you want to remove this dynamic section?')) {
                // Destroy summernote before removing
                $(`#dynamic-desc-${locale}-${index}`).summernote('destroy');
                document.getElementById('dynamic-' + locale + '-' + index).remove();
            }
        }

        function toggleDynamicFields(select, locale, index) {
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

            badge.textContent = typeNames[type];

            // Destroy existing summernote if present
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
                               placeholder="Enter title"
                               required>
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

            // Type 3: Single Image
            if (type == '3') {
                html += `
                    <div class="col-lg-12 mb-3">
                        <label class="form-label">Image</label>
                        <input type="file"
                               name="dynamics[${index}][image]"
                               class="form-control"
                               accept="image/*"
                               onchange="previewImage(this, 'preview-${locale}-${index}')"
                               required>
                        <img id="preview-${locale}-${index}" class="image-preview" style="display:none;">
                    </div>
                `;
            }

            // Type 4: Video
            if (type == '4') {
                html += `
                    <div class="col-lg-12 mb-3">
                        <label class="form-label">Video URL</label>
                        <input type="url"
                               name="dynamics[${index}][video]"
                               class="form-control"
                               placeholder="https://youtube.com/watch?v=..."
                               required>
                        <small class="text-muted">Enter YouTube, Vimeo or direct video URL</small>
                    </div>
                `;
            }

            // Type 5: Multiple Images
            if (type == '5') {
                html += `
                    <div class="col-lg-12 mb-3">
                        <label class="form-label">Images (Multiple)</label>
                        <input type="file"
                               name="dynamics[${index}][images][]"
                               class="form-control"
                               multiple
                               accept="image/*"
                               required>
                        <small class="text-muted">You can select multiple images</small>
                    </div>
                `;
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
                            <!-- Dynamic items will be added here -->
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

            // If type 6, add one default item
            if (type == '6') {
                addDynamicItem(locale, index);
            }
        }

        let dynamicItemIndexes = {};

        function addDynamicItem(locale, dynamicIndex) {
            if (!dynamicItemIndexes[locale]) {
                dynamicItemIndexes[locale] = {};
            }
            if (dynamicItemIndexes[locale][dynamicIndex] === undefined) {
                dynamicItemIndexes[locale][dynamicIndex] = 0;
            }

            let itemIndex = dynamicItemIndexes[locale][dynamicIndex];

            let html = `
                <div class="dynamic-item-block" id="dynamic-item-${locale}-${dynamicIndex}-${itemIndex}">
                    <button type="button"
                            class="btn btn-danger btn-sm position-absolute end-0 top-0 m-2"
                            onclick="removeDynamicItem('${locale}', ${dynamicIndex}, ${itemIndex})">
                        <i class="ri-close-line"></i>
                    </button>

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

                        <div class="col-lg-12 mb-3">
                            <label class="form-label">Description (${locale.toUpperCase()})</label>
                            <textarea name="dynamics[${dynamicIndex}][items][${itemIndex}][translations][${locale}][description]"
                                      class="form-control summernote-editor"
                                      id="item-desc-${locale}-${dynamicIndex}-${itemIndex}"
                                      rows="5"
                                      placeholder="Enter description"></textarea>
                        </div>

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
                            </select>
                        </div>

                        <div class="col-lg-4 mb-3">
                            <label class="form-label">Order</label>
                            <input type="number"
                                   name="dynamics[${dynamicIndex}][items][${itemIndex}][order]"
                                   class="form-control"
                                   value="${itemIndex + 1}"
                                   min="0">
                        </div>

                        <div class="col-lg-4 mb-3">
                            <label class="form-label">Active</label>
                            <select name="dynamics[${dynamicIndex}][items][${itemIndex}][is_active]" class="form-select">
                                <option value="1" selected>Yes</option>
                                <option value="0">No</option>
                            </select>
                        </div>

                        <div class="col-lg-12 mb-3 item-image-block">
                            <label class="form-label">Image</label>
                            <input type="file"
                                   name="dynamics[${dynamicIndex}][items][${itemIndex}][image]"
                                   class="form-control"
                                   accept="image/*"
                                   onchange="previewImage(this, 'item-preview-${locale}-${dynamicIndex}-${itemIndex}')">
                            <img id="item-preview-${locale}-${dynamicIndex}-${itemIndex}" class="image-preview" style="display:none;">
                        </div>
                    </div>
                </div>
            `;

            document.getElementById('dynamic-items-' + locale + '-' + dynamicIndex).insertAdjacentHTML('beforeend', html);

            // Initialize Summernote for item description
            setTimeout(() => {
                initializeSummernote(`#item-desc-${locale}-${dynamicIndex}-${itemIndex}`);
            }, 100);

            // Toggle item fields based on default type
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

        function removeDynamicItem(locale, dynamicIndex, itemIndex) {
            if (confirm('Are you sure you want to remove this item?')) {
                // Destroy summernote before removing
                $(`#item-desc-${locale}-${dynamicIndex}-${itemIndex}`).summernote('destroy');
                document.getElementById('dynamic-item-' + locale + '-' + dynamicIndex + '-' + itemIndex).remove();
            }
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

            if (!imageBlock) return;

            if (select.value == '4') {
                imageBlock.style.display = 'none';
            } else {
                imageBlock.style.display = 'block';
            }

            if (select.value == '5') {
                titleBlock.style.display = 'none';
            } else {
                titleBlock.style.display = 'block';
            }

            if (select.value == '5' || select.value == '6') {
                nameBlock.style.display = 'block';
            } else {
                nameBlock.style.display = 'none';
            }

            if (select.value == '5' || select.value == '6') {
                professionBlock.style.display = 'block';
            } else {
                professionBlock.style.display = 'none';
            }

            if (select.value == '5' || select.value == '6') {
                emailBlock.style.display = 'block';
            } else {
                emailBlock.style.display = 'none';
            }

            if (select.value == '6') {
                phoneBlock.style.display = 'block';
            } else {
                phoneBlock.style.display = 'none';
            }
        }
    </script>

</x-admin.layout>
