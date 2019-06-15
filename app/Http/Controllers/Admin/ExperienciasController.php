<?php

namespace Prodesal\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Prodesal\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Prodesal\Http\Requests\ExperienciasStoreRequest;
use Prodesal\Http\Requests\ExperienciasUpdateRequest;
use Prodesal\Experiencia;
use Prodesal\Productor;
use Prodesal\Imagen;


class ExperienciasController extends Controller
{
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
       public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $experiencias = Experiencia::orderBy('id','DESC')->paginate();

        return view('admin.experiencia.index',compact('experiencias'));
    }

    public function searchExperiencia(Request $request)
    {
        $search = $request->get('search');
        $experiencias = Experiencia::where('estado_exper','like','%'.$search.'%')->paginate();
        return view('admin.experiencia.index', compact('experiencias'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
    $nombre_prod = Productor::find($id);
        return view('admin.experiencia.create', compact('nombre_prod'));    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ExperienciasStoreRequest $request)
    {
        $experiencia = Experiencia::create($request->all()); 
        //productores
        $experiencia->productores()->attach($request->get('id_productor'));
        //imagenes
        if($request->file('image')){
            $path = Storage::disk('public')->put('image',  $request->file('image'));
            $imagen = new Imagen;
            $imagen->fill(['url_img' => asset($path)])->save();
            $experiencia->imagenes()->attach($imagen->id);
        }
          
        
        return redirect()->route('productores.show', $request->id_productor)
        ->with('info','Experiencia creada con éxito !!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $experiencia = Experiencia::find($id);
        return view('admin.experiencia.show', compact('experiencia'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $productores = Productor::orderBy('nombre', 'ASC')
        ->pluck('nombre', 'id');
        $experiencia = Experiencia::find($id);
        $nombre_prod = $this->NameProdcutor($id);

        return view('admin.experiencia.edit', 
            compact('experiencia','productores','nombre_prod'));
    }

 
    public function NameProdcutor($id)//funcion para sacar el id del nombre, para el default del
    {
        $experiencia = Experiencia::find($id);

        foreach($experiencia->productores as $tabla)
        {
           $result = $tabla;
        }
        return $result;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response

     */
    public function update(ExperienciasUpdateRequest $request, $id)
    {
        $experiencia = Experiencia::find($id);
        $experiencia->fill($request->all())->save();
        $experiencia->productores()->sync($request->get('id_productor'));
        //imagen
        if($request->file('image'))
        {
            $path = Storage::disk('public')->put('image',  $request->file('image'));
            $imagen = new Imagen;
            $imagen->fill(['url_img' => asset($path)])->save();
            //imagen-experiencia
            $experiencia->imagenes()->sync($imagen->id);
        }
    
        return redirect()->route('productores.show', $request->id_productor)
        ->with('info','Experiencia Actualizada con éxito !!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $experiencia = Experiencia::find($id)->delete();
        return back()->with('info', 'Eliminado Correctamente');
    }
}
