<?php

namespace App\Http\Controllers;
use App\Models\Merchant;
use App\Models\City;
use Illuminate\Http\Request;
use Carbon\Carbon;


class MerchantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $merchants = Merchant::all();

        return view('merchant.index', compact('merchants'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::all();
        return view('merchant.form_input', compact('cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $merchant = new Merchant;
        $merchant->name = $request->name;
        $merchant->city_id = $request->city_id;
        $merchant->address = $request->address;
        $merchant->phone = $request->phone;
        $merchant->expired_date = Carbon::createFromFormat('Y-m-d', $request->exp)->toDateString();
        $merchant->save();
        return redirect()->route('merchant.index')->with('success', 'Data berhasil dimasukkan ke database.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $merchant = Merchant::findOrFail($id);;
        $cities = City::all();
        return view('merchant.edit', ['merchant' => $merchant],compact('cities','merchant'));
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
         // Cari master status berdasarkan ID
         $merchant = Merchant::findOrFail($id);

         // Update data master status
         $merchant->name = $request->input('name');
         $merchant->city_id = $request->input('city_id');
         $merchant->address = $request->input('address');
         $merchant->phone = $request->input('phone');
         $merchant->expired_date = $request->input('exp');
         $merchant->save();
         // Redirect atau respon sesuai kebutuhan Anda
         return redirect()->route('merchant.index')->with('success', 'merchant updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $merchant = Merchant::findOrFail($id);
        $merchant->delete();

        return redirect()->route('merchant.index')->with('success', 'merchant deleted successfully');
    }
}
