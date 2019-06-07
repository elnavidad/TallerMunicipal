<?php

namespace App\Http\Controllers;

use App\VehicleIn;
use Illuminate\Http\Request;

class VehicleInController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function datatable()
    {
        $p = $this->getPermission('vehicleIn');
        $data = VehicleIn::with(['Vehicle', 'Department'])->get();
        if(isset($p))
            foreach($data as $d)
                $d['p'] = array('a'=>false && $p->u,'e'=>$p->u,'d'=>$p->d);
        return datatables()->of($data)->toJson();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('vehicleIn.index', [ 'vehicleIn'=>new VehicleIn() ]);
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
        $data['requires_refection'] = isset($data['requires_refection']) && $data['requires_refection'] == 'on' ? true : false;
        return VehicleIn::create($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\VehicleIn  $vehicleIn
     * @return \Illuminate\Http\Response
     */
    public function show(VehicleIn $vehicleIn)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\VehicleIn  $vehicleIn
     * @return \Illuminate\Http\Response
     */
    public function edit(VehicleIn $vehicleIn)
    {
        return view('vehicleIn.edit', compact('vehicleIn'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\VehicleIn  $vehicleIn
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VehicleIn $vehicleIn)
    {
        return (int)$vehicleIn->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\VehicleIn  $vehicleIn
     * @return \Illuminate\Http\Response
     */
    public function destroy(VehicleIn $vehicleIn)
    {
        return (int)$vehicleIn->delete();
    }
}
