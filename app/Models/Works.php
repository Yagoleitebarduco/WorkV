<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Works extends Model
{
    protected $fillable = [
        'name_work',
        'description_work',
        'companies_id',
        'start_date',
        'end_date',
        'type_work',
        'duration',
        'payment',
        'status',
    ];

    public function works()
    {
        return $this->belongsToMany(Works::class, 'skill_works');
    }
}
