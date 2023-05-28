<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Modele extends Model
{
    protected $table = 'models';
    use HasFactory;
    public function marque(): BelongsTo
    {
        return $this->belongsTo(Marque::class);
    }
    public function reparations(): HasMany
    {
        return $this->hasMany(Reparation::class,'model_id');
    }
    public function ventes(): HasMany
    {
        return $this->hasMany(Vente::class,'model_id');
    }
}
