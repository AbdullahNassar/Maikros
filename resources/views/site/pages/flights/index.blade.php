@extends('site.layouts.master')
@section('meta')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
@endsection
@if(Config::get('app.locale') == 'ar')
    @section('title','رحلات الطيران')
@elseif(Config::get('app.locale') == 'en')
    @section('title','Flights')
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

    <!-- Owl Carousel Stylesheet -->
    <link rel="stylesheet" href="{{asset('vendors/site/EN/css/jquery-ui.min.css')}}">
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
                    <h1 class="page-title">الطيران</h1>
                    <ul class="breadcrumb">
                        <li><a href="{{route('site.home')}}">الرئيسية</a></li>
                        <li class="active">الطيران</li>
                    </ul>
                </div><!-- end columns -->
                @elseif(Config::get('app.locale') == 'en')
                <div class="col-sm-12">
                    <h1 class="page-title">Flights</h1>
                    <ul class="breadcrumb">
                        <li><a href="{{route('site.home')}}">Home</a></li>
                        <li class="active">Flights</li>
                    </ul>
                </div><!-- end columns -->
                @endif
            </div><!-- end row -->
        </div><!-- end container -->
    </section><!-- end page-cover -->
    <!--===== INNERPAGE-WRAPPER ====-->
    <section class="innerpage-wrapper">
        <div id="hotel-listing" class="innerpage-section-padding">
            <div class="container">
                <div class="row">        	
                    
                    <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 content-side">
                    		<div class="row">
                                @foreach($flights as $flight)
                                @if(Config::get('app.locale') == 'ar')
                        		<div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
                            		<div class="grid-block main-block f-grid-block">
                                    	<a href="{{ route('site.flight' , ['id' => $flight['id']]) }}">
                                            <div class="f-img">
                                                <img src="{{asset('storage/uploads/flight/'.$flight['image'])}}" class="img-responsive" alt="flight-img">
                                            </div><!-- end f-img -->
                                        </a>
                                        <ul class="list-unstyled list-inline offer-price-1">
                                            <li class="price">${{$flight['price']}}.00</li>
                                        </ul>
                                        
                                        <div class="block-info f-grid-info">
                                        	<div class="f-grid-desc">
                                                <span class="f-grid-time"><i class="fa fa-clock-o"></i>{{$flight['duration_ar']}}</span>
                                                <h3 class="block-title"><a href="{{ route('site.flight' , ['id' => $flight['id']]) }}">{{$flight['flight_name_ar']}}</a></h3>
                                                <p class="block-minor">{{$flight['code']}}</p>
                                            </div><!-- end f-grid-desc -->
                                            
                                            <div class="f-grid-timing">
                                                <ul class="list-unstyled">
                                                    <li><span><i class="fa fa-plane"></i></span><span class="date">{{$flight['start']}}</span></li>
                                                    <li><span><i class="fa fa-plane"></i></span><span class="date">{{$flight['end']}}</span></li>
                                                </ul>
                                            </div><!-- end flight-timing -->
                                            
                                            <div class="grid-btn">
                                            	<a href="#" class="btn btn-orange btn-block btn-lg">احجز</a>
                                            </div><!-- end grid-btn -->
                                        </div><!-- end f-grid-info -->
                                    </div><!-- end f-grid-block -->
                                </div><!-- end columns -->
                                @elseif(Config::get('app.locale') == 'en')
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
                            		<div class="grid-block main-block f-grid-block">
                                    	<a href="{{ route('site.flight' , ['id' => $flight['id']]) }}">
                                            <div class="f-img">
                                                <img src="{{asset('storage/uploads/flight/'.$flight['image'] )}}" class="img-responsive" alt="flight-img">
                                            </div><!-- end f-img -->
                                        </a>
                                        <ul class="list-unstyled list-inline offer-price-1">
                                            <li class="price">${{$flight['price']}}.00</li>
                                        </ul>
                                        
                                        <div class="block-info f-grid-info">
                                        	<div class="f-grid-desc">
                                                <span class="f-grid-time"><i class="fa fa-clock-o"></i>{{$flight['duration_en']}}</span>
                                                <h3 class="block-title"><a href="{{ route('site.flight' , ['id' => $flight['id']]) }}">{{$flight['flight_name_en']}}</a></h3>
                                                <p class="block-minor">{{$flight['code']}}</p>
                                            </div><!-- end f-grid-desc -->
                                            
                                            <div class="f-grid-timing">
                                                <ul class="list-unstyled">
                                                    <li><span><i class="fa fa-plane"></i></span><span class="date">{{$flight['start']}}</span></li>
                                                    <li><span><i class="fa fa-plane"></i></span><span class="date">{{$flight['end']}}</span></li>
                                                </ul>
                                            </div><!-- end flight-timing -->
                                            
                                            <div class="grid-btn">
                                            	<a href="{{ route('site.flight' , ['id' => $flight['id']]) }}" class="btn btn-orange btn-block btn-lg">Book</a>
                                            </div><!-- end grid-btn -->
                                        </div><!-- end f-grid-info -->
                                    </div><!-- end f-grid-block -->
                                </div><!-- end columns -->
                                @endif
                                @endforeach
                            </div><!-- end row --> 
                                    {{ $flights->links() }}
                        </div>
                    @if(Config::get('app.locale') == 'ar')      
                    <div class="col-xs-12 col-sm-12 col-md-3 side-bar right-side-bar">
                        <form method="GET" action="{{route('site.flightFilter')}}">
                            <div class="side-bar-block filter-block">
                                <h3>رتب حسب التصفية</h3>
                                <p>اكتشف رحلات أحلامك اليوم</p>
                                
                                <div class="panels-group">
                                    
                                    <div class="panel panel-default">
                                        <div class="panel-heading">					
                                            <a href="#panel-1" data-toggle="collapse" >اختر الفئة <span><i class="fa fa-angle-down"></i></span></a>
                                        </div><!-- end panel-heading -->
                                        
                                        <div id="panel-1" class="panel-collapse collapse">
                                            <div class="panel-body text-left">
                                                <ul class="list-unstyled">
                                                    <li class="custom-check"><input type="checkbox" id="check01" name="checkbox"/>
                                                    <label for="check01"><span><i class="fa fa-check"></i></span> الكل</label></li>
                                                    <li class="custom-check"><input type="checkbox" id="check02" name="checkbox"/>
                                                    <label for="check02"><span><i class="fa fa-check"></i></span> الوحدة السكنية</label></li>
                                                    <li class="custom-check"><input type="checkbox" id="check03" name="checkbox"/>
                                                    <label for="check03"><span><i class="fa fa-check"></i></span> السرير والافطار</label></li>
                                                    <li class="custom-check"><input type="checkbox" id="check04" name="checkbox"/>
                                                    <label for="check04"><span><i class="fa fa-check"></i></span> منزل الضيف</label></li>
                                                    <li class="custom-check"><input type="checkbox" id="check05" name="checkbox"/>
                                                    <label for="check05"><span><i class="fa fa-check"></i></span> الطيران</label></li>				
                                                    <li class="custom-check"><input type="checkbox" id="check06" name="checkbox"/>
                                                    <label for="check06"><span><i class="fa fa-check"></i></span> إقامة</label></li>
                                                    <li class="custom-check"><input type="checkbox" id="check07" name="checkbox"/>
                                                    <label for="check07"><span><i class="fa fa-check"></i></span> المنتجعات</label></li>
                                                </ul>
                                            </div><!-- end panel-body -->
                                        </div><!-- end panel-collapse -->
                                    </div><!-- end panel-default -->
                                    
                                    <div class="panel panel-default">
                                        <div class="panel-heading">					
                                            <a href="#panel-2" data-toggle="collapse" >التسهيلات<span><i class="fa fa-angle-down"></i></span></a>
                                        </div><!-- end panel-heading -->
                                        
                                        <div id="panel-2" class="panel-collapse collapse">
                                            <div class="panel-body text-left">
                                                <ul class="list-unstyled">
                                                    <li class="custom-check"><input type="checkbox" id="check08" name="checkbox"/>
                                                    <label for="check08"><span><i class="fa fa-check"></i></span> التكييف</label></li>
                                                    <li class="custom-check"><input type="checkbox" id="check09" name="checkbox"/>
                                                    <label for="check09"><span><i class="fa fa-check"></i></span> الحمام</label></li>
                                                    <li class="custom-check"><input type="checkbox" id="check10" name="checkbox"/>
                                                    <label for="check10"><span><i class="fa fa-check"></i></span> التليفزيون</label></li>
                                                    <li class="custom-check"><input type="checkbox" id="check11" name="checkbox"/>
                                                    <label for="check11"><span><i class="fa fa-check"></i></span> الجراج</label></li>
                                                    <li class="custom-check"><input type="checkbox" id="check12" name="checkbox"/>
                                                    <label for="check12"><span><i class="fa fa-check"></i></span> حمام السباحة</label></li>
                                                    <li class="custom-check"><input type="checkbox" id="check13" name="checkbox"/>
                                                    <label for="check13"><span><i class="fa fa-check"></i></span> واى فاى</label></li>
                                                </ul>
                                            </div><!-- end panel-body -->
                                        </div><!-- end panel-collapse -->
                                    </div><!-- end panel-default -->
                                    
                                    <div class="panel panel-default">
                                        <div class="panel-heading">					
                                            <a href="#panel-3" data-toggle="collapse" >تقييم <span><i class="fa fa-angle-down"></i></span></a>
                                        </div><!-- end panel-heading -->
                                        
                                        <div id="panel-3" class="panel-collapse collapse">
                                            <div class="panel-body text-left">
                                                <ul class="list-unstyled">
                                                    <li class="custom-check"><input type="checkbox" id="check14" name="checkbox"/>
                                                    <label for="check14"><span><i class="fa fa-check"></i></span> 1 نجمة</label></li>
                                                    <li class="custom-check"><input type="checkbox" id="check15" name="checkbox"/>
                                                    <label for="check15"><span><i class="fa fa-check"></i></span> 2 نجمة</label></li>
                                                    <li class="custom-check"><input type="checkbox" id="check16" name="checkbox"/>
                                                    <label for="check16"><span><i class="fa fa-check"></i></span> 3 نجمة</label></li>
                                                    <li class="custom-check"><input type="checkbox" id="check17" name="checkbox"/>
                                                    <label for="check17"><span><i class="fa fa-check"></i></span> 4 نجمة</label></li>
                                                    <li class="custom-check"><input type="checkbox" id="check18" name="checkbox"/>
                                                    <label for="check18"><span><i class="fa fa-check"></i></span> 5 نجمة</label></li>
                                                </ul>
                                            </div><!-- end panel-body -->
                                        </div><!-- end panel-collapse -->
                                    </div><!-- end panel-default -->
                                    
                                </div><!-- end panel-group -->
                                
                                <div class="price-slider">
                                    <p><input type="text" id="amount" readonly name="amount"></p>
                                    <input type="hidden" id="amount1" value="300"  name="amount1">
                                    <input type="hidden" id="amount2" value="700"  name="amount2">
                                    <div id="slider-range"></div>
                                </div><!-- end price-slider -->
                                <div class="grid-btn">
                                    <button type="submit" class="btn btn-orange btn-block btn-lg">ابحث</button>
                                </div><!-- end grid-btn -->
                            </div><!-- end side-bar-block -->
                        </form>
                        <div class="row">
                                <div class="col-xs-12 col-sm-6 col-md-12">
                                    <div class="side-bar-block main-block ">
                                        <div class="ad-img">
                                            <a href="#">
                                                <img src="{{asset('vendors/site/EN/images/car-ad.jpg')}}" class="img-responsive" alt="car-ad">
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
                                </div>
                            @if(Config::get('app.locale') == 'ar')
                            <div class="col-xs-12 col-sm-6 col-md-12">
                                <div class="side-bar-block main-block ">
                                    <div class="ad-img">
                                        <a href="#">
                                            <img src="{{asset('vendors/site/EN/images/car-ad.jpg')}}" class="img-responsive" alt="car-ad" />
                                            <div class="ad-mask">
                                                <div class="ad-text">
                                                    <span>رفاهية</span>
                                                    <h2>سيارة</h2>
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
                                    <p>{{$data->get('contact_ar')}}</p>
                                    <div class="support-contact">
                                        <span><i class="fa fa-phone"></i></span>
                                        <p>{{$contact->get('phone')}}</p>
                                    </div><!-- end support-contact -->
                                </div><!-- end side-bar-block -->
                            </div><!-- end columns -->
                            @elseif(Config::get('app.locale') == 'en')
                            <div class="col-xs-12 col-sm-6 col-md-12">
                                <div class="side-bar-block main-block ">
                                    <div class="ad-img">
                                        <a href="#">
                                            <img src="{{asset('vendors/site/EN/images/car-ad.jpg')}}" class="img-responsive" alt="car-ad" />
                                            <div class="ad-mask">
                                                <div class="ad-text">
                                                    <span>الرفاهية</span>
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
                                    <h3>Need Help?</h3>
                                    <p>{{$data->get('contact_en')}}</p>
                                    <div class="support-contact">
                                        <span><i class="fa fa-phone"></i></span>
                                        <p>{{$contact->get('phone')}}</p>
                                    </div><!-- end support-contact -->
                                </div><!-- end side-bar-block -->
                            </div><!-- end columns -->
                            @endif
                        </div><!-- end row -->
                    </div><!-- end columns --> 
                    @elseif(Config::get('app.locale') == 'en')
                    <div class="col-xs-12 col-sm-12 col-md-3 side-bar right-side-bar">
                            <form method="GET" action="{{route('site.flightFilter')}}">
                                <div class="side-bar-block filter-block">
                                    <h3>Sort By Filter</h3>
                                    <p>Find your dream flights today</p>
                                    
                                    <div class="panels-group">
                                        
                                        <div class="panel panel-default">
                                            <div class="panel-heading">					
                                                <a href="#panel-1" data-toggle="collapse" >Select Category <span><i class="fa fa-angle-down"></i></span></a>
                                            </div><!-- end panel-heading -->
                                            
                                            <div id="panel-1" class="panel-collapse collapse">
                                                <div class="panel-body text-left">
                                                    <ul class="list-unstyled">
                                                        <li class="custom-check"><input type="checkbox" id="check01" name="checkbox"/>
                                                        <label for="check01"><span><i class="fa fa-check"></i></span> All</label></li>
                                                        <li class="custom-check"><input type="checkbox" id="check02" name="checkbox"/>
                                                        <label for="check02"><span><i class="fa fa-check"></i></span> Apartment</label></li>
                                                        <li class="custom-check"><input type="checkbox" id="check03" name="checkbox"/>
                                                        <label for="check03"><span><i class="fa fa-check"></i></span> Bed & Breakfast</label></li>
                                                        <li class="custom-check"><input type="checkbox" id="check04" name="checkbox"/>
                                                        <label for="check04"><span><i class="fa fa-check"></i></span> Guest House</label></li>
                                                        <li class="custom-check"><input type="checkbox" id="check05" name="checkbox"/>
                                                        <label for="check05"><span><i class="fa fa-check"></i></span> Flights</label></li>				
                                                        <li class="custom-check"><input type="checkbox" id="check06" name="checkbox"/>
                                                        <label for="check06"><span><i class="fa fa-check"></i></span> Residence</label></li>
                                                        <li class="custom-check"><input type="checkbox" id="check07" name="checkbox"/>
                                                        <label for="check07"><span><i class="fa fa-check"></i></span> Resorts</label></li>
                                                    </ul>
                                                </div><!-- end panel-body -->
                                            </div><!-- end panel-collapse -->
                                        </div><!-- end panel-default -->
                                        
                                        <div class="panel panel-default">
                                            <div class="panel-heading">					
                                                <a href="#panel-2" data-toggle="collapse" >Facility<span><i class="fa fa-angle-down"></i></span></a>
                                            </div><!-- end panel-heading -->
                                            
                                            <div id="panel-2" class="panel-collapse collapse">
                                                <div class="panel-body text-left">
                                                    <ul class="list-unstyled">
                                                        <li class="custom-check"><input type="checkbox" id="check08" name="checkbox"/>
                                                        <label for="check08"><span><i class="fa fa-check"></i></span> Air Conditioning</label></li>
                                                        <li class="custom-check"><input type="checkbox" id="check09" name="checkbox"/>
                                                        <label for="check09"><span><i class="fa fa-check"></i></span> Bathroom</label></li>
                                                        <li class="custom-check"><input type="checkbox" id="check10" name="checkbox"/>
                                                        <label for="check10"><span><i class="fa fa-check"></i></span> Cable Tv</label></li>
                                                        <li class="custom-check"><input type="checkbox" id="check11" name="checkbox"/>
                                                        <label for="check11"><span><i class="fa fa-check"></i></span> Parking</label></li>
                                                        <li class="custom-check"><input type="checkbox" id="check12" name="checkbox"/>
                                                        <label for="check12"><span><i class="fa fa-check"></i></span> Pool</label></li>
                                                        <li class="custom-check"><input type="checkbox" id="check13" name="checkbox"/>
                                                        <label for="check13"><span><i class="fa fa-check"></i></span> Wi-fi</label></li>
                                                    </ul>
                                                </div><!-- end panel-body -->
                                            </div><!-- end panel-collapse -->
                                        </div><!-- end panel-default -->
                                        
                                        <div class="panel panel-default">
                                            <div class="panel-heading">					
                                                <a href="#panel-3" data-toggle="collapse" >Rating <span><i class="fa fa-angle-down"></i></span></a>
                                            </div><!-- end panel-heading -->
                                            
                                            <div id="panel-3" class="panel-collapse collapse">
                                                <div class="panel-body text-left">
                                                    <ul class="list-unstyled">
                                                        <li class="custom-check"><input type="checkbox" id="check14" name="checkbox"/>
                                                        <label for="check14"><span><i class="fa fa-check"></i></span> 1 Star</label></li>
                                                        <li class="custom-check"><input type="checkbox" id="check15" name="checkbox"/>
                                                        <label for="check15"><span><i class="fa fa-check"></i></span> 2 Star</label></li>
                                                        <li class="custom-check"><input type="checkbox" id="check16" name="checkbox"/>
                                                        <label for="check16"><span><i class="fa fa-check"></i></span> 3 Star</label></li>
                                                        <li class="custom-check"><input type="checkbox" id="check17" name="checkbox"/>
                                                        <label for="check17"><span><i class="fa fa-check"></i></span> 4 Star</label></li>
                                                        <li class="custom-check"><input type="checkbox" id="check18" name="checkbox"/>
                                                        <label for="check18"><span><i class="fa fa-check"></i></span> 5 Star</label></li>
                                                    </ul>
                                                </div><!-- end panel-body -->
                                            </div><!-- end panel-collapse -->
                                        </div><!-- end panel-default -->
                                        
                                    </div><!-- end panel-group -->
                                    
                                    <div class="price-slider">
                                        <p><input type="text" id="amount" readonly name="amount"></p>
                                        <input type="hidden" id="amount1" value="300"  name="amount1">
                                        <input type="hidden" id="amount2" value="700"  name="amount2">
                                        <div id="slider-range"></div>
                                    </div><!-- end price-slider -->
                                    <div class="grid-btn">
                                        <button type="submit" class="btn btn-orange btn-block btn-lg">Search</button>
                                    </div><!-- end grid-btn -->
                                </div><!-- end side-bar-block -->
                            </form>
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 col-md-12">
                                    <div class="side-bar-block main-block ">
                                        <div class="ad-img">
                                            <a href="#">
                                                <img src="{{asset('vendors/site/EN/images/car-ad.jpg')}}" class="img-responsive" alt="car-ad">
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
                                </div>
                                @if(Config::get('app.locale') == 'ar')
                                <div class="col-xs-12 col-sm-6 col-md-12">
                                    <div class="side-bar-block main-block ">
                                        <div class="ad-img">
                                            <a href="#">
                                                <img src="{{asset('vendors/site/EN/images/car-ad.jpg')}}" class="img-responsive" alt="car-ad" />
                                                <div class="ad-mask">
                                                    <div class="ad-text">
                                                        <span>رفاهية</span>
                                                        <h2>سيارة</h2>
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
                                        <p>{{$data->get('contact_ar')}}</p>
                                        <div class="support-contact">
                                            <span><i class="fa fa-phone"></i></span>
                                            <p>{{$contact->get('phone')}}</p>
                                        </div><!-- end support-contact -->
                                    </div><!-- end side-bar-block -->
                                </div><!-- end columns -->
                                @elseif(Config::get('app.locale') == 'en')
                                <div class="col-xs-12 col-sm-6 col-md-12">
                                    <div class="side-bar-block main-block ">
                                        <div class="ad-img">
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
                                        <p>{{$data->get('contact_en')}}</p>
                                        <div class="support-contact">
                                            <span><i class="fa fa-phone"></i></span>
                                            <p>{{$contact->get('phone')}}</p>
                                        </div><!-- end support-contact -->
                                    </div><!-- end side-bar-block -->
                                </div><!-- end columns -->
                                @endif
                            </div><!-- end row -->
                        </div><!-- end columns --> 
                    @endif 
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end hotel-listing -->
    </section><!-- end innerpage-wrapper -->
@endsection
@include('site.pages.flights.scripts')