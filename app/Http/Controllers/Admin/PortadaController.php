<?php

namespace Prodesal\Http\Controllers\admin;
use Prodesal\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Prodesal\Http\Requests\PortadaSoreRequest;
use Illuminate\Http\Request;
use Prodesal\Imagen;
use Prodesal\Portada;

class PortadaController extends Controller
{
       public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $portadas = Portada::with('imagens')->paginate(5);

    	return view('admin.portadas.index',compact('portadas'));
    }


    public function create()
    {
    	return view('admin.portadas.create');
    }


    public function store(PortadaSoreRequest $request)
    {
        $portada = Portada::create($request->all()); 
        //imagen
        if($request->file('image'))
        {
            $path = Storage::disk('public')->put('image',  $request->file('image'));
            $imagen = new Imagen;
            $imagen->fill(['url_img' => asset($path)])->save();
            $portada->imagens()->attach($imagen->id);//enlace de tabla imagen con productor
        }
        return redirect()->route('portadas.index', $portada->id)
        ->with('info','Portada Creada con éxito !!');
    }

     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $portada = Portada::find($id);    
        return view('admin.portadas.show', compact('portada'));
    }

    public function edit($id)
    {
        $portada = Imagen::find($id);   
        return view('admin.portadas.edit', compact('portada'));
    }



    public function update(Request $request, $id)
    {
        $portada = Portada::find($id);
        $portada->fill($request->all())->save();
        //imagen
          if($request->file('image'))
        {
            $path = Storage::disk('public')->put('image',  $request->file('image'));
            $imagen = new Imagen;
            $imagen->fill(['url_img' => asset($path)])->save();
            $portada->imagens()->sync($imagen->id);//enlace de tabla imagen con productor
        } 
        return redirect()->route('portadas.index', $portada->id)
        ->with('info','Portada Actualizada con éxito !!');
    }

    public function destroy($id)
    {
        $imagen = Portada::find($id)->delete();

        return back()->with('info', 'Eliminado Correctamente');   
    }


}
