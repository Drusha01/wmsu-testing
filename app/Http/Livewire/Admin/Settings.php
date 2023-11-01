<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class Settings extends Component
{
    use WithFileUploads;
    public $user_detais;
    public $title;

    public $active = 'Carousel';

    public $carousel_filter;
    public $carousel_data;
    public $edit_carousel_data;
    public $carousel_image_id ;
    public $carousel_id;
    public $carousel_header_title;
    public $carousel_content_image;
    public $carousel_paragraph_paragraph;

    // services
    public $services_filter;
    public $services_data;
    public $service = [
        'service_id'=> NULL,
        'service_logo'=>NULL,
        'service_header'=>'',
        'service_content'=> NULL
    ];

    // why choose us
    public $wcu_filter;
    public $wcu_data;
    public $wcu = [
        'wcu_id'=> NULL,
        'wcu_logo'=>NULL,
        'wcu_header'=>'',
        'wcu_content'=> NULL
    ];


    // faq
    public $faq_filter;
    public $faq_data;
    public $faq = [
        'faq_id'=> NULL,
        'faq_question'=>'',
        'faq_answer'=>'',
        'faq_order'=> NULL
    ];

    // feature
    public $feature_filter;
    public $feature_data;
    public $feature = [
        'feature_id'=> NULL,
        'feature_header'=>NULL,
        'feature_content'=>NULL,
        'feature_button_name'=> NULL,
        'feature_link'=> NULL
    ];

    // footer

    // about us
    
    // cta





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
        $this->carousel_data = DB::table('carousel as c')
                ->select('*')
                ->orderBy('carousel_order')
                ->get()
                ->toArray();

            $this->services_data = DB::table('services as c')
                ->select('*')
                ->orderBy('service_order')
                ->get()
                ->toArray();

            $this->faq_data = DB::table('faq as f')
                ->select('*')
                ->orderBy('faq_order')
                ->get()
                ->toArray();

            $this->wcu_data = DB::table('wcu')
                ->select('*')
                ->orderBy('wcu_order')
                ->get()
                ->toArray();

            $this->feature_data = DB::table('features')
            ->select('*')
            ->orderBy('feature_order')
            ->get()
            ->toArray();
    }
    public function mount(Request $request){
        $this->user_details = $request->session()->all();
        $this->title = 'setting';
        
        $carousel_image_id = rand(0,1000000);
        $this->carousel_filter = [
            '#'=> true,
            'Carousel content'=> true,
            'Paragraphs'=> true,
            'Order'=> true,
            'Action'=> true,
        ];

        $this->services_filter = [
            '#'=> true,
            'Logo'=> true,
            'Header'=> true,
            'Content'=> true,
            'Order'=> true,
            'Action'=> true,
        ];

        // about us

        // why choose us
        $this->wcu_filter = [
            '#'=> true,
            'Logo'=> true,
            'Header'=> true,
            'Content'=> true,
            'Order'=> true,
            'Action'=> true,
        ];  

        // cta

        // faq
        $this->faq_filter = [
            '#'=> true,
            'Question'=> true,
            'Answer'=> true,
            'Order'=> true,
            'Action'=> true,
        ];

        $this->feature_filter = [
            '#'=> true,
            'Header'=> true,
            'Content'=> true,
            'Button name'=> true,
            'Link'=> true,
            'Order'=> true,
            'Action'=> true,
        ]; 

        // footer

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
    public function render(){
        return view('livewire.admin.settings',[
            'user_details' => $this->user_details
            ])
            ->layout('layouts.admin',[
                'title'=>$this->title]);
    }
    
    // carousel
    public function active_page($active){
        $this->active = $active;
        $this->edit_carousel_data = null;
    }
    public function view_carousel($carousel_id){
        $this->dispatchBrowserEvent('openModal','addRoomModal');
    }
    public function edit_carousel($carousel_id){
        $this->access_role = [
            'C' => true,
            'R' => true,
            'U' => true,
            'D' => true
        ];

        if($this->access_role['U'] ){
            $this->edit_carousel_data = DB::table('carousel as c')
            ->select('*')
            ->where('carousel_id','=',$carousel_id)
            ->get()
            ->toArray();

            $this->carousel_id = $this->edit_carousel_data[0]->carousel_id;
            $this->carousel_header_title = $this->edit_carousel_data[0]->carousel_header_title;
            $this->carousel_content_image = null;
            $this->carousel_paragraph_paragraph = $this->edit_carousel_data[0]->carousel_paragraph_paragraph;

        $this->dispatchBrowserEvent('openModal','EditCarouselModal');
        }
    }
    public function move_up_carousel($carousel_id){
        // get up
        $current_carousel = DB::table('carousel')
        ->where('carousel_id','=',$carousel_id)
        ->first();


        if($up_data = DB::table('carousel')
        ->where('carousel_order','<',$current_carousel->carousel_order)
        ->first()){
            DB::table('carousel as c')
                ->where('carousel_id','=',$current_carousel->carousel_id)
                ->update(['carousel_order'=>$up_data->carousel_order]);

            DB::table('carousel as c')
                ->where('carousel_id','=',$up_data->carousel_id)
                ->update(['carousel_order'=>$current_carousel->carousel_order]);

            $this->carousel_data = DB::table('carousel as c')
                ->select('*')
                ->orderBy('carousel_order')
                ->get()
                ->toArray();
        }

    }
    public function move_down_carousel($carousel_id){
        // get up
        $current_carousel = DB::table('carousel')
        ->where('carousel_id','=',$carousel_id)
        ->first();


        if($up_data = DB::table('carousel')
        ->where('carousel_order','>',$current_carousel->carousel_order)
        ->first()){
            DB::table('carousel as c')
                ->where('carousel_id','=',$current_carousel->carousel_id)
                ->update(['carousel_order'=>$up_data->carousel_order]);

            DB::table('carousel as c')
                ->where('carousel_id','=',$up_data->carousel_id)
                ->update(['carousel_order'=>$current_carousel->carousel_order]);

            $this->carousel_data = DB::table('carousel as c')
                ->select('*')
                ->orderBy('carousel_order')
                ->get()
                ->toArray();
        }

    }
    public function add_carousel(){
        $this->access_role = [
            'C' => true,
            'R' => true,
            'U' => true,
            'D' => true
        ];

        if($this->access_role['C'] ){
            // if(strlen())
            // validation

            // image
         
            if($this->carousel_content_image && file_exists(storage_path().'/app/livewire-tmp/'.$this->carousel_content_image->getfilename())){
                $file_extension =$this->carousel_content_image->getClientOriginalExtension();
                $tmp_name = 'livewire-tmp/'.$this->carousel_content_image->getfilename();
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
                        while(DB::table('carousel')
                        ->where(['carousel_content_image'=> $new_file_name,
                                'carousel_id'=>$this->carousel_id])
                        ->first()){
                            $new_file_name = md5($tmp_name.rand(1,10000000)).'.'.$file_extension;
                        }
                        if(Storage::move($tmp_name, 'public/content/carousel/'.$new_file_name)){

                            // delete old img
                            $this->carousel_content_image = $new_file_name;
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
            
            $current_order = DB::table('carousel as c')
                ->select(DB::raw('count(*) as current_order'))
                ->first();

            if(DB::table('carousel')
                ->insert([
                    'carousel_header_title'=>$this->carousel_header_title,
                    'carousel_content_image' => $this->carousel_content_image,
                    'carousel_paragraph_paragraph' => $this->carousel_paragraph_paragraph,
                    'carousel_order' => ($current_order->current_order+1)
            ])){
                $this->dispatchBrowserEvent('swal:redirect',[
                    'position'          									=> 'center',
                    'icon'              									=> 'success',
                    'title'             									=> 'Successfully updated carousel!',
                    'showConfirmButton' 									=> 'true',
                    'timer'             									=> '1000',
                    'link'              									=> '#'
                ]);

                $this->carousel_header_title = null;
                $this->carousel_content_image = null;
                $this->carousel_paragraph_paragraph= null;
                $this->carousel_image_id = rand(0,1000000);         

                $this->carousel_data = DB::table('carousel as c')
                ->select('*')
                ->orderBy('carousel_order')
                ->get()
                ->toArray();

                $this->dispatchBrowserEvent('openModal','AddCarouselModal');
            }
        }
    }
    public function save_edit_carousel(){

        $this->access_role = [
            'C' => true,
            'R' => true,
            'U' => true,
            'D' => true
        ];

        if($this->access_role['U'] ){
            // if(strlen())
            // validation

            // image
            $old_data = DB::table('carousel')
            ->where(['carousel_id'=>$this->carousel_id])
            ->first();
         
            if($this->carousel_content_image && file_exists(storage_path().'/app/livewire-tmp/'.$this->carousel_content_image->getfilename())){
                $file_extension =$this->carousel_content_image->getClientOriginalExtension();
                $tmp_name = 'livewire-tmp/'.$this->carousel_content_image->getfilename();
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
                        while(DB::table('carousel')
                        ->where(['carousel_content_image'=> $new_file_name,
                                'carousel_id'=>$this->carousel_id])
                        ->first()){
                            $new_file_name = md5($tmp_name.rand(1,10000000)).'.'.$file_extension;
                        }
                        if(Storage::move($tmp_name, 'public/content/carousel/'.$new_file_name)){

                            // delete old img
                           
                            $image_path = storage_path().'/app/public/content/carousel/'.$old_data->carousel_content_image;
                            if(file_exists($image_path)){
                                unlink($image_path);
                            }
                            $this->carousel_content_image = $new_file_name;
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
                $this->carousel_content_image =  $old_data->carousel_content_image;
            } 
            
           
            if(DB::table('carousel as c')
                ->where('carousel_id','=',$this->carousel_id)
                ->update([
                    'carousel_header_title'=>$this->carousel_header_title,
                    'carousel_content_image' => $this->carousel_content_image,
                    'carousel_paragraph_paragraph' => $this->carousel_paragraph_paragraph,
            ])){
                    $this->dispatchBrowserEvent('swal:redirect',[
                        'position'          									=> 'center',
                        'icon'              									=> 'success',
                        'title'             									=> 'Successfully updated carousel!',
                        'showConfirmButton' 									=> 'true',
                        'timer'             									=> '1000',
                        'link'              									=> '#'
                    ]);

                $this->carousel_data = DB::table('carousel as c')
                ->select('*')
                ->orderBy('carousel_order')
                ->get()
                ->toArray();

                $this->dispatchBrowserEvent('openModal','EditCarouselModal');
            }
        }
    }
    public function delete_carousel($carousel_id){
        $current_carousel = DB::table('carousel')
        ->where('carousel_id','=',$carousel_id)
        ->first();
        $image_path = storage_path().'/app/public/content/carousel/'.$current_carousel->carousel_content_image;
        if(file_exists($image_path)){
            unlink($image_path);
        }

        if(
            DB::table('carousel as c')
            ->where('carousel_id','=',$carousel_id)
            ->delete()
            ){
            $this->dispatchBrowserEvent('swal:redirect',[
                'position'          									=> 'center',
                'icon'              									=> 'success',
                'title'             									=> 'Successfully deleted carousel!',
                'showConfirmButton' 									=> 'true',
                'timer'             									=> '1000',
                'link'              									=> '#'
            ]);
        }
        // update order?
        $carousel_data = DB::table('carousel')
            ->orderBy('carousel_order')
            ->get()
            ->toArray();
        foreach ($carousel_data as $key => $value) {
            DB::table('carousel as c')
                ->where('carousel_id','=',$value->carousel_id)
                ->update(['carousel_order'=>$key ]);
        }

        $this->carousel_data = DB::table('carousel as c')
            ->select('*')
            ->orderBy('carousel_order')
            ->get()
            ->toArray();
        

    }
    public function carouselfilterView(){
        $this->dispatchBrowserEvent('swal:redirect',[
            'position'          									=> 'center',
            'icon'              									=> 'success',
            'title'             									=> 'Successfully changed filter!',
            'showConfirmButton' 									=> 'true',
            'timer'             									=> '1000',
            'link'              									=> '#'
        ]);
    }

    // services
    public function add_service(){
        $this->service = [
            'service_id'=> NULL,
            'service_logo'=>NULL,
            'service_header'=>'',
            'service_content'=> NULL
        ];
        $this->dispatchBrowserEvent('openModal','AddServiceModal');
    }
    public function save_add_service(){
        $this->access_role = [
            'C' => true,
            'R' => true,
            'U' => true,
            'D' => true
        ];

        if($this->access_role['C'] ){
            if(strlen($this->service['service_header'])<=0){
                return;
            }
            if(strlen($this->service['service_content'])<=0){
                return;
            }
            
            // validation

            // image
         
            if($this->service['service_logo'] && file_exists(storage_path().'/app/livewire-tmp/'.$this->service['service_logo']->getfilename())){
                $file_extension =$this->service['service_logo']->getClientOriginalExtension();
                $tmp_name = 'livewire-tmp/'.$this->service['service_logo']->getfilename();
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
                        while(DB::table('services')
                        ->where(['service_logo'=> $new_file_name])
                        ->first()){
                            $new_file_name = md5($tmp_name.rand(1,10000000)).'.'.$file_extension;
                        }
                        if(Storage::move($tmp_name, 'public/content/services/'.$new_file_name)){

                            // delete old img
                            $this->service['service_logo'] = $new_file_name;
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
            
            $current_order = DB::table('services')
                ->select(DB::raw('count(*) as current_order'))
                ->first();

            if(DB::table('services')
                ->insert([
                    'service_logo'=>$this->service['service_logo'],
                    'service_header' => $this->service['service_header'],
                    'service_content' => $this->service['service_content'],
                    'service_order' => ($current_order->current_order+1)
            ])){
                $this->dispatchBrowserEvent('swal:redirect',[
                    'position'          									=> 'center',
                    'icon'              									=> 'success',
                    'title'             									=> 'Successfully added!',
                    'showConfirmButton' 									=> 'true',
                    'timer'             									=> '1000',
                    'link'              									=> '#'
                ]);
                $service = [
                    'service_id'=> NULL,
                    'service_logo'=>NULL,
                    'service_header'=>'',
                    'service_content'=> NULL
                ];

                self::update_data();
                $this->dispatchBrowserEvent('openModal','AddServiceModal');
            }
        }
    }
    public function edit_service($service_id){
        $this->access_role = [
            'C' => true,
            'R' => true,
            'U' => true,
            'D' => true
        ];

        if($this->access_role['U'] ){
            $service = DB::table('services')
                ->where('service_id','=',$service_id)
                ->first();
            $this->service = [
                'service_id'=> $service->service_id,
                'service_logo'=>NULL,
                'service_header'=>$service->service_header,
                'service_content'=> $service->service_content
            ];
            $this->dispatchBrowserEvent('openModal','EditServiceModal');
        }
    }
    public function save_edit_service($service_id){
        $this->access_role = [
            'C' => true,
            'R' => true,
            'U' => true,
            'D' => true
        ];

        if($this->access_role['C'] ){
            if(strlen($this->service['service_header'])<=0){
                return;
            }
            if(strlen($this->service['service_content'])<=0){
                return;
            }
            
            $current = DB::table('services')
                ->where('service_id','=',$service_id)
                ->first();

         
            if($this->service['service_logo'] && file_exists(storage_path().'/app/livewire-tmp/'.$this->service['service_logo']->getfilename())){
                $file_extension =$this->service['service_logo']->getClientOriginalExtension();
                $tmp_name = 'livewire-tmp/'.$this->service['service_logo']->getfilename();
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
                        while(DB::table('services')
                        ->where(['service_logo'=> $new_file_name])
                        ->first()){
                            $new_file_name = md5($tmp_name.rand(1,10000000)).'.'.$file_extension;
                        }
                        if(Storage::move($tmp_name, 'public/content/services/'.$new_file_name)){

                            // delete old img
                            $image_path = storage_path().'/app/public/content/services/'.$current->service_logo;;
                            if(file_exists($image_path)){
                                unlink($image_path);
                            }
                            $this->service['service_logo'] = $new_file_name;
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
                $this->service['service_logo'] = $current->service_logo;
            }
            if(DB::table('services')
                ->where('service_id','=',$service_id)
                ->update([
                    'service_logo'=>$this->service['service_logo'],
                    'service_header' => $this->service['service_header'],
                    'service_content' => $this->service['service_content'],
            ])){
                $this->dispatchBrowserEvent('swal:redirect',[
                    'position'          									=> 'center',
                    'icon'              									=> 'success',
                    'title'             									=> 'Successfully updated!',
                    'showConfirmButton' 									=> 'true',
                    'timer'             									=> '1000',
                    'link'              									=> '#'
                ]);
                $this->service = [
                    'service_id'=> NULL,
                    'service_logo'=>NULL,
                    'service_header'=>'',
                    'service_content'=> NULL
                ];

                self::update_data();
                $this->dispatchBrowserEvent('openModal','EditServiceModal');
            }
        }
    }
    public function delete_service($service_id){
        $current =  DB::table('services')
            ->where('service_id','=',$service_id)
            ->first();
        if( $current && 
            DB::table('services')
            ->where('service_id','=',$service_id)
            ->delete()
            ){

            $image_path = storage_path().'/app/public/content/services/'.$current->service_logo;;
            if(file_exists($image_path)){
                unlink($image_path);
            }
            $this->dispatchBrowserEvent('swal:redirect',[
                'position'          									=> 'center',
                'icon'              									=> 'success',
                'title'             									=> 'Successfully deleted!',
                'showConfirmButton' 									=> 'true',
                'timer'             									=> '1000',
                'link'              									=> '#'
            ]);

            self::update_data(); 
        }
    }
    public function move_up_service($service_order){
        // get up
        $current = DB::table('services')
        ->where('service_order','=',$service_order)
        ->first();
     
        if($up_data = DB::table('services')
            ->where('service_order','<',$current->service_order)
            ->orderBy('service_order','desc')
            ->first()){
            DB::table('services')
                ->where('service_id','=',$current->service_id)
                ->update(['service_order'=>$up_data->service_order]);

            DB::table('services')
                ->where('service_id','=',$up_data->service_id)
                ->update(['service_order'=>$current->service_order]);

            self::update_data();
        }
    }
    public function move_down_service($service_order){
        // get up
        $current = DB::table('services')
        ->where('service_order','=',$service_order)
        ->first();
        
        if($down_data = DB::table('services')
        ->where('service_order','>',$current->service_order)
        ->orderBy('service_order')
        ->first()){
            DB::table('services')
                ->where('service_id','=',$current->service_id)
                ->update(['service_order'=>$down_data->service_order]);

            DB::table('services')
                ->where('service_id','=',$down_data->service_id)
                ->update(['service_order'=>$current->service_order]);

            self::update_data();
        }
    }



    // why choose us
    public function add_wcu(){
        $this->wcu = [
            'wcu_id'=> NULL,
            'wcu_logo'=>NULL,
            'wcu_header'=>'',
            'wcu_content'=> NULL
        ];
        $this->dispatchBrowserEvent('openModal','AddWCUModal');
    }
    public function save_add_wcu(){
        $this->access_role = [
            'C' => true,
            'R' => true,
            'U' => true,
            'D' => true
        ];

        if($this->access_role['C'] ){
            if(strlen($this->wcu['wcu_header'])<=0){
                return;
            }
            if(strlen($this->wcu['wcu_content'])<=0){
                return;
            }
            
            // validation

            // image
         
            if($this->wcu['wcu_logo'] && file_exists(storage_path().'/app/livewire-tmp/'.$this->wcu['wcu_logo']->getfilename())){
                $file_extension =$this->wcu['wcu_logo']->getClientOriginalExtension();
                $tmp_name = 'livewire-tmp/'.$this->wcu['wcu_logo']->getfilename();
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
                        while(DB::table('wcu')
                        ->where(['wcu_logo'=> $new_file_name])
                        ->first()){
                            $new_file_name = md5($tmp_name.rand(1,10000000)).'.'.$file_extension;
                        }
                        if(Storage::move($tmp_name, 'public/content/whychooseus/'.$new_file_name)){

                            // delete old img
                            $this->wcu['wcu_logo'] = $new_file_name;
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
            
            $current_order = DB::table('wcu')
                ->select(DB::raw('count(*) as current_order'))
                ->first();

            if(DB::table('wcu')
                ->insert([
                    'wcu_logo'=>$this->wcu['wcu_logo'],
                    'wcu_header' => $this->wcu['wcu_header'],
                    'wcu_content' => $this->wcu['wcu_content'],
                    'wcu_order' => ($current_order->current_order+1)
            ])){
                $this->dispatchBrowserEvent('swal:redirect',[
                    'position'          									=> 'center',
                    'icon'              									=> 'success',
                    'title'             									=> 'Successfully added!',
                    'showConfirmButton' 									=> 'true',
                    'timer'             									=> '1000',
                    'link'              									=> '#'
                ]);
                $this->wcu = [
                    'wcu_id'=> NULL,
                    'wcu_logo'=>NULL,
                    'wcu_header'=>'',
                    'wcu_content'=> NULL
                ];

                self::update_data();
                $this->dispatchBrowserEvent('openModal','AddWCUModal');
            }
        }
    }
    public function edit_wcu($wcu_id){
        $this->access_role = [
            'C' => true,
            'R' => true,
            'U' => true,
            'D' => true
        ];

        if($this->access_role['U'] ){
            $wcu = DB::table('wcu')
                ->where('wcu_id','=',$wcu_id)
                ->first();
            $this->wcu = [
                'wcu_id'=> $wcu->wcu_id,
                'wcu_logo'=>NULL,
                'wcu_header'=>$wcu->wcu_header,
                'wcu_content'=> $wcu->wcu_content
            ];
            $this->dispatchBrowserEvent('openModal','EditWCUModal');
        }
    }
    public function save_edit_wcu($wcu_id){
        $this->access_role = [
            'C' => true,
            'R' => true,
            'U' => true,
            'D' => true
        ];

        if($this->access_role['C'] ){
            if(strlen($this->wcu['wcu_header'])<=0){
                return;
            }
            if(strlen($this->wcu['wcu_content'])<=0){
                return;
            }
            
            $current =  DB::table('wcu')
            ->where('wcu_id','=',$wcu_id)
            ->first();
         
            if($this->wcu['wcu_logo'] && file_exists(storage_path().'/app/livewire-tmp/'.$this->wcu['wcu_logo']->getfilename())){
                $file_extension =$this->wcu['wcu_logo']->getClientOriginalExtension();
                $tmp_name = 'livewire-tmp/'.$this->wcu['wcu_logo']->getfilename();
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
                        while(DB::table('wcu')
                        ->where(['wcu_logo'=> $new_file_name])
                        ->first()){
                            $new_file_name = md5($tmp_name.rand(1,10000000)).'.'.$file_extension;
                        }
                        if(Storage::move($tmp_name, 'public/content/whychooseus/'.$new_file_name)){

                            // delete old img
                            $image_path = storage_path().'/app/public/content/whychooseus/'.$current->wcu_logo;;
                            if(file_exists($image_path)){
                                unlink($image_path);
                            }
                            $this->wcu['wcu_logo'] = $new_file_name;
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
                $this->wcu['wcu_logo'] = $current->wcu_logo;
            }
            if(DB::table('wcu')
                ->where('wcu_id','=',$wcu_id)
                ->update([
                    'wcu_logo'=>$this->wcu['wcu_logo'],
                    'wcu_header' => $this->wcu['wcu_header'],
                    'wcu_content' => $this->wcu['wcu_content'],
            ])){
                $this->dispatchBrowserEvent('swal:redirect',[
                    'position'          									=> 'center',
                    'icon'              									=> 'success',
                    'title'             									=> 'Successfully updated!',
                    'showConfirmButton' 									=> 'true',
                    'timer'             									=> '1000',
                    'link'              									=> '#'
                ]);
                $this->wcu = [
                    'wcu_id'=> NULL,
                    'wcu_logo'=>NULL,
                    'wcu_header'=>'',
                    'wcu_content'=> NULL
                ];

                self::update_data();
                $this->dispatchBrowserEvent('openModal','EditWCUModal');
            }
        }
    }
    public function delete_wcu($wcu_id){
        $current =  DB::table('wcu')
            ->where('wcu_id','=',$wcu_id)
            ->first();
        if( $current && 
            DB::table('wcu')
            ->where('wcu_id','=',$wcu_id)
            ->delete()
            ){

            $image_path = storage_path().'/app/public/content/whychooseus/'.$current->wcu_logo;;
            if(file_exists($image_path)){
                unlink($image_path);
            }
            $this->dispatchBrowserEvent('swal:redirect',[
                'position'          									=> 'center',
                'icon'              									=> 'success',
                'title'             									=> 'Successfully deleted!',
                'showConfirmButton' 									=> 'true',
                'timer'             									=> '1000',
                'link'              									=> '#'
            ]);

            self::update_data(); 
        }
    }
    public function move_up_wcu($wcu_order){
        // get up
        $current = DB::table('wcu')
        ->where('wcu_order','=',$wcu_order)
        ->first();
     
        if($up_data = DB::table('wcu')
            ->where('wcu_order','<',$current->wcu_order)
            ->orderBy('wcu_order','desc')
            ->first()){
            DB::table('wcu')
                ->where('wcu_id','=',$current->wcu_id)
                ->update(['wcu_order'=>$up_data->wcu_order]);

            DB::table('wcu')
                ->where('wcu_id','=',$up_data->wcu_id)
                ->update(['wcu_order'=>$current->wcu_order]);

            self::update_data();
        }
    }
    public function move_down_wcu($wcu_order){
        // get up
        $current = DB::table('wcu')
        ->where('wcu_order','=',$wcu_order)
        ->first();
        
        if($down_data = DB::table('wcu')
        ->where('wcu_order','>',$current->wcu_order)
        ->orderBy('wcu_order')
        ->first()){
            DB::table('wcu')
                ->where('wcu_id','=',$current->wcu_id)
                ->update(['wcu_order'=>$down_data->wcu_order]);

            DB::table('wcu')
                ->where('wcu_id','=',$down_data->wcu_id)
                ->update(['wcu_order'=>$current->wcu_order]);

            self::update_data();
        }
    }

    // faq
    public function add_faq(){
        $this->faq = [
            'faq_id'=> NULL,
            'faq_question'=>'',
            'faq_answer'=>'',
            'faq_order'=> NULL
        ];
        $this->dispatchBrowserEvent('openModal','AddFAQModal');
    }
    public function save_add_faq(){
        $this->access_role = [
            'C' => true,
            'R' => true,
            'U' => true,
            'D' => true
        ];

        if($this->access_role['C'] ){
            if(strlen($this->faq['faq_question'])<=0){
                return;
            }
            if(strlen($this->faq['faq_answer'])<=0){
                return;
            }

            $current_order = DB::table('faq as f')
            ->select(DB::raw('count(*) as current_order'))
            ->first();

            if(DB::table('faq')
                ->insert([
                'faq_id' => NULL,
                'faq_question' => $this->faq['faq_question'],
                'faq_answer' => $this->faq['faq_answer'],
                'faq_order' =>($current_order->current_order+1)
            ])){
                $this->dispatchBrowserEvent('swal:redirect',[
                    'position'          									=> 'center',
                    'icon'              									=> 'success',
                    'title'             									=> 'Successfully added!',
                    'showConfirmButton' 									=> 'true',
                    'timer'             									=> '1000',
                    'link'              									=> '#'
                ]);

                $this->faq = [
                    'faq_id'=> NULL,
                    'faq_question'=>'',
                    'faq_answer'=>'',
                    'faq_order'=> NULL
                ];

                self::update_data();
                $this->dispatchBrowserEvent('openModal','AddFAQModal');
            }
        }
    }
    public function edit_faq($faq_id){

        $this->access_role = [
            'C' => true,
            'R' => true,
            'U' => true,
            'D' => true
        ];

        if($this->access_role['U'] ){
            $this->faq = DB::table('faq as f')
                ->select('*')
                ->where('f.faq_id','=',$faq_id)
                ->first();

                
            $this->dispatchBrowserEvent('openModal','EditFAQModal');
            $this->faq = [
                'faq_id'=> $this->faq->faq_id,
                'faq_question'=>$this->faq->faq_question,
                'faq_answer'=>$this->faq->faq_answer,
                'faq_order'=> NULL
            ];
        }
    }
    public function save_edit_faq($faq_id){
        $this->access_role = [
            'C' => true,
            'R' => true,
            'U' => true,
            'D' => true
        ];

        if($this->access_role['U'] ){
          
            if(DB::table('faq as f')
                ->where('faq_id','=',$faq_id)
                ->update([
                    'faq_question' => $this->faq['faq_question'],
                    'faq_answer' => $this->faq['faq_answer']
            ])){
                $this->dispatchBrowserEvent('swal:redirect',[
                    'position'          									=> 'center',
                    'icon'              									=> 'success',
                    'title'             									=> 'Successfully saved!',
                    'showConfirmButton' 									=> 'true',
                    'timer'             									=> '1000',
                    'link'              									=> '#'
                ]);
            }

            $this->faq = [
                'faq_id'=> NULL,
                'faq_question'=>'',
                'faq_answer'=>'',
                'faq_order'=> NULL
            ];

            self::update_data();
            $this->dispatchBrowserEvent('openModal','EditFAQModal');
        }
    }
    public function delete_faq($faq_id){
        if(
            DB::table('faq')
            ->where('faq_id','=',$faq_id)
            ->delete()
            ){
            $this->dispatchBrowserEvent('swal:redirect',[
                'position'          									=> 'center',
                'icon'              									=> 'success',
                'title'             									=> 'Successfully deleted!',
                'showConfirmButton' 									=> 'true',
                'timer'             									=> '1000',
                'link'              									=> '#'
            ]);
            self::update_data(); 
        }
    }
    public function move_up_faq($faq_order){
        // get up
        $current = DB::table('faq')
        ->where('faq_order','=',$faq_order)
        ->first();
     
        if($up_data = DB::table('faq')
            ->where('faq_order','<',$current->faq_order)
            ->orderBy('faq_order','desc')
            ->first()){
            DB::table('faq')
                ->where('faq_id','=',$current->faq_id)
                ->update(['faq_order'=>$up_data->faq_order]);

            DB::table('faq')
                ->where('faq_id','=',$up_data->faq_id)
                ->update(['faq_order'=>$current->faq_order]);

            self::update_data();
        }
    }
    public function move_down_faq($faq_order){
        // get up
        $current = DB::table('faq')
        ->where('faq_order','=',$faq_order)
        ->first();
        
        if($down_data = DB::table('faq')
        ->where('faq_order','>',$current->faq_order)
        ->orderBy('faq_order')
        ->first()){
            DB::table('faq')
                ->where('faq_id','=',$current->faq_id)
                ->update(['faq_order'=>$down_data->faq_order]);

            DB::table('faq')
                ->where('faq_id','=',$down_data->faq_id)
                ->update(['faq_order'=>$current->faq_order]);

            self::update_data();
        }
    }
    
    // feature
    public function add_feature(){
        $this->feature = [
            'feature_id'=> NULL,
            'feature_header'=>NULL,
            'feature_content'=>NULL,
            'feature_button_name'=> NULL,
            'feature_link'=> NULL
        ];
        $this->dispatchBrowserEvent('openModal','AddFeatureModal');
    }
    public function save_add_feature(){
        $this->access_role = [
            'C' => true,
            'R' => true,
            'U' => true,
            'D' => true
        ];

        if($this->access_role['C'] ){
            if(strlen($this->feature['feature_header'])<=0){
                return;
            }
            if(strlen($this->feature['feature_content'])<=0){
                return;
            }
            if(strlen($this->feature['feature_button_name'])<=0){
                return;
            }
            if(strlen($this->feature['feature_link'])<=0){
                return;
            }

            $current_order = DB::table('features')
            ->select(DB::raw('count(*) as current_order'))
            ->first();

            if(DB::table('features')
                ->insert([
                'feature_id'=> NULL,
                'feature_header'=>$this->feature['feature_header'],
                'feature_content'=>$this->feature['feature_content'],
                'feature_button_name'=> $this->feature['feature_button_name'],
                'feature_link'=> $this->feature['feature_link'],
                'feature_order' =>($current_order->current_order+1)
                ])){
                $this->dispatchBrowserEvent('swal:redirect',[
                    'position'          									=> 'center',
                    'icon'              									=> 'success',
                    'title'             									=> 'Successfully added!',
                    'showConfirmButton' 									=> 'true',
                    'timer'             									=> '1000',
                    'link'              									=> '#'
                ]);
                self::update_data();
                $this->dispatchBrowserEvent('openModal','AddFeatureModal');
            }
        }
    }
    public function edit_feature($feature_id){
        
        $this->access_role = [
            'C' => true,
            'R' => true,
            'U' => true,
            'D' => true
        ];

        if($this->access_role['U'] ){
            $this->feature = DB::table('features as f')
                ->select('*')
                ->where('f.feature_id','=',$feature_id)
                ->first();
            
            $this->feature = [
                'feature_id'=> $this->feature->feature_id,
                'feature_header'=>$this->feature->feature_header,
                'feature_content'=>$this->feature->feature_content,
                'feature_button_name'=> $this->feature->feature_button_name,
                'feature_link'=> $this->feature->feature_link
            ];
            $this->dispatchBrowserEvent('openModal','EditFeatureModal');
        }
        
    }
    public function save_edit_feature($feature_id){
        
        $this->access_role = [
            'C' => true,
            'R' => true,
            'U' => true,
            'D' => true
        ];

        if($this->access_role['U'] ){
            if(strlen($this->feature['feature_header'])<=0){
                return;
            }
            if(strlen($this->feature['feature_content'])<=0){
                return;
            }
            if(strlen($this->feature['feature_button_name'])<=0){
                return;
            }
            if(strlen($this->feature['feature_link'])<=0){
                return;
            }

            $current_order = DB::table('features')
            ->select(DB::raw('count(*) as current_order'))
            ->first();

            if(DB::table('features as f')
                ->where('f.feature_id','=',$feature_id)
                ->update([
                'feature_header'=>$this->feature['feature_header'],
                'feature_content'=>$this->feature['feature_content'],
                'feature_button_name'=> $this->feature['feature_button_name'],
                'feature_link'=> $this->feature['feature_link']
                ])){
                $this->dispatchBrowserEvent('swal:redirect',[
                    'position'          									=> 'center',
                    'icon'              									=> 'success',
                    'title'             									=> 'Successfully updated!',
                    'showConfirmButton' 									=> 'true',
                    'timer'             									=> '1000',
                    'link'              									=> '#'
                ]);
                self::update_data();
                $this->dispatchBrowserEvent('openModal','EditFeatureModal');
            }
        }
    }
    public function delete_feature($feature_id){
        if(
            DB::table('features as f')
            ->where('f.feature_id','=',$feature_id)
            ->delete()
            ){
            $this->dispatchBrowserEvent('swal:redirect',[
                'position'          									=> 'center',
                'icon'              									=> 'success',
                'title'             									=> 'Successfully deleted!',
                'showConfirmButton' 									=> 'true',
                'timer'             									=> '1000',
                'link'              									=> '#'
            ]);

            self::update_data(); 
        }
    }
    public function move_up_feature($feature_order){
        // get up
        $current = DB::table('features')
        ->where('feature_order','=',$feature_order)
        ->first();
     
        if($up_data = DB::table('features')
            ->where('feature_order','<',$current->feature_order)
            ->orderBy('feature_order','desc')
            ->first()){
            DB::table('features')
                ->where('feature_id','=',$current->feature_id)
                ->update(['feature_order'=>$up_data->feature_order]);

            DB::table('features')
                ->where('feature_id','=',$up_data->feature_id)
                ->update(['feature_order'=>$current->feature_order]);

            self::update_data();
        }
    }
    public function move_down_feature($feature_order){
        // get up
        $current = DB::table('features')
        ->where('feature_order','=',$feature_order)
        ->first();
        
        if($down_data = DB::table('features')
        ->where('feature_order','>',$current->feature_order)
        ->orderBy('feature_order')
        ->first()){
            DB::table('features')
                ->where('feature_id','=',$current->feature_id)
                ->update(['feature_order'=>$down_data->feature_order]);

            DB::table('features')
                ->where('feature_id','=',$down_data->feature_id)
                ->update(['feature_order'=>$current->feature_order]);

            self::update_data();
        }
    }

    // footer

    // about us
        
    // cta

}
