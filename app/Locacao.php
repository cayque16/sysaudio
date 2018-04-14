<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Locacao extends Model
{
    protected $fillable = ['idUser','idRecurso','horario','data','turno'];

    public function user() {
     return $this->belongsTo('App\User', 'idUser');
   }
    public function recurso(){
      return $this->belongsTo('App\Recurso', 'idRecurso');
    }
}
