@extends('supper_admin.master')
@section('title','Edit loan info')


@section('x')
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
                        <h2>Loan in <small>Edit from</small></h2>
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

        
                     <div class="massage">
                                @if(Session::get('fail'))
                                    <div class="alert alert-danger">
                                        {{ session::get('fail') }} 
                                    </div>
                                @endif
                         </div> 
             

                        <br />

                        {!! Form::open(['url'=>'/dashboard/loan/in/update','method'=>'POST','class'=>'form-horizontal form-label-left']) !!}    
                        <!-- Category name -->

                        <input type="hidden" name="loan_id" value="{{$loan_info->loan_id}}" required
                                       class="form-control{{ $errors->has('loan_amount') ? ' is-invalid' : '' }}" >  

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="loan_form">Loan From<span class="required" >*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                               <select name="person_id" class="form-control">
                                    <option value="{{ $person_info ->person_id }}">{{ $person_info ->person_name }}</option>
                                </select>
                            </div>
                        </div>





                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="loan_amount">Amount<span class="required" >*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="number" name="loan_amount" value="{{$loan_info->loan_amount}}" required
                                       class="form-control{{ $errors->has('loan_amount') ? ' is-invalid' : '' }}" >   

                                @if ($errors->has('loan_amount'))
                                <span class="invalid-feedback" role="alert">
                                    <strong style="color:red">{{ $errors->first('loan_amount') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="payment_date">Last Date for Payment (Y-M-D)<span class="required" >*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="payment_date" value="{{$loan_info->last_payment_date}}" required
                                       class="form-control{{ $errors->has('payment_date') ? ' is-invalid' : '' }}" >   

                                @if ($errors->has('payment_date'))
                                <span class="invalid-feedback" role="alert">
                                    <strong style="color:red">{{ $errors->first('payment_date') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

 





 



                        <br />

                        <div class="ln_solid"></div>

                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3"> 
                                <input type="submit" name='btn' value="submit" class="btn btn-success">
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