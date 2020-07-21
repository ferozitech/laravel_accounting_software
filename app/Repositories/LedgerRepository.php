<?php


namespace App\Repositories;


use App\Http\Libraries\Helpers;
use App\Models\City;
use App\Models\Company;
use App\Models\Country;
use App\Models\Group;
use App\Models\Ledger;
use App\Models\State;
use App\Models\User;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class LedgerRepository
{
    protected $user;
    protected $post;
    protected $country;
    protected $company;
    protected $ledger;
    protected $groups;

    public function __construct(Ledger $ledger)
    {
        $this->user = new User();
        $this->country = new Country();
        $this->company = new Company();
        $this->ledger = $ledger;
        $this->groups = new Group();
    }

    public function create($attributes)
    {
        if($attributes){
            if(!empty($attributes['title'])){$slug = SlugService::createSlug($this->ledger, 'slug', $attributes['title']);}else{$slug='';}
            $userCompany=$this->user->whereId(Auth::guard('web')->user()->id)->select('companyId')->first();
            try {
                $this->ledger->create([
                    'title'=>($attributes['title']) ? : '',
                    'slug'=>$slug,
                    'groupId'=>($attributes['groupId']) ? : '',
                    'companyId'=>$userCompany->companyId,
                    'description'=>($attributes['description']) ? : '',
                    'ref_number'=>($attributes['ref_number']) ? : '',
                    'party_ref_number'=>($attributes['party_ref_number']) ? : '',
                    'opening_balance'=>($attributes['opening_balance']) ? : '',
                    'account_serial'=>($attributes['account_serial']) ? : '',
                ]);
                return redirect()->back()->with(['success' => 'Ledger Created Successfully..!']);
            } catch (\Exception $e) {
                return redirect()->back()->with(['error' => $e->getMessage()]);
            }
        }else {
            return redirect()->back()->with(['error' => 'Something went wrong....!']);
        }
    }

    public function update($attributes)
    {
        if($attributes){
            if(!empty($attributes['title'])){$slug = SlugService::createSlug($this->ledger, 'slug', $attributes['title']);}else{$slug='';}
            $userCompany=$this->user->whereId(Auth::guard('web')->user()->id)->select('companyId')->first();
            try {
                $this->ledger->whereId($attributes['ledgerId'])->update([
                    'title'=>($attributes['title']) ? : '',
                    'groupId'=>($attributes['groupId']) ? : '',
                    'companyId'=>$userCompany->companyId,
                    'description'=>($attributes['description']) ? : '',
                    'ref_number'=>($attributes['ref_number']) ? : '',
                    'party_ref_number'=>($attributes['party_ref_number']) ? : '',
                    'opening_balance'=>($attributes['opening_balance']) ? : '',
                    'account_serial'=>($attributes['account_serial']) ? : '',
                ]);
                return redirect()->back()->with(['success' => 'Ledger Updated Successfully..!']);
            } catch (\Exception $e) {
                return redirect()->back()->with(['error' => $e->getMessage()]);
            }
        }else {
            return redirect()->back()->with(['error' => 'Something went wrong....!']);
        }
    }

    public function all()
    {
        $userCompany=$this->user->whereId(Auth::guard('web')->user()->id)->select('companyId')->first();
        return $this->ledger->where('companyId',$userCompany->companyId)->with(array('group'))->get();
    }

    public function parentWithCompanyGroups()
    {
        return $this->groups->where('parentId',0)->orWhere('companyId',Auth::guard('web')->user()->id)->get();
    }

    public function ledgerdetail($slug)
    {
        return $this->ledger->whereSlug($slug)->with('group')->first();
    }

    public function categorySortings($data)
    {

    }

    public function getPosts()
    {

    }

    public function array_flatten($array) {

    }

    public function totalChapter(){

    }

    public function getPostDetail($slug)
    {

    }

    public function getCountryName($id)
    {

    }

    public function posts()
    {

    }

    public function updateuser($attributes)
    {

    }

    public function find($slug)
    {

    }

    public function edit($slug)
    {

    }

    public function delete($id)
    {
        $this->ledger->whereId($id)->delete();
        return redirect()->route('ledgers')->with(['success' => 'Deleted Successfully.']);
    }

}
