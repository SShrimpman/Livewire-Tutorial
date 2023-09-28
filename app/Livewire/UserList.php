<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithPagination;

class UserList extends Component
{
    use WithPagination;

    public $search;

    // #[On('user-created')]
    // public function updateList($user = null) {
    // }

    // public function placeholder(){
    //     return view('placeholder');
    // }

    public function update() {
        
    }

    public function render()
    {
        
        // sleep(2);
        // return view('livewire.user-list', [
        //     'users' => User::latest()->paginate(3)
        // ]);

        // sleep(3);
        // return view('livewire.user-list', [
        //     'users' => User::latest()->paginate(5),
        //     'count' => User::count(),
        // ]);

        return view('livewire.user-list', [
            'users' => User::latest()
            ->where('name', 'like', "%{$this->search}%")
            ->paginate(5),
        ]);
    }
}
