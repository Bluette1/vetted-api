<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreWellnessEntryRequest;
use App\Models\Pet;
use App\Models\WellnessEntry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WellnessController extends Controller
{
    /**
     * Display a listing of the resource for a specific pet.
     */
    public function index(Pet $pet)
    {
        if (Auth::id() !== $pet->user_id) {
            return $this->error('', 'You are not authorized to view wellness entries for this pet', 403);
        }

        return $this->success($pet->wellnessEntries()->orderBy('date', 'desc')->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreWellnessEntryRequest $request, Pet $pet, \App\Services\InsightService $insightService)
    {
        // Authorization handled in request class

        $validated = $request->validated();
        $validated['pet_id'] = $pet->id;

        // Check for duplicate entry for this date
        $existing = WellnessEntry::where('pet_id', $pet->id)
            ->where('date', $validated['date'])
            ->first();

        if ($existing) {
            $existing->update($validated);
            $insightService->generateForPet($pet);
            return $this->success($existing, 'Wellness entry updated for this date', 200);
        }

        $entry = WellnessEntry::create($validated);
        $insightService->generateForPet($pet);

        return $this->success($entry, 'Wellness entry created successfully', 201);
    }
    
    /**
     * Get trend data for charts.
     */
    public function trends(Pet $pet)
    {
        if (Auth::id() !== $pet->user_id) {
            return $this->error('', 'You are not authorized to view trends for this pet', 403);
        }

        $entries = $pet->wellnessEntries()
            ->orderBy('date', 'asc')
            ->take(30) // Last 30 entries
            ->get();
            
        return $this->success($entries);
    }
}
