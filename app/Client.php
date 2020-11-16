<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Compte;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{  protected $primaryKey = 'id_client';

   use SoftDeletes;
        protected $dates = ['deleted_at'];





    public function compte(){
    	return $this->hasOne('App\Compte');
    }
    }
