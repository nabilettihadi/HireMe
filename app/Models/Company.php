<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\User;
use Illuminate\Database\Eloquent\SoftDeletes;
class Company extends Authenticatable
{   
    
    use HasFactory;

    protected $fillable = [
        'user_id','name', 'logo', 'slogan', 'industry', 'description',
    ];

    /**
     * Définit la relation avec les offres d'emploi.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function jobOffers()
    {
        return $this->hasMany(JobOffer::class);
    }

    /**
     * Définit la relation avec l'utilisateur associé à l'entreprise.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function applications()
    {
        return $this->hasMany(Application::class);
    }
}
