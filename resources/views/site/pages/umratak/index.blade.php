<!doctype html>
<html>
    <head>
        @if(Config::get('app.locale') == 'ar')
            <title>مايكروس</title>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width,initial-scale=1">
            <link rel="icon" href="{{asset('vendors/site/AR/images/favicon.png')}}" type="image/x-icon">
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
            <!-- Flex Slider Stylesheet -->
            <link rel="stylesheet" href="{{asset('vendors/site/AR/css/flexslider.css')}}" type="text/css" />
            
            <!--Date-Picker Stylesheet-->
            <link rel="stylesheet" href="{{asset('vendors/site/AR/css/datepicker.css')}}">

            <!-- Magnific Gallery -->
            <link rel="stylesheet" href="{{asset('vendors/site/AR/css/magnific-popup.css')}}">
            <link href="{{asset('vendors/toastr/toastr.min.css')}}" rel="stylesheet">

        @elseif(Config::get('app.locale') == 'en')
            <title>Maikros</title>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width,initial-scale=1">
            <link rel="icon" href="{{asset('vendors/site/EN/images/favicon.png')}}" type="image/x-icon">

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
            <!-- Flex Slider Stylesheet -->
            <link rel="stylesheet" href="{{asset('vendors/site/EN/css/flexslider.css')}}" type="text/css" />
            
            <!--Date-Picker Stylesheet-->
            <link rel="stylesheet" href="{{asset('vendors/site/EN/css/datepicker.css')}}">
            <!-- Magnific Gallery -->
            <link rel="stylesheet" href="{{asset('vendors/site/EN/css/magnific-popup.css')}}">
            <link href="{{asset('vendors/toastr/toastr.min.css')}}" rel="stylesheet">
        @endif
    </head>
    <body id="hotel-homepage">
        
        <!--====== LOADER =====-->
        <div class="loader"></div>
        @if(Config::get('app.locale') == 'ar')
        <!--======== SEARCH-OVERLAY =========-->       
        <div class="overlay">
            <a href="javascript:void(0)" id="close-button" class="closebtn">&times;</a>
            <div class="overlay-content">
                <div class="form-center">
                    <form method="GET" action="{{route('site.arsearch')}}">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="ابحث هنا....." required />
                                <span class="input-group-btn"><button type="submit" class="btn"><span><i class="fa fa-search"></i></span></button></span>
                            </div><!-- end input-group -->
                        </div><!-- end form-group -->
                    </form>
                </div><!-- end form-center -->
            </div><!-- end overlay-content -->
        </div><!-- end overlay -->
        @elseif(Config::get('app.locale') == 'en')
        <!--======== SEARCH-OVERLAY =========-->       
        <div class="overlay">
            <a href="javascript:void(0)" id="close-button" class="closebtn">&times;</a>
            <div class="overlay-content">
                <div class="form-center">
                    <form method="GET" action="{{route('site.ensearch')}}">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search Here....." required />
                                <span class="input-group-btn"><button type="submit" class="btn"><span><i class="fa fa-search"></i></span></button></span>
                            </div><!-- end input-group -->
                        </div><!-- end form-group -->
                    </form>
                </div><!-- end form-center -->
            </div><!-- end overlay-content -->
        </div><!-- end overlay -->
        @endif
        <!--============= TOP-BAR ===========-->
        <div id="top-bar" class="tb-text-grey">
            <div class="container">
                <div class="row">          
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <div id="info">
                            <ul class="list-unstyled list-inline">
                                <li><span><i class="fa fa-phone"></i></span>{{$contact->get('phone')}}</li>
                                @if(Config::get('app.locale') == 'ar')
                                <li><span><i class="fa fa-map-marker"></i></span>{{$contact->get('address_ar')}}</li>                               
                                @elseif(Config::get('app.locale') == 'en')
                                <li><span><i class="fa fa-map-marker"></i></span>{{$contact->get('address_en')}}</li> 
                                @endif
                            </ul>
                        </div><!-- end info -->
                    </div><!-- end columns -->
                    
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <div id="links">
                            <ul class="list-unstyled list-inline">
                                <li>
                                    <div class="form-group language">
                                        @if (Config::get('app.locale') == 'ar') 
                                            <span><a href="{{route('site.lang','en')}}"><img src="{{asset('vendors/site/EN/images/us.png')}}" alt=""></a></span>
                                        @elseif(Config::get('app.locale') == 'en')
                                            <span><a href="{{route('site.lang','ar')}}"><img src="{{asset('vendors/site/EN/images/sa.png')}}" alt=""></a></span>
                                        @endif
                                        {{ csrf_field() }}
                                    </div><!-- end form-group -->
                                </li>
                                <li><a href="{{$contact->get('facebook')}}"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="{{$contact->get('twitter')}}"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="{{$contact->get('instagram')}}"><i class="fa fa-instagram"></i></a></li>
                                <li><a href="{{$contact->get('linkedin')}}"><i class="fa fa-linkedin"></i></a></li>
                                @if (!Auth::guard('members')->check())
                                <li>
                                    <form>
                                        <ul class="list-inline">
                                            <li>
                                                <a href="{{route('site.login')}}" class="">@if (Config::get('app.locale') == 'ar') دخول @elseif(Config::get('app.locale') == 'en') Login @endif<span><i class="fa fa-sign-in"></i></span></a>
                                            </li>                                       
                                        </ul>
                                    </form>
                                </li>
                                <li>
                                    <form>
                                        <ul class="list-inline">
                                            <li>
                                                <a href="{{route('site.companylogin')}}" class="">@if (Config::get('app.locale') == 'ar') B2B Login @elseif(Config::get('app.locale') == 'en') B2B Login @endif<span><i class="fa fa-sign-in"></i></span></a>
                                            </li>                                       
                                        </ul>
                                    </form>
                                </li>
                                @else
                                <li>
                                    <form>
                                        <ul class="list-inline">
                                            <li>
                                                <a href="#" class="">{{Auth::guard('members')->user()->name}}<span></span></a>
                                            </li>                                       
                                        </ul>
                                    </form>
                                </li>
                                <li>
                                    <form>
                                        <ul class="list-inline">
                                            <li>
                                                @if(Auth::guard('members')->user()->type == "user")
                                                <a href="{{route('site.profile')}}" class="">@if (Config::get('app.locale') == 'ar') الصفحة الشخصية @elseif(Config::get('app.locale') == 'en') Profile @endif<span></span></a>
                                                @elseif(Auth::guard('members')->user()->type == "hotel")
                                                <a href="{{route('site.hotelProfile')}}" class="">@if (Config::get('app.locale') == 'ar') الصفحة الشخصية @elseif(Config::get('app.locale') == 'en') Profile @endif<span></span></a>
                                                @elseif(Auth::guard('members')->user()->type == "company")
                                                <a href="{{route('site.tourProfile')}}" class="">@if (Config::get('app.locale') == 'ar') الصفحة الشخصية @elseif(Config::get('app.locale') == 'en') Profile @endif<span></span></a>
                                                @elseif(Auth::guard('members')->user()->type == "multi")
                                                <a href="{{route('site.multiProfile')}}" class="">@if (Config::get('app.locale') == 'ar') الصفحة الشخصية @elseif(Config::get('app.locale') == 'en') Profile @endif<span></span></a>
                                                @elseif(Auth::guard('members')->user()->type == "services")
                                                <a href="{{route('site.companyProfile')}}" class="">@if (Config::get('app.locale') == 'ar') الصفحة الشخصية @elseif(Config::get('app.locale') == 'en') Profile @endif<span></span></a>
                                                @endif
                                            </li>                                       
                                        </ul>
                                    </form>
                                </li>
                                <li>
                                    <form>
                                        <ul class="list-inline">
                                            <li>
                                                <a href="{{route('site.logout')}}" class="">@if (Config::get('app.locale') == 'ar') تسجيل الخروج @elseif(Config::get('app.locale') == 'en') Logout @endif<span></span></a>
                                            </li>                                       
                                        </ul>
                                    </form>
                                </li>
                                @endif
                            </ul>
                        </div><!-- end links -->
                    </div><!-- end columns -->				
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end top-bar -->

        <!--========================= FLEX SLIDER =====================-->
        <section class="flexslider-container" id="flexslider-container-1">
            <div class="header-absolute">
                <nav class="navbar navbar-default main-navbar navbar-custom navbar-black" id="mynavbar">
                    <div class="container">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" id="menu-button">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>                        
                            </button>
                            <div class="header-search hidden-lg">
                                <a href="javascript:void(0)" class="search-button"><span><i class="fa fa-search"></i></span></a>
                            </div>
                            @if(Config::get('app.locale') == 'ar')
                            <a href="{{route('site.home')}}" class="navbar-brand"><span><img src="{{asset('vendors/site/EN/images/hajj-icon.png')}}" alt="" />مايكروس  </span>عمرة</a>
                            @elseif(Config::get('app.locale') == 'en')
                            <a href="{{route('site.home')}}" class="navbar-brand"><span><img src="{{asset('vendors/site/EN/images/hajj-icon.png')}}" alt="" />Maikros  </span>Umrah</a>
                            @endif                        </div><!-- end navbar-header -->
                        <div class="collapse navbar-collapse" id="myNavbar1">
                           @if(Config::get('app.locale') == 'ar')
                        <ul class="nav navbar-nav navbar-right navbar-search-link">
                            <li class="@if(Route::currentRouteName()=='site.home') active @endif"><a href="{{route('site.home')}}">الرئيسية</a></li>
                            <li class="dropdown"><a href="#" class="dropdown-toggle @if(Route::currentRouteName()=='site.about') active @endif" data-toggle="dropdown">نبذة عنا<span><i class="fa fa-angle-down"></i></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{route('site.about')}}">من نحن</a></li>
                                    <li><a href="{{route('site.about')}}">رؤيتنا</a></li>
                                    <li><a href="{{route('site.about')}}">اهدافنا</a></li>
                                </ul>			
                            </li>
                            <li class="@if(Route::currentRouteName()=='site.umratak') active @endif"><a href="{{route('site.umratak')}}">باقات العمرة</a></li>
                            <li class="dropdown"><a href="#" class="dropdown-toggle @if(Route::currentRouteName()=='site.programmes') active @endif" data-toggle="dropdown">البرامج<span><i class="fa fa-angle-down"></i></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{route('site.programmes')}}">برامج الحج</a></li>
                                    <li><a href="{{route('site.programmes')}}">برامج العمرة</a></li>
                                </ul>			
                            </li>
                            <li class="dropdown"><a href="#" class="dropdown-toggle @if(Route::currentRouteName()=='site.hotels') active @endif" data-toggle="dropdown">الفنادق<span><i class="fa fa-angle-down"></i></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{route('site.hotels')}}">مكة</a></li>
                                    <li><a href="{{route('site.hotels')}}">المدينة</a></li>
                                    <li><a href="{{route('site.hotels')}}">جدة</a></li>
                                </ul>			
                            </li>
                            <li class="@if(Route::currentRouteName()=='site.flights') active @endif"><a href="{{route('site.flights')}}">الطيران</a></li>
                            <li class="dropdown"><a href="#" class="dropdown-toggle @if(Route::currentRouteName()=='site.services') active @endif" data-toggle="dropdown">خدماتنا<span><i class="fa fa-angle-down"></i></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{route('site.services')}}">خدمات ارضية</a></li>
                                    <li><a href="{{route('site.services')}}">خدمات نقل</a></li>
                                    <li><a href="{{route('site.services')}}">خدمات اعاشة</a></li>
                                </ul>			
                            </li>
                            <li class="@if(Route::currentRouteName()=='site.contact') active @endif"><a href="{{route('site.contact')}}">اتصل بنا</a></li>
                            <li><a href="{{route('site.cart')}}" class="cart-button"><span><img src="{{asset('vendors/site/EN/images/cart.png')}}" alt="" /></span></a></li>
                            <li><a href="javascript:void(0)" class="search-button"><span><i class="fa fa-search"></i></span></a></li>
                        </ul>
                        @elseif(Config::get('app.locale') == 'en')
                        <ul class="nav navbar-nav navbar-right navbar-search-link">
                            <li class="@if(Route::currentRouteName()=='site.home') active @endif"><a href="{{route('site.home')}}">Home</a></li>
                            <li class="dropdown"><a href="#" class="dropdown-toggle @if(Route::currentRouteName()=='site.about') active @endif" data-toggle="dropdown">About Us<span><i class="fa fa-angle-down"></i></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{route('site.about')}}">About Us</a></li>
                                    <li><a href="{{route('site.about')}}">Vision</a></li>
                                    <li><a href="{{route('site.about')}}">Mission</a></li>
                                </ul>			
                            </li>
                            <li class="@if(Route::currentRouteName()=='site.umratak') active @endif"><a href="{{route('site.umratak')}}">Umrah Packages</a></li>
                            <li class="dropdown"><a href="#" class="dropdown-toggle @if(Route::currentRouteName()=='site.programmes') active @endif" data-toggle="dropdown">Programs<span><i class="fa fa-angle-down"></i></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{route('site.programmes')}}">Hajj Programs</a></li>
                                    <li><a href="{{route('site.programmes')}}">Umra Programs</a></li>
                                </ul>			
                            </li>
                            <li class="dropdown"><a href="#" class="dropdown-toggle @if(Route::currentRouteName()=='site.hotels') active @endif" data-toggle="dropdown">Hotels<span><i class="fa fa-angle-down"></i></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{route('site.hotels')}}">Mekkah</a></li>
                                    <li><a href="{{route('site.hotels')}}">Madinah</a></li>
                                    <li><a href="{{route('site.hotels')}}">Jeddah</a></li>
                                </ul>			
                            </li>
                            <li class="@if(Route::currentRouteName()=='site.flights') active @endif"><a href="{{route('site.flights')}}">Flights</a></li>
                            <li class="dropdown"><a href="#" class="dropdown-toggle @if(Route::currentRouteName()=='site.services') active @endif" data-toggle="dropdown">Services<span><i class="fa fa-angle-down"></i></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{route('site.services')}}">Living Services</a></li>
                                    <li><a href="{{route('site.services')}}">Ground Services</a></li>
                                    <li><a href="{{route('site.services')}}">Transport Services</a></li>
                                </ul>			
                            </li>
                            <li class="@if(Route::currentRouteName()=='site.contact') active @endif"><a href="{{route('site.contact')}}">Contact Us</a></li>
                            <li><a href="{{route('site.cart')}}" class="cart-button"><span><img src="{{asset('vendors/site/EN/images/cart.png')}}" alt="" /></span></a></li>
                            <li><a href="javascript:void(0)" class="search-button"><span><i class="fa fa-search"></i></span></a></li>
                        </ul>
                        @endif
                        </div><!-- end navbar collapse -->
                    </div><!-- end container -->
                </nav><!-- end navbar -->
            </div><!-- end header-absolute -->
            <div class="sidenav-content">
                <div id="mySidenav" class="sidenav" >
                    <h2 id="web-name"><span><img src="{{asset('vendors/site/EN/images/hajj-white.png')}}" alt="" />Maikros</span>Umrah</h2>
                    <div id="main-menu">
                        <div class="closebtn">
                            <button class="btn btn-default" id="closebtn">&times;</button>
                        </div><!-- end close-btn -->
                        @if(Config::get('app.locale') == 'ar')
                        <div class="list-group panel">
                            <a href="{{route('site.home')}}" class="list-group-item @if(Route::currentRouteName()=='site.home') active @endif"><span><i class="fa fa-home link-icon"></i></span>الرئيسية</a>
                            <a href="{{route('site.about')}}" class="list-group-item @if(Route::currentRouteName()=='site.about') active @endif"><span><i class="fa fa-home link-icon"></i></span>من نحن</a>
                            <a href="{{route('site.umratak')}}" class="list-group-item @if(Route::currentRouteName()=='site.umratak') active @endif"><span><i class="fa fa-paint-brush link-icon"></i></span>باقات العمرة</a>
                            <a href="{{route('site.programmes')}}" class="list-group-item @if(Route::currentRouteName()=='site.programmes') active @endif"><span><i class="fa fa-plane link-icon"></i></span>البرامج السياحية</a>
                            <a href="{{route('site.hotels')}}" class="list-group-item @if(Route::currentRouteName()=='site.hotels') active @endif"><span><i class="fa fa-building link-icon"></i></span>الفنادق</a>
                            <a href="{{route('site.services')}}" class="list-group-item @if(Route::currentRouteName()=='site.services') active @endif"><span><i class="fa fa-cogs link-icon"></i></span>خدماتنا</a>
                            <a href="#reg-links" class="list-group-item" data-toggle="collapse" data-parent="#main-menu"><span><i class="fa fa-sign-in link-icon"></i></span>تسجيل<span><i class="fa fa-chevron-down arrow"></i></span></a>
                            <div class="collapse sub-menu" id="reg-links">
                                <a href="{{route('site.login')}}" class="list-group-item @if(Route::currentRouteName()=='site.login') active @endif">تسجيل الدخول</a>
                                <a href="{{route('site.register')}}" class="list-group-item @if(Route::currentRouteName()=='site.register') active @endif">إنشاء حساب جديد</a>
                            </div><!-- end sub-menu -->
                            <a href="{{route('site.contact')}}" class="list-group-item @if(Route::currentRouteName()=='site.contact') active @endif"><span><i class="fa fa-envelope link-icon"></i></span>اتصل بنا</a>
                        </div><!-- end list-group -->
                        @elseif(Config::get('app.locale') == 'en')
                        <div class="list-group panel">
                            <a href="{{route('site.home')}}" class="list-group-item @if(Route::currentRouteName()=='site.home') active @endif"><span><i class="fa fa-home link-icon"></i></span>Home</a>
                            <a href="{{route('site.about')}}" class="list-group-item @if(Route::currentRouteName()=='site.about') active @endif"><span><i class="fa fa-home link-icon"></i></span>About Us</a>
                            <a href="{{route('site.umratak')}}" class="list-group-item @if(Route::currentRouteName()=='site.umratak') active @endif"><span><i class="fa fa-paint-brush link-icon"></i></span>Umrah Packages</a>
                            <a href="{{route('site.programmes')}}" class="list-group-item @if(Route::currentRouteName()=='site.programmes') active @endif"><span><i class="fa fa-plane link-icon"></i></span>Programs</a>
                            <a href="{{route('site.hotels')}}" class="list-group-item @if(Route::currentRouteName()=='site.hotels') active @endif"><span><i class="fa fa-building link-icon"></i></span>Hotels</a>
                            <a href="{{route('site.services')}}" class="list-group-item @if(Route::currentRouteName()=='site.services') active @endif"><span><i class="fa fa-cogs link-icon"></i></span>Services</a>
                            <a href="#reg-links" class="list-group-item" data-toggle="collapse" data-parent="#main-menu"><span><i class="fa fa-sign-in link-icon"></i></span>Sign Up<span><i class="fa fa-chevron-down arrow"></i></span></a>
                            <div class="collapse sub-menu" id="reg-links">
                                <a href="{{route('site.login')}}" class="list-group-item @if(Route::currentRouteName()=='site.login') active @endif">Login</a>
                                <a href="{{route('site.register')}}" class="list-group-item @if(Route::currentRouteName()=='site.register') active @endif">Register</a>
                            </div><!-- end sub-menu -->
                            <a href="{{route('site.contact')}}" class="list-group-item @if(Route::currentRouteName()=='site.contact') active @endif"><span><i class="fa fa-envelope link-icon"></i></span>اتصل بنا</a>
                        </div><!-- end list-group -->
                        @endif
                    </div><!-- end main-menu -->
                </div><!-- end mySidenav -->
            </div><!-- end sidenav-content -->
            <div class="flexslider slider tour-slider" id="slider-4">
                <ul class="slides">
                    @foreach($sliders as $slider)
                    <li class="item-{{$loop->index +1}} back-size" style="background: linear-gradient(rgba(0,0,0,0.6),rgba(0,0,0,0.6)),url({{asset('storage/uploads/slider/'.$slider->image)}}) 50% 15%; background-size:cover; height:100%;">
                    </li><!-- end item-1 -->
                    @endforeach
                </ul>
            </div><!-- end slider -->
            @if(Config::get('app.locale') == 'ar')
                <div class="search-tabs" id="search-tabs-3">
                    <div class="container" id="rootwizard">
                        <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no-pd-r">
                                    <h2 style="color: #faa61a;">مرحبا بك في باقات العمرة</h2>
                                </div>
                                <form method="GET" action="{{route('site.hotelSearch')}}">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no-pd-r">
                                    
                                        <ul class="nav nav-tabs">
                                            @if(Auth::guard('members')->check())
                                                @if(Auth::guard('members')->user()->type == "multi")
                                                    <li class="active"><a href="#tab1" data-toggle="tab"><span><i class="fa fa-plane"></i></span><span class="st-text">الفنادق (1)</span></a></li>
                                                    <li><a href="#tab2" data-toggle="tab"><span><i class="fa fa-plane"></i></span><span class="st-text">الغرف (1)</span></a></li>
                                                @else
                                                <li class="active"><a href="#tab1" data-toggle="tab"><span><i class="fa fa-plane"></i></span><span class="st-text">الفنادق (1)</span></a></li>
                                                <li><a href="#tab2" data-toggle="tab"><span><i class="fa fa-building"></i></span><span class="st-text">النقل والتأشيرة (2)</span></a></li>
                                                <li><a href="#tab3" data-toggle="tab"><span><i class="fa fa-car"></i></span><span class="st-text">الخدمات (3)</span></a></li>
                                                @endif
                                            @elseif(!Auth::guard('members')->check())
                                                <li class="active"><a href="#tab1" data-toggle="tab"><span><i class="fa fa-plane"></i></span><span class="st-text">الفنادق (1)</span></a></li>
                                                <li><a href="#tab2" data-toggle="tab"><span><i class="fa fa-building"></i></span><span class="st-text">النقل والتأشيرة (2)</span></a></li>
                                                <li><a href="#tab3" data-toggle="tab"><span><i class="fa fa-car"></i></span><span class="st-text">الخدمات (3)</span></a></li>
                                            @endif
                                        </ul>
            
                                        <div class="tab-content">
                                            @if(Auth::guard('members')->check())
                                                @if(Auth::guard('members')->user()->type == "multi")
                                                    <div id="tab1" class="tab-pane in active">
                                                            <div class="row">
                                                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                                    <div class="row">
                                                                    
                                                                        <div class="col-xs-12 col-sm-6 col-md-6">
                                                                            <div class="form-group left-icon">
                                                                                <label>المدينة أو المطار</label>
                                                                                <input type="text" class="form-control" placeholder="المدينة أو المطار" name="town" required>
                                                                                <i class="fa fa-map-marker"></i>
                                                                            </div>
                                                                        </div><!-- end columns -->
                                                                        
                                                                        <div class="col-xs-12 col-sm-6 col-md-6">
                                                                            <div class="form-group left-icon">
                                                                                <label>المطار والفندق</label>
                                                                                <select class="form-control" name="hotel">
                                                                                    <option selected>المطار و واسم الفندق</option>
                                                                                    <option value="مكة">مطار جدة وفندق مكة</option>
                                                                                    <option value="مكة المدينة">مطار جدة وفندق مكة وفندق المدينة</option>
                                                                                    <option value="مكة المدينة">مطار المدينة وفندق مكة وفندق المدينة</option>
                                                                                </select>
                                                                                <i class="fa fa-map-marker"></i>
                                                                            </div>
                                                                        </div><!-- end columns -->
                            
                                                                    </div><!-- end row -->								
                                                                </div><!-- end columns -->
                                                                
                                                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                                    <div class="row">
                                                                    
                                                                        <div class="col-xs-6 col-sm-3 col-md-3">
                                                                            <div class="form-group left-icon">
                                                                                <label>تاريخ الوصول لمكة</label>
                                                                                <input type="text" class="form-control dpd1" placeholder="mm/dd/yy" name="to_mekkah">
                                                                                <i class="fa fa-calendar"></i>
                                                                            </div>
                                                                        </div><!-- end columns -->

                                                                        <div class="col-xs-6 col-sm-3 col-md-3">
                                                                            <div class="form-group left-icon">
                                                                                <label>تاريخ المغادرة من مكة</label>
                                                                                <input type="text" class="form-control dpd2" placeholder="mm/dd/yy" name="from_mekkah">
                                                                                <i class="fa fa-calendar"></i>
                                                                            </div>
                                                                        </div><!-- end columns -->
                                                                        
                                                                        <div class="col-xs-6 col-sm-3 col-md-3">
                                                                            <div class="form-group left-icon">
                                                                                <label>تاريخ الوصول للمدينة</label>
                                                                                <input type="text" class="form-control dpd3" placeholder="mm/dd/yy" name="to_madinah">
                                                                                <i class="fa fa-calendar"></i>
                                                                            </div>
                                                                        </div><!-- end columns -->

                                                                        <div class="col-xs-6 col-sm-3 col-md-3">
                                                                            <div class="form-group left-icon">
                                                                                <label>تاريخ المغادرة من المدينة</label>
                                                                                <input type="text" class="form-control dpd4" placeholder="mm/dd/yy" name="from_madinah">
                                                                                <i class="fa fa-calendar"></i>
                                                                            </div>
                                                                        </div><!-- end columns -->
                                                                    </div><!-- end row -->								
                                                                </div><!-- end columns -->
                                                            </div><!-- end row -->
                                                    </div><!-- end flights -->
                                                    <div id="tab2" class="tab-pane">
                                                            <div class="row">

                                                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                                                    <div class="form-group right-icon">
                                                                        <label>عدد الغرف</label>
                                                                        <input type="number" class="form-control" placeholder="عدد الغرف" name="rooms">
                                                                    </div>
                                                                </div><!-- end columns -->

                                                                <div class="col-xs-6 col-sm-3 col-md-3">
                                                                    <div class="form-group left-icon">
                                                                        <label>عدد البالغين</label>
                                                                        <input type="number" class="form-control" placeholder="عدد البالغين" name="adults">
                                                                    </div>
                                                                </div><!-- end columns -->

                                                                <div class="col-xs-6 col-sm-3 col-md-3">
                                                                    <div class="form-group left-icon">
                                                                        <label>عدد الأطفال</label>
                                                                        <input type="number" class="form-control" placeholder="عدد الأطفال" name="children">
                                                                    </div>
                                                                </div><!-- end columns -->
                                                                <div class="col-xs-12 col-sm-6 col-md-6">
                                                                        <div class="form-group left-icon">
                                                                            <label>اختر شركة العمرة</label>
                                                                            <select class="form-control" name="multi">
                                                                                <option>شركة العمرة</option>
                                                                                @foreach ($members as $member)
                                                                                    <option value="{{$member->id}}">{{$member->name}}</option>
                                                                                @endforeach
                                                                            </select>
                                                                            <i class="fa fa-map-marker"></i>
                                                                        </div>							
                                                                    </div><!-- end columns -->
                                                            
                                                                
                                                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                                                        <div class="form-group left-icon">
                                                                            <label>اختر الفئات</label>
                                                                            <select class="form-control" name="c_category">
                                                                                <option>الباقة الاساسية</option>
                                                                                <option>الباقة المميزة</option>
                                                                                <option>الباقة الماسية</option>
                                                                            </select>
                                                                            <i class="fa fa-flag"></i>
                                                                        </div>
                                                                    </div><!-- end columns --> 
                                                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 search-btn">
                                                                    <button type="submit" class="btn btn-orange">البحث</button>
                                                                </div><!-- end columns -->
                                                            </div><!-- end row -->
                                                    </div><!-- end flights -->
                                                @else
                                                <div id="tab1" class="tab-pane in active">
                                                        <div class="row">
                
                                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                                <div class="row">
                                                                
                                                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                                                        <div class="form-group left-icon">
                                                                            <label>المدينة أو المطار</label>
                                                                            <input type="text" class="form-control" placeholder="المدينة أو المطار" name="town" required>
                                                                            <i class="fa fa-map-marker"></i>
                                                                        </div>
                                                                    </div><!-- end columns -->
                                                                    
                                                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                                                        <div class="form-group left-icon">
                                                                            <label>المطار والفندق</label>
                                                                            <select class="form-control" name="hotel">
                                                                                <option selected>المطار و واسم الفندق</option>
                                                                                <option value="مكة">مطار جدة وفندق مكة</option>
                                                                                <option value="مكة المدينة">مطار جدة وفندق مكة وفندق المدينة</option>
                                                                                <option value="مكة المدينة">مطار المدينة وفندق مكة وفندق المدينة</option>
                                                                            </select>
                                                                            <i class="fa fa-map-marker"></i>
                                                                        </div>
                                                                    </div><!-- end columns -->
                        
                                                                </div><!-- end row -->								
                                                            </div><!-- end columns -->
                                                            
                                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                                <div class="row">
                                                                
                                                                    <div class="col-xs-6 col-sm-3 col-md-3">
                                                                        <div class="form-group left-icon">
                                                                            <label>تاريخ الوصول لمكة</label>
                                                                            <input type="text" class="form-control dpd1" placeholder="mm/dd/yy" name="to_mekkah">
                                                                            <i class="fa fa-calendar"></i>
                                                                        </div>
                                                                    </div><!-- end columns -->
    
                                                                    <div class="col-xs-6 col-sm-3 col-md-3">
                                                                        <div class="form-group left-icon">
                                                                            <label>تاريخ المغادرة من مكة</label>
                                                                            <input type="text" class="form-control dpd2" placeholder="mm/dd/yy" name="from_mekkah">
                                                                            <i class="fa fa-calendar"></i>
                                                                        </div>
                                                                    </div><!-- end columns -->
                                                                    
                                                                    <div class="col-xs-6 col-sm-3 col-md-3">
                                                                        <div class="form-group left-icon">
                                                                            <label>تاريخ الوصول للمدينة</label>
                                                                            <input type="text" class="form-control dpd3" placeholder="mm/dd/yy" name="to_madinah">
                                                                            <i class="fa fa-calendar"></i>
                                                                        </div>
                                                                    </div><!-- end columns -->
    
                                                                    <div class="col-xs-6 col-sm-3 col-md-3">
                                                                        <div class="form-group left-icon">
                                                                            <label>تاريخ المغادرة من المدينة</label>
                                                                            <input type="text" class="form-control dpd4" placeholder="mm/dd/yy" name="from_madinah">
                                                                            <i class="fa fa-calendar"></i>
                                                                        </div>
                                                                    </div><!-- end columns -->
                                                                </div><!-- end row -->								
                                                            </div><!-- end columns -->
    
                                                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                                                <div class="form-group right-icon">
                                                                    <label>عدد الغرف</label>
                                                                    <select class="form-control" name="rooms">
                                                                        <option value="0">اختر عدد الغرف</option>
                                                                        <option value="1">1</option>
                                                                        <option value="2">2</option>
                                                                        <option value="3">3</option>
                                                                        <option value="4">4</option>
                                                                        <option value="5">5</option>
                                                                        <option value="6">6</option>
                                                                        <option value="7">7</option>
                                                                        <option value="8">8</option>
                                                                        <option value="9">9</option>
                                                                    </select>
                                                                    <i class="fa fa-angle-down"></i>
                                                                </div>
                                                            </div><!-- end columns -->
    
                                                            <div class="col-xs-6 col-sm-3 col-md-3">
                                                                <div class="form-group left-icon">
                                                                    <label>عدد البالغين</label>
                                                                   <select id="adults" class="form-control" name="adults">
                                                                        <option>    </option>
                                                                        <option value="1">1</option>
                                                                        <option value="2">2</option>
                                                                        <option value="3">3</option>
                                                                        <option value="4">4</option>
                                                                        <option value="5">5</option>
                                                                        <option value="6">6</option>
                                                                        <option value="7">7</option>
                                                                        <option value="8">8</option>
                                                                        <option value="9">9</option>
                                                                    </select>
                                                                    <i class="fa fa-cogs"></i>
                                                                </div>
                                                            </div><!-- end columns -->
    
                                                            <div class="col-xs-6 col-sm-3 col-md-3">
                                                                <div class="form-group left-icon">
                                                                    <label>عدد الأطفال</label>
                                                                    <select id="children" class="form-control" name="children">
                                                                        <option>    </option>
                                                                    </select>
                                                                    <i class="fa fa-cogs"></i>
                                                                </div>
                                                            </div><!-- end columns -->
                                                            
                                                        </div><!-- end row -->
                                                </div><!-- end flights -->
                                                
                                                <div id="tab2" class="tab-pane">
                                                        <div class="row">
                                                            <div class="col-xs-12 col-sm-6 col-md-6">
                                                                <div class="form-group left-icon">
                                                                    <label>واجهة التنقل</label>
                                                                    <select class="form-control" name="transport">
                                                                        <option value="1" selected>جدة - مكة - المدينة - مطار المدينة</option>
                                                                        <option value="2">جدة - مكة - المدينة - مطار جدة</option>
                                                                        <option value="3">جدة - مكة - المدينة - مطار مكة</option>
                                                                        <option value="0">بدون واجهة تنقل</option>
                                                                    </select>
                                                                    <i class="fa fa-map-marker"></i>
                                                                </div>
                                                            </div><!-- end columns -->
    
                                                            <div class="col-xs-12 col-sm-6 col-md-6">
                                                                <div class="form-group left-icon">
                                                                    <label>نوع المركبة</label>
                                                                    <select class="form-control" name="v_type">
                                                                        <option selected>حدد انواع مركبات النقل</option>
                                                                        <option>سيارة 4 ركاب</option>
                                                                        <option>سيارة 7 ركاب</option>
                                                                        <option>باص صغير 15 راكب</option>
                                                                        <option>حافلة</option>
                                                                    </select>
                                                                    <i class="fa fa-bus"></i>
                                                                </div>
                                                            </div><!-- end columns -->
    
                                                            <div class="col-xs-12 col-sm-6 col-md-6">
                                                                <div class="form-group left-icon">
                                                                    <label>فئة النقل</label>
                                                                    <select class="form-control" name="v_category">
                                                                        <option selected>اختر فئة النقل</option>
                                                                        <option>VIP</option>
                                                                        <option>مميز</option>
                                                                        <option>عادي</option>
                                                                    </select>
                                                                    <i class="fa fa-bus"></i>
                                                                </div>
                                                            </div><!-- end columns -->
                                                            
                                                            <div class="col-xs-6 col-sm-3 col-md-3">
                                                                <div class="form-group left-icon">
                                                                    <label>موديل المركبة من</label>
                                                                    <select class="form-control" name="v_model_from">
                                                                        <option selected>2019</option>
                                                                        <option>2018</option>
                                                                        <option>2017</option>
                                                                        <option>2016</option>
                                                                        <option>2015</option>
                                                                        <option>2014</option>
                                                                        <option>2013</option>
                                                                        <option>2012</option>
                                                                        <option>2011</option>
                                                                        <option>2010</option>
                                                                        <option>2009</option>
                                                                    </select>
                                                                    <i class="fa fa-car"></i>
                                                                </div>
                                                            </div><!-- end columns -->
    
                                                            <div class="col-xs-6 col-sm-3 col-md-3">
                                                                <div class="form-group left-icon">
                                                                    <label>موديل المركبة الى</label>
                                                                    <select class="form-control" name="v_model_to">
                                                                        <option selected>2019</option>
                                                                        <option>2018</option>
                                                                        <option>2017</option>
                                                                        <option>2016</option>
                                                                        <option>2015</option>
                                                                        <option>2014</option>
                                                                        <option>2013</option>
                                                                        <option>2012</option>
                                                                        <option>2011</option>
                                                                        <option>2010</option>
                                                                        <option>2009</option>
                                                                    </select>
                                                                    <i class="fa fa-car"></i>
                                                                </div>
                                                            </div><!-- end columns -->
                                                            
                                                        </div><!-- end row -->
                                                </div><!-- end hotels -->
                
                                                <div id="tab3" class="tab-pane">
                                                    
                                                        <div class="row">
                                                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                                                        <div class="form-group left-icon">
                                                                            <label>اختر شركة العمرة</label>
                                                                            <select class="form-control" name="multi">
                                                                                <option>شركة العمرة</option>
                                                                                @foreach ($members as $member)
                                                                                    <option value="{{$member->id}}">{{$member->name}}</option>
                                                                                @endforeach
                                                                            </select>
                                                                            <i class="fa fa-map-marker"></i>
                                                                        </div>							
                                                                    </div><!-- end columns -->
                                                            
                                                                
                                                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                                                        <div class="form-group left-icon">
                                                                            <label>اختر الفئات</label>
                                                                            <select class="form-control" name="c_category">
                                                                                <option>الباقة الاساسية</option>
                                                                                <option>الباقة المميزة</option>
                                                                                <option>الباقة الماسية</option>
                                                                            </select>
                                                                            <i class="fa fa-flag"></i>
                                                                        </div>
                                                                    </div><!-- end columns -->                                                        
    
                                                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                                                        <div class="form-group left-icon">
                                                                            <label>خدمات اضافية</label>
                                                                            <select class="form-control" name="services">
                                                                                <option selected>حدد الخدمات الاضافية</option>
                                                                                <option value="1">بخدمة</option>
                                                                                <option value="0">بدون خدمة</option>
                                                                            </select>
                                                                            <i class="fa fa-cogs"></i>
                                                                        </div>
                                                                    </div><!-- end columns -->
    
                                                            
                                                            <div class="col-xs-6 col-sm-6 col-md-6">
                                                                <div class="form-group left-icon">
                                                                    <label>الجنسية</label>
                                                                    <select class="form-control" name="country">
                                                                        <option selected>الجنسية</option>
                                                                        <option value="أفغانستان">أفغانستان</option>
                                                                        <option value="ألبانيا">ألبانيا</option>
                                                                        <option value="الجزائر">الجزائر</option>
                                                                        <option value="أندورا">أندورا</option>
                                                                        <option value="أنغولا">أنغولا</option>
                                                                        <option value="أنتيغوا وباربودا">أنتيغوا وباربودا</option>
                                                                        <option value="الأرجنتين">الأرجنتين</option>
                                                                        <option value="أرمينيا">أرمينيا</option>
                                                                        <option value="أستراليا">أستراليا</option>
                                                                        <option value="النمسا">النمسا</option>
                                                                        <option value="أذربيجان">أذربيجان</option>
                                                                        <option value="البهاما">البهاما</option>
                                                                        <option value="البحرين">البحرين</option>
                                                                        <option value="بنغلاديش">بنغلاديش</option>
                                                                        <option value="باربادوس">باربادوس</option>
                                                                        <option value="بيلاروسيا">بيلاروسيا</option>
                                                                        <option value="بلجيكا">بلجيكا</option>
                                                                        <option value="بليز">بليز</option>
                                                                        <option value="بنين">بنين</option>
                                                                        <option value="بوتان">بوتان</option>
                                                                        <option value="بوليفيا">بوليفيا</option>
                                                                        <option value="البوسنة والهرسك ">البوسنة والهرسك </option>
                                                                        <option value="بوتسوانا">بوتسوانا</option>
                                                                        <option value="البرازيل">البرازيل</option>
                                                                        <option value="بروناي">بروناي</option>
                                                                        <option value="بلغاريا">بلغاريا</option>
                                                                        <option value="بوركينا فاسو ">بوركينا فاسو </option>
                                                                        <option value="بوروندي">بوروندي</option>
                                                                        <option value="كمبوديا">كمبوديا</option>
                                                                        <option value="الكاميرون">الكاميرون</option>
                                                                        <option value="كندا">كندا</option>
                                                                        <option value="الرأس الأخضر">الرأس الأخضر</option>
                                                                        <option value="جمهورية أفريقيا الوسطى ">جمهورية أفريقيا الوسطى </option>
                                                                        <option value="تشاد">تشاد</option>
                                                                        <option value="تشيلي">تشيلي</option>
                                                                        <option value="الصين">الصين</option>
                                                                        <option value="كولومبيا">كولومبيا</option>
                                                                        <option value="جزر القمر">جزر القمر</option>
                                                                        <option value="كوستاريكا">كوستاريكا</option>
                                                                        <option value="ساحل العاج">ساحل العاج</option>
                                                                        <option value="كرواتيا">كرواتيا</option>
                                                                        <option value="كوبا">كوبا</option>
                                                                        <option value="قبرص">قبرص</option>
                                                                        <option value="التشيك">التشيك</option>
                                                                        <option value="جمهورية الكونغو الديمقراطية">جمهورية الكونغو الديمقراطية</option>
                                                                        <option value="الدنمارك">الدنمارك</option>
                                                                        <option value="جيبوتي">جيبوتي</option>
                                                                        <option value="دومينيكا">دومينيكا</option>
                                                                        <option value="جمهورية الدومينيكان">جمهورية الدومينيكان</option>
                                                                        <option value="تيمور الشرقية ">تيمور الشرقية </option>
                                                                        <option value="الإكوادور">الإكوادور</option>
                                                                        <option value="مصر">مصر</option>
                                                                        <option value="السلفادور">السلفادور</option>
                                                                        <option value="غينيا الاستوائية">غينيا الاستوائية</option>
                                                                        <option value="إريتريا">إريتريا</option>
                                                                        <option value="إستونيا">إستونيا</option>
                                                                        <option value="إثيوبيا">إثيوبيا</option>
                                                                        <option value="فيجي">فيجي</option>
                                                                        <option value="فنلندا">فنلندا</option>
                                                                        <option value="فرنسا">فرنسا</option>
                                                                        <option value="الغابون">الغابون</option>
                                                                        <option value="غامبيا">غامبيا</option>
                                                                        <option value="جورجيا">جورجيا</option>
                                                                        <option value="ألمانيا">ألمانيا</option>
                                                                        <option value="غانا">غانا</option>
                                                                        <option value="اليونان">اليونان</option>
                                                                        <option value="جرينادا">جرينادا</option>
                                                                        <option value="غواتيمالا">غواتيمالا</option>
                                                                        <option value="غينيا">غينيا</option>
                                                                        <option value="غينيا بيساو">غينيا بيساو</option>
                                                                        <option value="غويانا">غويانا</option>
                                                                        <option value="هايتي">هايتي</option>
                                                                        <option value="هندوراس">هندوراس</option>
                                                                        <option value="المجر">المجر</option>
                                                                        <option value="آيسلندا">آيسلندا</option>
                                                                        <option value="الهند">الهند</option>
                                                                        <option value="إندونيسيا">إندونيسيا</option>
                                                                        <option value="إيران">إيران</option>
                                                                        <option value="العراق">العراق</option>
                                                                        <option value="جمهورية أيرلندا ">جمهورية أيرلندا </option>
                                                                        <option value="فلسطين">فلسطين</option>
                                                                        <option value="إيطاليا">إيطاليا</option>
                                                                        <option value="جامايكا">جامايكا</option>
                                                                        <option value="اليابان">اليابان</option>
                                                                        <option value="الأردن">الأردن</option>
                                                                        <option value="كازاخستان">كازاخستان</option>
                                                                        <option value="كينيا">كينيا</option>
                                                                        <option value="كيريباتي">كيريباتي</option>
                                                                        <option value="الكويت">الكويت</option>
                                                                        <option value="قرغيزستان">قرغيزستان</option>
                                                                        <option value="لاوس">لاوس</option>
                                                                        <option value="لاوس">لاوس</option>
                                                                        <option value="لاتفيا">لاتفيا</option>
                                                                        <option value="لبنان">لبنان</option>
                                                                        <option value="ليسوتو">ليسوتو</option>
                                                                        <option value="ليبيريا">ليبيريا</option>
                                                                        <option value="ليبيا">ليبيا</option>
                                                                        <option value="ليختنشتاين">ليختنشتاين</option>
                                                                        <option value="ليتوانيا">ليتوانيا</option>
                                                                        <option value="لوكسمبورغ">لوكسمبورغ</option>
                                                                        <option value="مدغشقر">مدغشقر</option>
                                                                        <option value="مالاوي">مالاوي</option>
                                                                        <option value="ماليزيا">ماليزيا</option>
                                                                        <option value="جزر المالديف">جزر المالديف</option>
                                                                        <option value="مالي">مالي</option>
                                                                        <option value="مالطا">مالطا</option>
                                                                        <option value="جزر مارشال">جزر مارشال</option>
                                                                        <option value="موريتانيا">موريتانيا</option>
                                                                        <option value="موريشيوس">موريشيوس</option>
                                                                        <option value="المكسيك">المكسيك</option>
                                                                        <option value="مايكرونيزيا">مايكرونيزيا</option>
                                                                        <option value="مولدوفا">مولدوفا</option>
                                                                        <option value="موناكو">موناكو</option>
                                                                        <option value="منغوليا">منغوليا</option>
                                                                        <option value="الجبل الأسود">الجبل الأسود</option>
                                                                        <option value="المغرب">المغرب</option>
                                                                        <option value="موزمبيق">موزمبيق</option>
                                                                        <option value="بورما">بورما</option>
                                                                        <option value="ناميبيا">ناميبيا</option>
                                                                        <option value="ناورو">ناورو</option>
                                                                        <option value="نيبال">نيبال</option>
                                                                        <option value="هولندا">هولندا</option>
                                                                        <option value="نيوزيلندا">نيوزيلندا</option>
                                                                        <option value="نيكاراجوا">نيكاراجوا</option>
                                                                        <option value="النيجر">النيجر</option>
                                                                        <option value="نيجيريا">نيجيريا</option>
                                                                        <option value="كوريا الشمالية ">كوريا الشمالية </option>
                                                                        <option value="النرويج">النرويج</option>
                                                                        <option value="سلطنة عمان">سلطنة عمان</option>
                                                                        <option value="باكستان">باكستان</option>
                                                                        <option value="بالاو">بالاو</option>
                                                                        <option value="بنما">بنما</option>
                                                                        <option value="بابوا غينيا الجديدة">بابوا غينيا الجديدة</option>
                                                                        <option value="باراغواي">باراغواي</option>
                                                                        <option value="بيرو">بيرو</option>
                                                                        <option value="الفلبين">الفلبين</option>
                                                                        <option value="بولندا">بولندا</option>
                                                                        <option value="البرتغال">البرتغال</option>
                                                                        <option value="قطر">قطر</option>
                                                                        <option value="جمهورية الكونغو">جمهورية الكونغو</option>
                                                                        <option value="جمهورية مقدونيا">جمهورية مقدونيا</option>
                                                                        <option value="رومانيا">رومانيا</option>
                                                                        <option value="روسيا">روسيا</option>
                                                                        <option value="رواندا">رواندا</option>
                                                                        <option value="سانت كيتس ونيفيس">سانت كيتس ونيفيس</option>
                                                                        <option value="سانت لوسيا">سانت لوسيا</option>
                                                                        <option value="سانت فنسينت والجرينادينز">سانت فنسينت والجرينادينز</option>
                                                                        <option value="ساموا">ساموا</option>
                                                                        <option value="سان مارينو">سان مارينو</option>
                                                                        <option value="ساو تومي وبرينسيب">ساو تومي وبرينسيب</option>
                                                                        <option value="السعودية">السعودية</option>
                                                                        <option value="السنغال">السنغال</option>
                                                                        <option value="صربيا">صربيا</option>
                                                                        <option value="سيشيل">سيشيل</option>
                                                                        <option value="سيراليون">سيراليون</option>
                                                                        <option value="سنغافورة">سنغافورة</option>
                                                                        <option value="سلوفاكيا">سلوفاكيا</option>
                                                                        <option value="سلوفينيا">سلوفينيا</option>
                                                                        <option value="جزر سليمان">جزر سليمان</option>
                                                                        <option value="الصومال">الصومال</option>
                                                                        <option value="جنوب أفريقيا">جنوب أفريقيا</option>
                                                                        <option value="كوريا الجنوبية">كوريا الجنوبية</option>
                                                                        <option value="جنوب السودان">جنوب السودان</option>
                                                                        <option value="إسبانيا">إسبانيا</option>
                                                                        <option value="سريلانكا">سريلانكا</option>
                                                                        <option value="السودان">السودان</option>
                                                                        <option value="سورينام">سورينام</option>
                                                                        <option value="سوازيلاند">سوازيلاند</option>
                                                                        <option value="السويد">السويد</option>
                                                                        <option value="سويسرا">سويسرا</option>
                                                                        <option value="سوريا">سوريا</option>
                                                                        <option value="طاجيكستان">طاجيكستان</option>
                                                                        <option value="تنزانيا">تنزانيا</option>
                                                                        <option value="تايلاند">تايلاند</option>
                                                                        <option value="توغو">توغو</option>
                                                                        <option value="تونجا">تونجا</option>
                                                                        <option value="ترينيداد وتوباغو">ترينيداد وتوباغو</option>
                                                                        <option value="تونس">تونس</option>
                                                                        <option value="تركيا">تركيا</option>
                                                                        <option value="تركمانستان">تركمانستان</option>
                                                                        <option value="توفالو">توفالو</option>
                                                                        <option value="أوغندا">أوغندا</option>
                                                                        <option value="أوكرانيا">أوكرانيا</option>
                                                                        <option value="الإمارات العربية المتحدة">الإمارات العربية المتحدة</option>
                                                                        <option value="المملكة المتحدة">المملكة المتحدة</option>
                                                                        <option value="الولايات المتحدة">الولايات المتحدة</option>
                                                                        <option value="أوروغواي">أوروغواي</option>
                                                                        <option value="أوزبكستان">أوزبكستان</option>
                                                                        <option value="فانواتو">فانواتو</option>
                                                                        <option value="فنزويلا">فنزويلا</option>
                                                                        <option value="فيتنام">فيتنام</option>
                                                                        <option value="اليمن">اليمن</option>
                                                                        <option value="زامبيا">زامبيا</option>
                                                                        <option value="زيمبابوي">زيمبابوي</option>
                                                                    </select>
                                                                    <i class="fa fa-globe"></i>
                                                                </div>
                                                            </div><!-- end columns -->
                                                            
                                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 search-btn">
                                                                <button type="submit" class="btn btn-orange">البحث</button>
                                                            </div><!-- end columns -->
                                                            
                                                        </div><!-- end row -->
                                                    
                                                </div><!-- end cars -->                                                
                                                @endif
                                            @elseif(!Auth::guard('members')->check())
                                                <div id="tab1" class="tab-pane in active">
                                                        <div class="row">
                
                                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                                <div class="row">
                                                                
                                                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                                                        <div class="form-group left-icon">
                                                                            <label>المدينة أو المطار</label>
                                                                            <input type="text" class="form-control" placeholder="المدينة أو المطار" name="town" required>
                                                                            <i class="fa fa-map-marker"></i>
                                                                        </div>
                                                                    </div><!-- end columns -->
                                                                    
                                                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                                                        <div class="form-group left-icon">
                                                                            <label>المطار والفندق</label>
                                                                            <select class="form-control" name="hotel">
                                                                                <option selected>المطار و واسم الفندق</option>
                                                                                <option value="مكة">مطار جدة وفندق مكة</option>
                                                                                <option value="مكة المدينة">مطار جدة وفندق مكة وفندق المدينة</option>
                                                                                <option value="مكة المدينة">مطار المدينة وفندق مكة وفندق المدينة</option>
                                                                            </select>
                                                                            <i class="fa fa-map-marker"></i>
                                                                        </div>
                                                                    </div><!-- end columns -->
                        
                                                                </div><!-- end row -->								
                                                            </div><!-- end columns -->
                                                            
                                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                                <div class="row">
                                                                
                                                                    <div class="col-xs-6 col-sm-3 col-md-3">
                                                                        <div class="form-group left-icon">
                                                                            <label>تاريخ الوصول لمكة</label>
                                                                            <input type="text" class="form-control dpd1" placeholder="mm/dd/yy" name="to_mekkah">
                                                                            <i class="fa fa-calendar"></i>
                                                                        </div>
                                                                    </div><!-- end columns -->

                                                                    <div class="col-xs-6 col-sm-3 col-md-3">
                                                                        <div class="form-group left-icon">
                                                                            <label>تاريخ المغادرة من مكة</label>
                                                                            <input type="text" class="form-control dpd2" placeholder="mm/dd/yy" name="from_mekkah">
                                                                            <i class="fa fa-calendar"></i>
                                                                        </div>
                                                                    </div><!-- end columns -->
                                                                    
                                                                    <div class="col-xs-6 col-sm-3 col-md-3">
                                                                        <div class="form-group left-icon">
                                                                            <label>تاريخ الوصول للمدينة</label>
                                                                            <input type="text" class="form-control dpd3" placeholder="mm/dd/yy" name="to_madinah">
                                                                            <i class="fa fa-calendar"></i>
                                                                        </div>
                                                                    </div><!-- end columns -->

                                                                    <div class="col-xs-6 col-sm-3 col-md-3">
                                                                        <div class="form-group left-icon">
                                                                            <label>تاريخ المغادرة من المدينة</label>
                                                                            <input type="text" class="form-control dpd4" placeholder="mm/dd/yy" name="from_madinah">
                                                                            <i class="fa fa-calendar"></i>
                                                                        </div>
                                                                    </div><!-- end columns -->
                                                                </div><!-- end row -->								
                                                            </div><!-- end columns -->

                                                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                                                <div class="form-group right-icon">
                                                                    <label>عدد الغرف</label>
                                                                    <select class="form-control" name="rooms">
                                                                        <option value="0">اختر عدد الغرف</option>
                                                                        <option value="1">1</option>
                                                                        <option value="2">2</option>
                                                                        <option value="3">3</option>
                                                                        <option value="4">4</option>
                                                                        <option value="5">5</option>
                                                                        <option value="6">6</option>
                                                                        <option value="7">7</option>
                                                                        <option value="8">8</option>
                                                                        <option value="9">9</option>
                                                                    </select>
                                                                    <i class="fa fa-angle-down"></i>
                                                                </div>
                                                            </div><!-- end columns -->

                                                            <div class="col-xs-6 col-sm-3 col-md-3">
                                                                <div class="form-group left-icon">
                                                                    <label>عدد البالغين</label>
                                                                    <select id="adults" class="form-control" name="adults">
                                                                        <option>    </option>
                                                                        <option value="1">1</option>
                                                                        <option value="2">2</option>
                                                                        <option value="3">3</option>
                                                                        <option value="4">4</option>
                                                                        <option value="5">5</option>
                                                                        <option value="6">6</option>
                                                                        <option value="7">7</option>
                                                                        <option value="8">8</option>
                                                                        <option value="9">9</option>
                                                                    </select>
                                                                    <i class="fa fa-cogs"></i>
                                                                </div>
                                                            </div><!-- end columns -->

                                                            <div class="col-xs-6 col-sm-3 col-md-3">
                                                                <div class="form-group left-icon">
                                                                    <label>عدد الأطفال</label>
                                                                    <select id="children" class="form-control" name="children">
                                                                        <option>    </option>
                                                                    </select>
                                                                    <i class="fa fa-cogs"></i>
                                                                </div>
                                                            </div><!-- end columns -->
                                                            
                                                        </div><!-- end row -->
                                                </div><!-- end flights -->
                                                
                                                <div id="tab2" class="tab-pane">
                                                        <div class="row">
                                                            <div class="col-xs-12 col-sm-6 col-md-6">
                                                                <div class="form-group left-icon">
                                                                    <label>واجهة التنقل</label>
                                                                    <select class="form-control" name="transport">
                                                                        <option value="1" selected>جدة - مكة - المدينة - مطار المدينة</option>
                                                                        <option value="2">جدة - مكة - المدينة - مطار جدة</option>
                                                                        <option value="3">جدة - مكة - المدينة - مطار مكة</option>
                                                                        <option value="0">بدون واجهة تنقل</option>
                                                                    </select>
                                                                    <i class="fa fa-map-marker"></i>
                                                                </div>
                                                            </div><!-- end columns -->

                                                            <div class="col-xs-12 col-sm-6 col-md-6">
                                                                <div class="form-group left-icon">
                                                                    <label>نوع المركبة</label>
                                                                    <select class="form-control" name="v_type">
                                                                        <option selected>حدد انواع مركبات النقل</option>
                                                                        <option>سيارة 4 ركاب</option>
                                                                        <option>سيارة 7 ركاب</option>
                                                                        <option>باص صغير 15 راكب</option>
                                                                        <option>حافلة</option>
                                                                    </select>
                                                                    <i class="fa fa-bus"></i>
                                                                </div>
                                                            </div><!-- end columns -->

                                                            <div class="col-xs-12 col-sm-6 col-md-6">
                                                                <div class="form-group left-icon">
                                                                    <label>فئة النقل</label>
                                                                    <select class="form-control" name="v_category">
                                                                        <option selected>اختر فئة النقل</option>
                                                                        <option>VIP</option>
                                                                        <option>مميز</option>
                                                                        <option>عادي</option>
                                                                    </select>
                                                                    <i class="fa fa-bus"></i>
                                                                </div>
                                                            </div><!-- end columns -->
                                                            
                                                            <div class="col-xs-6 col-sm-3 col-md-3">
                                                                <div class="form-group left-icon">
                                                                    <label>موديل المركبة من</label>
                                                                    <select class="form-control" name="v_model_from">
                                                                        <option selected>2019</option>
                                                                        <option>2018</option>
                                                                        <option>2017</option>
                                                                        <option>2016</option>
                                                                        <option>2015</option>
                                                                        <option>2014</option>
                                                                        <option>2013</option>
                                                                        <option>2012</option>
                                                                        <option>2011</option>
                                                                        <option>2010</option>
                                                                        <option>2009</option>
                                                                    </select>
                                                                    <i class="fa fa-car"></i>
                                                                </div>
                                                            </div><!-- end columns -->

                                                            <div class="col-xs-6 col-sm-3 col-md-3">
                                                                <div class="form-group left-icon">
                                                                    <label>موديل المركبة الى</label>
                                                                    <select class="form-control" name="v_model_to">
                                                                        <option selected>2019</option>
                                                                        <option>2018</option>
                                                                        <option>2017</option>
                                                                        <option>2016</option>
                                                                        <option>2015</option>
                                                                        <option>2014</option>
                                                                        <option>2013</option>
                                                                        <option>2012</option>
                                                                        <option>2011</option>
                                                                        <option>2010</option>
                                                                        <option>2009</option>
                                                                    </select>
                                                                    <i class="fa fa-car"></i>
                                                                </div>
                                                            </div><!-- end columns -->
                                                            
                                                        </div><!-- end row -->
                                                </div><!-- end hotels -->
                
                                                <div id="tab3" class="tab-pane">
                                                    
                                                        <div class="row">
                                                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                                                        <div class="form-group left-icon">
                                                                            <label>اختر شركة العمرة</label>
                                                                            <select class="form-control" name="multi">
                                                                                <option>شركة العمرة</option>
                                                                                @foreach ($members as $member)
                                                                                    <option value="{{$member->id}}">{{$member->name}}</option>
                                                                                @endforeach
                                                                            </select>
                                                                            <i class="fa fa-map-marker"></i>
                                                                        </div>							
                                                                    </div><!-- end columns -->
                                                            
                                                                
                                                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                                                        <div class="form-group left-icon">
                                                                            <label>اختر الفئات</label>
                                                                            <select class="form-control" name="c_category">
                                                                                <option>الباقة الاساسية</option>
                                                                                <option>الباقة المميزة</option>
                                                                                <option>الباقة الماسية</option>
                                                                            </select>
                                                                            <i class="fa fa-flag"></i>
                                                                        </div>
                                                                    </div><!-- end columns -->                                                        

                                                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                                                        <div class="form-group left-icon">
                                                                            <label>خدمات اضافية</label>
                                                                            <select class="form-control" name="services">
                                                                                <option selected>حدد الخدمات الاضافية</option>
                                                                                <option value="1">بخدمة</option>
                                                                                <option value="0">بدون خدمة</option>
                                                                            </select>
                                                                            <i class="fa fa-cogs"></i>
                                                                        </div>
                                                                    </div><!-- end columns -->

                                                            
                                                            <div class="col-xs-6 col-sm-6 col-md-6">
                                                                <div class="form-group left-icon">
                                                                    <label>الجنسية</label>
                                                                    <select class="form-control" name="country">
                                                                        <option selected>الجنسية</option>
                                                                        <option value="أفغانستان">أفغانستان</option>
                                                                        <option value="ألبانيا">ألبانيا</option>
                                                                        <option value="الجزائر">الجزائر</option>
                                                                        <option value="أندورا">أندورا</option>
                                                                        <option value="أنغولا">أنغولا</option>
                                                                        <option value="أنتيغوا وباربودا">أنتيغوا وباربودا</option>
                                                                        <option value="الأرجنتين">الأرجنتين</option>
                                                                        <option value="أرمينيا">أرمينيا</option>
                                                                        <option value="أستراليا">أستراليا</option>
                                                                        <option value="النمسا">النمسا</option>
                                                                        <option value="أذربيجان">أذربيجان</option>
                                                                        <option value="البهاما">البهاما</option>
                                                                        <option value="البحرين">البحرين</option>
                                                                        <option value="بنغلاديش">بنغلاديش</option>
                                                                        <option value="باربادوس">باربادوس</option>
                                                                        <option value="بيلاروسيا">بيلاروسيا</option>
                                                                        <option value="بلجيكا">بلجيكا</option>
                                                                        <option value="بليز">بليز</option>
                                                                        <option value="بنين">بنين</option>
                                                                        <option value="بوتان">بوتان</option>
                                                                        <option value="بوليفيا">بوليفيا</option>
                                                                        <option value="البوسنة والهرسك ">البوسنة والهرسك </option>
                                                                        <option value="بوتسوانا">بوتسوانا</option>
                                                                        <option value="البرازيل">البرازيل</option>
                                                                        <option value="بروناي">بروناي</option>
                                                                        <option value="بلغاريا">بلغاريا</option>
                                                                        <option value="بوركينا فاسو ">بوركينا فاسو </option>
                                                                        <option value="بوروندي">بوروندي</option>
                                                                        <option value="كمبوديا">كمبوديا</option>
                                                                        <option value="الكاميرون">الكاميرون</option>
                                                                        <option value="كندا">كندا</option>
                                                                        <option value="الرأس الأخضر">الرأس الأخضر</option>
                                                                        <option value="جمهورية أفريقيا الوسطى ">جمهورية أفريقيا الوسطى </option>
                                                                        <option value="تشاد">تشاد</option>
                                                                        <option value="تشيلي">تشيلي</option>
                                                                        <option value="الصين">الصين</option>
                                                                        <option value="كولومبيا">كولومبيا</option>
                                                                        <option value="جزر القمر">جزر القمر</option>
                                                                        <option value="كوستاريكا">كوستاريكا</option>
                                                                        <option value="ساحل العاج">ساحل العاج</option>
                                                                        <option value="كرواتيا">كرواتيا</option>
                                                                        <option value="كوبا">كوبا</option>
                                                                        <option value="قبرص">قبرص</option>
                                                                        <option value="التشيك">التشيك</option>
                                                                        <option value="جمهورية الكونغو الديمقراطية">جمهورية الكونغو الديمقراطية</option>
                                                                        <option value="الدنمارك">الدنمارك</option>
                                                                        <option value="جيبوتي">جيبوتي</option>
                                                                        <option value="دومينيكا">دومينيكا</option>
                                                                        <option value="جمهورية الدومينيكان">جمهورية الدومينيكان</option>
                                                                        <option value="تيمور الشرقية ">تيمور الشرقية </option>
                                                                        <option value="الإكوادور">الإكوادور</option>
                                                                        <option value="مصر">مصر</option>
                                                                        <option value="السلفادور">السلفادور</option>
                                                                        <option value="غينيا الاستوائية">غينيا الاستوائية</option>
                                                                        <option value="إريتريا">إريتريا</option>
                                                                        <option value="إستونيا">إستونيا</option>
                                                                        <option value="إثيوبيا">إثيوبيا</option>
                                                                        <option value="فيجي">فيجي</option>
                                                                        <option value="فنلندا">فنلندا</option>
                                                                        <option value="فرنسا">فرنسا</option>
                                                                        <option value="الغابون">الغابون</option>
                                                                        <option value="غامبيا">غامبيا</option>
                                                                        <option value="جورجيا">جورجيا</option>
                                                                        <option value="ألمانيا">ألمانيا</option>
                                                                        <option value="غانا">غانا</option>
                                                                        <option value="اليونان">اليونان</option>
                                                                        <option value="جرينادا">جرينادا</option>
                                                                        <option value="غواتيمالا">غواتيمالا</option>
                                                                        <option value="غينيا">غينيا</option>
                                                                        <option value="غينيا بيساو">غينيا بيساو</option>
                                                                        <option value="غويانا">غويانا</option>
                                                                        <option value="هايتي">هايتي</option>
                                                                        <option value="هندوراس">هندوراس</option>
                                                                        <option value="المجر">المجر</option>
                                                                        <option value="آيسلندا">آيسلندا</option>
                                                                        <option value="الهند">الهند</option>
                                                                        <option value="إندونيسيا">إندونيسيا</option>
                                                                        <option value="إيران">إيران</option>
                                                                        <option value="العراق">العراق</option>
                                                                        <option value="جمهورية أيرلندا ">جمهورية أيرلندا </option>
                                                                        <option value="فلسطين">فلسطين</option>
                                                                        <option value="إيطاليا">إيطاليا</option>
                                                                        <option value="جامايكا">جامايكا</option>
                                                                        <option value="اليابان">اليابان</option>
                                                                        <option value="الأردن">الأردن</option>
                                                                        <option value="كازاخستان">كازاخستان</option>
                                                                        <option value="كينيا">كينيا</option>
                                                                        <option value="كيريباتي">كيريباتي</option>
                                                                        <option value="الكويت">الكويت</option>
                                                                        <option value="قرغيزستان">قرغيزستان</option>
                                                                        <option value="لاوس">لاوس</option>
                                                                        <option value="لاوس">لاوس</option>
                                                                        <option value="لاتفيا">لاتفيا</option>
                                                                        <option value="لبنان">لبنان</option>
                                                                        <option value="ليسوتو">ليسوتو</option>
                                                                        <option value="ليبيريا">ليبيريا</option>
                                                                        <option value="ليبيا">ليبيا</option>
                                                                        <option value="ليختنشتاين">ليختنشتاين</option>
                                                                        <option value="ليتوانيا">ليتوانيا</option>
                                                                        <option value="لوكسمبورغ">لوكسمبورغ</option>
                                                                        <option value="مدغشقر">مدغشقر</option>
                                                                        <option value="مالاوي">مالاوي</option>
                                                                        <option value="ماليزيا">ماليزيا</option>
                                                                        <option value="جزر المالديف">جزر المالديف</option>
                                                                        <option value="مالي">مالي</option>
                                                                        <option value="مالطا">مالطا</option>
                                                                        <option value="جزر مارشال">جزر مارشال</option>
                                                                        <option value="موريتانيا">موريتانيا</option>
                                                                        <option value="موريشيوس">موريشيوس</option>
                                                                        <option value="المكسيك">المكسيك</option>
                                                                        <option value="مايكرونيزيا">مايكرونيزيا</option>
                                                                        <option value="مولدوفا">مولدوفا</option>
                                                                        <option value="موناكو">موناكو</option>
                                                                        <option value="منغوليا">منغوليا</option>
                                                                        <option value="الجبل الأسود">الجبل الأسود</option>
                                                                        <option value="المغرب">المغرب</option>
                                                                        <option value="موزمبيق">موزمبيق</option>
                                                                        <option value="بورما">بورما</option>
                                                                        <option value="ناميبيا">ناميبيا</option>
                                                                        <option value="ناورو">ناورو</option>
                                                                        <option value="نيبال">نيبال</option>
                                                                        <option value="هولندا">هولندا</option>
                                                                        <option value="نيوزيلندا">نيوزيلندا</option>
                                                                        <option value="نيكاراجوا">نيكاراجوا</option>
                                                                        <option value="النيجر">النيجر</option>
                                                                        <option value="نيجيريا">نيجيريا</option>
                                                                        <option value="كوريا الشمالية ">كوريا الشمالية </option>
                                                                        <option value="النرويج">النرويج</option>
                                                                        <option value="سلطنة عمان">سلطنة عمان</option>
                                                                        <option value="باكستان">باكستان</option>
                                                                        <option value="بالاو">بالاو</option>
                                                                        <option value="بنما">بنما</option>
                                                                        <option value="بابوا غينيا الجديدة">بابوا غينيا الجديدة</option>
                                                                        <option value="باراغواي">باراغواي</option>
                                                                        <option value="بيرو">بيرو</option>
                                                                        <option value="الفلبين">الفلبين</option>
                                                                        <option value="بولندا">بولندا</option>
                                                                        <option value="البرتغال">البرتغال</option>
                                                                        <option value="قطر">قطر</option>
                                                                        <option value="جمهورية الكونغو">جمهورية الكونغو</option>
                                                                        <option value="جمهورية مقدونيا">جمهورية مقدونيا</option>
                                                                        <option value="رومانيا">رومانيا</option>
                                                                        <option value="روسيا">روسيا</option>
                                                                        <option value="رواندا">رواندا</option>
                                                                        <option value="سانت كيتس ونيفيس">سانت كيتس ونيفيس</option>
                                                                        <option value="سانت لوسيا">سانت لوسيا</option>
                                                                        <option value="سانت فنسينت والجرينادينز">سانت فنسينت والجرينادينز</option>
                                                                        <option value="ساموا">ساموا</option>
                                                                        <option value="سان مارينو">سان مارينو</option>
                                                                        <option value="ساو تومي وبرينسيب">ساو تومي وبرينسيب</option>
                                                                        <option value="السعودية">السعودية</option>
                                                                        <option value="السنغال">السنغال</option>
                                                                        <option value="صربيا">صربيا</option>
                                                                        <option value="سيشيل">سيشيل</option>
                                                                        <option value="سيراليون">سيراليون</option>
                                                                        <option value="سنغافورة">سنغافورة</option>
                                                                        <option value="سلوفاكيا">سلوفاكيا</option>
                                                                        <option value="سلوفينيا">سلوفينيا</option>
                                                                        <option value="جزر سليمان">جزر سليمان</option>
                                                                        <option value="الصومال">الصومال</option>
                                                                        <option value="جنوب أفريقيا">جنوب أفريقيا</option>
                                                                        <option value="كوريا الجنوبية">كوريا الجنوبية</option>
                                                                        <option value="جنوب السودان">جنوب السودان</option>
                                                                        <option value="إسبانيا">إسبانيا</option>
                                                                        <option value="سريلانكا">سريلانكا</option>
                                                                        <option value="السودان">السودان</option>
                                                                        <option value="سورينام">سورينام</option>
                                                                        <option value="سوازيلاند">سوازيلاند</option>
                                                                        <option value="السويد">السويد</option>
                                                                        <option value="سويسرا">سويسرا</option>
                                                                        <option value="سوريا">سوريا</option>
                                                                        <option value="طاجيكستان">طاجيكستان</option>
                                                                        <option value="تنزانيا">تنزانيا</option>
                                                                        <option value="تايلاند">تايلاند</option>
                                                                        <option value="توغو">توغو</option>
                                                                        <option value="تونجا">تونجا</option>
                                                                        <option value="ترينيداد وتوباغو">ترينيداد وتوباغو</option>
                                                                        <option value="تونس">تونس</option>
                                                                        <option value="تركيا">تركيا</option>
                                                                        <option value="تركمانستان">تركمانستان</option>
                                                                        <option value="توفالو">توفالو</option>
                                                                        <option value="أوغندا">أوغندا</option>
                                                                        <option value="أوكرانيا">أوكرانيا</option>
                                                                        <option value="الإمارات العربية المتحدة">الإمارات العربية المتحدة</option>
                                                                        <option value="المملكة المتحدة">المملكة المتحدة</option>
                                                                        <option value="الولايات المتحدة">الولايات المتحدة</option>
                                                                        <option value="أوروغواي">أوروغواي</option>
                                                                        <option value="أوزبكستان">أوزبكستان</option>
                                                                        <option value="فانواتو">فانواتو</option>
                                                                        <option value="فنزويلا">فنزويلا</option>
                                                                        <option value="فيتنام">فيتنام</option>
                                                                        <option value="اليمن">اليمن</option>
                                                                        <option value="زامبيا">زامبيا</option>
                                                                        <option value="زيمبابوي">زيمبابوي</option>
                                                                    </select>
                                                                    <i class="fa fa-globe"></i>
                                                                </div>
                                                            </div><!-- end columns -->
                                                            
                                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 search-btn">
                                                                <button type="submit" class="btn btn-orange">البحث</button>
                                                            </div><!-- end columns -->
                                                            
                                                        </div><!-- end row -->
                                                    
                                                </div><!-- end cars -->
                                                
                                            @endif
                                            <ul class="wizard">
                                                <li class="previous first" style="display:none;"><a class="btn btn-orange" href="javascript:;">الأولى</a></li>
                                                <li class="previous"><a class="btn btn-orange" href="javascript:;">السابقة</a></li>
                                                <li class="next last" style="display:none;"><a class="btn btn-orange" href="javascript:;">الأخيرة</a></li>
                                                <li class="next"><a class="btn btn-orange" href="javascript:;">التالية</a></li>
                                            </ul>
                                        </div><!-- end tab-content -->
            
                                    </div>
                                </form>
                                <!-- end columns 
                                <div class="hidden-xs hidden-sm col-md-6 no-pd-l">
                                    <div class="welcome-message">
                                        <h2>مرحبا بك في باقات العمرة</h2>
                                        <p>هنالك العديد من الأنواع المتوفرة لنصوص لوريم إيبسوم، ولكن الغالبية تم تعديلها بشكل ما عبر إدخال بعض النوادر أو الكلمات العشوائية إلى النص. إن كنت تريد أن تستخدم نص لوريم إيبسوم ما، عليك أن تتحقق أولاً أن ليس هناك أي كلمات أو عبارات محرجة أو غير لائقة مخبأة في هذا النص. بينما تعمل جميع مولّدات نصوص لوريم إيبسوم على الإنترنت على إعادة تكرار مقاطع من نص لوريم إيبسوم نفسه عدة مرات بما تتطلبه الحاجة، يقوم مولّدنا هذا باستخدام كلمات من قاموس يحوي على أكثر من 200 كلمة لا تينية، مضاف إليها مجموعة من الجمل النموذجية، لتكوين نص لوريم إيبسوم ذو شكل منطقي قريب إلى النص الحقيقي. وبالتالي يكون النص الناتح خالي من التكرار، أو أي كلمات أو عبارات غير لائقة أو ما شابه. وهذا ما يجعله أول مولّد نص لوريم إيبسوم حقيقي على الإنترنت.</p>
                                        <a href="{{route('site.programmes')}}" class="btn btn-w-border">اكتشف المزيد</a>
                                    </div>
                                </div>-->
                        </div><!-- end row -->
                    </div><!-- end container -->
                </div><!-- end search-tabs -->
            @elseif(Config::get('app.locale') == 'en')
                <div class="search-tabs" id="search-tabs-3">
                    <div class="container" id="rootwizard">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no-pd-r">
                                    <h2 style="color: #faa61a;">Welcome to Umrah Packages</h2>
                            </div>
                            <form method="GET" action="{{route('site.hotelSearch')}}">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no-pd-r">
                            
                                <ul class="nav nav-tabs">
                                    @if(Auth::guard('members')->check())
                                        @if(Auth::guard('members')->user()->type == "multi")
                                        <li class="active"><a href="#tab1" data-toggle="tab"><span><i class="fa fa-plane"></i></span><span class="st-text">Hotels (1)</span></a></li>
                                        <li><a href="#tab2" data-toggle="tab"><span><i class="fa fa-building"></i></span><span class="st-text">Rooms (2)</span></a></li>
                                        @else
                                        <li class="active"><a href="#tab1" data-toggle="tab"><span><i class="fa fa-plane"></i></span><span class="st-text">Hotels (1)</span></a></li>
                                        <li><a href="#tab2" data-toggle="tab"><span><i class="fa fa-building"></i></span><span class="st-text">Visa & Transportation (2)</span></a></li>
                                        <li><a href="#tab3" data-toggle="tab"><span><i class="fa fa-car"></i></span><span class="st-text">Services (3)</span></a></li>
                                        @endif
                                    @elseif(!Auth::guard('members')->check())
                                    <li class="active"><a href="#tab1" data-toggle="tab"><span><i class="fa fa-plane"></i></span><span class="st-text">Hotels (1)</span></a></li>
                                    <li><a href="#tab2" data-toggle="tab"><span><i class="fa fa-building"></i></span><span class="st-text">Visa & Transportation (2)</span></a></li>
                                    <li><a href="#tab3" data-toggle="tab"><span><i class="fa fa-car"></i></span><span class="st-text">Services (3)</span></a></li>
                                    @endif
                                </ul>
    
                                <div class="tab-content">
                                    @if(Auth::guard('members')->check())
                                        @if(Auth::guard('members')->user()->type == "multi")
                                            <div id="tab1" class="tab-pane in active">
                                                <div class="row">
                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                        <div class="row">
                                                            <div class="col-xs-12 col-sm-6 col-md-6">
                                                                <div class="form-group left-icon">
                                                                    <label>Town & Airport</label>
                                                                    <input type="text" class="form-control" placeholder="Town & Airport"  name="town" required>
                                                                    <i class="fa fa-map-marker"></i>
                                                                </div>
                                                            </div><!-- end columns -->
                                                            <div class="col-xs-12 col-sm-6 col-md-6">
                                                                <div class="form-group left-icon">
                                                                    <label>Airport & Hotel</label>
                                                                    <select class="form-control"  name="hotel">
                                                                        <option selected>Airport & Hotel</option>
                                                                        <option value="Mekkah">Jeddah Airport & Mekkah Hotel</option>
                                                                        <option value="Madinah Mekkah">Jeddah Airport & Mekkah, Madinah Hotel</option>
                                                                        <option value="Madinah Mekkah">Madinah Airport & Mekkah, Madinah Hotel</option>
                                                                    </select>
                                                                    <i class="fa fa-map-marker"></i>
                                                                </div>
                                                            </div><!-- end columns -->
                                                        </div><!-- end row -->								
                                                    </div><!-- end columns -->
                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                        <div class="row">
                                                            <div class="col-xs-4 col-sm-4 col-md-3">
                                                                <div class="form-group left-icon">
                                                                    <label>Arrival Date to Mekkah</label>
                                                                    <input type="text" class="form-control dpd1" placeholder="mm/dd/yy" name="to_mekkah">
                                                                    <i class="fa fa-calendar"></i>
                                                                </div>
                                                            </div><!-- end columns -->
                                                            <div class="col-xs-4 col-sm-4 col-md-3">
                                                                <div class="form-group left-icon">
                                                                    <label>Leaving Date from Mekkah</label>
                                                                    <input type="text" class="form-control dpd2" placeholder="mm/dd/yy" name="from_mekkah">
                                                                    <i class="fa fa-calendar"></i>
                                                                </div>
                                                            </div><!-- end columns -->
                                                            <div class="col-xs-4 col-sm-4 col-md-3">
                                                                <div class="form-group left-icon">
                                                                    <label>Arrival Date to Madinah</label>
                                                                    <input type="text" class="form-control dpd3" placeholder="mm/dd/yy" name="to_madinah">
                                                                    <i class="fa fa-calendar"></i>
                                                                </div>
                                                            </div><!-- end columns -->
                                                            <div class="col-xs-4 col-sm-4 col-md-3">
                                                                <div class="form-group left-icon">
                                                                    <label>Leaving Date from Madinah</label>
                                                                    <input type="text" class="form-control dpd4" placeholder="mm/dd/yy" name="from_madinah">
                                                                    <i class="fa fa-calendar"></i>
                                                                </div>
                                                            </div><!-- end columns -->
                                                        </div><!-- end row -->								
                                                    </div><!-- end columns -->
                                                    
                                                </div><!-- end row -->
                                            </div><!-- end flights -->
                                        
                                            <div id="tab2" class="tab-pane">
                                                    <div class="row">
                                                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                                        <div class="form-group right-icon">
                                                            <label>Rooms</label>
                                                            <input type="number" class="form-control" placeholder="Number Of Rooms" name="rooms">
                                                        </div>
                                                    </div><!-- end columns -->

                                                    <div class="col-xs-6 col-sm-3 col-md-3">
                                                        <div class="form-group left-icon">
                                                            <label>Number Of Adults</label>
                                                            <input type="number" class="form-control" placeholder="Number Of Adults" name="adults">
                                                        </div>
                                                    </div><!-- end columns -->

                                                    <div class="col-xs-6 col-sm-3 col-md-3">
                                                        <div class="form-group left-icon">
                                                            <label>Number Of Children</label>
                                                            <input type="number" class="form-control" placeholder="Number Of Children" name="children">
                                                        </div>
                                                    </div><!-- end columns -->
                                                        <div class="col-xs-12 col-sm-6 col-md-6">
                                                            <div class="form-group left-icon">
                                                                <label>Select Umrah Operator Company</label>
                                                                <select class="form-control" name="multi">
                                                                    <option></option>
                                                                    @foreach ($members as $member)
                                                                        <option value="{{$member->id}}">{{$member->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                                <i class="fa fa-map-marker"></i>
                                                            </div>
                                                        </div><!-- end columns -->                                                                                                        
                                                        
                                                        <div class="col-xs-12 col-sm-6 col-md-6">
                                                            <div class="form-group left-icon">
                                                                <label>Select Package Category</label>
                                                                <select class="form-control">
                                                                    <option>VIP Package</option>
                                                                    <option>Premium Package</option>
                                                                    <option>Normal Package</option>
                                                                </select>
                                                                <i class="fa fa-flag"></i>
                                                            </div>
                                                        </div><!-- end columns --> 
                                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 search-btn">
                                                            <button type="submit" class="btn btn-orange">Search</button>
                                                        </div><!-- end columns -->
                                                    </div><!-- end row -->
                                            </div><!-- end hotels -->
                                        @else
                                            <div id="tab1" class="tab-pane in active">
                                                    <div class="row">
                                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                            <div class="row">
                                                                <div class="col-xs-12 col-sm-6 col-md-6">
                                                                    <div class="form-group left-icon">
                                                                        <label>Town & Airport</label>
                                                                        <input type="text" class="form-control" placeholder="Town & Airport"  name="town" required>
                                                                        <i class="fa fa-map-marker"></i>
                                                                    </div>
                                                                </div><!-- end columns -->
                                                                <div class="col-xs-12 col-sm-6 col-md-6">
                                                                    <div class="form-group left-icon">
                                                                        <label>Airport & Hotel</label>
                                                                        <select class="form-control"  name="hotel">
                                                                            <option selected>Airport & Hotel</option>
                                                                            <option value="Mekkah">Jeddah Airport & Mekkah Hotel</option>
                                                                            <option value="Madinah Mekkah">Jeddah Airport & Mekkah, Madinah Hotel</option>
                                                                            <option value="Madinah Mekkah">Madinah Airport & Mekkah, Madinah Hotel</option>
                                                                        </select>
                                                                        <i class="fa fa-map-marker"></i>
                                                                    </div>
                                                                </div><!-- end columns -->
                                                            </div><!-- end row -->								
                                                        </div><!-- end columns -->
                                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                            <div class="row">
                                                                <div class="col-xs-4 col-sm-4 col-md-3">
                                                                <div class="form-group left-icon">
                                                                    <label>Arrival Date to Mekkah</label>
                                                                    <input type="text" class="form-control dpd1" placeholder="mm/dd/yy" name="to_mekkah">
                                                                    <i class="fa fa-calendar"></i>
                                                                </div>
                                                            </div><!-- end columns -->
                                                            <div class="col-xs-4 col-sm-4 col-md-3">
                                                                <div class="form-group left-icon">
                                                                    <label>Leaving Date from Mekkah</label>
                                                                    <input type="text" class="form-control dpd2" placeholder="mm/dd/yy" name="from_mekkah">
                                                                    <i class="fa fa-calendar"></i>
                                                                </div>
                                                            </div><!-- end columns -->
                                                            <div class="col-xs-4 col-sm-4 col-md-3">
                                                                <div class="form-group left-icon">
                                                                    <label>Arrival Date to Madinah</label>
                                                                    <input type="text" class="form-control dpd3" placeholder="mm/dd/yy" name="to_madinah">
                                                                    <i class="fa fa-calendar"></i>
                                                                </div>
                                                            </div><!-- end columns -->
                                                            <div class="col-xs-4 col-sm-4 col-md-3">
                                                                <div class="form-group left-icon">
                                                                    <label>Leaving Date from Madinah</label>
                                                                    <input type="text" class="form-control dpd4" placeholder="mm/dd/yy" name="from_madinah">
                                                                    <i class="fa fa-calendar"></i>
                                                                </div>
                                                            </div><!-- end columns -->
                                                            </div><!-- end row -->								
                                                        </div><!-- end columns -->
                                                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                                            <div class="form-group right-icon">
                                                                <label>Rooms</label>
                                                                <select class="form-control" name="rooms">
                                                                    <option value="0">Number Of Rooms</option>
                                                                    <option value="1">1</option>
                                                                    <option value="2">2</option>
                                                                    <option value="3">3</option>
                                                                    <option value="4">4</option>
                                                                    <option value="5">5</option>
                                                                    <option value="6">6</option>
                                                                    <option value="7">7</option>
                                                                    <option value="8">8</option>
                                                                    <option value="9">9</option>
                                                                </select>
                                                                <i class="fa fa-angle-down"></i>
                                                            </div>
                                                        </div><!-- end columns -->

                                                        <div class="col-xs-6 col-sm-3 col-md-3">
                                                            <div class="form-group left-icon">
                                                                <label>Number Of Adults</label>
                                                                <select id="adults" class="form-control" name="adults">
                                                                    <option>    </option>
                                                                    <option value="1">1</option>
                                                                    <option value="2">2</option>
                                                                    <option value="3">3</option>
                                                                    <option value="4">4</option>
                                                                    <option value="5">5</option>
                                                                    <option value="6">6</option>
                                                                    <option value="7">7</option>
                                                                    <option value="8">8</option>
                                                                    <option value="9">9</option>
                                                                </select>
                                                                <i class="fa fa-cogs"></i>
                                                            </div>
                                                        </div><!-- end columns -->

                                                        <div class="col-xs-6 col-sm-3 col-md-3">
                                                            <div class="form-group left-icon">
                                                                <label>Number Of Children</label>
                                                                <select id="children" class="form-control" name="children">
                                                                    <option>    </option>
                                                                </select>
                                                                <i class="fa fa-cogs"></i>
                                                            </div>
                                                        </div><!-- end columns -->
                                                    </div><!-- end row -->
                                            </div><!-- end flights -->
                                            
                                            <div id="tab2" class="tab-pane">
                                                    <div class="row">
                                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                            <div class="row">
                                                                <div class="col-xs-12 col-sm-6 col-md-6">
                                                                    <div class="form-group left-icon">
                                                                        <label>Movements</label>
                                                                        <select class="form-control" name="transport">
                                                                            <option value="1" selected>Jeddah - Mekkah - Madinah - Mekkah Airport</option>
                                                                            <option value="2">Jeddah - Mekkah - Madinah - Jeddah Airport</option>
                                                                            <option value="3">Jeddah - Mekkah - Madinah - Madinah Airport</option>
                                                                            <option value="0">Without Movements</option>
                                                                        </select>
                                                                        <i class="fa fa-map-marker"></i>
                                                                    </div>
                                                                </div><!-- end columns -->
                                                                <div class="col-xs-6 col-sm-6 col-md-6">
                                                                    <div class="form-group left-icon">
                                                                        <label>Vehicle Type</label>
                                                                        <select class="form-control">
                                                                            <option selected>Vehicle Type</option>
                                                                            <option>Car for 4 Guests</option>
                                                                            <option>Car for 7 Guests</option>
                                                                            <option>Mini Bus</option>
                                                                            <option>Bus</option>
                                                                        </select>
                                                                        <i class="fa fa-bus"></i>
                                                                    </div>
                                                                </div><!-- end columns -->
                                                            </div><!-- end row -->								
                                                        </div><!-- end columns -->
                                                        
                                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                                            <div class="form-group left-icon">
                                                                <label>Transportation Category</label>
                                                                <select class="form-control">
                                                                    <option selected>Transportation Category</option>
                                                                    <option>VIP</option>
                                                                    <option>Premium</option>
                                                                    <option>Normal</option>
                                                                </select>
                                                                <i class="fa fa-bus"></i>
                                                            </div>
                                                        </div><!-- end columns -->
                                                        
                                                        <div class="col-xs-6 col-sm-3 col-md-3">
                                                            <div class="form-group left-icon">
                                                                <label>Vehicle Model From</label>
                                                                <select class="form-control">
                                                                    <option selected>2019</option>
                                                                    <option>2018</option>
                                                                    <option>2017</option>
                                                                    <option>2016</option>
                                                                    <option>2015</option>
                                                                    <option>2014</option>
                                                                    <option>2013</option>
                                                                    <option>2012</option>
                                                                    <option>2011</option>
                                                                    <option>2010</option>
                                                                    <option>2009</option>
                                                                </select>
                                                                <i class="fa fa-car"></i>
                                                            </div>
                                                        </div><!-- end columns -->

                                                        <div class="col-xs-6 col-sm-3 col-md-3">
                                                            <div class="form-group left-icon">
                                                                <label>Vehicle Model To</label>
                                                                <select class="form-control">
                                                                    <option selected>2019</option>
                                                                    <option>2018</option>
                                                                    <option>2017</option>
                                                                    <option>2016</option>
                                                                    <option>2015</option>
                                                                    <option>2014</option>
                                                                    <option>2013</option>
                                                                    <option>2012</option>
                                                                    <option>2011</option>
                                                                    <option>2010</option>
                                                                    <option>2009</option>
                                                                </select>
                                                                <i class="fa fa-car"></i>
                                                            </div>
                                                        </div><!-- end columns -->
                                                    </div><!-- end row -->
                                            </div><!-- end hotels -->
            
                                            <div id="tab3" class="tab-pane">
                                                <div class="row">
                                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                                        <div class="form-group left-icon">
                                                            <label>Select Umrah Operator Company</label>
                                                            <select class="form-control" name="multi">
                                                                <option></option>
                                                                @foreach ($members as $member)
                                                                    <option value="{{$member->id}}">{{$member->name}}</option>
                                                                @endforeach
                                                            </select>
                                                            <i class="fa fa-map-marker"></i>
                                                        </div>
                                                    </div><!-- end columns -->                                                                                                        
                                                        
                                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                                        <div class="form-group left-icon">
                                                            <label>Select Package Category</label>
                                                            <select class="form-control">
                                                                <option>VIP Package</option>
                                                                <option>Premium Package</option>
                                                                <option>Normal Package</option>
                                                            </select>
                                                            <i class="fa fa-flag"></i>
                                                        </div>
                                                    </div><!-- end columns -->                                                        
                                                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                                            <div class="form-group right-icon">
                                                                <label>Additional Services</label>
                                                                <select class="form-control">
                                                                    <option selected>Additional Services</option>
                                                                    <option value="1">With Service</option>
                                                                    <option value="0">Without Service</option>
                                                                </select>
                                                                <i class="fa fa-cogs"></i>
                                                            </div>
                                                        </div><!-- end columns -->

                                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                                            <div class="form-group left-icon">
                                                                <label>Nationality</label>
                                                                <select class="form-control">
                                                                    <option selected>Nationality</option>
                                                                    <option value="afghan">Afghan</option>
                                                                    <option value="albanian">Albanian</option>
                                                                    <option value="algerian">Algerian</option>
                                                                    <option value="american">American</option>
                                                                    <option value="andorran">Andorran</option>
                                                                    <option value="angolan">Angolan</option>
                                                                    <option value="antiguans">Antiguans</option>
                                                                    <option value="argentinean">Argentinean</option>
                                                                    <option value="armenian">Armenian</option>
                                                                    <option value="australian">Australian</option>
                                                                    <option value="austrian">Austrian</option>
                                                                    <option value="azerbaijani">Azerbaijani</option>
                                                                    <option value="bahamian">Bahamian</option>
                                                                    <option value="bahraini">Bahraini</option>
                                                                    <option value="bangladeshi">Bangladeshi</option>
                                                                    <option value="barbadian">Barbadian</option>
                                                                    <option value="barbudans">Barbudans</option>
                                                                    <option value="batswana">Batswana</option>
                                                                    <option value="belarusian">Belarusian</option>
                                                                    <option value="belgian">Belgian</option>
                                                                    <option value="belizean">Belizean</option>
                                                                    <option value="beninese">Beninese</option>
                                                                    <option value="bhutanese">Bhutanese</option>
                                                                    <option value="bolivian">Bolivian</option>
                                                                    <option value="bosnian">Bosnian</option>
                                                                    <option value="brazilian">Brazilian</option>
                                                                    <option value="british">British</option>
                                                                    <option value="bruneian">Bruneian</option>
                                                                    <option value="bulgarian">Bulgarian</option>
                                                                    <option value="burkinabe">Burkinabe</option>
                                                                    <option value="burmese">Burmese</option>
                                                                    <option value="burundian">Burundian</option>
                                                                    <option value="cambodian">Cambodian</option>
                                                                    <option value="cameroonian">Cameroonian</option>
                                                                    <option value="canadian">Canadian</option>
                                                                    <option value="cape verdean">Cape Verdean</option>
                                                                    <option value="central african">Central African</option>
                                                                    <option value="chadian">Chadian</option>
                                                                    <option value="chilean">Chilean</option>
                                                                    <option value="chinese">Chinese</option>
                                                                    <option value="colombian">Colombian</option>
                                                                    <option value="comoran">Comoran</option>
                                                                    <option value="congolese">Congolese</option>
                                                                    <option value="costa rican">Costa Rican</option>
                                                                    <option value="croatian">Croatian</option>
                                                                    <option value="cuban">Cuban</option>
                                                                    <option value="cypriot">Cypriot</option>
                                                                    <option value="czech">Czech</option>
                                                                    <option value="danish">Danish</option>
                                                                    <option value="djibouti">Djibouti</option>
                                                                    <option value="dominican">Dominican</option>
                                                                    <option value="dutch">Dutch</option>
                                                                    <option value="east timorese">East Timorese</option>
                                                                    <option value="ecuadorean">Ecuadorean</option>
                                                                    <option value="egyptian">Egyptian</option>
                                                                    <option value="emirian">Emirian</option>
                                                                    <option value="equatorial guinean">Equatorial Guinean</option>
                                                                    <option value="eritrean">Eritrean</option>
                                                                    <option value="estonian">Estonian</option>
                                                                    <option value="ethiopian">Ethiopian</option>
                                                                    <option value="fijian">Fijian</option>
                                                                    <option value="filipino">Filipino</option>
                                                                    <option value="finnish">Finnish</option>
                                                                    <option value="french">French</option>
                                                                    <option value="gabonese">Gabonese</option>
                                                                    <option value="gambian">Gambian</option>
                                                                    <option value="georgian">Georgian</option>
                                                                    <option value="german">German</option>
                                                                    <option value="ghanaian">Ghanaian</option>
                                                                    <option value="greek">Greek</option>
                                                                    <option value="grenadian">Grenadian</option>
                                                                    <option value="guatemalan">Guatemalan</option>
                                                                    <option value="guinea-bissauan">Guinea-Bissauan</option>
                                                                    <option value="guinean">Guinean</option>
                                                                    <option value="guyanese">Guyanese</option>
                                                                    <option value="haitian">Haitian</option>
                                                                    <option value="herzegovinian">Herzegovinian</option>
                                                                    <option value="honduran">Honduran</option>
                                                                    <option value="hungarian">Hungarian</option>
                                                                    <option value="icelander">Icelander</option>
                                                                    <option value="indian">Indian</option>
                                                                    <option value="indonesian">Indonesian</option>
                                                                    <option value="iranian">Iranian</option>
                                                                    <option value="iraqi">Iraqi</option>
                                                                    <option value="irish">Irish</option>
                                                                    <option value="israeli">Israeli</option>
                                                                    <option value="italian">Italian</option>
                                                                    <option value="ivorian">Ivorian</option>
                                                                    <option value="jamaican">Jamaican</option>
                                                                    <option value="japanese">Japanese</option>
                                                                    <option value="jordanian">Jordanian</option>
                                                                    <option value="kazakhstani">Kazakhstani</option>
                                                                    <option value="kenyan">Kenyan</option>
                                                                    <option value="kittian and nevisian">Kittian and Nevisian</option>
                                                                    <option value="kuwaiti">Kuwaiti</option>
                                                                    <option value="kyrgyz">Kyrgyz</option>
                                                                    <option value="laotian">Laotian</option>
                                                                    <option value="latvian">Latvian</option>
                                                                    <option value="lebanese">Lebanese</option>
                                                                    <option value="liberian">Liberian</option>
                                                                    <option value="libyan">Libyan</option>
                                                                    <option value="liechtensteiner">Liechtensteiner</option>
                                                                    <option value="lithuanian">Lithuanian</option>
                                                                    <option value="luxembourger">Luxembourger</option>
                                                                    <option value="macedonian">Macedonian</option>
                                                                    <option value="malagasy">Malagasy</option>
                                                                    <option value="malawian">Malawian</option>
                                                                    <option value="malaysian">Malaysian</option>
                                                                    <option value="maldivan">Maldivan</option>
                                                                    <option value="malian">Malian</option>
                                                                    <option value="maltese">Maltese</option>
                                                                    <option value="marshallese">Marshallese</option>
                                                                    <option value="mauritanian">Mauritanian</option>
                                                                    <option value="mauritian">Mauritian</option>
                                                                    <option value="mexican">Mexican</option>
                                                                    <option value="micronesian">Micronesian</option>
                                                                    <option value="moldovan">Moldovan</option>
                                                                    <option value="monacan">Monacan</option>
                                                                    <option value="mongolian">Mongolian</option>
                                                                    <option value="moroccan">Moroccan</option>
                                                                    <option value="mosotho">Mosotho</option>
                                                                    <option value="motswana">Motswana</option>
                                                                    <option value="mozambican">Mozambican</option>
                                                                    <option value="namibian">Namibian</option>
                                                                    <option value="nauruan">Nauruan</option>
                                                                    <option value="nepalese">Nepalese</option>
                                                                    <option value="new zealander">New Zealander</option>
                                                                    <option value="ni-vanuatu">Ni-Vanuatu</option>
                                                                    <option value="nicaraguan">Nicaraguan</option>
                                                                    <option value="nigerien">Nigerien</option>
                                                                    <option value="north korean">North Korean</option>
                                                                    <option value="northern irish">Northern Irish</option>
                                                                    <option value="norwegian">Norwegian</option>
                                                                    <option value="omani">Omani</option>
                                                                    <option value="pakistani">Pakistani</option>
                                                                    <option value="palauan">Palauan</option>
                                                                    <option value="panamanian">Panamanian</option>
                                                                    <option value="papua new guinean">Papua New Guinean</option>
                                                                    <option value="paraguayan">Paraguayan</option>
                                                                    <option value="peruvian">Peruvian</option>
                                                                    <option value="polish">Polish</option>
                                                                    <option value="portuguese">Portuguese</option>
                                                                    <option value="qatari">Qatari</option>
                                                                    <option value="romanian">Romanian</option>
                                                                    <option value="russian">Russian</option>
                                                                    <option value="rwandan">Rwandan</option>
                                                                    <option value="saint lucian">Saint Lucian</option>
                                                                    <option value="salvadoran">Salvadoran</option>
                                                                    <option value="samoan">Samoan</option>
                                                                    <option value="san marinese">San Marinese</option>
                                                                    <option value="sao tomean">Sao Tomean</option>
                                                                    <option value="saudi">Saudi</option>
                                                                    <option value="scottish">Scottish</option>
                                                                    <option value="senegalese">Senegalese</option>
                                                                    <option value="serbian">Serbian</option>
                                                                    <option value="seychellois">Seychellois</option>
                                                                    <option value="sierra leonean">Sierra Leonean</option>
                                                                    <option value="singaporean">Singaporean</option>
                                                                    <option value="slovakian">Slovakian</option>
                                                                    <option value="slovenian">Slovenian</option>
                                                                    <option value="solomon islander">Solomon Islander</option>
                                                                    <option value="somali">Somali</option>
                                                                    <option value="south african">South African</option>
                                                                    <option value="south korean">South Korean</option>
                                                                    <option value="spanish">Spanish</option>
                                                                    <option value="sri lankan">Sri Lankan</option>
                                                                    <option value="sudanese">Sudanese</option>
                                                                    <option value="surinamer">Surinamer</option>
                                                                    <option value="swazi">Swazi</option>
                                                                    <option value="swedish">Swedish</option>
                                                                    <option value="swiss">Swiss</option>
                                                                    <option value="syrian">Syrian</option>
                                                                    <option value="taiwanese">Taiwanese</option>
                                                                    <option value="tajik">Tajik</option>
                                                                    <option value="tanzanian">Tanzanian</option>
                                                                    <option value="thai">Thai</option>
                                                                    <option value="togolese">Togolese</option>
                                                                    <option value="tongan">Tongan</option>
                                                                    <option value="trinidadian or tobagonian">Trinidadian or Tobagonian</option>
                                                                    <option value="tunisian">Tunisian</option>
                                                                    <option value="turkish">Turkish</option>
                                                                    <option value="tuvaluan">Tuvaluan</option>
                                                                    <option value="ugandan">Ugandan</option>
                                                                    <option value="ukrainian">Ukrainian</option>
                                                                    <option value="uruguayan">Uruguayan</option>
                                                                    <option value="uzbekistani">Uzbekistani</option>
                                                                    <option value="venezuelan">Venezuelan</option>
                                                                    <option value="vietnamese">Vietnamese</option>
                                                                    <option value="welsh">Welsh</option>
                                                                    <option value="yemenite">Yemenite</option>
                                                                    <option value="zambian">Zambian</option>
                                                                    <option value="zimbabwean">Zimbabwean</option>
                                                                </select>
                                                                <i class="fa fa-globe"></i>
                                                            </div>
                                                        </div><!-- end columns -->
                                                        
                                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 search-btn">
                                                            <button type="submit" class="btn btn-orange">Search</button>
                                                        </div><!-- end columns -->
                                                        
                                                    </div><!-- end row -->
                                                
                                            </div><!-- end cars -->
                                        @endif
                                    @elseif(!Auth::guard('members')->check())
                                    <div id="tab1" class="tab-pane in active">
                                            <div class="row">
                                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                    <div class="row">
                                                        <div class="col-xs-12 col-sm-6 col-md-6">
                                                            <div class="form-group left-icon">
                                                                <label>Town & Airport</label>
                                                                <input type="text" class="form-control" placeholder="Town & Airport"  name="town" required>
                                                                <i class="fa fa-map-marker"></i>
                                                            </div>
                                                        </div><!-- end columns -->
                                                        <div class="col-xs-12 col-sm-6 col-md-6">
                                                            <div class="form-group left-icon">
                                                                <label>Airport & Hotel</label>
                                                                <select class="form-control"  name="hotel">
                                                                    <option selected>Airport & Hotel</option>
                                                                    <option value="Mekkah">Jeddah Airport & Mekkah Hotel</option>
                                                                    <option value="Madinah Mekkah">Jeddah Airport & Mekkah, Madinah Hotel</option>
                                                                    <option value="Madinah Mekkah">Madinah Airport & Mekkah, Madinah Hotel</option>
                                                                </select>
                                                                <i class="fa fa-map-marker"></i>
                                                            </div>
                                                        </div><!-- end columns -->
                                                    </div><!-- end row -->								
                                                </div><!-- end columns -->
                                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                    <div class="row">
                                                        <div class="col-xs-4 col-sm-4 col-md-3">
                                                                <div class="form-group left-icon">
                                                                    <label>Arrival Date to Mekkah</label>
                                                                    <input type="text" class="form-control dpd1" placeholder="mm/dd/yy" name="to_mekkah">
                                                                    <i class="fa fa-calendar"></i>
                                                                </div>
                                                            </div><!-- end columns -->
                                                            <div class="col-xs-4 col-sm-4 col-md-3">
                                                                <div class="form-group left-icon">
                                                                    <label>Leaving Date from Mekkah</label>
                                                                    <input type="text" class="form-control dpd2" placeholder="mm/dd/yy" name="from_mekkah">
                                                                    <i class="fa fa-calendar"></i>
                                                                </div>
                                                            </div><!-- end columns -->
                                                            <div class="col-xs-4 col-sm-4 col-md-3">
                                                                <div class="form-group left-icon">
                                                                    <label>Arrival Date to Madinah</label>
                                                                    <input type="text" class="form-control dpd3" placeholder="mm/dd/yy" name="to_madinah">
                                                                    <i class="fa fa-calendar"></i>
                                                                </div>
                                                            </div><!-- end columns -->
                                                            <div class="col-xs-4 col-sm-4 col-md-3">
                                                                <div class="form-group left-icon">
                                                                    <label>Leaving Date from Madinah</label>
                                                                    <input type="text" class="form-control dpd4" placeholder="mm/dd/yy" name="from_madinah">
                                                                    <i class="fa fa-calendar"></i>
                                                                </div>
                                                            </div><!-- end columns -->
                                                    </div><!-- end row -->								
                                                </div><!-- end columns -->
                                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                                    <div class="form-group right-icon">
                                                        <label>Rooms</label>
                                                        <select class="form-control" name="rooms">
                                                            <option value="0">Number Of Rooms</option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>
                                                            <option value="6">6</option>
                                                            <option value="7">7</option>
                                                            <option value="8">8</option>
                                                            <option value="9">9</option>
                                                        </select>
                                                        <i class="fa fa-angle-down"></i>
                                                    </div>
                                                </div><!-- end columns -->

                                                <div class="col-xs-6 col-sm-3 col-md-3">
                                                    <div class="form-group left-icon">
                                                        <label>Number Of Adults</label>
                                                        <select id="adults" class="form-control" name="adults">
                                                            <option>    </option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>
                                                            <option value="6">6</option>
                                                            <option value="7">7</option>
                                                            <option value="8">8</option>
                                                            <option value="9">9</option>
                                                        </select>
                                                        <i class="fa fa-cogs"></i>
                                                    </div>
                                                </div><!-- end columns -->

                                                <div class="col-xs-6 col-sm-3 col-md-3">
                                                    <div class="form-group left-icon">
                                                        <label>Number Of Children</label>
                                                        <select id="children" class="form-control" name="children">
                                                            <option>    </option>
                                                        </select>
                                                        <i class="fa fa-cogs"></i>
                                                    </div>
                                                </div><!-- end columns -->
                                            </div><!-- end row -->
                                    </div><!-- end flights -->
                                    
                                    <div id="tab2" class="tab-pane">
                                            <div class="row">
                                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                    <div class="row">
                                                        <div class="col-xs-12 col-sm-6 col-md-6">
                                                            <div class="form-group left-icon">
                                                                <label>Movements</label>
                                                                <select class="form-control" name="transport">
                                                                    <option value="1" selected>Jeddah - Mekkah - Madinah - Mekkah Airport</option>
                                                                    <option value="2">Jeddah - Mekkah - Madinah - Jeddah Airport</option>
                                                                    <option value="3">Jeddah - Mekkah - Madinah - Madinah Airport</option>
                                                                    <option value="0">Without Movements</option>
                                                                </select>
                                                                <i class="fa fa-map-marker"></i>
                                                            </div>
                                                        </div><!-- end columns -->
                                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                                            <div class="form-group left-icon">
                                                                <label>Vehicle Type</label>
                                                                <select class="form-control">
                                                                    <option selected>Vehicle Type</option>
                                                                    <option>Car for 4 Guests</option>
                                                                    <option>Car for 7 Guests</option>
                                                                    <option>Mini Bus</option>
                                                                    <option>Bus</option>
                                                                </select>
                                                                <i class="fa fa-bus"></i>
                                                            </div>
                                                        </div><!-- end columns -->
                                                    </div><!-- end row -->								
                                                </div><!-- end columns -->
                                                
                                                <div class="col-xs-6 col-sm-6 col-md-6">
                                                    <div class="form-group left-icon">
                                                        <label>Transportation Category</label>
                                                        <select class="form-control">
                                                            <option selected>Transportation Category</option>
                                                            <option>VIP</option>
                                                            <option>Premium</option>
                                                            <option>Normal</option>
                                                        </select>
                                                        <i class="fa fa-bus"></i>
                                                    </div>
                                                </div><!-- end columns -->
                                                
                                                <div class="col-xs-6 col-sm-3 col-md-3">
                                                    <div class="form-group left-icon">
                                                        <label>Vehicle Model From</label>
                                                        <select class="form-control">
                                                            <option selected>2019</option>
                                                            <option>2018</option>
                                                            <option>2017</option>
                                                            <option>2016</option>
                                                            <option>2015</option>
                                                            <option>2014</option>
                                                            <option>2013</option>
                                                            <option>2012</option>
                                                            <option>2011</option>
                                                            <option>2010</option>
                                                            <option>2009</option>
                                                        </select>
                                                        <i class="fa fa-car"></i>
                                                    </div>
                                                </div><!-- end columns -->

                                                <div class="col-xs-6 col-sm-3 col-md-3">
                                                    <div class="form-group left-icon">
                                                        <label>Vehicle Model To</label>
                                                        <select class="form-control">
                                                            <option selected>2019</option>
                                                            <option>2018</option>
                                                            <option>2017</option>
                                                            <option>2016</option>
                                                            <option>2015</option>
                                                            <option>2014</option>
                                                            <option>2013</option>
                                                            <option>2012</option>
                                                            <option>2011</option>
                                                            <option>2010</option>
                                                            <option>2009</option>
                                                        </select>
                                                        <i class="fa fa-car"></i>
                                                    </div>
                                                </div><!-- end columns -->
                                            </div><!-- end row -->
                                    </div><!-- end hotels -->
    
                                    <div id="tab3" class="tab-pane">
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-6 col-md-6">
                                                <div class="form-group left-icon">
                                                    <label>Select Umrah Operator Company</label>
                                                    <select class="form-control" name="multi">
                                                        <option></option>
                                                        @foreach ($members as $member)
                                                            <option value="{{$member->id}}">{{$member->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    <i class="fa fa-map-marker"></i>
                                                </div>
                                            </div><!-- end columns -->                                                                                                        
                                                
                                            <div class="col-xs-12 col-sm-6 col-md-6">
                                                <div class="form-group left-icon">
                                                    <label>Select Package Category</label>
                                                    <select class="form-control">
                                                        <option>VIP Package</option>
                                                        <option>Premium Package</option>
                                                        <option>Normal Package</option>
                                                    </select>
                                                    <i class="fa fa-flag"></i>
                                                </div>
                                            </div><!-- end columns -->                                                        
                                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                                    <div class="form-group right-icon">
                                                        <label>Additional Services</label>
                                                        <select class="form-control">
                                                            <option selected>Additional Services</option>
                                                            <option value="1">With Service</option>
                                                            <option value="0">Without Service</option>
                                                        </select>
                                                        <i class="fa fa-cogs"></i>
                                                    </div>
                                                </div><!-- end columns -->

                                                <div class="col-xs-6 col-sm-6 col-md-6">
                                                    <div class="form-group left-icon">
                                                        <label>Nationality</label>
                                                        <select class="form-control">
                                                            <option selected>Nationality</option>
                                                            <option value="afghan">Afghan</option>
                                                            <option value="albanian">Albanian</option>
                                                            <option value="algerian">Algerian</option>
                                                            <option value="american">American</option>
                                                            <option value="andorran">Andorran</option>
                                                            <option value="angolan">Angolan</option>
                                                            <option value="antiguans">Antiguans</option>
                                                            <option value="argentinean">Argentinean</option>
                                                            <option value="armenian">Armenian</option>
                                                            <option value="australian">Australian</option>
                                                            <option value="austrian">Austrian</option>
                                                            <option value="azerbaijani">Azerbaijani</option>
                                                            <option value="bahamian">Bahamian</option>
                                                            <option value="bahraini">Bahraini</option>
                                                            <option value="bangladeshi">Bangladeshi</option>
                                                            <option value="barbadian">Barbadian</option>
                                                            <option value="barbudans">Barbudans</option>
                                                            <option value="batswana">Batswana</option>
                                                            <option value="belarusian">Belarusian</option>
                                                            <option value="belgian">Belgian</option>
                                                            <option value="belizean">Belizean</option>
                                                            <option value="beninese">Beninese</option>
                                                            <option value="bhutanese">Bhutanese</option>
                                                            <option value="bolivian">Bolivian</option>
                                                            <option value="bosnian">Bosnian</option>
                                                            <option value="brazilian">Brazilian</option>
                                                            <option value="british">British</option>
                                                            <option value="bruneian">Bruneian</option>
                                                            <option value="bulgarian">Bulgarian</option>
                                                            <option value="burkinabe">Burkinabe</option>
                                                            <option value="burmese">Burmese</option>
                                                            <option value="burundian">Burundian</option>
                                                            <option value="cambodian">Cambodian</option>
                                                            <option value="cameroonian">Cameroonian</option>
                                                            <option value="canadian">Canadian</option>
                                                            <option value="cape verdean">Cape Verdean</option>
                                                            <option value="central african">Central African</option>
                                                            <option value="chadian">Chadian</option>
                                                            <option value="chilean">Chilean</option>
                                                            <option value="chinese">Chinese</option>
                                                            <option value="colombian">Colombian</option>
                                                            <option value="comoran">Comoran</option>
                                                            <option value="congolese">Congolese</option>
                                                            <option value="costa rican">Costa Rican</option>
                                                            <option value="croatian">Croatian</option>
                                                            <option value="cuban">Cuban</option>
                                                            <option value="cypriot">Cypriot</option>
                                                            <option value="czech">Czech</option>
                                                            <option value="danish">Danish</option>
                                                            <option value="djibouti">Djibouti</option>
                                                            <option value="dominican">Dominican</option>
                                                            <option value="dutch">Dutch</option>
                                                            <option value="east timorese">East Timorese</option>
                                                            <option value="ecuadorean">Ecuadorean</option>
                                                            <option value="egyptian">Egyptian</option>
                                                            <option value="emirian">Emirian</option>
                                                            <option value="equatorial guinean">Equatorial Guinean</option>
                                                            <option value="eritrean">Eritrean</option>
                                                            <option value="estonian">Estonian</option>
                                                            <option value="ethiopian">Ethiopian</option>
                                                            <option value="fijian">Fijian</option>
                                                            <option value="filipino">Filipino</option>
                                                            <option value="finnish">Finnish</option>
                                                            <option value="french">French</option>
                                                            <option value="gabonese">Gabonese</option>
                                                            <option value="gambian">Gambian</option>
                                                            <option value="georgian">Georgian</option>
                                                            <option value="german">German</option>
                                                            <option value="ghanaian">Ghanaian</option>
                                                            <option value="greek">Greek</option>
                                                            <option value="grenadian">Grenadian</option>
                                                            <option value="guatemalan">Guatemalan</option>
                                                            <option value="guinea-bissauan">Guinea-Bissauan</option>
                                                            <option value="guinean">Guinean</option>
                                                            <option value="guyanese">Guyanese</option>
                                                            <option value="haitian">Haitian</option>
                                                            <option value="herzegovinian">Herzegovinian</option>
                                                            <option value="honduran">Honduran</option>
                                                            <option value="hungarian">Hungarian</option>
                                                            <option value="icelander">Icelander</option>
                                                            <option value="indian">Indian</option>
                                                            <option value="indonesian">Indonesian</option>
                                                            <option value="iranian">Iranian</option>
                                                            <option value="iraqi">Iraqi</option>
                                                            <option value="irish">Irish</option>
                                                            <option value="israeli">Israeli</option>
                                                            <option value="italian">Italian</option>
                                                            <option value="ivorian">Ivorian</option>
                                                            <option value="jamaican">Jamaican</option>
                                                            <option value="japanese">Japanese</option>
                                                            <option value="jordanian">Jordanian</option>
                                                            <option value="kazakhstani">Kazakhstani</option>
                                                            <option value="kenyan">Kenyan</option>
                                                            <option value="kittian and nevisian">Kittian and Nevisian</option>
                                                            <option value="kuwaiti">Kuwaiti</option>
                                                            <option value="kyrgyz">Kyrgyz</option>
                                                            <option value="laotian">Laotian</option>
                                                            <option value="latvian">Latvian</option>
                                                            <option value="lebanese">Lebanese</option>
                                                            <option value="liberian">Liberian</option>
                                                            <option value="libyan">Libyan</option>
                                                            <option value="liechtensteiner">Liechtensteiner</option>
                                                            <option value="lithuanian">Lithuanian</option>
                                                            <option value="luxembourger">Luxembourger</option>
                                                            <option value="macedonian">Macedonian</option>
                                                            <option value="malagasy">Malagasy</option>
                                                            <option value="malawian">Malawian</option>
                                                            <option value="malaysian">Malaysian</option>
                                                            <option value="maldivan">Maldivan</option>
                                                            <option value="malian">Malian</option>
                                                            <option value="maltese">Maltese</option>
                                                            <option value="marshallese">Marshallese</option>
                                                            <option value="mauritanian">Mauritanian</option>
                                                            <option value="mauritian">Mauritian</option>
                                                            <option value="mexican">Mexican</option>
                                                            <option value="micronesian">Micronesian</option>
                                                            <option value="moldovan">Moldovan</option>
                                                            <option value="monacan">Monacan</option>
                                                            <option value="mongolian">Mongolian</option>
                                                            <option value="moroccan">Moroccan</option>
                                                            <option value="mosotho">Mosotho</option>
                                                            <option value="motswana">Motswana</option>
                                                            <option value="mozambican">Mozambican</option>
                                                            <option value="namibian">Namibian</option>
                                                            <option value="nauruan">Nauruan</option>
                                                            <option value="nepalese">Nepalese</option>
                                                            <option value="new zealander">New Zealander</option>
                                                            <option value="ni-vanuatu">Ni-Vanuatu</option>
                                                            <option value="nicaraguan">Nicaraguan</option>
                                                            <option value="nigerien">Nigerien</option>
                                                            <option value="north korean">North Korean</option>
                                                            <option value="northern irish">Northern Irish</option>
                                                            <option value="norwegian">Norwegian</option>
                                                            <option value="omani">Omani</option>
                                                            <option value="pakistani">Pakistani</option>
                                                            <option value="palauan">Palauan</option>
                                                            <option value="panamanian">Panamanian</option>
                                                            <option value="papua new guinean">Papua New Guinean</option>
                                                            <option value="paraguayan">Paraguayan</option>
                                                            <option value="peruvian">Peruvian</option>
                                                            <option value="polish">Polish</option>
                                                            <option value="portuguese">Portuguese</option>
                                                            <option value="qatari">Qatari</option>
                                                            <option value="romanian">Romanian</option>
                                                            <option value="russian">Russian</option>
                                                            <option value="rwandan">Rwandan</option>
                                                            <option value="saint lucian">Saint Lucian</option>
                                                            <option value="salvadoran">Salvadoran</option>
                                                            <option value="samoan">Samoan</option>
                                                            <option value="san marinese">San Marinese</option>
                                                            <option value="sao tomean">Sao Tomean</option>
                                                            <option value="saudi">Saudi</option>
                                                            <option value="scottish">Scottish</option>
                                                            <option value="senegalese">Senegalese</option>
                                                            <option value="serbian">Serbian</option>
                                                            <option value="seychellois">Seychellois</option>
                                                            <option value="sierra leonean">Sierra Leonean</option>
                                                            <option value="singaporean">Singaporean</option>
                                                            <option value="slovakian">Slovakian</option>
                                                            <option value="slovenian">Slovenian</option>
                                                            <option value="solomon islander">Solomon Islander</option>
                                                            <option value="somali">Somali</option>
                                                            <option value="south african">South African</option>
                                                            <option value="south korean">South Korean</option>
                                                            <option value="spanish">Spanish</option>
                                                            <option value="sri lankan">Sri Lankan</option>
                                                            <option value="sudanese">Sudanese</option>
                                                            <option value="surinamer">Surinamer</option>
                                                            <option value="swazi">Swazi</option>
                                                            <option value="swedish">Swedish</option>
                                                            <option value="swiss">Swiss</option>
                                                            <option value="syrian">Syrian</option>
                                                            <option value="taiwanese">Taiwanese</option>
                                                            <option value="tajik">Tajik</option>
                                                            <option value="tanzanian">Tanzanian</option>
                                                            <option value="thai">Thai</option>
                                                            <option value="togolese">Togolese</option>
                                                            <option value="tongan">Tongan</option>
                                                            <option value="trinidadian or tobagonian">Trinidadian or Tobagonian</option>
                                                            <option value="tunisian">Tunisian</option>
                                                            <option value="turkish">Turkish</option>
                                                            <option value="tuvaluan">Tuvaluan</option>
                                                            <option value="ugandan">Ugandan</option>
                                                            <option value="ukrainian">Ukrainian</option>
                                                            <option value="uruguayan">Uruguayan</option>
                                                            <option value="uzbekistani">Uzbekistani</option>
                                                            <option value="venezuelan">Venezuelan</option>
                                                            <option value="vietnamese">Vietnamese</option>
                                                            <option value="welsh">Welsh</option>
                                                            <option value="yemenite">Yemenite</option>
                                                            <option value="zambian">Zambian</option>
                                                            <option value="zimbabwean">Zimbabwean</option>
                                                        </select>
                                                        <i class="fa fa-globe"></i>
                                                    </div>
                                                </div><!-- end columns -->
                                                
                                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 search-btn">
                                                    <button type="submit" class="btn btn-orange">Search</button>
                                                </div><!-- end columns -->
                                                
                                            </div><!-- end row -->
                                        
                                    </div><!-- end cars -->
                                    @endif
                                    <ul class="wizard">
                                        <li class="previous first" style="display:none;"><a class="btn btn-orange" href="javascript:;">First</a></li>
                                        <li class="previous"><a class="btn btn-orange" href="javascript:;">Previous</a></li>
                                        <li class="next last" style="display:none;"><a class="btn btn-orange" href="javascript:;">Last</a></li>
                                        <li class="next"><a class="btn btn-orange" href="javascript:;">Next</a></li>
                                    </ul>

                                </div><!-- end tab-content -->
    
                            </div><!-- end columns -->
                            </form>
                            <!--<div class="hidden-xs hidden-sm col-md-6 no-pd-l">
                                <div class="welcome-message">
                                    <h2>Umrah Packages</h2>
                                    <p>Lorem ipsum dolor sit amet, ad duo fugit aeque fabulas, in lucilius prodesset pri. Veniam delectus ei vis. Est atqui timeam mnesarchum at, pro an eros perpetua ullamcorper, imeam mnesarchum at, pro an eros perpetua ullamcorper.</p>
                                    <p>Lorem ipsum dolor sit amet, ad duo fugit aeque fabulas, in lucilius prodesset pri. Veniam delectus ei vis.</p>
                                    <a href="{{route('site.programmes')}}" class="btn btn-w-border">Explore More</a>
                                </div>
                             </div>-->
                                     
                        </div><!-- end row -->
                    </div><!-- end container -->
                </div><!-- end search-tabs -->
            @endif 
        </section><!-- end flexslider-container -->

        @if(Config::get('app.locale') == 'ar')
             <!--======================= BEST FEATURES ======================-->
            <section id="best-features" class="banner-padding lightgrey-features">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 col-md-3">
                            <div class="b-feature-block">
                                <span><i class="fa fa-plane"></i></span>
                                <h3>الطيران</h3>
                                <p>{{$data->get('flights_ar')}}</p>
                            </div><!-- end b-feature-block -->
                       </div><!-- end columns -->
                       
                       <div class="col-sm-6 col-md-3">
                            <div class="b-feature-block">
                                <span><i class="fa fa-building"></i></span>
                                <h3>الفنادق</h3>
                                <p>{{$data->get('hotels_ar')}}</p>
                            </div><!-- end b-feature-block -->
                       </div><!-- end columns -->
                       
                       <div class="col-sm-6 col-md-3">
                            <div class="b-feature-block">
                                <span><i class="fa fa-bus"></i></span>
                                <h3>البرامج</h3>
                                <p>{{$data->get('programs_ar')}}</p>
                            </div><!-- end b-feature-block -->
                       </div><!-- end columns -->
                       
                       <div class="col-sm-6 col-md-3">
                            <div class="b-feature-block">
                                <span><i class="fa fa-wheelchair"></i></span>
                                <h3>خدمات</h3>
                                <p>{{$data->get('services_ar')}}</p>
                            </div><!-- end b-feature-block -->
                       </div><!-- end columns -->
                    </div><!-- end row -->
                </div><!-- end container -->
            </section><!-- end best-features -->
                         
        @elseif(Config::get('app.locale') == 'en')
            <!--======================= BEST FEATURES ======================-->
            <section id="best-features" class="banner-padding lightgrey-features">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 col-md-3">
                            <div class="b-feature-block">
                                <span><i class="fa fa-plane"></i></span>
                                <h3>Flight</h3>
                                <p>{{$data->get('flights_en')}}</p>
                            </div><!-- end b-feature-block -->
                       </div><!-- end columns -->
                       
                       <div class="col-sm-6 col-md-3">
                            <div class="b-feature-block">
                                <span><i class="fa fa-building"></i></span>
                                <h3>Hotels</h3>
                                <p>{{$data->get('hotels_en')}}</p>
                            </div><!-- end b-feature-block -->
                       </div><!-- end columns -->
                       
                       <div class="col-sm-6 col-md-3">
                            <div class="b-feature-block">
                                <span><i class="fa fa-bus"></i></span>
                                <h3>Programs</h3>
                                <p>{{$data->get('programs_en')}}</p>
                            </div><!-- end b-feature-block -->
                       </div><!-- end columns -->
                       
                       <div class="col-sm-6 col-md-3">
                            <div class="b-feature-block">
                                <span><i class="fa fa-wheelchair"></i></span>
                                <h3>Services</h3>
                                <p>{{$data->get('services_en')}}</p>
                            </div><!-- end b-feature-block -->
                       </div><!-- end columns -->
                    </div><!-- end row -->
                </div><!-- end container -->
            </section><!-- end best-features -->
                    
        @endif       
        
        
        <!--============ NEWSLETTER-2 =============-->
        @if(Config::get('app.locale') == 'ar')
        <section id="newsletter-2" class="newsletter"> 
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
                        <h2>اشــترك فـي القـائـمة الـبريديـــة</h2>	
                    </div>
                    
                    <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
                        <form method="POST" action="{{route('site.subscribe')}}">
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="email" class="form-control input-lg" placeholder="أدخل بريدك الكتروني" name="subscribe"/>
                                    <span class="input-group-btn"><button type="submit" class="btn btn-lg"><i class="fa fa-envelope"></i></button></span>
                                </div>
                            </div>
                        </form>
                    </div><!-- end columns -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section><!-- end newsletter-2 -->
        @elseif(Config::get('app.locale') == 'en')
        <section id="newsletter-2" class="newsletter"> 
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
                            <h2>Subscribe</h2>	
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
                            <form method="POST" action="{{route('site.subscribe')}}">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="email" class="form-control input-lg" placeholder="Enter yor email address" name="subscribe"/>
                                        <span class="input-group-btn"><button type="submit" class="btn btn-lg"><i class="fa fa-envelope"></i></button></span>
                                    </div>
                                </div>
                                {{ csrf_field() }}
                            </form>
                        </div><!-- end columns -->
                    </div><!-- end row -->
                </div><!-- end container -->
            </section><!-- end newsletter-2 -->
        @endif
        <!--======================= FOOTER =======================-->
        <section id="footer" class="ftr-heading-o ftr-heading-mgn-1">

                <div id="footer-top" class="banner-padding ftr-top-grey ftr-text-white">
                    <div class="container">
                        <div class="row">
                            @if(Config::get('app.locale') == 'ar')
                            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 footer-widget ftr-about">
                                <h3 class="footer-heading">عن الموقع</h3>
                                <p>{{$data->get('f_content_ar')}}</p>
                                <ul class="social-links list-inline list-unstyled">
                                    <li><a href="{{$contact->get('facebook')}}"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="{{$contact->get('twitter')}}"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="{{$contact->get('instagram')}}"><i class="fa fa-instagram"></i></a></li>
                                    <li><a href="{{$contact->get('linkedin')}}"><i class="fa fa-linkedin"></i></a></li>
                                </ul>
                            </div><!-- end columns -->
            
                            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 footer-widget ftr-links ftr-pad-left">
                                <h3 class="footer-heading">روابط مختصرة</h3>
                                <ul class="list-unstyled">
                                    <li class="@if(Route::currentRouteName()=='site.home') active @endif"><a href="{{route('site.home')}}">الرئيسية</a></li>
                                    <li class="@if(Route::currentRouteName()=='site.about') active @endif"><a href="{{route('site.about')}}">من نحن</a></li>
                                    <li class="@if(Route::currentRouteName()=='site.umratak') active @endif"><a href="{{route('site.umratak')}}">مايكروس عمرة</a></li>
                                    <li class="@if(Route::currentRouteName()=='site.programmes') active @endif"><a href="{{route('site.programmes')}}">البرامج السياحية</a></li>
                                    <li class="@if(Route::currentRouteName()=='site.hotels') active @endif"><a href="{{route('site.hotels')}}">الفنادق</a></li>
                                    <li class="@if(Route::currentRouteName()=='site.services') active @endif"><a href="{{route('site.services')}}">خدماتنا</a></li>
                                </ul>
                            </div><!-- end columns -->
            
                            <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2 footer-widget ftr-links">
                                <h3 class="footer-heading">روابط مختصرة</h3>
                                <ul class="list-unstyled">
                                    <li class="@if(Route::currentRouteName()=='site.home') active @endif"><a href="{{route('site.home')}}">الرئيسية</a></li>
                                    <li class="@if(Route::currentRouteName()=='site.about') active @endif"><a href="{{route('site.about')}}">من نحن</a></li>
                                    <li class="@if(Route::currentRouteName()=='site.umratak') active @endif"><a href="{{route('site.umratak')}}">مايكروس عمرة</a></li>
                                    <li class="@if(Route::currentRouteName()=='site.programmes') active @endif"><a href="{{route('site.programmes')}}">البرامج السياحية</a></li>
                                    <li class="@if(Route::currentRouteName()=='site.hotels') active @endif"><a href="{{route('site.hotels')}}">الفنادق</a></li>
                                    <li class="@if(Route::currentRouteName()=='site.services') active @endif"><a href="{{route('site.services')}}">خدماتنا</a></li>
                                </ul>
                            </div><!-- end columns -->
                            @elseif(Config::get('app.locale') == 'en')
                            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 footer-widget ftr-about">
                                <h3 class="footer-heading">About Us</h3>
                                <p>{{$data->get('f_content_en')}}</p>
                                <ul class="social-links list-inline list-unstyled">
                                    <li><a href="{{$contact->get('facebook')}}"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="{{$contact->get('twitter')}}"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="{{$contact->get('instagram')}}"><i class="fa fa-instagram"></i></a></li>
                                    <li><a href="{{$contact->get('linkedin')}}"><i class="fa fa-linkedin"></i></a></li>
                                </ul>
                                
                            </div><!-- end columns -->
            
                            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 footer-widget ftr-links ftr-pad-left">
                                <h3 class="footer-heading">Short Links</h3>
                                <ul class="list-unstyled">
                                    <li class="@if(Route::currentRouteName()=='site.home') active @endif"><a href="{{route('site.home')}}">Home</a></li>
                                    <li class="@if(Route::currentRouteName()=='site.about') active @endif"><a href="{{route('site.about')}}">About Us</a></li>
                                    <li class="@if(Route::currentRouteName()=='site.umratak') active @endif"><a href="{{route('site.umratak')}}">Maikros Umrah</a></li>
                                    <li class="@if(Route::currentRouteName()=='site.programmes') active @endif"><a href="{{route('site.programmes')}}">Programmes</a></li>
                                    <li class="@if(Route::currentRouteName()=='site.hotels') active @endif"><a href="{{route('site.hotels')}}">Hotels</a></li>
                                    <li class="@if(Route::currentRouteName()=='site.services') active @endif"><a href="{{route('site.services')}}">Services</a></li>
                                </ul>
                            </div><!-- end columns -->
            
                            <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2 footer-widget ftr-links">
                                <h3 class="footer-heading">Short Links</h3>
                                <ul class="list-unstyled">
                                    <li class="@if(Route::currentRouteName()=='site.home') active @endif"><a href="{{route('site.home')}}">Home</a></li>
                                    <li class="@if(Route::currentRouteName()=='site.about') active @endif"><a href="{{route('site.about')}}">About Us</a></li>
                                    <li class="@if(Route::currentRouteName()=='site.umratak') active @endif"><a href="{{route('site.umratak')}}">Maikros Umrah</a></li>
                                    <li class="@if(Route::currentRouteName()=='site.programmes') active @endif"><a href="{{route('site.programmes')}}">Programmes</a></li>
                                    <li class="@if(Route::currentRouteName()=='site.hotels') active @endif"><a href="{{route('site.hotels')}}">Hotels</a></li>
                                    <li class="@if(Route::currentRouteName()=='site.services') active @endif"><a href="{{route('site.services')}}">Services</a></li>
                                </ul>
                            </div><!-- end columns -->
                            @endif
                            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 footer-widget ftr-contact">
                                @if(Config::get('app.locale') == 'ar')
                                <h3 class="footer-heading">معلومات الاتصال</h3>
                                @elseif(Config::get('app.locale') == 'en')
                                <h3 class="footer-heading">Contact Info</h3>
                                @endif
                                <ul class="list-unstyled">
                                    <li><span><i class="fa fa-phone"></i></span>{{$contact->get('phone')}}</li>
                                    @if(Config::get('app.locale') == 'ar')
                                    <li><span><i class="fa fa-map-marker"></i></span>{{$contact->get('address_ar')}}</li>                               
                                    @elseif(Config::get('app.locale') == 'en')
                                    <li><span><i class="fa fa-map-marker"></i></span>{{$contact->get('address_en')}}</li> 
                                    @endif
                                    <li><span><i class="fa fa-envelope"></i></span>{{$contact->get('email')}}</li>
                                </ul>
                                <br>
                                @if(Config::get('app.locale') == 'ar')
                                <a href="#" class="btn btn-o-border"><i class="fa fa-plus"></i> أضف فندقك </a>
                                @elseif(Config::get('app.locale') == 'en')
                                <a href="#" class="btn btn-o-border"><i class="fa fa-plus"></i> Add Hotel </a>
                                @endif
                                
                            </div><!-- end columns -->
                        </div><!-- end row -->
                    </div><!-- end container -->
                </div><!-- end footer-top -->
                @if(Config::get('app.locale') == 'ar')
                <div id="footer-bottom" class="ftr-bot-black">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" id="copyright">
                                <p>© 2019 جميع الحقوق محفوظة لموقع <a href="#">مايكروس عمرة</a></p>
                            </div><!-- end columns -->
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" id="terms">
                                <ul class="list-unstyled list-inline">
                                    <li><a href="#">الشروط والأحكام</a></li>
                                    <li><a href="#">حقوق الملكية</a></li>
                                </ul>
                            </div><!-- end columns -->
                        </div><!-- end row -->
                    </div><!-- end container -->
                </div><!-- end footer-bottom -->
                @elseif(Config::get('app.locale') == 'en')                        
                <div id="footer-bottom" class="ftr-bot-black">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" id="copyright">
                                    <p>© All rights reserved 2019, Maikros Umrah.</p>
                            </div><!-- end columns -->
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" id="terms">
                                <ul class="list-unstyled list-inline">
                                    <li><a href="#">Terms & Condition</a></li>
                                    <li><a href="#">Privacy Policy</a></li>
                                </ul>
                            </div><!-- end columns -->
                        </div><!-- end row -->
                    </div><!-- end container -->
                </div><!-- end footer-bottom -->
                @endif
            </section><!-- end footer -->
            @if (!Auth::guard('members')->check())
            @if(Config::get('app.locale') == 'ar')
            <div id="popup-one" class="modal fade in popup-auto guest-modal" role="dialog" data-replace="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body pding">
                            <button type="button" class="close" data-dismiss="modal">×</button>
                            <div class="row">
                                <div class="col-xs-12 col-sm-6">
                                    <div class="popup-auto-text">
                                        <h4>قبل البدء في </h4>
                                        <h2><span>صمم</span> عمرتك</h2>
                                        <h4>يفضل التسجيل اولاً</h4>
                                        <p>{{$data->get('contact_ar')}}</p>
                                        <a href="#" class="btn btn-orange" data-dismiss="modal">تابع كضيف</a>
                                        <a href="#" class="btn btn-orange" data-dismiss="modal" data-toggle="modal" data-target="#popup-two">تسجيل الدخول</a>
                                    </div><!-- end popup-auto-text -->
                                </div><!-- end columns -->
                                
                                <div class="col-xs-12 col-sm-6">
                                    <div class="popup-auto-img">
                                        <img src="{{asset('vendors/site/EN/images/about-content-3.png')}}" class="img-responsive"> 
                                    </div><!-- end popup-auto-img -->
                                </div><!-- end columns -->
                            </div><!-- end row -->
                            
                        </div><!-- end modal-bpdy -->
                    </div><!-- end modal-content -->
                </div><!-- end modal-dialog -->
            </div>

            <div id="popup-two" class="modal fade in popup-auto guest-modal" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        
                        <div class="modal-body">
                            <button type="button" class="close" data-dismiss="modal">×</button>
                            
                            <div class="custom-form custom-form-fields">
                                <h3>تسجيل الدخول</h3>
                                <p>{{$data->get('contact_ar')}}</p>
                                <form method="POST" class="login-form" action="{{ route('site.guestlogin') }}">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <select class="form-control" name="type" id="type">
                                            <option value="user" selected>زائر</option>
                                            <option value="hotel">فندق</option>
                                            <option value="multi">شركة سياحة</option>
                                            <option value="company">شركة برامج سياحية</option>
                                            <option value="services">شركة خدمات سياحية</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="اسم المستخدم" name="username">
                                        <span><i class="fa fa-user"></i></span>
                                    </div>
                                    
                                    <div class="form-group">
                                        <input type="password" class="form-control" placeholder="كلمة المرور" name="password">
                                        <span><i class="fa fa-lock"></i></span>
                                    </div>
                                    
                                    <div class="checkbox">
                                        <label><input type="checkbox"> تذكرني</label>
                                    </div>
                                    
                                    <button type="submit" class="btn btn-orange btn-block">دخول</button>
                                </form>
                                
                                <div class="other-links">
                                    <p class="link-line">انشاء حساب جديد ؟ <a href="#" data-dismiss="modal" data-toggle="modal" data-target="#popup-three"> تسجيل </a></p>
                                    <a class="simple-link" href="{{route('site.forget')}}">هل نسيت كلمة المرور ؟</a>
                                    <div class="alerts-success" style="display: none; color: #000000;"><span style="color: #000000;" class="element2" role="alert">تم تسجيل الدخول بنجاح</span></div>
                                    <div class="alerts-danger" style="display: none; color: #000000;"><span style="color: #000000;" class="element2" role="alert">حدث خطأ , يرجى اعادة المحاولة</span></div>
                                </div><!-- end other-links -->
                            </div>
                            
                        </div><!-- end modal-bpdy -->
                    </div><!-- end modal-content -->
                </div><!-- end modal-dialog -->
            </div>

            <div id="popup-three" class="modal fade in popup-auto guest-modal" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        
                        <div class="modal-body">
                            <button type="button" class="close" data-dismiss="modal">×</button>
                            
                            <div class="custom-form custom-form-fields">
                                <h3>انشاء حساب جديد</h3>
                                <p>{{$data->get('contact_ar')}}</p>
                                <form id="register_form" method="post">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <select class="form-control" name="type" id="type">
                                            <option value="user" selected>زائر</option>
                                            <option value="hotel">فندق</option>
                                            <option value="multi">شركة سياحة</option>
                                            <option value="company">شركة برامج سياحية</option>
                                            <option value="services">شركة خدمات سياحية</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="اسم المستخدم" name="username">
                                        <span><i class="fa fa-user"></i></span>
                                    </div>

                                    <div class="form-group">
                                        <input type="email" class="form-control" placeholder="البريدالالكتروني" name="email">
                                        <span><i class="fa fa-envelope"></i></span>
                                    </div>
                                    
                                    <div class="form-group">
                                        <input type="password" class="form-control" placeholder="كلمة المرور" name="password">
                                        <span><i class="fa fa-lock"></i></span>
                                    </div>
                                    
                                    <button type="submit" class="btn btn-orange btn-block">تسجيل</button>
                                </form>
                                
                                <div class="other-links">
                                    <p class="link-line">هل لديك حساب بالفعل ؟ <a href="#" data-dismiss="modal" data-toggle="modal" data-target="#popup-two">دخول</a></p>
                                </div><!-- end other-links -->
                            </div>
                            
                        </div><!-- end modal-bpdy -->
                    </div><!-- end modal-content -->
                </div><!-- end modal-dialog -->
            </div>
            @elseif(Config::get('app.locale') == 'en')
            <div id="popup-one" class="modal fade in popup-auto guest-modal" role="dialog" data-replace="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-body pding">
                                <button type="button" class="close" data-dismiss="modal">×</button>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-6">
                                        <div class="popup-auto-text">
                                            <h4>Before going to </h4>
                                            <h2><span>Umrah</span> Packages</h2>
                                            <h4>you have to login first</h4>
                                            <p>{{$data->get('contact_en')}}</p>
                                            <a href="#" class="btn btn-orange" data-dismiss="modal">Continue As A Guest</a>
                                            <a href="#" class="btn btn-orange" data-dismiss="modal" data-toggle="modal" data-target="#popup-two">تسجيل الدخول</a>
                                        </div><!-- end popup-auto-text -->
                                    </div><!-- end columns -->
                                    
                                    <div class="col-xs-12 col-sm-6">
                                        <div class="popup-auto-img">
                                            <img src="{{asset('vendors/site/EN/images/about-content-3.png')}}" class="img-responsive"> 
                                        </div><!-- end popup-auto-img -->
                                    </div><!-- end columns -->
                                </div><!-- end row -->
                                
                            </div><!-- end modal-bpdy -->
                        </div><!-- end modal-content -->
                    </div><!-- end modal-dialog -->
                </div>
    
                <div id="popup-two" class="modal fade in popup-auto guest-modal" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            
                            <div class="modal-body">
                                <button type="button" class="close" data-dismiss="modal">×</button>
                                
                                <div class="custom-form custom-form-fields">
                                    <h3>Sign In</h3>
                                    <p>{{$data->get('contact_en')}}</p>
                                    <form method="POST" class="login-form" action="{{ route('site.guestlogin') }}">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <select class="form-control" name="type" id="type">
                                                <option value="user" selected>Visitor</option>
                                                <option value="hotel">Hotel</option>
                                                <option value="multi">Company Of Tourism</option>
                                                <option value="company">Company Of Tourist Programs</option>
                                                <option value="services">Company Of Tourist Services</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="UserName" name="username">
                                            <span><i class="fa fa-user"></i></span>
                                        </div>
                                        
                                        <div class="form-group">
                                            <input type="password" class="form-control" placeholder="Password" name="password">
                                            <span><i class="fa fa-lock"></i></span>
                                        </div>
                                        
                                        <div class="checkbox">
                                            <label><input type="checkbox"> Remember me</label>
                                        </div>
                                        
                                        <button type="submit" class="btn btn-orange btn-block">دخول</button>
                                    </form>
                                    
                                    <div class="other-links">
                                        <p class="link-line">create new account ?<a href="#" data-dismiss="modal" data-toggle="modal" data-target="#popup-three"> Login </a></p>
                                        <a class="simple-link" href="{{route('site.forget')}}">Forgot Password ?</a>
                                        <div class="alerts-success" style="display: none; color: #000000;"><span style="color: #000000;" class="element2" role="alert">Now you are logged in</span></div>
                                        <div class="alerts-danger" style="display: none; color: #000000;"><span style="color: #000000;" class="element2" role="alert">Error , Something went wrong!</span></div>
                                    </div><!-- end other-links -->
                                </div>
                                
                            </div><!-- end modal-bpdy -->
                        </div><!-- end modal-content -->
                    </div><!-- end modal-dialog -->
                </div>
    
                <div id="popup-three" class="modal fade in popup-auto guest-modal" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            
                            <div class="modal-body">
                                <button type="button" class="close" data-dismiss="modal">×</button>
                                
                                <div class="custom-form custom-form-fields">
                                    <h3>Create New Account</h3>
                                    <p>{{$data->get('contact_en')}}</p>
                                    <form id="register_form" method="post">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <select class="form-control" name="type" id="type">
                                                <option value="user" selected>Visitor</option>
                                                <option value="hotel">Hotel</option>
                                                <option value="multi">Company Of Tourism</option>
                                                <option value="company">Company Of Tourist Programs</option>
                                                <option value="services">Company Of Tourist Services</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                             <input type="text" class="form-control" placeholder="Name"  name="name"/>
                                             <span><i class="fa fa-user"></i></span>
                                        </div>
                                        <div class="form-group">
                                             <input type="email" class="form-control" placeholder="Email"  name="email"/>
                                             <span><i class="fa fa-user"></i></span>
                                        </div>
                                        <div class="form-group">
                                             <input type="text" class="form-control" placeholder="UserName"  name="username"/>
                                             <span><i class="fa fa-user"></i></span>
                                        </div>
                                        
                                        <div class="form-group">
                                             <input type="password" class="form-control" placeholder="Password"  name="password"/>
                                             <span><i class="fa fa-lock"></i></span>
                                        </div>
                                        
                                        <button type="submit" class="btn btn-orange btn-block">Register</button>
                                    </form>
                                    <div class="other-links">
                                    	<p class="link-line">Do you have account ?   <a href="#" data-dismiss="modal" data-toggle="modal" data-target="#popup-two">Login</a></p>
                                    </div>
                                </div>
                            </div><!-- end modal-bpdy -->
                        </div><!-- end modal-content -->
                    </div><!-- end modal-dialog -->
                </div>
            @endif
            @endif
            <div class='payemnt-info'>
                <div class='foo'><i class="fa fa-window-close"></i></div>
                <div class='room-info'></div>
            </div>    
        <!-- Page Scripts Starts -->
        <script src="{{asset('vendors/site/EN/js/jquery.min.js')}}"></script>
        <script src="{{asset('vendors/site/EN/js/jquery.magnific-popup.min.js')}}"></script>
        <script src="{{asset('vendors/site/EN/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('vendors/site/EN/js/jquery.flexslider.js')}}"></script>
        <script src="{{asset('vendors/site/EN/js/bootstrap-datepicker.js')}}"></script>
        <script src="{{asset('vendors/site/EN/js/owl.carousel.min.js')}}"></script>
        <script src="{{asset('vendors/site/EN/js/custom-navigation.js')}}"></script>
        <script src="{{asset('vendors/site/EN/js/custom-flex.js')}}"></script>
        <script src="{{asset('vendors/site/EN/js/custom-owl.js')}}"></script>
        <script src="{{asset('vendors/site/EN/js/custom-date-picker.js')}}"></script>
        <script src="{{asset('vendors/site/EN/js/custom-gallery.js')}}"></script>
        <script src="{{asset('vendors/site/EN/js/jquery.bootstrap.wizard.min.js')}}"></script>
        <script src="{{asset('vendors/toastr/toastr.min.js')}}"></script>
        <script>
            $(document).ready(function() {
                $('#rootwizard').bootstrapWizard({onTabShow: function(tab, navigation, index) {
                    var $total = navigation.find('li').length;
                    var $current = index+1;
                    var $percent = ($current/$total) * 100;
                    $('#rootwizard').find('.bar').css({width:$percent+'%'});
                }});
            });
        </script>
        @if(Config::get('app.locale') == 'ar')
        <script src="{{asset('vendors/site/AR/js/umratk.js')}}"></script>
        @elseif(Config::get('app.locale') == 'en')
        <script src="{{asset('vendors/site/EN/js/umratk.js')}}"></script>
        @endif
        <!-- Page Scripts Ends -->
        <script src="{{asset('vendors/js/jquery.nicescroll.min.js')}}"></script>
        
        <script type="text/javascript">
            /* Nice Scroll */
            $(document).ready(function() {

                "use strict";

                $("html").niceScroll({
                    scrollspeed: 60,
                    mousescrollstep: 35,
                    cursorwidth: 5,
                    cursorcolor: '#faa61a',
                    cursorborder: 'none',
                    background: '#faa61a59',
                    cursorborderradius: 3,
                    autohidemode: false,
                    cursoropacitymin: 0.1,
                    cursoropacitymax: 1,
                    zindex: "999",
                    horizrailenabled: false
                });

            });
        </script>
        <script src="{{asset('vendors/login/js/jquery.validate.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('vendors/login/js/login.js')}}" type="text/javascript"></script>
        <script>
            $('#adults').on('change',function(e){
                var adult = e.target.value;
                var child = 9 - adult;
                $('#children').empty();
                $('#children').append('<option>             </option>');
                for (let index = 1; index <= child; index++) {
                    
                    $('#children').append('<option value="'+index+'">'+index+'</option>');
                    
                }
            });
        </script>
        <script>
            $(document).ready(function() {
                $(window).on('load',function(){
                    setTimeout(function(){
                        $('#popup-one').modal('show');
                    }, 1000);
                });		
            });
        </script>
        @if(Config::get('app.locale') == 'en')
        <script type="text/javascript">
            $(document).ready(function() {
        
                $('#login_form').on('submit', function(event){
                    event.preventDefault();
                    $.ajax({
                        url:"{{ route('site.guestlogin') }}",
                        method:"POST",
                        data:new FormData(this),
                        dataType:"json",
                        cache: false,
                        contentType : false,
                        processData: false,
                        success:function(data)
                        {
                            if(data.error.length > 0)
                            {
                                var error_html = '';
                                for(var count = 0; count < data.error.length; count++)
                                {
                                    toastr.error(data.error[count], 'Error!', {timeOut: 3000});
                                }
                            }
                            else
                            {
                                toastr.info('Now You Are Logged In.', 'Success!', {timeOut: 3000});
                                location.reload();                       
                            }
                        }
                    })
                });
            });
        </script>
        <script type="text/javascript">
            $(document).ready(function() {
        
                $('#register_form').on('submit', function(event){
                    event.preventDefault();
                    $.ajax({
                        url:"{{ route('site.guestRegister') }}",
                        method:"POST",
                        data:new FormData(this),
                        dataType:"json",
                        cache: false,
                        contentType : false,
                        processData: false,
                        success:function(data)
                        {
                            if(data.error.length > 0)
                            {
                                var error_html = '';
                                for(var count = 0; count < data.error.length; count++)
                                {
                                    toastr.error(data.error[count], 'Error!', {timeOut: 3000});
                                }
                            }
                            else
                            {
                                toastr.info('Now You Are Logged In.', 'Success!', {timeOut: 5000});
                                $('#popup-three').modal('hide');
                                $('#popup-two').modal('show');                        
                            }
                        }
                    })
                });
            });
        </script>
        @elseif(Config::get('app.locale') == 'ar')
        <script type="text/javascript">
            $(document).ready(function() {
        
                $('#login_form').on('submit', function(event){
                    event.preventDefault();
                    $.ajax({
                        url:"{{ route('site.guestlogin') }}",
                        method:"POST",
                        data:new FormData(this),
                        dataType:"json",
                        cache: false,
                        contentType : false,
                        processData: false,
                        success:function(data)
                        {
                            if(data.error.length > 0)
                            {
                                var error_html = '';
                                for(var count = 0; count < data.error.length; count++)
                                {
                                    toastr.error(data.error[count], 'خطأ!', {timeOut: 3000});
                                }
                            }
                            else
                            {
                                toastr.success('تم تسجيل الدخول بنجاح', 'تم!', {timeOut: 3000});
                                location.reload();
                                
                            }
                        }
                    })
                });
            });
        </script>
        <script type="text/javascript">
            $(document).ready(function() {
        
                $('#register_form').on('submit', function(event){
                    event.preventDefault();
                    $.ajax({
                        url:"{{ route('site.guestRegister') }}",
                        method:"POST",
                        data:new FormData(this),
                        dataType:"json",
                        cache: false,
                        contentType : false,
                        processData: false,
                        success:function(data)
                        {
                            if(data.error.length > 0)
                            {
                                var error_html = '';
                                for(var count = 0; count < data.error.length; count++)
                                {
                                    toastr.error(data.error[count], 'خطأ!', {timeOut: 3000});
                                }
                            }
                            else
                            {
                                toastr.success('تم تسجيل الدخول بنجاح', 'تم!', {timeOut: 5000});
                                $('#popup-three').modal('hide');
                                $('#popup-two').modal('show');
                            }
                        }
                    })
                });
            });
        </script>
        @endif
    </body>
</html>