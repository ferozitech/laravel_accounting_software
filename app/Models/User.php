<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use SoftDeletes;
    protected $casts = [
        'companyId' => 'int'
    ];
    protected $fillable = [
        'companyId',
        'username',
        'name',
        'email',
        'father_name',
        'dob',
        'CNIC',
        'marital_status',
        'type',
        'Address',
        'password',
        'city',
        'state',
        'country',
        'qualification',
        'designation',
        'joining_date',
        'starting_salary',
        'current_salary',
        'remember_token',
        'deleted_at',
        'created_at',
        'updated_at',
    ];

    public function company()
    {
        return $this->belongsTo(\App\Models\Company::class);
    }

}
