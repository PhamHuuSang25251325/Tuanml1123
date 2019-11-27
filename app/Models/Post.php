<?php

namespace App\Models;
use App\Models\category;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table='posts';

    protected $fillable=[
        'post_title',
        'post_slug',
        'post_avatar',
        'active',
        'description',
        'content',
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
        return 'post_slug';
    }

    public function getStatus(){
        return array_get($this->status,$this->active);
    }
    

    public static $searchFields = ['post_title','description'];

    public static function list($keyword=null,$orderBy='-created_at')
    {
        $orderBy=parseOrderBy($orderBy);
        $listItem=Post::orderBy($orderBy[0],$orderBy[1]);
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
        $result=Post::create($input);
        return $result;
    }

    public static function obj($id){
        $result=null;
        $result=Post::find($id);
        return $result;
    }

    public static function editItem($input,$id){
        $Post=Post::find($id);
        $result=$Post->update($input);
        return $result;
    }

    public static function action($action,$id){

        $Post=Post::find($id);
        switch ($action) {
            case 'delete':
                $Post->delete();
                break;
            case 'active':
                $Post->active=!$Post->active;
                $Post->save();
                break;
            default:
                break;
        }
    }

}
