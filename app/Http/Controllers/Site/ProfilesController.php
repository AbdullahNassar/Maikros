<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\ServiceOrders;
use App\Service;
use App\ServiceFeatures;
use App\ServiceGallery;
use App\Hotel;
use App\HotelFeatures;
use App\HotelFacilities;
use App\HotelGallery;
use App\HotelOrders;
use App\HotelRooms;
use App\ProgramOrders;
use App\Flight;
use App\Program;
use App\ProgramHotels;
use App\ProgramServices;
use App\ProgramFlights;
use App\FlightOrders;
use App\Data;
use App\Comfort;
use App\Member;
use App\Place;
use App\Contact;
use Config;
use Validator;
use Auth;
use DB;


class ProfilesController extends Controller
{
    //Profiles
    public function profile() {
        $data = new Data;
        $contact = new Contact;
        return view('site.pages.profile.index', compact('data','contact'));
    }

    public function multiProfile() {
        $data = new Data;
        $contact = new Contact;
        return view('site.pages.multi_profile.index', compact('data','contact'));
    }

    public function booking() {
        $data = new Data;
        $contact = new Contact;
        $hotels = DB::table('hotel_orders')
                ->join('hotels','hotel_orders.hotel_id','=','hotels.id')
                ->select('hotels.hotel_name_ar','hotels.hotel_name_en','hotel_orders.*')
                ->where("hotel_orders.user_id", Auth::guard('members')->user()->id)
                ->get();
        $services = DB::table('service_orders')
                ->join('services','service_orders.service_id','=','services.id')
                ->select('services.name_ar','services.name_en','service_orders.*')
                ->where("service_orders.user_id", Auth::guard('members')->user()->id)
                ->get();
        $flights = DB::table('flight_orders')
                ->join('flights','flight_orders.flight_id','=','flights.id')
                ->select('flights.flight_name_ar','flights.flight_name_en','flight_orders.*')
                ->where("flight_orders.user_id", Auth::guard('members')->user()->id)
                ->get();
        $programs = DB::table('program_orders')
                ->join('programs','program_orders.program_id','=','programs.id')
                ->select('programs.p_name_ar','programs.p_name_en','program_orders.*')
                ->where("program_orders.user_id", Auth::guard('members')->user()->id)
                ->get();

        $hotelss = DB::table('hotel_orders')
                ->join('hotels','hotel_orders.hotel_id','=','hotels.id')
                ->select('hotels.hotel_name_ar','hotels.hotel_name_en','hotel_orders.*')
                ->where("hotels.user_id", Auth::guard('members')->user()->id)
                ->where("hotel_orders.status", 0)
                ->get();
        $servicess = DB::table('service_orders')
                ->join('services','service_orders.service_id','=','services.id')
                ->select('services.name_ar','services.name_en','service_orders.*')
                ->where("services.user_id", Auth::guard('members')->user()->id)
                ->where("service_orders.status", 0)
                ->get();
        $flightss = DB::table('flight_orders')
                ->join('flights','flight_orders.flight_id','=','flights.id')
                ->select('flights.flight_name_ar','flights.flight_name_en','flight_orders.*')
                ->where("flights.user_id", Auth::guard('members')->user()->id)
                ->where("flight_orders.status", 0)
                ->get();
        $programss = DB::table('program_orders')
                ->join('programs','program_orders.program_id','=','programs.id')
                ->select('programs.p_name_ar','programs.p_name_en','program_orders.*')
                ->where("programs.user_id", Auth::guard('members')->user()->id)
                ->where("program_orders.status", 0)
                ->get();
        return view('site.pages.booking.index', compact('data','contact','hotels','services','flights','programs','hotelss','servicess','flightss','programss'));
    }

    public function dashboard() {
        $data = new Data;
        $contact = new Contact;
        $hotels = DB::table('hotels')
                ->join('places','hotels.place_id','=','places.id')
                ->select('hotels.*','places.place_name_ar','places.place_name_en')
                ->where('user_id', Auth::guard('members')->user()->id)
                ->get();
        $flights = Flight::where('user_id', Auth::guard('members')->user()->id)->get();
        $services = DB::table('services')
                        ->join('places','services.place_id','=','places.id')
                        ->select('services.*','places.place_name_ar','places.place_name_en')
                        ->where('services.user_id', Auth::guard('members')->user()->id)
                        ->get();
        $programs = Program::where('user_id', Auth::guard('members')->user()->id)->get();

        return view('site.pages.dashboard.index', compact('data','contact','hotels','services','flights','programs'));
    }

    public function hotelApprove(Request $request) {
        $error_array = array();
        $success_output = '';
        $hotel = HotelOrders::find($request->id);
        $hotel->status = 1;
        $hotel->save();
        $output = array(
            'error'     =>  $error_array,
            'success'   =>  $success_output
        );
        echo json_encode($output);
    }

    public function programApprove(Request $request) {
        $error_array = array();
        $success_output = '';
        $program = ProgramOrders::find($request->id);
        $program->status = 1;
        $program->save();
        $output = array(
            'error'     =>  $error_array,
            'success'   =>  $success_output
        );
        echo json_encode($output);
    }

    public function serviceApprove(Request $request) {
        $error_array = array();
        $success_output = '';
        $service = ServiceOrders::find($request->id);
        $service->status = 1;
        $service->save();
        $output = array(
            'error'     =>  $error_array,
            'success'   =>  $success_output
        );
        echo json_encode($output);
    }

    public function flightApprove(Request $request) {
        $error_array = array();
        $success_output = '';
        $flight = FlightOrders::find($request->id);
        $flight->status = 1;
        $flight->save();
        $output = array(
            'error'     =>  $error_array,
            'success'   =>  $success_output
        );
        echo json_encode($output);
    }

    public function companyProfile() {
        $data = new Data;
        $contact = new Contact;
        $flights = Flight::where('user_id', Auth::guard('members')->user()->id)->get();
        $services = DB::table('services')
                        ->join('places','services.place_id','=','places.id')
                        ->select('services.*','places.place_name_ar','places.place_name_en')
                        ->where('services.user_id', Auth::guard('members')->user()->id)
                        ->get();
        return view('site.pages.company_profile.index', compact('data','contact','flights','services'));
    }

    public function tourProfile() {
        $data = new Data;
        $contact = new Contact;
        $programs = Program::where('user_id', Auth::guard('members')->user()->id)->get();
        return view('site.pages.tour_profile.index', compact('data','contact','programs'));
    }

