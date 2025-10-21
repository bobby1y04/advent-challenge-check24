<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('settings')->upsert([
            ['key'=>'event_code','value'=>'CHECK24-XMAS-2025','created_at'=>now(),'updated_at'=>now()],
            ['key'=>'event_start','value'=>'2025-12-05T17:30:00Z','created_at'=>now(),'updated_at'=>now()],
        ], ['key'], ['value','updated_at']);
    }
}
