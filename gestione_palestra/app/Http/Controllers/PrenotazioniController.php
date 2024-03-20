<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Prenotazioni;
use App\Http\Requests\StorePrenotazioniRequest;
use App\Http\Requests\UpdatePrenotazioniRequest;

class PrenotazioniController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // if (Auth::check()) {
            $prenotazioni = DB::table('prenotazionis')->get();
            return view('prenotazioni', ['prenotazioni' => $prenotazioni], ['user' => Auth::user()]);
        // } else {
        //     return redirect()->route('login');
        // }
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
    public function store(StorePrenotazioniRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Prenotazioni $prenotazioni)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Prenotazioni $prenotazioni)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePrenotazioniRequest $request, Prenotazioni $prenotazioni)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Prenotazioni $prenotazioni)
    {
        //
    }
}
