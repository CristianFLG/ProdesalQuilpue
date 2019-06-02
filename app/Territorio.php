<?php

namespace Prodesal;

use Illuminate\Database\Eloquent\Model;

class Territorio extends Model
{
	protected $fillable =[
    'productor_id','coordenadas','alcantarillado','superficie','estanque','pradera','colmenar'];

    public function productor()
    {
		return $this->belongsTo(Productor::class);
	}
	 public function imagens(){
    	return $this->belongsToMany(Imagen::class);
    }
}
