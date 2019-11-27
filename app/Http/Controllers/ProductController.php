<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(Request $request){
        $category_id=$request->input('category_id',null);
        $keyword=$request->input('keyword',null);
        $orderBy=$request->input('orderBy',null);
        $products=Product::list($keyword,$category_id,$orderBy);
        $viewData=[
            'products'=>$products
        ];
        return view('product.index',$viewData);
    }

    public function action(Request $request){
        $category_id=$request->input('category_id',null);
        $keyword=$request->input('keyword',null);
        $orderBy=$request->input('orderBy',null);
        $products=Product::list($keyword,$category_id,$orderBy);
        $html=view('components.products',compact('products'))->render();
        return response()->json($html);
    }

    public function detail(Product $product){
        $category_id=$product->category_id;
        $relatedProducts=Product::list(null,$category_id)->take(8);
        $viewData=[
            'product'=>$product,
            'relatedProducts'=>$relatedProducts
        ];
        return view('product.detail',$viewData);
    }
}
