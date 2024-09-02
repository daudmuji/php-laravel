<?php

namespace Database\Seeders;

use App\Models\Pekerjaan;
use Illuminate\Database\Seeder;

class PekerjaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $collections = [
            ['kode' => '001', 'nama' => 'Programmer'],
            ['kode' => '002', 'nama' => 'PNS'],
            ['kode' => '003', 'nama' => 'Desainer Grafis'],
            ['kode' => '004', 'nama' => 'Lain - Lain'],

        ];

        collect($collections)->each(function ($data) {
            Pekerjaan::create($data);
        });
    }
}
