<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table='contacts';

    protected $fillable=[
        'customer_name',
        'customer_email',
        'title',
        'content'
    ];

    
    public static $searchFields = ['customer_name','customer_email'];

    public static function list($keyword=null)
    {
        if($keyword){
            $listItem=Contact::where(function($query) use($keyword){
                foreach (self::$searchFields as $key => $field) {
                    $query->orWhere($field,'like','%'.$keyword.'%');
                }
            } );
            $listItem=$listItem->paginate(config('app.page_size'));
            return $listItem;
        }
        
        return Contact::paginate(config('app.page_size'));
    }

    public static function addItem($input){
        $result=Contact::create($input);
        return $result;
    }

    public static function obj($id){
        $result=null;
        $result=Contact::find($id);
        return $result;
    }

    public static function editItem($input,$id){
        $contact=Contact::find($id);
        $result=$contact->update($input);
        return $result;
    }

    public static function action($action,$id){

        $contact=Contact::find($id);
        switch ($action) {
            case 'delete':
                $contact->delete();
                break;
            
            default:
                break;
        }
    }

}
