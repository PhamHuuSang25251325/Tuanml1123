<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Models\Order;
use App\Models\OrderDetail;

class AdminOrderController extends Controller
{
   
    public function index(Request $request)
    {
        $keyword=$request->input('keyword',null);
        $orders=Order::list($keyword);

        $viewData=[
            'list'=>$orders
        ];
        return view('admin::order.list',$viewData);
    }
    
    public function action($action,$id){
        Order::action($action,$id);
        return redirect()->back();
    }

    public function detail(Request $request,$id){
        $orders=OrderDetail::with('product:id,pro_name,pro_avatar')->where('order_id',$id)->get();
        $html=view('admin::components.order',compact('orders'))->render();
        return response()->json($html);

    } 

    
}
