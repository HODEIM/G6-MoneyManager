<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'id' => '1',
            'name' => 'Aaron',
            'surname' => 'Gomez Dominguez',
            'password' => password_hash('Admin123$Y', PASSWORD_DEFAULT),
            'email' => 'aaron@aaron.com',
            'email_verified_at' => null,
            'telephone' => '674524623',
            'address' => 'Katalina Eleizegui',
            'image' => 'Default.png',
            'locked' => false,
            'id_rol' => '1',
            'remember_token' => null,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        User::create([
            'id' => '2',
            'name' => 'Hodei',
            'surname' => 'Maidagan Urkia',
            'password' => password_hash('Admin123$Y', PASSWORD_DEFAULT),
            'email' => 'hodei@hodei.com',
            'email_verified_at' => null,
            'telephone' => '629825469',
            'address' => 'Kalle 31 de agosto',
            'image' => 'Default.png',
            'locked' => false,
            'id_rol' => '2',
            'remember_token' => null,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
