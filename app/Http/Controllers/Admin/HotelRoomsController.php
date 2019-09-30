<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Hotel;
use App\HotelRooms;
use Validator;
use Config;
use DB;
use Yajra\DataTables\Facades\DataTables;

class HotelRoomsController extends Controller
{
    public function getIndex() {
        return view('admin.pages.hotel_rooms.index');
    }

    public function getdata() {
        $hotel_rooms = HotelRooms::select('id','r_name_en','price');
        return Datatables::of($hotel_rooms)
        ->addColumn('action', function($hotel_room){
            return '<a href="#" class="text-primary edit" id="'.$hotel_room->id.'"><i class="fa fa-edit"></i></a>     <a href="#" class="text-danger btndelet" id="'.$hotel_room->id.'"><i class="fa fa-close"></i></a>     <a href="#" class="text-primary view" id="'.$hotel_room->id.'"><i class="fa fa-eye"></i></a>';
        })
        ->addColumn('checkbox', '<input type="checkbox" name="hotel_room_checkbox[]" class="hotel_room_checkbox" value="{{$id}}" />')
        ->rawColumns(['checkbox','action'])
        ->make(true);
    }

    function hotel(){
        $hotels = Hotel::get()->where('active','=',1);
        echo json_encode($hotels);
    }

    function roomhotel(Request $request){
        $id = $request->input('id');
        $roomhotel = DB::table('hotel_rooms')
                ->join('hotels','hotel_rooms.hotel_id','=','hotels.id')
                ->select('hotels.*')
                ->where("hotels.id", $id)
                ->get();
        echo json_encode($roomhotel);
    }

    function fetchdata(Request $request){
        $id = $request->input('id');
        $hotel_room = HotelRooms::find($id);
        $output = array(
            'r_name_en' => $hotel_room->r_name_en,
            'r_name_ar' => $hotel_room->r_name_ar,
            'content_en' => $hotel_room->content_en,
            'content_ar' => $hotel_room->content_ar,
            'hotel_id' => $hotel_room->hotel_id,
            'rate' => $hotel_room->rate,
            'nights' => $hotel_room->nights,
            'max' => $hotel_room->max,
            'price' => $hotel_room->price,
            'count' => $hotel_room->count,
            'image' => $hotel_room->image,
            'active' => $hotel_room->active
        );
        echo json_encode($output);
    }

    function postdata(Request $request){
        $error_array = array();
        $success_output = '';
        if($request->get('button_action') == 'update'){
            $hotel_room2 = HotelRooms::find($request->input('room_id'));
            $destination2 = storage_path('uploads/' . $request->storage);
            $image2 = $request->file('image');
            if ($image2 != null) {
                if (is_file($destination2 . "/{$image2}")) {
                    @unlink($destination2 . "/{$image2}");
                }
                $imageName = $image2->getClientOriginalName();
                $image2->move($destination2, $imageName);
                $hotel_room2->image = $imageName;
            }
            $hotel_room2->r_name_en = $request->r_name_en;
            $hotel_room2->r_name_ar = $request->r_name_ar;
            $hotel_room2->content_en = $request->content_en;
            $hotel_room2->content_ar = $request->content_ar;
            $hotel_room2->hotel_id = $request->hotel_id;
            $hotel_room2->rate = $request->rate;
            $hotel_room2->nights = $request->nights;
            $hotel_room2->max = $request->max;
            $hotel_room2->price = $request->price;
            if (isset($request->active)) {
                $hotel_room2->active = 1;
            }else{
                $hotel_room2->active = 0;
            }
            
            if($hotel_room2->save()){
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
                    'r_name_en' => 'required',
                    'r_name_ar' => 'required',
                    'content_en' => 'required',
                    'content_ar' => 'required',
                    'hotel_id' => 'required',
                ],[
                    'image.required' => 'Please Upload Image',
                    'image.image' => 'Please upload image not video',
                    'image.mimes' => 'Image type : jpeg,jpg,png,gif',
                    'image.max' => 'Max Size 20 MB',
                    'r_name_en.required' => 'Please Enter Name in English',
                    'r_name_ar.required' => 'Please Enter Name in Arabic',
                    'content_en.required' => 'Please Enter Content in English',
                    'content_ar.required' => 'Please Enter Content in Arabic',
                    'hotel_id.required' => 'Please Select Hotel',
                ]);
            }elseif(Config::get('app.locale') == 'ar'){
                $validation = Validator::make($request->all(), [
                    'image' => 'required|image|mimes:jpeg,jpg,png,gif,pdf|max:20000',
                    'r_name_en' => 'required',
                    'r_name_ar' => 'required',
                    'content_en' => 'required',
                    'content_ar' => 'required',
                    'hotel_id' => 'required',
                ],[
                    'image.required' => 'Please Upload Image',
                    'image.image' => 'Please upload image not video',
                    'image.mimes' => 'Image type : jpeg,jpg,png,gif',
                    'image.max' => 'Max Size 20 MB',
                    'r_name_en.required' => 'Please Enter Name in English',
                    'r_name_ar.required' => 'Please Enter Name in Arabic',
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
                $hotel_room = new HotelRooms;
                $destination = storage_path('uploads/' . $request->storage);
                $image = $request->file('image');
                if($request->hasFile('image')){
                    if (is_file($destination . "/{$image}")) {
                        @unlink($destination . "/{$image}");
                    }
                    $imageName = $image->getClientOriginalName();
                    $image->move($destination, $imageName);
                    $hotel_room->image = $imageName;
                }
                $hotel_room->r_name_en = $request->r_name_en;
                $hotel_room->r_name_ar = $request->r_name_ar;
                $hotel_room->content_en = $request->content_en;
                $hotel_room->content_ar = $request->content_ar;
                $hotel_room->hotel_id = $request->hotel_id;
                $hotel_room->rate = $request->rate;
                $hotel_room->nights = $request->nights;
                $hotel_room->max = $request->max;
                $hotel_room->price = $request->price;
                if(isset($request->active)) {
                    $hotel_room->active = 1;
                }else{
                    $hotel_room->active = 0;
                }
                
                if($hotel_room->save()){
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
        $hotel_room = HotelRooms::find($request->input('id'));
        $hotel_room->delete();
    }

    function massremove(Request $request)
    {
        $room_id_array = $request->input('id');
        $hotel_room = HotelRooms::whereIn('id', $room_id_array);
        $hotel_room->delete();
    }

}
