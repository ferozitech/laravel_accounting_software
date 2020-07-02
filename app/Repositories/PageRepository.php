<?php


namespace App\Repositories;


use App\Http\Libraries\Helpers;
use App\Models\City;
use App\Models\Page;
use App\Models\State;
use App\Models\User;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class PageRepository
{
    protected $user;
    protected $post;
    protected $recitePost;
    protected $pages;

    public function __construct(Page $pages)
    {
        $this->user = new User();
        $this->pages = $pages;
    }
    public function create($attributes)
    {
        if($attributes){
            if(isset($attributes['banner_image_name'])){
                $logo= (new Helpers())->uploadFile($attributes['banner_image_name'],'pages');
            }
            if(!empty($attributes['title'])){$slug = SlugService::createSlug($this->pages, 'slug', $attributes['title']);}else{$slug='';}
            $return= $this->pages->create([
                'slug'=>$slug,
                'title'=>($attributes['title']) ? : '',
                'meta_title'=>($attributes['meta_title']) ? : '',
                'banner_text'=>($attributes['banner_text']) ? : '',
                'meta_description'=>($attributes['meta_description']) ? : '',
                'meta_keywords'=>($attributes['meta_keywords']) ? : '',
                'content'=>($attributes['content']) ? : '',
                'is_disabled'=>(isset($attributes['is_disabled']) ? (int)$attributes['is_disabled'] : 0),
                'banner_image_name'=>($logo) ? : '',
            ]);
            if ($return) {
                return redirect()->route('pages')->with(['success' => 'Page Created Successfully..!']);
            } else {
                return redirect()->back()->with(['error' => 'Something went wrong....!']);
            }
        }else {
            return redirect()->back()->with(['error' => 'Something went wrong....!']);
        }
    }
    public function array_flatten($array) {
        if (!is_array($array)) {
            return FALSE;
        }
        $result = array();
        foreach ($array as $key => $value) {
            if (is_array($value)) {
                $result = array_merge($result, $this->array_flatten($value));
            }
            else {
                $result[$key] = $value;
            }
        }
        return $result;
    }

    public function update($attributes)
    {
        if($attributes){

        }else {
            return redirect()->back()->with(['error' => 'Something went wrong....!']);
        }
    }

    public function all()
    {
        return $this->pages->get();
    }

    public function posts()
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
