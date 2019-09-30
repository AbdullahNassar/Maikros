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
                    <h1 class="page-title"> الدفع</h1>
                    <ul class="breadcrumb">
                        <li><a href="{{route('site.home')}}">الرئيسية</a></li>
                        <li class="active">تم الدفع بنجاح</li>
                    </ul>
                </div><!-- end columns -->
                @elseif(Config::get('app.locale') == 'en')
                <div class="col-sm-12">
                    <h1 class="page-title">Payment</h1>
                    <ul class="breadcrumb">
                        <li><a href="{{route('site.home')}}">Home</a></li>
                        <li class="active">Payment is done successfully</li>
                    </ul>
                </div><!-- end columns -->
                @endif
            </div><!-- end row -->
        </div><!-- end container -->
    </section><!-- end page-cover -->
    <!--===== INNERPAGE-WRAPPER ====-->
    @if(Config::get('app.locale') == 'ar')
    <section class="innerpage-wrapper">
        <div id="payment-success" class="section-padding">
            <div class="container text-center">
                <div class="row">
                    <div class="col-sm-12 col-md-8 col-md-offset-2">
                        <div class="payment-success-text">
                            <h2>تم الدفع بنجاح!</h2>
                            <p>تمت تحصيل دفعتك البالغة 700 دولار بنجاح</p>
                            
                            <span><i class="fa fa-check-circle"></i></span>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <td><span><i class="fa fa-clone"></i></span>التصنيف</td>
                                            <td><span><i class="fa fa-diamond"></i></span>الاسم</td>
                                            <td><span><i class="fa fa-dollar"></i></span>السعر</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><span><i class="fa fa-plane"></i></span>رحلة طيران</td>
                                            <td>مكة الى المدينة<span class="t-date">25-09-2019</span></td>
                                            <td>$550</td>
                                        </tr>
                                        <tr>
                                            <td><span><i class="fa fa-building"></i></span>فندق</td>
                                            <td>فندق مكة<span class="t-date">25-09-2019</span></td>
                                            <td>$150</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <p>تم إرسال تفاصيل الحجز إلى بريدك الإلكتروني. يرجى التحقق من بريدك الإلكتروني لتأكيد المعاملة.</p>
                        </div>
                    </div><!-- end columns -->
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end coming-soon-text -->
    </section>
    @elseif(Config::get('app.locale') == 'en')
    <section class="innerpage-wrapper">
        <div id="payment-success" class="section-padding">
            <div class="container text-center">
                <div class="row">
                    <div class="col-sm-12 col-md-8 col-md-offset-2">
                        <div class="payment-success-text">
                            <h2>تم الدفع بنجاح!</h2>
                            <p>تمت تحصيل دفعتك البالغة 700 دولار بنجاح</p>
                            
                            <span><i class="fa fa-check-circle"></i></span>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <td><span><i class="fa fa-clone"></i></span>التصنيف</td>
                                            <td><span><i class="fa fa-diamond"></i></span>الاسم</td>
                                            <td><span><i class="fa fa-dollar"></i></span>السعر</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><span><i class="fa fa-plane"></i></span>رحلة طيران</td>
                                            <td>مكة الى المدينة<span class="t-date">25-09-2019</span></td>
                                            <td>$550</td>
                                        </tr>
                                        <tr>
                                            <td><span><i class="fa fa-building"></i></span>فندق</td>
                                            <td>فندق مكة<span class="t-date">25-09-2019</span></td>
                                            <td>$150</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <p>تم إرسال تفاصيل الحجز إلى بريدك الإلكتروني. يرجى التحقق من بريدك الإلكتروني لتأكيد المعاملة.</p>
                        </div>
                    </div><!-- end columns -->
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end coming-soon-text -->
    </section>
    @endif
@endsection
@include('site.pages.about.scripts')