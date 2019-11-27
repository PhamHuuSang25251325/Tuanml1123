<?php

namespace App\Models;
use App\Models\category;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table='products';

    protected $fillable=[
        'pro_name',
        'pro_slug',
        'pro_avatar',
        'active',
        'category_id',
        'price',
        'quantity',
        'description',
        'content',
        'admin_id',
        'sale',
        'view_count',
    ];

    protected $status=[
        1=>[
            'name'=>'Public',
            'class'=>'badge bg-green'
        ],
        0=>[
            'name'=>'Private',
            'class'=>'badge bg-red'
        ]
    ];

    public function getRouteKeyName()
    {
        return 'pro_slug';
    }

    public function getStatus(){
        return array_get($this->status,$this->active);
    }
    
    public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }

    public static $searchFields = ['pro_name','description'];

    public static function list($keyword=null,$category_id=null,$orderBy='-created_at')
    {
        $listItem=Product::with('category:id,cat_name');
        $orderBy=parseOrderBy($orderBy);
        $listItem=$listItem->orderBy($orderBy[0],$orderBy[1]);
        if($category_id){
            $listItem=$listItem->where('category_id',$category_id);
        }
        if($keyword){
            $listItem=$listItem->where(function($query) use($keyword){
                foreach (self::$searchFields as $key => $field) {
                    $query->orWhere($field,'like','%'.$keyword.'%');
                }
            } );
        }
        
        return $listItem->paginate(config('app.page_size'));
    }

    public static function addItem($input){
        $result=Product::create($input);
        return $result;
    }

    public static function obj($id){
        $result=null;
        $result=Product::find($id);
        return $result;
    }

    public static function editItem($input,$id){
        $Product=Product::find($id);
        $result=$Product->update($input);
        return $result;
    }

    public static function action($action,$id){

        $Product=Product::find($id);
        switch ($action) {
            case 'delete':
                $Product->delete();
                break;
            case 'active':
                $Product->active=!$Product->active;
                $Product->save();
                break;
            default:
                break;
        }
    }

}