    public function hotelProfile() {
        $data = new Data;
        $contact = new Contact;
        $hotels = DB::table('hotels')
                ->join('places','hotels.place_id','=','places.id')
                ->select('hotels.*','places.place_name_ar','places.place_name_en')
                ->where('user_id', Auth::guard('members')->user()->id)
                ->get();
        return view('site.pages.hotel_profile.index', compact('data','contact','hotels'));
    }

    public function editProfile(Request $request) {
        $error_array = array();
        $success_output = '';
        $member = Member::find($request->id);
        $destination = storage_path('uploads/' . $request->storage);
        $image = Input::File('image');
        if($image != null){
            if (is_file($destination . "/{$image}")) {
                @unlink($destination . "/{$image}");
            }
            $imageName = $image->getClientOriginalName();
            $image->move($destination, $imageName);
            $member->image = $imageName;
        }
        $member->name = $request->name;
        $member->username = $request->username;
        $password = bcrypt($request->password);
        $member->password = $password;
        $member->recover = $request->password;
        $member->email = $request->email;
        $member->phone = $request->phone;
        $member->address = $request->address;
        $member->country = $request->country;
        $member->birth = $request->birth;
        $member->about = $request->about;
        $member->national_id = $request->national_id;
        $member->save();
        $output = array(
            'error'     =>  $error_array,
            'success'   =>  $success_output
        );
        echo json_encode($output);
    }

    //Service
    public function addService() {
        $data = new Data;
        $contact = new Contact;
        $places = Place::where('active', 1)->get();
        return view('site.pages.add_service.index', compact('data','contact','places'));
    }

    public function serviceGallery() {
        $data = new Data;
        $contact = new Contact;
        $services = Service::where('user_id', Auth::guard('members')->user()->id)->get();
        return view('site.pages.service_gallery.index', compact('data','contact','services'));
    }

    public function postServiceGallery(Request $request) {
        $image = $request->file('file');
        if ($image) {
            $destination = storage_path('uploads/gallery/');
            $imageName = $image->getClientOriginalName();
            $image->move($destination, $imageName);
            $gallery = new ServiceGallery();
            $gallery->image = $imageName;
            $gallery->thumb = $imageName;
            $gallery->service_id = $request->service_id;
            $gallery->save();
        }
    }

    public function editService($id) {
        $service = Service::find($id);
        $place = Place::where('id' , $service->place_id)->first();
        $features = ServiceFeatures::where('service_id', $id)->get();
        $images = ServiceGallery::where('service_id', $id)->get();
        $data = new Data;
        $contact = new Contact;
        $places = Place::where('active', 1)->get();
        return view('site.pages.edit_service.index', compact('data','contact','places','service','place','features','images'));
    }

    public function addServiceFeatures() {
        $data = new Data;
        $contact = new Contact;
        $services = Service::where('user_id', Auth::guard('members')->user()->id)->get();
        return view('site.pages.service_features.index', compact('data','contact','hotels','services'));
    }

    public function postServiceFeatures(Request $request) {
        $error_array = array();
        $success_output = '';
        if (Config::get('app.locale') == 'en'){
            $validation = Validator::make($request->all(), [
                'image' => 'required|image|mimes:jpeg,jpg,png,gif,pdf|max:20000',
                'f_name_en' => 'required',
                'f_name_ar' => 'required',
                'content_ar' => 'required',
                'content_en' => 'required',
                'service_id' => 'required',
            ],[
                'image.required' => 'Please Upload Image',
                'image.image' => 'Please upload image not video',
                'image.mimes' => 'Image type : jpeg,jpg,png,gif',
                'image.max' => 'Max Size 20 MB',
                'f_name_en.required' => 'Please Enter Name in English',
                'f_name_ar.required' => 'Please Enter Name in Arabic',
                'content_ar.required' => 'Please Enter Details in Arabic',
                'content_en.required' => 'Please Enter Details in English',
                'service_id.required' => 'Please Select Service',
            ]);
        }elseif(Config::get('app.locale') == 'ar'){
            $validation = Validator::make($request->all(), [
                'image' => 'required|image|mimes:jpeg,jpg,png,gif,pdf|max:20000',
                'f_name_en' => 'required',
                'f_name_ar' => 'required',
                'content_ar' => 'required',
                'content_en' => 'required',
                'service_id' => 'required',
            ],[
                'image.required' => 'من فضلك قم بتحميل الصورة',
                'image.image' => 'قم بتحميل صورة وليس فيديو',
                'image.mimes' => 'نوع الصورة : jpeg,jpg,png,gif',
                'image.max' => 'أقصى حجم للصورة 20 MB',
                'f_name_en.required' => 'قم بادخال الاسم باللغة الانجليزية',
                'f_name_ar.required' => 'قم بادخال الاسم باللغة العربية',
                'content_ar.required' => 'قم بادخال التفاصيل باللغة العربية',
                'content_en.required' => 'قم بادخال التفاصيل باللغة الانجليزية',
                'service_id.required' => 'قم باختيار الخدمة',
            ]);
        }
        
        
        if ($validation->fails())
        {
            foreach ($validation->messages()->getMessages() as $field_name => $messages)
            {
                $error_array[] = $messages; 
            }
        }
        else
        {
            $feature = new ServiceFeatures;
            $destination = storage_path('uploads/' . $request->storage);
            $image = Input::File('image');
            if($image != null){
                if (is_file($destination . "/{$image}")) {
                    @unlink($destination . "/{$image}");
                }
                $imageName = $image->getClientOriginalName();
                $image->move($destination, $imageName);
                $feature->image = $imageName;
            }
            $feature->f_name_en = $request->f_name_en;
            $feature->f_name_ar = $request->f_name_ar;
            $feature->content_ar = $request->content_ar;
            $feature->content_en = $request->content_en;
            $feature->service_id = $request->service_id;
            $feature->active = -1;
            
            if($feature->save()){
                if(Config::get('app.locale') == 'en'){
                    $success_output = '<div class="alert alert-success">Data Inserted Successfully</div>';
                }elseif(Config::get('app.locale') == 'en'){
                    $success_output = '<div class="alert alert-success">تم ادخال البيانات بنجاح</div>';
                }
            }
        }
        $output = array(
            'error'     =>  $error_array,
            'success'   =>  $success_output
        );
        echo json_encode($output);
    }

    function deleteServiceFeature($id){
        ServiceFeatures::where('id','=',$id)->delete();
        return redirect()->back();
    }

    public function addServiceImages($id, Request $request) {
        $image = $request->file('file');
        if ($image) {
            $destination = storage_path('uploads/gallery/');
            $imageName = $image->getClientOriginalName();
            $image->move($destination, $imageName);
            $gallery = new ServiceGallery();
            $gallery->image = $imageName;
            $gallery->thumb = $imageName;
            $gallery->service_id = $id;
            $gallery->save();
        }
    }

