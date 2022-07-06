<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\tipo;

class Usuario extends Component
{
    public $tipos,$_id;
    public function render()
    {
        $t=tipo::where('estado',1)->get();
        return view('livewire.usuario', compact('t'));
    }
     
    public function guardar(){
      tipo::create([
        'tipo' => $this->tipos,
        'estado'=>1,
    ]);
    $this->reset();
    }

    public function edit($id){
        $tipos= tipo::find($id);
        $this->_id = $id;
        $this->tipos=$tipos->tipo;//mostrar el dato al realizar la busqueda primero ubicamos el nombre del cuadro de texto luego la variable y por ultimo el nombre de la columna
    }

    public function update(){
        $tipos =tipo::find( $this->_id);
        $tipos->update([
            'tipo' => $this->tipos
        ]);
        $this->reset();
    }

    public function destroyL($id){
        
        $tipos = tipo::find($id);
        $tipos->update([
            'estado' => 0
        ]);
        $this->reset();
    }
}
