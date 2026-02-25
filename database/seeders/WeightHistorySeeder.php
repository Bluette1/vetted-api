<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Pet;
use Carbon\Carbon;

class WeightHistorySeeder extends Seeder
{
    public function run(): void
    {
        $luna = Pet::where('name', 'Luna')->first();
        $mochi = Pet::where('name', 'Mochi')->first();

        if ($luna) {
            DB::table('weight_histories')->insert([
                ['id' => 1, 'pet_id' => $luna->id, 'weight' => 25.5, 'date' => Carbon::now()->subMonths(3)->toDateString(), 'created_at' => now(), 'updated_at' => now()],
                ['id' => 2, 'pet_id' => $luna->id, 'weight' => 26.8, 'date' => Carbon::now()->subMonths(2)->toDateString(), 'created_at' => now(), 'updated_at' => now()],
                ['id' => 3, 'pet_id' => $luna->id, 'weight' => 28.0, 'date' => Carbon::now()->subMonths(1)->toDateString(), 'created_at' => now(), 'updated_at' => now()],
            ]);
        }

        if ($mochi) {
            DB::table('weight_histories')->insert([
                ['id' => 4, 'pet_id' => $mochi->id, 'weight' => 4.8, 'date' => Carbon::now()->subMonths(2)->toDateString(), 'created_at' => now(), 'updated_at' => now()],
                ['id' => 5, 'pet_id' => $mochi->id, 'weight' => 5.2, 'date' => Carbon::now()->subMonths(1)->toDateString(), 'created_at' => now(), 'updated_at' => now()],
            ]);
        }
    }
}
