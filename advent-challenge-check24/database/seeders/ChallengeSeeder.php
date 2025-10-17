<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChallengeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('challenges')->updateOrInsert(
            ['slug' => 'demo'],
            [
                'title' => 'Warm-up: Elf Decoder',
                'statement_md' => "# Elf Decoder\n \nGib die Zahl **42** als Antwort für Part 1 ein. Für Part 2 gib **84** ein.",
                'part1_enabled' => true, 'part2_enabled' => true, 'uses_seeded_input' => false,
                'updated_at' => now(), 'created_at' => now(),
                ]
        );
    }
}
