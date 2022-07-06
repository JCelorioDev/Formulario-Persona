<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tipo extends Model
{
    protected $table= 'tipos';
    public $timestamps =false;
    public $fillable = ['tipo','estado'];
}
