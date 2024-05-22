<?php

namespace App\Http\Controllers;

use App\Mail\AppointmentMail;
use App\Models\Appointment;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::all();
        return view('home/home', compact('services'));
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
        $data = $request->only(['service_id', 'date_begin', 'date_end', 'firstname', 'lastname', 'email','tel', 'company']);

        $validator = Validator::make($data, [
            'service_id' => 'required|string|max:255',
            'date_begin' => 'required|date|max:255',
            'date_end' => 'required|date|max:255',
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'tel' => 'required|string|max:255',
            'company' => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = User::find($data['service_id']);
        if (!$user) {
            return redirect()->back()->with('error', 'Utilisateur non trouvé.');
        }

        $filteredServices = Service::where('user_id', $user->id)->get();
        if (!$filteredServices) {
            return redirect()->back()->with('error', 'Service non trouvé.');
        }

        $serviceUser = $filteredServices[0];

        try {
            Appointment::create([
                'service_id' =>  $serviceUser->id,
                'date_begin' => $data['date_begin'],
                'date_end' => $data['date_end'],
                'firstname' => $data['firstname'],
                'lastname' => $data['lastname'],
                'email' => $data['email'],
                'tel' => $data['tel'],
                'company' => $data['company'],
                'user_id' => $user->id,
            ]);

            $informations = array_merge(
                $request->except('_token'),
                ['service_name' => $serviceUser->name]
            );

            Mail::to($data['email'])->send(
                new AppointmentMail($informations));
            return redirect()->back()->with('success', 'Données enregistrées avec succès!, Un email vous a été envoyé');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Erreur lors de la création de l\'appointment: ');
        }

        return redirect()->back()->with('success', 'Données enregistrées avec succès!');
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
