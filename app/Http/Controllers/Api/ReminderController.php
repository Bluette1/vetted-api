<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreReminderRequest;
use App\Http\Requests\UpdateReminderRequest;
use App\Models\Pet;
use App\Models\Reminder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReminderController extends Controller
{
    /**
     * Display a listing of the resource for a specific pet.
     */
    public function index(Pet $pet)
    {
        if (Auth::id() !== $pet->user_id) {
            return $this->error('', 'You are not authorized to view reminders for this pet', 403);
        }

        return $this->success($pet->reminders()->orderBy('date')->orderBy('time')->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreReminderRequest $request, Pet $pet)
    {
        // Authorization handled in request class

        $validated = $request->validated();
        $validated['pet_id'] = $pet->id;

        $reminder = Reminder::create($validated);

        return $this->success($reminder, 'Reminder created successfully', 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Reminder $reminder)
    {
        if (Auth::id() !== $reminder->pet->user_id) {
            return $this->error('', 'You are not authorized to view this reminder', 403);
        }

        return $this->success($reminder);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateReminderRequest $request, Reminder $reminder)
    {
        // Authorization handled in request class

        $reminder->update($request->validated());

        return $this->success($reminder, 'Reminder updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reminder $reminder)
    {
        if (Auth::id() !== $reminder->pet->user_id) {
            return $this->error('', 'You are not authorized to delete this reminder', 403);
        }

        $reminder->delete();

        return $this->success('', 'Reminder deleted successfully');
    }
}
