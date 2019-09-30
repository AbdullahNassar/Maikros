@extends('site.layouts.master')
@section('meta')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
@endsection
@if(Config::get('app.locale') == 'ar')
    @section('title','البرامج')
@elseif(Config::get('app.locale') == 'en')
    @section('title','Programs')
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

    <!-- Owl Carousel Stylesheet -->
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
                    <h1 class="page-title">البرامج</h1>
                    <ul class="breadcrumb">
                        <li><a href="{{route('site.home')}}">الرئيسية</a></li>
                        <li class="active">البرامج</li>
                    </ul>
                </div><!-- end columns -->
                @elseif(Config::get('app.locale') == 'en')
                <div class="col-sm-12">
                    <h1 class="page-title">Programs</h1>
                    <ul class="breadcrumb">
                        <li><a href="{{route('site.home')}}">Home</a></li>
                        <li class="active">Programs</li>
                    </ul>
                </div><!-- end columns -->
                @endif
            </div><!-- end row -->
        </div><!-- end container -->
    </section><!-- end page-cover -->
    <!--==== INNERPAGE-WRAPPER =====-->
    @if(Config::get('app.locale') == 'ar')
        <section class="innerpage-wrapper">
        	<div id="byf-guidelines" class="innerpage-section-padding">
        		<div class="container">
        			<div class="row">

                    	<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 content-side byf-info">
                        	<div class="space-right">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#program-info" data-toggle="tab"><span><i class="fa fa-paper"></i></span>البرنامج</a></li>
                                    <li><a href="#airport-info" data-toggle="tab"><span><i class="fa fa-plane"></i></span>رحلات الطيران</a></li>
                                    <li><a href="#visa-passport" data-toggle="tab"><span><i class="fa fa-building"></i></span>الفنادق</a></li>
                                    <li><a href="#check-in" data-toggle="tab"><span><i class="fa fa-wheelchair"></i></span>الخدمات</a></li>
                                    <li><a href="#baggage-info" data-toggle="tab"><span><i class="fa fa-ticket"></i></span>حجز</a></li>
                                </ul>
                                
                                <div class="tab-content">

                                    <div id="program-info" class="tab-pane in active">
                                        <div class="byf-info-wrap">
                                            <img src="{{asset('storage/uploads/program/'.$program->image)}}" class="img-responsive" alt="">
                                            <h3 class="byf-info-heading">{{$program->p_name_ar}}</h3>
                                            <p>{{$program->code}}</p>
                                            <p>{{$program->sub_name_ar}}</p>
                                            <ul>
                                                <li>مكة : {{$program->mekkah_ar}}</li>
                                                <li>المدينة : {{$program->madenah_ar}}</li>
                                                <li>جدة : {{$program->jeddah_ar}}</li>
                                            </ul>
                                        </div><!-- end byf-info-wrap -->
                                    </div><!-- end airport-info -->
    
                                    <div id="airport-info" class="tab-pane">
                                        <div class="byf-info-wrap">
                                            <img src="{{asset('vendors/site/AR/images/byf1.jpg')}}" class="img-responsive" alt="">
                                            <h3 class="byf-info-heading">معلومات رحلة الطيران</h3>
                                            <p>{{$program->flight_ar}}</p>
                                            <ul>
                                                @foreach ($flights as $flight)
                                                <li>{{$flight->code}} : {{$flight->flight_name_ar}}</li>
                                                @endforeach
                                            </ul>
                                        </div><!-- end byf-info-wrap -->
                                    </div><!-- end airport-info -->
                                    
                                    <div id="visa-passport" class="tab-pane">
                                        <div class="byf-info-wrap">
                                            <img src="{{asset('vendors/site/AR/images/byf2.jpg')}}" class="img-responsive" alt="">
                                            <h3 class="byf-info-heading">معلومات الفنادق</h3>
                                            <p>{{$program->hotel_ar}}</p>
                                        </div><!-- end byf-info-wrap -->
                                        
                                        <div class="byf-info-wrap">
                                            <ul>
                                                @foreach ($hotels as $hotel)
                                                <li>{{$hotel->hotel_name_ar}} : {{$hotel->street_ar}}</li>
                                                @endforeach
                                            </ul>
                                        </div><!-- end byf-info-wrap -->
                                    </div><!-- end visa-passport -->
                                    
                                    <div id="check-in" class="tab-pane">
                                        <div class="byf-info-wrap">
                                            <img src="{{asset('vendors/site/AR/images/byf3.jpg')}}" class="img-responsive" alt="">
                                            <h3 class="byf-info-heading">معلومات عن الخدمات الاضافية</h3>
                                            <p>{{$program->service_ar}}</p>
                                        </div><!-- end byf-info-wrap -->
                                        
                                        <div class="byf-info-wrap">
                                            <ul>
                                                @foreach($services as $service)
                                                <li>{{$service->name_ar}}</li>
                                                @endforeach
                                            </ul>
                                        </div><!-- end byf-info-wrap -->
                                    </div><!-- end check-in -->
                                    
                                    <div id="baggage-info" class="tab-pane">                                    
                                        <div class="byf-info-wrap">
                                            <h3 class="byf-info-heading">حجز البرنامج</h3>
                                            <div class="side-bar">
                                                <div class="side-bar-block">                                                        
                                                    <div class="booking-form p0">
                                                        <form id="booking_form" method="post" enctype="multipart/form-data">
                                                            <div class="form-group">
                                                                <input type="hidden" value="{{$program->id}}" name="program_id"/> 
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
                                                                <input type="text" class="form-control" placeholder="الدولة" name="country"/>                                       
                                                            </div>
                                                            
                                                            <div class="form-group">
                                                                <input type="text" class="form-control dpd1" placeholder="تاريخ الوصول" name="arrival"/>                                       		<i class="fa fa-calendar"></i>
                                                            </div>
                                                            
                                                            <div class="form-group">
                                                                <input type="text" class="form-control dpd2" placeholder="تاريخ المغادرة" name="leaving"/>                                       		<i class="fa fa-calendar"></i>
                                                            </div>
                                                            
                                                            <div class="form-group">
                                                                <input type="number" class="form-control" placeholder="عدد الغرف" name="rooms"/>
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
                                            </div><!-- end columns -->
                                        </div><!-- end byf-info-wrap -->
                                    </div><!-- end baggage-info -->
                                    
                                </div><!-- end tab-content -->
                        	</div><!-- end space-right -->
                        </div><!-- end columns -->
						
                        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 side-bar blog-sidebar right-side-bar">
                      
                            <div class="row">    

                            	<div class="col-xs-12 col-sm-6 col-md-12">
                                    <div class="side-bar-block recent-post">
                                        <h2 class="side-bar-heading">فنادق مقترحة</h2>

                                        @foreach ($hotelss as $hotel)
                                            @if($loop->index < 5)
                                            <div class="recent-block">
                                                <div class="recent-img">
                                                    <a href="{{ route('site.hotel' , ['id' => $hotel->id]) }}"><img src="{{asset('storage/uploads/hotel/'.$hotel->image)}}" class="img-reponsive" alt="holiday-deal-image"></a>
                                                </div><!-- end recent-img -->
                                                
                                                <div class="recent-text">
                                                    <a href="{{ route('site.hotel' , ['id' => $hotel->id]) }}"><h5>{{$hotel->hotel_name_ar}}</h5></a>
                                                    <span class="date">${{$hotel->price}}</span>
                                                </div><!-- end recent-text -->
                                            </div><!-- end recent-block -->
                                            @endif
                                        @endforeach

                                    </div>
                                </div><!-- end columns -->
							</div><!-- end row -->
                            
							<div class="row">
                            	<div class="col-xs-12 col-sm-6 col-md-12">
                                    <div class="side-bar-block contact">
                                        <h2 class="side-bar-heading">اتصل بنا</h2>
                                        <div class="c-list">
                                            <div class="icon"><span><i class="fa fa-envelope"></i></span></div>
                                            <div class="text"><p>{{$contact->get('email')}}</p></div>
                                        </div><!-- end c-list -->
                                        
                                        <div class="c-list">
                                            <div class="icon"><span><i class="fa fa-phone"></i></span></div>
                                            <div class="text"><p>{{$contact->get('phone')}}</p></div>
                                        </div><!-- end c-list -->
                                        
                                        <div class="c-list">
                                            <div class="icon"><span><i class="fa fa-map-marker"></i></span></div>
                                            <div class="text"><p>{{$contact->get('address_ar')}}</p></div>
                                        </div><!-- end c-list -->
                                    </div>
                                </div><!-- end columns -->
                                
                            	<div class="col-xs-12 col-sm-6 col-md-12">
                                    <div class="side-bar-block follow-us">
                                        <h2 class="side-bar-heading">تابعونا عبر :</h2>
                                        <ul class="list-unstyled list-inline">
                                            <li><a href="{{$contact->get('facebook')}}"><span><i class="fa fa-facebook"></i></span></a></li>
                                            <li><a href="{{$contact->get('twitter')}}"><span><i class="fa fa-twitter"></i></span></a></li>
                                            <li><a href="{{$contact->get('linkedin')}}"><span><i class="fa fa-linkedin"></i></span></a></li>
                                            <li><a href="{{$contact->get('instagram')}}"><span><i class="fa fa-instagram"></i></span></a></li>
                                        </ul>
                                    </div><!-- end side-bar-block -->
								</div><!-- end columns -->
                                
                            </div><!-- end row -->
                        </div><!-- end columns -->
                        
                    </div><!-- end row -->
        		</div><!-- end container -->
        	</div><!-- end byf-guidelines --> 
        </section><!-- end innerpage-wrapper -->
    @elseif(Config::get('app.locale') == 'en')
        <section class="innerpage-wrapper">
        	<div id="byf-guidelines" class="innerpage-section-padding">
        		<div class="container">
        			<div class="row">

                    	<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 content-side byf-info">
                        	<div class="space-right">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#program-info" data-toggle="tab"><span><i class="fa fa-paper"></i></span>Programs</a></li>
                                    <li><a href="#airport-info" data-toggle="tab"><span><i class="fa fa-plane"></i></span>Flight Trips</a></li>
                                    <li><a href="#visa-passport" data-toggle="tab"><span><i class="fa fa-building"></i></span>Hotels</a></li>
                                    <li><a href="#check-in" data-toggle="tab"><span><i class="fa fa-wheelchair"></i></span>Services</a></li>
                                    <li><a href="#baggage-info" data-toggle="tab"><span><i class="fa fa-ticket"></i></span>Booking</a></li>
                                </ul>
                                
                                <div class="tab-content">

                                    <div id="program-info" class="tab-pane in active">
                                        <div class="byf-info-wrap">
                                            <img src="{{asset('storage/uploads/program/'.$program->image)}}" class="img-responsive" alt="">
                                            <h3 class="byf-info-heading">{{$program->p_name_en}}</h3>
                                            <p>{{$program->code}}</p>
                                            <p>{{$program->sub_name_en}}</p>
                                            <ul>
                                                <li>Mekkah : {{$program->mekkah_en}}</li>
                                                <li>Al Madinah : {{$program->madenah_en}}</li>
                                                <li>Jeddah : {{$program->jeddah_en}}</li>
                                            </ul>
                                        </div><!-- end byf-info-wrap -->
                                    </div><!-- end airport-info -->
    
                                    <div id="airport-info" class="tab-pane">
                                        <div class="byf-info-wrap">
                                            <img src="{{asset('vendors/site/AR/images/byf1.jpg')}}" class="img-responsive" alt="">
                                            <h3 class="byf-info-heading">Flight Trips Info</h3>
                                            <p>{{$program->flight_en}}</p>
                                            <ul>
                                                @foreach ($flights as $flight)
                                                <li>{{$flight->code}} : {{$flight->flight_name_en}}</li>
                                                @endforeach
                                            </ul>
                                        </div><!-- end byf-info-wrap -->
                                    </div><!-- end airport-info -->
                                    
                                    <div id="visa-passport" class="tab-pane">
                                        <div class="byf-info-wrap">
                                            <img src="{{asset('vendors/site/AR/images/byf2.jpg')}}" class="img-responsive" alt="">
                                            <h3 class="byf-info-heading">Hotels Info</h3>
                                            <p>{{$program->hotel_en}}</p>
                                        </div><!-- end byf-info-wrap -->
                                        
                                        <div class="byf-info-wrap">
                                            <ul>
                                                @foreach ($hotels as $hotel)
                                                <li>{{$hotel->hotel_name_en}} : {{$hotel->street_en}}</li>
                                                @endforeach
                                            </ul>
                                        </div><!-- end byf-info-wrap -->
                                    </div><!-- end visa-passport -->
                                    
                                    <div id="check-in" class="tab-pane">
                                        <div class="byf-info-wrap">
                                            <img src="{{asset('vendors/site/AR/images/byf3.jpg')}}" class="img-responsive" alt="">
                                            <h3 class="byf-info-heading">Services Info</h3>
                                            <p>{{$program->service_en}}</p>
                                        </div><!-- end byf-info-wrap -->
                                        
                                        <div class="byf-info-wrap">
                                            <ul>
                                                @foreach($services as $service)
                                                <li>{{$service->name_en}}</li>
                                                @endforeach
                                            </ul>
                                        </div><!-- end byf-info-wrap -->
                                    </div><!-- end check-in -->
                                    
                                    <div id="baggage-info" class="tab-pane">                                    
                                        <div class="byf-info-wrap">
                                            <h3 class="byf-info-heading">Program Booking</h3>
                                            <div class="side-bar">
                                                <div class="side-bar-block">                                                        
                                                    <div class="booking-form p0">
                                                        <form id="booking_form" method="post" enctype="multipart/form-data">
                                                            <div class="form-group">
                                                                <input type="hidden" value="{{$program->id}}" name="program_id"/> 
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
                                                                <input type="text" class="form-control" placeholder="Country" name="country"/>                                       
                                                            </div>
                                                            
                                                            <div class="form-group">
                                                                <input type="text" class="form-control dpd1" placeholder="Arrival Date" name="arrival"/>                                       		<i class="fa fa-calendar"></i>
                                                            </div>
                                                            
                                                            <div class="form-group">
                                                                <input type="text" class="form-control dpd2" placeholder="Departure Date" name="leaving"/>                                       		<i class="fa fa-calendar"></i>
                                                            </div>
                                                            
                                                            <div class="form-group">
                                                                <input type="number" class="form-control" placeholder="Rooms" name="rooms"/>
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
                                            </div><!-- end columns -->
                                        </div><!-- end byf-info-wrap -->
                                    </div><!-- end baggage-info -->
                                    
                                </div><!-- end tab-content -->
                        	</div><!-- end space-right -->
                        </div><!-- end columns -->
						
                        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 side-bar blog-sidebar right-side-bar">
                      
                            <div class="row">    

                            	<div class="col-xs-12 col-sm-6 col-md-12">
                                    <div class="side-bar-block recent-post">
                                        <h2 class="side-bar-heading">Suggested Hotels</h2>
                                        @foreach ($hotelss as $hotel)
                                            @if($loop->index < 5)
                                            <div class="recent-block">
                                                <div class="recent-img">
                                                    <a href="{{ route('site.hotel' , ['id' => $hotel->id]) }}"><img src="{{asset('storage/uploads/hotel/'.$hotel->image)}}" class="img-reponsive" alt="holiday-deal-image"></a>
                                                </div><!-- end recent-img -->
                                                
                                                <div class="recent-text">
                                                    <a href="{{ route('site.hotel' , ['id' => $hotel->id]) }}"><h5>{{$hotel->hotel_name_en}}</h5></a>
                                                    <span class="date">${{$hotel->price}}</span>
                                                </div><!-- end recent-text -->
                                            </div><!-- end recent-block -->
                                            @endif
                                        @endforeach
                                    </div>
                                </div><!-- end columns -->
							</div><!-- end row -->
                            
							<div class="row">
                            	<div class="col-xs-12 col-sm-6 col-md-12">
                                    <div class="side-bar-block contact">
                                        <h2 class="side-bar-heading">Contact Us</h2>
                                        <div class="c-list">
                                            <div class="icon"><span><i class="fa fa-envelope"></i></span></div>
                                            <div class="text"><p>{{$contact->get('email')}}</p></div>
                                        </div><!-- end c-list -->
                                        
                                        <div class="c-list">
                                            <div class="icon"><span><i class="fa fa-phone"></i></span></div>
                                            <div class="text"><p>{{$contact->get('phone')}}</p></div>
                                        </div><!-- end c-list -->
                                        
                                        <div class="c-list">
                                            <div class="icon"><span><i class="fa fa-map-marker"></i></span></div>
                                            <div class="text"><p>{{$contact->get('address_en')}}</p></div>
                                        </div><!-- end c-list -->
                                    </div>
                                </div><!-- end columns -->
                                
                            	<div class="col-xs-12 col-sm-6 col-md-12">
                                    <div class="side-bar-block follow-us">
                                        <h2 class="side-bar-heading">Follow Us :</h2>
                                        <ul class="list-unstyled list-inline">
                                            <li><a href="{{$contact->get('facebook')}}"><span><i class="fa fa-facebook"></i></span></a></li>
                                            <li><a href="{{$contact->get('twitter')}}"><span><i class="fa fa-twitter"></i></span></a></li>
                                            <li><a href="{{$contact->get('linkedin')}}"><span><i class="fa fa-linkedin"></i></span></a></li>
                                            <li><a href="{{$contact->get('instagram')}}"><span><i class="fa fa-instagram"></i></span></a></li>
                                        </ul>
                                    </div><!-- end side-bar-block -->
								</div><!-- end columns -->
                                
                            </div><!-- end row -->
                        </div><!-- end columns -->
                        
                    </div><!-- end row -->
        		</div><!-- end container -->
        	</div><!-- end byf-guidelines --> 
        </section><!-- end innerpage-wrapper -->
    @endif
@endsection
@include('site.pages.program.scripts')