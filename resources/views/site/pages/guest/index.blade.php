@extends('site.layouts.master')
@section('meta')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
@endsection
@if(Config::get('app.locale') == 'ar')
    @section('title','تسجيل البيانات')
@elseif(Config::get('app.locale') == 'en')
    @section('title','Register Data')
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

    <!--Date-Picker Stylesheet-->
    <link rel="stylesheet" href="{{asset('vendors/site/AR/css/datepicker.css')}}">
        
    <!-- Slick Stylesheet -->
    <link rel="stylesheet" href="{{asset('vendors/site/AR/css/slick.css')}}">
    <link rel="stylesheet" href="{{asset('vendors/site/AR/css/slick-theme.css')}}">
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

    <!--Date-Picker Stylesheet-->
    <link rel="stylesheet" href="{{asset('vendors/site/EN/css/datepicker.css')}}">
        
    <!-- Slick Stylesheet -->
    <link rel="stylesheet" href="{{asset('vendors/site/EN/css/slick.css')}}">
    <link rel="stylesheet" href="{{asset('vendors/site/EN/css/slick-theme.css')}}">
    <link href="{{asset('vendors/toastr/toastr.min.css')}}" rel="stylesheet">
    @endif
@endsection
@section('content')
    <!--=================== PAGE-COVER =================-->
    <section class="page-cover">
        <div class="container">
            <div class="row">
                @if(Config::get('app.locale') == 'ar')
                <div class="col-sm-12">
                    <h1 class="page-title">تسجيل البيانات</h1>
                    <ul class="breadcrumb">
                        <li><a href="{{route('site.home')}}">الرئيسية</a></li>
                        <li>تسجيل البيانات</li>
                    </ul>
                </div><!-- end columns -->
                @elseif(Config::get('app.locale') == 'en')
                <div class="col-sm-12">
                    <h1 class="page-title">Register Data</h1>
                    <ul class="breadcrumb">
                        <li><a href="{{route('site.home')}}">Home</a></li>
                        <li>Register Data</li>
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
        	<div id="flight-listings" class="innerpage-section-padding">
                <div class="container">
                    <div class="row">        	
                    
                        <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
                            <div class="side-bar fullform">
                                <div class="booking-form booking-form-block">
                                    <h3>تسجيل بيانات الزائر</h3>
                                    <p>حقق حلمك معنا اليوم</p>
                                    
                                    <form>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="الاسم" required/>                                       
                                        </div>
                                        
                                        <div class="form-group">
                                            <input type="email" class="form-control" placeholder="البريد الالكتروني" required/>                                       
                                        </div>
                                        
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="الهاتف" required/>                                       
                                        </div>
                                        
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="البلد" required/>                                       
                                        </div>
                                        
                                        <button type="submit" class="btn btn-block btn-orange">تاكيد الحجز</button>
                                    </form>
    
                                </div><!-- end booking-form -->
                            </div>
                        </div><!-- end columns -->

                        <div class="col-xs-12 col-sm-12 col-md-3 side-bar left-side-bar">
                                        
                            <ul class="umrahtak">
                                <li><a href="#" class="btn btn-o-border btn-block btn-lg">الفنادق <span><i class="fa fa-check"></i></span> </a></li>
                                <li><a href="{{route('site.serviceSearch')}}" class="btn btn-o-border btn-block btn-lg"> الخدمات <span><i class="fa fa-plus-circle"></i></span></a></li>
                            </ul>
                            
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 col-md-12">
                                    <div class="side-bar-block main-block">
                                        <div class="main-img ad-img">
                                            <a href="#">
                                                <img src="{{asset('vendors/site/EN/images/car-ad.jpg')}}" class="img-responsive" />
                                                <div class="ad-mask">
                                                    <div class="ad-text">
                                                        <span>الترفيه</span>
                                                        <h2>السيارة</h2>
                                                        <span>عرض</span>
                                                    </div><!-- end ad-text -->
                                                </div><!-- end columns -->
                                            </a>
                                        </div><!-- end ad-img -->
                                    </div><!-- end side-bar-block -->
                                </div><!-- end columns -->
                                
                                <div class="col-xs-12 col-sm-6 col-md-12">    
                                    <div class="side-bar-block support-block">
                                        <h3>تحتاج مساعدة؟</h3>
                                        <p>{{$data->get('about_head_ar')}}</p>
                                        <div class="support-contact">
                                            <span><i class="fa fa-phone"></i></span>
                                            <p>{{$contact->get('phone')}}</p>
                                        </div><!-- end support-contact -->
                                    </div><!-- end side-bar-block -->
                                </div><!-- end columns -->
                            </div><!-- end row -->
                        </div><!-- end columns -->
                        
                    </div><!-- end row -->
                </div><!-- end container -->
            </div><!-- end flight-listings -->
        </section><!-- end innerpage-wrapper -->
    @elseif(Config::get('app.locale') == 'en')
    <!--===== INNERPAGE-WRAPPER ====-->
    <section class="innerpage-wrapper">
        <div id="flight-listings" class="innerpage-section-padding">
            <div class="container">
                <div class="row">        	
                
                    <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
                        <div class="side-bar fullform">
                            <div class="booking-form booking-form-block">
                                <h3>Register Guest Data</h3>
                                <p>Achieve your dream with us today</p>
                                
                                <form>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Name" required/>                                       
                                    </div>
                                    
                                    <div class="form-group">
                                        <input type="email" class="form-control" placeholder="Email" required/>                                       
                                    </div>
                                    
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Phone" required/>                                       
                                    </div>
                                    
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Country" required/>                                       
                                    </div>
                                    
                                    <button type="submit" class="btn btn-block btn-orange">Confirm Booking</button>
                                </form>

                            </div><!-- end booking-form -->
                        </div>
                    </div><!-- end columns -->

                    <div class="col-xs-12 col-sm-12 col-md-3 side-bar left-side-bar">
                                    
                        <ul class="umrahtak">
                            <li><a href="#" class="btn btn-o-border btn-block btn-lg">Hotels <span><i class="fa fa-check"></i></span> </a></li>
                            <li><a href="{{route('site.serviceSearch')}}" class="btn btn-o-border btn-block btn-lg"> Services <span><i class="fa fa-plus-circle"></i></span></a></li>
                        </ul>
                        
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-12">
                                <div class="side-bar-block main-block ">
                                    <div class="main-img ad-img">
                                        <a href="#">
                                            <img src="{{asset('vendors/site/EN/images/car-ad.jpg')}}" class="img-responsive" alt="car-ad" />
                                            <div class="ad-mask">
                                                <div class="ad-text">
                                                    <span>Luxury</span>
                                                    <h2>Car</h2>
                                                    <span>Offer</span>
                                                </div><!-- end ad-text -->
                                            </div><!-- end columns -->
                                        </a>
                                    </div><!-- end ad-img -->
                                </div><!-- end side-bar-block -->
                            </div><!-- end columns -->
                            
                            <div class="col-xs-12 col-sm-6 col-md-12">    
                                <div class="side-bar-block support-block">
                                    <h3>Need Help?</h3>
                                    <p>{{$data->get('about_head_en')}}</p>
                                    <div class="support-contact">
                                        <span><i class="fa fa-phone"></i></span>
                                        <p>{{$contact->get('phone')}}</p>
                                    </div><!-- end support-contact -->
                                </div><!-- end side-bar-block -->
                            </div><!-- end columns -->
                    
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end flight-listings -->
    </section><!-- end innerpage-wrapper -->
    @endif
@endsection
@include('site.pages.hotel_search.scripts')