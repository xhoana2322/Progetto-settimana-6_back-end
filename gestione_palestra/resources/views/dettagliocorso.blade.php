<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Iscrizione corso') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if ($user && $user->isAdmin == 0)
                        {{ __("Ti sei iscritto con successo. Un nostro responsabile ti confermerà la partecipazione al corso.") }}
                        <a type="button" class="btn btn-outline-dark mt-4 w-100" href="/corsi">Torna ai corsi</a>
                        <a type="button" class="btn btn-outline-warning my-2 w-100" href="/prenotazioni">Guarda tutte le prenotazioni</a>
                        @else
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg text-center">
                            <div class="p-6 text-gray-900">
                                <h3 class="font-semibold text-lg mb-2">{{ $corsi->titolo }}</h3>
                                <p class="mb-4">{{ $corsi->descrizione }}</p>
                                <ul class="list-disc list-inside mb-4">
                                    <li><strong>Giorno:</strong> {{ $corsi->giorno }}</li>
                                    <li><strong>Orario inizio:</strong> {{ \Carbon\Carbon::parse($corsi->orario_inizio)->format('H') }}:00</li>
                                    <li><strong>Orario fine:</strong> {{ \Carbon\Carbon::parse($corsi->orario_fine)->format('H') }}:00</li>
                                </ul>
                            </div>
                        </div>
                        <a type="button" class="btn btn-outline-dark mt-4 w-100" href="/corsi">Torna ai corsi</a>
                        <a type="button" class="btn btn-outline-warning my-2 w-100" href="/prenotazioni">Guarda tutte le prenotazioni</a>
                    @endif
                    </div>
            </div>
        </div>
    </div>
</x-app-layout>