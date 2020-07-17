<?php


namespace App\Repositories;


use App\Http\Libraries\Helpers;
use App\Models\City;
use App\Models\Company;
use App\Models\Country;
use App\Models\State;
use App\Models\User;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class CompanyRepository
{
    protected $user;
    protected $post;
    protected $country;
    protected $company;

    public function __construct(Company $company)
    {
        $this->user = new User();
        $this->country = new Country();
        $this->company = $company;
    }
    public function create($attributes)
    {
        if($attributes){
            if(isset($attributes['logo'])){
                $logo= (new Helpers())->uploadFile($attributes['logo'],'companyLogos');
            }
            if(!empty($attributes['title'])){$slug = SlugService::createSlug($this->company, 'slug', $attributes['title']);}else{$slug='';}
            try {
                $return= $this->company->create([
                    'Title'=>($attributes['title']) ? $attributes['title'] : '',
                    'email'=>($attributes['email']) ? $attributes['email'] : '',
                    'phone'=>($attributes['phone']) ? $attributes['phone'] : '',
                    'logo'=>($logo) ? $logo :  '',
                    'slug'=>($slug) ? $slug : '',
                    'website'=>($attributes['website']) ? $attributes['website'] : '',
                    'financial_period_from'=>($attributes['financial_period_from']) ? $attributes['financial_period_from'] : '',
                    'financial_period_to'=>($attributes['financial_period_to']) ? $attributes['financial_period_to'] : '',
                    'registration_number'=>($attributes['registration_number']) ? $attributes['registration_number'] : '',
                    'date_of_incorp'=>($attributes['date_of_incorp']) ? $attributes['date_of_incorp'] : '',
                    'ntn_number'=>($attributes['ntn_number']) ? $attributes['ntn_number'] : '',
                    'salestax_number'=>($attributes['salestax_number']) ? $attributes['salestax_number'] : '',
                    'authorised_capital'=>($attributes['authorised_capital']) ? $attributes['authorised_capital'] : '',
                    'paidup_capital'=>($attributes['paidup_capital']) ? $attributes['paidup_capital'] : '',
                    'share_price'=>($attributes['share_price']) ? $attributes['share_price'] : '',
                ]);
                $this->asign_groups_to_company($return->id);
                if($attributes['user']){
                    try {
                        Mail::send('backend.emails.create_company',['data' => $attributes['user']],function($message) use ($attributes){
                            $message->from('developer@dev2.ferozitech.com');
                            $message->to([$attributes['user']['email']]);
                            $message->replyTo('developer@dev2.ferozitech.com', 'Accounts313');
                            $message->subject('Company Registration Accounts313');
                        });
                        $this->user->create([
                            'name'=>$return->Title.' User',
                            'companyId'=>$return->id,
                            'email'=>$attributes['user']['email'],
                            'password'=>Hash::make($attributes['user']['password']),
                        ]);
                    } catch (\Exception $e) {
                        $this->company->whereId($return->id)->delete();
                        return redirect()->back()->with(['error' => 'Email already exists in our record try defferent one.']);
                    }
                }else{
                    return redirect()->back()->with(['error' => 'Please fill user information first.!']);
                }
            } catch (\Exception $e) {
                return redirect()->back()->with(['error' => 'Email already exists in our record try defferent one.']);
            }
            if ($return) {
                return redirect()->back()->with(['success' => 'Company Created Successfully..!']);
            } else {
                return redirect()->back()->with(['error' => 'Something went wrong....!']);
            }
        }else {
            return redirect()->back()->with(['error' => 'Something went wrong....!']);
        }
    }
    public function asign_groups_to_company($companyId){
        $current_date=\Carbon\Carbon::now();
        $groups=array(
            array(
                'parentId'=>1,
                'companyId'=>$companyId,
                'title'=>"Capital Accounts",
                'slug'=>"capital-accounts",
                'code'=>"11000001",
                'created_at' => $current_date,
                'updated_at' => $current_date,
            ),
            array(
                'parentId'=>1,
                'companyId'=>$companyId,
                'title'=>"Accummulated Profit/(Loss)",
                'slug'=>"accummulated-profit-loss",
                'code'=>"11000002",
                'created_at' => $current_date,
                'updated_at' => $current_date,
            ),
            array(
                'parentId'=>2,
                'companyId'=>$companyId,
                'title'=>"Trade Payables",
                'slug'=>"trade-payables",
                'code'=>"12000001",
                'created_at' => $current_date,
                'updated_at' => $current_date,
            ),
            array(
                'parentId'=>4,
                'companyId'=>$companyId,
                'title'=>"Trade Receiveables",
                'slug'=>"trade-receiveables",
                'code'=>"12100000",
                'created_at' => $current_date,
                'updated_at' => $current_date,
            ),
            array(
                'parentId'=>2,
                'companyId'=>$companyId,
                'title'=>"Accured and other liabilities",
                'slug'=>"accured-and-other-liabilities",
                'code'=>"12000002",
                'created_at' => $current_date,
                'updated_at' => $current_date,
            ),
            array(
                'parentId'=>3,
                'companyId'=>$companyId,
                'title'=>"Fixed Assets",
                'slug'=>"fixed-assets",
                'code'=>"13100001",
                'created_at' => $current_date,
                'updated_at' => $current_date,
            ),
            array(
                'parentId'=>4,
                'companyId'=>$companyId,
                'title'=>"Loan and Advances",
                'slug'=>"loan-and-advances",
                'code'=>"12100001",
                'created_at' => $current_date,
                'updated_at' => $current_date,
            ),
            array(
                'parentId'=>5,
                'companyId'=>$companyId,
                'title'=>"Loan from Others",
                'slug'=>"loan-from-others",
                'code'=>"14310001",
                'created_at' => $current_date,
                'updated_at' => $current_date,
            ),
            array(
                'parentId'=>4,
                'companyId'=>$companyId,
                'title'=>"Deposits and Pre-Payments",
                'slug'=>"deposits-and-pre-payments",
                'code'=>"12100002",
                'created_at' => $current_date,
                'updated_at' => $current_date,
            ),
            array(
                'parentId'=>4,
                'companyId'=>$companyId,
                'title'=>"Cash and Bank Contra",
                'slug'=>"cash-and-bank-contra",
                'code'=>"12100003",
                'created_at' => $current_date,
                'updated_at' => $current_date,
            ),
            array(
                'parentId'=>6,
                'companyId'=>$companyId,
                'title'=>"Income Accounts",
                'slug'=>"income-accounts",
                'code'=>"15000000",
                'created_at' => $current_date,
                'updated_at' => $current_date,
            ),
            array(
                'parentId'=>6,
                'companyId'=>$companyId,
                'title'=>"Other Income",
                'slug'=>"oter-income",
                'code'=>"15000001",
                'created_at' => $current_date,
                'updated_at' => $current_date,
            ),
            array(
                'parentId'=>7,
                'companyId'=>$companyId,
                'title'=>"Cost Accounts",
                'slug'=>"cost-accounts",
                'code'=>"16000000",
                'created_at' => $current_date,
                'updated_at' => $current_date,
            ),
            array(
                'parentId'=>8,
                'companyId'=>$companyId,
                'title'=>"Operating Expenses",
                'slug'=>"operating-expenses",
                'code'=>"17000000",
                'created_at' => $current_date,
                'updated_at' => $current_date,
            ),
            array(
                'parentId'=>8,
                'companyId'=>$companyId,
                'title'=>"Financial Charges",
                'slug'=>"financial-charges",
                'code'=>"17000001",
                'created_at' => $current_date,
                'updated_at' => $current_date,
            ),
            array(
                'parentId'=>4,
                'companyId'=>$companyId,
                'title'=>"Advance Tax",
                'slug'=>"advance-tax",
                'code'=>"12100004",
                'created_at' => $current_date,
                'updated_at' => $current_date,
            ),
            array(
                'parentId'=>2,
                'companyId'=>$companyId,
                'title'=>"Provision for Taxation",
                'slug'=>"provision-for-taxation",
                'code'=>"12000003",
                'created_at' => $current_date,
                'updated_at' => $current_date,
            )
        );
        DB::table('groups')->insert($groups);
    }

    public function update($attributes)
    {

    }
    public function all()
    {
        return $this->company->with(array('users'))->get();
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

    }
}
