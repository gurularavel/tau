<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\NewsRequest;
use App\Models\Language;
use App\Models\News;
use App\Models\NewsImage;
use App\Models\User;
use App\Services\Contracts\NewsServiceInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Traits\FileManagable;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    use FileManagable;

    private const PATH = 'admin.news.';

    private const TITLE = 'News';

    public function __construct(private readonly NewsServiceInterface $newsService)
    {
        $this->authorizeResource(News::class);
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
    public function destroy(News $news): RedirectResponse
    {
        $this->newsService->delete($news);

        return redirect()->route('admin.news.index', '#news')->with('success', __('translate.Successfully completed'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(News $news): View
    {
        $users = User::all();

        return view(self::PATH . 'edit', [
            'model' => $news,
            'users' => $users,
            'title' => self::TITLE,
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @param NewsRequest $request
     * @return View
     */
    public function index(NewsRequest $request): View
    {
        $models = $this->newsService->getAllPaginated(requestParser: $request->parser(), columns: ['id', 'image','created_at', 'status', 'view_counts', 'slug']);
        $attributes = News::attributes();
        $headerAttributes = News::headerAttributes();

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
    public function show(News $news): View
    {
        return view(self::PATH . 'show', [
            'model' => $news,
            'title' => self::TITLE,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param NewsRequest $request
     * @return RedirectResponse
     */
    public function store(NewsRequest $request): RedirectResponse
    {
        $payload = $request->validated();
        $payload['images'] = $request->file('images');

        $this->newsService->create(storeSlug($payload, News::class), $request->file('image'));

        return redirect()->route('admin.news.index')->with('success', __('translate.Successfully completed'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(NewsRequest $request, News $news): RedirectResponse
    {
        $payload = $request->validated();

        $payload['images'] = $request->file('images');

        $this->newsService->update($news, updateSlug($payload, $news), $request->file('image'));

        return redirect()->back()->with('success', __('translate.Successfully completed'));
    }

    public function removeNewsMedia()
    {
        $mediaId = request()->mediaId;
        $media = NewsImage::findOrFail($mediaId);

        $this->deleteFile('news_images', $media->image);
        $media->delete();

        return response()->json(['success' => true, 'message' => 'Media deleted successfully']);
    }

    public function loadMore(Request $request)
    {
        $offset = $request->input('offset', 0);
        $limit = 5;

        $news = News::orderBy('created_at', 'desc')->skip($offset)->take($limit)->get();

        $html = view('components.front.news-item', compact('news'))->render();

        return response()->json(['html' => $html, 'count' => $news->count()]);
    }

    public function showImageOrder(News $news): View
    {
        return view('admin.news.order-images', [
            'title' => self::TITLE,
            'model' => $news,
            'images' => $news->images()->orderBy('order')->get(),
        ]);
    }
    public function updateImageOrder(News $news): RedirectResponse
    {
        $imageOrders = request('imageOrders');

        foreach ($imageOrders as $imageId => $order) {
            NewsImage::where('id', $imageId)
                ->where('news_id', $news->id)
                ->update(['order' => $order]);
        }

        return redirect()->back()->with('success', __('translate.Successfully completed'));
    }
}
