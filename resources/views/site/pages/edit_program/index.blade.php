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
    <!--============= PAGE-COVER =============-->
    <section class="page-cover">
        <div class="container">
            <div class="row">
                @if(Config::get('app.locale') == 'ar')
                <div class="col-sm-12">
                    <h1 class="page-title">الصفحة الشخصية</h1>
                    <ul class="breadcrumb">
                        <li><a href="{{route('site.home')}}">الرئيسية</a></li>
                        <li class="active">الصفحة الشخصية</li>
                    </ul>
                </div><!-- end columns -->
                @elseif(Config::get('app.locale') == 'en')
                <div class="col-sm-12">
                    <h1 class="page-title">Profile</h1>
                    <ul class="breadcrumb">
                        <li><a href="{{route('site.home')}}">Home</a></li>
                        <li class="active">Profile</li>
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
        	<div id="dashboard" class="innerpage-section-padding">
                <div class="container">
                    <div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="dashboard-wrapper">
                            	<div class="row">
                                	<div class="col-xs-12 col-sm-2 col-md-2 dashboard-nav">
                                		<ul class="nav nav-tabs nav-stacked text-center">
                                    		<li class="active"><a href="{{route('site.dashboard')}}"><span><i class="fa fa-cogs"></i></span>لوحة التحكم</a></li>
                                            <li><a href="{{route('site.tourProfile')}}"><span><i class="fa fa-user"></i></span>البروفايل</a></li>
                                            <li><a href="{{route('site.booking')}}"><span><i class="fa fa-briefcase"></i></span>الحجز</a></li>
                                        </ul>
                                    </div><!-- end columns -->
                                    
                                    <div class="col-xs-12 col-sm-10 col-md-10 dashboard-content user-profile">
                                        <div class="panel panel-default">
                                            <div class="panel-heading"><h4>اضافة برنامج</h4></div>
                                            <div class="panel-body">
                                            	<div class="row">
                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                        <div class="side-bar fullform">
                                                            <div class="booking-form booking-form-block">
                                                                <form method="post" id="program_form" enctype="multipart/form-data">
                                                                    {{csrf_field()}}
                                                                    <div class="col-lg-12">
                                                                        <div class="user-img-upload">
                                                                            <div class="fileUpload user-editimg">
                                                                                <span><i class="fa fa-camera"></i> اضافة</span>
                                                                                <input type="file" id="imgInp" class="upload" name="image">
                                                                                <input type="hidden" value="program" name="storage" >
                                                                            </div>
                                                                            @if($program->image != null)
                                                                            <img src="{{asset('storage/uploads/program/'.$program->image)}}" id="blah" class="img-circle" alt="">
                                                                            @else
                                                                            <img src="{{asset('vendors/site/AR/images/hotel-detail-tab-5.jpg')}}" id="blah" class="img-circle" alt="">
                                                                            @endif
                                                                            <p></p><hr>
                                                                        </div>
                                                                    </div><!-- col-12 -->
                                                                    <div class="row">
                                                                        <div class="col-sm-6 col-md-12 col-lg-6 no-sp-r">
                                                                            <div class="form-group">
                                                                                <label class="control-label">اسم البرنامج باللغة العربية</label>
                                                                                <input class="form-control" type="text" name="p_name_ar" value="{{$program->p_name_ar}}" placeholder="اسم البرنامج باللغة العربية">                                    
                                                                                <input type="hidden" name="program_id" value="{{$program->id}}"> 
                                                                                <input class="form-control" type="hidden" name="user_id" value="{{Auth::guard('members')->user()->id}}" >
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-sm-6 col-md-12 col-lg-6 no-sp-r">
                                                                            <div class="form-group">
                                                                                <label class="control-label">اسم البرنامج باللغة الانجليزية</label>
                                                                                <input class="form-control" type="text" name="p_name_en" value="{{$program->p_name_en}}" placeholder="اسم البرنامج باللغة الانجليزية">                                    
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-sm-6 col-md-12 col-lg-6 no-sp-r">
                                                                            <div class="form-group">
                                                                                <label class="control-label">مدة الرحلة باللغة العربية</label>
                                                                                <input class="form-control" type="text" name="sub_name_ar" value="{{$program->sub_name_ar}}" placeholder="مدة الرحلة باللغة العربية">                                    
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-sm-6 col-md-12 col-lg-6 no-sp-r">
                                                                            <div class="form-group">
                                                                                <label class="control-label">مدة الرحلة باللغة الانجليزية</label>
                                                                                <input class="form-control" type="text" name="sub_name_en" value="{{$program->sub_name_en}}" placeholder="مدة الرحلة باللغة الانجليزية">                                    
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-sm-6 col-md-12 col-lg-6 no-sp-r">
                                                                            <div class="form-group">
                                                                                <label class="control-label">عدد الليالى فى مكة باللغة العربية</label>
                                                                                <input class="form-control" type="text" name="mekkah_ar" value="{{$program->mekkah_ar}}" placeholder="عدد الليالى فى مكة باللغة العربية">                                    
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-sm-6 col-md-12 col-lg-6 no-sp-r">
                                                                            <div class="form-group">
                                                                                <label class="control-label">عدد الليالى فى مكة باللغة الانجليزية</label>
                                                                                <input class="form-control" type="text" name="mekkah_en" value="{{$program->mekkah_en}}" placeholder="عدد الليالى باللغة فى مكة الانجليزية">                                    
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-6 col-md-12 col-lg-6 no-sp-r">
                                                                            <div class="form-group">
                                                                                <label class="control-label">عدد الليالى فى المدينة باللغة العربية</label>
                                                                                <input class="form-control" type="text" name="madenah_ar" value="{{$program->madenah_ar}}" placeholder="عدد الليالى فى المدينة باللغة العربية">                                    
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-sm-6 col-md-12 col-lg-6 no-sp-r">
                                                                            <div class="form-group">
                                                                                <label class="control-label">عدد الليالى فى المدينة باللغة الانجليزية</label>
                                                                                <input class="form-control" type="text" name="madenah_en" value="{{$program->madenah_en}}" placeholder="عدد الليالى فى المدينة باللغة الانجليزية">                                    
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-6 col-md-12 col-lg-6 no-sp-r">
                                                                            <div class="form-group">
                                                                                <label class="control-label">عدد الليالى فى جدة باللغة العربية</label>
                                                                                <input class="form-control" type="text" name="jeddah_ar" value="{{$program->jeddah_ar}}" placeholder="عدد الليالى فى جدة باللغة العربية">                                    
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-sm-6 col-md-12 col-lg-6 no-sp-r">
                                                                            <div class="form-group">
                                                                                <label class="control-label">عدد الليالى فى جدة باللغة الانجليزية</label>
                                                                                <input class="form-control" type="text" name="jeddah_en" value="{{$program->jeddah_en}}" placeholder="عدد الليالى فى جدة باللغة الانجليزية">                                    
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-6 col-md-12 col-lg-6 no-sp-r">
                                                                            <div class="form-group">
                                                                                <label class="control-label">التقييم</label>
                                                                                <input class="form-control" type="number" name="rate" value="{{$program->rate}}" placeholder="التقييم">                                    
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-6 col-md-12 col-lg-6 no-sp-r">
                                                                            <div class="form-group">
                                                                                <label class="control-label">السعر</label>
                                                                                <input class="form-control" type="number" name="price" value="{{$program->price}}" placeholder="السعر">                                    
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-6 col-md-12 col-lg-6 no-sp-r">
                                                                            <div class="form-group">
                                                                                <label class="control-label">الكود</label>
                                                                                <input class="form-control" type="text" name="code" value="{{$program->code}}" placeholder="الكود">                                    
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-6 col-md-12 col-lg-6 no-sp-r">
                                                                            <div class="form-group rs-select2">
                                                                                <label class="control-label">اختر الفنادق</label>
                                                                                <select class="select2" name="hotel[]" multiple>
                                                                                    @foreach($hotelss as $hh)
                                                                                        <option selected value="{{$hh->id}}">{{$hh->hotel_name_ar}}</option>
                                                                                    @endforeach
                                                                                    @foreach($hotels as $h)
                                                                                        <option value="{{$h->id}}">{{$h->hotel_name_ar}}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-6 col-md-12 col-lg-6 no-sp-r">
                                                                            <div class="form-group rs-select2">
                                                                                <label class="control-label">اختر رحلات الطيران</label>
                                                                                <select class="select2" name="flight[]" multiple>
                                                                                    @foreach($flightss as $f)
                                                                                        <option selected value="{{$f->id}}">{{$f->flight_name_ar}}</option>
                                                                                    @endforeach
                                                                                    @foreach($flights as $flight)
                                                                                        <option value="{{$flight->id}}">{{$flight->flight_name_ar}}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-6 col-md-12 col-lg-6 no-sp-r">
                                                                            <div class="form-group rs-select2">
                                                                                <label class="control-label">اختر الخدمات</label>
                                                                                <select class="select2" name="service[]" multiple>
                                                                                    @foreach($servicess as $s)
                                                                                        <option selected value="{{$s->id}}">{{$s->name_ar}}</option>
                                                                                    @endforeach
                                                                                    @foreach($services as $service)
                                                                                        <option value="{{$service->id}}">{{$service->name_ar}}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-6 col-md-12 col-lg-6 no-sp-r">
                                                                            <div class="form-group">
                                                                                <label class="control-label">تفاصيل الفنادق باللغة العربية</label>
                                                                                <textarea class="form-control" type="text" name="hotel_ar" id="hotel_ar">{{$program->hotel_ar}}</textarea>                                    
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-sm-6 col-md-12 col-lg-6 no-sp-r">
                                                                            <div class="form-group">
                                                                                <label class="control-label">تفاصيل الفنادق باللغة الانجليزية</label>
                                                                                <textarea class="form-control" type="text" name="hotel_en" id="hotel_en">{{$program->hotel_en}}</textarea>                                    
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-6 col-md-12 col-lg-6 no-sp-r">
                                                                            <div class="form-group">
                                                                                <label class="control-label">تفاصيل الرحلات باللغة العربية</label>
                                                                                <textarea class="form-control" type="text" name="flight_ar" id="flight_ar">{{$program->flight_ar}}</textarea>                                    
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-sm-6 col-md-12 col-lg-6 no-sp-r">
                                                                            <div class="form-group">
                                                                                <label class="control-label">تفاصيل الرحلات باللغة الانجليزية</label>
                                                                                <textarea class="form-control" type="text" name="flight_en" id="flight_en">{{$program->flight_en}}</textarea>                                    
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-6 col-md-12 col-lg-6 no-sp-r">
                                                                            <div class="form-group">
                                                                                <label class="control-label">تفاصيل الخدمات باللغة العربية</label>
                                                                                <textarea class="form-control" type="text" name="service_ar" id="service_ar">{{$program->service_ar}}</textarea>                                    
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-sm-6 col-md-12 col-lg-6 no-sp-r">
                                                                            <div class="form-group">
                                                                                <label class="control-label">تفاصيل الخدمات باللغة الانجليزية</label>
                                                                                <textarea class="form-control" type="text" name="service_en" id="service_en">{{$program->service_en}}</textarea>                                    
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-6 col-md-12 col-lg-6 no-sp-r">
                                                                            <div class="checkbox custom-check">
                                                                                <input type="checkbox" id="check01" name="checkbox"/>
                                                                                <label for="check01"><span><i class="fa fa-check"></i></span>للاستمرار , انت موافق على <a href="#">الشروط والاحكام.</a></label>
                                                                            </div>                                   
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <button type="submit" class="btn btn-block btn-orange">حفظ</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><!-- end row -->
                                            </div><!-- end panel-body -->
                                        </div><!-- end panel-detault -->
                                    </div><!-- end columns -->
                                </div><!-- end row -->
                            </div><!-- end dashboard-wrapper -->
                        </div><!-- end columns -->
                    </div><!-- end row -->
                </div><!-- end container -->          
            </div><!-- end dashboard -->
        </section><!-- end innerpage-wrapper -->
    @elseif(Config::get('app.locale') == 'en')
    <!--===== INNERPAGE-WRAPPER ====-->
        <section class="innerpage-wrapper">
        	<div id="dashboard" class="innerpage-section-padding">
                <div class="container">
                    <div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="dashboard-wrapper">
                            	<div class="row">
                                
                                	<div class="col-xs-12 col-sm-2 col-md-2 dashboard-nav">
                                		<ul class="nav nav-tabs nav-stacked text-center">
                                            <li class="active"><a href="{{route('site.dashboard')}}"><span><i class="fa fa-cogs"></i></span>Dashboard</a></li>
                                            <li><a href="{{route('site.tourProfile')}}"><span><i class="fa fa-user"></i></span>Profile</a></li>
                                            <li><a href="{{route('site.booking')}}"><span><i class="fa fa-briefcase"></i></span>Booking</a></li>
                                        </ul>
                                    </div><!-- end columns -->
                                    
                                    <div class="col-xs-12 col-sm-10 col-md-10 dashboard-content user-profile">
                                        <div class="panel panel-default">
                                            <div class="panel-heading"><h4>Add Program</h4></div>
                                            <div class="panel-body">
                                            	<div class="row">
                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                        <div class="side-bar fullform">
                                                            <div class="booking-form booking-form-block">
                                                                <form method="post" id="program_form" enctype="multipart/form-data">
                                                                    {{csrf_field()}}
                                                                    <div class="col-lg-12">
                                                                        <div class="user-img-upload">
                                                                            <div class="fileUpload user-editimg">
                                                                                <span><i class="fa fa-camera"></i> Add</span>
                                                                                <input type="file" id="imgInp" class="upload" name="image">
                                                                                <input type="hidden" value="program" name="storage" >
                                                                            </div>
                                                                            <img src="{{asset('vendors/site/AR/images/hotel-detail-tab-5.jpg')}}" id="blah" class="img-circle" alt="">
                                                                            <p></p><hr>
                                                                        </div>
                                                                    </div><!-- col-12 -->
                                                                    <div class="row">
                                                                        <div class="col-sm-6 col-md-12 col-lg-6 no-sp-r">
                                                                            <div class="form-group">
                                                                                <label class="control-label">Arabic Program Name</label>
                                                                                <input class="form-control" type="text" name="p_name_ar" value="{{$program->p_name_ar}}" placeholder="Arabic Program Name">      
                                                                                <input type="hidden" name="program_id" value="{{$program->id}}">   
                                                                                <input class="form-control" type="hidden" name="user_id" value="{{Auth::guard('members')->user()->id}}" >                            
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-sm-6 col-md-12 col-lg-6 no-sp-r">
                                                                            <div class="form-group">
                                                                                <label class="control-label">English Program Name</label>
                                                                                <input class="form-control" type="text" name="p_name_en" value="{{$program->p_name_en}}" placeholder="English Program Name">                                    
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-sm-6 col-md-12 col-lg-6 no-sp-r">
                                                                            <div class="form-group">
                                                                                <label class="control-label">Arabic Duration Name</label>
                                                                                <input class="form-control" type="text" name="sub_name_ar" value="{{$program->sub_name_ar}}" placeholder="Arabic duration Name">                                    
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-sm-6 col-md-12 col-lg-6 no-sp-r">
                                                                            <div class="form-group">
                                                                                <label class="control-label">English Duration Name</label>
                                                                                <input class="form-control" type="text" name="sub_name_en" value="{{$program->sub_name_en}}" placeholder="English duration Name">                                    
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-sm-6 col-md-12 col-lg-6 no-sp-r">
                                                                            <div class="form-group">
                                                                                <label class="control-label">Arabic Duration in Mekkah</label>
                                                                                <input class="form-control" type="text" name="mekkah_ar" value="{{$program->mekkah_ar}}" placeholder="Arabic Duration in Mekkah">                                    
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-sm-6 col-md-12 col-lg-6 no-sp-r">
                                                                            <div class="form-group">
                                                                                <label class="control-label">English Duration in Mekkah</label>
                                                                                <input class="form-control" type="text" name="mekkah_en" value="{{$program->mekkah_en}}" placeholder="English Duration in Mekkah">                                    
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-sm-6 col-md-12 col-lg-6 no-sp-r">
                                                                            <div class="form-group">
                                                                                <label class="control-label">Arabic Duration in Madinah</label>
                                                                                <input class="form-control" type="text" name="madenah_ar" value="{{$program->madenah_ar}}" placeholder="Arabic Duration in Madinah">                                    
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-sm-6 col-md-12 col-lg-6 no-sp-r">
                                                                            <div class="form-group">
                                                                                <label class="control-label">English Duration in Madinah</label>
                                                                                <input class="form-control" type="text" name="madenah_en" value="{{$program->madenah_en}}" placeholder="English Duration in Madinah">                                    
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-sm-6 col-md-12 col-lg-6 no-sp-r">
                                                                            <div class="form-group">
                                                                                <label class="control-label">Arabic Duration in Jeddah</label>
                                                                                <input class="form-control" type="text" name="jeddah_ar" value="{{$program->jeddah_ar}}" placeholder="Arabic Duration in Jeddah">                                    
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-sm-6 col-md-12 col-lg-6 no-sp-r">
                                                                            <div class="form-group">
                                                                                <label class="control-label">English Duration in Jeddah</label>
                                                                                <input class="form-control" type="text" name="jeddah_en" value="{{$program->jeddah_en}}" placeholder="English Duration in Jeddah">                                    
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-6 col-md-12 col-lg-6 no-sp-r">
                                                                            <div class="form-group">
                                                                                <label class="control-label">Stars</label>
                                                                                <input class="form-control" type="number" name="stars" value="{{$program->stars}}" placeholder="Stars">                                    
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-6 col-md-12 col-lg-6 no-sp-r">
                                                                            <div class="form-group">
                                                                                <label class="control-label">Price</label>
                                                                                <input class="form-control" type="number" name="price" value="{{$program->price}}" placeholder="Price">                                    
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-6 col-md-12 col-lg-6 no-sp-r">
                                                                            <div class="form-group">
                                                                                <label class="control-label">Discount</label>
                                                                                <input class="form-control" type="number" name="discount" value="{{$program->discount}}" placeholder="Discount">                                    
                                                                            </div>
                                                                        </div>
                                                                        
                                                                        <div class="col-sm-6 col-md-12 col-lg-6 no-sp-r">
                                                                            <div class="form-group rs-select2">
                                                                                <label class="control-label">Choose Hotels</label>
                                                                                <select class="select2" name="hotel[]" multiple>
                                                                                    @foreach($hotelss as $hotel)
                                                                                    <option selected value="{{$hotel->id}}">{{$hotel->hotel_name_en}}</option>
                                                                                    @endforeach
                                                                                    @foreach($hotels as $hotel)
                                                                                    <option value="{{$hotel->id}}">{{$hotel->hotel_name_en}}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-6 col-md-12 col-lg-6 no-sp-r">
                                                                            <div class="form-group rs-select2">
                                                                                <label class="control-label">Choose Flights</label>
                                                                                <select class="select2" name="flight[]" multiple>
                                                                                    @foreach($flightss as $flight)
                                                                                    <option selected value="{{$flight->id}}">{{$flight->flight_name_en}}</option>
                                                                                    @endforeach
                                                                                    @foreach($flights as $flight)
                                                                                    <option value="{{$flight->id}}">{{$flight->flight_name_en}}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-6 col-md-12 col-lg-6 no-sp-r">
                                                                            <div class="form-group rs-select2">
                                                                                <label class="control-label">Choose Services</label>
                                                                                <select class="select2" name="service[]" multiple>
                                                                                    @foreach($servicess as $service)
                                                                                    <option selected value="{{$service->id}}">{{$service->name_en}}</option>
                                                                                    @endforeach
                                                                                    @foreach($services as $service)
                                                                                    <option value="{{$service->id}}">{{$service->name_en}}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-6 col-md-12 col-lg-6 no-sp-r">
                                                                            <div class="form-group">
                                                                                <label class="control-label">Arabic Hotels Details</label>
                                                                                <textarea class="form-control" type="text" name="hotel_ar">{{$program->hotel_ar}}</textarea>                                    
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-sm-6 col-md-12 col-lg-6 no-sp-r">
                                                                            <div class="form-group">
                                                                                <label class="control-label">English Hotels Details</label>
                                                                                <textarea class="form-control" type="text" name="hotel_en">{{$program->hotel_en}}</textarea>                                    
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-6 col-md-12 col-lg-6 no-sp-r">
                                                                            <div class="form-group">
                                                                                <label class="control-label">Arabic Flights Details</label>
                                                                                <textarea class="form-control" type="text" name="flight_ar">{{$program->flight_ar}}</textarea>                                    
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-sm-6 col-md-12 col-lg-6 no-sp-r">
                                                                            <div class="form-group">
                                                                                <label class="control-label">English Flights Details</label>
                                                                                <textarea class="form-control" type="text" name="flight_en">{{$program->flight_en}}</textarea>                                    
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-6 col-md-12 col-lg-6 no-sp-r">
                                                                            <div class="form-group">
                                                                                <label class="control-label">Arabic Services Details</label>
                                                                                <textarea class="form-control" type="text" name="service_ar">{{$program->service_ar}}</textarea>                                    
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-sm-6 col-md-12 col-lg-6 no-sp-r">
                                                                            <div class="form-group">
                                                                                <label class="control-label">English Services Details</label>
                                                                                <textarea class="form-control" type="text" name="service_en">{{$program->service_en}}</textarea>                                    
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-6 col-md-12 col-lg-6 no-sp-r">
                                                                            <div class="checkbox custom-check">
                                                                                <input type="checkbox" id="check01" name="checkbox"/>
                                                                                <label for="check01"><span><i class="fa fa-check"></i></span>By continuing, you are agree to the <a href="#">Terms & Conditions.</a></label>
                                                                            </div>                                   
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <button type="submit" class="btn btn-block btn-orange">Submit</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><!-- end row -->
                                            </div><!-- end panel-body -->
                                        </div><!-- end panel-detault -->
                                    </div><!-- end columns -->
                                </div><!-- end row -->
                            </div><!-- end dashboard-wrapper -->
                        </div><!-- end columns -->
                    </div><!-- end row -->
                </div><!-- end container -->          
            </div><!-- end dashboard -->
        </section><!-- end innerpage-wrapper -->
    @endif
@endsection
@include('site.pages.edit_program.scripts')