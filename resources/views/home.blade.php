<!DOCTYPE html>
<html lang="en" class="antialiased">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hidenda CRUD Application</title>

    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    @livewireStyles

    <!-- Optional: Add some custom font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>
<body class="bg-gray-50 font-inter text-gray-900">
<!-- Responsive Navigation -->
<nav class="bg-gradient-to-r from-blue-600 to-purple-600 shadow-md">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            <div class="flex items-center">
                <a href="/" class="text-white text-2xl font-bold tracking-wider hover:text-gray-200 transition">
                    Hidenda CRUD
                </a>
            </div>
        </div>
    </div>
</nav>

<main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="bg-white shadow-xl rounded-lg overflow-hidden">
        @livewire('test-table')
    </div>
</main>

@livewireScripts

</body>
</html>
