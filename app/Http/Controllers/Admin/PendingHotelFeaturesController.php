<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\HotelFeatures;
use App\Hotel;
use Validator;
use Config;
use DB;
use Yajra\DataTables\Facades\DataTables;

class PendingHotelFeaturesController extends Controller
{
    public function getIndex() {
        return view('admin.pages.hotel_features_requests.index');
    }

    public function getdata() {
        $hotel_features = HotelFeatures::select('id','f_name_en')->where('active','=', -1)->get();
        return Datatables::of($hotel_features)
        ->addColumn('action', function($hotel_feature){
            return '<a href="#" class="text-primary edit" id="'.$hotel_feature->id.'"><i class="fa fa-edit"></i></a>     <a href="#" class="text-danger btndelet" id="'.$hotel_feature->id.'"><i class="fa fa-close"></i></a>     <a href="#" class="text-primary view" id="'.$hotel_feature->id.'"><i class="fa fa-eye"></i></a>';
        })
        ->addColumn('checkbox', '<input type="checkbox" name="feature_checkbox[]" class="feature_checkbox" value="{{$id}}" />')
        ->rawColumns(['checkbox','action'])
        ->make(true);
    }

    function hotel(){
        $hotels = Hotel::get()->where('active','=',1);
        echo json_encode($hotels);
    }

    function featurehotel(Request $request){
        $id = $request->input('id');
        $featurehotel = DB::table('hotel_features')
                ->join('hotels','hotel_features.hotel_id','=','hotels.id')
                ->select('hotels.*')
                ->where("hotels.id", $id)
                ->get();
        echo json_encode($featurehotel);
    }

    function fetchdata(Request $request){
        $id = $request->input('id');
        $hotel_feature = HotelFeatures::find($id);
        $output = array(
            'f_name_en' => $hotel_feature->f_name_en,
            'f_name_ar' => $hotel_feature->f_name_ar,
            'content_en' => $hotel_feature->content_en,
            'content_ar' => $hotel_feature->content_ar,
            'hotel_id' => $hotel_feature->hotel_id,
            'image' => $hotel_feature->image,
            'active' => $hotel_feature->active
        );
        echo json_encode($output);
    }

    function postdata(Request $request){
        $error_array = array();
        $success_output = '';
        if($request->get('button_action') == 'update'){
            $hotel_feature2 = HotelFeatures::find($request->input('feature_id'));
            $destination2 = storage_path('uploads/' . $request->storage);
            $image2 = $request->file('image');
            if ($image2 != null) {
                if (is_file($destination2 . "/{$image2}")) {
                    @unlink($destination2 . "/{$image2}");
                }
                $imageName = $image2->getClientOriginalName();
                $image2->move($destination2, $imageName);
                $hotel_feature2->image = $imageName;
            }

            $hotel_feature2->f_name_en = $request->name_en;
            $hotel_feature2->f_name_ar = $request->name_ar;
            $hotel_feature2->content_en = $request->content_en;
            $hotel_feature2->content_ar = $request->content_ar;
            $hotel_feature2->hotel_id = $request->hotel_id;
            if (isset($request->active)) {
                $hotel_feature2->active = 1;
            }else{
                $hotel_feature2->active = 0;
            }
            
            if($hotel_feature2->save()){
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
                    'name_en' => 'required',
                    'name_ar' => 'required',
                    'content_en' => 'required',
                    'content_ar' => 'required',
                    'hotel_id' => 'required',
                ],[
                    'image.required' => 'Please Upload Image',
                    'image.image' => 'Please upload image not video',
                    'image.mimes' => 'Image type : jpeg,jpg,png,gif',
                    'image.max' => 'Max Size 20 MB',
                    'name_en.required' => 'Please Enter Name in English',
                    'name_ar.required' => 'Please Enter Name in Arabic',
                    'content_en.required' => 'Please Enter Content in English',
                    'content_ar.required' => 'Please Enter Content in Arabic',
                    'hotel_id.required' => 'Please Select Hotel',
                ]);
            }elseif(Config::get('app.locale') == 'ar'){
                $validation = Validator::make($request->all(), [
                    'image' => 'required|image|mimes:jpeg,jpg,png,gif,pdf|max:20000',
                    'name_en' => 'required',
                    'name_ar' => 'required',
                    'content_en' => 'required',
                    'content_ar' => 'required',
                    'hotel_id' => 'required',
                ],[
                    'image.required' => 'Please Upload Image',
                    'image.image' => 'Please upload image not video',
                    'image.mimes' => 'Image type : jpeg,jpg,png,gif',
                    'image.max' => 'Max Size 20 MB',
                    'name_en.required' => 'Please Enter Name in English',
                    'name_ar.required' => 'Please Enter Name in Arabic',
                    'content_en.required' => 'Please Enter Content in English',
                    'content_ar.required' => 'Please Enter Content in Arabic',
                    'hotel_id.required' => 'Please Select Hotel',
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
                $hotel_feature = new HotelFeatures;
                $destination = storage_path('uploads/' . $request->storage);
                $image = $request->file('image');
                if($request->hasFile('image')){
                    if (is_file($destination . "/{$image}")) {
                        @unlink($destination . "/{$image}");
                    }
                    $imageName = $image->getClientOriginalName();
                    $image->move($destination, $imageName);
                    $hotel_feature->image = $imageName;
                }else{
                    $hotel_feature->image = "1.jpg";
                }
                $hotel_feature->f_name_en = $request->name_en;
                $hotel_feature->f_name_ar = $request->name_ar;
                $hotel_feature->content_en = $request->content_en;
                $hotel_feature->content_ar = $request->content_ar;
                $hotel_feature->hotel_id = $request->hotel_id;
                if(isset($request->active)){
                    $hotel_feature->active = 1;
                }else{
                    $hotel_feature->active = 0;
                }
                
                if($hotel_feature->save()){
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
        $hotel_feature = HotelFeatures::find($request->input('id'));
        $hotel_feature->delete();
    }

    function massremove(Request $request)
    {
        $hotel_feature_id_array = $request->input('id');
        $hotel_feature = HotelFeatures::whereIn('id', $hotel_feature_id_array);
        $hotel_feature->delete();
    }

}
