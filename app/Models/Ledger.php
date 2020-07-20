<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ledger extends Eloquent
{
    use SoftDeletes;
    use Sluggable;

    protected $casts = [

    ];
    protected $fillable = [
        'title',
        'slug',
        'groupId',
        'companyId',
        'description',
        'ref_number',
        'party_ref_number',
        'opening_balance',
        'account_serial',
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

    public function group()
    {
        return $this->belongsTo(\App\Models\Group::class,'groupId');
    }
}
