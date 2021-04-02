<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use DB;


class loginController extends Controller
{
    
        protected function admin_login_check() {

        session_start();
        $admin_id = Session::get('admin_id');
        $name = Session::get('name');

        if ($admin_id != NUll && $name != NULL) {
            redirect::to('dashboard')->send();
        }
    }
    
    
    
    
   
     public function robinAdminReg() {
        return view('auth.register');
    }
    
    public function robinAdminSave(Request $request) {
            
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

      
        $data=array();
        $data['name']= $request->name;
        $data['email']= $request->email;
        $data['password']= $request->password;
  
        
        
        DB::table('admin')->insert($data);
        return redirect::to('login-admin');
    }
    
    
    
    
    
    
      public function robinAdminLogin() {
         $this -> admin_login_check();
         
    
     return view('auth.login');
    }
    
    
    
    
    
      public function robinAdminCheck(Request $request) {
            $my_password=$request->password;
            $my_email=$request->email;

 
     $admin_info = DB::table('admin')
                ->where('email', $my_email) 
                ->where('password', $my_password) 
                ->first();

     
         if ($admin_info) {                
              Session::put('admin_id',$admin_info->admin_id);
              Session::put('name',$admin_info->name);
              return redirect('dashboard');
                          
              } 
                    
        else {
            
             return redirect('/login-admin')
                     ->with('exception','Admin Email and Password Invalid'); 
             }



     // return redirect::to('dashboard');
    }
    
    
    
    
    
    
    
    
    
    
    // end of loginController
    
}
