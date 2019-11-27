<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table='Orders';

    protected $fillable=[
        'user_id',
        'customer_name',
        'customer_email',
        'customer_phone',
        'customer_address',
        'active',
        'note',
        'total'
    ];

    protected $status=[
            0=>[
                'name'=>'Chưa xử lý',
                'class'=>'badge bg-red'
            ],
            1=>[
                'name'=>'Đã xử lý',
                'class'=>'badge bg-green'
            ]
    ];

    public function getStatus(){
        return array_get($this->status,$this->active);
    }
    
    public static $searchFields = ['user_id,customer_name,customer_email'];

    public static function list($keyword=null)
    {
        if($keyword){
            $listItem=Order::where(function($query) use($keyword){
                foreach (self::$searchFields as $key => $field) {
                    $query->orWhere($field,'like','%'.$keyword.'%');
                }
            } );
            $listItem=$listItem->paginate(config('app.page_size'));
            return $listItem;
        }
        
        return Order::paginate(config('app.page_size'));
    }

    public static function addItem($input){
        $result=Order::create($input);
        return $result;
    }

    public static function obj($id){
        $result=null;
        $result=Order::find($id);
        return $result;
    }

    public static function editItem($input,$id){
        $order=Order::find($id);
        $result=$Order->update($input);
        return $result;
    }

    public static function action($action,$id){

        $order=Order::find($id);
        switch ($action) {
            case 'delete':
                $order->delete();
                break;
            case 'active':
                $order->active=1;
                $order->save();
                break;
            case 'detail':
               
                break;
            default:
                break;
        }
    }
}
