<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModerarRequisicoes extends Model
{
    protected $table = 'moderar_requisicoes';
   protected $primaryKey = 'id_moderar_requisicoes';
   public $timestamps = false;


   /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
   protected $fillable = [
      'data','descricao','id_requisicoes_requisicoes','id_requisicoes_status_requisicoes'
   ];

   /**
    * The attributes that should be hidden for arrays.
    *
    * @var array
    */
   protected $hidden = [ ];
<<<<<<< HEAD
=======

    public function status_requisicoes(){
        return $this->hasOne('App\StatusRequisicoes', 'id_status_requisicoes', 'id_requisicoes_status_requisicoes');
    }

    public function requisicoes(){
        return $this->hasMany('App\Requisicao', 'id_requisicoes_requisicoes', 'id_requisicoes_status_requisicoes');
    }

>>>>>>> eduardo
}
