<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DatosPersona extends Model
{
    protected $table= 'datospersona';
    public $timestamps =false;
     public $fillable = ['nom','ape','CI','dir','telf','estado','id_tipo','id_especialidad'];
}
