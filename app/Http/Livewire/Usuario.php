<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\tipo;
use Livewire\WithPagination;

class Usuario extends Component
{
    public $tipos,$_id,$InsertOrUpdate=true;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        $t=tipo::where('estado',1)->paginate(3);
        return view('livewire.usuario', compact('t'));
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    protected $messages = [
        'tipos.required' => 'El Campo es Requerido',
        'tipos.min' => 'El Campo es de 3 Caracteres Minimo',
    ];

    protected $rules = [
        'tipos' => 'required|min:3',
    ];
     
    public function guardar(){
      $this->validate();
      tipo::create([
        'tipo' => $this->tipos,
        'estado'=>1,
    ]);
      $this->reset();
      session()->flash('message', 'Guardado Correctamente.');
    }

    public function edit($id){
        $tipos= tipo::find($id);
        $this->_id = $id;
        $this->tipos=$tipos->tipo;//mostrar el dato al realizar la busqueda primero ubicamos el nombre del cuadro de texto luego la variable y por ultimo el nombre de la columna
        $this->InsertOrUpdate=false;
    }

    public function update(){
        $this->validate();
        $tipos =tipo::find( $this->_id);
        $tipos->update([
            'tipo' => $this->tipos
        ]);
        $this->reset();
        session()->flash('message', 'Actualizado Correctamente.');
    }

    public function destroyL($id){
        
        $tipos = tipo::find($id);
        $tipos->update([
            'estado' => 0
        ]);
        $this->reset();
    }
}
