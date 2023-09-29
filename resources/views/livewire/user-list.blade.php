{{-- Se quiser definir um tempo para atualizar de x em x tempo, posso fazer:
    <div wire:poll.10s ></div>
    Neste caso ele vai atualizar de 10 em 10 segundos
    Se quiser que ele se mantenha sempre vivo, mesmo quando estou numa página que não a do programa, posso fazer:
    <div wire:poll.keep-alive ></div>
    Se eu quiser que ele atualize apenas quando este component estiver vísivel, apenas tenho que fazer:
    <div wire:poll.visible ></div> --}}
<div>
    {{-- <div class="container content py-28 mx-auto">
        <div class="shadow-2xl">
            <div class="grid grid-cols-3 mx-auto gap-3 bg-gray-700 p-3 rounded-t-lg text-white">
                <div>Name</div>
                <div>Email</div>
                <div>Joined</div>
            </div>
            <div class="grid grid-cols-3 mx-auto gap-6 bg-gray-800 p-3 rounded-b-lg text-white">
                @foreach ($users as $user)
                <div>{{ $user->name }}</div>
                <div>{{ $user->email }}</div>
                <div>{{ $user->created_at }}</div>
                @endforeach
            </div>
        </div>
        <div class="mt-2">
            {{ $users->links() }}
        </div>
    </div> --}}
    {{-- <div class="container content py-28 mx-auto">
        <div class="flex items-center w-[500px] mx-auto mb-2 space-x-2">
            <div class="text-white text-3xl">Users List</div>
            <div class="px-3 py-1 bg-teal-500 text-white font-semibold rounded-3xl hover:bg-teal-600">{{ $count }}</div>
        </div>
        <div class="bg-gray-700 mx-auto w-[500px] rounded">
            <div class="grid grid-cols-2 gap-3 p-3 text-white">
                @foreach ($users as $user)
                    <div class="py-5">
                        <div class="text-xl font-bold">{{ $user->name }}</div>
                        <div class="text-gray-200 text-sm">{{ $user->email }}</div>
                    </div>
                    <div class="flex justify-end items-center">
                        <button wire:click='update' class="mt-3 px-4 py-2 bg-teal-500 text-white font-semibold rounded-3xl hover:bg-teal-600">View</button>
                    </div>
                @endforeach
            </div>
        </div>
    </div> --}}
    <div class="container content py-12 mx-auto">
        <div class="w-[500px] mx-auto mb-3">

            <div wire:offline>
                <div wire:offline.class='bg-red-900' wire:offline.class.remove='bg-gray-800' class="flex items-center p-4 mb-4 text-sm rounded-lg bg-gray-800 text-yellow-300" role="alert">
                    <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                    </svg>
                    <span class="sr-only">Info</span>
                    <div>
                        <span class="font-medium">Warning alert!</span> Change a few things up and try submitting again.
                    </div>
                </div>
            </div>

            <div class="text-white text-3xl mb-2">Users List</div>
            {{--  Com o .live ele vai fazer um request a cada caractér introduzido no input
                    wire:model.live='search'
                  Com o .blur, evito imensas requests ao servidor (1 por cada caractér introduzido) e só faço 1 request após clicar fora do input, quando clico nele e escrevo
                  ele está ativo, quando clico fora fica 'desativo' e é aí que a call é feita
                    wire:model.live.blur='search'
                  Com o .debounce eu espero que o utilizador pare de escrever para fazer o request, e posso definir o tempo de espera antes de fazer o request quando para de 
                  escrever porque existem utilizadores mais lentos a escrever, então definir um tempo/delay é bom para evitar muitos requests na mesma
                    wire:model.live.debounce.500ms='search'
                  O .throttle vai fazeer um request a cada letra na mesma, no entanto se definir um tempo/delay, esse tempo vai ser o intervalo entre cada request, neste caso
                  eu faço um request quando escrevo um caractér e quando escrevo outro, o request só vai acontecer após 300ms
                    wire:model.live.throttle.300ms='search'--}}
            <input wire:offline.remove wire:model.live.debounce.500ms='search' type="text" placeholder="Search..." class="w-full text-sm rounded p-2.5 bg-gray-300">
            {{-- <button wire:click='update' class="mt-3 px-4 py-2 bg-teal-500 text-white font-semibold rounded hover:bg-teal-600">Update</button> --}}
        </div>
        <div class="bg-gray-700 mx-auto w-[500px] rounded">
            {{-- @foreach ($users as $user) --}}
            @foreach ($this->users as $user)
                <div wire:key='{{ $user->id }}' class="grid grid-cols-2 gap-3 p-3 text-white">
                    <div class="py-5">
                        <div class="text-xl font-bold">{{ $user->name }}</div>
                        <div class="text-gray-200 text-sm">{{ $user->email }}</div>
                    </div>
                    <div class="flex justify-end items-center">
                        <button wire:offline.attr='disabled' wire:offline.class='bg-gray-500 text-black' wire:offline.class.remove='bg-teal-500 hover:bg-teal-600 text-white' wire:click='viewUser({{ $user }})' class="mt-3 px-4 py-1.5 bg-teal-500 text-white font-semibold rounded-full hover:bg-teal-600">View</button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    @if ($selectedUser)
        <x-modal name="user-details" title="View User">
            <x-slot:body>
                <span class="text-white">
                    Name : {{ $selectedUser->name }}
                </span>
                <br>
                <span class="text-white">
                    Email : {{ $selectedUser->email }}
                </span>
            </x-slot>
        </x-modal>
    @endif
</div>