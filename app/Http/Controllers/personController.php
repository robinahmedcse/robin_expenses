<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use DB;
use Carbon\Carbon;
use App\Person;



class personController extends Controller
{

    protected function admin_dashboard_check() {

   
        session_start();
        $admin_id = Session::get('admin_id');
        $name = Session::get('name');
 
          if ($admin_id == NUll && $name == NULL) {
            redirect::to('/login-admin')->send();
        }
    }
 


    public function  person_add_form(){
    $this -> admin_dashboard_check();

    $person_info= view('supper_admin.loan.person.createPerson');
    return view('supper_admin.master')->with('x',$person_info);
    }


    public function person_save(Request $request){
     //   return $request->all();

     $this->validate($request, [
        'person_name' => 'required|min:4|max:50',
        'phone_number' => 'required|min:11|max:15',
        'address' => 'required',
    
    ]);

    $data = new Person;
    $data ->person_name =  $request ->person_name;
    $data ->person_phone_number =  $request ->phone_number;
    $data ->address =  $request ->address;
    $save = $data ->save();

      if($save){
          return redirect('/dashboard/loan/person/manage')
                          ->with('success','person Data Save succesfully'); 
       }else{
              return back()->with('fail','Try again later'); 
       }


    }



    public function person_manage(){
        $this -> admin_dashboard_check();
    

        $data = Person::all();


       $person_info= view('supper_admin.loan.person.managePerson') 
                     ->with('data',$data);

       return view('supper_admin.master')->with('x',$person_info);
        }

  

        public function edit_person($id){
            $data = Person::where("person_id" ,$id)->first();
                //  return $data;
          $person_info= view('supper_admin.loan.person.editPerson') 
                  ->with('data',$data);
         return view('supper_admin.master')->with('x',$person_info);
        }
    



    public function update_person(Request $request){
  //   return  $request->all();

        $this->validate($request, [
            'p_name' => 'required|min:4|max:50',
            'p_number' => 'required|min:11|max:15',
            'p_address' => 'required | min:4',
        
        ]);


        $id = $request ->person_id;
      
        $data = Person::find($id);
        
        $data->person_name =  $request->p_name;
        $data->person_phone_number =  $request->p_number;
        $data->address =  $request->p_address;
        $update = $data->save();

        if($update){  
             return redirect('/dashboard/loan/person/manage')
                       ->with('success','Person Data Update succesfully'); 
         }else{
             return back()->with('fail','Try again later'); 
         }
    }


  

    public function delete_person($id){ 
        $date = Person::find($id);
        $delete_data = $date->delete();
  
        if($delete_data){
          return back()->with('success','Person Delete succesfully'); 
          }else{
              return back()->with('fail','Try again later'); 
          }

    }


  






    // personController
}
