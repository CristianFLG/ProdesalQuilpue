<?php

namespace Prodesal\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Prodesal\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Prodesal\Http\Requests\TerritorioStoreRequest;
use Prodesal\Productor;
use Prodesal\Territorio;
use Prodesal\Imagen;


class TerritoriosController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $territorios = Territorio::orderBy('id', 'DESC')->paginate();
        return view('admin.territorios.index',compact('territorios'));    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	$productor = Productor::orderBy('nombre','id')->pluck('nombre','id');  

        return view('admin.territorios.create',compact('productor'));    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TerritorioStoreRequest $request)
    {
        $territorio = Territorio::create($request->all()); 
         if($request->file('image'))
        {
            $path = Storage::disk('public')->put('image',  $request->file('image'));
            $imagen = new Imagen;
            $imagen->fill(['url_img' => asset($path)])->save();
            $territorio->imagens()->attach($imagen->id);//enlace de tabla imagen con productor
        } 

        return redirect()->route('territorios.edit', $territorio->id)
        ->with('info','Territorio Creado con éxito !!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $territorio = Territorio::find($id);
       
       return view('admin.territorios.show',compact('territorio'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $territorio = Territorio::find($id);
        $productor = Productor::orderBy('nombre','id')->pluck('nombre','id');  
    
        return view('admin.territorios.edit', compact('territorio','productor'));    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TerritorioStoreRequest $request, $id)
    {
        $territorio = Territorio::find($id);
        $territorio->fill($request->all())->save();

        return redirect()->route('territorios.edit', $territorio->id)
        ->with('info','Territorio Actualizado con éxito !!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cultural = Territorio::find($id)->delete();
        return back()->with('info', 'Eliminado Correctamente');    
    }
}
