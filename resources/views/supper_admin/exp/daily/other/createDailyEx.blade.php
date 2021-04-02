@extends('supper_admin.master')
@section('title','Add Daily Exprences')


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
                    <h2>Daily<small>Exprences Add From</small></h2>
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
                    
                      {!! Form::open(['class'=>'form-horizontal form-label-left']) !!}    
                        <!-- Category name -->

                        
                        
                        
                        
                        <div class="form-group">
                            <fieldset>
                                <div class="control-group">
                                     <label class="control-label col-md-3 col-sm-3 col-xs-12">Select Date</label>
                                    <div class="controls">
                                        <div class="col-md-6 col-sm-6 col-xs-6 xdisplay_inputx form-group has-feedback">
                                            <input type="text" class="form-control has-feedback-left" name="date" id="single_cal1" placeholder="date" aria-describedby="inputSuccess2Status">
                                            <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                            <span id="inputSuccess2Status" class="sr-only">(success)</span>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>  
                        
                            <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Select Item Category</label>
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <select name="category_id" class="form-control">
                                      @foreach($get_all_category_info as $categoryInfo)
                                    <option value="{{ $categoryInfo ->expences_categoris_id }}">{{ $categoryInfo ->expences_categoris_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>  
                       
                        
                       <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Select Item Name</label>
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <select name="item_id" class="form-control" id="item">
                                </select>
                            </div>
                        </div>  

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="quantity">Item Quantity <span class="required" >*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="number" id="t_name" name="quantity" value="{{ old('quantity')}}" required
                                       class="form-control{{ $errors->has('quantity') ? ' is-invalid' : '' }}" >   

                                @if ($errors->has('quantity'))
                                <span class="invalid-feedback" role="alert">
                                    <strong style="color:red">{{ $errors->first('quantity') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        
                         <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="price">Item Price <span class="required" >*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="number" id="t_name" name="price" value="{{ old('price')}}" required
                                       class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" >   

                                @if ($errors->has('price'))
                                <span class="invalid-feedback" role="alert">
                                    <strong style="color:red">{{ $errors->first('price') }}</strong>
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
                      <input type="hidden" id="token_dis" name="token_admin" value="{{ csrf_token()}}">
                     {!! Form::close() !!}
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>


             
             
             
<script type="text/javascript">
       $(document).ready(function(){  
             $('select[name="category_id"]').on ('change',function(){
                        var id=$(this).val();
                        console.log(id);
                         token=$('#token_dis').val();
                         
                         if(id){
                             $.ajax({
                                    type:'post',
                                    url:'{{URL::to("/get/item/name")}}',
                                         data:{
                                                id:id ,
                                                _token:token
                                               },

                                    success:function(response)
                                            {
                                              
                                               // console.log(response);
                                          $('#item').html(response);
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