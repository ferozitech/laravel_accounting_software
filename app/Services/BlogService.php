<?php


namespace App\Services;


use App\Repositories\ArticleRepository;
use App\Repositories\BlogRepository;
use App\Repositories\PostRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class BlogService
{

    public function __construct(BlogRepository $blogRepository)
    {
        $this->blog = $blogRepository ;
    }

    public function index()
    {
        return $this->blog->all();
    }
    public function detail($slug)
    {
        return $this->blog->detail($slug);
    }
    public function sortingListingPosts($attributes)
    {
        return $this->blog->sortingListingPosts($attributes);
    }
    public function comment($attributes)
    {
        return $this->blog->comment($attributes);
    }
    public function SearchFilters($attributes)
    {
        return $this->blog->SearchFilters($attributes);
    }

    public function getStates($attributes)
    {
        return $this->blog->getStates($attributes);
    }
    public function iWillRecite($attributes)
    {
        return $this->blog->iWillRecite($attributes);
    }
    public function getRemainingChapters($attributes)
    {
        return $this->blog->getRemainingChapters($attributes);
    }

    public function getCites($attributes)
    {
        return $this->blog->getCites($attributes);
    }

    public function create($attributes)
    {
        return $this->blog->create($attributes);
    }

    public function posts()
    {
        return $this->blog->posts();
    }

    public function submitRequest($attributes)
    {
        return $this->blog->submitRequest($attributes);
    }

    public function read($slug)
    {

        return $this->blog->find($slug);

    }

    public function edit($slug)
    {

        return $this->blog->edit($slug);

    }

    public function getDataFieldById($id=Null){

        return $this->blog->getDataFieldById($id);

    }

    public function update($data)
    {

        return $this->blog->update($data);

    }

    public function delete($id)
    {
        return $this->blog->delete($id);
    }
}
