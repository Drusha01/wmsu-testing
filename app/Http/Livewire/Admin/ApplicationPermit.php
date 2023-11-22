<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Mail;

class ApplicationPermit extends Component
{
    public $mail = true;
    
    public $hash;
    public $examinee;

    public function booted(Request $request){
        $this->user_details = $request->session()->all();
        if(!isset($this->user_details['user_id'])){
            return redirect('/login');
        }else{
            $user_status = DB::table('users as u')
            ->select('u.user_status_id','us.user_status_details')
            ->join('user_status as us', 'u.user_status_id', '=', 'us.user_status_id')
            ->where('user_id','=', $this->user_details['user_id'])
            ->first();
        }

        if(isset($user_status->user_status_details) && $user_status->user_status_details == 'deleted' ){
            return redirect('/deleted');
        }

        if(isset($user_status->user_status_details) && $user_status->user_status_details == 'inactive' ){
            return redirect('/inactive');
        }
    }
    public function hydrate(){
        if($this->access_role['C'] || $this->access_role['R'] || $this->access_role['U'] || $this->access_role['D']){
            self::update_data();
        }
    }
    public function update_data(){
        $this->examinee = DB::table('test_applications as ta')
            ->select(
                // '*',
                // DB::raw('count(*) as school_room_sschool_room_number_of_examinees' ),
                't_a_id',
                'user_id',
                'user_name',
                'user_address',
                'user_firstname',
                'user_middlename',
                'user_lastname',
                't_a_hash',
                'school_room_id',
                'school_room_capacity',	
                'school_room_college_name',	
                'school_room_college_abr',
                'school_room_venue',
                'school_room_name',	
                'school_room_test_center',
                'school_room_test_date',
                'school_room_test_time_start',
                'school_room_test_time_end',
                'school_room_description',
                )
            ->join('school_rooms as sr', 'sr.school_room_id', '=', 'ta.t_a_school_room_id')
            ->join('test_status as ts', 'ts.test_status_id', '=', 'ta.t_a_test_status_id')
            ->join('users as u', 'u.user_id', '=', 'ta.t_a_applicant_user_id')
            ->where('t_a_isactive','=',1)
            ->where('test_status_details','=','Accepted')
            ->whereNotNull('t_a_school_room_id')
            ->where('school_room_isactive','=',1)
            ->whereNotNull('school_room_proctor_user_id')
            ->where('t_a_hash','=',$this->hash)
            ->get()
            ->toArray();
        dd($this->examinee );
    }
    public function mount(Request $request,$hash){
        $this->hash = $hash;
        self::update_data();

    }
    public function render()
    {
        return view('livewire.admin.application-permit');
    }
}
