<?php

namespace App\Http\Livewire\Student\StudentProfile;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class StudentProfile extends Component
{
    use WithFileUploads;
    public $title;
    public $user_details;

    // photo 
    public $photo;
    public $formal_id;

    public $photo_id;
    public $formal_id_id;

    // password
    public $current_password;
    public $new_password;
    public $confirm_password;
    public $password_error;

    public $firstname;
    public $middlename;
    public $lastname;
    public $suffix;
    public $gender;
    public $sex;
    public $phone;
    public $address;
    public $birthdate;

    public $f_firstname;
    public $f_middlename;
    public $f_lastname;
    public $f_suffix;
    public $m_firstname;
    public $m_middlename;
    public $m_lastname;
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
    public $ueb_shs_form_137;
    public $ueb_shs_is_graduate = false;
    public $ueb_shs_graduation_date;
    public $ueb_shs_diploma ;
    public $ueb_attachement_counts=1;
    public $ueb_attachement_count_max = 10;

    public $diploma_id;
    public $ueb_shs_form_137_id;
    public $ueb_shs_form_137_link;
    public $ueb_shs_diploma_link;
   

    public function mount(Request $request){
        $this->user_details = $request->session()->all();

        $this->title = 'profile';

        $this->photo_id = rand(0,1000000);
        $this->formal_id_id = rand(0,1000000);

        $this->firstname = $this->user_details['user_firstname'];
        $this->middlename = $this->user_details['user_middlename'];
        $this->lastname = $this->user_details['user_lastname'];
        $this->suffix = $this->user_details['user_suffix'];
        $this->gender = $this->user_details['user_gender_details'];
        $this->sex = $this->user_details['user_sex_details'];
        $this->phone = $this->user_details['user_phone'];
        $this->address = $this->user_details['user_address'];
        $this->birthdate = $this->user_details['user_birthdate'];

        $this->diploma_id = rand(0,1000000);
        $this->ueb_shs_form_137_id = rand(0,1000000);

        // family
        if($family_details = DB::table('family_background as fb')
        ->where('family_background_user_id', $this->user_details['user_id'])
        ->first()){
            $this->m_firstname = $family_details->family_background_m_firstname;
            $this->m_middlename = $family_details->family_background_m_middlename ;
            $this->m_lastname = $family_details->family_background_m_lastname;
            $this->f_firstname = $family_details->family_background_f_firstname ;
            $this->f_middlename = $family_details->family_background_f_middlename;
            $this->f_lastname = $family_details->family_background_f_lastname ;
            $this->f_suffix = $family_details->family_background_f_suffix ;
            $this->g_firstname = $family_details->family_background_g_firstname ;
            $this->g_middlename = $family_details->family_background_g_middlename ;
            $this->g_lastname = $family_details->family_background_g_lastname ;
            $this->g_suffix = $family_details->family_background_g_suffix ;
            $this->g_relationship = $family_details->family_background_g_relationship;
            $this->number_of_siblings = $family_details->family_background_number_of_siblings ;
            $this->fb_address = $family_details->family_background_address ;
        }
        // educational backgrounds
        if($educational_details = DB::table('user_educational_background as ueb')
            ->where('ueb.ueb_user_id', $this->user_details['user_id'])
            ->first()){

            $this->ueb_id = $educational_details->ueb_id;
            $this->ueb_shs_school_name = $educational_details->ueb_shs_school_name;
            $this->ueb_shs_address = $educational_details->ueb_shs_address ;
            $this->ueb_shs_form_137_link = $educational_details->ueb_shs_form_137;
            $this->ueb_shs_is_graduate = $educational_details->ueb_shs_is_graduate ;
            $this->ueb_shs_graduation_date = $educational_details->ueb_shs_graduation_date;

            $this->ueb_shs_diploma_link = $educational_details->ueb_shs_diploma ;

            // attachments
            // dd($educational_details);
        }
        $ueb_shs_graduation_date=null;
        // requirements
    }
    public function render()
    {
        return view('livewire.student.student-profile.student-profile',[
                'user_details' => $this->user_details
            ])
            ->layout('layouts.student',[
                'title'=>$this->title]);
    }
    public function save_profile_info(Request $request){
        $user_details = $request->session()->all();
        if(!isset($user_details['user_id'])){
            $this->dispatchBrowserEvent('swal:redirect',[
                'position'          									=> 'center',
                'icon'              									=> 'warning',
                'title'             									=> 'Unauthenticated!',
                'showConfirmButton' 									=> 'true',
                'timer'             									=> '1500',
                'link'              									=> '/login'
            ]);
        }
        if(isset($user_details['user_status_details']) && $user_details['user_status_details'] == 'deleted' ){
            $this->dispatchBrowserEvent('swal:redirect',[
                'position'          									=> 'center',
                'icon'              									=> 'warning',
                'title'             									=> 'Account deleted!',
                'showConfirmButton' 									=> 'true',
                'timer'             									=> '1500',
                'link'              									=> '/deleted'
            ]);
        }
        if(isset($user_details['user_status_details']) && $user_details['user_status_details'] == 'inactive' ){
            $this->dispatchBrowserEvent('swal:redirect',[
                'position'          									=> 'center',
                'icon'              									=> 'warning',
                'title'             									=> 'Account inactive!',
                'showConfirmButton' 									=> 'true',
                'timer'             									=> '1500',
                'link'              									=> '/inactive'
            ]);
        }
       
        if(strlen($this->firstname) < 1 && strlen($this->firstname) > 255){
            return false;
        }
        
        if(strlen($this->lastname) < 1 && strlen($this->lastname) > 255){
            return false;
        }
        if(strlen($this->middlename) < 0 && strlen($this->middlename) > 255){
            return false;
        }
        if(strlen($this->suffix) < 0 && strlen($this->suffix) > 255){
            return false;
        }
        if(strlen($this->address) < 0 && strlen($this->address) > 255){
            return false;
        }
        // validate phone
        if(1){
            
        }

        if($gender_details = DB::table('user_genders')
        ->where('user_gender_details', $this->gender)
        ->first()){
            $gender_id = $gender_details->user_gender_id;
        }else{
            DB::table('user_genders')->insert([
                'user_gender_details'=>$this->gender
            ]);
            $gender_details = DB::table('user_genders')
                ->where('user_gender_details', $this->gender)
                ->first();
            $gender_id = $gender_details->user_gender_id;
        }
        // update
        DB::table('users as u')
        ->where(['u.user_id'=> $user_details['user_id']])
        ->update(['u.user_firstname' => $this->firstname,
            'u.user_middlename'=>$this->middlename, 
            'u.user_lastname'=>$this->lastname, 
            'u.user_suffix'=>$this->suffix, 
            'u.user_gender_id'=>$gender_id,
            'u.user_address'=>$this->address,  
            'u.user_phone'=>$this->phone,  
            'u.user_birthdate'=>$this->birthdate,   
        ]);

        $user_details =DB::table('users as u')
        ->join('user_status as us', 'u.user_status_id', '=', 'us.user_status_id')
        ->join('user_sex as usex', 'u.user_sex_id', '=', 'usex.user_sex_id')
        ->join('user_genders as ug', 'u.user_gender_id', '=', 'ug.user_gender_id')
        ->join('user_roles as ur', 'u.user_role_id', '=', 'ur.user_role_id')
        ->where(['u.user_id'=> $user_details['user_id']])
        ->first();


        $request->session()->put('user_id', $user_details->user_id);
        $request->session()->put('user_status_id', $user_details->user_status_id);
        $request->session()->put('user_status_details', $user_details->user_status_details); 
        $request->session()->put('user_sex_id', $user_details->user_sex_id);
        $request->session()->put('user_sex_details', $user_details->user_sex_details);
        $request->session()->put('user_gender_id', $user_details->user_gender_id);
        $request->session()->put('user_gender_details', $user_details->user_gender_details);
        $request->session()->put('user_role_id', $user_details->user_role_id);
        $request->session()->put('user_role_details', $user_details->user_role_details);
        
        $request->session()->put('user_name', $user_details->user_name);
        $request->session()->put('user_email', $user_details->user_email);
        $request->session()->put('user_phone', $user_details->user_phone);
        $request->session()->put('user_name_verified', $user_details->user_name_verified);
        $request->session()->put('user_email_verified', $user_details->user_email_verified);
        $request->session()->put('user_phone_verified', $user_details->user_phone_verified);

        $request->session()->put('user_firstname',$user_details->user_firstname);
        $request->session()->put('user_middlename', $user_details->user_middlename);
        $request->session()->put('user_lastname', $user_details->user_lastname);
        $request->session()->put('user_fullname', $user_details->user_lastname.', '. $user_details->user_firstname.' '.$user_details->user_middlename);
        $request->session()->put('user_suffix', $user_details->user_suffix);
        $request->session()->put('user_address', $user_details->user_address);

        $request->session()->put('user_birthdate', $user_details->user_birthdate);
        $request->session()->put('user_profile_picture', $user_details->user_profile_picture);
        $request->session()->put('created_at', $user_details->created_at);
        $request->session()->put('updated_at', $user_details->updated_at);
        $this->user_details = $request->session()->all();

        $this->dispatchBrowserEvent('swal:redirect',[
            'position'          									=> 'center',
            'icon'              									=> 'success',
            'title'             									=> 'Account details saved!',
            'showConfirmButton' 									=> 'true',
            'timer'             									=> '1500',
            'link'              									=> '#'
        ]);
        
    }

