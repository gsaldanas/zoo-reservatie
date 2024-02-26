<?php

namespace App\Http\Controllers;

use App\Models\Reservatie;
use Illuminate\Http\Request;
use Carbon\carbon;
use Illuminate\Support\Facades\DB;

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
        // Controleer het aantal gereserveerde plaatsen
        $numberOfReservations = Reservatie::where('datum', $request->input('datum'))
            ->where('tijdslot', $request->input('tijdslot'))
            ->count();

        if ($numberOfReservations >= 200) {
            // Als het aantal reservaties al 200 heeft bereikt, geef een foutmelding
            return redirect()->back()->with('error', 'Sorry, de zoo is vol voor deze datum en tijd.');
        }
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
    public function bezoekersPerDagGraph($startDatum, $eindDatum)
    {
        // Converteer de start- en einddatum naar Carbon objecten
        $startDatum = Carbon::parse($startDatum);
        $eindDatum = Carbon::parse($eindDatum);

        // Bouw de query om het aantal bezoekers per dag te krijgen
        $query = Reservatie::whereBetween('datum', [$startDatum, $eindDatum])
            ->selectRaw('datum, count(*) as aantal_bezoekers')
            ->groupBy('datum')
            ->orderBy('datum');

        // Voer de query uit en haal de resultaten op
        $aantalBezoekersPerDag = $query->get();

        return response()->json($aantalBezoekersPerDag);
        //TO DO NOG CHECKEN MET SLUITINGSDAGEN!!

        // Dump de query en het resultaat om te controleren
        // dd($query->toSql(), $aantalBezoekersPerDag);

        // Nu heb je een collectie van data die het aantal bezoekers per dag bevat
        // Je kunt deze data gebruiken om een grafiek te maken

        // return view('bezoekers.graph', [
        //     'aantalBezoekersPerDag' => $aantalBezoekersPerDag
        // ]);
    }
}
