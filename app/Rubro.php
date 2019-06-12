<?php

namespace Prodesal;

use Illuminate\Database\Eloquent\Model;

class Rubro extends Model
{
	protected $fillable =[
		'id','nombre_rubro'
	];
    public function productos(){
    	return $this->hasMany(Producto::class);
    }
     public function productors(){
    	return $this->hasMany(Productor::class);
    }
}
