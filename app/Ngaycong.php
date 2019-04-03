<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $thang
 * @property int $ngaycong
 * @property string $created_at
 * @property string $updated_at
 */
class Ngaycong extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['thang', 'ngaycong', 'created_at', 'updated_at'];

    public static function boot(){
    	parent::boot();
    	
    	self::creating(function($model){
    		$model->created_at = date("Y-m-d H:i:s");
    		$model->updated_at = date("Y-m-d H:i:s");
        });
    }

}
