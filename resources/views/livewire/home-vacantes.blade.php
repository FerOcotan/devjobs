<div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h3 class="font-extrabold text-4xl text-gray-700 mb-8">Nuestras vacantes disponibles</h3>
            <div class="bg-white shadow-md rounded-lg p-6">

                @forelse ($vacantes as $vacante)
                    <div class="md:flex md:justify-between md:items-center py-5 border-b border-gray-200">
                        <div class="md:flex-1">
                            <a href="" class="text-lg font-semibold text-gray-800 hover:text-lime-600">
                                {{ $vacante->titulo }}
                            </a>
                            <p class="text-base text-gray-600 mb-3">
                                {{ $vacante->empresa }}
                            </p>
                            <p class="font-normal text-gray-600 text-xs"
                            >Ultimo dia para postularte:
                                <span class="font-bold">
                                        {{ $vacante->ultimo_dia->format('d/m/Y') }}
                                </span>
                            </p>
                        </div>
                        <div class="mt-5 md:mt-0">
                            <a
                                class="bg-lime-600 text-white px-4 py-2 rounded-lg hover:bg-lime-700 font-bold text-sm uppercase transition duration-300 block text-center"
                                href="{{ route('vacantes.show', $vacante->id) }}"
                            >Ver vacante</a>
                        </div>
                    </div>
                @empty
                    <p class="p-3 text-center text-sm text-gray-600">No hay vacantes aún</p>
                @endforelse

            </div>
        </div>
    </div>
</div>
