<?php


namespace App\Services;


use App\Repositories\CompanyRepository;
use App\Repositories\TransactionRepository;
use Illuminate\Http\Request;

class TransactionService
{

    public function __construct(TransactionRepository $transaction)
    {
        $this->transaction = $transaction ;
    }
    public function index()
    {
        return $this->transaction->all();
    }

    public function create($attributes)
    {
        return $this->transaction->create($attributes);
    }

    public function read($id)
    {
        return $this->transaction->find($id);
    }
    public function edit($slug)
    {
        return $this->transaction->edit($slug);
    }

    public function getDataFieldById($id=Null){
        return $this->transaction->getDataFieldById($id);
    }

    public function update($data, $id)
    {
        return $this->transaction->update($id, $data);
    }

    public function getStates(Request $request)
    {
        $attributes = $request->all();
        return $this->transaction->getStates($attributes);
    }

    public function delete($id)
    {
        return $this->transaction->delete($id);
    }
}
