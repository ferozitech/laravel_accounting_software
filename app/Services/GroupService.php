<?php


namespace App\Services;


use App\Repositories\CompanyRepository;
use App\Repositories\GroupRepository;
use Illuminate\Http\Request;

class GroupService
{

    public function __construct(GroupRepository $groupRepository)
    {
        $this->group = $groupRepository ;
    }
    public function index()
    {
        return $this->group->all();
    }

    public function create($attributes)
    {
        return $this->group->create($attributes);
    }

    public function read($id)
    {
        return $this->group->find($id);
    }
    public function edit($slug)
    {
        return $this->group->edit($slug);
    }

    public function getDataFieldById($id=Null){
        return $this->group->getDataFieldById($id);
    }

    public function update($data, $id)
    {
        return $this->group->update($id, $data);
    }

    public function getStates(Request $request)
    {
        $attributes = $request->all();
        return $this->group->getStates($attributes);
    }

    public function delete($id)
    {
        return $this->group->delete($id);
    }
}
