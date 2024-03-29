@extends('admin.layouts.master')
@section('meta')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="author" content="ThemePixels">
    <meta name="csrf_token" content="{{csrf_token()}}">
@endsection
@section('title','Users')
@section('styles')
    <link href="{{asset('vendors/lib/font-awesome/css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{asset('vendors/lib/Ionicons/css/ionicons.css')}}" rel="stylesheet">
    <link href="{{asset('vendors/lib/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet">
    <link href="{{asset('vendors/lib/jquery-switchbutton/jquery.switchButton.css')}}" rel="stylesheet">
    <link href="{{asset('vendors/lib/highlightjs/github.css')}}" rel="stylesheet">
    <link href="{{asset('vendors/lib/datatables/jquery.dataTables.css')}}" rel="stylesheet">
    <link href="{{asset('vendors/lib/select2/css/select2.min.css')}}" rel="stylesheet">
    <link href="{{asset('vendors/css/bootstrap-toggle.min.css')}}" rel="stylesheet">
    <link href="{{asset('vendors/lib/jt.timepicker/jquery.timepicker.css')}}" rel="stylesheet">
    <link href="{{asset('vendors/lib/spectrum/spectrum.css')}}" rel="stylesheet">
    <link href="{{asset('vendors/lib/bootstrap-tagsinput/bootstrap-tagsinput.css')}}" rel="stylesheet">
    <link href="{{asset('vendors/lib/ion.rangeSlider/css/ion.rangeSlider.css')}}" rel="stylesheet">
    <link href="{{asset('vendors/lib/ion.rangeSlider/css/ion.rangeSlider.skinFlat.css')}}" rel="stylesheet">
    
    <!-- Bracket CSS -->
    <link rel="stylesheet" href="{{asset('vendors/css/bracket.css')}}">
    <link href="{{asset('vendors/toastr/toastr.min.css')}}" rel="stylesheet">
    <link href="{{asset('vendors/css/float-labels.css')}}" rel="stylesheet">
