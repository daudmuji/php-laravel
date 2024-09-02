<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $collections = [
            ['kode' => '001', 'kode_provinsi' => '001', 'nama' => 'Jakarta Selatan'],
            ['kode' => '002', 'kode_provinsi' => '001', 'nama' => 'Jakarta Pusat'],
            ['kode' => '003', 'kode_provinsi' => '002', 'nama' => 'Sukabumi'],
            ['kode' => '004', 'kode_provinsi' => '002', 'nama' => 'Bandung'],

        ];

        collect($collections)->each(function ($data) {
            City::create($data);
        });
    }
}
