<?php

namespace Prodesal\Http\Controllers\web;

use Illuminate\Http\Request;
use Prodesal\Http\Controllers\Controller;
use Prodesal\Portada;
use Prodesal\Productor;
use Prodesal\Producto;
use Prodesal\Experiencia;
use Prodesal\Rubro;
use Prodesal\Evento;
use JavaScript;


class PageController extends Controller
{
	
	public function index()
	{
		$portadas = Portada::with('imagens')->paginate(8);
		$productores = Productor::with('imagen')->paginate(3);
		$rubros = Rubro::get();
		$productos = Producto::with('imagens','productors')->paginate(3);
		$experiencias = Experiencia::with('imagenes','productores')->paginate(3);
		//JAVA solo javascript
		$product = Productor::with('imagen')->paginate();
		JavaScript::put([
			'productor' => null,
			'productores' => $product,
			'rubros' => $rubros
		]);
		return view('layouts.boostrap',compact('productores','portadas','productos','experiencias','rubros'));
	}

	public function personas($id)
	{
		$productor = Productor::with('imagen','productos','experiencias')->find($id);
		$productores = Productor::with('imagen')->paginate();
		$rubros = Rubro::get();
		JavaScript::put([
			'productor' =>$productor,
			'productores' => $productores,
			'rubros' => $rubros
		]);
		return view('web.personas',compact('productor','rubros'));
	}
	
	public function detalle($id)
	{
		$productos = Producto::with('imagens','productors')->find($id);

		$producto_rubro = Producto::with('imagens')->
		where('id_rubro',$productos->id_rubro)->get();
		
		return view('web.productos',compact('productos','producto_rubro'));
	}

	public function experiencia($id)
	{	
		$experiencias = Experiencia::with('productores','imagenes')->find($id);
		$experiencia = Experiencia::with('imagenes','productores')->paginate(8);

		
		return view('web.experiencias',compact('experiencias','experiencia'));
	}
//Buscar de todos los productores
	    public function searchProductors(Request $request)
    {
        $search = $request->get('search');
        $productores = Productor::where('id_rubro','like','%'.$search.'%')->with('imagen')->paginate();
		$rubros = Rubro::get();
		$listarubro = Rubro::orderBy('nombre_rubro','ASC')->pluck('nombre_rubro', 'id');
		JavaScript::put(
		[
			'productor' => null,
			'productores' => $productores,
			'rubros' => $rubros
		]);
        return view('web.todoproductores',compact('productores','rubros','listarubro'));
    }
//Todos los productores
	public function productores()
	{
		$productores = Productor::with('imagen')->paginate(8);
		$rubros = Rubro::get();
		$listarubro = Rubro::orderBy('nombre_rubro','ASC')->pluck('nombre_rubro', 'id');

		JavaScript::put([
			'productor' => null,
			'productores' => $productores,
			'rubros' => $rubros
		]);

		return view('web.todoproductores',compact('productores','listarubro','rubros'));
	}


  public function searchExperiencias(Request $request)
    {
    	$experiencias = Experiencia::where('nombre_exper','like','%'.$search.'%')->paginate();
       return view('web.todoexperiencias',compact('experiencias'));
    }

	public function experiencias()
	{
		$experiencias = Experiencia::with('imagenes')->paginate(8);
		return view('web.todoexperiencias',compact('experiencias'));
	}
	//Buscar de todos los productores
	    public function searchProductos(Request $request)
    {
        $search = $request->get('search');
        $productos = Producto::where('nombre_producto','like','%'.$search.'%')->paginate();
        dd($productos);
        return view('web.todoproductos',compact('productos'));
    }
	public function productos()
	{
		$productos = Producto::with('imagens','productors')->paginate(8);

		return view('web.todoproductos',compact('productos'));
	}
	
	public function eventos()
	{
		$eventos = Evento::with('imagens')->paginate(2);
		JavaScript::put([
			'productor' => null,
			'productores' => null,
			'eventos' => $eventos
		]);
		return view('web.eventos',compact('eventos'));
	}
	public function prueba()
	{
		return view('web.prueba');
	}
}
