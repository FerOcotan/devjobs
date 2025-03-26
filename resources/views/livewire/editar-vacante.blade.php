<form

class="md:w-1/2 space-y-5"
action=""  wire:submit.prevent="crearVacante">

<div>
    <x-input-label for="titulo" :value="__('Title of vacacie')" />
    <x-text-input 
    id="titulo" 
    class="block mt-1 w-full"
     type="text" 
     wire:model="titulo" 
     :value="old('titulo')" 
     placeholder="Title of vacacie"
   />
    <x-input-error :messages="$errors->get('titulo')" class="mt-2" />
</div>

<div>
    <x-input-label for="salario" :value="__('monthly salary')" />
    
    <select 
    wire:model="salario"
    id="salario"
    class=" w-full border-gray-300 focus:border-indigo-500
     focus:ring-indigo-500 rounded-md shadow-sm">

     
     <option value="">
         ---   Select option --- 
        </option>

        @foreach ($salarios as $salario)
        <option value="{{ $salario->id }}">
            {{ $salario->salario }}
           
           </option>
        @endforeach
        
    </select>
    <x-input-error :messages="$errors->get('salario')" class="mt-2" />
</div>

<div>
    <x-input-label for="categoria" :value="__('categoria')" />
    
    <select 
    wire:model="categoria"
    id="categoria"
    class=" w-full border-gray-300 focus:border-indigo-500
     focus:ring-indigo-500 rounded-md shadow-sm">

     <option value="">
        ---   Select option --- 
       </option>

       @foreach ($categorias as $categoria)
       <option value="{{ $categoria->id }}">
           {{ $categoria->categoria }}
          
          </option>
       @endforeach
       

    </select>

    <x-input-error :messages="$errors->get('categoria')" class="mt-2" />
</div>

<div>
    <x-input-label for="empresa" :value="__('empresa')" />
    <x-text-input 
    id="empresa" 
    class="block mt-1 w-full"
     type="text" 
     wire:model="empresa" 
     :value="old('empresa')" 
     placeholder="company ej. Netflix, Uber,Samsung"
   />
    <x-input-error :messages="$errors->get('empresa')" class="mt-2" />
</div>

<div>
    <x-input-label for="ultimo_dia" :value="__('last day to postulate')" />
    <x-text-input 
    id="ultimo_dia" 
    class="block mt-1 w-full"
     type="date" 
     wire:model="ultimo_dia" 
     :value="old('ultimo_dia')" 
  
   />
    <x-input-error :messages="$errors->get('ultimo_dia')" class="mt-2" />
</div>


<div>
    <x-input-label for="descripcion" :value="__('description job')" />

    <textarea
    wire:model="descripcion"
    id="descripcion"
    class="w-full border-gray-300 focus:border-indigo-500
     focus:ring-indigo-500 rounded-md shadow-sm"
     rows="5"
     placeholder="description job"
    ></textarea>

    <x-input-error :messages="$errors->get('descripcion')" class="mt-2" />
</div>


<div>
    <x-input-label for="imagen" :value="__('imagen')" />
    <x-text-input 
     id="imagen" 
        class="block mt-1 w-full"
        type="file" 
     accept="image/*"
     wire:model="imagen" 
     
   />
   
   <div class="my-5 w-96">
    <x-input-label  :value="__('Actual imagen')" />
    <img src="{{ asset('storage/vacantes/') . $imagen }}" alt="Imagen vacante {{$titulo}}">

   </div>

{{--     <div class="my-5 w-96">
        @if ($imagen)
        Image preview:
        <img src="{{ $imagen->temporaryUrl() }}" alt="Preview">
    @endif
    </div> --}}
   
    <x-input-error :messages="$errors->get('imagen')" class="mt-2" />
</div> 

<x-primary-button>
    Create Vacante
</x-primary-button>

</form>