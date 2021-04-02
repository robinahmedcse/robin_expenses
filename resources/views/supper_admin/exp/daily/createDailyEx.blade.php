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
             

                    <div class="form-group col-md-6  col-sm-6 col-xs-12 " >
                       <label class="control-label col-md-3 col-sm-3 col-xs-12">
                          Ref. NO <span class="required">*</span>
                        </label>
                       <div class="col-md-9  col-sm-9 col-xs-12 form-group">
                              <input type="text" id="ref" name="ref" value="{{ old('ref')}}" required
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
                       <input type="text" class="form-control" name="current_date" id="from_date" data-inputmask="'mask': '99/99/9999'">   
                       </div>
                    </div>




                    <div class="form-group col-md-6  col-sm-6 col-xs-12 " >
                       <label class="control-label col-md-3 col-sm-3 col-xs-12">
                          Category Name <span class="required">*</span>
                        </label>
                       <div class="col-md-9  col-sm-9 col-xs-12 form-group has-feedback">
                           <select name="category_id" id="cid" class="form-control">
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
                      
                           <select name="item_id" class="form-control" id="item" disabled >
                                </select>
                         
                       </div>
                    </div>


                    
                    <div class="form-group col-md-6  col-sm-6 col-xs-12 " >
                       <label class="control-label col-md-3 col-sm-3 col-xs-12">
                         Quantity / Times <span class="required">*</span>
                        </label>
                       <div class="col-md-9  col-sm-9 col-xs-12 form-group">
                              <input type="number" id="q" name="ref" value="{{ old('q')}}" required
                                     class="form-control{{ $errors->has('q') ? ' is-invalid' : '' }}" >   
                                @if ($errors->has('q'))
                                <span class="invalid-feedback" role="alert">
                                    <strong style="color:red">{{ $errors->first('q') }}</strong>
                                </span>
                                @endif
                       </div>
                    </div>


                    <div class="form-group col-md-6  col-sm-6 col-xs-12 " >
                       <label class="control-label col-md-3 col-sm-3 col-xs-12">
                         Amount<span class="required">*</span>
                        </label>
                       <div class="col-md-9  col-sm-9 col-xs-12 form-group">
                              <input type="number" id="amount" name="ref" value="{{ old('amount')}}" required
                                     class="form-control{{ $errors->has('amount') ? ' is-invalid' : '' }}" >   
                                @if ($errors->has('amount'))
                                <span class="invalid-feedback" role="alert">
                                    <strong style="color:red">{{ $errors->first('amount') }}</strong>
                                </span>
                                @endif
                       </div>
                    </div>

 


                    <input type="hidden" id="token_dis" name="token_admin" value="{{ csrf_token()}}">


                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-6">
                          <button type="submit" class="btn btn-success addExp">Add</button>
                        </div>
                      </div>
  
   
             
      
                  </div>
                </div>






              <!-- form input knob -->
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Input knob</h2>

                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
 
                  <table class="table table-responsive table-bordered" id="item_table">
                  <thead>
                                <tr>
                                    <th width="6%" class="text-center">#</th>
                                    <th width="21%"class="text-center" >Categoty Name</th>
                                    <th width="17%" class="text-center" >Item Name</th>
                                    <th width="15%" class="text-center" >Item Quantity</th>
                                    <th width="15%" class="text-center" >Unit Price</th>
                                    <th width="15%" class="text-center">Amount</th>
                                    <th width="5%" class="text-center">
                                         Action
                                    </th>
                                </tr>
                                </thead>   

                                <tbody>
                        
                        </tbody>

                        </table>


                     <!-- /x_content -->
                  </div>
                </div>
              </div>
              <!-- /form input knob -->



              </div>
            </div>
          </div>
        </div>

      

 


     
             
             
             
<script type="text/javascript">
       $(document).ready(function(){  
         $('select[name="category_id"]').on ('change',function(){
          var id=$(this).val();
            //  alert (id);
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
                                              
                                               console.log(response);
                                               document.getElementById("item").disabled = false;
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



<!-- add part -->
<script type="text/javascript">
$('.addExp').click(function(){
 


 alert ('denger1');

 

    ref =   $("#ref").val(); 
    alert (ref);


      from_dates = $('#from_date').val();
      alert (from_dates);  
      console.log (from_dates);
 
  
    category_id = $("#cid option:selected").val();
  // alert (category_id);
  //   console.log(category_id);
 

    
  item_id = $("#item option:selected").val();
  //  alert (item_id);
  //  console.log(item_id);

 


   qty =   $("#q").val(); 
  //  alert (qty);


  price =   $("#amount").val(); 
  //  alert (price);


  token=$('#token_dis').val();

  $.ajax({
             type:'post',
              url:'{{URL::to("/dashboard/daily/exp/store")}}',
              data:{
                     _token:token,
                     ref:ref,
                     date:from_dates,
                     category_id:category_id,
                     item_id:item_id,
                     quantity:qty,
                     price:price

                      },

               success:function(response) {
                      console.log(response);
                      $('#item_table').append(response);
                      // var number_count = 1; 
                      // $('$item_table').append("<tr>"+
                      // "<td class = 'text-center'>"+   +"<td>"+
                      // "<td class = 'text-center'>"+ response.expences_categoris_name +"<td>"+
                      // "<td class = 'text-center'>"+ response.expences_items_name +"<td>"+
                      // "<td class = 'text-center'>"+ response.expences_items_quantity +"<td>"+
                      // "<td class = 'text-center'>"+ response.daily_expences_item_price +"<td>"+
                      // "<td class = 'text-center'>"+ response.daily_expences_total +"<td>"+

                      // "</td>");




        //               var number_count = 1;
        //               var html="";  
        // html += '<tr>';
        // html += '<td>';
        // html += number_count++;
        // html += '</td>';
        // html += '<td> "+ response.expences_categoris_name +" </td>';

        // html += '<td>  </td>';
  
        // html += '<td>';

        // html += '<td></td>';
      
        // html += '<td> </td>';
       
        // html += '<td><button type="button" name="remove" class="btn btn-danger btn-sm remove"><span class="glyphicon glyphicon-minus"></span></button></td>';
        // html +='</tr>';
  
    
        // $('#item_table').append(html);
        //    console.log(html);


                       }

           });
  

   

});


</script>
 

@endsection