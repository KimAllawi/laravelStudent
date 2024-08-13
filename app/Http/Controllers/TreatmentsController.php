<?php

namespace App\Http\Controllers;

use App\Models\Appointments;
use App\Models\Patients;
use App\Models\Treatments;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\CodeCoverage\Driver\Selector;

use function Laravel\Prompts\select;

class TreatmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $treatments = Appointments::join('Treatments', 'Appointments.appointment_id', '=', 'Treatments.appointment_id')
            ->join('Patients', 'Patients.patient_id', '=', 'Appointments.patient_id')
            ->select('Treatments.treatment_id', DB::raw('CONCAT(Appointments.appointment_id," ",Patients.first_name) as appointment'), 'Treatments.treatment_type', 'Treatments.description', 'Treatments.cost', 'Treatments.treatment_date')
            ->get();

        return view('treatments.index', compact('treatments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dataPatients = Appointments::join('Patients', 'Patients.patient_id', '=', 'Appointments.patient_id')

            ->select(DB::raw("CONCAT(Appointments.appointment_id , ' ' , '[' , Patients.first_name , ']' ) as appointment_id "))


            ->get();



        return view('treatments.create', compact('dataPatients'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $treatments = Treatments::create(
            [

                'appointment_id' => $request->appointment_id,
                'treatment_type' => $request->treatment_type,
                'description' => $request->description,
                'cost' => $request->cost,
                'treatment_date' => $request->treatment_date,

            ]
        );

        // dd($treatments);
        return redirect()->route('Treatments.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Treatments $treatments)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Treatments $treatments)
    {
        // $dataPatients = Appointments::join('Patients', 'Patients.patient_id', '=', 'Appointments.patient_id')

        //     ->select(DB::raw("CONCAT(Appointments.appointment_id , ' ' , '[' , Patients.first_name , ']' ) as appointment_id "))
        //     ->get();

        $dataPatients = Treatments::all();

        return view('treatments.edit', compact('dataPatients'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Treatments $treatments)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Treatments $treatments)
    {
        //
    }

    public function search(Request $request)
    {
        $query = $request->input('searchTreatments');

        $results  =  Appointments::join('Treatments', 'Appointments.appointment_id', '=', 'Treatments.appointment_id')
            ->join('Patients', 'Patients.patient_id', '=', 'Appointments.patient_id')
            ->select('Treatments.treatment_id', DB::raw('CONCAT(Appointments.appointment_id," ",Patients.first_name) as appointment'), 'Treatments.treatment_type', 'Treatments.description', 'Treatments.cost', 'Treatments.treatment_date')

            ->where('Patients.first_name', 'LIKE', "%{$query}%")

            ->get();




        $isEmpty = $results->isEmpty();

        return  view('Treatments.index', compact('results', 'isEmpty'));
    }
}
