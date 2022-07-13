<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\DatosPersona;
use App\Models\tipo;
use App\Models\especialidad;
use Livewire\WithPagination;

class Persona extends Component
{
    public $persona,$_id;
    public $nom,$ape,$CI, $dir,$telf,$id_tipo, $id_especialidad,$buscar,$InsertOrUpdate=true;
    protected $queryString = ['buscar'];
    protected $paginationTheme = 'bootstrap';
    use WithPagination;
    public function render()
    {
        $s=especialidad::where('estado',1)->get();
        $t=tipo::where('estado',1)->get();
        $p=DatosPersona::where( 'nom', 'like', '%'.$this->buscar.'%')-> where('estado',1)->paginate(3);
        return view('livewire.persona', compact('p','t','s')/* compact('t')*/ );
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    protected $rules = [
        'nom' => 'required|min:3',
        'ape' => 'required|min:3',
        'dir' => 'required|min:3',
        'telf' => 'required|min:10|max:10',
        'CI' => 'required|min:10|max:10',
    ];

    protected $messages = [
        'nom.required' => 'El Campo es Requerido',
        'nom.min' => 'El Campo es de 3 Caracteres Minimo',
        'ape.required' => 'El Campo es Requerido',
        'ape.min' => 'El Campo es de 3 Caracteres Minimo',
        'dir.required' => 'El Campo es Requerido',
        'dir.min' => 'El Campo es de 3 Caracteres Minimo',
        'telf.required' => 'El Campo es Requerido',
        'telf.min' => 'El Campo es de 10 Digitos',
        'telf.max' => 'Sobrepasaste el Máximo de 10 Digitos',
        'CI.required' => 'El Campo es Requerido',
        'CI.min' => 'El Campo es de 10 Digitos',
        'CI.max' => 'Sobrepasaste el Máximo de 10 Digitos',
    ];
     
    public function guardar(){
        $this->validate();
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
        session()->flash('message', 'Guardado Correctamente.');
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
        $this->InsertOrUpdate = false;
    }

    public function update(){
        $this->validate();
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
        session()->flash('message', 'Actualizado Correctamente.');
    }

    public function destroyL($id){
        
        $persona = DatosPersona::find($id);
        $persona->update([
            'estado' => 0
        ]);
        $this->reset();
    }
    
}
