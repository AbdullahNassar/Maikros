@extends('admin.layouts.master')
@section('meta')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="author" content="ThemePixels">
    <meta name="csrf_token" content="{{csrf_token()}}">
@endsection
@section('title','Hotels')
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
    <link rel="stylesheet" href="{{asset('vendors/css/dropzone.css')}}">
    <link rel="stylesheet" href="{{asset('vendors/css/bracket.css')}}">
    <link href="{{asset('vendors/toastr/toastr.min.css')}}" rel="stylesheet">
    <link href="{{asset('vendors/css/float-labels.css')}}" rel="stylesheet">
@endsection
@section('content')
    <!-- br-mainpanel -->
    <div class="br-pageheader pd-y-15 pd-l-20">
        <nav class="breadcrumb pd-0 mg-0 tx-12">
            <a class="breadcrumb-item" href="{{route('admin.home')}}">Maikros</a>
            <a class="breadcrumb-item" href="{{route('hotel.get')}}">Hotels</a>
            <span class="breadcrumb-item active">Hotels Table</span>
        </nav>
        </div><!-- br-pageheader -->
        <div class="br-pagebody">
        <div class="br-section-wrapper">
            <button class="btn btn-oblong btn-outline-primary mg-b-10 float-right" id="add_data" type="button" name="add">Add New</button>
            <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10">Basic Responsive DataTable</h6>
            <p class="mg-b-25 mg-lg-b-50">Searching, ordering and paging goodness will be immediately added to the table, as shown in this example.</p>
            <div class="table-wrapper">
            <table id="hotel_table" class="table display responsive nowrap">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Action</th>
                        <th><a name="bulk_delete" id="bulk_delete" class="text-danger"><i class="fa fa-close"></i></a></th>
                    </tr>
                </thead>
            </table>
            </div><!-- table-wrapper -->
        </div><!-- br-section-wrapper -->
        </div><!-- br-pagebody -->

        <!-- modal -->
        <div id="hotelModal" class="modal fade">
            <div class="modal-dialog modal-dialog-vertical-center modal-lg" role="document">
            <div class="modal-content bd-0 tx-14">
                <div class="modal-header pd-y-20 pd-x-25">
                <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold modal-title">Add New Hotel</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body pd-25">
                <div class="form-layout">
                    <form method="post" id="hotel_form" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="row mg-b-25">
                            <div class="col-lg-12">
                                <div class="user-img-upload">
                                    <div class="fileUpload user-editimg">
                                        <span><i class="fa fa-camera"></i> Add</span>
                                        <input type="file" id="imgInp" class="upload" name="image">
                                        <input type="hidden" value="hotel" name="storage" >
                                    </div>
                                    <img src="{{asset('vendors/site/AR/images/hotel-detail-tab-5.jpg')}}" id="blah" class="img-circle" alt="">
                                    <p></p>
                                </div>
                            </div><!-- col-12 -->
                            <div class="col-lg-4">
                                <div class="form-group pmd-textfield pmd-textfield-floating-label">
                                    <label class="control-label">Arabic Hotel Name</label>
                                    <input class="form-control" type="text" name="hotel_name_ar" id="hotel_name_ar">
                                </div>
                                <div class="form-group pmd-textfield pmd-textfield-floating-label">
                                    <label class="control-label">English Hotel Name</label>
                                    <input class="form-control" type="text" name="hotel_name_en" id="hotel_name_en">
                                </div>
                            </div><!-- col-12 -->
                            <div class="col-lg-4">
                                <div class="form-group pmd-textfield pmd-textfield-floating-label">
                                    <label class="control-label">Arabic Street Name</label>
                                    <input class="form-control" type="text" name="street_ar" id="street_ar">
                                </div>
                                <div class="form-group pmd-textfield pmd-textfield-floating-label">
                                    <label class="control-label">English Street Name</label>
                                    <input class="form-control" type="text" name="street_en" id="street_en">
                                </div>
                            </div><!-- col-12 -->
                            <div class="col-lg-4">
                                <div class="form-group pmd-textfield pmd-textfield-floating-label">
                                    <label class="control-label">Arabic Distance</label>
                                    <input class="form-control" type="text" name="far_ar" id="far_ar">
                                </div>
                                <div class="form-group pmd-textfield pmd-textfield-floating-label">
                                    <label class="control-label">English Distance</label>
                                    <input class="form-control" type="text" name="far_en" id="far_en">
                                </div>
                            </div><!-- col-12 -->
                            <div class="col-lg-4">
                            <div class="form-group pmd-textfield pmd-textfield-floating-label">
                                <div class="form-group pmd-textfield pmd-textfield-floating-label">
                                    <label class="control-label">Place</label>
                                    <select class="select2 pmd-select2 form-control" name="place_id" id="place_id">
                                      <option></option>
                                    </select>
                                  </div>
                            </div>
                            </div><!-- col-6 -->
                            <div class="col-lg-4">
                                <div class="form-group pmd-textfield pmd-textfield-floating-label">
                                    <label class="control-label">Hotel Facilities</label>
                                    <select class="form-control pmd-select2 select2" name="comfort[]" id="comfort" multiple>
                                      <option></option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4">
                            <div class="form-group pmd-textfield pmd-textfield-floating-label">
                                <label class="control-label">Rate</label>
                                <input class="form-control" type="number" name="rate" id="rate">
                            </div>
                            </div><!-- col-6 -->
                            <div class="col-lg-4">
                            <div class="form-group pmd-textfield pmd-textfield-floating-label">
                                <label class="control-label">Stars</label>
                                <input class="form-control" type="number" name="stars" id="stars">
                            </div>
                            </div><!-- col-6 -->
                            <div class="col-lg-2">
                            <div class="form-group pmd-textfield pmd-textfield-floating-label">
                                <label class="control-label">Price</label>
                                <input class="form-control" type="number" name="price" id="price">
                            </div>
                            </div><!-- col-6 -->
                            <div class="col-lg-2">
                            <div class="form-group pmd-textfield pmd-textfield-floating-label">
                                <label class="control-label">Discount</label>
                                <input class="form-control" type="number" name="discount" id="discount">
                            </div>
                            </div><!-- col-6 -->
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label class="ckbox">
                                        <input type="checkbox" checked name="best" id="best">
                                        <span>Best Offers</span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label class="ckbox">
                                        <input type="checkbox" checked name="max" id="max">
                                        <span>Max Rate</span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label class="ckbox">
                                        <input type="checkbox" checked name="active" id="active">
                                        <span>Active</span>
                                    </label>
                                </div>
                            </div>
                        </div><!-- row -->
                        <div class="col-lg-12" style="text-align:center">
                            <input type="hidden" name="hotel_id" id="hotel_id" value="" />
                            <input type="hidden" name="button_action" id="button_action" value="insert" />
                            <input type="submit" name="submit" id="action" value="Add" class="btn btn-primary" />
                            <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Close</button>
                        </div><!-- form-layout-footer -->
                    </form>
                    </div><!-- form-layout -->
                </div>
            </div>
            </div><!-- modal-dialog -->
        </div>
        <!-- modal -->
        <div id="dataModal" class="modal fade animated fadeInLeftBig">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content bd-0">
                    <div class="modal-body pd-0">
                        <div class="row flex-row-reverse no-gutters">
                            <div class="col-lg-4">
                            <button type="button" class="close mg-t-15 mg-r-20" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <img src="http://via.placeholder.com/912x912" class="img-fluid rounded-right pd-40" alt="" id="hotel-image">
                            </div><!-- col-6 -->
                            <div class="col-lg-8 rounded-left">
                            <div class="pd-40">
                                <h2 class="mg-b-5 tx-semibold tx-inverse" id="hotel-name"></h2>
                                <h5 class="mg-b-5 tx-inverse lh-2 " id="hotel-title"></h5>
                                <hr>
                                <p class="tx-inverse">
                                    <span class="tx-semibold tx-inverse">Hotel Distance From Harram:</span>
                                    <span class="mg-b-20" id="hotel-distance"></span>
                                </p>
                                <p class="tx-inverse">
                                    <span class="tx-semibold tx-inverse">Hotel Street:</span>
                                    <span class="mg-b-20" id="hotel-street"></span>
                                </p>
                                <p class="tx-inverse">
                                    <span class="tx-semibold tx-inverse">Hotel Rate:</span>
                                    <span class="mg-b-20" id="hotel-rate"></span>
                                </p>
                                <p class="tx-inverse">
                                    <span class="tx-semibold tx-inverse">Hotel Price:</span>
                                    <span class="mg-b-20" id="hotel-price"></span>
                                </p>
                            </div>
                            </div><!-- col-6 -->
                        </div><!-- row -->
                    </div><!-- modal-body -->
                </div><!-- modal-content -->
            </div><!-- modal-dialog -->
        </div>
        <!-- modal -->
        <div id="delete-modal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class = "modal-content" >
                    {{csrf_field()}}
                    <div class = "modal-header" >
                        <h4 class = "bold" >Are you sure you want to Delete this data?</h4>
                    </div>
                    <div class = "modal-body" >
                        <p >Note : all the data related to this item will be deleted also!</p>
                    </div>
                    <div class = "modal-footer" >
                        <a href = "#" class = "btn btn-danger btndelete" >Delete</a>
                        <button type = "button" class = "btn btn-default" data-dismiss = "modal" >Close</button >
                    </div>
                </div>
            </div>
        </div>
        <!-- modal -->
        <div id="multi_delete-modal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class = "modal-content" >
                    {{csrf_field()}}
                    <div class = "modal-header" >
                        <h4 class = "bold" >Are you sure you want to Delete the selected raws?</h4>
                    </div>
                    <div class = "modal-body" >
                        <p >Note : all the data related to this item will be deleted also!</p>
                    </div>
                    <div class = "modal-footer" >
                        <a href = "#" class = "btn btn-danger multideletebtn" >Delete</a>
                        <button type = "button" class = "btn btn-default" data-dismiss = "modal" >Close</button >
                    </div>
                </div>
            </div>
        </div>
        <!-- modal -->
        <div id="error-modal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class = "modal-content" >
                    <div class = "modal-header" >
                        <h4 class = "bold" >Please select atleast one checkbox</h4>
                    </div>
                    <div class = "modal-body" >
                    </div>
                    <div class = "modal-footer" >
                        <button type = "button" class = "btn btn-default" data-dismiss = "modal" >Close</button >
                    </div>
                </div>
            </div>
        </div>    
@endsection
@include('admin.pages.hotel.scripts')