    function deleteServiceImages($id){
        ServiceGallery::where('id','=',$id)->delete();
        return redirect()->back();
    }

    public function postService(Request $request) {
        $error_array = array();
        $success_output = '';
        if (Config::get('app.locale') == 'en'){
            $validation = Validator::make($request->all(), [
                'image' => 'required|image|mimes:jpeg,jpg,png,gif,pdf|max:20000',
                'name_en' => 'required',
                'name_ar' => 'required',
                'content_en' => 'required',
                'content_ar' => 'required',
            ],[
                'image.required' => 'Please Upload Image',
                'image.image' => 'Please upload image not video',
                'image.mimes' => 'Image type : jpeg,jpg,png,gif',
                'image.max' => 'Max Size 20 MB',
                'name_en.required' => 'Please Enter Service Name in English',
                'name_ar.required' => 'Please Enter Service Name in Arabic',
                'content_en.required' => 'Please Enter Service Content in English',
                'content_ar.required' => 'Please Enter Service Content in Arabic',
            ]);
        }elseif(Config::get('app.locale') == 'ar'){
            $validation = Validator::make($request->all(), [
                'image' => 'required|image|mimes:jpeg,jpg,png,gif,pdf|max:20000',
                'name_en' => 'required',
                'name_ar' => 'required',
                'content_en' => 'required',
                'content_ar' => 'required',
            ],[
                'image.required' => 'من فضلك قم بتحميل الصورة',
                'image.image' => 'قم بتحميل صورة وليس فيديو',
                'image.mimes' => 'نوع الصورة : jpeg,jpg,png,gif',
                'image.max' => 'أقصى حجم للصورة 20 MB',
                'name_en.required' => 'قم بادخال اسم الخدمة باللغة الانجليزية',
                'name_ar.required' => 'قم بادخال اسم الخدمة باللغة العربية',
                'content_en.required' => 'قم بادخال تفاصيل الخدمة باللغة الانجليزية',
                'content_ar.required' => 'قم بادخال تفاصيل الخدمة باللغة العربية',
            ]);
        }
        
        
        if ($validation->fails())
        {
            foreach ($validation->messages()->getMessages() as $field_name => $messages)
            {
                $error_array[] = $messages; 
            }
        }
        else
        {
            $service = new Service;
            $destination = storage_path('uploads/' . $request->storage);
            $image = $request->file('image');
            if($request->hasFile('image')){
                if (is_file($destination . "/{$image}")) {
                    @unlink($destination . "/{$image}");
                }
                $imageName = $image->getClientOriginalName();
                $image->move($destination, $imageName);
                $service->image = $imageName;
            }
            $service->name_en = $request->name_en;
            $service->name_ar = $request->name_ar;
            $service->content_en = $request->content_en;
            $service->content_ar = $request->content_ar;
            $service->rate = $request->rate;
            $service->price = $request->price;
            $service->discount = $request->discount;
            $service->place_id = $request->place_id;
            $service->user_id = $request->user_id;
            $service->active = -1;
            
            if($service->save()){
                if(Config::get('app.locale') == 'en'){
                    $success_output = '<div class="alert alert-success">Data Inserted Successfully</div>';
                }elseif(Config::get('app.locale') == 'en'){
                    $success_output = '<div class="alert alert-success">تم ادخال البيانات بنجاح</div>';
                }
            }
        }
        $output = array(
            'error'     =>  $error_array,
            'success'   =>  $success_output
        );
        echo json_encode($output);
    }

    public function postEditService(Request $request) {
        $error_array = array();
        $success_output = '';
        $service2 = Service::find($request->input('service_id'));
        $destination2 = storage_path('uploads/' . $request->storage);
        $image2 = $request->file('image');
        if ($image2 != null) {
            if (is_file($destination2 . "/{$image2}")) {
                @unlink($destination2 . "/{$image2}");
            }
            $imageName = $image2->getClientOriginalName();
            $image2->move($destination2, $imageName);
            $service2->image = $imageName;
        }

        $service2->name_en = $request->name_en;
        $service2->name_ar = $request->name_ar;
        $service2->content_en = $request->content_en;
        $service2->content_ar = $request->content_ar;
        $service2->rate = $request->rate;
        $service2->price = $request->price;
        $service2->discount = $request->discount;
        $service2->place_id = $request->place_id;
        $service2->user_id = $request->user_id;
        $service2->active = -1;
            
        if($service2->save()){
            if (Config::get('app.locale') == 'en'){
                $success_output = '<div class="alert alert-success">Data Updated Successfully</div>';
            }elseif(Config::get('app.locale') == 'en'){
                $success_output = '<div class="alert alert-success">تم تحديث البيانات بنجاح</div>';
            }
        }
        $output = array(
            'error'     =>  $error_array,
            'success'   =>  $success_output
        );
        echo json_encode($output);
    }

    //Hotel
    public function addHotel() {
        $data = new Data;
        $contact = new Contact;
        $places = Place::where('active', 1)->get();
        $comforts = Comfort::where('active', 1)->get();
        return view('site.pages.add_hotel.index', compact('data','contact','places','comforts'));
    }

    public function hotelGallery() {
        $data = new Data;
        $contact = new Contact;
        $hotels = Hotel::where('user_id', Auth::guard('members')->user()->id)->get();
        return view('site.pages.hotel_gallery.index', compact('data','contact','hotels'));
    }

    public function postHotelGallery(Request $request) {
        $image = $request->file('file');
        if ($image) {
            $destination = storage_path('uploads/gallery/');
            $imageName = $image->getClientOriginalName();
            $image->move($destination, $imageName);
            $gallery = new HotelGallery();
            $gallery->image = $imageName;
            $gallery->thumb = $imageName;
            $gallery->hotel_id = $request->hotel_id;
            $gallery->save();
        }
    }

    public function addHotelRooms() {
        $data = new Data;
        $contact = new Contact;
        $hotels = Hotel::where('user_id', Auth::guard('members')->user()->id)->get();
        return view('site.pages.add_rooms.index', compact('data','contact','hotels'));
    }

    public function addHotelFeatures() {
        $data = new Data;
        $contact = new Contact;
        $hotels = Hotel::where('user_id', Auth::guard('members')->user()->id)->get();
        return view('site.pages.add_features.index', compact('data','contact','hotels'));
    }

    public function addHotelFacilities() {
        $data = new Data;
        $contact = new Contact;
        $hotels = Hotel::where('user_id', Auth::guard('members')->user()->id)->get();
        return view('site.pages.add_facilities.index', compact('data','contact','hotels'));
    }

