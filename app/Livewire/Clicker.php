<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class Clicker extends Component
{
    public $username = "testuser";

    public function createNewUser() {
        User::create([
            'name' => 'test user 2',
            'email' => 'test2@test.com',
            'password' => 'test'
        ]);
    }

    public function render()
    {
        $title = "Test";

        $users = User::all();

        // This is another way of sending the variables i create here to the views
        // return view('livewire.clicker', compact('title'));

        return view('livewire.clicker', [
            'title' => $title,
            'users' => $users
        ]);
    }
}
