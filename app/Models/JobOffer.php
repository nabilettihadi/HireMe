<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobOffer extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id', 'title', 'description', 'required_skills', 'contract_type', 'location', 'visit_count',
    ];

    /**
     * Définit la relation avec le modèle Company.
     * Une offre d'emploi appartient à une entreprise.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function company() {
        return $this->belongsTo(Company::class);
    }
}

