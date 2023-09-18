<?php

namespace App\Http\Livewire\Authentication;

use Livewire\Component;

class Login extends Component
{
    public $title = 'Login';


    public function render()
    {
        return view('livewire.authentication.login');
    }
}
