<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'current_position',
        'industry',
        'address',
        'contact_information',
        'about',
        'photo',
        'user_id',
    ];
    
    public function user() {
        return $this->belongsTo(User::class);
    }

}
