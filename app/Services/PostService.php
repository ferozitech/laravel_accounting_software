<?php


namespace App\Services;


use App\Repositories\ArticleRepository;
use App\Repositories\PostRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class PostService
{

    public function __construct(PostRepository $postRepository)
    {
        $this->post = $postRepository ;
    }

    public function index()
    {
        return $this->post->all();
    }
    public function sortingListingPosts($attributes)
    {
        return $this->post->sortingListingPosts($attributes);
    }
    public function SearchFilters($attributes)
    {
        return $this->post->SearchFilters($attributes);
    }

    public function getStates($attributes)
    {
        return $this->post->getStates($attributes);
    }
    public function iWillRecite($attributes)
    {
        return $this->post->iWillRecite($attributes);
    }
    public function getRemainingChapters($attributes)
    {
        return $this->post->getRemainingChapters($attributes);
    }

    public function getCites($attributes)
    {
        return $this->post->getCites($attributes);
    }

    public function create($attributes)
    {
        return $this->post->create($attributes);
    }

    public function posts()
    {
        return $this->post->posts();
    }

    public function submitRequest($attributes)
    {
        return $this->post->submitRequest($attributes);
    }

    public function read($slug)
    {

        return $this->post->find($slug);

    }

    public function edit($slug)
    {

        return $this->post->edit($slug);

    }

    public function getDataFieldById($id=Null){

        return $this->post->getDataFieldById($id);

    }

    public function update($data)
    {

        return $this->post->update($data);

    }

    public function delete($id)
    {
        return $this->post->delete($id);
    }
}
