<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Models\Corsi;
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
        if (Auth::user()->isAdmin == 1) {
            $prenotazioni = Prenotazioni::with('corsi')->with('user')->get();
        } else {
            $prenotazioni = Prenotazioni::where('users_id', Auth::user()->id)->with('corsi')->with('user')->get();
        }

        return view('prenotazioni', ['prenotazioni' => $prenotazioni, 'user' => Auth::user()]);


        // $prenotazioni = Prenotazioni::with('corsi')->get();
        // $prenotazioni->load('corsi');
        // dd($prenotazioni);
        // return view('prenotazioniUser', ['prenotazioni' => $prenotazioni, 'user' => Auth::user()]);

            
            // $prenotazioni = Prenotazioni::where('users_id', Auth::user()->id)->get();
            // $prenotazioni->load('corsi');
            // $prenotazioni->load('user');

            // return view('prenotazioni', ['prenotazioni' => $prenotazioni], ['user' => Auth::user()]);
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
