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
                     
                     {!! Form::open(['url'=>'/dashboard/daily/exp/save','method'=>'POST','class'=>'form-horizontal form-label-left']) !!}    
                        <!-- Category name -->

                        <div class="form-group"><div class="col-md-12 col-sm-12 col-xs-12"><select name="category_id[]" id="category_id[]" class="form-control category_data">  @foreach($get_all_category_info as $categoryInfo)  <option value="{{ $categoryInfo ->expences_categoris_id }}">{{ $categoryInfo ->expences_categoris_name }}</option> @endforeach </select> </div>  </div>
                       <table class="table table-responsive table-bordered" id="item_table">
                            <thead>
                                <tr>
                                    <th width="6%">#</th>
                                    <th width="21%">Categoty Name</th>
                                    <th width="17%">Item Name</th>
                                    <th width="15%">Item Quantity</th>
                                    <th width="15%" >Unit Price</th>
                                    <th width="15%">Amount</th>
                                    <th width="5%">
                                        <button type="button" name="add" class="btn btn-success btn-sm add"><span class="glyphicon glyphicon-plus"></span></button>      
                                    </th>
                                </tr>
                            </thead>
                            
                            <tbody>
                        
                            </tbody>
                       
                     
 </table>
                 
                    
                        <div align="center">
                          <input type="submit" name="submit" class="btn btn-info" value="Save" />
                        </div>
                            {!! Form::close() !!}
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      

<script>
$(document).ready(function(){
  //   part -1 (add)
 
 

        var number_count = 1; 
    $(document).on('click', '.add', function(){
        var html="";  
        html += '<tr>';
        html += '<td>';
        html += number_count++;
        html += '</td>';
        html += '<td><div class="form-group"><div class="col-md-12 col-sm-12 col-xs-12"><select name="category_id[]" id="category_id[]" class="form-control category_data">  @foreach($get_all_category_info as $categoryInfo)  <option value="{{ $categoryInfo ->expences_categoris_id }}">{{ $categoryInfo ->expences_categoris_name }}</option> @endforeach </select> </div>  </div>  </td>';

        html += '<td><div class="form-group"><div class="col-md-12 col-sm-12 col-xs-12"> <select name="item_id[]" class="form-control">  <option value="0">Select Iem</option>  <option value="01">name</option>  </select> </div>  </div>  </td>';
  
        html += '<td><div class="form-group"> <div class="col-md-12 col-sm-12 col-xs-12"> <input type="number" id="item_quantity[]" name="item_quantity[]"  required class="form-control" >    </div></td>';

        html += '<td><div class="form-group"> <div class="col-md-12 col-sm-12 col-xs-12"> <input type="number" id="item_unit_price[]" name="item_unit_price[]"  required class="form-control" >    </div></td>';
      
        html += '<td><div class="form-group"> <div class="col-md-12 col-sm-12 col-xs-12"> <input type="text" id="item_amount" name="item_amount[]"  disabled class="form-control" >    </div></td>';
       
        html += '<td><button type="button" name="remove" class="btn btn-danger btn-sm remove"><span class="glyphicon glyphicon-minus"></span></button></td>';
        html +='</tr>';
  
    
  $('#item_table').append(html);
           console.log(html);
           
             
 
   });
   
//   part -2 (remove)  
 $(document).on('click', '.remove', function(){
  $(this).closest('tr').remove();
 });

   
   
   
   
   
   
   
<!-- end of ready function -->
});
</script>


     
             
             
             
<script type="text/javascript">
       $(document).ready(function(){  
             $('select[name="category_id[]"]').on ('change',function(){
                        var id='1';
                        alert (id);
                        // console.log(id);
 
             
               });
            });
</script>



 

@endsection