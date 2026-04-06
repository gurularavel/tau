<x-front.layout :title="$program->meta_title" :metaDescription="$program->meta_description" :metaKeywords="$program->meta_keywords" :folder="'programs'" :image="$program->image" >

    <section class="breadcrumb container-fluid">
        <img src="{{ getImage('programs', $program->image) }}" alt="Breadcrumb" />
    </section>

    <section class="single-program-content container">
        <div class="tab-buttons">

            {{-- Dynamic tabs --}}
            @foreach ($program->programs_list as $item)
                <button class="tab-btn" data-tab="tab-{{ $item->id }}">
                    <div class="icon">
                        <img src="{{ getImage('programs', $item->image2) }}" alt="{{ $item->title ?? '' }}" />
                    </div>
                    {{ $item->title ?? '' }}
                </button>
            @endforeach
        </div>




        <div class="tabs-container">
            <div id="tab-default" class="tab-content tab-default active">
                @include('front.programs.partials.dynamic-content', ['rows' => $rows])
            </div>
            @foreach ($program->programs_list as $item)
                <div id="tab-{{ $item->id }}" class="tab-content tab-default">
                    @include('front.programs.partials.dynamic-content', [
                        'rows' => $childRows[$item->id] ?? [],
                    ])
                </div>
            @endforeach
        </div>









        </div>
    </section>


</x-front.layout>
<script>
    document.addEventListener('DOMContentLoaded', function() {

        const buttons = document.querySelectorAll('.tab-btn');
        const tabs = document.querySelectorAll('.tab-content');

        // 🔥 DEFAULT TAB AKTİV
        document.querySelector('.tab-btn[data-tab="default"]')?.classList.add('active');
        document.getElementById('tab-default')?.classList.add('active');

        // 🔥 CLICK EVENT
        buttons.forEach(btn => {
            btn.addEventListener('click', function() {

                // bütün buttonları deaktiv et
                buttons.forEach(b => b.classList.remove('active'));

                // bütün tabları gizlət
                tabs.forEach(tab => tab.classList.remove('active'));

                // klik olunanı aktiv et
                this.classList.add('active');

                const target = this.dataset.tab;

                if (target === 'default') {
                    document.getElementById('tab-default')?.classList.add('active');
                } else {
                    document.getElementById(target)?.classList.add('active');
                }
            });
        });

    });
</script>
