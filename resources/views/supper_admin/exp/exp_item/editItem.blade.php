@extends('admin.master')
@section('title','Edit News Information')


@section('x')

<?php
//var_dump($categoryById);
//die();
?>

<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3> সংবাদ সম্পাদন করুন </h3>
            </div>
        </div>

        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2><small></small></h2>
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

                        {!! Form::open(['url'=>'admin/news/update','method'=>'POST','name'=>'myForm','class'=>'form-horizontal form-label-left']) !!}    
                        <!-- Category name -->


                        <input type="hidden" value="{{$news_by_id->newsId}}" name="news_Id" class="form-control col-md-7 col-xs-12" required>

 
						
						     <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="newsDescription">সংবাদের বিবরন <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <textarea class='form-control' name='newsDescription' row='8'>{{$news_by_id->newsDescription}}</textarea>
                       <span class="text-danger">{{$errors->has('newsDescription')? $errors->first('newsDescription'):''}}</span>
                </div>
            </div> 
					



                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">সংবাদের অবস্থা</label>
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                 
                                <select name="publicationStatus" class="form-control" required>
                                    <option value="null">সংবাদের অবস্থা নিধারন করুন  </option>
                                    <option value="1">প্রকাশিত</option>
                                    <option value="0">অপ্রকাশিত</option>
                                </select>
                            </div>
                        </div>    




                        <div class="ln_solid"></div>

                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3"> 
                                <input type="submit" name='btn' value="হালনাগাত" class="btn btn-success">
                            </div>
                        </div>

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
      document.forms['myForm'].elements['publicationStatus'].value={{$news_by_id->publicationStatus}};
</script>   

@endsection