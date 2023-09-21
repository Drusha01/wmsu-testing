<?php

namespace App\Http\Livewire\Authentication;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ForgotPassword extends Component
{
    public $email;
    protected $rules = [
        'email' => 'required|email',
    ];
    public function render()
    {
        return view('livewire.authentication.forgot-password');
    }
    public function recover_account(Request $request){
        $data = $request->session()->all();
        $this->validate();
        dd('mnice');
        if(!isset($data['user_id'])){ 
            dd('nice');
        }

    }
}
