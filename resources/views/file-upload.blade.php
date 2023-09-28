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
    {{-- <div id="content">
        @livewire('registerform')
    </div> --}}
    <div class="flex">
        <div class="w-2/4 mx-auto pt-10">
            @livewire('userlist', ['lazy' => true])
        </div>
    </div>
</body>

</html>