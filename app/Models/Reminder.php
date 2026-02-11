<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reminder extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'pet_id',
        'title',
        'type',
        'date',
        'time',
        'recurring',
        'completed',
        'snoozed',
    ];

    protected $casts = [
        'date' => 'date',
        'recurring' => 'boolean',
        'completed' => 'boolean',
        'snoozed' => 'boolean',
    ];

    public function pet(): BelongsTo
    {
        return $this->belongsTo(Pet::class);
    }
}
