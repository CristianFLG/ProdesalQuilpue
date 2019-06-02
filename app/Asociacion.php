<?php

namespace Prodesal;

use Illuminate\Database\Eloquent\Model;

class Asociacion extends Model
{
    protected $fillable =['nombre'];

    public function productores(){
		return $this->belongsToMany(Productor::class);
	}
}
