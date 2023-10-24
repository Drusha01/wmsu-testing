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
    public $unassigned_valid = false;
    public $unassigned_proctor_user_id=0;

    public $assigned_proctor;
    public $assigned_proctor_school_room_id = 0;
    public $assigned_proctor_filter;
    public $assigned_proctor_selected_all;
    public $assigned_proctor_selected = [];

    public $proctors_list;
    public $proctor_list_filter;
    
    

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

            if($this->assigned_proctor_school_room_id == 0){
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
                    'school_room_description',
                    'user_id',
                    'user_name',
                    'user_address',
                    'user_firstname',
                    'user_middlename',
                    'user_lastname',
                    )
                ->join('school_rooms as sr', 'sr.school_room_id', '=', 'ta.t_a_school_room_id')
                ->join('test_status as ts', 'ts.test_status_id', '=', 'ta.t_a_test_status_id')
                ->join('users as u', 'u.user_id', '=', 'sr.school_room_proctor_user_id')
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
                    'school_room_description',
                    'user_id',
                    'user_name',
                    'user_address',
                    'user_firstname',
                    'user_middlename',
                    'user_lastname'
                    )
                ->join('school_rooms as sr', 'sr.school_room_id', '=', 'ta.t_a_school_room_id')
                ->join('test_status as ts', 'ts.test_status_id', '=', 'ta.t_a_test_status_id')
                ->join('users as u', 'u.user_id', '=', 'sr.school_room_proctor_user_id')
                ->where('t_a_isactive','=',1)
                ->where('test_status_details','=','Processing')
                ->whereNotNull('t_a_school_room_id')
                ->whereNotNull('school_room_proctor_user_id')
                ->where('school_room_id','=',$this->assigned_proctor_school_room_id)
                ->groupBy('t_a_school_room_id')
                ->get()
                ->toArray();
            }
           
            
           
            $this->proctors_list = DB::table('access_roles as ar')
            ->select(
                // '*',
                'user_id',
                'user_name',
                'user_address',
                'user_firstname',
                'user_middlename',
                'user_lastname',
                'access_role_id',
                'access_role_create',
                'access_role_read',
                'access_role_update',
                'access_role_delete'
            )
            ->join('modules as m','m.module_id','ar.access_role_module_id')
            ->join('users as u','u.user_id','ar.access_role_user_id')
            ->join('user_status as us','us.user_status_id','u.user_status_id')
            ->where('m.module_nav_name','=','Exam Administrator')
            ->where('us.user_status_details','=','active')
            ->get()
            ->toArray();

            $this->unassigned_proctor_user_id = $this->proctors_list[0]->user_id;


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
            $this->active = 'unassigned_proctors';
            $this->school_rooms = DB::table('school_rooms as sr')
                ->select(
                    '*'
                )
                ->get()
                ->toArray();

            $this->unassigned_proctor_filter = [
                'Select all' => true,
                '#' => true,
                '# of Examinees' => true,
                'Capacity'=> true,
                'Slots' => true,
                
                'Venue'=> true,
                'Test center'=> true,
                'College' => false,
                'Room code' => true,
                'Room name'=> false,
                'Start - End'=> true,	
                'Proctor' => true,						
                'Actions'	=> true						
            ];

            $this->assigned_proctor_filter = [
                'Select all' => true,
                '#' => true,
                '# of Examinees' => true,
                'Capacity'=> true,
                'Slots' => true,
                'Venue'=> true,
                'Test center'=> true,
                'College' => false,
                'Room code' => false,
                'Room name'=> true,
                'Start - End'=> true,	
                'Proctor' => true,						
                'Actions'	=> true						
            ];

            $this->proctor_list_filter = [
                'Proctor username' =>true,
                'Proctor fullname' =>true,
                'Address' =>true,
                'Action' => true
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

            if($this->assigned_proctor_school_room_id == 0){
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
                    'school_room_description',
                    'user_id',
                    'user_name',
                    'user_address',
                    'user_firstname',
                    'user_middlename',
                    'user_lastname',
                    )
                ->join('school_rooms as sr', 'sr.school_room_id', '=', 'ta.t_a_school_room_id')
                ->join('test_status as ts', 'ts.test_status_id', '=', 'ta.t_a_test_status_id')
                ->join('users as u', 'u.user_id', '=', 'sr.school_room_proctor_user_id')
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
                    'school_room_description',
                    'user_id',
                    'user_name',
                    'user_address',
                    'user_firstname',
                    'user_middlename',
                    'user_lastname'
                    )
                ->join('school_rooms as sr', 'sr.school_room_id', '=', 'ta.t_a_school_room_id')
                ->join('test_status as ts', 'ts.test_status_id', '=', 'ta.t_a_test_status_id')
                ->join('users as u', 'u.user_id', '=', 'sr.school_room_proctor_user_id')
                ->where('t_a_isactive','=',1)
                ->where('test_status_details','=','Processing')
                ->whereNotNull('t_a_school_room_id')
                ->whereNotNull('school_room_proctor_user_id')
                ->where('school_room_id','=',$this->assigned_proctor_school_room_id)
                ->groupBy('t_a_school_room_id')
                ->get()
                ->toArray();
            }


            // dd($this->assigned_proctor );
            $this->unassigned_proctor_selected = [];
            $this->assigned_proctor_selected = [];

            foreach ($this->unassigned_proctor  as $key => $value) {
                array_push($this->unassigned_proctor_selected,[$value->school_room_id=>false]);
            }

            foreach ($this->assigned_proctor  as $key => $value) {
                array_push($this->assigned_proctor_selected,[$value->school_room_id=>false]);
            }
            
            $this->proctors_list = DB::table('access_roles as ar')
                ->select(
                    // '*',
                    'user_id',
                    'user_name',
                    'user_address',
                    'user_firstname',
                    'user_middlename',
                    'user_lastname',
                    'access_role_id',
                    'access_role_create',
                    'access_role_read',
                    'access_role_update',
                    'access_role_delete'
                )
                ->join('modules as m','m.module_id','ar.access_role_module_id')
                ->join('users as u','u.user_id','ar.access_role_user_id')
                ->join('user_status as us','us.user_status_id','u.user_status_id')
                ->where('m.module_nav_name','=','Exam Administrator')
                ->where('us.user_status_details','=','active')
                ->get()
                ->toArray();
        // dd($this->proctors_list);
            
        }
    }

    public function active_page($active){
        $this->active = $active;
    }
    public function render(){
        return view('livewire.admin.exam-management',[
            'user_details' => $this->user_details
            ])
            ->layout('layouts.admin',[
                'title'=>$this->title]);
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

    public function assigning_room_check(){
        $this->unassigned_valid = false;
        foreach ($this->unassigned_proctor  as $key => $value) {
            if($this->unassigned_proctor_selected[$key][$value->school_room_id]){
                $this->unassigned_valid = true;
                break;
            }
        }

        if(!$this->unassigned_valid){
            $this->dispatchBrowserEvent('swal:remove_backdrop',[
                'position'          									=> 'center',
                'icon'              									=> 'warning',
                'title'             									=> 'Please select applicant!',
                'showConfirmButton' 									=> 'true',
                'timer'             									=> '1500',
                'link'              									=> '#'
             ]);
        }else{
            $this->dispatchBrowserEvent('openModal','assignProctorModal');
        }
    }

    public function assign_room_proctor(){
        $this->unassigned_valid = false;
        foreach ($this->unassigned_proctor  as $key => $value) {
            if($this->unassigned_proctor_selected[$key][$value->school_room_id]){
                $this->unassigned_valid = true;
                break;
            }
        }
        // accessrole read
        $this->access_role = [
            'C' => true,
            'R' => true,
            'U' => true,
            'D' => true
        ];

        if($this->unassigned_valid &&  $this->access_role['U'] ){
            foreach ($this->unassigned_proctor  as $key => $value) {
                if($this->unassigned_proctor_selected[$key][$value->school_room_id]){
                    DB::table('school_rooms as sr')
                        ->where('school_room_id','=',$value->school_room_id)
                        ->update(['school_room_proctor_user_id'=>$this->unassigned_proctor_user_id]);
                }
            }
            $this->dispatchBrowserEvent('swal:remove_backdrop',[
                'position'          									=> 'center',
                'icon'              									=> 'success',
                'title'             									=> 'Proctor is assgned to a room!',
                'showConfirmButton' 									=> 'true',
                'timer'             									=> '1500',
                'link'              									=> '#'
             ]);
        }else{
            $this->dispatchBrowserEvent('swal:remove_backdrop',[
                'position'          									=> 'center',
                'icon'              									=> 'warning',
                'title'             									=> 'Please select applicant!',
                'showConfirmButton' 									=> 'true',
                'timer'             									=> '1500',
                'link'              									=> '#'
             ]);
        }
    }
    
}
