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
    <body id="main-homepage">
        
        <!--====== LOADER =====-->
        <div class="loader"></div>
        @if(Config::get('app.locale') == 'ar')
        <!--======== SEARCH-OVERLAY =========-->       
        <div class="overlay">
            <a href="javascript:void(0)" id="close-button" class="closebtn">&times;</a>
            <div class="overlay-content">
                <div class="form-center">
                        <form method="GET" action="{{route('site.hotelSearch')}}">
                        <div class="form-group">
                            <div class="input-group">
                                <input name="hotel" type="text" class="form-control" placeholder="ابحث هنا....." required />
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
                        <form method="GET" action="{{route('site.hotelSearch')}}">
                        <div class="form-group">
                            <div class="input-group">
                                <input name="hotel" type="text" class="form-control" placeholder="Search Here....." required />
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
                            @endif
                        </div><!-- end navbar-header -->
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
                    @if(Config::get('app.locale') == 'ar')
                    <li class="item-{{$loop->index +1}} back-size" style="background: linear-gradient(rgba(0,0,0,0.6),rgba(0,0,0,0.6)),url({{asset('storage/uploads/slider/'.$slider->image)}}) 50% 15%; background-size:cover; height:100%;">
                        <div class="meta">         
                            <div class="container">
                                    <span class="highlight-price highlight-2">{{$slider->head_ar}}</span>
                                    <h2>{{$slider->title_ar}}</h2>
                                    <p>{{$slider->content_ar}}</p>
                            </div><!-- end container -->  
                        </div><!-- end meta -->
                    </li><!-- end item-1 -->
                    @elseif(Config::get('app.locale') == 'en')
                    <li class="item-{{$loop->index +1}} back-size" style="background: linear-gradient(rgba(0,0,0,0.6),rgba(0,0,0,0.6)),url({{asset('storage/uploads/slider/'.$slider->image)}}) 50% 15%; background-size:cover; height:100%;">
                        <div class=" meta">        
                            <div class="container">
                                <span class="highlight-price highlight-2">{{$slider->head_en}}</span>
                                <h2>{{$slider->title_en}}</h2>
                                <p>{{$slider->content_en}}</p>
                            </div><!-- end container -->  
                        </div><!-- end meta -->
                    </li><!-- end item-2 -->
                    @endif
                    @endforeach
                </ul>
            </div><!-- end slider -->  
            @if(Config::get('app.locale') == 'ar')
            <div class="search-tabs" id="search-tabs-1">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                            
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#flights" data-toggle="tab"><img src="{{asset('vendors/site/EN/images/hajj.png')}}" alt="" /> <span class="st-text">مكة</span></a></li>
                                    <li><a href="#hotels" data-toggle="tab"><img src="{{asset('vendors/site/EN/images/umrah.png')}}" alt="" /> <span class="st-text">المدينة</span></a></li>
                                    <li><a href="#tours" data-toggle="tab"><img src="{{asset('vendors/site/EN/images/ziarat.png')}}" alt="" /> <span class="st-text">جدة</span></a></li>
                                </ul>
            
                                <div class="tab-content">
    
                                    <div id="flights" class="tab-pane in active">
                                            <form method="GET" action="{{route('site.hotelSearch')}}">
                                                <input type="hidden" class="form-control" name="hotel" value="مكة">
                                            <div class="row">
    
                                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-5">
                                                    <div class="row">
                                                        
                                                        <div class="col-xs-12 col-sm-6 col-md-6">
                                                            <div class="form-group left-icon">
                                                                <input type="text" class="form-control dpd1" placeholder="التاريخ من" >
                                                                <i class="fa fa-calendar"></i>
                                                            </div>
                                                        </div><!-- end columns -->
                                                        
                                                        <div class="col-xs-12 col-sm-6 col-md-6">
                                                            <div class="form-group left-icon">
                                                                <input type="text" class="form-control dpd2" placeholder="التاريخ إلى" >
                                                                <i class="fa fa-calendar"></i>
                                                            </div>
                                                        </div><!-- end columns -->
            
                                                    </div><!-- end row -->								
                                                </div><!-- end columns -->
                                                
                                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-5">
                                                    <div class="row">
                                                        <div class="col-xs-12 col-sm-6 col-md-6">
                                                            <div class="form-group left-icon">
                                                                <input type="number" class="form-control" name="number" placeholder="عدد الأيام">
                                                            </div>
                                                        </div><!-- end columns -->
                                                        <div class="col-xs-12 col-sm-6 col-md-6">
                                                            <div class="form-group right-icon">
                                                                <input type="number" class="form-control" name="rooms" placeholder="عدد الغرف">
                                                            </div>
                                                        </div><!-- end columns -->
                                                    </div><!-- end row -->								
                                                </div><!-- end columns -->
                                                
                                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-2 search-btn">
                                                    <button type="submit" class="btn btn-orange">ابحث هنا</button>
                                                </div><!-- end columns -->
                                                
                                            </div><!-- end row -->
                                        </form>
                                    </div><!-- end flights -->
                                    
                                    <div id="hotels" class="tab-pane">
                                            <form method="GET" action="{{route('site.hotelSearch')}}">
                                                    <input type="hidden" class="form-control" name="hotel" value="المدينة">
                                            <div class="row">
    
                                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-5">
                                                    <div class="row">
                                                    
                                                        <div class="col-xs-12 col-sm-6 col-md-6">
                                                            <div class="form-group left-icon">
                                                                <input type="text" class="form-control dpd1" placeholder="التاريخ من" >
                                                                <i class="fa fa-calendar"></i>
                                                            </div>
                                                        </div><!-- end columns -->
                                                        
                                                        <div class="col-xs-12 col-sm-6 col-md-6">
                                                            <div class="form-group left-icon">
                                                                <input type="text" class="form-control dpd2" placeholder="التاريخ إلى" >
                                                                <i class="fa fa-calendar"></i>
                                                            </div>
                                                        </div><!-- end columns -->
            
                                                    </div><!-- end row -->								
                                                </div><!-- end columns -->
                                                
                                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-5">
                                                    <div class="row">
                                                        <div class="col-xs-12 col-sm-6 col-md-6">
                                                            <div class="form-group left-icon">
                                                                <input type="number" class="form-control" name="number" placeholder="عدد الأيام">
                                                            </div>
                                                        </div><!-- end columns -->
                                                        <div class="col-xs-12 col-sm-6 col-md-6">
                                                            <div class="form-group right-icon">
                                                                <input type="number" class="form-control" name="rooms" placeholder="عدد الغرف">
                                                            </div>
                                                        </div><!-- end columns -->
                                                    </div><!-- end row -->								
                                                </div><!-- end columns -->
                                                
                                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-2 search-btn">
                                                    <button type="submit" class="btn btn-orange">ابحث هنا</button>
                                                </div><!-- end columns -->
                                                
                                            </div><!-- end row -->
                                        </form>
                                    </div><!-- end hotels -->
    
                                    <div id="tours" class="tab-pane">
                                            <form method="GET" action="{{route('site.hotelSearch')}}">
                                                    <input type="hidden" class="form-control" name="hotel" value="جدة">
                                            <div class="row">
    
                                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-5">
                                                    <div class="row">
                                                    
                                                        <div class="col-xs-12 col-sm-6 col-md-6">
                                                            <div class="form-group left-icon">
                                                                <input type="text" class="form-control dpd1" placeholder="التاريخ من" >
                                                                <i class="fa fa-calendar"></i>
                                                            </div>
                                                        </div><!-- end columns -->
                                                        
                                                        <div class="col-xs-12 col-sm-6 col-md-6">
                                                            <div class="form-group left-icon">
                                                                <input type="text" class="form-control dpd2" placeholder="التاريخ إلى" >
                                                                <i class="fa fa-calendar"></i>
                                                            </div>
                                                        </div><!-- end columns -->
            
                                                    </div><!-- end row -->								
                                                </div><!-- end columns -->
                                                    
                                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-5">
                                                    <div class="row">
                                                        <div class="col-xs-12 col-sm-6 col-md-6">
                                                            <div class="form-group left-icon">
                                                                    <input type="number" class="form-control" name="number" placeholder="عدد الأيام">
                                                            </div>
                                                        </div><!-- end columns -->
                                                        <div class="col-xs-12 col-sm-6 col-md-6">
                                                            <div class="form-group right-icon">
                                                                    <input type="number" class="form-control" name="rooms" placeholder="عدد الغرف">
                                                            </div>
                                                        </div><!-- end columns -->
                                                    </div><!-- end row -->								
                                                </div><!-- end columns -->
                                                
                                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-2 search-btn">
                                                    <button type="submit" class="btn btn-orange">ابحث هنا</button>
                                                </div><!-- end columns -->
                                                
                                            </div><!-- end row -->
                                        </form>
                                    </div><!-- end tours -->
                                    
                                </div><!-- end tab-content -->
                                
                            </div><!-- end columns -->
                        </div><!-- end row -->
                    </div><!-- end container -->
                </div><!-- end search-tabs -->                             
            @elseif(Config::get('app.locale') == 'en')
            <div class="search-tabs" id="search-tabs-1">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                            
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#flights" data-toggle="tab"><img src="{{asset('vendors/site/EN/images/hajj.png')}}" alt="" /> <span class="st-text">Mekkah</span></a></li>
                                    <li><a href="#hotels" data-toggle="tab"><img src="{{asset('vendors/site/EN/images/umrah.png')}}" alt="" /> <span class="st-text">Al Madenah</span></a></li>
                                    <li><a href="#tours" data-toggle="tab"><img src="{{asset('vendors/site/EN/images/ziarat.png')}}" alt="" /> <span class="st-text">Jeddah</span></a></li>
                                </ul>
            
                                <div class="tab-content">
    
                                    <div id="flights" class="tab-pane in active">
                                            <form method="GET" action="{{route('site.hotelSearch')}}">
                                                    <input type="hidden" class="form-control" name="hotel" value="Mekkah">
                                            <div class="row">
    
                                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-5">
                                                    <div class="row">
                                                    
                                                        <div class="col-xs-12 col-sm-6 col-md-6">
                                                            <div class="form-group left-icon">
                                                                <input type="text" class="form-control dpd1" placeholder="From" >
                                                                <i class="fa fa-calendar"></i>
                                                            </div>
                                                        </div><!-- end columns -->
                                                        
                                                        <div class="col-xs-12 col-sm-6 col-md-6">
                                                            <div class="form-group left-icon">
                                                                <input type="text" class="form-control dpd2" placeholder="To" >
                                                                <i class="fa fa-calendar"></i>
                                                            </div>
                                                        </div><!-- end columns -->
            
                                                    </div><!-- end row -->								
                                                </div><!-- end columns -->
                                                
                                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-5">
                                                    <div class="row">
                                                        <div class="col-xs-12 col-sm-6 col-md-6">
                                                            <div class="form-group left-icon">
                                                                <input type="number" class="form-control" name="number" placeholder="Number Of Days">
                                                            </div>
                                                        </div><!-- end columns -->
                                                        <div class="col-xs-12 col-sm-6 col-md-6">
                                                            <div class="form-group right-icon">
                                                                <input type="number" class="form-control" name="rooms" placeholder="Number Of Rooms">
                                                            </div>
                                                        </div><!-- end columns -->
                                                    </div><!-- end row -->								
                                                </div><!-- end columns -->
                                                
                                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-2 search-btn">
                                                    <button type="submit" class="btn btn-orange">Search</button>
                                                </div><!-- end columns -->
                                                
                                            </div><!-- end row -->
                                        </form>
                                    </div><!-- end flights -->
                                    
                                    <div id="hotels" class="tab-pane">
                                            <form method="GET" action="{{route('site.hotelSearch')}}">
                                                    <input type="hidden" class="form-control" name="hotel" value="Madina">
                                            <div class="row">
    
                                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-5">
                                                    <div class="row">
                                                    
                                                        <div class="col-xs-12 col-sm-6 col-md-6">
                                                            <div class="form-group left-icon">
                                                                <input type="text" class="form-control dpd1" placeholder="From" >
                                                                <i class="fa fa-calendar"></i>
                                                            </div>
                                                        </div><!-- end columns -->
                                                        
                                                        <div class="col-xs-12 col-sm-6 col-md-6">
                                                            <div class="form-group left-icon">
                                                                <input type="text" class="form-control dpd2" placeholder="To" >
                                                                <i class="fa fa-calendar"></i>
                                                            </div>
                                                        </div><!-- end columns -->
            
                                                    </div><!-- end row -->								
                                                </div><!-- end columns -->
                                                
                                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-5">
                                                    <div class="row">
                                                        <div class="col-xs-12 col-sm-6 col-md-6">
                                                            <div class="form-group left-icon">
                                                                <input type="number" class="form-control" name="number" placeholder="Number Of Days">
                                                            </div>
                                                        </div><!-- end columns -->
                                                        <div class="col-xs-12 col-sm-6 col-md-6">
                                                            <div class="form-group right-icon">
                                                                <input type="number" class="form-control" name="rooms" placeholder="Number Of Rooms">
                                                            </div>
                                                        </div><!-- end columns -->
                                                    </div><!-- end row -->								
                                                </div><!-- end columns -->
                                                
                                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-2 search-btn">
                                                    <button type="submit" class="btn btn-orange">Search</button>
                                                </div><!-- end columns -->
                                                
                                            </div><!-- end row -->
                                        </form>
                                    </div><!-- end hotels -->
    
                                    <div id="tours" class="tab-pane">
                                            <form method="GET" action="{{route('site.hotelSearch')}}">
                                                    <input type="hidden" class="form-control" name="hotel" value="Jeddah">
                                            <div class="row">
    
                                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-5">
                                                    <div class="row">
                                                    
                                                        <div class="col-xs-12 col-sm-6 col-md-6">
                                                            <div class="form-group left-icon">
                                                                <input type="text" class="form-control dpd1" placeholder="From" >
                                                                <i class="fa fa-calendar"></i>
                                                            </div>
                                                        </div><!-- end columns -->
                                                        
                                                        <div class="col-xs-12 col-sm-6 col-md-6">
                                                            <div class="form-group left-icon">
                                                                <input type="text" class="form-control dpd2" placeholder="To" >
                                                                <i class="fa fa-calendar"></i>
                                                            </div>
                                                        </div><!-- end columns -->
            
                                                    </div><!-- end row -->								
                                                </div><!-- end columns -->
                                                
                                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-5">
                                                    <div class="row">
                                                        <div class="col-xs-12 col-sm-6 col-md-6">
                                                            <div class="form-group left-icon">
                                                                <input type="number" class="form-control" name="number" placeholder="Number Of Days">
                                                            </div>
                                                        </div><!-- end columns -->
                                                        <div class="col-xs-12 col-sm-6 col-md-6">
                                                            <div class="form-group right-icon">
                                                                <input type="number" class="form-control" name="rooms" placeholder="Number Of Rooms">
                                                            </div>
                                                        </div><!-- end columns -->
                                                    </div><!-- end row -->								
                                                </div><!-- end columns -->
                                                                                                
                                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-2 search-btn">
                                                    <button type="submit" class="btn btn-orange">Search</button>
                                                </div><!-- end columns -->
                                                
                                            </div><!-- end row -->
                                        </form>
                                    </div><!-- end tours -->
                                    
                                </div><!-- end tab-content -->
                                
                            </div><!-- end columns -->
                        </div><!-- end row -->
                    </div><!-- end container -->
                </div><!-- end search-tabs -->
            @endif
            
        </section><!-- end flexslider-container -->
        
        <!--=============== HOTEL OFFERS ===============-->
        <section id="hotel-offers" class="section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-heading">
                            @if(Config::get('app.locale') == 'ar')
                            <h2>العروض الأكثر تمييزاً</h2>                              
                            @elseif(Config::get('app.locale') == 'en')
                            <h2>Most featured offers</h2>
                            @endif
                            
                            <hr class="heading-line" />
                        </div><!-- end page-heading -->
                        
                        <div class="owl-carousel owl-theme owl-custom-arrow" id="owl-hotel-offers">
                            @foreach($hotels as $hotel)
                            @if($hotel->best == 1)
                            @if(Config::get('app.locale') == 'ar')
                            <div class="item">
                                <div class="main-block hotel-block">
                                    <div class="main-img">
                                        <a href="{{ route('site.hotel' , ['id' => $hotel->id]) }}">
                                            <img src="{{asset('storage/uploads/hotel/'.$hotel->image)}}" class="img-responsive" alt="hotel-img"  style="max-height: 240px !important; max-width: 361px !important;"/>
                                        </a>
                                        <div class="main-mask">
                                            <ul class="list-unstyled list-inline offer-price-1">
                                                <li class="price">{{$hotel->price}}$</li>
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
                                            <span class="rate-tag"><b>{{$hotel->rate}}</b>التقييم</span>
                                        </div><!-- end arrow -->
                                        
                                        <div class="main-title hotel-title">
                                            <a href="{{ route('site.hotel' , ['id' => $hotel->id]) }}">{{$hotel->hotel_name_ar}}</a>
                                            <p>المكان : {{$hotel->place_name_ar}}</p>
                                            <p>البعد : {{$hotel->far_ar}}</p>
                                            <p>الشارع : {{$hotel->street_ar}}</p>
                                        </div><!-- end hotel-title -->
                                    </div>
                                </div><!-- end hotel-block -->
                            </div><!-- end item -->
                            @elseif(Config::get('app.locale') == 'en')
                            <div class="item">
                                <div class="main-block hotel-block">
                                    <div class="main-img">
                                        <a href="{{ route('site.hotel' , ['id' => $hotel->id]) }}">
                                            <img src="{{asset('storage/uploads/hotel/'.$hotel->image)}}" class="img-responsive" alt="hotel-img"  style="max-height: 240px !important; max-width: 361px !important;"/>
                                        </a>
                                        <div class="main-mask">
                                            <ul class="list-unstyled list-inline offer-price-1">
                                                <li class="price">{{$hotel->price}}$</li>
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
                                            <span class="rate-tag"><b>{{$hotel->rate}}</b>Rate</span>
                                        </div><!-- end arrow -->
                                        
                                        <div class="main-title hotel-title">
                                            <a href="{{ route('site.hotel' , ['id' => $hotel->id]) }}">{{$hotel->hotel_name_en}}</a>
                                            <p>Place : {{$hotel->place_name_en}}</p>
                                            <p>How Far : {{$hotel->far_en}}</p>
                                            <p>Street : {{$hotel->street_en}}</p>
                                        </div><!-- end hotel-title -->
                                    </div>
                                </div><!-- end hotel-block -->
                            </div><!-- end item -->
                            @endif
                            @endif
                            @endforeach
                        </div><!-- end owl-hotel-offers -->
                        @if(Config::get('app.locale') == 'ar')
                        <div class="view-all text-center">
                            <a href="{{route('site.hotels')}}" class="btn btn-orange">كافة العروض</a>
                        </div><!-- end view-all -->
                        @elseif(Config::get('app.locale') == 'en')
                        <div class="view-all text-center">
                            <a href="{{route('site.hotels')}}" class="btn btn-orange">All Offers</a>
                        </div><!-- end view-all -->
                        @endif
                    </div><!-- end columns -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section><!-- end hotel-offers -->

        <section id="gallery">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">

                        <div class="page-heading">
                                @if(Config::get('app.locale') == 'ar')
                                <h2>الفنادق الأكثر طلباً</h2>                              
                                @elseif(Config::get('app.locale') == 'en')
                                <h2>Most Popular Hotels</h2>
                                @endif
                            <hr class="heading-line" />
                        </div><!-- end page-heading -->

                        <div class="filterizr">
                            <div class="row">
                            @if(Config::get('app.locale') == 'ar')
                            <ul class="simplefilter">
                                <li class="active" data-filter="all">الكل</li>
                                @foreach($places as $place)
                                <li data-filter="{{$place->id}}">{{$place->place_name_ar}}</li>
                                @endforeach
                            </ul>
                            @elseif(Config::get('app.locale') == 'en')
                            <ul class="simplefilter">
                                <li class="active" data-filter="all">All</li>
                                @foreach($places as $place)
                                <li data-filter="{{$place->id}}">{{$place->place_name_en}}</li>
                                @endforeach
                            </ul>
                            @endif
                            </div>
                    
                            <div class="row">
                            <div class="filtr-container">
                                @foreach($hotels as $hotel)
                                @if($hotel->max == 1 && $loop->index <= 7)
                                @if(Config::get('app.locale') == 'ar')
                                <div class="col-xs-6 col-sm-4 col-md-3 filtr-item" data-category="{{$hotel->place_id}}">
                                    <div class="main-block hotel-block">
                                        <div class="main-img">
                                            @if($hotel->discount > 0)
                                            <div class="sale-tag">{{$hotel->discount}}% خصم</div>
                                            @endif
                                            <a href="{{ route('site.hotel' , ['id' => $hotel->id]) }}">
                                                <img src="{{asset('storage/uploads/hotel/'.$hotel->image)}}" class="img-responsive" alt="hotel-img"  style="max-height: 240px !important; max-width: 361px !important;"/>
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
                                                <span class="rate-tag"><b>{{$hotel->rate}}</b>التقييم</span>
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
                                                <a href="#" class="btn btn-orange btn-block btn-lg">حجز الآن</a>
                                            </div><!-- end grid-btn -->
                                        </div>
                                    </div><!-- end hotel-block -->
                                </div>
                                @elseif(Config::get('app.locale') == 'en')
                                <div class="col-xs-6 col-sm-4 col-md-3 filtr-item" data-category="{{$hotel->place_id}}">
                                    <div class="main-block hotel-block">
                                        <div class="main-img">
                                            @if($hotel->discount > 0)
                                            <div class="sale-tag">{{$hotel->discount}}% Discount</div>
                                            @endif
                                            <a href="{{ route('site.hotel' , ['id' => $hotel->id]) }}">
                                                <img src="{{asset('storage/uploads/hotel/'.$hotel->image)}}" class="img-responsive" alt="hotel-img" style="max-height: 240px !important; max-width: 361px !important;"/>
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
                                                <span class="rate-tag"><b>{{$hotel->rate}}</b>Rate</span>
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
                                                <a href="#" class="btn btn-orange btn-block btn-lg">Book Now</a>
                                            </div><!-- end grid-btn -->
                                        </div>
                                    </div><!-- end hotel-block -->
                                </div>
                                @endif
                                @endif
                                @endforeach
                            </div>
                        </div>
                        </div>
                    </div>
                </div><!--/.row-->
            </div><!--/.container-->
        </section>
        @if(Config::get('app.locale') == 'ar')
            <section id="about-us">
                <div class="container">
                    <div class="row">
                        <div class="col-md-7">
                            <div class="why-us">
                                <h3>لماذا نحن</h3>
                                @php $why_ar = substr($data->get('vision_ar'), 0, 300); @endphp
                                <p>{!! strip_tags($why_ar) !!}
                                </p>
                                <div class="row">
                                    <a href="#" class="why-wrap col-md-6 col-sm-6">
                                        <i class="fa fa-road"></i>
                                        <h4>رؤيتنا</h4>
                                        @php $vision_ar = substr($data->get('vision_ar'), 0, 400); @endphp
                                        <p>{!! strip_tags($vision_ar) !!}...</p>
                                    </a>
                                    <a href="#" class="why-wrap col-md-6 col-sm-6">
                                        <i class="fa fa-leaf"></i>
                                        <h4>أهدافنا</h4>
                                        @php $goal_ar = substr($data->get('goal_ar'), 0, 400); @endphp
                                        <p>{!! strip_tags($goal_ar) !!}...</p>
                                    </a>
                                </div>
                            </div>
                            
                        </div>
                        
                        <div class="col-md-5">
                            <div class="about-us">
                                <figure class="shine"><img src="{{asset('vendors/site/EN/images/about-img.jpg')}}" alt="" /></figure>
                                <h3>عن الشركة</h3>
                                @php $about_content_ar = substr($data->get('about_content_ar'), 0, 500); @endphp
                                <p>{!! strip_tags($about_content_ar) !!}...
                                </p>
                            </div>
                        </div>
                    </div><!-- row -->
                </div><!-- container -->
            </section><!-- About us End -->                        
        @elseif(Config::get('app.locale') == 'en')
            <section id="about-us">
                <div class="container">
                    <div class="row">
                        <div class="col-md-7">
                            <div class="why-us">
                                <h3>Why Us</h3>
                                @php $why_ar = substr($data->get('vision_en'), 0, 300); @endphp
                                <p>{!! strip_tags($why_en) !!}
                                </p>
                                <div class="row">
                                    <a href="#" class="why-wrap col-md-6 col-sm-6">
                                        <i class="fa fa-road"></i>
                                        <h4>Vision</h4>
                                        @php $vision_en = substr($data->get('vision_en'), 0, 400); @endphp
                                        <p>{!! strip_tags($vision_en) !!}...</p>
                                    </a>
                                    <a href="#" class="why-wrap col-md-6 col-sm-6">
                                        <i class="fa fa-leaf"></i>
                                        <h4>Mission</h4>
                                        @php $goal_en = substr($data->get('goal_en'), 0, 400); @endphp
                                        <p>{!! strip_tags($goal_en) !!}...</p>
                                    </a>
                                </div>
                            </div>
                            
                        </div>
                        
                        <div class="col-md-5">
                            <div class="about-us">
                                <figure class="shine"><img src="{{asset('vendors/site/EN/images/about-img.jpg')}}" alt="" /></figure>
                                <h3>About Us</h3>
                                @php $about_content_en = substr($data->get('about_content_en'), 0, 500); @endphp
                                <p>{!! strip_tags($about_content_en) !!}...
                                </p>
                            </div>
                        </div>
                    </div><!-- row -->
                </div><!-- container -->
            </section><!-- About us End -->                 
        @endif       
        <!--=============== CRUISE OFFERS ===============-->
        <section id="cruise-offers" class="section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-heading">
                            @if(Config::get('app.locale') == 'ar')
                            <h2>البرامج الأكثر طلباً</h2>
                            @elseif(Config::get('app.locale') == 'en')
                            <h2>Most Requested Programs</h2>
                            @endif      
                            <hr class="heading-line" />
                        </div><!-- end page-heading -->
                        <div class="row">
                            @foreach($programmes as $program)
                            @if($program->max == 1)
                            @if(Config::get('app.locale') == 'ar')
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
                                                    <span class="Lato cruise-price">${{$program->price}}</span>
                                                </div><!-- end cruise-title -->
                                            </div><!-- end cruise-info -->
                                        </div><!-- end columns -->
                                        
                                    </div><!-- end row -->	
                                </div><!-- end cruise-block -->
                            </div><!-- end columns -->
                            @elseif(Config::get('app.locale') == 'en')
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
                                                    
                                                    <span class="Lato cruise-price">${{$program->price}}</span>
                                                </div><!-- end cruise-title -->
                                            </div><!-- end cruise-info -->
                                        </div><!-- end columns -->
                                        
                                    </div><!-- end row -->	
                                </div><!-- end cruise-block -->
                            </div><!-- end columns -->
                            @endif
                            @endif
                            @endforeach
                        </div><!-- end row -->
                        <div class="view-all text-center">
                            @if(Config::get('app.locale') == 'ar')
                            <a href="{{route('site.programmes')}}" class="btn btn-orange">كافة البرامج</a>
                            @elseif(Config::get('app.locale') == 'en')
                            <a href="{{route('site.programmes')}}" class="btn btn-orange">All programmess</a>
                            @endif  
                        </div><!-- end view-all -->
                    </div><!-- end columns -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section><!-- end cruise-offers -->
        <!--==================== BANNER ===================-->
        <section class="banner-ads"> 
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6 pr0">
                        <a href="#"><img src="{{asset('vendors/site/EN/images/banner1.jpg')}}" class="img-responsive" alt="" /></a>
                    </div><!-- end columns -->
                    <div class="col-sm-6 pl0">
                        <a href="#"><img src="{{asset('vendors/site/EN/images/banner2.jpg')}}" class="img-responsive" alt="" /></a>
                    </div><!-- end columns -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section><!-- end video-banner -->
        <!--================= FLIGHT OFFERS =============-->
        <section id="flight-offers" class="section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-heading">
                            @if(Config::get('app.locale') == 'ar')
                            <h2>مكاتبنا</h2>
                            @elseif(Config::get('app.locale') == 'en')
                            <h2>Our Offices</h2>
                            @endif 
                            <hr class="heading-line" />
                        </div><!-- end page-heading -->
                        <div class="row">
                            <div class="owl-carousel owl-theme owl-custom-arrow" id="owl-offices">
                                @foreach($offices as $office)
                                @if(Config::get('app.locale') == 'ar')
                                <div class="item">
                                    <div class="main-block flight-block">
                                        <a href="#">                                       
                                            <div class="flight-info">
                                                <div class="flight-title">
                                                    <h3>
                                                        <span class="flight-destination">{{$office->country_ar}}</span>|<span class="flight-type">{{$office->office_name_ar}}</span>
                                                        <img src="{{asset('storage/uploads/office/'.$office->image)}}" alt="" />
                                                    </h3>
                                                </div><!-- end flight-title -->
                                                <div class=" flight-timing">
                                                    <ul class="list-unstyled">
                                                        <li><span><i class="fa fa-map-marker"></i></span>{{$office->address_ar}}</li>
                                                        <li><span><i class="fa fa-phone"></i></span><span class="Lato">{{$office->phone}}</span></li>
                                                    </ul>
                                                </div><!-- end flight-timing -->
                                            </div><!-- end flight-info -->
                                        </a>
                                    </div><!-- end flight-block -->
                                </div><!-- end columns -->
                                @elseif(Config::get('app.locale') == 'en')
                                <div class="item">
                                    <div class="main-block flight-block">
                                        <a href="#">                                       
                                            <div class="flight-info">
                                                <div class="flight-title">
                                                    <h3>
                                                        <span class="flight-destination">{{$office->country_en}}</span>|<span class="flight-type">{{$office->office_name_en}}</span>
                                                        <img src="{{asset('storage/uploads/office/'.$office->image)}}" alt="" />
                                                    </h3>
                                                </div><!-- end flight-title -->
                                                <div class=" flight-timing">
                                                    <ul class="list-unstyled">
                                                        <li><span><i class="fa fa-map-marker"></i></span>{{$office->address_en}}</li>
                                                        <li><span><i class="fa fa-phone"></i></span><span class="Lato">{{$office->phone}}</span></li>
                                                    </ul>
                                                </div><!-- end flight-timing -->
                                            </div><!-- end flight-info -->
                                        </a>
                                    </div><!-- end flight-block -->
                                </div><!-- end columns -->
                                @endif
                                @endforeach
                            </div>    
                        </div><!-- end row -->
                        <div class="view-all text-center">
                                @if(Config::get('app.locale') == 'ar')
                                <a href="{{route('site.offices')}}" class="btn btn-orange">كافة المكاتب</a>
                                @elseif(Config::get('app.locale') == 'en')
                                <a href="{{route('site.offices')}}" class="btn btn-orange">All Offices</a>
                                @endif 
                            
                        </div><!-- end view-all -->
                    </div><!-- end columns -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section><!-- end flight-offers -->
                            
        <!--==================== TESTIMONIALS ====================-->
        <section id="testimonials" class="section-padding back-size">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-heading white-heading">
                                @if(Config::get('app.locale') == 'ar')
                                <h2>قالوا عنا</h2>
                                @elseif(Config::get('app.locale') == 'en')
                                <h2>Testmonials</h2>
                                @endif
                            <hr class="heading-line" />
                        </div><!-- end page-heading -->
                        <div class="carousel slide" data-ride="carousel" id="quote-carousel">
                            <div class="carousel-inner text-center">
                                @foreach($tests as $test)
                                @if(Config::get('app.locale') == 'ar')
                                <div class="item @if($loop->index == 0) active @endif">
                                    <blockquote>{{$test->content_ar}}</blockquote>
                                    <div class="rating">
                                        <span><i class="fa fa-star orange"></i></span>
                                        <span><i class="fa fa-star orange"></i></span>
                                        <span><i class="fa fa-star orange"></i></span>
                                        <span><i class="fa fa-star orange"></i></span>
                                        <span><i class="fa fa-star lightgrey"></i></span>
                                    </div><!-- end rating -->
                                    <small>{{$test->name_ar}}</small>
                                </div><!-- end item -->
                                @elseif(Config::get('app.locale') == 'en')
                                <div class="item @if($loop->index == 0) active @endif">
                                    <blockquote>{{$test->content_en}}</blockquote>
                                    <div class="rating">
                                        <span><i class="fa fa-star orange"></i></span>
                                        <span><i class="fa fa-star orange"></i></span>
                                        <span><i class="fa fa-star orange"></i></span>
                                        <span><i class="fa fa-star orange"></i></span>
                                        <span><i class="fa fa-star lightgrey"></i></span>
                                    </div><!-- end rating -->
                                    <small>{{$test->name_en}}</small>
                                </div><!-- end item -->
                                @endif
                                @endforeach
                            </div><!-- end carousel-inner -->
                            <ol class="carousel-indicators">
                                @foreach($tests as $test)
                            <li data-target="#quote-carousel" data-slide-to="{{$loop->index}}" class="@if($loop->index == 0) active @endif"><img src="{{asset('storage/uploads/test/'.$test->image)}}" class="img-responsive"  alt="client-img">
                                </li>
                                @endforeach
                            </ol>
                        </div><!-- end quote-carousel -->
                    </div><!-- end columns -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section><!-- end testimonials --> 
        @if(Config::get('app.locale') == 'ar')
        <section id="highlights" class="highlights-2"> 
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="row">
                                <div id="boxes">
                                
                                    <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">  
                                        <div class="highlight-box">
                                            <div class="h-icon">
                                                <span><i class="fa fa-plane"></i></span>
                                            </div><!-- end h-icon -->
                                            
                                            <div class="h-text">
                                                <span class="numbers">2496</span>
                                                <p>برنامج حج وعمرة</p>
                                            </div><!-- end h-text -->                           
                                        </div><!-- end highlight-box -->                       
                                    </div><!-- end columns -->
                                    
                                    <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">  
                                        <div class="highlight-box">
                                            <div class="h-icon">
                                                <span><i class="fa fa-building"></i></span>
                                            </div><!-- end h-icon -->
                                            
                                            <div class="h-text cruise">
                                                <span class="numbers">1906</span>
                                                <p>فندق وأماكن للإقامة </p> 
                                            </div><!-- end h-text -->                           
                                        </div><!-- end highlight-box -->                       
                                    </div><!-- end columns -->
                                    
                                    <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">  
                                        <div class="highlight-box">
                                            <div class="h-icon">
                                                <span><i class="fa fa-users"></i></span>
                                            </div><!-- end h-icon -->
                                            
                                            <div class="h-text taxi">
                                                <span class="numbers">92496</span>
                                                <p>عملاؤنا من الحجاج والمعتمرين</p>   
                                            </div><!-- end h-text -->                           
                                        </div><!-- end highlight-box -->                       
                                    </div><!-- end columns -->
                                    
                                    <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">  
                                        <div class="highlight-box">
                                            <div class="h-icon">
                                                <span><i class="fa fa-map-marker"></i></span>
                                            </div><!-- end h-icon -->
                                            
                                            <div class="h-text taxi">
                                                <span class="numbers">584</span>
                                                <p>مكاتنا في الداخل والخارج</p>   
                                            </div><!-- end h-text -->                           
                                        </div><!-- end highlight-box -->                       
                                    </div><!-- end columns -->
    
                                </div><!-- end boxes -->
                            </div><!-- end row -->
                        </div><!-- end columns -->
                    </div><!-- end row -->
                </div><!-- end container -->
            </section><!-- end highlights -->
        @elseif(Config::get('app.locale') == 'en')
        <section id="highlights" class="highlights-2"> 
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="row">
                                <div id="boxes">
                                
                                    <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">  
                                        <div class="highlight-box">
                                            <div class="h-icon">
                                                <span><i class="fa fa-plane"></i></span>
                                            </div><!-- end h-icon -->
                                            
                                            <div class="h-text">
                                                <span class="numbers">2496</span>
                                                <p>UMRAH & HAJJ</p>
                                            </div><!-- end h-text -->                           
                                        </div><!-- end highlight-box -->                       
                                    </div><!-- end columns -->
                                    
                                    <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">  
                                        <div class="highlight-box">
                                            <div class="h-icon">
                                                <span><i class="fa fa-building"></i></span>
                                            </div><!-- end h-icon -->
                                            
                                            <div class="h-text cruise">
                                                <span class="numbers">1906</span>
                                                <p>Our Hotels </p> 
                                            </div><!-- end h-text -->                           
                                        </div><!-- end highlight-box -->                       
                                    </div><!-- end columns -->
                                    
                                    <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">  
                                        <div class="highlight-box">
                                            <div class="h-icon">
                                                <span><i class="fa fa-users"></i></span>
                                            </div><!-- end h-icon -->
                                            
                                            <div class="h-text taxi">
                                                <span class="numbers">92496</span>
                                                <p>Our Clients</p>   
                                            </div><!-- end h-text -->                           
                                        </div><!-- end highlight-box -->                       
                                    </div><!-- end columns -->
                                    
                                    <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">  
                                        <div class="highlight-box">
                                            <div class="h-icon">
                                                <span><i class="fa fa-map-marker"></i></span>
                                            </div><!-- end h-icon -->
                                            
                                            <div class="h-text taxi">
                                                <span class="numbers">584</span>
                                                <p>Our Offices</p>   
                                            </div><!-- end h-text -->                           
                                        </div><!-- end highlight-box -->                       
                                    </div><!-- end columns -->
    
                                </div><!-- end boxes -->
                            </div><!-- end row -->
                        </div><!-- end columns -->
                    </div><!-- end row -->
                </div><!-- end container -->
            </section><!-- end highlights -->
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
                            <form id="subscribe_form" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" name="email" class="form-control input-lg" placeholder="أدخل بريدك الكتروني"/>
                                        <span class="input-group-btn"><button type="submit" class="btn btn-lg"><i class="fa fa-envelope"></i></button></span>
                                    </div>
                                </div>
                                {{ csrf_field() }}
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
                            <form id="subscribe_form" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input name="email" type="text" class="form-control input-lg" placeholder="Enter yor email address"/>
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
        <script src="{{asset('vendors/site/EN/js/custom-video.js')}}"></script>
        <script src="{{asset('vendors/site/EN/js/filterizr.min.js')}}"></script>
        <script src="{{asset('vendors/toastr/toastr.min.js')}}"></script>
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
        @if(Config::get('app.locale') == 'en')
        <script type="text/javascript">
            $(document).ready(function() {

                $('#subscribe_form').on('submit', function(event){
                    event.preventDefault();
                    $.ajax({
                        url:"{{ route('site.subscribe') }}",
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
                                toastr.info('Your subscribtion is done successfully.', 'Success!', {timeOut: 3000});
                                $('#subscribe_form')[0].reset();                            
                            }
                        }
                    })
                });
            });
        </script>
        @elseif(Config::get('app.locale') == 'ar')
        <script type="text/javascript">
            $(document).ready(function() {

                $('#subscribe_form').on('submit', function(event){
                    event.preventDefault();
                    $.ajax({
                        url:"{{ route('site.subscribe') }}",
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
                                toastr.success('تم الاشتراك بنجاح', 'تم!', {timeOut: 3000});
                                $('#subscribe_form')[0].reset();
                                
                            }
                        }
                    })
                });
            });
        </script>
        @endif
    </body>

</html>