<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Notifications\notify_me;
use App\Slider;
use App\Service;
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
use App\Guest;
use App\Data;
use App\HotelRooms;
use App\Member;
use App\Place;
use App\Contact;
use Config;
use Validator;
use DateTime;
use Auth;
use Helper;
use DB;

class SearchController extends Controller
{
    public function serviceFilter(Request $request) {
        $amount1 = $request->input('amount1');
        $amount2 = $request->input('amount2');
        $services = Service::whereBetween('price', [$amount1, $amount2])->get();
        $places = Place::where('active', 1)->get();
        $data = new Data;
        $contact = new Contact;
        return view('site.pages.services.index', compact('data','contact','services','places'));
    }

    public function hotelFilter(Request $request) {
        $amount1 = $request->input('amount1');
        $amount2 = $request->input('amount2');
        $hotels = Hotel::whereBetween('price', [$amount1, $amount2])->get();
        $places = Place::where('active', 1)->get();
        $data = new Data;
        $contact = new Contact;
        return view('site.pages.hotels.index', compact('data','contact','hotels','places'));
    }

    public function flightFilter(Request $request) {
        $amount1 = $request->input('amount1');
        $amount2 = $request->input('amount2');
        $flights_output = [];
        $flightsData = Flight::whereBetween('price', [$amount1, $amount2])->get();
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

    public function programFilter(Request $request) {
        $amount1 = $request->input('amount1');
        $amount2 = $request->input('amount2');
        $programs_output = [];
        $programsData = Program::whereBetween('price', [$amount1, $amount2])->get();
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

    public function hotelSearch(Request $request) {
        $hotels_output = [];
        $town = $request->input('town');
        $adults = $request->input('adults');
        $children = $request->input('children');
        $hotel = $request->input('hotel');
        $to_mekkah = $request->input('to_mekkah');
        $from_mekkah = $request->input('from_mekkah');
        $to_madinah = $request->input('to_madinah');
        $from_madinah = $request->input('from_madinah');
        $rooms = $request->input('rooms');
        $country = $request->input('country');
        $transport = $request->input('transport');
        $services = $request->input('services');
        $v_type = $request->input('v_type');
        $v_category = $request->input('v_category');
        $v_model_form = $request->input('v_model_form');
        $v_model_to = $request->input('v_model_to');
        $quantity = $request->input('quantity');
        $company = $request->input('company');
        $c_category = $request->input('c_category');
        $add_services = $request->input('add_services');
        $s_quantity = $request->input('s_quantity');
        $duration = $request->input('duration');
        $hotels = DB::table('hotels')
                    ->join('places','hotels.place_id','=','places.id')
                    ->select('hotels.*','places.place_name_en','places.place_name_ar')
                    ->where('hotels.active', '=', 1);

        
        if (Config::get('app.locale') == 'ar'){
            if ($request->has('hotel')) {
                // split on 1+ whitespace & ignore empty (eg. trailing space)
                $searchValues = preg_split('/\s+/', $hotel, -1, PREG_SPLIT_NO_EMPTY); 

                $hotels = Hotel::where(function ($q) use ($searchValues) {
                    foreach ($searchValues as $value) {
                        $q->orWhere('street_ar', 'like', "%{$value}%");
                    }
                });
            }
            // if ($request->has('town')) {
            //     $searchValues = preg_split('/\s+/', $town, -1, PREG_SPLIT_NO_EMPTY); 

            //     $hotels = Hotel::where(function ($q) use ($searchValues) {
            //         foreach ($searchValues as $value) {
            //             $q->orWhere('street_ar', 'like', "%{$value}%");
            //         }
            //     });
            // }
        }elseif(Config::get('app.locale') == 'en'){
            if ($request->has('hotel')) {
                // split on 1+ whitespace & ignore empty (eg. trailing space)
                $searchValues = preg_split('/\s+/', $hotel, -1, PREG_SPLIT_NO_EMPTY); 

                $hotels = Hotel::where(function ($q) use ($searchValues) {
                    foreach ($searchValues as $value) {
                        $q->orWhere('street_en', 'like', "%{$value}%");
                    }
                });
            }
            // if ($request->has('town')) {
            //     $searchValues = preg_split('/\s+/', $town, -1, PREG_SPLIT_NO_EMPTY); 

            //     $hotels = Hotel::where(function ($q) use ($searchValues) {
            //         foreach ($searchValues as $value) {
            //             $q->orWhere('street_en', 'like', "%{$value}%");
            //         }
            //     });
            // }
        }
        $hotelsData = $hotels->get();
        $hotels_output = Helper::prepare_hotels($hotelsData, $hotels_output);
        $paginate_hotels = Helper::cust_pagination($hotels_output, $request->url(), $request->query());
        $data = new Data;
        $contact = new Contact;
        if(Auth::guard('members')->check()){
            $guest_rooms = DB::table('guest_rooms')
                        ->join('hotels','hotels.id','=','guest_rooms.hotel_id')
                        ->join('hotel_rooms','guest_rooms.room_id','=','hotel_rooms.id')
                        ->select('hotels.*','hotel_rooms.*')
                        ->where('guest_rooms.user_id', '=', Auth::guard('members')->user()->id)
                        ->get();
            $guest_services = DB::table('guest_services')
                        ->join('services','services.id','=','guest_services.service_id')
                        ->select('services.*')
                        ->where('guest_services.user_id', '=', Auth::guard('members')->user()->id)
                        ->get();
            return view('site.pages.hotel_search.index', [
                            'hotels'   => $paginate_hotels,
                            'data'     => $data,
                            'guest_rooms'     => $guest_rooms,
                            'guest_services'     => $guest_services,
                            'town'     => $town,
                            'hotel'     => $hotel,
                            'to_mekkah'     => $to_mekkah,
                            'from_mekkah'     => $from_mekkah,
                            'to_madinah'     => $to_madinah,
                            'from_madinah'     => $from_madinah,
                            'rooms'     => $rooms,
                            'country'     => $country,
                            'transport'     => $transport,
                            'services'     => $services,
                            'v_type'     => $v_type,
                            'v_category'     => $v_category,
                            'v_model_form'     => $v_model_form,
                            'v_model_to'     => $v_model_to,
                            'quantity'     => $quantity,
                            'company'     => $company,
                            'c_category'     => $c_category,
                            'add_services'     => $add_services,
                            's_quantity'     => $s_quantity,
                            'duration'     => $duration,
                            'adults'     => $adults,
                            'children'     => $children,
                            'contact'   => $contact
                        ]);
        }else{
            return view('site.pages.hotel_search.index', [
                'hotels'   => $paginate_hotels,
                'data'     => $data,
                'town'     => $town,
                'hotel'     => $hotel,
                'to_mekkah'     => $to_mekkah,
                'from_mekkah'     => $from_mekkah,
                'to_madinah'     => $to_madinah,
                'from_madinah'     => $from_madinah,
                'rooms'     => $rooms,
                'country'     => $country,
                'transport'     => $transport,
                'services'     => $services,
                'v_type'     => $v_type,
                'v_category'     => $v_category,
                'v_model_form'     => $v_model_form,
                'v_model_to'     => $v_model_to,
                'quantity'     => $quantity,
                'company'     => $company,
                'c_category'     => $c_category,
                'add_services'     => $add_services,
                's_quantity'     => $s_quantity,
                'duration'     => $duration,
                'adults'     => $adults,
                'children'     => $children,
                'contact'   => $contact
            ]);
        }
        
    }

    public function mekkahSearch(Request $request) {
        $hotels_output = [];
        $town = $request->input('town');
        $adults = $request->input('adults');
        $children = $request->input('children');
        $hotel = $request->input('hotel');
        $to_mekkah = $request->input('to_mekkah');
        $from_mekkah = $request->input('from_mekkah');
        $to_madinah = $request->input('to_madinah');
        $from_madinah = $request->input('from_madinah');
        $rooms = $request->input('rooms');
        $country = $request->input('country');
        $transport = $request->input('transport');
        $services = $request->input('services');
        $v_type = $request->input('v_type');
        $v_category = $request->input('v_category');
        $v_model_form = $request->input('v_model_form');
        $v_model_to = $request->input('v_model_to');
        $quantity = $request->input('quantity');
        $company = $request->input('company');
        $c_category = $request->input('c_category');
        $add_services = $request->input('add_services');
        $s_quantity = $request->input('s_quantity');
        $duration = $request->input('duration');
        $hotels = DB::table('hotels')
                    ->join('places','hotels.place_id','=','places.id')
                    ->select('hotels.*','places.place_name_en','places.place_name_ar')
                    ->where('hotels.active', '=', 1)
                    ->where('hotels.place_id', '=', 1);
        
        $hotelsData = $hotels->get();
        $hotels_output = Helper::prepare_hotels($hotelsData, $hotels_output);
        $paginate_hotels = Helper::cust_pagination($hotels_output, $request->url(), $request->query());
        $data = new Data;
        $contact = new Contact;
        if(Auth::guard('members')->check()){
            $guest_rooms = DB::table('guest_rooms')
                        ->join('hotels','hotels.id','=','guest_rooms.hotel_id')
                        ->join('hotel_rooms','guest_rooms.room_id','=','hotel_rooms.id')
                        ->select('hotels.*','hotel_rooms.*')
                        ->where('guest_rooms.user_id', '=', Auth::guard('members')->user()->id)
                        ->get();
            $guest_services = DB::table('guest_services')
                        ->join('services','services.id','=','guest_services.service_id')
                        ->select('services.*')
                        ->where('guest_services.user_id', '=', Auth::guard('members')->user()->id)
                        ->get();
            return view('site.pages.mekkah_search.index', [
                'hotels'   => $paginate_hotels,
                'data'     => $data,
                'guest_rooms'     => $guest_rooms,
                'guest_services'     => $guest_services,
                'town'     => $town,
                'hotel'     => $hotel,
                'to_mekkah'     => $to_mekkah,
                'from_mekkah'     => $from_mekkah,
                'to_madinah'     => $to_madinah,
                'from_madinah'     => $from_madinah,
                'rooms'     => $rooms,
                'country'     => $country,
                'transport'     => $transport,
                'services'     => $services,
                'v_type'     => $v_type,
                'v_category'     => $v_category,
                'v_model_form'     => $v_model_form,
                'v_model_to'     => $v_model_to,
                'quantity'     => $quantity,
                'company'     => $company,
                'c_category'     => $c_category,
                'add_services'     => $add_services,
                's_quantity'     => $s_quantity,
                'duration'     => $duration,
                'adults'     => $adults,
                'children'     => $children,
                'contact'   => $contact
            ]);
        }else{
            return view('site.pages.mekkah_search.index', [
                'hotels'   => $paginate_hotels,
                'data'     => $data,
                'town'     => $town,
                'hotel'     => $hotel,
                'to_mekkah'     => $to_mekkah,
                'from_mekkah'     => $from_mekkah,
                'to_madinah'     => $to_madinah,
                'from_madinah'     => $from_madinah,
                'rooms'     => $rooms,
                'country'     => $country,
                'transport'     => $transport,
                'services'     => $services,
                'v_type'     => $v_type,
                'v_category'     => $v_category,
                'v_model_form'     => $v_model_form,
                'v_model_to'     => $v_model_to,
                'quantity'     => $quantity,
                'company'     => $company,
                'c_category'     => $c_category,
                'add_services'     => $add_services,
                's_quantity'     => $s_quantity,
                'duration'     => $duration,
                'adults'     => $adults,
                'children'     => $children,
                'contact'   => $contact
            ]);
        }
    }

    public function madinahSearch(Request $request) {
        $hotels_output = [];
        $town = $request->input('town');
        $adults = $request->input('adults');
        $children = $request->input('children');
        $hotel = $request->input('hotel');
        $to_mekkah = $request->input('to_mekkah');
        $from_mekkah = $request->input('from_mekkah');
        $to_madinah = $request->input('to_madinah');
        $from_madinah = $request->input('from_madinah');
        $rooms = $request->input('rooms');
        $country = $request->input('country');
        $transport = $request->input('transport');
        $services = $request->input('services');
        $v_type = $request->input('v_type');
        $v_category = $request->input('v_category');
        $v_model_form = $request->input('v_model_form');
        $v_model_to = $request->input('v_model_to');
        $quantity = $request->input('quantity');
        $company = $request->input('company');
        $c_category = $request->input('c_category');
        $add_services = $request->input('add_services');
        $s_quantity = $request->input('s_quantity');
        $duration = $request->input('duration');
        $hotels = DB::table('hotels')
                    ->join('places','hotels.place_id','=','places.id')
                    ->select('hotels.*','places.place_name_en','places.place_name_ar')
                    ->where('hotels.active', '=', 1)
                    ->where('hotels.place_id', '=', 2);
        
        $hotelsData = $hotels->get();
        $hotels_output = Helper::prepare_hotels($hotelsData, $hotels_output);
        $paginate_hotels = Helper::cust_pagination($hotels_output, $request->url(), $request->query());
        $data = new Data;
        $contact = new Contact;
        if(Auth::guard('members')->check()){
            $guest_rooms = DB::table('guest_rooms')
                        ->join('hotels','hotels.id','=','guest_rooms.hotel_id')
                        ->join('hotel_rooms','guest_rooms.room_id','=','hotel_rooms.id')
                        ->select('hotels.*','hotel_rooms.*')
                        ->where('guest_rooms.user_id', '=', Auth::guard('members')->user()->id)
                        ->get();
            $guest_services = DB::table('guest_services')
                        ->join('services','services.id','=','guest_services.service_id')
                        ->select('services.*')
                        ->where('guest_services.user_id', '=', Auth::guard('members')->user()->id)
                        ->get();
            return view('site.pages.madinah_search.index', [
                'hotels'   => $paginate_hotels,
                'data'     => $data,
                'guest_rooms'     => $guest_rooms,
                'guest_services'     => $guest_services,
                'town'     => $town,
                'hotel'     => $hotel,
                'to_mekkah'     => $to_mekkah,
                'from_mekkah'     => $from_mekkah,
                'to_madinah'     => $to_madinah,
                'from_madinah'     => $from_madinah,
                'rooms'     => $rooms,
                'country'     => $country,
                'transport'     => $transport,
                'services'     => $services,
                'v_type'     => $v_type,
                'v_category'     => $v_category,
                'v_model_form'     => $v_model_form,
                'v_model_to'     => $v_model_to,
                'quantity'     => $quantity,
                'company'     => $company,
                'c_category'     => $c_category,
                'add_services'     => $add_services,
                's_quantity'     => $s_quantity,
                'duration'     => $duration,
                'adults'     => $adults,
                'children'     => $children,
                'contact'   => $contact
            ]);
        }else{
                        
            return view('site.pages.madinah_search.index', [
                'hotels'   => $paginate_hotels,
                'data'     => $data,
                'town'     => $town,
                'hotel'     => $hotel,
                'to_mekkah'     => $to_mekkah,
                'from_mekkah'     => $from_mekkah,
                'to_madinah'     => $to_madinah,
                'from_madinah'     => $from_madinah,
                'rooms'     => $rooms,
                'country'     => $country,
                'transport'     => $transport,
                'services'     => $services,
                'v_type'     => $v_type,
                'v_category'     => $v_category,
                'v_model_form'     => $v_model_form,
                'v_model_to'     => $v_model_to,
                'quantity'     => $quantity,
                'company'     => $company,
                'c_category'     => $c_category,
                'add_services'     => $add_services,
                's_quantity'     => $s_quantity,
                'duration'     => $duration,
                'adults'     => $adults,
                'children'     => $children,
                'contact'   => $contact
            ]);
        }
    }

    public function customerData(Request $request) {
        $hotels_output = [];
        $town = $request->input('town');
        $adults = $request->input('adults');
        $children = $request->input('children');
        $hotel = $request->input('hotel');
        $to_mekkah = $request->input('to_mekkah');
        $from_mekkah = $request->input('from_mekkah');
        $to_madinah = $request->input('to_madinah');
        $from_madinah = $request->input('from_madinah');
        $rooms = $request->input('rooms');
        $country = $request->input('country');
        $transport = $request->input('transport');
        $services = $request->input('services');
        $v_type = $request->input('v_type');
        $v_category = $request->input('v_category');
        $v_model_form = $request->input('v_model_form');
        $v_model_to = $request->input('v_model_to');
        $quantity = $request->input('quantity');
        $company = $request->input('company');
        $c_category = $request->input('c_category');
        $add_services = $request->input('add_services');
        $s_quantity = $request->input('s_quantity');
        $duration = $request->input('duration');
        $hotels = DB::table('hotels')
                    ->join('places','hotels.place_id','=','places.id')
                    ->select('hotels.*','places.place_name_en','places.place_name_ar')
                    ->where('hotels.active', '=', 1);

        
        if (Config::get('app.locale') == 'ar'){
            if ($request->has('hotel')) {
                $searchValues = preg_split('/\s+/', $hotel, -1, PREG_SPLIT_NO_EMPTY); 

                $hotels = Hotel::where(function ($q) use ($searchValues) {
                    foreach ($searchValues as $value) {
                        $q->orWhere('street_ar', 'like', "%{$value}%");
                    }
                });
            }
        }elseif(Config::get('app.locale') == 'en'){
            if ($request->has('hotel')) {
                $searchValues = preg_split('/\s+/', $hotel, -1, PREG_SPLIT_NO_EMPTY); 
                $hotels = Hotel::where(function ($q) use ($searchValues) {
                    foreach ($searchValues as $value) {
                        $q->orWhere('street_en', 'like', "%{$value}%");
                    }
                });
            }
        }
        $hotelsData = $hotels->get();
        $hotels_output = Helper::prepare_hotels($hotelsData, $hotels_output);
        $paginate_hotels = Helper::cust_pagination($hotels_output, $request->url(), $request->query());
        $data = new Data;
        $contact = new Contact;
        if(Auth::guard('members')->check()){
            $guest_rooms = DB::table('guest_rooms')
                        ->join('hotels','hotels.id','=','guest_rooms.hotel_id')
                        ->join('hotel_rooms','guest_rooms.room_id','=','hotel_rooms.id')
                        ->select('hotels.*','hotel_rooms.*')
                        ->where('guest_rooms.user_id', '=', Auth::guard('members')->user()->id)
                        ->get();
            $guest_services = DB::table('guest_services')
                        ->join('services','services.id','=','guest_services.service_id')
                        ->select('services.*')
                        ->where('guest_services.user_id', '=', Auth::guard('members')->user()->id)
                        ->get();
            return view('site.pages.add_data.index', [
                'hotels'   => $paginate_hotels,
                'data'     => $data,
                'guest_rooms'     => $guest_rooms,
                'guest_services'     => $guest_services,
                'town'     => $town,
                'hotel'     => $hotel,
                'to_mekkah'     => $to_mekkah,
                'from_mekkah'     => $from_mekkah,
                'to_madinah'     => $to_madinah,
                'from_madinah'     => $from_madinah,
                'rooms'     => $rooms,
                'country'     => $country,
                'transport'     => $transport,
                'services'     => $services,
                'v_type'     => $v_type,
                'v_category'     => $v_category,
                'v_model_form'     => $v_model_form,
                'v_model_to'     => $v_model_to,
                'quantity'     => $quantity,
                'company'     => $company,
                'c_category'     => $c_category,
                'add_services'     => $add_services,
                's_quantity'     => $s_quantity,
                'duration'     => $duration,
                'adults'     => $adults,
                'children'     => $children,
                'contact'   => $contact
            ]);
        }else{
            return view('site.pages.add_data.index', [
            'hotels'   => $paginate_hotels,
            'data'     => $data,
            'town'     => $town,
            'hotel'     => $hotel,
            'to_mekkah'     => $to_mekkah,
            'from_mekkah'     => $from_mekkah,
            'to_madinah'     => $to_madinah,
            'from_madinah'     => $from_madinah,
            'rooms'     => $rooms,
            'country'     => $country,
            'transport'     => $transport,
            'services'     => $services,
            'v_type'     => $v_type,
            'v_category'     => $v_category,
            'v_model_form'     => $v_model_form,
            'v_model_to'     => $v_model_to,
            'quantity'     => $quantity,
            'company'     => $company,
            'c_category'     => $c_category,
            'add_services'     => $add_services,
            's_quantity'     => $s_quantity,
            'duration'     => $duration,
            'adults'     => $adults,
            'children'     => $children,
            'contact'   => $contact
        ]);
        }
    }

    public function hotelRooms(Request $request) {
        $rooms_output = [];
        $to_mekkah = $request->input('to_mekkah');
        $from_mekkah = $request->input('from_mekkah');
        $to_madinah = $request->input('to_madinah');
        $from_madinah = $request->input('from_madinah');

        $datetime1 = new DateTime($to_mekkah);
        $datetime2 = new DateTime($from_mekkah);
        $interval = $datetime1->diff($datetime2);
        $mekkah_nights = $interval->format('%a') - 1;

        $datetime3 = new DateTime($to_madinah);
        $datetime4 = new DateTime($from_madinah);
        $interval = $datetime3->diff($datetime4);
        $madinah_nights = $interval->format('%a') - 1;

        $hotel_id = $request->input('hotel_id');
        $id = $request->input('hotel_id');
        $hotell = Hotel::find($id);
        $adults = $request->input('adults');
        $children = $request->input('children');
        $town = $request->input('town');
        $hotel = $request->input('hotel');
        $rooms = $request->input('rooms');
        $country = $request->input('country');
        $transport = $request->input('transport');
        $services = $request->input('services');
        $v_type = $request->input('v_type');
        $v_category = $request->input('v_category');
        $v_model_form = $request->input('v_model_form');
        $v_model_to = $request->input('v_model_to');
        $quantity = $request->input('quantity');
        $company = $request->input('company');
        $c_category = $request->input('c_category');
        $add_services = $request->input('add_services');
        $s_quantity = $request->input('s_quantity');
        $duration = $request->input('duration');
        $roomsData = HotelRooms::where('hotel_id', $hotel_id)->where('nights', '>',0)->get();
        $rooms_output = Helper::prepare_rooms($roomsData, $rooms_output);
        $paginate_rooms = Helper::cust_pagination($rooms_output, $request->url(), $request->query());
        $data = new Data;
        $contact = new Contact;
        if(Auth::guard('members')->check()){
            $guest_rooms = DB::table('guest_rooms')
                        ->join('hotels','hotels.id','=','guest_rooms.hotel_id')
                        ->join('hotel_rooms','guest_rooms.room_id','=','hotel_rooms.id')
                        ->select('hotels.*','hotel_rooms.*')
                        ->where('guest_rooms.user_id', '=', Auth::guard('members')->user()->id)
                        ->get();
            $guest_services = DB::table('guest_services')
                        ->join('services','services.id','=','guest_services.service_id')
                        ->select('services.*')
                        ->where('guest_services.user_id', '=', Auth::guard('members')->user()->id)
                        ->get();
                        
            return view('site.pages.room_search.index', [
                'roomss'   => $paginate_rooms,
                'data'     => $data,
                'guest_rooms'     => $guest_rooms,
                'guest_services'     => $guest_services,
                'mekkah_nights'     => $mekkah_nights,
                'madinah_nights'     => $madinah_nights,
                'town'     => $town,
                'hotel'     => $hotel,
                'hotell'     => $hotell,
                'hotel_id'     => $hotel_id,
                'adults'     => $adults,
                'children'     => $children,
                'to_mekkah'     => $to_mekkah,
                'from_mekkah'     => $from_mekkah,
                'to_madinah'     => $to_madinah,
                'from_madinah'     => $from_madinah,
                'rooms'     => $rooms,
                'country'     => $country,
                'transport'     => $transport,
                'services'     => $services,
                'v_type'     => $v_type,
                'v_category'     => $v_category,
                'v_model_form'     => $v_model_form,
                'v_model_to'     => $v_model_to,
                'quantity'     => $quantity,
                'company'     => $company,
                'c_category'     => $c_category,
                'add_services'     => $add_services,
                's_quantity'     => $s_quantity,
                'duration'     => $duration,
                'contact'   => $contact
            ]);
        }else{
            return view('site.pages.room_search.index', [
            'roomss'   => $paginate_rooms,
            'data'     => $data,
            'mekkah_nights'     => $mekkah_nights,
            'madinah_nights'     => $madinah_nights,
            'town'     => $town,
            'hotel'     => $hotel,
            'hotell'     => $hotell,
            'hotel_id'     => $hotel_id,
            'adults'     => $adults,
            'children'     => $children,
            'to_mekkah'     => $to_mekkah,
            'from_mekkah'     => $from_mekkah,
            'to_madinah'     => $to_madinah,
            'from_madinah'     => $from_madinah,
            'rooms'     => $rooms,
            'country'     => $country,
            'transport'     => $transport,
            'services'     => $services,
            'v_type'     => $v_type,
            'v_category'     => $v_category,
            'v_model_form'     => $v_model_form,
            'v_model_to'     => $v_model_to,
            'quantity'     => $quantity,
            'company'     => $company,
            'c_category'     => $c_category,
            'add_services'     => $add_services,
            's_quantity'     => $s_quantity,
            'duration'     => $duration,
            'contact'   => $contact
        ]);
        }
    }

    public function serviceSearch(Request $request) {
        $adults = $request->input('adults');
        $children = $request->input('children');
        $town = $request->input('town');
        $hotel = $request->input('hotel');
        $to_mekkah = $request->input('to_mekkah');
        $from_mekkah = $request->input('from_mekkah');
        $to_madinah = $request->input('to_madinah');
        $from_madinah = $request->input('from_madinah');
        $rooms = $request->input('rooms');
        $country = $request->input('country');
        $transport = $request->input('transport');
        $services = $request->input('services');
        $v_type = $request->input('v_type');
        $v_category = $request->input('v_category');
        $v_model_form = $request->input('v_model_form');
        $v_model_to = $request->input('v_model_to');
        $quantity = $request->input('quantity');
        $company = $request->input('company');
        $c_category = $request->input('c_category');
        $add_services = $request->input('add_services');
        $s_quantity = $request->input('s_quantity');
        $duration = $request->input('duration');
        $services_output = [];
        $servicesData = Service::where('active', 1)->get();
        $services_output = Helper::prepare_services($servicesData, $services_output);
        $paginate_services = Helper::cust_pagination($services_output, $request->url(), $request->query());
        $data = new Data;
        $contact = new Contact;
        if(Auth::guard('members')->check()){
            $guest_rooms = DB::table('guest_rooms')
                        ->join('hotels','hotels.id','=','guest_rooms.hotel_id')
                        ->join('hotel_rooms','guest_rooms.room_id','=','hotel_rooms.id')
                        ->select('hotels.*','hotel_rooms.*')
                        ->where('guest_rooms.user_id', '=', Auth::guard('members')->user()->id)
                        ->get();
            $guest_services = DB::table('guest_services')
                        ->join('services','services.id','=','guest_services.service_id')
                        ->select('services.*')
                        ->where('guest_services.user_id', '=', Auth::guard('members')->user()->id)
                        ->get();
            return view('site.pages.service_search.index', [
                'adults'     => $adults,
                'guest_rooms'     => $guest_rooms,
                'guest_services'     => $guest_services,
                'children'     => $children,
                'servicess'   => $paginate_services,
                'data'     => $data,
                'town'     => $town,
                'hotel'     => $hotel,
                'to_mekkah'     => $to_mekkah,
                'from_mekkah'     => $from_mekkah,
                'to_madinah'     => $to_madinah,
                'from_madinah'     => $from_madinah,
                'rooms'     => $rooms,
                'country'     => $country,
                'transport'     => $transport,
                'services'     => $services,
                'v_type'     => $v_type,
                'v_category'     => $v_category,
                'v_model_form'     => $v_model_form,
                'v_model_to'     => $v_model_to,
                'quantity'     => $quantity,
                'company'     => $company,
                'c_category'     => $c_category,
                'add_services'     => $add_services,
                's_quantity'     => $s_quantity,
                'duration'     => $duration,
                'contact'   => $contact
            ]);
        }else{
            return view('site.pages.service_search.index', [
            'adults'     => $adults,
            'children'     => $children,
            'servicess'   => $paginate_services,
            'data'     => $data,
            'town'     => $town,
            'hotel'     => $hotel,
            'to_mekkah'     => $to_mekkah,
            'from_mekkah'     => $from_mekkah,
            'to_madinah'     => $to_madinah,
            'from_madinah'     => $from_madinah,
            'rooms'     => $rooms,
            'country'     => $country,
            'transport'     => $transport,
            'services'     => $services,
            'v_type'     => $v_type,
            'v_category'     => $v_category,
            'v_model_form'     => $v_model_form,
            'v_model_to'     => $v_model_to,
            'quantity'     => $quantity,
            'company'     => $company,
            'c_category'     => $c_category,
            'add_services'     => $add_services,
            's_quantity'     => $s_quantity,
            'duration'     => $duration,
            'contact'   => $contact
        ]);
        }
    }

    public function guest() {
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
        return view('site.pages.guest.index', compact('hotels','sliders','offices','programmes','data','contact','places','tests'));
    }

    public function postGuest(Request $request){
        $error_array = array();
        $success_output = '';
        $adults = $request->input('adults');
        for ($i=0; $i < $adults; $i++) { 
            $validation = Validator::make($request->all(), [
                'image'.$i => 'required|image|mimes:jpeg,jpg,png,gif,pdf|max:20000',
                'first_name'.$i => 'required',
                'last_name'.$i => 'required',
                'email'.$i => 'required',
                'phone'.$i => 'required',
                'nationality'.$i => 'required',
                'passport'.$i => 'required',
                'gender'.$i => 'required',
                'birth'.$i => 'required',
            ]);
            
            if ($validation->fails())
            {
                foreach ($validation->messages()->getMessages() as $field_name => $messages)
                {
                    $error_array[] = $messages; 
                }
            }
            else
            {
                $guest = new Guest();
                $destination = storage_path('uploads/guest');
                $image = Input::File('image'.$i);
                if($image != null){
                    if (is_file($destination . "/{$image}")) {
                        @unlink($destination . "/{$image}");
                    }
                    $imageName = $image->getClientOriginalName();
                    $image->move($destination, $imageName);
                    $guest->image = $imageName;
                }
                $p_image = Input::File('p_image'.$i);
                if($p_image != null){
                    if (is_file($destination . "/{$p_image}")) {
                        @unlink($destination . "/{$p_image}");
                    }
                    $imageName = $p_image->getClientOriginalName();
                    $p_image->move($destination, $imageName);
                    $guest->p_image = $imageName;
                }
                $guest->first_name = $request->input('first_name'.$i);
                $guest->last_name = $request->input('last_name'.$i);
                $guest->email = $request->input('email'.$i);
                $guest->phone = $request->input('phone'.$i);
                $guest->nationality = $request->input('nationality'.$i);
                $guest->passport = $request->input('passport'.$i);
                $guest->gender = $request->input('gender'.$i);
                $guest->birth = $request->input('birth'.$i);
                $guest->adults = $request->input('adults'.$i);
                $guest->children = $request->input('children'.$i);
                $guest->hotel_id = $request->input('hotel_id'.$i);
                $guest->status = 0;
                if(Auth::guard('members')->check()){
                    $guest->user_id = Auth::guard('members')->user()->id;
                }
                if($guest->save()){
                    if(Config::get('app.locale') == 'en'){
                        $success_output = '<div class="alert alert-success">Data Inserted Successfully</div>';
                    }elseif(Config::get('app.locale') == 'ar'){
                        $success_output = '<div class="alert alert-success">تم ادخال البيانات بنجاح</div>';
                    }
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