@endsection
@section('content')
    <!-- br-mainpanel -->
    <div class="card shadow-base bd-0 rounded-0 widget-4">
            <div class="card-header ht-75">
              <div class="hidden-xs-down">
                <a href="" class="mg-r-10"><span class="tx-medium">498</span> Followers</a>
                <a href=""><span class="tx-medium">498</span> Following</a>
              </div>
              <div class="tx-24 hidden-xs-down">
                <a href="" class="mg-r-10"><i class="icon ion-ios-email-outline"></i></a>
                <a href=""><i class="icon ion-more"></i></a>
              </div>
            </div><!-- card-header -->
            <div class="card-body">
              <div class="card-profile-img">
                <img src="{{asset('storage/uploads/user').'/'.Auth::guard('admins')->user()->image}}" alt="">
              </div><!-- card-profile-img -->
              <h4 class="tx-normal tx-roboto tx-white">{{Auth::guard('admins')->user()->name}}</h4>
              <p class="mg-b-25">{{Auth::guard('admins')->user()->type}}</p>
    
              <p class="wd-md-500 mg-md-l-auto mg-md-r-auto mg-b-25">{{Auth::guard('admins')->user()->address}}</p>
    
              <p class="mg-b-0 tx-24">
                <a href="{{Auth::guard('admins')->user()->facebook}}" class="tx-white-8 mg-r-5"><i class="fa fa-facebook-official"></i></a>
                <a href="{{Auth::guard('admins')->user()->twitter}}" class="tx-white-8 mg-r-5"><i class="fa fa-twitter"></i></a>
                <a href="{{Auth::guard('admins')->user()->instagram}}" class="tx-white-8 mg-r-5"><i class="fa fa-instagram"></i></a>
                <a href="{{Auth::guard('admins')->user()->linkedin}}" class="tx-white-8"><i class="fa fa-linkedin"></i></a>
              </p>
            </div><!-- card-body -->
          </div><!-- card -->
    
          <div class="ht-70 bg-gray-100 pd-x-20 d-flex align-items-center justify-content-center shadow-base">
            <ul class="nav nav-outline active-info align-items-center flex-row" role="tablist">
              <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#posts" role="tab">Posts</a></li>
              <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#photos" role="tab">Photos</a></li>
              <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#" role="tab">Favorites</a></li>
              <li class="nav-item hidden-xs-down"><a class="nav-link" data-toggle="tab" href="#" role="tab">Settings</a></li>
            </ul>
          </div>
    
          <div class="tab-content br-profile-body">
            <div class="tab-pane fade active show" id="posts">
              <div class="row">
                <div class="col-lg-8">
                  <div class="media-list bg-white rounded shadow-base">
                    <div class="media pd-20 pd-xs-30">
                      <img src="http://via.placeholder.com/280x280" alt="" class="wd-40 rounded-circle">
                      <div class="media-body mg-l-20">
                        <div class="d-flex justify-content-between mg-b-10">
                          <div>
                            <h6 class="mg-b-2 tx-inverse tx-14">Louise Kate</h6>
                            <span class="tx-12 tx-gray-500">@louisekate</span>
                          </div>
                          <span class="tx-12">2 minutes ago</span>
                        </div><!-- d-flex -->
                        <p class="mg-b-20">The new common language will be more simple and regular than the existing European languages. It will be as simple as Occidental; in fact, it will be Occidental.</p>
                        <div class="media-footer">
                          <div>
                            <a href=""><i class="fa fa-heart"></i></a>
                            <a href="" class="mg-l-10"><i class="fa fa-comment"></i></a>
                            <a href="" class="mg-l-10"><i class="fa fa-retweet"></i></a>
                            <a href="" class="mg-l-10"><i class="fa fa-ellipsis-h"></i></a>
                          </div>
                        </div><!-- d-flex -->
                      </div><!-- media-body -->
                    </div><!-- media -->
                    <div class="media pd-20 pd-xs-30">
                      <img src="http://via.placeholder.com/280x280" alt="" class="wd-40 rounded-circle">
                      <div class="media-body mg-l-20">
                        <div class="d-flex justify-content-between mg-b-10">
                          <div>
                            <h6 class="mg-b-2 tx-inverse tx-14">Annie Lee</h6>
                            <span class="tx-12 tx-gray-500">@annielee</span>
                          </div>
                          <span class="tx-12">1 hour ago</span>
                        </div><!-- d-flex -->
                        <img src="http://via.placeholder.com/1000x400" class="img-fluid mg-b-10" alt="">
                        <div class="media-footer">
                          <div>
                            <a href=""><i class="fa fa-heart"></i></a>
                            <a href="" class="mg-l-10"><i class="fa fa-comment"></i></a>
                            <a href="" class="mg-l-10"><i class="fa fa-retweet"></i></a>
                            <a href="" class="mg-l-10"><i class="fa fa-ellipsis-h"></i></a>
                          </div>
                        </div><!-- d-flex -->
                      </div><!-- media-body -->
                    </div><!-- media -->
                    <div class="media pd-20 pd-xs-30">
                      <img src="http://via.placeholder.com/280x280" alt="" class="wd-40 rounded-circle">
                      <div class="media-body mg-l-20">
                        <div class="d-flex justify-content-between mg-b-10">
                          <div>
                            <h6 class="mg-b-2 tx-inverse tx-14">Annie Lee</h6>
                            <span class="tx-12 tx-gray-500">@annielee</span>
                          </div>
                          <span class="tx-12">2 hours ago</span>
                        </div><!-- d-flex -->
                        <p class="mg-b-20">To achieve this, it would be necessary to have uniform grammar, pronunciation and more common words.</p>
                        <div class="media-footer">
                          <div>
                            <a href=""><i class="fa fa-heart tx-danger"></i></a>
                            <a href="" class="mg-l-10"><i class="fa fa-comment"></i></a>
                            <a href="" class="mg-l-10"><i class="fa fa-retweet"></i></a>
                            <a href="" class="mg-l-10"><i class="fa fa-ellipsis-h"></i></a>
                          </div>
                        </div><!-- d-flex -->
                      </div><!-- media-body -->
                    </div><!-- media -->
                    <div class="media pd-20 pd-xs-30">
                      <img src="http://via.placeholder.com/280x280" alt="" class="wd-40 rounded-circle">
                      <div class="media-body mg-l-20">
                        <div class="d-flex justify-content-between mg-b-10">
                          <div>
                            <h6 class="mg-b-2 tx-inverse tx-14">Mark Anthony</h6>
                            <span class="tx-12 tx-gray-500">@markanthony</span>
                          </div>
                          <span class="tx-12">2 hours ago</span>
                        </div><!-- d-flex -->
                        <p class="lead pd-30 bg-purple tx-white">Be who you are and say what you feel, because those who mind don't matter, and those who matter don't mind.</p>
                        <div class="media-footer">
                          <div>
                            <a href=""><i class="fa fa-heart"></i></a>
                            <a href="" class="mg-l-10"><i class="fa fa-comment"></i></a>
                            <a href="" class="mg-l-10"><i class="fa fa-retweet"></i></a>
                            <a href="" class="mg-l-10"><i class="fa fa-ellipsis-h"></i></a>
                          </div>
                        </div><!-- d-flex -->
                      </div><!-- media-body -->
                    </div><!-- media -->
                  </div><!-- card -->
    
                  <div class="bg-white pd-y-12 tx-center mg-t-15 mg-xs-t-30 shadow-base rounded">
                    <a href="" class="tx-gray-600 hover-info">Load more</a>
                  </div>
                </div><!-- col-lg-8 -->
                <div class="col-lg-4 mg-t-30 mg-lg-t-0">
                  <div class="card pd-20 pd-xs-30 shadow-base bd-0">
                    <h6 class="tx-gray-800 tx-uppercase tx-semibold tx-13 mg-b-25">Contact Information</h6>
    
                    <label class="tx-10 tx-uppercase tx-mont tx-medium tx-spacing-1 mg-b-2">Phone Number</label>
                    <p class="tx-info mg-b-25">{{Auth::guard('admins')->user()->mobile}}</p>
    
                    <label class="tx-10 tx-uppercase tx-mont tx-medium tx-spacing-1 mg-b-2">Email Address</label>
                    <p class="tx-inverse mg-b-25">{{Auth::guard('admins')->user()->email}}</p>
    
                    <label class="tx-10 tx-uppercase tx-mont tx-medium tx-spacing-1 mg-b-2">Home Address</label>
                    <p class="tx-inverse mg-b-25">{{Auth::guard('admins')->user()->address}}</p>
    
                    <label class="tx-10 tx-uppercase tx-mont tx-medium tx-spacing-1 mg-b-2">Website</label>
                    <p class="tx-inverse mg-b-50">{{Auth::guard('admins')->user()->website}}</p>
    
                    <h6 class="tx-gray-800 tx-uppercase tx-semibold tx-13 mg-b-25">Other Information</h6>
    
                    <label class="tx-10 tx-uppercase tx-mont tx-medium tx-spacing-1 mg-b-2">Bio</label>
                    <p class="tx-inverse mg-b-25">{{Auth::guard('admins')->user()->about}}</p>
    
                    <!--<label class="tx-10 tx-uppercase tx-mont tx-medium tx-spacing-1 mg-b-5">Skills</label>
                    <ul class="list-unstyled profile-skills">
                      <li><span>html</span></li>
                      <li><span>css</span></li>
                      <li><span>javascript</span></li>
                      <li><span>php</span></li>
                      <li><span>photoshop</span></li>
                      <li><span>java</span></li>
                      <li><span>angular</span></li>
                      <li><span>wordpress</span></li>
                    </ul>-->
                  </div> 
    
                  <div class="card pd-20 pd-xs-30 shadow-base bd-0 mg-t-30">
                    <h6 class="tx-gray-800 tx-uppercase tx-semibold tx-13 mg-b-30">Other Users</h6>
                    <div class="media-list">
                    @foreach ($users as $user)
                        <div class="media align-items-center pd-b-10">
                            <img src="{{asset('storage/uploads/user').'/'.$user->image}}" class="wd-45 rounded-circle" alt="">
                            <div class="media-body mg-x-15 mg-xs-x-20">
                                <h6 class="mg-b-2 tx-inverse tx-14">{{$user->name}}</h6>
                                <p class="mg-b-0 tx-12">{{$user->email}}</p>
                            </div><!-- media-body 
                            <a href="#" class="btn btn-outline-secondary btn-icon rounded-circle mg-r-5">
                                <div><i class="icon ion-android-person-add tx-16"></i></div>
                            </a>-->
                        </div><!-- media -->
                    @endforeach
                    </div><!-- media-list -->
                  </div><!-- card -->
                </div><!-- col-lg-4 -->
              </div><!-- row -->
            </div><!-- tab-pane -->
            <div class="tab-pane fade" id="photos">
              <div class="row">
                <div class="col-lg-8">
                  <div class="card pd-20 pd-xs-30 shadow-base bd-0 mg-t-30">
                    <h6 class="tx-gray-800 tx-uppercase tx-semibold tx-14 mg-b-30">Recent Photos</h6>
    
                    <div class="row row-xs">
                      <div class="col-6 col-sm-4 col-md-3"><img src="http://via.placeholder.com/300x300" class="img-fluid" alt=""></div>
                      <div class="col-6 col-sm-4 col-md-3"><img src="http://via.placeholder.com/300x300" class="img-fluid" alt=""></div>
                      <div class="col-6 col-sm-4 col-md-3 mg-t-10 mg-sm-t-0"><img src="http://via.placeholder.com/600x600" class="img-fluid" alt=""></div>
                      <div class="col-6 col-sm-4 col-md-3 mg-t-10 mg-md-t-0"><img src="http://via.placeholder.com/600x600" class="img-fluid" alt=""></div>
                      <div class="col-6 col-sm-4 col-md-3 mg-t-10"><img src="http://via.placeholder.com/1000x1000" class="img-fluid" alt=""></div>
                      <div class="col-6 col-sm-4 col-md-3 mg-t-10"><img src="http://via.placeholder.com/1000x1000" class="img-fluid" alt=""></div>
                      <div class="col-6 col-sm-4 col-md-3 mg-t-10"><img src="http://via.placeholder.com/1000x1000" class="img-fluid" alt=""></div>
                      <div class="col-6 col-sm-4 col-md-3 mg-t-10"><img src="http://via.placeholder.com/1000x1000" class="img-fluid" alt=""></div>
                      <div class="col-6 col-sm-4 col-md-3 mg-t-10"><img src="http://via.placeholder.com/300x300" class="img-fluid" alt=""></div>
                      <div class="col-6 col-sm-4 col-md-3 mg-t-10"><img src="http://via.placeholder.com/300x300" class="img-fluid" alt=""></div>
                      <div class="col-6 col-sm-4 col-md-3 mg-t-10"><img src="http://via.placeholder.com/300x300" class="img-fluid" alt=""></div>
                      <div class="col-6 col-sm-4 col-md-3 mg-t-10"><img src="http://via.placeholder.com/300x300" class="img-fluid" alt=""></div>
                    </div><!-- row -->
    
                    <p class="mg-t-20 mg-b-0">Loading more photos...</p>
    
                  </div><!-- card -->
                </div><!-- col-lg-8 -->
                <div class="col-lg-4 mg-t-30 mg-lg-t-0">
                  <div class="card pd-20 pd-xs-30 shadow-base bd-0 mg-t-30">
                    <h6 class="tx-gray-800 tx-uppercase tx-semibold tx-14 mg-b-30">Photo Albums</h6>
                    <div class="row row-xs mg-b-15">
                      <div class="col"><img src="http://via.placeholder.com/1000x1000" class="img-fluid" alt=""></div>
                      <div class="col"><img src="http://via.placeholder.com/1000x1000" class="img-fluid" alt=""></div>
                      <div class="col">
                        <div class="overlay">
                          <img src="http://via.placeholder.com/1000x1000" class="img-fluid" alt="">
                          <div class="overlay-body bg-black-5 d-flex align-items-center justify-content-center">
                            <span class="tx-white tx-12">20+ more</span>
                          </div><!-- overlay-body -->
                        </div><!-- overlay -->
                      </div>
                    </div><!-- row -->
                    <div class="d-flex alig-items-center justify-content-between">
                      <h6 class="tx-inverse tx-14 mg-b-0">Profile Photos</h6>
                      <span class="tx-12">24 Photos</span>
                    </div><!-- d-flex -->
    
                    <hr>
    
                    <div class="row row-xs mg-b-15">
                      <div class="col"><img src="http://via.placeholder.com/1000x1000" class="img-fluid" alt=""></div>
                      <div class="col"><img src="http://via.placeholder.com/600x600" class="img-fluid" alt=""></div>
                      <div class="col">
                        <div class="overlay">
                          <img src="http://via.placeholder.com/600x600" class="img-fluid" alt="">
                          <div class="overlay-body bg-black-5 d-flex align-items-center justify-content-center">
                            <span class="tx-white tx-12">20+ more</span>
                          </div><!-- overlay-body -->
                        </div><!-- overlay -->
                      </div>
                    </div><!-- row -->
                    <div class="d-flex alig-items-center justify-content-between">
                      <h6 class="tx-inverse tx-14 mg-b-0">Mobile Uploads</h6>
                      <span class="tx-12">24 Photos</span>
                    </div><!-- d-flex -->
    
                    <hr>
    
                    <div class="row row-xs mg-b-15">
                      <div class="col"><img src="http://via.placeholder.com/300x300/0866C6/FFF" class="img-fluid" alt=""></div>
                      <div class="col"><img src="http://via.placeholder.com/300x300/DC3545/FFF" class="img-fluid" alt=""></div>
                      <div class="col">
                        <div class="overlay">
                          <img src="http://via.placeholder.com/300x300/0866C6/FFF" class="img-fluid" alt="">
                          <div class="overlay-body bg-black-5 d-flex align-items-center justify-content-center">
                            <span class="tx-white tx-12">20+ more</span>
                          </div><!-- overlay-body -->
                        </div><!-- overlay -->
                      </div>
                    </div><!-- row -->
                    <div class="d-flex alig-items-center justify-content-between">
                      <h6 class="tx-inverse tx-14 mg-b-0">Mobile Uploads</h6>
                      <span class="tx-12">24 Photos</span>
                    </div><!-- d-flex -->
    
                    <a href="" class="d-block mg-t-20"><i class="fa fa-angle-down mg-r-5"></i> Show 8 more albums</a>
                  </div><!-- card -->
                </div><!-- col-lg-4 -->
              </div><!-- row -->
            </div><!-- tab-pane -->
          </div><!-- br-pagebody -->        
@endsection
@include('admin.pages.user.scripts')