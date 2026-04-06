<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\SlugOptions;

class Dynamic extends Model
{
     const TYPE_TITLE = 1;
    const TYPE_DESCRIPTION = 2;
    const TYPE_IMAGE = 3;
    const TYPE_VIDEO = 4;
    const TYPE_IMAGES = 5;
    const TYPE_ITEMS = 6;
    const TYPE_DYNAMIC_ITEMS = 6;

    use HasFactory;
    use Translatable;
    public const IS_ACTIVE = 1;
    protected $casts = [
        'dynamic_item_ids' => 'array',
    ];
    public array $translatedAttributes = [
        'title',
        'description',
        'meta_title',
        'meta_keywords',
        'meta_description',
    ];
    protected $fillable = [
        'image',
        'order',
        'dynamic_item_ids',
        'is_active',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', self::IS_ACTIVE);
    }


    public function images()
    {
        return $this->hasMany(DynamicImage::class)->orderBy('order');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function attributes(): array
    {
        return [
            'id'                            => '#',
            'image'                        => __('translate.Image'),
            'images'                        => __('translate.Images'),
            'title'                         => __('translate.Title'),
            'content'                       => __('translate.Content'),
            'description'                   => __('translate.Description'),
            'meta_title'                    => __('translate.Meta title'),
            'meta_keywords'                 => __('translate.Meta keywords'),
            'meta_description'              => __('translate.Meta description'),
            'created_at'                    => __('translate.Published date'),
            'is_active'                        => __('translate.Active'),
            'actions'                       => __('translate.Actions'),


        ];
    }

    /**
     * Datatable header attributes
     *
     * @return array
     */
    public static function headerAttributes(): array
    {
        return [
            'id',
            'image',
            'title',
            'created_at',
            'actions',

        ];
    }
public function items()
{
    return $this->hasMany(DynamicItem::class)->orderBy('order');
}

    public function getTypeName()
    {
        $types = [
            self::TYPE_TITLE => 'Title',
            self::TYPE_DESCRIPTION => 'Description',
            self::TYPE_IMAGE => 'Image',
            self::TYPE_VIDEO => 'Video',
            self::TYPE_IMAGES => 'Multiple Images',
            self::TYPE_DYNAMIC_ITEMS => 'Dynamic Items',
        ];

        return $types[$this->type] ?? 'Unknown';
    }

     public function getVideoEmbedUrl()
    {
        if (!$this->video) {
            return null;
        }

        $url = $this->video;

        // YouTube
        if (preg_match('/youtube\.com\/watch\?v=([^\&\?\/]+)/', $url, $match)) {
            return 'https://www.youtube.com/embed/' . $match[1];
        }
        if (preg_match('/youtu\.be\/([^\&\?\/]+)/', $url, $match)) {
            return 'https://www.youtube.com/embed/' . $match[1];
        }

        // Vimeo
        if (preg_match('/vimeo\.com\/(\d+)/', $url, $match)) {
            return 'https://player.vimeo.com/video/' . $match[1];
        }

        // Direct video
        return $url;
    }

      public function scopeOrdered($query)
    {
        return $query->orderBy('layout_row')->orderBy('layout_column')->orderBy('order');
    }

        public static function getByLayout($dynamicIds)
    {
        if (!$dynamicIds || !is_array($dynamicIds)) {
            return collect();
        }

        return static::whereIn('id', $dynamicIds)
            ->active()
            ->ordered()
            ->get()
            ->groupBy('layout_row');
    }

}
