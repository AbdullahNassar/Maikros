<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Office;
use Validator;
use Config;
use Yajra\DataTables\Facades\DataTables;

class OfficesController extends Controller
{
    public function getIndex() {
        return view('admin.pages.office.index');
    }

    public function getdata() {
        $offices = Office::select('id','office_name_en','country_en', 'address_en','phone');
        return Datatables::of($offices)
        ->addColumn('action', function($office){
            return '<a href="#" class="text-primary edit" id="'.$office->id.'"><i class="fa fa-edit"></i></a>     <a href="#" class="text-danger btndelet" id="'.$office->id.'"><i class="fa fa-close"></i></a>     <a href="#" class="text-primary view" id="'.$office->id.'"><i class="fa fa-eye"></i></a>';
        })
        ->addColumn('checkbox', '<input type="checkbox" name="office_checkbox[]" class="office_checkbox" value="{{$id}}" />')
        ->rawColumns(['checkbox','action'])
        ->make(true);
    }
    
    function fetchdata(Request $request){
        $id = $request->input('id');
        $office = Office::find($id);
        $output = array(
            'office_name_en' => $office->office_name_en,
            'office_name_ar' => $office->office_name_ar,
            'country_ar' => $office->country_ar,
            'country_en' => $office->country_en,
            'address_ar'  => $office->address_ar,
            'address_en'  => $office->address_en,
            'phone' => $office->phone,
            'image' => $office->image,
            'active' => $office->active
        );
        echo json_encode($output);
    }
    
    function postdata(Request $request){
        $error_array = array();
        $success_output = '';
        if($request->get('button_action') == 'update'){
            $office2 = Office::find($request->input('office_id'));
            $destination2 = storage_path('uploads/' . $request->storage);
            $image2 = $request->file('image');
            if ($image2 != null) {
                if (is_file($destination2 . "/{$image2}")) {
                    @unlink($destination2 . "/{$image2}");
                }
                $imageName = $image2->getClientOriginalName();
                $image2->move($destination2, $imageName);
                $office2->image = $imageName;
            }
            $office2->office_name_en = $request->office_name_en;
            $office2->office_name_ar = $request->office_name_ar;
            $office2->country_ar = $request->country_ar;
            $office2->country_en = $request->country_en;
            $office2->address_ar = $request->address_ar;
            $office2->address_en = $request->address_en;
            $office2->phone = $request->phone;
            if (isset($request->active)) {
                $office2->active = 1;
            }else{
                $office2->active = 0;
            }
            
            if($office2->save()){
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
                    'office_name_en' => 'required',
                    'office_name_ar' => 'required',
                ],[
                    'image.required' => 'Please Upload Image',
                    'image.image' => 'Please upload image not video',
                    'image.mimes' => 'Image type : jpeg,jpg,png,gif',
                    'image.max' => 'Max Size 20 MB',
                    'office_name_en.required' => 'Please Enter Office Name in English',
                    'office_name_ar.required' => 'Please Enter Office Name in Arabic',
                ]);
            }elseif(Config::get('app.locale') == 'ar'){
                $validation = Validator::make($request->all(), [
                    'image' => 'required|image|mimes:jpeg,jpg,png,gif,pdf|max:20000',
                    'office_name_en' => 'required',
                    'office_name_ar' => 'required',
                ],[
                    'image.required' => 'Please Upload Image',
                    'image.image' => 'Please upload image not video',
                    'image.mimes' => 'Image type : jpeg,jpg,png,gif',
                    'image.max' => 'Max Size 20 MB',
                    'office_name_en.required' => 'Please Enter Office Name in English',
                    'office_name_ar.required' => 'Please Enter Office Name in Arabic',
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
                $office = new Office;
                $destination = storage_path('uploads/' . $request->storage);
                $image = Input::File('image');
                if($image != null){
                    if (is_file($destination . "/{$image}")) {
                        @unlink($destination . "/{$image}");
                    }
                    $imageName = $image->getClientOriginalName();
                    $image->move($destination, $imageName);
                    $office->image = $imageName;
                }
                $office->office_name_en = $request->office_name_en;
                $office->office_name_ar = $request->office_name_ar;
                $office->country_ar = $request->country_ar;
                $office->country_en = $request->country_en;
                $office->address_ar = $request->address_ar;
                $office->address_en = $request->address_en;
                $office->phone = $request->phone;
                if($request->active == "on"){
                    $office->active = 1;
                }elseif(empty($request->active)){
                    $office->active = 0;
                }
                
                if($office->save()){
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
        $office = Office::find($request->input('id'));
        $office->delete();
    }

    function massremove(Request $request)
    {
        $office_id_array = $request->input('id');
        $office = Office::whereIn('id', $office_id_array);
        $office->delete();
    }

}
