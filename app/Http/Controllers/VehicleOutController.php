<?php

namespace App\Http\Controllers;

use App\VehicleOut;
use Illuminate\Http\Request;

class VehicleOutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function datatable()
    {
        $p = $this->getPermission('vehicleOut');
        $data = VehicleOut::with('Vehicle')->get();
        if(isset($p))
            foreach($data as $d)
                $d['p'] = array('a'=>false && $p->u,'e'=>$p->u,'d'=>$p->d);
        return datatables()->of($data)->toJson();
    }

    public function index()
    {
        return view('vehicleOut.index', [ 'vehicleOut'=>new VehicleOut() ]);
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
        $data = $request->all();
        $data['is_fixed'] = isset($data['is_fixed']) && $data['is_fixed'] == 'on' ? true : false;
        return VehicleOut::create($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\VehicleOut  $vehicleOut
     * @return \Illuminate\Http\Response
     */
    public function show(VehicleOut $vehicleOut)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\VehicleOut  $vehicleOut
     * @return \Illuminate\Http\Response
     */
    public function edit(VehicleOut $vehicleOut)
    {
        return view('vehicleOut.edit', compact('vehicleOut'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\VehicleOut  $vehicleOut
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VehicleOut $vehicleOut)
    {
        return (int)$vehicleOut->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\VehicleOut  $vehicleOut
     * @return \Illuminate\Http\Response
     */
    public function destroy(VehicleOut $vehicleOut)
    {
        return (int)$vehicleOut->delete();
    }
}
