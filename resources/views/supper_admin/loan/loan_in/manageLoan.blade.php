@extends('supper_admin.master')

@section('title','Loan management')



@section('x')
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>All Loan <small>info</small></h3>
            </div>
            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for...">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">Go!</button>
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="clearfix"></div>

            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">

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
                    <div class="">
                         <div class="massage">
                              @if(Session::get('success'))
                                    <div class="alert alert-success">
                                        {{ session::get('success') }} 
                                    </div>
                                @endif 
                                
                                @if(Session::get('fail'))
                                    <div class="alert alert-danger">
                                        {{ session::get('fail') }} 
                                    </div>
                                @endif
                         </div> 
                    </div> 

                    <div class="x_content">

                        <div align='right'>
                            <a href="{{URL::to('/dashboard/loan/in/add')}}">
                                <button type="button" class="btn btn-success btn-info">
                                    Add Person
                                </button>
                            </a> 
                        </div>

                        <table id="datatable-keytable" class="table table-striped table-bordered"">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>amount</th>
                                    <th>Last Date for Payment</th>
                                    <th>Loan Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                @foreach($loan_info as $loan)
                                <tr>
                                    <th scope="row">  <?php echo $i; ?></th>
                                    <td>{{$loan->person_name}}</td>
                                    <td><b>{{$loan->loan_amount}}</b> </td>
                                    <td>
                                        @php
                                         $payment_date = date('d-m-Y', strtotime($loan->last_payment_date));
                                         echo $payment_date;
                                       @endphp
                                  
                                    
                                    
                                    </td>
                                    <td> 
                                         @if ($loan->loan_status == 'Un-paid')
                                             <span class="label label-danger"> Un-paid</span>    
                                          @else
                                            <span class="label label-default"> paid</span>
                                          @endif
                                    </td>

                                    <td>
                                          @if ($loan->loan_status == 'Un-paid')
                                              <a href="{{URL::to('/dashboard/loan/status/change/to/pay/'.$loan ->loan_id)}}" class="btn btn-warning">
                                              <span class="glyphicon glyphicon-collapse-up"></span>
                                        </a>     
                                          @else
                                                  <a href="{{URL::to('/dashboard/loan/status/change/to/due/'.$loan ->loan_id)}}" class="btn btn-success">
                                              <span class="glyphicon glyphicon-collapse-down"></span>
                                          @endif

                                        <a href="{{URL::to('/dashboard/loan/in/edit/'.$loan ->loan_id)}}" class="btn btn-info">
                                            <span class="glyphicon glyphicon-edit"></span>
                                        </a> 

                                        <a href="{{URL::to('/dashboard/loan/in/delete/'.$loan ->loan_id)}}" class="btn btn-danger"  onclick="return one_delete();">
                                            <span class="glyphicon glyphicon-trash"></span>
                                        </a>


                                    </td>  
                                </tr> 
                                <?php $i++; ?>
                                @endforeach()
                            </tbody>

                        </table>

                    </div>
                </div>
            </div>




            <div class="clearfix"></div>


        </div>
    </div>
</div>
@endsection