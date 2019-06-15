<?php

namespace Prodesal\Http\Controllers\admin;

use Illuminate\Http\Request;
use Prodesal\Http\Controllers\Controller;
use Prodesal\Http\Requests\AsociacionStoreRequest;
use Illuminate\Support\Facades\Storage;
use Prodesal\Asociacion;

class AsociacionController extends Controller
{
       public function __construct()
    {
        $this->middleware('auth');
    }
	public function index()
	    {
	    	$asociaciones = Asociacion::orderBy('nombre','DSC')->paginate();
	    	return view('admin.asociaciones.index',compact('asociaciones'));
	    }    
	 /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.asociaciones.create');    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AsociacionStoreRequest $request)
    {
        
        $asociacion = Asociacion::create($request->all());    
        
        return redirect()->route('asociaciones.edit', $asociacion->id)
        ->with('info','Asociación Creada con éxito !!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $asociacion = Asociacion::find($id);    
        return view('admin.asociaciones.show', compact('asociacion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $asociacion = Asociacion::find($id);    
        return view('admin.asociaciones.edit', compact('asociacion'));    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AsociacionStoreRequest $request, $id)
    {
        $asociacion = Asociacion::find($id);
        $asociacion->fill($request->all())->save();

        return redirect()->route('asociaciones.edit', $asociacion->id)
        ->with('info','Asociación Actualizado con éxito !!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rubro = Asociacion::find($id)->delete();
        return back()->with('info', 'Eliminado Correctamente');    
    }
}
