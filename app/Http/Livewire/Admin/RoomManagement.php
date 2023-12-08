<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Mail;

class RoomManagement extends Component
{

    public $mail = true;

    
    public $user_detais;
    public $title;

    public $active;

    public $school_room_data;
    public $school_room = [
        'school_room_id' =>NULL,
        'school_room_isactive' =>NULL,
        'school_room_bldg_name' =>NULL,
        'school_room_bldg_abr' =>NULL,
        'school_room_name' =>NULL,
        'school_room_number' =>NULL,
        'school_room_max_capacity' =>NULL,
        'school_room_proctor_user_id' =>NULL,
        'school_room_test_center_id' =>NULL,
        'school_room_description' =>NULL,
    ];

    public $test_center_data; 
    public $test_center = [
        'id' =>NULL,
        'test_center_code' =>NULL,
        'test_center_name' =>NULL,
        'test_center_code_name' =>NULL,
        'test_center_isactive' =>NULL,
    ];

    public $test_schedule_data;
    public $test_schedules = [
        'id' => NULL,
        'test_date' => NULL,
        'test_center_id' => NULL,
        'cet_type_id' => NULL
    ];

    public $proctor_data;
    
    public $assigned_examinees_data;

    public $assigned_room_data;

    public $examinees_data;


    
    public $test_date;

    public $column_order = 't_a_id';
    public $order_by = 'asc';


    public function booted(Request $request){
        $user_details = $request->session()->all();
        if(!isset($user_details['user_id'])){
            header("Location: /login");
            die();
        }else{
            $user_status = DB::table('users as u')
            ->select('u.user_status_id','us.user_status_details')
            ->join('user_status as us', 'u.user_status_id', '=', 'us.user_status_id')
            ->where('user_id','=', $user_details['user_id'])
            ->first();
        }

        if(isset($user_status->user_status_details) && $user_status->user_status_details == 'deleted' ){
            header("Location: /deleted");
            die();
        }

        if(isset($user_status->user_status_details) && $user_status->user_status_details == 'inactive' ){
            header("Location: /deleted");
            die();
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

           
                
           
        }
    }
    public function update_data(){
        $this->exam_types = DB::table('test_types')
            ->select('test_type_id','test_type_name')
            ->get()
            ->toArray();

        $this->school_rooms = DB::table('school_rooms as sr')
            ->join('test_centers as tc','tc.id','sr.school_room_test_center_id')
            ->leftjoin('users as u', 'u.user_id', '=', 'sr.school_room_proctor_user_id')
            ->select(
                '*'
            )
            ->get()
            ->toArray();
        
        $this->proctor_data = DB::table('users as u')
            ->select(
                "user_id",
                "user_firstname",
                "user_middlename",
                "user_lastname",
                "user_addr_street",
                "user_addr_brgy",
                "user_addr_city_mun",
                "user_addr_province"
            )
            // ->join('user_roles as ur', 'u.user_role_id', '=', 'ur.user_role_id')
            ->rightJoin('access_roles as ar', 'u.user_id', '=', 'ar.access_role_user_id')
            ->join('modules as m', 'ar.access_role_module_id', '=', 'm.module_id')
            // access_role_user_id 
            ->where('m.module_nav_name','=','Exam Administrator')
            ->get()
            ->toArray();
        

        $this->test_center_data = DB::table('test_centers')
            // ->where('test_center_isactive','=','1')
            ->get()
            ->toArray();
        $this->test_schedule_data = DB::table('test_schedules as ts')
            ->join('test_centers as tc','tc.id','ts.test_center_id')
            ->join('cet_types as ct', 'ct.cet_type_id', '=', 'ts.cet_type_id')
            ->get()
            ->toArray();
        
        $this->assigned_test_date = DB::table('test_applications as ta')
            ->select(
                'tsc.id as test_schedule_id',
                'test_date'
            )
            ->join('test_status as ts', 'ts.test_status_id', '=', 'ta.t_a_test_status_id')
            ->join('test_schedules as tsc', 'tsc.id', '=', 'ta.t_a_test_schedule_id')
            ->join('school_rooms as sr', 'sr.school_room_id', '=', 'ta.t_a_school_room_id')
            ->where('t_a_isactive','=',1)
            ->where('test_status_details','=','Accepted')
            ->groupBy('tsc.id')
            ->get()
            ->toArray();
            
             

            $this->assigned_room_data = DB::table('test_applications as ta')
            ->select(
                // '*',
                "school_room_id",
                "school_room_isactive",
                "school_room_bldg_name",
                "school_room_bldg_abr",
                "school_room_name",
                "school_room_number",
                "school_room_max_capacity",
                "school_room_proctor_user_id",
                "school_room_test_center_id",
                "test_center_code",
                "test_center_name",
                "test_center_code_name",
                "test_center_isactive",
            )
            ->join('test_status as ts', 'ts.test_status_id', '=', 'ta.t_a_test_status_id')
            ->join('test_schedules as tsc', 'tsc.id', '=', 'ta.t_a_test_schedule_id')
            ->join('school_rooms as sr', 'sr.school_room_id', '=', 'ta.t_a_school_room_id')
            ->join('test_centers as tc','tc.id','sr.school_room_test_center_id')
            ->where('t_a_isactive','=',1)
            ->where('test_status_details','=','Accepted')
            ->where('t_a_test_schedule_id','=', $this->test_date)
            ->groupBy('t_a_school_room_id')
            ->orderBy('t_a_school_room_id')
            ->get()
            ->toArray();
        // dd($this->assigned_room_data );
    }

