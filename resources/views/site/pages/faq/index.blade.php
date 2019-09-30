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
                    <h1 class="page-title">الاسئلة الشائعة</h1>
                    <ul class="breadcrumb">
                        <li><a href="{{route('site.home')}}">الرئيسية</a></li>
                        <li class="active">الاسئلة الشائعة</li>
                    </ul>
                </div><!-- end columns -->
                @elseif(Config::get('app.locale') == 'en')
                <div class="col-sm-12">
                    <h1 class="page-title">FAQ</h1>
                    <ul class="breadcrumb">
                        <li><a href="{{route('site.home')}}">Home</a></li>
                        <li class="active">FAQ</li>
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
        	<div>
                <div id="about-content" class="section-padding"> 
                    <div class="container">
                        <div class="row">

                            <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 content-side tvl-insurance-info">
                                <div class="space-right">
                                    <div class="insurance-desc mg-bot-60">
                                        <div class="innerpage-heading">
                                            <h1>لدينا في أسئلتنا المتكررة ما تبحث عنه.</h1>
                                            <p>توفيرًا لوقتك، فلقد وضعنا هنا معظم إجابات الأسئلة الشائعة، كل ما عليك فعله هو النقر على الفئة التي يقع فيها سؤالك.</p>
                                        </div><!-- end innerpage-heading -->
                                        
                                        <div class="panel-group faqs" id="accordion">
                                            <div class="panel panel-default">
                                              <div class="panel-heading">
                                                <h4 class="panel-title">
                                                  <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                                    عنوان السؤال ؟
                                                  </a><i class="indicator fa fa-minus pull-right"></i>
                                                </h4>
                                              </div>
                                              <div id="collapseOne" class="panel-collapse collapse in">
                                                <div class="panel-body">
                                                      الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال .
                                                </div>
                                              </div>
                                            </div>
                                            <div class="panel panel-default">
                                              <div class="panel-heading">
                                                <h4 class="panel-title">
                                                  <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                                    عنوان السؤال ؟
                                                  </a><i class="indicator fa fa-plus  pull-right"></i>
                                                </h4>
                                              </div>
                                              <div id="collapseTwo" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                      الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال .
                                                </div>
                                              </div>
                                            </div>
                                            <div class="panel panel-default">
                                              <div class="panel-heading">
                                                <h4 class="panel-title">
                                                  <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                                                    عنوان السؤال ؟
                                                  </a><i class="indicator fa fa-plus pull-right"></i>
                                                </h4>
                                              </div>
                                              <div id="collapseThree" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                      الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال .
                                                </div>
                                              </div>
                                            </div>
                                            <div class="panel panel-default">
                                              <div class="panel-heading">
                                                <h4 class="panel-title">
                                                  <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                                                    عنوان السؤال ؟
                                                  </a><i class="indicator fa fa-plus pull-right"></i>
                                                </h4>
                                              </div>
                                              <div id="collapseThree" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                      الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال .
                                                </div>
                                              </div>
                                            </div>
                                            <div class="panel panel-default">
                                              <div class="panel-heading">
                                                <h4 class="panel-title">
                                                  <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                                                    عنوان السؤال ؟
                                                  </a><i class="indicator fa fa-plus pull-right"></i>
                                                </h4>
                                              </div>
                                              <div id="collapseThree" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                      الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال .
                                                </div>
                                              </div>
                                            </div>
                                            <div class="panel panel-default">
                                              <div class="panel-heading">
                                                <h4 class="panel-title">
                                                  <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                                                    عنوان السؤال ؟
                                                  </a><i class="indicator fa fa-plus pull-right"></i>
                                                </h4>
                                              </div>
                                              <div id="collapseThree" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                      الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال .
                                                </div>
                                              </div>
                                            </div>
                                        </div> 
                                    </div><!-- end insurance-desc -->
                                </div><!-- end space-right -->
                            </div><!-- end columns -->
                            
                            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 side-bar blog-sidebar right-side-bar">                    
                                <div class="row">    
                                    <div class="col-xs-12 col-sm-6 col-md-12">
                                        <div class="side-bar-block categories">
                                            <h2 class="side-bar-heading">روابط مفيدة</h2>
                                            <ul class="nav nav-pills nav-stacked">
                                                <li><a href="#"><span><i class="fa fa-angle-right"></i></span>اسم الرابط 1</a></li>
                                                <li><a href="#"><span><i class="fa fa-angle-right"></i></span>اسم الرابط 2</a></li>
                                                <li><a href="#"><span><i class="fa fa-angle-right"></i></span>اسم الرابط 3</a></li>
                                                <li><a href="#"><span><i class="fa fa-angle-right"></i></span>اسم الرابط 4</a></li>
                                                <li><a href="#"><span><i class="fa fa-angle-right"></i></span>اسم الرابط 5</a></li>
                                                <li><a href="#"><span><i class="fa fa-angle-right"></i></span>اسم الرابط 6</a></li>
                                            </ul>
                                        </div><!-- end side-bar-block -->
                                    </div>
                                    
                                    <div class="col-xs-12 col-sm-6 col-md-12">
                                        <div class="side-bar-block contact">
                                            <h2 class="side-bar-heading">اتصل بنا</h2>
                                            <div class="c-list">
                                                <div class="icon"><span><i class="fa fa-envelope"></i></span></div>
                                                <div class="text"><p>support@sammumratk.com</p></div>
                                            </div><!-- end c-list -->
                                            
                                            <div class="c-list">
                                                <div class="icon"><span><i class="fa fa-phone"></i></span></div>
                                                <div class="text"><p>+222 – 5548 656</p></div>
                                            </div><!-- end c-list -->
                                            
                                            <div class="c-list">
                                                <div class="icon"><span><i class="fa fa-map-marker"></i></span></div>
                                                <div class="text"><p> 29 تفاصيل العنوان تفاصيل العنوان تفاصيل العنوان , المنطقة , الدولة</p></div>
                                            </div><!-- end c-list -->
                                        </div><!-- end side-bar-block -->
                                    </div><!-- end columns -->
                                </div><!-- end row -->
                            </div><!-- end columns -->
                        </div>
                    </div><!-- end container -->
                </div><!-- end about-content -->
                
                           
            </div><!-- end about-us -->
        </section><!-- end innerpage-wrapper -->

    @elseif(Config::get('app.locale') == 'en')
    <!--===== INNERPAGE-WRAPPER ====-->
    <section class="innerpage-wrapper">
        	<div>

                <div id="about-content" class="section-padding"> 
                    <div class="container">
                        <div class="row">

                            <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 content-side tvl-insurance-info">
                                <div class="space-right">
                                    <div class="insurance-desc mg-bot-60">
                                        <div class="innerpage-heading">
                                            <h1>لدينا في أسئلتنا المتكررة ما تبحث عنه.</h1>
                                            <p>توفيرًا لوقتك، فلقد وضعنا هنا معظم إجابات الأسئلة الشائعة، كل ما عليك فعله هو النقر على الفئة التي يقع فيها سؤالك.</p>
                                        </div><!-- end innerpage-heading -->
                                        
                                        <div class="panel-group faqs" id="accordion">
                                            <div class="panel panel-default">
                                              <div class="panel-heading">
                                                <h4 class="panel-title">
                                                  <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                                    عنوان السؤال ؟
                                                  </a><i class="indicator fa fa-minus pull-right"></i>
                                                </h4>
                                              </div>
                                              <div id="collapseOne" class="panel-collapse collapse in">
                                                <div class="panel-body">
                                                      الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال .
                                                </div>
                                              </div>
                                            </div>
                                            <div class="panel panel-default">
                                              <div class="panel-heading">
                                                <h4 class="panel-title">
                                                  <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                                    عنوان السؤال ؟
                                                  </a><i class="indicator fa fa-minus pull-right"></i>
                                                </h4>
                                              </div>
                                              <div id="collapseOne" class="panel-collapse collapse in">
                                                <div class="panel-body">
                                                      الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال .
                                                </div>
                                              </div>
                                            </div>
                                            <div class="panel panel-default">
                                              <div class="panel-heading">
                                                <h4 class="panel-title">
                                                  <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                                    عنوان السؤال ؟
                                                  </a><i class="indicator fa fa-minus pull-right"></i>
                                                </h4>
                                              </div>
                                              <div id="collapseOne" class="panel-collapse collapse in">
                                                <div class="panel-body">
                                                      الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال .
                                                </div>
                                              </div>
                                            </div>
                                            <div class="panel panel-default">
                                              <div class="panel-heading">
                                                <h4 class="panel-title">
                                                  <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                                    عنوان السؤال ؟
                                                  </a><i class="indicator fa fa-minus pull-right"></i>
                                                </h4>
                                              </div>
                                              <div id="collapseOne" class="panel-collapse collapse in">
                                                <div class="panel-body">
                                                      الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال .
                                                </div>
                                              </div>
                                            </div>
                                            <div class="panel panel-default">
                                              <div class="panel-heading">
                                                <h4 class="panel-title">
                                                  <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                                                    عنوان السؤال ؟
                                                  </a><i class="indicator fa fa-plus pull-right"></i>
                                                </h4>
                                              </div>
                                              <div id="collapseThree" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                      الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال .
                                                </div>
                                              </div>
                                            </div>
                                            <div class="panel panel-default">
                                              <div class="panel-heading">
                                                <h4 class="panel-title">
                                                  <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                                                    عنوان السؤال ؟
                                                  </a><i class="indicator fa fa-plus pull-right"></i>
                                                </h4>
                                              </div>
                                              <div id="collapseThree" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                      الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال .
                                                </div>
                                              </div>
                                            </div>
                                            <div class="panel panel-default">
                                              <div class="panel-heading">
                                                <h4 class="panel-title">
                                                  <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                                                    عنوان السؤال ؟
                                                  </a><i class="indicator fa fa-plus pull-right"></i>
                                                </h4>
                                              </div>
                                              <div id="collapseThree" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                      الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال الاجابة عن السؤال .
                                                </div>
                                              </div>
                                            </div>
                                        </div> 
                                    </div><!-- end insurance-desc -->
                                </div><!-- end space-right -->
                            </div><!-- end columns -->
                            
                            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 side-bar blog-sidebar right-side-bar">                    
                                <div class="row">    
                                    <div class="col-xs-12 col-sm-6 col-md-12">
                                        <div class="side-bar-block categories">
                                            <h2 class="side-bar-heading">روابط مفيدة</h2>
                                            <ul class="nav nav-pills nav-stacked">
                                                <li><a href="#"><span><i class="fa fa-angle-right"></i></span>اسم الرابط 1</a></li>
                                                <li><a href="#"><span><i class="fa fa-angle-right"></i></span>اسم الرابط 2</a></li>
                                                <li><a href="#"><span><i class="fa fa-angle-right"></i></span>اسم الرابط 3</a></li>
                                                <li><a href="#"><span><i class="fa fa-angle-right"></i></span>اسم الرابط 4</a></li>
                                                <li><a href="#"><span><i class="fa fa-angle-right"></i></span>اسم الرابط 5</a></li>
                                                <li><a href="#"><span><i class="fa fa-angle-right"></i></span>اسم الرابط 6</a></li>
                                            </ul>
                                        </div><!-- end side-bar-block -->
                                    </div>
                                    
                                    <div class="col-xs-12 col-sm-6 col-md-12">
                                        <div class="side-bar-block contact">
                                            <h2 class="side-bar-heading">اتصل بنا</h2>
                                            <div class="c-list">
                                                <div class="icon"><span><i class="fa fa-envelope"></i></span></div>
                                                <div class="text"><p>support@sammumratk.com</p></div>
                                            </div><!-- end c-list -->
                                            
                                            <div class="c-list">
                                                <div class="icon"><span><i class="fa fa-phone"></i></span></div>
                                                <div class="text"><p>+222 – 5548 656</p></div>
                                            </div><!-- end c-list -->
                                            
                                            <div class="c-list">
                                                <div class="icon"><span><i class="fa fa-map-marker"></i></span></div>
                                                <div class="text"><p> 29 تفاصيل العنوان تفاصيل العنوان تفاصيل العنوان , المنطقة , الدولة</p></div>
                                            </div><!-- end c-list -->
                                        </div><!-- end side-bar-block -->
                                    </div><!-- end columns -->
                                </div><!-- end row -->
                            </div><!-- end columns -->
                        </div>
                    </div><!-- end container -->
                </div><!-- end about-content -->
                
                           
            </div><!-- end about-us -->
        </section><!-- end innerpage-wrapper -->

    @endif
@endsection
@include('site.pages.faq.scripts')