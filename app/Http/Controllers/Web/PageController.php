<?php

namespace Prodesal\Http\Controllers\web;

use Illuminate\Http\Request;
use Prodesal\Http\Controllers\Controller;
use Prodesal\Portada;
use Prodesal\Productor;
use Prodesal\Producto;
use Prodesal\Experiencia;

class PageController extends Controller
{
	
	public function index()
	{
		$portadas = Portada::with('imagens')->paginate(8);
		$productores = Productor::with('imagen')->paginate(3);
		$productos = Producto::with('imagens','productors')->paginate();
		$experiencias = Experiencia::with('imagenes','productores')->paginate(8);
			return view('layouts.boostrap',compact('productores','portadas','productos','experiencias'));
	}

	public function personas($id)
	{
		$productor = Productor::with('imagen','productos','experiencias')->find($id);
		return view('web.personas',compact('productor'));
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
		
		return view('web.experiencias',compact('experiencias'));
	}

	public function productores()
	{
		$productores = Productor::with('imagen')->paginate(8);

		return view('web.todoproductores',compact('productores'));
	}

	public function experiencias()
	{
		$experiencias = Experiencia::with('imagenes')->paginate(8);
		return view('web.todoexperiencias',compact('experiencias'));
	}

	public function productos()
	{
		$productos = Producto::with('imagens','productors')->paginate(8);

		return view('web.todoproductos',compact('productos'));
	}
}
