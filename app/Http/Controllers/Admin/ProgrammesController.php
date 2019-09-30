<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Program;
use App\Hotel;
use App\Service;
use App\Flight;
use App\ProgramHotels;
use App\ProgramServices;
use App\ProgramFlights;
use Validator;
use Config;
use DB;
use Carbon;
use Yajra\DataTables\Facades\DataTables;

class ProgrammesController extends Controller
{
    public function getIndex() {
        return view('admin.pages.program.index');
    }

    public function getdata() {
        $programs = Program::select('id','p_name_en','price');
        return Datatables::of($programs)
        ->addColumn('action', function($program){
            return '<a href="#" class="text-primary edit" id="'.$program->id.'"><i class="fa fa-edit"></i></a>     <a href="#" class="text-danger btndelet" id="'.$program->id.'"><i class="fa fa-close"></i></a>     <a href="#" class="text-primary view" id="'.$program->id.'"><i class="fa fa-eye"></i></a>';
        })
        ->addColumn('checkbox', '<input type="checkbox" name="program_checkbox[]" class="program_checkbox" value="{{$id}}" />')
        ->rawColumns(['checkbox','action'])
        ->make(true);
    }

    function hotel(){
        $hotels = Hotel::get()->where('active','=',1);
        echo json_encode($hotels);
    }

    function flight(){
        $flights = Flight::get()->where('active','=',1);
        echo json_encode($flights);
    }

    function service(){
        $services = Service::get()->where('active','=',1);
        echo json_encode($services);
    }

    public function programHotels(Request $request) {
        $id = $request->input('id');
        $hotels = DB::table('program_hotels')
                        ->join('hotels','hotels.id','=','program_hotels.hotel_id')
                        ->join('programs','programs.id','=','program_hotels.program_id')
                        ->select('hotels.*')
                        ->where("program_hotels.program_id", $id)
                        ->get();
        echo json_encode($hotels);
    }

    public function programFlights(Request $request) {
        $id = $request->input('id');
        $flights = DB::table('program_flights')
                        ->join('flights','flights.id','=','program_flights.flight_id')
                        ->join('programs','programs.id','=','program_flights.program_id')
                        ->select('flights.*')
                        ->where("program_flights.program_id", $id)
                        ->get();
        echo json_encode($flights);
    }

    public function programServices(Request $request) {
        $id = $request->input('id');
        $services = DB::table('program_services')
                        ->join('services','services.id','=','program_services.service_id')
                        ->join('programs','programs.id','=','program_services.program_id')
                        ->select('services.*')
                        ->where("program_services.program_id", $id)
                        ->get();
        echo json_encode($services);
    }
    
    function fetchdata(Request $request){
        $id = $request->input('id');
        $program = Program::find($id);
        $output = array(
            'p_name_en' => $program->p_name_en,
            'p_name_ar' => $program->p_name_ar,
            'sub_name_ar' => $program->sub_name_ar,
            'sub_name_en' => $program->sub_name_en,
            'jeddah_ar'  => $program->jeddah_ar,
            'jeddah_en'  => $program->jeddah_en,
            'mekkah_ar' => $program->mekkah_ar,
            'mekkah_en'  => $program->mekkah_en,
            'madenah_ar' => $program->madenah_ar,
            'madenah_en'  => $program->madenah_en,
            'max' => $program->max,
            'image' => $program->image,
            'price' => $program->price,
            'code' => $program->code,
            'rate' => $program->rate,
            'active' => $program->active,
            'hotel_ar'  => $program->hotel_ar,
            'hotel_en'  => $program->hotel_en,
            'service_ar' => $program->service_ar,
            'service_en'  => $program->service_en,
            'flight_ar' => $program->flight_ar,
            'flight_en'  => $program->flight_en,
        );
        echo json_encode($output);
    }
    
    function postdata(Request $request){
        $error_array = array();
        $success_output = '';
        if($request->get('button_action') == 'update'){
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
            if (isset($request->active)) {
                $program2->active = 1;
            }else{
                $program2->active = 0;
            }

            if (isset($request->max)) {
                $program2->max = 1;
            }else{
                $program2->max = 0;
            }
            
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
        }elseif($request->get('button_action') == 'insert'){
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
                    'image.required' => 'Please Upload Image',
                    'image.image' => 'Please upload image not video',
                    'image.mimes' => 'Image type : jpeg,jpg,png,gif',
                    'image.max' => 'Max Size 20 MB',
                    'p_name_en.required' => 'Please Enter Program Name in English',
                    'p_name_ar.required' => 'Please Enter Program Name in Arabic',
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

                $program->hotel_ar = $request->hotel_ar;
                $program->hotel_en = $request->hotel_en;
                $program->service_ar = $request->service_ar;
                $program->service_en = $request->service_en;
                $program->hotel_ar = $request->hotel_ar;
                $program->hotel_en = $request->hotel_en;
                $program->rate = $request->rate;
                if(isset($request->active)){
                    $program->active = 1;
                }else{
                    $program->active = 0;
                }
    
                if (isset($request->max)) {
                    $program->max = 1;
                }else{
                    $program->max = 0;
                }
                
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
    }

    function removedata(Request $request){
        ProgramHotels::where('program_id','=', $request->input('id'))->delete();
        ProgramServices::where('program_id','=', $request->input('id'))->delete();
        ProgramFlights::where('program_id','=', $request->input('id'))->delete();
        $program = Program::find($request->input('id'));
        $program->delete();
    }

    function massremove(Request $request)
    {
        $program_id_array = $request->input('id');
        ProgramHotels::whereIn('program_id','=', $program_id_array)->delete();
        ProgramServices::whereIn('program_id','=', $program_id_array)->delete();
        ProgramFlights::whereIn('program_id','=', $program_id_array)->delete();
        $program = Program::whereIn('id', $program_id_array);
        $program->delete();
    }

}
