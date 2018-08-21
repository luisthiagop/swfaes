<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdmGeral extends Model
{
    protected $table = 'adms_gerais';
   protected $primaryKey = 'id_adms_gerais';
   public $timestamps = false;


   /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
   protected $fillable = [
      "data_inicio","data_fim","id_funcionarios_funcionarios"
   ];

   /**
    * The attributes that should be hidden for arrays.
    *
    * @var array
    */
   protected $hidden = [ ];
}
