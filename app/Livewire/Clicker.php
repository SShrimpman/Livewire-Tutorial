<?php

namespace App\Livewire;


use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Rule;
use Illuminate\Support\Facades\Hash;

class Clicker extends Component
{
    use WithPagination;

    #[Rule('required|min:2|max:100')]
    public $name = '';
    
    #[Rule('required|min:5|email|max:255|unique:users')]
    public $email = '';
    
    #[Rule('required|min:5')]
    public $password = '';
    
    // public $name = '';
    // public $email = '';
    // public $password = '';
    
    public function createNewUser() {
        $validated = $this->validate();
        // Este era o método antigo para se fazer as validações, o novo é o que está a ser usado acima. O Novo método pode ser usado a partir do PHP ver.8.1
        // $validated = $this->validate([
        //     'name' => 'required|min:2|',
        //     'email' => 'required|email|unique:users',
        //     'password' => 'required|min:5'
        // ]);

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
        $users = User::paginate(5);

        // This is another way of sending the variables i create here to the views
        // return view('livewire.clicker', compact('title'));

        return view('livewire.clicker', [
            'users' => $users
        ]);
    }
}
