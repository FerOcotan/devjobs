<?php

namespace App\Livewire;

use App\Models\Salario;
use App\Models\Vacante;
use Livewire\Component;
use App\Models\Categoria;
use Livewire\WithFileUploads;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;

class EditarVacante extends Component
{
    public $vacante_id;
    public $titulo;
    public $salario;
    public $categoria;
    public $empresa;
    public $ultimo_dia;
    public $descripcion;
    public $imagen;
    public $imagen_nueva;

    use WithFileUploads;


    protected $rules = [
        'titulo' => 'required|string',
        'salario' => 'required',
        'categoria' => 'required',
        'empresa' => 'required',
        'ultimo_dia' => 'required',
        'descripcion' => 'required',
        'imagen' => 'nullable',
        'imagen_nueva' => 'nullable| image | max:1024',
    ];
   
    

    public function mount(Vacante $vacante)
    {
        $this->vacante_id = $vacante->id;
        $this->titulo = $vacante->titulo;
        $this->salario = $vacante->salario_id;
        $this->categoria = $vacante->categoria_id;
        $this->empresa = $vacante->empresa;
        $this->ultimo_dia = Carbon::parse($vacante->ultimo_dia)->format('Y-m-d');
        $this->descripcion = $vacante->descripcion;
        $this->imagen = $vacante->imagen; 
    }



    public function editarVacante(){

        $datos = $this->validate();
        
        $vacante = Vacante::find($this->vacante_id);

        if ($this->imagen_nueva) {
            $imagen = $this->imagen->store('vacantes','public');
            $datos['imagen'] = str_replace('vacantes/', '',$imagen);
            Storage::delete('public/vacantes/' .  $vacante->imagen);
            $vacante->imagen = $datos['imagen'];
        }

        $vacante->titulo = $datos['titulo'];
        $vacante->salario_id = $datos['salario'];
        $vacante->categoria_id = $datos['categoria'];
        $vacante->empresa = $datos['empresa'];
        $vacante->ultimo_dia = $datos['ultimo_dia'];
        $vacante->descripcion = $datos['descripcion'];
        $vacante->imagen = $datos['imagen'] ?? $vacante->imagen;
        $vacante->save();


        session()->flash('message', 'La vacante se actualizo correctamente');
        return redirect()->route('vacantes.index');

    }

    public function render()
    {
        $categorias = Categoria::all();
        $salarios = Salario::all();
        return view('livewire.editar-vacante', ['salarios' => $salarios, 'categorias' => $categorias]);
    }
}
