<?php

namespace App\Livewire;

use App\Models\Salario;
use App\Models\Vacante; // Ensure this model exists in the App\Models namespace
use Livewire\Component;
use App\Models\Categoria;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;

class CrearVacante extends Component
{

    public $titulo;
    public $salario;
    public $categoria;
    public $empresa;
    public $ultimo_dia;
    public $descripcion;
    public $imagen;

    use WithFileUploads;


    protected $rules = [
        'titulo' => 'required|string',
        'salario' => 'required',
        'categoria' => 'required',
        'empresa' => 'required',
        'ultimo_dia' => 'required',
        'descripcion' => 'required',
        'imagen' => 'required | image | max:1024',
    ];
   
    public function crearVacante(){

       $datos = $this->validate();


       $imagen = $this->imagen->store('vacantes','public');
       $datos['imagen'] = str_replace('vacantes/', '',$imagen);

      
       Vacante::create([
        'titulo' => $datos['titulo'],
        'salario_id' => $datos['salario'],
        'categoria_id' => $datos['categoria'],
        'empresa' => $datos['empresa'],
        'ultimo_dia' => $datos['ultimo_dia'],
        'descripcion'   => $datos['descripcion'],
        'imagen' => $datos['imagen'],  
        'user_id' => Auth::user()->id
    ]);




    session()->flash('message', 'La vacacie is create successfully');
    return redirect()->route('vacantes.index');
    

    }



    public function render()
    {
        
    
        $categorias = Categoria::all();
        $salarios = Salario::all();
        return view('livewire.crear-vacante', ['salarios' => $salarios, 'categorias' => $categorias]);
    }
}
