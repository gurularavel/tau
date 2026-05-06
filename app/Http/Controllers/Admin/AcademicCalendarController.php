<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AcademicCalendarRequest;
use App\Models\AcademicCalendar;
use App\Services\Contracts\AcademicCalendarServiceInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Http\Request;

class AcademicCalendarController extends Controller
{

    private const PATH = 'admin.academic_calendars.';

    private const TITLE = 'Academic calendar';

    public function __construct(private readonly AcademicCalendarServiceInterface $academicCalendarService)
    {
        // $this->authorizeResource(AcademicCalendar::class);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view(self::PATH . 'create', [
            'title' => self::TITLE,
        ]);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AcademicCalendar $academicCalendar): RedirectResponse
    {
        $this->academicCalendarService->delete($academicCalendar);

        return redirect()->route('admin.academic_calendars.index', '#academicCalendars')->with('success', __('translate.Successfully completed'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AcademicCalendar $academicCalendar): View
    {
        return view(self::PATH . 'edit', [
            'model' => $academicCalendar,
            'title' => self::TITLE,
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @param AcademicCalendarRequest $request
     * @return View
     */
    public function index(Request $request): View
    {
        $attributes = AcademicCalendar::attributes();
        $headerAttributes = AcademicCalendar::headerAttributes();

        $models = AcademicCalendar::with('translations')
            ->orderBy('order')
            ->paginate(10);

        return view(self::PATH . 'index', [
            'models' => $models,
            'title' => self::TITLE,
            'attributes' => $attributes,
            'headerAttributes' => $headerAttributes,
        ]);
    }
    /**
     * Display the specified resource.
     */
    public function show(AcademicCalendar $academicCalendar): View
    {
        return view(self::PATH . 'show', [
            'model' => $academicCalendar,
            'title' => self::TITLE,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param AcademicCalendarRequest $request
     * @return RedirectResponse
     */
    public function store(AcademicCalendarRequest $request): RedirectResponse
    {
        $payload = $request->validated();

        $this->academicCalendarService->create($payload);

        return redirect()->route('admin.academic_calendars.index')->with('success', __('translate.Successfully completed'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AcademicCalendarRequest $request, AcademicCalendar $academicCalendar): RedirectResponse
    {
        $payload = $request->validated();

        $this->academicCalendarService->update($academicCalendar, $payload);

        return redirect()->back()->with('success', __('translate.Successfully completed'));
    }
}
