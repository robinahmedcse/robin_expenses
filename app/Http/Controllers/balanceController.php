<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use DB;

class balanceController extends Controller
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
    
    
    public function reportPerDay() {
        
        
        
          $all_date= DB::table('daily_expences')
                  ->select ('Date')
                  ->get();
        
          $balance_info= view('supper_admin.report.perDay') 
                  ->with('all_date',$all_date);
        return view('supper_admin.master')->with('x',$balance_info);
    }
    
   
    
    
    
    
    
    
    
     public function getDate(Request $request) {
     // return $request ->  all();
                $date=$request->date;  
//             $allItemInfo = DB::table('daily_expences')
//                 ->where('Date',$date)
//                 ->select('*')
//                 ->get();
           
         
            $allItemInfo = DB::table('daily_expences')
            ->join('expences_items', 'daily_expences.expences_items_id', '=', 'expences_items.expences_items_id')
            ->where('Date',$date)
         ->select('expences_items.expences_items_name', 'daily_expences.*')
             ->get();  

          //  return $allItemInfo;
        $spend=0;
        foreach ($allItemInfo as $key => $item) {
          //  echo '<option value="'.$item->expences_items_id .'">' . $item->expences_items_name .'</option>';
             echo '     <tr> <th>'.$item->Date .'</th> <th>'.$item->expences_items_name .'</th> <th>'.$item->expences_items_quantity .'</th> <th> '.$item->daily_expences_item_price .'</th>  <th>'.$item->daily_expences_total .' </th> <tr> ';
              
              $total= $item->daily_expences_total;
              $spend = $spend+$total;
             }
       
        
        echo '<tr> <td colspan="4">Day Total</td> <td>'.$spend.' BDT</td> </tr> ';
        
      
        
    }
    
    
  

          
   
  
                          
    
    
    
    
    
    
    
    //
}
