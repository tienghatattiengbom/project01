<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $addrees
 * @property string $phone
 * @property string $email
 * @property string $birthday
 * @property string $sex
 * @property string $created_at
 * @property string $updated_at
 */
class Nhansu extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['name', 'addrees', 'phone', 'email', 'birthday', 'sex','salary_basic','start_date' ,'created_at', 'updated_at'];
    public static $rules = [
        'email' => 'sometimes|required|email|unique:nhansus',
        'phone' => 'sometimes|required|unique:nhansus',
    ];

    public static function boot(){
    	parent::boot();
    	
    	self::creating(function($model){
    		$model->created_at = date("Y-m-d H:i:s");
    		$model->updated_at = date("Y-m-d H:i:s");
        });
    }
}
