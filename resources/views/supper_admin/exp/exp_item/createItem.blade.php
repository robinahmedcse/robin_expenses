@extends('supper_admin.master')
@section('title','Add New item')


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
                    <h2>Item<small>Add from</small></h2>
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
                      
                      
                    <br />
                    
                     {!! Form::open(['url'=>'/dashboard/exp/item/save','method'=>'POST','class'=>'form-horizontal form-label-left']) !!}    
                        <!-- Category name -->

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Select Item Category</label>
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <select name="category_id" class="form-control">
                                    <option value="null">Select Catrgories</option>
                                    @foreach($get_all_category_info as $categoryInfo)
                                    <option value="{{ $categoryInfo ->expences_categoris_id }}">{{ $categoryInfo ->expences_categoris_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>  


                        
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="item_name">Item Name <span class="required" >*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="t_name" name="item_name" value="{{ old('item_name')}}" required
                                       class="form-control{{ $errors->has('item_name') ? ' is-invalid' : '' }}" >   

                                @if ($errors->has('cash_in_type_name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong style="color:red">{{ $errors->first('item_name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        
                    <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="item_description">Description <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea class='form-control' name='item_description' row='8' placeholder=''></textarea>
                                <span class="text-danger">{{$errors->has('item_description')? $errors->first('item_description'):''}}</span>
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