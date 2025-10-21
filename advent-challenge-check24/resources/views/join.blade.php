<!doctype html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CHECK24 Advent Challenge</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @vite(['resources/css/style.css'])
</head>
<body class="min-h-screen bg-slate-900 text-slate-100 flex items-center justify-center p-6">
<div class="w-full max-w-lg bg-slate-800/60 backdrop-blur rounded-xl p-6 shadow-lg">
    <h1 class="title text-center whitespace-nowrap">CHECK24 Advent Challenge🎄☃️</h1>

    <form method="POST" action="{{ route('join.post') }}" class="space-y-4">
        @csrf

        <div>
            <label class="block text-sm mb-1" for="username">Username</label>
            <input id="username" name="username" value="{{ old('username') }}" required
                   class="w-full rounded-md bg-slate-900 border border-slate-700 px-3 py-2 focus:outline-none focus:ring">
            @error('username')<p class="text-red-400 text-sm mt-1">{{ $message }}</p>@enderror
        </div>

        <div>
            <label class="block text-sm mb-1" for="event_code">Event-Code</label>
            <input id="event_code" name="event_code" value="{{ old('event_code') }}" required
                   class="w-full rounded-md bg-slate-900 border border-slate-700 px-3 py-2 focus:outline-none focus:ring">
            @error('event_code')<p class="text-red-400 text-sm mt-1">{{ $message }}</p>@enderror
        </div>

        <button type="submit"
                class="btn-primary btn-block">
            Join
        </button>
    </form>

    <p class="mt-4 text-xs text-slate-400">
        Hinweis: Deine Session wird lokal gespeichert – keine Passwörter erforderlich.
    </p>
</div>
</body>
</html>
