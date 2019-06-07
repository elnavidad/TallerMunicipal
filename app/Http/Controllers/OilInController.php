<?php

namespace App\Http\Controllers;

use App\OilIn;
use Illuminate\Http\Request;

class OilInController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function datatable()
    {
        $p = $this->getPermission('oilIn');
        $data = OilIn::with('oil.brand')->get();
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
        return view('oilIn.index', [ 'oilIn'=>new OilIn() ]);
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
        return OilIn::create($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\OilIn  $oilIn
     * @return \Illuminate\Http\Response
     */
    public function show(OilIn $oilIn)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\OilIn  $oilIn
     * @return \Illuminate\Http\Response
     */
    public function edit(OilIn $oilIn)
    {
        return view('oilIn.edit', compact('oilIn'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\OilIn  $oilIn
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OilIn $oilIn)
    {
        return (int)$oilIn->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\OilIn  $oilIn
     * @return \Illuminate\Http\Response
     */
    public function destroy(OilIn $oilIn)
    {
        return (int)$oilIn->delete();
    }
}
