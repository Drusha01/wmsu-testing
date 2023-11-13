<?php

namespace App\Http\Livewire\Components\Header;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HeaderNavigation extends Component
{
    public $user_details;
    public $user_status;
    public function mount(Request $request){
        $this->user_details = $request->session()->all();
        if(isset($this->user_details['user_id'])){
            $this->user_status = DB::table('users as u')
            ->select('u.user_status_id','us.user_status_details', 'ur.user_role_id', 'ur.user_role_details')
            ->join('user_status as us', 'u.user_status_id', '=', 'us.user_status_id')
            ->join('user_roles as ur', 'u.user_role_id', '=', 'ur.user_role_id')
            ->where('user_id','=', $this->user_details['user_id'])
            ->get()
            ->toArray();
            
        }
       
    }
    public function render()
    {
        return view('livewire.components.header.header-navigation');
    }
}
