<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class ExamManagement extends Component
{
    public $user_detais;
    public $title;

    public $unassigned_proctor;
    public $unassigned_proctor_school_room_id = 0;
    public $unassigned_proctor_filter;
    public $unassigned_proctor_selected_all;
    public $unassigned_proctor_selected = [];

    public $assigned_proctor;
    public $assigned_proctor_school_room_id = 0;
    public $assigned_proctor_filter;
    public $assigned_proctor_selected_all;
    public $assigned_proctor_selected = [];
    
    

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
        $this->access_role = [
            'C' => true,
            'R' => true,
            'U' => true,
            'D' => true
        ];

        if($this->access_role['C'] || $this->access_role['R'] || $this->access_role['U'] || $this->access_role['D']){
            
            $this->school_rooms = DB::table('school_rooms as sr')
                ->select(
                    '*'
                )
                ->get()
                ->toArray();

            if($this->unassigned_proctor_school_room_id == 0){
                $this->unassigned_proctor = DB::table('test_applications as ta')
                ->select(
                    // '*',
                    DB::raw('count(*) as school_room_number_of_examinees' ),
                    'school_room_id',
                    DB::raw('(school_room_capacity - count(*)) as school_room_slot'),
                    'school_room_capacity',	
                    'school_room_college_name',	
                    'school_room_college_abr',
                    'school_room_venue',
                    'school_room_name',	
                    'school_room_test_center',
                    'school_room_test_date',
                    'school_room_test_time_start',
                    'school_room_test_time_end',
                    'school_room_description'
                    )
                ->join('school_rooms as sr', 'sr.school_room_id', '=', 'ta.t_a_school_room_id')
                ->join('test_status as ts', 'ts.test_status_id', '=', 'ta.t_a_test_status_id')
                ->where('t_a_isactive','=',1)
                ->where('test_status_details','=','Processing')
                ->whereNotNull('t_a_school_room_id')
                ->whereNull('school_room_proctor_user_id')
                ->groupBy('t_a_school_room_id')
                ->get()
                ->toArray();
            }else{
                $this->unassigned_proctor = DB::table('test_applications as ta')
                ->select(
                    // '*',
                    DB::raw('count(*) as school_room_number_of_examinees' ),
                    'school_room_id',
                    DB::raw('(school_room_capacity - count(*)) as school_room_slot'),
                    'school_room_capacity',	
                    'school_room_college_name',	
                    'school_room_college_abr',
                    'school_room_venue',
                    'school_room_name',	
                    'school_room_test_center',
                    'school_room_test_date',
                    'school_room_test_time_start',
                    'school_room_test_time_end',
                    'school_room_description'
                    )
                ->join('school_rooms as sr', 'sr.school_room_id', '=', 'ta.t_a_school_room_id')
                ->join('test_status as ts', 'ts.test_status_id', '=', 'ta.t_a_test_status_id')
                ->where('t_a_isactive','=',1)
                ->where('test_status_details','=','Processing')
                ->whereNotNull('t_a_school_room_id')
                ->whereNull('school_room_proctor_user_id')
                ->where('school_room_id','=',$this->unassigned_proctor_school_room_id)
                ->groupBy('t_a_school_room_id')
                ->get()
                ->toArray();
            }

            if($this->assigned_proctor_school_room_id){
                $this->assigned_proctor = DB::table('test_applications as ta')
                ->select(
                    // '*',
                    DB::raw('count(*) as school_room_number_of_examinees' ),
                    'school_room_id',
                    DB::raw('(school_room_capacity - count(*)) as school_room_slot'),
                    'school_room_capacity',	
                    'school_room_college_name',	
                    'school_room_college_abr',
                    'school_room_venue',
                    'school_room_name',	
                    'school_room_test_center',
                    'school_room_test_date',
                    'school_room_test_time_start',
                    'school_room_test_time_end',
                    'school_room_description'
                    )
                ->join('school_rooms as sr', 'sr.school_room_id', '=', 'ta.t_a_school_room_id')
                ->join('test_status as ts', 'ts.test_status_id', '=', 'ta.t_a_test_status_id')
                ->where('t_a_isactive','=',1)
                ->where('test_status_details','=','Processing')
                ->whereNotNull('t_a_school_room_id')
                ->whereNotNull('school_room_proctor_user_id')
                ->groupBy('t_a_school_room_id')
                ->get()
                ->toArray();
            }else{
                $this->assigned_proctor = DB::table('test_applications as ta')
                ->select(
                    // '*',
                    DB::raw('count(*) as school_room_sschool_room_number_of_examinees' ),
                    'school_room_id',
                    DB::raw('(school_room_capacity - count(*)) as school_room_slot'),
                    'school_room_capacity',	
                    'school_room_college_name',	
                    'school_room_college_abr',
                    'school_room_venue',
                    'school_room_name',	
                    'school_room_test_center',
                    'school_room_test_date',
                    'school_room_test_time_start',
                    'school_room_test_time_end',
                    'school_room_description'
                    )
                ->join('school_rooms as sr', 'sr.school_room_id', '=', 'ta.t_a_school_room_id')
                ->join('test_status as ts', 'ts.test_status_id', '=', 'ta.t_a_test_status_id')
                ->where('t_a_isactive','=',1)
                ->where('test_status_details','=','Processing')
                ->whereNotNull('t_a_school_room_id')
                ->whereNotNull('school_room_proctor_user_id')
                ->where('school_room_id','=',$this->assigned_proctor_school_room_id)
                ->groupBy('t_a_school_room_id')
                ->get()
                ->toArray();
            }
            // dd($this->unassigned_proctor);
            
        }
    }
    public function mount(Request $request){
        $this->user_details = $request->session()->all();
        $this->title = 'exam-management';

        $this->access_role = [
            'C' => true,
            'R' => true,
            'U' => true,
            'D' => true
        ];

        if($this->access_role['C'] || $this->access_role['R'] || $this->access_role['U'] || $this->access_role['D']){

            $this->school_rooms = DB::table('school_rooms as sr')
                ->select(
                    '*'
                )
                ->get()
                ->toArray();

            $this->unassigned_proctor_filter = [
                'Select all' => true,
                '#' => true,
                'No. of Examinees' => true,
                'Capacity'=> true,
                'Slots' => true,
                'Venue'=> true,
                'Test center'=> true,
                'College' => false,
                'Room code' => true,
                'Room name'=> false,
                'Start - End'=> false,							
                'Actions'	=> true						
            ];

            $this->assigned_proctor_filter = [
                'Select all' => true,
                '#' => true,
                'Proctor' => true,
                'Capacity'=> true,
                'Slots' => true,
                'Venue'=> true,
                'Test center'=> true,
                'College' => false,
                'Room code' => false,
                'Room name'=> true,
                'Start - End'=> true,							
                'Actions'	=> true						
            ];
            
            if($this->unassigned_proctor_school_room_id == 0){
                $this->unassigned_proctor = DB::table('test_applications as ta')
                ->select(
                    // '*',
                    DB::raw('count(*) as school_room_number_of_examinees' ),
                    'school_room_id',
                    DB::raw('(school_room_capacity - count(*)) as school_room_slot'),
                    'school_room_capacity',	
                    'school_room_college_name',	
                    'school_room_college_abr',
                    'school_room_venue',
                    'school_room_name',	
                    'school_room_test_center',
                    'school_room_test_date',
                    'school_room_test_time_start',
                    'school_room_test_time_end',
                    'school_room_description'
                    )
                ->join('school_rooms as sr', 'sr.school_room_id', '=', 'ta.t_a_school_room_id')
                ->join('test_status as ts', 'ts.test_status_id', '=', 'ta.t_a_test_status_id')
                ->where('t_a_isactive','=',1)
                ->where('test_status_details','=','Processing')
                ->whereNotNull('t_a_school_room_id')
                ->whereNull('school_room_proctor_user_id')
                ->groupBy('t_a_school_room_id')
                ->get()
                ->toArray();
            }else{
                $this->unassigned_proctor = DB::table('test_applications as ta')
                ->select(
                    // '*',
                    DB::raw('count(*) as school_room_number_of_examinees' ),
                    'school_room_id',
                    DB::raw('(school_room_capacity - count(*)) as school_room_slot'),
                    'school_room_capacity',	
                    'school_room_college_name',	
                    'school_room_college_abr',
                    'school_room_venue',
                    'school_room_name',	
                    'school_room_test_center',
                    'school_room_test_date',
                    'school_room_test_time_start',
                    'school_room_test_time_end',
                    'school_room_description'
                    )
                ->join('school_rooms as sr', 'sr.school_room_id', '=', 'ta.t_a_school_room_id')
                ->join('test_status as ts', 'ts.test_status_id', '=', 'ta.t_a_test_status_id')
                ->where('t_a_isactive','=',1)
                ->where('test_status_details','=','Processing')
                ->whereNotNull('t_a_school_room_id')
                ->whereNull('school_room_proctor_user_id')
                ->where('school_room_id','=',$this->unassigned_proctor_school_room_id)
                ->groupBy('t_a_school_room_id')
                ->get()
                ->toArray();
            }

            if($this->assigned_proctor_school_room_id){
                $this->assigned_proctor = DB::table('test_applications as ta')
                ->select(
                    // '*',
                    DB::raw('count(*) as school_room_number_of_examinees' ),
                    'school_room_id',
                    DB::raw('(school_room_capacity - count(*)) as school_room_slot'),
                    'school_room_capacity',	
                    'school_room_college_name',	
                    'school_room_college_abr',
                    'school_room_venue',
                    'school_room_name',	
                    'school_room_test_center',
                    'school_room_test_date',
                    'school_room_test_time_start',
                    'school_room_test_time_end',
                    'school_room_description'
                    )
                ->join('school_rooms as sr', 'sr.school_room_id', '=', 'ta.t_a_school_room_id')
                ->join('test_status as ts', 'ts.test_status_id', '=', 'ta.t_a_test_status_id')
                ->where('t_a_isactive','=',1)
                ->where('test_status_details','=','Processing')
                ->whereNotNull('t_a_school_room_id')
                ->whereNotNull('school_room_proctor_user_id')
                ->groupBy('t_a_school_room_id')
                ->get()
                ->toArray();
            }else{
                $this->assigned_proctor = DB::table('test_applications as ta')
                ->select(
                    // '*',
                    DB::raw('count(*) as school_room_sschool_room_number_of_examinees' ),
                    'school_room_id',
                    DB::raw('(school_room_capacity - count(*)) as school_room_slot'),
                    'school_room_capacity',	
                    'school_room_college_name',	
                    'school_room_college_abr',
                    'school_room_venue',
                    'school_room_name',	
                    'school_room_test_center',
                    'school_room_test_date',
                    'school_room_test_time_start',
                    'school_room_test_time_end',
                    'school_room_description'
                    )
                ->join('school_rooms as sr', 'sr.school_room_id', '=', 'ta.t_a_school_room_id')
                ->join('test_status as ts', 'ts.test_status_id', '=', 'ta.t_a_test_status_id')
                ->where('t_a_isactive','=',1)
                ->where('test_status_details','=','Processing')
                ->whereNotNull('t_a_school_room_id')
                ->whereNotNull('school_room_proctor_user_id')
                ->where('school_room_id','=',$this->assigned_proctor_school_room_id)
                ->groupBy('t_a_school_room_id')
                ->get()
                ->toArray();
            }

            $this->unassigned_proctor_selected = [];
            $this->assigned_proctor_selected = [];

            foreach ($this->unassigned_proctor  as $key => $value) {
                array_push($this->unassigned_proctor_selected,[$value->school_room_id=>false]);
            }

            foreach ($this->assigned_proctor  as $key => $value) {
                array_push($this->assigned_proctor_selected,[$value->school_room_id=>false]);
            }
            // dd($this->unassigned_proctor);
            
        }
    }

    public function unassigned_proctor_filterView(){
        $this->dispatchBrowserEvent('swal:redirect',[
            'position'          									=> 'center',
            'icon'              									=> 'success',
            'title'             									=> 'Successfully changed filter!',
            'showConfirmButton' 									=> 'true',
            'timer'             									=> '1000',
            'link'              									=> '#'
        ]);
    }

    public function assigned_proctor_filterView(){
        $this->dispatchBrowserEvent('swal:redirect',[
            'position'          									=> 'center',
            'icon'              									=> 'success',
            'title'             									=> 'Successfully changed filter!',
            'showConfirmButton' 									=> 'true',
            'timer'             									=> '1000',
            'link'              									=> '#'
        ]);

    }

    public function unassigned_proctor_school_room_filter(){
        if($this->unassigned_proctor_school_room_id == 0){
            $this->unassigned_proctor = DB::table('test_applications as ta')
            ->select(
                // '*',
                DB::raw('count(*) as school_room_number_of_examinees' ),
                'school_room_id',
                DB::raw('(school_room_capacity - count(*)) as school_room_slot'),
                'school_room_capacity',	
                'school_room_college_name',	
                'school_room_college_abr',
                'school_room_venue',
                'school_room_name',	
                'school_room_test_center',
                'school_room_test_date',
                'school_room_test_time_start',
                'school_room_test_time_end',
                'school_room_description'
                )
            ->join('school_rooms as sr', 'sr.school_room_id', '=', 'ta.t_a_school_room_id')
            ->join('test_status as ts', 'ts.test_status_id', '=', 'ta.t_a_test_status_id')
            ->where('t_a_isactive','=',1)
            ->where('test_status_details','=','Processing')
            ->whereNotNull('t_a_school_room_id')
            ->whereNull('school_room_proctor_user_id')
            ->groupBy('t_a_school_room_id')
            ->get()
            ->toArray();
        }else{
            $this->unassigned_proctor = DB::table('test_applications as ta')
            ->select(
                // '*',
                DB::raw('count(*) as school_room_number_of_examinees' ),
                'school_room_id',
                DB::raw('(school_room_capacity - count(*)) as school_room_slot'),
                'school_room_capacity',	
                'school_room_college_name',	
                'school_room_college_abr',
                'school_room_venue',
                'school_room_name',	
                'school_room_test_center',
                'school_room_test_date',
                'school_room_test_time_start',
                'school_room_test_time_end',
                'school_room_description'
                )
            ->join('school_rooms as sr', 'sr.school_room_id', '=', 'ta.t_a_school_room_id')
            ->join('test_status as ts', 'ts.test_status_id', '=', 'ta.t_a_test_status_id')
            ->where('t_a_isactive','=',1)
            ->where('test_status_details','=','Processing')
            ->whereNotNull('t_a_school_room_id')
            ->whereNull('school_room_proctor_user_id')
            ->where('school_room_id','=',$this->unassigned_proctor_school_room_id)
            ->groupBy('t_a_school_room_id')
            ->get()
            ->toArray();
        }

        if($this->assigned_proctor_school_room_id){
            $this->assigned_proctor = DB::table('test_applications as ta')
            ->select(
                // '*',
                DB::raw('count(*) as school_room_number_of_examinees' ),
                'school_room_id',
                DB::raw('(school_room_capacity - count(*)) as school_room_slot'),
                'school_room_capacity',	
                'school_room_college_name',	
                'school_room_college_abr',
                'school_room_venue',
                'school_room_name',	
                'school_room_test_center',
                'school_room_test_date',
                'school_room_test_time_start',
                'school_room_test_time_end',
                'school_room_description'
                )
            ->join('school_rooms as sr', 'sr.school_room_id', '=', 'ta.t_a_school_room_id')
            ->join('test_status as ts', 'ts.test_status_id', '=', 'ta.t_a_test_status_id')
            ->where('t_a_isactive','=',1)
            ->where('test_status_details','=','Processing')
            ->whereNotNull('t_a_school_room_id')
            ->whereNotNull('school_room_proctor_user_id')
            ->groupBy('t_a_school_room_id')
            ->get()
            ->toArray();
        }else{
            $this->assigned_proctor = DB::table('test_applications as ta')
            ->select(
                // '*',
                DB::raw('count(*) as school_room_sschool_room_number_of_examinees' ),
                'school_room_id',
                DB::raw('(school_room_capacity - count(*)) as school_room_slot'),
                'school_room_capacity',	
                'school_room_college_name',	
                'school_room_college_abr',
                'school_room_venue',
                'school_room_name',	
                'school_room_test_center',
                'school_room_test_date',
                'school_room_test_time_start',
                'school_room_test_time_end',
                'school_room_description'
                )
            ->join('school_rooms as sr', 'sr.school_room_id', '=', 'ta.t_a_school_room_id')
            ->join('test_status as ts', 'ts.test_status_id', '=', 'ta.t_a_test_status_id')
            ->where('t_a_isactive','=',1)
            ->where('test_status_details','=','Processing')
            ->whereNotNull('t_a_school_room_id')
            ->whereNotNull('school_room_proctor_user_id')
            ->where('school_room_id','=',$this->assigned_proctor_school_room_id)
            ->groupBy('t_a_school_room_id')
            ->get()
            ->toArray();
        }

        $this->unassigned_proctor_selected = [];
        $this->assigned_proctor_selected = [];

        $this->unassigned_proctor_selected_all = false;
        $this->assigned_proctor_selected_all = false;

        foreach ($this->unassigned_proctor  as $key => $value) {
            array_push($this->unassigned_proctor_selected,[$value->school_room_id=>false]);
        }

        foreach ($this->assigned_proctor  as $key => $value) {
            array_push($this->assigned_proctor_selected,[$value->school_room_id=>false]);
        }


    }

    public function unassigned_proctor_selected_all(){
        $this->unassigned_proctor_selected = [];
        if($this->unassigned_proctor_selected_all){
            foreach ($this->unassigned_proctor  as $key => $value) {
                array_push($this->unassigned_proctor_selected,[$value->school_room_id=>true]);
            }
        }
        
        
    }

    public function render()
    {
        return view('livewire.admin.exam-management',[
            'user_details' => $this->user_details
            ])
            ->layout('layouts.admin',[
                'title'=>$this->title]);
    }
}
