@extends('supper_admin.master')
@section('title','Add New')


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
                    <h2>Cash In Type<small>Add from</small></h2>
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
                    <br />
                    
                     {!! Form::open(['url'=>'/dashboard/cash/in/type/save','method'=>'POST','class'=>'form-horizontal form-label-left']) !!}    
                        <!-- Category name -->

                               <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cash_in_type_name">Name (cash in Type) <span class="required" >*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="t_name" name="cash_in_type_name" value="{{ old('cash_in_type_name')}}" required
                                 class="form-control{{ $errors->has('cash_in_type_name') ? ' is-invalid' : '' }}" >   
                               
                                @if ($errors->has('cash_in_type_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color:red">{{ $errors->first('cash_in_type_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        
                        
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cash_in_description">Description (cash in type) <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea class='form-control' name='cash_in_description' row='8' placeholder=''></textarea>
                                <span class="text-danger">{{$errors->has('cash_in_description')? $errors->first('cash_in_description'):''}}</span>
                            </div>
                        </div> 

                     

                  <br />

                       <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Status (cash in type)</label>
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                 
                                <select name="cash_in_type_status" class="form-control" required>
                                    <option value="null">Cash in type status</option>
                                    <option value="1">Published</option>
                                    <option value="0">Un-published</option>
                                </select>
                            </div>
                        </div>    
                        
                  
                     

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