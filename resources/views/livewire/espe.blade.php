<div class="justify-content-center">
    <div class="col-6 " style="position: relative; top: 60px">
        <div class="card ">
            <div class="card-header">
                <h5 class="card-title">Tipo de Especialidad</h5>
            </div>
            <div class="card-body">
                   @if($InsertOrUpdate) 
                   <form action="" wire:submit.prevent="guardar">
                    <div class="mb-3">
                        <label class="form-label">Especialidad</label>
                        <input type="text" class="form-control" placeholder="" wire:model="especi">
                        @error('especi') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <br>
                    <div>
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
                        <label class="form-label">Especialidad</label>
                        <input type="text" class="form-control" placeholder="" wire:model="especi">
                        @error('especi') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <br>
                    <div>
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
    <div class="row justify-content-center" style="position: relative; top: 30px">
        <div class="col-12" >
        <div class="card">
            <div class="card-body">
     
                <table id="datatables-reponsive" class="table table-striped" style="width:75%" >
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Especialidad</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($s as $item)
                        <tr>
                            <td>
                               {{$item->id}}
                            </td>
                            <td>
                                {{$item->especialidad}}
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
        </div>
        {{ $s->links() }}
    </div>
    