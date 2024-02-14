<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;

class Company extends Model implements Authenticatable
{
    use AuthenticableTrait;
    use HasFactory; 

    protected $fillable = [
        'name', 'logo', 'slogan', 'industry', 'description',
    ];

    public function jobOffers() {
        return $this->hasMany(JobOffer::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
