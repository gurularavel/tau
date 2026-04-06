<x-front.layout :title="$metaTitle" :metaDescription="$metaDescription" :metaKeywords="$metaKeywords">

<section class="breadcrumb container-fluid">
    <img src="{{ asset('assets/front/images/media/breadcrumb.jpg') }}" alt="Breadcrumb" />
</section>

<section class="media container">
<div class="media-header" style="display:flex !important; flex-direction:row !important; justify-content:space-between !important; align-items:center !important;">
        <h2>{{ __('translate.Announcements') }}</h2>

       <div class="media-filters">
        <div class="selection-container filter-date">
            <div class="selection-header">
                <img src="{{ asset('assets/front/icons/calendar-black-bg.svg') }}" />
                Tarix Filteri
                <img src="{{ asset('assets/front/icons/chevron-down.svg') }}" />
            </div>
            <div class="selection-options">
                @foreach($availableYears as $year)
                <div class="option">
                    <input type="checkbox" id="y{{ $year }}" />
                    <label for="y{{ $year }}">{{ $year }}</label>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    </div>

    <div class="media-content">
        <div class="media-elements" id="media-list">
            @include('front.announcements.announcements-items', ['items' => $items])
        </div>
    @if($items->hasMorePages())
        <a id="load-more" class="media-learn-more" data-page="2">{{ __('translate.More') }}</a>
    @endif
    </div>



</section>

<script>
document.addEventListener('DOMContentLoaded', function () {

    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry, i) => {
            if (entry.isIntersecting) {
                setTimeout(() => {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }, i * 150);
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.1 });

    function initCards() {
        document.querySelectorAll('#media-list .media-element:not(.loaded)').forEach(card => {
            card.classList.add('loaded');
            card.style.cssText = 'opacity:0; transform:translateY(60px); transition: opacity 0.5s ease, transform 0.5s ease;';
            observer.observe(card);
        });
    }

    initCards();

    // ── Filter ──────────────────────────────────────────
    function getSelectedYears() {
        return [...document.querySelectorAll('input[type="checkbox"]:checked')]
            .map(cb => cb.id.replace('y', ''));
    }

    function loadData(page = 1) {
        const years = getSelectedYears();
        const params = new URLSearchParams();
        if (years.length) params.set('years', years.join(','));
        params.set('page', page);

        fetch(`?${params.toString()}`, {
            headers: { 'X-Requested-With': 'XMLHttpRequest' }
        })
        .then(r => r.json())
        .then(data => {
            if (page === 1) {
                document.getElementById('media-list').innerHTML = data.html;
            } else {
                document.getElementById('media-list').insertAdjacentHTML('beforeend', data.html);
            }

            initCards();

            const btn = document.getElementById('load-more');
            if (btn) {
                if (data.hasMore) {
                    btn.dataset.page = page + 1;
                    btn.style.display = 'flex';
                } else {
                    btn.remove();
                }
            }
        });
    }

    // Checkbox dəyişəndə filter işlət
    document.querySelectorAll('input[type="checkbox"]').forEach(cb => {
        cb.addEventListener('change', () => loadData(1));
    });

    // Load More
    document.addEventListener('click', function (e) {
        if (e.target.id === 'load-more') {
            loadData(parseInt(e.target.dataset.page));
        }
    });

});
</script>

</x-front.layout>
