<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Livewire\Admin\Exports\ExamineesExport;

class ResultManagement extends Component
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
        $this->title = 'result-management';

        $this->access_role = [
            'C' => true,
            'R' => true,
            'U' => true,
            'D' => true
        ];
        if($this->access_role['C'] || $this->access_role['R'] || $this->access_role['U'] || $this->access_role['D']){
            
          
        }
    }
    public function render()
    {
        return view('livewire.admin.result-management',[
            'user_details' => $this->user_details
            ])
            ->layout('layouts.admin',[
                'title'=>$this->title]);
    }
    public function download_file($export_type = null,$columns = null){
        $export = new ExamineesExport([
            [1, 2, 3],
            [4, 5, 6],
            [4, 5, 6]
        ]);
        // return Excel::download(new ExamineesExport, 'users.xlsx');
        if($export_type == 'EXCEL'){
            return Excel::download($export, 'invoices.xlsx', \Maatwebsite\Excel\Excel::XLSX);
        }elseif($export_type == 'CSV'){
            return Excel::download($export, 'invoices.csv', \Maatwebsite\Excel\Excel::CSV);
        }elseif($export_type == 'ACSV'){
            return Excel::download($export, 'invoices.csv', \Maatwebsite\Excel\Excel::CSV, [
                'Content-Type' => 'text/csv',
          ]);
        }else{
            return Excel::download($export, 'invoices.csv', \Maatwebsite\Excel\Excel::CSV);
        }
       

    }
}
