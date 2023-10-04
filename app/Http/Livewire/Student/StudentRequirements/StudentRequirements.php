<?php

namespace App\Http\Livewire\Student\StudentRequirements;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class StudentRequirements extends Component
{
    use WithFileUploads;
    public $title;
    public $user_details;

    public function mount(Request $request){
        $this->user_details = $request->session()->all();
        $this->title = 'result';
    }

    public function render()
    {
        return view('livewire.student.student-requirements.student-requirements',[
            'user_details' => $this->user_details
            ])
            ->layout('layouts.student',[
                'title'=>$this->title]);
    }
}
