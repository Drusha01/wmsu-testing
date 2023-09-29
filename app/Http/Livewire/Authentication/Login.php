<?php

namespace App\Http\Livewire\Authentication;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class Login extends Component
{
    public $title;
    public $active;
    
    public $username;
    public $password;

    public function mount(){
        $this->title = 'Login';
        $this->active = 'Login';
    }

    public function render()
    {
        return view('livewire.authentication.login',[
            ])
        ->layout('layouts.guest',[
            'title'=>$this->title]);
    }

    public function login(Request $request){
        $data = $request->session()->all();
        if(!isset($data['user_id'])){ 
           $user_details =DB::table('users as u')
                ->join('user_status as us', 'u.user_status_id', '=', 'us.user_status_id')
                ->join('user_sex as usex', 'u.user_sex_id', '=', 'usex.user_sex_id')
                ->join('user_genders as ug', 'u.user_gender_id', '=', 'ug.user_gender_id')
                ->join('user_roles as ur', 'u.user_role_id', '=', 'ur.user_role_id')
                ->where(['u.user_email'=> $this->username,'u.user_email_verified'=> 1])
                ->orWhere(
                    function($query) {
                        return $query
                        ->where(['u.user_name'=> $this->username,'u.user_name_verified'=> 1]);
                       })
                ->first();

            if( $user_details && password_verify($this->password,$user_details->user_password)){
                $request->session()->regenerate();

                $request->session()->put('user_id', $user_details->user_id);
                $request->session()->put('user_status_id', $user_details->user_status_id);
                $request->session()->put('user_status_details', $user_details->user_status_details); 
                $request->session()->put('user_sex_id', $user_details->user_sex_id);
                $request->session()->put('user_sex_details', $user_details->user_sex_details);
                $request->session()->put('user_gender_id', $user_details->user_gender_id);
                $request->session()->put('user_gender_details', $user_details->user_gender_details);
                $request->session()->put('user_role_id', $user_details->user_role_id);
                $request->session()->put('user_role_details', $user_details->user_role_details);
                
                $request->session()->put('user_name', $user_details->user_name);
                $request->session()->put('user_email', $user_details->user_email);
                $request->session()->put('user_phone', $user_details->user_phone);
                $request->session()->put('user_name_verified', $user_details->user_name_verified);
                $request->session()->put('user_email_verified', $user_details->user_email_verified);
                $request->session()->put('user_phone_verified', $user_details->user_phone_verified);

                $request->session()->put('user_firstname',$user_details->user_firstname);
                $request->session()->put('user_middlename', $user_details->user_middlename);
                $request->session()->put('user_lastname', $user_details->user_lastname);
                $request->session()->put('user_fullname', $user_details->user_lastname.', '. $user_details->user_firstname.' '.$user_details->user_middlename);
                $request->session()->put('user_suffix', $user_details->user_suffix);
                $request->session()->put('user_address', $user_details->user_address);

                $request->session()->put('user_birthdate', $user_details->user_birthdate);
                $request->session()->put('user_profile_picture', $user_details->user_profile_picture);
                $request->session()->put('user_formal_id', $user_details->user_formal_id);
                $request->session()->put('created_at', $user_details->created_at);
                $request->session()->put('updated_at', $user_details->updated_at);
                
                //append it to session
                $this->dispatchBrowserEvent('swal:redirect',[
                    'position'          									=> 'center',
                    'icon'              									=> 'success',
                    'title'             									=> 'Welcome back crimson!',
                    'showConfirmButton' 									=> 'true',
                    'timer'             									=> '1500',
                    'link'              									=> 'student/profile'
                ]);
            }else{
                $this->dispatchBrowserEvent('swal:redirect',[
                    'position'          									=> 'center',
                    'icon'              									=> 'warning',
                    'title'             									=> 'Invalid credentials!',
                    'showConfirmButton' 									=> 'true',
                    'timer'             									=> '1000',
                    'link'              									=> '#'
                ]);
            }
            

        }
        
    }
}
