<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class HomeController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $listCat=Category::list();
        $listProduct=[];
        foreach($listCat as $cat){
            $listProduct[]=Product::list(null,$cat->id);
        }
        $viewData=[
            'listProduct'=>$listProduct
        ];
        return view('home.index',$viewData);
    }
   
}
