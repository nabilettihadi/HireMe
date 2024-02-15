<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CurriculumVitae extends Model
{
    protected $fillable = [
        'user_id', 
    ];

    // Relation avec le profil utilisateur

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
