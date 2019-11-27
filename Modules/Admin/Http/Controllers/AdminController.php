<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Models\User;
use App\Models\Order;
use App\Models\Contact;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $totalUser=User::get()->count();
        $totalNewOrder=Order::get()->where('active',0)->count();
        $totalOldOrder=Order::get()->where('active',1)->count();
        $totalContact=Contact::get()->count();
        $listOrder=Order::where('active',0)->paginate(10);
        $listContact=Contact::paginate(10);
        $viewData=[
            'listOrder'=>$listOrder,
            'listContact'=>$listContact,
            'totalUser'=>$totalUser,
            'totalNewOrder'=>$totalNewOrder,
            'totalOldOrder'=>$totalOldOrder,
            'totalContact'=>$totalContact
        ];
        return view('admin::index',$viewData);
    }

}
