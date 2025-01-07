<!-- resources/views/components/layouts/app.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Subscription CRUD</title>
    @livewireStyles
</head>
<body>
    <div>
        {{ $slot }}
    </div>
    @livewireScripts
</body>
</html>
