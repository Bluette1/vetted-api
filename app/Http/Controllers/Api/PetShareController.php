<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pet;
use App\Models\PetShare;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PetShareController extends Controller
{
    /**
     * Generate a sharing token for a pet.
     */
    public function create(Request $request, Pet $pet)
    {
        if (Auth::id() !== $pet->user_id) {
            return $this->error('', 'You are not authorized to share this pet', 403);
        }

        $share = PetShare::create([
            'pet_id' => $pet->id,
            'token' => Str::random(32),
            'expires_at' => $request->has('expires_at') ? $request->expires_at : null,
        ]);

        return $this->success([
            'token' => $share->token,
            'url' => url("/api/share/{$share->token}")
        ], 'Share link generated successfully');
    }

    /**
     * View shared pet summary (Public).
     */
    public function show(string $token)
    {
        $share = PetShare::where('token', $token)->first();

        if (!$share || !$share->isValid()) {
            return $this->error('', 'Invalid or expired share link', 404);
        }

        $pet = $share->pet->load([
            'healthRecords' => fn($q) => $q->orderBy('date', 'desc'),
            'wellnessEntries' => fn($q) => $q->orderBy('date', 'desc')->take(7), // Last week
        ]);

        // Limited fields for public view
        $summary = [
            'pet' => [
                'name' => $pet->name,
                'species' => $pet->species,
                'breed' => $pet->breed,
                'dob' => $pet->dob,
                'weight' => $pet->weight,
                'notes' => $pet->notes,
            ],
            'health_records' => $pet->healthRecords->map(fn($r) => [
                'type' => $r->type,
                'title' => $r->title,
                'description' => $r->description,
                'date' => $r->date,
            ]),
            'wellness_summary' => $pet->wellnessEntries->map(fn($e) => [
                'date' => $e->date,
                'appetite' => $e->appetite,
                'energy' => $e->energy,
                'mood' => $e->mood,
            ]),
        ];

        return $this->success($summary);
    }
}
