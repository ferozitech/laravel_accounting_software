<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use MercurySeries\Flashy\Flashy;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $user;
    public function __construct(UserService $user)
    {
        $this->user = $user;
    }
    public function signup(){

        $countries = Country::all();
        return view('frontend.user.signup',compact('countries'));
    }
    public function getStates(Request $request)
    {
        $data = $request->except(['_method', '_token']);
        return $this->user->getStates($data);
    }
    public function getCites(Request $request)
    {
        $data = $request->except(['_method', '_token']);
        return $this->user->getCites($data);
    }
    public function login(){
        return view('frontend.user.login');
    }

    public function categorySortings(Request $request){

            dd($request->all());

    }
    public function index($slug=null)
    {
        if(isset($slug)){
          $post_detail=$this->user->read($slug);
          $states = $this->user->getStates(array('country_id'=>$post_detail->gathering_in_country));
        }else{
            $post_detail='';
            $states='';
        }
        $countries = Country::all();
        $posts = $this->user->posts();
        $participated = $this->user->participated();
        return view('frontend.user.dashboard',compact('countries','posts','post_detail','states','participated'));
    }

    public function markComplete(Request $request) {

        $data = $request->except(['_method', '_token']);
        return $this->user->markComplete($data);

    }
    public function SignIn(Request $request)
    {
        $remember = false;
        if (isset($request['remember_me'])) {
            $remember = true;
        }
        $messages = [
            'email.required' => 'The email is required',
            'email.email' => 'The email provided is not an valid email'
        ];
        $rules = [
            'email' => 'email|required',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $credentials = $request->only('email', 'password');
        if (Auth::guard('web')->attempt($credentials, $remember)) {
            Flashy::success("Login Successfull.");
            return redirect()->route('user-dashboard');
        } else {
            $message = "Invalid credentials. Please try again";
            return redirect()->back()->with(['error' => $message]);
        }
    }
    public function forgotpassword(){
        return view('frontend.user.forgot');
    }
    public function forgotPasswordSubmit(Request $request){
        $data = $request->except(['_method', '_token']);
        return $this->user->forgotPassword($data);
    }
    public function reset_now(Request $request){

        $data = $request->except(['_method', '_token']);
        return $this->user->reset_now($data);

    }
    public function reset_password($code=null){
        if(!empty($code)){
            $return =$this->user->check_token($code);
            if($return){
                $check_token =1;
            }else{
                $check_token =0;
            }
        }else{
            $check_token= '';
        }
        return view('frontend.user.reset_password',compact('code','check_token'));
    }
    public function getLogOut()
    {
        Auth::guard('web')->logout();
        return redirect()->route('login')->with(['success' => 'You have successfully logged out!']);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        return $this->user->create($data);
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
