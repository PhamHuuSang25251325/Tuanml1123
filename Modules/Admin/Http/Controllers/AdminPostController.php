<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Http\Requests\RequestPost;
use App\Models\Post;

class AdminPostController extends Controller
{
    
    public function index(Request $request)
    {
        $keyword=$request->keyword;
        $listItem=Post::list($keyword);
        $viewData=[
            'list'=>$listItem,
        ];
        return view('admin::post.list',$viewData);
    }

    public function create(){
        return view('admin::post.add');
    }
    public function store(RequestPost $request){
        $input=$request->all();
        $input['post_slug']=str_slug($request['post_title']);
        if (array_key_exists("post_avatar",$input)){
            $file=upload_image('post_avatar');
            if(isset($file['name'])){
                $input['post_avatar']=$file['name'];
            }
        }
        $result=Post::addItem($input);
        if($result){
            return redirect()->back();
        }else{
        }
    }

    public function edit($id){
        $post=Post::obj($id);
        $viewData=[
            'post'=>$post,
        ];
        return view('admin::post.edit',$viewData);
    }

    public function update(RequestPost $request,$id){
        $input=$request->all();
        $input['post_slug']=str_slug($request['post_title']);
        if (array_key_exists("post_avatar",$input)){
            $file=upload_image('post_avatar');
            if(isset($file['name'])){
                $input['post_avatar']=$file['name'];
            }
        }
        $result=Post::editItem($input,$id);
        return redirect()->back();
    }

    public function action($action,$id){
        Post::action($action,$id);
        return redirect()->back();
    }
    
}
