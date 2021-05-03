@extends('supper_admin.master')
@section('title','edit Person info')


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
                        <h2>Person <small>Edit from</small></h2>
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
             

                        {!! Form::open(['url'=>'/dashboard/loan/person/update','method'=>'POST','class'=>'form-horizontal form-label-left']) !!}    
                        <!-- Category name -->
       

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="p_name">Name<span class="required" >*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="p_name" name="p_name" 
                                        value="{{$data->person_name}}" required  class="form-control " >   

                                        <input type="hidden" id="person_id" name="person_id" 
                                        value="{{$data->person_id}}" required  class="form-control " >  
                                        @if ($errors->has('p_name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong style="color:red">{{ $errors->first('p_name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>



                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="p_number">Phone Number<span class="required" >*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="number" id="p_number" name="p_number"
                                 value="{{$data->person_phone_number}}" required class="form-control" >   
                                 @if ($errors->has('p_number'))
                                <span class="invalid-feedback" role="alert">
                                    <strong style="color:red">{{ $errors->first('p_number') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>



                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="p_address">Address<span class="required" >*</span>
                            </label>
                             <div class="col-md-6 col-sm-6 col-xs-12">   
                                 <textarea rows="4" cols="10" name="p_address" required class="form-control">{{$data->address}}</textarea>
                              
                                 @if ($errors->has('p_address'))
                                <span class="invalid-feedback" role="alert">
                                    <strong style="color:red">{{ $errors->first('p_address') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <br />

                        <div class="ln_solid"></div>

                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3"> 
                                <input type="submit" name='btn' value="Update Person Info" class="btn btn-success">
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