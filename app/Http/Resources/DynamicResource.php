<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DynamicResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        // Transform translations
        $translationsArray = [];
        foreach ($this->translations as $translation) {
            $translationsArray[$translation->locale] = [
                'title' => $translation->title,
                'description' => $translation->description,
                'sub_title' => $translation->sub_title ?? null,
            ];
        }

        // Transform items if exists
        $itemsArray = [];
        if ($this->items) {
            foreach ($this->items as $item) {
                $itemTranslations = [];
                foreach ($item->translations as $translation) {
                    $itemTranslations[$translation->locale] = [
                        'title' => $translation->title,
                        'description' => $translation->description,
                        'name' => $translation->name,
                        'profession' => $translation->profession,
                        'email' => $translation->email,
                        'phone' => $translation->phone,
                    ];
                }

                $itemsArray[] = [
                    'id' => $item->id,
                    'image' => $item->image,
                    'order' => $item->order,
                    'type'  => $item->type,
                    'is_active' => $item->is_active,
                    'translations' => $itemTranslations,
                ];
            }
        }

        return [
            'id' => $this->id,
            'type' => $this->type,
            'image' => $this->image,
            'video' => $this->video,
            'order' => $this->order,
            'is_active' => $this->is_active,
            'translations' => $translationsArray,
            'images' => $this->images ?? [],
            'items' => $itemsArray,
        ];
    }
}
