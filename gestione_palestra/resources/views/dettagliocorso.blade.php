<x-app-layout>
    <x-slot name="header" style="">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Iscrizione corso') }}
        </h2>
    </x-slot>

    <div class="py-12"  style="height: 55rem;">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg w-75 mx-auto">
                <div class="text-gray-900">
                    @if ($user && $user->isAdmin == 0)

                    <div class="my-5">
                            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg text-center w-75 mx-auto">
                                <div class="p-6 text-gray-900">
                                    <p class="fw-semibold fs-5 mb-1"> {{ __("Ti sei iscritto con successo! ") }}</p>
                                    <p>{{ __("Un nostro responsabile ti confermerà la partecipazione al corso.") }}</p>
                                </div>
                            </div>
                            <div class="d-flex flex-column mx-auto w-50">
                                <a type="button" class="btn btn-outline-secondary mt-4 w-100" href="/corsi">Torna ai corsi</a>
                                <a type="button" class="btn btn-outline-warning my-2 w-100" href="/prenotazioni">Guarda tutte le prenotazioni</a>
                            </div>
                        </div>
                    @else
                        <div class="my-5">
                            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg text-center w-75 mx-auto">
                                <div class="p-6 text-gray-900">
                                    <p class="text-capitalize fw-bold fs-2 mb-2">{{ $corsi->titolo }}</p>
                                    <p class="mb-4 ">{{ $corsi->descrizione }}</p>
                                    <ul class="list-disc list-inside mb-4">
                                        <li><strong>Giorno:</strong> {{ $corsi->giorno }}</li>
                                        <li><strong>Orario inizio:</strong> {{ \Carbon\Carbon::parse($corsi->orario_inizio)->format('H') }}:00</li>
                                        <li><strong>Orario fine:</strong> {{ \Carbon\Carbon::parse($corsi->orario_fine)->format('H') }}:00</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="d-flex flex-column mx-auto w-50">
                                <a type="button" class="btn btn-outline-dark mt-4" href="/corsi">Torna ai corsi</a>
                                <a type="button" class="btn btn-outline-warning my-2" href="/prenotazioni">Guarda tutte le prenotazioni</a>
                            </div>
                        </div>
                    @endif
                    </div>
            </div>
        </div>
    </div>
</x-app-layout>