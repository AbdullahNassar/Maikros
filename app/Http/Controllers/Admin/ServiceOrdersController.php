<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\ServiceOrders;
use Validator;
use Config;
use DB;
use Carbon;
use Yajra\DataTables\Facades\DataTables;

class ServiceOrdersController extends Controller
{
    public function getIndex() {
        return view('admin.pages.service_orders.index');
    }

    public function getdata() {
        $orders = ServiceOrders::select('id','first_name','last_name');
        return Datatables::of($orders)
        ->addColumn('action', function($order){
            return '<a href="#" class="text-danger btndelet" id="'.$order->id.'"><i class="fa fa-close"></i></a>     <a href="#" class="text-primary view" id="'.$order->id.'"><i class="fa fa-eye"></i></a>';
        })
        ->addColumn('checkbox', '<input type="checkbox" name="order_checkbox[]" class="order_checkbox" value="{{$id}}" />')
        ->rawColumns(['checkbox','action'])
        ->make(true);
    }

    function orderservice(Request $request){

        $id = $request->input('id');
        $orderservice = DB::table('service_orders')
                ->join('services','service_orders.service_id','=','services.id')
                ->select('services.*')
                ->where("service_orders.id", $id)
                ->get();
        echo json_encode($orderservice);

    }
    
    function fetchdata(Request $request){
        $id = $request->input('id');
        $order = ServiceOrders::find($id);
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
            'service_id' => $order->service_id
        );
        echo json_encode($output);
    }

    function removedata(Request $request){
        $service = ServiceOrders::find($request->input('id'));
        $service->delete();
    }

    function massremove(Request $request)
    {
        $service_id_array = $request->input('id');
        $service = ServiceOrders::whereIn('id', $service_id_array);
        $service->delete();
    }

}
