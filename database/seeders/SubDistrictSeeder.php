<?php

namespace Database\Seeders;

use App\Models\SubDistrict;
use Illuminate\Database\Seeder;

class SubDistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $collections = [
            ['kode' => '001', 'kode_kabupaten_kota' => '001', 'nama' => 'Tebet'],
            ['kode' => '002', 'kode_kabupaten_kota' => '002', 'nama' => 'Gambir'],
            ['kode' => '003', 'kode_kabupaten_kota' => '003', 'nama' => 'Kalapanunggal'],
            ['kode' => '004', 'kode_kabupaten_kota' => '004', 'nama' => 'Andir'],
        ];

        collect($collections)->each(function ($data) {
            SubDistrict::create($data);
        });
    }
}
