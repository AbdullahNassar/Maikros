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
    <link href="{{asset('vendors/toastr/toastr.min.css')}}" rel="stylesheet">

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
                                            <li class="active"><a href="{{route('site.companyProfile')}}"><span><i class="fa fa-user"></i></span>البروفايل</a></li>
                                    		<li><a href="{{route('site.dashboard')}}"><span><i class="fa fa-cogs"></i></span>لوحة التحكم</a></li>
                                            <li><a href="{{route('site.booking')}}"><span><i class="fa fa-briefcase"></i></span>الحجز</a></li>
                                        </ul>
                                    </div><!-- end columns -->
                                    
                                    <div class="col-xs-12 col-sm-10 col-md-10 dashboard-content user-profile">
                                		<h2 class="dash-content-title">صفحتى الشخصية</h2>
                                        <div class="panel panel-default">
                                            <div class="panel-heading"><h4>التفاصيل</h4></div>
                                            <div class="panel-body">
                                            	<div class="row">
                                                	<div class="col-sm-5 col-md-4 user-img">
                                                        @if(Auth::guard('members')->user()->image != null)
                                                        <img src="{{asset('storage/uploads/member').'/'.Auth::guard('members')->user()->image}}" class="img-responsive" alt="user-img" />
                                                        @else
                                                        <img src="{{asset('vendors/site/EN/images/user-profile.jpg')}}" class="img-responsive" alt="user-img" />
                                                        @endif
                                                    </div><!-- end columns -->
                                                    <div class="col-sm-7 col-md-8  user-detail">
                                                        <ul class="list-unstyled">
                                                            <li><span>الاسم:</span> {{Auth::guard('members')->user()->name}}</li>
                                                            <li><span>تاريخ الميلاد:</span> {{(new DateTime(Auth::guard('members')->user()->birth))->format('j')}} {{(new DateTime(Auth::guard('members')->user()->birth))->format('M')}} {{(new DateTime(Auth::guard('members')->user()->birth))->format('Y')}}</li>
                                                            <li><span>البريد الالكترونى:</span> {{Auth::guard('members')->user()->email}}</li>
                                                            <li><span>الهاتف:</span> {{Auth::guard('members')->user()->phone}}</li>
                                                            <li><span>العنوان:</span> {{Auth::guard('members')->user()->address}}</li>
                                                            <li><span>الدولة:</span> {{Auth::guard('members')->user()->country}}</li>
                                                        </ul>
                                                        <button class="btn btn-orange" data-toggle="modal" data-target="#edit-profile">تعديل</button>
                                                   	</div><!-- end columns -->
                                                    <div class="col-sm-12 user-desc">
                                                    	<h4>معلومات شخصية</h4>
                                                        <p>{{Auth::guard('members')->user()->about}}</p>
                                                    </div><!-- end columns -->
                                                </div><!-- end row -->
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
        <div id="edit-profile" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog ">
                <div class="modal-content modal-lg">
                    <div class="modal-body">
                        <form id="profile_form" method="post">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="user-img-upload">
                                        @if(Auth::guard('members')->user()->image != null)
                                            <div class="fileUpload user-editimg">
                                                <span><i class="fa fa-camera"></i> تغيير</span>
                                                <input type="file" id="imgInp" class="upload" name="image" value="{{asset('storage/uploads/member').'/'.Auth::guard('members')->user()->image}}">
                                                <input type="hidden" value="member" name="storage" >
                                            </div>
                                            <img src="{{asset('storage/uploads/member').'/'.Auth::guard('members')->user()->image}}" id="blah" class="img-circle" alt="user-img" />
                                        @else
                                            <div class="fileUpload user-editimg">
                                                <span><i class="fa fa-camera"></i> اضافة</span>
                                                <input type="file" id="imgInp" class="upload" name="image">
                                                <input type="hidden" value="member" name="storage" >
                                            </div>
                                            <img src="{{asset('vendors/site/EN/images/user-profile.jpg')}}" id="blah" class="img-circle" alt="user-img" />
                                        @endif
                                    </div>
                                </div><!-- col-12 -->
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>اسم المستخدم</label>
                                        <input type="text" class="form-control" placeholder="اسم المستخدم" name="username" value="{{Auth::guard('members')->user()->username}}"/>
                                    </div><!-- end form-group -->
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>كلمة السر</label>
                                        <input type="password" class="form-control" placeholder="كلمة السر" name="password" value="{{Auth::guard('members')->user()->password}}"/>
                                    </div><!-- end form-group -->
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>الاسم</label>
                                        <input type="text" class="form-control" placeholder="الاسم" name="name" value="{{Auth::guard('members')->user()->name}}"/>
                                        <input type="hidden" class="form-control" name="id" value="{{Auth::guard('members')->user()->id}}"/>
                                    </div><!-- end form-group -->
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>تاريخ الميلاد</label>
                                        <input type="date" class="form-control" placeholder="mm-dd-yy" name="birth" value="{{Auth::guard('members')->user()->birth}}"/>
                                    </div><!-- end form-group -->
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>البريد الالكترونى</label>
                                        <input type="email" class="form-control" placeholder="البريد الالكترونى" name="email" value="{{Auth::guard('members')->user()->email}}"/>
                                    </div><!-- end form-group -->
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>الهاتف</label>
                                        <input type="text" class="form-control" placeholder="الهاتف" name="phone" value="{{Auth::guard('members')->user()->phone}}"/>
                                    </div><!-- end form-group -->
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>الدولة</label>
                                        <input type="text" class="form-control" placeholder="الدولة" name="country" value="{{Auth::guard('members')->user()->country}}"/>
                                    </div><!-- end form-group -->
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>الرقم المدنى</label>
                                        <input type="text" class="form-control" placeholder="الرقم المدنى" name="national_id" value="{{Auth::guard('members')->user()->national_id}}"/>
                                    </div><!-- end form-group -->
                                </div>
                                <div class="col-lg-8">
                                    <div class="form-group">
                                        <label>العنوان</label>
                                        <input type="text" class="form-control" placeholder="العنوان" name="address" value="{{Auth::guard('members')->user()->address}}"/>
                                    </div><!-- end form-group -->
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>معلومات شخصية</label>
                                        <input type="text" class="form-control" placeholder="معلومات شخصية" name="about" value="{{Auth::guard('members')->user()->about}}"/>
                                    </div><!-- end form-group -->
                                </div>
                                <div class="col-lg-12">
                                    <button type="submit" class="btn btn-orange">حفظ التغييرات</button>
                                </div>
                            </div>
                        </form>
                    </div><!-- end modal-bpdy -->
                </div><!-- end modal-content -->
            </div><!-- end modal-dialog -->
        </div><!-- end edit-profile -->
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
                                            <li class="active"><a href="{{route('site.companyProfile')}}"><span><i class="fa fa-user"></i></span>Profile</a></li>
                                            <li><a href="{{route('site.dashboard')}}"><span><i class="fa fa-cogs"></i></span>Dashboard</a></li>
                                            <li><a href="{{route('site.booking')}}"><span><i class="fa fa-briefcase"></i></span>Booking</a></li>
                                        </ul>
                                    </div><!-- end columns -->
                                    
                                    <div class="col-xs-12 col-sm-10 col-md-10 dashboard-content user-profile">
                                		<h2 class="dash-content-title">My Profile</h2>
                                        <div class="panel panel-default">
                                            <div class="panel-heading"><h4>Profile Details</h4></div>
                                            <div class="panel-body">
                                            	<div class="row">
                                                	<div class="col-sm-5 col-md-4 user-img">
                                                        @if(Auth::guard('members')->user()->image != null)
                                                        <img src="{{asset('storage/uploads/member').'/'.Auth::guard('members')->user()->image}}" class="img-responsive" alt="user-img" />
                                                        @else
                                                        <img src="{{asset('vendors/site/EN/images/user-profile.jpg')}}" class="img-responsive" alt="user-img" />
                                                        @endif
                                                    </div><!-- end columns -->
                                                    <div class="col-sm-7 col-md-8  user-detail">
                                                        <ul class="list-unstyled">
                                                            <li><span>Name:</span> {{Auth::guard('members')->user()->name}}</li>
                                                            <li><span>Date of Birth:</span> {{(new DateTime(Auth::guard('members')->user()->birth))->format('j')}} {{(new DateTime(Auth::guard('members')->user()->birth))->format('M')}} {{(new DateTime(Auth::guard('members')->user()->birth))->format('Y')}}</li>
                                                            <li><span>Email:</span> {{Auth::guard('members')->user()->email}}</li>
                                                            <li><span>Phone:</span> {{Auth::guard('members')->user()->phone}}</li>
                                                            <li><span>Address:</span> {{Auth::guard('members')->user()->address}}</li>
                                                            <li><span>Country:</span> {{Auth::guard('members')->user()->country}}</li>
                                                        </ul>
                                                        <button class="btn" data-toggle="modal" data-target="#edit-profile">Edit Profile</button>
                                                        <a class="btn btn-orange" href="{{route('site.addService')}}">Add Service</a>
                                                        <a class="btn btn-orange" href="{{route('site.serviceGallery')}}">Add Service Images</a>
                                                        <a class="btn btn-orange" href="{{route('site.addServiceFeatures')}}">Add Service Features</a>
                                                        <a class="btn btn-orange" href="{{route('site.addFlight')}}">Add Flight</a>
                                                   	</div><!-- end columns -->
                                                    <div class="col-sm-12 user-desc">
                                                    	<h4>About You</h4>
                                                    	<p>{{Auth::guard('members')->user()->about}}</p>
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
                                    </div><!-- end columns -->
                                </div><!-- end row -->
                            </div><!-- end dashboard-wrapper -->
                        </div><!-- end columns -->
                    </div><!-- end row -->
                </div><!-- end container -->          
            </div><!-- end dashboard -->
        </section><!-- end innerpage-wrapper -->
        <div id="edit-profile" class="modal custom-modal fade " role="dialog">
            <div class="modal-dialog">
                <div class="modal-content modal-lg">
                    
                    <div class="modal-body">
                        <form id="profile_form" method="post">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="user-img-upload">
                                        @if(Auth::guard('members')->user()->image != null)
                                            <div class="fileUpload user-editimg">
                                                <span><i class="fa fa-camera"></i> Edit</span>
                                                <input type="file" id="imgInp" class="upload" name="image" value="{{asset('storage/uploads/member').'/'.Auth::guard('members')->user()->image}}">
                                                <input type="hidden" value="member" name="storage" >
                                            </div>
                                            <img src="{{asset('storage/uploads/member').'/'.Auth::guard('members')->user()->image}}" id="blah" class="img-circle" alt="user-img" />
                                        @else
                                            <div class="fileUpload user-editimg">
                                                <span><i class="fa fa-camera"></i> Add</span>
                                                <input type="file" id="imgInp" class="upload" name="image">
                                                <input type="hidden" value="member" name="storage" >
                                            </div>
                                            <img src="{{asset('vendors/site/EN/images/user-profile.jpg')}}" id="blah" class="img-circle" alt="user-img" />
                                        @endif
                                    </div>
                                </div><!-- col-12 -->
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>UserName</label>
                                        <input type="text" class="form-control" placeholder="UserName" name="username" value="{{Auth::guard('members')->user()->username}}"/>
                                    </div><!-- end form-group -->
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control" placeholder="Password" name="password" value="{{Auth::guard('members')->user()->password}}"/>
                                    </div><!-- end form-group -->
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Your Name</label>
                                        <input type="text" class="form-control" placeholder="Name" name="name" value="{{Auth::guard('members')->user()->name}}"/>
                                        <input type="hidden" class="form-control" name="id" value="{{Auth::guard('members')->user()->id}}"/>
                                    </div><!-- end form-group -->
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Date of Birth</label>
                                        <input type="date" class="form-control" placeholder="mm-dd-yy" name="birth" value="{{Auth::guard('members')->user()->birth}}"/>
                                    </div><!-- end form-group -->
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Your Email</label>
                                        <input type="email" class="form-control" placeholder="Email" name="email" value="{{Auth::guard('members')->user()->email}}"/>
                                    </div><!-- end form-group -->
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Your Phone</label>
                                        <input type="text" class="form-control" placeholder="Phone Number" name="phone" value="{{Auth::guard('members')->user()->phone}}"/>
                                    </div><!-- end form-group -->
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Your Country</label>
                                        <input type="text" class="form-control" placeholder="Country" name="country" value="{{Auth::guard('members')->user()->country}}"/>
                                    </div><!-- end form-group -->
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>National ID</label>
                                        <input type="text" class="form-control" placeholder="National ID" name="national_id" value="{{Auth::guard('members')->user()->national_id}}"/>
                                    </div><!-- end form-group -->
                                </div>
                                <div class="col-lg-8">
                                    <div class="form-group">
                                        <label>Your Address</label>
                                        <input type="text" class="form-control" placeholder="Address" name="address" value="{{Auth::guard('members')->user()->address}}"/>
                                    </div><!-- end form-group -->
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Personal Info</label>
                                        <input type="text" class="form-control" placeholder="Personal Info" name="about" value="{{Auth::guard('members')->user()->about}}"/>
                                    </div><!-- end form-group -->
                                </div>
                                <div class="col-lg-12">
                                    <button type="submit" class="btn btn-orange">Save Changes</button>
                                </div>
                            </div>
                        </form>
                    </div><!-- end modal-bpdy -->
                </div><!-- end modal-content -->
            </div><!-- end modal-dialog -->
        </div><!-- end edit-profile -->
    @endif
@endsection
@include('site.pages.company_profile.scripts')