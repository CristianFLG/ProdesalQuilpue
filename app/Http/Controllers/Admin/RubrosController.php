<?php

namespace Prodesal\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Prodesal\Http\Controllers\Controller;
use Prodesal\Http\Requests\RubroStoreRequest;


use Prodesal\Rubro;

class RubrosController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $rubros = Rubro::orderBy('id', 'DESC')->paginate();
        return view('admin.rubro.index',compact('rubros'));    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.rubro.create');    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RubroStoreRequest $request)
    {
        $rubros = Rubro::create($request->all());    

        return redirect()->route('rubros.edit', $rubros->id)
        ->with('info','Rubro Creado con éxito !!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rubro = Rubro::find($id);    
        return view('admin.rubro.show', compact('rubro'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rubro = Rubro::find($id);    
        return view('admin.rubro.edit', compact('rubro'));    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RubroStoreRequest $request, $id)
    {
        $rubro = Rubro::find($id);
        $rubro->fill($request->all())->save();

        return redirect()->route('rubros.edit', $rubro->id)
        ->with('info','Rubro Actualizado con éxito !!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rubro = Rubro::find($id)->delete();
        return back()->with('info', 'Eliminado Correctamente');    
    }
}
