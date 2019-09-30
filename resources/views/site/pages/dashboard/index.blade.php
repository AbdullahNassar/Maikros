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
    <link href="{{asset('vendors/toastr/toastr.min.css')}}" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">

    @elseif(Config::get('app.locale') == 'en')
    <!-- Google Fonts -->	
    <link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i,700,700i,900,900i%7CMerriweather:300,300i,400,400i,700,700i,900,900i" rel="stylesheet">
        
    <!-- Bootstrap Stylesheet -->	
    <link rel="stylesheet" href="{{asset('vendors/site/EN/css/bootstrap.min.css')}}">

    <!-- Font Awesome Stylesheet -->
    <link rel="stylesheet" href="{{asset('vendors/site/EN/css/font-awesome.min.css')}}">

    <link rel="stylesheet" href="{{asset('vendors/site/EN/css/datepicker.css')}}">
        
    <!-- Custom Stylesheets -->	
    <link rel="stylesheet" href="{{asset('vendors/site/EN/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('vendors/site/EN/css/responsive.css')}}">
    <link href="{{asset('vendors/toastr/toastr.min.css')}}" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">

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
                                            <li class="active"><a href="{{route('site.dashboard')}}"><span><i class="fa fa-cogs"></i></span>لوحة التحكم</a></li>
                                            @if(Auth::guard('members')->user()->type == "hotel")
                                            <li><a href="{{route('site.hotelProfile')}}"><span><i class="fa fa-user"></i></span>البروفايل</a></li>
                                            @elseif(Auth::guard('members')->user()->type == "company")
                                            <li><a href="{{route('site.tourProfile')}}"><span><i class="fa fa-user"></i></span>البروفايل</a></li>
                                            @elseif(Auth::guard('members')->user()->type == "services")
                                            <li><a href="{{route('site.companyProfile')}}"><span><i class="fa fa-user"></i></span>البروفايل</a></li>
                                            @endif
                                            <li><a href="{{route('site.booking')}}"><span><i class="fa fa-briefcase"></i></span>الحجز</a></li>
                                        </ul>
                                    </div><!-- end columns -->
                                    
                                    <div class="col-xs-12 col-sm-10 col-md-10 dashboard-content user-profile">
                                        @if(Auth::guard('members')->user()->type == "hotel")
                                        <div class="panel panel-default">
                                            <div class="panel-heading"><h4>لوحة التحكم</h4></div>
                                            <div class="panel-body">
                                            	<div class="row">
                                                    <div class="col-md-12 user-detail">
                                                        <a class="btn btn-orange" href="{{route('site.addHotel')}}">اضافة فندق</a>
                                                        <a class="btn btn-orange" href="{{route('site.hotelGallery')}}">اضافة صور الفندق</a>
                                                        <a class="btn btn-orange" href="{{route('site.addHotelRooms')}}">اضافة غرف</a>
                                                        <a class="btn btn-orange" href="{{route('site.addHotelFeatures')}}">اضافة مزايا</a>
                                                        <a class="btn btn-orange" href="{{route('site.addHotelFacilities')}}">اضافة وسائل الراحة</a>
                                                   	</div><!-- end columns -->
                                                </div><!-- end row -->
                                            </div><!-- end panel-body -->
                                            <div class="panel-heading"><h4>الفنادق</h4></div>
                                            <div class="panel-body">
                                            	<div class="row">
                                                    @foreach($hotels as $hotel)
                                                    <div class="col-xs-6 col-sm-6 col-md-5 filtr-item" data-category="{{$hotel->place_id}}">
                                                        <div class="main-block hotel-block">
                                                            <div class="main-img">
                                                                @if($hotel->discount > 0)
                                                                <div class="sale-tag">{{$hotel->discount}}% خصم</div>
                                                                @endif
                                                                <a href="{{ route('site.hotel' , ['id' => $hotel->id]) }}">
                                                                    <img src="{{asset('storage/uploads/hotel/'.$hotel->image)}}" class="img-responsive" alt="hotel-img" />
                                                                </a>
                                                                <div class="main-mask">
                                                                    <ul class="list-unstyled list-inline offer-price-1">
                                                                        <li class="price">${{$hotel->price}}</li>
                                                                        <li class="rating">
                                                                            @for($i = 1; $i <= $hotel->stars; $i++)
                                                                            <span><i class="fa fa-star orange"></i></span>
                                                                            @endfor
                                                                            @for($i = $hotel->stars; $i < 5; $i++)
                                                                            <span><i class="fa fa-star lightgrey"></i></span>
                                                                            @endfor
                                                                        </li>
                                                                    </ul>
                                                                </div><!-- end main-mask -->
                                                            </div><!-- end offer-img -->

                                                            <div class="main-info hotel-info">
                                                                <div class="arrow">
                                                                    @if($hotel->active == 1)
                                                                    <span class="rate-tag"><br> موافق <br> عليه </span>
                                                                    @elseif($hotel->active == -1)
                                                                    <span class="rate-tag"><br> قيد <br> الانتظار </span>
                                                                    @endif
                                                                </div><!-- end arrow -->
                                                                
                                                                <div class="main-title hotel-title">
                                                                    <a href="{{ route('site.hotel' , ['id' => $hotel->id]) }}">{{$hotel->hotel_name_ar}}</a>
                                                                    <p>المكان : {{$hotel->place_name_ar}}</p>
                                                                    <p>البعد : {{$hotel->far_ar}}</p>
                                                                    <p>الشارع : {{$hotel->street_ar}}</p>
                                                                </div><!-- end hotel-title -->
                                                                <ul class="list-unstyled list-inline car-features">
                                                                    <li><span><i class="fa fa-car"></i></span></li>
                                                                    <li><span><i class="fa fa-bath"></i></span></li>
                                                                    <li><span><i class="fa fa-aircondition"></i></span></li>
                                                                    <li><span><i class="fa fa-wifi"></i></span></li>
                                                                    <li><span><i class="fa fa-tv"></i></span></li>
                                                                </ul>
                                                                <div class="grid-btn">
                                                                    <a href="{{route('site.editHotel' , ['id' => $hotel->id])}}" class="btn btn-orange btn-block btn-lg">تعديل</a>
                                                                </div><!-- end grid-btn -->
                                                            </div>
                                                        </div><!-- end hotel-block -->
                                                    </div>
                                                    @endforeach
                                                </div><!-- end row -->
                                            </div><!-- end panel-body -->
                                        </div><!-- end panel-detault -->  
                                        @elseif(Auth::guard('members')->user()->type == "company")
                                        <div class="panel panel-default">
                                            <div class="panel-heading"><h4>لوحة التحكم</h4></div>
                                            <div class="panel-body">
                                            	<div class="row">
                                                    <div class="col-md-12  user-detail">
                                                        <a class="btn btn-orange" href="{{route('site.addProgram')}}">اضافة برنامج</a>
                                                   	</div><!-- end columns -->
                                                </div><!-- end row -->
                                            </div><!-- end panel-body -->
                                            <div class="panel-heading"><h4>البرامج</h4></div>
                                            <div class="panel-body">
                                            	<div class="row">
                                                    @foreach($programs as $program)
                                                    <div class="col-sm-6 col-md-6">
                                                        <div class="main-block cruise-block">
                                                            <div class="row">
                                                                <div class="col-sm-12 col-md-6 col-md-push-6 no-pd-l">
                                                                    <div class="main-img cruise-img">
                                                                        <a href="{{ route('site.program' , ['id' => $program->id]) }}">
                                                                            <img src="{{asset('storage/uploads/program/'.$program->image)}}" class="img-responsive" alt="cruise-img"/>
                                                                            <div class="cruise-mask">
                                                                                <p>{{$program->sub_name_ar}}</p>
                                                                            </div><!-- end cruise-mask -->
                                                                        </a>
                                                                    </div><!-- end cruise-img -->
                                                                </div><!-- end columns -->
                                                                <div class="col-sm-12 col-md-6 col-md-pull-6 no-pd-r">
                                                                    <div class=" main-info cruise-info">
                                                                        <div class="main-title cruise-title">
                                                                            <a href="{{ route('site.program' , ['id' => $program->id]) }}">{{$program->p_name_ar}}</a>
                                                                            <p>مكة : {{$program->mekkah_ar}}</p>
                                                                            <p>المدينة : {{$program->madenah_ar}}</p>
                                                                            <p>الكود : <b class="Lato">{{$program->code}}</b> </p>
                                                                            <div class="rating">
                                                                                @for($i = 1; $i <= $program->rate; $i++)
                                                                                    <span><i class="fa fa-star orange"></i></span>
                                                                                @endfor
                                                                                @for($i = $program->rate; $i < 5; $i++)
                                                                                    <span><i class="fa fa-star lightgrey"></i></span>
                                                                                @endfor
                                                                            </div><!-- end rating -->
                                                                            @if($program->active == 1)
                                                                            <p> موافق عليه </p>
                                                                            @elseif($program->active == -1)
                                                                            <p> قيد الانتظار </p>
                                                                            @endif
                                                                            <span class="Lato cruise-price">${{$program->price}}</span>
                                                                            <div class="grid-btn">
                                                                                <a href="{{route('site.editProgram' , ['id' => $program->id])}}" class="btn btn-orange btn-block btn-lg">تعديل</a>
                                                                            </div><!-- end grid-btn -->
                                                                        </div><!-- end cruise-title -->
                                                                    </div><!-- end cruise-info -->
                                                                </div><!-- end columns -->
                                                            </div><!-- end row -->	
                                                        </div><!-- end cruise-block -->
                                                    </div><!-- end columns -->
                                                    @endforeach
                                                </div><!-- end row -->
                                            </div><!-- end panel-body -->
                                        </div><!-- end panel-detault -->
                                        @elseif(Auth::guard('members')->user()->type == "services")
                                        <div class="panel panel-default">
                                            <div class="panel-heading"><h4>لوحة التحكم</h4></div>
                                            <div class="panel-body">
                                            	<div class="row">
                                                    <div class="col-md-12  user-detail">
                                                        <a class="btn btn-orange" href="{{route('site.addService')}}">اضافة خدمة</a>
                                                        <a class="btn btn-orange" href="{{route('site.serviceGallery')}}">اضافة صور الخدمة</a>
                                                        <a class="btn btn-orange" href="{{route('site.addServiceFeatures')}}">اضافة مزايا الخدمات</a>
                                                        <a class="btn btn-orange" href="{{route('site.addFlight')}}">اضافة رحلة</a>
                                                   	</div><!-- end columns -->
                                                </div><!-- end row -->
                                            </div><!-- end panel-body -->
                                            <div class="panel-heading"><h4>الخدمات</h4></div>
                                            <div class="panel-body">
                                            	<div class="row">
                                                    @foreach($services as $service)
                                                    <div class="col-xs-6 col-sm-6 col-md-4 filtr-item" data-category="{{$service->place_id}}">
                                                            <div class="main-block hotel-block">
                                                                <div class="main-img">
                                                                    @if($service->discount > 0)
                                                                    <div class="sale-tag">{{$service->discount}}% خصم</div>
                                                                    @endif
                                                                    <a href="{{ route('site.service' , ['id' => $service->id]) }}">
                                                                        <img src="{{asset('storage/uploads/service/'.$service->image)}}" class="img-responsive" alt="service-img" />
                                                                    </a>
                                                                    <div class="main-mask">
                                                                        <ul class="list-unstyled list-inline offer-price-1">
                                                                            <li class="price">${{$service->price}}</li>
                                                                            <li class="rating">
                                                                                <span><i class="fa fa-star orange"></i></span>
                                                                                <span><i class="fa fa-star orange"></i></span>
                                                                                <span><i class="fa fa-star orange"></i></span>
                                                                                <span><i class="fa fa-star orange"></i></span>
                                                                                <span><i class="fa fa-star lightgrey"></i></span>
                                                                            </li>
                                                                        </ul>
                                                                    </div><!-- end main-mask -->
                                                                </div><!-- end offer-img -->
                    
                                                                <div class="main-info hotel-info">
                                                                    <div class="arrow">
                                                                        <span class="rate-tag"><b>{{$service->rate}}</b>التقييم</span>
                                                                    </div><!-- end arrow -->
                                                                    
                                                                    <div class="main-title hotel-title">
                                                                        <a href="{{ route('site.service' , ['id' => $service->id]) }}">{{$service->name_ar}}</a>
                                                                        <p>المكان : {{$service->place_name_ar}}</p>
                                                                        @if($service->active == 1)
                                                                        <p> موافق عليه </p>
                                                                        @elseif($service->active == -1)
                                                                        <p> قيد الانتظار </p>
                                                                        @endif
                                                                    </div><!-- end hotel-title -->
                                                                    <div class="grid-btn">
                                                                        <a href="{{ route('site.editService' , ['id' => $service->id]) }}" class="btn btn-orange btn-block btn-lg">تعديل</a>
                                                                    </div><!-- end grid-btn -->
                                                                </div>
                                                            </div><!-- end hotel-block -->
                                                        </div>
                                                    @endforeach
                                                </div><!-- end row -->
                                            </div><!-- end panel-body -->
                                            <div class="panel-heading"><h4>رحلات الطيران</h4></div>
                                            <div class="panel-body">
                                            	<div class="row">
                                                    @foreach($flights as $flight)
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
                                                                    @if($flight->active == 1)
                                                                        <p> موافق عليه </p>
                                                                    @elseif($flight->active == -1)
                                                                        <p> قيد الانتظار </p>
                                                                    @endif
                                                                </div><!-- end f-grid-desc -->
                                                                
                                                                <div class="f-grid-timing">
                                                                    <ul class="list-unstyled">
                                                                        <li><span><i class="fa fa-plane"></i></span><span class="date">{{$flight['start']}}</span></li>
                                                                        <li><span><i class="fa fa-plane"></i></span><span class="date">{{$flight['end']}}</span></li>
                                                                    </ul>
                                                                </div><!-- end flight-timing -->
                                                                
                                                                <div class="grid-btn">
                                                                    <a href="{{ route('site.editFlight' , ['id' => $flight['id']]) }}" class="btn btn-orange btn-block btn-lg">تعديل</a>
                                                                </div><!-- end grid-btn -->
                                                            </div><!-- end f-grid-info -->
                                                        </div><!-- end f-grid-block -->
                                                    </div><!-- end columns -->
                                                    @endforeach
                                                </div><!-- end row -->
                                            </div><!-- end panel-body -->
                                        </div><!-- end panel-detault -->
                                        @endif
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
                                            <li class="active"><a href="{{route('site.dashboard')}}"><span><i class="fa fa-cogs"></i></span>Dashboard</a></li>
                                            @if(Auth::guard('members')->user()->type == "hotel")
                                            <li><a href="{{route('site.hotelProfile')}}"><span><i class="fa fa-user"></i></span>Profile</a></li>
                                            @elseif(Auth::guard('members')->user()->type == "company")
                                            <li><a href="{{route('site.tourProfile')}}"><span><i class="fa fa-user"></i></span>Profile</a></li>
                                            @elseif(Auth::guard('members')->user()->type == "services")
                                            <li><a href="{{route('site.companyProfile')}}"><span><i class="fa fa-user"></i></span>Profile</a></li>
                                            @endif
                                            <li><a href="{{route('site.booking')}}"><span><i class="fa fa-briefcase"></i></span>Booking</a></li>
                                        </ul>
                                    </div><!-- end columns -->
                                    
                                    <div class="col-xs-12 col-sm-10 col-md-10 dashboard-content user-profile">
                                        @if(Auth::guard('members')->user()->type == "hotel")
                                        <div class="panel panel-default">
                                            <div class="panel-heading"><h4>Dashboard</h4></div>
                                            <div class="panel-body">
                                            	<div class="row">
                                                    <div class="col-md-12 user-detail">
                                                        <a class="btn btn-orange" href="{{route('site.addHotel')}}">Add Hotel</a>
                                                        <a class="btn btn-orange" href="{{route('site.hotelGallery')}}">Add Hotel Images</a>
                                                        <a class="btn btn-orange" href="{{route('site.addHotelRooms')}}">Add Rooms</a>
                                                        <a class="btn btn-orange" href="{{route('site.addHotelFeatures')}}">Add Features</a>
                                                        <a class="btn btn-orange" href="{{route('site.addHotelFacilities')}}">Add Facilities</a>
                                                   	</div><!-- end columns -->
                                                </div><!-- end row -->
                                            </div><!-- end panel-body -->
                                            <div class="panel-heading"><h4>Hotels</h4></div>
                                            <div class="panel-body">
                                            	<div class="row">
                                                	@foreach($hotels as $hotel)
                                                    <div class="col-xs-6 col-sm-6 col-md-5 filtr-item" data-category="{{$hotel->place_id}}">
                                                        <div class="main-block hotel-block">
                                                            <div class="main-img">
                                                                @if($hotel->discount > 0)
                                                                <div class="sale-tag">{{$hotel->discount}}% Discount</div>
                                                                @endif
                                                                <a href="{{ route('site.hotel' , ['id' => $hotel->id]) }}">
                                                                    <img src="{{asset('storage/uploads/hotel/'.$hotel->image)}}" class="img-responsive" alt="hotel-img" />
                                                                </a>
                                                                <div class="main-mask">
                                                                    <ul class="list-unstyled list-inline offer-price-1">
                                                                        <li class="price">${{$hotel->price}}</li>
                                                                        <li class="rating">
                                                                            @for($i = 1; $i <= $hotel->stars; $i++)
                                                                                <span><i class="fa fa-star orange"></i></span>
                                                                            @endfor
                                                                            @for($i = $hotel->stars; $i < 5; $i++)
                                                                                <span><i class="fa fa-star lightgrey"></i></span>
                                                                            @endfor
                                                                        </li>
                                                                    </ul>
                                                                </div><!-- end main-mask -->
                                                            </div><!-- end offer-img -->

                                                            <div class="main-info hotel-info">
                                                                <div class="arrow">
                                                                    @if($hotel->active == 1)
                                                                    <span class="rate-tag"><br> Approved </span>
                                                                    @elseif($hotel->active == -1)
                                                                    <span class="rate-tag"><br> Pending </span>
                                                                    @endif
                                                                </div><!-- end arrow -->
                                                                
                                                                <div class="main-title hotel-title">
                                                                    <a href="{{ route('site.hotel' , ['id' => $hotel->id]) }}">{{$hotel->hotel_name_en}}</a>
                                                                    <p>Place : {{$hotel->place_name_en}}</p>
                                                                    <p>How Far : {{$hotel->far_en}}</p>
                                                                    <p>Street : {{$hotel->street_en}}</p>
                                                                </div><!-- end hotel-title -->
                                                                <ul class="list-unstyled list-inline car-features">
                                                                    <li><span><i class="fa fa-car"></i></span></li>
                                                                    <li><span><i class="fa fa-bath"></i></span></li>
                                                                    <li><span><i class="fa fa-aircondition"></i></span></li>
                                                                    <li><span><i class="fa fa-wifi"></i></span></li>
                                                                    <li><span><i class="fa fa-tv"></i></span></li>
                                                                </ul>
                                                                <div class="grid-btn">
                                                                    <a href="{{route('site.editHotel' , ['id' => $hotel->id])}}" class="btn btn-orange btn-block btn-lg">Edit</a>
                                                                </div><!-- end grid-btn -->
                                                            </div>
                                                        </div><!-- end hotel-block -->
                                                    </div>
                                                    @endforeach
                                                </div><!-- end row -->
                                            </div><!-- end panel-body -->
                                        </div><!-- end panel-detault -->
                                        @elseif(Auth::guard('members')->user()->type == "company")
                                        <div class="panel panel-default">
                                            <div class="panel-heading"><h4>Dashboard</h4></div>
                                            <div class="panel-body">
                                            	<div class="row">
                                                    <div class="col-sm-7 col-md-8  user-detail">
                                                        <a class="btn btn-orange" href="{{route('site.addProgram')}}">Add Program</a>
                                                   	</div><!-- end columns -->
                                                </div><!-- end row -->
                                            </div><!-- end panel-body -->
                                            <div class="panel-heading"><h4>Programs</h4></div>
                                            <div class="panel-body">
                                            	<div class="row">
                                                	@foreach($programs as $program)
                                                    <div class="col-sm-6 col-md-6">
                                                        <div class="main-block cruise-block">
                                                            <div class="row">
                                                                <div class="col-sm-12 col-md-6 col-md-push-6 no-pd-l">
                                                                    <div class="main-img cruise-img">
                                                                        <a href="{{ route('site.program' , ['id' => $program->id]) }}">
                                                                                <img src="{{asset('storage/uploads/program/'.$program->image)}}" class="img-responsive" alt="cruise-img"/>
                                                                            <div class="cruise-mask">
                                                                                <p>{{$program->sub_name_en}}</p>
                                                                            </div><!-- end cruise-mask -->
                                                                        </a>
                                                                    </div><!-- end cruise-img -->
                                                                </div><!-- end columns -->
                                                                <div class="col-sm-12 col-md-6 col-md-pull-6 no-pd-r">
                                                                    <div class=" main-info cruise-info">
                                                                        <div class="main-title cruise-title">
                                                                            <a href="{{ route('site.program' , ['id' => $program->id]) }}">{{$program->p_name_en}}</a>
                                                                            <p>Mekkah : {{$program->mekkah_en}}</p>
                                                                            <p>Al Madenah : {{$program->madenah_en}}</p>
                                                                            <p>Code : <b class="Lato">{{$program->code}}</b> </p>
                                                                            <div class="rating">
                                                                                @for($i = 1; $i <= $program->rate; $i++)
                                                                                    <span><i class="fa fa-star orange"></i></span>
                                                                                @endfor
                                                                                @for($i = $program->rate; $i < 5; $i++)
                                                                                    <span><i class="fa fa-star lightgrey"></i></span>
                                                                                @endfor
                                                                            </div><!-- end rating -->
                                                                            @if($program->active == 1)
                                                                            <p>Approved</p>
                                                                            @elseif($program->active == -1)
                                                                            <p>Pending</p>
                                                                            @endif
                                                                            <span class="Lato cruise-price">${{$program->price}}</span>
                                                                            <div class="grid-btn">
                                                                                <a href="{{route('site.editProgram' , ['id' => $program->id])}}" class="btn btn-orange btn-block btn-lg">Edit</a>
                                                                            </div><!-- end grid-btn -->
                                                                        </div><!-- end cruise-title -->
                                                                    </div><!-- end cruise-info -->
                                                                </div><!-- end columns -->
                                                                
                                                            </div><!-- end row -->	
                                                        </div><!-- end cruise-block -->
                                                    </div><!-- end columns -->
                                                    @endforeach
                                                </div><!-- end row -->
                                            </div><!-- end panel-body -->
                                        </div><!-- end panel-detault -->   
                                        @elseif(Auth::guard('members')->user()->type == "services")
                                        <div class="panel panel-default">
                                            <div class="panel-heading"><h4>Dashboard</h4></div>
                                            <div class="panel-body">
                                            	<div class="row">
                                                    <div class="col-md-12  user-detail">
                                                        <a class="btn btn-orange" href="{{route('site.addService')}}">Add Service</a>
                                                        <a class="btn btn-orange" href="{{route('site.serviceGallery')}}">Add Service Images</a>
                                                        <a class="btn btn-orange" href="{{route('site.addServiceFeatures')}}">Add Service Features</a>
                                                        <a class="btn btn-orange" href="{{route('site.addFlight')}}">Add Flight</a>
                                                   	</div><!-- end columns -->
                                                </div><!-- end row -->
                                            </div><!-- end panel-body -->
                                            <div class="panel-heading"><h4>Services</h4></div>
                                            <div class="panel-body">
                                            	<div class="row">
                                                	@foreach($services as $service)
                                                    <div class="col-xs-6 col-sm-6 col-md-4 filtr-item" data-category="{{$service->place_id}}">
                                                        <div class="main-block hotel-block">
                                                            <div class="main-img">
                                                                @if($service->discount > 0)
                                                                <div class="sale-tag">{{$service->discount}}% Discount</div>
                                                                @endif
                                                                <a href="{{ route('site.service' , ['id' => $service->id]) }}">
                                                                    <img src="{{asset('storage/uploads/service/'.$service->image)}}" class="img-responsive" alt="service-img" />
                                                                </a>
                                                                <div class="main-mask">
                                                                    <ul class="list-unstyled list-inline offer-price-1">
                                                                        <li class="price">${{$service->price}}</li>
                                                                        <li class="rating">
                                                                            <span><i class="fa fa-star orange"></i></span>
                                                                            <span><i class="fa fa-star orange"></i></span>
                                                                            <span><i class="fa fa-star orange"></i></span>
                                                                            <span><i class="fa fa-star orange"></i></span>
                                                                            <span><i class="fa fa-star lightgrey"></i></span>
                                                                        </li>
                                                                    </ul>
                                                                </div><!-- end main-mask -->
                                                            </div><!-- end offer-img -->

                                                            <div class="main-info hotel-info">
                                                                <div class="arrow">
                                                                    <span class="rate-tag"><b>{{$service->rate}}</b>Rate</span>
                                                                </div><!-- end arrow -->
                                                                
                                                                <div class="main-title hotel-title">
                                                                    <a href="{{ route('site.hotel' , ['id' => $service->id]) }}">{{$service->name_en}}</a>
                                                                    <p>Place : {{$service->place_name_en}}</p>
                                                                    @if($service->active == 1)
                                                                        <p>Approved</p>
                                                                    @elseif($service->active == -1)
                                                                        <p>Pending</p>
                                                                    @endif
                                                                </div><!-- end hotel-title -->
                                                                <div class="grid-btn">
                                                                    <a href="{{ route('site.editService' , ['id' => $service->id]) }}" class="btn btn-orange btn-block btn-lg">Edit</a>
                                                                </div><!-- end grid-btn -->
                                                            </div>
                                                        </div><!-- end hotel-block -->
                                                    </div>
                                                    @endforeach
                                                </div><!-- end row -->
                                            </div><!-- end panel-body -->
                                            <div class="panel-heading"><h4>Flights</h4></div>
                                            <div class="panel-body">
                                            	<div class="row">
                                                	@foreach($flights as $flight)
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
                                                                    @if($flight->active == 1)
                                                                        <p>Approved</p>
                                                                    @elseif($flight->active == -1)
                                                                        <p>Pending</p>
                                                                    @endif
                                                                </div><!-- end f-grid-desc -->
                                                                
                                                                <div class="f-grid-timing">
                                                                    <ul class="list-unstyled">
                                                                        <li><span><i class="fa fa-plane"></i></span><span class="date">{{$flight['start']}}</span></li>
                                                                        <li><span><i class="fa fa-plane"></i></span><span class="date">{{$flight['end']}}</span></li>
                                                                    </ul>
                                                                </div><!-- end flight-timing -->
                                                                
                                                                <div class="grid-btn">
                                                                    <a href="{{ route('site.editFlight' , ['id' => $flight['id']]) }}" class="btn btn-orange btn-block btn-lg">Edit</a>
                                                                </div><!-- end grid-btn -->
                                                            </div><!-- end f-grid-info -->
                                                        </div><!-- end f-grid-block -->
                                                    </div><!-- end columns -->
                                                    @endforeach
                                                </div><!-- end row -->
                                            </div><!-- end panel-body -->
                                        </div><!-- end panel-detault -->
                                        @endif
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
@include('site.pages.dashboard.scripts')