<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class especialidad extends Model
{
    protected $table= 'especialidad';
    public $timestamps =false;
    public $fillable = ['especialidad','estado'];
}
