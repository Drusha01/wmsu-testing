<?php

namespace App\Http\Livewire\Authentication;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Livewire\Component;


use Mail;

class RegisterEmail extends Component
{
    public $email;
    public $error;
    public $email_send;
    public $validated_code;
    public $code;

    public function mount(){
        $this->email_send = true;
    }

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
    
                $this->dispatchBrowserEvent('swal:redirect',[
                    'position'          									=> 'center',
                    'icon'              									=> 'danger',
                    'title'             									=> 'User Exist!',
                    'showConfirmButton' 									=> 'true',
                    'timer'             									=> '1000',
                    'link'              									=> '#'
                ]);
            }else{
                // send code
                $this->email_send = false;
                $code = array('code'=>rand(100000,1000000));
                Mail::send('mail.test', $code, function($message) {
                    $message->to($this->email, $this->email)->subject
                       ('Account Verification');
                    $message->from('xyz@gmail.com','WMSU TESTING');
                 });
                $deleted = DB::table('user_activations')
                    ->where('user_activation_email', '=', $this->email)
                    ->delete();
                DB::table('user_activations')->insert([
                    'user_activation_email' => $this->email,
                    'user_activation_code' => $code['code'],
                    'user_activation_count' => 0
                ]);
                $this->dispatchBrowserEvent('swal:redirect',[
                    'position'          									=> 'center',
                    'icon'              									=> 'success',
                    'title'             									=> 'Code has been sent to your email address!',
                    'showConfirmButton' 									=> 'true',
                    'timer'             									=> '2000',
                    'link'              									=> '#'
                ]);
                $this->error ="";
            }
        }
    }

    public function verify_code(Request $request){
        $data = $request->session()->all();
        if(!isset($data['user_id'])){ 
            $activation_details = DB::table('user_activations')
                ->select('user_activation_id', 'user_activation_email', 'user_activation_code','user_activation_count','created_at', 'updated_at')
                ->where('user_activation_email',$this->email)
                ->get()
                ->toArray();
            if(count($activation_details)>0 && $activation_details['0']->user_activation_code == $this->code){
                if($activation_details['0']->user_activation_count<4){
                    // // check how long
                    if(1){
                        // registration proceeds
                        dd('mice');
                    }else{
                        $this->dispatchBrowserEvent('swal:redirect',[
                            'position'          									=> 'center',
                            'icon'              									=> 'warning',
                            'title'             									=> 'Code expires!',
                            'showConfirmButton' 									=> 'true',
                            'timer'             									=> '1000',
                            'link'              									=> '#'
                        ]);
                        $deleted = DB::table('user_activations')
                            ->where('user_activation_email', '=', $this->email)
                            ->delete();
                        $this->email_send =true;
                    }
                }else{
                    $this->dispatchBrowserEvent('swal:redirect',[
                        'position'          									=> 'center',
                        'icon'              									=> 'warning',
                        'title'             									=> 'Too many tries, code expires!',
                        'showConfirmButton' 									=> 'true',
                        'timer'             									=> '1000',
                        'link'              									=> '#'
                    ]);
                    $deleted = DB::table('user_activations')
                    ->where('user_activation_email', '=', $this->email)
                    ->delete();
                    $this->email_send =true;
                }
                
            }else{
                if($activation_details['0']->user_activation_count<4){
                    $this->dispatchBrowserEvent('swal:redirect',[
                        'position'          									=> 'center',
                        'icon'              									=> 'warning',
                        'title'             									=> 'Invalid code, you have '.(5-$activation_details['0']->user_activation_count-1).' tries!',
                        'showConfirmButton' 									=> 'true',
                        'timer'             									=> '1000',
                        'link'              									=> '#'
                    ]);
                    $updated = DB::table('user_activations')
                    ->where('user_activation_id', $activation_details['0']->user_activation_id)
                    ->update(['user_activation_count' =>  $activation_details['0']->user_activation_count+1]);
                }else{
                    $this->dispatchBrowserEvent('swal:redirect',[
                        'position'          									=> 'center',
                        'icon'              									=> 'warning',
                        'title'             									=> 'Too many tries, code expires!',
                        'showConfirmButton' 									=> 'true',
                        'timer'             									=> '1000',
                        'link'              									=> '#'
                    ]);
                    $deleted = DB::table('user_activations')
                    ->where('user_activation_email', '=', $this->email)
                    ->delete();
                    $this->email_send =true;
                }
            }          
        }
    }
}
