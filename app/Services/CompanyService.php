<?php


namespace App\Services;


use App\Repositories\CompanyRepository;
use Illuminate\Http\Request;

class CompanyService
{

    public function __construct(CompanyRepository $company)
    {
        $this->company = $company ;
    }
    public function index()
    {
        return $this->company->all();
    }

    public function create($attributes)
    {
        return $this->company->create($attributes);
    }

    public function read($id)
    {
        return $this->company->find($id);
    }

    public function edit($slug)
    {
        return $this->company->edit($slug);
    }

    public function getDataFieldById($id=Null){

        return $this->company->getDataFieldById($id);

    }

    public function update($data)
    {
        return $this->company->update($data);
    }
    public function deleteCompany($id)
    {
        return $this->company->deleteCompany($id);
    }
    public function deleteUser($data)
    {
        return $this->company->deleteUser($data);
    }

    public function getStates(Request $request)
    {
        $attributes = $request->all();
        return $this->company->getStates($attributes);
    }

    public function delete($id)
    {
        return $this->company->delete($id);
    }
}