    public function mount(Request $request){
        $this->user_details = $request->session()->all();
        $this->title = 'room-management';
        $this->active = 'assigned_room';

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
                'School Year'=> true,
                // 'A.Y.'=> true,
                'Date applied'	=> true,								
                'Actions'	=> true					
            ];

            $this->assigned_room_filter = [
                '#' => true,
                'Test Center Name'=>true,
                'Test Center Code'=>true,
                'Building name'=>true,
                'Room name'=> true,
                'Room no.'=> true,
                'Room Description' => false,
                'Capacity' => true,	
                'Status'=> true,							
                'Actions'	=> true					
            ];

            $this->school_room_filter = [
                // 'Select all' => true,
                '#' => true,
                'Proctor'=>true,
                'Test Center Name'=>true,
                'Test Center Code'=>true,
                'Building name'=>true,
                'Room name'=> true,
                'Room no.'=> true,
                'Room Description' => false,
                'Capacity' => true,	
                'Status'=> true,							
                'Actions'	=> true					
            ];

          

            $this->test_center_filter = [
                '#' => true,
                'Test Center Code' =>true,
                'Test Center Name' =>true,
                'Test Center Code Name' =>true,
                'isactive?' =>true,
                'Actions'=>true
            ];

            $this->test_schedule_filter = [
                '#' => true,
                'Test Date' =>true,
                'Test Center Code' =>true,
                'Test Center Name' =>true,
                'Student Type' =>false,
                'AM' =>true,
                'PM' =>true,
                'Actions'=>true
            ];

            // 'school_room_id' =>NULL,
            // 'school_room_isactive' =>NULL,
            // 'school_room_bldg_name' =>NULL,
            // 'school_room_bldg_abr' =>NULL,
            // 'school_room_name' =>NULL,
            // 'school_room_number' =>NULL,
            // 'school_room_max_capacity' =>NULL,
            // 'school_room_proctor_user_id' =>NULL,

           self::update_data();
           if($this->assigned_test_date){
                $this->test_date = $this->assigned_test_date[0]->test_schedule_id;
            }
            self::update_data();
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

   

    

    



    

    // rooms crud
    public function active_page($active){
        $this->active = $active;

      self::update_data();
    }


