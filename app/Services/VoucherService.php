<?php


namespace App\Services;


use App\Repositories\CompanyRepository;
use App\Repositories\GroupRepository;
use App\Repositories\VoucherRepository;
use Illuminate\Http\Request;

class VoucherService
{

    public function __construct(VoucherRepository $voucherRepository)
    {
        $this->voucher = $voucherRepository ;
    }
    public function index()
    {
        return $this->voucher->all();
    }

    public function ledgers()
    {
        return $this->voucher->ledgers();
    }

    public function create($attributes)
    {
        return $this->voucher->create($attributes);
    }

    public function read($id)
    {
        return $this->voucher->find($id);
    }
    public function edit($slug)
    {
        return $this->voucher->edit($slug);
    }

    public function getDataFieldById($id=Null){
        return $this->voucher->getDataFieldById($id);
    }

    public function update($data, $id)
    {
        return $this->voucher->update($id, $data);
    }

    public function getStates(Request $request)
    {
        $attributes = $request->all();
        return $this->voucher->getStates($attributes);
    }

    public function delete($id)
    {
        return $this->voucher->delete($id);
    }
}
