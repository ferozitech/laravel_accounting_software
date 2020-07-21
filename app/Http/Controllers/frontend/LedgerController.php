<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Repositories\LedgerRepository;
use App\Services\LedgerService;
use Illuminate\Http\Request;

class LedgerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $ledger;
    public function __construct(LedgerService $ledgerService)
    {
        $this->ledger = $ledgerService;
    }

    public function index()
    {
        $ledgers=$this->ledger->index();
        return view('frontend.ledger.index',compact('ledgers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $groups=$this->ledger->parentWithCompanyGroups();
        return view('frontend.ledger.add',compact('groups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->except(['_method', '_token']);
        return $this->ledger->create($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $groups=$this->ledger->parentWithCompanyGroups();
        $ledgerdetail=$this->ledger->ledgerdetail($slug);
        return view('frontend.ledger.edit',compact('groups','ledgerdetail'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $data = $request->except(['_method', '_token']);
        return $this->ledger->update($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->ledger->delete($id);
    }
}
