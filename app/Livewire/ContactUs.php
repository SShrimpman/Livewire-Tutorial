<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Rule;
use Livewire\WithFileUploads;
use App\Livewire\Forms\ContactUsForm;

class ContactUs extends Component
{
    use WithFileUploads;

    // public ContactUsForm $form;

    // Este 'as :' é para substituir o nome que vai aparecer em baixo, em vez de dizer "The email field is required" agora diz "The company email field is required"
    #[Rule('required|email|max:255', as: 'company email')]
    public $email;

    #[Rule('required|min:3|max:255')]
    public $subject;
    
    #[Rule('required|min:3|max:255')]
    public $message;

    #[Rule('required')]
    #[Rule(['images.*'=>'image|max:2048'])]
    public $images;

    public function submitForm() {
        // $this->form->validate();
        $this->validate();

        if(is_array($this->images)) {
            foreach($this->images as $image) {
                $image->store('images', 'public');
            }
        }
        
        // // sending email
        // $this->form->sendEmail();
        session()->flash('success', 'form submitted!');

        $this->reset();
        // $this->form->reset();
    }

    public function render()
    {
        return view('livewire.contact-us');
    }
}