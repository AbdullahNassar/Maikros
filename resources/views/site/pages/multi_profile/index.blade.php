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
                                            <li class="active"><a href="{{route('site.multiProfile')}}"><span><i class="fa fa-user"></i></span>البروفايل</a></li>
                                            <li><a href="{{route('site.booking')}}"><span><i class="fa fa-briefcase"></i></span>الحجز</a></li>
                                            <li><a href="{{route('site.cart')}}"><span><i class="fa fa-shopping-cart"></i></span>السلة</a></li>
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
                                                            <li><span>رقم السجل التجارى:</span> {{(new DateTime(Auth::guard('members')->user()->birth))->format('j')}} {{(new DateTime(Auth::guard('members')->user()->birth))->format('M')}} {{(new DateTime(Auth::guard('members')->user()->birth))->format('Y')}}</li>
                                                            <li><span>البريد الالكترونى:</span> {{Auth::guard('members')->user()->email}}</li>
                                                            <li><span>الهاتف:</span> {{Auth::guard('members')->user()->phone}}</li>
                                                            <li><span>العنوان:</span> {{Auth::guard('members')->user()->address}}</li>
                                                            <li><span>الدولة:</span> {{Auth::guard('members')->user()->country}}</li>
                                                            <li><span>رقم المكتب:</span> {{Auth::guard('members')->user()->national_id}}</li>
                                                            <li><span>رقم الحساب الدولى:</span> {{Auth::guard('members')->user()->about}}</li>
                                                            <li><span>الرصيد:</span> {{Auth::guard('members')->user()->wallet}}</li>
                                                        </ul>
                                                        <button class="btn" data-toggle="modal" data-target="#edit-profile">تعديل</button>
                                                   	</div><!-- end columns -->
                                                    
                                                </div><!-- end row -->
                                            </div><!-- end panel-body -->
                                            <div class="panel-heading"><h4>اضف الى المحفظة</h4></div>
                                            <div class="panel-body">
                                            	<div class="row">
                                                    <form method="POST" action="{{ route('site.payfort') }}"> 
                                                        {{csrf_field()}}
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <input type="number" class="form-control" name="amount" placeholder="المبلغ">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <button type="submit" class="btn btn-orange btn-lg pull-right">حفظ</button>
                                                            </div>
                                                        </div>
                                                    </form>
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
                                        <label>رقم السجل التجارى</label>
                                        <input type="text" class="form-control" placeholder="رقم السجل التجارى" name="birth" value="{{Auth::guard('members')->user()->birth}}"/>
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
                                        <label>رقم المكتب</label>
                                        <input type="text" class="form-control" placeholder="رقم المكتب" name="national_id" value="{{Auth::guard('members')->user()->national_id}}"/>
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
                                        <label>رقم الحساب الدولى</label>
                                        <input type="text" class="form-control" placeholder="رقم الحساب الدولى" name="about" value="{{Auth::guard('members')->user()->about}}"/>
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
                                            <li class="active"><a href="{{route('site.multiProfile')}}"><span><i class="fa fa-user"></i></span>Profile</a></li>
                                            <li><a href="{{route('site.booking')}}"><span><i class="fa fa-briefcase"></i></span>Booking</a></li>
                                            <li><a href="{{route('site.cart')}}"><span><i class="fa fa-shopping-cart"></i></span>Cart</a></li>
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
                                                            <li><span>Commercial Registration:</span> {{(new DateTime(Auth::guard('members')->user()->birth))->format('j')}} {{(new DateTime(Auth::guard('members')->user()->birth))->format('M')}} {{(new DateTime(Auth::guard('members')->user()->birth))->format('Y')}}</li>
                                                            <li><span>Email:</span> {{Auth::guard('members')->user()->email}}</li>
                                                            <li><span>Phone:</span> {{Auth::guard('members')->user()->phone}}</li>
                                                            <li><span>Address:</span> {{Auth::guard('members')->user()->address}}</li>
                                                            <li><span>Country:</span> {{Auth::guard('members')->user()->country}}</li>
                                                            <li><span>Office Number:</span> {{Auth::guard('members')->user()->national_id}}</li>
                                                            <li><span>International Account Number:</span> {{Auth::guard('members')->user()->about}}</li>
                                                            <li><span>Balance:</span> {{Auth::guard('members')->user()->wallet}}</li>
                                                        </ul>
                                                        <button class="btn" data-toggle="modal" data-target="#edit-profile">Edit Profile</button>
                                                        
                                                   	</div><!-- end columns -->
                                                </div><!-- end row -->
                                            </div><!-- end panel-body -->
                                            <div class="panel-heading"><h4>Add to Wallet</h4></div>
                                            <div class="panel-body">
                                            	<div class="row">
                                                    <form method="POST" action="{{ route('site.payfort') }}"> 
                                                        {{csrf_field()}}
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <input type="number" class="form-control" name="amount" placeholder="Amount">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <button type="submit" class="btn btn-orange btn-lg pull-right">Save</button>
                                                            </div>
                                                        </div>
                                                    </form>
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
@include('site.pages.multi_profile.scripts')