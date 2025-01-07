<!-- resources/views/components/layouts/app.blade.php -->
<!DOCTYPE html>
<html>

<head>
    <title>Subscription CRUD</title>
    <!-- Custom styles for this template -->
    <link href="{{asset('storage/css/sb-admin-2.min.css')}}" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="{{asset('storage/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
    @livewireStyles
</head>

<body>
    <div>
        {{ $slot }}
    </div>
    <script>
        Livewire.on('toggleDefault', id => {
            Livewire.emit('toggleDefault', id);
        });
    </script>

    <script src="js/sb-admin-2.min.js"></script>

    @livewireScripts
</body>

</html>
