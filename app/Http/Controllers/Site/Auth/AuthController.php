<?php

namespace App\Http\Controllers\Site\Auth;

use App\Member;
use App\Data;
use App\Contact;
use App\Http\Controllers\Controller;
use Config;
use Validator;
use Auth;
use Hash;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\RegisterMail;
use App\Mail\LoginMail;

class AuthController extends Controller {

    public function __construct(Request $request) {
        $this->middleware('guest.site', ['except' => ['logout', 'getLogout']]);
    }

    public function getLogin() {
        $data = new Data;
        $contact = new Contact;
        return view('site.pages.login.index', compact('data','contact'));
    }

    public function companylogin() {
        $data = new Data;
        $contact = new Contact;
        return view('site.pages.company_login.index', compact('data','contact'));
    }

    public function companyregister() {
        $data = new Data;
        $contact = new Contact;
        return view('site.pages.company_register.index', compact('data','contact'));
    }

    public function forget() {
        $data = new Data;
        $contact = new Contact;
        return view('site.pages.forget.index', compact('data','contact'));
    }

    public function getRegister() {
        $data = new Data;
        $contact = new Contact;
        return view('site.pages.register.index', compact('data','contact'));
    }

    public function postLogin(Request $r) {
        if($r->type == "user"){
            $return = [
                'status' => 'success',
                'message' => 'Login Success!',
                'url' => route('site.profile')
            ];
            $name = $r->input('username');
            $password = $r->input('password');
            $admin = Member::where('username', $name)->where('type', "user")->orWhere('email', $name)->first();
            if ($admin && Hash::check($password, $admin->password)) {
                Auth::guard('members')->login($admin, $r->has('remember'));
            } else {
                $return = [
                    'response' => 'error',
                    'message' => 'Login Failed!'
                ];
            }
            return response()->json($return);
        }elseif($r->type == "multi"){
            $return = [
                'status' => 'success',
                'message' => 'Login Success!',
                'url' => route('site.multiProfile')
            ];
            $name = $r->input('username');
            $password = $r->input('password');
            $admin = Member::where('username', $name)->where('type', "multi")->orWhere('email', $name)->first();
            if ($admin && Hash::check($password, $admin->password)) {
                Auth::guard('members')->login($admin, $r->has('remember'));
            } else {
                $return = [
                    'response' => 'error',
                    'message' => 'Login Failed!'
                ];
            }
            return response()->json($return);
        }elseif($r->type == "company"){
            $return = [
                'status' => 'success',
                'message' => 'Login Success!',
                'url' => route('site.tourProfile')
            ];
            $name = $r->input('username');
            $password = $r->input('password');
            $admin = Member::where('username', $name)->where('type', "company")->orWhere('email', $name)->first();
            if ($admin && Hash::check($password, $admin->password)) {
                Auth::guard('members')->login($admin, $r->has('remember'));
            } else {
                $return = [
                    'response' => 'error',
                    'message' => 'Login Failed!'
                ];
            }
            return response()->json($return);
        }elseif($r->type == "hotel"){
            $return = [
                'status' => 'success',
                'message' => 'Login Success!',
                'url' => route('site.hotelProfile')
            ];
            $name = $r->input('username');
            $password = $r->input('password');
            $admin = Member::where('username', $name)->where('type', "hotel")->orWhere('email', $name)->first();
            if ($admin && Hash::check($password, $admin->password)) {
                Auth::guard('members')->login($admin, $r->has('remember'));
            } else {
                $return = [
                    'response' => 'error',
                    'message' => 'Login Failed!'
                ];
            }
            return response()->json($return);
        }elseif($r->type == "services"){
            $return = [
                'status' => 'success',
                'message' => 'Login Success!',
                'url' => route('site.companyProfile')
            ];
            $name = $r->input('username');
            $password = $r->input('password');
            $admin = Member::where('username', $name)->where('type', "services")->orWhere('email', $name)->first();
            if ($admin && Hash::check($password, $admin->password)) {
                Auth::guard('members')->login($admin, $r->has('remember'));
            } else {
                $return = [
                    'response' => 'error',
                    'message' => 'Login Failed!'
                ];
            }
            return response()->json($return);
        }
        
    }

