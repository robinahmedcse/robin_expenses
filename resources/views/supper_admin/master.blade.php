<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <!-- Bootstrap -->
    <link href="{{asset('public/backEnds/')}}/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{asset('public/backEnds/')}}/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{asset('public/backEnds/')}}/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{asset('public/backEnds/')}}/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
	
    <!-- bootstrap-progressbar -->
    <link href="{{asset('public/backEnds/')}}/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="{{asset('public/backEnds/')}}/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="{{asset('public/backEnds/')}}/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Datatables -->
    <link href="{{asset('public/backEnds/')}}/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="{{asset('public/backEnds/')}}/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="{{asset('public/backEnds/')}}/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="{{asset('public/backEnds/')}}/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="{{asset('public/backEnds/')}}/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

 

    <!-- Custom Theme Style -->
    <link href="{{asset('public/backEnds/')}}/build/css/custom.min.css" rel="stylesheet">
    


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

            <!--    ajax jquery-->           
<!--  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.js"></script> -->

          <!-- <script src="{{asset('public/backEnds/')}}/ajax/jquery/2.2.4/jquery.js"></script> -->
   
    <!--    jquery.dataTables.min.js -->
<!--    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap.min.js"></script> -->


<!--    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>

    <script src="https://www.jqueryscript.net/demo/Dialog-Modal-Dialogify/dist/dialogify.min.js"></script>
 -->



        <script>
            
             function one_delete(){
                   var check = confirm("are you sure to delete this");
                  if(check){return true;}else{return false;}
              }  
           
        </script>
    
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="{{URL::to('/dashboard')}}" class="site_title"> 
                  <span>Robin Ahmed </span>
                   </a>
            </div>
               <div class="navbar nav_title" style="border: 0;">
              
                  
               
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
           @include('supper_admin.include.profile')
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
        @include('supper_admin.include.sidebar')
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
           @include('supper_admin.include.slidebar-footer')
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        @include('supper_admin.include.top-nav')
        <!-- /top navigation -->

        <!-- page content -->
   @yield('x')
        <!-- /page content -->

        <!-- footer content -->
     @include('supper_admin.include.footer')
        <!-- /footer content -->
      </div>
    </div>

 




















    <!-- jQuery -->
    <script src="{{asset('public/backEnds/')}}/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="{{asset('public/backEnds/')}}/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="{{asset('public/backEnds/')}}/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="{{asset('public/backEnds/')}}/vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="{{asset('public/backEnds/')}}/vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="{{asset('public/backEnds/')}}/vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="{{asset('public/backEnds/')}}/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="{{asset('public/backEnds/')}}/vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="{{asset('public/backEnds/')}}/vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="{{asset('public/backEnds/')}}/vendors/Flot/jquery.flot.js"></script>
    <script src="{{asset('public/backEnds/')}}/vendors/Flot/jquery.flot.pie.js"></script>
    <script src="{{asset('public/backEnds/')}}/vendors/Flot/jquery.flot.time.js"></script>
    <script src="{{asset('public/backEnds/')}}/vendors/Flot/jquery.flot.stack.js"></script>
    <script src="{{asset('public/backEnds/')}}/vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="{{asset('public/backEnds/')}}/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="{{asset('public/backEnds/')}}/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="{{asset('public/backEnds/')}}/vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="{{asset('public/backEnds/')}}/vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="{{asset('public/backEnds/')}}/vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="{{asset('public/backEnds/')}}/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="{{asset('public/backEnds/')}}/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="{{asset('public/backEnds/')}}/vendors/moment/min/moment.min.js"></script>
    <script src="{{asset('public/backEnds/')}}/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

  <!-- jquery.inputmask -->
  <script src="{{asset('public/backEnds/')}}/vendors/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>

    <!-- Datatables -->
    <script src="{{asset('public/backEnds/')}}/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{asset('public/backEnds/')}}/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="{{asset('public/backEnds/')}}/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{asset('public/backEnds/')}}/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="{{asset('public/backEnds/')}}/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="{{asset('public/backEnds/')}}/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="{{asset('public/backEnds/')}}/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="{{asset('public/backEnds/')}}/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="{{asset('public/backEnds/')}}/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="{{asset('public/backEnds/')}}/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{asset('public/backEnds/')}}/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="{{asset('public/backEnds/')}}/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="{{asset('public/backEnds/')}}/vendors/jszip/dist/jszip.min.js"></script>
    <script src="{{asset('public/backEnds/')}}/vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="{{asset('public/backEnds/')}}/vendors/pdfmake/build/vfs_fonts.js"></script>







    <!-- Custom Theme Scripts -->
    <script src="{{asset('public/backEnds/')}}/build/js/custom.min.js"></script>
	


  </body>
</html>
