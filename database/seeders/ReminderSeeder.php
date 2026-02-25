<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Pet;
use Illuminate\Support\Str;

class ReminderSeeder extends Seeder
{
    public function run(): void
    {
        $luna = Pet::where('name', 'Luna')->first();
        $mochi = Pet::where('name', 'Mochi')->first();

        $reminders = [];

        if ($luna) {
            $reminders[] = ['id' => Str::uuid(), 'pet_id' => $luna->id, 'title' => 'Flea treatment', 'type' => 'medication', 'date' => '2026-02-15', 'time' => '09:00', 'recurring' => true, 'completed' => false, 'snoozed' => false, 'created_at' => now(), 'updated_at' => now()];
            $reminders[] = ['id' => Str::uuid(), 'pet_id' => $luna->id, 'title' => 'Annual checkup', 'type' => 'custom', 'date' => '2026-03-15', 'time' => '14:00', 'recurring' => false, 'completed' => false, 'snoozed' => false, 'created_at' => now(), 'updated_at' => now()];
            $reminders[] = ['id' => Str::uuid(), 'pet_id' => $luna->id, 'title' => 'Rabies booster', 'type' => 'vaccination', 'date' => '2027-01-15', 'time' => '10:00', 'recurring' => false, 'completed' => false, 'snoozed' => false, 'created_at' => now(), 'updated_at' => now()];
        }

        if ($mochi) {
            $reminders[] = ['id' => Str::uuid(), 'pet_id' => $mochi->id, 'title' => 'Deworming', 'type' => 'medication', 'date' => '2026-02-20', 'time' => '10:00', 'recurring' => true, 'completed' => false, 'snoozed' => false, 'created_at' => now(), 'updated_at' => now()];
        }

        DB::table('reminders')->insert($reminders);
    }
}
