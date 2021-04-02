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
                        
                    
                        
                            {!! Form::open(['url'=>'/dashboard/','method'=>'POST','class'=>'form-horizontal form-label-left']) !!}    
                        <!-- Category name -->

                            <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Select Date </label>
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <select name="date" class="form-control">
                                    <option value="null">select Date</option>
                                    @foreach($all_date as $date)
                                    <option value="{{ $date ->Date }}">{{  $date ->Date }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>  
                       
                        
                 
                         
                    
                        
                  
                     

                      <div class="ln_solid"></div>
                      
               
                      </div>
                      <input type="hidden" id="token_dis" name="token_admin" value="{{ csrf_token()}}">
                     {!! Form::close() !!}
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        <table class="table table-responsive table-bordered" >
                            <thead>
                                <tr>
                                
                                     <th>Date</th>
                                    <th>Item Name</th>
                                    <th>Quantity</th>
                                    <th>Unit Price</th>
                                    <th>Amount</th>
                                
                                </tr>
                            </thead>
                            <tbody id="item_table">
                         
                            </tbody>
                            
                        </table>

                    </div>
                </div>
            </div>




            <div class="clearfix"></div>


        </div>
    </div>


<script type="text/javascript">
       $(document).ready(function(){  
             $('select[name="date"]').on ('change',function(){
                        var id=$(this).val();
                        console.log(id);
                         token=$('#token_dis').val();
                                 console.log(token);
                         if(id){
                             $.ajax({
                                    type:'post',
                                    url:'{{URL::to("/dashboard/get/per/day/date")}}',
                                         data:{
                                                date:id ,
                                                _token:token
                                               },

                                    success:function(response)
                                            {
                                              
                                            console.log(response);
                                         $('#item_table').html(response);
                                            }

                                });
                         }
                         else{
                             alert ('Danger');
                         }
 
             
               });
            });
</script>


@endsection