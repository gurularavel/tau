<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\HistoryPageRequest;
use App\Models\HistoryPage;
use App\Models\HistoryPageInfo;
use App\Services\Contracts\HistoryPageServiceInterface;
use App\Traits\FileManagable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\View\View;

class HistoryPageController extends Controller
{
    use FileManagable;

    private const PATH  = 'admin.historyPage.';
    private const TITLE = 'History Page';
    private const FOLDER = 'history_page';

    public function __construct(private readonly HistoryPageServiceInterface $historyPageService)
    {
    }

    public function index(): View
    {
        $historyPage = HistoryPage::first();
        $infos = HistoryPageInfo::with('translations')->orderBy('order')->get();

        return view(self::PATH . 'edit', [
            'model'  => $historyPage,
            'infos'  => $infos,
            'title'  => self::TITLE,
        ]);
    }

    public function update(HistoryPageRequest $request, HistoryPage $historyPage): RedirectResponse
    {
        $payload = $request->validated();

        $this->historyPageService->update(
            $historyPage,
            $payload,
            $request->file('breadcrumb'),
            $request->file('image1'),
            $request->file('image2'),
            $request->file('image3'),
            $request->file('image4'),
        );

        return redirect()->route('admin.historyPage.index')
            ->with('success', __('translate.Successfully completed'));
    }

    // ─── Info cards ───────────────────────────────────────────────────────────

    public function storeInfo(Request $request): RedirectResponse
    {
        $info = new HistoryPageInfo();
        $info->order = HistoryPageInfo::max('order') + 1;

        if ($request->hasFile('icon')) {
            $info->icon = $this->upload(self::FOLDER . '_infos', $request->file('icon'));
        }

        $info->save();

        foreach (getLocales() as $locale) {
            $info->translateOrNew($locale)->title       = $request->input("title:$locale");
            $info->translateOrNew($locale)->description = $request->input("description:$locale");
        }
        $info->save();

        return redirect()->route('admin.historyPage.index')
            ->with('success', __('translate.Successfully completed'));
    }

    public function updateInfo(Request $request, HistoryPageInfo $historyPageInfo): RedirectResponse
    {
        $historyPageInfo->order = $request->input('order', $historyPageInfo->order);

        if ($request->hasFile('icon')) {
            if ($historyPageInfo->icon) {
                $this->deleteIconFile($historyPageInfo->icon);
            }
            $historyPageInfo->icon = $this->upload(self::FOLDER . '_infos', $request->file('icon'));
        }

        $historyPageInfo->save();

        foreach (getLocales() as $locale) {
            $historyPageInfo->translateOrNew($locale)->title       = $request->input("title:$locale");
            $historyPageInfo->translateOrNew($locale)->description = $request->input("description:$locale");
        }
        $historyPageInfo->save();

        return redirect()->route('admin.historyPage.index')
            ->with('success', __('translate.Successfully completed'));
    }

    public function destroyInfo(HistoryPageInfo $historyPageInfo): RedirectResponse
    {
        if ($historyPageInfo->icon) {
            $this->deleteIconFile($historyPageInfo->icon);
        }
        $historyPageInfo->delete();

        return redirect()->route('admin.historyPage.index')
            ->with('success', __('translate.Successfully completed'));
    }

    private function deleteIconFile(string $filename): void
    {
        $path = public_path('uploads/' . self::FOLDER . '_infos/' . $filename);
        if (File::exists($path)) {
            File::delete($path);
        }
    }
}
