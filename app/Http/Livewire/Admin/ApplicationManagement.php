<?php

namespace App\Http\Livewire\Admin;

// use Livewire\WithPagination;
use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
// use Livewire\WithPagination;

class ApplicationManagement extends Component
{
    // use WithPagination;
    public $user_detais;
    public $title;

    public $active;

    

    public $selected_all;
    public $selected = [];

    // pagination
    public $per_page = 10;

    public $items;
    public $item_first = 0 ;
    public $item_current ;
    public $item_last;
    public $cursor = 0;
    public $next_pages;
    public $next_page_count;
    public $prev_pages;
    public $prev_page_count;
    public $page_number = 1;

    

    // pending applicant data
    public $pending_applicant_data;
    public $pending_test_type_id = 0;
    public $pending_applicant_filter;
    public $pending_selected_all;
    public $pending_selected = [];
    public $declined_pending_valid = false;
    public $declined_pending_reason;
   
    // accepted applicant data
    public $accepted_applicant_data;
    public $accepted_test_type_id= 0;
    public $accepted_applicant_filter;
    public $accepted_selected_all;
    public $accepted_selected = [];
    public $declined_accepted_valid = false;
    public $declined_accepted_reason;
    public $return_reason;

    // declined applicant data
    public $declined_applicant_data;
    public $declined_test_type_id= 0;
    public $declined_applicant_filter;
    public $declined_selected_all;
    public $declined_selected = [];
    public $delete_declined_valid;

    public $application_view_details;
    public $application_user_name;

    public $exam_types;
    public $column_order = 't_a_id';
    public $order_by = 'asc';
    public $access_role ;

    public $return_valid;



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

