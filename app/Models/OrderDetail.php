<?php

namespace App\Models;
use App\Models\Product;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $table='order_details';

    protected $fillable=[
        'order_id',
        'product_id',
        'pro_price',
        'quantity',
        'sale',
    ];

   
    public function product(){
        return $this->belongsTo(Product::class,'product_id');
    }
    
    public static $searchFields = ['transaction_id,product_id'];

    public static function list($keyword=null)
    {
        if($keyword){
            $listItem=OrderDetail::where(function($query) use($keyword){
                foreach (self::$searchFields as $key => $field) {
                    $query->orWhere($field,'like','%'.$keyword.'%');
                }
            } );
            $listItem=$listItem->paginate(config('app.page_size'));
            return $listItem;
        }
        
        return OrderDetail::paginate(config('app.page_size'));
    }

    public static function addItem($input){
        $result=OrderDetail::create($input);
        return $result;
    }

    public static function obj($id){
        $result=null;
        $result=OrderDetail::find($id);
        return $result;
    }

    public static function editItem($input,$id){
        $orderDetail=OrderDetail::find($id);
        $result=$orderDetail->update($input);
        return $result;
    }

    public static function action($action,$id){

        $orderDetail=OrderDetail::find($id);
        switch ($action) {
            case 'delete':
                $orderDetail->delete();
                break;
            case 'active':
               
                break;
            default:
                break;
        }
    }
}
