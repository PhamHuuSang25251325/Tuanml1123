<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Models\Admin;

class AdminSelfController extends Controller
{
   
    public function index(Request $request)
    {
        $keyword=$request->keyword;
        $listItem=Admin::list($keyword);
        $viewData=[
            'list'=>$listItem
        ];
        return view('admin::admin.list',$viewData);
    }

    public function create(){
        return view('admin::admin.add');
    }
    public function store(RequestCategory $request){
        $input=$request->all();
        $result=Admin::addItem($input);
        if($result){
            return redirect()->back();
        }else{
        }
    }

    public function edit($id){
        $admin=Admin::obj($id);
        return view('admin::admin.edit',compact('admin'));
    }

    public function update(RequestCategory $request,$id){
        $input=$request->all();
        $result=Admin::editItem($input,$id);
        return redirect()->back();
    }

    public function action($action,$id){
        Admin::action($action,$id);
        return redirect()->back();
    }
}
