<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use DB;

class dashboardController extends Controller
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
        
        
           $income= DB::table('cash_in')
                   ->sum('cash_in_amount');
           
           $spend = DB::table('daily_expences')
                   ->sum('daily_expences_total');
           

           $total=$income-$spend;
           
              $balance_info= view('supper_admin.home.homeContent')
                                 ->with('income',$income)
                                 ->with('spend',$spend)
                                 ->with('total',$total);
        
            return view('supper_admin.master')->with('x',$balance_info);
    }
    
    
       public function insdex() {
               $this->admin_dashboard_check();   
    
           
//       echo'<pre>';
//          print_r($income);
//       echo'<br>';
//          print_r($spend);
//       exit();
             
   
              $balance_info= view('supper_admin.balance.showBalance')
                                 ->with('income',$income)
                                 ->with('spend',$spend)
                                 ->with('total',$total);
           
            return view('supper_admin.master')->with('x',$balance_info);
  
    }
    


    
    
    
    
    
    
    
    public function adminLogOut(){
        Session::put('admin_id',NULL);
        Session::put('name',NULL);
        session()->flush();
        
        return redirect('/login-admin');;
    }


   // end of dashboardController
}
