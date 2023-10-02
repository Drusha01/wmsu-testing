<?php

namespace App\Http\Livewire\Student\StudentResult;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class StudentResult extends Component
{
    public $user_detais;
    public $title;

    public function mount(Request $request){
        $this->user_details = $request->session()->all();
        $this->title = 'result';
    }
    public function render()
    {
        return view('livewire.student.student-result.student-result',[
            'user_details' => $this->user_details
            ])
            ->layout('layouts.student',[
                'title'=>$this->title]);
    }
}
