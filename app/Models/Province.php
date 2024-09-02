<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;

    protected $table = 'tbl_master_province';

    protected $guarded = ['id'];

    function city()
    {
        return $this->hasMany(City::class, 'kode_provinsi', 'kode');
    }
}
