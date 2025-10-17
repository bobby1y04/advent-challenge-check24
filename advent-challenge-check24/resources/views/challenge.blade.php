<!doctype html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $challenge->title }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @vite(['resources/css/style.css'])
</head>
<body class="min-h-screen bg-slate-900 text-slate-100 p-8">
<div class="max-w-3xl mx-auto space-y-6">
    <div class="flex items-start justify-between">
        <div>
            <h2 class="text-xl text-slate-300">Aufgabe</h2>
            <h1 class="title">{{ $challenge->title }}</h1>
        </div>
        <a href="{{ route('lobby') }}" class="text-sm text-slate-300 border border-slate-600 px-3 py-1 rounded-md">Zurück</a>
    </div>

    <article class="prose prose-invert">
        {!! Str::markdown($challenge->statement_md) !!}
    </article>

    <form method="POST" action="{{ route('challenge.submit', $challenge->slug) }}" class="space-y-4">
        @csrf
        <div class="flex gap-3">
            <select name="part" class="bg-slate-800 border border-slate-700 rounded-md px-3 py-2">
                <option value="1">Part 1</option>
                <option value="2">Part 2</option>
            </select>
            <input name="answer" placeholder="Deine Antwort" class="flex-1 bg-slate-800 border border-slate-700 rounded-md px-3 py-2" required>
            <button class="bg-emerald-600 hover:bg-emerald-500 rounded-md px-4 py-2">Submit</button>
        </div>
        @if (session('status') === 'correct')
            <p class="text-emerald-400">✅ Korrekt!</p>
        @elseif (session('status') === 'incorrect')
            <p class="text-red-400">❌ Leider falsch.</p>
        @endif
        @error('answer')<p class="text-red-400">{{ $message }}</p>@enderror
    </form>
</div>
</body>
</html>
