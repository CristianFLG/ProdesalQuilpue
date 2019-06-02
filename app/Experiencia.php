<?php

namespace Prodesal;

use Illuminate\Database\Eloquent\Model;

class Experiencia extends Model
{
	protected $fillable =[
		'id','nombre_exper','precio','estado_exper'
	]; 

    public function productores()
    {
    	return $this->belongsToMany(Productor::class);
    }
    public function imagenes(){
    	return $this->belongsToMany(Imagen::class);
    }

    
}
