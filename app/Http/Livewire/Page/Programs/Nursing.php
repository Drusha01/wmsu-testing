<?php

namespace App\Http\Livewire\Page\Programs;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;


class Nursing extends Component
{
    public $user_detais;
    public $title;

    public function mount(Request $request){
        $this->user_details = $request->session()->all();
        $this->title = 'law';
    }
    public function render()
    {
        return view('livewire.page.programs.nursing',[
            'user_details' => $this->user_details
            ]) 
            ->layout('layouts.guest-homepage',[
                'title'=>$this->title]);
    }
}


