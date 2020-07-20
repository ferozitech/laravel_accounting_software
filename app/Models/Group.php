<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Database\Eloquent\SoftDeletes;

class Group extends Eloquent
{
    use SoftDeletes;
    use Sluggable;

    protected $casts = [

    ];
    protected $fillable = [
        'parentId',
        'companyId',
        'title',
        'slug',
        'type',
        'code',
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

    public function company()
    {
        return $this->belongsTo(\App\Models\Company::class,'companyId');
    }

    public function ledger()
    {
        return $this->belongsTo(\App\Models\Ledger::class,'groupId');
    }
}
