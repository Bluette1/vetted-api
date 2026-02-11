<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WellnessEntry extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'pet_id',
        'date',
        'appetite',
        'energy',
        'mood',
        'bathroom',
        'activity',
        'notes',
    ];

    protected $casts = [
        'date' => 'date',
        'appetite' => 'integer',
        'energy' => 'integer',
        'mood' => 'integer',
        'bathroom' => 'integer',
        'activity' => 'integer',
    ];

    public function pet(): BelongsTo
    {
        return $this->belongsTo(Pet::class);
    }
}
