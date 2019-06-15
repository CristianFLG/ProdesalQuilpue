<?php

namespace Prodesal\Http\Controllers\admin;

use Illuminate\Http\Request;
use Prodesal\Http\Controllers\Controller;

use Prodesal\Imagen;

class ImagenesController extends Controller
{
	   public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
    	$imagenes = Imagen::orderBy('id','ASC')->paginate();
    return view('admin.imagenes.index',compact('imagenes'));
	}

	public function update($id)
	{
		$imagen = Imagen::find($id);
		
		if($imagen->estado_img == 'ACTIVA')
		{
			$imagen->fill(['estado_img' => 'INACTIVA'])->save();
		}
		elseif ($imagen->estado_img == 'INACTIVA') {
			$imagen->fill(['estado_img' => 'ACTIVA'])->save();
		}
			
		return  redirect()->route('imagenes.index');
	}
}
