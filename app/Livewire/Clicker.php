<?php

namespace App\Livewire;


use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;

class Clicker extends Component
{
    // Este era o método novo para se fazer as validações, o antigo é o que está a ser usado dentro do createNewUser. O Novo método pode ser usado a partir do PHP ver.8.1
    // #[Rule('required|min|max:50')]
    // public $name = '';

    // #[Rule('required|email|unique:users')]
    // public $email = '';

    // #[Rule('required|min:5')]
    // public $password = '';

    public $name = '';
    public $email = '';
    public $password = '';

    public function createNewUser() {
        // $this->validate();
        $validated = $this->validate([
            'name' => 'required|min:2|',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5'
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password'])
        ]);

        $this->reset(['name', 'email', 'password']);

        request()->session()->flash('success', 'User Created Successfully!');
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
