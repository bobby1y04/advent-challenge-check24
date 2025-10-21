{{-- resources/views/leaderboard.blade.php --}}
    <!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Leaderboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @vite(['resources/css/style.css'])
</head>
<body class="min-h-screen bg-slate-900 text-slate-100 p-8">
<div class="max-w-4xl mx-auto space-y-6">
    <div class="flex items-center justify-between">
        <h1 class="title">Leaderboard</h1>
    </div>

    <table class="w-full text-left text-sm border-separate border-spacing-y-1">
        <thead class="text-slate-300">
        <tr>
            <th class="px-3 py-2">#</th>
            <th class="px-3 py-2">User</th>
            <th class="px-3 py-2">Part 1</th>
            <th class="px-3 py-2">Part 2</th>
            <th class="px-3 py-2">Total</th>
        </tr>
        </thead>
        <tbody>
        @php
            $rank = 1;
            $fmt = function($ms) {
              if ($ms === null) return '—';
              if ($ms < 0) $ms *= -1;

              $totalSeconds = (int) floor($ms/1000);
              $hours = intdiv($totalSeconds, 3600);
              $minutes = intdiv($totalSeconds % 3600, 60);
              $seconds = $totalSeconds % 60;
              return sprintf('%02d:%02d:%02d', $hours, $minutes, $seconds);
            };
        @endphp

        @foreach ($rows as $r)
            <tr class="rounded-md {{ $loop->index % 2 ? 'bg-slate-800/50' : 'bg-slate-800/30' }} {{ $loop->index === 0 ? 'outline-1 outline-emerald-700/50' : '' }}">
                <td class="px-3 py-2 align-middle">{{ $rank++ }}</td>
                <td class="px-3 py-2 align-middle {{ (optional(auth()->user())->id ?? session('user_id')) && $r->username === session('username') ? 'font-semibold text-emerald-300' : '' }}">
                    {{ $r->username }}
                </td>
                <td class="px-3 py-2 align-middle">{{ $fmt($r->part1_time_ms) }}</td>
                <td class="px-3 py-2 align-middle">{{ $fmt($r->part2_time_ms) }}</td>
                <td class="px-3 py-2 align-middle">{{ $fmt($r->total_time_ms) }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</body>
</html>
