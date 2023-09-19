<?php

namespace App\Http\Livewire\Authentication;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Livewire\Component;

class RegisterEmail extends Component
{
    public $email;

    protected $rules = [
        'email' => 'required|email',
    ];

    public function render()
    {
        return view('livewire.authentication.register-email');
    }

    public function send_verification_code(Request $request){
        $data = $request->session()->all();
        if(!isset($data['user_id'])){
            $this->validate();
            if(DB::table('users')
                ->where('user_email', $this->email)
                ->where('user_email_verified', 1)
                ->first()){

                // $this->dispatchBrowserEvent('swal:redirect',[
                //     'position'=> 'center',
                //     'icon'=> 'success',
                //     'title'=> 'Password has been updated!',
                //     'showConfirmButton'=> 'false',
                //     'timer'=> '1500',
                //     // 'link' => route('my-account.update', Auth::user()->id)
                // ]);

                // dd('mice');

            }else{
                // send code
                // verify code // only five times
                // $user_roles = DB::table('users')->get();
            }
            
            
    
            // dd($user_roles);
            
            
        
        }
    }
}
