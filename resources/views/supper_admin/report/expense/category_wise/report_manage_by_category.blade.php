@extends('supper_admin.master')

@section('title','Report |Expenses view (Category Wise)')



@section('x')
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Expenses<small>report</small></h3>
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
                    <div class="x_content">

                    <div class="">
                        <h1 class="tex text-center text-success">
                         Report by  Category Name : <u>{{$category_name->expences_categoris_name}}</u>
                         </h1>
                         <p class="tex text-center text-success">Report from 01 March 2021 to Today </p>
                         <h3 class="tex text-center text-warning">Total  expences: {{$expences_total}} Taka </h3>

                        <br> 
                     
                    </div> 

                      <div class="table-responsive">
                         <table id="datatable-keytable" class="table table-striped table-bordered"">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Date</th>
                                    <th>Type</th>
                                    <th>Item name</th>
                                    <th>Quantity</th>
                                    <th>Unit Price</th>
                                    <th>Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                  @php 

                                      $i=1;
                                      $j=0;

                                  @endphp

                                @foreach($cash_in_details as $daily_info)
                                    <tr>
                                        <th scope="row">  <?php echo $i;?></th>
                            
                                        <td>{{$daily_info->date}}</td>
                                        <td>{{$daily_info->expences_categoris_name}}</td>
                                        <td>{{$daily_info->expences_items_name}}</td>
                                        <td>{{$daily_info->expences_items_quantity}}</td>
                                        <td>{{$daily_info->daily_expences_item_price}}</td>
                                       
                                        <td>{{$daily_info->daily_expences_total}}</td>
                                    </tr> 


                                    <?php 
                                            $j= $j+ $daily_info->daily_expences_total;
                                            $i++;
                                    
                                    ?>
                                @endforeach()
                             </tbody>                        
                          </table>

                          <!-- <table>
                                 <tr>
                                    <td calspan="5" > Total  expences</td>
                                    <td> @php  echo $j;  @endphp</td>
                                 </tr>


                          </table> -->



         
                          <!-- end  -->
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection