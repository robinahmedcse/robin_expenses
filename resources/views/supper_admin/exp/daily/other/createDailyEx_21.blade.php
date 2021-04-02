@extends('supper_admin.master')
@section('title','Add Daily Exprences')


@section('x')

     <!-- page content -->
     <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
              <h2>Daily Exprences<small> Add From</small></h2>
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
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Add <small>Exprences </small></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">



                    <div class="form-group col-md-6  col-sm-6 col-xs-12 " >
                       <label class="control-label col-md-3 col-sm-3 col-xs-12">
                          Ref. NO <span class="required">*</span>
                        </label>
                       <div class="col-md-9  col-sm-9 col-xs-12 form-group">
                              <input type="text" id="" name="ref" value="{{ old('ref')}}" required
                                     class="form-control{{ $errors->has('ref') ? ' is-invalid' : '' }}" >   
                                @if ($errors->has('ref'))
                                <span class="invalid-feedback" role="alert">
                                    <strong style="color:red">{{ $errors->first('ref') }}</strong>
                                </span>
                                @endif
                       </div>
                    </div>




                    <div class="form-group col-md-6  col-sm-6 col-xs-12 " >
                       <label class="control-label col-md-3 col-sm-3 col-xs-12">
                          Date <span class="required">*</span>
                        </label>
                       <div class="col-md-9  col-sm-9 col-xs-12 form-group">
                       <input type="text" class="form-control" data-inputmask="'mask': '99/99/9999'">
                           
                       </div>
                    </div>




                    <div class="form-group col-md-6  col-sm-6 col-xs-12 " >
                       <label class="control-label col-md-3 col-sm-3 col-xs-12">
                          Category Name <span class="required">*</span>
                        </label>
                       <div class="col-md-9  col-sm-9 col-xs-12 form-group has-feedback">
                           <select name="category_id" class="form-control">
                                   <option value="">----Select Category----</option>
                                 @foreach($get_all_category_info as $categoryInfo)
                                    <option value="{{ $categoryInfo ->expences_categoris_id }}">{{ $categoryInfo ->expences_categoris_name }}</option>
                                 @endforeach
                            </select>
                       </div>
                    </div>




                    <div class="form-group col-md-6  col-sm-6 col-xs-12 " >
                       <label class="control-label col-md-3 col-sm-3 col-xs-12">
                          Item Name <span class="required">*</span>
                        </label>
                       <div class="col-md-9  col-sm-9 col-xs-12 form-group">
                           <select name="category_id" class="form-control">
                                   <option value="">----Select Category----</option>
                                 @foreach($get_all_category_info as $categoryInfo)
                                    <option value="{{ $categoryInfo ->expences_categoris_id }}">{{ $categoryInfo ->expences_categoris_name }}</option>
                                 @endforeach
                            </select>
                       </div>
                    </div>


                    
                    <div class="form-group col-md-6  col-sm-6 col-xs-12 " >
                       <label class="control-label col-md-3 col-sm-3 col-xs-12">
                          Quantity <span class="required">*</span>
                        </label>
                       <div class="col-md-9  col-sm-9 col-xs-12 form-group">
                              <input type="number" id="t_name" name="quantity" value="{{ old('quantity')}}" required
                                     class="form-control{{ $errors->has('quantity') ? ' is-invalid' : '' }}" >   
                                @if ($errors->has('quantity'))
                                <span class="invalid-feedback" role="alert">
                                    <strong style="color:red">{{ $errors->first('quantity') }}</strong>
                                </span>
                                @endif
                           
                       </div>
                    </div>




                    <div class="form-group col-md-6  col-sm-6 col-xs-12 " >
                       <label class="control-label col-md-3 col-sm-3 col-xs-12">
                          Unit Price <span class="required">*</span>
                        </label>
                       <div class="col-md-9  col-sm-9 col-xs-12 form-group">
                           <input type="number" id="t_name" name="price" value="{{ old('price')}}" required
                                  class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" >   

                                @if ($errors->has('price'))
                                <span class="invalid-feedback" role="alert">
                                    <strong style="color:red">{{ $errors->first('price') }}</strong>
                                </span>
                                @endif
                       </div>
                    </div>
 


                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-6">
                          <button type="submit" class="btn btn-success">Add</button>
                        </div>
                      </div>
 
                    </form>










                  </div>
                </div>
              </div>
            </div>



              <!-- form input knob -->
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Input knob</h2>
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
                    <div class="col-md-2">
                      <p>Display value</p>
                      <input class="knob" data-width="100" data-height="120" data-min="-100" data-displayPrevious=true data-fgColor="#26B99A" value="44">
                    </div>
                    <div class="col-md-2">
                      <p>&#215; 'cursor' mode</p>
                      <input class="knob" data-width="100" data-height="120" data-cursor=true data-fgColor="#34495E" value="29">
                    </div>
                    <div class="col-md-2">
                      <p>Step 0.1</p>
                      <input class="knob" data-width="100" data-height="120" data-min="-10000" data-displayPrevious=true data-fgColor="#26B99A" data-max="10000" data-step=".1" value="0">
                    </div>
                    <div class="col-md-2">
                      <p>Angle arc</p>
                      <input class="knob" data-width="100" data-height="120" data-angleOffset=-125 data-angleArc=250 data-fgColor="#34495E" data-rotation="anticlockwise" value="35">
                    </div>
                    <div class="col-md-2">
                      <p>Alternate design</p>
                      <input class="knob" data-width="110" data-height="120" data-displayPrevious=true data-fgColor="#26B99A" data-skin="tron" data-thickness=".2" value="75">
                    </div>
                    <div class="col-md-2">
                      <p>Angle offset</p>
                      <input class="knob" data-width="100" data-height="120" data-angleOffset=90 data-linecap=round data-fgColor="#26B99A" value="35">
                    </div>
                  </div>
                </div>
              </div>
              <!-- /form input knob -->

            </div>



 




   </div>
 
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->    







<script type ="text/javascript">
  //$(document).ready();

 // $(document).ready(function(){});


//  $(document).ready(function(){
//     $('select[name="category_id"]').on('change', function (){
//       var id='1';
//                         alert (id);
//     });

//  });


<script>






 
@endsection