    public function addHotelGallery() {
        $data = new Data;
        $contact = new Contact;
        $hotels = Hotel::where('user_id', Auth::guard('members')->user()->id);
        return view('site.pages.add_hotel.index', compact('data','contact','places','hotels'));
    }

    public function editHotel($id) {
        $hotel = Hotel::find($id);
        $place = Place::where('id' , $hotel->place_id)->first();
        $rooms = HotelRooms::where('hotel_id', $id)->get();
        $features = HotelFeatures::where('hotel_id', $id)->get();
        $images = HotelGallery::where('hotel_id', $id)->get();
        $data = new Data;
        $contact = new Contact;
        $places = Place::where('active', 1)->get();
        $comforts = Comfort::where('active', 1)->get();
        $facilities = DB::table('hotel_facilities')
                ->join('comforts','hotel_facilities.comfort_id','=','comforts.id')
                ->join('hotels','hotel_facilities.hotel_id','=','hotels.id')
                ->select('comforts.*')
                ->where("hotels.id", $id)
                ->get();
        return view('site.pages.edit_hotel.index', compact('facilities','comforts','data','contact','places','hotel','place','rooms','features','images'));
    }

    public function addImages($id, Request $request) {
        $image = $request->file('file');
        if ($image) {
            $destination = storage_path('uploads/gallery/');
            $imageName = $image->getClientOriginalName();
            $image->move($destination, $imageName);
            $gallery = new HotelGallery();
            $gallery->image = $imageName;
            $gallery->thumb = $imageName;
            $gallery->hotel_id = $id;
            $gallery->save();
        }
    }

    function deleteImages($id){
        HotelGallery::where('id','=',$id)->delete();
        return redirect()->back();
    }

    function deleteRoom($id){
        HotelRooms::where('id','=',$id)->delete();
        return redirect()->back();
    }

    function deleteFeature($id){
        HotelFeatures::where('id','=',$id)->delete();
        return redirect()->back();
    }

    function deleteFacility($id){
        Comfort::where('id','=',$id)->delete();
        return redirect()->back();
    }

    public function postHotel(Request $request) {
        $error_array = array();
        $success_output = '';
        if (Config::get('app.locale') == 'en'){
            $validation = Validator::make($request->all(), [
                'image' => 'required|image|mimes:jpeg,jpg,png,gif,pdf|max:20000',
                'hotel_name_en' => 'required',
                'hotel_name_ar' => 'required',
                'far_ar' => 'required',
                'far_en' => 'required',
                'price' => 'required',
                'street_ar'  => 'required',
                'street_en' => 'required',
                'place_id' => 'required',
                'price' => 'required',
            ],[
                'image.required' => 'Please Upload Image',
                'image.image' => 'Please upload image not video',
                'image.mimes' => 'Image type : jpeg,jpg,png,gif',
                'image.max' => 'Max Size 20 MB',
                'hotel_name_en.required' => 'Please Enter Hotel Name in English',
                'hotel_name_ar.required' => 'Please Enter Hotel Name in Arabic',
                'far_ar.required' => 'Please Enter The Distance in Arabic',
                'far_en.required' => 'Please Enter The Distance in English',
                'street_ar.required' => 'Please Enter Street in Arabic',
                'street_en.required' => 'Please Enter Street in English',
                'price.required' => 'Please Enter Price',
                'place_id.required' => 'Please Select Place',
            ]);
        }elseif(Config::get('app.locale') == 'ar'){
            $validation = Validator::make($request->all(), [
                'image' => 'required|image|mimes:jpeg,jpg,png,gif,pdf|max:20000',
                'hotel_name_en' => 'required',
                'hotel_name_ar' => 'required',
                'far_ar' => 'required',
                'far_en' => 'required',
                'price' => 'required',
                'street_ar'  => 'required',
                'street_en' => 'required',
                'place_id' => 'required',
            ],[
                'image.required' => 'من فضلك قم بتحميل الصورة',
                'image.image' => 'قم بتحميل صورة وليس فيديو',
                'image.mimes' => 'نوع الصورة : jpeg,jpg,png,gif',
                'image.max' => 'أقصى حجم للصورة 20 MB',
                'hotel_name_en.required' => 'قم بادخال اسم الفندق باللغة الانجليزية',
                'hotel_name_ar.required' => 'قم بادخال اسم الفندق باللغة العربية',
                'far_ar.required' => 'قم بادخال المسافة باللغة العربية',
                'far_en.required' => 'قم بادخال المسافة باللغة الانجليزية',
                'street_ar.required' => 'قم بادخال الشارع باللغة العربية',
                'street_en.required' => 'قم بادخال الشارع باللغة الانجليزية',
                'price.required' => 'قم بادخال السعر',
                'place_id.required' => 'قم باختيار المدينة',
            ]);
        }
        
        
        if ($validation->fails())
        {
            foreach ($validation->messages()->getMessages() as $field_name => $messages)
            {
                $error_array[] = $messages; 
            }
        }
        else
        {
            $hotel = new Hotel;
            $destination = storage_path('uploads/' . $request->storage);
            $image = Input::File('image');
            if($image != null){
                if (is_file($destination . "/{$image}")) {
                    @unlink($destination . "/{$image}");
                }
                $imageName = $image->getClientOriginalName();
                $image->move($destination, $imageName);
                $hotel->image = $imageName;
                $hotel->inner_image = $imageName;
            }
            $hotel->hotel_name_en = $request->hotel_name_en;
            $hotel->hotel_name_ar = $request->hotel_name_ar;
            $hotel->far_ar = $request->far_ar;
            $hotel->far_en = $request->far_en;
            $hotel->remote_ar = $request->remote_ar;
            $hotel->remote_en = $request->remote_en;
            $hotel->street_ar = $request->street_ar;
            $hotel->price = $request->price;
            $hotel->discount = $request->discount;
            $hotel->street_en = $request->street_en;
            $hotel->place_id = $request->place_id;
            $hotel->stars = $request->stars;
            $hotel->user_id = $request->user_id;
            $hotel->best = 0;
            $hotel->max = 0;
            $hotel->active = -1;
            
            if($hotel->save()){
                $comforts = $request->input("comfort");
                if($comforts != null){
                    foreach($comforts as $comfort) {
                        $facility = new HotelFacilities;
                        $facility->comfort_id = $comfort;
                        $facility->hotel_id = $hotel->id;
                        $facility->save();
                    }
                }
                if(Config::get('app.locale') == 'en'){
                    $success_output = '<div class="alert alert-success">Data Inserted Successfully</div>';
                }elseif(Config::get('app.locale') == 'en'){
                    $success_output = '<div class="alert alert-success">تم ادخال البيانات بنجاح</div>';
                }
            }
        }
        $output = array(
            'error'     =>  $error_array,
            'success'   =>  $success_output
        );
        echo json_encode($output);
    }

