<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\WithPagination;
use Livewire\Attributes\Computed;

class UserList extends Component
{
    use WithPagination;

    // #[Url( as : 's' )] Posso definir o nome que aparece no url, em vez de aparecer o 'search=test' que tinha definido, com isto aparecer 's=test'
    // #[Url( keep : true )] Com o keep o meu url vai ter sempre o '?search=' até mesmo quando ainda nem procurei nada
    #[Url( history: true )] // Com o history a página já não dá reload se eu voltar para a anterior ou posterior, armazena os resultados e dá display
    public $search = '';

    public User $selectedUser;

    // #[On('user-created')]
    // public function updateList($user = null) {
    // }

    // public function placeholder(){
    //     return view('placeholder');
    // }

    // public function mount($search) {
    //     $this->search = $search;
    // }

    public function viewUser(User $user) {
        $this->selectedUser = $user;

        $this->dispatch('open-modal', name: 'user-details');
    }

    // #[Computed(persist:true,seconds:3600)] Isto é para persistir e manter em cache e não alterar aquilo que vejo inicialmente quando o componente é montado na view
    #[Computed()]
    public function users() {
        return User::latest()
        ->where('name', 'like', "%{$this->search}%")
        ->paginate(5);
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
            // 'users' => User::latest()
            // ->where('name', 'like', "%{$this->search}%")
            // ->paginate(5),
        ]);
    }
}
