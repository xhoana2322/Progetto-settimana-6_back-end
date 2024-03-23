<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Corsi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="section-add-course">
                        @if ($user && $user->isAdmin == 0)
                            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg text-center w-75 mx-auto my-2">
                                <div class="p-5 text-gray-900"  style="background-color: #F8F9FA;">
                                    <p class="fs-3 fw-bold">Scopri i Corsi: Il Tuo Percorso Verso il Benessere!</p>
                                    <p>Benvenuti nella nostra palestra, dove il benessere e la salute sono al centro di tutto ciò che facciamo. 
                                        Siamo entusiasti di presentarvi la nostra vasta gamma di corsi, progettati per soddisfare le esigenze e i livelli di fitness di tutti i nostri membri.  
                                        Scopri la nostra tabella dei corsi qui sotto e inizia il tuo viaggio verso una vita più sana e attiva oggi stesso!</p>
                                    <!-- <p class="fs-4">Aggiungi un nuovo corso!</p> -->
                                </div>
                            </div>
                        @else
                            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg text-center w-75 mx-auto my-2">
                                <div class="p-5 text-gray-900" style="background-color: #F8F9FA;">
                                    <p class="fs-3 fw-bold">Amministrazione Corsi: Ottimizza il Fitness!</p>
                                    <p class="mb-3">Benvenuto nell'area riservata agli amministratori della nostra palestra!  
                                    Siamo qui per aiutarti a creare un ambiente dinamico e coinvolgente che ispiri tutti a raggiungere i loro obiettivi di fitness. 
                                    Scopri tutte le opzioni disponibili e preparati a dare il via a una nuova era di benessere nella nostra palestra!</p>
                                    
                                        <hr>
                                    
                                    <p class="fs-5 fw-semibold mt-3">Crea nuove opportunità di fitness! </p>
                                    <p>Aggiungi un nuovo corso alla nostra selezione per offrire ai nostri membri un'esperienza ancora più completa e coinvolgente.</p>
                                    <button type="button" class="btn btn-outline-primary my-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        Aggiungi nuovo corso
                                    </button>
                                </div>
                            </div>
                        @endif
                    </div>
                    <table class="table align-middle mt-4">
                        <thead class="table-light align-middle text-center">
                            <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Titolo</th>
                            <th scope="col">Descrizione</th>
                            <th scope="col">Giorno</th>
                            <th scope="col">Orario inizio</th>
                            <th scope="col">Orario fine</th>
                            <th scope="col">Azioni</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider text-center">
                            @if($corsi)
                                @foreach($corsi as $key => $value)
                                    <tr>
                                        <th scope="row">{{$value->id}}</th>
                                        <td  class="text-center">{{ $value->titolo }}</td>
                                        <td>{{$value->descrizione}}</td>
                                        <td>{{ $value->giorno }}</td>
                                        <td>{{ \Carbon\Carbon::parse($value->orario_inizio)->format('H') }}:00</td>
                                        <td>{{ \Carbon\Carbon::parse($value->orario_fine)->format('H') }}:00</td>
                                        <td>
                                            @if ($user && $user->isAdmin == 0)
                                                <a type="button" class="btn btn-outline-success my-2 w-100" href="/corsi/{{$value->id}}">Iscriviti</a>
                                            @else
                                                <a type="button" class="btn btn-outline-info my-2 w-100" href="/corsi/{{$value->id}}">Info</a>
                                            <form method="POST" action="{{ route('corsi.destroy', $value->id) }}" onsubmit="return confirm('Sei sicuro di voler eliminare questa prenotazione?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-danger my-2 w-100">Elimina</button>
                                            </form>
                                               
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Aggiungi nuovo corso</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('corsi.store') }}" enctype="multipart/form-data"
                            id="courseForm">
                            @csrf
                        <div class="mb-3">
                            <label for="titolo" class="form-label">Titolo Corso</label>
                            <input type="text" class="form-control rounded" name="titolo"
                                value="{{ old('titolo') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="descrizione" class="form-label">Descrizione</label>
                            <input type="text" class="form-control rounded" name="descrizione"
                                value="{{ old('descrizione') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="giorno" class="form-label">Giorno</label>
                            <select class="form-select" name="giorno" required>
                                <option value="Lunedì">Lunedì</option>
                                <option value="Martedì">Martedì</option>
                                <option value="Mercoledì">Mercoledì</option>
                                <option value="Giovedì">Giovedì</option>
                                <option value="Venerdì">Venerdì</option>
                                <option value="Sabato">Sabato</option>
                                <option value="Domenica">Domenica</option>
                            </select>
                        </div>

                        <div class="d-flex gap-3">
                            <div class="mb-3 w-50">
                                <label for="orario_inizio" class="form-label">Ora di inizio</label>
                                <select class="form-select" name="orario_inizio" required>
                                    <option value="12:00">07:00</option>
                                    <option value="12:00">08:00</option>
                                    <option value="12:00">09:00</option>
                                    <option value="12:00">10:00</option>
                                    <option value="12:00">11:00</option>
                                    <option value="12:00">12:00</option>
                                    <option value="13:00">13:00</option>
                                    <option value="14:00">14:00</option>
                                    <option value="15:00">15:00</option>
                                    <option value="16:00">16:00</option>
                                    <option value="17:00">17:00</option>
                                    <option value="18:00">18:00</option>
                                    <option value="19:00">19:00</option>
                                    <option value="20:00">20:00</option>
                                    <option value="21:00">21:00</option>
                                </select>
                            </div>

                            <div class="mb-3 w-50">
                                <label for="orario_fine" class="form-label">Ora di fine</label>
                                <select class="form-select" name="orario_fine" required>
                                    <option value="12:00">08:00</option>
                                    <option value="12:00">09:00</option>
                                    <option value="12:00">10:00</option>
                                    <option value="12:00">11:00</option>
                                    <option value="12:00">12:00</option>
                                    <option value="13:00">13:00</option>
                                    <option value="14:00">14:00</option>
                                    <option value="15:00">15:00</option>
                                    <option value="16:00">16:00</option>
                                    <option value="17:00">17:00</option>
                                    <option value="18:00">18:00</option>
                                    <option value="19:00">19:00</option>
                                    <option value="20:00">20:00</option>
                                    <option value="21:00">21:00</option>
                                    <option value="22:00">22:00</option>
                                </select>
                            </div>
                        </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Chiudi</button>
                            <button type="submit" class="btn btn-outline-primary">Salva modifiche</button>
                        </div>
                    </form>
                </div>
        </div>
    </div>

</x-app-layout>