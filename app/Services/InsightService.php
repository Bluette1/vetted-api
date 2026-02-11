<?php

namespace App\Services;

use App\Models\Pet;
use App\Models\Insight;
use App\Models\WellnessEntry;
use Carbon\Carbon;

class InsightService
{
    /**
     * Generate insights for a specific pet based on recent data.
     */
    public function generateForPet(Pet $pet)
    {
        $this->checkAppetitePattern($pet);
        $this->checkActivityTrends($pet);
        $this->checkWeightChanges($pet);
    }

    protected function checkAppetitePattern(Pet $pet)
    {
        // Get last 3 entries
        $recentEntries = $pet->wellnessEntries()
            ->orderBy('date', 'desc')
            ->take(3)
            ->get();

        if ($recentEntries->count() < 3) return;

        $lowAppetiteCount = $recentEntries->filter(fn($e) => $e->appetite <= 2)->count();

        if ($lowAppetiteCount >= 3) {
            $this->createInsight($pet, "Appetite has been low for 3 consecutive days. Consider monitoring closely.", 'alert', 'utensils');
        }
    }

    protected function checkActivityTrends(Pet $pet)
    {
        $recentEntries = $pet->wellnessEntries()
            ->orderBy('date', 'desc')
            ->take(7)
            ->get();

        if ($recentEntries->count() < 7) return;

        $avgActivity = $recentEntries->avg('activity');

        if ($avgActivity < 2.5) {
            $this->createInsight($pet, "Activity levels have been lower than usual this week.", 'info', 'activity');
        }
    }

    protected function checkWeightChanges(Pet $pet)
    {
        $recentWeights = $pet->weightHistories()
            ->orderBy('date', 'desc')
            ->take(2)
            ->get();

        if ($recentWeights->count() < 2) return;

        $newWeight = $recentWeights[0]->weight;
        $oldWeight = $recentWeights[1]->weight;

        $percentChange = abs(($newWeight - $oldWeight) / $oldWeight) * 100;

        if ($percentChange > 5) {
            $this->createInsight($pet, "Significant weight change detected (" . round($percentChange, 1) . "%).", 'alert', 'weight');
        }
    }

    protected function createInsight(Pet $pet, string $message, string $type, string $icon)
    {
        $fullMessage = $message . " [Note: This is not a diagnosis. Consider monitoring or consulting a vet.]";

        // Avoid duplicate insights for the same day/message
        Insight::updateOrCreate(
            [
                'pet_id' => $pet->id,
                'message' => $fullMessage,
                'date' => Carbon::today(),
            ],
            [
                'type' => $type,
                'icon' => $icon,
            ]
        );
    }
}
