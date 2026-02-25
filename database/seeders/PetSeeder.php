<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Str;

class PetSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::where('email', 'demo@vetted.app')->first();

        DB::table('pets')->insert([
            [
                'id' => Str::uuid(),
                'user_id' => $user->id,
                'name' => 'Luna',
                'species' => 'dog',
                'breed' => 'Golden Retriever',
                'dob' => '2021-03-15',
                'weight' => 28,
                'notes' => 'Loves belly rubs and playing fetch',
                'avatar_url' => '🐕',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => Str::uuid(),
                'user_id' => $user->id,
                'name' => 'Mochi',
                'species' => 'cat',
                'breed' => 'British Shorthair',
                'dob' => '2022-08-20',
                'weight' => 5.2,
                'notes' => 'Enjoys sunbeams and chin scratches',
                'avatar_url' => '🐈',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
