<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Model;
use App\Client;

class Compte extends Model
{
	 use SoftDeletes;
        protected $dates = ['deleted_at'];
protected $primaryKey = 'id_comptes';
public function client(){

	return $this->belongsTo('App\Client');
}
 
public function compte_courant(){

	return $this->hasOne('App\Compte_courant');
}

public function compte_epargne(){
	return $this->hasMany('App\Compte_epargne');
}
}
