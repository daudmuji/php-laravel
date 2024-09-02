<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $table = 'tbl_master_city';

    protected $guarded = ['id'];

    public function province()
    {
        return $this->belongsTo(Province::class, 'kode_provinsi', 'kode');
    }

    function subDistrict()
    {
        return $this->hasMany(SubDistrict::class, 'kode_kabupaten_kota', 'kode');
    }
}
