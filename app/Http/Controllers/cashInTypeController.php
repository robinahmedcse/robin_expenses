<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use DB;

class cashInTypeController extends Controller
{
    
      protected function admin_dashboard_check() {
        session_start();
        $admin_id = Session::get('admin_id');
        $name = Session::get('name');
 
          if ($admin_id == NUll && $name == NULL) {
            redirect::to('/login-admin')->send();
        }
    }
    
   
   
        public function index() {
                $this->admin_dashboard_check();    
  return view("supper_admin.cashInType.createCashInType");
    }
   
    
    
    
    public function store(Request $request) {
 
        $this->validate($request, [
            'cash_in_type_name' => 'required',
            'cash_in_description' => 'required',
            'cash_in_type_status' => 'required',
        ]);

        $status = $request->cash_in_type_status;

        if($status == 'null' || $status == 'Null' || $status == 'NULL' ){
          return back()->with('fail','Please Select Status');
        }else{
          $data=array();
          $data['cash_in_type_name']= $request->cash_in_type_name;
          $data['cash_in_description']= $request->cash_in_description;
          $data['cash_in_type_status']= $request->cash_in_type_status;
    
          DB::table('cash_in_types')->insert($data);
          return redirect::to('/dashboard/cash/in/type/manage')
                  ->with('Save','Cash In Type Save Successfully'); ;
        }

      
       
      
      

    }
    
    
    
       
    public function manage() {
               $this->admin_dashboard_check();   
               
           $get_all_cash_in_info =DB::table('cash_in_types')
                              ->orderBy('cash_in_type_id', 'DESC')
                            ->get();
 
       
//       echo'<pre>';
//       print_r($get_all_cash_in_info);
//       exit();
//             
       
       if($get_all_cash_in_info == null){
         return 'null';
       }
       else{
              $cash_in_info= view('supper_admin.cashInType.manageCashInType')
               ->with('get_all_cash_in_info',$get_all_cash_in_info);
           
            return view('supper_admin.master')->with('x',$cash_in_info);
       }
       
    
       
    }
    
    
    
    public function edit($id) {
       // return $id ;

        $get_cash_in_info_by_id = DB::table('cash_in_types')
                                  ->where('cash_in_type_id', $id)
                                  ->first();


        // echo"<pre>";
        // print_r($get_cash_in_info_by_id);
        // exit();    
        
        
       
        $cash_in_info= view('supper_admin.cashInType.editCashInType')
        ->with('get_cash_in_info_by_id',$get_cash_in_info_by_id);
    
     return view('supper_admin.master')->with('x',$cash_in_info);
 


    }
    
    
    
    public function update(Request $request) {
     // return $request ;


        $cash_in_id = $request->cash_in_id;
        
        $this->validate($request, [
            'cash_in_type_name' => 'required',
            'cash_in_description' => 'required',
            'cash_in_type_status'=> 'required'
        ]);



        $data=array();
        $data['cash_in_type_name']= $request->cash_in_type_name;
        $data['cash_in_description']= $request->cash_in_description;
        $data['cash_in_type_status']= $request->cash_in_type_status;



        $update = DB::table('cash_in_types')
                  ->where('cash_in_type_id',$cash_in_id)
                  ->update($data);

        if($update){

              return redirect::to('/dashboard/cash/in/type/manage')
                              ->with('Save','Cash In Type Update Successfully'); 
        }else{
          return back()->with('fail','Faild to update. Problem in input field');
        }
 



    }
    
        
    public function delete($id) {
     // return    $id;
         
$find = DB::table('cash_in')
      ->where('cash_in_type_id',$id)
      ->first();
   //  ->get();

     /// echo"<pre>";
    //  print_r($find );
      

      if($find){
        // echo"Ache";

        return back()->with('fail','This type use in Csah In part and have some Data');
      }
      else{
        
        
      //  echo "nai";

        $delete = DB::table('cash_in_types')
        ->where('cash_in_type_id',$id)
        ->delete();
  
                  if($delete){

                    return redirect::to('/dashboard/cash/in/type/manage')
                                    ->with('Save','Cash In Type Delete Successfully'); 
              }else{

                  return back()->with('fail','Faild to Delete');

                }

      
      }




      exit();
 



 
 


    }
    
    
    
    //end of cashInTypeController
}
