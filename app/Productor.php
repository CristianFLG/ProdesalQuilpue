<?php

namespace Prodesal;

use Illuminate\Database\Eloquent\Model;

class Productor extends Model
{
	protected $fillable =[
		'id','id_capitalcult','nombre','rut','telefono','lugar','redes','coordenadas'
	];
	
    public function productos()
    {
    	return $this->belongsToMany(Producto::class);
    }

  public function experiencias()
  	{
		return $this->belongsToMany(Experiencia::class);
	} 
	public function imagen()
	{
		return $this->belongsToMany(Imagen::class);
	}
	public function capitalcult()
	{
		return $this->belongsTo(Capitalcultural::class);
	}
	 public function territorios()
	 {
    	return $this->hasMany(Territorio::class);
    }    
    public function asociaciones(){
		return $this->belongsToMany(Asociacion::class);
	}

	
}
