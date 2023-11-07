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


    public $firstname;
    public $middlename;
    public $lastname;
    public $suffix;
    public $gender;
    public $sex;
    public $phone;
    public $address;
    public $birthdate;

    public $email;

    public $f_firstname;
    public $f_middlename;
    public $f_lastname;
    public $f_suffix;
    public $m_firstname;
    public $m_middlename;
    public $m_lastname;
    public $m_suffix;
    public $g_firstname;
    public $g_middlename;
    public $g_lastname;
    public $g_suffix;
    public $g_relationship;
    public $number_of_siblings;
    public $fb_address;

    public $ueb_id;
    public $ueb_shs_school_name;
    public $ueb_shs_address;

    public $t_a_formal_photo ;
    public $t_a_formal_photo_id;
    public $t_a_formal_photo_name;
    public $t_a_school_principal_certification_id;
    public $t_a_school_principal_certification;
    public $t_a_school_principal_certification_name;
    public $t_a_original_senior_high_school_card_id;
    public $t_a_original_senior_high_school_card;
    public $t_a_original_senior_high_school_card_name;
    public $t_a_transcript_of_records_id;
    public $t_a_transcript_of_records;
    public $t_a_transcript_of_records_name;
    public $t_a_endorsement_letter_from_wmsu_dean_id;
    public $t_a_endorsement_letter_from_wmsu_dean ;
    public $t_a_endorsement_letter_from_wmsu_dean_name ;

    public $edit = false;

    public $application =[
        't_a_id' => NULL,
        't_a_test_type_id' => NULL,
        't_a_applicant_user_id' => NULL,
        't_a_test_status_id' => NULL,
        't_a_user_details' => NULL,
        't_a_isactive' => NULL,

        't_a_school_school_name' => NULL,
        't_a_school_address' => NULL,

        't_a_formal_photo' => NULL,
        't_a_school_principal_certification' => NULL,
        't_a_original_senior_high_school_card' => NULL,
        't_a_transcript_of_records' => NULL,
        't_a_endorsement_letter_from_wmsu_dean' => NULL,
        't_a_receipt_photo' => NULL,

        // -- nat

        // -- eat 

        // -- etc

        // --
        't_a_declined_reason' => NULL,
        't_a_declined_by' => NULL, 
        't_a_accepted_by' => NULL,  
        't_a_assigned_by' => NULL,
        't_a_proctor_assigned_by' => NULL,
        't_a_returned_by' => NULL,
        't_a_returned_reason' => NULL,
        't_a_proctor_user_id' => NULL,
        't_a_school_room_id' => NULL,

        't_a_school_year_id' => NULL,

        't_a_hash' => NULL,

        't_a_cet_type_id' => NULL,

        't_a_cet_english_procficiency' => NULL,
        't_a_cet_reading_comprehension'  => NULL,
        't_a_cet_science_process_skills' => NULL,
        't_a_cet_quantitative_skills' => NULL,
        't_a_cet_abstract_thinking_skills' => NULL,
        't_a_cet_oapr' => NULL

    ];

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
            ORDER BY ta.date_created DESC
            ',['user_id'=>$this->user_details['user_id'],
                't_a_isactive'=>0,
                'test_status_complete' => 'Complete',
                'test_status_cancelled' => 'Cancelled'  
            ]
            
    );
    }
    public function update_application($t_a_id){
        if($application = DB::table('test_applications as ta')
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
        ->first()){

            $this->application =[
                't_a_id' => $application->t_a_id,
                't_a_test_type_id' => $application->t_a_test_type_id,
                't_a_applicant_user_id' => $application->t_a_applicant_user_id,
                't_a_test_status_id' => $application->t_a_test_status_id,
                't_a_user_details' => $application->t_a_user_details,
                't_a_isactive' => $application->t_a_isactive,
        
                't_a_school_school_name' => $application->t_a_school_school_name,
                't_a_school_address' => $application->t_a_school_address,
        
                't_a_formal_photo' => $application->t_a_formal_photo,
                't_a_school_principal_certification' => $application->t_a_school_principal_certification,
                't_a_original_senior_high_school_card' => $application->t_a_original_senior_high_school_card,
                't_a_transcript_of_records' => $application->t_a_transcript_of_records,
                't_a_endorsement_letter_from_wmsu_dean' => $application->t_a_endorsement_letter_from_wmsu_dean,
                't_a_receipt_photo' => $application->t_a_receipt_photo,
        
                // -- nat
        
                // -- eat 
        
                // -- etc
        
                // --
                't_a_declined_reason' => $application->t_a_declined_reason,
                't_a_declined_by' => $application->t_a_declined_by, 
                't_a_accepted_by' => $application->t_a_accepted_by,  
                't_a_assigned_by' => $application->t_a_assigned_by,
                't_a_proctor_assigned_by' => $application->t_a_proctor_assigned_by,
                't_a_returned_by' => $application->t_a_returned_by,
                't_a_returned_reason' => $application->t_a_returned_reason,
                't_a_proctor_user_id' => $application->t_a_proctor_user_id,
                't_a_school_room_id' => $application->t_a_school_room_id,
        
                't_a_school_year_id' => $application->t_a_school_year_id,
        
                't_a_hash' => $application->t_a_hash,
        
                't_a_cet_type_id' => $application->t_a_cet_type_id,
        
                't_a_cet_english_procficiency' => $application->t_a_cet_english_procficiency,
                't_a_cet_reading_comprehension'  => $application->t_a_cet_reading_comprehension,
                't_a_cet_science_process_skills' => $application->t_a_cet_science_process_skills,
                't_a_cet_quantitative_skills' => $application->t_a_cet_quantitative_skills,
                't_a_cet_abstract_thinking_skills' => $application->t_a_cet_abstract_thinking_skills,
                't_a_cet_oapr' => $application->t_a_cet_oapr,
                'test_type_details' => $application->test_type_details,
                'applied_date' => $application->applied_date
            ];
        }
       
    }


    public function mount(Request $request){
        $this->user_details = $request->session()->all();
        $this->title = 'status';
       
        self::update_data();
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

    public function cancel_application($t_a_id){
       
        self::update_application($t_a_id);
        $this->view_details = NULL;
        self::update_data();
        $this->dispatchBrowserEvent('openModal','confirm_cancel_modal');
        
    }
    public function confirm_cancel($t_a_id){     
        
        if( DB::table('test_applications as ta')
        ->where([
            't_a_applicant_user_id'=> $this->user_details['user_id'],
            't_a_id'=>$t_a_id
                
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
        
        self::update_data();
        $this->dispatchBrowserEvent('openModal','confirm_cancel_modal');
    }

    public function view_application($t_a_id){ 
        $this->edit = false;
        $this->t_a_id = $t_a_id;
        $this->view_details = DB::table('test_applications as ta')
            ->select('*',DB::raw('DATE(ta.date_created) as applied_date'))
            ->join('test_types as tt', 'tt.test_type_id', '=', 'ta.t_a_test_type_id')
            ->join('users as us', 'us.user_id', '=', 'ta.t_a_applicant_user_id')
            ->join('user_family_background as fb', 'fb.family_background_user_id', '=', 'ta.t_a_applicant_user_id')
            ->join('test_status as ts', 'ts.test_status_id', '=', 'ta.t_a_test_status_id')
            ->join('school_years as sy', 'sy.school_year_id', '=', 'ta.t_a_school_year_id')
            ->join('cet_types as ct', 'ct.cet_type_id', '=', 'ta.t_a_cet_type_id')
            ->where('test_type_details', '=', 'College Entrance Test')
                    
            // ->where('t_a_test_status_id', '=', 
            //     ((array) DB::table('test_types')
            //         ->where('test_type_details', '=', 'College Entrance Test')
            //         ->select('test_type_id as t_a_test_type_id')
            //         ->first())['t_a_test_type_id'])
            
            ->where('t_a_applicant_user_id','=',$this->user_details['user_id'])
            ->where('t_a_isactive','=',1)
            ->where('t_a_id','=',$this->t_a_id )
            ->limit(1)
            ->get()
            ->toArray();
            // dd($this->view_details);
            self::update_data();
            $this->dispatchBrowserEvent('openModal','view_application_modal');
    }
    public function edit_application(){
        self::update_data();

        $this->view_details = DB::table('test_applications as ta')
            ->select('*',DB::raw('DATE(ta.date_created) as applied_date'))
            ->join('test_types as tt', 'tt.test_type_id', '=', 'ta.t_a_test_type_id')
            ->join('users as us', 'us.user_id', '=', 'ta.t_a_applicant_user_id')
            ->join('user_family_background as fb', 'fb.family_background_user_id', '=', 'ta.t_a_applicant_user_id')
            ->join('test_status as ts', 'ts.test_status_id', '=', 'ta.t_a_test_status_id')
            ->join('school_years as sy', 'sy.school_year_id', '=', 'ta.t_a_school_year_id')
            ->join('cet_types as ct', 'ct.cet_type_id', '=', 'ta.t_a_cet_type_id')
            ->where('test_type_details', '=', 'College Entrance Test')
                    
            // ->where('t_a_test_status_id', '=', 
            //     ((array) DB::table('test_types')
            //         ->where('test_type_details', '=', 'College Entrance Test')
            //         ->select('test_type_id as t_a_test_type_id')
            //         ->first())['t_a_test_type_id'])
            
            ->where('t_a_applicant_user_id','=',$this->user_details['user_id'])
            ->where('t_a_isactive','=',1)
            ->where('t_a_id','=',$this->t_a_id )
            ->limit(1)
            ->get()
            ->toArray();
        $this->edit = true;

        self::update_data();
        $this->dispatchBrowserEvent('openModal','view_application_modal');
    }

    public function cancel_edit_application(){

        $this->view_details = DB::table('test_applications as ta')
            ->select('*',DB::raw('DATE(ta.date_created) as applied_date'))
            ->join('test_types as tt', 'tt.test_type_id', '=', 'ta.t_a_test_type_id')
            ->join('users as us', 'us.user_id', '=', 'ta.t_a_applicant_user_id')
            ->join('user_family_background as fb', 'fb.family_background_user_id', '=', 'ta.t_a_applicant_user_id')
            ->join('test_status as ts', 'ts.test_status_id', '=', 'ta.t_a_test_status_id')
            ->join('school_years as sy', 'sy.school_year_id', '=', 'ta.t_a_school_year_id')
            ->join('cet_types as ct', 'ct.cet_type_id', '=', 'ta.t_a_cet_type_id')
            ->where('test_type_details', '=', 'College Entrance Test')
                    
            // ->where('t_a_test_status_id', '=', 
            //     ((array) DB::table('test_types')
            //         ->where('test_type_details', '=', 'College Entrance Test')
            //         ->select('test_type_id as t_a_test_type_id')
            //         ->first())['t_a_test_type_id'])
            
            ->where('t_a_applicant_user_id','=',$this->user_details['user_id'])
            ->where('t_a_isactive','=',1)
            ->where('t_a_id','=',$this->t_a_id )
            ->limit(1)
            ->get()
            ->toArray();


        self::update_data();
        // $this->dispatchBrowserEvent('openModal','view_application_modal');
        $this->edit = false;
    }
    
}
