<?php

namespace Prodesal;

use Illuminate\Database\Eloquent\Model;

class Portada extends Model
{
	protected $fillable =[
		'id','estado'
	];

	   public function imagens(){
    	return $this->belongsToMany(Imagen::class);
    }
}
