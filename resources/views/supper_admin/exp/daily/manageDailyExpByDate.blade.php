@extends('supper_admin.master')

@section('title','Daily Expences List')



@section('x')
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Expences Manage <small>by date</small></h3>
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
                              <div>
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


                        <div class="">
                            <h2 class="tex text-center text-success">
                                Total Expences Amount {{ $sum_total}}.00 Taka
                            </h2>

                        </div>


                        <div class="table-responsive">
                            <table id="datatable-keytable" class="table table-hover table-bordered"">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Date</th>
                                        <th>Item</th>
                                        <th>Quantity</th>
                                        <th>Amount (BDT)</th>
                                        <th>Total(BDT)</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    @foreach($get_all_daily_exp_info as $daily_info)
                                    <tr>
                                        <th scope="row">  <?php echo $i; ?></th>
                                        <td>{{$daily_info->date}}</td>
                                        <td>{{$daily_info->expences_items_name}}</td>
                                        <td>{{$daily_info->expences_items_quantity}}</td>
                                        <td>{{$daily_info->daily_expences_item_price}}.00</td>
                                        <td>{{$daily_info->daily_expences_total}}.00</td>

                                        <td>
 
                                            
                                             <a href="#" id="{{$daily_info->daily_expences_id}}" date="{{$daily_info->date}}" item_name="{{$daily_info->expences_items_name}}" qty="{{$daily_info->expences_items_quantity}}" price="{{$daily_info->daily_expences_item_price}}" class="btn btn-warning editbtn">
                                                <span class="glyphicon glyphicon-check"></span>
                                            </a> 
                                            
                             

                                            <a href="{{URL::to('/dashboard/daily/exp/single/delete/'.$daily_info ->daily_expences_id )}}" class="btn btn-danger"  onclick="return one_delete();">
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
            
            
            <!--########################################################################################-->
            <!-- Edit Modal -->
            <div class="modal fade" id="editmodel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Daily Exp Quantity and Price</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        {!! Form::open(['url'=>'/dashboard/daily/view/update/by/id','method'=>'POST','class'=>'form-horizontal form-label-left','id'=>'form-update']) !!}
                        <div class="modal-body">


                            <div class="form-group">
                              <div class="form-group col-md-12  col-sm-12 col-xs-12 " >
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                        Date <span class="required">*</span>
                                    </label>
                                    <div class="col-md-9  col-sm-9 col-xs-12 form-group">
                                        <input type="text" class="form-control"  name="date" id="date" >   
                                    </div>
                               </div>
                                <input type="hidden" id="token_admin" name="token_admin" value="{{ csrf_token()}}">
                                <input type="hidden" id="hidden_id" name="id">
                            </div>
                            
                            

                            <div class="form-group">
                                <div class="form-group col-md-12  col-sm-12 col-xs-12 " >
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                        Item Name <span class="required">*</span>
                                    </label>
                                    <div class="col-md-9  col-sm-9 col-xs-12 form-group">
                                        <input type="text"  name="item_name" id="item_name" disabled   class="form-control" >   
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                 <div class="form-group col-md-12  col-sm-12 col-xs-12 " >
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                        Quantity / Times <span class="required">*</span>
                                    </label>
                                    <div class="col-md-9  col-sm-9 col-xs-12 form-group">
                                        <input type="number" name="qty" id="qty" required class="form-control" >   
 
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-group col-md-12  col-sm-12 col-xs-12 " >
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                        Amount<span class="required">*</span>
                                    </label>
                                    <div class="col-md-9  col-sm-9 col-xs-12 form-group">
                                        <input type="number" id="amount" name="amount"  required class="form-control" >                                           
                                    </div>
                                </div>
                            </div>

 
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" name="updateData" class="btn btn-primary">Update Data</button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
            <!-- End edit Modal -->


            <!--#########################################################################################-->


        </div>
    </div>
  </div>
</div>


 

<script>

 $('.editbtn').click(function () {

              
    // $('#editmodel').modal('show');        
          var id = $(this).attr('id');
          var dates = $(this).attr('date');   
          var name = $(this).attr('item_name');  
          var qty = $(this).attr('qty'); 
          var price = $(this).attr('price');  
          token = $('#token_admin').val();
   
              
              
                $.ajax({
                         type: 'post',
                         url: '{{URL::to("/dashboard/daily/view/edit/by/id")}}',
                         data: {
                             _token: token,
                            id: id,
                            date: dates,
                            name:name,
                            qty:qty,
                            price:price,
                        },
                        
                    success:function(data)
                    {
                        
                        console.log(data);
 
                        $('#hidden_id').val(data.id);
                        $('#date').val(data.date);
                        $('#item_name').val(data.name);
                        $('#qty').val(data.qty);
                        $('#amount').val(data.price);
 
                       $('#editmodel').modal('show');   
                    }
                   })
   });

</script>





@endsection