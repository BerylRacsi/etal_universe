<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Exports\PayedExport;
use App\Exports\SentExport;
use Maatwebsite\Excel\Facades\Excel;
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
        $orders = Order::whereNotNull('bukti')->whereNull('resi')->get();

        $belum = Order::where('bukti', '=', '')->orWhereNull('bukti')->get();

        $send = Order::whereNotNull('bukti')->whereNotNull('resi')->get();

        return view('admin/order/index', compact('orders','belum','send'));
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

    public function export_payed()
    {
        return Excel::download(new PayedExport, 'Payed.xlsx');
    }

    public function export_sent()
    {
        return Excel::download(new SentExport, 'Sent.xlsx');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $order_id = $request->input('order_number');
        $resi = Order::where('order_number',$order_id)->first();

        $resi->resi = $request->input('resi');
        $resi->save();

        return redirect('/admin/order');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::where('order_number',$id)->first();

        return view('admin.order.show',compact('order'));
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
        $order = Order::find($id);
        $order->delete();
        return redirect('admin/order')->with('status', 'Order Removed!');
    }
}
