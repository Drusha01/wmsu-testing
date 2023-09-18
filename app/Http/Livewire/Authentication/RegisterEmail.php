<?php

namespace App\Http\Livewire\Authentication;

use Livewire\Component;

class RegisterEmail extends Component
{
    public $email;
    public function render()
    {
        return view('livewire.authentication.register-email');
    }

    public function send_verification_code(){
        // check if we are logged in
        // validate email
        // check if we have account in database
        // send code
        // verify code // only five times
        dd('ni');
    }
}