    public function postHotelRooms(Request $request) {
        $error_array = array();
        $success_output = '';
        if (Config::get('app.locale') == 'en'){
            $validation = Validator::make($request->all(), [
                'image' => 'required|image|mimes:jpeg,jpg,png,gif,pdf|max:20000',
                'r_name_en' => 'required',
                'r_name_ar' => 'required',
                'content_ar' => 'required',
                'content_en' => 'required',
                'price' => 'required',
                'max'  => 'required',
                'nights' => 'required',
                'hotel_id' => 'required',
            ],[
                'image.required' => 'Please Upload Image',
                'image.image' => 'Please upload image not video',
                'image.mimes' => 'Image type : jpeg,jpg,png,gif',
                'image.max' => 'Max Size 20 MB',
                'r_name_en.required' => 'Please Enter Room Name in English',
                'r_name_ar.required' => 'Please Enter Room Name in Arabic',
                'Content_ar.required' => 'Please Enter Room Details in Arabic',
                'Content_en.required' => 'Please Enter Room Details in English',
                'max.required' => 'Please Enter Number Of Guests',
                'nights.required' => 'Please Enter Number Of Rooms',
                'price.required' => 'Please Enter Price',
                'hotel_id.required' => 'Please Select Hotel',
            ]);
        }elseif(Config::get('app.locale') == 'ar'){
            $validation = Validator::make($request->all(), [
                'image' => 'required|image|mimes:jpeg,jpg,png,gif,pdf|max:20000',
                'r_name_en' => 'required',
                'r_name_ar' => 'required',
                'content_ar' => 'required',
                'content_en' => 'required',
                'price' => 'required',
                'max'  => 'required',
                'nights' => 'required',
                'hotel_id' => 'required',
                'price' => 'required',
            ],[
                'image.required' => 'من فضلك قم بتحميل الصورة',
                'image.image' => 'قم بتحميل صورة وليس فيديو',
                'image.mimes' => 'نوع الصورة : jpeg,jpg,png,gif',
                'image.max' => 'أقصى حجم للصورة 20 MB',
                'r_name_en.required' => 'قم بادخال اسم الغرفة باللغة الانجليزية',
                'r_name_ar.required' => 'قم بادخال اسم الغرفة باللغة العربية',
                'content_ar.required' => 'قم بادخال تفاصيل الغرفة باللغة العربية',
                'content_en.required' => 'قم بادخال تفاصيل الغرفة باللغة الانجليزية',
                'max.required' => 'قم بادخال عدد الافراد',
                'nights.required' => 'قم بادخال عدد الغرف',
                'price.required' => 'قم بادخال السعر',
                'hotel_id.required' => 'قم باختيار الفندق',
            ]);
        }
        
        
        if ($validation->fails())
        {
            foreach ($validation->messages()->getMessages() as $field_name => $messages)
            {
                $error_array[] = $messages; 
            }
        }
        else
        {
            $room = new HotelRooms;
            $destination = storage_path('uploads/' . $request->storage);
            $image = Input::File('image');
            if($image != null){
                if (is_file($destination . "/{$image}")) {
                    @unlink($destination . "/{$image}");
                }
                $imageName = $image->getClientOriginalName();
                $image->move($destination, $imageName);
                $room->image = $imageName;
            }
            $room->r_name_en = $request->r_name_en;
            $room->r_name_ar = $request->r_name_ar;
            $room->content_ar = $request->content_ar;
            $room->content_en = $request->content_en;
            $room->price = $request->price;
            $room->nights = $request->nights;
            $room->max = $request->max;
            $room->hotel_id = $request->hotel_id;
            $room->active = -1;
            
            if($room->save()){
                if(Config::get('app.locale') == 'en'){
                    $success_output = '<div class="alert alert-success">Data Inserted Successfully</div>';
                }elseif(Config::get('app.locale') == 'en'){
                    $success_output = '<div class="alert alert-success">تم ادخال البيانات بنجاح</div>';
                }
            }
        }
        $output = array(
            'error'     =>  $error_array,
            'success'   =>  $success_output
        );
        echo json_encode($output);
    }

    public function postHotelFeatures(Request $request) {
        $error_array = array();
        $success_output = '';
        if (Config::get('app.locale') == 'en'){
            $validation = Validator::make($request->all(), [
                'image' => 'required|image|mimes:jpeg,jpg,png,gif,pdf|max:20000',
                'f_name_en' => 'required',
                'f_name_ar' => 'required',
                'content_ar' => 'required',
                'content_en' => 'required',
                'hotel_id' => 'required',
            ],[
                'image.required' => 'Please Upload Image',
                'image.image' => 'Please upload image not video',
                'image.mimes' => 'Image type : jpeg,jpg,png,gif',
                'image.max' => 'Max Size 20 MB',
                'f_name_en.required' => 'Please Enter Name in English',
                'f_name_ar.required' => 'Please Enter Name in Arabic',
                'content_ar.required' => 'Please Enter Details in Arabic',
                'content_en.required' => 'Please Enter Details in English',
                'hotel_id.required' => 'Please Select Hotel',
            ]);
        }elseif(Config::get('app.locale') == 'ar'){
            $validation = Validator::make($request->all(), [
                'image' => 'required|image|mimes:jpeg,jpg,png,gif,pdf|max:20000',
                'f_name_en' => 'required',
                'f_name_ar' => 'required',
                'content_ar' => 'required',
                'content_en' => 'required',
                'hotel_id' => 'required',
            ],[
                'image.required' => 'من فضلك قم بتحميل الصورة',
                'image.image' => 'قم بتحميل صورة وليس فيديو',
                'image.mimes' => 'نوع الصورة : jpeg,jpg,png,gif',
                'image.max' => 'أقصى حجم للصورة 20 MB',
                'f_name_en.required' => 'قم بادخال الاسم باللغة الانجليزية',
                'f_name_ar.required' => 'قم بادخال الاسم باللغة العربية',
                'content_ar.required' => 'قم بادخال التفاصيل باللغة العربية',
                'content_en.required' => 'قم بادخال التفاصيل باللغة الانجليزية',
                'hotel_id.required' => 'قم باختيار الفندق',
            ]);
        }
        
        
        if ($validation->fails())
        {
            foreach ($validation->messages()->getMessages() as $field_name => $messages)
            {
                $error_array[] = $messages; 
            }
        }
        else
        {
            $feature = new HotelFeatures;
            $destination = storage_path('uploads/' . $request->storage);
            $image = Input::File('image');
            if($image != null){
                if (is_file($destination . "/{$image}")) {
                    @unlink($destination . "/{$image}");
                }
                $imageName = $image->getClientOriginalName();
                $image->move($destination, $imageName);
                $feature->image = $imageName;
            }
            $feature->f_name_en = $request->f_name_en;
            $feature->f_name_ar = $request->f_name_ar;
            $feature->content_ar = $request->content_ar;
            $feature->content_en = $request->content_en;
            $feature->hotel_id = $request->hotel_id;
            $feature->active = -1;
            
            if($feature->save()){
                if(Config::get('app.locale') == 'en'){
                    $success_output = '<div class="alert alert-success">Data Inserted Successfully</div>';
                }elseif(Config::get('app.locale') == 'en'){
                    $success_output = '<div class="alert alert-success">تم ادخال البيانات بنجاح</div>';
                }
            }
        }
        $output = array(
            'error'     =>  $error_array,
            'success'   =>  $success_output
        );
        echo json_encode($output);
    }

