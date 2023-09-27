<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Form</title>
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
    @vite('resources/css/app.css')
</head>

<body class="dark:bg-gray-900">
    <div id="content" class="grid grid-cols-2">
        @livewire('userlist')
        @livewire('registerform')
    </div>
</body>

</html>