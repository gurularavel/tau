<?php

use App\Models\Language;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

use App\Models\Translation;
use App\Models\Setting;
use Carbon\Carbon;

use Carbon\CarbonInterval;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;
use phpDocumentor\Reflection\Types\Boolean;

if (!function_exists('getLocales')) {
    function getLocales()
    {
        try {
            if (DB::connection()->getPdo() && DB::connection()->getDatabaseName()) {
                if (Schema::hasTable('languages')) {
                    return Language::active()->pluck('locale')->toArray();
                } else {
                    return [];
                }
            } else {
                return [];
            }
        } catch (\Exception $e) {
            return [];
        }
    }
}

function saveImageWithoutBASE64($item){
    //Modified by Hasan Musa to contribute SummerNote
    if($item){
        $dom = new \DomDocument();
            @$dom->loadHTML(mb_convert_encoding($item ?? ' ', 'HTML-ENTITIES', 'UTF-8'));
            $images = $dom->getElementsByTagName('img');

            foreach ($images as $k => $img) {
                $image_64 = $img->getAttribute('src');

                if (strpos($image_64, 'data:image/') === 0) {

                $extenion = explode('/', explode(':', substr($image_64, 0, strpos($image_64, ';')))[1])[1];

                $replace = substr($image_64, 0, strpos($image_64, ',') +1);

                $image = str_replace($replace, '', $image_64);
                $image = str_replace(' ', '+', $image);

                $image_name = Str::random(10). '.' .$extenion;

                $filePath = public_path('uploads/editor');

                if (!File::exists($filePath)) {
                    File::makeDirectory($filePath, 0755, true);
                }
                $path = $filePath . '/' . $image_name;

                file_put_contents($path, base64_decode($image));

                $img->removeAttribute('src');
                $img->setAttribute('src', '/uploads/editor/'.$image_name);
                }
            }

        // Save the modified HTML content back to $description
        $htmlContent = $dom->saveHTML();
        return $htmlContent;
    }else{
        return $item;

    }

}

function uploadImage($model, $imageName)
{
    if (request()->hasFile($imageName)) {
        $model->clearMediaCollection($imageName);
        $model->addMediaFromRequest($imageName)->toMediaCollection($imageName);
    }
}

function uploadImages($model, $imageFile, $imageName)
{
    $model->clearMediaCollection($imageFile);
    $model->addMedia($imageFile)->toMediaCollection($imageName);
}


function truncateText($text, $maxLength = 250) {
    if (mb_strlen($text, 'UTF-8') > $maxLength) {
        $text = mb_substr($text, 0, $maxLength, 'UTF-8') . '...';
    }
    return $text;
}



function getLanguages()
{
    return Language::active()->get();

}

if (!function_exists('alert')) {
    function alert(string $icon, string $title): string
    {
        return "Swal.fire({
                    icon: '$icon',
                    title: '$title',
                    showConfirmButton: false,
                    timer: 4000,
                })";
    }
}

if (!function_exists('any_error')) {
    function any_error($errors, array $fields, string $locale): bool
    {
        foreach ($fields as $field) {
            if ($errors->has($field . ":$locale")) {
                return true;
            }
        }
        return false;
    }
}

if (!function_exists('approveDecline')) {
    function approveDecline(bool $value): string
    {
        return $value
            ? label(__('translate.yes'), 'success')
            : label(__('translate.no'), 'danger');
    }
}

if (!function_exists('isCorrect')) {
    function isCorrect(bool $value): string
    {
        return $value
            ? label(__('translate.True'), 'success')
            : label(__('translate.False'), 'danger');
    }
}

if (!function_exists('create_many')) {
    function create_many(string $key, array $data): array
    {
        $result = [];

        foreach ($data as $item) {
            $result[] = [$key => $item];
        }

        return $result;
    }
}

if (!function_exists('custom_link')) {
    function custom_link(string $link, string $title = 'Keçid et', string $target = '_blank'): string
    {
        return '<a target="' . $target . '" href="' . $link . '" class="label label-lg label-inline label-light-success">' . $title . '</a>';
    }
}

