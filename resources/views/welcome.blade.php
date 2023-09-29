<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
        {{-- <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script> --}}
        @vite('resources/css/app.css')
        {{-- @livewireStyles --}}
    </head>
    {{-- <body class="bg-gray-900"> --}}
    <body class="bg-gray-900 p-5">

        {{-- Isto é outra maneira de chamar um component com o livewire
        <livewire:clicker /> --}}

        {{-- Isto é a maneira como eu chamo um component com o livewire --}}
        {{-- <div class="bg-gray-900 h-screen">
            @livewire('clicker')
        </div> --}}


        {{-- Esta é a div que pertence ao CRUD --}}
        {{-- <div id="head" class="flex border-blue-800 border-t-2">
            <div class="w-full">
                <header class="flex bg-white dark:bg-gray-900 justify-between h-20 border-b border-b-gray-200 items-center px-6">
                    <div id="left-header" class="">
                    </div>
                    <div id="right-header" class="text-gray-800 dark:text-white hover:text-gray-500 space-x-3">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-7 h-7">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </div>
                </header>
            </div>
        </div>
        <div id="content" class="mx-auto" style="max-width:500px;">
            @livewire('todoList')
        </div> --}}

        {{-- <div id="content">
            @livewire('registerform')
        </div> --}}
        
        {{-- <div class="flex">
            <div class="w-2/4 mx-auto pt-10">
                Com o lazy é uma forma de eu fazer lazy loading se tiver definido "sleep()" no meu controller/component
                @livewire('userlist', ['lazy' => true]) 
                <livewire:user-list search="prof">
                Também posso usar a sintaxe antiga : @livewire('user-list', ['search'=>'prof'])
                    <livewire:user-list>
            </div>
        </div> --}}

        {{-- <div>
            <livewire:contact-us >
        </div> --}}


        {{-- <div class="flex">
            <div class="w-2/4 mx-auto pt-10">
                <x-modal name="1" title="modal 1">
                    <x-slot:body>
                        <livewire:register-form />
                    </x-slot>
                </x-modal>

                <button x-data @click="$dispatch('open-modal', { name: '1' })" class="px-3 py-1 bg-teal-500 hover:bg-teal-600 text-white text-xs rounded">Modal 1</button>

                <x-modal name="2" title="modal 2">
                    <x-slot:body>
                        Modal 2
                    </x-slot>
                </x-modal>

                <button x-data @click="$dispatch('open-modal', { name: '2' })" class="px-3 py-1 bg-blue-500 hover:bg-blue-600 text-white text-xs rounded">Modal 2</button>
            </div>
        </div> --}}

        <livewire:user-list>

        @livewireScripts
    </body>
</html>
