<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','phone','address'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static $searchFields = ['name'];

    public static function list($keyword=null)
    {
        if($keyword){
            $listItem=User::where(function($query) use($keyword){
                foreach (self::$searchFields as $key => $field) {
                    $query->orWhere($field,'like','%'.$keyword.'%');
                }
            } );
            $listItem=$listItem->paginate(config('app.page_size'));
            return $listItem;
        }
        
        return User::paginate(config('app.page_size'));
    }

    public static function addItem($input){
        $result=User::create($input);
        return $result;
    }

    public static function obj($id){
        $result=null;
        $result=User::find($id);
        return $result;
    }

    public static function editItem($input,$id){
        $User=User::find($id);
        $result=$User->update($input);
        return $result;
    }

    public static function action($action,$id){

        $User=User::find($id);
        switch ($action) {
            case 'delete':
                $User->delete();
                break;
            case 'active':
                $User->active=!$User->active;
                $User->save();
                break;
            default:
                break;
        }
    }
}
