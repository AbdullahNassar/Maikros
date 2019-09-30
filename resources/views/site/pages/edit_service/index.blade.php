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
                                            <li><a href="{{route('site.companyProfile')}}"><span><i class="fa fa-user"></i></span>البروفايل</a></li>
                                            <li><a href="{{route('site.booking')}}"><span><i class="fa fa-briefcase"></i></span>الحجز</a></li>
                                        </ul>
                                    </div><!-- end columns -->
                                    
                                    <div class="col-xs-12 col-sm-10 col-md-10 dashboard-content user-profile">
                                        <div class="panel panel-default">
                                            <div class="panel-heading"><h4>تعديل خدمة</h4></div>
                                            <div class="panel-body">
                                            	<div class="row">
                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                        <div class="side-bar fullform">
                                                            <div class="booking-form booking-form-block">
                                                                <form method="post" id="service_form" enctype="multipart/form-data">
                                                                    {{csrf_field()}}
                                                                    <div class="col-lg-12">
                                                                        <div class="user-img-upload">
                                                                            <div class="fileUpload user-editimg">
                                                                                <span><i class="fa fa-camera"></i> تغيير</span>
                                                                                <input type="file" id="imgInp" class="upload" name="image" value="{{$service->image}}">
                                                                                <input type="hidden" value="service" name="storage" >
                                                                            </div>
                                                                            @if($service->image != null)
                                                                            <img src="{{asset('storage/uploads/service/'.$service->image)}}" id="blah" class="img-circle" alt="">
                                                                            @else
                                                                            <img src="{{asset('vendors/site/AR/images/hotel-detail-tab-5.jpg')}}" id="blah" class="img-circle" alt="">
                                                                            @endif
                                                                            <p></p><hr>
                                                                        </div>
                                                                    </div><!-- col-12 -->
                                                                    <div class="row">
                                                                        <div class="col-sm-6 col-md-12 col-lg-6 no-sp-r">
                                                                            <div class="form-group">
                                                                                <label class="control-label">اسم الخدمة باللغة العربية</label>
                                                                                <input class="form-control" type="text" name="name_ar" value="{{$service->name_ar}}" placeholder="اسم الخدمة باللغة العربية">                                    
                                                                                <input type="hidden" name="service_id" value="{{$service->id}}">  
                                                                                <input class="form-control" type="hidden" name="user_id" value="{{Auth::guard('members')->user()->id}}" >
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-sm-6 col-md-12 col-lg-6 no-sp-r">
                                                                            <div class="form-group">
                                                                                <label class="control-label">اسم الخدمة باللغة الانجليزية</label>
                                                                                <input class="form-control" type="text" name="name_en" value="{{$service->name_en}}" placeholder="اسم الخدمة باللغة الانجليزية">                                    
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-sm-6 col-md-12 col-lg-6 no-sp-r">
                                                                            <div class="form-group">
                                                                                <label class="control-label">التقييم</label>
                                                                                <input class="form-control" type="number" name="rate" value="{{$service->rate}}" placeholder="التقييم">                                    
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-6 col-md-12 col-lg-6 no-sp-r">
                                                                            <div class="form-group">
                                                                                <label class="control-label">السعر</label>
                                                                                <input class="form-control" type="number" name="price" value="{{$service->price}}" placeholder="السعر">                                    
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-6 col-md-12 col-lg-6 no-sp-r">
                                                                            <div class="form-group">
                                                                                <label class="control-label">الخصم</label>
                                                                                <input class="form-control" type="text" name="discount" value="{{$service->discount}}" placeholder="الخصم">                                    
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-6 col-md-12 col-lg-6 no-sp-r">
                                                                            <div class="form-group rs-select2">
                                                                                <label class="control-label">اختر المدينة</label>
                                                                                <select class="select2" name="place_id">
                                                                                    <option selected value="{{$place->id}}">{{$place->place_name_ar}}</option>
                                                                                    @foreach($places as $place)
                                                                                    <option value="{{$place->id}}">{{$place->place_name_ar}}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-6 col-md-12 col-lg-6 no-sp-r">
                                                                            <div class="form-group">
                                                                                <label class="control-label">تفاصيل الخدمة باللغة العربية</label>
                                                                                <textarea class="form-control" type="text" name="content_ar">{{$service->content_ar}}</textarea>                                    
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-sm-6 col-md-12 col-lg-6 no-sp-r">
                                                                            <div class="form-group">
                                                                                <label class="control-label">تفاصيل الخدمة باللغة الانجليزية</label>
                                                                                <textarea class="form-control" type="text" name="content_en">{{$service->content_en}}</textarea>                                    
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
                                            <div class="panel-heading"><h4>المميزات</h4></div>
                                            <div class="panel-body">
                                            	<div class="row">
                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                        <div class="table-responsive">
                                                            <table class="table table-striped">
                                                                <tbody>
                                                                    <tr>
                                                                        <td>الاسم</td>
                                                                        <td>العمليات</td>
                                                                    </tr>
                                                                    @foreach($features as $feature)
                                                                    <tr>
                                                                        <td>{{$feature->f_name_ar}}</td>
                                                                        <td><a href="{{route('site.deleteServiceFeature' , ['id' => $feature->id])}}" class="btn btn-orange btn-lg">حذف</a></td>
                                                                    </tr>
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div><!-- end table-responsive -->
                                                    </div>
                                                </div><!-- end row -->
                                            </div><!-- end panel-body -->
                                            <div class="panel-heading"><h4>معرض الصور</h4></div>
                                            <div class="panel-body">
                                            	<div class="row">
                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                        <div class="side-bar fullform">
                                                            <div class="booking-form booking-form-block">
                                                                    <div class="row">
                                                                        <div class="col-lg-12">
                                                                            <form method="post" enctype="multipart/form-data" action="{{route('site.addServiceImages', ['id' => $service->id])}}" class="dropzone" id="my-dropzone">
                                                                                {{csrf_field()}}
                                                                                <div class="row mg-b-25">
                                                                                    <div class="col-lg-12">
                                                                                        <div class="form-group">
                                                                                            <div class="form-field">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div><!-- row -->
                                                                            </form><br><br><br>
                                                                        </div><!-- col-12 -->
                                                                    </div>
                                                                    <div class="row">
                                                                        @foreach($images as $image)
                                                                        <div class="col-xs-6 col-sm-6 col-md-4">
                                                                            <div class="main-block hotel-block">
                                                                                <div class="main-img">
                                                                                    <a href="#">
                                                                                        <img src="{{asset('storage/uploads/gallery/'.$image->image)}}" class="img-responsive" alt="hotel-img" />
                                                                                    </a>
                                                                                </div><!-- end offer-img -->

                                                                                <div class="main-info hotel-info">
                                                                                    <div class="grid-btn">
                                                                                        <a href="{{route('site.deleteServiceImages' , ['id' => $image->id])}}" class="btn btn-orange btn-block btn-lg">حذف</a>
                                                                                    </div><!-- end grid-btn -->
                                                                                </div>
                                                                            </div><!-- end hotel-block -->
                                                                        </div>
                                                                        @endforeach
                                                                    </div>
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
                                            <li  class="active"><a href="{{route('site.dashboard')}}"><span><i class="fa fa-cogs"></i></span>Dashboard</a></li>
                                            <li><a href="{{route('site.companyProfile')}}"><span><i class="fa fa-user"></i></span>Profile</a></li>
                                            <li><a href="{{route('site.booking')}}"><span><i class="fa fa-briefcase"></i></span>Booking</a></li>
                                        </ul>
                                    </div><!-- end columns -->
                                    
                                    <div class="col-xs-12 col-sm-10 col-md-10 dashboard-content user-profile">
                                        <div class="panel panel-default">
                                            <div class="panel-heading"><h4>Edit Service</h4></div>
                                            <div class="panel-body">
                                            	<div class="row">
                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                        <div class="side-bar fullform">
                                                            <div class="booking-form booking-form-block">
                                                                <form method="post" id="service_form" enctype="multipart/form-data">
                                                                    {{csrf_field()}}
                                                                    <div class="col-lg-12">
                                                                        <div class="user-img-upload">
                                                                            <div class="fileUpload user-editimg">
                                                                                <span><i class="fa fa-camera"></i> Edit</span>
                                                                                <input type="file" id="imgInp" class="upload" name="image" value="{{$service->image}}">
                                                                                <input type="hidden" value="service" name="storage" >
                                                                            </div>
                                                                            @if($service->image != null)
                                                                            <img src="{{asset('storage/uploads/service/'.$service->image)}}" id="blah" class="img-circle" alt="">
                                                                            @else
                                                                            <img src="{{asset('vendors/site/AR/images/hotel-detail-tab-5.jpg')}}" id="blah" class="img-circle" alt="">
                                                                            @endif
                                                                            <p></p><hr>
                                                                        </div>
                                                                    </div><!-- col-12 -->
                                                                    <div class="row">
                                                                        <div class="col-sm-6 col-md-12 col-lg-6 no-sp-r">
                                                                            <div class="form-group">
                                                                                <label class="control-label">Arabic Service Name</label>
                                                                                <input class="form-control" type="text" name="name_ar" value="{{$service->name_ar}}" placeholder="Arabic Service Name">
                                                                                <input type="hidden" name="service_id" value="{{$service->id}}">      
                                                                                <input class="form-control" type="hidden" name="user_id" value="{{Auth::guard('members')->user()->id}}" >                              
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-sm-6 col-md-12 col-lg-6 no-sp-r">
                                                                            <div class="form-group">
                                                                                <label class="control-label">English Service Name</label>
                                                                                <input class="form-control" type="text" name="name_en" value="{{$service->name_en}}" placeholder="English Service Name">                                    
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-sm-6 col-md-12 col-lg-6 no-sp-r">
                                                                            <div class="form-group">
                                                                                <label class="control-label">Rate</label>
                                                                                <input class="form-control" type="number" name="rate" value="{{$service->rate}}" placeholder="Rate">                                    
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-6 col-md-12 col-lg-6 no-sp-r">
                                                                            <div class="form-group">
                                                                                <label class="control-label">Price</label>
                                                                                <input class="form-control" type="number" name="price" value="{{$service->price}}" placeholder="Price">                                    
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-6 col-md-12 col-lg-6 no-sp-r">
                                                                            <div class="form-group">
                                                                                <label class="control-label">Discount</label>
                                                                                <input class="form-control" type="number" name="discount" value="{{$service->discount}}" placeholder="Discount">                                    
                                                                            </div>
                                                                        </div>
                                                                        
                                                                        <div class="col-sm-6 col-md-12 col-lg-6 no-sp-r">
                                                                            <div class="form-group rs-select2">
                                                                                <label class="control-label">Choose City</label>
                                                                                <select class="select2" name="place_id">
                                                                                    <option selected value="{{$place->id}}">{{$place->place_name_en}}</option>
                                                                                    @foreach($places as $place)
                                                                                    <option value="{{$place->id}}">{{$place->place_name_en}}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-6 col-md-12 col-lg-6 no-sp-r">
                                                                            <div class="form-group">
                                                                                <label class="control-label">Arabic Service Details</label>
                                                                                <textarea class="form-control" type="text" name="content_ar">{{$service->content_ar}}</textarea>                                    
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-sm-6 col-md-12 col-lg-6 no-sp-r">
                                                                            <div class="form-group">
                                                                                <label class="control-label">English Service Details</label>
                                                                                <textarea class="form-control" type="text" name="content_en">{{$service->content_en}}</textarea>                                    
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
                                            <div class="panel-heading"><h4>Features</h4></div>
                                            <div class="panel-body">
                                            	<div class="row">
                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                        <div class="table-responsive">
                                                            <table class="table table-striped">
                                                                <tbody>
                                                                    <tr>
                                                                        <td>Name</td>
                                                                        <td>Actions</td>
                                                                    </tr>
                                                                    @foreach($features as $feature)
                                                                    <tr>
                                                                        <td>{{$feature->f_name_en}}</td>
                                                                        <td><a href="{{route('site.deleteServiceFeature' , ['id' => $feature->id])}}" class="btn btn-orange btn-lg">Delete</a></td>
                                                                    </tr>
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div><!-- end table-responsive -->
                                                    </div>
                                                </div><!-- end row -->
                                            </div><!-- end panel-body -->
                                            <div class="panel-heading"><h4>Hotel Gallery</h4></div>
                                            <div class="panel-body">
                                            	<div class="row">
                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                        <div class="side-bar fullform">
                                                            <div class="booking-form booking-form-block">
                                                                    <div class="row">
                                                                        <div class="col-lg-12">
                                                                            <form method="post" enctype="multipart/form-data" action="{{route('site.addServiceImages', ['id' => $service->id])}}" class="dropzone" id="my-dropzone">
                                                                                {{csrf_field()}}
                                                                                <div class="row mg-b-25">
                                                                                    <div class="col-lg-12">
                                                                                        <div class="form-group">
                                                                                            <div class="form-field">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div><!-- row -->
                                                                            </form><br><br><br>
                                                                        </div><!-- col-12 -->
                                                                    </div>
                                                                    <div class="row">
                                                                        @foreach($images as $image)
                                                                        <div class="col-xs-6 col-sm-6 col-md-4">
                                                                            <div class="main-block hotel-block">
                                                                                <div class="main-img">
                                                                                    <a href="#">
                                                                                        <img src="{{asset('storage/uploads/gallery/'.$image->image)}}" class="img-responsive" alt="hotel-img" />
                                                                                    </a>
                                                                                </div><!-- end offer-img -->

                                                                                <div class="main-info hotel-info">
                                                                                    <div class="grid-btn">
                                                                                        <a href="{{route('site.deleteServiceImages' , ['id' => $image->id])}}" class="btn btn-orange btn-block btn-lg">Delete</a>
                                                                                    </div><!-- end grid-btn -->
                                                                                </div>
                                                                            </div><!-- end hotel-block -->
                                                                        </div>
                                                                        @endforeach
                                                                    </div>
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
@include('site.pages.edit_service.scripts')