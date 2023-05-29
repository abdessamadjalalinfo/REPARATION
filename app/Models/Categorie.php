<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\HasMany;



class Categorie extends Model
{
    use HasFactory;
    public function marques(): HasMany
    {
        return $this->hasMany(Marque::class);
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
