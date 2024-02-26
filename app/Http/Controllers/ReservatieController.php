<?php

namespace App\Http\Controllers;
use App\Models\Reservatie;
use Illuminate\Http\Request;

class ReservatieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('reservatie');
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
    public function store(Request $request)
    {
        $request->validate([
            'datum' => 'required|date',
            'tijdslot' => 'required|date_format:H:i', // Hier moet de tijd in het formaat 'HH:MM' zijn
            'voornaam' => 'required|string|max:255',
            'familienaam' => 'required|string|max:255',
            'abonnementsnummer' => 'required|string|max:255'
        ]);
        //kan ook nog gebruik maken van the create method
        $reservatie = new Reservatie();
        $reservatie->datum = $request->input('datum');
        $reservatie->tijdslot = $request->input('tijdslot');
        $reservatie->voornaam = $request->input('voornaam');
        $reservatie->familienaam = $request->input('familienaam');
        $reservatie->abonnementsnummer = $request->input('abonnementsnummer');
        $reservatie->save();

        //Extra logica of doorverwijzing na succesvol opslaan van de gegevens

        return redirect()->back()->with('success', 'Reservatie succesvol opgeslagen!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
