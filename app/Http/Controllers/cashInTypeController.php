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
    
    
    
    public function edit() {
        
    }
    
    
    
    public function update() {
        
    }
    
    
    
    
    //end of cashInTypeController
}
