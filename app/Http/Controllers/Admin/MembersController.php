<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Member;
use Validator;
use Config;
use DB;
use Yajra\DataTables\Facades\DataTables;

class MembersController extends Controller
{
    public function getIndex() {
        return view('admin.pages.member.index');
    }

    public function getProfile() {
        $members = Member::get()->where('active','=',1);
        return view('admin.pages.profile.index', compact('members'));
    }

    public function getdata() {
        $members = Member::select('id','name','email', 'phone');
        return Datatables::of($members)
        ->addColumn('action', function($member){
            return '<a href="#" class="text-primary edit" id="'.$member->id.'"><i class="fa fa-edit"></i></a>     <a href="#" class="text-danger btndelet" id="'.$member->id.'"><i class="fa fa-close"></i></a>     <a href="#" class="text-primary view" id="'.$member->id.'"><i class="fa fa-eye"></i></a>';
        })
        ->addColumn('checkbox', '<input type="checkbox" name="member_checkbox[]" class="member_checkbox" value="{{$id}}" />')
        ->rawColumns(['checkbox','action'])
        ->make(true);
    }

    function fetchdata(Request $request){
        $id = $request->input('id');
        $member = Member::find($id);
        $output = array(
            'membername' => $member->membername,
            'password' => $member->recover,
            'name' => $member->name,
            'type' => $member->type,
            'address'  => $member->address,
            'email' => $member->email,
            'phone'  => $member->phone,
            'active' => $member->active,
            'image' => $member->image,
            'country' => $member->country,
            'about' => $member->about,
            'facebook' => $member->facebook,
            'twitter' => $member->twitter,
            'linkedin' => $member->linkedin,
            'instagram' => $member->instagram,
        );
        echo json_encode($output);
    }

    function postdata(Request $request){
        $error_array = array();
        $success_output = '';
        if($request->get('button_action') == 'update'){
            $member2 = Member::find($request->input('member_id'));
            $destination2 = storage_path('uploads/' . $request->storage);
            $image2 = $request->file('member_image');
            if ($image2 != null) {
                if (is_file($destination2 . "/{$image2}")) {
                    @unlink($destination2 . "/{$image2}");
                }
                $imageName = $image2->getClientOriginalName();
                $image2->move($destination2, $imageName);
                $member2->image = $imageName;
            }
            $member2->membername = $request->membername;
            $password2 = bcrypt($request->password);
            $member2->password = $password2;
            $member2->recover = $request->password;
            $member2->name = $request->name;
            $member2->type = $request->type;
            $member2->phone = $request->phone;
            $member2->email = $request->email;
            $member2->birth = $request->birth;
            $member2->about = $request->about;
            $member2->country = $request->country;
            $member2->address = $request->address;
            $member2->national_id = $request->national_id;
            if (isset($request->active)) {
                $member2->active = 1;
            }else{
                $member2->active = 0;
            }
            
            if($member2->save()){
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
                $validation = Validator::make($request->all(), [
                    'member_image' => 'required|image|mimes:jpeg,jpg,png,gif,pdf|max:20000',
                    'membername' => 'required|unique:members|min:6|alpha_dash|alpha_num',
                    'password' => 'required',
                    'name' => 'required',
                    'type' => 'required',
                    'address'  => 'required',
                    'email' => 'required|email|unique:members',
                    'phone'  => 'required|unique:members',
                    'country' => 'required',
                    'about' => 'required',
                ],[
                    'member_image.required' => 'Please Upload Image',
                    'member_image.image' => 'Please upload image not video',
                    'member_image.mimes' => 'Image type : jpeg,jpg,png,gif',
                    'member_image.max' => 'Max Size 20 MB',
                    'membername.required' => 'Please Enter memberName',
                    'password.required' => 'Please Enter Password',
                    'name.required' => 'Please Enter member Name',
                    'type.required' => 'Please Enter member Type',
                    'national_id.required' => 'Please Select national_id',
                    'phone.required' => 'Please Enter Phone Number',
                    'phone.unique' => 'Please Enter Another Phone Number',
                    'email.required' => 'Please Enter E-mail',
                    'email.unique' => 'Please Enter Another E-mail',
                    'email.email' => 'Please Enter A Valid E-mail',
                    'country.required' => 'Please Enter member Country',
                    'address.required' => 'Please Enter Address',
                    'about.required' => 'Please Enter member Bio',
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
                $member = new Member;
                $destination = storage_path('uploads/' . $request->storage);
                $image = $request->file('member_image');
                if($request->hasFile('member_image')){
                    if (is_file($destination . "/{$image}")) {
                        @unlink($destination . "/{$image}");
                    }
                    $imageName = $image->getClientOriginalName();
                    $image->move($destination, $imageName);
                    $member->image = $imageName;
                }else{
                    $member->image = "1.jpg";
                }
                $member->membername = $request->membername;
                $password = bcrypt($request->password);
                $member->password = $password;
                $member->recover = $request->password;
                $member->name = $request->name;
                $member->type = $request->type;
                $member->phone = $request->phone;
                $member->email = $request->email;
                $member->birth = $request->birth;
                $member->about = $request->about;
                $member->country = $request->country;
                $member->address = $request->address;
                $member->national_id = $request->national_id;
                if($request->active == "on"){
                    $member->active = 1;
                }elseif(empty($request->active)){
                    $member->active = 0;
                }
                
                if($member->save()){
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
        $member = Member::find($request->input('id'));
        $member->delete();
    }

    function massremove(Request $request)
    {
        $member_id_array = $request->input('id');
        $member = Member::whereIn('id', $member_id_array);
        $member->delete();
    }

}
