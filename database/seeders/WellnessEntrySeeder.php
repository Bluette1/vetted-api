<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Pet;
use Carbon\Carbon;
use Illuminate\Support\Str;

class WellnessEntrySeeder extends Seeder
{
    public function run(): void
    {
        $pets = Pet::all();
        $entries = [];

        foreach ($pets as $pet) {
            for ($i = 6; $i >= 0; $i--) {
                $date = Carbon::now()->subDays($i)->toDateString();
                $entries[] = [
                    'id' => Str::uuid(),
                    'pet_id' => $pet->id,
                    'date' => $date,
                    'appetite' => rand(3, 5),
                    'energy' => rand(3, 5),
                    'mood' => rand(3, 5),
                    'bathroom' => rand(4, 5),
                    'activity' => rand(3, 5),
                    'notes' => '',
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        DB::table('wellness_entries')->insert($entries);
    }
}
