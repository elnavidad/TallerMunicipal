<?php

namespace App\Http\Controllers;

use App\Refection;
use Illuminate\Http\Request;

class RefectionController extends Controller
{

    public function datatable()
    {
        $p = $this->getPermission('refection');
        $data = Refection::with('Brand')->get();
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
        return view('refection.index', [ 'refection'=>new Refection() ]);
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
        return Refection::create($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Refection  $refection
     * @return \Illuminate\Http\Response
     */
    public function show(Refection $refection)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Refection  $refection
     * @return \Illuminate\Http\Response
     */
    public function edit(Refection $refection)
    {
        return view('refection.edit', compact('refection'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Refection  $refection
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Refection $refection)
    {
        return (int)$refection->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Refection  $refection
     * @return \Illuminate\Http\Response
     */
    public function destroy(Refection $refection)
    {
        return (int)$refection->delete();
    }
}
