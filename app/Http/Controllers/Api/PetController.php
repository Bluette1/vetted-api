<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePetRequest;
use App\Http\Requests\UpdatePetRequest;
use App\Models\Pet;
use App\Models\WeightHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->success(Auth::user()->pets);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePetRequest $request)
    {
        $validated = $request->validated();
        $validated['user_id'] = Auth::id();

        $pet = Pet::create($validated);

        if ($request->has('weight')) {
            WeightHistory::create([
                'pet_id' => $pet->id,
                'weight' => $request->weight,
                'date' => now(),
            ]);
        }

        return $this->success($pet, 'Pet created successfully', 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Pet $pet)
    {
        if (Auth::id() !== $pet->user_id) {
            return $this->error('', 'You are not authorized to view this pet', 403);
        }

        return $this->success($pet->load('weightHistories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePetRequest $request, Pet $pet, \App\Services\InsightService $insightService)
    {
        if (Auth::id() !== $pet->user_id) {
            return $this->error('', 'You are not authorized to update this pet', 403);
        }

        $pet->update($request->validated());

        // Create a new weight history entry if weight has changed
        if ($request->has('weight')) {
             WeightHistory::create([
                 'pet_id' => $pet->id,
                 'weight' => $request->weight,
                 'date' => now(),
             ]);

             $insightService->generateForPet($pet);
        }

        return $this->success($pet);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pet $pet)
    {
        if (Auth::id() !== $pet->user_id) {
            return $this->error('', 'You are not authorized to delete this pet', 403);
        }

        $pet->delete();

        return $this->success('', 'Pet deleted successfully');
    }
}
