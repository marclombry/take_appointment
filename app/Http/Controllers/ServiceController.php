<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::all();
        return view('service.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        return view('service.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
        ]);

        $service = Service::create($validatedData);

        return redirect()->route('service.index')
            ->with('success', 'Service créé avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        return view('service.show', compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        $users = User::all();
        return view('service.edit', compact('service','users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'user_id' => 'required',
        ]);

        $service->update($validatedData);

        return redirect()->route('service.index')
            ->with('success', 'Service mis à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        $service->delete();

        return redirect()->route('service.index')
            ->with('success', 'Service supprimé avec succès');
    }
}
