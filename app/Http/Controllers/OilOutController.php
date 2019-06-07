<?php

namespace App\Http\Controllers;

use App\OilOut;
use App\Oil;
use Illuminate\Http\Request;

class OilOutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function datatable()
    {
        $p = $this->getPermission('oil');
        $data = OilOut::with(['oil.brand','Vehicle'])->get();
        if(isset($p))
            foreach($data as $d)
                $d['p'] = array('a'=>false && $p->u,'e'=>$p->u,'d'=>$p->d);
        return datatables()->of($data)->toJson();
    }

    public function index()
    {
        return view('oilOut.index', [ 'oilOut'=>new OilOut() ]);
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
        return OilOut::create($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\OilOut  $oilOut
     * @return \Illuminate\Http\Response
     */
    public function show(OilOut $oilOut)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\OilOut  $oilOut
     * @return \Illuminate\Http\Response
     */
    public function edit(OilOut $oilOut)
    {
        return view('oilOut.edit', compact('oilOut'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\OilOut  $oilOut
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OilOut $oilOut)
    {
        return (int)$oilOut->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\OilOut  $oilOut
     * @return \Illuminate\Http\Response
     */
    public function destroy(OilOut $oilOut)
    {
        return (int)$oilOut->delete();
    }
}