    public function postHotelFacilities(Request $request) {
        $error_array = array();
        $success_output = '';
            if (Config::get('app.locale') == 'en'){
                $validation = Validator::make($request->all(), [
                    'image' => 'required|image|mimes:jpeg,jpg,png,gif,pdf|max:20000',
                    'c_name_en' => 'required',
                    'c_name_ar' => 'required',
                    'hotel_id' => 'required',
                ],[
                    'image.required' => 'Please Upload Image',
                    'image.image' => 'Please upload image not video',
                    'image.mimes' => 'Image type : jpeg,jpg,png,gif',
                    'image.max' => 'Max Size 20 MB',
                    'c_name_en.required' => 'Please Enter Name in English',
                    'c_name_ar.required' => 'Please Enter Name in Arabic',
                    'hotel_id.required' => 'Please Select Hotel',
                ]);
            }elseif(Config::get('app.locale') == 'ar'){
                $validation = Validator::make($request->all(), [
                    'image' => 'required|image|mimes:jpeg,jpg,png,gif,pdf|max:20000',
                    'c_name_en' => 'required',
                    'c_name_ar' => 'required',
                    'hotel_id' => 'required',
                ],[
                    'image.required' => 'من فضلك قم بتحميل الصورة',
                    'image.image' => 'قم بتحميل صورة وليس فيديو',
                    'image.mimes' => 'نوع الصورة : jpeg,jpg,png,gif',
                    'image.max' => 'أقصى حجم للصورة 20 MB',
                    'c_name_en.required' => 'قم بادخال الاسم باللغة الانجليزية',
                    'c_name_ar.required' => 'قم بادخال الاسم باللغة العربية',
                    'hotel_id.required' => 'قم باختيار الفندق',
                ]);
            }        
        
        if ($validation->fails())
        {
            foreach ($validation->messages()->getMessages() as $field_name => $messages)
            {
                $error_array[] = $messages; 
            }
        }
        else
        {
            $comfort = new Comfort;
            $destination = storage_path('uploads/' . $request->storage);
            $image = Input::File('image');
            if($image != null){
                if (is_file($destination . "/{$image}")) {
                    @unlink($destination . "/{$image}");
                }
                $imageName = $image->getClientOriginalName();
                $image->move($destination, $imageName);
                $comfort->image = $imageName;
            }
            $comfort->c_name_en = $request->c_name_en;
            $comfort->c_name_ar = $request->c_name_ar;
            $comfort->hotel_id = $request->hotel_id;
            $comfort->active = -1;
            
            if($comfort->save()){
                if(Config::get('app.locale') == 'en'){
                    $success_output = '<div class="alert alert-success">Data Inserted Successfully</div>';
                }elseif(Config::get('app.locale') == 'en'){
                    $success_output = '<div class="alert alert-success">تم ادخال البيانات بنجاح</div>';
                }
            }
        }
        $output = array(
            'error'     =>  $error_array,
            'success'   =>  $success_output
        );
        echo json_encode($output);
    }

    public function postEditHotel(Request $request) {
        $error_array = array();
        $success_output = '';
        $id = $request->hotel_id;
            $hotel = Hotel::find($id);
            $destination = storage_path('uploads/' . $request->storage);
            $image = Input::File('image');
            if($image != null){
                if (is_file($destination . "/{$image}")) {
                    @unlink($destination . "/{$image}");
                }
                $imageName = $image->getClientOriginalName();
                $image->move($destination, $imageName);
                $hotel->image = $imageName;
                $hotel->inner_image = $imageName;
            }
            $hotel->hotel_name_en = $request->hotel_name_en;
            $hotel->hotel_name_ar = $request->hotel_name_ar;
            $hotel->far_ar = $request->far_ar;
            $hotel->far_en = $request->far_en;
            $hotel->remote_ar = $request->remote_ar;
            $hotel->remote_en = $request->remote_en;
            $hotel->street_ar = $request->street_ar;
            $hotel->price = $request->price;
            $hotel->discount = $request->discount;
            $hotel->street_en = $request->street_en;
            $hotel->place_id = $request->place_id;
            $hotel->stars = $request->stars;
            $hotel->user_id = $request->user_id;
            $hotel->best = 0;
            $hotel->max = 0;
            $hotel->active = -1;
            
            if($hotel->save()){
                HotelFacilities::where('hotel_id', $id)->delete();
                $comforts = $request->input("comfort");
                if($comforts != null){
                    foreach($comforts as $comfort) {
                        $facility = new HotelFacilities;
                        $facility->comfort_id = $comfort;
                        $facility->hotel_id = $id;
                        $facility->save();
                    }
                }
                if(Config::get('app.locale') == 'en'){
                    $success_output = '<div class="alert alert-success">Data Inserted Successfully</div>';
                }elseif(Config::get('app.locale') == 'en'){
                    $success_output = '<div class="alert alert-success">تم ادخال البيانات بنجاح</div>';
                }
            }
        $output = array(
            'error'     =>  $error_array,
            'success'   =>  $success_output
        );
        echo json_encode($output);
    }

    //Flight
    public function addFlight() {
        $data = new Data;
        $contact = new Contact;
        return view('site.pages.add_flight.index', compact('data','contact'));
    }

    public function editFlight($id) {
        $data = new Data;
        $contact = new Contact;
        $flight = Flight::find($id);
        return view('site.pages.edit_flight.index', compact('data','contact','flight'));
    }
    
