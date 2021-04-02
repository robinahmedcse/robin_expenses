<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title> Admin Registration|দিগপাইত শামসুল হক ডিগ্রী কলেজ </title>

        <!-- Bootstrap -->
        <link href="{{asset('public/backEnds/')}}/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="{{asset('public/backEnds/')}}/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <!-- NProgress -->
        <link href="{{asset('public/backEnds/')}}/vendors/nprogress/nprogress.css" rel="stylesheet">
        <!-- Animate.css -->
        <link href="{{asset('public/backEnds/')}}/vendors/animate.css/animate.min.css" rel="stylesheet">

        <!-- Custom Theme Style -->
        <link href="{{asset('public/backEnds/')}}/build/css/custom.min.css" rel="stylesheet">
    </head>

    <body class="login">
        <div>
            <a class="hiddenanchor" id="signup"></a>
            <a class="hiddenanchor" id="signin"></a>

            <div class="login_wrapper">
                <div class="animate form login_form">
                    <section class="login_content">
                    
                        {!! Form::open(['url'=>'wp/supper/admin/reg/save','method'=>'POST' ]) !!}
                              @csrf
                              
                        <h1>Registration Form</h1>
                        

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">First Name</label>

                            <div class="col-md-8">
                                <input id="name" type="text" class="form-control{{ $errors->has('admin_f_name') ? ' is-invalid' : '' }}" 
                                       name="admin_f_name" value="{{ old('admin_f_name') }}" required autofocus>

                                @if ($errors->has('admin_f_name'))
                                <span class="invalid-feedback" role="alert" style="color:red";>
                                        <strong>{{ $errors->first('admin_f_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        
                           <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Last Name</label>

                            <div class="col-md-8">
                                <input id="name" type="text" class="form-control{{ $errors->has('admin_l_name') ? ' is-invalid' : '' }}" 
                                       name="admin_l_name" value="{{ old('admin_l_name') }}" required autofocus>

                                @if ($errors->has('admin_l_name'))
                                    <span class="invalid-feedback" role="alert" style="color:red";>
                                        <strong>{{ $errors->first('admin_l_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        
                              <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Username</label>

                            <div class="col-md-8">
                                <input id="name" type="text" class="form-control{{ $errors->has('admin_username') ? ' is-invalid' : '' }}" 
                                       name="admin_username" value="{{ old('admin_username') }}" required autofocus>

                                @if ($errors->has('admin_username'))
                                <span class="invalid-feedback" role="alert" style="color:red";>                                
                                        <strong>{{ $errors->first('admin_username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        
                         
                              <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Phone Number</label>

                            <div class="col-md-8">
                                <input id="name" type="text" class="form-control{{ $errors->has('admin_phone') ? ' is-invalid' : '' }}" 
                                       name="admin_phone" value="{{ old('admin_phone') }}" required autofocus>

                                @if ($errors->has('admin_phone'))
                                <span class="invalid-feedback" role="alert" style="color:red";>
                                        <strong>{{ $errors->first('admin_phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        
                        
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right"> Email</label>

                            <div class="col-md-8">
                                <input id="email" type="email" class="form-control{{ $errors->has('admin_email') ? ' is-invalid' : '' }}" 
                                       name="admin_email" value="{{ old('admin_email') }}" required autofocus>

                                @if ($errors->has('admin_email'))
                                <span class="invalid-feedback" role="alert" style="color:red";>                              
                                        <strong>{{ $errors->first('admin_email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        
                        
                        

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                            <div class="col-md-8">
                                <input id="password" type="password" class="form-control{{ $errors->has('admin_password') ? ' is-invalid' : '' }}" 
                                       name="admin_password" required >

                                @if ($errors->has('admin_password'))
                                <span class="invalid-feedback" role="alert" style="color:red";>
                                        <strong>{{ $errors->first('admin_password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
              
 
                      
                        <br>
                          <div>
                          {{Form::submit('Save',
                              ['class'=>'btn btn-default ','name'=>'btn'])}} 
                        </div>
                        

                        <div class="clearfix"></div>

                        <div class="separator">
                            <br />

                            <div>
                                <h1><i class="fa fa-paw"></i> দিগপাইত শামসুল হক ডিগ্রী কলেজ</h1>
                                  <p>©2019 All Rights Reserved. দিগপাইত শামসুল হক ডিগ্রী কলেজ ! is a Educational Site. Privacy and Terms</p>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </section>
                </div>

            </div>
        </div>
    </body>
</html>
