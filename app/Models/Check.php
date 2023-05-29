<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Check extends Model
{
    use HasFactory;
    public function reparations(): belongsTo
    {
        return $this->belongsTo(ReparationCheck::class,'component_id');
    }
}
