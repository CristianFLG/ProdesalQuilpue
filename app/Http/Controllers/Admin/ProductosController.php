<?php

namespace Prodesal\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Prodesal\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Prodesal\Http\Requests\ProductoStoreRequest;
use Prodesal\Http\Requests\ProductoUpdateRequest;
use Prodesal\Producto;
use Prodesal\Rubro;
use Prodesal\Productor;
use Prodesal\Imagen;


class ProductosController extends Controller
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
        $productos = Producto::orderBy('id', 'DESC')->paginate();
        $rubros = Rubro::orderBy('nombre_rubro','ASC')->pluck('nombre_rubro', 'id');

        return view('admin.productos.index' , compact('productos','rubros'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $rubros = Rubro::orderBy('nombre_rubro','ASC')->pluck('nombre_rubro', 'id');
        $productores = Productor::find($id);

        return view('admin.productos.create', compact('rubros','productores'));     
    }

    public function searchProducto(Request $request)
    {
        $search = $request->get('search');
        $productos = Producto::where('id_rubro','like','%'.$search.'%')->paginate();
        $rubros = Rubro::orderBy('nombre_rubro','ASC')->pluck('nombre_rubro', 'id');

        return view('admin.productos.index', compact('productos','rubros'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductoStoreRequest $request)
    {
        $productos = Producto::create($request->all());   
        $productos->productors()->attach($request->get('id_productor'));
        //imagen
        if($request->file('image'))
        {
            foreach($request->file('image') as $file)
            {
                $path = Storage::disk('public')->put('image', $file);
                $imagen = new Imagen;
                $imagen->fill(['url_img' => asset($path)])->save();
                $productos->imagens()->attach($imagen->id);
            }
        }
        return redirect()->route('productores.show', $request->id_productor)
        ->with('info','Producto Creado con éxito !!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $producto = Producto::find($id);  
        $rubro = Rubro::where('id',$producto->id_rubro)->first();
     
        return view('admin.productos.show', compact('producto','rubro'));      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rubros = Rubro::orderBy('nombre_rubro','ASC')->pluck('nombre_rubro', 'id');
        $producto = Producto::find($id);
        $productores = $this->NameProdcutor($id);

        return view('admin.productos.edit', compact('producto', 'rubros','productores'));
    }



   public function NameProdcutor($id)//funcion para sacar el id del nombre, para el default del
    {
        $productos = Producto::find($id);
        foreach($productos->productors as $tabla){
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
    public function update(ProductoUpdateRequest $request, $id)
    {
        $producto = Producto::find($id);
        $producto->fill($request->all())->save();
        $producto->productors()->sync($request->get('id_productor'));
        //imagen
         if($request->file('image'))
        {
            foreach ($producto->imagens as $img) 
            {
                $path = parse_url($img->url_img);
                unlink(public_path($path['path']));
                Imagen::find($img->id)->delete();
            }
            foreach($request->file('image') as $file)
            {
                $path = Storage::disk('public')->put('image', $file);
                $imagen = new Imagen;
                $imagen->fill(['url_img' => asset($path)])->save();
                //imagen-experiencia
                $producto->imagens()->attach($imagen->id);
            }
        }

        return redirect()->route('productores.show', $request->id_productor)
        ->with('info','Producto Actualizado con éxito !!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $producto = Producto::find($id);
        foreach ($producto->imagens as $img) 
        {
            $path = parse_url($img->url_img);
            unlink(public_path($path['path']));
            Imagen::find($img->id)->delete();
        }
        $producto = Producto::find($id)->delete();
        return redirect()->route('productos.index')->with('info','Evento eliminado con éxito !!'); 
    }
}