    public function update_profile_and_id(Request $request){
        $user_details = $request->session()->all();
        if(!isset($user_details['user_id'])){
            $this->dispatchBrowserEvent('swal:redirect',[
                'position'          									=> 'center',
                'icon'              									=> 'warning',
                'title'             									=> 'Unauthenticated!',
                'showConfirmButton' 									=> 'true',
                'timer'             									=> '1500',
                'link'              									=> '/login'
            ]);
        }
        if(isset($user_details['user_status_details']) && $user_details['user_status_details'] == 'deleted' ){
            $this->dispatchBrowserEvent('swal:redirect',[
                'position'          									=> 'center',
                'icon'              									=> 'warning',
                'title'             									=> 'Account deleted!',
                'showConfirmButton' 									=> 'true',
                'timer'             									=> '1500',
                'link'              									=> '/deleted'
            ]);
        }
        if(isset($user_details['user_status_details']) && $user_details['user_status_details'] == 'inactive' ){
            $this->dispatchBrowserEvent('swal:redirect',[
                'position'          									=> 'center',
                'icon'              									=> 'warning',
                'title'             									=> 'Account inactive!',
                'showConfirmButton' 									=> 'true',
                'timer'             									=> '1500',
                'link'              									=> '/inactive'
            ]);
        }

        if($this->photo&& file_exists(storage_path().'/app/livewire-tmp/'.$this->photo->getfilename())){
            $file_extension =$this->photo->getClientOriginalExtension();
            $tmp_name = 'livewire-tmp/'.$this->photo->getfilename();
            $size = Storage::size($tmp_name);
            $mime = Storage::mimeType($tmp_name);
            $max_image_size = 20 * 1024*1024; // 5 mb
            $file_extensions = array('image/jpeg','image/png','image/jpg');
            
            if($size<= $max_image_size){
                $valid_extension = false;
                foreach ($file_extensions as $value) {
                    if($value == $mime){
                        $valid_extension = true;
                        break;
                    }
                }
                if($valid_extension){
                    $storage_file_path = storage_path().'/app/public/images/';
                    
                    // move
                    $new_file_name = md5($tmp_name);
                    while(DB::table('users')
                    ->where(['user_profile_picture'=> $new_file_name.'.'.$file_extension])
                    ->first()){
                        $new_file_name = md5($tmp_name.rand(1,10000000));
                    }
                    
                    if(!is_dir($storage_file_path)){
                        mkdir($storage_file_path);
                    }
                    if(!is_dir($storage_file_path.'original/')){
                        mkdir($storage_file_path.'original/');
                    }
                    if(!is_dir($storage_file_path.'resize/')){
                        mkdir($storage_file_path.'resize/');
                    }
                    if(!is_dir($storage_file_path.'thumbnail/')){
                        mkdir($storage_file_path.'thumbnail/');
                    }
                    $profilepic_dir = $storage_file_path.'original/';
                    switch($file_extension){
                        case 'png':
                            $img = imagecreatefrompng(storage_path().'/'.'app/'.$tmp_name);
                            // convert jpeg
                            imagejpeg($img,$profilepic_dir.$new_file_name.'.jpg',100);
                        break;
                        case 'bmp':
                            $img = imagecreatefrompng(storage_path().'/'.'app/'.$tmp_name);
                            // convert jpeg
                            imagejpeg($img,$profilepic_dir.$new_file_name.'.jpg',100);
                            break;
                        case 'jpg':
                            copy(storage_path().'/'.'app/'.$tmp_name, $storage_file_path.'original/'.$new_file_name.'.jpg');
                        break;
                    }
                    
                    $profile_resize_dir = $storage_file_path.'resize/';
                    $profile_thumbnail_dir = $storage_file_path.'thumbnail/';
                    // profile display

                    $sourceFilename  =$profilepic_dir;
                    $destination = $profile_resize_dir;
                    $filename = $new_file_name.'.jpg';
                    $newFilename =$new_file_name.'.jpg';
                    $quality = 80;
                    $newwidth = 500;
                    $newheight =500;
                    list($width, $height) = getimagesize($sourceFilename.$filename);
                    if($width/$height > 1){
                        $x = ($width - $height) / 2;
                        $y = 0;
                        $width= $width - ($x*2);
                        $height;
                    }else{
                        $y = ($height - $width) / 2;
                        $x = 0;
                        $width;
                        $height = $height - ($y*2);
                    }
                
                    // creating jpeg 
                    $img = imagecreatefromjpeg($sourceFilename.$filename);
                    $img =imagecrop($img, ['x' => $x, 'y' => $y, 'width' => $width, 'height' => $height]);
                    $thumb = imagecreatetruecolor($newwidth, $newheight);
                    if(imagecopyresized($thumb, $img, 0, 0, 0, 0,$newwidth, $newheight, $width, $height)){
                        if(imagejpeg($thumb,$destination.$filename,$quality)){
                        }else{
                            return false;
                        }
                    }else {
                        return false;
                    }

                    $sourceFilename  = $profilepic_dir;
                    $destination = $profile_thumbnail_dir;
                    $filename = $new_file_name.'.jpg';
                    $newFilename =$new_file_name.'.jpg';
                    $quality = 80;
                    $newwidth = 150;
                    $newheight =150;
                    list($width, $height) = getimagesize($sourceFilename.$filename);
                    if($width/$height > 1){
                        $x = ($width - $height) / 2;
                        $y = 0;
                        $width= $width - ($x*2);
                        $height;
                    }else{
                        $y = ($height - $width) / 2;
                        $x = 0;
                        $width;
                        $height = $height - ($y*2);
                    }
                
                    // creating jpeg 
                    $img = imagecreatefromjpeg($sourceFilename.$filename);
                    $img =imagecrop($img, ['x' => $x, 'y' => $y, 'width' => $width, 'height' => $height]);
                    $thumb = imagecreatetruecolor($newwidth, $newheight);
                    if(imagecopyresized($thumb, $img, 0, 0, 0, 0,$newwidth, $newheight, $width, $height)){
                        if(imagejpeg($thumb,$destination.$filename,$quality)){
                        }else{
                            return false;
                        }
                    }else {
                        return false;
                    }
                    
                  

                       
                    if($user_details['user_profile_picture'] != 'default.png'){
                        if(file_exists($profilepic_dir.$user_details['user_profile_picture'])){
                            unlink($profilepic_dir.$user_details['user_profile_picture']);
                        }
                        if(file_exists($profile_resize_dir.$user_details['user_profile_picture'])){
                            unlink($profile_resize_dir.$user_details['user_profile_picture']);
                        }
                        if(file_exists($profile_thumbnail_dir.$user_details['user_profile_picture'])){
                            unlink($profile_thumbnail_dir.$user_details['user_profile_picture']);
                        }
                    }
                        
                        // delete old photo
                        DB::table('users as u')
                        ->where(['u.user_id'=> $user_details['user_id']])
                        ->update(['u.user_profile_picture'=> $new_file_name.'.jpg']);

                        $request->session()->put('user_profile_picture', $new_file_name.'.jpg');
                        $this->user_details = $request->session()->all();
                        $this->photo = null;

                        $this->dispatchBrowserEvent('swal:redirect',[
                            'position'          									=> 'center',
                            'icon'              									=> 'success',
                            'title'             									=> 'Images updated!',
                            'showConfirmButton' 									=> 'true',
                            'timer'             									=> '1500',
                            'link'              									=> '#'
                        ]);
                }else{
                    $this->dispatchBrowserEvent('swal:redirect',[
                        'position'          									=> 'center',
                        'icon'              									=> 'warning',
                        'title'             									=> 'Invalid image type!',
                        'showConfirmButton' 									=> 'true',
                        'timer'             									=> '1500',
                        'link'              									=> '#'
                    ]);
                }
            }else{
                $this->dispatchBrowserEvent('swal:redirect',[
                    'position'          									=> 'center',
                    'icon'              									=> 'warning',
                    'title'             									=> 'Image is too large!',
                    'showConfirmButton' 									=> 'true',
                    'timer'             									=> '1500',
                    'link'              									=> '#'
                ]);
            }
            $this->photo_id = rand(0,1000000);
        }

        if($this->formal_id && file_exists(storage_path().'/app/livewire-tmp/'.$this->formal_id->getfilename())){
            $file_extension =$this->formal_id->getClientOriginalExtension();
            $tmp_name = 'livewire-tmp/'.$this->formal_id->getfilename();
            $size = Storage::size($tmp_name);
            $mime = Storage::mimeType($tmp_name);
            $max_image_size = 20 * 1024*1024; // 5 mb
            $file_extensions = array('image/jpeg','image/png','image/jpg');
            
            if($size<= $max_image_size){
                $valid_extension = false;
                foreach ($file_extensions as $value) {
                    if($value == $mime){
                        $valid_extension = true;
                        break;
                    }
                }
                if($valid_extension){
                    $storage_file_path = storage_path().'/app/public/formal_id/';
                    
                    // move
                    $new_file_name = md5($tmp_name).'.'.$file_extension;
                    while(DB::table('users')
                    ->where(['user_formal_id'=> $new_file_name])
                    ->first()){
                        $new_file_name = md5($tmp_name.rand(1,10000000)).'.'.$file_extension;
                    }
                    if(Storage::move($tmp_name, 'public/formal_id/'.$new_file_name)){
                        if($user_details['user_formal_id'] != 'default.png'){
                            if(file_exists($storage_file_path.$user_details['user_formal_id'])){
                                unlink($storage_file_path.$user_details['user_formal_id']);
                            }
                            
                        }
                        // delete old photo
                        DB::table('users as u')
                        ->where(['u.user_id'=> $user_details['user_id']])
                        ->update(['u.user_formal_id'=> $new_file_name]);

                        $request->session()->put('user_formal_id', $new_file_name);
                        $this->user_details = $request->session()->all();
                        // resize thumb nail
                        // resize 500x500 px
                        $this->formal_id = null;

                        $this->dispatchBrowserEvent('swal:redirect',[
                            'position'          									=> 'center',
                            'icon'              									=> 'success',
                            'title'             									=> 'Images updated!',
                            'showConfirmButton' 									=> 'true',
                            'timer'             									=> '1500',
                            'link'              									=> '#'
                        ]);
                    }
                }else{
                    $this->dispatchBrowserEvent('swal:redirect',[
                        'position'          									=> 'center',
                        'icon'              									=> 'warning',
                        'title'             									=> 'Invalid image type!',
                        'showConfirmButton' 									=> 'true',
                        'timer'             									=> '1500',
                        'link'              									=> '#'
                    ]);
                }
            }else{
                $this->dispatchBrowserEvent('swal:redirect',[
                    'position'          									=> 'center',
                    'icon'              									=> 'warning',
                    'title'             									=> 'Image is too large!',
                    'showConfirmButton' 									=> 'true',
                    'timer'             									=> '1500',
                    'link'              									=> '#'
                ]);
            }  
            $this->formal_id_id = rand(0,1000000);         
        }
    
        
    }
    public function change_password(Request $request){
        $user_details = $request->session()->all();
        if(!isset($user_details['user_id'])){
            $this->dispatchBrowserEvent('swal:redirect',[
                'position'          									=> 'center',
                'icon'              									=> 'warning',
                'title'             									=> 'Unauthenticated!',
                'showConfirmButton' 									=> 'true',
                'timer'             									=> '1500',
                'link'              									=> '/login'
            ]);
        }
        if(isset($user_details['user_status_details']) && $user_details['user_status_details'] == 'deleted' ){
            $this->dispatchBrowserEvent('swal:redirect',[
                'position'          									=> 'center',
                'icon'              									=> 'warning',
                'title'             									=> 'Account deleted!',
                'showConfirmButton' 									=> 'true',
                'timer'             									=> '1500',
                'link'              									=> '/deleted'
            ]);
        }
        if(isset($user_details['user_status_details']) && $user_details['user_status_details'] == 'inactive' ){
            $this->dispatchBrowserEvent('swal:redirect',[
                'position'          									=> 'center',
                'icon'              									=> 'warning',
                'title'             									=> 'Account inactive!',
                'showConfirmButton' 									=> 'true',
                'timer'             									=> '1500',
                'link'              									=> '/inactive'
            ]);
        }
        if(strlen($this->new_password) < 8 ) {
            $this->password_error = 'new password must be >= 8';
            return false;
        }
        elseif(!preg_match("#[0-9]+#",$this->new_password)) {
            $this->password_error = 'new password must have number';
            return false;
        }
        elseif(!preg_match("#[A-Z]+#",$this->new_password)) {
            $this->password_error = 'new password must have upper case';
            return false;
        }
        elseif(!preg_match("#[a-z]+#",$this->new_password)) {
            $this->password_error = 'new password must have lower case';
            return false;
        }
        $this->password_error=null;
        if(strlen($this->confirm_password) < 8 ) {
            $this->password_error = 'Confirm password must be >= 8';
            return false;
        }
        elseif(!preg_match("#[0-9]+#",$this->confirm_password)) {
            $this->password_error = 'Confirm password must have number';
            return false;
        }
        elseif(!preg_match("#[A-Z]+#",$this->confirm_password)) {
            $this->password_error = 'Confirm password must have upper case';
            return false;
        }
        elseif(!preg_match("#[a-z]+#",$this->confirm_password)) {
            $this->password_error = 'Confirm password must have lower case';
            return false;
        }
        // good password
        if($this->new_password == $this->confirm_password){
            $user_details =DB::table('users as u')
            ->where(['u.user_id'=> $user_details['user_id']])
            ->first();
            if( $user_details && password_verify($this->current_password,$user_details->user_password)){
                if($this->current_password != $this->new_password){
                    $hash_password = password_hash($this->new_password, PASSWORD_ARGON2I);
                    if(DB::table('users as u')
                    ->where(['u.user_id'=> $user_details->user_id])
                    ->update(['u.user_password'=> $hash_password])){
                        $this->current_password = null;
                        $this->new_password = null;
                        $this->confirm_password = null;
                        $this->dispatchBrowserEvent('swal:redirect',[
                            'position'          									=> 'center',
                            'icon'              									=> 'success',
                            'title'             									=> 'Successfully changed password!',
                            'showConfirmButton' 									=> 'true',
                            'timer'             									=> '2000',
                            'link'              									=> '#'
                        ]);
                    }else{
                        $this->dispatchBrowserEvent('swal:redirect',[
                            'position'          									=> 'center',
                            'icon'              									=> 'warning',
                            'title'             									=> 'Error saving password!',
                            'showConfirmButton' 									=> 'true',
                            'timer'             									=> '2000',
                            'link'              									=> '#'
                        ]);
                    }
                    
                }else{
                    $this->dispatchBrowserEvent('swal:redirect',[
                        'position'          									=> 'center',
                        'icon'              									=> 'warning',
                        'title'             									=> 'New password must not be same as your old password!',
                        'showConfirmButton' 									=> 'true',
                        'timer'             									=> '2000',
                        'link'              									=> '#'
                    ]);
                }
            }else{
                $this->dispatchBrowserEvent('swal:redirect',[
                    'position'          									=> 'center',
                    'icon'              									=> 'warning',
                    'title'             									=> 'Incorrect current password!',
                    'showConfirmButton' 									=> 'true',
                    'timer'             									=> '2000',
                    'link'              									=> '#'
                ]);
            }
        }else{
            $this->password_error = 'Password doesn\'t match';
        }   
    }

