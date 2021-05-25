@extends('supper_admin.master')
@section('title','Edit cash In info')


@section('x')



<?php

  // echo "<pre>";
 //print_r($get_all_cash_in_info);
// exit();

?>



<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3></h3>
            </div>
        </div>

        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Cash In<small>edit from</small></h2>
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
                

                        {!! Form::open(['url'=>'/dashboard/cash/in/save','method'=>'POST', 'name'=>'editForm', 'class'=>'form-horizontal form-label-left']) !!}    
                        <!-- Category name -->


                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="">Amount<span class="required" >*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="number" id="" name="" value="{{ $cash_in_info ->cash_in_amount }}" required
                                       class="form-control{{ $errors->has('cash_in_amount') ? ' is-invalid' : '' }}" >   

                                @if ($errors->has('cash_in_amount'))
                                <span class="invalid-feedback" role="alert">
                                    <strong style="color:red">{{ $errors->first('cash_in_amount') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>



 


                       <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Select Sub Category</label>
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <select name="cash_in_type_id" class="form-control">
                             
                                    @foreach($get_all_cash_in_info as $cashInTypeInfo)
                                    <option value="{{ $cashInTypeInfo ->cash_in_type_id }}">{{ $cashInTypeInfo ->cash_in_type_name }}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>  



                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cash_in_amount">Amount<span class="required" >*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="number" id="t_name" name="cash_in_amount" value="{{ $cash_in_info ->cash_in_amount }}" required
                                       class="form-control{{ $errors->has('cash_in_amount') ? ' is-invalid' : '' }}" >   

                                @if ($errors->has('cash_in_amount'))
                                <span class="invalid-feedback" role="alert">
                                    <strong style="color:red">{{ $errors->first('cash_in_amount') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>


                 

                        <div class="ln_solid"></div>

                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3"> 
                                <input type="submit" name='btn' value="Update" class="btn btn-success">
                            </div>
                        </div>

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


 


@endsection