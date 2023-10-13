<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class ApplicationManagement extends Component
{
    public $user_detais;
    public $title;

    // table filter
    public $pending_applicant_filter;

    public $selected_all;
    public $per_page = 10;

    public $pending_applicant_data;
    public $exam_types;

    public $pending_test_type_id = 0;
    public $column_order = 'date_created';
    public $order_by = 'desc';

    public function boot(Request $request){
        $this->user_details = $request->session()->all();
        if(!isset($this->user_details['user_id'])){
            return redirect('/login');
        }else{
            $user_status = DB::table('users as u')
            ->select('u.user_status_id','us.user_status_details')
            ->join('user_status as us', 'u.user_status_id', '=', 'us.user_status_id')
            ->where('user_id','=', $this->user_details['user_id'])
            ->first();
            
            // get roles
        }
       
        
        if(isset($user_status->user_status_details) && $user_status->user_status_details == 'deleted' ){
            return redirect('/deleted');
        }
        dd($user_status);
        
        if(isset($this->user_details['user_status_details']) && $this->user_details['user_status_details'] == 'inactive' ){
            return redirect('/inactive');
        }
    }
    public function mount(Request $request){
        $this->user_details = $request->session()->all();
        $this->title = 'application-management';

        // accessrole read
        if(1){
            $this->pending_applicant_filter = [
                'Select all' => true,
                '#' => true,
                'Applicant name'=> true,
                'Exam type'=> true,
                'Date applied'	=> true,								
                'Actions'	=> true					
            ];
            $this->selected_all = false;

            $this->exam_types = DB::table('test_types')
                ->select('test_type_id','test_type_name')
                ->get()
                ->toArray();

            $this->pending_applicant_data = DB::table('test_applications')
                ->select('*')
                ->where('t_a_isactive','=',1)
                // ->where()
                ->orderBy($this->column_order, $this->order_by)
                ->limit($this->per_page)
                ->get()
                ->toArray();

        
            
            // dd($this->pending_applicant_data);
        }else{
            $this->redirect('/admin/dashboard');
        }
        
    }

    public function render(){
        $this->exam_types = DB::table('test_types')
            ->select('test_type_id','test_type_name')
            ->get()
            ->toArray();

        return view('livewire.admin.application-management',[
            'user_details' => $this->user_details
            ])
            ->layout('layouts.admin',[
                'title'=>$this->title]);
    }

    public function pending_applicant_filterView(Request $request){
        $this->user_details = $request->session()->all();
        if(1){
            $this->exam_types = DB::table('test_types')
            ->select('test_type_id','test_type_name')
            ->get()
            ->toArray();
            $this->pending_applicant_data = DB::table('test_applications')
                ->select('*')
                ->where('t_a_isactive','=',1)
                // ->where()
                ->orderBy($this->column_order, $this->order_by)
                ->limit($this->per_page)
                ->get()
                ->toArray();

        }else{
            $this->redirect('/admin/dashboard');
        }
        $this->dispatchBrowserEvent('swal:redirect',[
            'position'          									=> 'center',
            'icon'              									=> 'success',
            'title'             									=> 'Successfully changed filter!',
            'showConfirmButton' 									=> 'true',
            'timer'             									=> '1000',
            'link'              									=> '#'
         ]);
    }

    public function pending_applicant_select_all(Request $request){
        $this->user_details = $request->session()->all();
        if(1){
            
            $this->exam_types = DB::table('test_types')
            ->select('test_type_id','test_type_name')
            ->get()
            ->toArray();
            $this->pending_applicant_data = DB::table('test_applications')
                ->select('*')
                ->where('t_a_isactive','=',1)
                // ->where()
                ->orderBy($this->column_order, $this->order_by)
                ->limit($this->per_page)
                ->get()
                ->toArray();

        }else{
            $this->redirect('/admin/dashboard');
        }
        $this->selected_all = !$this->selected_all ;
        if( $this->selected_all){
            $this->dispatchBrowserEvent('swal:redirect',[
                'position'          									=> 'center',
                'icon'              									=> 'success',
                'title'             									=> 'all selected!',
                'showConfirmButton' 									=> 'true',
                'timer'             									=> '1500',
                'link'              									=> '#'
             ]);
        }
    }
    public function pending_application_exam_type_filter(Request $request){
        $this->user_details = $request->session()->all();
        if(1){
            
            $this->exam_types = DB::table('test_types')
            ->select('test_type_id','test_type_name')
            ->get()
            ->toArray();
            $this->pending_applicant_data = DB::table('test_applications')
                ->select('*')
                ->where('t_a_isactive','=',1)
                // ->where()
                ->orderBy($this->column_order, $this->order_by)
                ->limit($this->per_page)
                ->get()
                ->toArray();

        }else{
            $this->redirect('/admin/dashboard');
        }

        if($this->pending_test_type_id == 0){
            $this->pending_applicant_data = DB::table('test_applications')
                ->select('*')
                ->where('t_a_isactive','=',1)
                ->orderBy($this->column_order, $this->order_by)
                ->limit($this->per_page)
                ->get()
                ->toArray();
        }else{
            $this->pending_applicant_data = DB::table('test_applications')
                ->select('*')
                ->where('t_a_isactive','=',1)
                ->where(['t_a_test_type_id'=> $this->pending_test_type_id])
                ->orderBy($this->column_order, $this->order_by)
                ->limit($this->per_page)
                ->get()
                ->toArray();
        }
        dd( $this->pending_applicant_data );

    }   

    public function accepted(Request $request){
        $this->user_details = $request->session()->all();

        $this->dispatchBrowserEvent('swal:redirect',[
            'position'          									=> 'center',
            'icon'              									=> 'success',
            'title'             									=> 'Accepted!',
            'showConfirmButton' 									=> 'true',
            'timer'             									=> '1500',
            'link'              									=> '#'
         ]);
         
        
        
    }
    public function declined(Request $request){
        $this->user_details = $request->session()->all();
        $this->dispatchBrowserEvent('swal:redirect',[
            'position'          									=> 'center',
            'icon'              									=> 'success',
            'title'             									=> 'Declined!',
            'showConfirmButton' 									=> 'true',
            'timer'             									=> '1500',
            'link'              									=> '#'
         ]);
        
 
    }

}
