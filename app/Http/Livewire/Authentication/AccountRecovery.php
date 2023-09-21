<?php

namespace App\Http\Livewire\Authentication;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AccountRecovery extends Component
{
    public $hash;
    public function mount($hash){
        $this->$hash = $hash;
        dd('not found');
    }
    public function render()
    {
        return view('livewire.authentication.account-recovery');
    }
}
