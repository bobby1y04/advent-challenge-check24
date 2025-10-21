<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function Laravel\Prompts\table;

class ChallengeController extends Controller
{
    public function show(string $slug) {
        $challenge = DB::table('challenges')->where('slug', $slug)->firstOrFail();

        $userId = request()->session()->get('user_id');
        $p1Solved = false;
        if ($userId) {
            $p1Solved = (bool) DB::table('scores')
                ->where(['user_id' => $userId, 'challenge_id' => $challenge->id])
                ->value('part1_time_ms');
        }
        return view('challenge', compact('challenge', 'p1Solved'));
    }

    public function submit(Request $request, string $slug) {
        $challenge = DB::table('challenges')->where('slug', $slug)->firstOrFail();
        $data = $request->validate([
           'part' => ['required', 'in:1,2'],
           'answer' => ['required', 'string', 'max:2000'],
        ]);

        $part = (int) $data['part'];

        $userId = $request->session()->get('user_id');

        if ($part === 2) {
            $p1Solved = (bool) DB::table('scores')
                ->where(['user_id' => $userId, 'challenge_id' => $challenge->id])
                ->value('part1_time_ms');

            if (!$p1Solved) {
                return back()
                    ->withErrors(['part' => 'Part 2 ist erst verfügbar, wenn Part 1 korrekt ist.'])
                    ->withInput();
            }
        }

        // Einfacher Checker für die Demo
        $expected = $part == 1 ? '42' : '84';
        $isCorrect = trim($data['answer']) === $expected;

        DB::table('submissions')->insert([
            'user_id' => $userId,
            'challenge_id' => $challenge->id,
            'part' => $part,
            'answer_text' => $data['answer'],
            'is_correct' => $isCorrect,
            'created_at' => now(), 'updated_at' => now(),
        ]);

        if ($isCorrect) {
            $this->recordSuccess($userId, $challenge->id, (int) $part);
        }

        return back()->with('status', $isCorrect ? 'correct' : 'incorrect')->withInput();
    }

    private function recordSuccess(int $userId, int $challengeId, int $part) : void {
        $start = \Carbon\Carbon::parse(DB::table('settings')->where('key', 'event_start')->value('value') ?? now());
        $elapsed = now()->diffInMilliseconds($start);

        $score = DB::table('scores')->where(['user_id' => $userId, 'challenge_id' => $challengeId])->first();
        $set = [];
        if ($part === 1 && (!$score || !$score->part1_time_ms)) $set += ['part1_time_ms' => $elapsed];

        if ($part === 2 && (!$score || !$score->part2_time_ms)) {
            $elapsedForPart2 = $elapsed - ($score->part1_time_ms ?? 0);
            $set += [
                'part2_time_ms'   => $elapsedForPart2,
            ];
        }

        if ($score) {
            DB::table('scores')->where('id', $score->id)->update($set + [
                'total_time_ms' => ($set['part1_time_ms'] ?? $score->part1_time_ms) + ($set['part2_time_ms'] ?? $score->part2_time_ms),
                    'updated_at' => now(),
                ]);
        } else {
            DB::table('scores')->insert($set + [
                'user_id' => $userId, 'challenge_id' => $challengeId,
                'total_time_ms' => ($set['part1_time_ms'] ?? null) && ($set['part2_time_ms'] ?? null)
                                    ? $set['part1_time_ms'] + $set['part2_time_ms'] : null,
                    'created_at' => now(), 'updated_at' => now(),
                ]);
        }
    }
}
