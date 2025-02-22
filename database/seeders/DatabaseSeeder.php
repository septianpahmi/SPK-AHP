<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name'      => 'Komite',
            'email'     => 'komite@gmail.com',
            'role'     => 'komite',
            'password'  => bcrypt('12345678')
        ]);
        $tatausaha = User::create([
            'name'      => 'Tata Usaha',
            'email'     => 'tatausaha@gmail.com',
            'role'     => 'TU',
            'password'  => bcrypt('12345678')
        ]);
        $tatausaha = User::create([
            'name'      => 'Kepala Sekolah',
            'email'     => 'kepsek@gmail.com',
            'role'     => 'kepsek',
            'password'  => bcrypt('12345678')
        ]);
    }
}
