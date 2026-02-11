<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class HealthRecord extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'pet_id',
        'type',
        'title',
        'description',
        'date',
        'document_path',
    ];

    protected $casts = [
        'date' => 'date',
    ];

    /**
     * Get the URL for the associated document.
     */
    public function getDocumentUrlAttribute(): string|null
    {
        return $this->document_path ? Storage::url($this->document_path) : null;
    }

    public function pet(): BelongsTo
    {
        return $this->belongsTo(Pet::class);
    }
}