    public function postRegister(Request $request) {
        $error_array = array();
        $success_output = '';
            if (Config::get('app.locale') == 'en'){
                $validation = Validator::make($request->all(), [
                    'name' => 'required',
                    'email' => 'required|email|unique:members',
                    'username' => 'required|unique:members',
                    'password' => 'required',
                    'type' => 'required',
                ],[
                    'name.required' => 'Please Enter Your Name',
                    'email.required' => 'Please Enter Your Email',
                    'email.email' => 'Please Enter Valid Email',
                    'email.unique' => 'Please Enter Another Email',
                    'usename.required' => 'Please Enter Username',
                    'usename.required' => 'This UserName Has Been Used Before',
                    'password.required' => 'Please Enter Password',
                    'type.required' => 'Please Select Type',
                ]);
            }elseif(Config::get('app.locale') == 'ar'){
                $validation = Validator::make($request->all(), [
                    'name' => 'required',
                    'email' => 'required|email|unique:members',
                    'username' => 'required|unique:members',
                    'password' => 'required',
                    'type' => 'required',
                ],[
                    'name.required' => 'من فضلك ادخل الاسم',
                    'email.required' => 'من فضلك ادخل البريد الالكترونى',
                    'email.email' => 'من فضلك تأكد من صلاحية البريد الالكترونى',
                    'email.unique' => ' من فضلك ادخل بريد الالكترونى آخر',
                    'usename.required' => 'من فضلك ادخل اسم المستخدم',
                    'usename.unique' => 'اسم المستخدم هذا قد تم استخدامه من قبل',
                    'password.required' => 'من فضلك ادخل كلمة السر',
                    'type.required' => 'من فضلك اختر نوع المستخدم',
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
                $member = new Member;
                $member->name = $request->name;
                $member->username = $request->username;
                $password = bcrypt($request->password);
                $member->password = $password;
                $member->recover = $request->password;
                $member->email = $request->email;
                $member->type = $request->type;
                $member->wallet = 0;
                $member->active = 1;
                $message = 'Hi '.$request->name.'<br>Your Registration to our site is done successfully.<br> UserName : '.$request->username.'<br>';
                if($member->save()){
                    $subject = "Maikros Registration";
                    Mail::to($request->email)->send(new RegisterMail($subject, $message));
                    if(Config::get('app.locale') == 'en'){
                        $success_output = 'Registration is Done Successfully';
                    }elseif(Config::get('app.locale') == 'en'){
                        $success_output = 'تم تسجيل الحساب بنجاح';
                    }
                }
            }
            $output = array(
                'error'     =>  $error_array,
                'success'   =>  $success_output
            );
            echo json_encode($output);
    }

    public function change(Request $request) {
        $error_array = array();
        $success_output = '';
        if (Config::get('app.locale') == 'en'){
            $validation = Validator::make($request->all(), [
                'email' => 'required|email',
                'password2' => 'required_with:password3|same:password3',
                'password3' => 'required',
            ],[
                'name.required' => 'Please Enter Your Name',
                'email.required' => 'Please Enter Your Email',
                'email.email' => 'Please Enter Valid Email',
                'password2.required_with' => 'Please Enter New Password',
                'password3.required' => 'Please Confirm New Password',
            ]);
        }elseif(Config::get('app.locale') == 'ar'){
            $validation = Validator::make($request->all(), [
                'email' => 'required|email',
                'password2' => 'required_with:password3|same:password3',
                'password3' => 'required',
            ],[
                'email.required' => 'من فضلك ادخل البريد الالكترونى',
                'email.email' => 'من فضلك تأكد من صلاحية البريد الالكترونى',
                'password2.required_with' => 'من فضلك ادخل كلمة السر الجديدة',
                'password3.required' => 'من فضلك أكد كلمة السر الجديدة',
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
            $password2 = $request->password2;
            $member = Member::where('email', $request->email)->get();
            if($member){
                $password = bcrypt($request->password2);
                $data = array('password' => $password ,'recover' => $password2);

                $m = DB::table('members')->where('email', $request->email)->update($data);
                if($m){
                    if(Config::get('app.locale') == 'en'){
                        $success_output = 'Password Reset Done Successfully';
                    }elseif(Config::get('app.locale') == 'en'){
                        $success_output = 'تم تغيير كلمة السر بنجاح';
                    }
                }else{
                    if(Config::get('app.locale') == 'en'){
                        $error_array[] = 'Something Went Wrong';
                    }elseif(Config::get('app.locale') == 'en'){
                        $error_array[] = 'حدث خطأ , تأكد من البيانات المدخلة';
                    }
                }
            }else{
                if(Config::get('app.locale') == 'en'){
                    $error_array[] = 'Please Enter Valid Information';
                }elseif(Config::get('app.locale') == 'en'){
                    $error_array[] = 'من فضلك تأكد من البيانات المدخلة';
                }
            }
        }
        $output = array(
            'error'     =>  $error_array,
            'success'   =>  $success_output
        );
        echo json_encode($output);
    }


    public function logout() {
        Auth::guard('members')->logout();
        return redirect()->route('site.home');
    }

    public function guestRegister(Request $request) {
        $error_array = array();
        $success_output = '';
            if (Config::get('app.locale') == 'en'){
                $validation = Validator::make($request->all(), [
                    'email' => 'required|email|unique:members',
                    'username' => 'required|unique:members',
                    'password' => 'required',
                    'type' => 'required',
                ],[
                    'email.required' => 'Please Enter Your Email',
                    'email.email' => 'Please Enter Valid Email',
                    'email.unique' => 'Please Enter Another Email',
                    'usename.required' => 'Please Enter Username',
                    'usename.unique' => 'This UserName Has Been Used Before',
                    'password.required' => 'Please Enter Password',
                    'type.required' => 'Please Select Type',
                ]);
            }elseif(Config::get('app.locale') == 'ar'){
                $validation = Validator::make($request->all(), [
                    'email' => 'required|email|unique:members',
                    'username' => 'required|unique:members',
                    'password' => 'required',
                    'type' => 'required',
                ],[
                    'email.required' => 'من فضلك ادخل البريد الالكترونى',
                    'email.email' => 'من فضلك تأكد من صلاحية البريد الالكترونى',
                    'email.unique' => ' من فضلك ادخل بريد الالكترونى آخر',
                    'usename.required' => 'من فضلك ادخل اسم المستخدم',
                    'usename.unique' => 'اسم المستخدم هذا قد تم استخدامه من قبل',
                    'password.required' => 'من فضلك ادخل كلمة السر',
                    'type.required' => 'من فضلك اختر نوع المستخدم',
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
                $member = new Member;
                $member->name = $request->name;
                $member->username = $request->username;
                $password = bcrypt($request->password);
                $member->password = $password;
                $member->recover = $request->password;
                $member->email = $request->email;
                $member->type = $request->type;
                $member->wallet = 0;
                $member->active = 1;
                $message = 'Hi '.$request->name.'<br>Your Registration to our site is done successfully.<br> UserName : '.$request->username.'<br>';
                if($member->save()){
                    $name = $request->input('username');
                    $password = $request->input('password');
                    $admin = Member::where('username', $name)->where('type', "company")->orWhere('email', $name)->first();
                    if ($admin && Hash::check($password, $admin->password)) {
                        Auth::guard('members')->login($admin, $request->has('remember'));
                        $subject = "Maikros Registration";
                        Mail::to($request->email)->send(new RegisterMail($subject, $message));
                        if(Config::get('app.locale') == 'en'){
                            $success_output = 'Registration is Done Successfully';
                        }elseif(Config::get('app.locale') == 'en'){
                            $success_output = 'تم تسجيل الحساب بنجاح';
                        }
                    }else{
                        if(Config::get('app.locale') == 'en'){
                            $error_array = 'Something went wrong, Try again later';
                        }elseif(Config::get('app.locale') == 'en'){
                            $error_array = 'حدث خطأ, يرجى اعادة المحاولة';
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

    public function guestlogin(Request $r) {
        $return = [
            'status' => 'success',
            'message' => 'Login Success!',
            'url' => route('site.umratak')
        ];
        $name = $r->input('username');
        $type = $r->input('type');
        $password = $r->input('password');
        $admin = Member::where('username', $name)->where('type', $type)->orWhere('email', $name)->first();
        if ($admin && Hash::check($password, $admin->password)) {
            Auth::guard('members')->login($admin, $r->has('remember'));
        } else {
            $return = [
                'response' => 'error',
                'message' => 'Login Failed!'
            ];
        }
        return response()->json($return);
    }

}
