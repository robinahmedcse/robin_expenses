<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use DB;
use Carbon\Carbon;

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


         //  expense
         $yesterdayExpense =  $this->yesterday_info();
         $savenDaysExpense =  $this->seven_days_info();
         $fifteenDaysExpense =  $this->fifteen_days_info();
         $thirtyDaysExpense =  $this->thirty_days_info();



         //  loan     
         $total_loan_info = $this ->total_loan_information();
 


           
        $balance_info= view('supper_admin.home.homeContent')
                         ->with('income',$income)
                         ->with('spend',$spend)
                         ->with('total',$total)
                         ->with('yesterdayExpense',$yesterdayExpense)
                         ->with('savenDaysExpense',$savenDaysExpense)
                         ->with('fifteenDaysExpense',$fifteenDaysExpense)
                         ->with('thirtyDaysExpense',$thirtyDaysExpense)
                         ->with('total_loan_info',$total_loan_info);
        
            return view('supper_admin.master')->with('x',$balance_info);
    }
    



protected function yesterday_info(){
      //  $yesterday_date = date('d.m.Y',strtotime("-1 days"));

        $yesterday_date = date('y.d.m',strtotime("-1 days"));
        // Show yesterdays date
        // echo $yesterday_date;
        // echo"<br>";

        $yesterdayExpense = DB::table('daily_expences')
                            ->where('date', $yesterday_date)
                          // ->get();
                           ->sum('daily_expences_total');

  
        // echo $yesterdayExpense;
        //exit();
        return $yesterdayExpense;
}





    
protected function seven_days_info(){
        $previous_week = strtotime("-1 week +1 day");
        
       $start_week = strtotime("last Thursday midnight",$previous_week);
       $end_week = strtotime("next Wednesday",$start_week);

        $start_week = date("Y-d-m",$start_week);
 
        $end_week = date("Y-d-m",$end_week); 
 
        $savenDaysExpense = DB::table('daily_expences')
                    ->whereBetween('date', [$start_week, $end_week])
                   // ->get();
                    ->sum('daily_expences_total');
 
    return $savenDaysExpense;

}


protected function fifteen_days_info(){
    
        $fifteen_day_pevious = date('y-d-m',strtotime("-15 days"));

         $current_date = date("Y-d-m");
  
         $fifteenDaysExpense = DB::table('daily_expences')
                               ->whereBetween('date', [$fifteen_day_pevious, $current_date])
                                // ->get();
                              ->sum('daily_expences_total');
 
    return $fifteenDaysExpense;
 

}


 


     
protected function thirty_days_info(){
  
        $thirty_day_pevious = date('Y-m-d', strtotime('today - 30 days'));;
         $current_date = date("Y-d-m");
  

         $thirtyDaysExpense = DB::table('daily_expences')
                              ->whereBetween('date', [$thirty_day_pevious, $current_date])
                                // ->get();
                              ->sum('daily_expences_total');

    return $thirtyDaysExpense;
 

}
    


    
    
    protected function total_loan_information(){

                $total_loan = DB::table('cash_in')
                            ->join('cash_in_types', 'cash_in_types.cash_in_type_id' , '=', 'cash_in.cash_in_type_id')
                            ->where('cash_in_type_name' ,'Loan')
                           // ->get();
                           ->sum('cash_in_amount');

                            return $total_loan;

    }




   


















    
    
    
    
    public function adminLogOut(){
        Session::put('admin_id',NULL);
        Session::put('name',NULL);
        session()->flush();
        
        return redirect('/login-admin');;
    }


   // end of dashboardController
}
