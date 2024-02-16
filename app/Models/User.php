<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{   use SoftDeletes;
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * Vérifie si l'utilisateur a le rôle d'entreprise.
     *
     * @return bool
     */
    public function isCompany()
    {
        return $this->role === 'Entreprise';
    }

    /**
     * Vérifie si l'utilisateur a le rôle d'administrateur.
     *
     * @return bool
     */
    public function isAdmin()
    {
        return $this->role === 'Administrateur';
    }

    /**
     * Définit la relation one-to-many avec les applications.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function applications()
    {
        return $this->hasMany(Application::class);
    }

    /**
     * Définit la relation one-to-one avec le profil utilisateur.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function profile()
    {
        return $this->hasOne(UserProfile::class);
    }

    /**
     * Définit la relation one-to-one avec l'entreprise.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function company()
    {
        return $this->hasOne(Company::class);
    }

    /**
     * Définit la relation many-to-many avec les compétences.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function skills()
    {
        return $this->belongsToMany(Skill::class);
    }

    /**
     * Définit la relation one-to-many avec les expériences.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function experiences()
    {
        return $this->hasMany(Experience::class);
    }

    /**
     * Définit la relation one-to-many avec les éducations.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function educations()
    {
        return $this->hasMany(Education::class);
    }

    /**
     * Définit la relation many-to-many avec les langues.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function languages()
    {
        return $this->belongsToMany(Language::class);
    }

    /**
     * Définit la relation one-to-one avec le curriculum vitae.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
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