    public function new_password(Request $request){
        $user_details = $request->session()->all();
        if(!isset($user_details['user_id'])){
            $this->dispatchBrowserEvent('swal:redirect',[
                'position'          									=> 'center',
                'icon'              									=> 'warning',
                'title'             									=> 'Unauthenticated!',
                'showConfirmButton' 									=> 'true',
                'timer'             									=> '1500',
                'link'              									=> '/login'
            ]);
        }
        if(isset($user_details['user_status_details']) && $user_details['user_status_details'] == 'deleted' ){
            $this->dispatchBrowserEvent('swal:redirect',[
                'position'          									=> 'center',
                'icon'              									=> 'warning',
                'title'             									=> 'Account deleted!',
                'showConfirmButton' 									=> 'true',
                'timer'             									=> '1500',
                'link'              									=> '/deleted'
            ]);
        }
        if(isset($user_details['user_status_details']) && $user_details['user_status_details'] == 'inactive' ){
            $this->dispatchBrowserEvent('swal:redirect',[
                'position'          									=> 'center',
                'icon'              									=> 'warning',
                'title'             									=> 'Account inactive!',
                'showConfirmButton' 									=> 'true',
                'timer'             									=> '1500',
                'link'              									=> '/inactive'
            ]);
        }
        if(strlen($this->new_password) < 8 ) {
            $this->password_error = 'new password must be >= 8';
            return false;
        }
        elseif(!preg_match("#[0-9]+#",$this->new_password)) {
            $this->password_error = 'new password must have number';
            return false;
        }
        elseif(!preg_match("#[A-Z]+#",$this->new_password)) {
            $this->password_error = 'new password must have upper case';
            return false;
        }
        elseif(!preg_match("#[a-z]+#",$this->new_password)) {
            $this->password_error = 'new password must have lower case';
            return false;
        }
        $this->password_error=null;
    }

