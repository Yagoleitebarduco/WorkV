<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Skills extends Model
{
    protected $fillable = ['skill_name', 'category'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_skills');
    }
}
