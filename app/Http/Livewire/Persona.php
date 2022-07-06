<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\DatosPersona;
use App\Models\tipo;
use App\Models\especialidad;

class Persona extends Component
{
    public $persona,$_id;
    public $nom,$ape,$CI, $dir,$telf,$id_tipo, $id_especialidad;
    public function render()
    {
        $s=especialidad::where('estado',1)->get();
        $t=tipo::where('estado',1)->get();
        $p=DatosPersona::where('estado',1)->get();
        return view('livewire.persona', compact('p','t','s')/* compact('t')*/ );
    }
     
    public function guardar(){
        DatosPersona ::create([
            'nom' => $this->nom,
            'ape' => $this->ape,
            'CI' => $this->CI,
            'dir' => $this->dir,
            'telf' => $this->telf,
            'estado' => 1,
            'id_tipo' => $this->id_tipo,
            'id_especialidad' => $this->id_especialidad,
            
        ]);
        $this->reset();
    }

    public function edit($id){
        $persona= DatosPersona::find($id);
        $this->_id = $id;
        $this->nom=$persona->nom;
        $this->ape=$persona->ape;
        $this->CI=$persona->CI;
        $this->dir=$persona->dir;
        $this->telf=$persona->telf;
        $this->id_tipo=$persona->id_tipo;
        $this->id_especialidad=$persona->id_especialidad;
    }

    public function update(){
        $persona =DatosPersona::find( $this->_id);
        $persona->update([
            'nom' => $this->nom,
            'ape' => $this->ape,
            'CI' => $this->CI,
            'dir' => $this->dir,
            'telf' => $this->telf,
            'estado' => 1,
            'id_tipo' => $this->id_tipo,
            'id_especialidad' => $this->id_especialidad,
        ]);
        $this->reset();
    }

    public function destroyL($id){
        
        $persona = DatosPersona::find($id);
        $persona->update([
            'estado' => 0
        ]);
        $this->reset();
    }
}
