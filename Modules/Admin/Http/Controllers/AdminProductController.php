<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Http\Requests\RequestProduct;
use App\Models\Product;
use App\Models\Category;

class AdminProductController extends Controller
{
    
    public function index(Request $request)
    {
        $keyword=$request->keyword;
        $category_id=$request->input('category_id',null);
        $listItem=Product::list($keyword,$category_id);
        $categories=Category::getall();
        $viewData=[
            'list'=>$listItem,
            'categories'=>$categories
        ];
        return view('admin::product.list',$viewData);
    }

    public function create(){
        $listCat=Category::getall();
        return view('admin::product.add',compact('listCat'));
    }
    public function store(RequestProduct $request){
        $input=$request->all();
        $input['pro_slug']=str_slug($request['pro_name']);
        $input['admin_id']=0;
        if (array_key_exists("pro_avatar",$input)){
            $file=upload_image('pro_avatar');
            if(isset($file['name'])){
                $input['pro_avatar']=$file['name'];
            }
        }
        $result=Product::addItem($input);
        if($result){
            return redirect()->back();
        }else{
        }
    }

    public function edit($id){
        $product=Product::obj($id);
        $listCat=Category::getall();
        $viewData=[
            'product'=>$product,
            'listCat'=>$listCat
        ];
        return view('admin::Product.edit',$viewData);
    }

    public function update(RequestProduct $request,$id){
        $input=$request->all();
        $input['pro_slug']=str_slug($request['pro_name']);
        if (array_key_exists("pro_avatar",$input)){
            $file=upload_image('pro_avatar');
            if(isset($file['name'])){
                $input['pro_avatar']=$file['name'];
            }
        }
        $result=Product::editItem($input,$id);
        return redirect()->back();
    }

    public function action($action,$id){
        Product::action($action,$id);
        return redirect()->back();
    }
    
}
