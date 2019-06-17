<?php

namespace Prodesal\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Prodesal\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Prodesal\Http\Requests\EventoStoreRequest;
use Prodesal\Imagen;
use Prodesal\Evento;

class EventosController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
    //inicio
    public function index()
    {
    	$eventos = Evento::with('imagens')->paginate(6);
    	return view('admin.eventos.index',compact('eventos'));
    }

    //Crear evento
        public function create()
    {
        return view('admin.eventos.create');     
    }

    //subir evento
      public function store(EventoStoreRequest $request)
    {
        $eventos = Evento::create($request->all()); 
        //imagen
        if($request->file('image'))
        {
            $path = Storage::disk('public')->put('image',  $request->file('image'));
            $imagen = new Imagen;
            $imagen->fill(['url_img' => asset($path)])->save();
            $eventos->imagens()->attach($imagen->id);//enlace de tabla imagen con productor
        }
        return redirect()->route('eventos.index', $eventos->id)
        ->with('info','Evento Creada con éxito !!');
	}

	 public function show($id)
    {
        $evento = Evento::find($id);    
        return view('Admin.eventos.show', compact('evento'));
    }

    public function edit($id)
    {
        $evento = Evento::find($id);   
        return view('Admin.eventos.edit', compact('evento'));
    }



    public function update(Request $request, $id)
    {
        $evento = Evento::find($id);
        $evento->fill($request->all())->save();
        //imagen
          if($request->file('image'))
        {
            $path = Storage::disk('public')->put('image',  $request->file('image'));
            $imagen = new Imagen;
            $imagen->fill(['url_img' => asset($path)])->save();
            $evento->imagens()->sync($imagen->id);//enlace de tabla imagen con productor
        } 
        return redirect()->route('eventos.index', $evento->id)
        ->with('info','Evento Actualizado con éxito !!');
    }

    public function destroy($id)
    {
        $evento = Evento::find($id)->delete();

        return back()->with('info', 'Eliminado Correctamente');   
    }
}
