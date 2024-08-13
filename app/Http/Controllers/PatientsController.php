<?php

namespace App\Http\Controllers;

use App\Models\Invoices;
use App\Models\Patients;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PatientsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $patients = Patients::all();
        return view('patients.index', compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('patients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        // $patient = new Patients;
        // $patient->first_name = $request->first_name;
        // $patient->last_name = $request->last_name;
        // $patient->email = $request->email;
        // $patient->date_of_birth = $request->date_of_birth;
        // $patient->gender = $request->gender;
        // $patient->address = $request->address;
        // $patient->phone = $request->phone;
        // $patient->save();
        $p = Patients::create(
            [
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'date_of_birth' => $request->date_of_birth,
                'gender' => $request->gender,
                'address' => $request->address,
                'phone' => $request->phone,
            ]
        );

        // $patients = Patients::create(
        //     [
        //         'first_name'=>$request->first_name,
        //         'last_name'=>$request->last_name,
        //         'email'=>$request->email,
        //         'date_of_birth'=>$request->date_of_birth,
        //         'gender'=>$request->gender,
        //         'address'=>$request->address,
        //         'phone'=>$request->phone,
        //     ]);

        return redirect()->route('patients.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($patient_id)
    {
        $patient = Patients::find($patient_id);
        return view('patients.show', compact('patient'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($patient_id)
    {
        $patient = Patients::find($patient_id);

        return view('patients.edit',   ['patient' => $patient]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $patient_id)
    {
        $patient = Patients::find($patient_id);

        $patient->update(
            [
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'password' => $request->password,
                'email' => $request->email,
                'gender' => $request->gender,
                'address' => $request->address,
                'date_of_birth' => $request->date_of_birth,
            ]
        );

        return redirect()->route('patients.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($patient_id)
    {
        $patient  = Patients::find($patient_id);

        $patient->delete();

        return redirect()->route('patients.index');
    }

    public function search(Request $request)
    {
        $query = $request->input('searchPatient');
        $results = Patients::where('first_name', 'LIKE', "%{$query}%")
            ->get();

        $isEmpty = $results->isEmpty();

        return  view('patients.index', compact('results', 'isEmpty'));
    }



    public function reportAppointment($patient_id)
    {

        $reportPatient = Patients::join('Appointments', 'Patients.patient_id', '=', 'Appointments.patient_id')
            // ->join('User', 'Patients.patient_id', '=', 'User.id')
            ->select('Patients.first_name', 'Patients.last_name', 'Appointments.appointment_date as appointment_date', 'Appointments.appointment_time as appointment_time', 'Appointments.status as status')
            ->where('Patients.patient_id', '=', "{$patient_id}")
            ->get();

        return view('patients.reportAppointment', compact('reportPatient'));
    }


    public function reportInvoices($patient_id)
    {

        $reportInvoices = Invoices::join('Patients', 'Patients.patient_id', '=', 'Invoices.patient_id')
            ->select('Invoices.total_amount', 'Invoices.status', 'Invoices.invoice_date')->where('Patients.patient_id', '=', "{$patient_id}")
            ->get();




        $reperPaid =  Invoices::join('Patients', 'Patients.patient_id', '=', 'Invoices.invoice_id')
            ->select(DB::raw('SUM(Invoices.total_amount) as total1'))->where('Patients.patient_id', '=', "{$patient_id}",'and', 'Invoices.status','=','paid')
            ->first();

        $reperUnPaid = Invoices::join('Patients', 'Patients.patient_id', '=', 'Invoices.invoice_id')->where('Invoices.status', '=', 'unpaid')
            ->select(DB::raw('SUM(Invoices.total_amount) as total2'))->where('Patients.patient_id', '=', "{$patient_id}")
            ->first();

        return view('patients.reportInvoices', compact('reportInvoices', 'reperPaid', 'reperUnPaid'));
    }
}
