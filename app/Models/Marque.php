<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Marque extends Model
{
    use HasFactory;
    public function modeles(): HasMany
    {
        return $this->hasMany(Modele::class);
    }
    public function categorie(): BelongsTo
    {
        return $this->belongsTo(Categorie::class);
    }
    public function reparations(): HasMany
    {
        return $this->hasMany(Reparation::class);
    }
    public function ventes(): HasMany
    {
        return $this->hasMany(Vente::class);
    }
}
