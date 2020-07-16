<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Eloquent
{
    use SoftDeletes;
    use Sluggable;

    protected $casts = [

    ];
    protected $fillable = [
        'Title',
        'slug',
        'logo',
        'email',
        'phone',
        'website',
        'financial_period_from',
        'financial_period_to',
        'registration_number',
        'date_of_incorp',
        'ntn_number',
        'salestax_number',
        'authorised_capital',
        'paidup_capital',
        'share_price',
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

    public function users()
    {
        return $this->hasMany(\App\Models\User::class,'companyId');
    }

}
