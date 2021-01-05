<div>

        @include('livewire.clientes.alerts')

        <div class="row">
            
            @include("livewire.clientes.$form")

            <div class="col-8">
                <div class="card">
                    <div class="card-header">
                        <h2 align="center" class="card-title">CLIENTES REGISTRADOS</h2>
                    </div>
                    <div class="card-content collapse show">
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
                                @forelse($clientes as $cliente)
                                    <tr>
                                        <td>{{ $cliente->nombre }}</td>
                                        @if($cliente->documento == null)
                                            <td style="color:red;">Sin información</td>
                                        @else
                                            <td>{{ $cliente->documento }}</td>
                                        @endif
                                        <td>{{ $cliente->correo }}</td>
                                        @if($cliente->direccion == null)
                                            <td style="color:red;">Sin información</td>
                                        @else
                                            <td>{{ $cliente->direccion }}</td>
                                        @endif
                                        <td  align="center">
                                            
                                            <button wire:click="edit({{ $cliente->id }})" class="btn btn-success" title="Editar cliente"><i class="icon-note"></i></button>
                                                
                                            <buttom data-toggle="modal" data-target="#delete-modal-{{ $cliente->id }}" class="btn btn-danger" title="Eliminar cliente"><i class="icon-close"></i></buttom>
                                            
                                        </td>
                                    </tr>

                                    @include("livewire.clientes.delete")

                                @empty
                                    <td align="center" colspan="5">Sin resultados</td>
                                @endforelse
                            </tbody>
                        </table>
                        </div>
                        {{ $clientes->links() }}
                    </div>
                </div>
            </div>
        </div>

</div>
