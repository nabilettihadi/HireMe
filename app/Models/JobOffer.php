<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class JobOffer extends Model
{   
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'company_id', 'title', 'description', 'required_skills', 'contract_type', 'location', 'visit_count',
    ];

    /**
     * Définit la relation avec le modèle Company.
     * Une offre d'emploi appartient à une entreprise.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }
    public function application()
    {
        return $this->hasMany(Application::class);
    }
}

