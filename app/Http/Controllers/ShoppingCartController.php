<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Cart;
use App\Models\Order;
use App\Models\OrderDetail;

class ShoppingCartController extends Controller
{
    public function __construct()
    {
        $this->middleware('check_login_user')->only('checkout');
    }
    public function addItem(Request $request,$id)
    {
        $quantity=$request->input('quantity',1);
        $product=Product::obj($id);
        $price_sale=(100-$product->sale)/100*$product->price;
        $result=Cart::add([
            'id' => $product->id,
            'name' => $product->pro_name, 
            'qty' => $quantity, 
            'price' => $product->price, 
            'weight' => 0, 
            'options' => [
                'size' => 'large',
                'avatar'=>$product->pro_avatar,
                'price_sale'=>$price_sale,
            ]
        ]);
        $html=view('components.cart')->render();
        return response()->json($html);
    }

    public function updateCart(Request $request)
    {
       foreach($request->all() as $key=>$value)
       {
          if($key!='_token' && $key!='coupon-code'){
              Cart::update($key,$value);
          }
       }
       return redirect()->back();

    }
    public function removeItem(Request $request,$id)
    {
       Cart::remove($id);
       return redirect()->back();
    }

    public function index()
    {
        return view('shopping_cart.index');
    }

    public function checkout()
    {
        if(Cart::count()===0){
            return redirect()->back()->with('message', ['Bạn chưa mua hàng']); 
        }
        $input['total']=intval(str_replace(',','',\Cart::subtotal(0,3)));
        $input['user_id']=get_data_user('web');
        $input['customer_name']=get_data_user('web','name');
        $input['customer_email']=get_data_user('web','email');
        $input['customer_phone']=get_data_user('web','phone');
        $input['customer_address']=get_data_user('web','address');
        $order=Order::addItem($input);
        if($order){
            foreach(\Cart::Content() as $cartItem){
                $detail['order_id']=$order->id;
                $detail['product_id']=$cartItem->id;
                $detail['quantity']=$cartItem->qty;
                $detail['pro_price']=$cartItem->price;
                $detail['sale']=$cartItem->options->price_sale;
                OrderDetail::addItem($detail);
            }
        }
        if($order){
            Cart::destroy();
            return redirect()->back()->with('message', ['Đã đặt hàng thành công']);   
        }
    }
}
