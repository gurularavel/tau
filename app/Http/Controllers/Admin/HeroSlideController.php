<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HeroSlide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class HeroSlideController extends Controller
{
    public function store(Request $request)
    {
        $slide = HeroSlide::create([
            'order'     => HeroSlide::max('order') + 1,
            'is_active' => 1,
        ]);

        if ($request->hasFile('image')) {
            $slide->image = $this->uploadImage($request->file('image'));
            $slide->save();
        }

        foreach (getLocales() as $locale) {
            $slide->translateOrNew($locale)->title       = $request->input("translations.$locale.title");
            $slide->translateOrNew($locale)->description = $request->input("translations.$locale.description");
            $slide->translateOrNew($locale)->button_text = $request->input("translations.$locale.button_text");
            $slide->translateOrNew($locale)->button_url  = $request->input("translations.$locale.button_url");
        }
        $slide->save();

        return response()->json(['success' => true, 'id' => $slide->id, 'image' => $slide->image]);
    }

    public function update(Request $request, HeroSlide $heroSlide)
    {
        if ($request->hasFile('image')) {
            $this->deleteImage($heroSlide->image);
            $heroSlide->image = $this->uploadImage($request->file('image'));
        }

        $heroSlide->is_active = $request->input('is_active', 1);
        $heroSlide->save();

        foreach (getLocales() as $locale) {
            $heroSlide->translateOrNew($locale)->title       = $request->input("translations.$locale.title");
            $heroSlide->translateOrNew($locale)->description = $request->input("translations.$locale.description");
            $heroSlide->translateOrNew($locale)->button_text = $request->input("translations.$locale.button_text");
            $heroSlide->translateOrNew($locale)->button_url  = $request->input("translations.$locale.button_url");
        }
        $heroSlide->save();

        return response()->json(['success' => true]);
    }

    public function destroy(HeroSlide $heroSlide)
    {
        $this->deleteImage($heroSlide->image);
        $heroSlide->delete();

        return response()->json(['success' => true]);
    }

    public function order(Request $request)
    {
        foreach ($request->order as $item) {
            HeroSlide::where('id', $item['id'])->update(['order' => $item['order']]);
        }
        return response()->json(['success' => true]);
    }

    private function uploadImage($file): string
    {
        $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        $dest = public_path('uploads/hero_slides');
        if (!file_exists($dest)) mkdir($dest, 0755, true);
        $file->move($dest, $filename);
        return $filename;
    }

    private function deleteImage(?string $filename): void
    {
        if (!$filename) return;
        $path = public_path('uploads/hero_slides/' . $filename);
        if (File::exists($path)) File::delete($path);
    }
}