    public function postFlight(Request $request) {
        $error_array = array();
        $success_output = '';
        if (Config::get('app.locale') == 'en'){
            $validation = Validator::make($request->all(), [
                'image' => 'required|image|mimes:jpeg,jpg,png,gif,pdf|max:20000',
                'flight_name_en' => 'required',
                'flight_name_ar' => 'required',
            ],[
                'image.required' => 'Please Upload Image',
                'image.image' => 'Please upload image not video',
                'image.mimes' => 'Image type : jpeg,jpg,png,gif',
                'image.max' => 'Max Size 20 MB',
                'flight_name_en.required' => 'Please Enter Flight Name in English',
                'flight_name_ar.required' => 'Please Enter Flight Name in Arabic',
            ]);
        }elseif(Config::get('app.locale') == 'ar'){
            $validation = Validator::make($request->all(), [
                'image' => 'required|image|mimes:jpeg,jpg,png,gif,pdf|max:20000',
                'flight_name_en' => 'required',
                'flight_name_ar' => 'required',
            ],[
                'image.required' => 'من فضلك قم بتحميل الصورة',
                'image.image' => 'قم بتحميل صورة وليس فيديو',
                'image.mimes' => 'نوع الصورة : jpeg,jpg,png,gif',
                'image.max' => 'أقصى حجم للصورة 20 MB',
                'flight_name_en.required' => 'قم بادخال اسم الرحلة باللغة الانجليزية',
                'flight_name_ar.required' => 'قم بادخال اسم الرحلة باللغة العربية',
            ]);
        }
        
        
        if ($validation->fails())
        {
            foreach ($validation->messages()->getMessages() as $field_name => $messages)
            {
                $error_array[] = $messages; 
            }
        }
        else
        {
            $flight = new Flight;
            $destination = storage_path('uploads/' . $request->storage);
            $image = Input::File('image');
            if($image != null){
                if (is_file($destination . "/{$image}")) {
                    @unlink($destination . "/{$image}");
                }
                $imageName = $image->getClientOriginalName();
                $image->move($destination, $imageName);
                $flight->image = $imageName;
            }
            $flight->flight_name_en = $request->flight_name_en;
            $flight->flight_name_ar = $request->flight_name_ar;
            $flight->duration_ar = $request->duration_ar;
            $flight->duration_en = $request->duration_en;
            $flight->content_ar = $request->content_ar;
            $flight->content_en = $request->content_en;
            $flight->start = $request->start;
            $flight->end = $request->end;
            $flight->code = $request->code;
            $flight->price = $request->price;
            $flight->user_id = $request->user_id;
            $flight->active = -1;
            
            if($flight->save()){
                if(Config::get('app.locale') == 'en'){
                    $success_output = '<div class="alert alert-success">Data Inserted Successfully</div>';
                }elseif(Config::get('app.locale') == 'en'){
                    $success_output = '<div class="alert alert-success">تم ادخال البيانات بنجاح</div>';
                }
            }
        }
        $output = array(
            'error'     =>  $error_array,
            'success'   =>  $success_output
        );
        echo json_encode($output);
    }

    public function postEditFlight(Request $request) {
        $error_array = array();
        $success_output = '';
        $flight2 = Flight::find($request->input('flight_id'));
        $destination2 = storage_path('uploads/' . $request->storage);
        $image2 = $request->file('image');
        if ($image2 != null) {
            if (is_file($destination2 . "/{$image2}")) {
                @unlink($destination2 . "/{$image2}");
            }
            $imageName = $image2->getClientOriginalName();
            $image2->move($destination2, $imageName);
            $flight2->image = $imageName;
        }
        $flight2->flight_name_en = $request->flight_name_en;
        $flight2->flight_name_ar = $request->flight_name_ar;
        $flight2->duration_ar = $request->duration_ar;
        $flight2->duration_en = $request->duration_en;
        $flight2->content_ar = $request->content_ar;
        $flight2->content_en = $request->content_en;
        $flight2->start = $request->start;
        $flight2->end = $request->end;
        $flight2->code = $request->code;
        $flight2->price = $request->price;
        $flight2->user_id = $request->user_id;
        $flight2->active = -1;
            
        if($flight2->save()){
            if (Config::get('app.locale') == 'en'){
                $success_output = '<div class="alert alert-success">Data Updated Successfully</div>';
            }elseif(Config::get('app.locale') == 'en'){
                $success_output = '<div class="alert alert-success">تم تحديث البيانات بنجاح</div>';
            }
        }
        $output = array(
            'error'     =>  $error_array,
            'success'   =>  $success_output
        );
        echo json_encode($output);
    }

    //Program
    public function addProgram() {
        $data = new Data;
        $contact = new Contact;
        $hotels = Hotel::where('active', 1)->get();
        $flights = Flight::where('active', 1)->get();
        $services = Service::where('active', 1)->get();
        return view('site.pages.add_program.index', compact('data','contact','flights','hotels','services'));
    }

    public function editProgram($id) {
        $data = new Data;
        $contact = new Contact;
        $program = Program::find($id);
        $hotelss = DB::table('program_hotels')
                        ->join('hotels','hotels.id','=','program_hotels.hotel_id')
                        ->join('programs','programs.id','=','program_hotels.program_id')
                        ->select('hotels.*')
                        ->where("program_hotels.program_id", $id)
                        ->get();
        $flightss = DB::table('program_flights')
                        ->join('flights','flights.id','=','program_flights.flight_id')
                        ->join('programs','programs.id','=','program_flights.program_id')
                        ->select('flights.*')
                        ->where("program_flights.program_id", $id)
                        ->get();
        $servicess = DB::table('program_services')
                        ->join('services','services.id','=','program_services.service_id')
                        ->join('programs','programs.id','=','program_services.program_id')
                        ->select('services.*')
                        ->where("program_services.program_id", $id)
                        ->get();
        $hotels = Hotel::where('active', 1)->get();
        $flights = Flight::where('active', 1)->get();
        $services = Service::where('active', 1)->get();
        return view('site.pages.edit_program.index', compact('data','contact','flights','hotels','services','program','hotelss','flightss','servicess'));
    }
    
