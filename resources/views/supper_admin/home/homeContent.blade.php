   

@extends('supper_admin.master')

@section('title','Home')


@section('x')
 <div class="right_col" role="main"> 
     
     <div class="col-md-4 col-sm-4 col-xs-12">
         <div class="x_panel tile fixed_height_320">
             <div class="x_title">
                 <h2>Total Income</h2>
                 <ul class="nav navbar-right panel_toolbox">
                     <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                     </li>
                     <li class="dropdown">
                         <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                         <ul class="dropdown-menu" role="menu">
                             <li><a href="#">Settings 1</a>
                             </li>
                             <li><a href="#">Settings 2</a>
                             </li>
                         </ul>
                     </li>
                     <li><a class="close-link"><i class="fa fa-close"></i></a>
                     </li>
                 </ul>
                 <div class="clearfix"></div>
             </div>
             <div class="x_content">

                 <h3 style="text-align: center" >  {{$income}} TAKA </h3>

                 <div class="clearfix"></div>
             </div>
         </div>
     </div>

     <div class="col-md-4 col-sm-4 col-xs-12">
         <div class="x_panel tile fixed_height_320">
             <div class="x_title">
                 <h2>Total Spend</h2>
                 <ul class="nav navbar-right panel_toolbox">
                     <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                     </li>
                     <li class="dropdown">
                         <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                         <ul class="dropdown-menu" role="menu">
                             <li><a href="#">Settings 1</a>
                             </li>
                             <li><a href="#">Settings 2</a>
                             </li>
                         </ul>
                     </li>
                     <li><a class="close-link"><i class="fa fa-close"></i></a>
                     </li>
                 </ul>
                 <div class="clearfix"></div>
             </div>
             <div class="x_content">

                 <h3 style="text-align: center" >{{$spend}} TAKA </h3>

                 <div class="clearfix"></div>
             </div>
         </div>
     </div>

     <div class="col-md-4 col-sm-4 col-xs-12">
         <div class="x_panel tile fixed_height_320">
             <div class="x_title">
                 <h2>Cash </h2>
                 <ul class="nav navbar-right panel_toolbox">
                     <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                     </li>
                     <li class="dropdown">
                         <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                         <ul class="dropdown-menu" role="menu">
                             <li><a href="#">Settings 1</a>
                             </li>
                             <li><a href="#">Settings 2</a>
                             </li>
                         </ul>
                     </li>
                     <li><a class="close-link"><i class="fa fa-close"></i></a>
                     </li>
                 </ul>
                 <div class="clearfix"></div>
             </div>
             <div class="x_content">

                 <h3 style="text-align: center" >  {{$total}} TAKA </h3>

                 <div class="clearfix"></div>
             </div>
         </div>
     </div>
           
     
 </div>

@endsection