if (!function_exists('date_locale')) {
    function date_locale(string $date, string $format): string
    {
        Carbon::setLocale(app()->getLocale());
        return Carbon::parse($date)->translatedFormat($format);
    }
}

if (!function_exists('dictionary')) {
    function dictionary(string $keyword): ?string
    {
        return Translation::query()->where('keyword', $keyword)->first()?->{'value:' . app()->getLocale()};
    }
}

if (!function_exists('estimated_reading_time')) {
    function estimated_reading_time(string $content, int $wordsPerMinute = 200): string
    {
        $wordCount = Str::wordCount($content);
        $minutesToRead = $wordCount / $wordsPerMinute;

        return CarbonInterval::minutes(intval($minutesToRead));
    }
}

if (!function_exists('formattedTimeAgo')) {
    function formattedTimeAgo($timestamp): string
    {
        return Carbon::parse($timestamp)->diffForHumans();
    }
}

if (!function_exists('gradient')) {
    function gradient(string $identification): string
    {
        return match ($identification) {
            'ab' => 'style="background: linear-gradient(45deg, #f18cff, #af46fc)"',
            'cd' => 'style="background: linear-gradient(45deg, #e9a17b, #ff7cb0)"',
            'ef' => 'style="background: linear-gradient(45deg, #9a9fff, #6245fe)"',
            default => '',
        };
    }
}

if (!function_exists('image')) {
    function image(string $folder, string $file = null, ?int $width = 70, ?string $alt = null, ?string $class = null, ?string $style = null): string
    {
        if ($file) {
            $path = "uploads/$folder/$file";
        }
        $widthAttribute = $width ? ' width="' . $width . '"' : '';
        $altAttribute = $alt ? ' alt="' . $alt . '"' : $folder;
        $classAttribute = $class ? ' class="' . $class . '"' : '';
        $styleAttribute = $style ? ' style="' . $style . '"' : '';

        return $file && File::exists(public_path($path)) && File::isFile(public_path($path))
            ? '<img src="' . asset($path) . '" ' . $widthAttribute . $altAttribute . $classAttribute . $styleAttribute . 'data-fancybox="gallery">'
            : '<img src="' . asset('/assets/admin/images/default.png') . '" ' . $widthAttribute . $altAttribute . $classAttribute . $styleAttribute . '>';
    }
}
if (!function_exists('video')) {
    /**
     *
     * @param string $folder
     * @param string|null $file
     * @param int|null $width
     * @param int|null $height
     * @param string|null $class
     * @param string|null $style
     * @return string
     */
    if (!function_exists('video')) {
        function video(string $folder, string $file = null, ?int $width = 320, ?int $height = 240, ?string $class = null, ?string $style = null): string
        {
            $path = $file ? "uploads/$folder/$file" : null;
            $widthAttribute = $width ? ' width="' . $width . '"' : '';
            $heightAttribute = $height ? ' height="' . $height . '"' : '';
            $classAttribute = $class ? ' class="' . $class . '"' : '';
            $styleAttribute = $style ? ' style="' . $style . '"' : '';

            if ($file && File::exists(public_path($path)) && File::isFile(public_path($path))) {
                return '<video controls autoplay muted loop ' . $widthAttribute . $heightAttribute . $classAttribute . $styleAttribute . '>
                            <source src="' . asset($path) . '" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>';
            }

            // Default fallback
            return '<img src="' . asset('/assets/admin/images/default.png') . '" ' . $widthAttribute . $classAttribute . $styleAttribute . '>';
        }
    }

}

