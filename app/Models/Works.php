<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Works extends Model
{
    protected $table = 'works';

    protected $fillable = [
        'name_work',
        'description_work',
        'skill_id',
        'companies_id',
        'start_date',
        'end_date',
        'type_work',
        'duration',
        'payment',
        'status',
    ];

    public function skill(): BelongsTo
    {
        return $this->belongsTo(Skills::class, 'skill_id');
    }

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class, 'companies_id');
    }
}
