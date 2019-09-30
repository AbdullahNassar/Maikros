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
        
    <!-- Custom Stylesheets -->	
    <link rel="stylesheet" href="{{asset('vendors/site/AR/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('vendors/site/AR/css/responsive.css')}}">

    <!-- Owl Carousel Stylesheet -->
    <link rel="stylesheet" href="{{asset('vendors/site/AR/css/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('vendors/site/AR/css/owl.theme.css')}}">

    <!-- Magnific Gallery -->
    <link rel="stylesheet" href="{{asset('vendors/site/AR/css/magnific-popup.css')}}">
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
    <link rel="stylesheet" href="{{asset('vendors/site/EN/css/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('vendors/site/EN/css/owl.theme.css')}}">

    <!-- Magnific Gallery -->
    <link rel="stylesheet" href="{{asset('vendors/site/EN/css/magnific-popup.css')}}">
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
                    <h1 class="page-title">اتصل بنا</h1>
                    <ul class="breadcrumb">
                        <li><a href="{{route('site.home')}}">الرئيسية</a></li>
                        <li class="active">اتصل بنا</li>
                    </ul>
                </div><!-- end columns -->
                @elseif(Config::get('app.locale') == 'en')
                <div class="col-sm-12">
                    <h1 class="page-title">Contact Us</h1>
                    <ul class="breadcrumb">
                        <li><a href="{{route('site.home')}}">Home</a></li>
                        <li class="active">Contact Us</li>
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
        	<div id="contact-us" class="innerpage-section-padding">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-md-5 no-pd-r">
                        	<div class="custom-form contact-form">
                            	<h3>تواصل معنا</h3>
                                <p>{{$data->get('contact_ar')}}</p>
                                <form id="contact_form" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                         <input type="text" class="form-control" placeholder="الاسم" name="name" id="name"/>
                                         <span><i class="fa fa-user"></i></span>
                                    </div>
    
                                    <div class="form-group">
                                         <input type="email" class="form-control" placeholder="البريد الالكتروني"  name="email" id="email"/>
                                         <span><i class="fa fa-envelope"></i></span>
                                    </div>
                                    
                                    <div class="form-group">
                                         <input type="text" class="form-control" placeholder="الهاتف" name="phone" id="phone"/>
                                         <span><i class="fa fa-info-circle"></i></span>
                                    </div>
    
                                    <div class="form-group">
                                        <textarea class="form-control" rows="4" placeholder="رسالتك" name="message" id="message"></textarea>
                                        <span><i class="fa fa-pencil"></i></span>
                                    </div>
    								
                                    <button class="btn btn-orange btn-block" type="submit">ارسال</button>
                                    {{csrf_field()}}
                                </form>
                            </div><!-- end contact-form -->
                        </div><!-- end columns -->
                        
                        <div class="col-sm-12 col-md-7 no-pd-l">
                            <div class="map">
                                <iframe src= "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6509729.487836256!2d-123.77686152799836!3d37.1864783963941!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x808fb9fe5f285e3d%3A0x8b5109a227086f55!2sCalifornia!5e0!3m2!1sen!2s!4v1490695907554" allowfullscreen></iframe>
                            </div><!-- end map -->
                        </div><!-- end columns -->
                        
                    </div><!-- end row -->
                </div><!-- end container -->   
            </div><!-- end contact-us -->
        </section><!-- end innerpage-wrapper -->
    @elseif(Config::get('app.locale') == 'en')
    <!--===== INNERPAGE-WRAPPER ====-->
        <section class="innerpage-wrapper">
        	<div id="contact-us" class="innerpage-section-padding">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-md-5 no-pd-r">
                        	<div class="custom-form contact-form">
                            	<h3>Contact Us</h3>
                                <p>{{$data->get('contact_en')}}</p>
                                <form id="contact_form" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                         <input type="text" class="form-control" name="name" placeholder="Your Name" id="name"/>
                                         <span><i class="fa fa-user"></i></span>
                                    </div>
                                    <div class="form-group">
                                         <input type="email" class="form-control" name="email" placeholder="Your Email" id="email"/>
                                         <span><i class="fa fa-envelope"></i></span>
                                    </div>
                                    
                                    <div class="form-group">
                                         <input type="text" class="form-control" name="phone" placeholder="Your Phone" id="phone"/>
                                         <span><i class="fa fa-info-circle"></i></span>
                                    </div>
    
                                    <div class="form-group">
                                        <textarea class="form-control" rows="4" name="message" placeholder="Your Message" id="message"></textarea>
                                        <span><i class="fa fa-pencil"></i></span>
                                    </div>
                                    <button class="btn btn-orange btn-block" type="submit">Send</button>
                                    {{csrf_field()}}
                                </form>
                            </div><!-- end contact-form -->
                        </div><!-- end columns -->
                        
                        <div class="col-sm-12 col-md-7 no-pd-l">
                            <div class="map">
                                <iframe src= "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6509729.487836256!2d-123.77686152799836!3d37.1864783963941!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x808fb9fe5f285e3d%3A0x8b5109a227086f55!2sCalifornia!5e0!3m2!1sen!2s!4v1490695907554" allowfullscreen></iframe>
                            </div><!-- end map -->
                        </div><!-- end columns -->
                        
                    </div><!-- end row -->
                </div><!-- end container -->   
            </div><!-- end contact-us -->
        </section><!-- end innerpage-wrapper -->
    @endif
@endsection
@include('site.pages.contact.scripts')