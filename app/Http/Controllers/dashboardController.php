<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use DB;
use Carbon\Carbon;

use App\Loan;

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
        
        
         $in_taka= DB::table('cash_in')
                   ->sum('cash_in_amount');
         
         $loan = DB::table('loans')
                ->where('loan_status', 'Un-paid')
                ->sum('loan_amount');
                 
         
         
         $income = $in_taka + $loan;
           
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
         $total_unpaid_loan_info = $this ->total_unpaid_loan_information();
         $total_paid_loan_info = $this ->total_paid_loan_information();


           
        $balance_info= view('supper_admin.home.homeContent')
                         ->with('income',$income)
                         ->with('spend',$spend)
                         ->with('total',$total)
                         ->with('yesterdayExpense',$yesterdayExpense)
                         ->with('savenDaysExpense',$savenDaysExpense)
                         ->with('fifteenDaysExpense',$fifteenDaysExpense)
                         ->with('thirtyDaysExpense',$thirtyDaysExpense)
                         ->with('total_loan_info',$total_loan_info)
                         ->with('total_unpaid_loan_info',$total_unpaid_loan_info)
                         ->with('total_paid_loan_info',$total_paid_loan_info);
        
            return view('supper_admin.master')->with('x',$balance_info);
    }
    



protected function yesterday_info(){
      //  $yesterday_date = date('d.m.Y',strtotime("-1 days"));

        $yesterday_date = date('Y.m.d',strtotime("-1 days"));
 //       Show yesterdays date
  //    echo $yesterday_date;
        // echo"<br>";

        $yesterdayExpense = DB::table('daily_expences')
                            ->where('date', $yesterday_date)
                         //  ->get();
                           ->sum('daily_expences_total');

  
        // echo $yesterdayExpense;
   //      exit();
        return $yesterdayExpense;
}





    
protected function seven_days_info(){
        $previous_week = strtotime("-1 week +1 day");
        
       $start_week = strtotime("last Friday midnight",$previous_week);
        //        echo $start_week;
        // echo"<br>";

       $end_week = strtotime("next Thursday",$start_week);
        //        echo $end_week;
        // echo"<br>";

        $start_week_f = date("Y-m-d",$start_week);
        // echo $start_week_f;
        // echo"<br>";

        $end_week_f = date("Y-m-d",$end_week); 
        // echo $end_week_f;
        // echo"<br>";
 
        $savenDaysExpense = DB::table('daily_expences')
                    ->whereBetween('date', [$start_week_f, $end_week_f])
                   // ->get();
                    ->sum('daily_expences_total');
 

        //  echo $savenDaysExpense;
        // exit();

    return $savenDaysExpense;

}


protected function fifteen_days_info(){
    
        $fifteen_day_pevious = date('Y-m-d',strtotime("-15 days"));
          //     echo $fifteen_day_pevious;
        // echo"<br>";

         $current_date = date("Y-m-d");
  
       //  echo $current_date;
       //  echo"<br>";


         $fifteenDaysExpense = DB::table('daily_expences')
                               ->whereBetween('date', [$fifteen_day_pevious, $current_date])
                                // ->get();
                              ->sum('daily_expences_total');
 
     //  echo $fifteenDaysExpense;
    //   exit();


    return $fifteenDaysExpense;
 

}


 


     
protected function thirty_days_info(){
  
        $thirty_day_pevious = date('Y-m-d', strtotime('today - 30 days'));
        // echo $thirty_day_pevious;
        // echo"<br>";

         $current_date = date("Y-m-d");
        //   echo $current_date;
        // echo"<br>";

         $thirtyDaysExpense = DB::table('daily_expences')
                              ->whereBetween('date', [$thirty_day_pevious, $current_date])
                                // ->get();
                              ->sum('daily_expences_total');

      //         echo $thirtyDaysExpense;
      // exit();

    return $thirtyDaysExpense;
 

}
    


    protected function total_loan_information(){

                $total_loan = DB::table('loans')
                                   ->sum('loan_amount');

                            return $total_loan;

    }
    
    
    
    protected function total_unpaid_loan_information(){
		
 
							$total_unpaid_loan = DB::table('loans')
                            ->where('loan_status' ,'Un-paid')
                            ->sum('loan_amount');
						

                            return $total_unpaid_loan;
 

 

    }
    
    
        protected function total_paid_loan_information(){

	 
							
						 
                $total_paid_loan = DB::table('loans')
                            ->where('loan_status' ,'Paid')
                            ->sum('loan_amount');

                            return $total_paid_loan;

    }




   


















    
    
    
    
    public function adminLogOut(){
        Session::put('admin_id',NULL);
        Session::put('name',NULL);
        session()->flush();
        
        return redirect('/login-admin');;
    }


   // end of dashboardController
}
