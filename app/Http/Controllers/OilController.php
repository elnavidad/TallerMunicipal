<?php

namespace App\Http\Controllers;

use App\Oil;
use Illuminate\Http\Request;

class OilController extends Controller
{

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function datatable()
    {
        $p = $this->getPermission('oil');
        $data = Oil::with('Brand')->get();
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
        return view('oil.index', [ 'oil'=>new Oil() ]);
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
        return Oil::create($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Oil  $oil
     * @return \Illuminate\Http\Response
     */
    public function show(Oil $oil)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Oil  $oil
     * @return \Illuminate\Http\Response
     */
    public function edit(Oil $oil)
    {
        return view('oil.edit', compact('oil'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Oil  $oil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Oil $oil)
    {
        return (int)$oil->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Oil  $oil
     * @return \Illuminate\Http\Response
     */
    public function destroy(Oil $oil)
    {
        return (int)$oil->delete();
    }
}
