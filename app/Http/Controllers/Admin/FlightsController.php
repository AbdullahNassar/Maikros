<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Flight;
use Validator;
use Config;
use Yajra\DataTables\Facades\DataTables;

class FlightsController extends Controller
{
    public function getIndex() {
        return view('admin.pages.flight.index');
    }

    public function getdata() {
        $flights = Flight::select('id','flight_name_en','price');
        return Datatables::of($flights)
        ->addColumn('action', function($flight){
            return '<a href="#" class="text-primary edit" id="'.$flight->id.'"><i class="fa fa-edit"></i></a>     <a href="#" class="text-danger btndelet" id="'.$flight->id.'"><i class="fa fa-close"></i></a>     <a href="#" class="text-primary view" id="'.$flight->id.'"><i class="fa fa-eye"></i></a>';
        })
        ->addColumn('checkbox', '<input type="checkbox" name="flight_checkbox[]" class="flight_checkbox" value="{{$id}}" />')
        ->rawColumns(['checkbox','action'])
        ->make(true);
    }
    
    function fetchdata(Request $request){
        $id = $request->input('id');
        $flight = Flight::find($id);
        $output = array(
            'flight_name_en' => $flight->flight_name_en,
            'flight_name_ar' => $flight->flight_name_ar,
            'duration_ar' => $flight->duration_ar,
            'duration_en' => $flight->duration_en,
            'content_ar'  => $flight->content_ar,
            'content_en'  => $flight->content_en,
            'start' => $flight->start,
            'end'  => $flight->end,
            'image' => $flight->image,
            'price' => $flight->price,
            'code' => $flight->code,
            'active' => $flight->active
        );
        echo json_encode($output);
    }
    
    function postdata(Request $request){
        $error_array = array();
        $success_output = '';
        if($request->get('button_action') == 'update'){
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
            if (isset($request->active)) {
                $flight2->active = 1;
            }else{
                $flight2->active = 0;
            }
            
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
        }elseif($request->get('button_action') == 'insert'){
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
                    'image.required' => 'Please Upload Image',
                    'image.image' => 'Please upload image not video',
                    'image.mimes' => 'Image type : jpeg,jpg,png,gif',
                    'image.max' => 'Max Size 20 MB',
                    'flight_name_en.required' => 'Please Enter Flight Name in English',
                    'flight_name_ar.required' => 'Please Enter Flight Name in Arabic',
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
                if($request->active == "on"){
                    $flight->active = 1;
                }elseif(empty($request->active)){
                    $flight->active = 0;
                }
                
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
    }

    function removedata(Request $request){
        $flight = Flight::find($request->input('id'));
        $flight->delete();
    }

    function massremove(Request $request)
    {
        $flight_id_array = $request->input('id');
        $flight = Flight::whereIn('id', $flight_id_array);
        $flight->delete();
    }

}
