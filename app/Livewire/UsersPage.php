<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]
#[Title('Laravel Users')]
class UsersPage extends Component
{
    public User $user;

    // Esta maneira é a maneira que tenho que usar se usar o mount(), caso não use, apenas como tenho em cima é suficiente para renderizar o que preciso

    // public $user;

    // public function mount(User $user) {
    //     $this->user = $user;
    // }

    // Se eu quiser também posso remover este render que renderiza na mesma
    // public function render()
    // {
    //     return view('livewire.users-page');
    // }
}