            if($this->pending_test_type_id == 0){
                $this->pending_applicant_data = DB::table('test_applications as ta')
                ->select(
                    // '*',
                    't_a_id',
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
                ->where('ts.test_status_details','=','Pending')
                ->orderBy($this->column_order, 'asc')
                ->get()
                ->toArray();
            }else{
                $this->pending_applicant_data = DB::table('test_applications as ta')
                ->select(
                    // '*',
                    't_a_id',
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
                ->where('test_status_details','=','Pending')
                ->where('t_a_test_type_id','=',$this->pending_test_type_id)
                ->orderBy($this->column_order, 'asc')
                ->get()
                ->toArray();
            }

            if($this->accepted_test_type_id == 0){
                $this->accepted_applicant_data = DB::table('test_applications as ta')
                ->select(
                    // '*',
                    't_a_id',
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
                ->where('ts.test_status_details','=','Accepted')
                ->orderBy($this->column_order, 'asc')
                ->get()
                ->toArray();
            }else{
                $this->accepted_applicant_data = DB::table('test_applications as ta')
                ->select(
                    // '*',
                    't_a_id',
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
                ->where('test_status_details','=','Accepted')
                ->where('t_a_test_type_id','=',$this->accepted_test_type_id)
                ->orderBy($this->column_order, 'asc')
                ->get()
                ->toArray();
            }

            if($this->declined_test_type_id == 0){
                $this->declined_applicant_data = DB::table('test_applications as ta')
                ->select(
                    // '*',
                    't_a_id',
                    DB::raw('CONCAT(u.user_lastname,", ",u.user_firstname," ",LEFT(u.user_middlename,1)) as user_fullname'),
                    'test_type_name',
                    DB::raw('DATE(ta.date_created) as date_applied'),
                    't_a_declined_reason'
                    )
                ->join('users as u', 'u.user_id', '=', 'ta.t_a_applicant_user_id')
                ->join('user_family_background as fb', 'fb.family_background_user_id', '=', 'u.user_id')
                ->join('test_types as tt', 'tt.test_type_id', '=', 'ta.t_a_test_type_id')
                ->join('test_status as ts', 'ts.test_status_id', '=', 'ta.t_a_test_status_id')
                ->join('school_years as sy', 'sy.school_year_id', '=', 'ta.t_a_school_year_id')
                ->where('t_a_isactive','=',1)
                ->where('ts.test_status_details','=','Declined')
                ->orderBy($this->column_order, 'asc')
                ->get()
                ->toArray();
            }else{
                $this->declined_applicant_data = DB::table('test_applications as ta')
                ->select(
                    // '*',
                    't_a_id',
                    DB::raw('CONCAT(u.user_lastname,", ",u.user_firstname," ",LEFT(u.user_middlename,1)) as user_fullname'),
                    'test_type_name',
                    DB::raw('DATE(ta.date_created) as date_applied'),
                    't_a_declined_reason'
                    )
                ->join('users as u', 'u.user_id', '=', 'ta.t_a_applicant_user_id')
                ->join('user_family_background as fb', 'fb.family_background_user_id', '=', 'u.user_id')
                ->join('test_types as tt', 'tt.test_type_id', '=', 'ta.t_a_test_type_id')
                ->join('test_status as ts', 'ts.test_status_id', '=', 'ta.t_a_test_status_id')
                ->join('school_years as sy', 'sy.school_year_id', '=', 'ta.t_a_school_year_id')
                ->where('t_a_isactive','=',1)
                ->where('test_status_details','=','Declined')
                ->where('t_a_test_type_id','=',$this->declined_test_type_id)
                ->orderBy($this->column_order, 'asc')
                ->get()
                ->toArray();
            }

            foreach ($this->pending_applicant_data  as $key => $value) {
                array_push($this->pending_selected,[$value->t_a_id=>false]);
            }
            foreach ($this->accepted_applicant_data  as $key => $value) {
                array_push($this->accepted_selected,[$value->t_a_id=>false]);
            }

            foreach ($this->declined_applicant_data  as $key => $value) {
                array_push($this->declined_selected,[$value->t_a_id=>false]);
            }
            
        }

        
    }
    public function mount(Request $request){
        $this->user_details = $request->session()->all();
        $this->title = 'application-management';

        // accessrole read
        $this->access_role = [
            'C' => true,
            'R' => true,
            'U' => true,
            'D' => true
        ];

        if($this->access_role['C'] || $this->access_role['R'] || $this->access_role['U'] || $this->access_role['D']){

            $this->active = 'pending';

            $this->pending_applicant_filter = [
                'Select all' => true,
                '#' => true,
                'Code' => true,
                'Applicant name'=> true,
                'Exam type'=> true,
                'Date applied'	=> true,
                'Status'=> true,								
                'Actions'	=> true					
            ];
            $this->accepted_applicant_filter = [
                'Select all' => true,
                '#' => true,
                'Code' => true,
                'Applicant name'=> true,
                'Exam type'=> true,
                'Date applied'	=> true,	
                'Status'=> true,							
                'Actions'	=> true					
            ];

            $this->declined_applicant_filter = [
                'Select all' => true,
                '#' => true,
                'Code' => true,
                'Applicant name'=> true,
                'Exam type'=> true,
                'Date applied'	=> true,
                'Status'=> true,	
                'Reason'=> true,								
                'Actions'	=> false					
            ];

            $this->exam_types = DB::table('test_types')
                ->select('test_type_id','test_type_name')
                ->get()
                ->toArray();

            $this->pending_selected_all = false;
            $this->pending_selected = [];
            $this->pending_test_type_id = 0;

            $this->accepted_selected_all = false;
            $this->accepted_selected = [];
            $this->accepted_test_type_id = 0;

            $this->declined_selected_all = false;
            $this->declined_selected = [];
            $this->declined_test_type_id = 0;

            if($this->pending_test_type_id == 0){
                $this->pending_applicant_data = DB::table('test_applications as ta')
                ->select(
                    // '*',
                    't_a_id',
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
                ->where('ts.test_status_details','=','Pending')
                ->orderBy($this->column_order, 'asc')
                ->get()
                ->toArray();
            }else{
                $this->pending_applicant_data = DB::table('test_applications as ta')
                ->select(
                    // '*',
                    't_a_id',
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
                ->where('test_status_details','=','Pending')
                ->where('t_a_test_type_id','=',$this->pending_test_type_id)
                ->orderBy($this->column_order, 'asc')
                ->get()
                ->toArray();
            }

            if($this->accepted_test_type_id == 0){
                $this->accepted_applicant_data = DB::table('test_applications as ta')
                ->select(
                    // '*',
                    't_a_id',
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
                ->where('ts.test_status_details','=','Accepted')
                ->orderBy($this->column_order, 'asc')
                ->get()
                ->toArray();
            }else{
                $this->accepted_applicant_data = DB::table('test_applications as ta')
                ->select(
                    // '*',
                    't_a_id',
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
                ->where('test_status_details','=','Accepted')
                ->where('t_a_test_type_id','=',$this->accepted_test_type_id)
                ->orderBy($this->column_order, 'asc')
                ->get()
                ->toArray();
            }

            if($this->declined_test_type_id == 0){
                $this->declined_applicant_data = DB::table('test_applications as ta')
                ->select(
                    // '*',
                    't_a_id',
                    DB::raw('CONCAT(u.user_lastname,", ",u.user_firstname," ",LEFT(u.user_middlename,1)) as user_fullname'),
                    'test_type_name',
                    DB::raw('DATE(ta.date_created) as date_applied'),
                    't_a_declined_reason'
                    )
                ->join('users as u', 'u.user_id', '=', 'ta.t_a_applicant_user_id')
                ->join('user_family_background as fb', 'fb.family_background_user_id', '=', 'u.user_id')
                ->join('test_types as tt', 'tt.test_type_id', '=', 'ta.t_a_test_type_id')
                ->join('test_status as ts', 'ts.test_status_id', '=', 'ta.t_a_test_status_id')
                ->join('school_years as sy', 'sy.school_year_id', '=', 'ta.t_a_school_year_id')
                ->where('t_a_isactive','=',1)
                ->where('ts.test_status_details','=','Declined')
                ->orderBy($this->column_order, 'asc')
                ->get()
                ->toArray();
            }else{
                $this->declined_applicant_data = DB::table('test_applications as ta')
                ->select(
                    // '*',
                    't_a_id',
                    DB::raw('CONCAT(u.user_lastname,", ",u.user_firstname," ",LEFT(u.user_middlename,1)) as user_fullname'),
                    'test_type_name',
                    DB::raw('DATE(ta.date_created) as date_applied'),
                    't_a_declined_reason'
                    )
                ->join('users as u', 'u.user_id', '=', 'ta.t_a_applicant_user_id')
                ->join('user_family_background as fb', 'fb.family_background_user_id', '=', 'u.user_id')
                ->join('test_types as tt', 'tt.test_type_id', '=', 'ta.t_a_test_type_id')
                ->join('test_status as ts', 'ts.test_status_id', '=', 'ta.t_a_test_status_id')
                ->join('school_years as sy', 'sy.school_year_id', '=', 'ta.t_a_school_year_id')
                ->where('t_a_isactive','=',1)
                ->where('test_status_details','=','Declined')
                ->where('t_a_test_type_id','=',$this->declined_test_type_id)
                ->orderBy($this->column_order, 'asc')
                ->get()
                ->toArray();
            }

            foreach ($this->pending_applicant_data  as $key => $value) {
                array_push($this->pending_selected,[$value->t_a_id=>false]);
            }
            foreach ($this->accepted_applicant_data  as $key => $value) {
                array_push($this->accepted_selected,[$value->t_a_id=>false]);
            }

            foreach ($this->declined_applicant_data  as $key => $value) {
                array_push($this->declined_selected,[$value->t_a_id=>false]);
            }           

        }else{
            $this->redirect('/admin/dashboard');
        }
        
    }

    public function render(){
        

        return view('livewire.admin.application-management',[
            'user_details' => $this->user_details,
            ])
            ->layout('layouts.admin',[
                'title'=>$this->title]);
    }

    public function active_page($active){
        $this->active = $active;

        if($this->access_role['C'] || $this->access_role['R'] || $this->access_role['U'] || $this->access_role['D']){

            $this->exam_types = DB::table('test_types')
                ->select('test_type_id','test_type_name')
                ->get()
                ->toArray();

            $this->pending_selected_all = false;
            $this->pending_selected = [];

            $this->accepted_selected_all = false;
            $this->accepted_selected = [];

            $this->declined_selected_all = false;
            $this->declined_selected = [];

            if($this->pending_test_type_id == 0){
                $this->pending_applicant_data = DB::table('test_applications as ta')
                ->select(
                    // '*',
                    't_a_id',
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
                ->where('ts.test_status_details','=','Pending')
                ->orderBy($this->column_order, 'asc')
                ->get()
                ->toArray();
            }else{
                $this->pending_applicant_data = DB::table('test_applications as ta')
                ->select(
                    // '*',
                    't_a_id',
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
                ->where('test_status_details','=','Pending')
                ->where('t_a_test_type_id','=',$this->pending_test_type_id)
                ->orderBy($this->column_order, 'asc')
                ->get()
                ->toArray();
            }

            if($this->accepted_test_type_id == 0){
                $this->accepted_applicant_data = DB::table('test_applications as ta')
                ->select(
                    // '*',
                    't_a_id',
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
                ->where('ts.test_status_details','=','Accepted')
                ->orderBy($this->column_order, 'asc')
                ->get()
                ->toArray();
            }else{
                $this->accepted_applicant_data = DB::table('test_applications as ta')
                ->select(
                    // '*',
                    't_a_id',
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
                ->where('test_status_details','=','Accepted')
                ->where('t_a_test_type_id','=',$this->accepted_test_type_id)
                ->orderBy($this->column_order, 'asc')
                ->get()
                ->toArray();
            }

            if($this->declined_test_type_id == 0){
                $this->declined_applicant_data = DB::table('test_applications as ta')
                ->select(
                    // '*',
                    't_a_id',
                    DB::raw('CONCAT(u.user_lastname,", ",u.user_firstname," ",LEFT(u.user_middlename,1)) as user_fullname'),
                    'test_type_name',
                    DB::raw('DATE(ta.date_created) as date_applied'),
                    't_a_declined_reason'
                    )
                ->join('users as u', 'u.user_id', '=', 'ta.t_a_applicant_user_id')
                ->join('user_family_background as fb', 'fb.family_background_user_id', '=', 'u.user_id')
                ->join('test_types as tt', 'tt.test_type_id', '=', 'ta.t_a_test_type_id')
                ->join('test_status as ts', 'ts.test_status_id', '=', 'ta.t_a_test_status_id')
                ->join('school_years as sy', 'sy.school_year_id', '=', 'ta.t_a_school_year_id')
                ->where('t_a_isactive','=',1)
                ->where('ts.test_status_details','=','Declined')
                ->orderBy($this->column_order, 'asc')
                ->get()
                ->toArray();
            }else{
                $this->declined_applicant_data = DB::table('test_applications as ta')
                ->select(
                    // '*',
                    't_a_id',
                    DB::raw('CONCAT(u.user_lastname,", ",u.user_firstname," ",LEFT(u.user_middlename,1)) as user_fullname'),
                    'test_type_name',
                    DB::raw('DATE(ta.date_created) as date_applied'),
                    't_a_declined_reason'
                    )
                ->join('users as u', 'u.user_id', '=', 'ta.t_a_applicant_user_id')
                ->join('user_family_background as fb', 'fb.family_background_user_id', '=', 'u.user_id')
                ->join('test_types as tt', 'tt.test_type_id', '=', 'ta.t_a_test_type_id')
                ->join('test_status as ts', 'ts.test_status_id', '=', 'ta.t_a_test_status_id')
                ->join('school_years as sy', 'sy.school_year_id', '=', 'ta.t_a_school_year_id')
                ->where('t_a_isactive','=',1)
                ->where('test_status_details','=','Declined')
                ->where('t_a_test_type_id','=',$this->declined_test_type_id)
                ->orderBy($this->column_order, 'asc')
                ->get()
                ->toArray();
            }

            foreach ($this->pending_applicant_data  as $key => $value) {
                array_push($this->pending_selected,[$value->t_a_id=>false]);
            }
            foreach ($this->accepted_applicant_data  as $key => $value) {
                array_push($this->accepted_selected,[$value->t_a_id=>false]);
            }

            foreach ($this->declined_applicant_data  as $key => $value) {
                array_push($this->declined_selected,[$value->t_a_id=>false]);
            }
            $this->application_view_details = null;
            
        }
    }

    public function pending_applicant_filterView(){
        
        $this->dispatchBrowserEvent('swal:redirect',[
            'position'          									=> 'center',
            'icon'              									=> 'success',
            'title'             									=> 'Successfully changed filter!',
            'showConfirmButton' 									=> 'true',
            'timer'             									=> '1000',
            'link'              									=> '#'
        ]);

    }

    public function accepted_applicant_filterView(){
        
        $this->dispatchBrowserEvent('swal:redirect',[
            'position'          									=> 'center',
            'icon'              									=> 'success',
            'title'             									=> 'Successfully changed filter!',
            'showConfirmButton' 									=> 'true',
            'timer'             									=> '1000',
            'link'              									=> '#'
        ]);

    }

    public function declined_applicant_filterView(){
        
        $this->dispatchBrowserEvent('swal:redirect',[
            'position'          									=> 'center',
            'icon'              									=> 'success',
            'title'             									=> 'Successfully changed filter!',
            'showConfirmButton' 									=> 'true',
            'timer'             									=> '1000',
            'link'              									=> '#'
        ]);

    }

    


    public function pending_applicant_select_all(){
        
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

    public function accepted_applicant_select_all(){
        
        if($this->accepted_selected_all){
            $this->accepted_selected=[];
            foreach ($this->accepted_applicant_data as $key => $value) {
                array_push($this->accepted_selected,[$value->t_a_id=>true]);
            }
        }else{
            $this->accepted_selected=[];
            foreach ($this->accepted_applicant_data as $key => $value) {
                array_push($this->accepted_selected,[$value->t_a_id=>false]);
            }
        }
 
    }

    public function declined_applicant_select_all(){
        
        if($this->declined_selected_all){
            $this->declined_selected=[];
            foreach ($this->declined_applicant_data as $key => $value) {
                array_push($this->declined_selected,[$value->t_a_id=>true]);
            }
        }else{
            $this->declined_selected=[];
            foreach ($this->declined_applicant_data as $key => $value) {
                array_push($this->declined_selected,[$value->t_a_id=>false]);
            }
        }
 
    }

   
    public function pending_application_exam_type_filter(){
        

        if($this->pending_test_type_id == 0){
            $this->pending_applicant_data = DB::table('test_applications as ta')
            ->select(
                // '*',
                't_a_id',
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
            ->where('ts.test_status_details','=','Pending')
            ->orderBy($this->column_order, 'asc')
            ->get()
            ->toArray();
        }else{
            $this->pending_applicant_data = DB::table('test_applications as ta')
            ->select(
                // '*',
                't_a_id',
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
            ->where('test_status_details','=','Pending')
            ->where('t_a_test_type_id','=',$this->pending_test_type_id)
            ->orderBy($this->column_order, 'asc')
            ->get()
            ->toArray();
        }

        $this->pending_selected_all = false;
        $this->pending_selected = [];

        foreach ($this->pending_applicant_data  as $key => $value) {
            array_push($this->pending_selected,[$value->t_a_id=>false]);
        }

        
       



    }  
    
    public function accepted_application_exam_type_filter(){
        if($this->accepted_test_type_id == 0){
            $this->accepted_applicant_data = DB::table('test_applications as ta')
            ->select(
                // '*',
                't_a_id',
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
            ->where('ts.test_status_details','=','Accepted')
            ->orderBy($this->column_order, 'asc')
            ->get()
            ->toArray();
        }else{
            $this->accepted_applicant_data = DB::table('test_applications as ta')
            ->select(
                // '*',
                't_a_id',
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
            ->where('test_status_details','=','Accepted')
            ->where('t_a_test_type_id','=',$this->accepted_test_type_id)
            ->orderBy($this->column_order, 'asc')
            ->get()
            ->toArray();
        }

        $this->accepted_selected_all = false;
        $this->accepted_selected = [];

        foreach ($this->accepted_applicant_data  as $key => $value) {
            array_push($this->accepted_selected,[$value->t_a_id=>false]);
        }
    }  

    public function declined_application_exam_type_filter(){
        if($this->declined_test_type_id == 0){
            $this->declined_applicant_data = DB::table('test_applications as ta')
            ->select(
                // '*',
                't_a_id',
                DB::raw('CONCAT(u.user_lastname,", ",u.user_firstname," ",LEFT(u.user_middlename,1)) as user_fullname'),
                'test_type_name',
                DB::raw('DATE(ta.date_created) as date_applied'),
                't_a_declined_reason'
                )
            ->join('users as u', 'u.user_id', '=', 'ta.t_a_applicant_user_id')
            ->join('user_family_background as fb', 'fb.family_background_user_id', '=', 'u.user_id')
            ->join('test_types as tt', 'tt.test_type_id', '=', 'ta.t_a_test_type_id')
            ->join('test_status as ts', 'ts.test_status_id', '=', 'ta.t_a_test_status_id')
            ->join('school_years as sy', 'sy.school_year_id', '=', 'ta.t_a_school_year_id')
            ->where('t_a_isactive','=',1)
            ->where('ts.test_status_details','=','Declined')
            ->orderBy($this->column_order, 'asc')
            ->get()
            ->toArray();
        }else{
            $this->declined_applicant_data = DB::table('test_applications as ta')
            ->select(
                // '*',
                't_a_id',
                DB::raw('CONCAT(u.user_lastname,", ",u.user_firstname," ",LEFT(u.user_middlename,1)) as user_fullname'),
                'test_type_name',
                DB::raw('DATE(ta.date_created) as date_applied'),
                't_a_declined_reason'
                )
            ->join('users as u', 'u.user_id', '=', 'ta.t_a_applicant_user_id')
            ->join('user_family_background as fb', 'fb.family_background_user_id', '=', 'u.user_id')
            ->join('test_types as tt', 'tt.test_type_id', '=', 'ta.t_a_test_type_id')
            ->join('test_status as ts', 'ts.test_status_id', '=', 'ta.t_a_test_status_id')
            ->join('school_years as sy', 'sy.school_year_id', '=', 'ta.t_a_school_year_id')
            ->where('t_a_isactive','=',1)
            ->where('test_status_details','=','Declined')
            ->where('t_a_test_type_id','=',$this->declined_test_type_id)
            ->orderBy($this->column_order, 'asc')
            ->get()
            ->toArray();
        }

        $this->declined_selected_all = false;
        $this->declined_selected = [];

        foreach ($this->declined_applicant_data  as $key => $value) {
            array_push($this->declined_selected,[$value->t_a_id=>false]);
        }
    } 

    public function accepted_pending(){
        $valid = false;
        foreach ($this->pending_applicant_data  as $key => $value) {
            if($this->pending_selected[$key][$value->t_a_id]){
                $valid = true;
            }
        }

        // accessrole read
        $this->access_role = [
            'C' => true,
            'R' => true,
            'U' => true,
            'D' => true
        ];

        if($valid &&  $this->access_role['U'] ){
            foreach ($this->pending_applicant_data  as $key => $value) {
                if($this->pending_selected[$key][$value->t_a_id]){
                    // update here
                    DB::table('test_applications as ta')
                    ->join('test_status as ts', 'ts.test_status_id', '=', 'ta.t_a_test_status_id')
                    ->where(['t_a_id'=> $value->t_a_id,
                            't_a_isactive'=>1,
                            'ts.test_status_details'=>'Pending'])
                    ->update([
                            't_a_test_status_id' =>((array) DB::table('test_status')
                                ->where('test_status_details', '=', 'Accepted')
                            ->select('test_status_id as t_a_test_status_id')
                            ->first())['t_a_test_status_id'],
                            't_a_accepted_by'=> $this->user_details['user_id']
                    ]);
                }
            }
            $this->dispatchBrowserEvent('swal:redirect',[
                'position'          									=> 'center',
                'icon'              									=> 'success',
                'title'             									=> 'Applicants seleted is now accepted!',
                'showConfirmButton' 									=> 'true',
                'timer'             									=> '1500',
                'link'              									=> '#'
            ]);
        }else{
            $this->dispatchBrowserEvent('swal:redirect',[
                'position'          									=> 'center',
                'icon'              									=> 'warning',
                'title'             									=> 'Please select applicant!',
                'showConfirmButton' 									=> 'true',
                'timer'             									=> '1500',
                'link'              									=> '#'
             ]);
        }

        if($this->pending_test_type_id == 0){
            $this->pending_applicant_data = DB::table('test_applications as ta')
            ->select(
                // '*',
                't_a_id',
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
            ->where('ts.test_status_details','=','Pending')
            ->orderBy($this->column_order, 'asc')
            ->get()
            ->toArray();
        }else{
            $this->pending_applicant_data = DB::table('test_applications as ta')
            ->select(
                // '*',
                't_a_id',
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
            ->where('test_status_details','=','Pending')
            ->where('t_a_test_type_id','=',$this->pending_test_type_id)
            ->orderBy($this->column_order, 'asc')
            ->get()
            ->toArray();
        }
        $this->pending_selected = [];
        foreach ($this->pending_applicant_data  as $key => $value) {
            array_push($this->pending_selected,[$value->t_a_id=>false]);
        }
  
    }
    public function declined_check(){

        $this->declined_pending_valid = false;
        foreach ($this->pending_applicant_data  as $key => $value) {
            if($this->pending_selected[$key][$value->t_a_id]){
                $this->declined_pending_valid = true;
                break;
            }
        }

        if(!$this->declined_pending_valid){
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

    public function declined_check_accepted(){

        $this->declined_accepted_valid = false;
        foreach ($this->accepted_applicant_data  as $key => $value) {
            if($this->accepted_selected[$key][$value->t_a_id]){
                $this->declined_accepted_valid = true;
                break;
            }
        }
        if(!$this->declined_accepted_valid){
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

    public function decline_accepted(){

        $this->declined_accepted_valid = false;
        foreach ($this->accepted_applicant_data  as $key => $value) {
            if($this->accepted_selected[$key][$value->t_a_id]){
                $this->declined_accepted_valid = true;
            }
        }

        if($this->declined_accepted_valid &&  $this->access_role['U'] ){
            foreach ($this->accepted_applicant_data  as $key => $value) {
                if($this->accepted_selected[$key][$value->t_a_id]){
                    // update here
                    DB::table('test_applications as ta')
                    ->join('test_status as ts', 'ts.test_status_id', '=', 'ta.t_a_test_status_id')
                    ->where(['t_a_id'=> $value->t_a_id,
                            't_a_isactive'=>1,
                            'ts.test_status_details'=>'Accepted'])
                    ->update([
                            't_a_declined_by'=> $this->user_details['user_id'],
                            't_a_declined_reason' => $this->declined_accepted_reason,
                            't_a_test_status_id' =>((array) DB::table('test_status')
                                ->where('test_status_details', '=', 'Declined')
                            ->select('test_status_id as t_a_test_status_id')
                            ->first())['t_a_test_status_id']
                ]);
                }
            }
            $this->dispatchBrowserEvent('swal:remove_backdrop',[
                'position'          									=> 'center',
                'icon'              									=> 'success',
                'title'             									=> 'Applicants seleted is now declined!',
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
        if($this->accepted_test_type_id == 0){
            $this->accepted_applicant_data = DB::table('test_applications as ta')
            ->select(
                // '*',
                't_a_id',
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
            ->where('ts.test_status_details','=','Accepted')
            ->orderBy($this->column_order, 'asc')
            ->get()
            ->toArray();
        }else{
            $this->accepted_applicant_data = DB::table('test_applications as ta')
            ->select(
                // '*',
                't_a_id',
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
            ->where('test_status_details','=','Accepted')
            ->where('t_a_test_type_id','=',$this->accepted_test_type_id)
            ->orderBy($this->column_order, 'asc')
            ->get()
            ->toArray();
        }

        $this->accepted_selected = [];

        foreach ($this->accepted_applicant_data  as $key => $value) {
            array_push($this->accepted_selected,[$value->t_a_id=>false]);
        }
        $this->declined_accepted_reason = null;
    }

    public function decline(){

        $this->declined_valid = false;
        foreach ($this->pending_applicant_data  as $key => $value) {
            if($this->pending_selected[$key][$value->t_a_id]){
                $this->declined_valid = true;
            }
        }

        if($this->declined_valid &&  $this->access_role['U'] ){
            foreach ($this->pending_applicant_data  as $key => $value) {
                if($this->pending_selected[$key][$value->t_a_id]){
                    // update here
                    DB::table('test_applications as ta')
                    ->join('test_status as ts', 'ts.test_status_id', '=', 'ta.t_a_test_status_id')
                    ->where(['t_a_id'=> $value->t_a_id,
                            't_a_isactive'=>1,
                            'ts.test_status_details'=>'Pending'])
                    ->update([
                            't_a_declined_by'=> $this->user_details['user_id'],
                            't_a_declined_reason' => $this->declined_pending_reason,
                            't_a_test_status_id' =>((array) DB::table('test_status')
                                ->where('test_status_details', '=', 'Declined')
                            ->select('test_status_id as t_a_test_status_id')
                            ->first())['t_a_test_status_id']
                ]);
                }
            }
            $this->dispatchBrowserEvent('swal:remove_backdrop',[
                'position'          									=> 'center',
                'icon'              									=> 'success',
                'title'             									=> 'Applicants seleted is now declined!',
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
        if($this->pending_test_type_id == 0){
            $this->pending_applicant_data = DB::table('test_applications as ta')
            ->select(
                // '*',
                't_a_id',
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
            ->where('ts.test_status_details','=','Pending')
            ->orderBy($this->column_order, 'asc')
            ->get()
            ->toArray();
        }else{
            $this->pending_applicant_data = DB::table('test_applications as ta')
            ->select(
                // '*',
                't_a_id',
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
            ->where('test_status_details','=','Pending')
            ->where('t_a_test_type_id','=',$this->pending_test_type_id)
            ->orderBy($this->column_order, 'asc')
            ->get()
            ->toArray();
        }

        $this->pending_selected = [];

        foreach ($this->pending_applicant_data  as $key => $value) {
            array_push($this->pending_selected,[$value->t_a_id=>false]);
        }
        $this->declined_pending_reason = null;
    }

    public function accepted_return_check(){
        $this->return_valid = false;
        foreach ($this->accepted_applicant_data  as $key => $value) {
            if($this->accepted_selected[$key][$value->t_a_id]){
                $this->return_valid = true;
                break;
            }
        }

        if(!$this->return_valid){
            $this->dispatchBrowserEvent('swal:redirect',[
                'position'          									=> 'center',
                'icon'              									=> 'warning',
                'title'             									=> 'Please select applicant!',
                'showConfirmButton' 									=> 'true',
                'timer'             									=> '1500',
                'link'              									=> '#'
             ]);
        }
    }

    public function accepted_return(){
        $this->return_valid = false;
        foreach ($this->accepted_applicant_data  as $key => $value) {
            if($this->accepted_selected[$key][$value->t_a_id]){
                $this->return_valid = true;
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

        if($this->return_valid &&  $this->access_role['U'] ){
            foreach ($this->accepted_applicant_data  as $key => $value) {
                if($this->accepted_selected[$key][$value->t_a_id]){
                    // update here
                    DB::table('test_applications as ta')
                    ->join('test_status as ts', 'ts.test_status_id', '=', 'ta.t_a_test_status_id')
                    ->where(['t_a_id'=> $value->t_a_id,
                            't_a_isactive'=>1,
                            'ts.test_status_details'=>'Accepted'])
                    ->update([
                            't_a_returned_by'=> $this->user_details['user_id'],
                            't_a_returned_reason' => $this->return_reason,
                            't_a_test_status_id' =>((array) DB::table('test_status')
                                ->where('test_status_details', '=', 'Pending')
                            ->select('test_status_id as t_a_test_status_id')
                            ->first())['t_a_test_status_id']
                ]);
                }
            }
            $this->dispatchBrowserEvent('swal:remove_backdrop',[
                'position'          									=> 'center',
                'icon'              									=> 'success',
                'title'             									=> 'Applicants seleted is now back to pending!',
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

        if($this->pending_test_type_id == 0){
            $this->pending_applicant_data = DB::table('test_applications as ta')
            ->select(
                // '*',
                't_a_id',
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
            ->where('ts.test_status_details','=','Pending')
            ->orderBy($this->column_order, 'asc')
            ->get()
            ->toArray();
        }else{
            $this->pending_applicant_data = DB::table('test_applications as ta')
            ->select(
                // '*',
                't_a_id',
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
            ->where('test_status_details','=','Pending')
            ->where('t_a_test_type_id','=',$this->pending_test_type_id)
            ->orderBy($this->column_order, 'asc')
            ->get()
            ->toArray();
        }

        if($this->accepted_test_type_id == 0){
            $this->accepted_applicant_data = DB::table('test_applications as ta')
            ->select(
                // '*',
                't_a_id',
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
            ->where('ts.test_status_details','=','Accepted')
            ->orderBy($this->column_order, 'asc')
            ->get()
            ->toArray();
        }else{
            $this->accepted_applicant_data = DB::table('test_applications as ta')
            ->select(
                // '*',
                't_a_id',
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
            ->where('test_status_details','=','Accepted')
            ->where('t_a_test_type_id','=',$this->accepted_test_type_id)
            ->orderBy($this->column_order, 'asc')
            ->get()
            ->toArray();
        }

        if($this->declined_test_type_id == 0){
            $this->declined_applicant_data = DB::table('test_applications as ta')
            ->select(
                // '*',
                't_a_id',
                DB::raw('CONCAT(u.user_lastname,", ",u.user_firstname," ",LEFT(u.user_middlename,1)) as user_fullname'),
                'test_type_name',
                DB::raw('DATE(ta.date_created) as date_applied'),
                't_a_declined_reason'
                )
            ->join('users as u', 'u.user_id', '=', 'ta.t_a_applicant_user_id')
            ->join('user_family_background as fb', 'fb.family_background_user_id', '=', 'u.user_id')
            ->join('test_types as tt', 'tt.test_type_id', '=', 'ta.t_a_test_type_id')
            ->join('test_status as ts', 'ts.test_status_id', '=', 'ta.t_a_test_status_id')
            ->join('school_years as sy', 'sy.school_year_id', '=', 'ta.t_a_school_year_id')
            ->where('t_a_isactive','=',1)
            ->where('ts.test_status_details','=','Declined')
            ->orderBy($this->column_order, 'asc')
            ->get()
            ->toArray();
        }else{
            $this->declined_applicant_data = DB::table('test_applications as ta')
            ->select(
                // '*',
                't_a_id',
                DB::raw('CONCAT(u.user_lastname,", ",u.user_firstname," ",LEFT(u.user_middlename,1)) as user_fullname'),
                'test_type_name',
                DB::raw('DATE(ta.date_created) as date_applied'),
                't_a_declined_reason'
                )
            ->join('users as u', 'u.user_id', '=', 'ta.t_a_applicant_user_id')
            ->join('user_family_background as fb', 'fb.family_background_user_id', '=', 'u.user_id')
            ->join('test_types as tt', 'tt.test_type_id', '=', 'ta.t_a_test_type_id')
            ->join('test_status as ts', 'ts.test_status_id', '=', 'ta.t_a_test_status_id')
            ->join('school_years as sy', 'sy.school_year_id', '=', 'ta.t_a_school_year_id')
            ->where('t_a_isactive','=',1)
            ->where('test_status_details','=','Declined')
            ->where('t_a_test_type_id','=',$this->declined_test_type_id)
            ->orderBy($this->column_order, 'asc')
            ->get()
            ->toArray();
        }

        $this->accepted_selected = [];
        $this->pending_selected = [];
        $this->declined_selected = [];

        foreach ($this->accepted_applicant_data  as $key => $value) {
            array_push($this->accepted_selected,[$value->t_a_id=>false]);
        }

        foreach ($this->pending_applicant_data  as $key => $value) {
            array_push($this->pending_selected,[$value->t_a_id=>false]);
        }

        foreach ($this->declined_applicant_data  as $key => $value) {
            array_push($this->declined_selected,[$value->t_a_id=>false]);
        }
    }

    public function search_applicant(){
        // last
        dd('nice');
    }

    public function delete_check(){
        $this->delete_declined_valid = false;
        foreach ($this->declined_applicant_data  as $key => $value) {
            if($this->declined_selected[$key][$value->t_a_id]){
                $this->delete_declined_valid = true;
                break;
            }
        }

        if(!$this->delete_declined_valid){
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

    public function delete_declined(){
        $this->delete_declined_valid = false;
        foreach ($this->declined_applicant_data  as $key => $value) {
            if($this->declined_selected[$key][$value->t_a_id]){
                $this->delete_declined_valid = true;
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

        if($this->delete_declined_valid &&  $this->access_role['U'] ){
            foreach ($this->declined_applicant_data  as $key => $value) {
                if($this->declined_selected[$key][$value->t_a_id]){
                    // update here
                    DB::table('test_applications as ta')
                    ->join('test_status as ts', 'ts.test_status_id', '=', 'ta.t_a_test_status_id')
                    ->where(['t_a_id'=> $value->t_a_id,
                            't_a_isactive'=>1,
                            'ts.test_status_details'=>'Declined'])
                    ->delete(
                );

                // delete files  here
                }
            }
            $this->dispatchBrowserEvent('swal:remove_backdrop',[
                'position'          									=> 'center',
                'icon'              									=> 'success',
                'title'             									=> 'Applicants seleted is now deleted!',
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

        if($this->pending_test_type_id == 0){
            $this->pending_applicant_data = DB::table('test_applications as ta')
            ->select(
                // '*',
                't_a_id',
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
            ->where('ts.test_status_details','=','Pending')
            ->orderBy($this->column_order, 'asc')
            ->get()
            ->toArray();
        }else{
            $this->pending_applicant_data = DB::table('test_applications as ta')
            ->select(
                // '*',
                't_a_id',
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
            ->where('test_status_details','=','Pending')
            ->where('t_a_test_type_id','=',$this->pending_test_type_id)
            ->orderBy($this->column_order, 'asc')
            ->get()
            ->toArray();
        }

        if($this->accepted_test_type_id == 0){
            $this->accepted_applicant_data = DB::table('test_applications as ta')
            ->select(
                // '*',
                't_a_id',
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
            ->where('ts.test_status_details','=','Accepted')
            ->orderBy($this->column_order, 'asc')
            ->get()
            ->toArray();
        }else{
            $this->accepted_applicant_data = DB::table('test_applications as ta')
            ->select(
                // '*',
                't_a_id',
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
            ->where('test_status_details','=','Accepted')
            ->where('t_a_test_type_id','=',$this->accepted_test_type_id)
            ->orderBy($this->column_order, 'asc')
            ->get()
            ->toArray();
        }

        if($this->declined_test_type_id == 0){
            $this->declined_applicant_data = DB::table('test_applications as ta')
            ->select(
                // '*',
                't_a_id',
                DB::raw('CONCAT(u.user_lastname,", ",u.user_firstname," ",LEFT(u.user_middlename,1)) as user_fullname'),
                'test_type_name',
                DB::raw('DATE(ta.date_created) as date_applied'),
                't_a_declined_reason'
                )
            ->join('users as u', 'u.user_id', '=', 'ta.t_a_applicant_user_id')
            ->join('user_family_background as fb', 'fb.family_background_user_id', '=', 'u.user_id')
            ->join('test_types as tt', 'tt.test_type_id', '=', 'ta.t_a_test_type_id')
            ->join('test_status as ts', 'ts.test_status_id', '=', 'ta.t_a_test_status_id')
            ->join('school_years as sy', 'sy.school_year_id', '=', 'ta.t_a_school_year_id')
            ->where('t_a_isactive','=',1)
            ->where('ts.test_status_details','=','Declined')
            ->orderBy($this->column_order, 'asc')
            ->get()
            ->toArray();
        }else{
            $this->declined_applicant_data = DB::table('test_applications as ta')
            ->select(
                // '*',
                't_a_id',
                DB::raw('CONCAT(u.user_lastname,", ",u.user_firstname," ",LEFT(u.user_middlename,1)) as user_fullname'),
                'test_type_name',
                DB::raw('DATE(ta.date_created) as date_applied'),
                't_a_declined_reason'
                )
            ->join('users as u', 'u.user_id', '=', 'ta.t_a_applicant_user_id')
            ->join('user_family_background as fb', 'fb.family_background_user_id', '=', 'u.user_id')
            ->join('test_types as tt', 'tt.test_type_id', '=', 'ta.t_a_test_type_id')
            ->join('test_status as ts', 'ts.test_status_id', '=', 'ta.t_a_test_status_id')
            ->join('school_years as sy', 'sy.school_year_id', '=', 'ta.t_a_school_year_id')
            ->where('t_a_isactive','=',1)
            ->where('test_status_details','=','Declined')
            ->where('t_a_test_type_id','=',$this->declined_test_type_id)
            ->orderBy($this->column_order, 'asc')
            ->get()
            ->toArray();
        }

        $this->accepted_selected = [];
        $this->pending_selected = [];
        $this->declined_selected = [];

        foreach ($this->accepted_applicant_data  as $key => $value) {
            array_push($this->accepted_selected,[$value->t_a_id=>false]);
        }

        foreach ($this->pending_applicant_data  as $key => $value) {
            array_push($this->pending_selected,[$value->t_a_id=>false]);
        }

        foreach ($this->declined_applicant_data  as $key => $value) {
            array_push($this->declined_selected,[$value->t_a_id=>false]);
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

    public function view_accepted_application($t_a_id){


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


        
            $this->dispatchBrowserEvent('openModal','view_accepted_application_modal');
    }
    



    // pagination
    public function refesh_page(){
        $this->cursor = 0;
        $this->page_number = 1;
        $item_current = 0;

        

        if($this->pending_test_type_id == 0){
            $this->next_pages = DB::table('test_applications as ta')
            ->select(
                't_a_id'
                )
            ->where('t_a_isactive','=',1)
            ->where('t_a_id','>',$this->cursor)
            ->orderBy('ta.'.$this->column_order, 'asc')
            ->limit($this->per_page*3+1)
            ->get()
            ->toArray();
            $this->next_page_count = count($this->next_pages);


            $this->prev_pages = DB::table('test_applications as ta')
            ->select(
                't_a_id'
                )
            ->where('t_a_isactive','=',1)
            ->where('t_a_id','<=',$this->cursor)
            ->orderBy('ta.'.$this->column_order, 'asc')
            ->limit($this->per_page*3+1)
            ->get()
            ->toArray();
            $this->prev_page_count = count($this->prev_pages);
            $this->item_last = DB::table('test_applications as ta')
                ->select(
                    // '*',
                    't_a_id'
                    )
                ->where('t_a_isactive','=',1)
                ->orderBy('ta.'.$this->column_order, $this->order_by)
                ->first()->t_a_id;

            $this->pending_applicant_data = DB::table('test_applications as ta')
                ->select(
                    // '*',
                    't_a_id',
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
                ->where('t_a_id','>',$this->cursor)
                ->orderBy('ta.'.$this->column_order, 'asc')
                ->limit($this->per_page)
                ->get()
                ->toArray();
                
        
        }else{
            $this->next_pages = DB::table('test_applications as ta')
            ->select(
                't_a_id'
                )
            ->where('t_a_isactive','=',1)
            ->where('t_a_id','>',$this->cursor)
            ->where('t_a_test_type_id','=',$this->pending_test_type_id)
            ->orderBy('ta.'.$this->column_order, 'asc')
            ->limit($this->per_page*3+1)
            ->get()
            ->toArray();
            $this->next_page_count = count($this->next_pages);


            $this->prev_pages = DB::table('test_applications as ta')
            ->select(
                't_a_id'
                )
            ->where('t_a_isactive','=',1)
            ->where('t_a_id','<=',$this->cursor)
            ->where('t_a_test_type_id','=',$this->pending_test_type_id)
            ->orderBy('ta.'.$this->column_order, 'asc')
            ->limit($this->per_page*3+1)
            ->get()
            ->toArray();
            $this->prev_page_count = count($this->prev_pages);

            $this->pending_applicant_data = DB::table('test_applications as ta')
                ->select(
                    // '*',
                    't_a_id',
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
                ->where('t_a_id','>',$this->cursor)
                ->where('t_a_test_type_id','=',$this->pending_test_type_id)
                ->orderBy('ta.'.$this->column_order, 'asc')
                ->limit($this->per_page)
                ->get()
                ->toArray();
                
        }
    }
    public function prev_page($cursor,$offset){
        $this->cursor = $cursor;
        $this->page_number = $this->page_number + $offset;

        if($this->pending_test_type_id == 0){
            $this->next_pages = DB::table('test_applications as ta')
                ->select(
                    // '*',
                    't_a_id'
                    )
                ->where('t_a_isactive','=',1)
                ->where('t_a_id','>=',$this->cursor)
                ->orderBy('ta.'.$this->column_order, 'asc')
                ->limit($this->per_page*3+1)
                ->get()
                ->toArray();
            $this->next_page_count = count($this->next_pages);

            $this->prev_pages = DB::table('test_applications as ta')
                ->select(
                    // '*',
                    't_a_id'
                    )
                ->where('t_a_isactive','=',1)
                ->where('t_a_id','<',$this->cursor)
                ->orderBy('ta.'.$this->column_order, 'desc')
                ->limit($this->per_page*3+1)
                ->get()
                ->toArray();
                $this->prev_page_count = count($this->prev_pages);
                $this->item_current = $this->cursor ;
                // dd($this->prev_page_count);
                // dd($this->prev_pages);
                // dd($this->next_pages);

            $this->pending_applicant_data = DB::table('test_applications as ta')
                ->select(
                    // '*',
                    't_a_id',
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
                ->where('t_a_id','>=',$this->cursor)
                ->orderBy('ta.'.$this->column_order, 'asc')
                ->limit($this->per_page)
                ->get()
                ->toArray();
        }else{
            $this->next_pages = DB::table('test_applications as ta')
                ->select(
                    // '*',
                    't_a_id'
                    )
                ->join('test_types as tt', 'tt.test_type_id', '=', 'ta.t_a_test_type_id')
                ->where('t_a_isactive','=',1)
                ->where('t_a_id','>=',$this->cursor)
                ->where('t_a_test_type_id','=',$this->pending_test_type_id)
                ->orderBy('ta.'.$this->column_order, 'asc')
                ->limit($this->per_page*3+1)
                ->get()
                ->toArray();
            $this->next_page_count = count($this->next_pages);

            $this->prev_pages = DB::table('test_applications as ta')
                ->select(
                    // '*',
                    't_a_id'
                    )
                ->join('test_types as tt', 'tt.test_type_id', '=', 'ta.t_a_test_type_id')
                ->where('t_a_isactive','=',1)
                ->where('t_a_id','<',$this->cursor)
                ->where('t_a_test_type_id','=',$this->pending_test_type_id)
                ->orderBy('ta.'.$this->column_order, 'desc')
                ->limit($this->per_page*3+1)
                ->get()
                ->toArray();
            $this->prev_page_count = count($this->prev_pages);
            $this->item_current = $this->cursor ;
            $this->pending_applicant_data = DB::table('test_applications as ta')
                ->select(
                    // '*',
                    't_a_id',
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
                ->where('t_a_id','>=',$this->cursor)
                ->where('t_a_test_type_id','=',$this->pending_test_type_id)
                ->orderBy('ta.'.$this->column_order, 'asc')
                ->limit($this->per_page)
                ->get()
                ->toArray();
        }
    }
    public function next_page($cursor,$offset){
        {
            // dd($cursor);
            $this->cursor = $cursor;
            $this->page_number = $this->page_number + $offset;

            if($this->pending_test_type_id == 0){
                $this->next_pages = DB::table('test_applications as ta')
                ->select(
                    // '*',
                    't_a_id'
                    )
                ->where('t_a_isactive','=',1)
                ->where('t_a_id','>',$this->cursor)
                ->orderBy('ta.'.$this->column_order, 'asc')
                ->limit($this->per_page*3+1)
                ->get()
                ->toArray();
                $this->next_page_count = count($this->next_pages);
                


                $this->prev_pages = DB::table('test_applications as ta')
                ->select(
                    // '*',
                    't_a_id'
                    )
                ->where('t_a_isactive','=',1)
                ->where('t_a_id','<=',$this->cursor)
                ->orderBy('ta.'.$this->column_order, 'desc')
                ->limit($this->per_page*3+1)
                ->get()
                ->toArray();
                $this->prev_page_count = count($this->prev_pages);
                $this->item_current = $this->cursor ;
                
                $this->pending_applicant_data = DB::table('test_applications as ta')
                ->select(
                    // '*',
                    't_a_id',
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
                ->where('t_a_id','>',$this->cursor)
                ->orderBy('ta.'.$this->column_order, 'asc')
                ->limit($this->per_page)
                ->get()
                ->toArray();

            }else{
                $this->next_pages = DB::table('test_applications as ta')
                ->select(
                    // '*',
                    't_a_id'
                    )
                ->join('test_types as tt', 'tt.test_type_id', '=', 'ta.t_a_test_type_id')
                ->where('t_a_isactive','=',1)
                ->where('t_a_id','>',$this->cursor)
                ->where('t_a_test_type_id','=',$this->pending_test_type_id)
                ->orderBy('ta.'.$this->column_order, 'asc')
                ->limit($this->per_page*3+1)
                ->get()
                ->toArray();
                $this->next_page_count = count($this->next_pages);
                


                $this->prev_pages = DB::table('test_applications as ta')
                ->select(
                    // '*',
                    't_a_id'
                    )
                ->join('test_types as tt', 'tt.test_type_id', '=', 'ta.t_a_test_type_id')
                ->where('t_a_isactive','=',1)
                ->where('t_a_id','<=',$this->cursor)
                ->where('t_a_test_type_id','=',$this->pending_test_type_id)
                ->orderBy('ta.'.$this->column_order, 'desc')
                ->limit($this->per_page*3+1)
                ->get()
                ->toArray();
                $this->prev_page_count = count($this->prev_pages);
                $this->item_current = $this->cursor ;
                
                $this->pending_applicant_data = DB::table('test_applications as ta')
                ->select(
                    // '*',
                    't_a_id',
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
                ->where('t_a_id','>',$this->cursor)
                ->where('t_a_test_type_id','=',$this->pending_test_type_id)
                ->orderBy('ta.'.$this->column_order, 'asc')
                ->limit($this->per_page)
                ->get()
                ->toArray();
            }
        }
    }

    public function first_page(){
        {
            $this->cursor = 0;
            $this->page_number = 1;
            if($this->pending_test_type_id == 0){
                $this->next_pages = DB::table('test_applications as ta')
                ->select(
                    // '*',
                    't_a_id'
                    )
                ->where('t_a_isactive','=',1)
                ->where('t_a_id','>',$this->cursor)
                ->orderBy('ta.'.$this->column_order, 'asc')
                ->limit($this->per_page*3+1)
                ->get()
                ->toArray();
                $this->next_page_count = count($this->next_pages);
                $this->prev_pages = DB::table('test_applications as ta')
                ->select(
                    // '*',
                    't_a_id'
                    )
                ->where('t_a_isactive','=',1)
                ->where('t_a_id','<',$this->cursor)
                ->orderBy('ta.'.$this->column_order, 'asc')
                ->limit($this->per_page*3+1)
                ->get()
                ->toArray();
                $this->prev_page_count = count($this->prev_pages);
                $this->item_current = $this->cursor ;

                $this->pending_applicant_data = DB::table('test_applications as ta')
                ->select(
                    // '*',
                    't_a_id',
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
                ->orderBy('ta.'.$this->column_order, 'asc')
                ->limit($this->per_page)
                ->get()
                ->toArray();
            }else{
                $this->next_pages = DB::table('test_applications as ta')
                ->select(
                    // '*',
                    't_a_id'
                    )
                ->where('t_a_isactive','=',1)
                ->where('t_a_id','>',$this->cursor)
                ->where('t_a_test_type_id','=',$this->pending_test_type_id)
                ->orderBy('ta.'.$this->column_order, 'asc')
                ->limit($this->per_page*3+1)
                ->get()
                ->toArray();
                $this->next_page_count = count($this->next_pages);

                $this->prev_pages = DB::table('test_applications as ta')
                ->select(
                    // '*',
                    't_a_id'
                    )
                ->where('t_a_isactive','=',1)
                ->where('t_a_test_type_id','=',$this->pending_test_type_id)
                ->where('t_a_id','<',$this->cursor)
                ->orderBy('ta.'.$this->column_order, 'asc')
                ->limit($this->per_page*3+1)
                ->get()
                ->toArray();
                $this->prev_page_count = count($this->prev_pages);
                $this->item_current = $this->cursor ;

                $this->pending_applicant_data = DB::table('test_applications as ta')
                ->select(
                    // '*',
                    't_a_id',
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
                ->where('t_a_test_type_id','=',$this->pending_test_type_id)
                ->orderBy('ta.'.$this->column_order, 'desc')
                ->limit($this->per_page)
                ->get()
                ->toArray();
            }
        
        }
    }

    public function last_page(){
        if($this->pending_test_type_id == 0){
            $pages = DB::table('test_applications as ta')
            ->select(
                // '*',
                DB::raw('COUNT(ta.t_a_id) as t_a_id_count')
                )
            ->where('ta.t_a_isactive','=',1)
            ->get()
            ->toArray()[0]->t_a_id_count;
            
            $pages = $pages/$this->per_page;
            $this->cursor = intval($pages)*$this->per_page;
            if($pages > intval($pages)){
                $pages = intval($pages)+1;
            
            }
            $this->page_number= $pages;
            
            $this->next_page_count = 0;


            $this->prev_pages = DB::table('test_applications as ta')
                ->select(
                    // '*',
                    'ta.t_a_id'
                    )
                ->where('t_a_isactive','=',1)
                ->where('ta.t_a_id','<',$this->cursor)
                ->orderBy('ta.'.$this->column_order, 'desc')
                ->limit($this->per_page*3+1)
                ->get()
                ->toArray();
            $this->prev_page_count = count($this->prev_pages);
            $this->item_current = $this->cursor ;
                // dd($this->prev_pages);
                // dd($this->prev_page_count);
                // dd($this->prev_pages[0]->t_a_id);
                

            $this->pending_applicant_data = DB::table('test_applications as ta')
                ->select(
                    // '*',
                    'ta.t_a_id',
                    DB::raw('CONCAT(u.user_lastname,", ",u.user_firstname," ",LEFT(u.user_middlename,1)) as user_fullname'),
                    'test_type_name',
                    DB::raw('DATE(ta.date_created) as date_applied')
                    )
                ->join('users as u', 'u.user_id', '=', 'ta.t_a_applicant_user_id')
                ->join('user_family_background as fb', 'fb.family_background_user_id', '=', 'u.user_id')
                ->join('test_types as tt', 'tt.test_type_id', '=', 'ta.t_a_test_type_id')
                ->join('test_status as ts', 'ts.test_status_id', '=', 'ta.t_a_test_status_id')
                ->join('school_years as sy', 'sy.school_year_id', '=', 'ta.t_a_school_year_id')
                ->where('ta.t_a_isactive','=',1)
                ->where('ta.t_a_id','>=',$this->prev_pages[0]->t_a_id)
                ->orderBy('ta.'.$this->column_order, 'desc')
                ->limit($this->per_page)
                ->get()
                ->toArray();
        }else{
            

            $pages = DB::table('test_applications as ta')
            ->select(
                // '*',
                DB::raw('COUNT(ta.t_a_id) as t_a_id_count')
                )
            ->where('ta.t_a_isactive','=',1)
            ->where('t_a_test_type_id','=',$this->pending_test_type_id)
            ->get()
            ->toArray()[0]->t_a_id_count;
            
            $pages = $pages/$this->per_page;
            $this->cursor = intval($pages)*$this->per_page;
            if($pages > intval($pages)){
                $pages = intval($pages)+1;
            
            }
            $this->page_number= $pages;
            
            $this->next_page_count = 0;


            $this->prev_pages = DB::table('test_applications as ta')
                ->select(
                    // '*',
                    'ta.t_a_id'
                    )
                ->where('t_a_isactive','=',1)
                ->where('ta.t_a_id','<',$this->cursor)
                ->where('t_a_test_type_id','=',$this->pending_test_type_id)
                ->orderBy('ta.'.$this->column_order, 'desc')
                ->limit($this->per_page*3+1)
                ->get()
                ->toArray();
            $this->prev_page_count = count($this->prev_pages);
            $this->item_current = $this->cursor ;
                // dd($this->prev_pages);
                // dd($this->prev_page_count);
                // dd($this->prev_pages[0]->t_a_id);
                

            $this->pending_applicant_data = DB::table('test_applications as ta')
                ->select(
                    // '*',
                    'ta.t_a_id',
                    DB::raw('CONCAT(u.user_lastname,", ",u.user_firstname," ",LEFT(u.user_middlename,1)) as user_fullname'),
                    'test_type_name',
                    DB::raw('DATE(ta.date_created) as date_applied')
                    )
                ->join('users as u', 'u.user_id', '=', 'ta.t_a_applicant_user_id')
                ->join('user_family_background as fb', 'fb.family_background_user_id', '=', 'u.user_id')
                ->join('test_types as tt', 'tt.test_type_id', '=', 'ta.t_a_test_type_id')
                ->join('test_status as ts', 'ts.test_status_id', '=', 'ta.t_a_test_status_id')
                ->join('school_years as sy', 'sy.school_year_id', '=', 'ta.t_a_school_year_id')
                ->where('ta.t_a_isactive','=',1)
                ->where('ta.t_a_id','>',$this->prev_pages[1]->t_a_id)
                ->where('t_a_test_type_id','=',$this->pending_test_type_id)
                ->orderBy('ta.'.$this->column_order, 'desc')
                ->limit($this->per_page)
                ->get()
                ->toArray();
        }

    }
}
