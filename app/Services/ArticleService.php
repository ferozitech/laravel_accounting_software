<?php


namespace App\Services;


use App\Repositories\ArticleRepository;
use Illuminate\Http\Request;

class ArticleService
{

    public function __construct(ArticleRepository $article)
    {
        $this->article = $article ;
    }
    public function index()
    {
        return $this->article->all();
    }

    public function create($attributes)
    {
        return $this->article->create($attributes);
    }

    public function read($id)
    {
        return $this->article->find($id);
    }
    public function edit($slug)
    {
        return $this->article->edit($slug);
    }

    public function getDataFieldById($id=Null){
        return $this->article->getDataFieldById($id);
    }

    public function update($data, $id)
    {
        return $this->article->update($id, $data);
    }

    public function getStates(Request $request)
    {
        $attributes = $request->all();
        return $this->article->getStates($attributes);
    }

    public function delete($id)
    {
        return $this->article->delete($id);
    }
}
