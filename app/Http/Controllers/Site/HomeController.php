<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Notifications\notify_me;
use App\Slider;
use App\Service;
use App\ServiceFeatures;
use App\ServiceGallery;
use App\Hotel;
use App\HotelFeatures;
use App\HotelGallery;
use App\Test;
use App\Office;
use App\Flight;
use App\Program;
use App\Claim;
use App\Post;
use App\Cat;
use App\Data;
use App\Comfort;
use App\Member;
use App\Place;
use App\Contact;
use App\Subscriber;
use Config;
use Validator;
use Auth;
use Helper;
use DB;

class HomeController extends Controller
{
    public function getIndex() {
        $hotels = DB::table('hotels')
            ->join('places','hotels.place_id','=','places.id')
            ->select('hotels.*','places.place_name_ar','places.place_name_en')
            ->where("hotels.active", 1)
            ->get();
        $sliders = Slider::where('active', 1)->get();
        $offices = Office::where('active', 1)->get();
        $places = Place::where('active', 1)->get();
        $programmes = Program::where('active', 1)->get();
        $tests = Test::where('active', 1)->get();
        $data = new Data;
        $contact = new Contact;
        return view('site.pages.home.home', compact('hotels','sliders','offices','programmes','data','contact','places','tests'));
    }
    
    public function program($id) {
        $program = Program::find($id);
        $services = DB::table('program_services')
                        ->join('services','services.id','=','program_services.service_id')
                        ->join('programs','programs.id','=','program_services.program_id')
                        ->select('services.*')
                        ->where("program_services.program_id", $id)
                        ->get();

        $flights = DB::table('program_flights')
                        ->join('flights','flights.id','=','program_flights.flight_id')
                        ->join('programs','programs.id','=','program_flights.program_id')
                        ->select('flights.*')
                        ->where("program_flights.program_id", $id)
                        ->get();

        $hotels = DB::table('program_hotels')
                        ->join('hotels','hotels.id','=','program_hotels.hotel_id')
                        ->join('programs','programs.id','=','program_hotels.program_id')
                        ->select('hotels.*')
                        ->where("program_hotels.program_id", $id)
                        ->get();
        $hotelss = Hotel::where('active', 1)->get();
        $data = new Data;
        $contact = new Contact;
        return view('site.pages.program.index', compact('program','data','contact','services','flights','hotels','hotelss'));
    }

    

    public function umratak() {
        $hotels = DB::table('hotels')
            ->join('places','hotels.place_id','=','places.id')
            ->select('hotels.*','places.place_name_ar','places.place_name_en')
            ->where("hotels.active", 1)
            ->get();
        $sliders = Slider::where('active', 1)->get();
        $offices = Office::where('active', 1)->get();
        $places = Place::where('active', 1)->get();
        $services = Service::where('active', 1)->get();
        $programmes = Program::where('active', 1)->get();
        $members = Member::where('type', 'company')->where('active', 1)->get();
        $tests = Test::where('active', 1)->get();
        $data = new Data;
        $contact = new Contact;
        return view('site.pages.umratak.index', compact('services','members','hotels','sliders','offices','programmes','data','contact','places','tests'));
    }

    public function about() {
        $data = new Data;
        $contact = new Contact;
        return view('site.pages.about.index', compact('data','contact'));
    }

    public function faq() {
        $data = new Data;
        $contact = new Contact;
        return view('site.pages.faq.index', compact('data','contact'));
    }

    public function terms() {
        $data = new Data;
        $contact = new Contact;
        return view('site.pages.terms.index', compact('data','contact'));
    }

    public function privacy() {
        $data = new Data;
        $contact = new Contact;
        return view('site.pages.privacy.index', compact('data','contact'));
    }

    public function flights(Request $request) {
        $flights_output = [];
        $flightsData = Flight::where('active', 1)->get();
        $flights_output = Helper::prepare_flights($flightsData, $flights_output);
        $paginate_flights = Helper::custom_pagination($flights_output, $request->url(), $request->query());
        $data = new Data;
        $contact = new Contact;
        return view('site.pages.flights.index', [
            'flights'   => $paginate_flights,
            'data'     => $data,
            'contact'   => $contact
        ]);
    }

    public function hotels() {
        $hotels = DB::table('hotels')
                ->join('places','hotels.place_id','=','places.id')
                ->select('hotels.*','places.place_name_ar','places.place_name_en')
                ->where("hotels.active", 1)
                ->get();
        $places = Place::where('active', 1)->get();
        $data = new Data;
        $contact = new Contact;
        return view('site.pages.hotels.index', compact('data','contact','hotels','places'));
    }

    public function flight($id,Request $request) {
        $flight = Flight::find($id);
        $data = new Data;
        $contact = new Contact;
        return view('site.pages.flight.index', compact('data','contact','flight'));
    }

    public function hotel($id,Request $request) {
        $hotel = Hotel::find($id);
        $features = HotelFeatures::where('active', 1)->get();
        $comforts = Comfort::where('active', 1)->get();
        $gallery = HotelGallery::all();
        $hotels_output = [];
        $hotelsData = Hotel::where('active', 1)->get();
        $hotels_output = Helper::prepare_hotels($hotelsData, $hotels_output);
        $paginate_hotels = Helper::cust_pagination($hotels_output, $request->url(), $request->query());
        $data = new Data;
        $contact = new Contact;
        return view('site.pages.hotel.index', [
            'hotels'   => $paginate_hotels,
            'hotel' => $hotel,
            'features' => $features,
            'comforts' => $comforts,
            'gallery' => $gallery,
            'data'     => $data,
            'contact'   => $contact
        ]);
    }

