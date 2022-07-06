<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\especialidad;
class Espe extends Component
{
    public $especi,$_id;
    public function render()
    {
        $s=especialidad::where('estado',1)->get();
        return view('livewire.espe', compact('s'));
    }
     
    public function guardar(){
        especialidad::create([
            'especialidad' => $this->especi,
            'estado'=>1,
        ]);
        $this->reset();
    }

    public function edit($id){
        $especi= especialidad::find($id);
        $this->_id = $id;
        $this->especi=$especi->especialidad;//mostrar el dato al realizar la busqueda primero ubicamos el nombre del cuadro de texto luego la variable y por ultimo el nombre de la columna
    }

    public function update(){
        $especi =especialidad::find( $this->_id);
        $especi->update([
            'especialidad' => $this->especi
        ]);
        $this->reset();
    }

    public function destroyL($id){
        
        $especi = especialidad::find($id);
        $especi->update([
            'estado' => 0
        ]);
        $this->reset();
    }
}
