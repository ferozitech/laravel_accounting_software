<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use MercurySeries\Flashy\Flashy;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function login()
    {
        return view('backend.login.login');
    }
    public function dashboard()
    {
        return view('backend.dashboard.dashboard');
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
        if (Auth::guard('admin')->attempt($credentials, $remember)) {
            Flashy::success("Login Successfull.");
            return redirect()->route('dashboard');
        } else {
            $message = "Invalid credentials. Please try again";
            return redirect()->back()->with(['login_error' => $message]);
        }
    }

    public function getLogOut()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin')->with(['log_out' => 'You have successfully logged out!']);
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
        //
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
