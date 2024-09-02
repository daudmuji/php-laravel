<?php

namespace Database\Seeders;

use App\Models\Province;
use Illuminate\Database\Seeder;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $collections = [
            ['kode' => '001', 'nama' => 'DKI JAKARTA'],
            ['kode' => '002', 'nama' => 'Jawa Barat'],

        ];

        collect($collections)->each(function ($data) {
            Province::create($data);
        });
    }
}
