<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Comfort;
use App\Hotel;
use Validator;
use Config;
use DB;
use Yajra\DataTables\Facades\DataTables;

class PendingComfortsController extends Controller
{
    public function getIndex() {
        return view('admin.pages.comfort_requests.index');
    }

    public function getdata() {
        $comforts = Comfort::select('id','c_name_en')->where('active','=', -1)->get();
        return Datatables::of($comforts)
        ->addColumn('action', function($comfort){
            return '<a href="#" class="text-primary edit" id="'.$comfort->id.'"><i class="fa fa-edit"></i></a>     <a href="#" class="text-danger btndelet" id="'.$comfort->id.'"><i class="fa fa-close"></i></a>';
        })
        ->addColumn('checkbox', '<input type="checkbox" name="comfort_checkbox[]" class="comfort_checkbox" value="{{$id}}" />')
        ->rawColumns(['checkbox','action'])
        ->make(true);
    }

    function hotel(){
        $hotels = Hotel::get()->where('active','=',1);
        echo json_encode($hotels);
    }

    function comforthotel(Request $request){
        $id = $request->input('id');
        $comforthotel = DB::table('comforts')
                ->join('hotels','comforts.hotel_id','=','hotels.id')
                ->select('hotels.*')
                ->where("hotels.id", $id)
                ->get();
        echo json_encode($comforthotel);
    }

    function fetchdata(Request $request){
        $id = $request->input('id');
        $comfort = Comfort::find($id);
        $output = array(
            'c_name_en' => $comfort->c_name_en,
            'c_name_ar' => $comfort->c_name_ar,
            'hotel_id' => $comfort->hotel_id,
            'image' => $comfort->image,
            'active' => $comfort->active
        );
        echo json_encode($output);
    }

    function postdata(Request $request){
        $error_array = array();
        $success_output = '';
        if($request->get('button_action') == 'update'){
            $comfort2 = Comfort::find($request->input('comfort_id'));
            $destination2 = storage_path('uploads/' . $request->storage);
            $image2 = $request->file('image');
            if ($image2 != null) {
                if (is_file($destination2 . "/{$image2}")) {
                    @unlink($destination2 . "/{$image2}");
                }
                $imageName = $image2->getClientOriginalName();
                $image2->move($destination2, $imageName);
                $comfort2->image = $imageName;
            }
            $comfort2->c_name_en = $request->name_en;
            $comfort2->c_name_ar = $request->name_ar;
            $comfort2->hotel_id = $request->hotel_id;
            if (isset($request->active)) {
                $comfort2->active = 1;
            }else{
                $comfort2->active = 0;
            }
            
            if($comfort2->save()){
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
                    'hotel_id' => 'required',
                ],[
                    'image.required' => 'Please Upload Image',
                    'image.image' => 'Please upload image not video',
                    'image.mimes' => 'Image type : jpeg,jpg,png,gif',
                    'image.max' => 'Max Size 20 MB',
                    'name_en.required' => 'Please Enter Name in English',
                    'name_ar.required' => 'Please Enter Name in Arabic',
                    'hotel_id.required' => 'Please Select Hotel',
                ]);
            }elseif(Config::get('app.locale') == 'ar'){
                $validation = Validator::make($request->all(), [
                    'image' => 'required|image|mimes:jpeg,jpg,png,gif,pdf|max:20000',
                    'name_en' => 'required',
                    'name_ar' => 'required',
                    'hotel_id' => 'required',
                ],[
                    'image.required' => 'Please Upload Image',
                    'image.image' => 'Please upload image not video',
                    'image.mimes' => 'Image type : jpeg,jpg,png,gif',
                    'image.max' => 'Max Size 20 MB',
                    'name_en.required' => 'Please Enter Name in English',
                    'name_ar.required' => 'Please Enter Name in Arabic',
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
                $comfort = new Comfort;
                $destination = storage_path('uploads/' . $request->storage);
                $image = $request->file('image');
                if($request->hasFile('image')){
                    if (is_file($destination . "/{$image}")) {
                        @unlink($destination . "/{$image}");
                    }
                    $imageName = $image->getClientOriginalName();
                    $image->move($destination, $imageName);
                    $comfort->image = $imageName;
                }else{
                    $comfort->image = "1.jpg";
                }
                $comfort->c_name_en = $request->name_en;
                $comfort->c_name_ar = $request->name_ar;
                $comfort->hotel_id = $request->hotel_id;
                if($request->active == "on"){
                    $comfort->active = 1;
                }elseif(empty($request->active)){
                    $comfort->active = 0;
                }
                
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
    }

    function removedata(Request $request){
        $comfort = Comfort::find($request->input('id'));
        $comfort->delete();
    }

    function massremove(Request $request)
    {
        $comfort_id_array = $request->input('id');
        $comfort = Comfort::whereIn('id', $comfort_id_array);
        $comfort->delete();
    }

}
