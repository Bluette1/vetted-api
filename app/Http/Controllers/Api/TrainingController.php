<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pet;
use App\Models\TrainingGoal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TrainingController extends Controller
{
    /**
     * Display a listing of training goals for a specific pet.
     */
    public function index(Pet $pet)
    {
        if (Auth::id() !== $pet->user_id) {
            return $this->error('', 'You are not authorized to view goals for this pet', 403);
        }

        return $this->success($pet->trainingGoals()->orderBy('created_at', 'desc')->get());
    }

    /**
     * Store a newly created training goal.
     */
    public function store(Request $request, Pet $pet)
    {
        if (Auth::id() !== $pet->user_id) {
            return $this->error('', 'You are not authorized to create goals for this pet', 403);
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'type' => 'required|in:habit,skill,other',
            'target_count' => 'required|integer|min:1',
        ]);

        $validated['pet_id'] = $pet->id;

        $goal = TrainingGoal::create($validated);

        return $this->success($goal, 'Training goal created successfully', 201);
    }

    /**
     * Record a completion step for a goal.
     */
    public function progress(TrainingGoal $trainingGoal)
    {
        if (Auth::id() !== $trainingGoal->pet->user_id) {
            return $this->error('', 'You are not authorized to update this goal', 403);
        }

        if ($trainingGoal->completed) {
            return $this->error('', 'Goal is already completed', 422);
        }

        $trainingGoal->increment('current_count');

        if ($trainingGoal->current_count >= $trainingGoal->target_count) {
            $trainingGoal->update(['completed' => true]);
        }

        return $this->success($trainingGoal, 'Progress recorded successfully');
    }

    /**
     * Remove the specified goal.
     */
    public function destroy(TrainingGoal $trainingGoal)
    {
        if (Auth::id() !== $trainingGoal->pet->user_id) {
            return $this->error('', 'You are not authorized to delete this goal', 403);
        }

        $trainingGoal->delete();

        return $this->success('', 'Training goal deleted successfully');
    }
}
