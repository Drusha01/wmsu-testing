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

    public $services_filter;
    public $services_data;



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

            $this->carousel_data = DB::table('carousel as c')
                ->select('*')
                ->orderBy('carousel_order')
                ->get()
                ->toArray();

            $this->services_data = DB::table('services as c')
                ->select('*')
                ->orderBy('services_order')
                ->get()
                ->toArray();
                // dd($this->services_data);
        }
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

        $this->access_role = [
            'C' => true,
            'R' => true,
            'U' => true,
            'D' => true
        ];

        if($this->access_role['C'] || $this->access_role['R'] || $this->access_role['U'] || $this->access_role['D']){

            $this->carousel_data = DB::table('carousel as c')
                ->select('*')
                ->orderBy('carousel_order')
                ->get()
                ->toArray();

            $this->services_data = DB::table('services as c')
                ->select('*')
                ->orderBy('services_order')
                ->get()
                ->toArray();
                // dd($this->services_data);
        }
    }
    public function render()
    {
        return view('livewire.admin.settings',[
            'user_details' => $this->user_details
            ])
            ->layout('layouts.admin',[
                'title'=>$this->title]);
    }

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

        if($this->access_role['U'] ){
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
        $this->dispatchBrowserEvent('swal:redirect',[
            'position'          									=> 'center',
            'icon'              									=> 'success',
            'title'             									=> 'Successfully deleted carousel!',
            'showConfirmButton' 									=> 'true',
            'timer'             									=> '1000',
            'link'              									=> '#'
        ]);

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
}
