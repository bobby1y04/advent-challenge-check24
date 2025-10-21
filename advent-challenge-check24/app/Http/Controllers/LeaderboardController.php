<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class LeaderboardController extends Controller
{
    public function index() {
        // Users with at least one solved part; NULL total_time_ms goes last
        $rows = DB::table('scores')
            ->join('users', 'users.id', '=', 'scores.user_id')
            ->select('users.username',
                'scores.part1_time_ms',
                'scores.part2_time_ms',
                DB::raw('COALESCE(scores.total_time_ms, scores.part1_time_ms + scores.part2_time_ms) AS total_time_ms')
            )
            ->orderByRaw('total_time_ms IS NULL, total_time_ms DESC') // SQLite: NULLs last
            ->limit(100)
            ->get();

        return view('leaderboard', ['rows' => $rows]);
    }
}
