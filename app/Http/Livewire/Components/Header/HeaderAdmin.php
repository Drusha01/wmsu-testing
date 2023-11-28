<?php

namespace App\Http\Livewire\Components\Header;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HeaderAdmin extends Component
{
    public $user_details;
    public function mount(Request $request){
        $user_details = $request->session()->all();
        if(isset($user_details['user_id'])){
            $this->user_details = DB::table('users as u')
            ->select(
                'u.user_status_id',
                'us.user_status_details',
                 'ur.user_role_id',
                  'ur.user_role_details',
                  'u.user_profile_picture',
                  'u.user_firstname',
                  'u.user_lastname',
                  'u.user_middlename',
                  'u.user_suffix')
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
                'user_profile_picture' =>$this->user_details->user_profile_picture,
                'user_firstname' =>$this->user_details->user_firstname,
                'user_middlename' =>$this->user_details->user_middlename,
                'user_lastname' =>$this->user_details->user_lastname,
                'user_suffix' =>$this->user_details->user_suffix,
               
            ];

        }
    }
    public function render()
    {
        return view('livewire.components.header.header-admin');
    }
}
