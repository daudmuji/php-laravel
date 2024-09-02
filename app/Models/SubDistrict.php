<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubDistrict extends Model
{
    use HasFactory;

    protected $table = 'tbl_master_subdistrict';

    protected $guarded = ['id'];

    public function city()
    {
        return $this->belongsTo(City::class, 'kode_kabupaten_kota', 'kode');
    }
}
