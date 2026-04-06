<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\VacancyRequest;
use App\Models\Vacancy;
use App\Services\Contracts\VacancyServiceInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class VacancyController extends Controller
{
    private const PATH = 'admin.vacancies.';
    private const TITLE = 'Vacancies';

    public function __construct(private readonly VacancyServiceInterface $vacancyService)
    {
        // $this->authorizeResource(Vacancy::class);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $model = new Vacancy();
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
    public function destroy(Vacancy $vacancy): RedirectResponse
    {
        $this->vacancyService->delete($vacancy);

        return redirect()
            ->route('admin.vacancies.index')
            ->with('success', __('translate.Successfully completed'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vacancy $vacancy): View
    {
        $attributes = $vacancy::attributes();

        return view(self::PATH . 'edit', [
            'attributes' => $attributes,
            'model' => $vacancy,
            'title' => self::TITLE,
        ]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(VacancyRequest $request): View
    {

        $models = $this->vacancyService->getAllPaginated(
            requestParser: $request->parser(),
            columns: ['id', 'view_counts', 'published_at', 'deadline', 'is_active'],
        );

        $attributes = Vacancy::attributes();
        $headerAttributes = Vacancy::headerAttributes();

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
    public function show(Vacancy $vacancy): View
    {
        return view(self::PATH . 'show', [
            'model' => $vacancy,
            'title' => self::TITLE,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VacancyRequest $request): RedirectResponse
    {
        $payload = $request->validated();

        $this->vacancyService->create(storeSlug($payload, Vacancy::class));

        return redirect()
            ->route('admin.vacancies.index') // Adətən index-ə qayıtmaq daha yaxşıdır
            ->with('success', __('translate.Successfully completed'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(VacancyRequest $request, Vacancy $vacancy): RedirectResponse
    {
        $payload = $request->validated();

        $this->vacancyService->update($vacancy, updateSlug($payload, $vacancy));

        return redirect()
            ->back()
            ->with('success', __('translate.Successfully completed'));
    }
}
