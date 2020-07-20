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

    public function companyGroups()
    {
        return $this->group->companyGroups();
    }
    public function parentGroups()
    {
        return $this->group->parentGroups();
    }

    public function create($attributes)
    {
        return $this->group->create($attributes);
    }

    public function find($id)
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

    public function update($data)
    {
        return $this->group->update($data);
    }

    public function createGroup($data)
    {
        return $this->group->createGroup($data);
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
