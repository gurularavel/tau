<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AnnouncementRequest;
use App\Models\Language;
use App\Models\Announcement;
use App\Models\AnnouncementImage;
use App\Models\User;
use App\Services\Contracts\AnnouncementServiceInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Traits\FileManagable;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    use FileManagable;

    private const PATH = 'admin.announcements.';

    private const TITLE = 'Announcements';

    public function __construct(private readonly AnnouncementServiceInterface $announcementService)
    {
        // $this->authorizeResource(Announcement::class);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        $users = User::all();

        return view(self::PATH . 'create', [
            'title' => self::TITLE,
            'users' => $users,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Announcement $announcement): RedirectResponse
    {
        $this->announcementService->delete($announcement);

        return redirect()->route('admin.announcements.index', '#announcements')->with('success', __('translate.Successfully completed'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Announcement $announcement): View
    {
        $users = User::all();

        return view(self::PATH . 'edit', [
            'model' => $announcement,
            'users' => $users,
            'title' => self::TITLE,
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @param AnnouncementRequest $request
     * @return View
     */
    public function index(AnnouncementRequest $request): View
    {
        $models = $this->announcementService->getAllPaginated(requestParser: $request->parser(), columns: ['id', 'image','created_at', 'status', 'view_counts', 'slug']);
        $attributes = Announcement::attributes();
        $headerAttributes = Announcement::headerAttributes();

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
    public function show(Announcement $announcement): View
    {
        return view(self::PATH . 'show', [
            'model' => $announcement,
            'title' => self::TITLE,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param AnnouncementRequest $request
     * @return RedirectResponse
     */
    public function store(AnnouncementRequest $request): RedirectResponse
    {
        $payload = $request->validated();
        $payload['images'] = $request->file('images');

        $this->announcementService->create(storeSlug($payload, Announcement::class), $request->file('image'));

        return redirect()->route('admin.announcements.index')->with('success', __('translate.Successfully completed'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AnnouncementRequest $request, Announcement $announcement): RedirectResponse
    {
        $payload = $request->validated();

        $payload['images'] = $request->file('images');

        $this->announcementService->update($announcement, updateSlug($payload, $announcement), $request->file('image'));

        return redirect()->back()->with('success', __('translate.Successfully completed'));
    }

    public function removeAnnouncementMedia()
    {
        $mediaId = request()->mediaId;
        $media = AnnouncementImage::findOrFail($mediaId);

        $this->deleteFile('announcement_images', $media->image);
        $media->delete();

        return response()->json(['success' => true, 'message' => 'Media deleted successfully']);
    }

    public function loadMore(Request $request)
    {
        $offset = $request->input('offset', 0);
        $limit = 5;

        $announcement = Announcement::orderBy('created_at', 'desc')->skip($offset)->take($limit)->get();

        $html = view('components.front.announcement-item', compact('announcement'))->render();

        return response()->json(['html' => $html, 'count' => $announcement->count()]);
    }

    public function showImageOrder(Announcement $announcement): View
    {
        return view('admin.announcement.order-images', [
            'title' => self::TITLE,
            'model' => $announcement,
            'images' => $announcement->images()->orderBy('order')->get(),
        ]);
    }
    public function updateImageOrder(Announcement $announcement): RedirectResponse
    {
        $imageOrders = request('imageOrders');

        foreach ($imageOrders as $imageId => $order) {
            AnnouncementImage::where('id', $imageId)
                ->where('announcement_id', $announcement->id)
                ->update(['order' => $order]);
        }

        return redirect()->back()->with('success', __('translate.Successfully completed'));
    }
}
