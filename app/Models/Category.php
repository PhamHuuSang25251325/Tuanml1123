<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table='categories';

    protected $fillable=[
        'cat_name',
        'cat_slug',
        'cat_avatar',
        'total_product',
        'active',
        'cat_description'
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

    public function getStatus(){
        return array_get($this->status,$this->active);
    }
    
    public static $searchFields = ['cat_name'];

    public static function list($keyword=null)
    {
        if($keyword){
            $listItem=Category::where(function($query) use($keyword){
                foreach (self::$searchFields as $key => $field) {
                    $query->orWhere($field,'like','%'.$keyword.'%');
                }
            } );
            $listItem=$listItem->paginate(config('app.page_size'));
            return $listItem;
        }
        
        return Category::paginate(config('app.page_size'));
    }

    public static function addItem($input){
        $result=Category::create($input);
        return $result;
    }

    public static function obj($id){
        $result=null;
        $result=Category::find($id);
        return $result;
    }

    public static function editItem($input,$id){
        $category=Category::find($id);
        $result=$category->update($input);
        return $result;
    }

    public static function action($action,$id){

        $category=Category::find($id);
        switch ($action) {
            case 'delete':
                $category->delete();
                break;
            case 'active':
                $category->active=!$category->active;
                $category->save();
                break;
            default:
                break;
        }
    }

    public static function getall(){
        return Category::all();
    }

}
