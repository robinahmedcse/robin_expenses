<?php

namespace App\Http\Controllers\exp;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use DB;



class expCategoryController extends Controller
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
            return view("supper_admin.exp.exp_category.createCategory");
        }
   
    
    public function store(Request $request) {
     //   return 'hahahsa';
        $this->validate($request, [
            'exp_category' => 'required',
            'exp_description' => 'required',
            'category_status' => 'required',
        ]);

        $status = $request->category_status;

        if($status == 'null' || $status == 'Null' || $status == 'NULL' ){
          return back()->with('fail','Please Select Status');
        }else{

        $data=array();
        $data['expences_categoris_name']= $request->exp_category;
        $data['expences_categoris_description']= $request->exp_description;
        $data['expences_categoris_status']= $request->category_status;
  
        DB::table('expences_categoris')->insert($data);
        return redirect::to('/dashboard/exp/category/manage')
                ->with('Save','Expenses Category Save Successfully'); 
           }
    
    
  }
    
    
    
      public function manage() {
               $this->admin_dashboard_check();   
               
           $get_all_cate_info =DB::table('expences_categoris')
                   ->orderBy('expences_categoris_id', 'DESC')
                  ->get();
 
//       
//       echo'<pre>';
//       print_r($get_all_cate_info);
//       exit();
             
       
       if($get_all_cate_info == null){
         return 'null';
       }
       else{
              $category_info= view('supper_admin.exp.exp_category.manageCategory')
               ->with('get_all_cate_info',$get_all_cate_info);
           
            return view('supper_admin.master')->with('x',$category_info);
       }
       
    
       
    }
    
    
    
    
    
    //end of expCategoryController
}
