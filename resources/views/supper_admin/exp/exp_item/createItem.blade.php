@extends('supper_admin.master')
@section('title','Add New item')


@section('x')
  <!-- page content -->
  <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Add Item</h3>
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
              <div class="col-md-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Add expences item <small> </small></h2>
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

                
                 <input type="hidden" id="token_dis" name="token_admin" value="{{ csrf_token()}}">
                    

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

              <div class="col-md-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>View expences list <small>by Category</small></h2>
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
                     
                   

                  <div id='item' ></div>

                
                  </div>
                </div>
              </div>


         

  
          </div>
        </div>
        </div>
        <!-- /page content -->










 <script type="text/javascript">
    $(document).ready(function () {
        $('select[name="category_id"]').on('change', function () {
            var id = $(this).val();
          //   alert (id);
            token = $('#token_dis').val();

            // alert (token);
            if (id) {
                $.ajax({
                    type: 'get',
                    url: '{{URL::to("/dashboard/exp/item/add/all/item/name")}}',
                    data: {
                        id: id,
                        _token: token
                    },

                    success: function (response)
                    {

                        console.log(response);
                        $('#item').html(response);
                    }

                });
            } else {
                alert('Danger');
            }

        });
    });
</script> 


@endsection