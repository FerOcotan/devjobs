<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Candidatos vancante') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                      <h1 class="text-3xl font-bold text-center my-10">Candidatos vacante: {{ $vacante->titulo }} </h1>

                            <div class="md:flex md:justify-center p-5">

                                <ul class="divide-y divide-gray-200 w-full">
                                    @forelse ($vacante -> candidatos as $candidato)
                                    <li class="p-3 flex items-center">
                                            <div class="flex-1">
                                             <p class="text-xl font-medium text-gray-800">
                                                Nombre: {{ $candidato->user->name }} 
                                             </p>
                                             <p class="text-sm  text-gray-600">
                                                Email: {{ $candidato->user->email }} 
                                             </p>
                                             <p class="text-sm font-medium  text-gray-600">
                                                Postulacion: <span class="font-normal">{{ $candidato->created_at->diffForHumans() }} </span> 
                                             </p>
                                            </div>
                                            <div>
                                                    <a 
                                                    class="inline-flex items-center px-6 py-3 text-xl font-bold leading-7 text-gray-900 bg-white border-2 border-gray-400 rounded-full shadow-lg hover:bg-gray-200 transition-all duration-200" 
                                                    href="{{ asset('storage/cv/'. $candidato->cv) }}"
                                                    target="_blank"
                                                    rel="noopener noreferrer"
                                                    
                                                    > 
                                                    ver cv</a>
                                            </div>
                                    </li>
                                        
                                    @empty
                                            <p class="p-3 text-gray-600 text-sm text-center">
                                                No hay candidatos
                                            </p>
                                    @endforelse
                                </ul>
                                
                            </div>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
