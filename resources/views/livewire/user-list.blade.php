{{-- Se quiser definir um tempo para atualizar de x em x tempo, posso fazer:
    <div wire:poll.10s ></div>
    Neste caso ele vai atualizar de 10 em 10 segundos
    Se quiser que ele se mantenha sempre vivo, mesmo quando estou numa página que não a do programa, posso fazer:
    <div wire:poll.keep-alive ></div>
    Se eu quiser que ele atualize apenas quando este component estiver vísivel, apenas tenho que fazer:
    <div wire:poll.visible ></div> --}}
<div wire:poll>
    <div class="container content py-28 mx-auto">
        {{-- <div class="shadow-2xl">
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
        </div> --}}
        
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
            {{-- <div class="mt-2">
            {{ $users->links() }}
        </div> --}}
    </div>
</div>