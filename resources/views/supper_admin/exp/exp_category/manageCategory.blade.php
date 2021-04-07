@extends('supper_admin.master')

@section('title','Category Type Info')



@section('x')
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>All  <small>Category type info</small></h3>
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
            <div class="clearfix"></div>

            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">

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
                    <div class="">
                        <h4 class="tex text-center text-success">
                            <?php
                            echo Session::get('Save');
                            session::put('Save', '');
                            ?>
                        </h4>
                        <br><br>
                    </div> 
                    <div class="x_content">
                    <div align='right'>
                            <a href="{{URL::to('dashboard/exp/category/add')}}">
                                 <button type="button" class="btn btn-success btn-info">
                                     Add exp. category 
                                 </button>
                             </a> 
                     </div>

                    <table id="datatable-keytable" class="table table-striped table-bordered"">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Category Type Name</th>
                                    <th>Status</th>
                                    <th> </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1;?>
                                @foreach($get_all_cate_info as $categori_info)
                                <tr>
                                    <th scope="row">  <?php echo $i;?></th>
                                    <td>{{$categori_info->expences_categoris_name}}</td>
                                 



                                    <td>{{$categori_info->expences_categoris_status ==1?'Publish':'Un-publish' }}</td>
                                    <td>

                                        <?php if ($categori_info->expences_categoris_status == 1) { ?>
                                            <a href="{{URL::to('admin/news/unpublished/'.$categori_info ->expences_categoris_id)}}" class="btn btn-warning">
                                                <span class="glyphicon glyphicon-arrow-down"></span>Publish
                                            </a> 
                                        <?php } else { ?>
                                            <a href="{{URL::to('admin/news/published/'.$categori_info ->expences_categoris_id)}}" class="btn btn-info">
                                                <span class="glyphicon glyphicon-arrow-up"></span>Un-publish  
                                            </a>
                                        <?php } ?>

                                        <a href="{{URL::to('admin/news/edit/'.$categori_info ->expences_categoris_id)}}" class="btn btn-success">
                                            <span class="glyphicon glyphicon-edit"></span>
                                        </a> 

                                        <a href="{{URL::to('admin/news/delete/'.$categori_info ->expences_categoris_id)}}" class="btn btn-danger"  onclick="return one_delete();">
                                            <span class="glyphicon glyphicon-trash"></span>
                                        </a>


                                    </td>  
                                </tr> 
                                 <?php $i++;?>
                                @endforeach()
                            </tbody>
                            
                        </table>

                    </div>
                </div>
            </div>




            <div class="clearfix"></div>


        </div>
    </div>
</div>
@endsection