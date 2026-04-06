@props(['label', 'name', 'model' => null, 'options' => [], 'required' => false, 'locales' => ['az', 'en', 'ru']])

<label class="form-label">{{ $label }}
    @if ($required)
        <span class="text-danger">*</span>
    @endif
</label>

<input type="hidden" name="{{ $name }}" id="hidden-{{ $name }}"
    value="{{ old($name) ?? ($model->$name ?? '') }}">

<div class="row g-3" id="card-select-{{ $name }}">
    @foreach ($options as $option)
        <div class="col-3">
            <div class="card selectable-card @if ((old($name) ?? ($model->$name ?? '')) == $option['value']) selected @endif"
                data-value="{{ $option['value'] }}" style="cursor:pointer;">
                <img src="{{ $option['image'] }}" class="card-img-top"
                    style="width: 100%; height: 200px; object-fit: contain; object-position: center; background-color: #f8f9fa;">

                <div class="card-body text-center">
                    <p class="card-text">{{ $option['label'] }}</p>
                </div>
            </div>
        </div>
    @endforeach
</div>

@error($name)
    <div class="text-danger small mt-1">{{ $message }}</div>
@enderror

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const target = document.getElementById('content');
        const container = document.getElementById('card-select-{{ $name }}');
        const hiddenInput = document.getElementById('hidden-{{ $name }}');
        const locales = @json($locales);

        function checkType(selectedValue) {
            locales.forEach(locale => {
                const title = document.getElementById(`title-${locale}`);
                const desc = document.getElementById(`desc-${locale}`);
                const blockWrapper = document.getElementById(`block-items-${locale}`);

                if (!title || !desc || !blockWrapper) return;

                if (selectedValue == "5") {
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth'
                        });
                    }
                    title.style.display = "none";
                    desc.style.display = "none";
                    blockWrapper.style.display = "block";
                } else if (selectedValue == "1") {
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth'
                        });
                    }
                    title.style.display = "block";
                    desc.style.display = "block";
                    blockWrapper.style.display = "none";
                } else if (selectedValue == "2") {
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth'
                        });
                    }
                    title.style.display = "none";
                    desc.style.display = "block";
                    blockWrapper.style.display = "none";
                } else if (selectedValue == "3") {
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth'
                        });
                    }
                    title.style.display = "none";
                    desc.style.display = "none";
                    blockWrapper.style.display = "block";
                } else if (selectedValue == "4") {
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth'
                        });
                    }
                    title.style.display = "block";
                    desc.style.display = "none";
                    blockWrapper.style.display = "block";
                }
            });
        }

        // Kart click
        container.querySelectorAll('.selectable-card').forEach(card => {
            card.addEventListener('click', function() {
                // Deselect all
                container.querySelectorAll('.selectable-card').forEach(c => c.classList.remove(
                    'selected'));
                // Select clicked
                this.classList.add('selected');
                // Update hidden input
                hiddenInput.value = this.dataset.value;
                // Update visibility
                checkType(this.dataset.value);
            });
        });

        // İlk yüklənmədə yoxlama
        if (hiddenInput.value) {
            checkType(hiddenInput.value);
        }

        // Əvvəlki add/remove block item funksiyası
        document.querySelectorAll('.add-block-item').forEach(btn => {
            btn.addEventListener('click', function() {
                const locale = btn.dataset.locale;
                const wrapper = document.querySelector(`.block-item-wrapper-${locale}`);
                const isFirstLocale = locale === locales[0];

                const newRow = document.createElement('div');
                newRow.classList.add('block-item-row', 'mb-3', 'p-3', 'border', 'rounded');

                let slugField = '';
                let urlField = '';

                if (isFirstLocale) {
                    slugField = `
                    <div class="mb-2">
                        <label>Slug</label>
                        <input type="text"
                               name="block_items[slugs][]"
                               class="form-control"
                               placeholder="Write slug (optional)">
                    </div>
                `;

                    urlField = `
                    <div class="mb-2">
                        <label>URL</label>
                        <input type="text"
                               name="block_items[urls][]"
                               class="form-control"
                               placeholder="Write a url">
                    </div>
                `;
                }

                newRow.innerHTML = `
                <div class="mb-2">
                    <label>Title (${locale.toUpperCase()})</label>
                    <input type="text"
                           name="block_items[${locale}][titles][]"
                           class="form-control"
                           placeholder="Write block item title">
                </div>
                ${slugField}
                                ${urlField}

                <button type="button" class="btn btn-danger btn-sm remove-block-item">Delete</button>
            `;
                wrapper.appendChild(newRow);
            });
        });

        document.addEventListener('click', function(e) {
            if (e.target.classList.contains('remove-block-item')) {
                const row = e.target.closest('.block-item-row');
                if (row) row.remove();
            }
        });

    });
</script>

<style>
    .selectable-card {
        transition: all 0.2s;
        border: 2px solid transparent;
    }

    .selectable-card:hover {
        border-color: #0d6efd;
    }

    .selectable-card.selected {
        border-color: #198754;
        background-color: #e9f7ef;
    }
</style>
