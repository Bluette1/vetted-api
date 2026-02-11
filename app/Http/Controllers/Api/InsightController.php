<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InsightController extends Controller
{
    /**
     * Display a listing of insights for a specific pet.
     */
    public function index(Pet $pet)
    {
        if (Auth::id() !== $pet->user_id) {
            return $this->error('', 'You are not authorized to view insights for this pet', 403);
        }

        return $this->success($pet->insights()->orderBy('date', 'desc')->get());
    }
}
