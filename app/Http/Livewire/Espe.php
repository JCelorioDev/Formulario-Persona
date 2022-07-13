<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\especialidad;
use Livewire\WithPagination;

class Espe extends Component
{
    public $especi,$_id,$InsertOrUpdate=true;
    protected $paginationTheme = 'bootstrap';
    use WithPagination;
    public function render()
    {
        
        $s=especialidad::where('estado',1)->paginate(3);
        return view('livewire.espe', compact('s'));
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    protected $rules = [
        'especi' => 'required|min:3',
    ];

    protected $messages = [
        'especi.required' => 'El Campo es Requerido',
        'especi.min' => 'El Campo es de 3 Caracteres Minimo',
    ];
     
    public function guardar(){
        $this->validate();
        especialidad::create([
            'especialidad' => $this->especi,
            'estado'=>1,
        ]);
        $this->reset();
        session()->flash('message', 'Guardado Correctamente.');
    }

    public function edit($id){
        $especi= especialidad::find($id);
        $this->_id = $id;
        $this->especi=$especi->especialidad;//mostrar el dato al realizar la busqueda primero ubicamos el nombre del cuadro de texto luego la variable y por ultimo el nombre de la columna
        $this->InsertOrUpdate = false;
    }

    public function update(){
        $this->validate();
        $especi =especialidad::find( $this->_id);
        $especi->update([
            'especialidad' => $this->especi
        ]);
        $this->reset();
        session()->flash('message', 'Actualizado Correctamente.');
    }

    public function destroyL($id){
        
        $especi = especialidad::find($id);
        $especi->update([
            'estado' => 0
        ]);
        $this->reset();
    }
}
