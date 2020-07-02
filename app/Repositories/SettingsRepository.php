<?php


namespace App\Repositories;


use App\Http\Libraries\Helpers;
use App\Models\City;
use App\Models\Country;
use App\Models\State;
use App\Models\User;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class SettingsRepository
{
    protected $user;
    protected $post;
    protected $country;
    protected $recite_posts;

    public function __construct()
    {
        $this->user = new User();
        $this->country = new Country();
    }
    public function create($attributes)
    {

    }
    public function update($attributes)
    {

    }
    public function all()
    {

    }
    public function categorySortings($data)
    {

    }
    public function getPosts()
    {

    }
    public function array_flatten($array) {

    }
    public function totalChapter(){

    }
    public function getPostDetail($slug)
    {

    }
    public function getCountryName($id)
    {
    }
    public function posts()
    {
    }
    public function updateuser($attributes)
    {

    }
    public function find($slug)
    {
    }
    public function edit($slug)
    {
    }
    public function delete($id)
    {

    }
}