    public function view_examinees_list($school_room_id){
        $this->examinees_data = DB::table('test_applications as ta')
        ->select(
            '*',
            "school_room_id",
            "school_room_isactive",
            "school_room_bldg_name",
            "school_room_bldg_abr",
            "school_room_name",
            "school_room_number",
            "school_room_max_capacity",
            "school_room_proctor_user_id",
            "school_room_test_center_id",
            "test_center_code",
            "test_center_name",
            "test_center_code_name",
            "test_center_isactive",
        )
        ->join('test_status as ts', 'ts.test_status_id', '=', 'ta.t_a_test_status_id')
        ->join('test_schedules as tsc', 'tsc.id', '=', 'ta.t_a_test_schedule_id')
        ->join('school_rooms as sr', 'sr.school_room_id', '=', 'ta.t_a_school_room_id')
        ->join('test_centers as tc','tc.id','sr.school_room_test_center_id')
        ->where('t_a_isactive','=',1)
        ->where('test_status_details','=','Accepted')
        ->where('t_a_school_room_id','=', $school_room_id)
        ->get()
        ->toArray();
        dd( $this->examinees_data );
    }

    public function add_room(){
        $this->school_room = [
            'school_room_id' =>NULL,
            'school_room_isactive' =>NULL,
            'school_room_bldg_name' =>NULL,
            'school_room_bldg_abr' =>NULL,
            'school_room_name' =>NULL,
            'school_room_number' =>NULL,
            'school_room_max_capacity' =>30,
            'school_room_description' =>NULL,
            'school_room_proctor_user_id' =>NULL,
            'school_room_test_center_id' =>NULL,
        ];

        $this->dispatchBrowserEvent('openModal','addRoomModal');
        self::update_data();
    }
    public function save_add_room(){
        if(empty($this->school_room['school_room_test_center_id'])||
        empty($this->school_room['school_room_bldg_name']) ||
        empty($this->school_room['school_room_bldg_abr']) ||
        empty($this->school_room['school_room_name']) ||
        empty($this->school_room['school_room_number']) ||
        empty($this->school_room['school_room_max_capacity'])
        ){
            return ;
        }
        if(intval($this->school_room['school_room_test_center_id'])<=0){
            $this->dispatchBrowserEvent('swal:redirect',[
                'position'          									=> 'center',
                'icon'              									=> 'warning',
                'title'             									=> 'Please select test center!',
                'showConfirmButton' 									=> 'true',
                'timer'             									=> '1500',
                'link'              									=> '#'
            ]);
            return;
        }
        if(intval($this->school_room['school_room_proctor_user_id'])<=0){
            $this->dispatchBrowserEvent('swal:redirect',[
                'position'          									=> 'center',
                'icon'              									=> 'warning',
                'title'             									=> 'Please select room proctor!',
                'showConfirmButton' 									=> 'true',
                'timer'             									=> '1500',
                'link'              									=> '#'
            ]);
            return;
        }
        if(intval($this->school_room['school_room_max_capacity'])<=0){
            return;
        }
        if(DB::table('school_rooms')
            ->insert([
                'school_room_id' =>NULL,
                'school_room_isactive' =>1,
                'school_room_bldg_name' =>$this->school_room['school_room_bldg_name'],
                'school_room_bldg_abr' =>$this->school_room['school_room_bldg_abr'],
                'school_room_name' =>$this->school_room['school_room_name'],
                'school_room_number' =>$this->school_room['school_room_number'],
                'school_room_max_capacity' =>$this->school_room['school_room_max_capacity'],
                'school_room_description' =>$this->school_room['school_room_description'],
                'school_room_proctor_user_id' =>$this->school_room['school_room_proctor_user_id'],
                'school_room_test_center_id' =>$this->school_room['school_room_test_center_id'],
        ])){
            $this->dispatchBrowserEvent('swal:redirect',[
                'position'          									=> 'center',
                'icon'              									=> 'success',
                'title'             									=> 'Successfully added!',
                'showConfirmButton' 									=> 'true',
                'timer'             									=> '1500',
                'link'              									=> '#'
            ]);
        }else{
            $this->dispatchBrowserEvent('swal:redirect',[
                'position'          									=> 'center',
                'icon'              									=> 'warning',
                'title'             									=> 'Unsuccessfully added!',
                'showConfirmButton' 									=> 'true',
                'timer'             									=> '1500',
                'link'              									=> '#'
            ]);
        }
 

        $this->dispatchBrowserEvent('openModal','addRoomModal');
        self::update_data();
    }
    public function edit_room($school_room_id){
        $school_room = DB::table('school_rooms as sr')
            ->join('test_centers as tc','tc.id','sr.school_room_test_center_id')
            ->where('school_room_id','=',$school_room_id)
            ->first();
        $this->school_room = [
            'school_room_id' => $school_room->school_room_id,
            'school_room_isactive' => $school_room->school_room_isactive,
            'school_room_bldg_name' =>$school_room->school_room_bldg_name,
            'school_room_bldg_abr' =>$school_room->school_room_bldg_abr,
            'school_room_name' =>$school_room->school_room_name,
            'school_room_number' =>$school_room->school_room_number,
            'school_room_max_capacity' =>$school_room->school_room_max_capacity,
            'school_room_description' =>$school_room->school_room_description,
            'school_room_proctor_user_id' =>$school_room->school_room_proctor_user_id,
            'school_room_test_center_id' =>$school_room->school_room_test_center_id,
        ];
        
        $this->dispatchBrowserEvent('openModal','editRoomModal');
        self::update_data();
    }
    public function save_edit_room($school_room_id){
        if(empty($this->school_room['school_room_test_center_id'])||
        empty($this->school_room['school_room_bldg_name']) ||
        empty($this->school_room['school_room_bldg_abr']) ||
        empty($this->school_room['school_room_name']) ||
        empty($this->school_room['school_room_number']) ||
        empty($this->school_room['school_room_max_capacity'])
        ){
            return ;
        }
        if(intval($this->school_room['school_room_test_center_id'])<=0){
            return;
        }
        if(intval($this->school_room['school_room_max_capacity'])<=0){
            return;
        }
        if(DB::table('school_rooms')
            // ->where('school_room_id','=',$school_room_id)
            ->where('school_room_proctor_user_id','=',$this->school_room['school_room_proctor_user_id'])
            ->first()){
            $this->dispatchBrowserEvent('swal:redirect',[
                'position'          									=> 'center',
                'icon'              									=> 'warning',
                'title'             									=> 'Proctor Conflict!',
                'showConfirmButton' 									=> 'true',
                'timer'             									=> '1500',
                'link'              									=> '#'
            ]);
        }else{
            if(DB::table('school_rooms')
                ->where('school_room_id','=',$school_room_id)
                ->update([
                    'school_room_bldg_name' =>$this->school_room['school_room_bldg_name'],
                    'school_room_bldg_abr' =>$this->school_room['school_room_bldg_abr'],
                    'school_room_name' =>$this->school_room['school_room_name'],
                    'school_room_number' =>$this->school_room['school_room_number'],
                    'school_room_max_capacity' =>$this->school_room['school_room_max_capacity'],
                    'school_room_description' =>$this->school_room['school_room_description'],
                    'school_room_test_center_id' =>$this->school_room['school_room_test_center_id'],
                    'school_room_proctor_user_id' =>$this->school_room['school_room_proctor_user_id'],
            ])){
                $this->dispatchBrowserEvent('swal:redirect',[
                    'position'          									=> 'center',
                    'icon'              									=> 'success',
                    'title'             									=> 'Successfully updated!',
                    'showConfirmButton' 									=> 'true',
                    'timer'             									=> '1500',
                    'link'              									=> '#'
                ]);
            }else{
                $this->dispatchBrowserEvent('swal:redirect',[
                    'position'          									=> 'center',
                    'icon'              									=> 'warning',
                    'title'             									=> 'Unsuccessfully updated!',
                    'showConfirmButton' 									=> 'true',
                    'timer'             									=> '1500',
                    'link'              									=> '#'
                ]);
            }
            $this->dispatchBrowserEvent('openModal','editRoomModal');
        }
        self::update_data();
    }
    public function delete_room($school_room_id){
        $school_room = DB::table('school_rooms as sr')
            ->join('test_centers as tc','tc.id','sr.school_room_test_center_id')
            ->where('school_room_id','=',$school_room_id)
            ->first();
        $this->school_room = [
            'school_room_id' => $school_room->school_room_id,
            'school_room_isactive' => $school_room->school_room_isactive,
            'school_room_bldg_name' =>$school_room->school_room_bldg_name,
            'school_room_bldg_abr' =>$school_room->school_room_bldg_abr,
            'school_room_name' =>$school_room->school_room_name,
            'school_room_number' =>$school_room->school_room_number,
            'school_room_max_capacity' =>$school_room->school_room_max_capacity,
            'school_room_description' =>$school_room->school_room_description,
            'school_room_proctor_user_id' =>$school_room->school_room_proctor_user_id,
            'school_room_test_center_id' =>$school_room->school_room_test_center_id,
        ];
        
        $this->dispatchBrowserEvent('openModal','DeleteRoomModal');
        self::update_data();
    }
    public function save_delete_room($school_room_id){
        if(DB::table('school_rooms')
            ->where('school_room_id','=',$school_room_id)
            ->update([
                'school_room_isactive' =>0,
        ])){
            $this->dispatchBrowserEvent('swal:redirect',[
                'position'          									=> 'center',
                'icon'              									=> 'success',
                'title'             									=> 'Successfully updated!',
                'showConfirmButton' 									=> 'true',
                'timer'             									=> '1500',
                'link'              									=> '#'
            ]);
        }else{
            $this->dispatchBrowserEvent('swal:redirect',[
                'position'          									=> 'center',
                'icon'              									=> 'warning',
                'title'             									=> 'Unsuccessfully updated!',
                'showConfirmButton' 									=> 'true',
                'timer'             									=> '1500',
                'link'              									=> '#'
            ]);
        }
        $this->dispatchBrowserEvent('openModal','DeleteRoomModal');
        self::update_data();
    }
    public function activate_room($school_room_id){
        $school_room = DB::table('school_rooms as sr')
            ->join('test_centers as tc','tc.id','sr.school_room_test_center_id')
            ->where('school_room_id','=',$school_room_id)
            ->first();
        $this->school_room = [
            'school_room_id' => $school_room->school_room_id,
            'school_room_isactive' => $school_room->school_room_isactive,
            'school_room_bldg_name' =>$school_room->school_room_bldg_name,
            'school_room_bldg_abr' =>$school_room->school_room_bldg_abr,
            'school_room_name' =>$school_room->school_room_name,
            'school_room_number' =>$school_room->school_room_number,
            'school_room_max_capacity' =>$school_room->school_room_max_capacity,
            'school_room_description' =>$school_room->school_room_description,
            'school_room_proctor_user_id' =>$school_room->school_room_proctor_user_id,
            'school_room_test_center_id' =>$school_room->school_room_test_center_id,
        ];
        
        $this->dispatchBrowserEvent('openModal','ActivateRoomModal');
        self::update_data();
    }
    public function save_actvate_room($school_room_id){
        if(DB::table('school_rooms')
            ->where('school_room_id','=',$school_room_id)
            ->update([
                'school_room_isactive' =>0,
        ])){
            $this->dispatchBrowserEvent('swal:redirect',[
                'position'          									=> 'center',
                'icon'              									=> 'success',
                'title'             									=> 'Successfully updated!',
                'showConfirmButton' 									=> 'true',
                'timer'             									=> '1500',
                'link'              									=> '#'
            ]);
        }else{
            $this->dispatchBrowserEvent('swal:redirect',[
                'position'          									=> 'center',
                'icon'              									=> 'warning',
                'title'             									=> 'Unsuccessfully updated!',
                'showConfirmButton' 									=> 'true',
                'timer'             									=> '1500',
                'link'              									=> '#'
            ]);
        }
        $this->dispatchBrowserEvent('openModal','ActivateRoomModal');
        self::update_data();
    }
    public function save_activate_room($school_room_id){
        if(DB::table('school_rooms')
            ->where('school_room_id','=',$school_room_id)
            ->update([
                'school_room_isactive' =>1,
        ])){
            $this->dispatchBrowserEvent('swal:redirect',[
                'position'          									=> 'center',
                'icon'              									=> 'success',
                'title'             									=> 'Successfully activated!',
                'showConfirmButton' 									=> 'true',
                'timer'             									=> '1500',
                'link'              									=> '#'
            ]);
        }else{
            $this->dispatchBrowserEvent('swal:redirect',[
                'position'          									=> 'center',
                'icon'              									=> 'warning',
                'title'             									=> 'Unsuccessfully activated!',
                'showConfirmButton' 									=> 'true',
                'timer'             									=> '1500',
                'link'              									=> '#'
            ]);
        }
        $this->dispatchBrowserEvent('openModal','ActivateRoomModal');
        self::update_data();
    }

