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
    protected $casts = [];
    protected $fillable = [
        'f_name',
        'l_name',
        'display_name',
        'avatar',
        'avatar_original',
        'email',
        'password',
        'social_id',
        'country_id',
        'state_id',
        'address',
        'is_enabled',
        'registration_completed',
        'notification_immediately',
        'notification_total',
        'notification_request_met',
        'notification_next_year',
        'remember_token',
        'deleted_at',
        'created_at',
        'updated_at',
    ];

    public function articles()
    {
        return $this->hasMany(\App\Models\Article::class);
    }

    public function comments()
    {
        return $this->hasMany(\App\Models\Comment::class);
    }

}
