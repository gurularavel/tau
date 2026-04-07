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

    buttons.forEach(btn => {
        btn.addEventListener('click', function() {
            // 1. Bütün düymələrdən active klasını silirik
            buttons.forEach(b => b.classList.remove('active'));

            // 2. Bütün tab-content div-lərindən active klasını silirik (hamısı gizlənir)
            tabs.forEach(tab => tab.classList.remove('active'));

            // 3. Kliklənən düyməni aktiv edirik
            this.classList.add('active');

            // 4. Düymənin data-tab-ındakı ID-ni götürüb həmin div-i tapırıq
            const targetId = this.getAttribute('data-tab'); // Bu tab-123 kimi dəyər qaytaracaq
            const targetTab = document.getElementById(targetId);

            if (targetTab) {
                targetTab.classList.add('active');
            }
        });
    });
});
</script>