    public function confirm_password(Request $request){
        $user_details = $request->session()->all();
        if(!isset($user_details['user_id'])){
            $this->dispatchBrowserEvent('swal:redirect',[
                'position'          									=> 'center',
                'icon'              									=> 'warning',
                'title'             									=> 'Unauthenticated!',
                'showConfirmButton' 									=> 'true',
                'timer'             									=> '1500',
                'link'              									=> '/login'
            ]);
        }
        if(isset($user_details['user_status_details']) && $user_details['user_status_details'] == 'deleted' ){
            $this->dispatchBrowserEvent('swal:redirect',[
                'position'          									=> 'center',
                'icon'              									=> 'warning',
                'title'             									=> 'Account deleted!',
                'showConfirmButton' 									=> 'true',
                'timer'             									=> '1500',
                'link'              									=> '/deleted'
            ]);
        }
        if(isset($user_details['user_status_details']) && $user_details['user_status_details'] == 'inactive' ){
            $this->dispatchBrowserEvent('swal:redirect',[
                'position'          									=> 'center',
                'icon'              									=> 'warning',
                'title'             									=> 'Account inactive!',
                'showConfirmButton' 									=> 'true',
                'timer'             									=> '1500',
                'link'              									=> '/inactive'
            ]);
        }
        if(strlen($this->confirm_password) < 8 ) {
            $this->password_error = 'Confirm password must be >= 8';
            return false;
        }
        elseif(!preg_match("#[0-9]+#",$this->confirm_password)) {
            $this->password_error = 'Confirm password must have number';
            return false;
        }
        elseif(!preg_match("#[A-Z]+#",$this->confirm_password)) {
            $this->password_error = 'Confirm password must have upper case';
            return false;
        }
        elseif(!preg_match("#[a-z]+#",$this->confirm_password)) {
            $this->password_error = 'Confirm password must have lower case';
            return false;
        }
        // good password
        if($this->new_password == $this->confirm_password){
            $this->password_error = null;
            
        }else{
            $this->password_error = 'Password doesn\'t match';
        }
    }

