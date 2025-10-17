<!doctype html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lobby</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @vite(['resources/css/style.css'])
</head>
<body class="min-h-screen bg-slate-900 text-slate-100 p-8">
<div class="max-w-3xl mx-auto">
    <div class="flex items-start justify-between">
        <div>
            <h1 class="text-2xl font-semibold tracking-wide text-slate-200">Herzlich Willkommen, {{ session('username') }}, zur</h1>
            <h1 class="title mt-1">CHECK24 Advent Challenge 2025🎄☃️</h1>
        </div>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="text-sm text-slate-300 border border-slate-600 px-3 py-1 rounded-md hover:bg-slate-800">
                Logout
            </button>
        </form>
    </div>

    <p class="mt-6">Checkst du?</p>
</div>
</body>
</html>
