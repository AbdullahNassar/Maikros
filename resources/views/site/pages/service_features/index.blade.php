@extends('site.layouts.master')
@section('meta')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
@endsection
@if(Config::get('app.locale') == 'ar')
    @section('title','الصفحة الشخصية')
@elseif(Config::get('app.locale') == 'en')
    @section('title','Profile')
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
                                            <div class="panel-heading"><h4>اضافة مميزات الخدمة</h4></div>
                                            <div class="panel-body">
                                            	<div class="row">
                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                        <div class="side-bar fullform">
                                                            <div class="booking-form booking-form-block">
                                                                <form method="post" id="feature_form" enctype="multipart/form-data">
                                                                    {{csrf_field()}}
                                                                    <div class="col-lg-12">
                                                                        <div class="user-img-upload">
                                                                            <div class="fileUpload user-editimg">
                                                                                <span><i class="fa fa-camera"></i> اضافة</span>
                                                                                <input type="file" id="imgInp" class="upload" name="image">
                                                                                <input type="hidden" value="hotel" name="storage" >
                                                                            </div>
                                                                            <img src="{{asset('vendors/site/AR/images/hotel-detail-tab-5.jpg')}}" id="blah" class="img-circle" alt="">
                                                                            <p></p><hr>
                                                                        </div>
                                                                    </div><!-- col-12 -->
                                                                    <div class="row">
                                                                        <div class="col-sm-12 col-md-12 col-lg-12 no-sp-r">
                                                                            <div class="form-group rs-select2">
                                                                                <label class="control-label">اختر الخدمة</label>
                                                                                <select class="select2" name="service_id">
                                                                                    <option>اختر الخدمة</option>
                                                                                    @foreach($services as $service)
                                                                                    <option value="{{$service->id}}">{{$service->name_ar}}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-6 col-md-12 col-lg-6 no-sp-r">
                                                                            <div class="form-group">
                                                                                <label class="control-label">الاسم باللغة العربية</label>
                                                                                <input class="form-control" type="text" name="f_name_ar" placeholder="الاسم باللغة العربية">                                    
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-sm-6 col-md-12 col-lg-6 no-sp-r">
                                                                            <div class="form-group">
                                                                                <label class="control-label">الاسم باللغة الانجليزية</label>
                                                                                <input class="form-control" type="text" name="f_name_en" placeholder="الاسم باللغة الانجليزية">                                    
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-sm-6 col-md-12 col-lg-6 no-sp-r">
                                                                            <div class="form-group">
                                                                                <label class="control-label">التفاصيل باللغة العربية</label>
                                                                                <textarea class="form-control" type="text" name="content_ar" id="content_ar"></textarea>                                    
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-sm-6 col-md-12 col-lg-6 no-sp-r">
                                                                            <div class="form-group">
                                                                                <label class="control-label">التفاصيل باللغة الانجليزية</label>
                                                                                <textarea class="form-control" type="text" name="content_en" id="content_en"></textarea>                                    
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-6 col-md-12 col-lg-6 no-sp-r">
                                                                            <div class="checkbox custom-check">
                                                                                <input type="checkbox" id="check01" name="checkbox"/>
                                                                                <label for="check01"><span><i class="fa fa-check"></i></span>للاستمرار , انت موافق على <a href="#">الشروط والاحكام.</a></label>
                                                                            </div>                                   
                                                                        </div>
                                                                    </div>
                                                                    <button type="submit" class="btn btn-block btn-orange">حفظ</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><!-- end row -->
                                                <div class="row">
                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                        <a href="{{route('site.addService')}}" class="btn btn-block btn-orange">اضافة خدمة</a>
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
                                            <div class="panel-heading"><h4>Add Hotel Features</h4></div>
                                            <div class="panel-body">
                                            	<div class="row">
                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                        <div class="side-bar fullform">
                                                            <div class="booking-form booking-form-block">
                                                                <form method="post" id="feature_form" enctype="multipart/form-data">
                                                                    {{csrf_field()}}
                                                                    <div class="col-lg-12">
                                                                        <div class="user-img-upload">
                                                                            <div class="fileUpload user-editimg">
                                                                                <span><i class="fa fa-camera"></i> Add</span>
                                                                                <input type="file" id="imgInp" class="upload" name="image">
                                                                                <input type="hidden" value="hotel" name="storage" >
                                                                            </div>
                                                                            <img src="{{asset('vendors/site/AR/images/hotel-detail-tab-5.jpg')}}" id="blah" class="img-circle" alt="">
                                                                            <p></p><hr>
                                                                        </div>
                                                                    </div><!-- col-12 -->
                                                                    <div class="row">
                                                                        <div class="col-sm-12 col-md-12 col-lg-12 no-sp-r">
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
                                                                        <div class="col-sm-6 col-md-12 col-lg-6 no-sp-r">
                                                                            <div class="form-group">
                                                                                <label class="control-label">Arabic Name</label>
                                                                                <input class="form-control" type="text" name="f_name_ar" placeholder="Arabic Name">                                    
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-sm-6 col-md-12 col-lg-6 no-sp-r">
                                                                            <div class="form-group">
                                                                                <label class="control-label">English Name</label>
                                                                                <input class="form-control" type="text" name="f_name_en" placeholder="English Name">                                    
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-sm-6 col-md-12 col-lg-6 no-sp-r">
                                                                            <div class="form-group">
                                                                                <label class="control-label">Arabic Content</label>
                                                                                <input class="form-control" type="text" name="content_ar" placeholder="Arabic Content">                                    
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-sm-6 col-md-12 col-lg-6 no-sp-r">
                                                                            <div class="form-group">
                                                                                <label class="control-label">English Content</label>
                                                                                <input class="form-control" type="text" name="content_en" placeholder="English Content">                                    
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-6 col-md-12 col-lg-6 no-sp-r">
                                                                            <div class="checkbox custom-check">
                                                                                <input type="checkbox" id="check01" name="checkbox"/>
                                                                                <label for="check01"><span><i class="fa fa-check"></i></span>By continuing, you are agree to the <a href="#">Terms & Conditions.</a></label>
                                                                            </div>                                   
                                                                        </div>
                                                                    </div>
                                                                    <button type="submit" class="btn btn-block btn-orange">Submit</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><!-- end row -->
                                                <div class="row">
                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                        <a href="{{route('site.addService')}}" class="btn btn-block btn-orange">Add Service</a>
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
@include('site.pages.service_features.scripts')