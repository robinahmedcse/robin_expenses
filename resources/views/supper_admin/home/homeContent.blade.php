   

@extends('supper_admin.master')

@section('title','Home')


@section('x')
 <div class="right_col" role="main"> 


 <h1 class="tex text-center text-success"> 
      @php
        echo date("d-m-Y");
      @endphp   
  </h1>
  <p class="tex text-center text-success"> Start at 01 March 2021 </p>


<br>
<br>
            <div class="row top_tiles">


              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
 
                  <div class="count">{{$total}} TAKA </div>
                  <h3>Balance</h3>
 
                </div>
              </div>
            </div>

<br>
<br>


<h3>Expense History</h3 >

            <div class="row top_tiles">



             
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <!-- <div class="icon"><i class="fa fa-caret-square-o-right"></i></div> -->
                  <div class="count"> {{$yesterdayExpense}}.00 TK</div>
                  <h3>Yesterday Expense</h3>
          
                </div>
              </div>


              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <!-- <div class="icon"><i class="fa fa-comments-o"></i></div> -->
                  <div class="count">{{$savenDaysExpense}}.00 TK </div>
                  <h3>Last 07 Days Expense</h3>
               
                </div>
              </div>



              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <!-- <div class="icon"><i class="fa fa-sort-amount-desc"></i></div> -->
                  <div class="count">{{$fifteenDaysExpense}}.00 TK </div>
                  <h3>Last 15 Days Expense</h3>
 
                </div>
              </div>



              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <!-- <div class="icon"><i class="fa fa-sort-amount-desc"></i></div> -->
                  <div class="count">{{$thirtyDaysExpense}}.00 TK </div>
                  <h3>Last 30 Days Expense</h3>
 
                </div>
              </div>


              
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
 
                  <div class="count">{{$spend}} TAKA</div>
                  <h3>Total Expense</h3>
               
                </div>
              </div>
          

            </div>




            <br>
<br>


            <h3>Loan History</h3 >


            <div class="row top_tiles">

     
                
                
             <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
               <div class="tile-stats">
                 <!-- <div class="icon"><i class="fa fa-caret-square-o-right"></i></div> -->
                 <div class="count"> {{$total_unpaid_loan_info}}.00 TK</div>
                 <h3>Total unpaid Loan</h3>
         
               </div>
             </div>

               <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
               <div class="tile-stats">
                 <!-- <div class="icon"><i class="fa fa-caret-square-o-right"></i></div> -->
                 <div class="count">{{$total_paid_loan_info}}.00 TK</div>
                 <h3>Total paid Loan</h3>
         
               </div>
             </div>


             <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="tile-stats">
                      <!-- <div class="icon"><i class="fa fa-caret-square-o-right"></i></div> -->
                        <div class="count"> {{$total_loan_info}}.00 TK</div>
                        <h3>Total Loan</h3>

                    </div>
                </div>
 
 


           </div>


           <br>
<br>


           <div class="row top_tiles">
             
             <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
               <div class="tile-stats">
                 <div class="count">{{$income}} TAKA </div>
                  <h3>Total In (All+Loan)</h3>
               </div>
             </div>

           

         

           </div>


   
  
           
     
 </div>

@endsection


