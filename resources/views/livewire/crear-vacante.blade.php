<form

class="md:w-1/2 space-y-5"
action="">

<div>
    <x-input-label for="title" :value="__('Title of vacacie')" />
    <x-text-input 
    id="title" 
    class="block mt-1 w-full"
     type="text" 
     name="title" 
     :value="old('title')" 
     placeholder="Title of vacacie"
   />
    <x-input-error :messages="$errors->get('title')" class="mt-2" />
</div>

<div>
    <x-input-label for="salary" :value="__('monthly salary')" />
    
    <select 
    name="salary"
    id="salary"
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
    <x-input-error :messages="$errors->get('salary')" class="mt-2" />
</div>

<div>
    <x-input-label for="category" :value="__('category')" />
    
    <select 
    name="category"
    id="category"
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

    <x-input-error :messages="$errors->get('category')" class="mt-2" />
</div>

<div>
    <x-input-label for="company" :value="__('company')" />
    <x-text-input 
    id="company" 
    class="block mt-1 w-full"
     type="text" 
     name="company" 
     :value="old('company')" 
     placeholder="company ej. Netflix, Uber,Samsung"
   />
    <x-input-error :messages="$errors->get('company')" class="mt-2" />
</div>

<div>
    <x-input-label for="last_day" :value="__('last day to postulate')" />
    <x-text-input 
    id="last_day" 
    class="block mt-1 w-full"
     type="date" 
     name="last_day" 
     :value="old('last_day')" 
  
   />
    <x-input-error :messages="$errors->get('last_day')" class="mt-2" />
</div>


<div>
    <x-input-label for="description" :value="__('description job')" />

    <textarea
    name="description"
    id="description"
    class="w-full border-gray-300 focus:border-indigo-500
     focus:ring-indigo-500 rounded-md shadow-sm"
     rows="5"
     placeholder="description job"
    ></textarea>

    <x-input-error :messages="$errors->get('last_day')" class="mt-2" />
</div>

<div>
    <x-input-label for="image" :value="__('image')" />
    <x-text-input 
    id="image" 
    class="block mt-1 w-full"
     type="file" 
     name="image" 
     
   />
    <x-input-error :messages="$errors->get('title')" class="mt-2" />
</div>

<x-primary-button>
    Create Vacante
</x-primary-button>

</form>