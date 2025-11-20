<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'lu_adm',
            'email' => 'lu@lu.com',
            'password' => bcrypt('adm123'),
            'role' => 1,
            'school_id' => null,
        ]);
    }
}
// sail artisan db:seed --class=AdminSeeder
