<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;

class ExamAdministrator extends Component
{
    public $user_detais;
    public $title;
    public $assigned_rooms;
    public $assigned_proctor_filter;
    public $assigned_room_data;

    public $examinees = [];
    public $room_details =[];

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
        self::update_data();
        $this->examinees = [];
        $this->room_details =[];
    }

    public function update_data(){
        // dd($this->user_details);
        $this->assigned_rooms = DB::table('school_rooms')
        ->where('school_room_proctor_user_id','=',$this->user_details['user_id'])
        ->get()
        ->toArray();

        $this->assigned_room_data = DB::table('test_applications as ta')
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
            ->where('test_status_details','=','Accepted')
            ->whereNotNull('t_a_school_room_id')
            ->where('school_room_isactive','=',1)
            ->where('school_room_proctor_user_id','=',$this->user_details['user_id'])
            ->groupBy('t_a_school_room_id')
            ->get()
            ->toArray();
        
    }
    public function mount(Request $request){
        $this->user_details = $request->session()->all();
        $this->title = 'exam-administrator';

        $this->access_role = [
            'C' => true,
            'R' => true,
            'U' => true,
            'D' => true
        ];

        if($this->access_role['C'] || $this->access_role['R'] || $this->access_role['U'] || $this->access_role['D']){
            $this->assigned_proctor_filter = [
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
                'Actions'	=> true						
            ];
            self::update_data();
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

    public function download_examinees_list(){
       
        
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
}
