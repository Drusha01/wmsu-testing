<?php

namespace App\Http\Livewire\Student\StudentProfile;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentProfile extends Component
{
    public $title;
    public $user_details;

    // photo 
    public $photo;

    // password
    public $current_password;
    public $new_password;
    public $confirm_password;

    public $firstname;

    public function mount(Request $request){
        $this->user_details = $request->session()->all();
        $this->title = 'profile';
        $this->photo = 'poto';

        $this->firstname = $this->user_details['user_firstname'];
        $this->middlename = $this->user_details['user_middlename'];
        $this->lastname = $this->user_details['user_lastname'];
        $this->suffix = $this->user_details['user_suffix'];
        $this->gender = $this->user_details['user_gender_details'];
        $this->sex = $this->user_details['user_sex_details'];
        $this->phone = $this->user_details['user_phone'];
        $this->address = $this->user_details['user_address'];
        $this->birthdate = $this->user_details['user_birthdate'];

        // family
        // educational backgroun
        // requirements
    }
    public function render()
    {
        return view('livewire.student.student-profile.student-profile',[
                'user_details' => $this->user_details
            ])
            ->layout('layouts.student',[
                'title'=>$this->title]);
    }
    public function save_profile_info(Request $request){
        $user_details = $request->session()->all();
        if(!isset($user_details['user_id'])){
            $this->dispatchBrowserEvent('swal:redirect',[
                'position'          									=> 'center',
                'icon'              									=> 'success',
                'title'             									=> 'Unauthenticated!',
                'showConfirmButton' 									=> 'true',
                'timer'             									=> '1500',
                'link'              									=> 'login'
            ]);
        }
        if(isset($user_details['user_status_details']) && $user_details['user_status_details'] == 'deleted' ){
            $this->dispatchBrowserEvent('swal:redirect',[
                'position'          									=> 'center',
                'icon'              									=> 'success',
                'title'             									=> 'Account deleted!',
                'showConfirmButton' 									=> 'true',
                'timer'             									=> '1500',
                'link'              									=> 'deleted'
            ]);
        }
        if(isset($user_details['user_status_details']) && $user_details['user_status_details'] == 'inactive' ){
            $this->dispatchBrowserEvent('swal:redirect',[
                'position'          									=> 'center',
                'icon'              									=> 'success',
                'title'             									=> 'Account inactive!',
                'showConfirmButton' 									=> 'true',
                'timer'             									=> '1500',
                'link'              									=> 'inactive'
            ]);
        }
       
        if(strlen($this->firstname) < 1 && strlen($this->firstname) > 255){
            return false;
        }
        
        if(strlen($this->lastname) < 1 && strlen($this->lastname) > 255){
            return false;
        }
        if(strlen($this->middlename) < 0 && strlen($this->middlename) > 255){
            return false;
        }
        if(strlen($this->suffix) < 0 && strlen($this->suffix) > 255){
            return false;
        }
        if(strlen($this->address) < 0 && strlen($this->address) > 255){
            return false;
        }
        // validate phone
        if(1){
            
        }

        if($gender_details = DB::table('user_genders')
        ->where('user_gender_details', $this->gender)
        ->first()){
            $gender_id = $gender_details->user_gender_id;
        }else{
            DB::table('user_genders')->insert([
                'user_gender_details'=>$this->gender
            ]);
            $gender_details = DB::table('user_genders')
                ->where('user_gender_details', $this->gender)
                ->first();
            $gender_id = $gender_details->user_gender_id;
        }
        // update
        DB::table('users as u')
        ->where(['u.user_id'=> $user_details['user_id']])
        ->update(['u.user_firstname' => $this->firstname,
            'u.user_middlename'=>$this->middlename, 
            'u.user_lastname'=>$this->lastname, 
            'u.user_suffix'=>$this->suffix, 
            'u.user_gender_id'=>$gender_id,
            'u.user_address'=>$this->address,  
            'u.user_phone'=>$this->phone,  
            'u.user_birthdate'=>$this->birthdate,   
            ]);

        $user_details =DB::table('users as u')
        ->join('user_status as us', 'u.user_status_id', '=', 'us.user_status_id')
        ->join('user_sex as usex', 'u.user_sex_id', '=', 'usex.user_sex_id')
        ->join('user_genders as ug', 'u.user_gender_id', '=', 'ug.user_gender_id')
        ->join('user_roles as ur', 'u.user_role_id', '=', 'ur.user_role_id')
        ->where(['u.user_id'=> $user_details['user_id']])
        ->first();


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
        $request->session()->put('created_at', $user_details->created_at);
        $request->session()->put('updated_at', $user_details->updated_at);
        $this->user_details = $request->session()->all();

        $this->dispatchBrowserEvent('swal:redirect',[
            'position'          									=> 'center',
            'icon'              									=> 'success',
            'title'             									=> 'Account details saved!',
            'showConfirmButton' 									=> 'true',
            'timer'             									=> '1500',
            'link'              									=> '#'
        ]);
        
    }

    public function save_pictures(){
        dd($this->photo);
    }
    public function change_password(){
        dd('password');
    }
}
