<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\EventCategory;
use App\Models\EventPage;

use function PHPSTORM_META\map;

class EventController extends Controller
{
    public function __construct() {}

public function index(?EventCategory $event_category = null)
{
    $query = Event::with(['category'])->active();

    if ($event_category) {
        $query->where('event_category_id', $event_category->id);
    }

    $events = $query->paginate(6);

    $eventPage = EventPage::with('translations')->first();
    $pCategories = EventCategory::with('translations')->active()->get();

    $metaTitle       = $eventPage->meta_title;
    $metaDescription = $eventPage->meta_description;
    $metaKeywords    = $eventPage->meta_keywords;

    return view('front.eventPage.index', compact(
        'events',
        'eventPage',
        'metaTitle',
        'metaDescription',
        'metaKeywords',
        'event_category',
        'pCategories'
    ));
}

    public function show(Event $event)
    {
        $event->is_active == Event::IS_ACTIVE ?: abort(404);
        $metaTitle = $event->meta_title;
        $metaDescription = $event->meta_description;
        $metaKeywords = $event->meta_keywords;

        return view('front.eventPage.show', compact('event', 'metaTitle', 'metaDescription', 'metaKeywords'));
    }
}
