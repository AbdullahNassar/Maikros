@extends('site.layouts.master')
@section('meta')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
@endsection
@if(Config::get('app.locale') == 'ar')
    @section('title','مايكروس')
@elseif(Config::get('app.locale') == 'en')
    @section('title','Maikros')
@endif
@section('styles')
    @if(Config::get('app.locale') == 'ar')
    <!-- Google Fonts -->	
    <link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i,700,700i,900,900i%7CMerriweather:300,300i,400,400i,700,700i,900,900i" rel="stylesheet">
        
    <!-- Bootstrap Stylesheet -->	
    <link rel="stylesheet" href="{{asset('vendors/site/AR/css/bootstrap.min.css')}}">

    <!-- Font Awesome Stylesheet -->
    <link rel="stylesheet" href="{{asset('vendors/site/AR/css/font-awesome.min.css')}}">
        
    <!-- Custom Stylesheets -->	
    <link rel="stylesheet" href="{{asset('vendors/site/AR/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('vendors/site/AR/css/responsive.css')}}">

    <!-- Owl Carousel Stylesheet -->
    <link rel="stylesheet" href="{{asset('vendors/site/AR/css/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('vendors/site/AR/css/owl.theme.css')}}">

    <!-- Magnific Gallery -->
    <link rel="stylesheet" href="{{asset('vendors/site/AR/css/magnific-popup.css')}}">
    <link href="{{asset('vendors/toastr/toastr.min.css')}}" rel="stylesheet">

    @elseif(Config::get('app.locale') == 'en')
    <!-- Google Fonts -->	
    <link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i,700,700i,900,900i%7CMerriweather:300,300i,400,400i,700,700i,900,900i" rel="stylesheet">
        
    <!-- Bootstrap Stylesheet -->	
    <link rel="stylesheet" href="{{asset('vendors/site/EN/css/bootstrap.min.css')}}">

    <!-- Font Awesome Stylesheet -->
    <link rel="stylesheet" href="{{asset('vendors/site/EN/css/font-awesome.min.css')}}">
        
    <!-- Custom Stylesheets -->	
    <link rel="stylesheet" href="{{asset('vendors/site/EN/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('vendors/site/EN/css/responsive.css')}}">

    <!-- Owl Carousel Stylesheet -->
    <link rel="stylesheet" href="{{asset('vendors/site/EN/css/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('vendors/site/EN/css/owl.theme.css')}}">

    <!-- Magnific Gallery -->
    <link rel="stylesheet" href="{{asset('vendors/site/EN/css/magnific-popup.css')}}">
    <link href="{{asset('vendors/toastr/toastr.min.css')}}" rel="stylesheet">
    @endif
