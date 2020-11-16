<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Model;
use App\Compte;
class Compte_epargne extends Model
{
    //
     use SoftDeletes;
        protected $dates = ['deleted_at'];
protected $primaryKey = 'id_compte_epargnes';

	
    public function compte(){
    return $this->belongsTo('App\Compte');

    }
}
