<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $nhansu_id
 * @property int $id
 * @property string $ma_hd
 * @property string $ten_hd
 * @property string $ngay_ki
 * @property string $ngay_het_han
 * @property boolean $status
 * @property string $updated_at
 * @property string $created_at
 * @property Nhansus $nhansus
 */
class Hopdong extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['nhansu_id', 'id', 'ma_hd', 'ten_hd', 'ngay_ki', 'ngay_het_han', 'status', 'updated_at', 'created_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function nhansus()
    {
        return $this->belongsTo('App\Nhansu', 'nhansu_id');
    }
}
