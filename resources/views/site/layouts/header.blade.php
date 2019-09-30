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
    <section class="flexslider-container">
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
                            <a href="{{route('site.umratak')}}" class="list-group-item @if(Route::currentRouteName()=='site.umratak') active @endif"><span><i class="fa fa-paint-brush link-icon"></i></span>مايكروس عمرة</a>
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
                            <a href="{{route('site.umratak')}}" class="list-group-item @if(Route::currentRouteName()=='site.umratak') active @endif"><span><i class="fa fa-paint-brush link-icon"></i></span>Maikros Umrah</a>
                            <a href="{{route('site.programmes')}}" class="list-group-item @if(Route::currentRouteName()=='site.programmes') active @endif"><span><i class="fa fa-plane link-icon"></i></span>Programmes</a>
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
    </section><!-- end flexslider-container -->
