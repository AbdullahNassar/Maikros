<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Hotel;
use App\Place;
use App\HotelFeatures;
use App\HotelGallery;
use App\HotelRooms;
use Validator;
use Config;
use DB;
use App\HotelFacilities;
use App\Comfort;
use Yajra\DataTables\Facades\DataTables;

class HotelsController extends Controller
{
    public function getIndex() {
        return view('admin.pages.hotel.index');
    }

    public function gallery($id) {
        $hotel = Hotel::find($id);
        $gallery = HotelGallery::get()->where('hotel_id','=',$id);
        return view('admin.pages.hotel.gallery', compact('gallery','hotel'));
    }

    public function getdata() {
        $hotels = Hotel::select('id','hotel_name_en','price');
        return Datatables::of($hotels)
        ->addColumn('action', function($hotel){
            return '<a href="#" class="text-primary edit" id="'.$hotel->id.'"><i class="fa fa-edit"></i></a>     <a href="#" class="text-danger btndelet" id="'.$hotel->id.'"><i class="fa fa-close"></i></a>     <a href="#" class="text-primary view" id="'.$hotel->id.'"><i class="fa fa-eye"></i></a>      <a href="'.route('ajaxdata.gallery', ['id' => $hotel->id]).'" class="text-primary gallery" id="'.$hotel->id.'"><i class="fa fa-image"></i></a>';
        })
        ->addColumn('checkbox', '<input type="checkbox" name="hotel_checkbox[]" class="hotel_checkbox" value="{{$id}}" />')
        ->rawColumns(['checkbox','action'])
        ->make(true);
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

    function removeImages($id){
        HotelGallery::where('id','=',$id)->delete();
        return redirect()->back();
    }

    function place(){
        $places = Place::get()->where('active','=',1);
        echo json_encode($places);
    }

    function hotelplace(Request $request){
        $id = $request->input('id');
        $hotelplace = DB::table('places')
                ->join('hotels','places.id','=','hotels.place_id')
                ->select('places.*')
                ->where("hotels.id", $id)
                ->get();
        echo json_encode($hotelplace);
    }

    function comfort(){
        $comforts = Comfort::where('active', 1)->get();
        echo json_encode($comforts);
    }

    function hotelcomfort(Request $request){
        $id = $request->input('id');
        $comforts = DB::table('hotel_facilities')
                ->join('comforts','hotel_facilities.comfort_id','=','comforts.id')
                ->join('hotels','hotel_facilities.hotel_id','=','hotels.id')
                ->select('comforts.*')
                ->where("hotels.id", $id)
                ->get();
        echo json_encode($comforts);
    }
    
    function fetchdata(Request $request){
        $id = $request->input('id');
        $hotel = Hotel::find($id);
        $output = array(
            'hotel_name_en' => $hotel->hotel_name_en,
            'hotel_name_ar' => $hotel->hotel_name_ar,
            'far_ar' => $hotel->far_ar,
            'far_en' => $hotel->far_en,
            'street_ar'  => $hotel->street_ar,
            'street_en'  => $hotel->street_en,
            'place_id' => $hotel->place_id,
            'best'  => $hotel->best,
            'max' => $hotel->max,
            'image' => $hotel->image,
            'price' => $hotel->price,
            'discount' => $hotel->discount,
            'rate' => $hotel->rate,
            'stars' => $hotel->stars,
            'inner_image' => $hotel->inner_image,
            'active' => $hotel->active
        );
        echo json_encode($output);
    }
    
    function postdata(Request $request){
        $error_array = array();
        $success_output = '';
        if($request->get('button_action') == 'update'){
            $hotel2 = Hotel::find($request->input('hotel_id'));
            $destination2 = storage_path('uploads/' . $request->storage);
            $image2 = $request->file('image');
            if ($image2 != null) {
                if (is_file($destination2 . "/{$image2}")) {
                    @unlink($destination2 . "/{$image2}");
                }
                $imageName = $image2->getClientOriginalName();
                $image2->move($destination2, $imageName);
                $hotel2->image = $imageName;
                $hotel2->inner_image = $imageName;
            }
            $hotel2->hotel_name_en = $request->hotel_name_en;
            $hotel2->hotel_name_ar = $request->hotel_name_ar;
            $hotel2->far_ar = $request->far_ar;
            $hotel2->far_en = $request->far_en;
            $hotel2->street_ar = $request->street_ar;
            $hotel2->price = $request->price;
            $hotel2->street_en = $request->street_en;
            $hotel2->place_id = $request->place_id;
            $hotel2->rate = $request->rate;
            $hotel2->stars = $request->stars;
            $hotel2->discount = $request->discount;
            if(isset($request->active)){
                $hotel2->active = 1;
            }else{
                $hotel2->active = 0;
            }

            if (isset($request->best)) {
                $hotel2->best = 1;
            }else{
                $hotel2->best = 0;
            }

            if (isset($request->max)) {
                $hotel2->max = 1;
            }else{
                $hotel2->max = 0;
            }
            
            if($hotel2->save()){
                HotelFacilities::where('hotel_id', $request->input('hotel_id'))->delete();
                $comforts = $request->input("comfort");
                if($comforts != null){
                    foreach($comforts as $comfort) {
                        $facility = new HotelFacilities;
                        $facility->comfort_id = $comfort;
                        $facility->hotel_id = $request->input('hotel_id');
                        $facility->save();
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
                    'hotel_name_en' => 'required',
                    'hotel_name_ar' => 'required',
                    'far_ar' => 'required',
                    'far_en' => 'required',
                    'price' => 'required',
                    'street_ar'  => 'required',
                    'street_en' => 'required',
                    'place_id' => 'required',
                    'active' => 'required',
                    'best'  => 'required',
                    'max' => 'required',
                    'price' => 'required',
                    'rate' => 'required',
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
                    'rate.required' => 'Please Enter Rate',
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
                    'active' => 'required',
                    'best'  => 'required',
                    'max' => 'required',
                    'price' => 'required',
                    'rate' => 'required',
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
                    'rate.required' => 'Please Enter Rate',
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
                $hotel->street_ar = $request->street_ar;
                $hotel->price = $request->price;
                $hotel->discount = $request->discount;
                $hotel->street_en = $request->street_en;
                $hotel->place_id = $request->place_id;
                $hotel->rate = $request->rate;
                $hotel->stars = $request->stars;
                if(isset($request->active)){
                    $hotel->active = 1;
                }else{
                    $hotel->active = 0;
                }

                if (isset($request->best)) {
                    $hotel->best = 1;
                }else{
                    $hotel->best = 0;
                }
    
                if (isset($request->max)) {
                    $hotel->max = 1;
                }else{
                    $hotel->max = 0;
                }
                
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
    }

    function removedata(Request $request){
        HotelFeatures::where('hotel_id',$request->input('id'))->delete();
        HotelRooms::where('hotel_id',$request->input('id'))->delete();
        HotelGallery::where('hotel_id',$request->input('id'))->delete();
        HotelFacilities::where('hotel_id', $request->input('id'))->delete();
        $hotel = Hotel::find($request->input('id'));
        $hotel->delete();
    }

    function massremove(Request $request)
    {
        $hotel_id_array = $request->input('id');
        HotelFeatures::whereIn('hotel_id',$hotel_id_array)->delete();
        HotelRooms::whereIn('hotel_id',$hotel_id_array)->delete();
        HotelGallery::whereIn('hotel_id',$hotel_id_array)->delete();
        HotelFacilities::where('hotel_id', $hotel_id_array)->delete();
        $hotel = Hotel::whereIn('id', $hotel_id_array);
        $hotel->delete();
    }

}
