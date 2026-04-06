@forelse($calendars as $key => $item)
    @php
        $locale = app()->getLocale();
        $eventDate = \Carbon\Carbon::parse($item->event_date);
        $daysLeft = now()->startOfDay()->diffInDays($eventDate->startOfDay(), false);
    @endphp
    <tr>
        {{-- 1. id (#) --}}
        <td>{{ $key + 1 }}</td>

        {{-- 2. subject --}}
        <td>{{ $item->translate($locale)?->subject ?? '---' }}</td>

        {{-- 3. academic_year --}}
        <td>{{ $item->academic_year ?? '---' }}</td>

        {{-- 4. semester --}}
        <td>{{ $item->semester?->translate($locale)?->name ?? '---' }}</td>

        {{-- 5. education_level --}}
        <td>{{ $item->educationLevel?->translate($locale)?->name ?? '---' }}</td>

        {{-- 6. faculty --}}
        <td>{{ $item->faculty?->translate($locale)?->name ?? '---' }}</td>

        {{-- 7. education_type --}}
        <td>{{ $item->educationType?->translate($locale)?->name ?? '---' }}</td>

        {{-- 8. event_type --}}
        <td>{{ $item->eventType?->translate($locale)?->name ?? '---' }}</td>

        {{-- 9. event_date --}}
        <td>{{ $eventDate->format('d.m.Y') }}</td>

        {{-- 10. remaining_days --}}
        <td>
            @if($daysLeft > 0)
                {{ $daysLeft }} {{ __('translate.day') }}
            @elseif($daysLeft == 0)
                <strong class="text-success">{{ __('translate.Today') }}</strong>
            @else
                <span class="text-muted">{{ __('translate.Finished') }}</span>
            @endif
        </td>
    </tr>
@empty
    <tr>
        <td colspan="10" class="text-center">
            {{ __('translate.No information found') }}
        </td>
    </tr>
@endforelse
