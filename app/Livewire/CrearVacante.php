<?php

namespace App\Livewire;

use App\Models\Salario;
use Livewire\Component;
use App\Models\Categoria;

class CrearVacante extends Component
{

    public $title;
    public $salary;
    public $category;
    public $company;
    public $last_day;
    public $description;
    public $image;


    protected $rules = [
        'title' => 'required|string',
        'salary' => 'required',
        'category' => 'required',
        'company' => 'required',
        'last_day' => 'required',
        'description' => 'required',
        'image' => 'required',
    ];
   
    public function crearVacante(){

       $datos = $this->validate();

    }



    public function render()
    {
        
    
        $categorias = Categoria::all();
        $salarios = Salario::all();
        return view('livewire.crear-vacante', ['salarios' => $salarios, 'categorias' => $categorias]);
    }
}
