<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use Validator;

class HomeController extends Controller{

    public function getIndex(Request $request) {
        return view('admin.pages.home.home');
    }

    public function error() {
        return view('admin.pages.error');
    }

    public function mail() {
        return view('admin.pages.subscriber.index');
    }

    public function sendmail(Request $request){
        $error_array = array();
        $success_output = '';
        $validation = Validator::make($request->all(), [
            'email' => 'required|email',
            'content' => 'required',
        ],[
            'email.required' => 'Please Enter E-mail',
            'email.email' => 'Please Enter A Valid E-mail',
            'content.required' => 'Please Enter Email Content',
        ]);

        if ($validation->fails()){
            foreach ($validation->messages()->getMessages() as $field_name => $messages)
            {
                $error_array[] = $messages; 
            }
        }else{
            $email = $request->input('email');
            $message = $request->input('content');
            $subject = "Maikros";
            $mail = Mail::to($email)->send(new SendMail($subject, $message));
            if($mail){
                $success_output = 'Your Email Is Sent Successfully';
            }
        }
        $output = array(
            'error'     =>  $error_array,
            'success'   =>  $success_output
        );
        echo json_encode($output);                
    }
}
