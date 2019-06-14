<?php

use Illuminate\Support\Facades\Input;
Route::redirect('/', 'index');


Auth::routes();
//WEB PRINCIPAL
Route::get('/index', 'Web\PageController@index')->name('index');
Route::get('/personas/{id}','Web\PageController@personas')->name('personas');
Route::get('/producto/{id}/detalle','Web\PageController@detalle')->name('detalle');
Route::get('/experiencia/{id}/detalle','Web\PageController@experiencia')
->name('detallexper');


//BARRA DE INICIO
Route::get('/productos_todos','Web\PageController@productos')
->name('productos_todos');
Route::get('/productores_todos','Web\PageController@productores')
->name('productores_todos');
Route::get('/experiencias_todos','Web\PageController@experiencias')
->name('experiencias_todos');

//BUSCARDOR Administrador
Route::get('/search', 'Admin\ProductoresController@search')->name('search');
Route::get('/searchProducto', 'Admin\ProductosController@searchProducto')->name('searchProducto');
Route::get('/searchExperiencia', 'Admin\ExperienciasController@searchExperiencia')->name('searchExperiencia');



//ADMINISTRADOR
Route::get('/experiencia/{id}','Admin\ExperienciasController@create')->name('experiencia');
Route::get('/producto/{id}','Admin\ProductosController@create')->name('producto');
//crop

//admin index
Route::get('/admin', function(){
	return view('admin.index_admin');
});
//controladores administrador
Route::resource('rubros', 			'Admin\RubrosController');
Route::resource('productos', 		'Admin\ProductosController');
Route::resource('productores', 		'Admin\ProductoresController');
Route::resource('experiencias', 	'Admin\ExperienciasController');
Route::resource('portadas', 		'Admin\PortadaController');
Route::resource('capitalcultural', 	'Admin\CapitalCulturalController');
Route::resource('territorios', 		'Admin\TerritoriosController');
Route::resource('asociaciones', 	'Admin\AsociacionController');


/*Route::get('imageform', function()
{
    return View('imageform');
});
Route::post('imageform', function()
{
    $rules = array(
        'image' => 'required|mimes:jpeg,jpg|max:10000'
    );

    $validation = Validator::make(Input::all(), $rules);

    if ($validation->fails())
    {
        return Redirect::to('imageform')->withErrors($validation);
    }
    else
    {
        $file = Input::file('image');
        $file_name = $file->getClientOriginalName();
        if ($file->move('images', $file_name))
        {
            return Redirect::to('jcrop')->with('image',$file_name);
        }
        else
        {
            return "Error uploading file";
        }
    }
});

Route::get('jcrop', function()
{
    return View::make('jcrop')->with('image', 'images/'. Session::get('image'));
});


Route::post('jcrop', function()
{
    $quality = 90;

    $src  = Input::get('image');
    $img  = imagecreatefromjpeg($src);
    $dest = ImageCreateTrueColor(Input::get('w'),
        Input::get('h'));

    imagecopyresampled($dest, $img, 0, 0, Input::get('x'),
        Input::get('y'), Input::get('w'), Input::get('h'),
        Input::get('w'), Input::get('h'));
    imagejpeg($dest, $src, $quality);
    dd($src);
    return "<img src='" . $src . "'>";
});
//-___--

*/