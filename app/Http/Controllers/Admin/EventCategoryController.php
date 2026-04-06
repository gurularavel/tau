<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\EventCategoryRequest;
use App\Models\EventCategory;
use App\Services\Contracts\EventCategoryServiceInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class EventCategoryController extends Controller
{
    private const PATH = 'admin.event_categories.';

    private const TITLE = 'Event categories';

    public function __construct(private readonly EventCategoryServiceInterface $eventCategoryService)
    {
        $this->authorizeResource(EventCategory::class);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        $model = new EventCategory();
        $attributes = $model::attributes();

        return view(self::PATH . 'create', [
            'attributes' => $attributes,
            'model' => $model,
            'title' => self::TITLE,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EventCategory $event_category): RedirectResponse
    {
        $this->eventCategoryService->delete($event_category);

        return redirect()
            ->route(self::PATH . 'index')
            ->with('success', __('translate.Successfully completed'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EventCategory $event_category): View
    {
        $attributes = $event_category::attributes();

        return view(self::PATH . 'edit', [
            'attributes' => $attributes,
            'model' => $event_category,
            'title' => self::TITLE,
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @param EventCategoryRequest $request
     * @return View
     */
    public function index(EventCategoryRequest $request): View
    {
        $models = $this->eventCategoryService->getAllPaginated(
            requestParser: $request->parser(),
            columns: ['id', 'is_active'],
        );
        $attributes = EventCategory::attributes();
        $headerAttributes = EventCategory::headerAttributes();

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
    public function show(EventCategory $event_category): View
    {
        return view(self::PATH . 'show', [
            'model' => $event_category,
            'title' => self::TITLE,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param EventCategoryRequest $request
     * @return RedirectResponse
     */
    public function store(EventCategoryRequest $request): RedirectResponse
    {
        $payload = $request->validated();

        $this->eventCategoryService->create(storeSlug($payload, EventCategory::class));

        return redirect()
            ->route('admin.event_categories.index')
            ->with('success', __('translate.Successfully completed'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EventCategoryRequest $request, EventCategory $event_category): RedirectResponse
    {
        $payload = $request->validated();

        $this->eventCategoryService->update($event_category, updateSlug($payload, $event_category));

        return redirect()
            ->route('admin.event_categories.edit', $event_category)
            ->with('success', __('translate.Successfully completed'));
    }
}
