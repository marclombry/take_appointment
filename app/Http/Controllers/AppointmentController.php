<?php

namespace App\Http\Controllers;

use App\Mail\AppointmentMail;
use App\Models\Appointment;
use App\Models\Service;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login.create');
        }
        $user_id = $user->id;
        $appointments = Appointment::where('user_id', $user_id)->get();
        return view('appointment.index', compact('appointments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->only(['service_id', 'date_begin', 'date_end', 'firstname', 'lastname', 'email', 'tel', 'company']);

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
                'service_id' => $serviceUser->id,
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

            return redirect()->back()->with('success', 'Données enregistrées avec succès!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Erreur lors de la création de l\'appointment: ');
        }

        return redirect()->back()->with('success', 'Données enregistrées avec succès!');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();

        return view('appointment.create', compact('users'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Appointment $appointment)
    {
        $user_id = $appointment->user_id;
        if (!$user_id) {
            return redirect()->back()->with('error', 'Utilisateur non trouvé.');
        }

        $filteredServices = Service::where('user_id', $user_id)->get();
        if (!$filteredServices) {
            return redirect()->back()->with('error', 'Service non trouvé.');
        }

        $service = $filteredServices[0];

        return view('appointment.show', compact('appointment', 'service'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Appointment $appointment)
    {
        // Vérifier si l'appointment existe
        if (!$appointment) {
            return redirect()->back()->with('error', 'Appointment non trouvé.');
        }

        $user_id = $appointment->user_id;
        if (!$user_id) {
            return redirect()->back()->with('error', 'Utilisateur non trouvé.');
        }

        $filteredServices = Service::where('user_id', $user_id)->get();
        if (!$filteredServices) {
            return redirect()->back()->with('error', 'Service non trouvé.');
        }

        $serviceUserId = $filteredServices[0]->id;

        // Passer les données à la vue d'édition
        return view('appointment.edit', [
            'appointment' => $appointment,
            'services' => $filteredServices,
        ]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Appointment $appointment)
    {
        $data = $request->only(['service_id', 'date_begin', 'date_end', 'firstname', 'lastname', 'email', 'tel', 'company']);

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

        try {
            $appointment->update([
                'service_id' => $data['service_id'],
                'date_begin' => $data['date_begin'],
                'date_end' => $data['date_end'],
                'firstname' => $data['firstname'],
                'lastname' => $data['lastname'],
                'email' => $data['email'],
                'tel' => $data['tel'],
                'company' => $data['company'],
            ]);

            // TODO: Ajoutez ici d'autres actions nécessaires après la mise à jour, par exemple, l'envoi d'un email.

            return redirect()->back()->with('success', 'Rendez-vous mis à jour avec succès!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Erreur lors de la mise à jour du rendez-vous: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Appointment $appointment)
    {
        $appointment->delete();

        return redirect()->route('appointment.index')
            ->with('success', 'appointment supprimé avec succès');
    }
}
