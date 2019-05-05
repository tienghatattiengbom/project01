<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $nhansu_id
 * @property string $start_time
 * @property string $end_time
 * @property string $note
 * @property Nhansus $nhansus
 */
class Chamcong extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['nhansu_id','date','start_time', 'end_time', 'note',];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function nhansus()
    {
        return $this->belongsTo('App\Nhansu', 'nhansu_id');
    }
}
