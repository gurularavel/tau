<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\EventPageRequest;
use App\Models\Event;
use App\Models\EventCategory;
use App\Services\Contracts\EventPageServiceInterface;
use App\Models\EventPage;
use App\Services\Contracts\EventServiceInterface;
use App\Traits\FileManagable;

class EventPageController extends Controller
{
    use FileManagable;

    private const PATH = 'admin.eventPage.';

    private const TITLE = 'Events page';

    public function __construct(
        private readonly EventPageServiceInterface $eventPageService,
        private readonly EventServiceInterface   $eventService,




        ) {
        // $this->authorizeResource(EventPage::class);
    }
    public function index()
    {
        $eventPage = EventPage::first();
        $events = $this->eventService->getAll(
            columns: ['id','image','is_active'],
            sorting:'-created_at'
        );
        return view(self::PATH . 'edit', [
            'model' => $eventPage,
            'events' => $events,
            'title' => self::TITLE,
        ]);
    }

    public function update(EventPageRequest $request, EventPage $event_page)
    {
        $payload = $request->validated();
        $this->eventPageService->update($event_page,$payload, $request->file('image'));

        return redirect()
            ->route(self::PATH . 'index')
            ->with('success', __('translate.Successfully completed'));
    }



}
