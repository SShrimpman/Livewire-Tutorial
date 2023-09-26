<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class Clicker extends Component
{
    public $name;
    public $email;
    public $password;

    public function createNewUser() {
        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password
        ]);
    }

    public function render()
    {
        $users = User::all();

        // This is another way of sending the variables i create here to the views
        // return view('livewire.clicker', compact('title'));

        return view('livewire.clicker', [
            'users' => $users
        ]);
    }
}
