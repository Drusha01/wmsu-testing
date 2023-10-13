<?php

namespace App\Http\Livewire\Student\StudentStatus;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class StudentStatus extends Component
{
    public $user_detais;
    public $title;

    public $application_details;
    public $application_history;

    public $t_a_id;
    public $view_details;
    public $cancel_details;




    public function mount(Request $request){
        $this->user_details = $request->session()->all();
        $this->title = 'status';

        $this->application_details = DB::table('test_applications as ta')
            ->select('*',DB::raw('DATE(ta.date_created) as applied_date'))
            ->join('test_types as tt', 'tt.test_type_id', '=', 'ta.t_a_test_type_id')
            ->join('test_status as ts', 'ts.test_status_id', '=', 'ta.t_a_test_status_id')
            ->join('school_years as sy', 'sy.school_year_id', '=', 'ta.t_a_school_year_id')
            ->where('t_a_test_type_id', '=', 
                ((array) DB::table('test_types')
                    ->where('test_type_details', '=', 'College Entrance Test')
                    ->select('test_type_id as t_a_test_type_id')
                    ->first())['t_a_test_type_id'])
            
            ->where('t_a_applicant_user_id','=',$this->user_details['user_id'])
            ->where('t_a_isactive','=',1)
            ->get()
            ->toArray();
        $this->application_history = DB::select('SELECT *,DATE(ta.date_created) as applied_date FROM test_applications as ta 
            LEFT JOIN test_types as tt on tt.test_type_id = ta.t_a_test_type_id
            LEFT JOIN test_status as ts on ts.test_status_id = ta.t_a_test_status_id 
            LEFT JOIN school_years as sy on sy.school_year_id = ta.t_a_school_year_id 
            WHERE t_a_applicant_user_id = :user_id and (t_a_isactive = :t_a_isactive  or test_status_details = :test_status_complete or test_status_details = :test_status_cancelled ) 
        ',['user_id'=>$this->user_details['user_id'],
            't_a_isactive'=>0,
            'test_status_complete' => 'Complete',
            'test_status_cancelled' => 'Cancelled'  
        ]);
        //or test_status_details = :test_status_declined

    }
    public function render()
    {
        return view('livewire.student.student-status.student-status',[
            'user_details' => $this->user_details,
            ])
            ->layout('layouts.student',[
                'title'=>$this->title]);
    }

    public function cancel_application(Request $request,$t_a_id){
        $this->user_details = $request->session()->all();
        if(!isset($this->user_details['user_id'])){
            return redirect('/login');
        }
        if(isset($this->user_details['user_status_details']) && $this->user_details['user_status_details'] == 'deleted' ){
            return redirect('/deleted');
        }
        if(isset($this->user_details['user_status_details']) && $this->user_details['user_status_details'] == 'inactive' ){
            return redirect('/inactive');
        }
        $this->application_details = DB::table('test_applications as ta')
            ->select('*',DB::raw('DATE(ta.date_created) as applied_date'))
            ->join('test_types as tt', 'tt.test_type_id', '=', 'ta.t_a_test_type_id')
            ->join('test_status as ts', 'ts.test_status_id', '=', 'ta.t_a_test_status_id')
            ->join('school_years as sy', 'sy.school_year_id', '=', 'ta.t_a_school_year_id')
            ->where('t_a_test_type_id', '=', 
                ((array) DB::table('test_types')
                    ->where('test_type_details', '=', 'College Entrance Test')
                    ->select('test_type_id as t_a_test_type_id')
                    ->first())['t_a_test_type_id'])
            
            ->where('t_a_applicant_user_id','=',$this->user_details['user_id'])
            ->where('t_a_isactive','=',1)
            ->get()
            ->toArray();

            $this->application_history = DB::select('SELECT *,DATE(ta.date_created) as applied_date FROM test_applications as ta 
            LEFT JOIN test_types as tt on tt.test_type_id = ta.t_a_test_type_id
            LEFT JOIN test_status as ts on ts.test_status_id = ta.t_a_test_status_id 
            LEFT JOIN school_years as sy on sy.school_year_id = ta.t_a_school_year_id 
            WHERE t_a_applicant_user_id = :user_id and (t_a_isactive = :t_a_isactive  or test_status_details = :test_status_complete or test_status_details = :test_status_cancelled ) 
        ',['user_id'=>$this->user_details['user_id'],
            't_a_isactive'=>0,
            'test_status_complete' => 'Complete',
            'test_status_cancelled' => 'Cancelled'  
        ]);


        $view_details = DB::table('test_applications as ta')
            ->select('*',DB::raw('DATE(ta.date_created) as applied_date'))
            ->join('test_types as tt', 'tt.test_type_id', '=', 'ta.t_a_test_type_id')
            ->join('test_status as ts', 'ts.test_status_id', '=', 'ta.t_a_test_status_id')
            ->join('school_years as sy', 'sy.school_year_id', '=', 'ta.t_a_school_year_id')
            ->where('t_a_test_type_id', '=', 
                ((array) DB::table('test_types')
                    ->where('test_type_details', '=', 'College Entrance Test')
                    ->select('test_type_id as t_a_test_type_id')
                    ->first())['t_a_test_type_id'])
            
            ->where('t_a_applicant_user_id','=',$this->user_details['user_id'])
            ->where('t_a_isactive','=',1)
            ->where('t_a_id','=',$t_a_id)
            ->first();


            $this->cancel_details = 'Are you sure you want to cancel "'.$view_details->test_type_details. '" that you applied on '. date_format(date_create( $view_details->applied_date),"F d, Y ") ;
            $this->t_a_id = $t_a_id;
            
    }
    public function confirm_cancel(Request $request,$t_a_id){
        $this->user_details = $request->session()->all();
        if(!isset($this->user_details['user_id'])){
            return redirect('/login');
        }
        if(isset($this->user_details['user_status_details']) && $this->user_details['user_status_details'] == 'deleted' ){
            return redirect('/deleted');
        }
        if(isset($this->user_details['user_status_details']) && $this->user_details['user_status_details'] == 'inactive' ){
            return redirect('/inactive');
        }
        
        $this->t_a_id =$t_a_id;
        
        if( DB::table('test_applications as ta')
        ->where(['t_a_applicant_user_id'=> $this->user_details['user_id'],

            ])
        ->update(['t_a_isactive'=> 0,
                't_a_test_status_id' =>((array) DB::table('test_status')
                    ->where('test_status_details', '=', 'Cancelled')
                    ->select('test_status_id as t_a_test_status_id')
                    ->first())['t_a_test_status_id']
            ])
            ){
            $this->dispatchBrowserEvent('swal:redirect',[
                'position'          									=> 'center',
                'icon'              									=> 'success',
                'title'             									=> 'Application successfully cancelled!',
                'showConfirmButton' 									=> 'true',
                'timer'             									=> '1500',
                'link'              									=> '#'
            ]);
        }else{
            $this->dispatchBrowserEvent('swal:redirect',[
                'position'          									=> 'center',
                'icon'              									=> 'success',
                'title'             									=> 'Error cancelling application!',
                'showConfirmButton' 									=> 'true',
                'timer'             									=> '1500',
                'link'              									=> '#'
            ]);
        }
        $this->application_details = DB::table('test_applications as ta')
            ->select('*',DB::raw('DATE(ta.date_created) as applied_date'))
            ->join('test_types as tt', 'tt.test_type_id', '=', 'ta.t_a_test_type_id')
            ->join('test_status as ts', 'ts.test_status_id', '=', 'ta.t_a_test_status_id')
            ->join('school_years as sy', 'sy.school_year_id', '=', 'ta.t_a_school_year_id')
            ->where('t_a_test_type_id', '=', 
                ((array) DB::table('test_types')
                    ->where('test_type_details', '=', 'College Entrance Test')
                    ->select('test_type_id as t_a_test_type_id')
                    ->first())['t_a_test_type_id'])
            
            ->where('t_a_applicant_user_id','=',$this->user_details['user_id'])
            ->where('t_a_isactive','=',1)
            ->get()
            ->toArray();

            $this->application_history = DB::select('SELECT *,DATE(ta.date_created) as applied_date FROM test_applications as ta 
            LEFT JOIN test_types as tt on tt.test_type_id = ta.t_a_test_type_id
            LEFT JOIN test_status as ts on ts.test_status_id = ta.t_a_test_status_id 
            LEFT JOIN school_years as sy on sy.school_year_id = ta.t_a_school_year_id 
            WHERE t_a_applicant_user_id = :user_id and (t_a_isactive = :t_a_isactive  or test_status_details = :test_status_complete or test_status_details = :test_status_cancelled ) 
        ',['user_id'=>$this->user_details['user_id'],
            't_a_isactive'=>0,
            'test_status_complete' => 'Complete',
            'test_status_cancelled' => 'Cancelled'  
        ]);
    }

    public function view_application(Request $request,$t_a_id){
        
        $this->user_details = $request->session()->all();
        if(!isset($this->user_details['user_id'])){
            return redirect('/login');
        }
        if(isset($this->user_details['user_status_details']) && $this->user_details['user_status_details'] == 'deleted' ){
            return redirect('/deleted');
        }
        if(isset($this->user_details['user_status_details']) && $this->user_details['user_status_details'] == 'inactive' ){
            return redirect('/inactive');
        }
        
        $this->t_a_id =$t_a_id;

        $this->application_details = DB::table('test_applications as ta')
            ->select('*',DB::raw('DATE(ta.date_created) as applied_date'))
            ->join('test_types as tt', 'tt.test_type_id', '=', 'ta.t_a_test_type_id')
            ->join('test_status as ts', 'ts.test_status_id', '=', 'ta.t_a_test_status_id')
            ->join('school_years as sy', 'sy.school_year_id', '=', 'ta.t_a_school_year_id')
            ->where('t_a_test_type_id', '=', 
                ((array) DB::table('test_types')
                    ->where('test_type_details', '=', 'College Entrance Test')
                    ->select('test_type_id as t_a_test_type_id')
                    ->first())['t_a_test_type_id'])
            
            ->where('t_a_applicant_user_id','=',$this->user_details['user_id'])
            ->where('t_a_isactive','=',1)
            ->get()
            ->toArray();

        $this->application_history = DB::select('SELECT *,DATE(ta.date_created) as applied_date FROM test_applications as ta 
            LEFT JOIN test_types as tt on tt.test_type_id = ta.t_a_test_type_id
            LEFT JOIN test_status as ts on ts.test_status_id = ta.t_a_test_status_id 
            LEFT JOIN school_years as sy on sy.school_year_id = ta.t_a_school_year_id 
            WHERE t_a_applicant_user_id = :user_id and (t_a_isactive = :t_a_isactive  or test_status_details = :test_status_complete or test_status_details = :test_status_cancelled ) 
        ',['user_id'=>$this->user_details['user_id'],
            't_a_isactive'=>0,
            'test_status_complete' => 'Complete',
            'test_status_cancelled' => 'Cancelled'  
        ]);

            $this->view_details = DB::table('test_applications as ta')
            ->select('*',DB::raw('DATE(ta.date_created) as applied_date'))
            ->join('test_types as tt', 'tt.test_type_id', '=', 'ta.t_a_test_type_id')
            ->join('users as us', 'us.user_id', '=', 'ta.t_a_applicant_user_id')
            ->join('user_family_background as fb', 'fb.family_background_user_id', '=', 'ta.t_a_applicant_user_id')
            ->join('test_status as ts', 'ts.test_status_id', '=', 'ta.t_a_test_status_id')
            ->join('school_years as sy', 'sy.school_year_id', '=', 'ta.t_a_school_year_id')
            ->where('t_a_test_type_id', '=', 
                ((array) DB::table('test_types')
                    ->where('test_type_details', '=', 'College Entrance Test')
                    ->select('test_type_id as t_a_test_type_id')
                    ->first())['t_a_test_type_id'])
            
            ->where('t_a_applicant_user_id','=',$this->user_details['user_id'])
            ->where('t_a_isactive','=',1)
            ->where('t_a_id','=',5)
            ->limit(1)
            ->get()
            ->toArray();

            // dd($this->view_details);

        


    }
}