if (!function_exists('fileView')) {
    function fileView(string $folder, string $file = null, ?int $width = 70, ?string $alt = null, ?string $class = null, ?string $style = null, ?string $fileImage = null): string
    {
        if ($file) {
            $path = "/uploads/$folder/$file";

        }
        $widthAttribute = $width ? ' width="' . $width . '"' : '';
        $altAttribute = $alt ? ' alt="' . $alt . '"' : $folder;
        $classAttribute = $class ? ' class="' . $class . '"' : '';
        $styleAttribute = $style ? ' style="' . $style . '"' : '';
        return $file && File::exists(public_path($path)) && File::isFile(public_path($path))
            ? '<a target="_blank" href="'. $path .'"> <img src="' . asset('/assets/admin/images/'.($fileImage ?? 'file.png')) . '" ' . $widthAttribute . $altAttribute . $classAttribute . $styleAttribute . '></a>'
            : '<img src="' . asset('/assets/admin/images/'. ($fileImage ?? 'file.png')) . '" ' . $widthAttribute . $altAttribute . $classAttribute . $styleAttribute . '>';
    }
}


if (!function_exists('getImage')) {
    function getImage(string $folder, $file = null): string
    {
        if ($file) {
            $path = "uploads/$folder/$file";
        }


        return $file && File::exists(public_path($path)) && File::isFile(public_path($path))
            ? "/uploads/$folder/$file"
            : "/assets/admin/images/default.png";
    }
}

if (!function_exists('getVideo')) {
    function getVideo(string $folder, $file = null): string
    {
        if ($file) {
            $path = "uploads/$folder/$file";
        }


        return $file && File::exists(public_path($path)) && File::isFile(public_path($path))
            ? "/uploads/$folder/$file"
            : "/assets/front/video/demo.mp4";
    }
}


if (!function_exists('getSoundFile')) {
    function getSoundFile(string $folder, $file = null): string
    {
        if ($file) {
            $path = "uploads/$folder/$file";
        }


        return $file && File::exists(public_path($path)) && File::isFile(public_path($path))
            ? "/uploads/$folder/$file"
            : "/assets/front/audio/moonlight-sonata.mp3";
    }
}


if (!function_exists('label')) {
    function label(string $value, string $type): string
    {
        return '<span class="label label-lg label-inline label-light-' . $type . '">' . $value . '</span>';
    }
}

if (!function_exists('lang_value')) {
    function lang_value(mixed $model, ?string $field, $locale): ?string
    {
        return $model->{$field . ':' . app()->getLocale()} ?: $model->{"$field:$locale"};
    }
}

if (!function_exists('language_switch')) {
    function language_switch(string $locale): ?string
    {
        if (empty(request()->route())) {
            return null;
        }

        $routeName = request()->route()->getName();
        $routeParameters = request()->route()->parameters();
        $routeParameters['locale'] = $locale;

        return route($routeName, $routeParameters, false);
    }
}

if (!function_exists('menu')) {
    function menu(string $name, string $type = null): bool
    {
        $routeName = Route::currentRouteName();
        $routeParts = explode('.', $routeName);

        if ($type) {
            return end($routeParts) === $type && in_array($name, $routeParts);
        }

        return in_array($name, $routeParts);
    }
}
if (!function_exists('menuItemActive')) {
    /**
     * Check if a menu item is active based on route name and ID.
     *
     * @param string $routePrefix Route prefix, e.g., 'menus'
     * @param string $type Route action, e.g., 'edit'
     * @param mixed $item Item model or ID
     * @return bool
     */
    function menuItemActive(string $routePrefix, string $type, $item): bool
    {
        $routeName = Route::currentRouteName();
        $routeParts = explode('.', $routeName);

        $matchesType = end($routeParts) === $type;

        $id = is_object($item) ? $item->id : $item;

        $routeParams = Route::current()->parameters();
        $routeParamIds = array_map(function($param){
            return is_object($param) ? $param->id : $param;
        }, $routeParams);

        $matchesId = in_array($id, $routeParamIds);

        return $matchesType && $matchesId;
    }
}


if (!function_exists('menuCollapseOpen')) {
    function menuCollapseOpen(string $routePrefix): bool
    {
        $routeName = Route::currentRouteName();
        return str_contains($routeName, $routePrefix);
    }
}



