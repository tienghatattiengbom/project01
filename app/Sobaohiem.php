<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $nhansu_id
 * @property string $ma_sbh
 * @property string $ngay_cap
 * @property string $noi_cap
 * @property string $note
 * @property string $created_at
 * @property string $update_at
 * @property Nhansus $nhansus
 */
class Sobaohiem extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['nhansu_id', 'ma_sbh', 'ngay_cap', 'noi_cap', 'note', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    // public static $rules = [
    //     'nhansu_id' => 'required|email|unique:nhansus',
    //     'ma_sbh' => 'required|unique:nhansus',
    // ];

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
