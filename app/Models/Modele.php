<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Modele extends Model
{
    protected $table = 'models';
    use HasFactory;
    public function marque(): BelongsTo
    {
        return $this->belongsTo(Marque::class);
    }
}
