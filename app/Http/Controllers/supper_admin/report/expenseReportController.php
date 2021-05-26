<?php

namespace App\Http\Controllers\supper_admin\report;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use DB;

class expenseReportController extends Controller
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




    public function expense_report_form_date_wise(){
        $this->admin_dashboard_check();   
    
        $report_info= view('supper_admin.report.expense.date_wise.report_form');
        
         return view('supper_admin.master')->with('x',$report_info);
    }
    







    public function expense_report_search(Request $request){
      //  return $request->all();
  
      $s_date=  date('d-m-Y', strtotime($request->s_date));
      $start_day = date('Y-m-d', strtotime($request->s_date)); 

      $e_date = date('d-m-Y', strtotime($request->e_date));
      $end_day = date('Y-m-d', strtotime($request->e_date)); 
      
      // echo $start_day; 
      // echo"<br>";
      // echo  $end_day;
      // exit();


      $cash_in_details = DB::table('daily_expences')
                        ->join('expences_categoris', 'expences_categoris.expences_categoris_id', '=', 'daily_expences.expences_categoris_id')
                        ->join('expences_items', 'expences_items.expences_items_id', '=', 'daily_expences.expences_items_id')
                        ->whereBetween('daily_expences.date', [$start_day, $end_day])
                        ->select('expences_categoris.expences_categoris_name' ,'expences_items.expences_items_name',
                                   'daily_expences.date',  'daily_expences.expences_items_quantity',  'daily_expences.daily_expences_item_price',  'daily_expences.daily_expences_total')
                        ->get();

      // echo '<pre>';
      // print_r ($cash_in_details);
      // exit();

      $report_info= view('supper_admin.report.expense.date_wise.report_manage')
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




    public function expense_report_form_category_date_wise(){

      $this->admin_dashboard_check();   


      $get_all_category_in_info = DB::table('expences_categoris')
                              ->where('expences_categoris_status','1')  
                              ->select('expences_categoris_name','expences_categoris_id')                               
                              ->get();


      // echo '<pre>';
      // print_r($get_all_category_in_info);
      // exit();
    
      $report_info  = view('supper_admin.report.expense.category_wise.report_form')
                      ->with('get_all_category_in_info',$get_all_category_in_info);;
      
       return view('supper_admin.master')->with('x',$report_info);

    }






    public function Category_wise_report_search_with_date(Request $request){
     //   return $request->all();

  
     $exp_category_id =   $request-> exp_category_id;
     // return $exp_category_id;
    
     $category_name = DB::table('expences_categoris')
                      ->where('expences_categoris_id',$exp_category_id)  
                      ->select('expences_categoris_name')                               
                      ->first();
    
    
                      // echo '<pre>';
                      // print_r ($category_name);
                      //  exit();


 
     $s_date=  date('d-m-Y', strtotime($request->s_date));
     $start_day = date('Y-m-d', strtotime($request->s_date)); 

     $e_date = date('d-m-Y', strtotime($request->e_date));
     $end_day = date('Y-m-d', strtotime($request->e_date)); 
     
    //  echo $start_day; 
    //  echo"<br>";
    //  echo  $end_day;


     $cash_in_details = DB::table('daily_expences')
                       ->join('expences_categoris', 'expences_categoris.expences_categoris_id', '=', 'daily_expences.expences_categoris_id')
                       ->join('expences_items', 'expences_items.expences_items_id', '=', 'daily_expences.expences_items_id')
                       ->whereBetween('daily_expences.date', [$start_day, $end_day])
                       ->where('daily_expences.expences_categoris_id', $exp_category_id )
                       ->select('expences_categoris.expences_categoris_name' ,'expences_items.expences_items_name',
                                 'daily_expences.date',  'daily_expences.expences_items_quantity',  'daily_expences.daily_expences_item_price',  'daily_expences.daily_expences_total')
                       ->get();
                     

      //  echo '<pre>';
      //  print_r ($cash_in_details);
      //  exit();


 

       $expences_total=0;    

       foreach($cash_in_details as $daily_info){                      
         $expences_total  = $expences_total+ $daily_info->daily_expences_total;                                     
       }
 
 
 
 
 
   $report_info  = view('supper_admin.report.expense.category_wise.report_manage_by_date')
                   ->with ('cash_in_details',$cash_in_details)
                   ->with ('category_name',$category_name)
                   ->with ('expences_total',$expences_total)
                   ->with ('s_date',$s_date) 
                   ->with ('e_date',$e_date);

     return view('supper_admin.master')->with('x',$report_info);




   }



   public function category_wise_report_search_without_date(Request $request){
   //   return $request->all();

   $exp_category_id =   $request-> exp_category_id;
 //return $exp_category_id;

 $category_name = DB::table('expences_categoris')
                  ->where('expences_categoris_id',$exp_category_id)  
                  ->select('expences_categoris_name')                               
                  ->first();


                  // echo '<pre>';
                  // print_r ($category_name);
                  //  exit();


$cash_in_details = DB::table('daily_expences')
                  ->join('expences_categoris', 'expences_categoris.expences_categoris_id', '=', 'daily_expences.expences_categoris_id')
                  ->join('expences_items', 'expences_items.expences_items_id', '=', 'daily_expences.expences_items_id')
                  ->where('daily_expences.expences_categoris_id', $exp_category_id )
                  ->select('expences_categoris.expences_categoris_name' ,'expences_items.expences_items_name',
                            'daily_expences.date',  'daily_expences.expences_items_quantity',  'daily_expences.daily_expences_item_price',  'daily_expences.daily_expences_total')
                  ->get();


      //  echo '<pre>';
      //  print_r ($cash_in_details);
      //   exit();


      $expences_total=0;    

      foreach($cash_in_details as $daily_info){                      
        $expences_total  = $expences_total+ $daily_info->daily_expences_total;                                     
      }





  $report_info  = view('supper_admin.report.expense.category_wise.report_manage_by_category')
                  ->with ('cash_in_details',$cash_in_details)
                  ->with ('category_name',$category_name)
                  ->with ('expences_total',$expences_total) ;
             

   return view('supper_admin.master')->with('x',$report_info);




 }










  // end of   expenseReportController

}
