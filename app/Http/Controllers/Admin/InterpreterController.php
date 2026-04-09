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
     * Add a new key to all locale translate.php files.
     */
    public function addKey(Request $request)
    {
        $request->validate([
            'new_key' => 'required|string|max:255',
        ]);

        $newKey = trim($request->input('new_key'));
        $locales = array_keys(LaravelLocalization::getSupportedLocales());

        foreach ($locales as $locale) {
            $filePath = base_path("lang/{$locale}/translate.php");
            if (!file_exists($filePath)) {
                continue;
            }

            $translations = require $filePath;

            if (!array_key_exists($newKey, $translations)) {
                $value = $request->input("values.{$locale}", '');
                $translations[$newKey] = $value;
                ksort($translations);
                $content = "<?php\n\nreturn " . var_export($translations, true) . ";\n";
                file_put_contents($filePath, $content);
            }
        }

        return redirect()->route('admin.interpreter.index')
            ->with('success', __('translate.Translations updated successfully!'));
    }

    /**
     * Remove a key from all locale translate.php files.
     */
    public function removeKey(Request $request)
    {
        $request->validate([
            'key' => 'required|string',
        ]);

        $key = $request->input('key');
        $locales = array_keys(LaravelLocalization::getSupportedLocales());

        foreach ($locales as $locale) {
            $filePath = base_path("lang/{$locale}/translate.php");
            if (!file_exists($filePath)) {
                continue;
            }

            $translations = require $filePath;
            unset($translations[$key]);
            $content = "<?php\n\nreturn " . var_export($translations, true) . ";\n";
            file_put_contents($filePath, $content);
        }

        return redirect()->route('admin.interpreter.index')
            ->with('success', __('translate.Translations updated successfully!'));
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
