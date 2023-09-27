<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithPagination;

class UserList extends Component
{
    use WithPagination;

    #[On('user-created')]
    public function updateList($user = null) {

    }

    public function render()
    {
        return view('livewire.user-list', [
            'users' => User::latest()->paginate(2)
        ]);
    }
}
