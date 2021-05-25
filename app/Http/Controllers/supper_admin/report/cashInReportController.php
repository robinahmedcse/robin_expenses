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




/*
|--------------------------------------------------------------------------
|Date wise
|--------------------------------------------------------------------------
| 
|
*/




    public function cash_in_report_form(){
        $this->admin_dashboard_check();   
    
        $report_info= view('supper_admin.report.cash_in.date_wise.report_form');
        
         return view('supper_admin.master')->with('x',$report_info);
    }
    


    public function cash_in_report_search(Request $request){
       // return $request->all();
  
      $s_date=  date('d-m-Y', strtotime($request->s_date));
      $start_day = date('Y-m-d', strtotime($request->s_date)); 

      $e_date = date('d-m-Y', strtotime($request->e_date));
      $end_day = date('Y-m-d', strtotime($request->e_date)); 
      
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

      $report_info= view('supper_admin.report.cash_in.date_wise.report_manage')
                   ->with('cash_in_details',$cash_in_details)
                   ->with ('s_date',$s_date)
                   ->with ('e_date',$e_date);

      return view('supper_admin.master')->with('x',$report_info);

    }




/*
|--------------------------------------------------------------------------
|Category wise
|--------------------------------------------------------------------------
| 
|
*/




    public function category_wise_cash_in_report_form(){

      $this->admin_dashboard_check();   


      $get_all_cash_in_info = DB::table('cash_in_types')
                              ->where('cash_in_type_status','1')                                 
                              ->get();


      // echo '<pre>';
      // print_r($get_all_cash_in_info);
      // exit();
    
      $report_info  = view('supper_admin.report.cash_in.category_wise.report_form')
                      ->with('get_all_cash_in_info',$get_all_cash_in_info);;
      
       return view('supper_admin.master')->with('x',$report_info);

    }






    public function Category_wise_report_search_with_date(Request $request){
     //  return $request->all();

    $cash_in_type =   $request-> cash_in_type_id;
    $category_name  = DB::table('cash_in_types')
                        ->where ('cash_in_type_id', $cash_in_type)
                        ->select('cash_in_type_name')
                        ->first();


 
     $s_date=  date('d-m-Y', strtotime($request->s_date));
     $start_day = date('Y-m-d', strtotime($request->s_date)); 

     $e_date = date('d-m-Y', strtotime($request->e_date));
     $end_day = date('Y-m-d', strtotime($request->e_date)); 
     
    //  echo $start_day; 
    //  echo"<br>";
    //  echo  $end_day;


     $cash_in_details = DB::table('cash_in')
                       ->join('cash_in_types', 'cash_in_types.cash_in_type_id', '=', 'cash_in.cash_in_type_id')
                       ->whereBetween('cash_in.created_at', [$start_day, $end_day])
                       ->where ('cash_in.cash_in_type_id', $cash_in_type)
                       ->select('cash_in_types.cash_in_type_name','cash_in.created_at','cash_in.cash_in_amount')
                       ->get();

      //  echo '<pre>';
      //  print_r ($cash_in_details);
      //  exit();


 

     $report_info= view('supper_admin.report.cash_in.category_wise.report_manage_by_date')
                  ->with('cash_in_details',$cash_in_details)
                  ->with ('s_date',$s_date)
                  ->with ('e_date',$e_date)
                   ->with('category_name',$category_name);

     return view('supper_admin.master')->with('x',$report_info);




   }



   public function category_wise_report_search_without_date(Request $request){
   //   return $request->all();

   $cash_in_type =   $request-> cash_in_type_id;

   $category_name  = DB::table('cash_in_types')
                      ->where ('cash_in_type_id', $cash_in_type)
                      ->select('cash_in_type_name')
                      ->first();


  //                echo '<pre>';
  //      print_r ($category_name);
  //  exit();            


//return $cash_in_type;



$cash_in_details = DB::table('cash_in')
                  ->join('cash_in_types', 'cash_in_types.cash_in_type_id', '=', 'cash_in.cash_in_type_id')
                  ->where('cash_in.cash_in_type_id',$cash_in_type )
                  ->select('cash_in_types.cash_in_type_name','cash_in.created_at','cash_in.cash_in_amount')
                  ->get();



 



  //       echo '<pre>';
  //      print_r ($cash_in_details);
  //  exit();




  $report_info  = view('supper_admin.report.cash_in.category_wise.report_manage')
                ->with ('cash_in_details',$cash_in_details)
                ->with('category_name',$category_name);

   return view('supper_admin.master')->with('x',$report_info);




 }










  // end of   cashInReportController

}
