<?php

namespace Database\Seeders;

use App\Models\Ward;
use Illuminate\Database\Seeder;

class WardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $collections = [
            ['kode' => '001', 'kode_kecamatan' => '001', 'nama' => 'Tebet Barat'],
            ['kode' => '002', 'kode_kecamatan' => '002', 'nama' => 'Petojo Utara'],
            ['kode' => '003', 'kode_kecamatan' => '003', 'nama' => 'Kadununggal'],
            ['kode' => '004', 'kode_kecamatan' => '004', 'nama' => 'Campaka'],
        ];

        collect($collections)->each(function ($data) {
            Ward::create($data);
        });
    }
}
