<?php

namespace App\Http\Controllers;

use App\RefectionOut;
use Illuminate\Http\Request;

class RefectionOutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function datatable()
    {
        $p = $this->getPermission('refectionOut');
        $data = RefectionOut::with(['Refection', 'Vehicle'])->get();
        if(isset($p))
            foreach($data as $d)
                $d['p'] = array('a'=>false && $p->u,'e'=>$p->u,'d'=>$p->d);
        return datatables()->of($data)->toJson();
    }

    public function index()
    {
        return view('refectionOut.index', ['refectionOut'=>new RefectionOut() ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('refectionOut.index', ['refectionOut'=>new RefectionOut() ]);
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
        return RefectionOut::create($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RefectionOut  $refectionOut
     * @return \Illuminate\Http\Response
     */
    public function show(RefectionOut $refectionOut)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RefectionOut  $refectionOut
     * @return \Illuminate\Http\Response
     */
    public function edit(RefectionOut $refectionOut)
    {
        return view('refectionOut.edit', compact('refectionOut'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RefectionOut  $refectionOut
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RefectionOut $refectionOut)
    {
        return (int)$refectionOut->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RefectionOut  $refectionOut
     * @return \Illuminate\Http\Response
     */
    public function destroy(RefectionOut $refectionOut)
    {
        return (int)$refectionOut->delete();
    }
}
