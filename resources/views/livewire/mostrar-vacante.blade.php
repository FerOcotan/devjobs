<div class="p-10">

    <div class="mb-5">

        <h3 class="font-normal text-3xl text-gray-800 my-3">

            {{ $vacante->titulo }}
        </h3>
        
        <div class="grid grid-cols-1 md:grid-cols-2  bg-gray-50 p-4 my-10">
            <p class="text-sm  text-gray-800 my-3"> Empresa:
                <span class="normal-case font-bold  text-gray-700 ">
                    {{ $vacante->empresa }}
                </span>
            </p>
            <p class="text-sm  text-gray-800 my-3"> Ultimo dia para posturlarte:
                <span class="normal-case font-bold  text-gray-700 ">
                    {{ $vacante->ultimo_dia->toFormattedDateString() }}
                </span>
            </p>
            <p class="text-sm  text-gray-800 my-3"> Categoria:
                <span class="normal-case font-bold  text-gray-700 ">
                    {{ $vacante->categoria->categoria }}
                </span>
            </p>
            
            <p class="text-sm  text-gray-800 my-3"> Salario:
                <span class="normal-case font-bold  text-gray-700 ">
                    {{ $vacante->salario->salario }}
                </span>
            </p>
        </div>
        
    </div>


    <div class="md:grid md:grid-cols-6  gap-4">   
        <div class="md:col-span-2">
            <img src="{{ asset('storage/vacantes'. $vacante->imagen)  }}" alt="{{ 'imag vacante' . $vacante->titulo }}" class="w-40 h-40 object-cover">
        </div>

        <div  class="md:col-span-4">
            <h2 class="text-2xl font-bold mb-5">Descripcion del puesto </h2>
            <p>{{ $vacante->descripcion  }}</p>
        </div>

    </div>

    @guest
        
    <div class="mt-5 bg-gray-50 border-dashed p-5 text-center">
        
        <p>
            Deseas aplicar a esta vacante? <a class="font-bold text-lime-600"     
            href="{{ route('register') }}">Obten una cuenta y aplica a esta vacante y otras vacantes</a>
            
            
        </p>
    </div>
    
    @endguest
</div>
