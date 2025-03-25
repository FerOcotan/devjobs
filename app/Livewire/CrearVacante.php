<?php

namespace App\Livewire;

use App\Models\Salario;
use Livewire\Component;
use App\Models\Categoria;

class CrearVacante extends Component
{

    public $title;
   



    public function render()
    {
        
    
        $categorias = Categoria::all();
        $salarios = Salario::all();
        return view('livewire.crear-vacante', ['salarios' => $salarios, 'categorias' => $categorias]);
    }
}