    public function add_test_center(){
        $this->test_center = [
            'id' =>NULL,
            'test_center_code' =>NULL,
            'test_center_name' =>NULL,
            'test_center_code_name' =>NULL,
            'test_center_isactive' =>NULL,
        ];

        $this->dispatchBrowserEvent('openModal','addTestCenterModal');
        self::update_data();
    }
    public function save_add_test_center(){
        if(
        empty($this->test_center['test_center_code']) || 
        empty($this->test_center['test_center_name'])){
            return;
        }

        if(DB::table('test_centers')
            ->insert([
                'id' =>NULL,
                'test_center_code' =>$this->test_center['test_center_code'],
                'test_center_name' =>$this->test_center['test_center_name'],
                'test_center_code_name' =>$this->test_center['test_center_code_name'],
                'test_center_isactive' =>1,
        ])){
            $this->dispatchBrowserEvent('swal:redirect',[
                'position'          									=> 'center',
                'icon'              									=> 'success',
                'title'             									=> 'Successfully added!',
                'showConfirmButton' 									=> 'true',
                'timer'             									=> '1500',
                'link'              									=> '#'
            ]);
        }else{
            $this->dispatchBrowserEvent('swal:redirect',[
                'position'          									=> 'center',
                'icon'              									=> 'warning',
                'title'             									=> 'Unsuccessfully added!',
                'showConfirmButton' 									=> 'true',
                'timer'             									=> '1500',
                'link'              									=> '#'
            ]);
        }

        $this->dispatchBrowserEvent('openModal','addTestCenterModal');
        self::update_data();
    }
    public function delete_test_center($id){
        if($test_center = DB::table('test_centers')
            ->where('id','=',$id)
            ->first()){
            $this->test_center = [
                'id' => $test_center->id,
                'test_center_code' => $test_center->test_center_code,
                'test_center_name' =>$test_center->test_center_name,
                'test_center_code_name' =>$test_center->test_center_code_name,
                'test_center_isactive' => $test_center->test_center_isactive,
            ];
            $this->dispatchBrowserEvent('openModal','deleteTestCenterModal');
            self::update_data();
        }
    }
    public function save_delete_test_center($id){
        if(DB::table('test_centers')
            ->where('id','=',$id)
            ->update([
                'test_center_isactive' =>0
            ])){
            $this->dispatchBrowserEvent('swal:redirect',[
                'position'          									=> 'center',
                'icon'              									=> 'success',
                'title'             									=> 'Successfully updated!',
                'showConfirmButton' 									=> 'true',
                'timer'             									=> '1500',
                'link'              									=> '#'
            ]);
        }else{
            $this->dispatchBrowserEvent('swal:redirect',[
                'position'          									=> 'center',
                'icon'              									=> 'warning',
                'title'             									=> 'Unsuccessfully updated!',
                'showConfirmButton' 									=> 'true',
                'timer'             									=> '1500',
                'link'              									=> '#'
            ]);
        }
        $this->dispatchBrowserEvent('openModal','deleteTestCenterModal');
        self::update_data();
    }
    public function activate_test_center($id){
        if($test_center = DB::table('test_centers')
            ->where('id','=',$id)
            ->first()){
            $this->test_center = [
                'id' => $test_center->id,
                'test_center_code' => $test_center->test_center_code,
                'test_center_name' =>$test_center->test_center_name,
                'test_center_code_name' =>$test_center->test_center_code_name,
                'test_center_isactive' => $test_center->test_center_isactive,
            ];
            $this->dispatchBrowserEvent('openModal','ActivateTestCenterModal');
            self::update_data();
        }
    }
    public function save_activate_test_center($id){
        if(DB::table('test_centers')
            ->where('id','=',$id)
            ->update([
                'test_center_isactive' =>1
            ])){
            $this->dispatchBrowserEvent('swal:redirect',[
                'position'          									=> 'center',
                'icon'              									=> 'success',
                'title'             									=> 'Successfully updated!',
                'showConfirmButton' 									=> 'true',
                'timer'             									=> '1500',
                'link'              									=> '#'
            ]);
        }else{
            $this->dispatchBrowserEvent('swal:redirect',[
                'position'          									=> 'center',
                'icon'              									=> 'warning',
                'title'             									=> 'Unsuccessfully updated!',
                'showConfirmButton' 									=> 'true',
                'timer'             									=> '1500',
                'link'              									=> '#'
            ]);
        }
        $this->dispatchBrowserEvent('openModal','ActivateTestCenterModal');
        self::update_data();
    }
    public function edit_test_center($id){
        if($test_center = DB::table('test_centers')
            ->where('id','=',$id)
            ->first()){
            $this->test_center = [
                'id' => $test_center->id,
                'test_center_code' => $test_center->test_center_code,
                'test_center_name' =>$test_center->test_center_name,
                'test_center_code_name' =>$test_center->test_center_code_name,
                'test_center_isactive' => $test_center->test_center_isactive,
            ];
            $this->dispatchBrowserEvent('openModal','editTestCenterModal');
            self::update_data();
        }
    }
    public function save_edit_test_center($id){
        if(DB::table('test_centers')
            ->where('id','=',$id)
            ->update([
                'test_center_code' => $this->test_center['test_center_code'],
                'test_center_name' => $this->test_center['test_center_name'],
                'test_center_code_name' => $this->test_center['test_center_code_name'],
            ])){
            $this->dispatchBrowserEvent('swal:redirect',[
                'position'          									=> 'center',
                'icon'              									=> 'success',
                'title'             									=> 'Successfully updated!',
                'showConfirmButton' 									=> 'true',
                'timer'             									=> '1500',
                'link'              									=> '#'
            ]);
        }else{
            $this->dispatchBrowserEvent('swal:redirect',[
                'position'          									=> 'center',
                'icon'              									=> 'warning',
                'title'             									=> 'Unsuccessfully updated!',
                'showConfirmButton' 									=> 'true',
                'timer'             									=> '1500',
                'link'              									=> '#'
            ]);
        }
        $this->dispatchBrowserEvent('openModal','editTestCenterModal');
        self::update_data();
    }

}

