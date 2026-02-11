<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreHealthRecordRequest;
use App\Http\Requests\UpdateHealthRecordRequest;
use App\Models\HealthRecord;
use App\Models\Pet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class HealthRecordController extends Controller
{
    /**
     * Display a listing of the resource for a specific pet.
     */
    public function index(Pet $pet)
    {
        if (Auth::id() !== $pet->user_id) {
            return $this->error('', 'You are not authorized to view health records for this pet', 403);
        }

        return $this->success($pet->healthRecords);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreHealthRecordRequest $request, Pet $pet)
    {
        // Authorization handled in request class

        $validated = $request->validated();
        $validated['pet_id'] = $pet->id;

        if ($request->hasFile('document')) {
            $path = $request->file('document')->store('health-records/' . $pet->id, 'public');
            $validated['document_path'] = $path;
        }

        $record = HealthRecord::create($validated);

        return $this->success($record, 'Health record created successfully', 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(HealthRecord $health_record)
    {
        if (Auth::id() !== $health_record->pet->user_id) {
            return $this->error('', 'You are not authorized to view this health record', 403);
        }

        return $this->success($health_record);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateHealthRecordRequest $request, HealthRecord $health_record)
    {
        // Authorization handled in request class

        $validated = $request->validated();

        if ($request->hasFile('document')) {
            // Delete old file if exists
            if ($health_record->document_path) {
                Storage::disk('public')->delete($health_record->document_path);
            }

            $path = $request->file('document')->store('health-records/' . $health_record->pet_id, 'public');
            $validated['document_path'] = $path;
        }

        $health_record->update($validated);

        return $this->success($health_record, 'Health record updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HealthRecord $health_record)
    {
        if (Auth::id() !== $health_record->pet->user_id) {
            return $this->error('', 'You are not authorized to delete this health record', 403);
        }

        if ($health_record->document_path) {
            Storage::disk('public')->delete($health_record->document_path);
        }

        $health_record->delete();

        return $this->success('', 'Health record deleted successfully');
    }
}
