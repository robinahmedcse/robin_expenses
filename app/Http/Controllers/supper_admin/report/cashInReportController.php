<?php

namespace App\Http\Controllers\supper_admin\report;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use DB;

class cashInReportController extends Controller
{
   
    protected function admin_dashboard_check() {
        session_start();
        $admin_id = Session::get('admin_id');
        $name = Session::get('name');
 
          if ($admin_id == NUll && $name == NULL) {
            redirect::to('/login-admin')->send();
        }
    }


    public function cash_in_report_form(){
        $this->admin_dashboard_check();   
    
        $report_info= view('supper_admin.report.cash_in.report_form');
        
         return view('supper_admin.master')->with('x',$report_info);
    }
    


    public function cash_in_report_search(Request $request){
       // return $request->all();
  
      $s_date=  date('d-m-Y', strtotime($request->s_date));
      $start_day = date('y-d-m', strtotime($request->s_date)); 

      $e_date = date('d-m-Y', strtotime($request->e_date));
      $end_day = date('y-d-m', strtotime($request->e_date)); 
      
    //   echo $start_day; 
    //   echo"<br>";
    //   echo  $end_day;


      $cash_in_details = DB::table('cash_in')
                        ->join('cash_in_types', 'cash_in_types.cash_in_type_id', '=', 'cash_in.cash_in_type_id')
                        ->whereBetween('cash_in.created_at', [$start_day, $end_day])
                        ->select('cash_in_types.cash_in_type_name','cash_in.created_at','cash_in.cash_in_amount')
                        ->get();

//         echo '<pre>';
//        print_r ($cash_in_details);
//    exit();

      $report_info= view('supper_admin.report.cash_in.report_manage')
                   ->with('cash_in_details',$cash_in_details)
                   ->with ('s_date',$s_date)
                   ->with ('e_date',$e_date);

      return view('supper_admin.master')->with('x',$report_info);

    }




}
