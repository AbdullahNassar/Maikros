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
                    <h1 class="page-title">مكاتبنا</h1>
                    <ul class="breadcrumb">
                        <li><a href="{{route('site.home')}}">الرئيسية</a></li>
                        <li class="active">مكاتبنا</li>
                    </ul>
                </div><!-- end columns -->
                @elseif(Config::get('app.locale') == 'en')
                <div class="col-sm-12">
                    <h1 class="page-title">Our Offices</h1>
                    <ul class="breadcrumb">
                        <li><a href="{{route('site.home')}}">Home</a></li>
                        <li class="active">Our Offices</li>
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
                <div>
                    <div id="about-content" class="section-padding"> 
                        <div class="container">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 content-side tvl-insurance-info">
                                    <div class="space-right">
                                        <div class="insurance-desc mg-bot-60">
                                            <div class="innerpage-heading">
                                                <h1>نبذة عن مكاتبنا</h1>
                                                <p>{{$data->get('contact_ar')}}</p>
                                            </div><!-- end innerpage-heading -->
                                            <div class="row">
                                                @foreach($offices as $office)
                                                <div class="col-xs-12 col-sm-6 col-md-4">
                                                    <div class="main-block flight-block">
                                                        <a href="#">                                       
                                                            <div class="flight-info">
                                                                <div class="flight-title">
                                                                    <h3>
                                                                        <span class="flight-destination">{{$office->country_ar}}</span>|<span class="flight-type">{{$office->office_name_ar}}</span>
                                                                        <img src="{{asset('storage/uploads/office/'.$office->image)}}" alt="" />
                                                                    </h3>
                                                                </div><!-- end flight-title -->
                                                                
                                                                <div class=" flight-timing">
                                                                    <ul class="list-unstyled">
                                                                        <li><span><i class="fa fa-map-marker"></i></span>{{$office->address_ar}}</li>
                                                                        <li><span><i class="fa fa-phone"></i></span><span class="Lato">{{$office->phone}}</span></li>
                                                                    </ul>
                                                                </div><!-- end flight-timing -->
                                                            </div><!-- end flight-info -->
                                                        </a>
                                                    </div><!-- end flight-block -->
                                                </div><!-- end columns -->
                                                @endforeach
                                            </div>
                                        </div><!-- end insurance-desc -->
                                    </div><!-- end space-right -->
                                </div><!-- end columns -->
                            </div>
                        </div><!-- end container -->
                    </div><!-- end about-content -->
                </div><!-- end about-us -->
        </section><!-- end innerpage-wrapper -->
    @elseif(Config::get('app.locale') == 'en')
        <section class="innerpage-wrapper">
            <div>
                <div id="about-content" class="section-padding"> 
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 content-side tvl-insurance-info">
                                <div class="space-right">
                                    <div class="insurance-desc mg-bot-60">
                                        <div class="innerpage-heading">
                                            <h1>About Us</h1>
                                            <p>{{$data->get('contact_ar')}}</p>
                                        </div><!-- end innerpage-heading -->
                                        <div class="row">
                                            @foreach($offices as $office)
                                            <div class="col-xs-12 col-sm-6 col-md-4">
                                                <div class="main-block flight-block">
                                                    <a href="#">                                       
                                                        <div class="flight-info">
                                                            <div class="flight-title">
                                                                <h3>
                                                                    <span class="flight-destination">{{$office->country_en}}</span>|<span class="flight-type">{{$office->office_name_en}}</span>
                                                                    <img src="{{asset('storage/uploads/office/'.$office->image)}}" alt="" />
                                                                </h3>
                                                            </div><!-- end flight-title -->
                                                            
                                                            <div class=" flight-timing">
                                                                <ul class="list-unstyled">
                                                                    <li><span><i class="fa fa-map-marker"></i></span>{{$office->address_en}}</li>
                                                                    <li><span><i class="fa fa-phone"></i></span><span class="Lato">{{$office->phone}}</span></li>
                                                                </ul>
                                                            </div><!-- end flight-timing -->
                                                        </div><!-- end flight-info -->
                                                    </a>
                                                </div><!-- end flight-block -->
                                            </div><!-- end columns -->
                                            @endforeach
                                        </div>
                                    </div><!-- end insurance-desc -->
                                </div><!-- end space-right -->
                            </div><!-- end columns -->
                        </div>
                    </div><!-- end container -->
                </div><!-- end about-content -->
            </div><!-- end about-us -->
        </section><!-- end innerpage-wrapper -->
    @endif
@endsection
@include('site.pages.about.scripts')