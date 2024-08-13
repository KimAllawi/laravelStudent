<?php

namespace App\Http\Controllers;

use App\Models\Appointments;
use App\Models\Patients;
use App\Models\User;
use Illuminate\Http\Request;

class AppointmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $appointments = Appointments::join('Patients', 'Appointments.patient_id', '=', 'Patients.patient_id')
            ->join('Users', 'Appointments.dentist_id', '=', 'Users.id')

            ->select('Users.name as dentist_id', 'Patients.first_name as patient_id', 'Appointments.appointment_id', 'Appointments.appointment_date', 'Appointments.appointment_time', 'Appointments.status', 'Appointments.notes')
            ->get();

        return view('appointments.index', compact('appointments'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dataUsers = User::all();
        $dataPatients = Patients::all();

        return view('appointments.create', compact(['dataUsers', 'dataPatients']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $appointments = Appointments::create(
            [
                'patient_id' => $request->patient_id,
                'dentist_id' => $request->dentist_id,
                'appointment_date' => $request->appointment_date,
                'appointment_time' => $request->appointment_time,
                'status' => $request->status,
                'notes' => $request->notes,
            ]
        );

        return redirect()->route('Appointments.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($appointment_id)
    {
        $patients = Patients::all();
        $users = User::all();
        $appointment = Appointments::find($appointment_id);

        return view('appointments.show', compact('appointment', 'patients', 'users'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($appointment_id)
    {
        $patients = Patients::all();
        $users = User::all();

        $appointment = Appointments::find($appointment_id);
        return view('appointments.edit', compact('appointment', 'patients', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $appointments_id)
    {
        $appointment = Appointments::find($appointments_id);

        $appointment->update(
            [
                'patient_id' => $request->patient_id,
                'dentist_id' => $request->dentist_id,
                'appointment_date' => $request->appointment_date,
                'appointment_time' => $request->appointment_time,
                'status' => $request->status,
                'notes' => $request->notes,
            ]
        );

        return redirect(route('Appointments.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($appointment_id)
    {
        $patients = Patients::all();
        $users = User::all();
        $appointment = Appointments::first();

        $appointment->delete();

        return redirect(route('Appointments.index', compact('users', 'patients', 'appointment')));
    }

    public function search(Request $request)
    {
        $query = $request->input('searchAppointments');
        $result = Appointments::join('Patients', 'Appointments.patient_id', '=', 'Patients.patient_id')
            ->join('Users', 'Users.id', '=', 'Appointments.dentist_id')
            ->select('Appointments.appointment_id', 'Patients.first_name as patient_id', 'Users.name as dentist_id', 'Appointments.appointment_date', 'Appointments.appointment_time', 'Appointments.status', 'Appointments.notes')
            ->where('Patients.first_name', 'LIKE', "%{$query}%")
            ->get();

        $empty = $result->isEmpty();

        return view('Appointments.index', compact('result', 'empty'));
    }
}
