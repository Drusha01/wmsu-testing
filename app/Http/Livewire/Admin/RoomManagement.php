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

    // unasssigned room applicant
    public $unasssigned_applicant_data;
    public $unasssigned_test_type_id= 0;
    public $unasssigned_applicant_filter;
    public $unasssigned_selected_all;
    public $unasssigned_selected = [];

    // asssigned room applicant
    public $asssigned_applicant_data;
    public $asssigned_test_type_id= 0;
    public $asssigned_applicant_filter;
    public $asssigned_selected_all;
    public $asssigned_selected = [];

    // school room applicant
    public $school_room_data;
    public $school_room_college_type_id= 0;
    public $school_room_filter;



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


        }
    }

    public function mount(Request $request){
        $this->user_details = $request->session()->all();
        $this->title = 'room-management';

        $this->access_role = [
            'C' => true,
            'R' => true,
            'U' => true,
            'D' => true
        ];

        if($this->access_role['C'] || $this->access_role['R'] || $this->access_role['U'] || $this->access_role['D']){

            $this->unasssigned_applicant_filter = [
                'Select all' => true,
                '#' => true,
                'Code' => true,
                'Applicant name'=> true,
                'Exam type'=> true,
                'Date applied'	=> true,								
                'Actions'	=> true					
            ];

            $this->asssigned_applicant_filter = [
                'Select all' => true,
                '#' => true,
                'Code' => true,
                'Applicant name'=> true,
                'Exam type'=> true,
                'Date applied'	=> true,								
                'Actions'	=> true					
            ];

            $this->school_room_filter = [
                'Select all' => true,
                '#' => true,
                'Code' => true,
                'Applicant name'=> true,
                'Exam type'=> true,
                'Date applied'	=> true,								
                'Actions'	=> true					
            ];

            $this->exam_types = DB::table('test_types')
                ->select('test_type_id','test_type_name')
                ->get()
                ->toArray();

            $this->active = 'unassigned_room';

            $this->school_rooms = DB::table('school_rooms as sr')
                ->select(
                    '*'
                )
                ->get()
                ->toArray();

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

    public function unasssigned_applicant_filterView(){
        $this->dispatchBrowserEvent('swal:redirect',[
            'position'          									=> 'center',
            'icon'              									=> 'success',
            'title'             									=> 'Successfully changed filter!',
            'showConfirmButton' 									=> 'true',
            'timer'             									=> '1000',
            'link'              									=> '#'
        ]);

    }

    public function asssigned_applicant_filterView(){
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

    public function unasssigned_applicant_exam_type_filter(){

    }

    public function asssigned_applicant_exam_type_filter(){
        
    }

    

    // rooms crud
    public function active_page($active){
        $this->active = $active;
    }
}
