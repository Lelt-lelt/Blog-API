<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Order;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::all();
        return view('backend.order.index', compact('orders')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->data);

        $lostr = json_decode($request->data);
        $total = 0;

        foreach ($lostr as $row) {
            $total = $row->price*$row->qty;
        }
        $order = new Order;
        $order->orderdate = date('Y-m-d');
        $order->voucherno = uniqid();
        $order->total = $total;
        $order->note = $request->note;
        $order->status = 0;
        $order->user_id = 1;
        $order->save();

        foreach ($lostr as $value) {
            $order->items()->attach($value->id,['qty'=>$value->qty]);
        }
        return response()->json([
            'status' => 'Order successfully created!'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       // $o = Order::find($id);
        $orderdetails = DB::table('orderdetails')
                        ->join('items','orderdetails.item_id','=','items.id')
                        ->where('order_id',$id)
                        ->select('orderdetails.*','items.name as itemname')

                        ->get();

        return view('backend.order.orderdetail', compact('orderdetails'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
