<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $nhansu_id
 * @property string $date
 * @property int $luong
 * @property string $created_at
 * @property string $updated_at
 * @property Nhansus $nhansus
 */
class Luong extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['nhansu_id', 'date', 'luong', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function nhansus()
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
