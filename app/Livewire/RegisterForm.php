<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Rule;
use Livewire\WithFileUploads;

class RegisterForm extends Component
{
    use WithFileUploads;

    #[Rule('required|min:2|max:100')]
    public $name;
    
    #[Rule('required|min:5|email|max:255|unique:users')]
    public $email;
    
    #[Rule('required|min:5')]
    public $password;

    #[Rule('nullable|sometimes|image|max:1024')]
    public $image;

    public function create() {
        sleep(2);

        $validated = $this->validate();

        if($this->image){
            $validated['image'] = $this->image->store('uploads', 'public');
        }

        User::create($validated);

        $this->reset(['name', 'email', 'password']);

        session()->flash('success', 'User Created!');
    }

    public function render()
    {
        return view('livewire.register-form');
    }
}