if (!function_exists('singleMenu')) {
    function singleMenu(string $routeName): bool
    {
        $currentRoute = Route::currentRouteName();

        // products.index → products
        $resource = explode('.', $routeName)[0];

        return $currentRoute === 'admin.' . $resource
            || str_starts_with($currentRoute, 'admin.' . $resource . '.');
    }
}

if (!function_exists('status')) {
    function status(int $value): string
    {
        return $value
            ? label('Aktiv', 'success')
            : label('Deaktiv', 'danger');
    }
}

if (!function_exists('setting')) {
    function setting(string $keyword): ?string
    {
        return Setting::query()->where('keyword', $keyword)->first()?->value;
    }
}

if (!function_exists('hasValueOfKeyword')) {
    function hasValueOfKeyword(string $keyword): bool
    {
        $value = Setting::query()->where('keyword', $keyword)->first()?->value;
        return !empty($value);
    }
}


if (!function_exists('social_share')) {
    function social_share(string $app, string $text): string
    {
        $encodedUrl = rawurlencode(url()->current());

        return match ($app) {
            "telegram" => "https://telegram.me/share/url?url=$encodedUrl&text=$text",
            "whatsapp" => "https://wa.me/?text=$text $encodedUrl",
            "twitter" => "https://twitter.com/share?url=$encodedUrl&text=$text",
            'facebook' => "https://www.facebook.com/sharer.php?u=$encodedUrl",
            default => $encodedUrl,
        };
    }
}

if (!function_exists('moveFactoryImageToUploads')) {
    /**
     * Move an image from the factory_images directory to the uploads directory.
     *
     * @param string $imageName The name of the image to move.
     */
    function moveFactoryImageToUploads(string $sourceFolder, $destinationFolder, $imageName)
    {
        $sourcePath = public_path('factory_images/'.$sourceFolder.'/' . $imageName);
        $destinationPath = public_path('uploads/'.$destinationFolder.'/' . $imageName);

        if (File::exists($sourcePath)) {
            File::copy($sourcePath, $destinationPath);
        }
    }
}

if (!function_exists('profileImage')) {
    function profileImage(string $folder, $file = null): string
    {
        if ($file) {
            $path = "uploads/$folder/$file";
        }


        return $file && File::exists(public_path($path)) && File::isFile(public_path($path))
            ? "/uploads/$folder/$file"
            : "/assets/admin/images/default.png";
    }
}
if (!function_exists('updateSlug')) {
    function updateSlug($payload, $model)
    {
        $locale = 'az';

        if (empty(request()->input('slug'))) {
            $slug = str($payload["title:{$locale}"])->slug();
        } else {
            $slug = request()->input('slug');
        }

        $originalSlug = $slug;
        $i = 1;

        while ($model::where('slug', $slug)->where('id', '!=', $model->id)->exists()) {
            $slug = $originalSlug . '-' . $i;
            $i++;
        }
        $payload['slug'] = $slug;

        return $payload;
    }
}

if (!function_exists('storeSlug')) {
    function storeSlug($payload, $model)
    {
        $locale = 'az';

        $slug = str($payload["title:$locale"])->slug();

        $originalSlug = $slug;
        $i = 1;

        while ($model::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $i;
            $i++;
        }

        $payload['slug'] = $slug;

        return $payload;
    }
}


if(!function_exists('seedTranslationAttributes')){
    function seedTranslationAttributes($model, $array){
        $translatableFields = (new $model)->translatedAttributes;
        $locales = getLocales();

        foreach ($array as $singleData) {
            $translations = array_intersect_key($singleData, array_flip($translatableFields));

            $singleData = array_diff_key($singleData, $translations);

            $createdModal = $model::create($singleData);

            foreach ($locales as $locale) {
                foreach ($translatableFields as $field) {
                    $createdModal->translateOrNew($locale)->{$field} = $translations[$field][$locale] ?? null;
                }
            }

            $createdModal->save();
        }
    }
}
