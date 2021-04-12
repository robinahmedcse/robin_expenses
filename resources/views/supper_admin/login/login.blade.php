 
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title> Admin Login| </title>

        <!-- Bootstrap -->
        <link href="{{asset('public/backEnds/')}}/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="{{asset('public/backEnds/')}}/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <!-- NProgress -->
        <link href="{{asset('public/backEnds/')}}/vendors/nprogress/nprogress.css" rel="stylesheet">
        <!-- Animate.css -->
        <link href="{{asset('public/backEnds/')}}/vendors/animate.css/animate.min.css" rel="stylesheet">


        <!--    ajax jquery-->           
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.js"></script> 


        <!-- Custom Theme Style -->
        <link href="{{asset('public/backEnds/')}}/build/css/custom.min.css" rel="stylesheet">




    </head>


    <body class="login">
        <div>
            <div class="login_wrapper">
                <div class="animate form login_form">

                    <div class="">
                        <h4 class="tex text-center text-success">
                            <?php
                            $message = Session::get('exception');

                            echo $message;
                            session::put('message', '');
                            ?>
                    </div>    



                    <section class="login_content">
                        {!! Form::open(['url'=>'wp/supper/admin/login/form/check','method'=>'POST' ]) !!}
                        <h1>Login Form</h1>

                        <div>

                            <input id="email" type="email" placeholder="Please Type you Email"
                                   class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" 
                                   name="email" value="{{ old('email') }}" required autofocus 


                                   @if ($errors->has('email'))
                                   <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div>
                            <input id="password" type="password" placeholder="Please Type you Password"
                                   class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" 
                                   name="password" required>

                            @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div>


                            {{Form::submit('login',['class'=>'btn btn-default submit ','name'=>'btn'])}} 
                            <a  class="reset_pass lost" href="#"  id="myBtn">Lost your password?</a>

                        </div>

                        <div class="clearfix"></div>

                        <div class="separator">


                            <div class="clearfix"></div>
                            <br />

                            <div>
                                <h1><i class="fa fa-paw"></i> দিগপাইত শামসুল হক ডিগ্রী কলেজ</h1>

                                <p>©@php echo date("Y
                                    "); @endphp  All Rights Reserved. Privacy and Terms</p>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </section>
                </div>
            </div>
        </div>
    </div>




    <script>
$(document).ready(function () {
$("#myBtn").click(function () {
    alert("Sorry. Contact To the Developer");


});
});
    </script>


</body>
</html>
