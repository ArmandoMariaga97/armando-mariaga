<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\ModelClientes;

use Livewire\WithPagination;

class ClientesComponent extends Component
{
    use WithPagination;

    public $id_cliente, $nombre, $correo, $documento, $direccion; 
    public $form  = 'form_created';
    
    public function render()
    {
        $clientes = ModelClientes::orderBy('created_at','DESC')->paginate(4);
        return view('livewire.clientes.clientes-component', ['clientes' => $clientes]);
    }

    public function register(){
        $this->validate([
            'nombre'    => 'required|string',
            'correo'    => 'required|email',
            'documento' => 'required|numeric',
            'direccion' => 'required|string',
        ]);

        $datos = [
            'nombre'      => $this->nombre,
            'correo'     => $this->correo,
            'documento' => $this->documento,
            'direccion' => $this->direccion,
        ];

        ModelClientes::create($datos);

        $this->limpiarcampos();
        session()->flash('register_success', 'ok');
    }

    public function edit($id){

        $this->form  = 'form_edit';
        $this->id_cliente  = $id;

        $cliente = ModelClientes::find($id);

        $this->nombre    = $cliente->nombre;
        $this->correo    = $cliente->correo;
        $this->documento = $cliente->documento;
        $this->direccion = $cliente->direccion;

    }

    public function update(){
        $this->validate([
            'nombre'    => 'required|string',
            'correo'    => 'required|email',
            'documento' => 'required|numeric',
            'direccion' => 'required|string',
        ]);

        $cliente_old = ModelClientes::find($this->id_cliente);
        $cliente_old->nombre = $this->nombre;
        $cliente_old->correo = $this->correo;
        $cliente_old->documento = $this->documento;
        $cliente_old->direccion = $this->direccion;

        $cliente_old->save();

        $this->limpiarcampos();
        session()->flash('update-success', 'ok');
    }

    public function destroy($id){
        ModelClientes::destroy($id);

        session()->flash('delete-success', 'ok');
    }

    public function limpiarcampos(){
        $this->form = 'form_created';
        $this->id_vendedor = '';
        $this->reset();
    }
}
