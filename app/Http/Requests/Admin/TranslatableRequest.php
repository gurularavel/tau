<?php

namespace App\Http\Requests\Admin;

use Crud\Requests\AppFormRequest;
use Illuminate\Database\Eloquent\Model;

class TranslatableRequest extends AppFormRequest
{
    protected function locales(): array
    {
        return getLocales();
    }

    public function translatedAttributes(Model $model): array
    {
        $translationAttributes = [];

        $attributes = $model::attributes();

        foreach ($model->{'translatedAttributes'} as $attribute) {
            foreach ($this->locales() as $locale) {
                $translationAttributes[$attribute . ":$locale"] = $attributes[$attribute] . ":$locale";
            }
        }

        return $attributes + $translationAttributes;
    }
}
