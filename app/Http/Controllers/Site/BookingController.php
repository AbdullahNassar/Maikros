<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ServiceOrders;
use App\HotelOrders;
use App\ProgramOrders;
use App\FlightOrders;
use App\Service;
use App\Hotel;
use App\Program;
use App\Flight;
use DB;
use Auth;
use Config;
use Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\LoginMail;

class BookingController extends Controller
{
    public function hotelBooking(Request $request)
    {
        $error_array = array();
        $success_output = '';
        if (Config::get('app.locale') == 'en'){
            $validation = Validator::make($request->all(), [
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required',
                'phone' => 'required',
                'country' => 'required',
                'arrival' => 'required',
                'leaving' => 'required',
                'rooms' => 'required',
                'adults' => 'required',
                'children' => 'required',
            ],[
                'first_name.required' => 'Please Enter First Name',
                'last_name.required' => 'Please Enter Last Name',
                'email.required' => 'Please Enter Email',
                'phone.required' => 'Please Enter Phone',
                'country.required' => 'Please Enter Country',
                'arrival.required' => 'Please Enter Arrival Date',
                'leaving.required' => 'Please Enter Leaving Date',
                'rooms.required' => 'Please Enter Number Of Rooms',
                'adults.required' => 'Please Enter Number Of Adults',
                'children.required' => 'Please Enter Number Of Children',
            ]);
        }elseif(Config::get('app.locale') == 'ar'){
            $validation = Validator::make($request->all(), [
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required',
                'phone' => 'required',
                'country' => 'required',
                'arrival' => 'required',
                'leaving' => 'required',
                'rooms' => 'required',
                'adults' => 'required',
                'children' => 'required',
            ],[
                'first_name.required' => 'من فضلك ادخل الاسم الاول',
                'last_name.required' => 'من فضلك ادخل الاسم الاخير',
                'email.required' => 'من فضلك ادخل البريد الالكترونى',
                'phone.required' => 'من فضلك ادخل رقم الهاتف',
                'country.required' => 'من فضلك ادخل الدولة',
                'arrival.required' => 'من فضلك ادخل تاريخ الوصول',
                'leaving.required' => 'من فضلك ادخل تاريخ المغادرة',
                'rooms.required' => 'من فضلك ادخل عدد الغرف',
                'adults.required' => 'من فضلك ادخل عدد البالغين',
                'children.required' => 'من فضلك ادخل عدد الاطفال',
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
            $order = new HotelOrders();
            $order->first_name = $request->first_name;
            $order->last_name = $request->last_name;
            $order->email = $request->email;
            $order->phone = $request->phone;
            $order->country = $request->country;
            $order->arrival = $request->arrival;
            $order->leaving = $request->leaving;
            $order->rooms = $request->rooms;
            $order->adults = $request->adults;
            $order->children = $request->children;
            $order->hotel_id = $request->hotel_id;
            if(Auth::guard('members')->check()){
                $order->user_id = Auth::guard('members')->user()->id;
            }
            if($order->save()){
                $id = $request->hotel_id;
                $hotel = Hotel::find($id);
                $subject = "Hotel Reservation";
                $message = 'Hi '.$request->first_name.' '.$request->last_name.'<br>'.
                           'Your reservation to ['.$hotel->hotel_name_en.'] is done and you will be noticed after the confirmaion of your request';
                Mail::to($request->email)->send(new LoginMail($subject, $message));
                if(Config::get('app.locale') == 'en'){
                    $success_output = '<div class="alert alert-success">Data Inserted Successfully</div>';
                }elseif(Config::get('app.locale') == 'ar'){
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

    public function programBooking(Request $request)
    {
        $error_array = array();
        $success_output = '';
        if (Config::get('app.locale') == 'en'){
            $validation = Validator::make($request->all(), [
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required',
                'phone' => 'required',
                'country' => 'required',
                'arrival' => 'required',
                'leaving' => 'required',
                'rooms' => 'required',
                'beds' => 'required',
                'adults' => 'required',
                'children' => 'required',
            ],[
                'first_name.required' => 'Please Enter First Name',
                'last_name.required' => 'Please Enter Last Name',
                'email.required' => 'Please Enter Email',
                'phone.required' => 'Please Enter Phone',
                'country.required' => 'Please Enter Country',
                'arrival.required' => 'Please Enter Arrival Date',
                'leaving.required' => 'Please Enter Leaving Date',
                'rooms.required' => 'Please Enter Number Of Rooms',
                'beds.required' => 'Please Enter Number Of Beds',
                'adults.required' => 'Please Enter Number Of Adults',
                'children.required' => 'Please Enter Number Of Children',
            ]);
        }elseif(Config::get('app.locale') == 'ar'){
            $validation = Validator::make($request->all(), [
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required',
                'phone' => 'required',
                'country' => 'required',
                'arrival' => 'required',
                'leaving' => 'required',
                'rooms' => 'required',
                'beds' => 'required',
                'adults' => 'required',
                'children' => 'required',
            ],[
                'first_name.required' => 'من فضلك ادخل الاسم الاول',
                'last_name.required' => 'من فضلك ادخل الاسم الاخير',
                'email.required' => 'من فضلك ادخل البريد الالكترونى',
                'phone.required' => 'من فضلك ادخل رقم الهاتف',
                'country.required' => 'من فضلك ادخل الدولة',
                'arrival.required' => 'من فضلك ادخل تاريخ الوصول',
                'leaving.required' => 'من فضلك ادخل تاريخ المغادرة',
                'rooms.required' => 'من فضلك ادخل عدد الغرف',
                'beds.required' => 'من فضلك ادخل عدد السراير',
                'adults.required' => 'من فضلك ادخل عدد البالغين',
                'children.required' => 'من فضلك ادخل عدد الاطفال',
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
            $order = new ProgramOrders();
            $order->first_name = $request->first_name;
            $order->last_name = $request->last_name;
            $order->email = $request->email;
            $order->phone = $request->phone;
            $order->country = $request->country;
            $order->arrival = $request->arrival;
            $order->leaving = $request->leaving;
            $order->rooms = $request->rooms;
            $order->beds = $request->beds;
            $order->adults = $request->adults;
            $order->children = $request->children;
            $order->program_id = $request->program_id;
            if(Auth::guard('members')->check()){
                $order->user_id = Auth::guard('members')->user()->id;
            }
            if($order->save()){
                $id = $request->program_id;
                $program = Program::find($id);
                $subject = "Program Reservation";
                $message = 'Hi '.$request->first_name.' '.$request->last_name.'<br>'.
                           'Your reservation to ['.$program->p_name_en.'] is done and you will be noticed after the confirmaion of your request';
                Mail::to($request->email)->send(new LoginMail($subject, $message));
                if(Config::get('app.locale') == 'en'){
                    $success_output = '<div class="alert alert-success">Data Inserted Successfully</div>';
                }elseif(Config::get('app.locale') == 'ar'){
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

    public function serviceBooking(Request $request)
    {
        $error_array = array();
        $success_output = '';
        if (Config::get('app.locale') == 'en'){
            $validation = Validator::make($request->all(), [
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required',
                'phone' => 'required',
                'country' => 'required',
                'arrival' => 'required',
                'leaving' => 'required',
                'rooms' => 'required',
                'beds' => 'required',
                'adults' => 'required',
                'children' => 'required',
            ],[
                'first_name.required' => 'Please Enter First Name',
                'last_name.required' => 'Please Enter Last Name',
                'email.required' => 'Please Enter Email',
                'phone.required' => 'Please Enter Phone',
                'country.required' => 'Please Enter Country',
                'arrival.required' => 'Please Enter Arrival Date',
                'leaving.required' => 'Please Enter Leaving Date',
                'rooms.required' => 'Please Enter Number Of Rooms',
                'beds.required' => 'Please Enter Number Of Beds',
                'adults.required' => 'Please Enter Number Of Adults',
                'children.required' => 'Please Enter Number Of Children',
            ]);
        }elseif(Config::get('app.locale') == 'ar'){
            $validation = Validator::make($request->all(), [
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required',
                'phone' => 'required',
                'country' => 'required',
                'arrival' => 'required',
                'leaving' => 'required',
                'rooms' => 'required',
                'beds' => 'required',
                'adults' => 'required',
                'children' => 'required',
            ],[
                'first_name.required' => 'من فضلك ادخل الاسم الاول',
                'last_name.required' => 'من فضلك ادخل الاسم الاخير',
                'email.required' => 'من فضلك ادخل البريد الالكترونى',
                'phone.required' => 'من فضلك ادخل رقم الهاتف',
                'country.required' => 'من فضلك ادخل الدولة',
                'arrival.required' => 'من فضلك ادخل تاريخ الوصول',
                'leaving.required' => 'من فضلك ادخل تاريخ المغادرة',
                'rooms.required' => 'من فضلك ادخل عدد الغرف',
                'beds.required' => 'من فضلك ادخل عدد السراير',
                'adults.required' => 'من فضلك ادخل عدد البالغين',
                'children.required' => 'من فضلك ادخل عدد الاطفال',
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
            $order = new ServiceOrders();
            $order->first_name = $request->first_name;
            $order->last_name = $request->last_name;
            $order->email = $request->email;
            $order->phone = $request->phone;
            $order->country = $request->country;
            $order->arrival = $request->arrival;
            $order->leaving = $request->leaving;
            $order->rooms = $request->rooms;
            $order->beds = $request->beds;
            $order->adults = $request->adults;
            $order->children = $request->children;
            $order->service_id = $request->service_id;
            if(Auth::guard('members')->check()){
                $order->user_id = Auth::guard('members')->user()->id;
            }
            if($order->save()){
                $id = $request->service_id;
                $service = Service::find($id);
                $subject = "Service Reservation";
                $message = 'Hi '.$request->first_name.' '.$request->last_name.'<br>'.
                           'Your reservation to ['.$service->name_en.'] is done and you will be noticed after the confirmaion of your request';
                Mail::to($request->email)->send(new LoginMail($subject, $message));
                if(Config::get('app.locale') == 'en'){
                    $success_output = '<div class="alert alert-success">Data Inserted Successfully</div>';
                }elseif(Config::get('app.locale') == 'ar'){
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

    public function flightBooking(Request $request)
    {
        $error_array = array();
        $success_output = '';
        if (Config::get('app.locale') == 'en'){
            $validation = Validator::make($request->all(), [
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required',
                'phone' => 'required',
                'country' => 'required',
                'destination' => 'required',
                'arrival' => 'required',
                'leaving' => 'required',
                'status' => 'required',
                'class' => 'required',
                'adults' => 'required',
                'children' => 'required',
            ],[
                'first_name.required' => 'Please Enter First Name',
                'last_name.required' => 'Please Enter Last Name',
                'email.required' => 'Please Enter Email',
                'phone.required' => 'Please Enter Phone',
                'country.required' => 'Please Enter Country',
                'destination.required' => 'Please Enter Country',
                'arrival.required' => 'Please Enter Arrival Date',
                'leaving.required' => 'Please Enter Leaving Date',
                'status.required' => 'Please Enter Number Of Rooms',
                'class.required' => 'Please Enter Number Of Beds',
                'adults.required' => 'Please Enter Number Of Adults',
                'children.required' => 'Please Enter Number Of Children',
            ]);
        }elseif(Config::get('app.locale') == 'ar'){
            $validation = Validator::make($request->all(), [
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required',
                'phone' => 'required',
                'country' => 'required',
                'destination' => 'required',
                'arrival' => 'required',
                'leaving' => 'required',
                'status' => 'required',
                'class' => 'required',
                'adults' => 'required',
                'children' => 'required',
            ],[
                'first_name.required' => 'Please Enter First Name',
                'last_name.required' => 'Please Enter Last Name',
                'email.required' => 'Please Enter Email',
                'phone.required' => 'Please Enter Phone',
                'country.required' => 'Please Enter Country',
                'destination.required' => 'Please Enter Country',
                'arrival.required' => 'Please Enter Arrival Date',
                'leaving.required' => 'Please Enter Leaving Date',
                'status.required' => 'Please Enter Number Of Rooms',
                'class.required' => 'Please Enter Number Of Beds',
                'adults.required' => 'Please Enter Number Of Adults',
                'children.required' => 'Please Enter Number Of Children',
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
            $order = new FlightOrders();
            $order->first_name = $request->first_name;
            $order->last_name = $request->last_name;
            $order->email = $request->email;
            $order->phone = $request->phone;
            $order->country = $request->country;
            $order->destination = $request->destination;
            $order->arrival = $request->arrival;
            $order->leaving = $request->leaving;
            $order->status = $request->status;
            $order->class = $request->class;
            $order->adults = $request->adults;
            $order->children = $request->children;
            $order->flight_id = $request->flight_id;
            if(Auth::guard('members')->check()){
                $order->user_id = Auth::guard('members')->user()->id;
            }
            if($order->save()){
                $id = $request->flight_id;
                $flight = Flight::find($id);
                $subject = "Flight Reservation";
                $message = 'Hi '.$request->first_name.' '.$request->last_name.'<br>'.
                           'Your reservation to ['.$flight->f_name_en.'] is done and you will be noticed after the confirmaion of your request';
                Mail::to($request->email)->send(new LoginMail($subject, $message));
                if(Config::get('app.locale') == 'en'){
                    $success_output = '<div class="alert alert-success">Data Inserted Successfully</div>';
                }elseif(Config::get('app.locale') == 'ar'){
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
