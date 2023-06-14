<?php

namespace App\Http\Controllers;

use App\Models\OrderStatus;
use Illuminate\Http\Request;
use App\Models\OrderItem;
use App\Models\MasterStatus;

class OrderStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orderstats = OrderStatus::all();

        return view('order_status.index', compact('orderstats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $orders = OrderItem::all();
        $statuss = MasterStatus::all();

        return view('order_status.form_input', compact('orders','statuss'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $orderstat = new OrderStatus;
        $orderstat->order_id = $request->order_id;
        $orderstat->status_id = $request->status_id;
        $orderstat->save();
        return redirect()->route('orderstat.index')->with('success', 'Data berhasil dimasukkan ke database.');    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OrderStatus  $orderStatus
     * @return \Illuminate\Http\Response
     */
    public function show(OrderStatus $orderStatus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OrderStatus  $orderStatus
     * @return \Illuminate\Http\Response
     */
    public function edit( $orderStatus)
    {
        $orderstat = OrderStatus::findOrFail($orderStatus);
        $statuss = MasterStatus::all();
        return view('order_status.edit', ['orderstat' => $orderstat], compact('statuss'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OrderStatus  $orderStatus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $orderStatus)
    {
        $orderstat = OrderStatus::findOrFail($orderStatus);

        // Update data master status
        $orderstat->status_id = $request->input('status_id');
        $orderstat->save();
        // Redirect atau respon sesuai kebutuhan Anda
        return redirect()->route('orderstat.index')->with('success', 'order updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OrderStatus  $orderStatus
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrderStatus $orderStatus)
    {
        //
    }
}
