<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ward extends Model
{
    use HasFactory;

    protected $table = 'tbl_master_ward';

    protected $guarded = ['id'];

    public function subDistrict()
    {
        return $this->belongsTo(SubDistrict::class, 'kode_kecamatan', 'kode');
    }
}
