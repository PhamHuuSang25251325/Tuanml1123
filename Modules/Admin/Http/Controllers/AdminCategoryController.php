<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Http\Requests\RequestCategory;
use App\Models\Category;

class AdminCategoryController extends Controller
{
    
    public function index(Request $request)
    {
        $keyword=$request->keyword;
        $listItem=Category::list($keyword);
        $viewData=[
            'list'=>$listItem
        ];
        return view('admin::category.list',$viewData);
    }

    public function create(){
        return view('admin::category.add');
    }
    public function store(RequestCategory $request){
        $input=$request->all();
        $input['cat_slug']=str_slug($request['cat_name']);
        if (array_key_exists("cat_avatar",$input)){
            $file=upload_image('cat_avatar','category');
            if(isset($file['name'])){
                $input['cat_avatar']=$file['name'];
            }
        }
        $result=Category::addItem($input);
        if($result){
            return redirect()->back();
        }else{
        }
    }

    public function edit($id){
        $category=Category::obj($id);
        return view('admin::category.edit',compact('category'));
    }

    public function update(RequestCategory $request,$id){
        $input=$request->all();
        if (array_key_exists("avatar",$input)){
            $file=upload_image('avatar','category');
            if(isset($file['name'])){
                $input['avatar']=$file['name'];
            }
        }
        $result=Category::editItem($input,$id);
        return redirect()->back();
    }

    public function action($action,$id){
        Category::action($action,$id);
        return redirect()->back();
    }
    
}
