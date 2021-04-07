   

@extends('supper_admin.master')

@section('title','Home')


@section('x')
 <div class="right_col" role="main"> 




 
            <div class="row top_tiles">
             
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-caret-square-o-right"></i></div>
                  <div class="count">{{$income}} TAKA </div>
                  <h3>Income</h3>
          
                </div>
              </div>

              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-comments-o"></i></div>
                  <div class="count">{{$spend}} TAKA</div>
                  <h3>Expencse</h3>
               
                </div>
              </div>

              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-sort-amount-desc"></i></div>
                  <div class="count">{{$total}} TAKA </div>
                  <h3>Cash</h3>
 
                </div>
              </div>

           


            </div>










   
  
           
     
 </div>

@endsection


