<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reparation extends Model
{
    use HasFactory;
    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }
    public function categorie(): BelongsTo
    {
        return $this->belongsTo(Categorie::class);
    }
    public function marque(): BelongsTo
    {
        return $this->belongsTo(Marque::class);
    }
    public function modele(): BelongsTo
    {
        return $this->belongsTo(Modele::class,'model_id');
    }
}
