<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CitySeed::class,
            SkillsSeed::class,
            AreaDeAtuacaoSeeder::class,
        ]);

        $city = City::query()->first();

        if (! $city) {
            $city = City::create([
                'UF' => 'SP',
                'name_city' => 'Registro',
            ]);
        }

        User::query()->firstOrCreate([
            'email' => 'test@example.com',
        ], [
            'is_admin' => false,
            'is_freelancer' => true,
            'complete_name' => 'Test User',
            'cpf' => '12345678901',
            'birth_date' => '1990-01-01',
            'phone_number' => '13999990000',
            'city_id' => $city->id,
            'address' => 'Rua Teste, 100',
            'professional_title' => 'Desenvolvedor Full Stack',
            'portfolio_link' => null,
            'bio' => 'Usuário padrão para testes locais.',
            'password' => Hash::make('password'),
        ]);
    }
}
