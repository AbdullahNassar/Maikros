<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service;
use App\Data;
use App\Order;
use App\Contact;
use App\GuestRooms;
use App\GuestServices;
use Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Config;
use Validator;
use DB;
use Auth;
use Payfort;

class CartController extends Controller
{

    public function index()
    {
        $cartItems = Cart::content();
        $total = Cart::total();
        $data = new Data;
        $contact = new Contact;
        $mytime = Carbon::now();
        return view('site.pages.cart.index', compact('cartItems','data','contact','mytime','total'));
    }

    public function addCart(Request $request)
    {
        $error_array = array();
        $success_output = '';
        $max = $request->max; 
        if (Config::get('app.locale') == 'en'){
            $validation = Validator::make($request->all(), [
                'rooms' => 'required'
            ],[
                'rooms.required' => 'Please Enter Number Of Rooms'
            ]);
        }elseif(Config::get('app.locale') == 'ar'){
            $validation = Validator::make($request->all(), [
                'rooms' => 'required'
            ],[
                'rooms.required' => 'من فضلك ادخل عدد الغرف'
            ]);
        }
        
        if ($validation->fails())
        {
            foreach ($validation->messages()->getMessages() as $field_name => $messages)
            {
                $error_array[] = $messages; 
            }
        }else{
            $roomId = $request->room_id;
            $room = DB::table('hotel_rooms')
                    ->join('hotels','hotel_rooms.hotel_id','=','hotels.id')
                    ->select('hotels.hotel_name_ar','hotels.hotel_name_en','hotel_rooms.*')
                    ->where("hotel_rooms.id", $roomId)
                    ->first();
            $quantity = $request->input('rooms');
            $children = $request->children; 
            $adults =  $request->adults;
            $guests = $children+$adults;
            $nights = $request->nights;
            $total = $room->price * $guests * $nights;
            $count = $room->count - 1;
            $rooms = $request->count; 
            $data = array('nights' => $count);
            DB::table('hotel_rooms')->where("hotel_rooms.id", $roomId)->update($data);
            if(Auth::guard('members')->check()){
                $guest = new GuestRooms();
                $guest->user_id = Auth::guard('members')->user()->id;
                $guest->hotel_id = $request->hotel_id;
                $guest->room_id = $request->room_id;
                $guest->status = 0;
                $guest->save();
            }
            
            if($quantity <= $max && $quantity <= $rooms){
                if (Config::get('app.locale') == 'en'){
                    Cart::add($roomId, $room->hotel_name_en, $quantity, $total);
                }elseif(Config::get('app.locale') == 'ar'){
                    Cart::add($roomId, $room->hotel_name_ar, $quantity, $total);
                }
                $success_output = '<div class="alert alert-success">Data Inserted Successfully</div>';
            }elseif($quantity > $max){
                if (Config::get('app.locale') == 'en'){
                    $error_array[] = 'You Exceeded The Maximum Number Of Rooms';
                }elseif(Config::get('app.locale') == 'ar'){
                    $error_array[] = 'لقد تخطيت الحد الأقصى للغرف';
                }
            }elseif($quantity > $rooms){
                if (Config::get('app.locale') == 'en'){
                    $error_array[] = 'You Exceeded The Maximum Number Of Rooms';
                }elseif(Config::get('app.locale') == 'ar'){
                    $error_array[] = 'لقد تخطيت الحد الأقصى للغرف';
                }
            }
        }
        $output = array(
            'error'     =>  $error_array,
            'success'   =>  $success_output
        );
        echo json_encode($output);
    }

    public function addCartService(Request $request)
    {
        $max = $request->max; 
        $error_array = array();
        $success_output = '';
        $serviceId = $request->service_id;
        $service = Service::find($serviceId);
        if(Config::get('app.locale') == 'en'){
            Cart::add($serviceId, $service->name_en, $max, $service->price);
        }elseif(Config::get('app.locale') == 'ar'){
            Cart::add($serviceId, $service->name_ar, $max, $service->price);
        }
        if(Auth::guard('members')->check()){
            $service = new GuestServices();
            $service->user_id = Auth::guard('members')->user()->id;
            $service->service_id = $request->service_id;
            $service->status = 0;
            $service->save();
        }
        $success_output = '<div class="alert alert-success">Data Inserted Successfully</div>';
        $output = array(
            'error'     =>  $error_array,
            'success'   =>  $success_output
        );
        echo json_encode($output);
    }
    
    public function removeCart($id){
        Cart::remove($id);
        return redirect()->back();
    }

    public function payfort(Request $request){
        $order = new Order();
        $amount = $request->amount;
        $email = Auth::guard('members')->user()->email;
        $name = Auth::guard('members')->user()->name;
        $order->user_id = Auth::guard('members')->user()->id;
        $order->email = $email;
        $order->amount = $amount;
        $order->status = 0;
        $order->save();
        if (Config::get('app.locale') == 'en'){
            return Payfort::redirection()->displayRedirectionPage([
                'command' => 'AUTHORIZATION',                 # AUTHORIZATION/PURCHASE according to your operation.
                'merchant_reference' => 'ORDR.'.$order->id,   # You reference id for this operation (Order id for example).
                'amount' => $amount,                          # The operation amount.
                'currency' => 'USD',                          # Optional if you need to use another currenct than set in config.
                'customer_email' => $email,                   # Customer email.
                'customer_name' => $name,
                'language' => 'en',
                'access_code' => 'zx0IPmPy5jp1vAz8Kpg7',
                'merchant_identifier' => 'CycHZxVj',
                'merchant_reference' => 'XYZ9239-yu898',
                'signature' => '7cad05f0212ed933c9a5d5dffa31661acf2c827a',
            ]); 
        }elseif(Config::get('app.locale') == 'ar'){
            return Payfort::redirection()->displayRedirectionPage([
                'command' => 'AUTHORIZATION',                 # AUTHORIZATION/PURCHASE according to your operation.
                'merchant_reference' => 'ORDR.'.$order->id,   # You reference id for this operation (Order id for example).
                'amount' => $amount,                          # The operation amount.
                'currency' => 'USD',                          # Optional if you need to use another currenct than set in config.
                'customer_email' => $email,                   # Customer email.
                'customer_name' => $name,
                'language' => 'ar',
                'access_code' => 'zx0IPmPy5jp1vAz8Kpg7',
                'merchant_identifier' => 'CycHZxVj',
                'merchant_reference' => 'XYZ9239-yu898',
                'signature' => '7cad05f0212ed933c9a5d5dffa31661acf2c827a',
            ]);
        }
    }
}
