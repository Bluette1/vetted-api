<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Pet;
use Illuminate\Support\Str;

class TrainingGoalSeeder extends Seeder
{
    public function run(): void
    {
        $luna = Pet::where('name', 'Luna')->first();
        $mochi = Pet::where('name', 'Mochi')->first();

        $goals = [];

        if ($luna) {
            $goals[] = [
                'id' => Str::uuid(),
                'pet_id' => $luna->id,
                'title' => 'Leash walking',
                'description' => 'Walking calmly on a leash without pulling.',
                'type' => 'skill',
                'target_count' => 10,
                'current_count' => 7,
                'completed' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ];
            $goals[] = [
                'id' => Str::uuid(),
                'pet_id' => $luna->id,
                'title' => 'Sit & stay',
                'description' => 'Respond to sit and stay commands for 30 seconds.',
                'type' => 'skill',
                'target_count' => 5,
                'current_count' => 5,
                'completed' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        if ($mochi) {
            $goals[] = [
                'id' => Str::uuid(),
                'pet_id' => $mochi->id,
                'title' => 'Litter box routine',
                'description' => 'Consistent use of the new litter box.',
                'type' => 'habit',
                'target_count' => 14,
                'current_count' => 10,
                'completed' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('training_goals')->insert($goals);
    }
}
