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
                                    		<li><a href="{{route('site.dashboard')}}"><span><i class="fa fa-cogs"></i></span>لوحة التحكم</a></li>
                                            @if(Auth::guard('members')->user()->type == "hotel")
                                            <li><a href="{{route('site.hotelProfile')}}"><span><i class="fa fa-user"></i></span>البروفايل</a></li>
                                            @elseif(Auth::guard('members')->user()->type == "company")
                                            <li><a href="{{route('site.tourProfile')}}"><span><i class="fa fa-user"></i></span>البروفايل</a></li>
                                            @elseif(Auth::guard('members')->user()->type == "services")
                                            <li><a href="{{route('site.companyProfile')}}"><span><i class="fa fa-user"></i></span>البروفايل</a></li>
                                            @endif
                                            <li class="active"><a href="{{route('site.booking')}}"><span><i class="fa @extends('site.layouts.master')
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
                    <h1 class="page-title">الحجوزات</h1>
                    <ul class="breadcrumb">
                        <li><a href="{{route('site.home')}}">الرئيسية</a></li>
                        <li class="active">الحجوزات</li>
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
                        	<div class="dashboard-heading">
                                <h2>لوحة <span>التحكم</span></h2>
                                <p>مرحبا بكم معنا في موقع صمم عمرتك!</p>
                                <p>ستظهر هنا جميع الفنادق المحجوزة وستتمكن من إدارة كل شيء!</p>
                            </div><!-- end dashboard-heading -->
                            
                            <div class="dashboard-wrapper">
                            	<div class="row">
                                
                                	<div class="col-xs-12 col-sm-2 col-md-2 dashboard-nav">
                                		<ul class="nav nav-tabs nav-stacked text-center">
                                            @if (Auth::guard('members')->check())
                                    		<li><a href="{{route('site.dashboard')}}"><span><i class="fa fa-cogs"></i></span>لوحة التحكم</a></li>
                                            @if(Auth::guard('members')->user()->type == "hotel")
                                            <li><a href="{{route('site.hotelProfile')}}"><span><i class="fa fa-user"></i></span>البروفايل</a></li>
                                            @elseif(Auth::guard('members')->user()->type == "company")
                                            <li><a href="{{route('site.tourProfile')}}"><span><i class="fa fa-user"></i></span>البروفايل</a></li>
                                            @elseif(Auth::guard('members')->user()->type == "services")
                                            <li><a href="{{route('site.companyProfile')}}"><span><i class="fa fa-user"></i></span>البروفايل</a></li>
                                            @endif
                                            <li><a href="{{route('site.booking')}}"><span><i class="fa fa-briefcase"></i></span>الحجز</a></li>
                                            <li class="active"><a href="{{route('site.cart')}}"><span><i class="fa fa-shopping-cart"></i></span>السلة</a></li>
                                            @else
                                            <li class="active"><a href="{{route('site.cart')}}"><span><i class="fa fa-shopping-cart"></i></span>السلة</a></li>
                                            @endif
                                        </ul>
                                    </div><!-- end columns -->
                                    
                                    <div class="col-xs-12 col-sm-10 col-md-10 dashboard-content booking-trips">
                                		<h2 class="dash-content-title">الرحلات والفنادق المحجوزة!</h2>
                                        <div class="dashboard-listing booking-listing">
                                        	<div class="dash-listing-heading">
                                                <div class="custom-radio">
                                                    <input type="radio" id="radio01" name="radio" checked/>
                                                    <label for="radio01"><span></span>كافة الحجوزات</label>
                                                </div><!-- end custom-radio -->
                                            </div>
                                            
                                            <div class="table-responsive">
                                                <table class="table table-hover">
                                                    <tbody>
                                                        @foreach ($cartItems as $item)
                                                            <tr>
                                                                <td class="dash-list-icon booking-list-date"><div class="b-date"><h3>{{(new DateTime($mytime))->format('j')}}</h3><p>{{(new DateTime($mytime))->format('M')}}</p></div></td>
                                                                <td class="dash-list-text booking-list-detail">
                                                                    <h3> الاسم : {{$item->name}}</h3>
                                                                    <p>السعر : {{$item->price}} $</p>
                                                                    <p>عدد : {{$item->qty}}</p>
                                                                    <p>اجمالى المبلغ : {{$item->price * $item->qty}} $</p>
                                                                </td>
                                                                <td class="dash-list-btn">
                                                                    <a href="{{ route('site.removeCart' , ['id' => $item->rowId]) }}" class="btn btn-orange">حذف
                                                                        </a>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                        <tr>
                                                                <td class="dash-list-icon booking-list-date"><div class="b-date"><h3>{{(new DateTime($mytime))->format('j')}}</h3><p>{{(new DateTime($mytime))->format('M')}}</p></div></td>
                                                            <td class="dash-list-text booking-list-detail">
                                                                <h4>المبلغ : {{$total}}</h4>
                                                                @if (!Auth::guard('members')->check())
                                                                    <a href="{{route('site.login')}}" class="btn btn-orange btn-lg pull-right">الدفع</a>
                                                                @else
                                                                <form method="POST" action="{{ route('site.payfort') }}"> 
                                                                    {{csrf_field()}}
                                                                    <input type="hidden" value="{{$total}}" name="amount">
                                                                    <button type="submit" class="btn btn-orange btn-lg pull-right">الدفع</button>
                                                                </form>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div><!-- end table-responsive -->
                                        </div><!-- end booking-listings -->
                                        
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
                        	<div class="dashboard-heading">
                                <h2>Hotel <span>Profile</span></h2>
                            </div><!-- end dashboard-heading -->
                            
                            <div class="dashboard-wrapper">
                            	<div class="row">
                                
                                	<div class="col-xs-12 col-sm-2 col-md-2 dashboard-nav">
                                		<ul class="nav nav-tabs nav-stacked text-center">
                                            @if (Auth::guard('members')->check())
                                    		<li><a href="{{route('site.dashboard')}}"><span><i class="fa fa-cogs"></i></span>Dashboard</a></li>
                                            @if(Auth::guard('members')->user()->type == "hotel")
                                            <li><a href="{{route('site.hotelProfile')}}"><span><i class="fa fa-user"></i></span>Profile</a></li>
                                            @elseif(Auth::guard('members')->user()->type == "company")
                                            <li><a href="{{route('site.tourProfile')}}"><span><i class="fa fa-user"></i></span>Profile</a></li>
                                            @elseif(Auth::guard('members')->user()->type == "services")
                                            <li><a href="{{route('site.companyProfile')}}"><span><i class="fa fa-user"></i></span>Profile</a></li>
                                            @endif
                                            <li><a href="{{route('site.booking')}}"><span><i class="fa fa-briefcase"></i></span>Booking</a></li>
                                            <li class="active"><a href="{{route('site.cart')}}"><span><i class="fa fa-shopping-cart"></i></span>Cart</a></li>
                                            @else
                                            <li class="active"><a href="{{route('site.cart')}}"><span><i class="fa fa-shopping-cart"></i></span>Cart</a></li>
                                            @endif
                                        </ul>
                                    </div><!-- end columns -->
                                    
                                    <div class="col-xs-12 col-sm-10 col-md-10 dashboard-content booking-trips">
                                		<h2 class="dash-content-title">Booked Hotels & Services</h2>
                                        <div class="dashboard-listing booking-listing">
                                        	<div class="dash-listing-heading">
                                                <div class="custom-radio">
                                                    <input type="radio" id="radio01" name="radio" checked/>
                                                    <label for="radio01"><span></span>All Reservations</label>
                                                </div><!-- end custom-radio -->                                                
                                            </div>
                                            
                                            <div class="table-responsive">
                                                <table class="table table-hover">
                                                    <tbody>
                                                        @foreach ($cartItems as $item)
                                                            <tr>
                                                                <td class="dash-list-icon booking-list-date"><div class="b-date"><h3>{{(new DateTime($mytime))->format('j')}}</h3><p>{{(new DateTime($mytime))->format('M')}}</p></div></td>
                                                                <td class="dash-list-text booking-list-detail">
                                                                    <h3>Name : {{$item->name}}</h3>
                                                                    <p>Price : {{$item->price}} $</p>
                                                                    <p>Number : {{$item->qty}} $</p>
                                                                    <p>Total Amount : {{$item->price * $item->qty}} $</p>
                                                                </td>
                                                                <td class="dash-list-btn">
                                                                    <form id="remove_cart" method="GET">
                                                                        {{csrf_field()}}
                                                                        <input type="hidden" value="{{$item->id}}" name="id" id="id">
                                                                        <button type="submit" class="btn btn-orange">Remove
                                                                        </button>
                                                                    </form>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                        <tr>
                                                            <td class="dash-list-icon booking-list-date"><div class="b-date"><h3>{{(new DateTime($mytime))->format('j')}}</h3><p>{{(new DateTime($mytime))->format('M')}}</p></div></td>
                                                            <td class="dash-list-text booking-list-detail">
                                                                <h4>Total Amount : {{$total}}</h4>
                                                                @if (!Auth::guard('members')->check())
                                                                    <a href="{{route('site.login')}}" class="btn btn-orange btn-lg pull-right">Payment</a>
                                                                @else
                                                                <form method="POST" action="{{ route('site.payfort') }}"> 
                                                                    {{csrf_field()}}
                                                                    <input type="hidden" value="{{$total}}" name="amount">
                                                                    <button type="submit" class="btn btn-orange btn-lg pull-right">Payment</button>
                                                                </form>                                                                    
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div><!-- end table-responsive -->
                                        </div><!-- end booking-listings -->
                                        
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
@include('site.pages.profile.scripts')"></i></span>الحجز</a></li>
                                            <li><a href="{{route('site.cart')}}"><span><i class="fa fa-briefcase"></i></span>السلة</a></li>
                                        </ul>
                                    </div><!-- end columns -->
                                    
                                    <div class="col-xs-12 col-sm-10 col-md-10 dashboard-content user-profile">
                                        <h2 class="dash-content-title">لوحة التحكم</h2>
                                        @if(Auth::guard('members')->user()->type == "user")
                                        <div class="dashboard-listing invoices">
                                            <h3 class="dash-listing-heading"> حجوزات الفنادق </h3>
                                            <div class="table-responsive">
                                                <table id="tables" class="display table table-hover" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>الاسم</th>
                                                            <th>البريد الالكترونى</th>
                                                            <th>رقم الهاتف</th>
                                                            <th>الدولة</th>
                                                            <th>الفندق</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($hotels as $hotel)
                                                        <tr>
                                                            <td>{{$loop->index + 1}}</td>
                                                            <td>{{$hotel->first_name}} {{$hotel->last_name}}</td>
                                                            <td>{{$hotel->email}}</td>
                                                            <td>{{$hotel->phone}}</td>
                                                            <td>{{$hotel->country}}</td>
                                                            <td>{{$hotel->hotel_name_ar}}</td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div><!-- end table-responsive -->
                                        </div>   
                                        <div class="dashboard-listing invoices">
                                            <h3 class="dash-listing-heading"> حجوزات البرامج </h3>
                                            <div class="table-responsive">
                                                <table id="tables2" class="display table table-hover" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>الاسم</th>
                                                            <th>البريد الالكترونى</th>
                                                            <th>رقم الهاتف</th>
                                                            <th>الدولة</th>
                                                            <th>البرنامج</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($programs as $program)
                                                        <tr>
                                                            <td>{{$loop->index + 1}}</td>
                                                            <td>{{$program->first_name}} {{$program->last_name}}</td>
                                                            <td>{{$program->email}}</td>
                                                            <td>{{$program->phone}}</td>
                                                            <td>{{$program->country}}</td>
                                                            <td>{{$program->p_name_ar}}</td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div><!-- end table-responsive -->
                                        </div>
                                        <div class="dashboard-listing invoices">
                                            <h3 class="dash-listing-heading"> حجوزات الخدمات </h3>
                                            <div class="table-responsive">
                                                <table id="tables3" class="display table table-hover" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>الاسم</th>
                                                            <th>البريد الالكترونى</th>
                                                            <th>رقم الهاتف</th>
                                                            <th>الدولة</th>
                                                            <th>الخدمة</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($services as $service)
                                                        <tr>
                                                            <td>{{$loop->index + 1}}</td>
                                                            <td>{{$service->first_name}} {{$service->last_name}}</td>
                                                            <td>{{$service->email}}</td>
                                                            <td>{{$service->phone}}</td>
                                                            <td>{{$service->country}}</td>
                                                            <td>{{$service->name_ar}}</td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div><!-- end table-responsive -->
                                        </div> 
                                        <div class="dashboard-listing invoices">
                                            <h3 class="dash-listing-heading"> حجوزات الطيران </h3>
                                            <div class="table-responsive">
                                                <table id="tables4" class="display table table-hover" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>الاسم</th>
                                                            <th>البريد الالكترونى</th>
                                                            <th>رقم الهاتف</th>
                                                            <th>الدولة</th>
                                                            <th>الرحلة</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($flights as $flight)
                                                        <tr>
                                                            <td>{{$loop->index + 1}}</td>
                                                            <td>{{$flight->first_name}} {{$flight->last_name}}</td>
                                                            <td>{{$flight->email}}</td>
                                                            <td>{{$flight->phone}}</td>
                                                            <td>{{$flight->country}}</td>
                                                            <td>{{$flight->flight_name_ar}}</td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div><!-- end table-responsive -->
                                        </div>                                        
                                        @elseif(Auth::guard('members')->user()->type == "hotel")
                                        <div class="dashboard-listing invoices">
                                            <h3 class="dash-listing-heading"> حجوزات الفنادق </h3>
                                            <div class="table-responsive">
                                                <table id="tables" class="display table table-hover" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>الاسم</th>
                                                            <th>رقم الهاتف</th>
                                                            <th>الدولة</th>
                                                            <th>الفندق</th>
                                                            <th>العمليات</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($hotelss as $hotel)
                                                        <tr>
                                                            <td>{{$loop->index + 1}}</td>
                                                            <td>{{$hotel->first_name}} {{$hotel->last_name}}</td>
                                                            <td>{{$hotel->phone}}</td>
                                                            <td>{{$hotel->country}}</td>
                                                            <td>{{$hotel->hotel_name_ar}}</td>
                                                            <td>
                                                                <form id="hotel_approve" method="POST"> 
                                                                    {{csrf_field()}}
                                                                    <input type="hidden" value="{{$hotel->id}}" name="id">
                                                                    <button type="submit" class="btn btn-orange">تأكيد الحجز</button>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div><!-- end table-responsive -->
                                        </div>   
                                        @elseif(Auth::guard('members')->user()->type == "company")
                                        <div class="dashboard-listing invoices">
                                            <h3 class="dash-listing-heading"> حجوزات البرامج </h3>
                                            <div class="table-responsive">
                                                <table id="tables2" class="display table table-hover" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>الاسم</th>
                                                            <th>البريد الالكترونى</th>
                                                            <th>رقم الهاتف</th>
                                                            <th>الدولة</th>
                                                            <th>البرنامج</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($programss as $program)
                                                        <tr>
                                                            <td>{{$loop->index + 1}}</td>
                                                            <td>{{$program->first_name}} {{$program->last_name}}</td>
                                                            <td>{{$program->email}}</td>
                                                            <td>{{$program->phone}}</td>
                                                            <td>{{$program->country}}</td>
                                                            <td>{{$program->p_name_ar}}</td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div><!-- end table-responsive -->
                                        </div>
                                        @elseif(Auth::guard('members')->user()->type == "multi")
                                        <div class="dashboard-listing invoices">
                                            <h3 class="dash-listing-heading"> حجوزات الفنادق </h3>
                                            <div class="table-responsive">
                                                <table id="tables" class="display table table-hover" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>الاسم</th>
                                                            <th>البريد الالكترونى</th>
                                                            <th>رقم الهاتف</th>
                                                            <th>الدولة</th>
                                                            <th>الفندق</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($hotels as $hotel)
                                                        <tr>
                                                            <td>{{$loop->index + 1}}</td>
                                                            <td>{{$hotel->first_name}} {{$hotel->last_name}}</td>
                                                            <td>{{$hotel->email}}</td>
                                                            <td>{{$hotel->phone}}</td>
                                                            <td>{{$hotel->country}}</td>
                                                            <td>{{$hotel->hotel_name_ar}}</td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div><!-- end table-responsive -->
                                        </div>   
                                        <div class="dashboard-listing invoices">
                                            <h3 class="dash-listing-heading"> حجوزات البرامج </h3>
                                            <div class="table-responsive">
                                                <table id="tables2" class="display table table-hover" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>الاسم</th>
                                                            <th>البريد الالكترونى</th>
                                                            <th>رقم الهاتف</th>
                                                            <th>الدولة</th>
                                                            <th>البرنامج</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($programs as $program)
                                                        <tr>
                                                            <td>{{$loop->index + 1}}</td>
                                                            <td>{{$program->first_name}} {{$program->last_name}}</td>
                                                            <td>{{$program->email}}</td>
                                                            <td>{{$program->phone}}</td>
                                                            <td>{{$program->country}}</td>
                                                            <td>{{$program->p_name_ar}}</td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div><!-- end table-responsive -->
                                        </div>
                                        <div class="dashboard-listing invoices">
                                            <h3 class="dash-listing-heading"> حجوزات الخدمات </h3>
                                            <div class="table-responsive">
                                                <table id="tables3" class="display table table-hover" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>الاسم</th>
                                                            <th>البريد الالكترونى</th>
                                                            <th>رقم الهاتف</th>
                                                            <th>الدولة</th>
                                                            <th>الخدمة</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($services as $service)
                                                        <tr>
                                                            <td>{{$loop->index + 1}}</td>
                                                            <td>{{$service->first_name}} {{$service->last_name}}</td>
                                                            <td>{{$service->email}}</td>
                                                            <td>{{$service->phone}}</td>
                                                            <td>{{$service->country}}</td>
                                                            <td>{{$service->name_ar}}</td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div><!-- end table-responsive -->
                                        </div> 
                                        <div class="dashboard-listing invoices">
                                            <h3 class="dash-listing-heading"> حجوزات الطيران </h3>
                                            <div class="table-responsive">
                                                <table id="tables4" class="display table table-hover" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>الاسم</th>
                                                            <th>البريد الالكترونى</th>
                                                            <th>رقم الهاتف</th>
                                                            <th>الدولة</th>
                                                            <th>الرحلة</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($flights as $flight)
                                                        <tr>
                                                            <td>{{$loop->index + 1}}</td>
                                                            <td>{{$flight->first_name}} {{$flight->last_name}}</td>
                                                            <td>{{$flight->email}}</td>
                                                            <td>{{$flight->phone}}</td>
                                                            <td>{{$flight->country}}</td>
                                                            <td>{{$flight->flight_name_ar}}</td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div><!-- end table-responsive -->
                                        </div>  
                                        @elseif(Auth::guard('members')->user()->type == "services")
                                        <div class="dashboard-listing invoices">
                                            <h3 class="dash-listing-heading"> حجوزات الخدمات </h3>
                                            <div class="table-responsive">
                                                <table id="tables3" class="display table table-hover" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>الاسم</th>
                                                            <th>البريد الالكترونى</th>
                                                            <th>رقم الهاتف</th>
                                                            <th>الدولة</th>
                                                            <th>الخدمة</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($servicess as $service)
                                                        <tr>
                                                            <td>{{$loop->index + 1}}</td>
                                                            <td>{{$service->first_name}} {{$service->last_name}}</td>
                                                            <td>{{$service->email}}</td>
                                                            <td>{{$service->phone}}</td>
                                                            <td>{{$service->country}}</td>
                                                            <td>{{$service->name_ar}}</td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div><!-- end table-responsive -->
                                        </div> 
                                        <div class="dashboard-listing invoices">
                                            <h3 class="dash-listing-heading"> حجوزات الطيران </h3>
                                            <div class="table-responsive">
                                                <table id="tables4" class="display table table-hover" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>الاسم</th>
                                                            <th>البريد الالكترونى</th>
                                                            <th>رقم الهاتف</th>
                                                            <th>الدولة</th>
                                                            <th>الرحلة</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($flightss as $flight)
                                                        <tr>
                                                            <td>{{$loop->index + 1}}</td>
                                                            <td>{{$flight->first_name}} {{$flight->last_name}}</td>
                                                            <td>{{$flight->email}}</td>
                                                            <td>{{$flight->phone}}</td>
                                                            <td>{{$flight->country}}</td>
                                                            <td>{{$flight->flight_name_ar}}</td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div><!-- end table-responsive -->
                                        </div> 
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
                                            <li><a href="{{route('site.dashboard')}}"><span><i class="fa fa-cogs"></i></span>Dashboard</a></li>
                                            @if(Auth::guard('members')->user()->type == "hotel")
                                            <li><a href="{{route('site.hotelProfile')}}"><span><i class="fa fa-user"></i></span>Profile</a></li>
                                            @elseif(Auth::guard('members')->user()->type == "company")
                                            <li><a href="{{route('site.tourProfile')}}"><span><i class="fa fa-user"></i></span>Profile</a></li>
                                            @elseif(Auth::guard('members')->user()->type == "services")
                                            <li><a href="{{route('site.companyProfile')}}"><span><i class="fa fa-user"></i></span>Profile</a></li>
                                            @endif
                                            <li class="active"><a href="{{route('site.booking')}}"><span><i class="fa fa-briefcase"></i></span>Booking</a></li>
                                            <li><a href="{{route('site.cart')}}"><span><i class="fa fa-briefcase"></i></span>Cart</a></li>
                                        </ul>
                                    </div><!-- end columns -->
                                    
                                    <div class="col-xs-12 col-sm-10 col-md-10 dashboard-content user-profile">
                                		<h2 class="dash-content-title">Dashboard</h2>
                                        @if(Auth::guard('members')->user()->type == "user")
                                        <div class="dashboard-listing invoices">
                                            <h3 class="dash-listing-heading">Hotel Reservations</h3>
                                            <div class="table-responsive">
                                                <table id="tables" class="display table table-hover" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Name</th>
                                                            <th>Email</th>
                                                            <th>Phone Number</th>
                                                            <th>Country</th>
                                                            <th>Hotel</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($hotels as $hotel)
                                                        <tr>
                                                            <td>{{$loop->index + 1}}</td>
                                                            <td>{{$hotel->first_name}} {{$hotel->last_name}}</td>
                                                            <td>{{$hotel->email}}</td>
                                                            <td>{{$hotel->phone}}</td>
                                                            <td>{{$hotel->country}}</td>
                                                            <td>{{$hotel->hotel_name_en}}</td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div><!-- end table-responsive -->
                                        </div> 
                                        <div class="dashboard-listing invoices">
                                            <h3 class="dash-listing-heading">Programs Reservations</h3>
                                            <div class="table-responsive">
                                                <table id="tables2" class="display table table-hover" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Name</th>
                                                            <th>Email</th>
                                                            <th>Phone Number</th>
                                                            <th>Country</th>
                                                            <th>Program</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($programs as $program)
                                                        <tr>
                                                            <td>{{$loop->index + 1}}</td>
                                                            <td>{{$program->first_name}} {{$program->last_name}}</td>
                                                            <td>{{$program->email}}</td>
                                                            <td>{{$program->phone}}</td>
                                                            <td>{{$program->country}}</td>
                                                            <td>{{$program->p_name_en}}</td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div><!-- end table-responsive -->
                                        </div>
                                        <div class="dashboard-listing invoices">
                                            <h3 class="dash-listing-heading">Services Reservations</h3>
                                            <div class="table-responsive">
                                                <table id="tables3" class="display table table-hover" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Name</th>
                                                            <th>Email</th>
                                                            <th>Phone Number</th>
                                                            <th>Country</th>
                                                            <th>Service</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($services as $service)
                                                        <tr>
                                                            <td>{{$loop->index + 1}}</td>
                                                            <td>{{$service->first_name}} {{$service->last_name}}</td>
                                                            <td>{{$service->email}}</td>
                                                            <td>{{$service->phone}}</td>
                                                            <td>{{$service->country}}</td>
                                                            <td>{{$service->name_ar}}</td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div><!-- end table-responsive -->
                                        </div> 
                                        <div class="dashboard-listing invoices">
                                            <h3 class="dash-listing-heading">Flight Reservations</h3>
                                            <div class="table-responsive">
                                                <table id="tables4" class="display table table-hover" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Name</th>
                                                            <th>Email</th>
                                                            <th>Phone Number</th>
                                                            <th>Country</th>
                                                            <th>Flight</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($flights as $flight)
                                                        <tr>
                                                            <td>{{$loop->index + 1}}</td>
                                                            <td>{{$flight->first_name}} {{$flight->last_name}}</td>
                                                            <td>{{$flight->email}}</td>
                                                            <td>{{$flight->phone}}</td>
                                                            <td>{{$flight->country}}</td>
                                                            <td>{{$flight->flight_name_ar}}</td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div><!-- end table-responsive -->
                                        </div>                                         
                                        @elseif(Auth::guard('members')->user()->type == "hotel")
                                        <div class="dashboard-listing invoices">
                                            <h3 class="dash-listing-heading">Hotel Reservations</h3>
                                            <div class="table-responsive">
                                                <table id="tables" class="display table table-hover" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Name</th>
                                                            <th>Email</th>
                                                            <th>Phone Number</th>
                                                            <th>Country</th>
                                                            <th>Hotel</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($hotelss as $hotel)
                                                        <tr>
                                                            <td>{{$loop->index + 1}}</td>
                                                            <td>{{$hotel->first_name}} {{$hotel->last_name}}</td>
                                                            <td>{{$hotel->email}}</td>
                                                            <td>{{$hotel->phone}}</td>
                                                            <td>{{$hotel->country}}</td>
                                                            <td>{{$hotel->hotel_name_en}}</td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div><!-- end table-responsive -->
                                        </div> 
                                        @elseif(Auth::guard('members')->user()->type == "company")
                                        <div class="dashboard-listing invoices">
                                            <h3 class="dash-listing-heading">Programs Reservations</h3>
                                            <div class="table-responsive">
                                                <table id="tables2" class="display table table-hover" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Name</th>
                                                            <th>Email</th>
                                                            <th>Phone Number</th>
                                                            <th>Country</th>
                                                            <th>Program</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($programss as $program)
                                                        <tr>
                                                            <td>{{$loop->index + 1}}</td>
                                                            <td>{{$program->first_name}} {{$program->last_name}}</td>
                                                            <td>{{$program->email}}</td>
                                                            <td>{{$program->phone}}</td>
                                                            <td>{{$program->country}}</td>
                                                            <td>{{$program->p_name_en}}</td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div><!-- end table-responsive -->
                                        </div>
                                        @elseif(Auth::guard('members')->user()->type == "multi")
                                        <div class="dashboard-listing invoices">
                                            <h3 class="dash-listing-heading">Hotel Reservations</h3>
                                            <div class="table-responsive">
                                                <table id="tables" class="display table table-hover" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Name</th>
                                                            <th>Email</th>
                                                            <th>Phone Number</th>
                                                            <th>Country</th>
                                                            <th>Hotel</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($hotels as $hotel)
                                                        <tr>
                                                            <td>{{$loop->index + 1}}</td>
                                                            <td>{{$hotel->first_name}} {{$hotel->last_name}}</td>
                                                            <td>{{$hotel->email}}</td>
                                                            <td>{{$hotel->phone}}</td>
                                                            <td>{{$hotel->country}}</td>
                                                            <td>{{$hotel->hotel_name_en}}</td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div><!-- end table-responsive -->
                                        </div> 
                                        <div class="dashboard-listing invoices">
                                            <h3 class="dash-listing-heading">Programs Reservations</h3>
                                            <div class="table-responsive">
                                                <table id="tables2" class="display table table-hover" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Name</th>
                                                            <th>Email</th>
                                                            <th>Phone Number</th>
                                                            <th>Country</th>
                                                            <th>Program</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($programs as $program)
                                                        <tr>
                                                            <td>{{$loop->index + 1}}</td>
                                                            <td>{{$program->first_name}} {{$program->last_name}}</td>
                                                            <td>{{$program->email}}</td>
                                                            <td>{{$program->phone}}</td>
                                                            <td>{{$program->country}}</td>
                                                            <td>{{$program->p_name_en}}</td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div><!-- end table-responsive -->
                                        </div>
                                        <div class="dashboard-listing invoices">
                                            <h3 class="dash-listing-heading">Services Reservations</h3>
                                            <div class="table-responsive">
                                                <table id="tables3" class="display table table-hover" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Name</th>
                                                            <th>Email</th>
                                                            <th>Phone Number</th>
                                                            <th>Country</th>
                                                            <th>Service</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($services as $service)
                                                        <tr>
                                                            <td>{{$loop->index + 1}}</td>
                                                            <td>{{$service->first_name}} {{$service->last_name}}</td>
                                                            <td>{{$service->email}}</td>
                                                            <td>{{$service->phone}}</td>
                                                            <td>{{$service->country}}</td>
                                                            <td>{{$service->name_ar}}</td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div><!-- end table-responsive -->
                                        </div> 
                                        <div class="dashboard-listing invoices">
                                            <h3 class="dash-listing-heading">Flight Reservations</h3>
                                            <div class="table-responsive">
                                                <table id="tables4" class="display table table-hover" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Name</th>
                                                            <th>Email</th>
                                                            <th>Phone Number</th>
                                                            <th>Country</th>
                                                            <th>Flight</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($flights as $flight)
                                                        <tr>
                                                            <td>{{$loop->index + 1}}</td>
                                                            <td>{{$flight->first_name}} {{$flight->last_name}}</td>
                                                            <td>{{$flight->email}}</td>
                                                            <td>{{$flight->phone}}</td>
                                                            <td>{{$flight->country}}</td>
                                                            <td>{{$flight->flight_name_ar}}</td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div><!-- end table-responsive -->
                                        </div>    
                                        @elseif(Auth::guard('members')->user()->type == "services")
                                        <div class="dashboard-listing invoices">
                                            <h3 class="dash-listing-heading">Services Reservations</h3>
                                            <div class="table-responsive">
                                                <table id="tables3" class="display table table-hover" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Name</th>
                                                            <th>Email</th>
                                                            <th>Phone Number</th>
                                                            <th>Country</th>
                                                            <th>Service</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($servicess as $service)
                                                        <tr>
                                                            <td>{{$loop->index + 1}}</td>
                                                            <td>{{$service->first_name}} {{$service->last_name}}</td>
                                                            <td>{{$service->email}}</td>
                                                            <td>{{$service->phone}}</td>
                                                            <td>{{$service->country}}</td>
                                                            <td>{{$service->name_ar}}</td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div><!-- end table-responsive -->
                                        </div> 
                                        <div class="dashboard-listing invoices">
                                            <h3 class="dash-listing-heading">Flight Reservations</h3>
                                            <div class="table-responsive">
                                                <table id="tables4" class="display table table-hover" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Name</th>
                                                            <th>Email</th>
                                                            <th>Phone Number</th>
                                                            <th>Country</th>
                                                            <th>Flight</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($flightss as $flight)
                                                        <tr>
                                                            <td>{{$loop->index + 1}}</td>
                                                            <td>{{$flight->first_name}} {{$flight->last_name}}</td>
                                                            <td>{{$flight->email}}</td>
                                                            <td>{{$flight->phone}}</td>
                                                            <td>{{$flight->country}}</td>
                                                            <td>{{$flight->flight_name_ar}}</td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div><!-- end table-responsive -->
                                        </div>
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
@include('site.pages.booking.scripts')