<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Company extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'companies';

    protected $fillable = [
        'company_name',
        'description',
        'cnpj_cpf',
        'area_operation',
        'assessment',
        'representative_name',
        'email',
        'phone_number',
        'city_id',
        'cep',
        'address',
        'neighborhood',
        'number',
        'password',
    ];

    protected $hidden = ['password', 'remember_token'];

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
