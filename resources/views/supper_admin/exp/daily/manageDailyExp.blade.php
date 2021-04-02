@extends('supper_admin.master')

@section('title','Daily expences')



@section('x')
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>All  <small>Expences</small></h3>
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
                        <h4 class="tex text-center text-success">
                            <?php
                            echo Session::get('Save');
                            session::put('Save', '');
                            ?>
                        </h4>
                        <br><br>
                    </div> 
                    <div class="x_content">
                        <table id="datatable-keytable" class="table table-striped table-bordered"">
                            <thead>
                                <tr>
                                    <th>#</th>
                                     <th>Date</th>
                                    <th>Item Name</th>
                                    <th>Quantity</th>
                                    <th>Unit Price</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1;?>
                                @foreach($get_all_daily_exp_info as $daily_info)
                                <tr>
                                    <th scope="row">  <?php echo $i;?></th>
                                     <td>{{$daily_info->date}}</td>
                                    <td>{{$daily_info->expences_items_name}}</td>
                                    <td>{{$daily_info->expences_items_quantity}}</td>
                                    <td>{{$daily_info->daily_expences_item_price}}</td>
                                    <td>{{$daily_info->daily_expences_total}}</td>

                                    <td>
                                        <a href="{{URL::to('admin/news/edit/'.$daily_info ->daily_expences_id)}}" class="btn btn-success">
                                            <span class="glyphicon glyphicon-eye-open"></span>
                                        </a> 

                                        <a href="{{URL::to('admin/news/delete/'.$daily_info ->daily_expences_id)}}" class="btn btn-danger"  onclick="return one_delete();">
                                            <span class="glyphicon glyphicon-trash"></span>
                                        </a>
                                    </td>  
                                </tr> 
                                 <?php $i++;?>
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