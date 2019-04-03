<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $nhansu_id
 * @property int $tien_thuong
 * @property string $note
 * @property int $created_at
 * @property int $updated_at
 * @property Nhansus $nhansus
 */
class Thuong extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['nhansu_id', 'tien_thuong', 'date','note', 'status' ,'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function nhansu()
    {
        return $this->belongsTo('App\Nhansu', 'nhansu_id');
    }

    
    public static function boot(){
        parent::boot();
        
        self::creating(function($model){
            $model->created_at = date("Y-m-d H:i:s");
            $model->updated_at = date("Y-m-d H:i:s");
        });
    }
}
