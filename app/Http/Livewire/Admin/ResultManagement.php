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
    use WithFileUploads;
    public $user_detais;
    public $title;

    public $examinees;
    public $cet_filter;
    public $exam_types ;
    public $examinees_filter;
    public $exam_type_name;

    public $examinees_results;

    public $active;
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
        self::update_data();
    }
    public function update_data(){

        $this->exam_types = DB::table('test_applications as ta')
            ->select(
                // '*',
                DB::raw('count(*) exam_type_count' ),
                'test_type_id',
                'test_type_name',
                'test_type_details',
                )
            ->join('school_rooms as sr', 'sr.school_room_id', '=', 'ta.t_a_school_room_id')
            ->join('test_status as ts', 'ts.test_status_id', '=', 'ta.t_a_test_status_id')
            ->join('test_types as tt', 'tt.test_type_id', '=', 'ta.t_a_test_type_id')
            ->join('users as u', 'u.user_id', '=', 'sr.school_room_proctor_user_id')
            ->where('t_a_isactive','=',1)
            ->where('test_status_details','=','Accepted')
            ->whereNotNull('t_a_school_room_id')
            ->where('school_room_isactive','=',1)
            ->whereNotNull('school_room_proctor_user_id')
            ->groupBy('test_type_id')
            ->get()
            ->toArray();
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

        $this->cet_filter = [
            '#' => true,
            'id' => true,
            'First name' => true,
            'Middle name' => true,
            'Last name' => true,
            'Venue'=> true,
            'Test center'=> true,
            'College' => true,
            'Room code' => true,
            'Room name'=> true,
            'Start - End'=> true,	
            'hash' => true,
            'CET OAPR' => true,
            'English Proficiency' => true,	
            'Reading Comprehension' => true,							
            'Science Processing Skills' => true,
            'Quantitative Skills' => true,
            'Abstract Thinking' => true,
        ];

        $this->nat_filter = [
            '#' => true,
            'id' => true,
            'First name' => true,
            'Middle name' => true,
            'Last name' => true,
            'Venue'=> true,
            'Test center'=> true,
            'College' => true,
            'Room code' => true,
            'Room name'=> true,
            'Start - End'=> true,	
            'hash' => true,
            'CET OAPR' => true,
            'English Proficiency' => true,	
            'Reading Comprehension' => true,							
            'Science Processing Skills' => true,
            'Quantitative Skills' => true,
            'Abstract Thinking' => true,
        ];

        $this->active = 'results';

       
        if($this->access_role['C'] || $this->access_role['R'] || $this->access_role['U'] || $this->access_role['D']){
            
            self::update_data();
        }
    }

    public function update_filter(){
        // if($this->exam_type_name == 'CET'){
        //     $this->examinees_filter =  $this->cet_filter;
        // }elseif(0){

        // }
      
    }
    public function render()
    {
        return view('livewire.admin.result-management',[
            'user_details' => $this->user_details
            ])
            ->layout('layouts.admin',[
                'title'=>$this->title]);
    }

    public function active_page($active){
        $this->active = $active;
    }
    public function download_option(){
        // display modal
        $this->exam_type_id = 0;
        $this->dispatchBrowserEvent('openModal','examinees_filter');
    }
    public function download_file($export_type = null,$columns = null){
        if($this->exam_type_name == '0'){
            $this->dispatchBrowserEvent('swal:redirect',[
                'position'          									=> 'center',
                'icon'              									=> 'warning',
                'title'             									=> 'Please select a exam type!',
                'showConfirmButton' 									=> 'true',
                'timer'             									=> '1500',
                'link'              									=> '#'
             ]);
             return;
        }elseif($this->exam_type_name == 'CET'){
            $this->examinees = DB::table('test_applications as ta')
                ->select(
                    // '*',
                    // DB::raw('count(*) as school_room_sschool_room_number_of_examinees' ),
                    't_a_id',
                    'user_id',
                    'user_name',
                    'user_address',
                    'user_firstname',
                    'user_middlename',
                    'user_lastname',
                    't_a_hash',
                    'school_room_id',
                    'school_room_capacity',	
                    'school_room_college_name',	
                    'school_room_college_abr',
                    'school_room_venue',
                    'school_room_name',	
                    'school_room_test_center',
                    'school_room_test_date',
                    'school_room_test_time_start',
                    'school_room_test_time_end',
                    'school_room_description',
                    )
                ->join('school_rooms as sr', 'sr.school_room_id', '=', 'ta.t_a_school_room_id')
                ->join('test_status as ts', 'ts.test_status_id', '=', 'ta.t_a_test_status_id')
                ->join('users as u', 'u.user_id', '=', 'ta.t_a_applicant_user_id')
                ->where('t_a_isactive','=',1)
                ->where('test_status_details','=','Accepted')
                ->whereNotNull('t_a_school_room_id')
                ->where('school_room_isactive','=',1)
                ->whereNotNull('school_room_proctor_user_id')
                ->get()
                ->toArray();
            
            $header = [];
            foreach ($this->cet_filter as $item => $value) {
                if($value){
                    array_push($header,$item);
                }   
            }  
            $item = [];
            $content = [];
            $counter = 1;
            foreach ($this->examinees as $key => $value) {
                $item = [];
                array_push( $item,$counter);
                array_push( $item,$value->t_a_id);
                array_push( $item,$value->user_firstname);
                array_push( $item,$value->user_middlename);
                array_push( $item,$value->user_lastname);

                if($this->cet_filter['Venue']){
                    array_push( $item,$value->school_room_venue);
                }
                if($this->cet_filter['Test center']){
                    array_push( $item,$value->school_room_test_center);
                }
                if($this->cet_filter['College']){
                    array_push( $item,$value->school_room_college_abr);
                }
                if($this->cet_filter['Room code']){
                    array_push( $item,$value->school_room_id.' - '.$value->school_room_name);
                }
                if($this->cet_filter['Room name']){
                    array_push( $item,$value->school_room_name);
                }
                if($this->cet_filter['Start - End']){
                    array_push( $item,$value->school_room_test_time_start.' - '.$value->school_room_test_time_end);
                }
                if($this->cet_filter['hash']){
                    array_push( $item,$value->t_a_hash);
                }

                array_push( $item,);
                array_push( $item,);
                array_push( $item,);
                array_push( $item,);
                array_push( $item,);
                array_push($content,$item);
                $counter++;
            }

          
        
        }elseif($this->exam_type_name == 'NAT'){
            $this->examinees = DB::table('test_applications as ta')
                ->select(
                    // '*',
                    // DB::raw('count(*) as school_room_sschool_room_number_of_examinees' ),
                    't_a_id',
                    'user_id',
                    'user_name',
                    'user_address',
                    'user_firstname',
                    'user_middlename',
                    'user_lastname',
                    't_a_hash',
                    'school_room_id',
                    'school_room_capacity',	
                    'school_room_college_name',	
                    'school_room_college_abr',
                    'school_room_venue',
                    'school_room_name',	
                    'school_room_test_center',
                    'school_room_test_date',
                    'school_room_test_time_start',
                    'school_room_test_time_end',
                    'school_room_description',
                    )
                ->join('school_rooms as sr', 'sr.school_room_id', '=', 'ta.t_a_school_room_id')
                ->join('test_status as ts', 'ts.test_status_id', '=', 'ta.t_a_test_status_id')
                ->join('users as u', 'u.user_id', '=', 'ta.t_a_applicant_user_id')
                ->where('t_a_isactive','=',1)
                ->where('test_status_details','=','Accepted')
                ->whereNotNull('t_a_school_room_id')
                ->where('school_room_isactive','=',1)
                ->whereNotNull('school_room_proctor_user_id')
                ->get()
                ->toArray();
            
            $header = [];
            foreach ($this->cet_filter as $item => $value) {
                if($value){
                    array_push($header,$item);
                }   
            }  
            $item = [];
            $content = [];
            $counter = 1;
            foreach ($this->examinees as $key => $value) {
                $item = [];
                array_push( $item,$counter);
                array_push( $item,$value->t_a_id);
                array_push( $item,$value->user_firstname);
                array_push( $item,$value->user_middlename);
                array_push( $item,$value->user_lastname);

                if($this->cet_filter['Venue']){
                    array_push( $item,$value->school_room_venue);
                }
                if($this->cet_filter['Test center']){
                    array_push( $item,$value->school_room_test_center);
                }
                if($this->cet_filter['College']){
                    array_push( $item,$value->school_room_college_abr);
                }
                if($this->cet_filter['Room code']){
                    array_push( $item,$value->school_room_id.' - '.$value->school_room_name);
                }
                if($this->cet_filter['Room name']){
                    array_push( $item,$value->school_room_name);
                }
                if($this->cet_filter['Start - End']){
                    array_push( $item,$value->school_room_test_time_start.' - '.$value->school_room_test_time_end);
                }
                if($this->cet_filter['hash']){
                    array_push( $item,$value->t_a_hash);
                }

                array_push( $item,);
                array_push( $item,);
                array_push( $item,);
                array_push( $item,);
                array_push( $item,);
                array_push($content,$item);
                $counter++;
            }
        }

        $export = new ExamineesExport([
            $header,
            $content
        ]);
        // return Excel::download(new ExamineesExport, 'users.xlsx');
        if($export_type == 'EXCEL'){
            return Excel::download($export, 'examinees_list.xlsx', \Maatwebsite\Excel\Excel::XLSX);
        }elseif($export_type == 'CSV'){
            return Excel::download($export, 'examinees_list.xlsx', \Maatwebsite\Excel\Excel::XLSX);
        }elseif($export_type == 'ACSV'){
            return Excel::download($export, 'examinees_list.xlsx', \Maatwebsite\Excel\Excel::XLSX, [
                'Content-Type' => 'text/csv',
        ]);
        }else{
            return Excel::download($export, 'examinees_list.xlsx', \Maatwebsite\Excel\Excel::XLSX);
        }
    }

    // public function updatedUpload_file()
    // {
    //     dd('moce');
    //     dd($this->upload_file);
    //     // here you can store immediately on any change of the property
    // }
    

    public function upload_file(){
        // $file = $request->file('examinees_results');
        dd($this->examinees_results);
        $tmp_name = 'livewire-tmp/'.$this->examinees_results->getfilename();
        $new_file_name = 'result.csv';
        // if(Storage::move($tmp_name, 'public/results/'.$new_file_name)){
        //     // dd('dsfs');
        // }
    }

    public function importresults() {
        Excel::import(new UsersImport, 'users.xlsx');
    }
}
