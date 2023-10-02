<?php

namespace App\Http\Livewire\Page\Home;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class Home extends Component
{
    public $user_detais;
    public $title;

    public function mount(Request $request){
        $this->user_details = $request->session()->all();
        $this->title = 'home';
    }
    public function render()
    {
        return view('livewire.page.home.home',[
            'user_details' => $this->user_details
            ])
            ->layout('layouts.guest-homepage',[
                'title'=>$this->title]);
    }
}
