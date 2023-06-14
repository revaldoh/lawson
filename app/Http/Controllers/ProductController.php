<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Merchant;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();

        return view('product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $merchants = Merchant::all();

        return view('product.form_input', compact('merchants'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $merchant = new Product;
        $merchant->name = $request->name;
        $merchant->merchant_id = $request->merchant_id;
        $merchant->price = $request->price;
        $merchant->save();
        return redirect()->route('product.index')->with('success', 'Data berhasil dimasukkan ke database.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($product_id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($product_id)
    {
        $product = Product::findOrFail($product_id);;
        $merchants = Merchant::all();
        return view('product.edit', ['product' => $product],compact('merchants','product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $product_id)
    {
        $product = Product::findOrFail($product_id);

        // Update data master status
        $product->name = $request->input('name');
        $product->merchant_id = $request->input('merchant_id');
        $product->price = $request->input('price');
        $product->save();
        // Redirect atau respon sesuai kebutuhan Anda
        return redirect()->route('product.index')->with('success', 'product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($product_id)
    {
        $product = Product::findOrFail($product_id);
        $product->delete();

        return redirect()->route('product.index')->with('success', 'product deleted successfully');
    }
}
