<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TrainingGoal extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'pet_id',
        'title',
        'description',
        'type',
        'target_count',
        'current_count',
        'completed',
    ];

    protected $casts = [
        'target_count' => 'integer',
        'current_count' => 'integer',
        'completed' => 'boolean',
    ];

    public function pet(): BelongsTo
    {
        return $this->belongsTo(Pet::class);
    }

    public function getProgressAttribute(): float
    {
        if ($this->target_count === 0) return 0;
        return round(($this->current_count / $this->target_count) * 100, 2);
    }
}
