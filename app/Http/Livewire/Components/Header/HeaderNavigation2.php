<?php

namespace App\Http\Livewire\Components\Header;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HeaderNavigation2 extends Component
{
    public $user_details;
    public function mount(Request $request){
        $this->user_details = $request->session()->all();
    }
    public function render()
    {
        return view('livewire.components.header.header-navigation2');
    }
}
