<?php

namespace Database\Factories;

use App\Models\City;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends Factory<User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $cityId = City::query()->value('id');

        if (! $cityId) {
            $cityId = City::query()->create([
                'UF' => 'SP',
                'name_city' => 'Registro',
            ])->id;
        }

        return [
            'is_admin' => false,
            'is_freelancer' => true,
            'complete_name' => fake()->name(),
            'cpf' => fake()->unique()->numerify('###########'),
            'birth_date' => fake()->date(),
            'phone_number' => fake()->unique()->numerify('13#########'),
            'email' => fake()->unique()->safeEmail(),
            'city_id' => $cityId,
            'address' => fake()->streetAddress(),
            'professional_title' => fake()->jobTitle(),
            'portfolio_link' => fake()->optional()->url(),
            'bio' => fake()->optional()->sentence(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
