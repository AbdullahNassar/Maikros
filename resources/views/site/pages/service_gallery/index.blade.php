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

    <link rel="stylesheet" href="{{asset('vendors/site/AR/css/datepicker.css')}}">
        
    <!-- Custom Stylesheets -->	
    <link rel="stylesheet" href="{{asset('vendors/site/AR/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('vendors/site/AR/css/responsive.css')}}">
    <!-- Date-Picker Stylesheet -->
    <link rel="stylesheet" href="{{asset('vendors/site/AR/css/datepicker.css')}}">
        
    <!-- Slick Stylesheet -->
    <link rel="stylesheet" href="{{asset('vendors/site/AR/css/dropzone.css')}}">
    <link rel="stylesheet" href="{{asset('vendors/site/AR/css/select2.min.css')}}">
    

    <!--Jquery UI Stylesheet-->
    <link rel="stylesheet" href="{{asset('vendors/site/AR/css/jquery-ui.min.css')}}">
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
    <!-- Date-Picker Stylesheet -->
    <link rel="stylesheet" href="{{asset('vendors/site/EN/css/datepicker.css')}}">
        
    <!-- Slick Stylesheet -->
    <link rel="stylesheet" href="{{asset('vendors/site/EN/css/dropzone.css')}}">
    <link rel="stylesheet" href="{{asset('vendors/site/EN/css/select2.min.css')}}">
    

    <!--Jquery UI Stylesheet-->
    <link rel="stylesheet" href="{{asset('vendors/site/EN/css/jquery-ui.min.css')}}">
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
                    <h1 class="page-title">الصفحة الشخصية</h1>
                    <ul class="breadcrumb">
                        <li><a href="{{route('site.home')}}">الرئيسية</a></li>
                        <li class="active">الصفحة الشخصية</li>
                    </ul>
                </div><!-- end columns -->
                @elseif(Config::get('app.locale') == 'en')
                <div class="col-sm-12">
                    <h1 class="page-title">Profile</h1>
                    <ul class="breadcrumb">
                        <li><a href="{{route('site.home')}}">Home</a></li>
                        <li class="active">Profile</li>
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
        	<div id="dashboard" class="innerpage-section-padding">
                <div class="container">
                    <div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="dashboard-wrapper">
                            	<div class="row">
                                	<div class="col-xs-12 col-sm-2 col-md-2 dashboard-nav">
                                		<ul class="nav nav-tabs nav-stacked text-center">
                                    		@if (Auth::guard('members')->check())
                                    		<li><a href="#"><span><i class="fa fa-cogs"></i></span>لوحة التحكم</a></li>
                                            <li  class="active"><a href="{{route('site.companyProfile')}}"><span><i class="fa fa-user"></i></span>البروفايل</a></li>
                                            @endif
                                            <li><a href="{{route('site.cart')}}"><span><i class="fa fa-briefcase"></i></span>الحجز</a></li>
                                        </ul>
                                    </div><!-- end columns -->
                                    
                                    <div class="col-xs-12 col-sm-10 col-md-10 dashboard-content user-profile">
                                        <div class="panel panel-default">
                                            <div class="panel-heading"><h4>معرض الصور</h4></div>
                                            <div class="panel-body">
                                            	<div class="row">
                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                        <div class="side-bar fullform">
                                                            <div class="booking-form booking-form-block">
                                                                <div class="row">
                                                                    <div class="col-lg-12">
                                                                        <form method="post" enctype="multipart/form-data" action="{{route('site.postServiceGallery')}}" class="dropzone" id="my-dropzone">
                                                                            {{csrf_field()}}
                                                                            <div class="row mg-b-25">
                                                                                <div class="col-lg-12">
                                                                                    <div class="form-group rs-select2">
                                                                                    <label class="control-label">اختر خدمة</label>
                                                                                    <select class="select2" name="service_id">
                                                                                        <option>اختر خدمة</option>
                                                                                        @foreach($services as $service)
                                                                                            <option value="{{$service->id}}">{{$service->name_ar}}</option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                </div>
                                                                                </div>
                                                                            </div><!-- row -->
                                                                            <div class="row mg-b-25">
                                                                                <div class="col-lg-12">
                                                                                    <div class="form-group">
                                                                                        <div class="form-field">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div><!-- row -->
                                                                        </form>
                                                                    </div><!-- col-12 -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><!-- end row -->
                                                <div class="row">
                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                        <a href="{{route('site.addServiceFeatures')}}" class="btn btn-block btn-orange">اضافة مزايا الخدمة</a>
                                                    </div>
                                                </div>
                                            </div><!-- end panel-body -->
                                        </div><!-- end panel-detault -->
                                    </div><!-- end columns -->
                                </div><!-- end row -->
                            </div><!-- end dashboard-wrapper -->
                        </div><!-- end columns -->
                    </div><!-- end row -->
                </div><!-- end container -->          
            </div><!-- end dashboard -->
        </section><!-- end innerpage-wrapper -->
    @elseif(Config::get('app.locale') == 'en')
    <!--===== INNERPAGE-WRAPPER ====-->
        <section class="innerpage-wrapper">
        	<div id="dashboard" class="innerpage-section-padding">
                <div class="container">
                    <div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="dashboard-wrapper">
                            	<div class="row">
                                
                                	<div class="col-xs-12 col-sm-2 col-md-2 dashboard-nav">
                                		<ul class="nav nav-tabs nav-stacked text-center">
                                                @if (Auth::guard('members')->check())
                                                <li><a href="#"><span><i class="fa fa-cogs"></i></span>Dashboard</a></li>
                                                <li  class="active"><a href="{{route('site.companyProfile')}}"><span><i class="fa fa-user"></i></span>Profile</a></li>
                                                @endif
                                                <li><a href="{{route('site.cart')}}"><span><i class="fa fa-briefcase"></i></span>Booking</a></li>
                                        </ul>
                                    </div><!-- end columns -->
                                    
                                    <div class="col-xs-12 col-sm-10 col-md-10 dashboard-content user-profile">
                                        <div class="panel panel-default">
                                            <div class="panel-heading"><h4>Service Gallery</h4></div>
                                            <div class="panel-body">
                                            	<div class="row">
                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                        <div class="side-bar fullform">
                                                            <div class="booking-form booking-form-block">
                                                                <div class="row">
                                                                    <div class="col-lg-12">
                                                                        <form method="post" enctype="multipart/form-data" action="{{route('site.postServiceGallery')}}" class="dropzone" id="my-dropzone">
                                                                            {{csrf_field()}}
                                                                            <div class="row mg-b-25">
                                                                                <div class="col-lg-12">
                                                                                    <div class="form-group rs-select2">
                                                                                        <label class="control-label">Choose Service</label>
                                                                                        <select class="select2" name="service_id">
                                                                                            <option>Choose Service</option>
                                                                                            @foreach($services as $service)
                                                                                                <option value="{{$service->id}}">{{$service->name_en}}</option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                            </div><!-- row -->
                                                                            <div class="row mg-b-25">
                                                                                <div class="col-lg-12">
                                                                                    <div class="form-group">
                                                                                        <div class="form-field">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div><!-- row -->
                                                                        </form>
                                                                    </div><!-- col-12 -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><!-- end row -->
                                                <div class="row">
                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                        <a href="{{route('site.addServiceFeatures')}}" class="btn btn-block btn-orange">Add Service Features</a>
                                                    </div>
                                                </div>
                                            </div><!-- end panel-body -->
                                        </div><!-- end panel-detault -->
                                    </div><!-- end columns -->
                                </div><!-- end row -->
                            </div><!-- end dashboard-wrapper -->
                        </div><!-- end columns -->
                    </div><!-- end row -->
                </div><!-- end container -->          
            </div><!-- end dashboard -->
        </section><!-- end innerpage-wrapper -->
    @endif
@endsection
@include('site.pages.edit_hotel.scripts')