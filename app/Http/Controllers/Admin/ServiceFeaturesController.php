<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\ServiceFeatures;
use App\Service;
use Validator;
use Config;
use DB;
use Yajra\DataTables\Facades\DataTables;

class ServiceFeaturesController extends Controller
{
    public function getIndex() {
        return view('admin.pages.service_features.index');
    }

    public function getdata() {
        $service_features = ServiceFeatures::select('id','f_name_en');
        return Datatables::of($service_features)
        ->addColumn('action', function($service_feature){
            return '<a href="#" class="text-primary edit" id="'.$service_feature->id.'"><i class="fa fa-edit"></i></a>     <a href="#" class="text-danger btndelet" id="'.$service_feature->id.'"><i class="fa fa-close"></i></a>     <a href="#" class="text-primary view" id="'.$service_feature->id.'"><i class="fa fa-eye"></i></a>';
        })
        ->addColumn('checkbox', '<input type="checkbox" name="feature_checkbox[]" class="feature_checkbox" value="{{$id}}" />')
        ->rawColumns(['checkbox','action'])
        ->make(true);
    }

    function service(){
        $services = Service::get()->where('active','=',1);
        echo json_encode($services);
    }

    function featureservice(Request $request){
        $id = $request->input('id');
        $featureservice = DB::table('service_features')
                ->join('services','service_features.service_id','=','services.id')
                ->select('services.*')
                ->where("services.id", $id)
                ->get();
        echo json_encode($featureservice);
    }

    function fetchdata(Request $request){
        $id = $request->input('id');
        $service_feature = ServiceFeatures::find($id);
        $output = array(
            'f_name_en' => $service_feature->f_name_en,
            'f_name_ar' => $service_feature->f_name_ar,
            'content_en' => $service_feature->content_en,
            'content_ar' => $service_feature->content_ar,
            'service_id' => $service_feature->service_id,
            'image' => $service_feature->image,
            'active' => $service_feature->active
        );
        echo json_encode($output);
    }

    function postdata(Request $request){
        $error_array = array();
        $success_output = '';
        if($request->get('button_action') == 'update'){
            $service_feature2 = ServiceFeatures::find($request->input('feature_id'));
            $destination2 = storage_path('uploads/' . $request->storage);
            $image2 = $request->file('image');
            if ($image2 != null) {
                if (is_file($destination2 . "/{$image2}")) {
                    @unlink($destination2 . "/{$image2}");
                }
                $imageName = $image2->getClientOriginalName();
                $image2->move($destination2, $imageName);
                $service_feature2->image = $imageName;
            }

            $service_feature2->f_name_en = $request->name_en;
            $service_feature2->f_name_ar = $request->name_ar;
            $service_feature2->content_en = $request->content_en;
            $service_feature2->content_ar = $request->content_ar;
            $service_feature2->service_id = $request->service_id;
            if (isset($request->active)) {
                $service_feature2->active = 1;
            }else{
                $service_feature2->active = 0;
            }
            
            if($service_feature2->save()){
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
                    'service_id' => 'required',
                ],[
                    'image.required' => 'Please Upload Image',
                    'image.image' => 'Please upload image not video',
                    'image.mimes' => 'Image type : jpeg,jpg,png,gif',
                    'image.max' => 'Max Size 20 MB',
                    'name_en.required' => 'Please Enter Name in English',
                    'name_ar.required' => 'Please Enter Name in Arabic',
                    'content_en.required' => 'Please Enter Content in English',
                    'content_ar.required' => 'Please Enter Content in Arabic',
                    'service_id.required' => 'Please Select Service',
                ]);
            }elseif(Config::get('app.locale') == 'ar'){
                $validation = Validator::make($request->all(), [
                    'image' => 'required|image|mimes:jpeg,jpg,png,gif,pdf|max:20000',
                    'name_en' => 'required',
                    'name_ar' => 'required',
                    'content_en' => 'required',
                    'content_ar' => 'required',
                    'service_id' => 'required',
                ],[
                    'image.required' => 'Please Upload Image',
                    'image.image' => 'Please upload image not video',
                    'image.mimes' => 'Image type : jpeg,jpg,png,gif',
                    'image.max' => 'Max Size 20 MB',
                    'name_en.required' => 'Please Enter Name in English',
                    'name_ar.required' => 'Please Enter Name in Arabic',
                    'content_en.required' => 'Please Enter Content in English',
                    'content_ar.required' => 'Please Enter Content in Arabic',
                    'service_id.required' => 'Please Select service',
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
                $service_feature = new ServiceFeatures;
                $destination = storage_path('uploads/' . $request->storage);
                $image = $request->file('image');
                if($request->hasFile('image')){
                    if (is_file($destination . "/{$image}")) {
                        @unlink($destination . "/{$image}");
                    }
                    $imageName = $image->getClientOriginalName();
                    $image->move($destination, $imageName);
                    $service_feature->image = $imageName;
                }else{
                    $service_feature->image = "1.jpg";
                }
                $service_feature->f_name_en = $request->name_en;
                $service_feature->f_name_ar = $request->name_ar;
                $service_feature->content_en = $request->content_en;
                $service_feature->content_ar = $request->content_ar;
                $service_feature->service_id = $request->service_id;
                if(isset($request->active)) {
                    $service_feature->active = 1;
                }elseif(empty($request->active)){
                    $service_feature->active = 0;
                }
                
                if($service_feature->save()){
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
        $service_feature = ServiceFeatures::find($request->input('id'));
        $service_feature->delete();
    }

    function massremove(Request $request)
    {
        $service_feature_id_array = $request->input('id');
        $service_feature = ServiceFeatures::whereIn('id', $service_feature_id_array);
        $service_feature->delete();
    }

}
