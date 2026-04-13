<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeed extends Seeder
{
    /**
     * Run the database seeds.
     */

    protected array $cities = [
        'SP' => [
            'Registro',
            'Pariquera-Açu',
            'Jacupiranga',
            'Cajati',
            'Cananéia',
            'Iguape',
            'Ilha Comprida',
            'Juquiá',
            'Miracatu',
            'Pedro de Toledo',
            'Sete Barras',
            'Eldorado',
            'Barra do Turvo'
        ],

        'PR' => [
            'Adrianópolis',
            'Bocaiúva do Sul',
            'Cerro Azul',
            'Doutor Ulysses',
            'Tunas do Paraná'
        ]
    ];

    public function run(): void
    {
        foreach ($this->cities as $state => $cityNames) {
            foreach ($cityNames as $cityName) {
                DB::table('cities')->insert([
                    'UF' => $state,
                    'name_city' => $cityName,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }


        $total = count($this->cities['SP']) + count($this->cities['PR']);
        $this->command->info("✅ $total cidades do Vale do Ribeira foram cadastradas com sucesso!");
    }
}
