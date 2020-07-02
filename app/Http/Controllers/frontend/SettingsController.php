<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;

use App\Models\Country;
use App\Services\SettingsService;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $settings;
    public function __construct(SettingsService $settingsService)
    {
        $this->settings = $settingsService;
    }
    public function index()
    {
        //
    }

    public function updateuser(Request $request){
        $data = $request->except(['_method', '_token']);
        return $this->settings->updateuser($data);
    }
    public function updatepassword(Request $request){
        $data = $request->except(['_method', '_token']);
        dd($data);
        return $this->settings->updateuser($data);
    }

    public function homepage(){
        $posts = $this->settings->getPosts();
        return view('frontend.home.homepage',compact('posts'));
    }

    public function postDetail($slug){
        $post = $this->settings->getPostDetail($slug);
        return view('frontend.posts.detail',compact('post'));
    }

    public function contactUs(){
        return view('frontend.pages.contact-us');
    }
    public function SubmitcontactUs(Request $request){
        return redirect()->to($_SERVER['HTTP_REFERER']."#comment")->with(['error' => 'Something went wrong....!']);
    }
    public static function getCountryName($id){
        return Country::where('id',$id)->select('name')->first()['name'];
    }
    public function categorySortings(Request $request)
    {
        $data = $request->except(['_method', '_token']);
        $posts = $this->settings->categorySortings($data);
        return view('frontend.posts.ajaxPosts',compact('posts'));
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
