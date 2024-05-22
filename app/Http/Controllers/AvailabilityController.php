<?php

namespace App\Http\Controllers;

use App\Models\Availability;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AvailabilityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $availabilities = Availability::all();
        return view('availability.index', compact('availabilities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('availability.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'date_begin' => 'required|date_format:d-m-Y H:i',
            'date_end' => 'required|date_format:d-m-Y H:i',
        ]);

        // Convertir les dates au format de timestamp
        $validatedData['date_begin'] = Carbon::createFromFormat('d-m-Y H:i', $validatedData['date_begin'])->timestamp;
        $validatedData['date_end'] = Carbon::createFromFormat('d-m-Y H:i', $validatedData['date_end'])->timestamp;

        // Créer l'enregistrement
        Availability::create($validatedData);

        return redirect()->route('appointments.index')
            ->with('success', 'Rendez-vous créé avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(Availability $availability)
    {
        return view('availability.show', compact('availability'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Availability $availability)
    {
        return view('availability.edit', compact('availability'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Availability $availability)
    {
        $validatedData = $request->validate([
            'date_begin' => 'required|date_format:d-m-Y H:i',
            'date_end' => 'required|date_format:d-m-Y H:i',
        ]);

        // Convertir les dates au format de timestamp
        $validatedData['date_begin'] = Carbon::createFromFormat('d-m-Y H:i', $validatedData['date_begin'])->timestamp;
        $validatedData['date_end'] = Carbon::createFromFormat('d-m-Y H:i', $validatedData['date_end'])->timestamp;

        $availability->update($validatedData);

        return redirect()->route('availability.index')
            ->with('success', 'availability mis à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Availability $availability)
    {
        $availability->delete();

        return redirect()->route('availability.index')
            ->with('success', 'availability supprimé avec succès');
    }
}
