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

    <!--Date-Picker Stylesheet-->
    <link rel="stylesheet" href="{{asset('vendors/site/AR/css/datepicker.css')}}">
        
    <!-- Slick Stylesheet -->
    <link rel="stylesheet" href="{{asset('vendors/site/AR/css/slick.css')}}">
    <link rel="stylesheet" href="{{asset('vendors/site/AR/css/slick-theme.css')}}">
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

    <!--Date-Picker Stylesheet-->
    <link rel="stylesheet" href="{{asset('vendors/site/EN/css/datepicker.css')}}">
        
    <!-- Slick Stylesheet -->
    <link rel="stylesheet" href="{{asset('vendors/site/EN/css/slick.css')}}">
    <link rel="stylesheet" href="{{asset('vendors/site/EN/css/slick-theme.css')}}">
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
    @if(Config::get('app.locale') == 'ar')
    <!--===== INNERPAGE-WRAPPER ====-->
    <section class="innerpage-wrapper">
        <div id="about-content-2" class="innerpage-section-padding">
            <div class="container">
                <div class="row">
                    
 
                    <div class="col-xs-12 col-sm-12 col-md-3 side-bar right-side-bar">
                            <div id="abt-cnt-2-img">
                                    <img src="{{asset('storage/uploads/flight/'.$flight->image)}}" class="img-responsive" alt="about-img">
                                </div><!-- end abt-cnt-2-img -->
                            <div class="side-bar-block booking-form-block">
                            	<h2 class="selected-price">${{$flight->price}} <span>شامل</span></h2>
                            
                            	<div class="booking-form">
                                	<h3>حجز الرحلة</h3>
                                    <p>حقق حلمك معنا اليوم</p>
                                    
                                    <form id="booking_form" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                    		<select class="form-control" name="status">
                                                <option selected>نوع الرحلة</option>
                                                <option value="1">ذهاب وعودة</option>
                                                <option value="0">ذهاب فقط</option>
                                            </select>                                   
                                            <i class="fa fa-angle-down"></i>
                                        </div>
                                    	<div class="form-group">
                                            <input type="hidden" value="{{$flight->id}}" name="flight_id"/> 
                                    		<input type="text" class="form-control" placeholder="الاسم الأول" name="first_name"/>                                       
                                        </div>
                                        
                                        <div class="form-group">
                                    		<input type="text" class="form-control" placeholder="الاسم الأخير" name="last_name"/>                                       
                                        </div>
                                        
                                        <div class="form-group">
                                    		<input type="email" class="form-control" placeholder="البريد الالكترونى" name="email"/>                                       
                                        </div>
                                        
                                        <div class="form-group">
                                    		<input type="text" class="form-control" placeholder="الهاتف" name="phone"/>                                       
                                        </div>
                                        
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="المغادرة من" name="country"/>  
                                            <i class="fa fa-map-marker"></i>                                     
                                        </div>
                                        
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="الوجهة" name="destination"/>     
                                            <i class="fa fa-map-marker"></i>                                  
                                        </div>

                                        <div class="form-group">
                                    		<input type="text" class="form-control dpd1" placeholder="تاريخ الوصول" name="arrival"/>                                       		<i class="fa fa-calendar"></i>
                                        </div>
                                        
                                        <div class="form-group">
                                    		<input type="text" class="form-control dpd2" placeholder="تاريخ المغادرة" name="leaving"/>                                       		<i class="fa fa-calendar"></i>
                                        </div>
                                        <div class="form-group">
                                    		<select class="form-control" name="status">
                                                <option selected>الدرجة</option>
                                                <option value="سياحية">سياحية</option>
                                                <option value="رجال اعمال">رجال اعمال</option>
                                                <option value="درجة أولى">درجة أولى</option>
                                            </select>          
                                            <i class="fa fa-angle-down"></i>                        
                                        </div>
                                        <div class="row">
                                        	<div class="col-sm-6 col-md-12 col-lg-6 no-sp-r">
                                                <div class="form-group right-icon">
                                                    <input type="number" class="form-control" placeholder="عدد البالغين" name="adults"/>
                                                </div>
                                            </div>
                                            
                                            <div class="col-sm-6 col-md-12 col-lg-6 no-sp-l">    
                                                <div class="form-group right-icon">
                                                    <input type="number" class="form-control" placeholder="عدد الأطفال" name="children"/>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="checkbox custom-check">
                                        	<input type="checkbox" id="check01" name="checkbox" checked/>
                                            <label for="check01"><span><i class="fa fa-check"></i></span>للاستمرار , انت موافق على <a href="#">الشروط والاحكام.</a></label>                                        </div>
                                        
                                        <button type="submit" class="btn btn-block btn-orange">تأكيد الحجز</button>
                                        {{csrf_field()}}
                                    </form>

                                </div><!-- end booking-form -->
                            </div><!-- end side-bar-block -->
                            
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 col-md-12">
                                    <div class="side-bar-block main-block ">
                                        <div class="main-img ad-img">
                                            <a href="#">
                                                <img src="{{asset('vendors/site/EN/images/car-ad.jpg')}}" class="img-responsive" alt="car-ad" />
                                                <div class="ad-mask">
                                                    <div class="ad-text">
                                                        <span>الترفيه</span>
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
                                        <h3>تحتاج مساعدة؟</h3>
                                        <p>{{$data->get('contact_ar')}}</p>
                                        <div class="support-contact">
                                            <span><i class="fa fa-phone"></i></span>
                                            <p>{{$contact->get('phone')}}</p>
                                        </div><!-- end support-contact -->
                                    </div><!-- end side-bar-block -->
                                </div><!-- end columns -->
                                
                            </div><!-- end row -->
                        </div><!-- end columns --> 
                    <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
                        <div id="abt-cnt-2-text">
                            <h2>مرحبا بكم في رحلة<span><span><i class="fa fa-plane"></i> {{$flight->flight_name_ar}}</span></h2>
                            <p>{{$flight->content_ar}}</p>                           
                            <div class="tab-text">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <tbody>
                                            <tr>
                                                <td>السعر</td>
                                                <td>{{$flight->price}} $</td>
                                            </tr>
                                            <tr>
                                                <td>مدة الرحلة</td>
                                                <td>{{$flight->duration_ar}}</td>
                                            </tr>
                                            <tr>
                                                <td>كود الرحلة</td>
                                                <td>{{$flight->code}}</td>
                                            </tr>
                                            <tr>
                                                <td>وقت الاقلاع</td>
                                                <td>{{$flight->start}}</td>
                                            </tr>
                                            <tr>
                                                <td>وقت النزول</td>
                                                <td>{{$flight->end}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div><!-- end table-responsive -->
                            </div>
                        </div><!-- end abt-cnt-2-text -->
                    </div><!-- end columns -->
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end about-content-2 -->           
    </section>
    @elseif(Config::get('app.locale') == 'en')
    <!--===== INNERPAGE-WRAPPER ====-->
    <section class="innerpage-wrapper">
        <div id="about-content-2" class="innerpage-section-padding">
            <div class="container">
                <div class="row">

                    <div class="col-xs-12 col-sm-12 col-md-3 side-bar right-side-bar">
                            <div id="abt-cnt-2-img">
                                    <img src="{{asset('storage/uploads/flight/'.$flight->image)}}" class="img-responsive" alt="about-img">
                                </div><!-- end abt-cnt-2-img -->
                            <div class="side-bar-block booking-form-block">
                            	<h2 class="selected-price">${{$flight->price}}<span>De Forte</span></h2>
                            
                            	<div class="booking-form">
                                	<h3>Book Flight</h3>
                                    
                                    <form id="booking_form" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                    		<select class="form-control" name="status">
                                                <option selected>Flight Type</option>
                                                <option value="1">going and coming back</option>
                                                <option value="0">One way</option>
                                            </select>      
                                            <i class="fa fa-angle-down"></i>                          
                                        </div>
                                    	<div class="form-group">
                                            <input type="hidden" value="{{$flight->id}}" name="flight_id"/> 
                                    		<input type="text" class="form-control" placeholder="First Name" name="first_name"/>                                       
                                        </div>
                                        
                                        <div class="form-group">
                                    		<input type="text" class="form-control" placeholder="Last Name" name="last_name"/>                                       
                                        </div>
                                        
                                        <div class="form-group">
                                    		<input type="email" class="form-control" placeholder="Email" name="email"/>                                       
                                        </div>
                                        
                                        <div class="form-group">
                                    		<input type="text" class="form-control" placeholder="Phone" name="phone"/>                                       
                                        </div>
                                        
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Leaving From" name="country"/>  
                                            <i class="fa fa-map-marker"></i>                                     
                                        </div>

                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Destination" name="destination"/> 
                                            <i class="fa fa-map-marker"></i>                                      
                                        </div>
                                        
                                        <div class="form-group">
                                    		<input type="text" class="form-control dpd1" placeholder="Arrival Date" name="arrival"/>                                       		<i class="fa fa-calendar"></i>
                                        </div>
                                        
                                        <div class="form-group">
                                    		<input type="text" class="form-control dpd2" placeholder="Departure Date" name="leaving"/>                                       		<i class="fa fa-calendar"></i>
                                        </div>
                                        <div class="form-group">
                                    		<select class="form-control" name="class">
                                                <option selected>Class</option>
                                                <option value="Economy">Economy</option>
                                                <option value="Business">Business</option>
                                                <option value="First Class">First Class</option>
                                            </select> 
                                            <i class="fa fa-angle-down"></i>                                  
                                        </div>
                                        <div class="row">
                                        	<div class="col-sm-6 col-md-12 col-lg-6 no-sp-r">
                                                <div class="form-group right-icon">
                                                    <input type="number" class="form-control" placeholder="Adults" name="adults"/>
                                                </div>
                                            </div>
                                            
                                            <div class="col-sm-6 col-md-12 col-lg-6 no-sp-l">    
                                                <div class="form-group right-icon">
                                                    <input type="number" class="form-control" placeholder="Children" name="children"/>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="checkbox custom-check">
                                        	<input type="checkbox" id="check01" name="checkbox" checked/>
                                            <label for="check01"><span><i class="fa fa-check"></i></span>By continuing, you are agree to the <a href="#">Terms & Conditions.</a></label>
                                        </div>
                                        
                                        <button type="submit" class="btn btn-block btn-orange">Confirm Booking</button>
                                        {{csrf_field()}}
                                    </form>

                                </div><!-- end booking-form -->
                            </div><!-- end side-bar-block -->
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 col-md-12">
                                    <div class="side-bar-block main-block ">
                                        <div class="main-img ad-img">
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
                                
                            </div><!-- end row -->
                        </div><!-- end columns --> 
                    <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
                        <div id="abt-cnt-2-text">
                            <h2>Welcome to your trip<span><span><i class="fa fa-plane"></i> {{$flight->flight_name_en}}</span></h2>
                            <p>{{$flight->content_en}}</p>                           
                            <div class="tab-text">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <tbody>
                                            <tr>
                                                <td>Price</td>
                                                <td>{{$flight->price}} $</td>
                                            </tr>
                                            <tr>
                                                <td>Trip Duration</td>
                                                <td>{{$flight->duration_en}}</td>
                                            </tr>
                                            <tr>
                                                <td>Trip Code</td>
                                                <td>{{$flight->code}}</td>
                                            </tr>
                                            <tr>
                                                <td>Flight Start Time</td>
                                                <td>{{$flight->start}}</td>
                                            </tr>
                                            <tr>
                                                <td>Flight End Time</td>
                                                <td>{{$flight->end}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div><!-- end table-responsive -->
                            </div>
                        </div><!-- end abt-cnt-2-text -->
                    </div><!-- end columns -->
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end about-content-2 -->           
    </section>
    @endif
@endsection
@include('site.pages.hotel.scripts')