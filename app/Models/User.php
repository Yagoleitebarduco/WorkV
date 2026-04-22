<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use App\Models\City;
use App\Models\Skill;

#[Fillable(['name', 'email', 'password'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    protected $fillable = [
        'is_admin',
        'is_freelancer',
        'profile_picture',
        'complete_name',
        'cpf',
        'birth_date',
        'phone_number',
        'email',
        'city_id',
        'address',
        'professional_title',
        'portfolio_link',
        'bio',
        'password',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function skills()
    {
        return $this->belongsToMany(Skills::class, 'skill_user', 'user_id', 'skill_id');
    }
}
