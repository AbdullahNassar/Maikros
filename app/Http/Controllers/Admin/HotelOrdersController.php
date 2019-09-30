<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\HotelOrders;
use Validator;
use Config;
use DB;
use Carbon;
use Yajra\DataTables\Facades\DataTables;

class HotelOrdersController extends Controller
{
    public function getIndex() {
        return view('admin.pages.hotel_orders.index');
    }

    public function getdata() {
        $orders = HotelOrders::select('id','first_name','last_name');
        return Datatables::of($orders)
        ->addColumn('action', function($order){
            return '<a href="#" class="text-danger btndelet" id="'.$order->id.'"><i class="fa fa-close"></i></a>     <a href="#" class="text-primary view" id="'.$order->id.'"><i class="fa fa-eye"></i></a>';
        })
        ->addColumn('checkbox', '<input type="checkbox" name="order_checkbox[]" class="order_checkbox" value="{{$id}}" />')
        ->rawColumns(['checkbox','action'])
        ->make(true);
    }

    function orderhotel(Request $request){

        $id = $request->input('id');
        $orderhotel = DB::table('hotel_orders')
                ->join('hotels','hotel_orders.hotel_id','=','hotels.id')
                ->select('hotels.*')
                ->where("hotel_orders.id", $id)
                ->get();
        echo json_encode($orderhotel);

    }
    
    function fetchdata(Request $request){
        $id = $request->input('id');
        $order = HotelOrders::find($id);
        $output = array(
            'first_name' => $order->first_name,
            'last_name' => $order->last_name,
            'email' => $order->email,
            'phone' => $order->phone,
            'country'  => $order->country,
            'arrival'  => $order->arrival,
            'leaving' => $order->leaving,
            'rooms'  => $order->rooms,
            'beds' => $order->beds,
            'adults' => $order->adults,
            'children' => $order->children,
            'hotel_id' => $order->hotel_id
        );
        echo json_encode($output);
    }

    function removedata(Request $request){
        $hotel = HotelOrders::find($request->input('id'));
        $hotel->delete();
    }

    function massremove(Request $request)
    {
        $hotel_id_array = $request->input('id');
        $hotel = HotelOrders::whereIn('id', $hotel_id_array);
        $hotel->delete();
    }

}
