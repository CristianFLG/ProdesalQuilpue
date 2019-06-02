<?php

namespace Prodesal;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
	protected $fillable =[
		'id','id_rubro','nombre_producto','derivado','stock','medida','precio'
	];

	public function productors(){
		return $this->belongsToMany(Productor::class);
	}
	public function rubros(){
		return $this->belongsTo(Rubro::class);
	}
	 public function imagens(){
    	return $this->belongsToMany(Imagen::class);
    }
}
