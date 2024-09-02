<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Costumers extends Model
{
    use HasFactory;

    protected $table = 'tbl_costumers';

    protected $guarded = ['id'];

    public function pekerjaan()
    {
        return $this->belongsTo(Pekerjaan::class, 'kode_pekerjaan', 'kode');
    }

    public function province()
    {
        return $this->belongsTo(Province::class, 'kode_provinsi', 'kode');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'kode_kabupaten_kota', 'kode');
    }

    public function subDistrict()
    {
        return $this->belongsTo(SubDistrict::class, 'kode_kecamatan', 'kode');
    }

    public function ward()
    {
        return $this->belongsTo(Ward::class, 'kode_kelurahan', 'kode');
    }
}
