<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactForm;

class Webform extends Component
{
    public $name;
    public $email;
    public $whatsapp;
    public $message;
    public $show = false;

    #[On('open-form')]
    public function showWebform()
    {
        $this->show = true;
    }

    #[On('close-form')]
    public function hidenWebform()
    {
        $this->show = false;
    }

    protected $rules = [
        'name' => 'required|string|min:3|max:50',
        'email' => 'required|email',
        'whatsapp' => 'nullable|string|min:10|max:500',
        'message' => 'required|string|min:10|max:500',
    ];

    public function submitForm()
    {
        $this->validate();

        // Handle form submission (e.g., save to the database or send an email)
        // Example: Sending an email
        Mail::to('admin@example.com')->send(
            new ContactForm($this->name, $this->email, $this->whatsapp, $this->message)
        );

        // Reset fields and provide feedback
        $this->reset();
        session()->flash('success', 'Your message has been sent successfully!');
    }

    public function render()
    {
        return view('livewire.partials.webform');
    }
}
