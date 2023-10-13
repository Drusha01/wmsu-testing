<?php

namespace App\Http\Livewire\Components\Header;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HeaderNavigation2 extends Component
{
    public $user_details;
    public $user_status;
    public function mount(Request $request){
        $this->user_details = $request->session()->all();
        $this->user_status = DB::table('users as u')
        ->select('u.user_status_id','us.user_status_details')
        ->join('user_status as us', 'u.user_status_id', '=', 'us.user_status_id')
        ->where('user_id','=', $this->user_details['user_id'])
        ->get()
        ->toArray();
    }
    public function render()
    {
        return view('livewire.components.header.header-navigation2');
    }
}
