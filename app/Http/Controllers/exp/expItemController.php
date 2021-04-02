<?php

namespace App\Http\Controllers\exp;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use DB;

class expItemController extends Controller
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
         
          $category_info= view('supper_admin.exp.exp_item.createItem')
               ->with('get_all_category_info',$get_all_category_info);        
                
                    return view('supper_admin.master')->with('x',$category_info);
    }
   
    
        
    public function store(Request $request) {
        
       // return $request->all();
        
        
        $this->validate($request, [
            'category_id' => 'required',
            'item_name' => 'required',
            'item_description' => 'required',
        ]);

      
        $data=array();
        $data['expences_categoris_id']= $request->category_id;
        $data['expences_items_name']= $request->item_name;
        $data['expences_items_description']= $request->item_description;
  
        DB::table('expences_items')->insert($data);
        return redirect::to('/dashboard/exp/item/manage')
                ->with('Save','Expenses Item Save Successfully'); ;
    }
    
    
    
    
    
    
      public function manage() {
                 $this->admin_dashboard_check();         
        
           $get_all_item_info = DB::table('expences_items')
            ->join('expences_categoris', 'expences_items.expences_categoris_id', '=', 'expences_categoris.expences_categoris_id')
            ->select('expences_items.*', 'expences_categoris.expences_categoris_name')
            ->get();
           
//       echo'<pre>';
//       print_r($get_all_item_info);
//       exit();
//             
       
       if($get_all_item_info == null){
         return 'null';
       }
       else{
              $item_info= view('supper_admin.exp.exp_item.manageItem')
               ->with('get_all_item_info',$get_all_item_info);
           
            return view('supper_admin.master')->with('x',$item_info);
       }
       
    
       
    }
    
    
    
    
    
    
    
    
    //end of expItemController
}
