<?php

namespace Prodesal\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Prodesal\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Prodesal\Http\Requests\ProductorStoreRequest;
use Illuminate\Support\Facades\File;
use Prodesal\Productor;
use Prodesal\Producto;
use Prodesal\Experiencia;
use Prodesal\Imagen;
use Prodesal\Capitalcultural;
use Prodesal\Asociacion;
use Prodesal\Rubro;

class ProductoresController extends Controller
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
        $productores = Productor::orderBy('id', 'DESC')->paginate();
        return view('admin.productores.index')->
        with('productores',$productores);
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $buscar = Productor::where('nombre','like','%'.$search.'%')->paginate();
        return view('admin.productores.index')->
        with('productores',$buscar);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $capital = Capitalcultural::orderBy('id')->pluck('nombre_capital','id');
        $rubro = Rubro::orderBy('id')->pluck('nombre_rubro','id');
        $asociaciones = Asociacion::orderBy('id')->pluck('nombre','id');
        return view('admin.productores.create', compact('capital','asociaciones','rubro'));    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductorStoreRequest $request)
    {
        $productores = Productor::create($request->all()); 
        $productores->asociaciones()->attach($request->get('asociacion_id'));   
        //imagen
        if($request->file('image'))
        {
            $path = Storage::disk('public')->put('image',  $request->file('image'));
            $imagen = new Imagen;
            $imagen->fill(['url_img' => asset($path)])->save();
            $productores->imagen()->attach($imagen->id);//enlace de tabla imagen con productor
        }
        return redirect()->route('productores.index', $productores->id)
        ->with('info','Productor Creado con éxito !!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $productor = Productor::find($id);
        $capital = Capitalcultural::where('id',$productor->id_capitalcult)->first();
        return view('admin.productores.show', compact('productor','capital'));    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $productor = Productor::find($id);
        $capital = Capitalcultural::orderBy('id')->pluck('nombre_capital','id');
        $asociaciones = Asociacion::orderBy('id')->pluck('nombre','id');
        $rubro = Rubro::orderBy('id')->pluck('nombre_rubro','id');
        $defaultcap = Asociacion::with('productores'); 

        return view('admin.productores.edit', compact('productor','capital','asociaciones','rubro'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(ProductorStoreRequest $request, $id)
    {
        $productor = Productor::find($id);
        $productor->fill($request->all())->save();
        //imagen
        $productor->asociaciones()->sync($request->get('asociacion_id')); 
 
        if($request->file('image'))
        {
            foreach ($productor->imagen as $img) 
            {
                $path = parse_url($img->url_img);
                unlink(public_path($path['path']));
                $imagen = Imagen::find($img->id)->delete();
            }
            $path = Storage::disk('public')->put('image',  $request->file('image'));
            $imagen = new Imagen;
            $imagen->fill(['url_img' => asset($path)])->save();
            $productor->imagen()->sync($imagen->id);
        }
        return redirect()->route('productores.index', $productor->id)
        ->with('info','Productor Actualizado con éxito !!');    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   

        $productor = Productor::find($id);
        //productos
        foreach ($productor->productos as $prod) 
        {
            $product = Producto::find($prod->id);
            foreach ($product->imagens as $img) 
            {   
                $path = parse_url($img->url_img);
                if(is_file(public_path($path['path'])))
                {
                    unlink(public_path($path['path']));
                    $imagen = Imagen::find($img->id)->delete();    
                }                 
            }
           $product = Producto::find($prod->id)->delete();
        }

        //Experiencias
        
        foreach ($productor->experiencias as $exp) 
        {
            $experienc = Experiencia::find($exp->id);
            foreach ($experienc->imagenes as $img) 
            {
                $path = parse_url($img->url_img);
                if(is_file(public_path($path['path'])))
                {
                    unlink(public_path($path['path']));
                    $imagen = Imagen::find($img->id)->delete();    
                } 
            }
            $experienc = Experiencia::find($exp->id)->delete();
        } 

        //Imagen de productor
        foreach ($productor->imagen as $img) 
        {
                $path = parse_url($img->url_img);
                unlink(public_path($path['path']));
                $imagen = Imagen::find($img->id)->delete();
        }
            $productor = Productor::find($id)->delete();       
        return back()->with('info', 'Eliminado Correctamente');     
    }
}
