<?php


namespace App\Repositories;


use App\Http\Libraries\Helpers;
use App\Models\City;
use App\Models\State;
use App\Models\User;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserRepository
{
    protected $user;
    protected $post;
    protected $recite_post;

    public function __construct(User $user)
    {
        $this->user = $user;
    }
    public function create($attributes)
    {
        if($attributes){
            $return= $this->user->create([
                'f_name'=>($attributes['f_name']) ? : '',
                'l_name'=>($attributes['l_name']) ? : '',
                'email'=>($attributes['email']) ? : '',
                'display_name'=>($attributes['display_name']) ? : '',
                'password'=>Hash::make($attributes['password']),
                'country_id'=>($attributes['country_id']) ? : '',
                'state_id'=>($attributes['state_id']) ? : '',
                'city'=>($attributes['city']) ? : '',
                'address'=>($attributes['address']) ? : '',
                'is_enabled'=>1,
                'registration_completed'=>1,
            ]);
            if ($return) {
                return redirect()->back()->with(['success' => 'Account Created Successfully..!']);
            } else {
                return redirect()->back()->with(['error' => 'Something went wrong....!']);
            }
        }else {
            return redirect()->back()->with(['error' => 'Something went wrong....!']);
        }
    }
    function random_str(
        int $length = 10,
        string $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'
    ): string {
        if ($length < 1) {
            throw new \RangeException("Length must be a positive integer");
        }
        $pieces = [];
        $max = mb_strlen($keyspace, '8bit') - 1;
        for ($i = 0; $i < $length; ++$i) {
            $pieces []= $keyspace[random_int(0, $max)];
        }
        return implode('', $pieces);
    }
    public function submitRequest($attributes)
    {
        if($attributes){


        }else {
            return redirect()->back()->with(['error' => 'Something went wrong....!']);
        }
    }
    public function update($id, $attributes)
    {

    }

    public function all()
    {

    }
    public function posts()
    {


    }
    public function participated()
    {



    }
    public function markComplete($attributes)
    {


    }

    public function find($slug)
    {
        return $this->post->whereSlug($slug)->first();
    }
    public function edit($slug)
    {
        return $this->user->whereSlug($slug)->first();
    }
    public function getStates($attributes)
    {
        return State::where("country_id",$attributes['country_id'])->select("name","id")->get()->toArray();
    }
    public function getCites($attributes)
    {
        return City::where("state_id",$attributes['state_id'])->select("name","id")->get()->toArray();
    }
    public function delete($id)
    {




    }

}
