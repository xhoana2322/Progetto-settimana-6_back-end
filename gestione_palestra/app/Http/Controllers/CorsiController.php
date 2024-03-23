<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Corsi;
use App\Http\Requests\StoreCorsiRequest;
use App\Http\Requests\UpdateCorsiRequest;

class CorsiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::check()) {
            $corsi = DB::table('corsis')->get();
            return view('corsi', ['corsi' => $corsi], ['user' => Auth::user()]);
        } else {
            return redirect()->route('login');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCorsiRequest $request)
    {
        $new_data = $request->only('titolo', 'descrizione', 'giorno', 'orario_inizio', 'orario_fine');

        $corsi = new Corsi();
        $corsi->titolo = $new_data['titolo'];
        $corsi->descrizione = $new_data['descrizione'];
        $corsi->giorno = $new_data['giorno'];
        $corsi->orario_inizio = $new_data['orario_inizio'];
        $corsi->orario_fine = $new_data['orario_fine'];
        $corsi->save();

        return redirect()->route('corsi.index')->with('success', 'Corso aggiunto con successo!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Corsi $corsi)
    {
        return view('dettagliocorso', ['corsi' => $corsi], ['user' => Auth::user()]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Corsi $corsi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCorsiRequest $request, Corsi $corsi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Corsi $corsi)
    {
        $corsi->delete();
        return redirect()->back()->with('success', 'Corso eliminato con successo.');
    }
}
