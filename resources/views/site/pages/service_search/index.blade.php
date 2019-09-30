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
                            @foreach($servicess as $s)
                            <div class="list-block main-block room-block">
                                <div class="list-content">
                                    <div class="main-img list-img room-img">
                                        <a href="#">
                                            <img src="{{asset('storage/uploads/service/'.$s['image'])}}" class="img-responsive" alt="room-img" />
                                        </a>
                                        <div class="main-mask">
                                            <ul class="list-unstyled list-inline offer-price-1">
                                                <li class="price">${{$s['price']}}</li>
                                                <li class="rating">
                                                    @for ($i = 1; $i <= $s['rate']; $i++)
                                                        <span><i class="fa fa-star orange"></i></span>
                                                    @endfor
                                                    @for ($i = $s['rate']; $i <= 5; $i++)
                                                        <span><i class="fa fa-star lightgrey"></i></span>
                                                    @endfor
                                                </li>
                                            </ul>
                                        </div><!-- end main-mask -->
                                    </div><!-- end room-img -->
                                    
                                    <div class="list-info room-info">
                                        <div class="arrow pull-right">
                                            <span class="rate-tag"><b>{{$s['rate']}}</b>التقييم</span>
                                        </div>
                                        <h3 class="block-title"><a href="#">{{$s['name_ar']}}</a></h3>
                                        <p>{{$s['content_ar']}}</p>
                                        <form id="add_cart{{$loop->index}}" method="POST">
                                                {{csrf_field()}}
                                                <input type="number" name="max" placeholder="عدد الخدمات">
                                            <input type="hidden" value="{{$s['id']}}" name="service_id">
                                            <input type="hidden" name="adults" value="{{$adults}}">
                                            <input type="hidden" name="children" value="{{$children}}">
                                            <input type="hidden" name="town" value="{{$town}}">
                                            <input type="hidden" name="hotel" value="{{$hotel}}">
                                            <input type="hidden" name="to_mekkah" value="{{$to_mekkah}}">
                                            <input type="hidden" name="from_mekkah" value="{{$from_mekkah}}">
                                            <input type="hidden" name="to_madinah" value="{{$to_madinah}}">
                                            <input type="hidden" name="from_madinah" value="{{$from_madinah}}">
                                            <input type="hidden" name="rooms" value="{{$rooms}}">
                                            <input type="hidden" name="country" value="{{$country}}">
                                            <input type="hidden" name="transport" value="{{$transport}}">
                                            <input type="hidden" name="services" value="{{$services}}">
                                            <input type="hidden" name="v_type" value="{{$v_type}}">
                                            <input type="hidden" name="v_category" value="{{$v_category}}">
                                            <input type="hidden" name="v_model_form" value="{{$v_model_form}}">
                                            <input type="hidden" name="v_model_to" value="{{$v_model_to}}">
                                            <input type="hidden" name="quantity" value="{{$quantity}}">
                                            <input type="hidden" name="company" value="{{$company}}">
                                            <input type="hidden" name="c_category" value="{{$c_category}}">
                                            <input type="hidden" name="add_services" value="{{$add_services}}">
                                            <input type="hidden" name="s_quantity" value="{{$s_quantity}}">
                                            <input type="hidden" name="duration" value="{{$duration}}">
                                            <button type="submit" class="btn btn-orange btn-lg pull-right">حجز
                                            </button>
                                        </form>
                                     </div><!-- end room-info -->
                                </div><!-- end list-content -->
                            </div><!-- end room-block -->
                            @endforeach
                            {{ $servicess->links() }}
                        </div><!-- end columns -->

                        <div class="col-xs-12 col-sm-12 col-md-3 side-bar left-side-bar">
                                        
                            <ul class="umrahtak">
                                <li><a href="#" class="btn btn-o-border btn-block btn-lg">فنادق مكة <span><i class="fa fa-check"></i></span> </a></li>
                                <li><a href="#" class="btn btn-o-border btn-block btn-lg">فنادق المدينة <span><i class="fa fa-check"></i></span> </a></li>
                                <li><a href="#" class="btn btn-o-border btn-block btn-lg"> الخدمات <span><i class="fa fa-check"></i></span></a></li>
                                <li>
                                <form action="{{ route('site.customerData') }}" method="GET">
                                    <input type="hidden" name="adults" value="{{$adults}}">
                                    <input type="hidden" name="children" value="{{$children}}">
                                    <input type="hidden" name="town" value="{{$town}}">
                                    <input type="hidden" name="hotel" value="{{$hotel}}">
                                    <input type="hidden" name="to_mekkah" value="{{$to_mekkah}}">
                                    <input type="hidden" name="from_mekkah" value="{{$from_mekkah}}">
                                    <input type="hidden" name="to_madinah" value="{{$to_madinah}}">
                                    <input type="hidden" name="from_madinah" value="{{$from_madinah}}">
                                    <input type="hidden" name="rooms" value="{{$rooms}}">
                                    <input type="hidden" name="country" value="{{$country}}">
                                    <input type="hidden" name="transport" value="{{$transport}}">
                                    <input type="hidden" name="services" value="{{$services}}">
                                    <input type="hidden" name="v_type" value="{{$v_type}}">
                                    <input type="hidden" name="v_category" value="{{$v_category}}">
                                    <input type="hidden" name="v_model_form" value="{{$v_model_form}}">
                                    <input type="hidden" name="v_model_to" value="{{$v_model_to}}">
                                    <input type="hidden" name="quantity" value="{{$quantity}}">
                                    <input type="hidden" name="company" value="{{$company}}">
                                    <input type="hidden" name="c_category" value="{{$c_category}}">
                                    <input type="hidden" name="add_services" value="{{$add_services}}">
                                    <input type="hidden" name="s_quantity" value="{{$s_quantity}}">
                                    <input type="hidden" name="duration" value="{{$duration}}">
                                    <button type="submit" class="btn btn-orange btn-block btn-lg">ملئ بيانات النزيل<span><i class="fa fa-plus-circle"></i></span></button>
                                </form>
                            </li>
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
                                        @if(Auth::guard('members')->check())
                                            <div class="panel panel-default">
                                                <div class="panel-heading">	
                                                    @foreach($guest_rooms as $r)
                                                    <p>الفنادق</p>
                                                    <p>{{$r->hotel_name_ar}} : {{$r->r_name_ar}}</p>
                                                    @endforeach
                                                    <p>الخدمات</p>
                                                    @foreach($guest_services as $s)
                                                    <p>{{$s->name_ar}}</p>
                                                    @endforeach
                                                </div><!-- end panel-heading -->
                                            </div><!-- end panel-default -->
                                            @endif
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
                        @foreach($servicess as $s)
                        <div class="list-block main-block room-block">
                            <div class="list-content">
                                <div class="main-img list-img room-img">
                                    <a href="#">
                                        <img src="{{asset('storage/uploads/service/'.$s['image'])}}" class="img-responsive" alt="room-img" />
                                    </a>
                                    <div class="main-mask">
                                        <ul class="list-unstyled list-inline offer-price-1">
                                            <li class="price">${{$s['price']}}</li>
                                            <li class="rating">
                                                @for ($i = 1; $i <= $s['rate']; $i++)
                                                    <span><i class="fa fa-star orange"></i></span>
                                                @endfor
                                                @for ($i = $s['rate']; $i <= 5; $i++)
                                                    <span><i class="fa fa-star lightgrey"></i></span>
                                                @endfor
                                            </li>
                                        </ul>
                                    </div><!-- end main-mask -->
                                </div><!-- end room-img -->
                                
                                <div class="list-info room-info">
                                    <div class="arrow pull-right">
                                        <span class="rate-tag"><b>{{$s['rate']}}</b>Rate</span>
                                    </div>
                                    <h3 class="block-title"><a href="#">{{$s['name_en']}}</a></h3>
                                    <p>{{$s['content_en']}}</p>
                                    <form id="add_cart{{$loop->index}}" method="POST">
                                            {{csrf_field()}}
                                        <input type="number" name="max" placeholder="Number Of Services">
                                        <input type="hidden" value="{{$s['id']}}" name="service_id">
                                        <input type="hidden" name="children" value="{{$children}}">
                                        <input type="hidden" name="town" value="{{$town}}">
                                        <input type="hidden" name="hotel" value="{{$hotel}}">
                                        <input type="hidden" name="to_mekkah" value="{{$to_mekkah}}">
                                        <input type="hidden" name="from_mekkah" value="{{$from_mekkah}}">
                                        <input type="hidden" name="to_madinah" value="{{$to_madinah}}">
                                        <input type="hidden" name="from_madinah" value="{{$from_madinah}}">
                                        <input type="hidden" name="rooms" value="{{$rooms}}">
                                        <input type="hidden" name="country" value="{{$country}}">
                                        <input type="hidden" name="transport" value="{{$transport}}">
                                        <input type="hidden" name="services" value="{{$services}}">
                                        <input type="hidden" name="v_type" value="{{$v_type}}">
                                        <input type="hidden" name="v_category" value="{{$v_category}}">
                                        <input type="hidden" name="v_model_form" value="{{$v_model_form}}">
                                        <input type="hidden" name="v_model_to" value="{{$v_model_to}}">
                                        <input type="hidden" name="quantity" value="{{$quantity}}">
                                        <input type="hidden" name="company" value="{{$company}}">
                                        <input type="hidden" name="c_category" value="{{$c_category}}">
                                        <input type="hidden" name="add_services" value="{{$add_services}}">
                                        <input type="hidden" name="s_quantity" value="{{$s_quantity}}">
                                        <input type="hidden" name="duration" value="{{$duration}}">
                                        <button type="submit" class="btn btn-orange btn-lg pull-right">Book
                                        </button>
                                    </form>
                                 </div><!-- end room-info -->
                            </div><!-- end list-content -->
                        </div><!-- end room-block -->
                        @endforeach
                        {{ $servicess->links() }}
                    </div><!-- end columns -->

                    <div class="col-xs-12 col-sm-12 col-md-3 side-bar left-side-bar">
                                    
                        <ul class="umrahtak">
                            <li><a href="#" class="btn btn-o-border btn-block btn-lg">Mekkah Hotels <span><i class="fa fa-check"></i></span> </a></li>
                            <li><a href="#" class="btn btn-o-border btn-block btn-lg">Madinah Hotels <span><i class="fa fa-check"></i></span> </a></li>
                            <li><a href="#" class="btn btn-o-border btn-block btn-lg"> Services <span><i class="fa fa-check"></i></span></a></li>
                            <li>
                                <form action="{{ route('site.customerData') }}" method="GET">
                                    <input type="hidden" name="adults" value="{{$adults}}">
                                    <input type="hidden" name="children" value="{{$children}}">
                                    <input type="hidden" name="town" value="{{$town}}">
                                    <input type="hidden" name="hotel" value="{{$hotel}}">
                                    <input type="hidden" name="to_mekkah" value="{{$to_mekkah}}">
                                    <input type="hidden" name="from_mekkah" value="{{$from_mekkah}}">
                                    <input type="hidden" name="to_madinah" value="{{$to_madinah}}">
                                    <input type="hidden" name="from_madinah" value="{{$from_madinah}}">
                                    <input type="hidden" name="rooms" value="{{$rooms}}">
                                    <input type="hidden" name="country" value="{{$country}}">
                                    <input type="hidden" name="transport" value="{{$transport}}">
                                    <input type="hidden" name="services" value="{{$services}}">
                                    <input type="hidden" name="v_type" value="{{$v_type}}">
                                    <input type="hidden" name="v_category" value="{{$v_category}}">
                                    <input type="hidden" name="v_model_form" value="{{$v_model_form}}">
                                    <input type="hidden" name="v_model_to" value="{{$v_model_to}}">
                                    <input type="hidden" name="quantity" value="{{$quantity}}">
                                    <input type="hidden" name="company" value="{{$company}}">
                                    <input type="hidden" name="c_category" value="{{$c_category}}">
                                    <input type="hidden" name="add_services" value="{{$add_services}}">
                                    <input type="hidden" name="s_quantity" value="{{$s_quantity}}">
                                    <input type="hidden" name="duration" value="{{$duration}}">
                                    <button type="submit" class="btn btn-orange btn-block btn-lg">Fill Customer Data<span><i class="fa fa-plus-circle"></i></span></button>
                                </form>
                            </li>
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
                                            @if(Auth::guard('members')->check())
                                            <div class="panel panel-default">
                                                <div class="panel-heading">	
                                                    @foreach($guest_rooms as $r)
                                                    <p>Hotels</p>
                                                    <p>{{$r->hotel_name_en}} : {{$r->r_name_en}}</p>
                                                    @endforeach
                                                    <p>Services</p>
                                                    @foreach($guest_services as $s)
                                                    <p>{{$s->name_en}}</p>
                                                    @endforeach
                                                </div><!-- end panel-heading -->
                                            </div><!-- end panel-default -->
                                        @endif
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
@include('site.pages.service_search.scripts')