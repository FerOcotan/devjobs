<div>
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        @if (count($vacantes) > 0)
            @foreach ($vacantes as $vacante)
                <div class="p-6 text-gray-900 border-b last:border-b-0 font-bold md:flex justify-between items-center">
                    <div class="leading-10"> 
                        <a href="" class="text-xl text-black-600 hover:underline">
                            {{ $vacante->titulo }}
                        </a>
                        <p class="text-sm text-gray-600 font-bold">
                            {{ $vacante->empresa }}
                        </p>
                        <p class="text-sm text-gray-500">
                            Last day: {{ $vacante->ultimo_dia->format('d/m/Y') }}
                        </p>
                    </div>
                    <div class="flex flex-col md:flex-row items-stretch gap-3 mt-5 md:mt-0">
                        <a 
                            href=""
                            class="bg-slate-800 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center"
                        >
                            Candidatos
                        </a>
                        <a 
                            href="{{ route('vacantes.edit',$vacante->id) }}"
                            class="bg-blue-800 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center"
                        >
                            Editar
                        </a>
                        <a 
                            href=""
                            class="bg-red-800 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center"
                        >
                            Eliminar
                        </a>
                    </div>
                </div>
            @endforeach
        @else
            <div class="p-6 text-gray-900 font-bold text-center">
                No hay vacantes
            </div>
        @endif
    </div>

    <div >
        {{ $vacantes->links() }}
    </div>
</div>
