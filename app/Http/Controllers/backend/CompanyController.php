<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Services\CompanyService;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $company;
    public function __construct(CompanyService $company)
    {
        $this->company = $company;
    }
    public function index()
    {
        $companies= $this->company->index();
        return view('backend.companies.index',compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.companies.create');
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
        return $this->company->create($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $company= $this->company->edit($slug);
        return view('backend.companies.edit',compact('company','slug'));
    }

    public function deleteUser(Request $request){
        $data = $request->except(['_method', '_token']);
        $user= $this->company->deleteUser($data);
        if($user){
            return response()->json(["reponse"=>'success']);
        }else{
            return response()->json(["reponse"=>'failure']);
        }
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
        return $this->company->update($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      return $this->company->deleteCompany($id);
    }
}
