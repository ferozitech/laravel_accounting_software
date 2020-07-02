<?php


namespace App\Services;


use App\Repositories\ArticleRepository;
use App\Repositories\PageRepository;
use App\Repositories\PostRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class PageService
{

    public function __construct(PageRepository $pageRepository)
    {
        $this->page = $pageRepository ;
    }

    public function index()
    {
        return $this->page->all();
    }

    public function getStates($attributes)
    {
        return $this->page->getStates($attributes);
    }
    public function iWillRecite($attributes)
    {
        return $this->page->iWillRecite($attributes);
    }
    public function getRemainingChapters($attributes)
    {
        return $this->page->getRemainingChapters($attributes);
    }

    public function getCites($attributes)
    {
        return $this->page->getCites($attributes);
    }

    public function create($attributes)
    {
        return $this->page->create($attributes);
    }

    public function posts()
    {
        return $this->page->posts();
    }

    public function submitRequest($attributes)
    {
        return $this->page->submitRequest($attributes);
    }

    public function read($slug)
    {
        return $this->page->find($slug);
    }

    public function edit($slug)
    {
        return $this->page->edit($slug);
    }

    public function getDataFieldById($id=Null){
        return $this->page->getDataFieldById($id);
    }

    public function update($data)
    {
        return $this->page->update($data);
    }

    public function delete($id)
    {
        return $this->page->delete($id);
    }
}