    public function save_family_background(Request $request){
        $user_details = $request->session()->all();
        if(!isset($user_details['user_id'])){
            $this->dispatchBrowserEvent('swal:redirect',[
                'position'          									=> 'center',
                'icon'              									=> 'warning',
                'title'             									=> 'Unauthenticated!',
                'showConfirmButton' 									=> 'true',
                'timer'             									=> '1500',
                'link'              									=> '/login'
            ]);
        }
        if(isset($user_details['user_status_details']) && $user_details['user_status_details'] == 'deleted' ){
            $this->dispatchBrowserEvent('swal:redirect',[
                'position'          									=> 'center',
                'icon'              									=> 'warning',
                'title'             									=> 'Account deleted!',
                'showConfirmButton' 									=> 'true',
                'timer'             									=> '1500',
                'link'              									=> '/deleted'
            ]);
        }
        if(isset($user_details['user_status_details']) && $user_details['user_status_details'] == 'inactive' ){
            $this->dispatchBrowserEvent('swal:redirect',[
                'position'          									=> 'center',
                'icon'              									=> 'warning',
                'title'             									=> 'Account inactive!',
                'showConfirmButton' 									=> 'true',
                'timer'             									=> '1500',
                'link'              									=> '/inactive'
            ]);
        }
        if($family_details = DB::table('family_background as fb')
        ->where('family_background_user_id', $this->user_details['user_id'])
        ->first()){
            // validation
            if(DB::table('family_background as fb')
                ->where(['fb.family_background_id'=> $family_details->family_background_id,
                ])
                ->update(['family_background_m_firstname' =>$this->m_firstname ,
                'family_background_m_middlename' => $this->m_middlename ,
                'family_background_m_lastname' => $this->m_lastname,
                'family_background_f_firstname' =>  $this->f_firstname,
                'family_background_f_middlename' => $this->f_middlename,
                'family_background_f_lastname' =>  $this->f_lastname,
                'family_background_f_suffix' => $this->f_suffix,
                'family_background_g_firstname' => $this->g_firstname,
                'family_background_g_middlename' => $this->g_middlename,
                'family_background_g_lastname' => $this->g_lastname,
                'family_background_g_suffix' => $this->g_suffix,
                'family_background_g_relationship' => $this->g_relationship,
                
                'family_background_number_of_siblings' => $this->number_of_siblings,
                'family_background_address' => $this->fb_address,  
            ])){
                $this->dispatchBrowserEvent('swal:redirect',[
                    'position'          									=> 'center',
                    'icon'              									=> 'success',
                    'title'             									=> 'Family details saved!',
                    'showConfirmButton' 									=> 'true',
                    'timer'             									=> '1500',
                    'link'              									=> '#'
                ]);
            }else{
                $this->dispatchBrowserEvent('swal:redirect',[
                    'position'          									=> 'center',
                    'icon'              									=> 'success',
                    'title'             									=> 'Family details saved!',
                    'showConfirmButton' 									=> 'true',
                    'timer'             									=> '1500',
                    'link'              									=> '#'
                ]);
            }
        }else{
            if(DB::table('family_background')->insert([
                'family_background_user_id'=> $this->user_details['user_id'],
                'family_background_m_firstname' =>$this->m_firstname ,
                'family_background_m_middlename' => $this->m_middlename ,
                'family_background_m_lastname' => $this->m_lastname,
                'family_background_f_firstname' =>  $this->f_firstname,
                'family_background_f_middlename' => $this->f_middlename,
                'family_background_f_lastname' =>  $this->f_lastname,
                'family_background_f_suffix' => $this->f_suffix,
                'family_background_g_firstname' => $this->g_firstname,
                'family_background_g_middlename' => $this->g_middlename,
                'family_background_g_lastname' => $this->g_lastname,
                'family_background_g_suffix' => $this->g_suffix,
                'family_background_g_relationship' => $this->g_relationship,
                'family_background_number_of_siblings' => $this->number_of_siblings,
                'family_background_address' => $this->fb_address,
            ])){
                $this->dispatchBrowserEvent('swal:redirect',[
                    'position'          									=> 'center',
                    'icon'              									=> 'success',
                    'title'             									=> 'Family details saved!',
                    'showConfirmButton' 									=> 'true',
                    'timer'             									=> '1500',
                    'link'              									=> '#'
                ]);
            }else{
                $this->dispatchBrowserEvent('swal:redirect',[
                    'position'          									=> 'center',
                    'icon'              									=> 'warning',
                    'title'             									=> 'Error saving Family details!',
                    'showConfirmButton' 									=> 'true',
                    'timer'             									=> '1500',
                    'link'              									=> '#'
                ]);
            }
        }
    }

