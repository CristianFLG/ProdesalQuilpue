<?php

namespace Prodesal;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
	protected $fillable =[
		'id','titulo','ubicacion','fecha_ini','fecha_ter','informacion','lat','lon'
	];

	   public function imagens(){
    	return $this->belongsToMany(Imagen::class);
    }
}