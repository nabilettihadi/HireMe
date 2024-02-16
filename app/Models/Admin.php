<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    protected $table = 'admins';

    protected $fillable = [
        'name',
        'email',
        // Ajoutez d'autres attributs si nécessaire
    ];
    
    /**
     * Détermine si l'utilisateur est un administrateur.
     *
     * @return bool
     */
    public function isAdmin()
    {
        return $this->role === 'Administrateur';
    }
}
