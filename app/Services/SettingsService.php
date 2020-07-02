<?php


namespace App\Services;


use App\Repositories\ArticleRepository;
use App\Repositories\PostRepository;
use App\Repositories\SettingsRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class SettingsService
{

    public function __construct(SettingsRepository $settingsRepository)
    {
        $this->settings = $settingsRepository ;
    }

    public function index()
    {
        return $this->settings->all();
    }

    public function getPosts()
    {
        return $this->settings->getPosts();
    }
    public function categorySortings($data)
    {
        return $this->settings->categorySortings($data);
    }
    public function getPostDetail($slug)
    {
        return $this->settings->getPostDetail($slug);
    }
    public function getCountryName($id)
    {
        return $this->settings->getCountryName($id);
    }
    public function getStates($attributes)
    {
        return $this->settings->getStates($attributes);
    }
    public function updateuser($attributes)
    {
        return $this->settings->updateuser($attributes);
    }

    public function getCites($attributes)
    {
        return $this->settings->getCites($attributes);
    }

    public function create($attributes)
    {
        return $this->settings->create($attributes);
    }

    public function posts()
    {
        return $this->settings->posts();
    }

    public function submitRequest($attributes)
    {
        return $this->settings->submitRequest($attributes);
    }

    public function read($slug)
    {

        return $this->settings->find($slug);

    }

    public function edit($slug)
    {

        return $this->settings->edit($slug);

    }

    public function getDataFieldById($id=Null){

        return $this->settings->getDataFieldById($id);

    }

    public function update($data)
    {

        return $this->settings->update($data);

    }

    public function delete($id)
    {
        return $this->settings->delete($id);
    }
}
