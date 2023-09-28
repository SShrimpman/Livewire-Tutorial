<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Rule;
use Livewire\WithFileUploads;
use App\Livewire\Forms\ContactUsForm;

class ContactUs extends Component
{
    public ContactUsForm $form;

    public function submitForm() {
        $this->form->validate();

        
        // sending email
        $this->form->sendEmail();
        session()->flash('success', 'form submitted!');

        $this->form->reset();
    }

    public function render()
    {
        return view('livewire.contact-us');
    }
}
