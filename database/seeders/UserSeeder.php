<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cs = User::create([
           'name' => 'CS',
           'email' => 'cs@example.com',
           'password' => bcrypt('12345678'),
        ]);
        $cs->assignRole('cs');

        $approval = User::create([
            'name' => 'Approval',
            'email' => 'approval@example.com',
            'password' => bcrypt('12345678'),
        ]);
        $cs->assignRole('approval');
    }
}
