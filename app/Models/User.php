<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    public function isEntreprise()
    {
        return $this->role === 'Entreprise';
    }
    public function isAdmin()
    {
        return $this->role === 'Administrateur';
    }

    public function applications()
    {
        return $this->hasMany(Application::class);
    }
    public function profile()
    {
        return $this->hasOne(UserProfile::class);
    }
    public function Company()
    {
        return $this->hasOne(Company::class);
    }
    public function skills()
    {
        return $this->belongsToMany(Skill::class);
    }
    public function experiences()
    {
        return $this->hasMany(Experience::class);
    }

    public function educations()
    {
        return $this->hasMany(Education::class);
    }

    public function languages()
    {
        return $this->belongsToMany(Language::class);
    }

    public function curriculumVitae()
    {
        return $this->hasOne(CurriculumVitae::class);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
