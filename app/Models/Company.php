<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_name',
        'social_reason',
        'description',
        'cnpj_cpf',
        'area_operation',
        'representative_name',
        'email',
        'phone_number',
        'city_id',
        'cep',
        'address',
        'neighborhood',
        'number',
        'complement',
        'password',
    ];
}
