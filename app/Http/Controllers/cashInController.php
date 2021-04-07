<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use DB;


class cashInController extends Controller
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
                
         $get_all_cash_in_info =DB::table('cash_in_types')->get();
         
          $cash_in_info= view('supper_admin.cashIn.createCashIn')
               ->with('get_all_cash_in_info',$get_all_cash_in_info);
           
            return view('supper_admin.master')->with('x',$cash_in_info);
          
    }
   
    
    
    
    public function store(Request $request) {
        
        $this->validate($request, [
            'cash_in_type_id' => 'required',
            'cash_in_amount' => 'required',
        
        ]);

     // return  $request->all();

      
        $data=array();
        $data['cash_in_type_id']= $request->cash_in_type_id;
        $data['cash_in_amount']= $request->cash_in_amount;
 
  
        DB::table('cash_in')->insert($data);
        return redirect::to('/dashboard/cash/in/manage')
                ->with('Save','Cash In Save Successfully'); ;
    }
    
    
    
       
    public function manage() {
               $this->admin_dashboard_check();         
        
           $get_all_cash_in_info = DB::table('cash_in')
            ->join('cash_in_types', 'cash_in.cash_in_type_id', '=', 'cash_in_types.cash_in_type_id')
            ->select('cash_in.*', 'cash_in_types.cash_in_type_name')
            ->get();
           
//       echo'<pre>';
//       print_r($get_all_cash_in_info);
//       exit();
             
       
       if($get_all_cash_in_info == null){
         return 'null';
       }
       else{
              $cash_in_info= view('supper_admin.cashIn.manageCashIn')
               ->with('get_all_cash_in_info',$get_all_cash_in_info);
           
            return view('supper_admin.master')->with('x',$cash_in_info);
       }
       
    
       
    }
    
    
    
    public function edit() {
        
    }
    
    
    
    public function update() {
        
    }
    
    
    
    //end of cashInController
}