    public function postProgram(Request $request) {
        $error_array = array();
        $success_output = '';
        if (Config::get('app.locale') == 'en'){
            $validation = Validator::make($request->all(), [
                'image' => 'required|image|mimes:jpeg,jpg,png,gif,pdf|max:20000',
                'p_name_en' => 'required',
                'p_name_ar' => 'required',
            ],[
                'image.required' => 'Please Upload Image',
                'image.image' => 'Please upload image not video',
                'image.mimes' => 'Image type : jpeg,jpg,png,gif',
                'image.max' => 'Max Size 20 MB',
                'p_name_en.required' => 'Please Enter Program Name in English',
                'p_name_ar.required' => 'Please Enter Program Name in Arabic',
            ]);
        }elseif(Config::get('app.locale') == 'ar'){
            $validation = Validator::make($request->all(), [
                'image' => 'required|image|mimes:jpeg,jpg,png,gif,pdf|max:20000',
                'p_name_en' => 'required',
                'p_name_ar' => 'required',
            ],[
                'image.required' => 'من فضلك قم بتحميل الصورة',
                'image.image' => 'قم بتحميل صورة وليس فيديو',
                'image.mimes' => 'نوع الصورة : jpeg,jpg,png,gif',
                'image.max' => 'أقصى حجم للصورة 20 MB',
                'p_name_en.required' => 'قم بادخال اسم البرنامج باللغة الانجليزية',
                'p_name_ar.required' => 'قم بادخال اسم البرنامج باللغة العربية',
            ]);
        }
        
        
        if ($validation->fails())
        {
            foreach ($validation->messages()->getMessages() as $field_name => $messages)
            {
                $error_array[] = $messages; 
            }
        }
        else
        {
            $program = new Program;
            $destination = storage_path('uploads/' . $request->storage);
            $image = Input::File('image');
            if($image != null){
                if (is_file($destination . "/{$image}")) {
                    @unlink($destination . "/{$image}");
                }
                $imageName = $image->getClientOriginalName();
                $image->move($destination, $imageName);
                $program->image = $imageName;
            }
            $program->p_name_en = $request->p_name_en;
            $program->p_name_ar = $request->p_name_ar;
            $program->sub_name_ar = $request->sub_name_ar;
            $program->sub_name_en = $request->sub_name_en;
            $program->price = $request->price;
            $program->code = $request->code;
            $program->jeddah_ar = $request->jeddah_ar;
            $program->jeddah_en = $request->jeddah_en;
            $program->mekkah_ar = $request->mekkah_ar;
            $program->mekkah_en = $request->mekkah_en;
            $program->madenah_ar = $request->madenah_ar;
            $program->madenah_en = $request->madenah_en;
            $program->flight_ar = $request->flight_ar;
            $program->flight_en = $request->flight_en;
            $program->service_ar = $request->service_ar;
            $program->service_en = $request->service_en;
            $program->hotel_ar = $request->hotel_ar;
            $program->hotel_en = $request->hotel_en;
            $program->rate = $request->rate;
            $program->user_id = $request->user_id;
            $program->active = -1;
            
            if($program->save()){
                $hotels = $request->input("hotel");
                if($hotels != null){
                    foreach($hotels as $hotel) {
                        $programHotels = new ProgramHotels;
                        $programHotels->program_id = $program->id;
                        $programHotels->hotel_id = $hotel;
                        $programHotels->save();
                    }
                }
                $flights = $request->input("flight");
                if($flights != null){
                    foreach($flights as $flight) {
                        $programflights = new ProgramFlights;
                        $programflights->program_id = $program->id;
                        $programflights->flight_id = $flight;
                        $programflights->save();
                    }
                }
                $services = $request->input("service");
                if($services != null){
                    foreach($services as $service) {
                        $programservices = new ProgramServices;
                        $programservices->program_id = $program->id;
                        $programservices->service_id = $service;
                        $programservices->save();
                    }
                }
                if(Config::get('app.locale') == 'en'){
                    $success_output = '<div class="alert alert-success">Data Inserted Successfully</div>';
                }elseif(Config::get('app.locale') == 'en'){
                    $success_output = '<div class="alert alert-success">تم ادخال البيانات بنجاح</div>';
                }
            }
        }
        $output = array(
            'error'     =>  $error_array,
            'success'   =>  $success_output
        );
        echo json_encode($output);
    }

    public function postEditProgram(Request $request) {
        $error_array = array();
        $success_output = '';
        $program2 = Program::find($request->input('program_id'));
        $destination2 = storage_path('uploads/' . $request->storage);
        $image2 = $request->file('image');
        if ($image2 != null) {
            if (is_file($destination2 . "/{$image2}")) {
                @unlink($destination2 . "/{$image2}");
            }
            $imageName = $image2->getClientOriginalName();
            $image2->move($destination2, $imageName);
            $program2->image = $imageName;
        }
        $program2->p_name_en = $request->p_name_en;
        $program2->p_name_ar = $request->p_name_ar;
        $program2->sub_name_ar = $request->sub_name_ar;
        $program2->sub_name_en = $request->sub_name_en;
        $program2->price = $request->price;
        $program2->jeddah_ar = $request->jeddah_ar;
        $program2->jeddah_en = $request->jeddah_en;
        $program2->mekkah_ar = $request->mekkah_ar;
        $program2->mekkah_en = $request->mekkah_en;
        $program2->madenah_ar = $request->madenah_ar;
        $program2->madenah_en = $request->madenah_en;
        $program2->flight_ar = $request->flight_ar;
        $program2->flight_en = $request->flight_en;
        $program2->service_ar = $request->service_ar;
        $program2->service_en = $request->service_en;
        $program2->hotel_ar = $request->hotel_ar;
        $program2->hotel_en = $request->hotel_en;
        $program2->rate = $request->rate;
        $program2->code = $request->code;
        $program2->user_id = $request->user_id;
        $program2->active = -1;
            
        if($program2->save()){
            DB::table('program_hotels')->where('program_id','=', $program2->id)->delete();
            DB::table('program_services')->where('program_id','=', $program2->id)->delete();
            DB::table('program_flights')->where('program_id','=', $program2->id)->delete();
            $hotels = $request->input("hotel");
            if($hotels != null){
                foreach($hotels as $hotel) {
                    $programHotels = new ProgramHotels;
                    $programHotels->program_id = $program2->id;
                    $programHotels->hotel_id = $hotel;
                    $programHotels->save();
                }
            }
            $flights = $request->input("flight");
            if($flights != null){
                foreach($flights as $flight) {
                    $programflights = new ProgramFlights;
                    $programflights->program_id = $program2->id;
                    $programflights->flight_id = $flight;
                    $programflights->save();
                }
            }
            $services = $request->input("service");
            if($services != null){
                foreach($services as $service) {
                    $programservices = new ProgramServices;
                    $programservices->program_id = $program2->id;
                    $programservices->service_id = $service;
                    $programservices->save();
                }
            }
            if (Config::get('app.locale') == 'en'){
                $success_output = '<div class="alert alert-success">Data Updated Successfully</div>';
            }elseif(Config::get('app.locale') == 'en'){
                $success_output = '<div class="alert alert-success">تم تحديث البيانات بنجاح</div>';
            }
        }
        $output = array(
            'error'     =>  $error_array,
            'success'   =>  $success_output
        );
        echo json_encode($output);
    }

}