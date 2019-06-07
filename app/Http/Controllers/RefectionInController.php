<?php

namespace App\Http\Controllers;

use App\RefectionIn;
use Illuminate\Http\Request;

class RefectionInController extends Controller
{
    public function datatable()
    {
        $p = $this->getPermission('refectionIn');
        $data = RefectionIn::with('Refection')->get();
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
        return view('refectionIn.index', ['refectionIn'=>new RefectionIn() ]);
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
        return RefectionIn::create($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RefectionIn  $refectionIn
     * @return \Illuminate\Http\Response
     */
    public function show(RefectionIn $refectionIn)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RefectionIn  $refectionIn
     * @return \Illuminate\Http\Response
     */
    public function edit(RefectionIn $refectionIn)
    {
        return view('refectionIn.edit', compact('refectionIn'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RefectionIn  $refectionIn
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RefectionIn $refectionIn)
    {
        return (int)$refectionIn->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RefectionIn  $refectionIn
     * @return \Illuminate\Http\Response
     */
    public function destroy(RefectionIn $refectionIn)
    {
        return (int)$refectionIn->delete();
    }
}
