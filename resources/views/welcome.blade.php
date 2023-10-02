<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
        {{-- <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script> --}}
        @vite('resources/css/app.css')
        @livewireStyles
    </head>
    <body class="bg-gray-900">

        {{-- Isto é outra maneira de chamar um component com o livewire
        <livewire:clicker /> --}}

        {{-- Isto é a maneira como eu chamo um component com o livewire --}}
        {{-- <div class="bg-gray-900 h-screen">
            @livewire('clicker')
        </div> --}}

        <div id="content" class="mt-28">
            @livewire('registerform')
        </div>
        
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
            <livewire:contact-us />
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

        {{-- <livewire:user-list> --}}

        @livewireScripts
    </body>
</html>
