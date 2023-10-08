<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class AppointmentManagement extends Component
{
    public $user_detais;
    public $title;
    public function mount(Request $request){
        $this->user_details = $request->session()->all();
        $this->title = 'appointment-management';
    }
    public function render()
    {
        return view('livewire.admin.appointment-management',[
            'user_details' => $this->user_details
            ])
            ->layout('layouts.admin',[
                'title'=>$this->title]);
    }
}