    public function service($id,Request $request) {
        $service = Service::find($id);
        $features = ServiceFeatures::where('active', 1)->get();
        $gallery = ServiceGallery::all();
        $services_output = [];
        $servicesData = Service::where('active', 1)->get();
        $services_output = Helper::prepare_services($servicesData, $services_output);
        $paginate_services = Helper::cust_pagination($services_output, $request->url(), $request->query());
        $data = new Data;
        $contact = new Contact;
        return view('site.pages.service.index', [
            'services'   => $paginate_services,
            'service' => $service,
            'features' => $features,
            'gallery' => $gallery,
            'data'     => $data,
            'contact'   => $contact
        ]);
    }

    public function services() {
        $services = DB::table('services')
                        ->join('places','services.place_id','=','places.id')
                        ->select('services.*','places.place_name_ar','places.place_name_en')
                        ->where("services.active", 1)
                        ->get();
        $places = Place::where('active', 1)->get();
        $data = new Data;
        $contact = new Contact;
        return view('site.pages.services.index', compact('services','data','contact','places'));
    }

    public function offices() {
        $offices = Office::where('active', 1)->get();
        $data = new Data;
        $contact = new Contact;
        return view('site.pages.offices.index', compact('offices','data','contact'));
    }

    public function programmes(Request $request) {
        $programs_output = [];
        $programsData = Program::where('active', 1)->get();
        $programs_output = Helper::prepare_programs($programsData, $programs_output);
        $paginate_programs = Helper::custom_pagination($programs_output, $request->url(), $request->query());
        $data = new Data;
        $contact = new Contact;
        return view('site.pages.programmes.index', [
            'programmes'   => $paginate_programs,
            'data'     => $data,
            'contact'   => $contact
        ]);
    }
    
    public function blog() {
        $departments = Special::where('active', 1)->get();
        $posts = Post::where('active', 1)->get();
        $cats = Cat::where('active', 1)->get();
        $data = new Data;
        $contact = new Contact;
        return view('site.pages.blog.index', compact('departments','posts','cats','data','contact'));
    }

    public function getPost($id) {
        $departments = Special::where('active', 1)->get();
        $post = Post::find($id);
        $posts = Post::where('active', 1)->get();
        $cats = Cat::where('active', 1)->get();
        $data = new Data;
        $contact = new Contact;
        return view('site.pages.post.index', compact('departments','post','posts','cats','data','contact'));
    }
    
    public function contact() {
        $data = new Data;
        $contact = new Contact;
        return view('site.pages.contact.index', compact('data','contact'));
    }

    public function error() {
        $data = new Data;
        $contact = new Contact;
        return view('site.pages.error.index', compact('data','contact'));
    }

    function claim(Request $request){
        $error_array = array();
        $success_output = '';
            if (Config::get('app.locale') == 'en'){
                $validation = Validator::make($request->all(), [
                    'name' => 'required',
                    'email' => 'required|email',
                    'phone' => 'required',
                    'message' => 'required',
                ],[
                    'name.required' => 'Please Enter Your Name',
                    'email.required' => 'Please Enter Your Email',
                    'email.email' => 'Please Enter Valid Email',
                    'phone.required' => 'Please Enter Your Phone',
                    'message.required' => 'Please Enter Your Message',
                ]);
            }elseif(Config::get('app.locale') == 'ar'){
                $validation = Validator::make($request->all(), [
                    'name' => 'required',
                    'email' => 'required|email',
                    'phone' => 'required',
                    'message' => 'required',
                ],[
                    'name.required' => 'من فضلك ادخل الاسم',
                    'email.required' => 'من فضلك ادخل البريد الالكترونى',
                    'email.email' => 'من فضلك تأكد من صلاحية البريد الالكترونى',
                    'phone.required' => 'من فضلك ادخل رقم الهاتف',
                    'message.required' => 'من فضلك ادخل رسالتك',
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
                $claim = new Claim;
                $claim->name = $request->name;
                $claim->email = $request->email;
                $claim->phone = $request->phone;
                $claim->message = $request->message;
                
                if($claim->save()){
                    if (Auth::guard('admins')->check()){
                        Auth::guard('admins')->user()->notify(new notify_me());
                    }
                    if(Config::get('app.locale') == 'en'){
                        $success_output = '<div class="alert alert-success">Data Inserted Successfully</div>';
                    }elseif(Config::get('app.locale') == 'ar'){
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

        function subscribe(Request $request){
            $error_array = array();
            $success_output = '';
                if (Config::get('app.locale') == 'en'){
                    $validation = Validator::make($request->all(), [
                        'email' => 'required|email'
                    ],[
                        'name.required' => 'Please Enter Your Name',
                        'email.required' => 'Please Enter Your Email',
                        'email.email' => 'Please Enter Valid Email',
                    ]);
                }elseif(Config::get('app.locale') == 'ar'){
                    $validation = Validator::make($request->all(), [
                        'email' => 'required|email'
                    ],[
                        'name.required' => 'من فضلك ادخل الاسم',
                        'email.required' => 'من فضلك ادخل البريد الالكترونى',
                        'email.email' => 'من فضلك تأكد من صلاحية البريد الالكترونى',
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
                    $subscribe = new Subscriber;
                    $subscribe->email = $request->email;
                    
                    if($subscribe->save()){
                        if(Config::get('app.locale') == 'en'){
                            $success_output = '<div class="alert alert-success">Data Inserted Successfully</div>';
                        }elseif(Config::get('app.locale') == 'ar'){
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

        
}
