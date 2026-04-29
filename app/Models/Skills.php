<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Works;
use App\Models\User;

class Skills extends Model
{
    protected $fillable = ['skill_name', 'category'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'skill_user');
    }
    
    public function works()
    {
        return $this->belongsToMany(Works::class, 'skill_works');
    }
}