@endsection
@section('content')
    <!--============= PAGE-COVER =============-->
    <section class="page-cover">
        <div class="container">
            <div class="row">
                @if(Config::get('app.locale') == 'ar')
                <div class="col-sm-12">
                    <h1 class="page-title"> تسجيل حساب جديد</h1>
                    <ul class="breadcrumb">
                        <li><a href="{{route('site.home')}}">الرئيسية</a></li>
                        <li class="active">تسجيل حساب جديد</li>
                    </ul>
                </div><!-- end columns -->
                @elseif(Config::get('app.locale') == 'en')
                <div class="col-sm-12">
                    <h1 class="page-title">Register New Account</h1>
                    <ul class="breadcrumb">
                        <li><a href="{{route('site.home')}}">Home</a></li>
                        <li class="active">Register New Account</li>
                    </ul>
                </div><!-- end columns -->
                @endif
            </div><!-- end row -->
        </div><!-- end container -->
    </section><!-- end page-cover -->
    <!--===== INNERPAGE-WRAPPER ====-->
    @if(Config::get('app.locale') == 'ar')
        <!--===== INNERPAGE-WRAPPER ====-->
        <section class="innerpage-wrapper">
        	<div class="innerpage-section-padding">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                        	<div class="flex-content">
                                <div class="custom-form custom-form-fields">
                                    <h3>تسجيل حساب جديد</h3>
                                    <p>{{$data->get('contact_ar')}}</p>
                                    <form id="register_form" method="post">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <select class="form-control" name="type" id="type">
                                                <option value="user" selected>زائر</option>
                                                <option value="hotel">فندق</option>
                                                <option value="multi">شركة سياحة</option>
                                                <option value="company">شركة برامج سياحية</option>
                                                <option value="services">شركة خدمات سياحية</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                             <input type="text" class="form-control" placeholder="الاسم كامل"  name="name"/>
                                             <span><i class="fa fa-user"></i></span>
                                        </div>
                                        <div class="form-group">
                                             <input type="email" class="form-control" placeholder="البريد الالكترونى"  name="email"/>
                                             <span><i class="fa fa-user"></i></span>
                                        </div>
                                        <div class="form-group">
                                             <input type="text" class="form-control" placeholder="اسم المستخدم"  name="username"/>
                                             <span><i class="fa fa-user"></i></span>
                                        </div>
                                        
                                        <div class="form-group">
                                             <input type="password" class="form-control" placeholder="كلمة المرور"  name="password"/>
                                             <span><i class="fa fa-lock"></i></span>
                                        </div>
                                        
                                        <button type="submit" class="btn btn-orange btn-block">تسجيل</button>
                                    </form>
                                    <div class="other-links">
                                    	<p class="link-line">هل لديك حساب بالفعل ؟ <a href="{{ route('site.login') }}">دخول</a></p>
                                    </div>
                                </div><!-- end custom-form -->
                                
                                <div class="flex-content-img custom-form-img">
                                    <img src="{{asset('vendors/site/EN/images/registration.jpg')}}" class="img-responsive" alt="registration-img" />
                                </div><!-- end custom-form-img -->
                            </div><!-- end form-content -->
                            
                        </div><!-- end columns -->
                    </div><!-- end row -->
                </div><!-- end container -->         
            </div><!-- end register -->
        </section><!-- end innerpage-wrapper -->
    @elseif(Config::get('app.locale') == 'en')
    <!--===== INNERPAGE-WRAPPER ====-->
        <section class="innerpage-wrapper">
        	<div id="register" class="innerpage-section-padding">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                        	<div class="flex-content">
                                <div class="custom-form custom-form-fields">
                                    <h3>Register New Account</h3>
                                    <p>{{$data->get('contact_en')}}</p>
                                    <form id="register_form" method="post">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <select class="form-control" name="type" id="type">
                                                <option value="user" selected>Visitor</option>
                                                <option value="hotel">Hotel</option>
                                                <option value="multi">Company Of Tourism</option>
                                                <option value="company">Company Of Tourist Programs</option>
                                                <option value="services">Company Of Tourist Services</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                             <input type="text" class="form-control" placeholder="Name"  name="name"/>
                                             <span><i class="fa fa-user"></i></span>
                                        </div>
                                        <div class="form-group">
                                             <input type="email" class="form-control" placeholder="Email"  name="email"/>
                                             <span><i class="fa fa-user"></i></span>
                                        </div>
                                        <div class="form-group">
                                             <input type="text" class="form-control" placeholder="UserName"  name="username"/>
                                             <span><i class="fa fa-user"></i></span>
                                        </div>
                                        
                                        <div class="form-group">
                                             <input type="password" class="form-control" placeholder="Password"  name="password"/>
                                             <span><i class="fa fa-lock"></i></span>
                                        </div>
                                        
                                        <button type="submit" class="btn btn-orange btn-block">Register</button>
                                    </form>
                                    <div class="other-links">
                                    	<p class="link-line">Do you have account ?   <a href="{{ route('site.login') }}">Login</a></p>
                                    </div>
                                </div><!-- end custom-form -->
                                
                                <div class="flex-content-img custom-form-img">
                                    <img src="{{asset('vendors/site/EN/images/registration.jpg')}}" class="img-responsive" alt="registration-img" />
                                </div><!-- end custom-form-img -->
                            </div><!-- end form-content -->
                            
                        </div><!-- end columns -->
                    </div><!-- end row -->
                </div><!-- end container -->         
            </div><!-- end register -->
        </section><!-- end innerpage-wrapper -->
    @endif
@endsection
@include('site.pages.register.scripts')