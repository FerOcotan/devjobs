<div class="bg-gray-100 p-5 mt-10 flex flex-col justify-center items-center ">
    <h3 class="text-center text-2xl font-bold my-4">Postular a la vacante</h3>


    <form 
    wire:submit.prevent="postularme"
    action="" class="w-96 mt-5">

        <div class="mb-5">
          <x-input-label for="cv" value="Curriculum" />
          <x-text-input id="cv" class="block mt-1 w-full" 
          type="file" 
          name="cv"
          wire:model="cv"
           accept=".pdf" />
    
        </div>

        <x-input-error :messages="$errors->get('cv')" class="mt-2" />





<x-primary-button class="my-5">Postularme</x-primary-button>

    </form>

  
</div>
 