<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LanguageRequest;
use App\Models\Language;
use App\Services\Contracts\LanguageServiceInterface;
use App\Services\Custom\ConfigReader;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class LanguageController extends Controller
{
    private const PATH = 'admin.languages.';

    private const TITLE = 'Languages';

    public function __construct(private readonly LanguageServiceInterface $languageService)
    {
        $this->authorizeResource(Language::class);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        $model = new Language();
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
    public function destroy(Language $language): RedirectResponse
    {
        if ($language->is_main == 1) {
            return back()
            ->with('success', __('translate.The primary language cannot be deleted.'))
            ->withInput();
        }

        $this->languageService->delete($language);

        return redirect()
            ->route(self::PATH . 'index')
            ->with('success', __('translate.Successfully completed'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Language $language): View
    {
        $attributes = $language::attributes();

        return view(self::PATH . 'edit', [
            'attributes' => $attributes,
            'model' => $language,
            'title' => self::TITLE,
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @param LanguageRequest $request
     * @return View
     */
    public function index(LanguageRequest $request): View
    {
        $models = $this->languageService->getAllPaginated(
            requestParser: $request->parser(),
            columns: ['id', 'name', 'locale', 'is_main', 'is_active'],
        );
        $attributes = Language::attributes();
        $headerAttributes = Language::headerAttributes();

        return view(self::PATH . 'index', [
            'attributes' => $attributes,
            'headerAttributes' => $headerAttributes,
            'models' => $models,
            'title' => self::TITLE,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param LanguageRequest $request
     * @return RedirectResponse
     */
    public function store(LanguageRequest $request): RedirectResponse
    {
        $payload = $request->validated();

        // if (
        //     $payload['is_main'] == Language::IS_MAIN
        //     && $payload['is_active'] != Language::IS_ACTIVE
        // ) {
        //     return back()->with('warning', 'Əsas dil deaktiv kimi yaradıla bilməz')->withInput();
        // }

        // if (
        //     $payload['is_main'] == Language::IS_MAIN
        //     && $payload['is_active'] == Language::IS_ACTIVE
        // ) {
        //     $this->languageService->disableMainLanguage();
        // }

        $this->languageService->create($payload);

        return redirect()
            ->route(self::PATH . 'index')
            ->with('success', __('translate.Successfully completed'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LanguageRequest $request, Language $language, ConfigReader $configReader): RedirectResponse
    {
        $payload = $request->validated();

        if (
            $payload['is_main'] == Language::IS_MAIN
            && $payload['is_active'] != 1
        ) {
            return back()
                ->with('warning', 'Dil əsas və deaktiv kimi redaktə oluna bilməz')
                ->withInput();
        }

        if (
            $payload['is_main'] == !Language::IS_MAIN
            && $language->getAttribute('is_main') == Language::IS_MAIN
        ) {
            return back()
                ->with('warning', 'Əsas dil deaktiv oluna bilməz')
                ->withInput();
        }

        if (
            $payload['is_main'] == Language::IS_MAIN
            && $payload['is_active'] == Language::IS_ACTIVE
        ) {
            $this->languageService->disableMainLanguage();
        }

        $this->languageService->update($language, $payload);

        return redirect()
            ->route(self::PATH . 'index')
            ->with('success', __('translate.Successfully completed'));
    }
}
