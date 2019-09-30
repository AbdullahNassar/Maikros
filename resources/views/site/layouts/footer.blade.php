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
                    <p>© 2019 جميع الحقوق محفوظة لموقع <a href="#">مايكروس</a></p>
                </div><!-- end columns -->
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" id="terms">
                    <ul class="list-unstyled list-inline">
                        <li><a href="{{route('site.terms')}}">الشروط والأحكام</a></li>
                        <li><a href="{{route('site.privacy')}}">حقوق الملكية</a></li>
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
                        <p>© All rights reserved 2019,  Maikros.</p>
                </div><!-- end columns -->
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" id="terms">
                    <ul class="list-unstyled list-inline">
                        <li><a href="{{route('site.terms')}}">Terms & Condition</a></li>
                        <li><a href="{{route('site.privacy')}}">Privacy Policy</a></li>
                    </ul>
                </div><!-- end columns -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end footer-bottom -->
    @endif
</section><!-- end footer -->
