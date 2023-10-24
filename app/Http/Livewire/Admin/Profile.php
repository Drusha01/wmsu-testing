<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class Profile extends Component
{
    public $user_detais;
    public $title;

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
    public function mount(Request $request){
        $this->user_details = $request->session()->all();
        $this->title = 'profile';

        $this->firstname = $this->user_details['user_firstname'];
        $this->middlename = $this->user_details['user_middlename'];
        $this->lastname = $this->user_details['user_lastname'];
        $this->suffix = $this->user_details['user_suffix'];
        $this->gender = $this->user_details['user_gender_details'];
        $this->sex = $this->user_details['user_sex_details'];
        $this->phone = $this->user_details['user_phone'];
        $this->address = $this->user_details['user_address'];
        $this->birthdate = $this->user_details['user_birthdate'];
    }
    public function render()
    {
        return view('livewire.admin.profile',[
            'user_details' => $this->user_details
            ])
            ->layout('layouts.admin',[
                'title'=>$this->title]);
    }
}
