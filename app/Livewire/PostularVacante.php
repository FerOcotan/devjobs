<?php

namespace App\Livewire;

use App\Models\Vacante;
use App\Notifications\NuevoCandidato;
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

//crea el candidato

        $this->vacante->candidatos()->create([
            'user_id' => Auth::user()->id,
            'cv' => $datos['cv']
        ]);


    // Crear noti y enviar email
  
    $this->vacante->reclutador->notify(new NuevoCandidato($this->vacante->id, $this->vacante->titulo, Auth::user()->id ));






        //mensaje y retorna
        session()->flash('mensaje', 'Tu postulación se ha enviado correctamente.');
        session()->flash('mensaje_tipo', 'success');

        return redirect()->back();

        
    }


    public function render()
    {
        return view('livewire.postular-vacante');
    }
}
