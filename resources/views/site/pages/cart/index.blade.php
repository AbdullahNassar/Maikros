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
@include('site.pages.profile.scripts')