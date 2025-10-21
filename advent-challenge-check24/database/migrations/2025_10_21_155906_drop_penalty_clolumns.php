<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('scores', function (Blueprint $table) {
            if (Schema::hasColumn('scores', 'part1_penalties')) {
                $table->dropColumn('part1_penalties');
            }
            if (Schema::hasColumn('scores', 'part2_penalties')) {
                $table->dropColumn('part2_penalties');
            }
        });

        if (Schema::hasTable('submissions')) {
            Schema::table('submissions', function (Blueprint $table) {
               if (Schema::hasColumn('submissions', 'penalty_count_at_submit')) {
                   $table->dropColumn('penalty_count_at_submit');
               }
            });
        }
        if (Schema::hasTable('settings')) {
            DB::table('settings')->where('key', 'penalty_minutes')->delete();
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('scores', function (Blueprint $table) {
            if (Schema::hasTable('scores')) {
                Schema::table('scores', function (Blueprint $table) {
                   if (!Schema::hasColumn('scores', 'part1_penalties')) {
                       $table->unsignedInteger('part1_penalties')->default(0);
                   }
                });
            }

            if (Schema::hasTable('submissions')) {
                Schema::table('submissions', function (Blueprint $table) {
                    if (!Schema::hasColumn('submissions', 'penalty_count_at_submit')) {
                        $table->unsignedInteger('penalty_count_at_submit')->default(0);
                    }
                });
            }

            if (Schema::hasTable('settings')) {
                $exists = DB::table('settings')->where('key', 'penalty_minutes')->exists();
                if (!$exists) {
                    DB::table('settings')->insert([
                        'key' => 'penalty_minutes',
                        'value' => '5',
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }
        });
    }
};
