@extends('site.layouts.master')
@section('meta')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
@endsection
@if(Config::get('app.locale') == 'ar')
    @section('title','نتائج البحث')
@elseif(Config::get('app.locale') == 'en')
    @section('title','Search Result')
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
    <!--=================== PAGE-COVER =================-->
    <section class="page-cover">
        <div class="container">
            <div class="row">
                @if(Config::get('app.locale') == 'ar')
                <div class="col-sm-12">
                    <h1 class="page-title">نتائج البحث</h1>
                    <ul class="breadcrumb">
                        <li><a href="{{route('site.home')}}">الرئيسية</a></li>
                        <li>نتائج البحث</li>
                    </ul>
                </div><!-- end columns -->
                @elseif(Config::get('app.locale') == 'en')
                <div class="col-sm-12">
                    <h1 class="page-title">Search Result</h1>
                    <ul class="breadcrumb">
                        <li><a href="{{route('site.home')}}">Home</a></li>
                        <li>Search Result</li>
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
        	<div id="flight-listings" class="innerpage-section-padding">
                <div class="container">
                    <div class="row">        	
                    
                        <div class="col-xs-12 col-sm-12 col-md-9 content-side">
                            <div class="side-bar fullform">
                                <div class="booking-form booking-form-block">
                                    <form id="add_data" method="POST" enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <input type="hidden" name="adults" value="{{$adults+$children}}"/> 
                                        <h3 style="text-align: center;">بيانات النزلاء</h3>
                                        @for($i = 0; $i < $adults+$children; $i++)
                                            <hr><h3>النزيل رقم ({{$i+1}})</h3><hr>
                                            <div class="form-group custom-inputfile">
                                                <input type="file" name="image{{$i}}" id="image{{$i}}" class="inputfile inputfile-6" data-multiple-caption="{count} files selected" multiple />
                                                <label for="image{{$i}}"><span></span> <strong><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> اختر صورة&hellip;</strong></label>
                                            </div>
                                            <div class="form-group custom-inputfile">
                                                <input type="file" name="p_image{{$i}}" id="p_image{{$i}}" class="inputfile inputfile-6" data-multiple-caption="{count} files selected" multiple />
                                                <label for="p_image{{$i}}"><span></span> <strong><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> اختر صورةالباسبور&hellip;</strong></label>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="الاسم الأول" name="first_name{{$i}}"/>                                       
                                            </div>
                                            
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="الاسم الاخير" name="last_name{{$i}}"/>                                       
                                            </div>
                                            
                                            <div class="form-group">
                                                <input type="email" class="form-control" placeholder="البريد الالكتروني" name="email{{$i}}"/>                                       
                                            </div>
                                            
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="الهاتف" name="phone{{$i}}"/>                                       
                                            </div>
                                            
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="الجنسية" name="nationality{{$i}}"/>                                       
                                            </div>
    
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="رقم جواز السفر" name="passport{{$i}}"/>                                       
                                            </div>

                                            <div class="form-group rs-select2">
                                                <select class="select2" name="gender{{$i}}">
                                                    <option>النوع</option>
                                                    <option value="ذكر">ذكر</option>
                                                    <option value="انثى">انثى</option>
                                                </select>
                                            </div>
    
                                            <div class="form-group">
                                                <input type="date" class="form-control" placeholder="تاريخ الميلاد" name="birth{{$i}}"/>                                       		
                                            </div>
                                        @endfor
                                        
                                        <button type="submit" class="btn btn-block btn-orange">حفظ</button>
                                    </form>
                                </div>
                            </div>
                        </div><!-- end columns -->

                        <div class="col-xs-12 col-sm-12 col-md-3 side-bar left-side-bar">
                                        
                            <ul class="umrahtak">
                                    <li><a href="#" class="btn btn-o-border btn-block btn-lg">فنادق مكة <span><i class="fa fa-check"></i></span> </a></li>
                                    <li><a href="#" class="btn btn-o-border btn-block btn-lg">فنادق المدينة <span><i class="fa fa-check"></i></span> </a></li>
                                    <li><a href="#" class="btn btn-o-border btn-block btn-lg"> الخدمات <span><i class="fa fa-check"></i></span></a></li>
                                    <li><a href="#" class="btn btn-o-border btn-block btn-lg"> ملئ بيانات النزيل <span><i class="fa fa-check"></i></span></a></li>
                                <li><a href="{{route('site.cart')}}" class="btn btn-orange btn-block btn-lg"> الدفع <span><i class="fa fa-plus-circle"></i></span></a></li>
                            </ul>
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 col-md-12">
                                    
                                    <div class="side-bar-block filter-block">
                                        <h3>معلومات البحث</h3>
                                        <p>اكتشف رحلات أحلامك اليوم</p>
                                        
                                        <div class="panel panel-default">
                                            <div class="panel-heading">		
                                                <label>المدينة :</label>			
                                                <input type="text" name="city" id="city" value="{{$town}}" disabled maxlength="8" size="8" style="background-color: white; border-style: none;">
                                            </div><!-- end panel-heading -->
                                        </div><!-- end panel-default -->
                                        
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <label>عدد البالغين :</label>						
                                                <input type="text" name="adults" id="adults" value="{{$adults}}" disabled maxlength="4" size="4" style="background-color: white; border-style: none;">
                                            </div><!-- end panel-heading -->
                                        </div><!-- end panel-default -->
                                        
                                        <div class="panel panel-default">
                                            <div class="panel-heading">	
                                                <label>عدد الأطفال :</label>				
                                                <input type="text" name="children" id="children" value="{{$children}}" disabled maxlength="4" size="4" style="background-color: white; border-style: none;">
                                            </div><!-- end panel-heading -->
                                        </div><!-- end panel-default -->

                                        <div class="panel panel-default">
                                            <div class="panel-heading">	
                                                <label>عدد الغرف : </label>				
                                                <input type="text" name="rooms" id="rooms" value="{{$rooms}}" disabled maxlength="4" size="4" style="background-color: white; border-style: none;">
                                            </div><!-- end panel-heading -->
                                        </div><!-- end panel-default -->
                                    </div><!-- end side-bar-block -->
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 col-md-12">
                                    <div class="side-bar-block main-block">
                                        <div class="main-img ad-img">
                                            <a href="#">
                                                <img src="{{asset('vendors/site/EN/images/car-ad.jpg')}}" class="img-responsive" />
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
                        
                    </div><!-- end row -->
                </div><!-- end container -->
            </div><!-- end flight-listings -->
        </section><!-- end innerpage-wrapper -->
    @elseif(Config::get('app.locale') == 'en')
    <!--===== INNERPAGE-WRAPPER ====-->
    <section class="innerpage-wrapper">
        <div id="flight-listings" class="innerpage-section-padding">
            <div class="container">
                <div class="row">        	
                
                    <div class="col-xs-12 col-sm-12 col-md-9 content-side">
                        <div class="side-bar fullform">
                                <div class="booking-form booking-form-block">
                                    <form id="add_data" method="POST" enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <input type="hidden" name="adults" value="{{$adults+$children}}"/> 
                                        <h3 style="text-align: center;">Guests Data</h3>
                                        @for($i = 0; $i < $adults+$children; $i++)
                                            <hr><h3>Guest Number ({{$i+1}})</h3><hr>
                                            <div class="form-group custom-inputfile">
                                                <input type="file" name="image{{$i}}" id="image{{$i}}" class="inputfile inputfile-6" data-multiple-caption="{count} files selected" multiple />
                                                <label for="image{{$i}}"><span></span> <strong><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> Choose Image&hellip;</strong></label>
                                            </div>
                                            <div class="form-group custom-inputfile">
                                                <input type="file" name="p_image{{$i}}" id="p_image{{$i}}" class="inputfile inputfile-6" data-multiple-caption="{count} files selected" multiple />
                                                <label for="p_image{{$i}}"><span></span> <strong><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> Choose Passport Image&hellip;</strong></label>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="First Name" name="first_name{{$i}}"/>
                                            </div>
                                            
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Last Name" name="last_name{{$i}}"/>                                       
                                            </div>
                                            
                                            <div class="form-group">
                                                <input type="email" class="form-control" placeholder="Email" name="email{{$i}}"/>                                       
                                            </div>
                                            
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Phone" name="phone{{$i}}"/>                                       
                                            </div>
                                            
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Nationality" name="nationality{{$i}}"/>                                       
                                            </div>
    
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Passport ID" name="passport{{$i}}"/>                                       
                                            </div>

                                            <div class="form-group rs-select2">
                                                <select class="select2" name="gender{{$i}}">
                                                    <option>Gender</option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                </select>
                                            </div>
    
                                            <div class="form-group">
                                                <input type="text" class="form-control " placeholder="Date Of Birth" name="birth{{$i}}"/>                                       		
                                            </div>
                                        @endfor
                                        
                                        <button type="submit" class="btn btn-block btn-orange">Save</button>
                                    </form>
                                </div>
                            </div>
                    </div><!-- end columns -->

                    <div class="col-xs-12 col-sm-12 col-md-3 side-bar left-side-bar">
                                    
                        <ul class="umrahtak">
                                <li><a href="#" class="btn btn-o-border btn-block btn-lg">Mekkah Hotels <span><i class="fa fa-check"></i></span> </a></li>
                                <li><a href="#" class="btn btn-o-border btn-block btn-lg">Madinah Hotels <span><i class="fa fa-check"></i></span> </a></li>
                                <li><a href="#" class="btn btn-o-border btn-block btn-lg">Fill Guests Data <span><i class="fa fa-check"></i></span> </a></li>
                                <li><a href="#" class="btn btn-o-border btn-block btn-lg"> Services <span><i class="fa fa-check"></i></span></a></li>
                            <li><a href="{{route('site.cart')}}" class="btn btn-orange btn-block btn-lg"> Payment <span><i class="fa fa-plus-circle"></i></span></a></li>
                        </ul>
                        <div class="row">
                                <div class="col-xs-12 col-sm-6 col-md-12">
                                    <div class="side-bar-block filter-block">
                                        <h3>Search Info</h3>
                                        <p>Find your dream flights today</p>
                                        
                                        <div class="panels-group">
                                            
                                            <div class="panel panel-default">
                                                <div class="panel-heading">		
                                                    <label>City : </label>
                                                    <input type="text" name="city" id="city" value="{{$town}}" disabled maxlength="8" size="8" style="background-color: white; border-style: none;">
                                                </div><!-- end panel-heading -->
                                            </div><!-- end panel-default -->
                                            
                                            <div class="panel panel-default">
                                                <div class="panel-heading">	
                                                    <label>Adults : </label>				
                                                    <input type="text" name="adults" id="adults" value="{{$adults}}" disabled maxlength="4" size="4" style="background-color: white; border-style: none;">
                                                </div><!-- end panel-heading -->
                                            </div><!-- end panel-default -->
                                            
                                            <div class="panel panel-default">
                                                <div class="panel-heading">	
                                                    <label>Children : </label>				
                                                    <input type="text" name="children" id="children" value="{{$children}}" disabled maxlength="4" size="4" style="background-color: white; border-style: none;">
                                                </div><!-- end panel-heading -->
                                            </div><!-- end panel-default -->

                                            <div class="panel panel-default">
                                                <div class="panel-heading">	
                                                    <label>Rooms : </label>				
                                                    <input type="text" name="rooms" id="rooms" value="{{$rooms}}" disabled maxlength="4" size="4" style="background-color: white; border-style: none;">
                                                </div><!-- end panel-heading -->
                                            </div><!-- end panel-default -->
                                            
                                        </div><!-- end panel-group -->
                                    </div><!-- end side-bar-block -->
                                </div>
                            </div>
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
            </div><!-- end container -->
        </div><!-- end flight-listings -->
    </section><!-- end innerpage-wrapper -->
    @endif
@endsection
@include('site.pages.add_data.scripts')