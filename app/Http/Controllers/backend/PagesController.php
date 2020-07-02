<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\MenuItem;
use App\Models\Page;
use App\Services\PageService;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $page;
    public function __construct(PageService $page)
    {

        $this->page = $page;
    }
    public function index()
    {
        $pages= $this->page->index();
        return view('backend.pages.index',compact('pages'));
    }

    public function menu($menu_slug)
    {
        $recent = Page::orderBy('id','DESC')->get();
        $header_menu_state =  Menu::where('slug',$menu_slug)->first();
        $all = Page::all();
        $menu_name = 'Menu';
        if($menu_slug == 'header-menu'){
            return view('backend.menu.add',[
                'menu_name' => $menu_name,
                'recent' => $recent,
                'header_menu_state' => $header_menu_state,
                'all' => $all
            ]);
        }
    }
    public function postHeaderMenu(Request $request)
    {
        $content = $request['content'];
        $final_arr = $request['final_arr'];
        MenuItem::where('menu_type','header')->delete();
        if(isset($final_arr)) {
            foreach ($final_arr as $key => $value) {
                $parent = new MenuItem();
                $parent->page_id = $value['parent_id'];
                $parent->menu_type = 'header';
                $parent->title = $value['title'];
                $parent->position = $key;
                if($value['parent_type'] == 'cms'){
                    $parent->slug = str_slug($value['parent_url']);
                }else{
                    $parent->slug = $value['parent_url'];
                }
                $parent->page_type = $value['parent_type'];
                $parent->save();
                if(isset($value['child'])){
                    foreach ($value['child'] as $k => $v){
                        $sub_menu = new MenuItem();
                        $sub_menu->parent_id = $parent->id;
                        $sub_menu->page_id = $v['id'];
                        if($v['type'] == 'cms'){
                            $sub_menu->slug = str_slug($v['url']);
                        }else{
                            $sub_menu->slug = $v['url'];
                        }
                        $sub_menu->position = $k;
                        $sub_menu->menu_type = 'header';
                        $sub_menu->title = $v['title'];
                        $sub_menu->page_type = $v['type'];
                        $sub_menu->save();
                    }
                }
            }
        }
        $header_menu_state = Menu::where('id',1)->first();
        if(isset($content)){
            $header_menu_state->content =  $content;
            $header_menu_state->update();
        }else{
            $header_menu_state->content =  "<p id='status'>No item available. The list is empty</p>";
            $header_menu_state->update();
        }
        return 'ok';
    }
    public function addToHeaderMenu(Request $request)
    {
        $page_arr = $request['page_arr'];
        $content = '';
        foreach ($page_arr as $key => $value){
            if(isset($value)){
                $page = Page::where('id',$value)->first();
                $content .= '<li data-type="cms" data-parent_id="0" data-url="'.$page->slug.'" data-id="'.$page->id.'">
                <a href="javascript:void(0)" style="display: inline-block;" class="ui-sortable-handle" data-editable>'.$page->title.'</a>
                <i onclick="removeMenuItem(this)" class="fa fa-trash push-right" aria-hidden="true" style="float:  right;margin-right: 15px;margin-top: 15px;">
                </i>
                <input type="hidden" name="title" id="title" value="'.$page->title.'">
                </li>';
            }
        }
        return response()->json(['content' => $content,]);
    }
    public function pages($slug=FALSE){
        if(!empty($slug)) {
            $menuItemCheck = MenuItem::where('slug', $slug)->where('slug', $slug)->first();
            if ($menuItemCheck['page_type'] == 'cms'){
                $page = Page::where('id', $menuItemCheck['page_id'])->where('is_disabled', 0)->first();
            }else {
                $page = MenuItem::where('slug', $slug)->where('slug', $slug)->first();
            }
            return view('frontend.pages.cms_pages',['page' => $page]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.create');
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
        return $this->page->create($data);
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
        $page= $this->page->edit($slug);
        return view('backend.pages.edit',compact('page','slug'));
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
        return $this->page->update($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->page->delete($id);
    }
}
