<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $ma_phongban
 * @property string $ten_phongban
 * @property int $sdt_phongban
 * @property string $updated_at
 * @property string $created_at
 */
class Phongban extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['ma_phongban', 'ten_phongban', 'sdt_phongban', 'updated_at', 'created_at'];

}
