<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Pet;
use Illuminate\Support\Str;

class InsightSeeder extends Seeder
{
    public function run(): void
    {
        $luna = Pet::where('name', 'Luna')->first();
        $mochi = Pet::where('name', 'Mochi')->first();

        $insights = [];

        if ($luna) {
            $insights[] = ['id' => Str::uuid(), 'pet_id' => $luna->id, 'message' => "Luna's energy levels have been consistently high this week — great job keeping her active! 🎉", 'type' => 'info', 'icon' => '⚡', 'date' => '2026-02-11', 'created_at' => now(), 'updated_at' => now()];
            $insights[] = ['id' => Str::uuid(), 'pet_id' => $luna->id, 'message' => "Flea treatment is due in 4 days. Make sure you have it ready!", 'type' => 'alert', 'icon' => '💊', 'date' => '2026-02-11', 'created_at' => now(), 'updated_at' => now()];
        }

        if ($mochi) {
            $insights[] = ['id' => Str::uuid(), 'pet_id' => $mochi->id, 'message' => "Mochi's appetite has been steady — she seems to be doing well.", 'type' => 'info', 'icon' => '😸', 'date' => '2026-02-11', 'created_at' => now(), 'updated_at' => now()];
        }

        DB::table('insights')->insert($insights);
    }
}
