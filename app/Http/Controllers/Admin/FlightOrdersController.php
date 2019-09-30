<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\FlightOrders;
use Validator;
use Config;
use DB;
use Carbon;
use Yajra\DataTables\Facades\DataTables;

class FlightOrdersController extends Controller
{
    public function getIndex() {
        return view('admin.pages.flight_orders.index');
    }

    public function getdata() {
        $orders = FlightOrders::select('id','first_name','last_name');
        return Datatables::of($orders)
        ->addColumn('action', function($order){
            return '<a href="#" class="text-danger btndelet" id="'.$order->id.'"><i class="fa fa-close"></i></a>     <a href="#" class="text-primary view" id="'.$order->id.'"><i class="fa fa-eye"></i></a>';
        })
        ->addColumn('checkbox', '<input type="checkbox" name="order_checkbox[]" class="order_checkbox" value="{{$id}}" />')
        ->rawColumns(['checkbox','action'])
        ->make(true);
    }

    function orderflight(Request $request){

        $id = $request->input('id');
        $orderflight = DB::table('flight_orders')
                ->join('flights','flight_orders.flight_id','=','flights.id')
                ->select('flights.*')
                ->where("flight_orders.id", $id)
                ->get();
        echo json_encode($orderflight);

    }
    
    function fetchdata(Request $request){
        $id = $request->input('id');
        $order = FlightOrders::find($id);
        $output = array(
            'first_name' => $order->first_name,
            'last_name' => $order->last_name,
            'email' => $order->email,
            'phone' => $order->phone,
            'country'  => $order->country,
            'destination'  => $order->destination,
            'arrival'  => $order->arrival,
            'leaving' => $order->leaving,
            'status'  => $order->status,
            'class' => $order->class,
            'adults' => $order->adults,
            'children' => $order->children,
            'flight_id' => $order->flight_id
        );
        echo json_encode($output);
    }

    function removedata(Request $request){
        $flight = FlightOrders::find($request->input('id'));
        $flight->delete();
    }

    function massremove(Request $request)
    {
        $flight_id_array = $request->input('id');
        $flight = FlightOrders::whereIn('id', $flight_id_array);
        $flight->delete();
    }

}
