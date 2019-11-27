<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $table='admins';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','phone','address','username','active'
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

    public static $searchFields = ['name'];

    public static function list($keyword=null)
    {
        if($keyword){
            $listItem=Admin::where(function($query) use($keyword){
                foreach (self::$searchFields as $key => $field) {
                    $query->orWhere($field,'like','%'.$keyword.'%');
                }
            } );
            $listItem=$listItem->paginate(config('app.page_size'));
            return $listItem;
        }
        
        return Admin::paginate(config('app.page_size'));
    }

    public static function addItem($input){
        $result=Admin::create($input);
        return $result;
    }

    public static function obj($id){
        $result=null;
        $result=Admin::find($id);
        return $result;
    }

    public static function editItem($input,$id){
        $admin=Admin::find($id);
        $result=$admin->update($input);
        return $result;
    }

    public static function action($action,$id){

        $admin=Admin::find($id);
        switch ($action) {
            case 'delete':
                $admin->delete();
                break;
            case 'active':
                $admin->active=!$admin->active;
                $admin->save();
                break;
            default:
                break;
        }
    }
}
