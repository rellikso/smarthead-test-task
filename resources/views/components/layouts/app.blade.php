<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Отправка тикета</title>

    <!-- Tailwind CSS (под основную тему проекта) -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.2/dist/tailwind.min.css" rel="stylesheet">

    <!-- Livewire Styles -->
    @livewireStyles

    <style>
        body {
            font-family: 'Inter', sans-serif; /* основной шрифт проекта */
        }
        .widget-button {
            background-color: #1d4ed8; /* основной синий */
            color: #fff;
        }
        .widget-button:hover {
            background-color: #2563eb;
        }
        .widget-form {
            border: 1px solid #e5e7eb;
            background-color: #ffffff;
            border-radius: 0.5rem;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body class="bg-gray-50 p-6">
    {{ $slot }}
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

    @livewireScripts
</body>
</html>
