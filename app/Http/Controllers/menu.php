<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class menu extends Controller
{
    public function showT()
    {
       
       return view('Paginas.tipos');
    }
    public function showE()
    {
       
      return view('Paginas.especialidad');
    }
    public function showP()
    {
       
      return view('Paginas.person');
    }
}
