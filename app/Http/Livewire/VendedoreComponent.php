<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

use App\User;

use Illuminate\Support\Facades\Hash;

class VendedoreComponent extends Component
{
    use WithPagination;

    public $id_vendedor, $nombre, $correo, $documento, $direccion; 
    public $form  = 'form_created';
    public $type_filter = 'name';
    Public $search = '';


    public function render()
    {
        $vendedores = User::where('rol','2')
                            ->Where($this->type_filter,'LIKE',"%$this->search%")
                            ->orderBy('created_at','DESC')
                            ->paginate(4);
        return view('livewire.vendedores.vendedore-component',['vendedores' => $vendedores]);
    }

    public function register(){
        $this->validate([
            'nombre'    => 'required|string',
            'correo'    => 'required|email',
            'documento' => 'required|numeric',
            'direccion' => 'required|string',
        ]);

        $datos = [
            'name'      => $this->nombre,
            'email'     => $this->correo,
            'documento' => $this->documento,
            'direccion' => $this->direccion,
            'rol'       => '2',
            'password' => Hash::make($this->documento),
        ];

        User::create($datos);

        $this->limpiarcampos();
        session()->flash('register_success', 'ok');
    }

    public function edit($id){

        $this->form  = 'form_edit';
        $this->id_vendedor  = $id;

        $vendedor = User::find($id);

        $this->nombre    = $vendedor->name;
        $this->correo    = $vendedor->email;
        $this->documento = $vendedor->documento;
        $this->direccion = $vendedor->direccion;

    }

    public function update(){
        $this->validate([
            'nombre'    => 'required|string',
            'correo'    => 'required|email',
            'documento' => 'required|numeric',
            'direccion' => 'required|string',
        ]);

        $vendedor_old = User::find($this->id_vendedor);
        $vendedor_old->name = $this->nombre;
        $vendedor_old->email = $this->correo;
        $vendedor_old->documento = $this->documento;
        $vendedor_old->direccion = $this->direccion;

        $vendedor_old->save();

        $this->limpiarcampos();
        session()->flash('update-success', 'ok');
    }

    public function destroy($id){
        User::destroy($id);

        session()->flash('delete-success', 'ok');
    }

    public function limpiarcampos(){
        $this->form = 'form_created';
        $this->id_vendedor = '';
        $this->reset();
    }
}
