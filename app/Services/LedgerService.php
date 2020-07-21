<?php


namespace App\Services;

use App\Repositories\CompanyRepository;
use App\Repositories\GroupRepository;
use App\Repositories\LedgerRepository;
use Illuminate\Http\Request;

class LedgerService
{

    public function __construct(LedgerRepository $ledgerRepository)
    {
        $this->ledger = $ledgerRepository ;
    }

    public function index()
    {
        return $this->ledger->all();
    }

    public function parentWithCompanyGroups()
    {
        return $this->ledger->parentWithCompanyGroups();
    }

    public function create($attributes)
    {
        return $this->ledger->create($attributes);
    }

    public function read($id)
    {
        return $this->ledger->find($id);
    }
    public function ledgerdetail($slug)
    {
        return $this->ledger->ledgerdetail($slug);
    }
    public function edit($slug)
    {
        return $this->ledger->edit($slug);
    }

    public function getDataFieldById($id=Null){
        return $this->ledger->getDataFieldById($id);
    }

    public function update($data)
    {
        return $this->ledger->update($data);
    }

    public function getStates(Request $request)
    {
        $attributes = $request->all();
        return $this->ledger->getStates($attributes);
    }

    public function delete($id)
    {
        return $this->ledger->delete($id);
    }
}
