<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Support\Facades\View;

class BaseController extends Controller
{
    public function __construct()
    {
        $categories =  Category::getall();
        View::share('categories', $categories);

    }
}
