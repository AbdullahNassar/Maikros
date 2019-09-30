<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\ProgramOrders;
use Validator;
use Config;
use DB;
use Carbon;
use Yajra\DataTables\Facades\DataTables;

class ProgramOrdersController extends Controller
{
    public function getIndex() {
        return view('admin.pages.program_orders.index');
    }

    public function getdata() {
        $orders = ProgramOrders::select('id','first_name','last_name');
        return Datatables::of($orders)
        ->addColumn('action', function($order){
            return '<a href="#" class="text-danger btndelet" id="'.$order->id.'"><i class="fa fa-close"></i></a>     <a href="#" class="text-primary view" id="'.$order->id.'"><i class="fa fa-eye"></i></a>';
        })
        ->addColumn('checkbox', '<input type="checkbox" name="order_checkbox[]" class="order_checkbox" value="{{$id}}" />')
        ->rawColumns(['checkbox','action'])
        ->make(true);
    }

    function orderprogram(Request $request){

        $id = $request->input('id');
        $orderprogram = DB::table('program_orders')
                ->join('programs','program_orders.program_id','=','programs.id')
                ->select('programs.*')
                ->where("program_orders.id", $id)
                ->get();
        echo json_encode($orderprogram);

    }
    
    function fetchdata(Request $request){
        $id = $request->input('id');
        $order = ProgramOrders::find($id);
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
            'program_id' => $order->program_id
        );
        echo json_encode($output);
    }

    function removedata(Request $request){
        $program = ProgramOrders::find($request->input('id'));
        $program->delete();
    }

    function massremove(Request $request)
    {
        $program_id_array = $request->input('id');
        $program = ProgramOrders::whereIn('id', $program_id_array);
        $program->delete();
    }

}
