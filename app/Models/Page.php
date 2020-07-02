<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Eloquent
{
    use SoftDeletes;
    use Sluggable;

    protected $casts = [
        'author_id' => 'int'
    ];
    protected $fillable = [
        'title',
        'slug',
        'banner_image_name',
        'banner_text',
        'content',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'page_css',
        'header_script',
        'footer_script',
        'is_disabled',
        'deleted_at',
        'created_at',
        'updated_at',
    ];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'slug'
            ]
        ];
    }


}
