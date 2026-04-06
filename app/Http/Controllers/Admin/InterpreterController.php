<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class InterpreterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $currentLocale = LaravelLocalization::getCurrentLocale();

        $filePath = base_path('lang/'.$currentLocale.'/translate.php');

        if (!file_exists($filePath)) {
            return redirect()->route('admin.index');
        }

        $translations = require $filePath;
        return view('admin.interpreter.edit', ['translations' => $translations]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $currentLocale = LaravelLocalization::getCurrentLocale();
        $filePath = base_path("lang/{$currentLocale}/translate.php");

        $updatedTranslations = $request->input('translations');

        $content = "<?php\n\nreturn " . var_export($updatedTranslations, true) . ";\n";

        try {
            file_put_contents($filePath, $content);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors('Failed to update translations.');
        }

        return redirect()->back()->with('success', __("translate.Translations updated successfully!"));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
