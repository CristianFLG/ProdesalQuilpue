<?php

namespace Prodesal;

use Illuminate\Database\Eloquent\Model;

class Capitalcultural extends Model
{
   	protected $fillable =[
 'nombre_capital'];

    public function productor(){
    	return $this->hasMany(Productor::class);
    }
}
