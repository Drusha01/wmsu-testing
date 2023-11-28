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
        $user_details = $request->session()->all();
        if(isset($user_details['user_id'])){
            $this->user_details = DB::table('users as u')
            ->select('u.user_status_id','us.user_status_details', 'ur.user_role_id', 'ur.user_role_details','u.user_profile_picture')
            ->join('user_status as us', 'u.user_status_id', '=', 'us.user_status_id')
            ->join('user_roles as ur', 'u.user_role_id', '=', 'ur.user_role_id')
            ->where('user_id','=', $user_details['user_id'])
            ->first();

            $this->user_details = [
                'user_id' =>$user_details['user_id'],
                'user_status_id' => $this->user_details->user_status_id,
                'user_status_details' => $this->user_details->user_status_details,
                'user_role_id' => $this->user_details->user_role_id,
                'user_role_details' => $this->user_details->user_role_details,
                'user_profile_picture' =>$this->user_details->user_profile_picture
               
            ];

        }
       
    }
    public function render()
    {
        return view('livewire.components.header.header-navigation');
    }
}
