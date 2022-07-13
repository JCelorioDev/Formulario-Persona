<div class="justify-content-center">
    <div class="col-6 " style="position: relative; top: 50px" >
        <div class="card ">
            <div class="card-header">
                <h5 class="card-title">Tipo de Usuario</h5>
            </div>
            <div class="card-body">  
                   @if($InsertOrUpdate)    
                   <form action="" wire:submit.prevent="guardar">
                        <div class="mb-3">
                            <label class="form-label">Ingrese su Tipo</label>
                            <input type="text" class="form-control" placeholder="" wire:model="tipos">
                            @error('tipos') <span class="error">{{ $message }}</span> @enderror
                            <br>
                            @if (session()->has('message'))
                            <div class="alert alert-success">
                                {{ session('message') }}
                            </div>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                   </form>   
                   @else
                   <form action="" wire:submit.prevent="update">
                        <div class="mb-3">
                            <label class="form-label">Ingrese su Tipo</label>
                            <input type="text" class="form-control" placeholder="" wire:model="tipos">
                            @error('tipos') <span class="error">{{ $message }}</span> @enderror
                        <br>
                            @if (session()->has('message'))
                            <div class="alert alert-success">
                                    {{ session('message') }}
                            </div>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-primary">Actualizar</button>  
                   </form>  
                   @endif    
        </div>
    </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-12" style="position: relative; top: 30px">
        <div class="card">
            <div class="card-body">
     
                <table id="datatables-reponsive" class="table table-striped" style="width:75%" >
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Rol</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($t as $item)
                        <tr>
                            <td>
                               {{$item->id}}
                            </td>
                            <td>
                                {{$item->tipo}}
                            </td>
                            <td class="table-action">
                                
                                <a ><i class="align-middle fas fa-fw fa-pen" wire:click="edit({{ $item->id }})" style="cursor: pointer "></i></i></a>
                                <a ><i class="align-middle fas fa-fw fa-trash " wire:click="destroyL({{$item->id}})" style="cursor: pointer "></i></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
    
            </div>
        </div>
        </div>
        {{ $t->links() }}
        </div>
    </div>