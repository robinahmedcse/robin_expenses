<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use DB;
use Carbon\Carbon;

use App\Person;
use App\Loan;




class loanController extends Controller
{
   
    protected function admin_dashboard_check() {

   
        session_start();
        $admin_id = Session::get('admin_id');
        $name = Session::get('name');
 
          if ($admin_id == NUll && $name == NULL) {
            redirect::to('/login-admin')->send();
        }
    }


    public function  loan_in_index(){
        $this -> admin_dashboard_check();
        
        $person_info = Person::all();
        
//        echo '<pre>';
//        print_r($person_info);
//        exit();

        $loan_info= view('supper_admin.loan.loan_in.createLoan')
                    ->with('person_info',$person_info);
        return view('supper_admin.master')->with('x',$loan_info);
    }


    public function  loan_in_store(Request $req){

     //  return $req->all(); 
       $person_id = $req->loan_form;
      
      $payment_date = date('Y-m-d', strtotime($req->payment_date));
//      echo $payment_date;
//        echo '<br>';
      
      $valid_date =  $this->current_date_check($payment_date);
     

       if($person_id == 'null' || $person_id == 'NULL' || $person_id == 'Null'){
          
           return back()->with('fail','Please Select One'); 
       }
       else {
           
            if($valid_date == 'invalid'){
                
                 return back()->with('fail','Invalid Date. Last Date for Payment must be Greater than form current date');
              //    return redirect('/dashboard/loan/in/add')
                //          ->with('fail','Invalid Date. Greater than form current date'); 
            }else{
                
                    $data = new Loan;
                    $data ->person_id =  $person_id;
                    $data ->loan_amount =  $req ->loan_amount;
                    $data ->last_payment_date =  $valid_date;
                    $data->loan_status =  'Un-paid';
                    $save = $data ->save();

                      if($save){
                          return redirect('/dashboard/loan/in/manage')
                                          ->with('success','Loan Data Save succesfully'); 
                       }else{
                              return back()->with('fail','Try again later'); 
                       }

                
            }
       }
      
       
       //loan_in_store
    }

    
    
    protected function current_date_check($payment_date) {
     
        $current_date = date('Y-m-d');
//        echo $current_date;    
//           echo '<br>';
          if( $payment_date  >  $current_date ){
                return  $payment_date;
           }
         else {
//           echo 'greater than form current date';
             $invalid ='invalid';
               return  $invalid;
           
          }
        
      //current_date_check 
    }
    
    
    
    
        public function  loan_in_manage(){
        $this -> admin_dashboard_check();
        
    //    $loan_info = Loan::all();
        
        
        
        $loan_info = DB::table('loans')
            ->join('people', 'people.person_id', '=', 'loans.person_id')
            ->select('loans.*', 'people.person_name')
            ->get();
        
//        echo '<pre>';
//        print_r($loan_info);
//        exit();

        $loan_info= view('supper_admin.loan.loan_in.manageLoan')
                    ->with('loan_info',$loan_info);
        return view('supper_admin.master')->with('x',$loan_info);
    }
    
    
    
    
 public function loan_in_paid($loan_id){
          
       $data = Loan::find($loan_id);
        
        $data->loan_status =  'Paid';
        $update = $data->save();
        
       if($update){
          return back()->with('success','Loan Data Update succesfully'); 
       }else{
          return back()->with('fail','Try again later'); 
        }
        
 }
 
  public function loan_in_unpaid($loan_id){
            $data = Loan::find($loan_id);
        
        $data->loan_status =  'Un-paid';
        $update = $data->save();
        
       if($update){
          return back()->with('success','Loan Data Update succesfully'); 
       }else{
          return back()->with('fail','Try again later'); 
        }
 }
 







 public function loan_in_edit($id){
 


           $loan_info = Loan::findorfail($id);

           $person = $loan_info -> person_id;

           $person_info = Person::findorfail($person);
   
           $loan_info_by_id= view('supper_admin.loan.loan_in.editLoan')
                       ->with('loan_info',$loan_info)
                       ->with('person_info',$person_info);

           return view('supper_admin.master')->with('x',$loan_info_by_id);


 }


 public function loan_in_update (Request $req){
 // return $req->all();

      $loan_idd= $req->loan_id;

 

      $data = Loan::findorfail($loan_idd);

      $data ->person_id = $req->person_id;
      $data ->loan_amount =  $req ->loan_amount;
      $data ->last_payment_date = $req ->payment_date;
 
      $update = $data ->save();

     if($update){
         return redirect('/dashboard/loan/in/manage')
                         ->with('success','Loan Data updated succesfully'); 
      }else{
             return back()->with('fail','Try again later'); 
      }


 }











    // end of loan
}
