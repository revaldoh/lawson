<?php

namespace App\Http\Controllers;

use App\Models\MasterStatus;
use Illuminate\Http\Request;

class MasterStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $statuses = MasterStatus::all();

        return view('master_status.index', compact('statuses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $status = new MasterStatus;
        $status->name = $request->name;
        $status->description = $request->desc;
        $status->save();
        return redirect()->route('master_status.index')->with('success', 'Data berhasil dimasukkan ke database.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MasterStatus  $masterStatus
     * @return \Illuminate\Http\Response
     */
    public function show(MasterStatus $masterStatus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MasterStatus  $masterStatus
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $status = MasterStatus::findOrFail($id);;

        return view('master_status.edit', ['status' => $status]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MasterStatus  $masterStatus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $status)
    {
        // Cari master status berdasarkan ID
        $masterStatus = MasterStatus::findOrFail($status);

        // Update data master status
        $masterStatus->name = $request->input('name');
        $masterStatus->description = $request->input('desc');
        $masterStatus->save();
        // Redirect atau respon sesuai kebutuhan Anda
        return redirect()->route('master_status.index')->with('success', 'Master status updated successfully');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MasterStatus  $masterStatus
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $status = MasterStatus::findOrFail($id);
        $status->delete();

        return redirect()->route('master_status.index')->with('success', 'Status deleted successfully');
    }
}
