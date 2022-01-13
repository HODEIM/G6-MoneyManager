<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Account;
use Carbon\Carbon;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Account::create([
            'id' => '1',
            'name' => 'Viaje a Madrid',
            'description' => 'Gastos del viaja a madrid',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        Account::create([
            'id' => '2',
            'name' => 'Gastos de la Casa',
            'description' => 'Luz, Agua, Gas, Compra, Hipoteca',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        Account::create([
            'id' => '3',
            'name' => 'Cuenta del Bar',
            'description' => 'Cuenta de la cuadrilla para el bar',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        Account::create([
            'id' => '4',
            'name' => 'Gastos cena',
            'description' => 'Cine, Cena',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
