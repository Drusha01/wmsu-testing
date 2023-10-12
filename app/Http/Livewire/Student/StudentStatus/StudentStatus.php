<?php

namespace App\Http\Livewire\Student\StudentStatus;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class StudentStatus extends Component
{
    public $user_detais;
    public $title;
    public function mount(Request $request){
        $this->user_details = $request->session()->all();
        $this->title = 'status';

        if($status = DB::table('test_applications')
            ->where('t_a_test_type_id', '=', 
                ((array) DB::table('test_types')
                    ->where('test_type_details', '=', 'College Entrance Test')
                    ->select('test_type_id as t_a_test_type_id')
                    ->first())['t_a_test_type_id'])
            
            ->where('t_a_applicant_user_id','=',$this->user_details['user_id'])
            ->where('t_a_isactive','=',1)
            ->first()
            ){
                // dd($status);
            
        }
    }
    public function render()
    {
        return view('livewire.student.student-status.student-status',[
            'user_details' => $this->user_details
            ])
            ->layout('layouts.student',[
                'title'=>$this->title]);
    }
}
