<?php

namespace App\Http\Controllers\daily;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use DB;


use Carbon\Carbon;


class dailyExpController extends Controller
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
        
    $get_all_category_info =DB::table('expences_categoris')->get();
    
    $get_all_category_info= view('supper_admin.exp.daily.createDailyEx')
               ->with('get_all_category_info',$get_all_category_info);     
        
        
         return view('supper_admin.master')->with('x',$get_all_category_info);
    }
    
    
   
    
      public function getItemName(Request $request) {
             //  return $request->all();
          $cat_id=$request->id;  
             $allItemInfo = DB::table('expences_items')
                 ->where('expences_categoris_id',$cat_id)
                 ->select('expences_items_id', 'expences_items_name')
                 ->get();
//         
//                    echo '<pre>';
//                    print_r($allItemInfo);
//                    exit();



        foreach ($allItemInfo as $key => $item) {
            echo '<option value="'.$item->expences_items_id .'">' . $item->expences_items_name .'</option>';
        }
          
      }
    
      



      public function getItemNames(Request $request) {
        return $request->all();
   
 }

 public function ref_check(Request $request) {
 // return $request->all();

  $reference=  $request->ref;
  if($reference == "null" || $reference == "Null" || $reference =="NULL" || $reference <= 0)
        return "Please Input valid information";
  }
  
   
 
      
      
      
      public function exp_store(Request $request) {
/*
        $this->validate($request, [
            'category_id' => 'required',
            'item_id' => 'required',
            'quantity' => 'required',
            'price' => 'required',
        ]);
*/
  //return $request->all();
      
       //  return $request->date;
        
       // $today = date('Y-m-d');
    
      $today = date('y-m-d', strtotime($request->date));
   //     return $today;



     // $today = Carbon::parse($request->date)->format('y-m-d');
   //   return $today;
        
        
        $data= array();
        $data['date'] = $today;
        $data['expences_categoris_id' ] = $request->category_id;
        $data['expences_items_id']    = $request->item_id;
        $data['expences_items_quantity']   = $request->quantity;
        $data['daily_expences_item_price'] = $request->amount;
        $data['daily_expences_total']  = $request->quantity*$request->amount;
        

      //  DB::table('daily_expences')->insert($data);
        $last_id = DB::table('daily_expences')->insertGetId($data);
      //   return  $last_id;

        $get_daily_expences_info = $this->available_date_check($last_id);

                //  echo '<pre>';
                // print_r($get_daily_expences_info);
                // exit();

            //    return $get_daily_expences_info;

        

    if($get_daily_expences_info == null){
            $data_one= array();
            $data_one['date'] = $today;
            $data_one['grand_total'] = $request->quantity*$request->amount;
            DB::table('daily_expences_total')->insert($data_one);
        }
        else{

            $sum_total = DB::table('daily_expences')
                ->where('date', $today)
                ->sum('daily_expences_total');

                // echo 'sum pf total';
                // echo '<pre>';
                // print_r($sum_total);
                // exit();



            $data_two['grand_total']=$sum_total;
                DB::table('daily_expences_total')
                        ->where('date',$today)
                        ->update($data_two);
                
        }



      

 
           $all_expen = DB::table('daily_expences')
                        ->join('expences_categoris', 'daily_expences.expences_categoris_id', '=', 'expences_categoris.expences_categoris_id')
                        ->join('expences_items', 'daily_expences.expences_items_id', '=', 'expences_items.expences_items_id')
                        ->select('daily_expences.*', 'expences_categoris.expences_categoris_name', 'expences_items.expences_items_name')
                        ->where('date', $today)
                        ->get();



                    //    return $all_expen ;
                 //   return response()->json($all_expen);
               
                 $i=1;
                 foreach ($all_expen as $key => $exp) {
                   echo '<tr><td class="text-center">'.$i .'</td> <td class="text-center">'.$exp->expences_items_name .'</td><td class="text-center">'.$exp->expences_items_quantity .'</td><td class="text-center">'.$exp->daily_expences_item_price .'</td><td class="text-center">'.$exp->daily_expences_total .'</td> <td class="text-center"> Action</td></tr>';
                   $i++; 
                    
                }

    }




    protected function available_date_check($id){

        $get_date_by_id = DB::table('daily_expences')
                    ->where('daily_expences_id', $id )
                    ->first();

              
                //    echo '<pre>';
                //    print_r($get_date_by_id);

                  $current_date= $get_date_by_id->date;
                //  echo $current_date;
          //      return $current_date;


                $get_date_by_date = DB::table('daily_expences_total')
                                 ->where('date',  $current_date )
                                 ->first();

                // echo '<pre>';
                // print_r($get_date_by_date);
                // exit();

                return $get_date_by_date;


       
    }



    
    public function exp_manage(){
        

      $this->admin_dashboard_check();
        /*
           $get_all_daily_exp_info = DB::table('daily_expences')
            ->join('expences_items', 'daily_expences.expences_items_id', '=', 'expences_items.expences_items_id')
            ->select('daily_expences.*', 'expences_items.expences_items_name')
            ->orderBy('daily_expences.daily_expences_id', 'DESC')
            ->get();
           
//       echo'<pre>';
//       print_r($get_all_daily_exp_info);
//       exit();
       

*/
$get_all_daily_exp_info = DB::table('daily_expences_total')
                    ->orderBy('daily_expences_total.daily_expences_total_id', 'DESC')
                    ->get();

    //    echo'<pre>';
    //   print_r($get_all_daily_exp_info);
    //   exit();
    $sum_total = DB::table('daily_expences')
                 ->sum('daily_expences_total');
 
              $daily_info= view('supper_admin.exp.daily.manageDailyExp')
                         ->with('sum_total',$sum_total)
                          ->with('get_all_daily_exp_info',$get_all_daily_exp_info);
           
            return view('supper_admin.master')->with('x',$daily_info);
    
       
       
    }
    
    




    public function exp_view_by_date($date){

        $get_all_daily_exp_info = DB::table('daily_expences')
                                ->where('date',  $date )
                                ->get();

          $sum_total = DB::table('daily_expences')
                        ->where('date', $date)
                        ->sum('daily_expences_total');

          $daily_info= view('supper_admin.exp.daily.manageDailyExpByDate')
                         ->with('sum_total',$sum_total)
                        ->with('get_all_daily_exp_info',$get_all_daily_exp_info);
           
            return view('supper_admin.master')->with('x',$daily_info);

    }
    
    
    
    
    
    
    
    
// end of dailyExpController
}
