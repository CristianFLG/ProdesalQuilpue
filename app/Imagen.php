<?php

namespace Prodesal;

use Illuminate\Database\Eloquent\Model;

class Imagen extends Model
{
	protected $fillable =[
		'id','url_img'
	];
	public function productors(){
		return $this->belongsToMany(Productor::class);
	}
    public function productos(){
    	return $this->belongsToMany(Producto::class);
    }

  public function experiencias(){
		return $this->belongsToMany(Experiencia::class);
	} 
	 public function territorios(){
    	return $this->belongsToMany(Territorio::class);
    }
    public function w(){
    	return $this->belongsToMany(Portada::class);
    }
}
