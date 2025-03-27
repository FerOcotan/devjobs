<?php

namespace App\Livewire;

use App\Models\Vacante;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;

class PostularVacante extends Component
{

    use WithFileUploads;

    public $cv;
    public $vacante;



    protected $rules = [
        'cv' => 'required|mimes:pdf|max:1024'
    ];


    public function mount(Vacante $vacante)
    {
        $this->vacante = $vacante;
    }
   

    public function postularme(){


        
        $datos = $this->validate();
       
        $cv = $this->cv->store('cv', 'public');
       
        $datos['cv'] = str_replace('cv/', '', $cv);


        $this->vacante->candidatos()->create([
            'user_id' => Auth::user()->id,
            'cv' => $datos['cv']
        ]);

        
    }


    public function render()
    {
        return view('livewire.postular-vacante');
    }
}
