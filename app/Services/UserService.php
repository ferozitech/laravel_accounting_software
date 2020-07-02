<?php


namespace App\Services;


use App\Repositories\ArticleRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class UserService
{

    public function __construct(UserRepository $userRepository)
    {
        $this->user = $userRepository ;
    }
    public function index()
    {
        return $this->user->all();
    }
    public function getStates($attributes)
    {
        return $this->user->getStates($attributes);
    }
    public function getCites($attributes)
    {
        return $this->user->getCites($attributes);
    }
    public function create($attributes)
    {
        return $this->user->create($attributes);
    }
    public function posts()
    {
        return $this->user->posts();
    }
    public function participated()
    {
        return $this->user->participated();
    }
    public function submitRequest($attributes)
    {
        return $this->user->submitRequest($attributes);
    }
    public function markComplete($attributes)
    {
        return $this->user->markComplete($attributes);
    }

    public function read($slug)
    {
        return $this->user->find($slug);
    }
    public function edit($slug)
    {
        return $this->user->edit($slug);
    }

    public function getDataFieldById($id=Null){
        return $this->user->getDataFieldById($id);
    }

    public function update($data, $id)
    {
        return $this->user->update($id, $data);
    }

    public function delete($id)
    {
        return $this->user->delete($id);
    }
}
