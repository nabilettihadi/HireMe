<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobOffer extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id', 'title', 'description', 'skills_required', 'contract_type', 'location', 'visits',
    ];
    public function company() {
        return $this->belongsTo(Company::class);
    }
}
