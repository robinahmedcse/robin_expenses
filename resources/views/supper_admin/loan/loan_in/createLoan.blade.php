@extends('supper_admin.master')
@section('title','Add loan info')


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
                        <h2>Loan in <small>Add from</small></h2>
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

                    <div align='right'>
                        <a href="{{URL::to('/dashboard/loan/person/add')}}">
                                     <button type="button" class="btn btn-warning btn-info">
                                        Add Person 
                                     </button>
                                 </a> 
                    </div>   
                        
                     <div class="massage">
                                @if(Session::get('fail'))
                                    <div class="alert alert-danger">
                                        {{ session::get('fail') }} 
                                    </div>
                                @endif
                         </div> 
             

                        <br />

                        {!! Form::open(['url'=>'/dashboard/loan/in/save','method'=>'POST','class'=>'form-horizontal form-label-left']) !!}    
                        <!-- Category name -->


                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="loan_form">Loan From<span class="required" >*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                               <select name="loan_form" class="form-control">
                                    <option value="null">Select One</option>
                                    @foreach($person_info as $person)
                                    <option value="{{ $person ->person_id }}">{{ $person ->person_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="loan_amount">Amount<span class="required" >*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="number" id="loan_amount" name="loan_amount" value="{{ old('loan_amount')}}" required
                                       class="form-control{{ $errors->has('loan_amount') ? ' is-invalid' : '' }}" >   

                                @if ($errors->has('loan_amount'))
                                <span class="invalid-feedback" role="alert">
                                    <strong style="color:red">{{ $errors->first('loan_amount') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>



                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="payment_date">Last Date for Payment <span class="required" >*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                 <fieldset>
                                    <div class="control-group">
                                        <div class="controls">
                                        <div class="col-md-11 xdisplay_inputx form-group has-feedback">
                                            <input type="text" class="form-control has-feedback-left" id="single_cal1"  name="payment_date" aria-describedby="inputSuccess2Status">
                                            <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                            <span id="inputSuccess2Status" class="sr-only">(success)</span>
                                        </div>
                                        </div>
                                    </div>
                              </fieldset>
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