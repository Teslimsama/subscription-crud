<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subscriptions</title>
    @livewireStyles
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class="container mx-auto py-10">
        {{-- @yield('content') --}}
        <div class="add_table">
                <a href="{{ route('subscriptions.create') }}"
                    class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-700">Add</a>
                    
            </div>
      {{ $slot }}
    </div>
    @livewireScripts
</body>
</html>
