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

    <p class="mt-6">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vel iaculis dui. In varius nunc nec lorem viverra, a tincidunt lorem malesuada. Nam sed tempus dolor. Nunc quis eros sit amet est commodo aliquet ac sollicitudin eros. Vestibulum imperdiet, nisl at porttitor auctor, magna enim rhoncus neque, eu tempor augue enim sit amet lorem. Proin ultricies quam eu diam sollicitudin, sit amet condimentum dolor placerat. In nisi tellus, sodales in sodales in, faucibus eget ligula. Maecenas sit amet imperdiet tortor, id aliquam massa. Ut ipsum nibh, pretium nec nunc at, posuere rutrum magna. Nunc vehicula porttitor felis a sagittis. Curabitur sodales sapien ac massa sodales, sed euismod ipsum pulvinar. Nullam risus neque, commodo at arcu ac, cursus pellentesque odio. Ut ut enim mi. Nam vehicula dictum ipsum, sed sodales est elementum id.

        Donec eu augue aliquet nisi lacinia dapibus. Suspendisse a porta sapien. Cras porta odio rutrum, euismod quam quis, volutpat ipsum. Vestibulum porta mattis nulla ac porta. Praesent ac elit in augue lobortis ultricies. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Sed iaculis vestibulum dolor, at consequat enim. Ut arcu felis, egestas et scelerisque sed, volutpat non quam. Aenean vehicula dui odio, eu tristique tellus condimentum at.
    </p>
</div>
<div class="sidebar-embed" style="display: flex; flex-direction: column;">
    <iframe src="{{ route('leaderboard') }}" class="w-full h-full sidebar-frame" style="height: 100%; flex: 1 1 auto;"></iframe>
<script>
    (function(){
        if (!document.body.classList.contains('has-left-sidebar')) {
            document.body.classList.add('has-left-sidebar');
        }
    })();
</script>
</div>
</body>
</html>
