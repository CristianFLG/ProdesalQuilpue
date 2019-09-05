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

    //--------------------SUBIR EVENTO---------------------------
      public function store(EventoStoreRequest $request)
    {
        $eventos = Evento::create($request->all()); 
        //imagen
        if($request->file('image'))
        {
            foreach($request->file('image') as $file)
            {
                $path = Storage::disk('public')->put('image',  $file);
                $imagen = new Imagen;
                $imagen->fill(['url_img' => asset($path)])->save();
                $eventos->imagens()->attach($imagen->id);//enlace de tabla imagen con productor
            }
        }
        return redirect()->route('eventos.index', $eventos->id)
        ->with('info','Evento Creada con éxito !!');
	}
    //________ver_______
	 public function show($id)
    {
        $evento = Evento::with('imagens')->find($id); 
        return view('admin.eventos.show', compact('evento'));
    }
    //editar
    public function edit($id)
    {
        $evento = Evento::find($id);   
        return view('admin.eventos.edit', compact('evento'));
    }
//-----------------FIN DE SUBIR EVENTO-------------------------------------


    public function update(Request $request, $id)
    {
        $evento = Evento::find($id);
        $evento->fill($request->all())->save();
        //imagen        
          if($request->file('image'))
        {
            foreach ($evento->imagens as $img) 
            {
                $path = parse_url($img->url_img);
                unlink(public_path($path['path']));
                $imagen = Imagen::find($img->id)->delete();
            }
            foreach($request->file('image') as $file)
            {
                $path = Storage::disk('public')->put('image',  $file);
                $imagen = new Imagen;
                $imagen->fill(['url_img' => asset($path)])->save();
                $evento->imagens()->attach($imagen->id);//enlace de tabla imagen con productor
            }
        } 
        return redirect()->route('eventos.index', $evento->id)
        ->with('info','Evento Actualizado con éxito !!');
    }

    public function destroy($id)
    {
        $evento = Evento::find($id);
        foreach ($evento->imagens as $img) 
        {
            $path = parse_url($img->url_img);
            unlink(public_path($path['path']));
            $imagen = Imagen::find($img->id)->delete();
        }

        $evento = Evento::find($id)->delete();

        return redirect()->route('eventos.index')->with('info','Evento eliminado con éxito !!');   
    }
}
