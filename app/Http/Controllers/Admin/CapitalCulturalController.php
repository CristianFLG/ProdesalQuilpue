<?php

namespace Prodesal\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Prodesal\Http\Controllers\Controller;
use Prodesal\Http\Requests\CapitalculturalSoreRequest;

use Prodesal\Capitalcultural;



class CapitalCulturalController extends Controller
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
        $cultural = Capitalcultural::orderBy('id', 'DESC')->paginate();
        return view('admin.capitalcultural.index',compact('cultural'));    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.capitalcultural.create');    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CapitalculturalSoreRequest $request)
    {
        $cultural = Capitalcultural::create($request->all());    

        return redirect()->route('capitalcultural.edit', $cultural->id)
        ->with('info','Capital Cultural Creado con éxito !!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cultural = Capitalcultural::find($id);    
        return view('admin.capitalcultural.edit', compact('cultural'));    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CapitalculturalSoreRequest $request, $id)
    {
        $cultural = Capitalcultural::find($id);
        $cultural->fill($request->all())->save();

        return redirect()->route('capitalcultural.edit', $cultural->id)
        ->with('info','Capital Cultural Actualizado con éxito !!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cultural = Capitalcultural::find($id)->delete();
        return back()->with('info', 'Eliminado Correctamente');    
    }
}
