<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Models\User;

class AdminUserController extends Controller
{
   
    public function index(Request $request)
    {
        $keyword=$request->keyword;
        $listItem=User::list($keyword);
        $viewData=[
            'list'=>$listItem
        ];
        return view('admin::user.list',$viewData);
    }

    public function create(){
        return view('admin::user.create');
    }
    public function store(RequestCategory $request){
        $input=$request->all();
        if (array_key_exists("avatar",$input)){
            $file=upload_image('avatar','user');
            if(isset($file['name'])){
                $input['avatar']=$file['name'];
            }
        }
        $result=User::addItem($input);
        if($result){
            return redirect()->back();
        }else{
        }
    }

    public function edit($id){
        $user=User::obj($id);
        return view('admin::user.update',compact('user'));
    }

    public function update(RequestCategory $request,$id){
        $input=$request->all();
        if (array_key_exists("avatar",$input)){
            $file=upload_image('avatar','user');
            if(isset($file['name'])){
                $input['avatar']=$file['name'];
            }
        }
        $result=User::editItem($input,$id);
        return redirect()->back();
    }

    public function action($action,$id){
        User::action($action,$id);
        return redirect()->back();
    }
}
