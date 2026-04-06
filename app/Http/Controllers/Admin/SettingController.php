<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SettingRequest;
use App\Models\Setting;
use App\Services\Contracts\SettingServiceInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Artisan;
use Illuminate\View\View;

class SettingController extends Controller
{
    private const PATH = 'admin.settings.';
    private const TITLE = 'Settings';

    public function __construct(private readonly SettingServiceInterface $settingService)
    {
        $this->authorizeResource(Setting::class);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Setting $setting): View
    {
        $attributes = $setting::attributes();

        return view(self::PATH . 'edit', [
            'attributes' => $attributes,
            'model' => $setting,
            'title' => self::TITLE,
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @param SettingRequest $request
     * @return View
     */
    public function index(SettingRequest $request): View
    {
        $models = $this->settingService->getAllPaginated(
            requestParser: $request->parser(),
            columns: ['id', 'keyword', 'value', 'type'],
        );
        $attributes = Setting::attributes();
        $headerAttributes = Setting::headerAttributes();

        return view(self::PATH . 'index', [
            'attributes' => $attributes,
            'headerAttributes' => $headerAttributes,
            'models' => $models,
            'title' => self::TITLE,
        ]);
    }

    public function optimize(SettingRequest $request): RedirectResponse
    {
        if (!$request->user()->hasRole('Admin')) {
            abort(403);
        }
        Artisan::call('optimize:clear');

        return redirect()
        ->route('admin.index')
        ->with('success', __('translate.Successfully completed'));
    }

    /**
     * Display the specified resource.
     *
     * @param Setting $setting
     * @return View
     */
    public function show(Setting $setting): View
    {
        return view(self::PATH . 'show', [
            'model' => $setting,
            'title' => self::TITLE,
        ]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(SettingRequest $request, Setting $setting): RedirectResponse
    {
        $payload = $request->validated();

        $this->settingService->update($setting, $payload, $request->file('file'));

        return redirect()
            ->route(self::PATH . 'index')
            ->with('success', __('translate.Successfully completed'));
    }
}
