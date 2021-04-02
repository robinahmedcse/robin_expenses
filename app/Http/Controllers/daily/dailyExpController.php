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
   
   
      
      
      
      public function store(Request $request) {
/*
        $this->validate($request, [
            'category_id' => 'required',
            'item_id' => 'required',
            'quantity' => 'required',
            'price' => 'required',
        ]);
*/
//return $request->all();
      
        //   return $request->date;
        
       // $today = date('Y-m-d');
    
      $today = date('y-m-d', strtotime($request->date));
     //  echo $today;



    //   $today = Carbon::parse($date)->format('y-m-d');
      // return $today;

        
        $data= array();
        $data['date'] = $today;
        $data['expences_categoris_id' ] = $request->category_id;
        $data['expences_items_id']    = $request->item_id;
        $data['expences_items_quantity']   = $request->quantity;
        $data['daily_expences_item_price'] = $request->price;
        $data['daily_expences_total']  = $request->quantity*$request->price;
        
              DB::table('daily_expences')->insert($data);
       // return redirect::to('/dashboard/daily/exp/manage')
           //     ->with('Save','Daily Expenses Save Successfully'); ;
       
           



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
 
                   echo '<tr><td class="text-center">'.$i .'</td><td class="text-center">'.$exp->expences_categoris_name .'</td><td class="text-center">'.$exp->expences_items_name .'</td><td class="text-center">'.$exp->expences_items_quantity .'</td><td class="text-center">'.$exp->daily_expences_item_price .'</td><td class="text-center">'.$exp->daily_expences_total .'</td> <td class="text-center"> Action</td></tr>';
                   $i++; 
                    
                }

/*
                
             
               
             
 
             
                $i++; 

*/
    }

    
    
    
    
    
    
    
    public function store_ajax(Request $request) {
        
          
         return $request->all();
          
        $this->validate($request, [
            'category_id' => 'required',
            'item_id' => 'required',
            'item_quantity' => 'required',
            'item_unit_price' => 'required',
        ]);
        
        $today = date('Y-m-d');  
        
        $category_id = $request->category_id;
        $item_id= $request->item_id;
        $item_quantity = $request->item_quantity;
        $item_unit_price= $request->item_unit_price;
        
        
        for($count = 0; $count < count($category_id); $count++){
            $data= array(
                 'Date' => $today,
                 'expences_categoris_id' => $category_id[$count],
                 'expences_items_id' => $item_id[$count],
                 'expences_items_quantity' => $item_quantity[$count],
                 'daily_expences_item_price' => $item_unit_price[$count],
                 'daily_expences_total' => $item_unit_price[$count]*$item_quantity[$count],
  
            );
             DB::table('daily_expences')->insert($data);
        }
        
        
        
        
          
           return redirect::to('/dashboard/daily/exp/manage')
                ->with('Save','Daily Expenses Save Successfully');
        
        
        
      /// end of store  
    }
    
    
    public function manage(){
        
        
           $get_all_daily_exp_info = DB::table('daily_expences')
            ->join('expences_items', 'daily_expences.expences_items_id', '=', 'expences_items.expences_items_id')
            ->select('daily_expences.*', 'expences_items.expences_items_name')
            ->orderBy('daily_expences.daily_expences_id', 'DESC')
            ->get();
           
//       echo'<pre>';
//       print_r($get_all_daily_exp_info);
//       exit();
       
            if($get_all_daily_exp_info == null){
         return 'null';
       }
       else{
              $daily_info= view('supper_admin.exp.daily.manageDailyExp')
               ->with('get_all_daily_exp_info',$get_all_daily_exp_info);
           
            return view('supper_admin.master')->with('x',$daily_info);
       }
       
       
       
    }
    
    
    
    
    
    
    
    
    
    
// end of dailyExpController
}
