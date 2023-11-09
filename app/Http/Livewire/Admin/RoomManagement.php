<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class RoomManagement extends Component
{
    public $user_detais;
    public $title;

    public $active;

    public $school_rooms;
    public $application_view_details ;

    // unassigned room applicant
    public $unassigned_applicant_data;
    public $unassigned_test_type_id= 0;
    public $unassigned_applicant_filter;
    public $unassigned_selected_all;
    public $unassigned_selected = [];
    public $unassigned_valid = false;
    public $unassigned_school_room_id = 0;
    // assigned room applicant
    public $assigned_applicant_data;
    public $assigned_test_type_id= 0;
    public $assigned_applicant_filter;
    public $assigned_selected_all;
    public $assigned_selected = [];
    public $assigned_valid = false;
    public $remove_valid = false;
    public $assigned_school_room_id = 0;

    // school room applicant
    public $school_room_data;
    public $school_room_college_type_id= 0;
    public $school_room_filter;

    //CRUD ROOM
    public $view_room = false;
    public $edit_room = false;
    
    public $school_room_id = 0;
    public $school_room_college_name;
    public $school_room_college_abr;
    public $school_room_venue;
    public $school_room_name;
    public $school_room_test_center;
    public $school_room_test_date;
    public $school_room_test_time_start;
    public $school_room_test_time_end;
    public $school_room_capacity;
    public $school_room_description;
    public $roomToDelete = 0;


    public $column_order = 't_a_id';
    public $order_by = 'asc';


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
        $this->application_view_details = null;
        $this->access_role = [
            'C' => true,
            'R' => true,
            'U' => true,
            'D' => true
        ];

        if($this->access_role['C'] || $this->access_role['R'] || $this->access_role['U'] || $this->access_role['D']){

            $this->exam_types = DB::table('test_types')
            ->select('test_type_id','test_type_name')
            ->get()
            ->toArray();

            $this->school_rooms = DB::table('school_rooms as sr')
                ->select(
                    '*'
                )
                ->get()
                ->toArray();
                
            $this->unassigned_school_room_id = $this->school_rooms[0]->school_room_id;
            $this->assigned_school_room_id = $this->school_rooms[0]->school_room_id;

            if($this->unassigned_test_type_id == 0){
                $this->unassigned_applicant_data = DB::table('test_applications as ta')
                ->select(
                    // '*',
                    't_a_id',
                    'school_year_details',
                    DB::raw('CONCAT(u.user_lastname,", ",u.user_firstname," ",LEFT(u.user_middlename,1)) as user_fullname'),
                    'test_type_name',
                    DB::raw('DATE(ta.date_created) as date_applied')
                    )
                ->join('users as u', 'u.user_id', '=', 'ta.t_a_applicant_user_id')
                ->join('user_family_background as fb', 'fb.family_background_user_id', '=', 'u.user_id')
                ->join('test_types as tt', 'tt.test_type_id', '=', 'ta.t_a_test_type_id')
                ->join('test_status as ts', 'ts.test_status_id', '=', 'ta.t_a_test_status_id')
                ->join('school_years as sy', 'sy.school_year_id', '=', 'ta.t_a_school_year_id')
                ->where('t_a_isactive','=',1)
                ->whereNull('t_a_school_room_id')
                ->where('ts.test_status_details','=','Processing')
                ->orderBy($this->column_order, 'asc')
                ->get()
                ->toArray();
            }else{
                $this->unassigned_applicant_data = DB::table('test_applications as ta')
                ->select(
                    // '*',
                    't_a_id',
                    'school_year_details',
                    DB::raw('CONCAT(u.user_lastname,", ",u.user_firstname," ",LEFT(u.user_middlename,1)) as user_fullname'),
                    'test_type_name',
                    DB::raw('DATE(ta.date_created) as date_applied')
                    )
                ->join('users as u', 'u.user_id', '=', 'ta.t_a_applicant_user_id')
                ->join('user_family_background as fb', 'fb.family_background_user_id', '=', 'u.user_id')
                ->join('test_types as tt', 'tt.test_type_id', '=', 'ta.t_a_test_type_id')
                ->join('test_status as ts', 'ts.test_status_id', '=', 'ta.t_a_test_status_id')
                ->join('school_years as sy', 'sy.school_year_id', '=', 'ta.t_a_school_year_id')
                ->where('t_a_isactive','=',1)
                ->whereNull('t_a_school_room_id')
                ->where('test_status_details','=','Processing')
                ->where('t_a_test_type_id','=',$this->unassigned_test_type_id)
                ->orderBy($this->column_order, 'asc')
                ->get()
                ->toArray();
            }

            if($this->assigned_test_type_id == 0){
                $this->assigned_applicant_data = DB::table('test_applications as ta')
                ->select(
                    // '*',
                    't_a_id',
                    'school_room_id',
                    'school_room_name',
                    'school_room_test_center',
                    'school_year_details',
                    'school_room_test_time_start',
                    'school_room_test_time_end',
                    'school_year_details',
                    DB::raw('CONCAT(u.user_lastname,", ",u.user_firstname," ",LEFT(u.user_middlename,1)) as user_fullname'),
                    'test_type_name',
                    DB::raw('DATE(ta.date_created) as date_applied')
                    )
                ->join('users as u', 'u.user_id', '=', 'ta.t_a_applicant_user_id')
                ->join('school_rooms as sh', 'sh.school_room_id', '=', 'ta.t_a_school_room_id')
                ->join('user_family_background as fb', 'fb.family_background_user_id', '=', 'u.user_id')
                ->join('test_types as tt', 'tt.test_type_id', '=', 'ta.t_a_test_type_id')
                ->join('test_status as ts', 'ts.test_status_id', '=', 'ta.t_a_test_status_id')
                ->join('school_years as sy', 'sy.school_year_id', '=', 'ta.t_a_school_year_id')
                ->where('t_a_isactive','=',1)
                ->whereNotNull('t_a_school_room_id')
                ->where('ts.test_status_details','=','Processing')
                ->orderBy($this->column_order, 'asc')
                ->get()
                ->toArray();
            }else{
                $this->assigned_applicant_data = DB::table('test_applications as ta')
                ->select(
                    // '*',
                    't_a_id',
                    'school_room_id',
                    'school_room_name',
                    'school_room_test_center',
                    'school_year_details',
                    'school_room_test_time_start',
                    'school_room_test_time_end',
                    'school_year_details',
                    DB::raw('CONCAT(u.user_lastname,", ",u.user_firstname," ",LEFT(u.user_middlename,1)) as user_fullname'),
                    'test_type_name',
                    DB::raw('DATE(ta.date_created) as date_applied')
                    )
                ->join('users as u', 'u.user_id', '=', 'ta.t_a_applicant_user_id')
                ->join('school_rooms as sh', 'sh.school_room_id', '=', 'ta.t_a_school_room_id')
                ->join('user_family_background as fb', 'fb.family_background_user_id', '=', 'u.user_id')
                ->join('test_types as tt', 'tt.test_type_id', '=', 'ta.t_a_test_type_id')
                ->join('test_status as ts', 'ts.test_status_id', '=', 'ta.t_a_test_status_id')
                ->join('school_years as sy', 'sy.school_year_id', '=', 'ta.t_a_school_year_id')
                ->where('t_a_isactive','=',1)
                ->whereNotNull('t_a_school_room_id')
                ->where('ts.test_status_details','=','Processing')
                ->where('t_a_test_type_id','=',$this->assigned_test_type_id)
                ->orderBy($this->column_order, 'asc')
                ->get()
                ->toArray();
            }
            
        }
    }

    public function mount(Request $request){
        $this->user_details = $request->session()->all();
        $this->title = 'room-management';
        $this->active = 'unassigned_room';

        $this->access_role = [
            'C' => true,
            'R' => true,
            'U' => true,
            'D' => true
        ];

        if($this->access_role['C'] || $this->access_role['R'] || $this->access_role['U'] || $this->access_role['D']){

            $this->unassigned_applicant_filter = [
                'Select all' => true,
                '#' => true,
                'Code' => true,
                'Applicant name'=> true,
                'Exam type'=> true,
                'Room venue'=> true,
                // 'A.Y.'=> true,
                'Date applied'	=> true,								
                'Actions'	=> true					
            ];

            $this->assigned_applicant_filter = [
                'Select all' => true,
                '#' => true,
                'Code' => true,
                'Applicant name'=> true,
                'Exam type'=> true,
                'Room venue'=> true,
                'Test center'=>true,
                'Start - End'=>true,
                // 'A.Y.'=> true,
                'Date applied'	=> true,								
                'Actions'	=> true					
            ];

            $this->school_room_filter = [
                // 'Select all' => true,
                '#' => true,
                'Venue'=> true,
                'Test center'=> true,
                'College' => true,
                'Room code' => true,
                'Room name'=> true,
                'Capacity'=> true,
                'Test date'=> true,
                'Start - End'=> true,
                'Capacity'=> true,		
                'Status'=> true,							
                'Actions'	=> true					
            ];

            $this->exam_types = DB::table('test_types')
                ->select('test_type_id','test_type_name')
                ->get()
                ->toArray();

            $this->school_rooms = DB::table('school_rooms as sr')
                ->select(
                    '*'
                )
                ->get()
                ->toArray();


            $this->unassigned_school_room_id = $this->school_rooms[0]->school_room_id;
            $this->assigned_school_room_id = $this->school_rooms[0]->school_room_id;
                
                
            if($this->unassigned_test_type_id == 0){
                $this->unassigned_applicant_data = DB::table('test_applications as ta')
                ->select(
                    // '*',
                    't_a_id',
                    'school_year_details',
                    DB::raw('CONCAT(u.user_lastname,", ",u.user_firstname," ",LEFT(u.user_middlename,1)) as user_fullname'),
                    'test_type_name',
                    DB::raw('DATE(ta.date_created) as date_applied')
                    )
                ->join('users as u', 'u.user_id', '=', 'ta.t_a_applicant_user_id')
                ->join('user_family_background as fb', 'fb.family_background_user_id', '=', 'u.user_id')
                ->join('test_types as tt', 'tt.test_type_id', '=', 'ta.t_a_test_type_id')
                ->join('test_status as ts', 'ts.test_status_id', '=', 'ta.t_a_test_status_id')
                ->join('school_years as sy', 'sy.school_year_id', '=', 'ta.t_a_school_year_id')
                ->where('t_a_isactive','=',1)
                ->whereNull('t_a_school_room_id')
                ->where('ts.test_status_details','=','Processing')
                ->orderBy($this->column_order, 'asc')
                ->get()
                ->toArray();
            }else{
                $this->unassigned_applicant_data = DB::table('test_applications as ta')
                ->select(
                    // '*',
                    't_a_id',
                    'school_year_details',
                    DB::raw('CONCAT(u.user_lastname,", ",u.user_firstname," ",LEFT(u.user_middlename,1)) as user_fullname'),
                    'test_type_name',
                    DB::raw('DATE(ta.date_created) as date_applied')
                    )
                ->join('users as u', 'u.user_id', '=', 'ta.t_a_applicant_user_id')
                ->join('user_family_background as fb', 'fb.family_background_user_id', '=', 'u.user_id')
                ->join('test_types as tt', 'tt.test_type_id', '=', 'ta.t_a_test_type_id')
                ->join('test_status as ts', 'ts.test_status_id', '=', 'ta.t_a_test_status_id')
                ->join('school_years as sy', 'sy.school_year_id', '=', 'ta.t_a_school_year_id')
                ->where('t_a_isactive','=',1)
                ->whereNull('t_a_school_room_id')
                ->where('test_status_details','=','Processing')
                ->where('t_a_test_type_id','=',$this->unassigned_test_type_id)
                ->orderBy($this->column_order, 'asc')
                ->get()
                ->toArray();
            }

            if($this->assigned_test_type_id == 0){
                $this->assigned_applicant_data = DB::table('test_applications as ta')
                ->select(
                    // '*',
                    't_a_id',
                    'school_room_id',
                    'school_room_name',
                    'school_room_test_center',
                    'school_year_details',
                    'school_room_test_time_start',
                    'school_room_test_time_end',
                    'school_year_details',
                    DB::raw('CONCAT(u.user_lastname,", ",u.user_firstname," ",LEFT(u.user_middlename,1)) as user_fullname'),
                    'test_type_name',
                    DB::raw('DATE(ta.date_created) as date_applied')
                    )
                ->join('users as u', 'u.user_id', '=', 'ta.t_a_applicant_user_id')
                ->join('school_rooms as sh', 'sh.school_room_id', '=', 'ta.t_a_school_room_id')
                ->join('user_family_background as fb', 'fb.family_background_user_id', '=', 'u.user_id')
                ->join('test_types as tt', 'tt.test_type_id', '=', 'ta.t_a_test_type_id')
                ->join('test_status as ts', 'ts.test_status_id', '=', 'ta.t_a_test_status_id')
                ->join('school_years as sy', 'sy.school_year_id', '=', 'ta.t_a_school_year_id')
                ->where('t_a_isactive','=',1)
                ->whereNotNull('t_a_school_room_id')
                ->where('ts.test_status_details','=','Processing')
                ->orderBy($this->column_order, 'asc')
                ->get()
                ->toArray();
            }else{
                $this->assigned_applicant_data = DB::table('test_applications as ta')
                ->select(
                    // '*',
                    't_a_id',
                    'school_room_id',
                    'school_room_name',
                    'school_room_test_center',
                    'school_year_details',
                    'school_room_test_time_start',
                    'school_room_test_time_end',
                    'school_year_details',
                    DB::raw('CONCAT(u.user_lastname,", ",u.user_firstname," ",LEFT(u.user_middlename,1)) as user_fullname'),
                    'test_type_name',
                    DB::raw('DATE(ta.date_created) as date_applied')
                    )
                ->join('users as u', 'u.user_id', '=', 'ta.t_a_applicant_user_id')
                ->join('school_rooms as sh', 'sh.school_room_id', '=', 'ta.t_a_school_room_id')
                ->join('user_family_background as fb', 'fb.family_background_user_id', '=', 'u.user_id')
                ->join('test_types as tt', 'tt.test_type_id', '=', 'ta.t_a_test_type_id')
                ->join('test_status as ts', 'ts.test_status_id', '=', 'ta.t_a_test_status_id')
                ->join('school_years as sy', 'sy.school_year_id', '=', 'ta.t_a_school_year_id')
                ->where('t_a_isactive','=',1)
                ->whereNotNull('t_a_school_room_id')
                ->where('ts.test_status_details','=','Processing')
                ->where('t_a_test_type_id','=',$this->assigned_test_type_id)
                ->orderBy($this->column_order, 'asc')
                ->get()
                ->toArray();
            }

            $this->assigned_selected = [];
            $this->unassigned_selected = [];

            // dd($this->assigned_applicant_data);
            

            foreach ($this->unassigned_applicant_data  as $key => $value) {
                array_push($this->unassigned_selected,[$value->t_a_id=>false]);
            }

            foreach ($this->assigned_applicant_data  as $key => $value) {
                array_push($this->assigned_selected,[$value->t_a_id=>false]);
            }

            // dd($this->school_rooms);
        }
    }
    public function render(){
        return view('livewire.admin.room-management',[
            'user_details' => $this->user_details
            ])
            ->layout('layouts.admin',[
                'title'=>$this->title]);
    }

    public function unassigned_applicant_filterView(){
        $this->dispatchBrowserEvent('swal:redirect',[
            'position'          									=> 'center',
            'icon'              									=> 'success',
            'title'             									=> 'Successfully changed filter!',
            'showConfirmButton' 									=> 'true',
            'timer'             									=> '1000',
            'link'              									=> '#'
        ]);

    }

    public function assigned_applicant_filterView(){
        $this->dispatchBrowserEvent('swal:redirect',[
            'position'          									=> 'center',
            'icon'              									=> 'success',
            'title'             									=> 'Successfully changed filter!',
            'showConfirmButton' 									=> 'true',
            'timer'             									=> '1000',
            'link'              									=> '#'
        ]);

    }

    

    

    public function unassigned_applicant_exam_type_filter(){

        if($this->unassigned_test_type_id == 0){
            $this->unassigned_applicant_data = DB::table('test_applications as ta')
            ->select(
                // '*',
                't_a_id',
                'school_year_details',
                DB::raw('CONCAT(u.user_lastname,", ",u.user_firstname," ",LEFT(u.user_middlename,1)) as user_fullname'),
                'test_type_name',
                DB::raw('DATE(ta.date_created) as date_applied')
                )
            ->join('users as u', 'u.user_id', '=', 'ta.t_a_applicant_user_id')
            ->join('user_family_background as fb', 'fb.family_background_user_id', '=', 'u.user_id')
            ->join('test_types as tt', 'tt.test_type_id', '=', 'ta.t_a_test_type_id')
            ->join('test_status as ts', 'ts.test_status_id', '=', 'ta.t_a_test_status_id')
            ->join('school_years as sy', 'sy.school_year_id', '=', 'ta.t_a_school_year_id')
            ->where('t_a_isactive','=',1)
            ->whereNull('t_a_school_room_id')
            ->where('ts.test_status_details','=','Processing')
            ->orderBy($this->column_order, 'asc')
            ->get()
            ->toArray();
        }else{
            $this->unassigned_applicant_data = DB::table('test_applications as ta')
            ->select(
                // '*',
                't_a_id',
                'school_year_details',
                DB::raw('CONCAT(u.user_lastname,", ",u.user_firstname," ",LEFT(u.user_middlename,1)) as user_fullname'),
                'test_type_name',
                DB::raw('DATE(ta.date_created) as date_applied')
                )
            ->join('users as u', 'u.user_id', '=', 'ta.t_a_applicant_user_id')
            ->join('user_family_background as fb', 'fb.family_background_user_id', '=', 'u.user_id')
            ->join('test_types as tt', 'tt.test_type_id', '=', 'ta.t_a_test_type_id')
            ->join('test_status as ts', 'ts.test_status_id', '=', 'ta.t_a_test_status_id')
            ->join('school_years as sy', 'sy.school_year_id', '=', 'ta.t_a_school_year_id')
            ->where('t_a_isactive','=',1)
            ->whereNull('t_a_school_room_id')
            ->where('test_status_details','=','Processing')
            ->where('t_a_test_type_id','=',$this->unassigned_test_type_id)
            ->orderBy($this->column_order, 'asc')
            ->get()
            ->toArray();
        }

        if($this->assigned_test_type_id == 0){
            $this->assigned_applicant_data = DB::table('test_applications as ta')
            ->select(
                // '*',
                't_a_id',
                    'school_room_id',
                    'school_room_name',
                    'school_room_test_center',
                    'school_year_details',
                    'school_room_test_time_start',
                    'school_room_test_time_end',
                    'school_year_details',
                DB::raw('CONCAT(u.user_lastname,", ",u.user_firstname," ",LEFT(u.user_middlename,1)) as user_fullname'),
                'test_type_name',
                DB::raw('DATE(ta.date_created) as date_applied')
                )
            ->join('users as u', 'u.user_id', '=', 'ta.t_a_applicant_user_id')
            ->join('school_rooms as sh', 'sh.school_room_id', '=', 'ta.t_a_school_room_id')
            ->join('user_family_background as fb', 'fb.family_background_user_id', '=', 'u.user_id')
            ->join('test_types as tt', 'tt.test_type_id', '=', 'ta.t_a_test_type_id')
            ->join('test_status as ts', 'ts.test_status_id', '=', 'ta.t_a_test_status_id')
            ->join('school_years as sy', 'sy.school_year_id', '=', 'ta.t_a_school_year_id')
            ->where('t_a_isactive','=',1)
            ->whereNotNull('t_a_school_room_id')
            ->where('ts.test_status_details','=','Processing')
            ->orderBy($this->column_order, 'asc')
            ->get()
            ->toArray();
        }else{
            $this->assigned_applicant_data = DB::table('test_applications as ta')
            ->select(
                // '*',
                't_a_id',
                'school_room_id',
                'school_room_name',
                'school_room_test_center',
                'school_year_details',
                'school_room_test_time_start',
                'school_room_test_time_end',
                'school_year_details',
                DB::raw('CONCAT(u.user_lastname,", ",u.user_firstname," ",LEFT(u.user_middlename,1)) as user_fullname'),
                'test_type_name',
                DB::raw('DATE(ta.date_created) as date_applied')
                )
            ->join('users as u', 'u.user_id', '=', 'ta.t_a_applicant_user_id')
            ->join('school_rooms as sh', 'sh.school_room_id', '=', 'ta.t_a_school_room_id')
            ->join('user_family_background as fb', 'fb.family_background_user_id', '=', 'u.user_id')
            ->join('test_types as tt', 'tt.test_type_id', '=', 'ta.t_a_test_type_id')
            ->join('test_status as ts', 'ts.test_status_id', '=', 'ta.t_a_test_status_id')
            ->join('school_years as sy', 'sy.school_year_id', '=', 'ta.t_a_school_year_id')
            ->where('t_a_isactive','=',1)
            ->whereNotNull('t_a_school_room_id')
            ->where('ts.test_status_details','=','Processing')
            ->where('t_a_test_type_id','=',$this->assigned_test_type_id)
            ->orderBy($this->column_order, 'asc')
            ->get()
            ->toArray();
        }

        $this->assigned_selected = [];
        $this->unassigned_selected = [];
        $this->assigned_selected_all = false;
        $this->unassigned_selected_all = false;

        foreach ($this->unassigned_applicant_data  as $key => $value) {
            array_push($this->unassigned_selected,[$value->t_a_id=>false]);
        }

        foreach ($this->assigned_applicant_data  as $key => $value) {
            array_push($this->assigned_selected,[$value->t_a_id=>false]);
        }
    }

    public function school_room_filterView(){
        $this->dispatchBrowserEvent('swal:redirect',[
            'position'          									=> 'center',
            'icon'              									=> 'success',
            'title'             									=> 'Successfully changed filter!',
            'showConfirmButton' 									=> 'true',
            'timer'             									=> '1000',
            'link'              									=> '#'
        ]);

    }

    public function assigned_applicant_exam_type_filter(){
        $this->assigned_selected = [];
        $this->unassigned_selected = [];


        if($this->unassigned_test_type_id == 0){
            $this->unassigned_applicant_data = DB::table('test_applications as ta')
            ->select(
                // '*',
                't_a_id',
                'school_year_details',
                DB::raw('CONCAT(u.user_lastname,", ",u.user_firstname," ",LEFT(u.user_middlename,1)) as user_fullname'),
                'test_type_name',
                DB::raw('DATE(ta.date_created) as date_applied')
                )
            ->join('users as u', 'u.user_id', '=', 'ta.t_a_applicant_user_id')
            ->join('user_family_background as fb', 'fb.family_background_user_id', '=', 'u.user_id')
            ->join('test_types as tt', 'tt.test_type_id', '=', 'ta.t_a_test_type_id')
            ->join('test_status as ts', 'ts.test_status_id', '=', 'ta.t_a_test_status_id')
            ->join('school_years as sy', 'sy.school_year_id', '=', 'ta.t_a_school_year_id')
            ->where('t_a_isactive','=',1)
            ->whereNull('t_a_school_room_id')
            ->where('ts.test_status_details','=','Processing')
            ->orderBy($this->column_order, 'asc')
            ->get()
            ->toArray();
        }else{
            $this->unassigned_applicant_data = DB::table('test_applications as ta')
            ->select(
                // '*',
                't_a_id',
                'school_year_details',
                DB::raw('CONCAT(u.user_lastname,", ",u.user_firstname," ",LEFT(u.user_middlename,1)) as user_fullname'),
                'test_type_name',
                DB::raw('DATE(ta.date_created) as date_applied')
                )
            ->join('users as u', 'u.user_id', '=', 'ta.t_a_applicant_user_id')
            ->join('user_family_background as fb', 'fb.family_background_user_id', '=', 'u.user_id')
            ->join('test_types as tt', 'tt.test_type_id', '=', 'ta.t_a_test_type_id')
            ->join('test_status as ts', 'ts.test_status_id', '=', 'ta.t_a_test_status_id')
            ->join('school_years as sy', 'sy.school_year_id', '=', 'ta.t_a_school_year_id')
            ->where('t_a_isactive','=',1)
            ->whereNull('t_a_school_room_id')
            ->where('test_status_details','=','Processing')
            ->where('t_a_test_type_id','=',$this->unassigned_test_type_id)
            ->orderBy($this->column_order, 'asc')
            ->get()
            ->toArray();
        }

        if($this->assigned_test_type_id == 0){
            $this->assigned_applicant_data = DB::table('test_applications as ta')
            ->select(
                // '*',
                't_a_id',
                    'school_room_id',
                    'school_room_name',
                    'school_room_test_center',
                    'school_year_details',
                    'school_room_test_time_start',
                    'school_room_test_time_end',
                    'school_year_details',
                DB::raw('CONCAT(u.user_lastname,", ",u.user_firstname," ",LEFT(u.user_middlename,1)) as user_fullname'),
                'test_type_name',
                DB::raw('DATE(ta.date_created) as date_applied')
                )
            ->join('users as u', 'u.user_id', '=', 'ta.t_a_applicant_user_id')
            ->join('school_rooms as sh', 'sh.school_room_id', '=', 'ta.t_a_school_room_id')
            ->join('user_family_background as fb', 'fb.family_background_user_id', '=', 'u.user_id')
            ->join('test_types as tt', 'tt.test_type_id', '=', 'ta.t_a_test_type_id')
            ->join('test_status as ts', 'ts.test_status_id', '=', 'ta.t_a_test_status_id')
            ->join('school_years as sy', 'sy.school_year_id', '=', 'ta.t_a_school_year_id')
            ->where('t_a_isactive','=',1)
            ->whereNotNull('t_a_school_room_id')
            ->where('ts.test_status_details','=','Processing')
            ->orderBy($this->column_order, 'asc')
            ->get()
            ->toArray();
        }else{
            $this->assigned_applicant_data = DB::table('test_applications as ta')
            ->select(
                // '*',
                't_a_id',
                'school_room_id',
                'school_room_name',
                'school_room_test_center',
                'school_year_details',
                'school_room_test_time_start',
                'school_room_test_time_end',
                'school_year_details',
                DB::raw('CONCAT(u.user_lastname,", ",u.user_firstname," ",LEFT(u.user_middlename,1)) as user_fullname'),
                'test_type_name',
                DB::raw('DATE(ta.date_created) as date_applied')
                )
            ->join('users as u', 'u.user_id', '=', 'ta.t_a_applicant_user_id')
            ->join('school_rooms as sh', 'sh.school_room_id', '=', 'ta.t_a_school_room_id')
            ->join('user_family_background as fb', 'fb.family_background_user_id', '=', 'u.user_id')
            ->join('test_types as tt', 'tt.test_type_id', '=', 'ta.t_a_test_type_id')
            ->join('test_status as ts', 'ts.test_status_id', '=', 'ta.t_a_test_status_id')
            ->join('school_years as sy', 'sy.school_year_id', '=', 'ta.t_a_school_year_id')
            ->where('t_a_isactive','=',1)
            ->whereNotNull('t_a_school_room_id')
            ->where('ts.test_status_details','=','Processing')
            ->where('t_a_test_type_id','=',$this->assigned_test_type_id)
            ->orderBy($this->column_order, 'asc')
            ->get()
            ->toArray();
        }

        foreach ($this->unassigned_applicant_data  as $key => $value) {
            array_push($this->unassigned_selected,[$value->t_a_id=>false]);
        }

        foreach ($this->assigned_applicant_data  as $key => $value) {
            array_push($this->assigned_selected,[$value->t_a_id=>false]);
        }
    }

    public function unassigned_applicant_select_all(){
        $this->unassigned_selected=[];
        if($this->unassigned_selected_all){
            foreach ($this->unassigned_applicant_data  as $key => $value) {
                array_push($this->unassigned_selected,[$value->t_a_id=>true]);
            }
        }else{
            foreach ($this->unassigned_applicant_data  as $key => $value) {
                array_push($this->unassigned_selected,[$value->t_a_id=>false]);
            }
        }

 
    }

    public function assigned_applicant_select_all(){
        $this->assigned_selected=[];
        if($this->assigned_selected_all){
            foreach ($this->assigned_applicant_data  as $key => $value) {
                array_push($this->assigned_selected,[$value->t_a_id=>true]);
            }
        }else{
            foreach ($this->assigned_applicant_data  as $key => $value) {
                array_push($this->assigned_selected,[$value->t_a_id=>false]);
            }
        }
    }

    public function assigning_room_check(){
        
        $this->unassigned_valid = false;
        foreach ($this->unassigned_applicant_data  as $key => $value) {
            if($this->unassigned_selected[$key][$value->t_a_id]){
                $this->unassigned_valid = true;
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
            $this->dispatchBrowserEvent('openModal','assignModal');
        }
    }

    public function assigning_room(){
        $this->unassigned_valid = false;
        $examinees_count = 0;
        foreach ($this->unassigned_applicant_data  as $key => $value) {
            if($this->unassigned_selected[$key][$value->t_a_id]){
                $this->unassigned_valid = true;
                $examinees_count++;
            }
        }
        // accessrole read
        $this->access_role = [
            'C' => true,
            'R' => true,
            'U' => true,
            'D' => true
        ];
        $current_examinees_count = DB::table('test_applications as ta')
            ->select(DB::raw('count(*) as current_examinees_count'))
            ->join('test_status as ts', 'ts.test_status_id', '=', 'ta.t_a_test_status_id')
            ->where('t_a_school_room_id','=', $this->unassigned_school_room_id)
            ->where('t_a_isactive','=',1)
            ->where('ts.test_status_details','=','Processing')             
            ->first()->current_examinees_count;
        $room_capacity = DB::table('school_rooms')
            ->select('school_room_capacity')
            ->where('school_room_id','=',$this->unassigned_school_room_id)
            ->where('school_room_isactive','=',1)
            ->first()->school_room_capacity;
        if($current_examinees_count+$examinees_count > $room_capacity){
            $this->dispatchBrowserEvent('swal:redirect',[
                'position'          									=> 'center',
                'icon'              									=> 'warning',
                'title'             									=> 'The selected examinees exceeds the room capacity! <br> capacity left ('.($room_capacity-$current_examinees_count).')',
                'showConfirmButton' 									=> 'true',
                'timer'             									=> '1500',
                'link'              									=> '#'
             ]);
             return;
        }
        if($this->unassigned_valid &&  $this->access_role['U'] ){
            foreach ($this->unassigned_applicant_data  as $key => $value) {
                if($this->unassigned_selected[$key][$value->t_a_id]){
                    // dd($this->unassigned_selected[$key]);
                    // update here
                    DB::table('test_applications as ta')
                    ->join('test_status as ts', 'ts.test_status_id', '=', 'ta.t_a_test_status_id')
                    ->where(['t_a_id'=> $value->t_a_id,
                            't_a_isactive'=>1,
                            'ts.test_status_details'=>'Processing'])
                    ->update([
                            't_a_assigned_by'=> $this->user_details['user_id'],
                            't_a_school_room_id' => $this->unassigned_school_room_id,
                            't_a_test_status_id' =>((array) DB::table('test_status')
                                ->where('test_status_details', '=', 'Processing')
                            ->select('test_status_id as t_a_test_status_id')
                            ->first())['t_a_test_status_id']
                    ]);
                    
                }
            }
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

        if($this->unassigned_test_type_id == 0){
            $this->unassigned_applicant_data = DB::table('test_applications as ta')
            ->select(
                // '*',
                't_a_id',
                'school_year_details',
                DB::raw('CONCAT(u.user_lastname,", ",u.user_firstname," ",LEFT(u.user_middlename,1)) as user_fullname'),
                'test_type_name',
                DB::raw('DATE(ta.date_created) as date_applied')
                )
            ->join('users as u', 'u.user_id', '=', 'ta.t_a_applicant_user_id')
            ->join('user_family_background as fb', 'fb.family_background_user_id', '=', 'u.user_id')
            ->join('test_types as tt', 'tt.test_type_id', '=', 'ta.t_a_test_type_id')
            ->join('test_status as ts', 'ts.test_status_id', '=', 'ta.t_a_test_status_id')
            ->join('school_years as sy', 'sy.school_year_id', '=', 'ta.t_a_school_year_id')
            ->where('t_a_isactive','=',1)
            ->whereNull('t_a_school_room_id')
            ->where('ts.test_status_details','=','Processing')
            ->orderBy($this->column_order, 'asc')
            ->get()
            ->toArray();
        }else{
            $this->unassigned_applicant_data = DB::table('test_applications as ta')
            ->select(
                // '*',
                't_a_id',
                'school_year_details',
                DB::raw('CONCAT(u.user_lastname,", ",u.user_firstname," ",LEFT(u.user_middlename,1)) as user_fullname'),
                'test_type_name',
                DB::raw('DATE(ta.date_created) as date_applied')
                )
            ->join('users as u', 'u.user_id', '=', 'ta.t_a_applicant_user_id')
            ->join('user_family_background as fb', 'fb.family_background_user_id', '=', 'u.user_id')
            ->join('test_types as tt', 'tt.test_type_id', '=', 'ta.t_a_test_type_id')
            ->join('test_status as ts', 'ts.test_status_id', '=', 'ta.t_a_test_status_id')
            ->join('school_years as sy', 'sy.school_year_id', '=', 'ta.t_a_school_year_id')
            ->where('t_a_isactive','=',1)
            ->whereNull('t_a_school_room_id')
            ->where('test_status_details','=','Processing')
            ->where('t_a_test_type_id','=',$this->unassigned_test_type_id)
            ->orderBy($this->column_order, 'asc')
            ->get()
            ->toArray();
        }
        $this->unassigned_selected = [];

        foreach ($this->unassigned_applicant_data  as $key => $value) {
            array_push($this->unassigned_selected,[$value->t_a_id=>false]);
        }
        if($this->unassigned_valid){
            $this->dispatchBrowserEvent('swal:remove_backdrop',[
                'position'          									=> 'center',
                'icon'              									=> 'success',
                'title'             									=> 'Successfully assigned room!',
                'showConfirmButton' 									=> 'true',
                'timer'             									=> '1500',
                'link'              									=> '#'
            ]);
            $this->dispatchBrowserEvent('openModal','assignModal');
            $this->unassigned_valid = false;
        }
        
    }

    public function reassigning_room_check(){
        $this->assigned_valid = false;
        foreach ($this->assigned_applicant_data  as $key => $value) {
            if($this->assigned_selected[$key][$value->t_a_id]){
                $this->assigned_valid = true;
            }
        }

        if(!$this->assigned_valid){
            $this->dispatchBrowserEvent('swal:remove_backdrop',[
                'position'          									=> 'center',
                'icon'              									=> 'warning',
                'title'             									=> 'Please select applicant!',
                'showConfirmButton' 									=> 'true',
                'timer'             									=> '1500',
                'link'              									=> '#'
             ]);
        }else{
            $this->dispatchBrowserEvent('openModal','reassignModal');
        }
    }
    public function remove_room_check(){
        $this->remove_valid = false;
        foreach ($this->assigned_applicant_data  as $key => $value) {
            if($this->assigned_selected[$key][$value->t_a_id]){
                $this->remove_valid = true;
            }
        }

        if(!$this->remove_valid){
            $this->dispatchBrowserEvent('swal:remove_backdrop',[
                'position'          									=> 'center',
                'icon'              									=> 'warning',
                'title'             									=> 'Please select applicant!',
                'showConfirmButton' 									=> 'true',
                'timer'             									=> '1500',
                'link'              									=> '#'
             ]);
        }else{
            $this->dispatchBrowserEvent('openModal','removeassignedRoom');
        }
    }

    public function remove_room(){
        $this->remove_valid = false;
        foreach ($this->assigned_applicant_data  as $key => $value) {
            if($this->assigned_selected[$key][$value->t_a_id]){
                $this->remove_valid = true;
            }
        }

        // accessrole read
        $this->access_role = [
            'C' => true,
            'R' => true,
            'U' => true,
            'D' => true
        ];

        if($this->remove_valid &&  $this->access_role['U'] ){
            foreach ($this->assigned_applicant_data  as $key => $value) {
                if($this->assigned_selected[$key][$value->t_a_id]){
                    // dd($this->unassigned_selected[$key]);
                    // update here
                    DB::table('test_applications as ta')
                    ->join('test_status as ts', 'ts.test_status_id', '=', 'ta.t_a_test_status_id')
                    ->where(['t_a_id'=> $value->t_a_id,
                            't_a_isactive'=>1,
                            'ts.test_status_details'=>'Processing'])
                    ->update([
                            't_a_assigned_by'=> NULL,
                            't_a_school_room_id' => NULL,
                            't_a_test_status_id' =>((array) DB::table('test_status')
                                ->where('test_status_details', '=', 'Processing')
                            ->select('test_status_id as t_a_test_status_id')
                            ->first())['t_a_test_status_id']
                    ]);
                    
                }
            }
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

        if($this->assigned_test_type_id == 0){
            $this->assigned_applicant_data = DB::table('test_applications as ta')
            ->select(
                // '*',
                't_a_id',
                'school_room_id',
                'school_room_name',
                'school_room_test_center',
                'school_year_details',
                'school_room_test_time_start',
                'school_room_test_time_end',
                'school_year_details',
                DB::raw('CONCAT(u.user_lastname,", ",u.user_firstname," ",LEFT(u.user_middlename,1)) as user_fullname'),
                'test_type_name',
                DB::raw('DATE(ta.date_created) as date_applied')
                )
            ->join('users as u', 'u.user_id', '=', 'ta.t_a_applicant_user_id')
            ->join('school_rooms as sh', 'sh.school_room_id', '=', 'ta.t_a_school_room_id')
            ->join('user_family_background as fb', 'fb.family_background_user_id', '=', 'u.user_id')
            ->join('test_types as tt', 'tt.test_type_id', '=', 'ta.t_a_test_type_id')
            ->join('test_status as ts', 'ts.test_status_id', '=', 'ta.t_a_test_status_id')
            ->join('school_years as sy', 'sy.school_year_id', '=', 'ta.t_a_school_year_id')
            ->where('t_a_isactive','=',1)
            ->whereNotNull('t_a_school_room_id')
            ->where('ts.test_status_details','=','Processing')
            ->orderBy($this->column_order, 'asc')
            ->get()
            ->toArray();
        }else{
            $this->assigned_applicant_data = DB::table('test_applications as ta')
            ->select(
                // '*',
                't_a_id',
                'school_room_id',
                'school_room_name',
                'school_room_test_center',
                'school_year_details',
                'school_room_test_time_start',
                'school_room_test_time_end',
                'school_year_details',
                DB::raw('CONCAT(u.user_lastname,", ",u.user_firstname," ",LEFT(u.user_middlename,1)) as user_fullname'),
                'test_type_name',
                DB::raw('DATE(ta.date_created) as date_applied')
                )
            ->join('users as u', 'u.user_id', '=', 'ta.t_a_applicant_user_id')
            ->join('school_rooms as sh', 'sh.school_room_id', '=', 'ta.t_a_school_room_id')
            ->join('user_family_background as fb', 'fb.family_background_user_id', '=', 'u.user_id')
            ->join('test_types as tt', 'tt.test_type_id', '=', 'ta.t_a_test_type_id')
            ->join('test_status as ts', 'ts.test_status_id', '=', 'ta.t_a_test_status_id')
            ->join('school_years as sy', 'sy.school_year_id', '=', 'ta.t_a_school_year_id')
            ->where('t_a_isactive','=',1)
            ->whereNotNull('t_a_school_room_id')
            ->where('ts.test_status_details','=','Processing')
            ->where('t_a_test_type_id','=',$this->assigned_test_type_id)
            ->orderBy($this->column_order, 'asc')
            ->get()
            ->toArray();
        }
        $this->assigned_selected = [];

        foreach ($this->assigned_applicant_data  as $key => $value) {
            array_push($this->assigned_selected,[$value->t_a_id=>false]);
        }
        if($this->remove_valid){
            $this->dispatchBrowserEvent('swal:remove_backdrop',[
                'position'          									=> 'center',
                'icon'              									=> 'success',
                'title'             									=> 'Successfully removed a room!',
                'showConfirmButton' 									=> 'true',
                'timer'             									=> '1500',
                'link'              									=> '#'
            ]);
            $this->remove_valid = false;
        }
    }

    

    public function reassigning_room(){
        $this->assigned_valid = false;
        $examinees_count = 0;
        foreach ($this->assigned_applicant_data  as $key => $value) {
            if($this->assigned_selected[$key][$value->t_a_id]){
                $this->assigned_valid = true;
                $examinees_count++;
            }
        }

        // accessrole read
        $this->access_role = [
            'C' => true,
            'R' => true,
            'U' => true,
            'D' => true
        ];
        $current_examinees_count = DB::table('test_applications as ta')
        ->select(DB::raw('count(*) as current_examinees_count'))
        ->join('test_status as ts', 'ts.test_status_id', '=', 'ta.t_a_test_status_id')
        ->where('t_a_school_room_id','=', $this->assigned_school_room_id)
        ->where('t_a_isactive','=',1)
        ->where('ts.test_status_details','=','Processing')             
        ->first()->current_examinees_count;
        $room_capacity = DB::table('school_rooms')
            ->select('school_room_capacity')
            ->where('school_room_id','=',$this->assigned_school_room_id)
            ->where('school_room_isactive','=',1)
            ->first()->school_room_capacity;
        if($current_examinees_count+$examinees_count > $room_capacity){
            $this->dispatchBrowserEvent('swal:redirect',[
                'position'          									=> 'center',
                'icon'              									=> 'warning',
                'title'             									=> 'The selected examinees exceeds the room capacity! <br> capacity left ('.($room_capacity-$current_examinees_count).')',
                'showConfirmButton' 									=> 'true',
                'timer'             									=> '1500',
                'link'              									=> '#'
            ]);
            return;
        }

        if($this->assigned_valid &&  $this->access_role['U'] ){
            foreach ($this->assigned_applicant_data  as $key => $value) {
                if($this->assigned_selected[$key][$value->t_a_id]){
                    // dd($this->unassigned_selected[$key]);
                    // update here
                    DB::table('test_applications as ta')
                    ->join('test_status as ts', 'ts.test_status_id', '=', 'ta.t_a_test_status_id')
                    ->where(['t_a_id'=> $value->t_a_id,
                            't_a_isactive'=>1,
                            'ts.test_status_details'=>'Processing'])
                    ->update([
                            't_a_assigned_by'=> $this->user_details['user_id'],
                            't_a_school_room_id' => $this->assigned_school_room_id,
                            't_a_test_status_id' =>((array) DB::table('test_status')
                                ->where('test_status_details', '=', 'Processing')
                            ->select('test_status_id as t_a_test_status_id')
                            ->first())['t_a_test_status_id']
                    ]);
                    
                }
            }
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

        if($this->assigned_test_type_id == 0){
            $this->assigned_applicant_data = DB::table('test_applications as ta')
            ->select(
                // '*',
                't_a_id',
                'school_room_id',
                'school_room_name',
                'school_room_test_center',
                'school_year_details',
                'school_room_test_time_start',
                'school_room_test_time_end',
                'school_year_details',
                DB::raw('CONCAT(u.user_lastname,", ",u.user_firstname," ",LEFT(u.user_middlename,1)) as user_fullname'),
                'test_type_name',
                DB::raw('DATE(ta.date_created) as date_applied')
                )
            ->join('users as u', 'u.user_id', '=', 'ta.t_a_applicant_user_id')
            ->join('school_rooms as sh', 'sh.school_room_id', '=', 'ta.t_a_school_room_id')
            ->join('user_family_background as fb', 'fb.family_background_user_id', '=', 'u.user_id')
            ->join('test_types as tt', 'tt.test_type_id', '=', 'ta.t_a_test_type_id')
            ->join('test_status as ts', 'ts.test_status_id', '=', 'ta.t_a_test_status_id')
            ->join('school_years as sy', 'sy.school_year_id', '=', 'ta.t_a_school_year_id')
            ->where('t_a_isactive','=',1)
            ->whereNotNull('t_a_school_room_id')
            ->where('ts.test_status_details','=','Processing')
            ->orderBy($this->column_order, 'asc')
            ->get()
            ->toArray();
        }else{
            $this->assigned_applicant_data = DB::table('test_applications as ta')
            ->select(
                // '*',
                't_a_id',
                'school_room_id',
                'school_room_name',
                'school_room_test_center',
                'school_year_details',
                'school_room_test_time_start',
                'school_room_test_time_end',
                'school_year_details',
                DB::raw('CONCAT(u.user_lastname,", ",u.user_firstname," ",LEFT(u.user_middlename,1)) as user_fullname'),
                'test_type_name',
                DB::raw('DATE(ta.date_created) as date_applied')
                )
            ->join('users as u', 'u.user_id', '=', 'ta.t_a_applicant_user_id')
            ->join('school_rooms as sh', 'sh.school_room_id', '=', 'ta.t_a_school_room_id')
            ->join('user_family_background as fb', 'fb.family_background_user_id', '=', 'u.user_id')
            ->join('test_types as tt', 'tt.test_type_id', '=', 'ta.t_a_test_type_id')
            ->join('test_status as ts', 'ts.test_status_id', '=', 'ta.t_a_test_status_id')
            ->join('school_years as sy', 'sy.school_year_id', '=', 'ta.t_a_school_year_id')
            ->where('t_a_isactive','=',1)
            ->whereNotNull('t_a_school_room_id')
            ->where('ts.test_status_details','=','Processing')
            ->where('t_a_test_type_id','=',$this->assigned_test_type_id)
            ->orderBy($this->column_order, 'asc')
            ->get()
            ->toArray();
        }
        $this->assigned_selected = [];

        foreach ($this->assigned_applicant_data  as $key => $value) {
            array_push($this->assigned_selected,[$value->t_a_id=>false]);
        }
        if($this->assigned_valid){
            $this->dispatchBrowserEvent('swal:remove_backdrop',[
                'position'          									=> 'center',
                'icon'              									=> 'success',
                'title'             									=> 'Successfully re-assigned room!',
                'showConfirmButton' 									=> 'true',
                'timer'             									=> '1500',
                'link'              									=> '#'
            ]);
            $this->assigned_valid = false;
            $this->dispatchBrowserEvent('openModal','reassignModal');
        }
    }
    public function view_application($t_a_id){


        $this->application_view_details = DB::table('test_applications as ta')
            ->select('*',DB::raw('DATE(ta.date_created) as applied_date'))
            ->join('test_types as tt', 'tt.test_type_id', '=', 'ta.t_a_test_type_id')
            ->join('users as us', 'us.user_id', '=', 'ta.t_a_applicant_user_id')
            ->join('user_family_background as fb', 'fb.family_background_user_id', '=', 'ta.t_a_applicant_user_id')
            ->join('test_status as ts', 'ts.test_status_id', '=', 'ta.t_a_test_status_id')
            ->join('school_years as sy', 'sy.school_year_id', '=', 'ta.t_a_school_year_id')
            ->join('cet_types as ct', 'ct.cet_type_id', '=', 'ta.t_a_cet_type_id')
                    
            // ->where('t_a_test_status_id', '=', 
            //     ((array) DB::table('test_types')
            //         ->where('test_type_details', '=', 'College Entrance Test')
            //         ->select('test_type_id as t_a_test_type_id')
            //         ->first())['t_a_test_type_id'])
            
            ->where('t_a_isactive','=',1)
            ->where('t_a_id','=',$t_a_id )
            ->limit(1)
            ->get()
            ->toArray();
            // dd($this->application_view_details);


        
            $this->dispatchBrowserEvent('openModal','view_application_modal');
    }



    

    // rooms crud
    public function active_page($active){
        $this->active = $active;

        $this->assigned_selected = [];
        $this->unassigned_selected = [];
        $this->edit_room =[];

        // dd($this->assigned_applicant_data);
        

        foreach ($this->unassigned_applicant_data  as $key => $value) {
            array_push($this->unassigned_selected,[$value->t_a_id=>false]);
        }

        foreach ($this->assigned_applicant_data  as $key => $value) {
            array_push($this->assigned_selected,[$value->t_a_id=>false]);
        }
    }

    public function add_room_modal(){
        $this->edit_room = null;
        $this->school_room_id = null;
        $this->school_room_college_name = null;
        $this->school_room_college_abr= null;
        $this->school_room_venue = null;
        $this->school_room_name = null;
        $this->school_room_test_center= null;
        $this->school_room_test_date = null;
        $this->school_room_test_time_start = null;
        $this->school_room_test_time_end = null;
        $this->school_room_capacity= null;
        $this->school_room_description= null;
        $this->dispatchBrowserEvent('openModal','addRoomModal');
    }

    //add room
    public function add_room() {

        if (empty($this->school_room_college_name) ||
            empty($this->school_room_college_abr) ||
            empty($this->school_room_venue) ||
            empty($this->school_room_name) ||
            empty($this->school_room_test_center) ||
             
            !is_numeric($this->school_room_capacity) ||
            $this->school_room_capacity <= 0 || $this->school_room_capacity > 500 ||
            empty($this->school_room_test_date) ||
            empty($this->school_room_test_time_start) ||
            empty($this->school_room_test_time_end)) {
         
            $this->successMessage = "Room not added. Please check the input data.";
            return;
        }
    
        $date_regex = "/^\d{4}-\d{2}-\d{2}$/";
        $time_regex = "/^\d{2}:\d{2}$/";
        
        if (!preg_match($date_regex, $this->school_room_test_date) ||
            !preg_match($time_regex, $this->school_room_test_time_start) ||
            !preg_match($time_regex, $this->school_room_test_time_end)) {
            $this->successMessage = "Room not added. Invalid date or time format.";
            return;
        }
    
      
        if(DB::table('school_rooms')->insert([
            'school_room_college_name' => $this->school_room_college_name,
            'school_room_college_abr' => $this->school_room_college_abr,
            'school_room_venue'  => $this->school_room_venue,
            'school_room_name' => $this->school_room_name,
            'school_room_test_center' => $this->school_room_test_center,
            'school_room_test_date' => $this->school_room_test_date,
            'school_room_test_time_start'  => $this->school_room_test_time_start,
            'school_room_test_time_end' => $this->school_room_test_time_end,
            'school_room_capacity' => $this->school_room_capacity,
            'school_room_description' => $this->school_room_description
        ])){
            $this->dispatchBrowserEvent('swal:remove_backdrop',[
                'position'          									=> 'center',
                'icon'              									=> 'success',
                'title'             									=> 'Successfully added a room!',
                'showConfirmButton' 									=> 'true',
                'timer'             									=> '1000',
                'link'              									=> '#'
            ]);
        }else{
            $this->dispatchBrowserEvent('swal:remove_backdrop',[
                'position'          									=> 'center',
                'icon'              									=> 'warning',
                'title'             									=> 'Error adding a room!',
                'showConfirmButton' 									=> 'true',
                'timer'             									=> '1000',
                'link'              									=> '#'
            ]);
        }
        $this->school_rooms = DB::table('school_rooms as sr')
            ->select(
                '*'
            )
            ->get()
            ->toArray();
        
        $this->unassigned_school_room_id = $this->school_rooms[0]->school_room_id;
        $this->assigned_school_room_id = $this->school_rooms[0]->school_room_id;
        
    }

//delete
    public function delete_room_modal($roomId){
        $this->roomToDelete = $roomId;
        $this->dispatchBrowserEvent('openModal','confirmDeleteModal');
    }
    public function deleteRoom($room_id) {
    
        // Perform the room deletion logic
        DB::table('school_rooms')
            ->where('school_room_id', $room_id)
            ->update(['school_room_isactive'=>0]);

        

        $this->dispatchBrowserEvent('swal:remove_backdrop', [
            'position' => 'center',
            'icon' => 'success',
            'title' => 'Room deleted successfully!',
            'showConfirmButton' => true,
            'timer' => 1000,
            'link' => '#'
        ]);
        $this->school_rooms = DB::table('school_rooms as sr')
            ->select(
                '*'
            )
            ->get()
            ->toArray();
        $this->unassigned_school_room_id = $this->school_rooms[0]->school_room_id;
        $this->assigned_school_room_id = $this->school_rooms[0]->school_room_id;
    }

    public function activateRoom($room_id) {
    
        // Perform the room deletion logic
        DB::table('school_rooms')
            ->where('school_room_id', $room_id)
            ->update(['school_room_isactive'=>1]);

        

        $this->dispatchBrowserEvent('swal:remove_backdrop', [
            'position' => 'center',
            'icon' => 'success',
            'title' => 'Room deleted successfully!',
            'showConfirmButton' => true,
            'timer' => 1000,
            'link' => '#'
        ]);
        $this->school_rooms = DB::table('school_rooms as sr')
            ->select(
                '*'
            )
            ->get()
            ->toArray();
        $this->unassigned_school_room_id = $this->school_rooms[0]->school_room_id;
        $this->assigned_school_room_id = $this->school_rooms[0]->school_room_id;
    }

    public function view_room_details($school_room_id){
        $this->view_room = DB::table('school_rooms as sr')
            ->select(
                '*'
                )
            ->where(['school_room_id'=>$school_room_id])
            ->get()
            ->toArray();
        $this->edit_room =$this->view_room ;
            $this->school_room_id = $this->view_room[0]->school_room_id;
            $this->school_room_college_name = $this->view_room[0]->school_room_college_name;
            $this->school_room_college_abr = $this->view_room[0]->school_room_college_abr;
            $this->school_room_venue = $this->view_room[0]->school_room_venue;
            $this->school_room_name = $this->view_room[0]->school_room_name;
            $this->school_room_test_center = $this->view_room[0]->school_room_test_center;
            $this->school_room_test_date = $this->view_room[0]->school_room_test_date;
            $this->school_room_test_time_start = substr($this->view_room[0]->school_room_test_time_start,0,5);
            $this->school_room_test_time_end = substr($this->view_room[0]->school_room_test_time_end,0,5);
            $this->school_room_capacity = $this->view_room[0]->school_room_capacity ;
            $this->school_room_description = $this->view_room[0]->school_room_description;
            $this->dispatchBrowserEvent('openModal','ViewRoomModal');
        
    }

    public function edit_room_details($school_room_id){
        $this->edit_room = DB::table('school_rooms as sr')
            ->select(
                '*'
                )
            ->where(['school_room_id'=>$school_room_id])
            ->get()
            ->toArray();
            
            $this->school_room_id = $this->edit_room[0]->school_room_id;
            $this->school_room_college_name = $this->edit_room[0]->school_room_college_name;
            $this->school_room_college_abr = $this->edit_room[0]->school_room_college_abr;
            $this->school_room_venue = $this->edit_room[0]->school_room_venue;
            $this->school_room_name = $this->edit_room[0]->school_room_name;
            $this->school_room_test_center = $this->edit_room[0]->school_room_test_center;
            $this->school_room_test_date = $this->edit_room[0]->school_room_test_date;
            $this->school_room_test_time_start = substr($this->edit_room[0]->school_room_test_time_start,0,5);
            $this->school_room_test_time_end = substr($this->edit_room[0]->school_room_test_time_end,0,5);
            $this->school_room_capacity = $this->edit_room[0]->school_room_capacity ;
            $this->school_room_description = $this->edit_room[0]->school_room_description;


        $this->unassigned_school_room_id = $this->school_rooms[0]->school_room_id;
        $this->assigned_school_room_id = $this->school_rooms[0]->school_room_id;

        $this->dispatchBrowserEvent('openModal','EditRoomModal');


    }

    public function edit_room($school_room_id){
        // dd($school_room_id);
        if (empty($this->school_room_college_name) ||
            empty($this->school_room_college_abr) ||
            empty($this->school_room_venue) ||
            empty($this->school_room_name) ||
            empty($this->school_room_test_center) ||
             
            !is_numeric($this->school_room_capacity) ||
            $this->school_room_capacity <= 0 || $this->school_room_capacity > 500 ||
            empty($this->school_room_test_date) ||
            empty($this->school_room_test_time_start) ||
            empty($this->school_room_test_time_end)) {
         
            $this->successMessage = "Room not added. Please check the input data.";
            return;
        }
    
        $date_regex = "/^\d{4}-\d{2}-\d{2}$/";
        $time_regex = "/^\d{2}:\d{2}$/";
        
        if (!preg_match($date_regex, $this->school_room_test_date) ||
            !preg_match($time_regex, $this->school_room_test_time_start) ||
            !preg_match($time_regex, $this->school_room_test_time_end)) {
            $this->successMessage = "Room not added. Invalid date or time format.";
            return;
        }
    
        
        if(DB::table('school_rooms')
        ->where(['school_room_id'=> $school_room_id])
        ->update([
            'school_room_college_name' => $this->school_room_college_name,
            'school_room_college_abr' => $this->school_room_college_abr,
            'school_room_venue'  => $this->school_room_venue,
            'school_room_name' => $this->school_room_name,
            'school_room_test_center' => $this->school_room_test_center,
            'school_room_test_date' => $this->school_room_test_date,
            'school_room_test_time_start'  => $this->school_room_test_time_start,
            'school_room_test_time_end' => $this->school_room_test_time_end,
            'school_room_capacity' => $this->school_room_capacity,
            'school_room_description' => $this->school_room_description
        ])){
            $this->dispatchBrowserEvent('swal:remove_backdrop',[
                'position'          									=> 'center',
                'icon'              									=> 'success',
                'title'             									=> 'Successfully updated a room!',
                'showConfirmButton' 									=> 'true',
                'timer'             									=> '1000',
                'link'              									=> '#'
            ]);
        }else{
            $this->dispatchBrowserEvent('swal:remove_backdrop',[
                'position'          									=> 'center',
                'icon'              									=> 'warning',
                'title'             									=> 'Error updating a room!',
                'showConfirmButton' 									=> 'true',
                'timer'             									=> '1000',
                'link'              									=> '#'
            ]);
        }

        $this->school_rooms = DB::table('school_rooms as sr')
        ->select(
            '*'
        )
        ->get()
        ->toArray();
        
        $this->unassigned_school_room_id = $this->school_rooms[0]->school_room_id;
        $this->assigned_school_room_id = $this->school_rooms[0]->school_room_id;

        $this->edit_room = null;
        
    }

}

