<div>

        @include('livewire.vendedores.alerts')

        <div class="row">
            
            @include("livewire.vendedores.$form")

            <div class="col-8">
                <div class="card">
                    <div class="card-header">
                        <h2 align="center" class="card-title">VENDEDORES REGISTRADOS</h2>
                    </div>
                    <div class="card-content collapse show">
                        <div class="m-1">
                            <p>Filtrar por: 
                            <select wire:model="type_filter"> 
                                <option value="name">nombre</option>
                                <option value="documento">documento</option>
                                <option value="email">correo</option>
                                <option value="direccion">dirección</option>
                            </select>
                            <input type="text" wire:model="search"></p>
                        </div>
                        <div class="table-responsive">
                        <table class="table mb-0">
                            <thead>
                            <tr>
                                <th style="width:20%;">Nombre</th>
                                <th style="width:20%;">Documento</th>
                                <th style="width:20%;">Correo</th>
                                <th style="width:20%;">Dirección</th>
                                <th style="width:20%;">&nbsp;</th>
                            </tr>
                            </thead>
                            <tbody>
                                @forelse($vendedores as $vendedor)
                                    <tr>
                                        <td>{{ $vendedor->name }}</td>
                                        @if($vendedor->documento == null)
                                            <td style="color:red;">Sin información</td>
                                        @else
                                            <td>{{ $vendedor->documento }}</td>
                                        @endif
                                        <td>{{ $vendedor->email }}</td>
                                        @if($vendedor->direccion == null)
                                            <td style="color:red;">Sin información</td>
                                        @else
                                            <td>{{ $vendedor->direccion }}</td>
                                        @endif
                                        <td  align="center">
                                            
                                            <button wire:click="edit({{ $vendedor->id }})" class="btn btn-success" title="Editar vendedor"><i class="icon-note"></i></button>
                                                
                                            <buttom data-toggle="modal" data-target="#delete-modal-{{ $vendedor->id }}" class="btn btn-danger" title="Eliminar vendedor"><i class="icon-close"></i></buttom>
                                            
                                        </td>
                                    </tr>

                                    @include("livewire.vendedores.delete")

                                @empty
                                    <td align="center" colspan="5">Sin resultados</td>
                                @endforelse
                            </tbody>
                        </table>
                        </div>
                        {{ $vendedores->links() }}
                    </div>
                </div>
            </div>
        </div>

</div>