    public function save_educational_details(Request $request){
        $user_details = $request->session()->all();
        $ueb_details = DB::table('user_educational_background')
        ->where(['ueb_user_id'=> $user_details['user_id']])
        ->first();
        $ueb_shs_form_137 = $this->ueb_shs_form_137_link;
        $ueb_shs_diploma = $this->ueb_shs_diploma_link;
        if(!isset($user_details['user_id'])){
            $this->dispatchBrowserEvent('swal:redirect',[
                'position'          									=> 'center',
                'icon'              									=> 'warning',
                'title'             									=> 'Unauthenticated!',
                'showConfirmButton' 									=> 'true',
                'timer'             									=> '1500',
                'link'              									=> '/login'
            ]);
        }
        if(isset($user_details['user_status_details']) && $user_details['user_status_details'] == 'deleted' ){
            $this->dispatchBrowserEvent('swal:redirect',[
                'position'          									=> 'center',
                'icon'              									=> 'warning',
                'title'             									=> 'Account deleted!',
                'showConfirmButton' 									=> 'true',
                'timer'             									=> '1500',
                'link'              									=> '/deleted'
            ]);
        }
        if(isset($user_details['user_status_details']) && $user_details['user_status_details'] == 'inactive' ){
            $this->dispatchBrowserEvent('swal:redirect',[
                'position'          									=> 'center',
                'icon'              									=> 'warning',
                'title'             									=> 'Account inactive!',
                'showConfirmButton' 									=> 'true',
                'timer'             									=> '1500',
                'link'              									=> '/inactive'
            ]);
        }
        if(strlen($this->ueb_shs_school_name) < 1 && strlen($this->ueb_shs_school_name) > 255){
            return false;
        }
        if(strlen($this->ueb_shs_address) < 1 && strlen($this->ueb_shs_address) > 255){
            return false;
        }


        if($this->ueb_shs_is_graduate){
            if($this->ueb_shs_diploma && file_exists(storage_path().'/app/livewire-tmp/'.$this->ueb_shs_diploma->getfilename())){
                $file_extension =$this->ueb_shs_diploma->getClientOriginalExtension();
                $tmp_name = 'livewire-tmp/'.$this->ueb_shs_diploma->getfilename();
                $size = Storage::size($tmp_name);
                $mime = Storage::mimeType($tmp_name);
                $max_image_size = 20 * 1024*1024; // 5 mb
                $file_extensions = array('image/jpeg','image/png','image/jpg');
                
                if($size<= $max_image_size){
                    $valid_extension = false;
                    foreach ($file_extensions as $value) {
                        if($value == $mime){
                            $valid_extension = true;
                            break;
                        }
                    }
                    if($valid_extension){
                        $storage_file_path = storage_path().'/app/public/ueb_shs_diploma/';
                        
                        // move
                        $new_file_name = md5($tmp_name).'.'.$file_extension;
                        while(DB::table('user_educational_background')
                        ->where(['ueb_shs_diploma'=> $new_file_name])
                        ->first()){
                            $new_file_name = md5($tmp_name.rand(1,10000000)).'.'.$file_extension;
                        }
                        if(Storage::move($tmp_name, 'public/ueb_shs_diploma/'.$new_file_name)){
                            if( $ueb_shs_diploma && file_exists($storage_file_path.$ueb_shs_diploma)){
                                unlink($storage_file_path.$ueb_shs_diploma);
                            }
                            $this->ueb_shs_diploma = null;
                        }
                        $ueb_shs_diploma = $new_file_name;
                    }else{
                        $this->dispatchBrowserEvent('swal:redirect',[
                            'position'          									=> 'center',
                            'icon'              									=> 'warning',
                            'title'             									=> 'Invalid image type!',
                            'showConfirmButton' 									=> 'true',
                            'timer'             									=> '1500',
                            'link'              									=> '#'
                        ]);
                    }
                }else{
                    $this->dispatchBrowserEvent('swal:redirect',[
                        'position'          									=> 'center',
                        'icon'              									=> 'warning',
                        'title'             									=> 'Image is too large!',
                        'showConfirmButton' 									=> 'true',
                        'timer'             									=> '1500',
                        'link'              									=> '#'
                    ]);
                }   
                $this->diploma_id = rand(0,1000000);        
            }
        }
        if($this->ueb_shs_form_137 && file_exists(storage_path().'/app/livewire-tmp/'.$this->ueb_shs_form_137->getfilename())){
            $file_extension =$this->ueb_shs_form_137->getClientOriginalExtension();
            $tmp_name = 'livewire-tmp/'.$this->ueb_shs_form_137->getfilename();
            $size = Storage::size($tmp_name);
            $mime = Storage::mimeType($tmp_name);
            $max_image_size = 20 * 1024*1024; // 5 mb
            $file_extensions = array('image/jpeg','image/png','image/jpg');
            
            if($size<= $max_image_size){
                $valid_extension = false;
                foreach ($file_extensions as $value) {
                    if($value == $mime){
                        $valid_extension = true;
                        break;
                    }
                }
                if($valid_extension){
                    $storage_file_path = storage_path().'/app/public/ueb_shs_form_137/';
                    
                    // move
                    $new_file_name = md5($tmp_name).'.'.$file_extension;
                    while(DB::table('user_educational_background')
                    ->where(['ueb_shs_form_137'=> $new_file_name])
                    ->first()){
                        $new_file_name = md5($tmp_name.rand(1,10000000)).'.'.$file_extension;
                    }
                   
                    if(Storage::move($tmp_name, 'public/ueb_shs_form_137/'.$new_file_name)){
                        if($ueb_details && file_exists($storage_file_path.$ueb_details->ueb_shs_form_137)){
                            unlink($storage_file_path.$ueb_details->ueb_shs_form_137);
                        }
                        $this->ueb_shs_form_137 = null;
                    }
                    $ueb_shs_form_137 = $new_file_name;
                }else{
                    $this->dispatchBrowserEvent('swal:redirect',[
                        'position'          									=> 'center',
                        'icon'              									=> 'warning',
                        'title'             									=> 'Invalid image type!',
                        'showConfirmButton' 									=> 'true',
                        'timer'             									=> '1500',
                        'link'              									=> '#'
                    ]);
                }
            }else{
                $this->dispatchBrowserEvent('swal:redirect',[
                    'position'          									=> 'center',
                    'icon'              									=> 'warning',
                    'title'             									=> 'Image is too large!',
                    'showConfirmButton' 									=> 'true',
                    'timer'             									=> '1500',
                    'link'              									=> '#'
                ]);
            } 
            $this->ueb_shs_form_137_id = rand(0,1000000);           
        }
     

        if($ueb_details){
                DB::table('user_educational_background')
            ->where(['ueb_user_id'=> $user_details['user_id']])
            ->update(['ueb_shs_school_name'=>$this->ueb_shs_school_name,
            'ueb_shs_address'=>$this->ueb_shs_address,
            'ueb_shs_form_137'=>$ueb_shs_form_137 ,
            'ueb_shs_is_graduate'=>$this->ueb_shs_is_graduate,
            'ueb_shs_graduation_date'=>$this->ueb_shs_graduation_date,

            'ueb_shs_diploma'=>$ueb_shs_diploma,

            ]);
        }else{
            DB::table('user_educational_background')->insert([
                'ueb_user_id'=>$user_details['user_id'],
                'ueb_shs_school_name'=>$this->ueb_shs_school_name,
                'ueb_shs_address'=>$this->ueb_shs_address,
                'ueb_shs_form_137'=>$ueb_shs_form_137 ,
                'ueb_shs_is_graduate'=>$this->ueb_shs_is_graduate,
                'ueb_shs_graduation_date'=>$this->ueb_shs_graduation_date,

                'ueb_shs_diploma'=>$ueb_shs_diploma,
            ]);

               

                // attachments
            
            
        }
        if($educational_details = DB::table('user_educational_background as ueb')
            ->where('ueb.ueb_user_id', $this->user_details['user_id'])
            ->first()){

            $this->ueb_id = $educational_details->ueb_id;
            $this->ueb_shs_school_name = $educational_details->ueb_shs_school_name;
            $this->ueb_shs_address = $educational_details->ueb_shs_address ;
            $this->ueb_shs_form_137_link = $educational_details->ueb_shs_form_137;
            $this->ueb_shs_is_graduate = $educational_details->ueb_shs_is_graduate ;
            $this->ueb_shs_graduation_date = $educational_details->ueb_shs_graduation_date;

            $this->ueb_shs_diploma_link = $educational_details->ueb_shs_diploma ;
        }
        $this->dispatchBrowserEvent('swal:redirect',[
            'position'          									=> 'center',
            'icon'              									=> 'success',
            'title'             									=> 'Educational Details Updated!',
            'showConfirmButton' 									=> 'true',
            'timer'             									=> '1500',
            'link'              									=> '#'
        ]);
        


        // dd($this->ueb_shs_form_137);
    //     public $ueb_id;
    // public $ueb_shs_school_name;
    // public $ueb_shs_address;
    // public $ueb_shs_is_graduate;
    // public $ueb_shs_graduation_date;
    // public $ueb_shs_form_137;
    // public $ueb_shs_diploma ;
    }
    // public function add_attachements($index,Request $request){
    //     $user_details = $request->session()->all();
    //     $this->ueb_attachement_counts++;
    //     array_push($this->ueb_attachements, ['',rand()]);
    // }
    // public function delete_attachements($index){
        
    //     $ueb_attachements = [];
        
    //     for ($i=0; $i <$this->ueb_attachement_counts ; $i++) { 
    //         if($i != $index){
    //             array_push($ueb_attachements, $this->ueb_attachements[$i]);
    //         }
    //     }
     
    //     $this->ueb_attachement_counts--;
    //     $this->ueb_attachements = $ueb_attachements; 
    //     // dd($ueb_attachements);
    // }
}


