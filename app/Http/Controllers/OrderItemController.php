<?php

namespace App\Http\Controllers;

use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;

class OrderItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = OrderItem::all();

        return view('order_item.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();
        $users = User::all();

        return view('order_item.form_input', compact('products','users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $order = new OrderItem;
        $order->date = $request->date;
        $order->quantity = $request->qty;
        $order->product_id = $request->product_id;
        $order->user_id = $request->user_id;
        $order->save();
        return redirect()->route('order.index')->with('success', 'Data berhasil dimasukkan ke database.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OrderItem  $orderItem
     * @return \Illuminate\Http\Response
     */
    public function show(OrderItem $orderItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OrderItem  $orderItem
     * @return \Illuminate\Http\Response
     */
    public function edit($order_id)
    {
        $order = OrderItem::findOrFail($order_id);
        $products = Product::all();
        $users = User::all();
        return view('order_item.edit', ['order' => $order],compact('products','users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OrderItem  $orderItem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $order_id)
    {
        $order = OrderItem::findOrFail($order_id);

        // Update data master status
        $order->date = $request->input('date');
        $order->quantity = $request->input('qty');
        $order->product_id = $request->input('product_id');
        $order->user_id = $request->input('user_id');
        $order->save();
        // Redirect atau respon sesuai kebutuhan Anda
        return redirect()->route('order.index')->with('success', 'order updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OrderItem  $orderItem
     * @return \Illuminate\Http\Response
     */
    public function destroy( $order_id)
    {
        $order = OrderItem::findOrFail($order_id);
        $order->delete();

        return redirect()->route('order.index')->with('success', 'order deleted successfully');
    }
}
