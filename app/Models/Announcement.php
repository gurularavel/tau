<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\SlugOptions;

class Announcement extends Model
{
    use HasFactory;
    use Translatable;
    public const IS_ACTIVE = 1;
    protected $casts = [
        'tags' => 'array',
    ];
    public array $translatedAttributes = [
        'title',
        'content',
        'description',
        'meta_title',
        'meta_keywords',
        'meta_description',
    ];
    protected $fillable = [
        'image',
        'slug',
        'tags',
        'view_counts',
        'user_id',
        'created_at',
        'status',
    ];

    public function scopeActive($query)
    {
        return $query->where('status', self::IS_ACTIVE);
    }


    public function images()
    {
        return $this->hasMany(AnnouncementImage::class)->orderBy('order');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function attributes(): array
    {
        return [
            'id'                            => '#',
            'image'                   => __('translate.Image'),
            'view_counts'                   => __('translate.View count'),
            'images'                        => __('translate.Images'),
            'title'                         => __('translate.Title'),
            'content'                       => __('translate.Content'),
            'description'                   => __('translate.Description'),
            'user_id'                       => __('translate.User'),
            'meta_title'                    => __('translate.Meta title'),
            'meta_keywords'                 => __('translate.Meta keywords'),
            'meta_description'              => __('translate.Meta description'),
            'created_at'                    => __('translate.Published date'),
            'status'                        => __('translate.Active'),
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
            'view_counts',
            'status',
            'actions',

        ];
    }

}
