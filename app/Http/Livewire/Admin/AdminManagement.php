<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class AdminManagement extends Component
{ 
    public $user_detais;
    public $title;

    public $active= 'admin_management';
    public $admin_data;
    public $user_data;


    public $modules;
    public $roles_data;
    public $access_roles;
    public $access_role_name;
    public $access_role_description;
    public $role_name_details;
    public $view_access_role;
    public $edit_access_role;


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

            $this->admin_data = DB::table('users as u')
            ->select(
                '*'
                )
            ->join('user_status as us', 'us.user_status_id', '=', 'u.user_status_id')
            ->join('user_roles as ur', 'ur.user_role_id', '=', 'u.user_role_id')
            // ->where('user_id','!=', $this->user_details['user_id'])
            ->where('user_role_details','=', 'admin')
            ->get()
            ->toArray();

            $this->user_data = DB::table('users as u')
            ->select(
                '*'
                )
            ->join('user_status as us', 'us.user_status_id', '=', 'u.user_status_id')
            ->join('user_roles as ur', 'ur.user_role_id', '=', 'u.user_role_id')
            // ->where('user_id','!=', $this->user_details['user_id'])
            ->where('user_role_details','=', 'student')
            ->get()
            ->toArray();

            $this->modules = DB::table('modules as m')
            ->select('*')
            ->orderBy('module_number')
            ->get()
            ->toArray();
           
            $this->roles_data = DB::table('admin_role_names as arn')
                ->get()
                ->toArray();
        }
    }

    public function mount(Request $request){
        $this->user_details = $request->session()->all();
        $this->title = 'admin-management';

        

        $this->admin_data_filter = [
            '#' => true,
            'Username' => true,
            'Full name' => true,
            'Email' => true,
            'CP#' => true,
            'Active' => false,
            'Verified' => true,
            'Action' => true
        ];

        $this->user_data_filter = [
            '#' => true,
            'Username' => true,
            'Full name' => true,
            'Email' => true,
            'CP#' => true,
            'Active' => false,
            'Verified' => true,
            'Action' => true
        ];

        $this->roles_data_filter = [
            '#' => true,
            'Role Name' => true,
            'Description' => true,
            'Action' => true
        ];

        $this->access_role = [
            'C' => true,
            'R' => true,
            'U' => true,
            'D' => true
        ];

        if($this->access_role['C'] || $this->access_role['R'] || $this->access_role['U'] || $this->access_role['D']){

            $this->admin_data = DB::table('users as u')
            ->select(
                '*'
                )
            ->join('user_status as us', 'us.user_status_id', '=', 'u.user_status_id')
            ->join('user_roles as ur', 'ur.user_role_id', '=', 'u.user_role_id')
            // ->where('user_id','!=', $this->user_details['user_id'])
            ->where('user_role_details','=', 'admin')
            ->get()
            ->toArray();

            $this->user_data = DB::table('users as u')
            ->select(
                '*'
                )
            ->join('user_status as us', 'us.user_status_id', '=', 'u.user_status_id')
            ->join('user_roles as ur', 'ur.user_role_id', '=', 'u.user_role_id')
            // ->where('user_id','!=', $this->user_details['user_id'])
            ->where('user_role_details','=', 'student')
            ->get()
            ->toArray();

            $this->modules = DB::table('modules as m')
            ->select('*')
            ->orderBy('module_number')
            ->get()
            ->toArray();

            $this->roles_data = DB::table('admin_role_names as arn')
                ->get()
                ->toArray();


        }

    }

    public function render(){
        return view('livewire.admin.admin-management',[
            'user_details' => $this->user_details
            ])
            ->layout('layouts.admin',[
                'title'=>$this->title]);
    }

    public function admin_data_filterView(){
        $this->dispatchBrowserEvent('swal:redirect',[
            'position'          									=> 'center',
            'icon'              									=> 'success',
            'title'             									=> 'Successfully changed filter!',
            'showConfirmButton' 									=> 'true',
            'timer'             									=> '1000',
            'link'              									=> '#'
        ]);
    }

    public function user_data_filterView(){
        $this->dispatchBrowserEvent('swal:redirect',[
            'position'          									=> 'center',
            'icon'              									=> 'success',
            'title'             									=> 'Successfully changed filter!',
            'showConfirmButton' 									=> 'true',
            'timer'             									=> '1000',
            'link'              									=> '#'
        ]);
    }


    public function active_page($active){
        $this->active = $active;
    }

    public function view_admin($user_id){
        dd('view');
    }

    public function edit_admin($user_id){
        dd('edit');
    }

    public function delete_admin($user_id){
        dd('delete');
    }


    // role management

    public function new_role(){

        $this->access_role = [
            'C' => true,
            'R' => true,
            'U' => true,
            'D' => true
        ];

        if($this->access_role['U'] ){
            $this->access_roles = [];
            foreach ($this->modules as $key => $value) {
                array_push($this->access_roles,[
                    'C'=>false,
                    'R'=>false,
                    'U'=>false,
                    'D'=>false
                ]);
            }
            $this->roles_data = DB::table('admin_role_names as arn')
                ->get()
                ->toArray();

            $this->dispatchBrowserEvent('openModal','AddRoleModal');
            
        }
    }

    public function role_all_crud($index){
        $this->access_role = [
            'C' => true,
            'R' => true,
            'U' => true,
            'D' => true
        ];
        
        if($this->access_role['U'] ){
            foreach ($this->access_roles as $key => $value) {
                if($key == $index){
                    $value['C'] = true;
                    $value['R'] = true;
                    $value['U'] = true;
                    $value['D'] = true;
                }
            }
        }
    }

    public function add_new_role(){
        $this->access_role = [
            'C' => true,
            'R' => true,
            'U' => true,
            'D' => true
        ];
        
        if($this->access_role['U'] ){

            if(DB::table('admin_role_names')
                ->where('admin_role_name_name','=',$this->access_role_name)
                ->get()
                ->first()){
                    $this->dispatchBrowserEvent('swal:remove_backdrop',[
                        'position'          									=> 'center',
                        'title'             									=> 'Role name exist!',
                        'showConfirmButton' 									=> 'true',
                        'timer'             									=> '1000',
                        'link'              									=> '#'
                    ]);
                    return;
            }else{
                DB::table('admin_role_names')->insert([
                    'admin_role_name_name' => $this->access_role_name,
                    'admin_role_name_details' =>$this->access_role_description,
                ]);

                $role_name_details =DB::table('admin_role_names')
                ->where('admin_role_name_name','=',$this->access_role_name)
                ->get()
                ->first();
                $role_name_id = $role_name_details->admin_role_name_id;

                foreach ($this->modules as $key => $value) {
                    DB::table('admin_roles')->insert([
                        'access_role_name_id' => $role_name_id ,
                        'access_role_module_id' => $value->module_id,
                        'access_role_create' => $this->access_roles[$key]['C'] ,
                        'access_role_read' => $this->access_roles[$key]['R'],
                        'access_role_update' => $this->access_roles[$key]['U'],
                        'access_role_delete' => $this->access_roles[$key]['D'],
                    ]);
                }
            }

            $this->dispatchBrowserEvent('swal:remove_backdrop',[
                'position'          									=> 'center',
                'icon'                                                  => 'success',
                'title'             									=> 'Successfully added a new role!',
                'showConfirmButton' 									=> 'true',
                'timer'             									=> '1000',
                'link'              									=> '#'
            ]);
            $this->access_role_name = null;
            $this->access_role_description = null;

            $this->roles_data = DB::table('admin_role_names as arn')
                ->get()
                ->toArray();
        }
    }

    public function view_role($admin_role_name_id){
        $this->access_role = [
            'C' => true,
            'R' => true,
            'U' => true,
            'D' => true
        ];
        
        if($this->access_role['U'] ){
            $this->role_name_details = DB::table('admin_role_names as arn')
                ->where('admin_role_name_id','=',$admin_role_name_id)
                ->get()
                ->toArray();
            $roles_data = DB::table('admin_roles as ar')
                ->where('access_role_name_id','=',$admin_role_name_id)
                ->get()
                ->toArray();
            
            $this->view_access_role = [];
            foreach ($roles_data as $key => $value) {
                array_push($this->view_access_role,[
                    'access_role_module_id' =>$value->access_role_module_id,
                    'C'=>$value->access_role_create,
                    'R'=>$value->access_role_create,
                    'U'=>$value->access_role_update,
                    'D'=>$value->access_role_delete
                ]);
            }

            $this->dispatchBrowserEvent('openModal','ViewRoleModal');
        }
    }

    public function edit_role($admin_role_name_id){
        $this->access_role = [
            'C' => true,
            'R' => true,
            'U' => true,
            'D' => true
        ];
        
        if($this->access_role['U'] ){

            $this->role_name_details = DB::table('admin_role_names as arn')
            ->where('admin_role_name_id','=',$admin_role_name_id)
            ->get()
            ->toArray();
            $roles_data = DB::table('admin_roles as ar')
            ->where('access_role_name_id','=',$admin_role_name_id)
            ->get()
            ->toArray();
            
            $this->edit_access_role = [];
            foreach ($roles_data as $key => $value) {
                array_push($this->edit_access_role,[
                    'access_role_id' =>$value->access_role_id,
                    'access_role_module_id' =>$value->access_role_module_id,
                    'C'=>$value->access_role_create,
                    'R'=>$value->access_role_create,
                    'U'=>$value->access_role_update,
                    'D'=>$value->access_role_delete
                ]);
            }
            $this->dispatchBrowserEvent('openModal','EditRoleModal');
            
        }
    }

    public function edit_selected_role(){
        $this->access_role = [
            'C' => true,
            'R' => true,
            'U' => true,
            'D' => true
        ];
        if($this->access_role['U'] ){
            if(DB::table('admin_role_names')
                ->where('admin_role_name_name','=',$this->role_name_details[0]['admin_role_name_name'])
                ->where('admin_role_name_id','!=', $this->role_name_details[0]['admin_role_name_id'])
                ->get()
                ->first()){
                    $this->dispatchBrowserEvent('swal:remove_backdrop',[
                        'position'          									=> 'center',
                        'title'             									=> 'Role name exist!',
                        'showConfirmButton' 									=> 'true',
                        'timer'             									=> '1000',
                        'link'              									=> '#'
                    ]);
                    return;
            }else{
                DB::table('admin_role_names')
                    ->where(['admin_role_name_id'=> $this->role_name_details[0]['admin_role_name_id']])
                    ->update([
                    'admin_role_name_name'=> $this->role_name_details[0]['admin_role_name_name'],
                    'admin_role_name_details'=> $this->role_name_details[0]['admin_role_name_details']
                ]);
                foreach ($this->edit_access_role as $key => $value) {
                    DB::table('admin_roles')
                        ->where(['access_role_id'=> $value['access_role_id']])
                        ->update([
                            'access_role_create'=> $value['C'],
                            'access_role_read'=> $value['R'],
                            'access_role_update'=> $value['U'],
                            'access_role_delete'=> $value['D']
                        ]);
                }
            }
            
            $this->roles_data = DB::table('admin_role_names as arn')
                ->get()
                ->toArray();
                
            $this->dispatchBrowserEvent('swal:remove_backdrop',[
                'position'          									=> 'center',
                'icon'                                                  => 'success',
                'title'             									=> 'Successfully updated the role!',
                'showConfirmButton' 									=> 'true',
                'timer'             									=> '1000',
                'link'              									=> '#'
            ]);
            
        }
    }
    public function delete_role($admin_role_name_id){

        $this->role_name_details = DB::table('admin_role_names as arn')
            ->where('admin_role_name_id','=',$admin_role_name_id)
            ->get()
            ->toArray();
        $roles_data = DB::table('admin_roles as ar')
            ->where('access_role_name_id','=',$admin_role_name_id)
            ->get()
            ->toArray();
        DB::table('admin_role_names')->where('admin_role_name_id', $this->role_name_details[0]->admin_role_name_id)->delete();

        foreach ($roles_data as $key => $value) {
            DB::table('admin_roles')->where('access_role_id',$value->access_role_id )->delete();
        }

        $this->roles_data = DB::table('admin_role_names as arn')
            ->get()
            ->toArray();

        $this->dispatchBrowserEvent('swal:remove_backdrop',[
            'position'          									=> 'center',
            'icon'                                                  => 'success',
            'title'             									=> 'Successfully deleted role!',
            'showConfirmButton' 									=> 'true',
            'timer'             									=> '1000',
            'link'              									=> '#'
        ]);
        
    }


    
}
