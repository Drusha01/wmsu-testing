<?php

namespace App\Http\Livewire\Student\StudentApplication;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class CetApplicationForm extends Component
{
    use WithFileUploads;
    public $user_detais;
    public $title;

    public $page = 1;

    public $cet_type_data;
    public $course_data;

    public $cet_form = [
        't_a_id' => NULL,
        't_a_test_type_id' => NULL,
        't_a_applicant_user_id' => NULL,
        't_a_test_status_id' => NULL,
        't_a_user_details' => NULL,
        't_a_isactive' => NULL,

        't_a_citizenship' => NULL,
        't_a_date_of_graduation' => NULL,
        't_a_course' => NULL,
        't_a_school_school_name'=> NULL,
        't_a_school_address' => NULL,
        't_a_formal_photo' => NULL,
        't_a_school_principal_certification' => NULL,
        't_a_original_senior_high_school_card' => NULL,
        't_a_transcript_of_records' => NULL,
        't_a_endorsement_letter_from_wmsu_dean' => NULL,
        't_a_receipt_photo' => NULL,  // note that if the applicant is taking second time

        't_a_1st_choice' => NULL,
        't_a_2nd_choice' => NULL,
        't_a_3rd_choice' => NULL,

        // parent 
        't_a_f_citizenship' => NULL,
        't_a_f_hef' => NULL,
        't_a_f_occupation'  => NULL,
        't_a_f_place_of_work' => NULL,
        't_a_f_monthly_salary' => NULL,

        't_a_m_citizenship' => NULL,
        't_a_m_hef' => NULL,
        't_a_m_occupation' => NULL,
        't_a_m_place_of_work' => NULL,
        't_a_m_monthly_salary' => NULL,

        't_a_computer_literate' => NULL,
        't_a_ethnic_group' => NULL,
        't_a_religious_affiliation' => NULL,
        't_a_accept' => NULL,

        't_a_cet_type_id' => NULL,
        't_a_cet_type_details' => 'SENIOR HIGH SCHOOL GRADUATING STUDENT',
        't_a_cet_english_procficiency' => NULL,
        't_a_cet_reading_comprehension'  => NULL,
        't_a_cet_science_process_skills' => NULL,
        't_a_cet_quantitative_skills' => NULL,
        't_a_cet_abstract_thinking_skills' => NULL,
        't_a_cet_oapr' => NULL,

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
        't_a_hash'  => NULL,
    ];

