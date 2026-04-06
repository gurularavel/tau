<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\EventRequest;
use App\Models\Event;
use App\Models\EventCategory;
use App\Models\EventImage;
use App\Services\Contracts\ProductServiceInterface;
use App\Services\Contracts\EventServiceInterface;
use App\Services\EventCategoryService;
use App\Traits\FileManagable;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class EventController extends Controller
{
    use FileManagable;

    private const PATH = 'admin.events.';

    private const TITLE = 'Events';

    public function __construct(private readonly EventServiceInterface $eventService, private readonly EventCategoryService $categoryService)
    {
        $this->authorizeResource(Event::class);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        $model = new Event();
        $categories = $this->categoryService->getAll(columns: ['id'], conditions: [['is_active', '=', EventCategory::IS_ACTIVE]]);
        return view(self::PATH . 'create', [
            'model' => $model,
            'categories' => $categories,
            'title' => self::TITLE,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event): RedirectResponse
    {
        $this->eventService->delete($event);

        return redirect()->route('admin.events.index')->with('success', __('translate.Successfully completed'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event): View
    {
        $attributes = $event::attributes();
        $categories = $this->categoryService->getAll(columns: ['id'], conditions: [['is_active', '=', EventCategory::IS_ACTIVE]]);
        return view(self::PATH . 'edit', [
            'attributes' => $attributes,
            'categories' => $categories,
            'model' => $event,
            'title' => self::TITLE,
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @param EventRequest $request
     * @return View
     */
    public function index(EventRequest $request): View
    {
        $models = $this->eventService->getAllPaginated(requestParser: $request->parser(), columns: ['id', 'image', 'created_at','is_active', 'slug']);
        $attributes = Event::attributes();
        $headerAttributes = Event::headerAttributes();

        return view(self::PATH . 'index', [
            'attributes' => $attributes,
            'headerAttributes' => $headerAttributes,
            'models' => $models,
            'title' => self::TITLE,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event): View
    {
        return view(self::PATH . 'show', [
            'model' => $event,
            'title' => self::TITLE,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param EventRequest $request
     * @return RedirectResponse
     */
    public function store(EventRequest $request): RedirectResponse
    {
        $payload = $request->validated();
        $payload['images'] = $request->file('images');

        $event = $this->eventService->create(storeSlug($payload, Event::class), $request->file('image'));


        return redirect()->route('admin.events.index')->with('success', __('translate.Successfully completed'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EventRequest $request, Event $event)
    {
        $payload = $request->validated();
        $payload['images'] = $request->file('images');

        $this->eventService->update($event, updateSlug($payload, $event), $request->file('image'));


        return back()->with('success', __('translate.Successfully completed'));
    }

    public function showImageOrder(Event $event): View
    {
        return view('admin.events.order-images', [
            'title' => self::TITLE,
            'model' => $event,
            'images' => $event->images()->orderBy('order')->get(),
        ]);
    }

    public function updateImageOrder(Event $event): RedirectResponse
    {
        $imageOrders = request('imageOrders');

        foreach ($imageOrders as $imageId => $order) {
            EventImage::where('id', $imageId)
                ->where('event_id', $event->id)
                ->update(['order' => $order]);
        }

        return redirect()->back()->with('success', __('translate.Successfully completed'));
    }

    public function removeEventsMedia()
    {
        $mediaId = request()->mediaId;
        $media = EventImage::findOrFail($mediaId);

        $this->deleteFile('event_images', $media->image);
        $media->delete();

        return response()->json(['success' => true, 'message' => 'Media deleted successfully']);
    }
}
