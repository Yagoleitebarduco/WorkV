<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Works extends Model
{
<<<<<<< HEAD
    protected $fillable = [
        'name_work',
        'description_work',
=======
    protected $table = 'works';

    protected $fillable = [
        'name_work',
        'description_work',
        'skill_id',
>>>>>>> 1f499d5948ca58facf471f6ede8b282c101fe61a
        'companies_id',
        'start_date',
        'end_date',
        'type_work',
        'duration',
        'payment',
        'status',
    ];

<<<<<<< HEAD
    public function works()
    {
        return $this->belongsToMany(Works::class, 'skill_works');
=======
    public function skill(): BelongsTo
    {
        return $this->belongsTo(Skills::class, 'skill_id');
    }

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class, 'companies_id');
>>>>>>> 1f499d5948ca58facf471f6ede8b282c101fe61a
    }
}
