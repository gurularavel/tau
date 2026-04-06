<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MediaGuidePageRequest;
use App\Services\Contracts\MediaGuidePageServiceInterface;
use App\Models\MediaGuidePage;
use App\Models\MediaGuidePageImage;
use App\Traits\FileManagable;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
class MediaGuidePageController extends Controller
{
    use FileManagable;

    private const PATH = 'admin.mediaGuidePage.';

    private const TITLE = 'Media guide page';

    public function __construct(private readonly MediaGuidePageServiceInterface $mediaGuidePageService)
    {
        // $this->authorizeResource(MediaGuidePage::class);
    }
    public function index()
    {
        $mediaGuidePage = MediaGuidePage::first();

        return view(self::PATH . 'edit', [
            'model' => $mediaGuidePage,
            'title' => self::TITLE,
        ]);
    }

    public function update(MediaGuidePageRequest $request, MediaGuidePage $mediaGuidePage)
    {
        $payload = $request->validated();
        $payload['images'] = $request->file('images');


        $this->mediaGuidePageService->update($mediaGuidePage, $payload, $request->file('image'), $request->file('image2'), $request->file('image3'));

        return redirect()
            ->route(self::PATH . 'index')
            ->with('success', __('translate.Successfully completed'));
    }

    public function showImageOrder(MediaGuidePage $mediaGuidePage): View
    {
        return view('admin.mediaGuidePage.order-images', [
            'title' => self::TITLE,
            'model' => $mediaGuidePage,
            'images' => $mediaGuidePage->images()->orderBy('order')->get(),
        ]);
    }

    public function updateImageOrder(MediaGuidePage $mediaGuidePage): RedirectResponse
    {
        $imageOrders = request('imageOrders');

        foreach ($imageOrders as $imageId => $order) {
            MediaGuidePageImage::where('id', $imageId)
                ->where('media_guide_page_id', $mediaGuidePage->id)
                ->update(['order' => $order]);
        }

        return redirect()->back()->with('success', __('translate.Successfully completed'));
    }

    public function removeMediaGuidePageMedia()
    {
        $mediaId = request()->mediaId;
        $media = MediaGuidePageImage::findOrFail($mediaId);

        $this->deleteFile('media_guide_page_images', $media->image);
        $media->delete();

        return response()->json(['success' => true, 'message' => 'Media deleted successfully']);
    }
}
