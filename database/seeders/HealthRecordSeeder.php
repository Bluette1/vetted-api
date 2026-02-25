<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Pet;
use Illuminate\Support\Str;

class HealthRecordSeeder extends Seeder
{
    public function run(): void
    {
        $luna = Pet::where('name', 'Luna')->first();
        $mochi = Pet::where('name', 'Mochi')->first();

        $records = [];

        if ($luna) {
            $records[] = ['id' => Str::uuid(), 'pet_id' => $luna->id, 'type' => 'vaccination', 'title' => 'Rabies Vaccine', 'description' => 'Annual rabies booster', 'date' => '2026-01-15', 'created_at' => now(), 'updated_at' => now()];
            $records[] = ['id' => Str::uuid(), 'pet_id' => $luna->id, 'type' => 'vet_visit', 'title' => 'Annual Checkup', 'description' => 'All clear — healthy and happy!', 'date' => '2026-01-15', 'created_at' => now(), 'updated_at' => now()];
            $records[] = ['id' => Str::uuid(), 'pet_id' => $luna->id, 'type' => 'medication', 'title' => 'Flea Prevention', 'description' => 'Monthly flea and tick treatment', 'date' => '2026-02-01', 'created_at' => now(), 'updated_at' => now()];
        }

        if ($mochi) {
            $records[] = ['id' => Str::uuid(), 'pet_id' => $mochi->id, 'type' => 'vaccination', 'title' => 'FVRCP Vaccine', 'description' => 'Core vaccine booster', 'date' => '2025-12-10', 'created_at' => now(), 'updated_at' => now()];
            $records[] = ['id' => Str::uuid(), 'pet_id' => $mochi->id, 'type' => 'note', 'title' => 'Slight sneezing', 'description' => 'Noticed occasional sneezing, monitoring', 'date' => '2026-02-05', 'created_at' => now(), 'updated_at' => now()];
        }

        DB::table('health_records')->insert($records);
    }
}
