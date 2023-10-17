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

    // school room applicant
    public $school_room_data;
    public $school_room_college_type_id= 0;
    public $school_room_filter;


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
                ->where('ts.test_status_details','=','Accepted')
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
                ->where('test_status_details','=','Accepted')
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
                'Start - End'=> true,
                'Capacity'=> true,								
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
                // dd($this->school_rooms);
                
                
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
                ->where('ts.test_status_details','=','Accepted')
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
                ->where('test_status_details','=','Accepted')
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
            ->where('ts.test_status_details','=','Accepted')
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
            ->where('test_status_details','=','Accepted')
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
            ->where('ts.test_status_details','=','Accepted')
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
            ->where('test_status_details','=','Accepted')
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
        
        if($this->unassigned_selected_all){
            $this->unassigned_selected=[];
            foreach ($this->unassigned_applicant_data  as $key => $value) {
                array_push($this->unassigned_selected,[$value->t_a_id=>true]);
            }
        }else{
            $this->unassigned_selected=[];
            foreach ($this->unassigned_applicant_data  as $key => $value) {
                array_push($this->unassigned_selected,[$value->t_a_id=>false]);
            }
        }

 
    }

    public function assigned_applicant_select_all(){
        
        if($this->pending_selected_all){
            $this->pending_selected=[];
            foreach ($this->pending_applicant_data  as $key => $value) {
                array_push($this->pending_selected,[$value->t_a_id=>true]);
            }
        }else{
            $this->pending_selected=[];
            foreach ($this->pending_applicant_data  as $key => $value) {
                array_push($this->pending_selected,[$value->t_a_id=>false]);
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
        }
    }

    public function assigning_room(){
        $this->unassigned_valid = false;
        foreach ($this->unassigned_applicant_data  as $key => $value) {
            if($this->unassigned_selected[$key][$value->t_a_id]){
                $this->unassigned_valid = true;
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
            
            foreach ($this->unassigned_applicant_data  as $key => $value) {
                if($this->unassigned_selected[$key][$value->t_a_id]){
                    // dd($this->unassigned_selected[$key]);
                    // update here
                    DB::table('test_applications as ta')
                    ->join('test_status as ts', 'ts.test_status_id', '=', 'ta.t_a_test_status_id')
                    ->where(['t_a_id'=> $value->t_a_id,
                            't_a_isactive'=>1,
                            'ts.test_status_details'=>'Accepted'])
                    ->update([
                            't_a_assigned_by'=> $this->user_details['user_id'],
                            't_a_school_room_id' =>$this->unassigned_school_room_id,
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
            ->where('ts.test_status_details','=','Accepted')
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
            ->where('test_status_details','=','Accepted')
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
            $this->unassigned_valid = false;
        }
        
    }

    

    // rooms crud
    public function active_page($active){
        $this->active = $active;
    }
}
