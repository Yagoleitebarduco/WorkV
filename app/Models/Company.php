<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Company extends Authenticatable
{
    use HasFactory, Notifiable;
<<<<<<< HEAD

    protected $table = 'companies';
=======
>>>>>>> 1f499d5948ca58facf471f6ede8b282c101fe61a

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

<<<<<<< HEAD
    protected $hidden = ['password', 'remember_token'];
=======
    protected $hidden = [
        'password',
        'remember_token',
    ];
>>>>>>> 1f499d5948ca58facf471f6ede8b282c101fe61a

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