    public function hydrate(){
        self::update_data();
        // dd($this->cet_form['t_a_cet_type_details']);
    }
    public function update_cet_type(){
        foreach($this->cet_type_data as $key =>$value){
            if($value->cet_type_details == $this->cet_form['t_a_cet_type_details']){
                $this->cet_form['t_a_cet_type_id'] = $value->cet_type_id;
                break;
            }
        }
    }
    public function update_data(){
        $this->cet_type_data = DB::table('cet_types')
            ->get()
            ->toArray();
        $this->course_data = DB::table('departments as d')
            ->select(
                'department_id',
                'college_header',
                'department_name',
                'campus_name'
                )
            ->join('colleges as c','d.department_college_id','c.college_id')
            ->join('campuses as cp','c.college_campus_id','cp.campus_id')
            ->get()
            ->toArray();
    }
    public function mount(Request $request){
        $user_details = $request->session()->all();
        $this->title = 'CET Application Form';

        $user_details =DB::table('users as u')
            ->select(
                "u.user_id",
                "u.user_status_id",
                "u.user_sex_id",
                "u.user_gender_id",
                "u.user_role_id",
                "u.user_name",
                "u.user_email",
                "u.user_phone",
                "u.user_name_verified",
                "u.user_email_verified",
                "u.user_phone_verified",
                "u.user_firstname",
                "u.user_middlename",
                "u.user_lastname",
                "u.user_suffix",
                "user_citizenship",
                "u.user_addr_street",
                "u.user_addr_brgy",
                "u.user_addr_city_mun",
                "u.user_addr_province",
                "u.user_addr_zip_code",
                "u.user_birthdate",
                "u.user_profile_picture",
                "u.user_formal_id",
                "u.date_created",
                "u.date_updated",
                "user_status_details",
                "user_sex_details",
                "user_gender_details",
                "user_role_details",
            )
            ->join('user_status as us', 'u.user_status_id', '=', 'us.user_status_id')
            ->join('user_sex as usex', 'u.user_sex_id', '=', 'usex.user_sex_id')
            ->join('user_genders as ug', 'u.user_gender_id', '=', 'ug.user_gender_id')
            ->join('user_roles as ur', 'u.user_role_id', '=', 'ur.user_role_id')
            ->where('user_id','=',$user_details['user_id'])
            ->first();
        $this->user_details = [
            "user_id" => $user_details->user_id,
            "user_status_id"  => $user_details->user_status_id,
            "user_sex_id"=> $user_details->user_sex_id,
            "user_gender_id"=> $user_details->user_gender_id,
            "user_role_id"=> $user_details->user_role_id,
            "user_name"=> $user_details->user_name,
            "user_email"=> $user_details->user_email,
            "user_phone"=> $user_details->user_phone,
            "user_name_verified"=> $user_details->user_name_verified,
            "user_email_verified"=> $user_details->user_email_verified,
            "user_phone_verified"=> $user_details->user_phone_verified,
            "user_firstname"=> $user_details->user_firstname,
            "user_middlename"=> $user_details->user_middlename,
            "user_lastname"=> $user_details->user_lastname,
            "user_suffix"=> $user_details->user_suffix,
            'user_citizenship' => $user_details->user_citizenship,
            "user_addr_street"=> $user_details->user_addr_street,
            "user_addr_brgy"=> $user_details->user_addr_brgy,
            "user_addr_city_mun"=> $user_details->user_addr_city_mun,
            "user_addr_province"=> $user_details->user_addr_province,
            "user_addr_zip_code"=> $user_details->user_addr_zip_code,
            "user_birthdate"=> $user_details->user_birthdate,
            "user_age"=> floor((time() - strtotime($user_details->user_birthdate)) / 31556926),
            "user_profile_picture"=> $user_details->user_profile_picture,
            "user_formal_id"=> $user_details->user_formal_id,
            "date_created"=> $user_details->date_created,
            "date_updated"=> $user_details->date_updated,
            "user_status_details"=> $user_details->user_status_details,
            "user_sex_details"=> $user_details->user_sex_details,
            "user_gender_details"=> $user_details->user_gender_details,
            "user_role_details"=> $user_details->user_role_details,
        ];
        
        $this->cet_form = [
            't_a_id' => NULL,
            't_a_test_type_id' => NULL,
            't_a_applicant_user_id' => $this->user_details['user_id'],
            't_a_test_status_id' => NULL,
            't_a_test_center_id' =>NULL,
            't_a_user_details' => NULL,
            't_a_isactive' => 1,
    
            't_a_citizenship' => NULL,
            't_a_date_of_graduation' => NULL,
            't_a_course' => NULL,
            't_a_school_school_name'=> NULL,
            't_a_school_address' => NULL,

            't_a_formal_photo' => NULL,
            't_a_school_principal_certification' => NULL,
            't_a_original_senior_high_school_card' => NULL,
            't_a_transcript_of_records' => NULL,
            't_a_endorsement_letter_from_wmsu_dean' => NULL,
            't_a_receipt_photo' => NULL,  // note that if the applicant is taking second time

            't_a_formal_photo_id' => rand(1,1000000),
            't_a_school_principal_certification_id' =>  rand(1,1000000),
            't_a_original_senior_high_school_card_id' =>  rand(1,1000000),
            't_a_transcript_of_records_id' =>  rand(1,1000000),
            't_a_endorsement_letter_from_wmsu_dean_id' =>  rand(1,1000000),
            't_a_receipt_photo_id' =>  rand(1,1000000),
    
            't_a_1st_choice' => NULL,
            't_a_2nd_choice' => NULL,
            't_a_3rd_choice' => NULL,
    
            // parent 
            't_a_f_citizenship' => NULL,
            't_a_f_hef' => NULL,
            't_a_f_occupation'  => NULL,
            't_a_f_place_of_work' => NULL,
            't_a_f_monthly_salary' => NULL,
    
            't_a_m_citizenship' => NULL,
            't_a_m_hef' => NULL,
            't_a_m_occupation' => NULL,
            't_a_m_place_of_work' => NULL,
            't_a_m_monthly_salary' => NULL,
    
            't_a_computer_literate' => NULL,
            't_a_ethnic_group' => NULL,
            't_a_religious_affiliation' => NULL,
            't_a_accept' => NULL,
    
            't_a_cet_type_id' => NULL,
            't_a_cet_type_details' => 'SENIOR HIGH SCHOOL GRADUATING STUDENT',
            't_a_cet_english_procficiency' => NULL,
            't_a_cet_reading_comprehension'  => NULL,
            't_a_cet_science_process_skills' => NULL,
            't_a_cet_quantitative_skills' => NULL,
            't_a_cet_abstract_thinking_skills' => NULL,
            't_a_cet_oapr' => NULL,
    
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
            't_a_hash'  => NULL,
        ];
        self::update_data();

        foreach($this->cet_type_data as $key =>$value){
            if($value){
                $this->cet_form['t_a_cet_type_id'] = $value->cet_type_id;
                break;
            }
        }
        
       
    }
    public function render(){
        return view('livewire.student.student-application.cet-application-form',[
            'user_details' => $this->user_details
            ])
            ->layout('layouts.student',[
                'title'=>$this->title]);
    }
    public function page($page){
        $this->page = $page;
        $this->dispatchBrowserEvent('moveUp');

        if($this->page == 1){
            // check data
        }
    }

    public function cet_application(){
        if($this->page == 1){
            $this->page = 2;
            $this->dispatchBrowserEvent('moveUp');
        }elseif($this->page == 2){
            //validate all

            
            // check course choice
            if( !$this->cet_form['t_a_1st_choice'] && !intval($this->cet_form['t_a_1st_choice'])>0){
                dd($this->cet_form);
            }
            if( !$this->cet_form['t_a_2nd_choice'] && !intval($this->cet_form['t_a_2nd_choice'])>0){
                dd($this->cet_form);
            }
            if( !$this->cet_form['t_a_3rd_choice'] && !intval($this->cet_form['t_a_3rd_choice'])>0){
                dd($this->cet_form);
            }
            
        }
       
        
    }
}
