<div>
    <div class="container content py-28 mx-auto shadow-2xl" style="max-width:600px;">
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

        <div class="mt-2">
            {{ $users->links() }}
        </div>
    </div>
</div>