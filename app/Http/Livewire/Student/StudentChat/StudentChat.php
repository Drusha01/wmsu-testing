<?php

namespace App\Http\Livewire\Student\StudentChat;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class StudentChat extends Component
{
    use WithFileUploads;
    public $title;
    public $user_details;

    public function mount(Request $request){
        $this->user_details = $request->session()->all();
        $this->title = 'chat';
    }
    public function render()
    {
        return view('livewire.student.student-chat.student-chat',[
            'user_details' => $this->user_details
            ])
            ->layout('layouts.student',[
                'title'=>$this->title]);
    }
}
