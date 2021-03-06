@extends('supper_admin.master')

@section('title','Daily expences')



@section('x')
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>All  <small>Expences list</small></h3>
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
            <div class="row top_tiles">

                <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="tile-stats">

                        <div class="count">{{$spend}} TAKA</div>
                        <h3> Expense</h3>

                    </div>
                </div>



                <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="tile-stats">

                        <div class="count">{{$blance}} TAKA </div>
                        <h3>Balance</h3>

                    </div>
                </div>



            </div>
        </div>

        <div class="clearfix"></div>

        <div class="col-md-12 col-sm-12 col-xs-12">


            <div class="">
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


            <div class="x_content">








                <div class="table-responsive">
                    <table id="datatable-keytable" class="table table-striped jambo_table bulk_action">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Date</th>
                                <th>Amount (BDT)</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            @foreach($get_all_daily_exp_info as $daily_info)
                            <tr>
                                <th scope="row">  <?php echo $i; ?></th>
                                <td>{{$daily_info->date}}</td>
                                <td>{{$daily_info->grand_total}}.00 Taka </td>


                                <td>
                                    <a href="{{URL::to('/dashboard/daily/exp/view/by/'.$daily_info->date)}}" class="btn btn-success">
                                        <span class="glyphicon glyphicon-eye-open"></span>
                                    </a> 

                                    <a href="{{URL::to('/dashboard/daily/exp/delete/by/'.$daily_info ->date)}}" class="btn btn-danger"  onclick="return one_delete();">
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
    </div>




    <div class="clearfix"></div>


</div>
</div>
</div>
@endsection