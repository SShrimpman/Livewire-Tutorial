{{-- Se quiser definir um tempo para atualizar de x em x tempo, posso fazer:
    <div wire:poll.10s ></div>
    Neste caso ele vai atualizar de 10 em 10 segundos
    Se quiser que ele se mantenha sempre vivo, mesmo quando estou numa página que não a do programa, posso fazer:
    <div wire:poll.keep-alive ></div>
    Se eu quiser que ele atualize apenas quando este component estiver vísivel, apenas tenho que fazer:
    <div wire:poll.visible ></div> --}}
<div wire:poll>
    <div class="container content py-28 mx-auto">
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
    </div>
</div>