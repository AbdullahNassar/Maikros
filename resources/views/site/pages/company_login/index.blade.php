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
                    <h1 class="page-title">تسجيل الدخول</h1>
                    <ul class="breadcrumb">
                        <li><a href="{{route('site.home')}}">الرئيسية</a></li>
                        <li class="active">تسجيل الدخول</li>
                    </ul>
                </div><!-- end columns -->
                @elseif(Config::get('app.locale') == 'en')
                <div class="col-sm-12">
                    <h1 class="page-title">Login</h1>
                    <ul class="breadcrumb">
                        <li><a href="{{route('site.home')}}">Home</a></li>
                        <li class="active">Login</li>
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
                                    <h3>تسجيل الدخول</h3>
                                    <p>{{$data->get('contact_ar')}}</p>
                                    <form method="POST" class="login-form" action="{{ route('site.postlogin') }}">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                             <input type="text" class="form-control" placeholder="اسم المستخدم"  name="username"/>
                                             <input type="hidden" name="type" value="multi"/>
                                             <span><i class="fa fa-user"></i></span>
                                        </div>
                                        
                                        <div class="form-group">
                                             <input type="password" class="form-control" placeholder="كلمة المرور"  name="password"/>
                                             <span><i class="fa fa-lock"></i></span>
                                        </div>
                                        
                                        <button type="submit" class="btn btn-orange btn-block btn2">دخول</button>
                                    </form>
                                    
                                    <div class="other-links">
                                    	<p class="link-line">انشاء حساب جديد ؟ <a href="{{route('site.companyregister')}}">        تسجيل </a></p>
                                        <a class="simple-link" href="{{route('site.forget')}}">هل نسيت كلمة المرور ؟</a><hr>
                                        <div class="alerts-success" style="display: none; color: #000000;"><span style="color: #000000;" class="element2" role="alert">تم تسجيل الدخول بنجاح</span></div>
                                        <div class="alerts-danger" style="display: none; color: #000000;"><span style="color: #000000;" class="element2" role="alert">حدث خطأ , يرجى اعادة المحاولة</span></div>
                                    </div><!-- end other-links -->
                                </div><!-- end custom-form -->
                                
                                <div class="flex-content-img custom-form-img">
                                    <img src="{{asset('vendors/site/EN/images/login.jpg')}}" class="img-responsive" alt="registration-img" />
                                </div><!-- end custom-form-img -->
                            </div><!-- end form-content -->
                            
                        </div><!-- end columns -->
                    </div><!-- end row -->
                </div><!-- end container -->         
            </div><!-- end login -->
        </section><!-- end innerpage-wrapper -->
    @elseif(Config::get('app.locale') == 'en')
    <!--===== INNERPAGE-WRAPPER ====-->
        <section class="innerpage-wrapper">
        	<div id="login" class="innerpage-section-padding">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                        	<div class="flex-content">
                                <div class="custom-form custom-form-fields">
                                    <h3>Login</h3>
                                    <p>{{$data->get('contact_en')}}</p>
                                    <form method="POST" class="login-form" action="{{ route('site.postlogin') }}">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                             <input type="text" class="form-control" placeholder="UserName"  name="username"/>
                                             <input type="hidden" name="type" value="multi"/>
                                             <span><i class="fa fa-user"></i></span>
                                        </div>
                                        
                                        <div class="form-group">
                                             <input type="password" class="form-control" placeholder="Password"  name="password"/>
                                             <span><i class="fa fa-lock"></i></span>
                                        </div>
                                        
                                        <button type="submit" class="btn btn-orange btn-block btn2">Login</button>
                                    </form>
                                    
                                    <div class="other-links">
                                    	<p class="link-line">Sign Up ?    <a href="{{route('site.companyregister')}}"> Register </a></p>
                                        <a class="simple-link" href="{{route('site.forget')}}">Forget Password ?</a><hr>
                                        <div class="alerts-success" style="display: none; color: #000000;"><span style="color: #000000;" class="element2" role="alert">Now you are logged in!</span></div>
                                        <div class="alerts-danger" style="display: none; color: #000000;"><span style="color: #000000;" class="element2" role="alert">Error, please enter valid information</span></div>
                                    </div><!-- end other-links -->
                                </div><!-- end custom-form -->
                                
                                <div class="flex-content-img custom-form-img">
                                    <img src="{{asset('vendors/site/EN/images/login.jpg')}}" class="img-responsive" alt="registration-img" />
                                </div><!-- end custom-form-img -->
                            </div><!-- end form-content -->
                            
                        </div><!-- end columns -->
                    </div><!-- end row -->
                </div><!-- end container -->         
            </div><!-- end login -->
        </section><!-- end innerpage-wrapper -->
    @endif
@endsection
@include('site.pages.company_login.scripts')