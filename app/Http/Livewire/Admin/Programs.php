<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class Programs extends Component
{
    use WithFileUploads;
    public $user_detais;
    public $title;

    public $active = 'Colleges';

    public $college_data;
    public $college = [
        'college_id' =>NULL,
        'college_logo'=>NULL,
        'college_header' =>NULL,
        'college_content' =>NULL,
        'college_order' =>NULL
    ];

    public $department_filter=[];
    public $college_id;
    public $department_data;
    public $department = [
        'department_id' => NULL,
        'department_college_id' => NULL,
        'department_name' => NULL,
        'department_logo' =>NULL,
        'department_details' => NULL,
        'department_abr' => NULL,
        'department_order' => NULL
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
        $this->access_role = [
            'C' => true,
            'R' => true,
            'U' => true,
            'D' => true
        ];

        if($this->access_role['C'] || $this->access_role['R'] || $this->access_role['U'] || $this->access_role['D']){
            self::update_data();
        }
    }

    public function update_data(){
        $this->college_data = DB::table('colleges')
            ->select('*')
            ->where('college_isactive','=',1)
            ->orderBy('college_order')
            ->get()
            ->toArray();

        $this->department_data = DB::table('departments')
            ->where('department_college_id','=',$this->college_id)
            ->orderBy('department_order')
            ->get()
            ->toArray();
        // dd($this->college_data );
    }
    public function mount(Request $request){
        $this->user_details = $request->session()->all();
        $this->title = 'program-management';

        $this->access_role = [
            'C' => true,
            'R' => true,
            'U' => true,
            'D' => true
        ];

        $this->college_filter = [
            '#'=> true,
            'Logo'=> true,
            'Header'=> true,
            'Content'=> true,
            'Order'=> true,
            'Action'=> true,
        ];  
        $this->department_filter = [
            '#'=> true,
            'Logo'=> true,
            'College'=> true,
            'Header'=> true,
            'Content'=> true,
            'Order'=> true,
            'Action'=> true,
        ];  

        if($this->access_role['C'] || $this->access_role['R'] || $this->access_role['U'] || $this->access_role['D']){
            self::update_data();
            if( $this->college_data){
                $this->college_id = $this->college_data[0]->college_id;
            }
        }
    }
    public function render(){
        return view('livewire.admin.programs',[
            'user_details' => $this->user_details
            ])
            ->layout('layouts.admin',[
                'title'=>$this->title]);
    }
    public function active_page($active){
        $this->active = $active;
        $this->edit_carousel_data = null;
    }
    public function add_college(){
        $this->access_role = [
            'C' => true,
            'R' => true,
            'U' => true,
            'D' => true
        ];
        if($this->access_role['C']  ){
            $this->college = [
                'college_id' =>NULL,
                'college_logo'=>NULL,
                'college_header' =>NULL,
                'college_content' =>NULL
            ];
            $this->dispatchBrowserEvent('openModal','addCollegeModal');
        }
    }
    public function save_add_college(){
        $this->access_role = [
            'C' => true,
            'R' => true,
            'U' => true,
            'D' => true
        ];

        if($this->access_role['C'] ){
            if(strlen($this->college['college_header'])<=0){
                return;
            }
            if(strlen($this->college['college_content'])<=0){
                return;
            }
         
            if($this->college['college_logo'] && file_exists(storage_path().'/app/livewire-tmp/'.$this->college['college_logo']->getfilename())){
                $file_extension =$this->college['college_logo']->getClientOriginalExtension();
                $tmp_name = 'livewire-tmp/'.$this->college['college_logo']->getfilename();
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
                        
                        // move
                        $new_file_name = md5($tmp_name).'.'.$file_extension;
                        while(DB::table('colleges')
                        ->where(['college_logo'=> $new_file_name])
                        ->first()){
                            $new_file_name = md5($tmp_name.rand(1,10000000)).'.'.$file_extension;
                        }
                        if(Storage::move($tmp_name, 'public/content/programs/colleges/'.$new_file_name)){

                            // delete old img
                            $this->college['college_logo'] = $new_file_name;
                            // resize thumb nail
                            // resize 500x500 px
    
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
                        return 0;
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
                    return 0;
                }  
                $this->carousel_image_id = rand(0,1000000);         
            }else{
                $this->dispatchBrowserEvent('swal:redirect',[
                    'position'          									=> 'center',
                    'icon'              									=> 'warning',
                    'title'             									=> 'Image is too large!',
                    'showConfirmButton' 									=> 'true',
                    'timer'             									=> '1500',
                    'link'              									=> '#'
                ]);
                return 0;
            }
            
            $current_order = DB::table('colleges')
                ->select(DB::raw('count(*) as current_order'))
                ->first();

            if(DB::table('colleges')
                ->insert([
                    'college_logo'=>$this->college['college_logo'],
                    'college_header' => $this->college['college_header'],
                    'college_content' => $this->college['college_content'],
                    'college_order' => ($current_order->current_order+1)
            ])){
                $this->dispatchBrowserEvent('swal:redirect',[
                    'position'          									=> 'center',
                    'icon'              									=> 'success',
                    'title'             									=> 'Successfully added!',
                    'showConfirmButton' 									=> 'true',
                    'timer'             									=> '1000',
                    'link'              									=> '#'
                ]);
                $this->college = [
                    'college_id'=> NULL,
                    'college_logo'=>NULL,
                    'college_header'=>NULL,
                    'college_content'=> NULL
                ];

                self::update_data();
                $this->dispatchBrowserEvent('openModal','addCollegeModal');
            }
        }
    }
    public function edit_college($college_id){
        $this->access_role = [
            'C' => true,
            'R' => true,
            'U' => true,
            'D' => true
        ];
        if($this->access_role['U'] ){
            $college = DB::table('colleges')
                ->where('college_id','=',$college_id)
                ->first();
            $this->college = [
                'college_id' => $college->college_id,
                'college_logo'=>NULL,
                'college_header' =>$college->college_header,
                'college_content' =>$college->college_content
            ];
            $this->dispatchBrowserEvent('openModal','EditCollegeModal');
            
        }
    }
    public function save_edit_college($college_id){
        $this->access_role = [
            'C' => true,
            'R' => true,
            'U' => true,
            'D' => true
        ];

        if($this->access_role['C'] ){
            if(strlen($this->college['college_header'])<=0){
                return;
            }
            if(strlen($this->college['college_content'])<=0){
                return;
            }
            $college = DB::table('colleges')
                ->where('college_id','=',$college_id)
                ->first();
            
            if($this->college['college_logo'] && file_exists(storage_path().'/app/livewire-tmp/'.$this->college['college_logo']->getfilename())){
                $file_extension =$this->college['college_logo']->getClientOriginalExtension();
                $tmp_name = 'livewire-tmp/'.$this->college['college_logo']->getfilename();
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
                        
                        // move
                        $new_file_name = md5($tmp_name).'.'.$file_extension;
                        while(DB::table('colleges')
                        ->where(['college_logo'=> $new_file_name])
                        ->first()){
                            $new_file_name = md5($tmp_name.rand(1,10000000)).'.'.$file_extension;
                        }
                        if(Storage::move($tmp_name, 'public/content/programs/colleges/'.$new_file_name)){

                            // delete old img
                            $this->college['college_logo'] = $new_file_name;
                            $image_path = storage_path().'/app/public/content/programs/colleges/'.$college->college_logo;;
                            if(file_exists($image_path)){
                                unlink($image_path);
                            }
                            // resize thumb nail
                            // resize 500x500 px
    
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
                        return 0;
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
                    return 0;
                }  
                $this->carousel_image_id = rand(0,1000000);         
            }else{
                $this->college['college_logo'] = $college->college_logo;
            }
            if(DB::table('colleges')
                ->where('college_id','=',$college_id)
                ->update([
                    'college_logo'=>$this->college['college_logo'],
                    'college_header' => $this->college['college_header'],
                    'college_content' => $this->college['college_content']
            ])){
                $this->dispatchBrowserEvent('swal:redirect',[
                    'position'          									=> 'center',
                    'icon'              									=> 'success',
                    'title'             									=> 'Successfully updated!',
                    'showConfirmButton' 									=> 'true',
                    'timer'             									=> '1000',
                    'link'              									=> '#'
                ]);
                $this->college = [
                    'college_id'=> NULL,
                    'college_logo'=>NULL,
                    'college_header'=>NULL,
                    'college_content'=> NULL
                ];
              

                self::update_data();
                $this->dispatchBrowserEvent('openModal','EditCollegeModal');
            }
            $this->college['college_logo'] = NULL;
        }
    }
    public function delete_college($college_id){
        $this->access_role = [
            'C' => true,
            'R' => true,
            'U' => true,
            'D' => true
        ];
        if($this->access_role['D'] ){
            $college = DB::table('colleges')
                ->where('college_id','=',$college_id)
                ->first();
            $image_path = storage_path().'/app/public/content/programs/colleges/'.$college->college_logo;;
            if(file_exists($image_path)){
                unlink($image_path);
            }
            $this->college = [
                'college_id' => $college->college_id,
                'college_logo'=>NULL,
                'college_header' =>$college->college_header,
                'college_content' =>$college->college_content
            ];
            $this->dispatchBrowserEvent('openModal','DeleteCollegeModal');
        }
    }
    public function save_delete_college($college_id){
        $this->access_role = [
            'C' => true,
            'R' => true,
            'U' => true,
            'D' => true
        ];
        $college = DB::table('colleges')
        ->where('college_id','=',$college_id)
        ->first();
    
        if($this->access_role['D'] ){
            DB::table('colleges')
            ->where('college_id','=',$college_id)
            ->update([
                'college_isactive'=>FALSE
            ]);
            self::update_data();
            $this->dispatchBrowserEvent('openModal','DeleteCollegeModal');
        }
        
    }
    public function college_filter(){
        self::update_data();
    }
    public function move_up_college($college_order){
        // get up
        $current = DB::table('colleges')
        ->where('college_order','=',$college_order)
        ->first();
     
        if($up_data = DB::table('colleges')
            ->where('college_order','<',$current->college_order)
            ->orderBy('college_order','desc')
            ->first()){
            DB::table('colleges')
                ->where('college_id','=',$current->college_id)
                ->update(['college_order'=>$up_data->college_order]);

            DB::table('colleges')
                ->where('college_id','=',$up_data->college_id)
                ->update(['college_order'=>$current->college_order]);

            self::update_data();
        }
    }
    public function move_down_college($college_order){
        // get up
        $current = DB::table('colleges')
        ->where('college_order','=',$college_order)
        ->first();
        
        if($down_data = DB::table('colleges')
        ->where('college_order','>',$current->college_order)
        ->orderBy('college_order')
        ->first()){
            DB::table('colleges')
                ->where('college_id','=',$current->college_id)
                ->update(['college_order'=>$down_data->college_order]);

            DB::table('colleges')
                ->where('college_id','=',$down_data->college_id)
                ->update(['college_order'=>$current->college_order]);

            self::update_data();
        }
    }


    public function add_department(){
        $this->access_role = [
            'C' => true,
            'R' => true,
            'U' => true,
            'D' => true
        ];
        if($this->access_role['C']  ){
            $this->department = [
                'department_id' => NULL,
                'department_college_id' => $this->college_id,
                'department_name' => NULL,
                'department_logo' =>NULL,
                'department_details' => NULL,
                'department_abr' => NULL,
                'department_order' => NULL
            ];
            $this->dispatchBrowserEvent('openModal','AddDepartmentModal');
        }
    }
    public function save_add_department(){
        $this->access_role = [
            'C' => true,
            'R' => true,
            'U' => true,
            'D' => true
        ];
        if($this->access_role['C']  ){
            if(!DB::table('colleges')
                ->where('college_id','=',$this->department['department_college_id'])
                ->where('college_isactive','=',1)){
                return;
            }
            if(strlen($this->department['department_name'])<=0){
                return;
            }
            if(strlen($this->department['department_details'])<=0){
                return;
            }
            if($this->department['department_logo'] && file_exists(storage_path().'/app/livewire-tmp/'.$this->department['department_logo']->getfilename())){
                $file_extension =$this->department['department_logo']->getClientOriginalExtension();
                $tmp_name = 'livewire-tmp/'.$this->department['department_logo']->getfilename();
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
                        
                        // move
                        $new_file_name = md5($tmp_name).'.'.$file_extension;
                        while(DB::table('departments')
                        ->where(['department_logo'=> $new_file_name])
                        ->first()){
                            $new_file_name = md5($tmp_name.rand(1,10000000)).'.'.$file_extension;
                        }
                        if(Storage::move($tmp_name, 'public/content/programs/departments/'.$new_file_name)){

                            // delete old img
                            $this->department['department_logo'] = $new_file_name;
                            // resize thumb nail
                            // resize 500x500 px
    
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
                        return 0;
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
                    return 0;
                }  
                $this->carousel_image_id = rand(0,1000000);         
            }else{
                $this->dispatchBrowserEvent('swal:redirect',[
                    'position'          									=> 'center',
                    'icon'              									=> 'warning',
                    'title'             									=> 'Image is too large!',
                    'showConfirmButton' 									=> 'true',
                    'timer'             									=> '1500',
                    'link'              									=> '#'
                ]);
                return 0;
            }

            $current_order = DB::table('departments')
            ->select(DB::raw('count(*) as current_order'))
            ->where('department_college_id','=',$this->department['department_college_id'])
            ->first();

            if(DB::table('departments')
                ->insert([
                    'department_id' => NULL,
                    'department_college_id' => $this->department['department_college_id'],
                    'department_name' => $this->department['department_name'],
                    'department_logo' =>$this->department['department_logo'],
                    'department_details' => $this->department['department_details'],
                    'department_abr' => $this->department['department_abr'],
                    'department_order' => ($current_order->current_order+1)
            ])){
                $this->dispatchBrowserEvent('swal:redirect',[
                    'position'          									=> 'center',
                    'icon'              									=> 'success',
                    'title'             									=> 'Successfully added!',
                    'showConfirmButton' 									=> 'true',
                    'timer'             									=> '1000',
                    'link'              									=> '#'
                ]);
                $this->department = [
                    'department_id' => NULL,
                    'department_college_id' => NULL,
                    'department_name' => NULL,
                    'department_logo' =>NULL,
                    'department_details' => NULL,
                    'department_abr' => NULL,
                    'department_order' => NULL
                ];

                self::update_data();
                $this->dispatchBrowserEvent('openModal','AddDepartmentModal');
            }
        }
    }
    public function filterView(){
        $this->dispatchBrowserEvent('swal:redirect',[
            'position'          									=> 'center',
            'icon'              									=> 'success',
            'title'             									=> 'Successfully changed filter!',
            'showConfirmButton' 									=> 'true',
            'timer'             									=> '1000',
            'link'              									=> '#'
        ]);
    }
    public function edit_department($department_id){
        $this->access_role = [
            'C' => true,
            'R' => true,
            'U' => true,
            'D' => true
        ];
        if($this->access_role['C']  ){
            $department = DB::table('departments')
                ->where('department_id','=',$department_id)
                ->first();
            $this->department = [
                'department_id' =>  $department->department_id,
                'department_college_id' => $department->department_college_id,
                'department_name' => $department->department_name,
                'department_logo' =>NULL,
                'department_details' => $department->department_details,
                'department_abr' => $department->department_abr,
                'department_order' => $department->department_order
            ];
            $this->dispatchBrowserEvent('openModal','EditDepartmentModal');
        }
    }
    public function save_edit_department($department_id){
        $this->access_role = [
            'C' => true,
            'R' => true,
            'U' => true,
            'D' => true
        ];
        if($this->access_role['C']  ){
            if(!DB::table('colleges')
                ->where('college_id','=',$this->department['department_college_id'])
                ->where('college_isactive','=',1)){
                return;
            }
            if(strlen($this->department['department_name'])<=0){
                return;
            }
            if(strlen($this->department['department_details'])<=0){
                return;
            }
            $department = DB::table('departments')
            ->where('department_id','=',$department_id)
            ->first();
            if($this->department['department_logo'] && file_exists(storage_path().'/app/livewire-tmp/'.$this->department['department_logo']->getfilename())){
                $file_extension =$this->department['department_logo']->getClientOriginalExtension();
                $tmp_name = 'livewire-tmp/'.$this->department['department_logo']->getfilename();
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
                        
                        // move
                        $new_file_name = md5($tmp_name).'.'.$file_extension;
                        while(DB::table('departments')
                        ->where(['department_logo'=> $new_file_name])
                        ->first()){
                            $new_file_name = md5($tmp_name.rand(1,10000000)).'.'.$file_extension;
                        }
                        if(Storage::move($tmp_name, 'public/content/programs/departments/'.$new_file_name)){

                            // delete old img
                            $this->department['department_logo'] = $new_file_name;
                            $image_path = storage_path().'/app/public/content/programs/departments/'.$department->department_logo;
                            if(file_exists($image_path)){
                                unlink($image_path);
                            }
                            // resize thumb nail
                            // resize 500x500 px
    
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
                        return 0;
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
                    return 0;
                }  
                $this->carousel_image_id = rand(0,1000000);         
            }else{
                $this->department['department_logo'] = $department->department_logo;
            }

            if(DB::table('departments')
                ->where('department_id','=',$department_id)
                ->update([
                    'department_college_id' => $this->department['department_college_id'],
                    'department_name' => $this->department['department_name'],
                    'department_logo' =>$this->department['department_logo'],
                    'department_details' => $this->department['department_details'],
                    'department_abr' => $this->department['department_abr']
            ])){
                $this->dispatchBrowserEvent('swal:redirect',[
                    'position'          									=> 'center',
                    'icon'              									=> 'success',
                    'title'             									=> 'Successfully updated!',
                    'showConfirmButton' 									=> 'true',
                    'timer'             									=> '1000',
                    'link'              									=> '#'
                ]);
                $this->department = [
                    'department_id' => NULL,
                    'department_college_id' => NULL,
                    'department_name' => NULL,
                    'department_logo' =>NULL,
                    'department_details' => NULL,
                    'department_abr' => NULL,
                    'department_order' => NULL
                ];

                self::update_data();
                $this->dispatchBrowserEvent('openModal','EditDepartmentModal');
            }
        }
    }
    public function move_up_department($department_order){
        // get up
        $current = DB::table('departments')
        ->where('department_order','=',$department_order)
        ->first();
     
        if($up_data = DB::table('departments')
            ->where('department_order','<',$current->department_order)
            ->orderBy('department_order','desc')
            ->first()){
            DB::table('departments')
                ->where('department_id','=',$current->department_id)
                ->update(['department_order'=>$up_data->department_order]);

            DB::table('departments')
                ->where('department_id','=',$up_data->department_id)
                ->update(['department_order'=>$current->department_order]);

            self::update_data();
        }
    }
    public function move_down_department($department_order){
        // get up
        $current = DB::table('departments')
        ->where('department_order','=',$department_order)
        ->first();
        
        if($down_data = DB::table('departments')
        ->where('department_order','>',$current->department_order)
        ->orderBy('department_order')
        ->first()){
            DB::table('departments')
                ->where('department_id','=',$current->department_id)
                ->update(['department_order'=>$down_data->department_order]);

            DB::table('departments')
                ->where('department_id','=',$down_data->department_id)
                ->update(['department_order'=>$current->department_order]);

            self::update_data();
        }
    }

    
}
