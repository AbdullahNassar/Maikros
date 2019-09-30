@extends('site.layouts.master')
@section('meta')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
@endsection
@if(Config::get('app.locale') == 'ar')
    @section('title','الفنادق')
@elseif(Config::get('app.locale') == 'en')
    @section('title','Hotels')
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
                    <h1 class="page-title">الفنادق</h1>
                    <ul class="breadcrumb">
                        <li><a href="{{route('site.home')}}">الرئيسية</a></li>
                        <li>الفنادق</li>
                        <li class="active">تفاصيل الفندق</li>
                    </ul>
                </div><!-- end columns -->
                @elseif(Config::get('app.locale') == 'en')
                <div class="col-sm-12">
                    <h1 class="page-title">Hotels</h1>
                    <ul class="breadcrumb">
                        <li><a href="{{route('site.home')}}">Home</a></li>
                        <li>Hotels</li>
                        <li class="active">Hotel Details</li>
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
        	<div id="hotel-details" class="innerpage-section-padding">
                <div class="container">
                    <div class="row">        	
                        <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 content-side">
                            <a href="#" class="hotel-modal">
                                <img class="img-responsive" src="{{asset('storage/uploads/hotel/'.$hotel->image)}}" alt="">
                            </a>
                            <div class="detail-tabs">
                            	<ul class="nav nav-tabs nav-justified">
                                    @php $count=0;           @endphp
                                    @foreach($features as $feature)
                                    @if($feature->hotel_id == $hotel->id)
                                    <li @if($count == 0) class="active" @endif><a href="#overview{{$feature->id}}" data-toggle="tab">{{$feature->f_name_ar}}</a></li>
                                    @php $count=$count+1;    @endphp
                                    @endif
                                    @endforeach
                                    <li><a href="#overviewc" data-toggle="tab" aria-expanded="true">وسائل الراحة</a></li>
                                    <li><a href="#overviewm" data-toggle="tab" aria-expanded="true">الخريطة</a></li>
                                </ul>
                                <div class="tab-content">
                                    @php $count2=0;           @endphp
                                    @foreach($features as $feature)
                                    @if($feature->hotel_id == $hotel->id)
                                    <div id="overview{{$feature->id}}" class="tab-pane @if($count2 == 0) in active @endif">
                                    	<div class="row">
                                    		<div class="col-sm-4 col-md-4 tab-img">
                                        		<img src="{{asset('storage/uploads/feature/'.$feature->image)}}" class="img-responsive" alt="flight-detail-img" />
                                            </div><!-- end columns -->
                                            <div class="col-sm-8 col-md-8 tab-text">
                                        		<h3>{{$feature->f_name_ar}}</h3>
                                                <p>{{$feature->content_ar}}</p>
                                            </div><!-- end columns -->
                                        </div><!-- end row -->
                                    </div><!-- end hotel-overview -->
                                    @php $count2=$count2+1;    @endphp
                                    @endif
                                    @endforeach
                                    <div id="overviewc" class="tab-pane">
                                    	<div class="row">
                                    		<div class="col-sm-12 col-md-12 tab-text">
                                                <h3>وسائل الراحة</h3>
                                                <div class="row">
                                                    @foreach($comforts as $comfort)
                                                    <div class="col-md-6 col-xs-12  pull-left">
                                                        <img class="hotel-icon" src="{{asset('storage/uploads/comfort/'.$comfort->image)}}" alt="">
                                                        <span>{{$comfort->c_name_ar}}</span>
                                                    </div>
                                                    @endforeach                                                    
                                                </div>
                                            </div>
                                        </div><!-- end row -->
                                    </div><!-- end hotel-overview -->
                                    <div id="overviewm" class="tab-pane">
                                    	<div class="row">
                                    		<div class="col-sm-12 col-md-12 tab-map">
                                                <div class="map">
                                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6509729.487836256!2d-123.77686152799836!3d37.1864783963941!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x808fb9fe5f285e3d%3A0x8b5109a227086f55!2sCalifornia!5e0!3m2!1sen!2s!4v1490695907554" allowfullscreen=""></iframe>
                                                </div><!-- end map -->
                                            </div>
                                        </div><!-- end row -->
                                    </div><!-- end hotel-overview -->
                                </div><!-- end tab-content -->
                            </div><!-- end detail-tabs -->
                            
                            <div class="available-blocks" id="available-rooms">
                                <h2>فنادق شبيهة</h2>
                                @foreach($hotels as $h)
                                @if($h['best'] == $hotel->best)
                            	<div class="list-block main-block room-block">
                                    <div class="list-content">
                                        <div class="main-img list-img room-img">
                                            <a href="{{ route('site.hotel' , ['id' => $h['id']]) }}">
                                                <img src="{{asset('storage/uploads/hotel/'.$h['image'])}}" class="img-responsive" alt="room-img" />
                                            </a>
                                            <div class="main-mask">
                                                <ul class="list-unstyled list-inline offer-price-1">
                                                    <li class="price">${{$h['price']}}<span class="divider"></span></li>
                                                    <li class="rating">
                                                        @for ($i = 1; $i <= $h['stars']; $i++)
                                                        <span><i class="fa fa-star orange"></i></span>
                                                        @endfor
                                                        @for ($i = $h['stars']; $i < 5; $i++)
                                                        <span><i class="fa fa-star lightgrey"></i></span>
                                                        @endfor
                                                    </li>
                                                </ul>
                                            </div><!-- end main-mask -->
                                        </div><!-- end room-img -->
                                        <div class="list-info room-info">
                                            <h3 class="block-title"><a href="{{ route('site.hotel' , ['id' => $h['id']]) }}">{{$h['hotel_name_ar']}}</a></h3>
                                            <p class="block-minor">البعد عن الحرم : {{$h['far_ar']}}</p>
                                            <p class="block-minor">الشارع : {{$h['street_ar']}}</p>
                                            <ul class="list-unstyled list-inline car-features">
                                                <li><span><i class="fa fa-car"></i></span></li>
                                                <li><span><i class="fa fa-bath"></i></span></li>
                                                <li><span><i class="fa fa-aircondition"></i></span></li>
                                                <li><span><i class="fa fa-wifi"></i></span></li>
                                                <li><span><i class="fa fa-tv"></i></span></li>
                                            </ul>
                                            <a href="{{ route('site.hotel' , ['id' => $h['id']]) }}" class="btn btn-orange btn-lg">شاهد المزيد</a>
                                         </div><!-- end room-info -->
                                    </div><!-- end list-content -->
                                </div><!-- end room-block -->
                                @endif
								@endforeach
                            </div><!-- end available-rooms -->
                            {{ $hotels->links() }}
                        </div><!-- end columns -->
                                                
                        <div class="col-xs-12 col-sm-12 col-md-3 side-bar right-side-bar">
                            
                            <div class="side-bar-block booking-form-block">
                            	<h2 class="selected-price">${{$hotel->price}} <span>شامل</span></h2>
                            
                            	<div class="booking-form">
                                	<h3>حجز الفندق</h3>
                                    <p>حقق حلمك معنا اليوم</p>
                                    
                                    <form id="booking_form" method="post" enctype="multipart/form-data">
                                    	<div class="form-group">
                                            <input type="hidden" value="{{$hotel->id}}" name="hotel_id"/> 
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
                                            <label for="check01"><span><i class="fa fa-check"></i></span>للاستمرار , انت موافق على <a href="#">الشروط والاحكام.</a></label>                                        
                                        </div>
                                        
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
                        
                    </div><!-- end row -->
            	</div><!-- end container -->
            </div><!-- end hotel-details -->
        </section><!-- end innerpage-wrapper -->
        <!-- start modal -->
        <div class="hotel-show">
            <div class="modal-dialog modal-md" >
                <div class="cloose"><i class="fa fa-window-close"></i></div>
                <div class="detail-slider">
                    <div class="feature-slider">
                    @foreach($gallery as $g)
                        @if($g->hotel_id == $hotel->id)
                        <div><img src="{{asset('storage/uploads/gallery/'.$g->image)}}" class="img-responsive" alt="feature-img"/></div>
                        @endif
                    @endforeach
                    </div><!-- end feature-slider -->    
                    <div class="feature-slider-nav">
                    @foreach($gallery as $g)
                        @if($g->hotel_id == $hotel->id)
                        <div><img src="{{asset('storage/uploads/gallery/'.$g->image)}}" class="img-responsive" alt="feature-thumb"/></div>
                        @endif
                    @endforeach
                    </div><!-- end feature-slider-nav -->
                </div>  <!-- end detail-slider -->
            </div>
        </div><!-- end modal --> 
    @elseif(Config::get('app.locale') == 'en')
    <!--===== INNERPAGE-WRAPPER ====-->
    <section class="innerpage-wrapper">
        	<div id="hotel-details" class="innerpage-section-padding">
                <div class="container">
                    <div class="row">        	
                        
                        <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 content-side">
                            <a href="#" class="hotel-modal">
                                <img class="img-responsive" src="{{asset('storage/uploads/hotel/'.$hotel->image)}}" alt="">
                            </a>
                            <div class="detail-tabs">
                            	<ul class="nav nav-tabs nav-justified">
                                    @php $count=0;           @endphp
                                    @foreach($features as $feature)
                                    @if($feature->hotel_id == $hotel->id)
                                    <li @if($count == 0) class="active" @endif><a href="#overview{{$feature->id}}" data-toggle="tab">{{$feature->f_name_en}}</a></li>
                                    @php $count=$count+1;    @endphp
                                    @endif
                                    @endforeach
                                    <li><a href="#overviewc" data-toggle="tab">Means of Comfort</a></li>
                                    <li><a href="#overviewm" data-toggle="tab">Map</a></li>
                                </ul>
                                <div class="tab-content">
                                    @php $count2=0;           @endphp
                                    @foreach($features as $feature)
                                    @if($feature->hotel_id == $hotel->id)
                                    <div id="overview{{$feature->id}}" class="tab-pane @if($count2 == 0) in active @endif">
                                    	<div class="row">
                                    		<div class="col-sm-4 col-md-4 tab-img">
                                        		<img src="{{asset('storage/uploads/feature/'.$feature->image)}}" class="img-responsive" alt="flight-detail-img" />
                                            </div><!-- end columns -->
                                            <div class="col-sm-8 col-md-8 tab-text">
                                        		<h3>{{$feature->f_name_en}}</h3>
                                                <p>{{$feature->content_en}}</p>
                                            </div><!-- end columns -->
                                        </div><!-- end row -->
                                    </div><!-- end hotel-overview -->
                                    @php $count2=$count2+1;    @endphp
                                    @endif
                                    @endforeach
                                    <div id="overviewc" class="tab-pane">
                                    	<div class="row">
                                    		<div class="col-sm-12 col-md-12 tab-text">
                                                <h3>Means of Comfort</h3>
                                                <div class="row">
                                                    @foreach($comforts as $comfort)
                                                    <div class="col-md-6 col-xs-12  pull-left">
                                                        <img class="hotel-icon" src="{{asset('storage/uploads/comfort/'.$comfort->image)}}" alt="">
                                                        <span>{{$comfort->c_name_en}}</span>
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div><!-- end row -->
                                    </div><!-- end hotel-overview -->
                                    <div id="overviewm" class="tab-pane">
                                    	<div class="row">
                                    		<div class="col-sm-12 col-md-12 tab-map">
                                                <div class="map">
                                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6509729.487836256!2d-123.77686152799836!3d37.1864783963941!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x808fb9fe5f285e3d%3A0x8b5109a227086f55!2sCalifornia!5e0!3m2!1sen!2s!4v1490695907554" allowfullscreen=""></iframe>
                                                </div><!-- end map -->
                                            </div>
                                        </div><!-- end row -->
                                    </div><!-- end hotel-overview -->
                                </div><!-- end tab-content -->
                            </div><!-- end detail-tabs -->

                            <div class="available-blocks" id="available-rooms">
                            	<h2>Similar Hotels</h2>
                                @foreach($hotels as $h)
                                @if($h['best'] == $hotel->best)
                            	<div class="list-block main-block room-block">
                                    <div class="list-content">
                                        <div class="main-img list-img room-img">
                                            <a href="{{ route('site.hotel' , ['id' => $h['id']]) }}">
                                                <img src="{{asset('storage/uploads/hotel/'.$h['image'])}}" class="img-responsive" alt="room-img" />
                                            </a>
                                            <div class="main-mask">
                                                <ul class="list-unstyled list-inline offer-price-1">
                                                    <li class="price">${{$h['price']}}<span class="divider"></span></li>
                                                    <li class="rating">
                                                        @for($i = 1; $i <= $h['stars']; $i++)
                                                        <span><i class="fa fa-star orange"></i></span>
                                                        @endfor
                                                        @for($i = $h['stars']; $i < 5; $i++)
                                                        <span><i class="fa fa-star lightgrey"></i></span>
                                                        @endfor
                                                    </li>
                                                </ul>
                                            </div><!-- end main-mask -->
                                        </div><!-- end room-img -->
                                        <div class="list-info room-info">
                                            <h3 class="block-title"><a href="{{ route('site.hotel' , ['id' => $h['id']]) }}">{{$h['hotel_name_en']}}</a></h3>
                                            <p class="block-minor">Distance From Harram : {{$h['far_en']}}</p>
                                            <p class="block-minor">Street : {{$h['street_en']}}</p>
                                            <ul class="list-unstyled list-inline car-features">
                                                <li><span><i class="fa fa-car"></i></span></li>
                                                <li><span><i class="fa fa-bath"></i></span></li>
                                                <li><span><i class="fa fa-aircondition"></i></span></li>
                                                <li><span><i class="fa fa-wifi"></i></span></li>
                                                <li><span><i class="fa fa-tv"></i></span></li>
                                            </ul>
                                            <a href="{{ route('site.hotel' , ['id' => $h['id']]) }}" class="btn btn-orange btn-lg">Show More</a>
                                         </div><!-- end room-info -->
                                    </div><!-- end list-content -->
                                </div><!-- end room-block -->
                                @endif
								@endforeach
                            </div><!-- end available-rooms -->
                            {{ $hotels->links() }}
                        </div><!-- end columns -->
                        <div class="col-xs-12 col-sm-12 col-md-3 side-bar right-side-bar">
                            <div class="side-bar-block booking-form-block">
                            	<h2 class="selected-price">${{$hotel->price}} <span>De Forte</span></h2>
                            
                            	<div class="booking-form">
                                	<h3>Book Hotel</h3>
                                    <p>Find your dream hotel today</p>
                                    
                                    <form id="booking_form" method="post" enctype="multipart/form-data">
                                    	<div class="form-group">
                                            <input type="hidden" value="{{$hotel->id}}" name="hotel_id"/> 
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
                        
                    </div><!-- end row -->
            	</div><!-- end container -->
            </div><!-- end hotel-details -->
        </section><!-- end innerpage-wrapper -->
        <!-- start modal -->
        <div class="hotel-show">
            <div class="modal-dialog modal-md" >
                <div class="cloose"><i class="fa fa-window-close"></i></div>
                <div class="detail-slider">
                    <div class="feature-slider">
                    @foreach($gallery as $g)
                        @if($g->hotel_id == $hotel->id)
                        <div><img src="{{asset('storage/uploads/gallery/'.$g->image)}}" class="img-responsive" alt="feature-img"/></div>
                        @endif
                    @endforeach
                    </div><!-- end feature-slider -->    
                    <div class="feature-slider-nav">
                    @foreach($gallery as $g)
                        @if($g->hotel_id == $hotel->id)
                        <div><img src="{{asset('storage/uploads/gallery/'.$g->image)}}" class="img-responsive" alt="feature-thumb"/></div>
                        @endif
                    @endforeach
                    </div><!-- end feature-slider-nav -->
                </div>  <!-- end detail-slider -->
            </div>
        </div><!-- end modal --> 
    @endif
@endsection
@include('site.pages.hotel.scripts')