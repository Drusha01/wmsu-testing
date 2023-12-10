<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;
use Mail;

class ExamAdministrator extends Component
{
    
    public $mail = true;

    public $user_detais;
    public $title;
    public $assigned_rooms;
    public $assigned_proctor_filter;
    public $assigned_room_data;

    public $examinees = [];
    public $test_scheules;
    public $room_details =[];
    public $test_date ;
    public $test_scheule;
    public $active;

    public $a_test_schedule;
    public $a_room_details;
    public $a_examinees;
    public $a_test_schedule_id;
    public $a_school_room_id;
    public $room_schedule;
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
        self::update_data();
        $this->examinees = [];
        $this->room_details =[];
    }

    public function update_data(){

        // dd($this->user_details);
        $this->school_rooms = DB::table('school_rooms as sr')
            ->join('test_centers as tc','tc.id','sr.school_room_test_center_id')
            ->leftjoin('users as u', 'u.user_id', '=', 'sr.school_room_proctor_user_id')
            ->select(
                '*'
            )
            ->where('school_room_proctor_user_id','=', $this->user_details['user_id'])
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
            ->leftjoin('proctors as p','p.schedule_room_id',DB::raw('CONCAT(t_a_test_schedule_id," - ",t_a_school_room_id)'))
            ->where('p.user_id','=',$this->user_details['user_id'])
            ->where('t_a_isactive','=',1)
            ->where('test_status_details','=','Accepted')
            ->groupBy('tsc.id')
            ->get()
            ->toArray();
            

        
        $this->assigned_room_data = DB::table('test_applications as ta')
            ->select(
                // '*',
                'p.user_id',
                'user_lastname',
                'user_firstname',
                'user_middlename',
                DB::raw('count(t_a_id) as total_examinees_count'),
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
                'test_date',
                DB::raw('tsc.id as test_schedule_id')
            )
            ->join('test_status as ts', 'ts.test_status_id', '=', 'ta.t_a_test_status_id')
            ->join('test_schedules as tsc', 'tsc.id', '=', 'ta.t_a_test_schedule_id')
            ->join('school_rooms as sr', 'sr.school_room_id', '=', 'ta.t_a_school_room_id')
            ->join('test_centers as tc','tc.id','sr.school_room_test_center_id')
            ->leftjoin('proctors as p','p.schedule_room_id',DB::raw('CONCAT(t_a_test_schedule_id," - ",t_a_school_room_id)'))
            ->where('p.user_id','=',$this->user_details['user_id'])
            ->leftjoin('users as u', 'u.user_id', '=', 'p.user_id')
            ->where('t_a_isactive','=',1)
            ->where('test_status_details','=','Accepted')
            ->where('t_a_test_schedule_id','=', $this->test_date)
            ->groupBy('t_a_school_room_id')
            ->orderBy('t_a_school_room_id')
            ->get()
            ->toArray();
            // dd($this->assigned_room_data );

        $this->a_test_schedule = DB::table('test_applications as ta')
            ->select(
                'tsc.id as test_schedule_id',
                'test_date'
            )
            ->join('test_status as ts', 'ts.test_status_id', '=', 'ta.t_a_test_status_id')
            ->join('test_schedules as tsc', 'tsc.id', '=', 'ta.t_a_test_schedule_id')
            ->join('school_rooms as sr', 'sr.school_room_id', '=', 'ta.t_a_school_room_id')
            ->leftjoin('proctors as p','p.schedule_room_id',DB::raw('CONCAT(t_a_test_schedule_id," - ",t_a_school_room_id)'))
            ->where('p.user_id','=',$this->user_details['user_id'])
            ->where('t_a_isactive','=',1)
            ->where('test_status_details','=','Accepted')
            ->groupBy('tsc.id')
            ->get()
            ->toArray();

            
        $this->a_room_details =DB::table('test_applications as ta')
            ->select(
            //    '*',
                "school_room_id",
                "school_room_isactive",
                "school_room_bldg_name",
                "school_room_bldg_abr",
                "school_room_name",
                "school_room_number",
                "school_room_max_capacity",
                "school_room_proctor_user_id",
                "school_room_test_center_id",
            )
            ->join('test_status as ts', 'ts.test_status_id', '=', 'ta.t_a_test_status_id')
            ->join('test_schedules as tsc', 'tsc.id', '=', 'ta.t_a_test_schedule_id')
            ->join('school_rooms as sr', 'sr.school_room_id', '=', 'ta.t_a_school_room_id')
            ->leftjoin('proctors as p','p.schedule_room_id',DB::raw('CONCAT(t_a_test_schedule_id," - ",t_a_school_room_id)'))
            ->where('p.user_id','=',$this->user_details['user_id'])
            ->where('t_a_isactive','=',1)
            ->where('test_status_details','=','Accepted')
            ->where('t_a_test_schedule_id','=', $this->a_test_schedule_id)
            ->groupBy('sr.school_room_id')
            ->get()
            ->toArray();

        $this->a_examinees = DB::table('test_applications as ta')
            ->select(
                '*',
                "ta.t_a_id",
                "ispresent",
                "user_firstname",
                "user_middlename",
                "user_lastname",
                'tsc.id as test_schedule_id',
                'test_date',
                't_a_ampm'
            )
            ->join('test_status as ts', 'ts.test_status_id', '=', 'ta.t_a_test_status_id')
            ->join('test_schedules as tsc', 'tsc.id', '=', 'ta.t_a_test_schedule_id')
            ->join('school_rooms as sr', 'sr.school_room_id', '=', 'ta.t_a_school_room_id')
            ->leftjoin('users as u', 'u.user_id', '=', 'ta.t_a_applicant_user_id')
            ->leftjoin('attendance as a','ta.t_a_id','a.t_a_id')
            ->leftjoin('proctors as p','p.schedule_room_id',DB::raw('CONCAT(t_a_test_schedule_id," - ",t_a_school_room_id)'))
            ->where('p.user_id','=',$this->user_details['user_id'])
            ->where('t_a_isactive','=',1)
            ->where('test_status_details','=','Accepted')
            ->where('school_room_id','=',$this->a_school_room_id)
            ->where('t_a_test_schedule_id','=', $this->a_test_schedule_id)
            ->get()
            ->toArray();

    }
    public function mount(Request $request){
        $this->user_details = $request->session()->all();
        $this->title = 'exam-administrator';
        $this->active = 'exam_admin';

        $this->access_role = [
            'C' => true,
            'R' => true,
            'U' => true,
            'D' => true
        ];

        if($this->access_role['C'] || $this->access_role['R'] || $this->access_role['U'] || $this->access_role['D']){
            $this->assigned_proctor_filter = [
                // 'Select all' => true,
                '#' => true,
                'Proctor'=>true,
                'Test Date'=>true,
                'Test Center Name'=>true,
                'Test Center Code'=>true,
                'Building name'=>true,
                'Room name'=> true,
                'Room no.'=> true,
                'Room Description' => false,
                'Capacity' => true,	
                'Examinees count'=>true,
                'Status'=> true,							
                'Actions'	=> true					
            ];
            self::update_data();
            if($this->assigned_test_date){
                $this->test_date = $this->assigned_test_date[0]->test_schedule_id;
            }
            if($this->assigned_test_date){
                $this->a_test_schedule_id = $this->assigned_test_date[0]->test_schedule_id;
            }
            self::update_data();
            if($this->a_room_details){
                $this->a_school_room_id = $this->a_room_details[0]->school_room_id;
            }
            
            self::update_data();
            // dd( $this->a_test_schedule );

            $this->room_schedule['ampm'] = 'AM';

        }
    }
    public function render()
    {
        return view('livewire.admin.exam-administrator',[
            'user_details' => $this->user_details
            ])
            ->layout('layouts.admin',[
                'title'=>$this->title]);
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
    public function view_list_of_examinees_with_proctor($school_room_id){
        $this->examinees = DB::table('test_applications as ta')
            ->select(
                'user_id',
                'user_name',
                'user_address',
                'user_firstname',
                'user_middlename',
                'user_lastname' 
                )
            ->join('users as u','u.user_id','ta.t_a_applicant_user_id')
            ->where('ta.t_a_school_room_id','=',$school_room_id)
            ->get()
            ->toArray();
        $this->room_details = DB::table('school_rooms as sr')
                ->select(
                    'user_id',
                    'user_name',
                    'user_address',
                    'user_firstname',
                    'user_middlename',
                    'user_lastname',
                    'school_room_college_name',
                    'school_room_college_abr',
                    'school_room_venue',
                    'school_room_name',
                    'school_room_test_center',
                    'school_room_description',
                    'school_room_id'
                    )
                ->join('users as u','u.user_id','sr.school_room_proctor_user_id')
                ->where('sr.school_room_id','=',$school_room_id)
                ->get()
                ->toArray();
        $this->dispatchBrowserEvent('openModal','viewExamineesWithProctorModal');
    }

    public function download_all_examinees_list(){
       
        
        $file_name = 'my list.pdf';
        $path = (public_path().'/pdf');
        if(!is_dir($path)){
            mkdir($path);
        }
        $file_list = scandir($path);
        foreach ($file_list as $key => $value) {
            if($key>1){
                unlink($path.'/'.$value);
            }
        }

        $this->assigned_rooms = DB::table('school_rooms')
        ->where('school_room_proctor_user_id','=',$this->user_details['user_id'])
        ->get()
        ->toArray();

        $data = array('1','3');
        $user_details = $this->user_details;
       
        
        // get data
        $pdf = Pdf::loadView('Exports.Examinees_list',['assigned_rooms'=>$this->assigned_rooms,'user_details'=>$this->user_details])->setPaper('a4', 'portrait')->setWarnings(false)->save($path.'/'.$file_name);
        return response()->download($path.'/'.$file_name);
        // return $pdf->stream('invoice.pdf');
    }
    
    public function active_page($active){
        $this->active = $active;

    }

    public function download_examinees_list($school_room_id){

        $this->test_schedule = DB::table('test_applications as ta')
            ->select(
                'tsc.id as test_schedule_id',
                'test_date'
            )
            ->join('test_status as ts', 'ts.test_status_id', '=', 'ta.t_a_test_status_id')
            ->join('test_schedules as tsc', 'tsc.id', '=', 'ta.t_a_test_schedule_id')
            ->join('school_rooms as sr', 'sr.school_room_id', '=', 'ta.t_a_school_room_id')
            ->where('school_room_proctor_user_id','=', $this->user_details['user_id'])
            ->where('t_a_isactive','=',1)
            ->where('test_status_details','=','Accepted')
            ->where('school_room_id','=',$school_room_id)
            ->where('t_a_test_schedule_id','=', $this->test_date)
            ->groupBy('tsc.id')
            ->get()
            ->toArray();

        $this->room_details = DB::table('school_rooms as sr')
            ->join('test_centers as tc','tc.id','sr.school_room_test_center_id')
            ->leftjoin('users as u', 'u.user_id', '=', 'sr.school_room_proctor_user_id')
            ->select(
                '*'
            )
            ->where('school_room_proctor_user_id','=', $this->user_details['user_id'])
            ->where('school_room_id','=',$school_room_id)
            ->get()
            ->toArray();
     
        $this->examinees = DB::table('test_applications as ta')
            ->select(
                '*',
                'tsc.id as test_schedule_id',
                'test_date'
            )
            ->join('test_status as ts', 'ts.test_status_id', '=', 'ta.t_a_test_status_id')
            ->join('test_schedules as tsc', 'tsc.id', '=', 'ta.t_a_test_schedule_id')
            ->join('school_rooms as sr', 'sr.school_room_id', '=', 'ta.t_a_school_room_id')
            ->where('school_room_proctor_user_id','=', $this->user_details['user_id'])
            ->where('t_a_isactive','=',1)
            ->where('test_status_details','=','Accepted')
            ->where('school_room_id','=',$school_room_id)
            ->where('t_a_test_schedule_id','=', $this->test_date)
            ->get()
            ->toArray();
        dd($this->test_schedule,$this->room_details ,$this->examinees );
    }

    public function view_examinees_list($test_schedule_id,$school_room_id){
        self::schedule_room_data($test_schedule_id,$school_room_id);
        // dd($this->examinees_data);
        $this->dispatchBrowserEvent('openModal','studentListModal');
        self::update_data();
    }

    public function schedule_room_data($test_schedule_id,$school_room_id){
        $schedule_data = DB::table('test_applications as ta')
            ->select(
                "school_room_id",
                "school_room_bldg_name",
                "school_room_bldg_abr",
                "school_room_name",
                "school_room_number",
                "school_room_test_center_id",
                "test_center_code",
                "test_center_name",
                'tsc.id as test_schedule_id',
                'tsc.test_date as test_date',
            )
            ->join('test_status as ts', 'ts.test_status_id', '=', 'ta.t_a_test_status_id')
            ->join('test_schedules as tsc', 'tsc.id', '=', 'ta.t_a_test_schedule_id')
            ->join('school_rooms as sr', 'sr.school_room_id', '=', 'ta.t_a_school_room_id')
            ->join('test_centers as tc','tc.id','sr.school_room_test_center_id')
            ->where('t_a_isactive','=',1)
            ->where('test_status_details','=','Accepted')
            ->where('t_a_school_room_id','=', $school_room_id)
            ->where('t_a_test_schedule_id','=', $test_schedule_id)
            ->first();


        $this->room_schedule = [
            "school_room_id" => $schedule_data->school_room_id,
            "school_room_bldg_name" => $schedule_data->school_room_bldg_name,
            "school_room_bldg_abr" => $schedule_data->school_room_bldg_abr,
            "school_room_name" => $schedule_data->school_room_name,
            "school_room_number" => $schedule_data->school_room_number, 
            "school_room_test_center_id" => $schedule_data->school_room_test_center_id,
            "test_center_code" => $schedule_data->test_center_code,
            "test_center_name" => $schedule_data->test_center_name,
            "test_schedule_id"=> $schedule_data->test_schedule_id,
            "test_date"=> $schedule_data->test_date,
            "ampm"=> "AM",
        ];

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
                DB::raw('DATE(ta.date_created) as applied_date')
            )
            ->join('test_status as ts', 'ts.test_status_id', '=', 'ta.t_a_test_status_id')
            ->join('users as u', 'u.user_id', '=', 'ta.t_a_applicant_user_id')
            ->join('test_schedules as tsc', 'tsc.id', '=', 'ta.t_a_test_schedule_id')
            ->join('school_rooms as sr', 'sr.school_room_id', '=', 'ta.t_a_school_room_id')
            ->join('test_centers as tc','tc.id','sr.school_room_test_center_id')
            ->leftjoin('proctors as p','p.schedule_room_id',DB::raw('CONCAT(t_a_test_schedule_id," - ",t_a_school_room_id)'))
            ->where('p.user_id','=',$this->user_details['user_id'])
            ->where('t_a_isactive','=',1)
            ->where('test_status_details','=','Accepted')
            ->where('t_a_school_room_id','=', $school_room_id)
            ->where('t_a_test_schedule_id','=', $test_schedule_id)
            ->get()
            ->toArray();
    }
    public function view_schedule_change($ampm){
    
        self::update_attendance_data();
        $this->room_schedule['ampm'] = $ampm;

        self::update_data();
    }

    public function update_attendance_data(){
        $this->a_room_details =DB::table('test_applications as ta')
        ->select(
        //    '*',
            "school_room_id",
            "school_room_isactive",
            "school_room_bldg_name",
            "school_room_bldg_abr",
            "school_room_name",
            "school_room_number",
            "school_room_max_capacity",
            "school_room_proctor_user_id",
            "school_room_test_center_id",
        )
        ->join('test_status as ts', 'ts.test_status_id', '=', 'ta.t_a_test_status_id')
        ->join('test_schedules as tsc', 'tsc.id', '=', 'ta.t_a_test_schedule_id')
        ->join('school_rooms as sr', 'sr.school_room_id', '=', 'ta.t_a_school_room_id')
        ->leftjoin('proctors as p','p.schedule_room_id',DB::raw('CONCAT(t_a_test_schedule_id," - ",t_a_school_room_id)'))
        ->where('p.user_id','=',$this->user_details['user_id'])
        ->where('t_a_isactive','=',1)
        ->where('test_status_details','=','Accepted')
        ->where('t_a_test_schedule_id','=', $this->a_test_schedule_id)
        ->groupBy('sr.school_room_id')
        ->get()
        ->toArray();

    $this->a_examinees = DB::table('test_applications as ta')
        ->select(
            '*',
            "ta.t_a_id",
            "ispresent",
            "user_firstname",
            "user_middlename",
            "user_lastname",
            'tsc.id as test_schedule_id',
            'test_date',
            't_a_ampm'
        )
        ->join('test_status as ts', 'ts.test_status_id', '=', 'ta.t_a_test_status_id')
        ->join('test_schedules as tsc', 'tsc.id', '=', 'ta.t_a_test_schedule_id')
        ->join('school_rooms as sr', 'sr.school_room_id', '=', 'ta.t_a_school_room_id')
        ->leftjoin('users as u', 'u.user_id', '=', 'ta.t_a_applicant_user_id')
        ->leftjoin('attendance as a','ta.t_a_id','a.t_a_id')
        ->leftjoin('proctors as p','p.schedule_room_id',DB::raw('CONCAT(t_a_test_schedule_id," - ",t_a_school_room_id)'))
        ->where('p.user_id','=',$this->user_details['user_id'])
        ->where('t_a_isactive','=',1)
        ->where('test_status_details','=','Accepted')
        ->where('school_room_id','=',$this->a_school_room_id)
        ->where('t_a_test_schedule_id','=', $this->a_test_schedule_id)
        ->get()
        ->toArray();
    }
    

    public function attendance_list($school_room_id){

 
    $this->a_examinees = DB::table('test_applications as ta')
        ->select(
            '*',
            "ta.t_a_id",
            "ispresent",
            "user_firstname",
            "user_middlename",
            "user_lastname",
            'tsc.id as test_schedule_id',
            'test_date',
            't_a_ampm'
        )
        ->join('test_status as ts', 'ts.test_status_id', '=', 'ta.t_a_test_status_id')
        ->join('test_schedules as tsc', 'tsc.id', '=', 'ta.t_a_test_schedule_id')
        ->join('school_rooms as sr', 'sr.school_room_id', '=', 'ta.t_a_school_room_id')
        ->leftjoin('attendance as a','ta.t_a_id','a.t_a_id')
        ->where('school_room_proctor_user_id','=', $this->user_details['user_id'])
        ->where('t_a_isactive','=',1)
        ->where('test_status_details','=','Accepted')
        ->where('school_room_id','=',$this->a_school_room_id)
        ->where('t_a_test_schedule_id','=', $this->a_test_schedule_id)
        ->get()
        ->toArray();
        dd($this->a_test_schedule,$this->a_room_details ,$this->a_examinees );
    }
    public function check_attendance($t_a_id,$checked){
        // dd($checked);
        if($checked){
            if(DB::table('attendance')
            ->where('t_a_id','=',$t_a_id)
            ->first() ){
                DB::table('attendance')
                ->where('t_a_id','=',$t_a_id)
                ->update([
                        'ispresent' =>$checked
                    ]);
            }else{
                DB::table('attendance')
                ->insert([
                        'id' => NULL,
                        't_a_id' =>$t_a_id
                    ]);
            }
        
        }else{
            DB::table('attendance')
            ->where('t_a_id','=',$t_a_id)
            ->update([
                    'ispresent' =>$checked
                ]);
        }
        

        self::update_data();
        // dd($t_a_id);
    }
}
